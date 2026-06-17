<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BusinessCreditApplication;
use App\Models\ClientFormRequest;
use Auth;
use Symfony\Component\HttpFoundation\StreamedResponse;

class BusinessCreditApplicationController extends Controller
{
    public function __construct()
    {
        // Admins / Superadmins / Sales Agents (own-access) can reach these routes
        $this->middleware('role_or_permission:BusinessApp access|BusinessApp own-access');
        $this->middleware('role_or_permission:BusinessApp delete|BusinessApp own-delete', ['only' => ['destroy', 'bulkDelete']]);
    }

    /**
     * Display a listing of business credit applications.
     * - superadmin / admin  : see ALL
     * - Sales Agent          : see ONLY applications submitted through links they sent
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user  = auth()->user();
        $query = BusinessCreditApplication::with(['directors', 'guarantors', 'references', 'terms']);

        // Filter by application type if provided
        if ($request->has('application_type') && $request->application_type != '') {
            $query->where('application_type', $request->application_type);
        }

        // Sales Agent scope: only their clients' applications
        if (!$user->can('BusinessApp access')) {
            $agentEmails = ClientFormRequest::where('agent_id', $user->id)
                ->pluck('email')
                ->unique()
                ->values();
            $query->whereIn('email', $agentEmails);
        }

        // Order by created_at DESC
        $applications = $query->orderBy('created_at', 'desc')->paginate(10);

        // Get distinct application types for filter dropdown
        $applicationTypes = BusinessCreditApplication::distinct()
            ->whereNotNull('application_type')
            ->pluck('application_type');

        // Get counts for Credit and Cash
        $creditCount = BusinessCreditApplication::where('application_type', 'Credit')->count();
        $cashCount   = BusinessCreditApplication::where('application_type', 'Cash')->count();

        return view('business-credit-applications.index', [
            'applications'     => $applications,
            'applicationTypes' => $applicationTypes,
            'selectedType'     => $request->application_type ?? '',
            'creditCount'      => $creditCount,
            'cashCount'        => $cashCount,
        ]);
    }

    /**
     * Display a specific business credit application.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $application = BusinessCreditApplication::with(['directors', 'guarantors', 'references', 'terms'])
            ->findOrFail($id);

        return view('business-credit-applications.show', ['application' => $application]);
    }

    /**
     * Delete a business credit application.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $application = BusinessCreditApplication::findOrFail($id);

        // Check if agent only has own-delete and doesn't own this application
        if (!auth()->user()->can('BusinessApp delete') && auth()->user()->can('BusinessApp own-delete')) {
            $agentEmails = ClientFormRequest::where('agent_id', auth()->id())->pluck('email')->toArray();
            if (!in_array($application->email, $agentEmails)) {
                abort(403, 'You do not have permission to delete this application.');
            }
        }

        $application->delete();

        return redirect()->route('admin.business-credit-applications.index')
            ->with('success', 'Business Credit Application deleted successfully.');
    }

    /**
     * Bulk delete business credit applications.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function bulkDelete(Request $request)
    {
        $ids = $request->input('app_ids', []);

        if (count($ids) > 0) {
            $query = BusinessCreditApplication::whereIn('id', $ids);
            
            // Check if agent only has own-delete
            if (!auth()->user()->can('BusinessApp delete') && auth()->user()->can('BusinessApp own-delete')) {
                $agentEmails = ClientFormRequest::where('agent_id', auth()->id())->pluck('email')->toArray();
                $query->whereIn('email', $agentEmails);
            }

            $deleted = $query->delete();
            return redirect()->route('admin.business-credit-applications.index')
                ->with('success', $deleted . ' application(s) deleted successfully.');
        }

        return redirect()->route('admin.business-credit-applications.index')
            ->with('error', 'No applications selected for deletion.');
    }

    /**
     * Export business credit applications to CSV.
     * Sales Agents only export their own clients' applications.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function export(Request $request)
    {
        $user  = auth()->user();
        $query = BusinessCreditApplication::with(['directors', 'guarantors', 'references', 'terms', 'latestMailLog']);

        // Filter by application type if provided
        if ($request->has('application_type') && $request->application_type != '') {
            $query->where('application_type', $request->application_type);
        }

        // Sales Agent scope
        if (!$user->can('BusinessApp access')) {
            $agentEmails = ClientFormRequest::where('agent_id', $user->id)
                ->pluck('email')
                ->unique()
                ->values();
            $query->whereIn('email', $agentEmails);
        }

        // Order by created_at DESC
        $applications = $query->orderBy('created_at', 'desc')->get();

        // CSV export
        $filename = 'business-credit-applications-' . now()->format('Y-m-d-H-i-s') . '.csv';

        $headers = [
            'Content-Type'        => 'text/csv; charset=utf-8',
            'Content-Disposition' => "attachment; filename=$filename",
            'Pragma'              => 'no-cache',
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
            'Expires'             => '0',
        ];

        $callback = function () use ($applications) {
            $file = fopen('php://output', 'w');

            // Add BOM for Excel to recognize UTF-8
            fprintf($file, chr(0xEF) . chr(0xBB) . chr(0xBF));

            // Add header row
            fputcsv($file, [
                'ID',
                'Trading Name',
                'Legal Name',
                'Contact Person',
                'Email',
                'Mobile',
                'Application Type',
                'Company Number',
                'NZBN',
                'GST Number',
                'Credit Limit',
                'Monthly Purchases',
                'Physical Address',
                'Billing Address',
                'Email Status',
                'Created At',
            ]);

            // Add data rows
            foreach ($applications as $app) {
                $emailStatus = 'No Email';
                if ($app->latestMailLog) {
                    if ($app->latestMailLog->status === 'sent') {
                        $emailStatus = 'Email Sent';
                    } elseif ($app->latestMailLog->status === 'failed') {
                        $emailStatus = 'Email Failed';
                    } else {
                        $emailStatus = ucfirst($app->latestMailLog->status);
                    }
                }

                fputcsv($file, [
                    $app->id,
                    $app->trading_name    ?? '',
                    $app->legal_name      ?? '',
                    $app->contact_person  ?? '',
                    $app->email           ?? '',
                    $app->mobile          ?? '',
                    $app->application_type ?? '',
                    $app->company_no      ?? '',
                    $app->nzbn            ?? '',
                    $app->gst_no          ?? '',
                    $app->credit_limit    ?? '',
                    $app->monthly_purchases ?? '',
                    $app->physical_address ?? '',
                    $app->billing_address  ?? '',
                    $emailStatus,
                    $app->created_at?->format('Y-m-d H:i:s') ?? '',
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
    public function toggleClientAccess(Request $request, $id)
    {
        $application = BusinessCreditApplication::findOrFail($id);
        
        $request->validate([
            'client_can_view' => 'nullable|boolean',
            'client_can_edit' => 'nullable|boolean',
        ]);

        $application->update([
            'client_can_view' => $request->has('client_can_view'),
            'client_can_edit' => $request->has('client_can_edit'),
        ]);

        return redirect()->route('admin.business-credit-applications.show', $application->id)
            ->with('success', 'Client access permissions updated successfully.');
    }
}
