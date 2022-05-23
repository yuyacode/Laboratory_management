<!-- ユーザー情報 編集ページ -->
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
  <p>ユーザー情報 編集ページ</p>
  <?php foreach ($user_info_list as $user_info_item) : ?>
    <form action="/user/edit/<?php echo $_SESSION['id']; ?>" method="POST">
      <p>ユーザー名</p>
      <input type="text" name="username" value="<?php echo $user_info_item['username']; ?>">
      <p>パスワード</p>
      <input type="text" name="password" value="<?php echo $user_info_item['password']; ?>">
      <p>メールアドレス</p>
      <input type="text" name="email" value="<?php echo $user_info_item['email']; ?>">
      <p>大学</p>
      <input type="text" name="university" value="<?php echo $user_info_item['university']; ?>">
      <p>学部</p>
      <input type="text" name="faculty" value="<?php echo $user_info_item['faculty']; ?>">
      <p>学科</p>
      <input type="text" name="department" value="<?php echo $user_info_item['department']; ?>">
      <p>研究室</p>
      <input type="text" name="laboratory" value="<?php echo $user_info_item['laboratory']; ?>">
      <p>目標</p>
      <textarea name="objective"><?php echo $user_info_item['objective']; ?></textarea>
      <p><input type="submit" value="保存"></p>
    </form>
  <?php endforeach; ?>
</body>
</html>