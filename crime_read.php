<?php 
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


// SQL作成&実行
$sql = 'SELECT * FROM about_fact';

$stmt = $pdo->prepare($sql);



// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);


// echo '<pre>';
// var_dump($result);
// echo '</pre>';

$output = "";
foreach ($result as $record) {
  $output .= "
    <tr>
      <td>{$record["fact"]}</td>
      <td>{$record["crime_name"]}</td>
      <td>{$record["crime_date"]}</td>
      <td>{$record["crime_time"]}</td>
      <td>{$record["crime_place"]}</td>
      <td>{$record["suspect_honseki"]}</td>
      <td>{$record["suspect_address"]}</td>
      <td>{$record["suspect_work"]}</td>
      <td>{$record["suspect_name"]}</td>
      <td>{$record["suspect_birthday"]}</td>
      <td>{$record["victim_address"]}</td>
      <td>{$record["victim_work"]}</td>
      <td>{$record["victim_name"]}</td>
      <td>{$record["victim_birthday"]}</td>
    </tr>
  ";
}




; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./read.css">
    <title>Document</title>
</head>
<body>
    <div class="inner">
      <section class="side_bar">
              <button class="sidebar_button">
                  <a href="index.php">トップ</a>
              </button>
              <button class="sidebar_button">
                  <a href="crime_input.php">新規事件</a>
              </button>
              <button class="sidebar_button">
                  <a href="crime_read.php">事件一覧</a>
              </button>
              <button class="sidebar_button">
                  <a href="crime_input.php">事件検索</a>
              </button>
      </section>
      <section class="main_content">
        <div class="crime_output">
          <div class="output_fact">
            <h4>犯罪事実</h4>
            <p class="fact_content"></p>
          </div>
          <div class="output_crime_name">
            <h4>罪名</h4>
            <p class="crime_name_content"></p>
          </div>
          <div class="output_crime_date">
            <h4>発生日</h4>
            <p class="crime_date_content"></p>
          </div>
          <div class="output_crime_time">
            <h4>発生時間</h4>
            <p class="crime_time_content"></p>
          </div>
          <div class="output_crime_place">
            <h4>発生場所</h4>
            <p class="crime_place_content"></p>
          </div>
          <div class="suspect_inner">
            <h3>被疑者</h3>
            <div class="output_suspect_honseki">
              <h4>本籍</h4>
              <p class="suspect_honseki_content"></p>
            </div>    
            <div class="output_suspect_address">
              <h4>住居</h4>
              <p class="suspect_address_content"></p>
            </div>
            <div class="suspect_wnb_inner">
              <div class="output_suspect_work">
                <h4>職業</h4>
                <p class="suspect_work_content"></p>
              </div>    
              <div class="output_suspect_name">
                <h4>氏名</h4>
                <p class="suspect_name_content"></p>
              </div>    
              <div class="output_suspect_birthday">
                <h4>生年月日</h4>
                <p class="suspect_birthday_content"></p>
              </div>
            </div>
          </div>
          <div class="victim_inner">
            <h3>被害者</h3>
            <div class="output_victim_address">
              <h4>住居</h4>
              <p class="victim_address_content"></p>
            </div>
            <div class="victim_wnb_inner">
              <div class="output_victim_work">
                <h4>職業</h4>
                <p class="victim_work_content"></p>
              </div>
              <div class="output_victim_name">
                <h4>氏名</h4>
                <p class="victim_name_content"></p>
              </div>
              <div class="output_victim_birthday">
                <h4>生年月日</h4>
                <p class="victim_birthday_content"></p>
              </div>
            </div>
          </div>
        </div>
      </section>  
    </div>
        <!-- <?= $output ?> -->
    <script>
      const resultArray = <?= json_encode($result)?>;
      console.log(resultArray);
      console.log(resultArray[0].crime_name);

      for (let i = 0; i < resultArray.length; i++) {
        document.querySelector('.fact_content').innerHTML = resultArray[i].fact;
        document.querySelector('.crime_name_content').innerHTML = resultArray[i].crime_name;
        document.querySelector('.crime_date_content').innerHTML = resultArray[i].crime_date;
        document.querySelector('.crime_time_content').innerHTML = resultArray[i].crime_time;
        document.querySelector('.crime_place_content').innerHTML = resultArray[i].crime_place;
        document.querySelector('.suspect_honseki_content').innerHTML = resultArray[i].suspect_honseki;
        document.querySelector('.suspect_address_content').innerHTML = resultArray[i].suspect_address;
        document.querySelector('.suspect_work_content').innerHTML = resultArray[i].suspect_work;
        document.querySelector('.suspect_name_content').innerHTML = resultArray[i].suspect_name;
        document.querySelector('.suspect_birthday_content').innerHTML = resultArray[i].suspect_birthday;
        document.querySelector('.victim_address_content').innerHTML = resultArray[i].victim_address;
        document.querySelector('.victim_work_content').innerHTML = resultArray[i].victim_work;
        document.querySelector('.victim_name_content').innerHTML = resultArray[i].victim_name;
        document.querySelector('.victim_birthday_content').innerHTML = resultArray[i].victim_birthday;
      }
    </script>
</body>
</html>