<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;
    protected string $firstName;

    protected string $lastName;
    protected string $country;
    protected string $region;
    protected string $address;


    /**
     * Create a new message instance.
     */
    public function __construct($firstName, $lastName, $country, $region, $address)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->country = $country;
        $this->region = $region;
        $this->address = $address;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Order info Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.order',
            with: [
                'firstName' => $this->firstName,
                'lastName' => $this->lastName,
                'country' => $this->country,
                'region' => $this->region,
                'address' => $this->address
            ]
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
