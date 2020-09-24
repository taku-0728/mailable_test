<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Mail\MailSend;
use Illuminate\Support\Facades\Mail;

class MailSendTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_メールが送信されること()
    {
      // 実際にはメールを送らないように設定
      Mail::fake();

      // メールが送られていないことを確認
      Mail::assertNothingSent();

      $name = 'テスト太郎';
      $email = 'test@example.com';
      $body = 'これはテストメッセージです';

      // メール送信処理を実施
      $response = $this->post('/execute', ['name' => $name, 'email' => $email, 'body' => $body]);

      // メッセージが指定したユーザーに届いたことをアサート
      Mail::assertSent(MailSend::class, function ($mail) use ($email) {
          return $mail->hasTo($email);
      });

      // メールが1回送信されたことをアサート
      Mail::assertSent(MailSend::class, 1);

    }
}
