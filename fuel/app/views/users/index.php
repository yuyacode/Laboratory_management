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
</head>
<body>
  <p>マイページ</p>
  <?php foreach ($user_info_list as $user_info_item) : ?>
    <?php $_SESSION['id'] = $user_info_item['id']; ?>
    <p><a href="/user/edit_page/<?php echo $_SESSION['id']; ?>">編集</a></p>
    <p><a href="/user/delete/<?php echo $_SESSION['id']; ?>">削除</a></p>
    <p><?php echo $user_info_item['username']; ?></p>
    <?php if (isset($user_info_item['university']) && $user_info_item['university'] !== "") : ?>
      <p><?php echo $user_info_item['university']; ?>大学</p>
    <?php endif; ?>
    <?php if (isset($user_info_item['faculty']) && $user_info_item['university'] !== "") : ?>
      <p><?php echo $user_info_item['faculty']; ?>学部</p>
    <?php endif; ?>
    <?php if (isset($user_info_item['department']) && $user_info_item['university'] !== "") : ?>
      <p><?php echo $user_info_item['department']; ?>学科</p>
    <?php endif; ?>
    <?php if (isset($user_info_item['laboratory']) && $user_info_item['university'] !== "") : ?>
      <p><?php echo $user_info_item['laboratory']; ?>研究室</p>
    <?php endif; ?>
    <?php if (isset($user_info_item['objective']) && $user_info_item['university'] !== "") : ?>
      <p>目標：<?php echo $user_info_item['objective']; ?></p>
    <?php endif; ?>
    <p>登録日時：<?php echo $user_info_item['created_at']; ?></p>
  <?php endforeach; ?>
  <p><a href="/index/index/<?php echo $_SESSION['id']; ?>">TOPページへ</a></p>
</body>
</html>