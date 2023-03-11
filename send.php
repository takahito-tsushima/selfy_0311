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

//３．データ表示

$id = '' ;


if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {  
        //GETデータ送信リンク作成
        
        $id .= "accept.php?id=" . h($result['id']);
        

    }
}
?>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>送信する / Send</title>
</head>

<body>

    <div><h2>送信する / Send</h2></div>
    <div><p>以下のいずれかの方法で送信できます</p></div>

    <br>

    <div><h3>【　私のカードを送信　】</h3></div>
    <div><p>私のカードを作成してメール添付で送信する</p></div>
    <div>
    <a href="create_card.php">私のカードを作成する / Create My Card</a>
    </div>

    <br>
    <br>

    <div><h3>【　ORコード読取　】</h3></div>
    <div><p>送信相手のスマホカメラで読み取ってもらう</p></div>
    <div></div>

    <img src="https://chart.apis.google.com/chart?cht=qr&chs=250x250&chl='<?= $id ?>'">

    <br>
    <br>

    <div><h3>【　ドメイン送信　】</h3></div>
    <div><p>リンクをコピーしてメールなどで送る</p></div>

    <br>

    <div>
        <input type="text"  id="js_copy_url" name="copy_url" value="<?= $id ?>">
    </div>
    <button type="button" id="js_copybtn">コピー</button>





<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- JQuery -->


<script>

$(function() {
  $('#js_copybtn').on('click', function(){
    //　テキストエリアを選択
    $('#js_copy_url').select();
    // コピー
    document.execCommand('copy');
    alert('コピーされました。');
  });
});

</script>

    

</body>

</html>