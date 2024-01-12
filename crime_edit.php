<?php 
ini_set('display_errors', 1);
include('functions.php');

// var_dump($_GET);

// id受け取り
$id = $_GET['id'];  
// echo '<pre>';
// var_dump($id);
// echo '</pre>';

// DB接続
// 各種項目設定
$pdo = connect_to_db();


// SQL作成&実行
$sql = 'SELECT * FROM about_fact WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);



// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$record = $stmt->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';
// print_r($record);
// echo '</pre>';



; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./edit.css">
  <title>編集管理画面</title>
</head>
<body>
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
        <button class="back-button"><a href="crime_read.php">戻る</a></button>
      <form action="crime_update.php" method="POST">
                <section class="about_fact">
                    <div class="fact_content">
                        <!-- 犯罪事実入力 -->        
                        <label for="fact">事実</label>
                        <textarea name="fact" id="fact" cols="17" rows="4"><?= $record[0]["fact"]?></textarea>
                    </div>
                    <div class="fact_des">
                        <!-- 罪名入力 -->
                        <div class="crime_name_content">
                            <label for="crime_name">罪名</label>
                            <input type="text" name="crime_name" id="crime_name" value="<?= $record[0]["crime_name"] ?>">
                            <div class="section_select">
                              <span>刑事第</span>
                              <input type="text" name="section" value="<?= $record[0]["section"] ?>">
                              <span>課</span>
                            </div>
                        </div>
                        <!-- 犯罪日時 -->
                        <div class="crime_date_time">
                            <label for="crime_date">発生日</label><input type="date" name="crime_date" id="crime_date" value="<?= $record[0]["crime_date"] ?>">
                            <label for="crime_time">発生時間</label><input type="time" name="crime_time" id="crime_time" value="<?= $record[0]["crime_time"] ?>">
                        </div>
                        <!-- 犯罪場所 -->
                        <div class="crime_place_content">
                            <label for="crime_place">発生場所</label>
                            <input type="text" name="crime_place" id="crime_place" value="<?= $record[0]["crime_place"] ?>">
                        </div>
                    </div>
                </section>
                
                <!-- 被疑者人定 -->
                    <div class="suspect">
                        <h3 class="suspect_title">被疑者</h3>
                        <div class="suspect_honseki_field">
                            <label for="suspect_honseki">本籍</label><input type="text" name="suspect_honseki" id="suspect_honseki" class="suspect_honseki_input" value="<?= $record[0]["suspect_honseki"] ?>">
                        </div>
                        <div class="suspect_address_field">
                            <label for="suspect_address">住居</label><input type="text" name="suspect_address" id="suspect_address" class="suspect_address_input" value="<?= $record[0]["suspect_address"] ?>">
                        </div>
                        <div class="suspect_wnb_field">
                            <div class="suspect_work_field">
                                <label for="suspect_work">職業</label><input type="text" name="suspect_work" id="suspect_work" class="suspect_work_input" value="<?= $record[0]["suspect_work"] ?>">
                            </div>
                            <div class="suspect_name_field">
                                <label for="suspect_name">氏名</label><input type="text" name="suspect_name" id="suspect_name" class="suspect_name_input" value="<?= $record[0]["suspect_name"] ?>">
                            </div>
                            <div class="suspect_birthday_field">
                                <label for="suspect_birthday">生年月日</label><input type="text" name="suspect_birthday" id="suspect_birthday" class="suspect_birthday_input" value="<?= $record[0]["suspect_birthday"] ?>">
                            </div>
                        </div>
                    </div>
                <!-- 被疑者人定 -->
                    <div class="victim">
                        <h3 class="victim_title">被害者</h3>
                        <div class="victim_address_field">
                            <label for="victim_address">住居</label><input type="text" name="victim_address" id="victim_address" class="victim_address_input" value="<?= $record[0]["victim_address"] ?>">
                        </div>
                        <div class="victim_wnb_field">
                            <div class="victim_work_field">
                                <label for="victim_work">職業</label><input type="text" name="victim_work" id="victim_work" class="victim_work_input" value="<?= $record[0]["victim_work"] ?>">
                            </div>
                            <div class="victim_name_field">
                                <label for="victim_name">氏名</label><input type="text" name="victim_name" id="victim_name" class="victim_name_input" value="<?= $record[0]["victim_name"] ?>">
                            </div>
                            <div class="victim_birthday_field">
                                <label for="victim_birthday">生年月日</label><input type="text" name="victim_birthday" id="victim_birthday" class="victim_birthday_input" value="<?= $record[0]["victim_birthday"] ?>">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="id", value="<?= $record[0]["id"] ?>">
                <div class="button_section">
                  <div class="">
                      <button class="register_button">登録</button>
                  </div>
                  <div class="delete">
                    <button class="delete_button"><a href="crime_delete.php?id=<?= $record[0]["id"]?>">削除</a></button>
                  </div>
                </div>
            </form>
      </div>

      <script>
        const deleteButton = document.querySelector('.delete_button');
        deleteButton.addEventListener('click', () => {
          alert("本当に削除しますか。");
        })
      </script>
</body>
</html>