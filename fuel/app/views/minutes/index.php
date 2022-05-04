<!-- 議事録 一覧ページ -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>laboratory management</title>
</head>
<body>
  <p>議事録  一覧ページ</p>
  <p><a href="/minute/create">新規作成</a></p>
  <?php foreach ($minutes_list as $minutes_item) : ?>
    <p><a href="/minute/show/<?php echo $minutes_item['id'] ?>"><?php echo $minutes_item['title']; ?></a></p>
    <p><?php echo $minutes_item['summary']; ?></p>
    <p><?php echo $minutes_item['content']; ?></p>
    <p><?php echo $minutes_item['created_at']; ?></p>
    <p><?php echo $minutes_item['updated_at']; ?></p>
    <br>
  <?php endforeach; ?>
</body>
</html>