<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CustomerReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $reply;

    /**
     * Tạo instance của Mailable.
     */
    public function __construct($reply)
    {
        $this->reply = $reply;
    }

    /**
     * Xây dựng email.
     */
    public function build()
    {
        return $this->subject('Phản hồi từ hệ thống')
                    ->view('admins.lienhes.nguoidungphanhoi')
                    ->with('reply', $this->reply);
    }

   
}
