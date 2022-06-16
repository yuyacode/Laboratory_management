<!-- 議事録 編集ページ -->
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
      <p class="fz20 mb30">編集</p>
      <?php foreach ($minutes_list as $minutes_item) : ?>
        <form action="/minute/update/<?php echo $minutes_item['id']; ?>" method="POST">
          <div class="form-item mb30">
            <p class="fz16 mb15">タイトル</p>
            <input type="text" name="title" value="<?php echo $minutes_item['title']; ?>" placeholder="50字以内">
          </div>
          <div class="form-item mb30">
            <p class="fz16 mb15">概要</p>
            <textarea name="summary" class="h100 p10" placeholder="255字以内"><?php echo $minutes_item['summary']; ?></textarea>
          </div>
          <div class="form-item mb30">
            <p class="fz16 mb15">内容</p>
            <textarea name="content" class="h500 p10"><?php echo $minutes_item['content']; ?></textarea>
          </div>
          <p class="mb30 tar"><input type="submit" value="保存" class="light-blue bgc-white h30 w50 border-gray submit"></p>
        </form>
        <p class="tar"><a href="/minute/show/<?php echo $minutes_item['id']; ?>">キャンセル</a></p>
      <?php endforeach; ?>
    </div>
  </main>
</body>
</html>