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
$stmt = $pdo->prepare('SELECT * FROM register04_truth JOIN register00_photo USING(lid) where lid = :lid');
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$status = $stmt->execute();

//３．データ表示

$photo_off = '' or 
$usual01 = '' or 
$usual02 = '' or 
$usual03 = '' or 
$usual04 = '' or 
$usual05 = '' or 
$usual06 = '' or 
$usual07 = '' or 
$usual08 = '' or 
$usual09 = '' or 
$usual10 = '' or 
$values01 = '' or 
$values02 = '' or 
$values03 = '' or 
$values04 = '' or 
$values05 = '' or 
$values06 = '' or 
$chara01 = '' or 
$chara02 = '' or 
$chara03 = '' or 
$phrase = '' or 
$ilike = '' or 
$dislike = '' or 
$complex = '' ;


if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {  
        //GETデータ送信リンク作成
        
        $photo_off .= '<img src="./img/' . $result['photo_off'] . '" width="200">';
        $usual01 .= $result['usual01'];
        $usual02 .= $result['usual02'];
        $usual03 .= $result['usual03'];
        $usual04 .= $result['usual04'];
        $usual05 .= $result['usual05'];
        $usual06 .= $result['usual06'];
        $usual07 .= $result['usual07'];
        $usual08 .= $result['usual08'];
        $usual09 .= $result['usual09'];
        $usual10 .= $result['usual10'];

        $values01 .= $result['values01'];
        $values02 .= $result['values02'];
        $values03 .= $result['values03'];
        $values04 .= $result['values04'];
        $values05 .= $result['values05'];
        $values06 .= $result['values06'];

        $chara01 .= $result['chara01'];
        $chara02 .= $result['chara02'];
        $chara03 .= $result['chara03'];

        $phrase .= $result['phrase'];
        $ilike .= $result['ilike'];
        $dislike .= $result['dislike'];
        $complex .= $result['complex'];
        

    }
}
?>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>私の素顔図鑑 / My Truth</title>
</head>

<body>
<div><?= $photo_off ?></div>

<div><h2>私の素顔図鑑 / My Truth</h2></div>

<div><h3>■私の日常 / My Usual</h3></div>
<div>あいさつ　・・・　<?= $usual01 ?></div>
<div>SNS　・・・　<?= $usual02 ?></div>
<div>LINE　・・・　<?= $usual03 ?></div>
<div>メール　・・・　<?= $usual04 ?></div>
<div>歩くスピード　・・・　<?= $usual05 ?></div>
<div>食べるスピード　・・・　<?= $usual06 ?></div>
<div>運動　・・・　<?= $usual07 ?></div>
<div>お酒　・・・　<?= $usual08 ?></div>
<div>喫煙　・・・　<?= $usual09 ?></div>
<div>ギャンブル　・・・　<?= $usual10 ?></div>

<div><h3>■私の価値観 / My Values</h3></div>
<div>仕事とは　・・・　<?= $values01 ?></div>
<div>家族とは　・・・　<?= $values02 ?></div>
<div>恋愛とは　・・・　<?= $values03 ?></div>
<div>結婚とは　・・・　<?= $values04 ?></div>
<div>友達とは　・・・　<?= $values05 ?></div>
<div>お金とは　・・・　<?= $values06 ?></div>

<div><h3>■私の性格（実は○○） / My Character</h3></div>
<div><?= $chara01 ?></div>
<div><?= $chara02 ?></div>
<div><?= $chara03 ?></div>

<div><h3>■私の自画像 / My Portrait</h3></div>
<div>自分の性格をひとことで！</div>
<div><?= $phrase ?></div>
<div>自分自身の好きな部分</div>
<div><?= $ilike ?></div>
<div>自分自身の嫌いな部分</div>
<div><?= $dislike ?></div>
<div>密かな悩みやコンプレックス</div>
<div><?= $complex ?></div>

</body>

</html>