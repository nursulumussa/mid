<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $replyText;

    public function __construct($replyText)
    {
        $this->replyText = $replyText;
    }

    public function build()
    {
        return $this->subject('Reply from BLOOMA')
            ->view('emails.reply');
    }
}