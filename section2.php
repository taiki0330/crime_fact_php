<?php 
ini_set('display_errors', 1); 
include('functions.php');

// DB接続
// 各種項目設定
$pdo = connect_to_db();

// SQL作成&実行
$sql = 'SELECT * FROM about_fact WHERE section = 2';
$sqlOrderedAsc = 'SELECT * FROM about_fact WHERE section = 2 ORDER BY crime_date ASC ';
$sqlOrderedDesc = 'SELECT * FROM about_fact WHERE section = 2 ORDER BY crime_date DESC ';
$sqlTaima = 'SELECT * FROM about_fact WHERE crime_name = "大麻取締法" ';

$stmt = $pdo->prepare($sql);
$stmtOrderedAsc = $pdo->prepare($sqlOrderedAsc);
$stmtOrderedDesc = $pdo->prepare($sqlOrderedDesc);
$stmtTaima = $pdo->prepare($sqlTaima);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
    $status = $stmt->execute();
    $statusOrderedAsc = $stmtOrderedAsc->execute();
    $statusOrderedDesc = $stmtOrderedDesc->execute();
    $statusTaima = $stmtTaima->execute();
    // $status_d = $stmt_d->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}
  
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$resultOrdAsc = $stmtOrderedAsc->fetchAll(PDO::FETCH_ASSOC);
$resultOrdDesc = $stmtOrderedDesc->fetchAll(PDO::FETCH_ASSOC);
$resultTaima = $stmtTaima->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';
// var_dump($resultShogai);
// echo '</pre>';
$output = "";
foreach($result as $item) {
  $output .= "
  <li class='title_item'>
    <p class='crime_date'>発生日: {$item["crime_date"]}</p>
    <p class='crime_time'>発生時間: {$item["crime_time"]}</p>
    <p class='crime_name'>罪名: <span class='crime_name_2'>{$item["crime_name"]}</span></p>
    <p class='crime_place'>発生場所: {$item["crime_place"]}</p>
    <a href='crime_edit.php?id={$item["id"]}' class='edit_button'>編集管理</a>
    <a href='crime_paper.php?id={$item["id"]}' class='paper_button'>報告書</a>
  </li>
  <div class='accordion_content'>
  <p class='accordion_fact'>
      <label for=''>事実:</label> 
      <textarea name='' id='' cols='30' rows='10'>{$item["fact"]}</textarea>
  </p>
  <div class='accordion_suspect_victim'>
      <div class='accordion_suspect'>
          <p>被疑者</p>
          <label for=''>本籍</label>
          <input class='accordion_suspect_honseki' type='text' value={$item["suspect_honseki"]}>
          <p>
            <label for=''>住居</label>
            <input class='accordion_suspect_address' type='text' value={$item["suspect_address"]}>
          </p>
          <p>
            <label for=''>職業</label>
            <input type='text' value={$item["suspect_work"]}>
            <label for=''>氏名</label>
            <input type='text' value={$item["suspect_name"]}>
            <label for=''>生年月日</label>
            <input type='text' value={$item["suspect_birthday"]}>
          </p>
      </div>
      <div class='accordion_victim'>
          <p>被害者</p>
          <p>
              <label for=''>住居</label>
              <input class='accordion_victim_address' type='text' value={$item["victim_address"]}>
          </p>
          <p>
              <label for=''>職業</label>
              <input type='text' value={$item["victim_work"]}>
              <label for=''>氏名</label>
              <input type='text' value={$item["victim_name"]}>
              <label for=''>生年月日</label>
              <input type='text' value={$item["victim_birthday"]}>
          </p>
      </div>
  </div>
  </div>
  ";
}

$outputAsc = "";
foreach($resultOrdAsc as $item) {
  $outputAsc .= "
  <li class='title_item'>
    <p class='crime_date'>発生日: {$item["crime_date"]}</p>
    <p class='crime_time'>発生時間: {$item["crime_time"]}</p>
    <p class='crime_name'>罪名: <span class='crime_name_2'>{$item["crime_name"]}</span></p>
    <p class='crime_place'>発生場所: {$item["crime_place"]}</p>
    <a href='crime_edit.php?id={$item["id"]}' class='edit_button'>編集管理</a>
    <a href='crime_paper.php?id={$item["id"]}' class='paper_button'>報告書</a>
  </li>
  <div class='accordion_content'>
  <p class='accordion_fact'>
      <label for=''>事実:</label> 
      <textarea name='' id='' cols='30' rows='10'>{$item["fact"]}</textarea>
  </p>
  <div class='accordion_suspect_victim'>
      <div class='accordion_suspect'>
          <p>被疑者</p>
          <label for=''>本籍</label>
          <input class='accordion_suspect_honseki' type='text' value={$item["suspect_honseki"]}>
          <p>
            <label for=''>住居</label>
            <input class='accordion_suspect_address' type='text' value={$item["suspect_address"]}>
          </p>
          <p>
            <label for=''>職業</label>
            <input type='text' value={$item["suspect_work"]}>
            <label for=''>氏名</label>
            <input type='text' value={$item["suspect_name"]}>
            <label for=''>生年月日</label>
            <input type='text' value={$item["suspect_birthday"]}>
          </p>
      </div>
      <div class='accordion_victim'>
          <p>被害者</p>
          <p>
              <label for=''>住居</label>
              <input class='accordion_victim_address' type='text' value={$item["victim_address"]}>
          </p>
          <p>
              <label for=''>職業</label>
              <input type='text' value={$item["victim_work"]}>
              <label for=''>氏名</label>
              <input type='text' value={$item["victim_name"]}>
              <label for=''>生年月日</label>
              <input type='text' value={$item["victim_birthday"]}>
          </p>
      </div>
  </div>
  </div>
  ";
}

