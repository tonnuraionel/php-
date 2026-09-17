<?php
require_once __DIR__. '/lib/mysqli.php';

$screenMode = '2';

function validate($tasks){
  $errors = [];

  //title
  if(!strlen($tasks['title'])) {
    $errors['title'] = 'タイトルに文字を入力してください。';
  }
  // category
  if(!strlen($tasks['category'])) {
    $errors['category'] = 'カテゴリに文字を入力してください。';
  }
  // deadline
  if(!strlen($tasks['deadline'])) {
    $errors['deadline'] = '締め切りに日付を入力してください。';
  }

  return $errors;
}

function updateTasks($link, $tasks, $indexId) {
  $getDate = date("Y/m/d H:i:s");
  $sql = <<<hiadoc1
    update tasks set
      title = "{$tasks['title']}",
      category = "{$tasks['category']}",
      priority = "{$tasks['priority']}",
      deadline = "{$tasks['deadline']}",
      status = "{$tasks['status']}",
      description = "{$tasks['description']}",
      updated_at = "{$getDate}"
    where id = "{$indexId}"
hiadoc1;

  $results = mysqli_query($link, $sql);

  if(!$results){
    echo 'データの更新に失敗しました。';
    echo 'エラー：'. mysqli_error($link);
  }
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
// formからのデータを変数に格納する。
  $tasks = [
    'title' => $_POST['title'],
    'category' => $_POST['category'],
    'priority' => $_POST['priority'],
    'deadline' => $_POST['deadline'],
    'status' => $_POST['status'],
    'description' => $_POST['description'],
  ];
  $indexId = $_POST['indexId'];

$link = dbConnect();
$errors = validate($tasks);

  if(count($errors) === 0){
    updateTasks($link, $tasks, $indexId);
    // DBを閉じる。
    mysqli_close($link);
    // indexに移動する。
    include __DIR__. "/index.php";
  }else{
    include __DIR__. "/views/new.php";
  }

}
