<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PasswordResetOtp extends Mailable // Renamed class
{
    use Queueable, SerializesModels;

    public $emailMessage; // Changed from $message, REMOVED type hint
    public $subject;      // REMOVED type hint
    public $otp;          // REMOVED type hint

    public function __construct(string $emailMessage, string $subject, string $otp)
    {
        $this->emailMessage = $emailMessage;
        $this->subject = $subject;
        $this->otp = $otp;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.forgot_otp',
            with: [
                'message' => $this->emailMessage, // Use $emailMessage
                'otp' => $this->otp,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
