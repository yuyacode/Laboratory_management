<!-- 議事録 編集ページ -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>laboratory management</title>
</head>
<body>
  <p>議事録 編集ページ</p>
  <?php foreach ($minutes_list as $minutes_item) : ?>
    <form action="/minute/update/<?php echo $minutes_item['id'] ?>" method="POST">
      <p>タイトル</p>
      <input type="text" name="title" value="<?php echo $minutes_item['title'] ?>">
      <p>概要</p>
      <textarea name="summary"><?php echo $minutes_item['summary'] ?></textarea>
      <p>内容</p>
      <textarea name="content"><?php echo $minutes_item['content'] ?></textarea>
      <p><input type="submit" value="保存"></p>
    </form>
    <p><a href="/minute/show/<?php echo $minutes_item['id'] ?>">キャンセル</a></p>
  <?php endforeach; ?>
</body>
</html>