<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Course;
use App\Models\User;

class ApprovedResource extends Mailable
{
    use Queueable, SerializesModels;
    public $student;
    public $authenticatedUserId;

    public $lesson;
    /**
     * Create a new message instance.
     */
    public function __construct(User $student,  $lesson, $authenticatedUserId)
    {

        $this->student = $student;

        $this->lesson = $lesson;

        $this->authenticatedUserId =  $authenticatedUserId;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'DOCUMENTO APROBADO',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.approved-resource',
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
