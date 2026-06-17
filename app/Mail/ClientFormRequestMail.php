<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\ClientFormRequest;

class ClientFormRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $formRequest;

    /**
     * Create a new message instance.
     */
    public function __construct(ClientFormRequest $formRequest)
    {
        $this->formRequest = $formRequest;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $type = ucfirst($this->formRequest->form_type);
        return new Envelope(
            subject: "Action Required: Complete Your $type Application",
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.client-form-request',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
