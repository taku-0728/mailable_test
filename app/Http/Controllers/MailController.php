<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MailController extends Controller
{
  /**
   * メール入力用フォームに遷移する
   */
  public function index(): object
  {
    return view('emails.index');
  }

  /**
   * メール確認
   * @param  Request $request 入力値:
   * @return
   */
  public function confirm(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'name' => 'required',
      'email' => 'required|',
      'body' => 'max:100'
    ]);

    if ($validator->fails()) {
      return redirect('/index')->withErrors($validator)->withInput();
    }

  }

  public function send(): object
  {
    $to = [
      'email' => 'XXXXX@XXXXX.jp',
      'name' => 'Test',
    ];

    Mail::to($to)->send(new MailSend());

    return view('emails.result');
  }
}
