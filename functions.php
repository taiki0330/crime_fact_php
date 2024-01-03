<?php 

function connect_to_db() {
    $dbn ='mysql:dbname=incident_fact;charset=utf8mb4;port=3306;host=localhost';
    $user = 'root';
    $pwd = '';
    // DB接続
    try {
      return new PDO($dbn, $user, $pwd);
    } catch (PDOException $e) {
      echo json_encode(["db error" => "{$e->getMessage()}"]);
      exit();
    }
}

