
<?php
require_once __DIR__. '/lib/mysqli.php';
require_once __DIR__. '/lib/escape.php';

function filterTasks($link, $filterStatus) {
  $tasks = [];
  if($filterStatus === '未選択') {
    $sql = "select * from tasks where status <> ''";
  }else{
    $sql = "select * from tasks where status = '{$filterStatus}'";
  }

  $results = mysqli_query($link, $sql);

  if(!$results) {
    echo 'データの絞り込みに失敗しました。';
    echo 'エラー内容：'. mysqli_error($link);
  }

  while($filters = mysqli_fetch_assoc($results)){
    $tasks[] = $filters;
  }

  return $tasks;
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $filterStatus = $_POST['filter'];
  $link = dbConnect();
  $tasks = filterTasks($link, $filterStatus);
  mysqli_close($link);
  include __DIR__. "/views/index.php";
}
