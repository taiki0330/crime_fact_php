<?php 
ini_set('display_errors', 1);
include('functions.php');

// var_dump($_GET);
// exit();

// id受け取り
$id = $_GET['id'];  
// echo '<pre>';
// var_dump($id);
// echo '</pre>';

// DB接続
// 各種項目設定
$pdo = connect_to_db();

// SQL作成&実行
$sql = 'DELETE FROM comment_table WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
    $status = $stmt->execute();
  } catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
  }
  
  header("Location: crime_input.php");
  exit();