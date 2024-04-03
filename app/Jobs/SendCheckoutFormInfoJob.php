<?php

namespace App\Jobs;

use App\Mail\OrderMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendCheckoutFormInfoJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected string $firstName;
    protected string $lastName;
    protected string $country;
    protected string $region;
    protected string $address;
    protected array $cart;


    /**
     * Create a new message instance.
     */
    public function __construct($firstName, $lastName, $country, $region, $address, $cart)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->country = $country;
        $this->region = $region;
        $this->address = $address;
        $this->cart = $cart;
    }


    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to('test@mail.com')->send(new OrderMail($this->firstName, $this->lastName,
            $this->country,$this->region, $this->address, $this->cart));
    }
}
