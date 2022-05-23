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
</head>
<body>
  <p><a href="/index/index/<?php echo $_SESSION['id']; ?>">TOPページへ</a></p>
  <p><a href="/user/index/<?php echo $_SESSION['id']; ?>">マイページへ</a></p>
  <p>議事録 作成ページ</p>
  <form action="/minute/insert/<?php echo $_SESSION['id']; ?>" method="POST">
    <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">
    <p>タイトル</p>
    <input type="text" name="title" placeholder="50字以内">
    <p>概要</p>
    <textarea name="summary" placeholder="255字以内"></textarea>
    <p>内容</p>
    <textarea name="content"></textarea>
    <p><input type="submit" value="作成"></p>
  </form>
  <p><a href="/minute/index/<?php echo $_SESSION['id']; ?>">議事録 一覧ページへ</a></p>
</body>
</html>