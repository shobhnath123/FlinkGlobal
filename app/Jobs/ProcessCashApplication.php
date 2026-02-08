<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\BusinessCreditApplication;
use App\Models\MailLog;
use App\Mail\BusinessCreditPdfMail;
use Illuminate\Support\Facades\Mail;
use App\Services\PdfService;

class ProcessCashApplication implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $app;
    protected $ip;
    protected $userAgent;

    /**
     * Create a new job instance.
     */
    public function __construct(BusinessCreditApplication $app, ?string $ip, ?string $userAgent)
    {
        $this->app = $app;
        $this->ip = $ip;
        $this->userAgent = $userAgent;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Add timeout for generation
        // set_time_limit(120); 

        $this->app->load(['directors', 'guarantors', 'references', 'terms']);

        $html = view('pdf.business-cash-pdf', ['app' => $this->app])->render();

        $pdfBinary = PdfService::generateFromHtml($html);

        try {
            Mail::to($this->app->email)
                ->cc($this->app->accounts_email)
                ->send(new BusinessCreditPdfMail($this->app, $pdfBinary));

            // Log successful email
            MailLog::create([
                'type' => 'cash_account',
                'business_account_id' => $this->app->id,
                'recipient_email' => $this->app->email,
                'subject' => 'Cash Account Application',
                'body' => 'Cash account application PDF sent',
                'status' => 'sent',
                'attachment_details' => json_encode([
                    [
                        'name' => 'cash-account-application.pdf',
                        'mime' => 'application/pdf',
                        'size' => strlen($pdfBinary)
                    ]
                ]),
                'ip_address' => $this->ip,
                'user_agent' => $this->userAgent
            ]);
        } catch (\Exception $e) {
            // Log failed email
            MailLog::create([
                'type' => 'cash_account',
                'business_account_id' => $this->app->id,
                'recipient_email' => $this->app->email,
                'subject' => 'Cash Account Application',
                'body' => 'Cash account application PDF failed to send',
                'status' => 'failed',
                'error_message' => $e->getMessage(),
                'ip_address' => $this->ip,
                'user_agent' => $this->userAgent
            ]);
        }
    }
}
