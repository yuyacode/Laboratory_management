<!-- ログインページ -->
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
  <p>ログイン</p>
  <?php if (isset($error)) : ?>
    <?php echo $error; ?>
  <?php endif; ?>
  <form action="/user/login" method="POST">
    <p>ユーザー名</p>
    <input type="text" name="username" placeholder="15字以内">
    <p>パスワード</p>
    <input type="text" name="password" placeholder="8～16字">
    <p><input type="submit" value="ログイン"></p>
  </form>
  <p><a href="/user/create_page">新規登録</a></p>
</body>
</html>