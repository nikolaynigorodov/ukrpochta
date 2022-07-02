<?php

namespace App\Mail;

use App\Events\OrderCreate;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendOrderEmailFromManager extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var OrderCreate
     */
    private $orderCreate;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(OrderCreate $orderCreate)
    {
        $this->orderCreate = $orderCreate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.new_order_email')->with([
            'order' => $this->orderCreate->order
        ]);
    }
}
