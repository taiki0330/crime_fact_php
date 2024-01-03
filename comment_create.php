<?php 
// POSTデータ確認
if (
    !isset($_POST['username']) || $_POST['username'] === '' ||
    !isset($_POST['comment']) || $_POST['comment'] === '' 
) {
    // exit('ParamError');
}
$username = $_POST['username'];
$comment = $_POST['comment'];

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
$sql = 'INSERT INTO comment_table (id, username, comment, postdate) VALUES (NULL, :username, :comment, now())';

$stmt = $pdo->prepare($sql);

// バインド変数を設定
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header('Location: crime_input.php');
exit();

