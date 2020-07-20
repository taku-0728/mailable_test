<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailSend extends Mailable
{
  use Queueable, SerializesModels;

  /**
  * Create a new message instance.
  *
  * @return void
  */
  public function __construct()
  {

  }

  /**
  * Build the message.
  *
  * @return $this
  */
  public function build()
  {
    return $this->view('emails.test')
                ->from('sample@example.com')
                ->subject('This is a test mail');
  }
}
