<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BusinessCreditApplication;
use Auth;
use Symfony\Component\HttpFoundation\StreamedResponse;

class BusinessCreditApplicationController extends Controller
{
    /**
     * Display a listing of business credit applications.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = BusinessCreditApplication::with(['directors', 'guarantors', 'references', 'terms']);
        
        // Filter by application type if provided
        if ($request->has('application_type') && $request->application_type != '') {
            $query->where('application_type', $request->application_type);
        }
        
        // Order by created_at DESC to show latest records first
        $applications = $query->orderBy('created_at', 'desc')->paginate(10);
        
        // Get distinct application types for filter dropdown
        $applicationTypes = BusinessCreditApplication::distinct()
            ->whereNotNull('application_type')
            ->pluck('application_type');
        
        return view('business-credit-applications.index', [
            'applications' => $applications,
            'applicationTypes' => $applicationTypes,
            'selectedType' => $request->application_type ?? ''
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
            BusinessCreditApplication::whereIn('id', $ids)->delete();
            return redirect()->route('admin.business-credit-applications.index')
                ->with('success', count($ids) . ' application(s) deleted successfully.');
        }
        
        return redirect()->route('admin.business-credit-applications.index')
            ->with('error', 'No applications selected for deletion.');
    }

    /**
     * Export business credit applications to Excel.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function export(Request $request)
    {
        $query = BusinessCreditApplication::with(['directors', 'guarantors', 'references', 'terms', 'latestMailLog']);
        
        // Filter by application type if provided
        if ($request->has('application_type') && $request->application_type != '') {
            $query->where('application_type', $request->application_type);
        }
        
        // Order by created_at DESC to show latest records first
        $applications = $query->orderBy('created_at', 'desc')->get();
        
        // CSV export
        $filename = 'business-credit-applications-' . now()->format('Y-m-d-H-i-s') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv; charset=utf-8',
            'Content-Disposition' => "attachment; filename=$filename",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0'
        ];
        
        $callback = function() use ($applications) {
            $file = fopen('php://output', 'w');
            
            // Add BOM for Excel to recognize UTF-8
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
            
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
                'Created At'
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
                    $app->trading_name ?? '',
                    $app->legal_name ?? '',
                    $app->contact_person ?? '',
                    $app->email ?? '',
                    $app->mobile ?? '',
                    $app->application_type ?? '',
                    $app->company_no ?? '',
                    $app->nzbn ?? '',
                    $app->gst_no ?? '',
                    $app->credit_limit ?? '',
                    $app->monthly_purchases ?? '',
                    $app->physical_address ?? '',
                    $app->billing_address ?? '',
                    $emailStatus,
                    $app->created_at?->format('Y-m-d H:i:s') ?? ''
                ]);
            }
            
            fclose($file);
        };
        
        return response()->stream($callback, 200, $headers);
    }
}
