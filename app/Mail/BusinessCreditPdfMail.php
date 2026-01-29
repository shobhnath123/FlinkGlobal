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

    /**
     * Create a new message instance.
     */
    public function __construct($app, $pdf)
    {
        $this->app = $app;
        $this->pdf = $pdf;
    }

    /**
     * Email subject
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: env('MAIL_FROM_ADDRESS', 'noreply@example.com'),
            subject: 'Business Credit Application PDF'
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
            'app' => $this->app,
        ]
        );
    }
    /**
     * Attach PDF
     */
    public function attachments(): array
    {
        return [
            Attachment::fromData(
                fn () => $this->pdf,
                'business-credit-application.pdf'
            )->withMime('application/pdf'),
        ];
    }
}
