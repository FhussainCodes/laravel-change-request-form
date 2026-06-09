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

class EngineerAssignmentNotice extends Mailable
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
            subject: 'New Project Task Assigned: Request #' . $this->changeRequest->request_no,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.engineer_notice',
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
