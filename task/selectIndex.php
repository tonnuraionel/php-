<?php
require_once __DIR__. '/lib/mysqli.php';
require_once __DIR__. '/lib/escape.php';

$screenMode = '2';
$errors = [];

function getTask($link, $id){
  $tasks = [];
  $sql = "select * from tasks where id = {$id}";

  $results = mysqli_query($link, $sql);

  if(!$results) {
    echo 'データの取得に失敗しました。';
    echo 'エラー内容：'. mysqli_error($link);
  }

  $tasks = mysqli_fetch_assoc($results);

  return $tasks;
}


// htmlのaタグからgetでidを持ってくる
$id = $_GET['id'];
// データベースを接続する。
$link = dbConnect();
// $idをもとに対象のデータを持ってくる。
$tasks = getTask($link, $id);
// データベースを切断する。
mysqli_close($link);
// 持ってきたデータをnew.phpに反映させる。
include __DIR__.'/views/selectIndex.php';
