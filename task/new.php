<?php

$screenMode = '1';

$errors = [];

$tasks = [
  'title' => '',
  'category' => '',
  'priority' => '低',
  'deadline' => '',
  'status' => '未着手',
  'description' => ''
];

include __DIR__. "/views/new.php";
