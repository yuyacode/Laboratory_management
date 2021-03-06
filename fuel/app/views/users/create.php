<!-- 新規登録ページ -->
<?php echo $head; ?>
<body>
  <main class="pt0 pb0">
    <p class="fz20 pt25 pb25 pr4vw pl4vw shadow-black">Laboratory management</p>
    <div class="pt50 pb50 pr10vw pl10vw">
      <p class="fz20 mb30">新規登録</p>
      <form action="/user/create_user" method="POST">
        <div class="form-item mb30">
          <p class="fz16 mb15">ユーザー名</p>
          <input type="text" name="username" placeholder="15字以内">
        </div>
        <div class="form-item mb30">
          <p class="fz16 mb15">パスワード</p>
          <input type="text" name="password" placeholder="8～16字">
        </div>
        <div class="form-item mb30">
          <p class="fz16 mb15">メールアドレス</p>
          <input type="text" name="email">
        </div>
        <p class="w100 mb30 tar"><input type="submit" value="新規登録" class="light-blue bgc-white h40 border-gray submit"></p>
      </form>
      <p class="tac"><a href="/user/login_page">ログイン</a></p>
    </div>
  </main>
</body>
</html>