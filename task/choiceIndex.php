
<?php
if($_SERVER['REQUEST_METHOD'] === 'POST') {
// formからのデータを変数に格納する。
  $tasks = [
    'id' => $_POST['id'],
    'title' => $_POST['title'],
    'category' => $_POST['category'],
    'priority' => $_POST['priority'],
    'deadline' => $_POST['deadline'],
    'status' => $_POST['status'],
    'description' => $_POST['description']
  ];

  $screenMode = $_POST['screenMode'];
  $errors = [];

  include __DIR__. '/views/new.php';

}
