<!-- 議事録 詳細ページ -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>laboratory management</title>
</head>
<body>
  <p>議事録 詳細ページ</p>
  <?php foreach ($minutes_list as $minutes_item) : ?>
    <p><a href="/minute/edit/<?php echo $minutes_item['id'] ?>">編集</a></p>
    <p><a href="/minute/delete/<?php echo $minutes_item['id'] ?>">削除</a></p>
    <p><?php echo $minutes_item['title']; ?></p>
    <p><?php echo $minutes_item['summary']; ?></p>
    <p><?php echo $minutes_item['content']; ?></p>
    <p><?php echo $minutes_item['created_at']; ?></p>
    <p><?php echo $minutes_item['updated_at']; ?></p>
  <?php endforeach; ?>
  <p><a href="/minute">議事録 一覧ページへ</a></p>
</body>
</html>