<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\MailSend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

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
   *
   * TODO: 返り値の型指定
   * @param  Request $request 入力値:
   * @return
   */
  public function confirm(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'name' => 'required',
      'email' => 'required|email',
      'body' => 'max:100'
    ]);

    if ($validator->fails()) {
      return redirect('/index')->withErrors($validator)->withInput();
    }

    $result = [];
    if ($request->has(['name', 'email', 'message'])) {
      $result['name'] = $request->name;
      $result['email'] = $request->email;
      $result['message'] = $request->message;
    } else {
      return redirect('/index', $result);
    }

    return view('emails.confirm', $result);

  }

  public function execute(Request $request)
  {
    if ($request->has(['name', 'email', 'message'])) {
      $name = $request->name;
      $email = $request->email;
      $message = $request->message;
    }

    Mail::to($email)->send(new MailSend($name, $message));

    return view('emails.result');
  }
}
