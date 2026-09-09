<!DOCTYPE html>
<html lang="ja">

<head>
  <link rel="stylesheet" href="/tmp/task/stylesheets/css/app.css">

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <title>タスクの一覧</title>
</head>
<body>
  <h1>タスクの一覧</h1>
  <a href="/tmp/task/new.php">タスクを登録する</a>

  <?php if(count($tasks) > 0) : ?>
    <?php foreach($tasks as $task) : ?>
      <section>
        <h4><a href="/tmp/task/selectIndex.php?id=<?php echo urlencode($task['id']); ?>"><?php echo escape($task['title']); ?></a></h4>
        <div>カテゴリ：<?php echo escape($task['category']); ?></div>
        <div>優先度：
          <?php if($task['priority'] === '高') : ?>
            <?php echo '★★★'; ?>
          <?php elseif($task['priority'] === '中') : ?>
            <?php echo '★★'; ?>
          <?php elseif($task['priority'] === '低') : ?>
            <?php echo '★'; ?>
          <?php endif; ?>
          <?php echo escape($task['priority']); ?>
        </div>
        <div>締切：<?php echo escape($task['deadline']); ?></div>
        <div>状況：<?php echo escape($task['status']); ?></div>
        <div><?php echo escape($task['description']); ?></div>
      </section>
    <?php endforeach; ?>
  <?php else : ?>
      <?php echo '登録されているタスクはありません'; ?>
  <?php endif; ?>


<!-- 更新処理 -->
<a href="/tmp/task/update.php">タスクを更新する</a>



</body>
</html>
