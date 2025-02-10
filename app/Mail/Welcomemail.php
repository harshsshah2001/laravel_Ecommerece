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
    public $msg;
    public $sub;
    public $otp;

    /**
     * Create a new message instance.
     */
    public function __construct($msg, $subject, $otp)
    {
        $this->msg = $msg;
        $this->sub = $subject;
        $this->otp = $otp;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->sub,
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
                'messageContent' => $this->msg,
                'subject' => $this->sub,
                'otp' => $this->otp,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, 
     */
    public function attachments(): array
    {
        return []; 
    }
}
