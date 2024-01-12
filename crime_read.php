<?php 
ini_set('display_errors', 1); 
include('functions.php');



// $id = $_GET['id'];

// DB接続
// 各種項目設定
$pdo = connect_to_db();


// SQL作成&実行
$sql = 'SELECT * FROM about_fact';
// $sql_d = 'SELECT * FROM about_fact WHERE id=:id';

$stmt = $pdo->prepare($sql);
// $stmt_d = $pdo->prepare($sql_d);

// $stmt_d->bindValue(':id', $id, PDO::PARAM_STR);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
  // $status_d = $stmt_d->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
// $record = $stmt_d->fetchAll(PDO::FETCH_ASSOC);


// echo '<pre>';
// var_dump($result);
// echo '</pre>';

// $output = "";
// foreach ($result as $record) {
//   $output .= "
//     <tr>
//       <td>{$record["fact"]}</td>
//       <td>{$record["crime_name"]}</td>
//       <td>{$record["crime_date"]}</td>
//       <td>{$record["crime_time"]}</td>
//       <td>{$record["crime_place"]}</td>
//       <td>{$record["suspect_honseki"]}</td>
//       <td>{$record["suspect_address"]}</td>
//       <td>{$record["suspect_work"]}</td>
//       <td>{$record["suspect_name"]}</td>
//       <td>{$record["suspect_birthday"]}</td>
//       <td>{$record["victim_address"]}</td>
//       <td>{$record["victim_work"]}</td>
//       <td>{$record["victim_name"]}</td>
//       <td>{$record["victim_birthday"]}</td>
//     </tr>
//   ";
// }

// 空配列を定義
$section1Arr = []; // 一課事件(殺人, 暴行, 傷害, 器物損壊, 脅迫, 住居侵入, 強制わいせつ等)
$section2Arr = []; // 二課事件(詐欺, 横領, 薬物, 銃器, 暴力団等)
$section3Arr = []; // 三課事件(窃盗)

foreach($result as $item) {
  if($item["section"] == 1) {
    array_push($section1Arr, $item); // 一課事件の連想配列を作成
  } else if ($item["section"] == 2) {
    array_push($section2Arr, $item); // 二課事件の連想配列を作成
  } else {
    array_push($section3Arr, $item); // 三課事件の連想配列を作成    
  }
}
// echo '<pre>';
// print_r($section1Arr[0]['id']);
// echo '</pre>';

