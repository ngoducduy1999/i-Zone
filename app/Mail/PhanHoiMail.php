<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PhanHoiMail extends Mailable
{
    use Queueable, SerializesModels;

public  $traloiTinNhan;


    
    /**
     * Create a new message instance.
     */
    public function __construct($traloiTinNhan)
    {
        //
        $this->traloiTinNhan=$traloiTinNhan;
    }

    public function build()
    {
        return $this->from('your-email@gmail.com')
                    ->subjecttraloiTinNhan($this->traloiTinNhan)
                    ->view('admins.lienhes.phanhoi');
    }
   
}
