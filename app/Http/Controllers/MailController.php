<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
  public function send(){
    $to = [
      'email' => 'XXXXX@XXXXX.jp',
      'name' => 'Test',
    ];

    Mail::to($to)->send(new MailSend());
  }
}
