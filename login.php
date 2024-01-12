<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./login.css">
    <title>ログインページ</title>
</head>
<body>
    <div class="login">
        <form action="login_act.php" method="POST" class="login_form">
            <div class="login_name">
                <label for="name">Name</label>
                <input id="name" type="text" class="login_name_input" name="username">
            </div>
            <div class="login_pass">
                <label for="password" class="">Password</label>
                <input id="password" type="text" class="login_pass_input" name="password">
            </div>
            <button>ログイン</button>
        </form>
    </div>
</body>
</html>