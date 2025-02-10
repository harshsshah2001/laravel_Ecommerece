<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;

class Welcomemail extends Mailable
{
    use Queueable, SerializesModels;

    public $filename; // Add filename property
     public $subject;
    public $messageContent;

    /**
     * Create a new message instance.
     */
    public function __construct($filename, $subject, $messageContent)  // Make filename optional
    {

        $this->filename = $filename;
        $this->subject = $subject;
        $this->messageContent = $messageContent;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'thank_you',
            with: [
                'filename' => $this->filename, // Pass filename to view
                'messageContent' => $this->messageContent,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
   
{
    $attachment = [];

    if ($this->filename) {
        $attachment = [
            Attachment::fromPath(public_path('All_pdf/' . $this->filename))
                ->as($this->filename)
                ->withMimeType('application/pdf'),
        ];
    }

    return $attachment;
}
}

