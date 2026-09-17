<!DOCTYPE html>
<html lang="ja">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <title>タスクの一覧</title>
</head>
<body class="bg-light">
  <div class="container py-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="mb-0">タスクの一覧</h1>
    <a class="btn btn-primary" href="/tmp/task/new.php">タスクを登録する</a>
  </div>

<!-- 絞り込み機能を追加する。 -->
  <form action="/tmp/task/filter.php" method="post">
    <select name="filter">
      <option value="未選択">全件</option>
      <option value="未着手">未着手</option>
      <option value="進行中">進行中</option>
      <option value="完了">完了</option>
    </select>
    <div>
      <button type="submit">絞り込む</button>
    </div>
  </form>
<!-- 絞り込み機能を追加する。 -->
  <?php if(count($tasks) > 0) : ?>
    <?php foreach($tasks as $task) : ?>
      <section class="card shadow-sm mb-3">
        <div class="card-body">
          <h4 class="card-title"><a class="text-decoration-none" href="/tmp/task/selectIndex.php?id=<?php echo urlencode($task['id']); ?>"><?php echo escape($task['title']); ?></a></h4>
          <div class="mb-1">カテゴリ：<?php echo escape($task['category']); ?></div>
          <div class="mb-1">優先度：<?php if($task['priority'] === '高') : ?><span class="badge text-bg-danger">高</span><?php elseif($task['priority'] === '中') : ?><span class="badge text-bg-warning">中</span><?php elseif($task['priority'] === '低') : ?><span class="badge text-bg-success">低</span><?php endif; ?> <?php echo escape($task['priority']); ?></div>
          <div class="mb-1">締切：<?php echo escape($task['deadline']); ?></div>
          <div class="mb-1">状況：<?php echo escape($task['status']); ?></div>
          <div class="text-muted"><?php echo escape($task['description']); ?></div>
        </div>
      </section>
    <?php endforeach; ?>
<!-- 絞り込み機能を追加する。 -->
  <?php elseif(count($tasks) === 0 && $filterStatus <> '') :?>
    <div class="alert alert-secondary"><?php echo $filterStatus; ?>のタスクは登録されていません。</div>
<!-- 絞り込み機能を追加する。 -->
  <?php else : ?>
    <div class="alert alert-secondary">登録されているタスクはありません</div>
  <?php endif; ?>

  </div>
</body>
</html>
