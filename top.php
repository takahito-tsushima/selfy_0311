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
$stmt = $pdo->prepare('SELECT * FROM record_exchange 
LEFT JOIN register00_photo ON record_exchange.object = register00_photo.lid 
LEFT JOIN register01_on ON record_exchange.object = register01_on.lid 
where record_exchange.lid = :lid ORDER BY record_exchange.date DESC'); //新着順に表示
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$status = $stmt->execute();

//３．データ表示

$view="";   

if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    for($i = 0; $i < 3; $i++){
        $result = $stmt->fetch();

        if(empty($result)){
            break;
        }else{
        $view .= $result['ex_date'];
        $view .= '<li><img src="./img/' . $result['photo_on'] . '" width="200">' . '<br>';
        $view .= '<h3>' . $result['catch_phrase_on'] . '</h3>';
        $view .= $result['name01j'] . '  ' . $result['name02j'] . '<br>';
        $view .= $result['name01e'] . '  ' . $result['name02e'] . '<br>';
        // $view .= '<a href="profile_detail.php?id=' . $result['id'] . '">開く</a>' . '  ';
        // $view .= '<a href="view00_photo.php">交換する</a>';
        $view .= '</li><br><br>';
    }
    }

}


//２．データ登録SQL作成

$stmt = $pdo->prepare('SELECT * FROM record_exchange where record_exchange.lid = :lid');
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$status = $stmt->execute();

//３．データ表示
if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {

        $result = $stmt->rowCount();
        $count = '<h3>■交換人数 / Exchange ： ' . $result . ' 名</h3><br>';

}


?>



<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>【 Selfy 】トップページ</title>
</head>
<body>


<h2>新たな関係 / New Rapport</h2>

<Ul><div><?= $count ?></div></Ul>
<Ul><div><?= $view ?></div></Ul>

<div>
<a href="profile_list.php"><h3>プロフィール一覧 / Profile List</h3></a>
</div>

<br>
<br>


<h2>私のプロフ / My Profile</h2>

<p>私の写真</p>
<a href="view00_photo.php">表示</a>
<a href="edit00_photo.php">作成・編集</a>

<p>オンの私 / ON</p>
<a href="view01_on.php">表示</a>
<a href="edit01_on.php">作成・編集</a>

<p>私のトリセツ</p>
<a href="view02_torisetsu.php">表示</a>
<a href="edit02_torisetsu.php">作成・編集</a>

<p>オフの私 / OFF</p>
<a href="view03_off.php">表示</a>
<a href="edit03_off.php">作成・編集</a>

<p>私の素顔図鑑</p>
<a href="view04_truth.php">表示</a>
<a href="edit04_truth.php">作成・編集</a>

<p>私のヒストリー</p>
<a href="view05_history.php">表示</a>
<a href="edit05_history.php">作成・編集</a>

<br>
<br>

<div>
<a href="send.php"><h3>送信する Send</h3></a>
</div>


<div>
<a href="logout_act.php">ログアウト</a>
</div>

</body>
</html>