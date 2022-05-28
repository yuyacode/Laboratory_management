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
      <?php foreach ($tasks as $task) : ?>
        <p class="fz20 mb15"><?php echo $task['title']; ?></p>
        <?php if (isset($task['completion_date'])) : ?>
          <p>(完了した課題)</p>
        <?php else: ?>
          <p>(未完了な課題)</p>
        <?php endif; ?>
        <p class="tar">作成日：<?php echo $task['created_at']; ?></p>
        <p class="mb15 tar">更新日：<?php echo $task['updated_at']; ?></p>
        <div class="flex justify-flex-end flex-a-center mb25">
          <p class="mr15"><a href="/task/edit/<?php echo $task['id']; ?>">編集</a></p>
          <p><a href="/task/delete/<?php echo $task['id']; ?>/<?php echo $_SESSION['id']; ?>">削除</a></p>
        </div>
        <p class="fz16 pb30 bb-black"><?php echo $task['content']; ?></p>
        <p class="fz16 pt30 mb15">提出日：<?php echo $task['deadline']; ?></p>
        <form action="/task/update_deadline/<?php echo $task['id']; ?>" method="POST" class="mb40">
          <input type="datetime-local" name="deadline" class="mb15">
          <p><input type="submit" value="提出日を変更する"></p>
        </form>
        <?php if (isset($task['completion_date'])) : ?>
          <p class="fz16">完了日：<?php echo $task['completion_date']; ?></p>
        <?php else: ?>
          <form action="/task/update_completion_date/<?php echo $task['id']; ?>" method="POST" class="mb40">
            <input type="datetime-local" name="completion_date" class="mb15">
            <p><input type="submit" value="完了日を登録する"></p>
          </form>
        <?php endif; ?>
        <?php if (isset($task['completion_date'])) : ?>
          <p class="tar"><a href="/task/index_already/<?php echo $_SESSION['id']; ?>">課題 一覧ページへ</a></p>
        <?php else: ?>
          <p class="tar"><a href="/task/index_yet/<?php echo $_SESSION['id']; ?>">課題 一覧ページへ</a></p>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </main>
</body>
</html>