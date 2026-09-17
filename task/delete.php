
<?php
require_once __DIR__. '/lib/mysqli.php';

function deleteTasks($link, $indexId) {
  $sql = "delete from tasks where id = {$indexId}";
  $results = mysqli_query($link, $sql);

  if(!$results) {
    echo 'データの削除に失敗しました。';
    echo 'エラー内容：'. mysqli_error($link);
  }
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $indexId = $_POST['indexId'];

  $link = dbConnect();
  deleteTasks($link, $indexId);
  mysqli_close($link);
  include __DIR__. "/index.php";
}
