<!-- 議事録 作成ページ -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>laboratory management</title>
</head>
<body>
  <p>議事録 作成ページ</p>
  <form action="/minute/insert" method="POST">
    <input type="hidden" name="user_id" value="1">
    <p>タイトル</p>
    <input type="text" name="title" placeholder="50字以内">
    <p>概要</p>
    <textarea name="summary" placeholder="255字以内"></textarea>
    <p>内容</p>
    <textarea name="content"></textarea>
    <p><input type="submit" value="作成"></p>
  </form>
  <p><a href="/minute">議事録 一覧ページへ</a></p>
</body>
</html>