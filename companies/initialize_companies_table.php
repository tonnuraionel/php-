<?php

require_once __DIR__ . '/lib/mysqli.php';

function dropTable($link) {
  $dropSql = 'drop table if exists companies;';
  $results = mysqli_query($link, $dropSql);
  if($results) {
    echo 'テーブルの削除が完了しました。' .PHP_EOL;
  }else{
    echo 'テーブルの削除が失敗しました。' .PHP_EOL;
    echo 'エラー内容：'. mysqli_error($link) .PHP_EOL;
  }
}
//
function createTable($link) {
  $createSql =<<<EOT
    create table companies (
    id integer not null auto_increment primary key,
    name varchar(255),
    establishment date,
    founder varchar(255),
    created_at timestamp not null default current_timestamp
    ) default character set =utf8mb4;
EOT;

  $results = mysqli_query($link, $createSql);
  if($results) {
    echo 'テーブルの作成が完了しました。' .PHP_EOL;
  }else{
    echo 'テーブルの作成が失敗しました。' .PHP_EOL;
    echo 'エラー内容：'. mysqli_error($link) .PHP_EOL;
  }
}

$link = dbConnect();
dropTable($link);
createTable($link);

// 切断
mysqli_close($link);
echo 'データベースを切断しました。';
