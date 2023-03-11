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
$stmt = $pdo->prepare('SELECT * FROM register03_off JOIN register00_photo USING(lid) where lid = :lid');
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$status = $stmt->execute();

//３．データ表示

$photo_off = '' or 
$catch_phrase_off = '' or
$residence = '' or 
$family = '' or 
$hobby = '' or 
$time_weekday = '' or 
$time_weekend = '' or 
$facebook = '' or 
$instagram = '' or 
$twitter = '' or 
$holiday = '' or 
$interest = '' or 
$crazy = '' or 
$love = '' or 
$important = '' or 
$collection = '' or 
$expensive = '' or 
$respect = '' ;


if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {  
        //GETデータ送信リンク作成
        
        $photo_off .= '<img src="./img/' . $result['photo_off'] . '" width="200">';
        $catch_phrase_off .= $result['catch_phrase_off'];
        $residence .= $result['residence'];
        $family .= $result['family'];
        $hobby .= $result['hobby'];
        $time_weekday .= $result['time_weekday'];
        $time_weekend .= $result['time_weekend'];
        $facebook .= $result['facebook'];
        $instagram .= $result['instagram'];
        $twitter .= $result['twitter'];
        $holiday .= $result['holiday'];
        $interest .= $result['interest'];
        $crazy .= $result['crazy'];
        $love .= $result['love'];
        $important .= $result['important'];
        $collection .= $result['collection'];
        $expensive .= $result['expensive'];
        $respect .= $result['respect'];        
        

    }
}
?>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>オフの私 / OFF</title>
</head>

<body>
    <div><?= $photo_off ?></div>
    <div><h3><?= $catch_phrase_off ?></h3></div>
    <div>・居住エリア</div>
    <div><?= $residence ?></div>
    <div>・家族構成</div>
    <div><?= $family ?></div>
    <div>・趣味</div>
    <div><?= $hobby ?></div>
    <div>・睡眠時間（平日）</div>
    <div><?= $time_weekday ?></div>
    <div>・睡眠時間（週末）</div>
    <div><?= $time_weekend ?></div>
    <div>Facebook</div>
    <div><?= $facebook ?></div>
    <div>Instagram</div>
    <div><?= $instagram ?></div>
    <div>Twitter</div>
    <div><?= $twitter ?></div>

    <div><h3>■私のお気に入り / My Favorite</h3> </div>
    <div>休日の過ごし方</div>
    <div><?= $holiday ?></div>
    <div>興味関心のあること</div>
    <div><?= $interest ?></div>
    <div>ハマっているもの</div>
    <div><?= $crazy ?></div>
    <div>最近好きになったもの</div>
    <div><?= $love ?></div>
    <div>大切にしているもの</div>
    <div><?= $important ?></div>
    <div>自慢のコレクション</div>
    <div><?= $collection ?></div>
    <div>一番高価な買い物</div>
    <div><?= $expensive ?></div>
    <div>尊敬する人や憧れの人</div>
    <div><?= $respect ?></div>


</body>

</html>