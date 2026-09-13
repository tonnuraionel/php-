
<?php
require_once __DIR__. "/lib/mysqli.php";

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

function createTasks($link, $tasks) {
  $getDate = date("Y/m/d H:i:s");
  $sql = <<<hiadoc1
    insert into tasks (
      title,
      category,
      priority,
      deadline,
      status,
      description,
      updated_at
    ) values (
      "{$tasks['title']}",
      "{$tasks['category']}",
      "{$tasks['priority']}",
      "{$tasks['deadline']}",
      "{$tasks['status']}",
      "{$tasks['description']}",
      "{$getDate}"
    )
hiadoc1;

  $results = mysqli_query($link, $sql);

// 動作確認用
//   if(!$results) {
//     echo 'データの登録に失敗しました。';
//     echo 'エラー内容：'. mysqli_error($link);
//   }
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
// formからのデータを変数に格納する。
  $tasks = [
    'title' => $_POST['title'],
    'category' => $_POST['category'],
    'priority' => $_POST['priority'],
    'deadline' => $_POST['deadline'],
    'status' => $_POST['status'],
    'description' => $_POST['description']
  ];

$link = dbConnect();
$errors = validate($tasks);

  if(count($errors) === 0){
    createTasks($link, $tasks);
    // DBを閉じる。
    mysqli_close($link);
    // indexに移動する。
    include __DIR__. "/index.php";
  }else{
    include __DIR__. "/views/new.php";
  }
}
