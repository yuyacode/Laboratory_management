<!-- TOPページ -->
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
      <p class="fz20">Laboratory management</p>
      <p class="fz16"><a href="/user/index/<?php echo $_SESSION['id']; ?>">マイページ</a></p>
    </div>
    <div class="flex pt50 pb50 pr10vw pl10vw">
      <div class="minutes-wrapper w65p">
        <?php foreach ($minutes_list as $minutes_item) : ?>
          <div class="minutes w90p p20 mb30 border-black br5">
            <p class="fz20"><?php echo $minutes_item['title']; ?></p>
            <p class="tar">作成日：<?php echo $minutes_item['created_at']; ?></p>
            <p class="mb25 tar">更新日：<?php echo $minutes_item['updated_at']; ?></p>
            <p class="mb15"><?php echo $minutes_item['summary']; ?></p>
            <p class="tar"><a href="/minute/show/<?php echo $minutes_item['id']; ?>">詳細</a></p>
          </div>
        <?php endforeach; ?>
        <p class="pr5vw tar"><a href="/minute/index/<?php echo $_SESSION['id']; ?>">議事録　一覧ページ</a></p>
      </div>
      <div class="task-wrapper w35p">
        <p class="mb15"><a href="/task/index_yet/<?php echo $_SESSION['id']; ?>">課題　一覧ページ</a></p>
        <p class="mb25">１週間以内の課題</p>
        <?php if (empty($tasks)) : ?>
          <p>未完了な課題はありません。</p>
        <?php else: ?>
          <?php foreach ($tasks as $task) : ?>
            <div class="tasks mb25">
              <p class="fz16 mb5"><?php echo $task['title']; ?></p>
              <p class="mb5">提出期限：<?php echo $task['deadline']; ?></p>
              <p><a href="/task/show/<?php echo $task['id']; ?>">詳細</a></p>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </main>
</body>
</html>