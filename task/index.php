
<?php
require_once __DIR__. '/lib/mysqli.php';
require_once __DIR__. '/lib/escape.php';

function taskList($link){
  $tasks = [];
  $sql = 'select id, title, category, priority, deadline, status, description from tasks';

  $results = mysqli_query($link, $sql);
  if(!$results) {
    echo 'データの取得に失敗しました。';
    echo 'エラー内容：'. mysqli_error($link);
  }

  while($task = mysqli_fetch_assoc($results)) {
    $tasks[] = $task;
  }

  return $tasks;
}

//データベースに接続する。
$link = dbConnect();
//一覧を取得する。
$tasks = taskList($link);
// データベースを切断する。
mysqli_close($link);

include __DIR__. '/views/index.php';