// echo '<pre>';
// var_dump($section2Arr);
// echo '</pre>';

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
      <header class="header">
              <button class="header_button">
                  <a href="index.php">トップ</a>
              </button>
              <button class="header_button">
                  <a href="crime_input.php">新規事件</a>
              </button>
              <button class="header_button active">
                  <a href="crime_read.php">事件一覧</a>
              </button>
              <button class="header_button">
                  <a href="crime_input.php">事件検索</a>
              </button>
      </header>

      <div class="main_content">
        <section class="main_genre">
          <div class="main_genre_container">
            <ul class="main_genre_list">
              <li class="main_genre_item active">全体</li>
              <li class="main_genre_item" value="1">刑事第一課</li>
              <li class="main_genre_item" value="2">刑事第二課</li>
              <li class="main_genre_item" value="3">刑事第三課</li>
            </ul>
          </div>
        </section>

        <section class="title_section">
          <div class="title_wrapper">
            <ul class="title_list">
            <div class="title_content_item active">
                  <?php foreach($result as $item) : ?>
                  <li class="title_item">
                    <!-- <a href='crime_read.php?id=<?= $item["id"]?>'>表示する</a> -->
                    <p class="crime_date">発生日: <?= $item["crime_date"] ?></p>
                    <p class="crime_time">発生時間: <?= $item["crime_time"] ?></p>
                    <p class="crime_name">罪名: <span class="crime_name_whole"><?= $item["crime_name"] ?></span></p>
                    <p class="crime_place">発生場所: <?= $item["crime_place"] ?></p>
                    <a href='crime_edit.php?id=<?= $item["id"]?>' class="edit_button">編集管理</a>
                    <a href="crime_paper.php?id=<?= $item["id"]?>" class="paper_button">報告書</a>
                  </li>
                  <div class="accordion_content">
                    <p class="accordion_fact">
                      <label for="">事実:</label> 
                      <textarea name="" id="" cols="30" rows="10"><?= $item["fact"]?></textarea>
                    </p>
                    <div class="accordion_suspect_victim">
                      <div class="accordion_suspect">
                        <p>被疑者</p>
                        <label for="">本籍</label>
                        <input class="accordion_suspect_honseki" type="text" value=<?= $item["suspect_honseki"]?>>
                        <p>
                          <label for="">住居</label>
                          <input class="accordion_suspect_address" type="text" value=<?= $item["suspect_address"]?>>
                        </p>
                        <p>
                          <label for="">職業</label>
                          <input type="text" value=<?= $item["suspect_work"]?>>
                          <label for="">氏名</label>
                          <input type="text" value=<?= $item["suspect_name"]?>>
                          <label for="">生年月日</label>
                          <input type="text" value=<?= $item["suspect_birthday"]?>>
                        </p>
                      </div>
                      <div class="accordion_victim">
                        <p>被害者</p>
                        <p>
                          <label for="">住居</label>
                          <input class="accordion_victim_address" type="text" value=<?= $item["victim_address"]?>>
                        </p>
                        <p>
                          <label for="">職業</label>
                          <input type="text" value=<?= $item["victim_work"]?>>
                          <label for="">氏名</label>
                          <input type="text" value=<?= $item["victim_name"]?>>
                          <label for="">生年月日</label>
                          <input type="text" value=<?= $item["victim_birthday"]?>>
                        </p>
                      </div>
                    </div>
                  </div>
                  <?php endforeach; ?>
              </div>
              <div class="title_content_item">
                  <div class="list_content">
                  <a href="section1.php" style="color:black">さらに表示</a>
                  <?php foreach($section1Arr as $item1) : ?>
                      <li class="title_item">
                        <!-- <a href='crime_read.php?id=<?= $item1["id"]?>'>表示する</a> -->
                        <p>発生日: <?= $item1["crime_date"] ?></p>
                        <p class="crime_time">発生時間: <?= $item1["crime_time"] ?></p>
                        <p class="crime_name">罪名: <span class="crime_name_1"><?= $item1["crime_name"] ?></span></p>
                        <p class="crime_place">発生場所: <?= $item1["crime_place"] ?></p>
                        <a href='crime_edit.php?id=<?= $item1["id"]?>' class="edit_button">編集管理</a>
                        <a href="crime_paper.php?id=<?= $item1["id"]?>" class="paper_button">報告書</a>
                      </li>
                      <div class="accordion_content">
                        <p class="accordion_fact">
                          <label for="">事実:</label> 
                          <textarea name="" id="" cols="30" rows="10"><?= $item1["fact"]?></textarea>
                        </p>
                        <div class="accordion_suspect_victim">
                          <div class="accordion_suspect">
                            <p>被疑者</p>
                            <label for="">本籍</label>
                            <input class="accordion_suspect_honseki" type="text" value=<?= $item1["suspect_honseki"]?>>
                            <p>
                              <label for="">住居</label>
                              <input class="accordion_suspect_address" type="text" value=<?= $item1["suspect_address"]?>>
                            </p>
                            <p>
                              <label for="">職業</label>
                              <input type="text" value=<?= $item1["suspect_work"]?>>
                              <label for="">氏名</label>
                              <input type="text" value=<?= $item1["suspect_name"]?>>
                              <label for="">生年月日</label>
                              <input type="text" value=<?= $item1["suspect_birthday"]?>>
                            </p>
                          </div>
                          <div class="accordion_victim">
                            <p>被害者</p>
                            <p>
                              <label for="">住居</label>
                              <input class="accordion_victim_address" type="text" value=<?= $item1["victim_address"]?>>
                            </p>
                            <p>
                              <label for="">職業</label>
                              <input type="text" value=<?= $item1["victim_work"]?>>
                              <label for="">氏名</label>
                              <input type="text" value=<?= $item1["victim_name"]?>>
                              <label for="">生年月日</label>
                              <input type="text" value=<?= $item1["victim_birthday"]?>>
                            </p>
                          </div>
                        </div>
                      </div>
                      <?php endforeach; ?>
                    </div>                  
              </div>
              <div class="title_content_item">
                <a href="section2.php" style="color:black">さらに表示</a>
                  <?php foreach($section2Arr as $item2) : ?>
                  <li class="title_item">
                    <!-- <a href='crime_read.php?id=<?= $item2["id"]?>'>表示する</a> -->
                    <p>発生日: <?= $item2["crime_date"] ?></p>
                    <p class="crime_time">発生時間: <?= $item2["crime_time"] ?></p>
                    <p class="crime_name">罪名: <span class="crime_name_2"><?= $item2["crime_name"] ?></span></p>
                    <p class="crime_place">発生場所: <?= $item2["crime_place"] ?></p>
                    <a href='crime_edit.php?id=<?= $item2["id"]?>' class="edit_button">編集管理</a>
                  </li>
                  <div class="accordion_content">
                    <p class="accordion_fact">
                      <label for="">事実: </label> 
                      <textarea name="" id="" cols="30" rows="10"><?= $item2["fact"]?></textarea>
                    </p>
                    <div class="accordion_suspect_victim">
                      <div class="accordion_suspect">
                        <p>被疑者</p>
                        <label for="">本籍</label>
                        <input class="accordion_suspect_honseki" type="text" value=<?= $item2["suspect_honseki"]?>>
                        <p>
                          <label for="">住居</label>
                          <input class="accordion_suspect_address" type="text" value=<?= $item2["suspect_address"]?>>
                        </p>
                        <p>
                          <label for="">職業</label>
                          <input type="text" value=<?= $item2["suspect_work"]?>>
                          <label for="">氏名</label>
                          <input type="text" value=<?= $item2["suspect_name"]?>>
                          <label for="">生年月日</label>
                          <input type="text" value=<?= $item2["suspect_birthday"]?>>
                        </p>
                      </div>
                      <div class="accordion_victim">
                        <p>被害者</p>
                        <p>
                          <label for="">住居</label>
                          <input class="accordion_victim_address" type="text" value=<?= $item2["victim_address"]?>>
                        </p>
                        <p>
                          <label for="">職業</label>
                          <input type="text" value=<?= $item2["victim_work"]?>>
                          <label for="">氏名</label>
                          <input type="text" value=<?= $item2["victim_name"]?>>
                          <label for="">生年月日</label>
                          <input type="text" value=<?= $item2["victim_birthday"]?>>
                        </p>
                      </div>
                    </div>
                  </div>
                  <?php endforeach; ?>
              </div>
              <div class="title_content_item">
                <a href="section3.php" style="color:black">さらに表示</a>
                  <?php foreach($section3Arr as $item3) : ?>
                  <li class="title_item">
                    <!-- <a href='crime_read.php?id=<?= $item3["id"]?>'>表示する</a> -->
                    <p>発生日: <?= $item3["crime_date"] ?></p>
                    <p class="crime_time">発生時間: <?= $item3["crime_time"] ?></p>
                    <p class="crime_name">罪名: <span class="crime_name_3"><?= $item3["crime_name"] ?></span></p>
                    <p class="crime_place">発生場所: <?= $item3["crime_place"] ?></p>
                    <a href='crime_edit.php?id=<?= $item3["id"]?>' class="edit_button">編集管理</a>
                  </li>
                  <div class="accordion_content">
                    <p class="accordion_fact">
                      <label for="">事実: </label> 
                      <textarea name="" id="" cols="30" rows="10"><?= $item3["fact"]?></textarea>
                    </p>
                    <div class="accordion_suspect_victim">
                      <div class="accordion_suspect">
                        <p>被疑者</p>
                        <label for="">本籍</label>
                        <input class="accordion_suspect_honseki" type="text" value=<?= $item3["suspect_honseki"]?>>
                        <p>
                          <label for="">住居</label>
                          <input class="accordion_suspect_address" type="text" value=<?= $item3["suspect_address"]?>>
                        </p>
                        <p>
                          <label for="">職業</label>
                          <input type="text" value=<?= $item3["suspect_work"]?>>
                          <label for="">氏名</label>
                          <input type="text" value=<?= $item3["suspect_name"]?>>
                          <label for="">生年月日</label>
                          <input type="text" value=<?= $item3["suspect_birthday"]?>>
                        </p>
                      </div>
                      <div class="accordion_victim">
                        <p>被害者</p>
                        <p>
                          <label for="">住居</label>
                          <input class="accordion_victim_address" type="text" value=<?= $item3["victim_address"]?>>
                        </p>
                        <p>
                          <label for="">職業</label>
                          <input type="text" value=<?= $item3["victim_work"]?>>
                          <label for="">氏名</label>
                          <input type="text" value=<?= $item3["victim_name"]?>>
                          <label for="">生年月日</label>
                          <input type="text" value=<?= $item3["victim_birthday"]?>>
                        </p>
                      </div>
                    </div>
                  </div>
                  <?php endforeach; ?>
                </div>
            </ul>
          </div>
        </section>
    </div>

    <script src="./read.js"></script>
</body>
</html>