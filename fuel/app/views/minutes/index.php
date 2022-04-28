<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>laboratory management</title>
</head>
<body>
  <?php foreach ($rows as $row) : ?>
    <p><?php echo $row['title']; ?></p>
    <p><?php echo $row['summary']; ?></p>
    <p><?php echo $row['content']; ?></p>
    <p><?php echo $row['created_at']; ?></p>
    <p><?php echo $row['updated_at']; ?></p>
    <br>
  <?php endforeach; ?>
</body>
</html>