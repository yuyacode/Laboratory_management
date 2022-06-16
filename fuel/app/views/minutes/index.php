<!-- 議事録 一覧ページ -->
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
        <p class="fz20">議事録　一覧</p>
        <p class="fz16"><a href="/minute/create">新規作成</a></p>
      </div>
      <button class="btn mb30 ml120" data-bind="click: minutesHandler">使い方</button>
      <?php foreach ($minutes_list as $minutes_item) : ?>
        <div class="minutes w80p p20 mb40 mrauto mlauto border-black br5">
          <p class="fz18 mb25"><?php echo $minutes_item['title']; ?></p>
          <p class="tar">作成日：<?php echo $minutes_item['created_at']; ?></p>
          <p class="mb25 tar">更新日：<?php echo $minutes_item['updated_at']; ?></p>
          <p class="mb15"><?php echo $minutes_item['summary']; ?></p>
          <p class="tar"><a href="/minute/show/<?php echo $minutes_item['id']; ?>">詳細</a></p>
        </div>
      <?php endforeach; ?>
    </div>
  </main>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.5.0/knockout-min.js"></script>
  <?php echo Asset::js('view-model-minutes.js'); ?>
</body>
</html>