
<?php
// データベースへの登録
require_once __DIR__ . '/lib/mysqli.php';

function createCompany($link, $company) {
  $sql =<<<aaa
    insert into companies (
      name,
      establishment,
      founder
    )values(
      "{$company['name']}",
      "{$company['establishment']}",
      "{$company['founder']}"
    )
aaa;

$results = mysqli_query($link, $sql);
  if(!$results) {

    error_log('ERROR: fail to create companies');
    error_log('ERROR CONTENT:'. mysqli_error($link));
  }
}

function validate($company) {
  $errors = [];

  // 会社名
  if(!strlen($company['name'])) {
    $errors['name'] = '会社名を入力してください。';
  }elseif(strlen($company['name']) > 255) {
    $errors['name'] = '会社名は255文字以内で入力してください。';
  }
  // 設立日
  if(!strlen($company['establishment'])) {
    $errors['establishment'] = '設立日を入力してください。';
  }
  // 代表者
  if(!strlen($company['founder'])) {
    $errors['founder'] = '代表者名を入力してください。';
  }elseif(strlen($company['founder']) > 255) {
    $errors['founder'] = '代表者名は255文字以内で入力してください。';
  }
  return $errors;
}

// 画面から入力した値を変数へ
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $company = [];

  $company = [
    'name' => $_POST['name'],
    'establishment' => $_POST['establishment'],
    'founder' => $_POST['founder']
  ];

//バリデーションする
$errors = validate($company);

  if(count($errors) === 0) {
    $link = dbConnect();
    //データベースに登録する。
    createCompany($link, $company);
    //データベースとの接続を切断する。
    mysqli_close($link);
    // ヘッダーを設定し自動で遷移する。
    header("Location: index.php");
  }
}

include __DIR__ . '/views/new.php';
