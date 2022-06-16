<!-- 課題 一覧ページ -->
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
      <div class="flex justify-between flex-a-center w80p mb30 mrauto mlauto">
        <p class="fz20">課題　一覧</p>
        <p class="fz16"><a href="/task/create">新規作成</a></p>
      </div>
      <button class="btn mb30 ml120" data-bind="click: tasksHandler">使い方</button>
      <div class="flex justify-between flex-a-center w80p mb30 mrauto mlauto">
        <?php if ($status == '完了') : ?>
          <p class="fz16">完了した課題</p>
          <p><a href="/task/index_yet/<?php echo $_SESSION['id']; ?>">未完了な課題</a></p>
        <?php else: ?>
          <p class="fz16">未完了な課題</p>
          <p><a href="/task/index_already/<?php echo $_SESSION['id']; ?>">完了した課題</a></p>
        <?php endif; ?>
      </div>
      <div class="w80p mrauto mlauto">
        <?php if (empty($tasks)) : ?>
          <?php if ($status == '完了') : ?>
            <p>完了した課題はありません。</p>
          <?php else: ?>
            <p>未完了な課題はありません。</p>
          <?php endif; ?>
        <?php else: ?>
          <?php foreach ($tasks as $task) : ?>
            <div class="task p20 mb30 border-black br5">
              <p class="fz16 mb15"><?php echo $task['title']; ?></p>
              <p class="mb15">提出期限：<?php echo $task['deadline']; ?></p>
              <?php if ($status == '完了') : ?>
                <p class="mb15">完了日：<?php echo $task['completion_date']; ?></p>
              <?php endif; ?>
              <p><a href="/task/show/<?php echo $task['id']; ?>">詳細</a></p>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </main>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.5.0/knockout-min.js"></script>
  <?php echo Asset::js('view-model-tasks.js'); ?>
</body>
</html>