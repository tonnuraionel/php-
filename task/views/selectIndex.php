<!DOCTYPE html>
<html lang="ja">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <title>タスクの詳細</title>
</head>
<body class="bg-light">
  <div class="container py-5">
  <h1 class="mb-4">タスクの詳細</h1>

  <section class="card shadow-sm mb-4">
    <div class="card-body">
    <h4 class="card-title mb-4"><?php echo escape($tasks['title']); ?></h4>
    <div class="mb-2">カテゴリ：<?php echo escape($tasks['category']); ?></div>
    <div class="mb-2">優先度：
      <?php if($tasks['priority'] === '高') : ?>
        <?php echo '★★★'; ?>
      <?php elseif($tasks['priority'] === '中') : ?>
        <?php echo '★★'; ?>
      <?php elseif($tasks['priority'] === '低') : ?>
        <?php echo '★'; ?>
      <?php endif; ?>
      <?php echo escape($tasks['priority']); ?>
    </div>
    <div class="mb-2">締切：<?php echo escape($tasks['deadline']); ?></div>
    <div class="mb-2">状況：<?php echo escape($tasks['status']); ?></div>
    <div class="mt-3 p-3 bg-light rounded"><?php echo escape($tasks['description']); ?></div>
    </div>
  </section>

  <form action="?" method="post" class="mb-0">
    <input type="hidden" name="id" value="<?php echo escape($tasks['id']); ?>">
    <input type="hidden" name="title" value="<?php echo escape($tasks['title']); ?>">
    <input type="hidden" name="category" value="<?php echo escape($tasks['category']); ?>">
    <input type="hidden" name="priority" value="<?php echo escape($tasks['priority']); ?>">
    <input type="hidden" name="deadline" value="<?php echo escape($tasks['deadline']); ?>">
    <input type="hidden" name="status" value="<?php echo escape($tasks['status']); ?>">
    <input type="hidden" name="description" value="<?php echo escape($tasks['description']); ?>">
    <div>
      <button class="btn btn-primary me-2 mb-2" type="submit" name="screenMode" value="2" formaction="/tmp/task/choiceIndex.php">[ 更新する ]</button>
    </div>
    <div>
      <button class="btn btn-danger me-2 mb-2" type="submit" name="screenMode" value="3" formaction="/tmp/task/choiceIndex.php">[ 削除する ]</button>
    </div>
    <div>
      <button class="btn btn-outline-secondary mb-2" type="submit" formaction="/tmp/task/index.php">[ 一覧に戻る ]</button>
    </div>
  </form>

  </div>
</body>
</html>
