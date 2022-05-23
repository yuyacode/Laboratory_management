<!-- 新規登録ページ -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>laboratory management</title>
  <?php echo Asset::css('style.css'); ?>
</head>
<body>
  <p>新規登録ページ</p>
  <form action="/user/create_user" method="POST">
    <p>ユーザー名</p>
    <input type="text" name="username" placeholder="15字以内">
    <p>パスワード</p>
    <input type="text" name="password" placeholder="8～16字">
    <p>メールアドレス</p>
    <input type="text" name="email">
    <p><input type="submit" value="新規登録"></p>
  </form>
  <p><a href="/user/login_page">ログイン</a></p>
</body>
</html>