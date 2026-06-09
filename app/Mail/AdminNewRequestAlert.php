<?php

namespace App\Mail;

use App\Models\ChangeRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminNewRequestAlert extends Mailable
{
    use Queueable, SerializesModels;

    public $changeRequest;

    public function __construct(ChangeRequest $changeRequest)
    {
        $this->changeRequest = $changeRequest;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'URGENT: New Change Request #' . $this->changeRequest->request_no,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.admin_alert',
        );
    }
    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
