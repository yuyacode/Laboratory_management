<!-- 課題 作成ページ -->
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
</head>
<body>
  <p>課題 作成ページ</p>
  <form action="/task/insert/<?php echo $_SESSION['id']; ?>" method="POST">
    <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">
    <p>課題名</p>
    <input type="text" name="title">
    <p>課題内容</p>
    <textarea name="content"></textarea>
    <p>提出日</p>
    <input type="datetime-local" name="deadline">
    <p><input type="submit" value="作成"></p>
  </form>
  <p><a href="/task/index_yet/<?php echo $_SESSION['id']; ?>">課題 一覧ページへ</a></p>
</body>
</html>