<!-- ログインページ -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>laboratory management</title>
  <?php echo Asset::css('style.css'); ?>
  <?php echo Asset::css('main.css'); ?>
</head>
<body>
  <main class="pt0 pb0">
    <p class="fz20 pt25 pb25 pr4vw pl4vw shadow-black">Laboratory management</p>
    <div class="pt50 pb50 pr10vw pl10vw">
      <p class="fz20 mb30">ログイン</p>
      <?php if (isset($error)) : ?>
        <p class="red mb15"><?php echo $error; ?></p>
      <?php endif; ?>
      <form action="/user/login" method="POST">
        <div class="form-item mb30">
          <p class="fz16 mb15">ユーザー名</p>
          <input type="text" name="username" placeholder="15字以内">
        </div>
        <div class="form-item mb30">
          <p class="fz16 mb15">パスワード</p>
          <input type="text" name="password" placeholder="8～16字">
        </div>
        <p class="w100 mb30 tar"><input type="submit" value="ログイン" class="light-blue bgc-white h40 border-gray submit"></p>
      </form>
      <p class="tac"><a href="/user/create_page">新規登録</a></p>
    </div>
  </main>
</body>
</html>