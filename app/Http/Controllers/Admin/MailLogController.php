<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MailLog;
use Illuminate\Http\Request;

class MailLogController extends Controller
{
    /**
     * Display a listing of mail logs.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = MailLog::query();

        // Filter by type
        if ($request->has('type') && $request->type != '') {
            $query->where('type', $request->type);
        }

        // Filter by status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // Search by email
        if ($request->has('search') && $request->search != '') {
            $query->where('recipient_email', 'like', '%' . $request->search . '%')
                ->orWhere('subject', 'like', '%' . $request->search . '%');
        }

        $mailLogs = $query->orderBy('created_at', 'desc')->paginate(15);

        // Get distinct types for filter
        $types = MailLog::distinct()->whereNotNull('type')->pluck('type');
        $statuses = ['sent', 'failed', 'pending'];

        return view('mail-logs.index', [
            'mailLogs' => $mailLogs,
            'types' => $types,
            'statuses' => $statuses,
            'selectedType' => $request->type ?? '',
            'selectedStatus' => $request->status ?? '',
            'searchQuery' => $request->search ?? ''
        ]);
    }

    /**
     * Display a specific mail log.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mailLog = MailLog::findOrFail($id);
        return view('mail-logs.show', ['mailLog' => $mailLog]);
    }

    /**
     * Delete a mail log.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mailLog = MailLog::findOrFail($id);
        $mailLog->delete();

        return redirect()->route('admin.mail-logs.index')
            ->with('success', 'Mail log deleted successfully.');
    }

    /**
     * Bulk delete mail logs.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function bulkDelete(Request $request)
    {
        $ids = $request->input('log_ids', []);

        if (count($ids) > 0) {
            MailLog::whereIn('id', $ids)->delete();
            return redirect()->route('admin.mail-logs.index')
                ->with('success', count($ids) . ' mail log(s) deleted successfully.');
        }

        return redirect()->route('admin.mail-logs.index')
            ->with('error', 'No mail logs selected for deletion.');
    }

    /**
     * Export mail logs to CSV.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function export(Request $request)
    {
        $query = MailLog::query();

        // Apply same filters as index
        if ($request->has('type') && $request->type != '') {
            $query->where('type', $request->type);
        }

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        if ($request->has('search') && $request->search != '') {
            $query->where('recipient_email', 'like', '%' . $request->search . '%')
                ->orWhere('subject', 'like', '%' . $request->search . '%');
        }

        $mailLogs = $query->orderBy('created_at', 'desc')->get();

        $filename = 'mail-logs-' . now()->format('Y-m-d-H-i-s') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv; charset=utf-8',
            'Content-Disposition' => "attachment; filename=$filename",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0'
        ];

        $callback = function() use ($mailLogs) {
            $file = fopen('php://output', 'w');
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));

            fputcsv($file, [
                'ID',
                'Type',
                'Recipient Email',
                'Subject',
                'Status',
                'IP Address',
                'Created At'
            ]);

            foreach ($mailLogs as $log) {
                fputcsv($file, [
                    $log->id,
                    $log->type,
                    $log->recipient_email,
                    $log->subject,
                    $log->status,
                    $log->ip_address ?? 'N/A',
                    $log->created_at?->format('Y-m-d H:i:s') ?? ''
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
