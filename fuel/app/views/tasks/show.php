<!-- 課題 詳細ページ -->
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
  <p><a href="/index/index/<?php echo $_SESSION['id']; ?>">TOPページへ</a></p>
  <p><a href="/user/index/<?php echo $_SESSION['id']; ?>">マイページへ</a></p>
  <p>課題 詳細ページ</p>
  <?php foreach ($tasks as $task) : ?>
    <p><?php echo $task['title']; ?></p>
    <?php if (isset($task['completion_date'])) : ?>
      <p>完了</p>
    <?php else: ?>
      <p>未完了</p>
    <?php endif; ?>
    <p><a href="/task/edit/<?php echo $task['id'] ?>">編集</a></p>
    <p><a href="/task/delete/<?php echo $task['id'] ?>/<?php echo $_SESSION['id']; ?>">削除</a></p>
    <p>作成日：<?php echo $task['created_at']; ?></p>
    <p>更新日：<?php echo $task['updated_at']; ?></p>
    <p><?php echo $task['content']; ?></p>
    <p>提出日：<?php echo $task['deadline']; ?></p>
    <form action="/task/update_deadline/<?php echo $task['id'] ?>" method="POST">
      <input type="datetime-local" name="deadline">
      <p><input type="submit" value="提出日を変更する"></p>
    </form>
    <?php if (isset($task['completion_date'])) : ?>
      <p>完了日：<?php echo $task['completion_date']; ?></p>
    <?php else: ?>
      <form action="/task/update_completion_date/<?php echo $task['id'] ?>" method="POST">
        <input type="datetime-local" name="completion_date">
        <p><input type="submit" value="完了日を登録する"></p>
      </form>
    <?php endif; ?>
    <?php if (isset($task['completion_date'])) : ?>
      <p><a href="/task/index_already/<?php echo $_SESSION['id']; ?>">課題 一覧ページへ</a></p>
    <?php else: ?>
      <p><a href="/task/index_yet/<?php echo $_SESSION['id']; ?>">課題 一覧ページへ</a></p>
    <?php endif; ?>
  <?php endforeach; ?>
</body>
</html>