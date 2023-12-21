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
$sql = 'SELECT * FROM comment_table';

$stmt = $pdo->prepare($sql);



// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./input.css">
    <title>Document</title>
</head>
<body>
    <div class="inner">
        <div class="side_bar">
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
        </div>
        <div class="main_content">
            <section class="comment">
                <div class="comment_field">
                    <form action="comment_create.php" method="POST" class="form">
                        <div class="input_username">
                            <label for="username">ユーザーネーム</label>
                            <input type="text" name="username">
                        </div>
                        <div class="input_comment">
                            <label for="comment">コメント</label>
                            <input type="text" name="comment">
                        </div> 
                        <button class="comment_button">コメントする</button>                       
                    </form>
                    <article class="article">
                        <div class="comment_wrapper">
                          <?php foreach($result as $item) : ?>
                            <div class="output_username">
                                <p>名前: <span class="output_username_content"><?php echo $item["username"]; ?></span></p>
                                <p>: <?php echo $item["postdate"]; ?></p>
                            </div>
                            <p class="output_comment"><?php echo $item["comment"]; ?></p>  
                          <?php endforeach; ?>                          
                        </div>
                    </article>
                </div>
            </section>
            <form action="crime_create.php" method="POST">
                <section class="about_fact">
                    <div class="fact_content">
                        <!-- 犯罪事実入力 -->        
                        <label for="fact">事実</label>
                        <textarea name="fact" id="fact" cols="17" rows="4"></textarea>
                    </div>
                    <div class="fact_des">
                        <!-- 罪名入力 -->
                        <div class="crime_name_content">
                            <label for="crime_name">罪名</label>
                            <input type="text" name="crime_name" id="crime_name">
                        </div>
                        <!-- 犯罪日時 -->
                        <div class="crime_date_time">
                            <label for="crime_date">発生日</label><input type="date" name="crime_date" id="crime_date">
                            <label for="crime_time">発生時間</label><input type="time" name="crime_time" id="crime_time">
                        </div>
                        <!-- 犯罪場所 -->
                        <div class="crime_place_content">
                            <label for="crime_place">発生場所</label>
                            <input type="text" name="crime_place" id="crime_place">
                        </div>
                    </div>
                </section>
                
                <!-- 被疑者人定 -->
                    <div class="suspect">
                        <h3 class="suspect_title">被疑者</h3>
                        <div class="suspect_honseki_field">
                            <label for="suspect_honseki">本籍</label><input type="text" name="suspect_honseki" id="suspect_honseki" class="suspect_honseki_input">
                        </div>
                        <div class="suspect_address_field">
                            <label for="suspect_address">住居</label><input type="text" name="suspect_address" id="suspect_address" class="suspect_address_input">
                        </div>
                        <div class="suspect_wnb_field">
                            <div class="suspect_work_field">
                                <label for="suspect_work">職業</label><input type="text" name="suspect_work" id="suspect_work" class="suspect_work_input">
                            </div>
                            <div class="suspect_name_field">
                                <label for="suspect_name">氏名</label><input type="text" name="suspect_name" id="suspect_name" class="suspect_name_input">
                            </div>
                            <div class="suspect_birthday_field">
                                <label for="suspect_birthday">生年月日</label><input type="text" name="suspect_birthday" id="suspect_birthday" class="suspect_birthday_input">
                            </div>
                        </div>
                    </div>
                <!-- 被疑者人定 -->
                    <div class="victim">
                        <h3 class="victim_title">被害者</h3>
                        <div class="victim_address_field">
                            <label for="victim_address">住居</label><input type="text" name="victim_address" id="victim_address" class="victim_address_input">
                        </div>
                        <div class="victim_wnb_field">
                            <div class="victim_work_field">
                                <label for="victim_work">職業</label><input type="text" name="victim_work" id="victim_work" class="victim_work_input">
                            </div>
                            <div class="victim_name_field">
                                <label for="victim_name">氏名</label><input type="text" name="victim_name" id="victim_name" class="victim_name_input">
                            </div>
                            <div class="victim_birthday_field">
                                <label for="victim_birthday">生年月日</label><input type="text" name="victim_birthday" id="victim_birthday" class="victim_birthday_input">
                            </div>
                        </div>
                    </div>
                <div class="">
                    <button>登録</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>