<!DOCTYPE html>
<html lang="ja">

<head>
  <link rel="stylesheet" href="/tmp/task/stylesheets/css/app.css">

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <title>タスクの登録</title>
</head>
<body>

<!-- エラーチェック -->
  <?php if(count($errors) > 0) : ?>
    <?php foreach($errors as $error) : ?>
      <ul>
        <li><?php echo $error; ?></li>
      </ul>
    <?php endforeach; ?>
  <?php endif; ?>

  <?php if($screenMode === '1') : ?>
    <h1>タスクの登録</h1>
    <form action="/tmp/task/create.php" method="post">
      <div>
        <label for="title">タスク名</label>
        <input type="text" id="title" name="title" value="<?php echo $tasks['title'] ?>">
      </div>
      <div>
        <label for="category">カテゴリ</label>
        <input type="text" id="category" name="category"  value="<?php echo $tasks['category'] ?>">
      </div>
      <div>
        <label for="priority">優先度</label>
        <div>
          <input type="radio" id="priority1" name="priority" value="低" checked>
          <label for="priority1">低</label>
        </div>

        <div>
          <input type="radio" id="priority2" name="priority" value="中">
          <label for="priority2">中</label>
        </div>

        <div>
          <input type="radio" id="priority3" name="priority" value="高">
          <label for="priority3">高</label>
        </div>
      </div>
      <div>
        <label for="deadline">締切</label>
        <input type="date" id="deadline" name="deadline"  value="<?php echo $tasks['deadline'] ?>">
      </div>
      <div>
        <label for="status">状況</label>
        <div>
          <input type="radio" id="status1" name="status" value="未着手" checked>
          <label for="status1">未着手</label>
        </div>
        <div>
          <input type="radio" id="status2" name="status" value="進行中">
          <label for="status2">進行中</label>
        </div>
        <div>
          <input type="radio" id="status3" name="status" value="完了">
          <label for="status3">完了</label>
        </div>
      </div>
      <div>
        <label for="description">状況・メモ</label>
        <textarea id="description" name="description" rows="10" cols="40"><?php echo $tasks['description']; ?></textarea>
      </div>
      <div>
        <button type="submit">登録する</button>
      </div>
    </form>
  <?php elseif($screenMode === '2') : ?>
    <h1>タスクの更新</h1>

    <form action="/tmp/task/update.php" method="post">
      <div>
        <label for="title">タスク名</label>
        <input type="text" id="title" name="title" value="<?php echo $tasks['title'] ?>">
      </div>
      <div>
        <label for="category">カテゴリ</label>
        <input type="text" id="category" name="category"  value="<?php echo $tasks['category'] ?>">
      </div>
      <div>
        <label for="priority">優先度</label>
        <div>
          <input type="radio" id="priority1" name="priority" value="低" checked>
          <label for="priority1">低</label>
        </div>

        <div>
          <input type="radio" id="priority2" name="priority" value="中">
          <label for="priority2">中</label>
        </div>

        <div>
          <input type="radio" id="priority3" name="priority" value="高">
          <label for="priority3">高</label>
        </div>
      </div>
      <div>
        <label for="deadline">締切</label>
        <input type="date" id="deadline" name="deadline"  value="<?php echo $tasks['deadline'] ?>">
      </div>
      <div>
        <label for="status">状況</label>
        <div>
          <input type="radio" id="status1" name="status" value="未着手" checked>
          <label for="status1">未着手</label>
        </div>
        <div>
          <input type="radio" id="status2" name="status" value="進行中">
          <label for="status2">進行中</label>
        </div>
        <div>
          <input type="radio" id="status3" name="status" value="完了">
          <label for="status3">完了</label>
        </div>
      </div>
      <div>
        <label for="description">状況・メモ</label>
        <textarea id="description" name="description" rows="10" cols="40"><?php echo $tasks['description']; ?></textarea>
      </div>

      <!-- selectIndexの$idをupdate.phpに渡す処理 -->
      <input type="hidden" name="indexId" value=<?php echo $tasks['id']; ?>>

      <div>
        <button type="submit">更新する</button>
      </div>
    </form>
  <?php elseif($screenMode === '3') : ?>
    <h1>タスクの削除</h1>
    <form action="/tmp/task/delete.php" method="post">
      <input type="hidden" name="indexId" value=<?php echo $tasks['id']; ?>>
      <div>
        <button type="submit">削除する</button>
      </div>
    </form>
  <?php endif; ?>

</body>
</html>
