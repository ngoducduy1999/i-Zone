<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class InvoiceCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $hoaDon;

    /**
     * Create a new message instance.
     *
     * @param $hoaDon
     */
    public function __construct($hoaDon)
    {
        $this->hoaDon = $hoaDon;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
{
    return $this->subject('Xác nhận đặt hàng')
                ->view('emails.invoice_created')
                ->with([
                    'hoaDon' => $this->hoaDon->load('chiTietHoaDons.bienTheSanPham.sanPham'),
                ]);
}

}
