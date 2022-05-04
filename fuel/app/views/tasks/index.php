<!-- 課題 一覧ページ -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>laboratory management</title>
</head>
<body>
  <p>課題 一覧ページ</p>
  <p><a href="/task/create">新規作成</a></p>
  <?php if ($status == '完了') : ?>
    <p>完了</p>
    <p><a href="/task/index_yet">未完了</a></p>
  <?php else: ?>
    <p><a href="/task/index_already">完了</a></p>
    <p>未完了</p>
  <?php endif; ?>
  <?php if (empty($tasks)) : ?>
    <?php if ($status == '完了') : ?>
      <p>完了した課題はありません。</p>
    <?php else: ?>
      <p>未完了な課題はありません。</p>
    <?php endif; ?>
  <?php else: ?>
    <?php foreach ($tasks as $task) : ?>
      <p><?php echo $task['title']; ?></p>
      <p>提出期限：<?php echo $task['deadline']; ?></p>
      <?php if ($status == '完了') : ?>
        <p>完了日：<?php echo $task['completion_date']; ?></p>
      <?php endif; ?>
      <p><a href="/task/show/<?php echo $task['id'] ?>">詳細</a></p>
    <?php endforeach; ?>
  <?php endif; ?>
</body>
</html>