<!-- 議事録 作成ページ -->
<?php
session_start();
session_regenerate_id();
?>
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
    <div class="flex justify-between flex-a-center h80 pr4vw pl4vw shadow-black">
      <p class="fz20"><a href="/index/index/<?php echo $_SESSION['id']; ?>" class="navy-blue tdn">Laboratory management</a></p>
      <p class="fz16"><a href="/user/index/<?php echo $_SESSION['id']; ?>">マイページ</a></p>
    </div>
    <div class="pt50 pb50 pr10vw pl10vw">
      <p class="fz20 mb30">議事録 作成ページ</p>
      <form action="/minute/insert/<?php echo $_SESSION['id']; ?>" method="POST">
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">
        <div class="form-item mb30">
          <p class="fz16 mb15">タイトル</p>
          <input type="text" name="title" placeholder="50字以内">
        </div>
        <div class="form-item mb30">
          <p class="fz16 mb15">概要</p>
          <textarea name="summary" placeholder="255字以内" class="h100 p10"></textarea>
        </div>
        <div class="form-item mb30">
          <p class="fz16 mb15">内容</p>
          <textarea name="content" class="h500 p10"></textarea>
        </div>
        <p class="mb30 tar"><input type="submit" value="作成" class="light-blue bgc-white h30 w50 border-gray submit"></p>
      </form>
      <p class="tar"><a href="/minute/index/<?php echo $_SESSION['id']; ?>">議事録　一覧ページ</a></p>
    </div>
  </main>
</body>
</html>