<!-- マイページ -->
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
      <p class="fz16">マイページ</p>
    </div>
    <div class="pt50 pb50 pr15vw pl15vw">
      <p class="fz20">マイページ</p>
      <?php foreach ($user_info_list as $user_info_item) : ?>
        <?php $_SESSION['id'] = $user_info_item['id']; ?>
        <div class="flex justify-flex-end flex-a-center mb25">
          <p class="mr15"><a href="/user/edit_page/<?php echo $_SESSION['id']; ?>">編集</a></p>
          <p><a href="/user/delete/<?php echo $_SESSION['id']; ?>">退会</a></p>
        </div>
        <p class="fz20 mb15"><?php echo $user_info_item['username']; ?></p>
        <p class="mb15 tar">登録日時：<?php echo $user_info_item['created_at']; ?></p>
        <div class="flex flex-a-center mb25">
          <?php if (isset($user_info_item['university']) && $user_info_item['university'] !== "") : ?>
            <p class="fz16 mr15"><?php echo $user_info_item['university']; ?>大学</p>
          <?php endif; ?>
          <?php if (isset($user_info_item['faculty']) && $user_info_item['faculty'] !== "") : ?>
            <p class="fz16 mr15"><?php echo $user_info_item['faculty']; ?>学部</p>
          <?php endif; ?>
          <?php if (isset($user_info_item['department']) && $user_info_item['department'] !== "") : ?>
            <p class="fz16"><?php echo $user_info_item['department']; ?>学科</p>
          <?php endif; ?>
        </div>
        <?php if (isset($user_info_item['laboratory']) && $user_info_item['laboratory'] !== "") : ?>
          <p class="fz16 mb25"><?php echo $user_info_item['laboratory']; ?>研究室</p>
        <?php endif; ?>
        <?php if (isset($user_info_item['objective']) && $user_info_item['objective'] !== "") : ?>
          <p class="fz16 mb40">目標：<?php echo $user_info_item['objective']; ?></p>
        <?php endif; ?>
      <?php endforeach; ?>
      <p class="tar"><a href="/index/index/<?php echo $_SESSION['id']; ?>">TOPページへ</a></p>
    </div>
  </main>
</body>
</html>