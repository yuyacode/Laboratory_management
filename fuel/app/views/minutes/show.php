<!-- 議事録 詳細ページ -->
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
      <?php foreach ($minutes_list as $minutes_item) : ?>
        <p class="fz20 mb15"><?php echo $minutes_item['title']; ?></p>
        <p class="tar">作成日：<?php echo $minutes_item['created_at']; ?></p>
        <p class="mb15 tar">更新日：<?php echo $minutes_item['updated_at']; ?></p>
        <div class="flex justify-flex-end flex-a-center mb25">
          <p class="mr15"><a href="/minute/edit/<?php echo $minutes_item['id']; ?>">編集</a></p>
          <p><a href="/minute/delete/<?php echo $minutes_item['id']; ?>/<?php echo $_SESSION['id']; ?>">削除</a></p>
        </div>
        <p class="fz16 mb15">概要</p>
        <p class="mb30"><?php echo $minutes_item['summary']; ?></p>
        <p class="fz16 mb15">内容</p>
        <p class="mb40"><?php echo $minutes_item['content']; ?></p>
      <?php endforeach; ?>
      <p class="tar"><a href="/minute/index/<?php echo $_SESSION['id']; ?>">議事録 一覧ページへ</a></p>
    </div>
  </main>
</body>
</html>