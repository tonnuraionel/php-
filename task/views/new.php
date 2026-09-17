<!DOCTYPE html>
<html lang="ja">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <title>タスクの登録</title>
</head>
<body class="bg-light">
  <div class="container py-5">

<!-- エラーチェック -->
  <?php if(count($errors) > 0) : ?>
    <?php foreach($errors as $error) : ?>
      <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endforeach; ?>
  <?php endif; ?>

  <?php if($screenMode === '1') : ?>
    <h1 class="mb-4">タスクの登録</h1>
    <div class="card shadow-sm"><div class="card-body"><form action="/tmp/task/create.php" method="post">
      <div>
        <label class="form-label fw-bold" for="title">タスク名</label>
        <input class="form-control" type="text" id="title" name="title" value="<?php echo $tasks['title'] ?>">
      </div>
      <div>
        <label class="form-label fw-bold" for="category">カテゴリ</label>
        <input class="form-control" type="text" id="category" name="category"  value="<?php echo $tasks['category'] ?>">
      </div>
      <div>
        <label class="form-label fw-bold" for="priority">優先度</label>
        <div>
          <input class="form-check-input" type="radio" id="priority1" name="priority" value="低" <?php if($tasks['priority'] === '低') : ?>checked<?php endif; ?>>
          <label for="priority1">低</label>
        </div>

        <div>
          <input class="form-check-input" type="radio" id="priority2" name="priority" value="中" <?php if($tasks['priority'] === '中') : ?>checked<?php endif; ?>>
          <label for="priority2">中</label>
        </div>

        <div>
          <input class="form-check-input" type="radio" id="priority3" name="priority" value="高" <?php if($tasks['priority'] === '高') : ?>checked<?php endif; ?>>
          <label for="priority3">高</label>
        </div>
      </div>
      <div>
        <label class="form-label fw-bold" for="deadline">締切</label>
        <input class="form-control" type="date" id="deadline" name="deadline"  value="<?php echo $tasks['deadline'] ?>">
      </div>
      <div>
        <label class="form-label fw-bold" for="status">状況</label>
        <div>
          <input class="form-check-input" type="radio" id="status1" name="status" value="未着手" <?php if($tasks['status'] === '未着手') : ?>checked<?php endif; ?>>
          <label for="status1">未着手</label>
        </div>
        <div>
          <input class="form-check-input" type="radio" id="status2" name="status" value="進行中" <?php if($tasks['status'] === '進行中') : ?>checked<?php endif; ?>>
          <label for="status2">進行中</label>
        </div>
        <div>
          <input class="form-check-input" type="radio" id="status3" name="status" value="完了" <?php if($tasks['status'] === '完了') : ?>checked<?php endif; ?>>
          <label for="status3">完了</label>
        </div>
      </div>
      <div>
        <label class="form-label fw-bold" for="description">状況・メモ</label>
        <textarea class="form-control" id="description" name="description" rows="10" cols="40"><?php echo $tasks['description']; ?></textarea>
      </div>
      <div class="mt-4">
        <button class="btn btn-primary" type="submit">登録する</button>
      </div>
    </form>
    </form></div></div>
    <a class="btn btn-outline-secondary mt-3" href="/tmp/task/index.php">一覧に戻る</a>
  <?php elseif($screenMode === '2') : ?>
    <h1 class="mb-4">タスクの更新</h1>

    <div class="card shadow-sm"><div class="card-body"><form action="/tmp/task/update.php" method="post">
      <div>
        <label class="form-label fw-bold" for="title">タスク名</label>
        <input class="form-control" type="text" id="title" name="title" value="<?php echo $tasks['title'] ?>">
      </div>
      <div>
        <label class="form-label fw-bold" for="category">カテゴリ</label>
        <input class="form-control" type="text" id="category" name="category"  value="<?php echo $tasks['category'] ?>">
      </div>
      <div>
        <label class="form-label fw-bold" for="priority">優先度</label>
        <div>
          <input class="form-check-input" type="radio" id="priority1" name="priority" value="低" <?php if($tasks['priority'] === '低') : ?>checked<?php endif; ?>>
          <label for="priority1">低</label>
        </div>

        <div>
          <input class="form-check-input" type="radio" id="priority2" name="priority" value="中" <?php if($tasks['priority'] === '中') : ?>checked<?php endif; ?>>
          <label for="priority2">中</label>
        </div>

        <div>
          <input class="form-check-input" type="radio" id="priority3" name="priority" value="高" <?php if($tasks['priority'] === '高') : ?>checked<?php endif; ?>>
          <label for="priority3">高</label>
        </div>
      </div>
      <div>
        <label class="form-label fw-bold" for="deadline">締切</label>
        <input class="form-control" type="date" id="deadline" name="deadline"  value="<?php echo $tasks['deadline'] ?>">
      </div>
      <div>
        <label class="form-label fw-bold" for="status">状況</label>
        <div>
          <input class="form-check-input" type="radio" id="status1" name="status" value="未着手" <?php if($tasks['status'] === '未着手') : ?>checked<?php endif; ?>>
          <label for="status1">未着手</label>
        </div>
        <div>
          <input class="form-check-input" type="radio" id="status2" name="status" value="進行中" <?php if($tasks['status'] === '進行中') : ?>checked<?php endif; ?>>
          <label for="status2">進行中</label>
        </div>
        <div>
          <input class="form-check-input" type="radio" id="status3" name="status" value="完了" <?php if($tasks['status'] === '完了') : ?>checked<?php endif; ?>>
          <label for="status3">完了</label>
        </div>
      </div>
      <div>
        <label class="form-label fw-bold" for="description">状況・メモ</label>
        <textarea class="form-control" id="description" name="description" rows="10" cols="40"><?php echo $tasks['description']; ?></textarea>
      </div>

      <!-- selectIndexの$idをupdate.phpに渡す処理 -->
      <input type="hidden" name="indexId" value="<?php echo escape($tasks['id']); ?>">

      <div class="mt-4">
        <button class="btn btn-primary" type="submit">更新する</button>
      </div>
    </form></div></div>
  <?php elseif($screenMode === '3') : ?>
    <h1 class="mb-4">タスクの削除</h1>
    <div class="card shadow-sm"><div class="card-body"><form action="/tmp/task/delete.php" method="post">
      <input type="hidden" name="indexId" value="<?php echo escape($tasks['id']); ?>">
      <div class="mt-4">
        <button class="btn btn-primary" type="submit">削除する</button>
      </div>
    </form></div></div>
  <?php endif; ?>

  </div>
</body>
</html>
