
<?php
require_once __DIR__. '/inputTv.php';
require_once __DIR__. '/outputTv.php';

// 制限はかけず、入力した値をそのまま出す。
// 制限をかける。
  $watchtvs = [];

while(true) {
  echo '選択してください。（1:テレビの登録、2:一日のテレビ視聴、9:終了）＞';
  $number = trim(fgets(STDIN));

  if($number === '1') {
    $watchtv = inputTv();
    var_export($watchtv);
  }elseif($number === '2') {
    outputTv($watchtv);
  }else{
    break;
  }
}