$outputDesc = "";
foreach($resultOrdDesc as $item) {
  $outputDesc .= "
  <li class='title_item'>
    <p class='crime_date'>発生日: {$item["crime_date"]}</p>
    <p class='crime_time'>発生時間: {$item["crime_time"]}</p>
    <p class='crime_name'>罪名: <span class='crime_name_2'>{$item["crime_name"]}</span></p>
    <p class='crime_place'>発生場所: {$item["crime_place"]}</p>
    <a href='crime_edit.php?id={$item["id"]}' class='edit_button'>編集管理</a>
    <a href='crime_paper.php?id={$item["id"]}' class='paper_button'>報告書</a>
  </li>
  <div class='accordion_content'>
  <p class='accordion_fact'>
      <label for=''>事実:</label> 
      <textarea name='' id='' cols='30' rows='10'>{$item["fact"]}</textarea>
  </p>
  <div class='accordion_suspect_victim'>
      <div class='accordion_suspect'>
          <p>被疑者</p>
          <label for=''>本籍</label>
          <input class='accordion_suspect_honseki' type='text' value={$item["suspect_honseki"]}>
          <p>
            <label for=''>住居</label>
            <input class='accordion_suspect_address' type='text' value={$item["suspect_address"]}>
          </p>
          <p>
            <label for=''>職業</label>
            <input type='text' value={$item["suspect_work"]}>
            <label for=''>氏名</label>
            <input type='text' value={$item["suspect_name"]}>
            <label for=''>生年月日</label>
            <input type='text' value={$item["suspect_birthday"]}>
          </p>
      </div>
      <div class='accordion_victim'>
          <p>被害者</p>
          <p>
              <label for=''>住居</label>
              <input class='accordion_victim_address' type='text' value={$item["victim_address"]}>
          </p>
          <p>
              <label for=''>職業</label>
              <input type='text' value={$item["victim_work"]}>
              <label for=''>氏名</label>
              <input type='text' value={$item["victim_name"]}>
              <label for=''>生年月日</label>
              <input type='text' value={$item["victim_birthday"]}>
          </p>
      </div>
  </div>
  </div>
  ";
}
; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./section2.css">
  <title>二課事件</title>
</head>
<body>
<label for="order">発生日で並び替える</label>
<select name="order" id="order">
  <option value=""></option>
  <option value="昇順">昇順</option>
  <option value="降順">降順</option>
</select>
</input>
<section class="title_section">
  <div class="title_wrapper">
      <ul class="title_list">
          <div class="title_content_item active">
              <?= $output ?>
          </div>
          <div class="title_content_item">
            <?= $outputAsc ?>
          </div>      
          <div class="title_content_item">
            <?= $outputDesc ?>
          </div>
      </ul>
  </div>
</section>

              <script>
                const titleItem = document.querySelectorAll('.title_content_item');
                const toggler = document.querySelectorAll('.title_item');
                const order = document.querySelector('#order');

                // アコーディオントグル
                toggler.forEach((selected) => {
                  selected.addEventListener('click', () => {
                    selected.classList.toggle('show');
                    let content = selected.nextElementSibling;
                    content.classList.toggle('show');
                  });
                });



                order.addEventListener('input', () => {
                    const selected = order.value;
                    console.log(selected);

                    if(selected == '') {
                      titleItem[0].classList.add('active');
                      titleItem[1].classList.remove('active');
                      titleItem[2].classList.remove('active');
                    } else if(selected == '昇順') {
                      titleItem[0].classList.remove('active');
                      titleItem[1].classList.add('active');
                      titleItem[2].classList.remove('active');
                    } else {
                      titleItem[0].classList.remove('active');
                      titleItem[1].classList.remove('active');
                      titleItem[2].classList.add('active');
                    }
                })


              </script>
</body>
</html>