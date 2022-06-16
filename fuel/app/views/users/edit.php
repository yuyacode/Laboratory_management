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
  <?php echo Asset::css('style.css'); ?>
  <?php echo Asset::css('main.css'); ?>
</head>
<body>
  <main class="pt0 pb0">
    <?php echo $header; ?>
    <div class="pt50 pb50 pr10vw pl10vw">
      <p class="fz20 mb30">編集</p>
      <?php foreach ($user_info_list as $user_info_item) : ?>
        <form action="/user/edit/<?php echo $_SESSION['id']; ?>" method="POST">
          <div class="form-item mb30">
            <p class="fz16 mb15">ユーザー名</p>
            <input type="text" name="username" value="<?php echo $user_info_item['username']; ?>" placeholder="15字以内">
          </div>
          <div class="form-item mb30">
            <p class="fz16 mb15">パスワード</p>
            <input type="text" name="password" value="<?php echo $user_info_item['password']; ?>" placeholder="8～16字">
          </div>
          <div class="form-item mb30">
            <p class="fz16 mb15">メールアドレス</p>
            <input type="text" name="email" value="<?php echo $user_info_item['email']; ?>">
          </div>
          <div class="form-item mb30">
            <p class="fz16 mb15">大学</p>
            <input type="text" name="university" value="<?php echo $user_info_item['university']; ?>" placeholder="20字以内">
          </div>
          <div class="form-item mb30">
            <p class="fz16 mb15">学部</p>
            <input type="text" name="faculty" value="<?php echo $user_info_item['faculty']; ?>" placeholder="20字以内">
          </div>
          <div class="form-item mb30">
            <p class="fz16 mb15">学科</p>
            <input type="text" name="department" value="<?php echo $user_info_item['department']; ?>" placeholder="20字以内">
          </div>
          <div class="form-item mb30">
            <p class="fz16 mb15">研究室</p>
            <input type="text" name="laboratory" value="<?php echo $user_info_item['laboratory']; ?>" placeholder="20字以内">
          </div>
          <div class="form-item mb30">
            <p class="fz16 mb15">目標</p>
            <textarea name="objective" class="h120 p10"><?php echo $user_info_item['objective']; ?></textarea>
          </div>
          <p class="mb30 tar"><input type="submit" value="保存" class="light-blue bgc-white h30 w50 border-gray submit"></p>
        </form>
        <p class="tar"><a href="/user/index/<?php echo $_SESSION['id']; ?>">キャンセル</a></p>
      <?php endforeach; ?>
    </div>
  </main>
</body>
</html>