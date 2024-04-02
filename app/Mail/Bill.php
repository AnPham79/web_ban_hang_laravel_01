<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Bill extends Mailable
{
    use Queueable, SerializesModels;

    public $billDetails;
    public $totalPrice;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($billDetails, $totalPrice)
    {
        $this->billDetails = $billDetails;
        $this->totalPrice = $totalPrice;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Hóa đơn mua hàng tại Cửa hàng điện thoại Phạm An')->view('Mail.bill');
    }
}
