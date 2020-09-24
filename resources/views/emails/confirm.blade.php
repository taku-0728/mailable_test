<!DOCTYPE html>
<html lang="ja">
  <head>
    <title>メール送信フォーム</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <h2 class="">メール送信フォーム</h2>
      <form id="form" method="post" action="/execute">
        @csrf
        <div class="form-group">
          <input type="hidden" class="form-control" id="name" name="name" value="{{ $name }}">
          <p>名前：<br>{{ $name }}</p>
        </div>
        <div class="form-group">
          <input type="hidden" class="form-control" id="email" name="email" value="{{ $email }}">
          <p>宛先：<br>{{ $email }}</p>
        </div>
        <div class="form-group">
          <input type="hidden" class="form-control" id="message" name="message" value="{{ $message }}">
          <p>本文：<br>{{ $message }}</p>
        </div>
        <button name="submitted" type="submit" class="btn btn-primary">送信</button>
      </form>
    </div>
  </body>
</html>
