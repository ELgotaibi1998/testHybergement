<?php

namespace App\Mail;

use App\Models\Affectation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AffectationMail extends Mailable
{
    use Queueable, SerializesModels;
public $mail;
    /**
     * Create a new message instance.
     */
    public function __construct(  $mail)
    {
    $this->mail=$mail;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from:new Address("batoul1998aa@gmail.com"),
            subject: 'Affectation du matériel',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.email',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            //Attachment::fromPath("E:/cours/agile/Git_TP2.pdf")
        ];
    }
}
