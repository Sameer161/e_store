<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MyTestMail extends Mailable
{
    use Queueable, SerializesModels;
    public $details;


    public function build()
    {
        return $this->subject('Mail from Hexashop')->view('admin.emails.myemail');
    }



    public function __construct($details)
    {
        $this->details = $details;
    }


}
