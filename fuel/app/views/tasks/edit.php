<!-- 課題 編集ページ -->
<?php echo $session; ?>
<?php echo $head; ?>
<body>
  <main class="pt0 pb0">
    <?php echo $header; ?>
    <div class="pt50 pb50 pr10vw pl10vw">
      <p class="fz20 mb30">編集</p>
      <?php foreach ($tasks as $task) : ?>
        <form action="/task/update/<?php echo $task['id']; ?>" method="POST">
          <div class="form-item mb30">
            <p class="fz16 mb15">課題名</p>
            <input type="text" name="title" value="<?php echo $task['title']; ?>" placeholder="50字以内">
          </div>
          <div class="form-item mb30">
            <p class="fz16 mb15">課題内容</p>
            <textarea name="content" class="h500 p10"><?php echo $task['content']; ?></textarea>
          </div>
          <p class="mb30 tar"><input type="submit" value="保存" class="light-blue bgc-white h30 w50 border-gray submit"></p>
        </form>
        <p class="tar"><a href="/task/show/<?php echo $task['id']; ?>">キャンセル</a></p>
      <?php endforeach; ?>
    </div>
  </main>
</body>
</html>