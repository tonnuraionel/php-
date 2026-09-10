<!DOCTYPE html>
<html lang="ja">

<head>
  <link rel="stylesheet" href="/tmp/task/stylesheets/css/app.css">

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <title>タスクの詳細</title>
</head>
<body>
  <h1>タスクの詳細</h1>

  <section>
    <h4><?php echo escape($tasks['title']); ?></h4>
    <div>カテゴリ：<?php echo escape($tasks['category']); ?></div>
    <div>優先度：
      <?php if($tasks['priority'] === '高') : ?>
        <?php echo '★★★'; ?>
      <?php elseif($tasks['priority'] === '中') : ?>
        <?php echo '★★'; ?>
      <?php elseif($tasks['priority'] === '低') : ?>
        <?php echo '★'; ?>
      <?php endif; ?>
      <?php echo escape($tasks['priority']); ?>
    </div>
    <div>締切：<?php echo escape($tasks['deadline']); ?></div>
    <div>状況：<?php echo escape($tasks['status']); ?></div>
    <div><?php echo escape($tasks['description']); ?></div>
  </section>

  <form action="?" method="post">
    <input type="hidden" name="id" value=<?php echo $tasks['id']; ?>>
    <input type="hidden" name="title" value=<?php echo $tasks['title']; ?>>
    <input type="hidden" name="category" value=<?php echo $tasks['category']; ?>>
    <input type="hidden" name="priority" value=<?php echo $tasks['priority']; ?>>
    <input type="hidden" name="deadline" value=<?php echo $tasks['deadline']; ?>>
    <input type="hidden" name="status" value=<?php echo $tasks['status']; ?>>
    <input type="hidden" name="description" value=<?php echo $tasks['description']; ?>>
    <div>
      <button type="submit" name="screenMode" value="2" formaction="/tmp/task/choiceIndex.php">[ 更新する ]</button>
    </div>
    <div>
      <button type="submit" name="screenMode" value="3" formaction="/tmp/task/choiceIndex.php">[ 削除する ]</button>
    </div>
    <div>
      <button type="submit" formaction="/tmp/task/index.php">[ 一覧に戻る ]</button>
    </div>
  </form>

</body>
</html>
