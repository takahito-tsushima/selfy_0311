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
$stmt = $pdo->prepare('SELECT * FROM register02_torisetsu JOIN register00_photo USING(lid) where lid = :lid');
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$status = $stmt->execute();

//３．データ表示

$photo_on = '' or 
$forMyColleague01 = '' or 
$forMyColleague02 = '' or 
$forMyColleague03 = '' or 
$forMyColleague04 = '' or 
$forMyColleague05 = '' or 
$forMyColleague06 = '' or 
$forMyColleague07 = '' or 
$forMyColleague08 = '' or 
$forMyColleague09 = '' or 
$forMyColleague10 = '' or 
$forMyBoss01 = '' or 
$forMyBoss02 = '' or 
$forMyBoss03 = '' or 
$forMyBoss04 = '' or 
$forMyBoss05 = '' or 
$forMyBoss06 = '' or 
$forMyBoss07 = '' or 
$forMyBoss08 = '' or 
$forMyBoss09 = '' or 
$forMyBoss10 = '' or 
$forMyTeam01 = '' or 
$forMyTeam02 = '' or 
$forMyTeam03 = '' or 
$forMyTeam04 = '' or 
$forMyTeam05 = '' or 
$forMyTeam06 = '' or 
$forMyTeam07 = '' or 
$forMyTeam08 = '' or 
$forMyTeam09 = '' or 
$forMyTeam10 = '' ;


if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {  
        //GETデータ送信リンク作成
        
        $photo_on .= '<img src="./img/' . $result['photo_on'] . '" width="200">';
        $forMyColleague01 .= $result['forMyColleague01'];
        $forMyColleague02 .= $result['forMyColleague02'];
        $forMyColleague03 .= $result['forMyColleague03'];
        $forMyColleague04 .= $result['forMyColleague04'];
        $forMyColleague05 .= $result['forMyColleague05'];
        $forMyColleague06 .= $result['forMyColleague06'];
        $forMyColleague07 .= $result['forMyColleague07'];
        $forMyColleague08 .= $result['forMyColleague08'];
        $forMyColleague09 .= $result['forMyColleague09'];
        $forMyColleague10 .= $result['forMyColleague10'];
        $forMyBoss01 .= $result['forMyBoss01'];
        $forMyBoss02 .= $result['forMyBoss02'];
        $forMyBoss03 .= $result['forMyBoss03'];
        $forMyBoss04 .= $result['forMyBoss04'];
        $forMyBoss05 .= $result['forMyBoss05'];
        $forMyBoss06 .= $result['forMyBoss06'];
        $forMyBoss07 .= $result['forMyBoss07'];
        $forMyBoss08 .= $result['forMyBoss08'];
        $forMyBoss09 .= $result['forMyBoss09'];
        $forMyBoss10 .= $result['forMyBoss10'];
        $forMyTeam01 .= $result['forMyTeam01'];
        $forMyTeam02 .= $result['forMyTeam02'];
        $forMyTeam03 .= $result['forMyTeam03'];
        $forMyTeam04 .= $result['forMyTeam04'];
        $forMyTeam05 .= $result['forMyTeam05'];
        $forMyTeam06 .= $result['forMyTeam06'];
        $forMyTeam07 .= $result['forMyTeam07'];
        $forMyTeam08 .= $result['forMyTeam08'];
        $forMyTeam09 .= $result['forMyTeam09'];
        $forMyTeam10 .= $result['forMyTeam10'];
                

    }
}
?>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>私のトリセツ / My Manual</title>
</head>

<body>
    <div><?= $photo_on ?></div>

    <div><h2>私のトリセツ / My Manual</h2></div>
    <div><h3>私を 伝える10の質問 / 10 Magic Questions!</h3></div>
 
    <div><h3>■チームの皆さんへ / for My Colleague</h3></div>
    <div>Q1. 初対面は？</div>
    <div>A1. <?= $forMyColleague01 ?></div>
    <div>Q2. 誰かに話しかけられるのは？</div>
    <div>A2. <?= $forMyColleague02 ?></div>
    <div>Q3. 自分から話しかけるのは？</div>
    <div>A3. <?= $forMyColleague03 ?></div>
    <div>Q4. 誰かに教わるのは？</div>
    <div>A4. <?= $forMyColleague04 ?></div>
    <div>Q5. 自分が教えるのは？</div>
    <div>A5. <?= $forMyColleague05 ?></div>
    <div>Q6. 自分が仕事で困ったら？</div>
    <div>A6. <?= $forMyColleague06 ?></div>
    <div>Q7. 誰かが仕事で困ったら？</div>
    <div>A7. <?= $forMyColleague07 ?></div>
    <div>Q8. ランチの誘いは？</div>
    <div>A8. <?= $forMyColleague08 ?></div>
    <div>Q9. 飲み会の誘いは？</div>
    <div>A9. <?= $forMyColleague09 ?></div>
    <div>Q10. プライベートの話は？</div>
    <div>A10. <?= $forMyColleague10 ?></div>

    <div><h3>■上司の方へ / for My Boss</h3></div>
    <div>Q1. 仕事の内容は？</div>
    <div>A1. <?= $forMyBoss01 ?></div>
    <div>Q2. 仕事のペースは？</div>
    <div>A2. <?= $forMyBoss02 ?></div>
    <div>Q3. 仕事の進め方は？</div>
    <div>A3. <?= $forMyBoss03 ?></div>
    <div>Q4. 指示の頻度は？</div>
    <div>A4. <?= $forMyBoss04 ?></div>
    <div>Q5. 指示の細かさは？</div>
    <div>A5. <?= $forMyBoss05 ?></div>
    <div>Q6. 指示の伝え方は？</div>
    <div>A6. <?= $forMyBoss06 ?></div>
    <div>Q7. 報告・連絡・相談は？</div>
    <div>A7. <?= $forMyBoss07 ?></div>
    <div>Q8. 困ったときには？</div>
    <div>A8. <?= $forMyBoss08 ?></div>
    <div>Q9. 誤りや失敗は？</div>
    <div>A9. <?= $forMyBoss09 ?></div>
    <div>Q10. 大きな成功は？</div>
    <div>A10. <?= $forMyBoss10 ?></div>

    <div><h3>■部下の皆さんへ / for My Team</h3></div>
    <div>Q1. 仕事の内容は？</div>
    <div>A1. <?= $forMyTeam01 ?></div>
    <div>Q2. 仕事のペースは？</div>
    <div>A2. <?= $forMyTeam02 ?></div>
    <div>Q3. 仕事の進め方は？</div>
    <div>A3. <?= $forMyTeam03 ?></div>
    <div>Q4. 報告や相談の頻度は？</div>
    <div>A4. <?= $forMyTeam04 ?></div>
    <div>Q5. 報告や相談の細かさは？</div>
    <div>A5. <?= $forMyTeam05 ?></div>
    <div>Q6. 報告や相談の伝え方は？</div>
    <div>A6. <?= $forMyTeam06 ?></div>
    <div>Q7. 業務の指示は？</div>
    <div>A7. <?= $forMyTeam07 ?></div>
    <div>Q8. 困ったときには？</div>
    <div>A8. <?= $forMyTeam08 ?></div>
    <div>Q9. 不安や不満は？</div>
    <div>A9. <?= $forMyTeam09 ?></div>
    <div>Q10. うれしいことは？</div>
    <div>A10.<?= $forMyTeam10 ?></div>

</body>

</html>