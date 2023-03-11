<?php

// SESSION開始！！
session_start();
// 関数群の読み込み
require_once('funcs.php');
// ログインチェック処理！
loginCheck();


$lid = $_SESSION['lid'];
$id = $_GET['id'];

// 関数ファイルでreturnで外に出した$pdoを使う
$pdo = db_conn();


//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM register01_on JOIN register00_photo USING(id) where id = :id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();


//３．データ表示
$photo_on = '' or 
$catch_phrase_on = '' or
$name_j = '' or 
$name_e = '' or
$object = '' ; 

if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {  
        //GETデータ送信リンク作成
        
        $photo_on .= '<img src="./img/' . $result['photo_on'] . '" width="200">';
        $catch_phrase_on .= $result['catch_phrase_on'];
        $name_j .= $result['name01j'] . '  ' . $result['name02j'];
        $name_e .= $result['name01e'] . '  ' . $result['name02e'];
        $object .= $result['lid'];        


    }
}
?>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>交換する / Exchange</title>

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    
<form method="POST" action="record_exchange02.php" id="record02" name="record02">

        <h2>プロフィールの開示</h2>

        <fieldset>
            <ul>
                <h3>相手のプロフィール</h3>
                <div><?= $photo_on ?></div>
                <div><h3><?= $catch_phrase_on ?></h3></div>
                <div><?= $name_j ?></div>
                <div><?= $name_e ?></div>

                <div><p>この人にあなたのプロフィールを開示しますか？</p></div>

                <input type="hidden" name="object" value="<?= $object ?>">
                <a id="submit">開示する</a>
            
            </ul>
        </fieldset>
    
</form>

   
    
<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- JQuery -->


<script>

// ボタンクリックでフォームを送信

$("#submit").click(function(){

$('#record02').submit();

});



</script>

</body>

</html>