<!DOCTYPE html>
<html lang="ja">
  <head>
    <title>メール送信フォーム</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <h2 class="">メール送信フォーム</h2>
      <form id="form" method="post" action="/confirm">
        @csrf
        <div class="form-group">
          <label for="name">名前（必須）</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="名前"  @if(isset($name)) value="{{ $name }}" @endif>
        </div>
        <div class="form-group">
          <label for="email">宛先（必須）</label>
          <input type="text" class="form-control" id="email" name="email" placeholder="宛先"  @if(isset($email)) value="{{ $email }}" @endif>
        </div>
        <div class="form-group">
          <label for="message">フリーメッセージ</label>
          <textarea class="form-control" id="message" name="message" placeholder="フリーメッセージ（100文字まで）をお書きください"  rows="3"></textarea>
        </div>
        <button name="submitted" type="submit" class="btn btn-primary">送信</button>
      </form>
    </div>
  </body>
</html>
