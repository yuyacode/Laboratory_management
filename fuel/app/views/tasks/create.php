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
  <?php echo Asset::css('style.css'); ?>
  <?php echo Asset::css('main.css'); ?>
</head>
<body>
  <main class="pt0 pb0">
    <?php echo $header; ?>
    <div class="pt50 pb50 pr10vw pl10vw">
      <p class="fz20 mb30">課題 作成ページ</p>
      <form action="/task/insert/<?php echo $_SESSION['id']; ?>" method="POST">
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">
        <div class="form-item mb30">
          <p class="fz16 mb15">課題名</p>
          <input type="text" name="title" placeholder="50字以内">
        </div>
        <div class="form-item mb30">
          <p class="fz16 mb15">課題内容</p>
          <textarea name="content" class="h500 p10"></textarea>
        </div>
        <div class="form-item mb30">
          <p class="fz16 mb15">提出日</p>
          <input type="datetime-local" name="deadline">
        </div>
        <p class="mb30 tar"><input type="submit" value="作成" class="light-blue bgc-white h30 w50 border-gray submit"></p>
      </form>
      <p class="tar"><a href="/task/index_yet/<?php echo $_SESSION['id']; ?>">課題　一覧ページへ</a></p>
    </div>
  </main>
</body>
</html>