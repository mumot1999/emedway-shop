<?php

namespace App\Mail;

use App\ContactMessage;
use App\VerificationPhoto;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CheckoutMail extends Mailable
{
    use Queueable, SerializesModels;

    private $email;
    private $items;


    public function __construct($items)
    {
        $this->items = $items;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.checkoutMail', [
            'items' => $this->items,
        ]);
    }
}
