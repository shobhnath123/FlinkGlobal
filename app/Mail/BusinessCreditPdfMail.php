<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Attachment;

class BusinessCreditPdfMail extends Mailable
{
    use Queueable, SerializesModels;

    public $app;
    public $pdf;
    public $recipientName;
    public $appNo;

    /**
     * Create a new message instance.
     */
    public function __construct($app, $pdf, $recipientName)
    {
        $this->app = $app;
        $this->pdf = $pdf;
        $this->recipientName = $recipientName;
        $this->appNo = 'FG-' . str_pad($app->id, 6, '0', STR_PAD_LEFT);
    }

    /**
     * Email subject
     */
    public function envelope(): Envelope
    {
        $type = ucfirst($this->app->application_type) ?? 'Credit';
        return new Envelope(
            from: env('MAIL_FROM_ADDRESS', 'noreply@example.com'),
            subject: 'FlinkGlobal Limited - ' . $type . ' Application No.-' . $this->appNo . ' Signature Required | Action Needed'
        );
    }

    /**
     * Email body view
     */
    public function content(): Content
    {
        return new Content(
            view: 'pdf.business-credit',
            with: [
            'recipientName' => $this->recipientName,
            'appNo' => $this->appNo,
            'app' => $this->app,
        ]
        );
    }
    /**
     * Attach PDF
     */
    public function attachments(): array
    {
        $type = ucfirst($this->app->application_type) ?? 'Credit';
        $fileName = "Business-{$type}-Application-{$this->appNo}.pdf";

        return [
            Attachment::fromData(
                fn () => $this->pdf,
                $fileName
            )->withMime('application/pdf'),
        ];
    }
}
