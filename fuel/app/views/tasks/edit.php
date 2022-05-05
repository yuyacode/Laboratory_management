<!-- 課題 編集ページ -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>laboratory management</title>
</head>
<body>
  <p>課題 編集ページ</p>
  <?php foreach ($tasks as $task) : ?>
    <form action="/task/update/<?php echo $task['id'] ?>" method="POST">
      <p>課題名</p>
      <input type="text" name="title" value="<?php echo $task['title'] ?>">
      <p>課題内容</p>
      <textarea name="content"><?php echo $task['content'] ?></textarea>
      <p><input type="submit" value="保存"></p>
    </form>
    <p><a href="/task/show/<?php echo $task['id'] ?>">キャンセル</a></p>
  <?php endforeach; ?>
</body>
</html>