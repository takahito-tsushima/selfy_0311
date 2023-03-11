<?php

// SESSION開始！！
session_start();
// 関数群の読み込み
require_once('funcs.php');
// // ログインチェック処理！
// loginCheck();

?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>【 Selfy 】アカウント作成</title>

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<h1>アカウント作成</h1>
    
<form method="POST" action="signup_act.php" name="sign_up">

    <section id="sign_up">

        <fieldset>

            <ul>
                <li>
                    ID:<input type="text" name="lid" />
                </li>
                <br>
                <li>
                    PW:<input type="password" name="lpw" />    
                </li>
            </ul>

            <a id="submit" onclick="document.sign_up.submit()">登録</a>


        </fieldset>
    </section>
    
</form>



   
    
<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- JQuery -->


<script></script>

</body>

</html>