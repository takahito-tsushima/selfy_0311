<?php

// SESSION開始！！
session_start();
// 関数群の読み込み
require_once('funcs.php');
// ログインチェック処理！
loginCheck();


$lid = $_SESSION['lid'];

// 関数ファイルでreturnで外に出した$pdoを使う
$pdo = db_conn();

    
//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM register05_history where lid = :lid');
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$status = $stmt->execute();


//データ登録処理後  ※コピペ
if ($status === false) {
    //*** function化する！******\
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
// データが取得できた場合の処理  1件のみなのでwhile文は不要
$result = $stmt->fetch();

};


?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>【 Selfy 】「私のヒストリー」の登録</title>

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<h1>「私のヒストリー」の登録</h1>
    
<form method="POST" action="update05_history.php" id="history" name="history">


    <section id="history_01">
        <h2>【1/1】私のヒストリー</h2>

        <fieldset>
            <ul>
                <h3>■私のヒストリー</h3>
                <p>（各200文字以内）</p>

                    <li><P>幼少期の思い出</P></li>
                    <li id="js_childhood"><input type="textarea" maxlength=200 id="js_childhood" name="childhood" value="<?= $result['childhood'] ?>"></li>
                    <li><P>学生時代の自分</P></li>
                    <li id="js_teenage"><input type="textarea" maxlength=200 id="js_teenage" name="teenage" value="<?= $result['teenage'] ?>"></li>
                    <li><P>初めて社会に出たとき</P></li>
                    <li id="js_new_grad"><input type="textarea" maxlength=200 id="js_new_grad" name="new_grad" value="<?= $result['new_grad'] ?>"></li>
                    <li><P>転職の経験</P></li>
                    <li id="js_job_change"><input type="textarea" maxlength=200 id="js_job_change" name="job_change" value="<?= $result['job_change'] ?>"></li>
                    <li><P>人生の転換点</P></li>
                    <li id="js_crossroads"><input type="textarea" maxlength=200 id="js_crossroads" name="crossroads" value="<?= $result['crossroads'] ?>"></li>
                    <li><P>将来の夢やビジョン</P></li>
                    <li id="js_vision"><input type="textarea" maxlength=200 id="js_vision" name="vision" value="<?= $result['vision'] ?>"></li>
                    

                <a id="submit">登録</a>
            
            </ul>
        </fieldset>
    </section>
    
</form>

   
    
<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- JQuery -->


<script>

// ボタンクリックでフォームを送信

$("#submit").click(function(){

$('#history').submit();

});



</script>

</body>

</html>