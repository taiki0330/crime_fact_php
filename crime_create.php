<?php 

// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';

// POSTデータ確認
if (
    !isset($_POST['fact']) || $_POST['fact'] === '' ||
    !isset($_POST['crime_name']) || $_POST['crime_name'] === '' ||
    !isset($_POST['crime_date']) || $_POST['crime_date'] === '' ||
    !isset($_POST['crime_time']) || $_POST['crime_time'] === '' ||
    !isset($_POST['crime_place']) || $_POST['crime_place'] === '' ||
    !isset($_POST['suspect_honseki']) || $_POST['suspect_honseki'] === '' ||
    !isset($_POST['suspect_address']) || $_POST['suspect_address'] === '' ||
    !isset($_POST['suspect_work']) || $_POST['suspect_work'] === '' ||
    !isset($_POST['suspect_name']) || $_POST['suspect_name'] === '' ||
    !isset($_POST['suspect_birthday']) || $_POST['suspect_birthday'] === '' ||
    !isset($_POST['victim_address']) || $_POST['victim_address'] === '' ||
    !isset($_POST['victim_work']) || $_POST['victim_work'] === '' ||
    !isset($_POST['victim_name']) || $_POST['victim_name'] === '' ||
    !isset($_POST['victim_birthday']) || $_POST['victim_birthday'] === ''
  ) {
    exit('ParamError');
  }

  $fact = $_POST['fact'];
  $crime_name = $_POST['crime_name'];
  $crime_date = $_POST['crime_date'];
  $crime_time = $_POST['crime_time'];
  $crime_place = $_POST['crime_place'];
  $suspect_honseki = $_POST['suspect_honseki'];
  $suspect_address = $_POST['suspect_address'];
  $suspect_work = $_POST['suspect_work'];
  $suspect_name = $_POST['suspect_name'];
  $suspect_birthday = $_POST['suspect_birthday'];
  $victim_address = $_POST['victim_address'];
  $victim_work = $_POST['victim_work'];
  $victim_name = $_POST['victim_name'];
  $victim_birthday = $_POST['victim_birthday'];


// DB接続
// 各種項目設定
$dbn ='mysql:dbname=incident_fact;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';
// DB接続
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}
// echo "DB成功";
// exit();


// SQL作成&実行
$sql = 'INSERT INTO about_fact (id, fact, crime_name, crime_date, crime_time, crime_place, 
                                suspect_honseki, suspect_address, suspect_work, suspect_name, suspect_birthday, 
                                victim_address, victim_work, victim_name, victim_birthday,
                                created_at, updated_at) 
                                VALUES (NULL, :fact, :crime_name, :crime_date, :crime_time, :crime_place, 
                                :suspect_honseki, :suspect_address, :suspect_work, :suspect_name, :suspect_birthday,
                                :victim_address, :victim_work, :victim_name, :victim_birthday,
                                now(), now()
                                )'; // 事実


$stmt = $pdo->prepare($sql);



// バインド変数を設定
$stmt->bindValue(':fact', $fact, PDO::PARAM_STR);
$stmt->bindValue(':crime_name', $crime_name, PDO::PARAM_STR);
$stmt->bindValue(':crime_date', $crime_date, PDO::PARAM_STR);
$stmt->bindValue(':crime_time', $crime_time, PDO::PARAM_STR);
$stmt->bindValue(':crime_place', $crime_place, PDO::PARAM_STR);
$stmt->bindValue(':suspect_honseki', $suspect_honseki, PDO::PARAM_STR);
$stmt->bindValue(':suspect_address', $suspect_address, PDO::PARAM_STR);
$stmt->bindValue(':suspect_work', $suspect_work, PDO::PARAM_STR);
$stmt->bindValue(':suspect_name', $suspect_name, PDO::PARAM_STR);
$stmt->bindValue(':suspect_birthday', $suspect_birthday, PDO::PARAM_STR);
$stmt->bindValue(':victim_address', $victim_address, PDO::PARAM_STR);
$stmt->bindValue(':victim_work', $victim_work, PDO::PARAM_STR);
$stmt->bindValue(':victim_name', $victim_name, PDO::PARAM_STR);
$stmt->bindValue(':victim_birthday', $victim_birthday, PDO::PARAM_STR);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

// 入力画面に戻る
header('Location: crime_read.php');
exit();




; ?>