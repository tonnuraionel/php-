
<?php

function inputTv() {
  echo 'チャンネル：';
  $channelName = trim(fgets(STDIN));
  echo '視聴分数：';
  $time = trim(fgets(STDIN));

  $watchtvs[] = [
    'channelName' => $channelName,
    'time' => $time
  ];

  return $watchtvs;
}
