<?php
// 自動で読み込まないとenvファイルを使えない
require __DIR__ . '/../../../vendor/autoload.php';

function dbConnect() {


  // 環境変数を呼び出す
  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__. '/../../..');
  $dotenv->load();

  $hostName = $_ENV['DB_HOST'];
  $userName = $_ENV['DB_USER'];
  $pass = $_ENV['DB_PASS'];
  $dbName = $_ENV['DB_DATABASE'];


  $link = mysqli_connect($hostName, $userName, $pass, $dbName);

  if(!$link) {
    echo 'データベースに接続ができませんでした。';
    echo 'エラー内容；'. mysqli_connect_error($link);
    }

  return $link;
}
