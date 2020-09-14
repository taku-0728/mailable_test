<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
  public function index(){
    return view('emails.index');
  }

  public function send(){
    $to = [
      'email' => 'XXXXX@XXXXX.jp',
      'name' => 'Test',
    ];

    Mail::to($to)->send(new MailSend());

    return view('emails.result');
  }
}
