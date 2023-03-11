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
$stmt = $pdo->prepare('SELECT * FROM register02_torisetsu where lid = :lid');
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
    <title>【 Selfy 】「私のトリセツ」の登録</title>

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<h1>「私のトリセツ」の登録</h1>

<form method="POST" action="update02_torisetsu.php" id="torisetsu" name="torisetsu">

<section id="forMyColleague">
<h2>【1/3】チームの皆さんへ（すべて３択）</h2>

<fieldset>
    <ul>
        <li>    
        <p>1.初対面は？</p>
            <div>
                <input required type="radio" name="forMyColleague01" id="forMyColleague01_01" value="常に楽しみです！" <?php if ($result['forMyColleague01'] == "常に楽しみです！") echo 'checked'; ?>><label for="forMyColleague01_01">常に楽しみです！</label>
                <input required type="radio" name="forMyColleague01" id="forMyColleague01_02" value="実は緊張してます" <?php if ($result['forMyColleague01'] == "実は緊張してます") echo 'checked'; ?>><label for="forMyColleague01_02">実は緊張してます</label>
                <input required type="radio" name="forMyColleague01" id="forMyColleague01_03" value="できれば避けたい" <?php if ($result['forMyColleague01'] == "できれば避けたい") echo 'checked'; ?>><label for="forMyColleague01_03">できれば避けたい</label>
            </div>
        </li>
        <li>    
        <p>2.誰かに話しかけられるのは？</p>
            <div>
                <input required type="radio" name="forMyColleague02" id="forMyColleague02_01" value="いつでも話しかけてほしい！" <?php if ($result['forMyColleague02'] == "いつでも話しかけてほしい！") echo 'checked'; ?>><label for="forMyColleague02_01">いつでも話しかけてほしい！</label>
                <input required type="radio" name="forMyColleague02" id="forMyColleague02_02" value="様子を見つつ話しかけてほしい" <?php if ($result['forMyColleague02'] == "様子を見つつ話しかけてほしい") echo 'checked'; ?>><label for="forMyColleague02_02">様子を見つつ話しかけてほしい</label>
                <input required type="radio" name="forMyColleague02" id="forMyColleague02_03" value="あまり話しかけられたくない" <?php if ($result['forMyColleague02'] == "あまり話しかけられたくない") echo 'checked'; ?>><label for="forMyColleague02_03">あまり話しかけられたくない</label>
            </div>
        </li>
        <li>    
        <p>3.自分から話しかけるのは？</p>
            <div>
                <input required type="radio" name="forMyColleague03" id="forMyColleague03_01" value="いつでも話しかけたい！" <?php if ($result['forMyColleague03'] == "いつでも話しかけたい！") echo 'checked'; ?>><label for="forMyColleague03_01">いつでも話しかけたい！</label>
                <input required type="radio" name="forMyColleague03" id="forMyColleague03_02" value="様子を見つつ話しかけたい" <?php if ($result['forMyColleague03'] == "様子を見つつ話しかけたい") echo 'checked'; ?>><label for="forMyColleague03_02">様子を見つつ話しかけたい</label>
                <input required type="radio" name="forMyColleague03" id="forMyColleague03_03" value="あまり話しかけたくない" <?php if ($result['forMyColleague03'] == "あまり話しかけたくない") echo 'checked'; ?>><label for="forMyColleague03_03">あまり話しかけたくない</label>
            </div>
        </li>
        <li>    
        <p>4.誰かに教わるのは？</p>
            <div>
                <input required type="radio" name="forMyColleague04" id="forMyColleague04_01" value="先回りしてアドバイスされたい！" <?php if ($result['forMyColleague04'] == "先回りしてアドバイスされたい！") echo 'checked'; ?>><label for="forMyColleague04_01">先回りしてアドバイスされたい！</label>
                <input required type="radio" name="forMyColleague04" id="forMyColleague04_02" value="聞いた時には教えてほしい" <?php if ($result['forMyColleague04'] == "聞いた時には教えてほしい") echo 'checked'; ?>><label for="forMyColleague04_02">聞いた時には教えてほしい</label>
                <input required type="radio" name="forMyColleague04" id="forMyColleague04_03" value="なるべく自分で考えたい" <?php if ($result['forMyColleague04'] == "なるべく自分で考えたい") echo 'checked'; ?>><label for="forMyColleague04_03">なるべく自分で考えたい</label>
            </div>
        </li>
        <li>    
        <p>5.自分が教えるのは？</p>
            <div>
                <input required type="radio" name="forMyColleague05" id="forMyColleague05_01" value="あれこれ教えてあげたい！" <?php if ($result['forMyColleague05'] == "あれこれ教えてあげたい！") echo 'checked'; ?>><label for="forMyColleague05_01">あれこれ教えてあげたい！</label>
                <input required type="radio" name="forMyColleague05" id="forMyColleague05_02" value="聞かれれば教えたい" <?php if ($result['forMyColleague05'] == "聞かれれば教えたい") echo 'checked'; ?>><label for="forMyColleague05_02">聞かれれば教えたい</label>
                <input required type="radio" name="forMyColleague05" id="forMyColleague05_03" value="自分以外に聞いてほしい" <?php if ($result['forMyColleague05'] == "自分以外に聞いてほしい") echo 'checked'; ?>><label for="forMyColleague05_03">自分以外に聞いてほしい</label>
            </div>
        </li>
        <li>    
        <p>6.自分が仕事で困ったら？</p>
            <div>
                <input required type="radio" name="forMyColleague06" id="forMyColleague06_01" value="なるべく助けてほしい！" <?php if ($result['forMyColleague06'] == "なるべく助けてほしい！") echo 'checked'; ?>><label for="forMyColleague06_01">なるべく助けてほしい！</label>
                <input required type="radio" name="forMyColleague06" id="forMyColleague06_02" value="話だけでも聞いてほしい" <?php if ($result['forMyColleague06'] == "話だけでも聞いてほしい") echo 'checked'; ?>><label for="forMyColleague06_02">話だけでも聞いてほしい</label>
                <input required type="radio" name="forMyColleague06" id="forMyColleague06_03" value="そっと見守ってほしい" <?php if ($result['forMyColleague06'] == "そっと見守ってほしい") echo 'checked'; ?>><label for="forMyColleague06_03">そっと見守ってほしい</label>
            </div>
        </li>
        <li>    
        <p>7.誰かが仕事で困ったら？</p>
            <div>
                <input required type="radio" name="forMyColleague07" id="forMyColleague07_01" value="なるべく助けたい！" <?php if ($result['forMyColleague07'] == "なるべく助けたい！") echo 'checked'; ?>><label for="forMyColleague07_01">なるべく助けたい！</label>
                <input required type="radio" name="forMyColleague07" id="forMyColleague07_02" value="話だけでも聞いてあげたい" <?php if ($result['forMyColleague07'] == "話だけでも聞いてあげたい") echo 'checked'; ?>><label for="forMyColleague07_02">話だけでも聞いてあげたい</label>
                <input required type="radio" name="forMyColleague07" id="forMyColleague07_03" value="そっと見守りたい" <?php if ($result['forMyColleague07'] == "そっと見守りたい") echo 'checked'; ?>><label for="forMyColleague07_03">そっと見守りたい</label>
            </div>
        </li>
        <li>    
        <p>8.ランチの誘いは？</p>
                <div>
                <input required type="radio" name="forMyColleague08" id="forMyColleague08_01" value="ぜひ誘ってほしい！" <?php if ($result['forMyColleague08'] == "ぜひ誘ってほしい！") echo 'checked'; ?>><label for="forMyColleague08_01">ぜひ誘ってほしい！</label>
                <input required type="radio" name="forMyColleague08" id="forMyColleague08_02" value="タイミングが合えば" <?php if ($result['forMyColleague08'] == "タイミングが合えば") echo 'checked'; ?>><label for="forMyColleague08_02">タイミングが合えば</label>
                <input required type="radio" name="forMyColleague08" id="forMyColleague08_03" value="一人で過ごしたい" <?php if ($result['forMyColleague08'] == "一人で過ごしたい") echo 'checked'; ?>><label for="forMyColleague08_03">一人で過ごしたい</label>
            </div>
        </li>
        <li>    
        <p>9.飲み会の誘いは？</p>
            <div>
                <input required type="radio" name="forMyColleague09" id="forMyColleague09_01" value="ぜひ誘ってほしい！" <?php if ($result['forMyColleague09'] == "ぜひ誘ってほしい！") echo 'checked'; ?>><label for="forMyColleague09_01">ぜひ誘ってほしい！</label>
                <input required type="radio" name="forMyColleague09" id="forMyColleague09_02" value="タイミングが合えば" <?php if ($result['forMyColleague09'] == "タイミングが合えば") echo 'checked'; ?>><label for="forMyColleague09_02">タイミングが合えば</label>
                <input required type="radio" name="forMyColleague09" id="forMyColleague09_03" value="できれば不参加で" <?php if ($result['forMyColleague09'] == "できれば不参加で") echo 'checked'; ?>><label for="forMyColleague09_03">できれば不参加で</label>
            </div>
        </li>
        <li>    
        <p>10.プライベートの話は？</p>
            <div>
                <input required type="radio" name="forMyColleague10" id="forMyColleague10_01" value="なんでも聞いて！" <?php if ($result['forMyColleague10'] == "なんでも聞いて！") echo 'checked'; ?>><label for="forMyColleague10_01">なんでも聞いて！</label>
                <input required type="radio" name="forMyColleague10" id="forMyColleague10_02" value="普通に話します" <?php if ($result['forMyColleague10'] == "普通に話します") echo 'checked'; ?>><label for="forMyColleague10_02">普通に話します</label>
                <input required type="radio" name="forMyColleague10" id="forMyColleague10_03" value="なるべく避けたい" <?php if ($result['forMyColleague10'] == "なるべく避けたい") echo 'checked'; ?>><label for="forMyColleague10_03">なるべく避けたい</label>
            </div>
        </li>
    </ul>
    <a id="go_to_forMyBoss">次へ</a>
   <!-- <button id="button_to_forMyBoss">次へ</button> -->
</fieldset>
</section>


<section id="forMyBoss">
<h2>【2/3】上司の方へ（すべて３択）</h2>
<!-- <form action="torisetsu_write.php" method="post"> -->

<fieldset>
    <ul>
        <li>    
        <p>1.仕事の内容は？</p>
            <div>
                <input required type="radio" name="forMyBoss01" id="forMyBoss01_01" value="あれこれ任されたい！" <?php if ($result['forMyBoss01'] == "あれこれ任されたい！") echo 'checked'; ?>><label for="forMyBoss01_01">あれこれ任されたい！</label>
                <input required type="radio" name="forMyBoss01" id="forMyBoss01_02" value="これから広げていきたい" <?php if ($result['forMyBoss01'] == "これから広げていきたい") echo 'checked'; ?>><label for="forMyBoss01_02">これから広げていきたい</label>
                <input required type="radio" name="forMyBoss01" id="forMyBoss01_03" value="役割だけを忠実に果たしたい" <?php if ($result['forMyBoss01'] == "役割だけを忠実に果たしたい") echo 'checked'; ?>><label for="forMyBoss01_03">役割だけを忠実に果たしたい</label>
            </div>
        </li>
        <li>    
        <p>2.仕事のペースは？</p>
            <div>
                <input required type="radio" name="forMyBoss02" id="forMyBoss02_01" value="常に全速力で走りたい！" <?php if ($result['forMyBoss02'] == "常に全速力で走りたい！") echo 'checked'; ?>><label for="forMyBoss02_01">常に全速力で走りたい！</label>
                <input required type="radio" name="forMyBoss02" id="forMyBoss02_02" value="早くなるよう努力したい" <?php if ($result['forMyBoss02'] == "早くなるよう努力したい") echo 'checked'; ?>><label for="forMyBoss02_02">早くなるよう努力したい</label>
                <input required type="radio" name="forMyBoss02" id="forMyBoss02_03" value="チームのペースで進めたい" <?php if ($result['forMyBoss02'] == "チームのペースで進めたい") echo 'checked'; ?>><label for="forMyBoss02_03">チームのペースで進めたい</label>
            </div>
        </li>
        <li>    
        <p>3.仕事の進め方は？</p>
            <div>
                <input required type="radio" name="forMyBoss03" id="forMyBoss03_01" value="常によりよく変えていきたい！" <?php if ($result['forMyBoss03'] == "常によりよく変えていきたい！") echo 'checked'; ?>><label for="forMyBoss03_01">常によりよく変えていきたい！</label>
                <input required type="radio" name="forMyBoss03" id="forMyBoss03_02" value="より良い方法を皆で考えたい" <?php if ($result['forMyBoss03'] == "より良い方法を皆で考えたい") echo 'checked'; ?>><label for="forMyBoss03_02">より良い方法を皆で考えたい</label>
                <input required type="radio" name="forMyBoss03" id="forMyBoss03_03" value="これまでの方法に従いたい" <?php if ($result['forMyBoss03'] == "これまでの方法に従いたい") echo 'checked'; ?>><label for="forMyBoss03_03">これまでの方法に従いたい</label>
            </div>
        </li>
        <li>    
        <p>4.指示の頻度は？</p>
            <div>
                <input required type="radio" name="forMyBoss04" id="forMyBoss04_01" value="日常的に指示してほしい！" <?php if ($result['forMyBoss04'] == "日常的に指示してほしい！") echo 'checked'; ?>><label for="forMyBoss04_01">日常的に指示してほしい！</label>
                <input required type="radio" name="forMyBoss04" id="forMyBoss04_02" value="必要なタイミングでしてほしい" <?php if ($result['forMyBoss04'] == "必要なタイミングでしてほしい") echo 'checked'; ?>><label for="forMyBoss04_02">必要なタイミングでしてほしい</label>
                <input required type="radio" name="forMyBoss04" id="forMyBoss04_03" value="できるだけ少なくしてほしい" <?php if ($result['forMyBoss04'] == "できるだけ少なくしてほしい") echo 'checked'; ?>><label for="forMyBoss04_03">できるだけ少なくしてほしい</label>
            </div>
        </li>
        <li>    
        <p>5.指示の細かさは？</p>
            <div>
                <input required type="radio" name="forMyBoss05" id="forMyBoss05_01" value="作業手順まで細かく指示してほしい！" <?php if ($result['forMyBoss05'] == "作業手順まで細かく指示してほしい！") echo 'checked'; ?>><label for="forMyBoss05_01">作業手順まで細かく指示してほしい！</label>
                <input required type="radio" name="forMyBoss05" id="forMyBoss05_02" value="方針や期日だけ指示してほしい" <?php if ($result['forMyBoss05'] == "方針や期日だけ指示してほしい") echo 'checked'; ?>><label for="forMyBoss05_02">方針や期日だけ指示してほしい</label>
                <input required type="radio" name="forMyBoss05" id="forMyBoss05_03" value="全て丸投げしてほしい" <?php if ($result['forMyBoss05'] == "全て丸投げしてほしい") echo 'checked'; ?>><label for="forMyBoss05_03">全て丸投げしてほしい</label>
            </div>
        </li>
        <li>    
        <p>6.指示の伝え方は？</p>
            <div>
                <input required type="radio" name="forMyBoss06" id="forMyBoss06_01" value="はっきり明確に指示されたい！" <?php if ($result['forMyBoss06'] == "はっきり明確に指示されたい！") echo 'checked'; ?>><label for="forMyBoss06_01">はっきり明確に指示されたい！</label>
                <input required type="radio" name="forMyBoss06" id="forMyBoss06_02" value="大きな方向性だけ伝えてもらいたい" <?php if ($result['forMyBoss06'] == "大きな方向性だけ伝えてもらいたい") echo 'checked'; ?>><label for="forMyBoss06_02">大きな方向性だけ伝えてもらいたい</label>
                <input required type="radio" name="forMyBoss06" id="forMyBoss06_03" value="確認しながら決めてほしい" <?php if ($result['forMyBoss06'] == "確認しながら決めてほしい") echo 'checked'; ?>><label for="forMyBoss06_03">確認しながら決めてほしい</label>
            </div>
        </li>
        <li>    
        <p>7.報告・連絡・相談は？</p>
            <div>
                <input required type="radio" name="forMyBoss07" id="forMyBoss07_01" value="日常的に行いたい！" <?php if ($result['forMyBoss07'] == "日常的に行いたい！") echo 'checked'; ?>><label for="forMyBoss07_01">日常的に行いたい！</label>
                <input required type="radio" name="forMyBoss07" id="forMyBoss07_02" value="何か変化があったときに行いたい" <?php if ($result['forMyBoss07'] == "何か変化があったときに行いたい") echo 'checked'; ?>><label for="forMyBoss07_02">何か変化があったときに行いたい</label>
                <input required type="radio" name="forMyBoss07" id="forMyBoss07_03" value="問題が起きたときだけ行いたい" <?php if ($result['forMyBoss07'] == "問題が起きたときだけ行いたい") echo 'checked'; ?>><label for="forMyBoss07_03">問題が起きたときだけ行いたい</label>
            </div>
        </li>
        <li>    
        <p>8.困ったときには？</p>
            <div>
                <input required type="radio" name="forMyBoss08" id="forMyBoss08_01" value="なるべく助けてほしい！" <?php if ($result['forMyBoss08'] == "なるべく助けてほしい！") echo 'checked'; ?>><label for="forMyBoss08_01">なるべく助けてほしい！</label>
                <input required type="radio" name="forMyBoss08" id="forMyBoss08_02" value="話だけでも聞いてほしい" <?php if ($result['forMyBoss08'] == "話だけでも聞いてほしい") echo 'checked'; ?>><label for="forMyBoss08_02">話だけでも聞いてほしい</label>
                <input required type="radio" name="forMyBoss08" id="forMyBoss08_03" value="そっと見守ってほしい" <?php if ($result['forMyBoss08'] == "そっと見守ってほしい") echo 'checked'; ?>><label for="forMyBoss08_03">そっと見守ってほしい</label>
            </div>
        </li>
        <li>    
        <p>9.誤りや失敗は？</p>
            <div>
                <input required type="radio" name="forMyBoss09" id="forMyBoss09_01" value="はっきり指摘されたい！" <?php if ($result['forMyBoss09'] == "はっきり指摘されたい！") echo 'checked'; ?>><label for="forMyBoss09_01">はっきり指摘されたい！</label>
                <input required type="radio" name="forMyBoss09" id="forMyBoss09_02" value="個別に教えてほしい" <?php if ($result['forMyBoss09'] == "個別に教えてほしい") echo 'checked'; ?>><label for="forMyBoss09_02">個別に教えてほしい</label>
                <input required type="radio" name="forMyBoss09" id="forMyBoss09_03" value="気づかせるよう助言してほしい" <?php if ($result['forMyBoss09'] == "気づかせるよう助言してほしい") echo 'checked'; ?>><label for="forMyBoss09_03">気づかせるよう助言してほしい</label>
            </div>
        </li>
        <li>    
        <p>10.大きな成功は？</p>
            <div>
                <input required type="radio" name="forMyBoss10" id="forMyBoss10_01" value="皆の前で称賛されたい！" <?php if ($result['forMyBoss10'] == "皆の前で称賛されたい！") echo 'checked'; ?>><label for="forMyBoss10_01">皆の前で称賛されたい！</label>
                <input required type="radio" name="forMyBoss10" id="forMyBoss10_02" value="個別に褒められたい" <?php if ($result['forMyBoss10'] == "個別に褒められたい") echo 'checked'; ?>><label for="forMyBoss10_02">個別に褒められたい</label>
                <input required type="radio" name="forMyBoss10" id="forMyBoss10_03" value="特に何も必要ない" <?php if ($result['forMyBoss10'] == "特に何も必要ない") echo 'checked'; ?>><label for="forMyBoss10_03">特に何も必要ない</label>
            </div>
        </li>
    </ul>

    <a id="back_to_forMyColleague">戻る</a>
    <a id="go_to_forMyTeam">次へ</a>
    <!-- <button id="button_to_forMyColleague">戻る</button>
    <button id="button_to_forMyTeam">次へ</button> -->

</fieldset>
</section>


<section id="forMyTeam">
<h2>【3/3】部下の皆さんへ（すべて３択）</h2>
<!-- <form action="torisetsu_write.php" method="post"> -->

<fieldset>
    <ul>
        <li>    
        <p>1.仕事の内容は？</p>
            <div>
                <input required type="radio" name="forMyTeam01" id="forMyTeam01_01" value="どんどん任せたい！" <?php if ($result['forMyTeam01'] == "どんどん任せたい！") echo 'checked'; ?>><label for="forMyTeam01_01">どんどん任せたい！ </label>
                <input required type="radio" name="forMyTeam01" id="forMyTeam01_02" value="タイミングを見て任せたい" <?php if ($result['forMyTeam01'] == "タイミングを見て任せたい") echo 'checked'; ?>><label for="forMyTeam01_02">タイミングを見て任せたい</label>
                <input required type="radio" name="forMyTeam01" id="forMyTeam01_03" value="役割を忠実に果たしてほしい" <?php if ($result['forMyTeam01'] == "役割を忠実に果たしてほしい") echo 'checked'; ?>><label for="forMyTeam01_03">役割を忠実に果たしてほしい</label>
            </div>
        </li>
        <li>    
        <p>2.仕事のペースは？</p>
            <div>
                <input required type="radio" name="forMyTeam02" id="forMyTeam02_01" value="どんどん先読みして進めてほしい！" <?php if ($result['forMyTeam02'] == "どんどん先読みして進めてほしい！") echo 'checked'; ?>><label for="forMyTeam02_01">どんどん先読みして進めてほしい！</label>
                <input required type="radio" name="forMyTeam02" id="forMyTeam02_02" value="私のペースに合わせてほしい" <?php if ($result['forMyTeam02'] == "私のペースに合わせてほしい") echo 'checked'; ?>><label for="forMyTeam02_02">私のペースに合わせてほしい</label>
                <input required type="radio" name="forMyTeam02" id="forMyTeam02_03" value="チームのペースに合わせてほしい" <?php if ($result['forMyTeam02'] == "チームのペースに合わせてほしい") echo 'checked'; ?>><label for="forMyTeam02_03">チームのペースに合わせてほしい</label>
            </div>
        </li>
        <li>    
        <p>3.仕事の進め方は？</p>
            <div>
                <input required type="radio" name="forMyTeam03" id="forMyTeam03_01" value="常に判断を確認してほしい" <?php if ($result['forMyTeam03'] == "常に判断を確認してほしい") echo 'checked'; ?>><label for="forMyTeam03_01">常に判断を確認してほしい</label>
                <input required type="radio" name="forMyTeam03" id="forMyTeam03_02" value="困ったら相談してほしい  " <?php if ($result['forMyTeam03'] == "困ったら相談してほしい") echo 'checked'; ?>><label for="forMyTeam03_02">困ったら相談してほしい   </label>
                <input required type="radio" name="forMyTeam03" id="forMyTeam03_03" value="自分で判断して進めてほしい" <?php if ($result['forMyTeam03'] == "自分で判断して進めてほしい") echo 'checked'; ?>><label for="forMyTeam03_03">自分で判断して進めてほしい</label>
            </div>
        </li>
        <li>    
        <p>4.報告や相談の頻度は？</p>
            <div>
                <input required type="radio" name="forMyTeam04" id="forMyTeam04_01" value="日常的に報告してほしい！" <?php if ($result['forMyTeam04'] == "日常的に報告してほしい！") echo 'checked'; ?>><label for="forMyTeam04_01">日常的に報告してほしい！</label>
                <input required type="radio" name="forMyTeam04" id="forMyTeam04_02" value="必要な時は遠慮なくしてほしい" <?php if ($result['forMyTeam04'] == "必要な時は遠慮なくしてほしい") echo 'checked'; ?>><label for="forMyTeam04_02">必要な時は遠慮なくしてほしい</label>
                <input required type="radio" name="forMyTeam04" id="forMyTeam04_03" value="できるだけ少なくしてほしい" <?php if ($result['forMyTeam04'] == "できるだけ少なくしてほしい") echo 'checked'; ?>><label for="forMyTeam04_03">できるだけ少なくしてほしい</label>
            </div>
        </li>
        <li>    
        <p>5.報告や相談の細かさは？</p>
            <div>
                <input required type="radio" name="forMyTeam05" id="forMyTeam05_01" value="進捗状況を細かく報告してほしい！" <?php if ($result['forMyTeam05'] == "進捗状況を細かく報告してほしい！") echo 'checked'; ?>><label for="forMyTeam05_01">進捗状況を細かく報告してほしい！</label>
                <input required type="radio" name="forMyTeam05" id="forMyTeam05_02" value="何か変化があったときにしてほしい" <?php if ($result['forMyTeam05'] == "何か変化があったときにしてほしい") echo 'checked'; ?>><label for="forMyTeam05_02">何か変化があったときにしてほしい</label>
                <input required type="radio" name="forMyTeam05" id="forMyTeam05_03" value="問題が起きたときだけにしてほしい" <?php if ($result['forMyTeam05'] == "問題が起きたときだけにしてほしい") echo 'checked'; ?>><label for="forMyTeam05_03">問題が起きたときだけにしてほしい</label>
            </div>
        </li>
        <li>    
        <p>6.報告や相談の伝え方は？</p>
            <div>
                <input required type="radio" name="forMyTeam06" id="forMyTeam06_01" value="ミーティングでまとめて" <?php if ($result['forMyTeam06'] == "ミーティングでまとめて") echo 'checked'; ?>><label for="forMyTeam06_01">ミーティングでまとめて</label>
                <input required type="radio" name="forMyTeam06" id="forMyTeam06_02" value="必要な時に個別に" <?php if ($result['forMyTeam06'] == "必要な時に個別に") echo 'checked'; ?>><label for="forMyTeam06_02">必要な時に個別に</label>
                <input required type="radio" name="forMyTeam06" id="forMyTeam06_03" value="メールで伝えられたい" <?php if ($result['forMyTeam06'] == "メールで伝えられたい") echo 'checked'; ?>><label for="forMyTeam06_03">メールで伝えられたい</label>
            </div>
        </li>
        <li>    
        <p>7.業務の指示は？</p>
            <div>
                <input required type="radio" name="forMyTeam07" id="forMyTeam07_01" value="細かく日常的に行いたい！" <?php if ($result['forMyTeam07'] == "細かく日常的に行いたい！") echo 'checked'; ?>><label for="forMyTeam07_01">細かく日常的に行いたい！</label>
                <input required type="radio" name="forMyTeam07" id="forMyTeam07_02" value="必要な時だけ行いたい" <?php if ($result['forMyTeam07'] == "必要な時だけ行いたい") echo 'checked'; ?>><label for="forMyTeam07_02">必要な時だけ行いたい</label>
                <input required type="radio" name="forMyTeam07" id="forMyTeam07_03" value="なるべく少なくしたい" <?php if ($result['forMyTeam07'] == "なるべく少なくしたい") echo 'checked'; ?>><label for="forMyTeam07_03">なるべく少なくしたい</label>
            </div>
        </li>
        <li>    
        <p>8.困ったときには？</p>
            <div>
                <input required type="radio" name="forMyTeam08" id="forMyTeam08_01" value="できる限り助けたい！" <?php if ($result['forMyTeam08'] == "できる限り助けたい！") echo 'checked'; ?>><label for="forMyTeam08_01">できる限り助けたい！</label>
                <input required type="radio" name="forMyTeam08" id="forMyTeam08_02" value="話だけでも聞いてあげたい" <?php if ($result['forMyTeam08'] == "話だけでも聞いてあげたい") echo 'checked'; ?>><label for="forMyTeam08_02">話だけでも聞いてあげたい</label>
                <input required type="radio" name="forMyTeam08" id="forMyTeam08_03" value="そっと見守りたい" <?php if ($result['forMyTeam08'] == "そっと見守りたい") echo 'checked'; ?>><label for="forMyTeam08_03">そっと見守りたい</label>
            </div>
        </li>
        <li>    
        <p>9.不安や不満は？</p>
            <div>
                <input required type="radio" name="forMyTeam09" id="forMyTeam09_01" value="積極的に伝えられたい！" <?php if ($result['forMyTeam09'] == "積極的に伝えられたい！") echo 'checked'; ?>><label for="forMyTeam09_01">積極的に伝えられたい！</label>
                <input required type="radio" name="forMyTeam09" id="forMyTeam09_02" value="個別に教えてほしい" <?php if ($result['forMyTeam09'] == "個別に教えてほしい") echo 'checked'; ?>><label for="forMyTeam09_02">個別に教えてほしい</label>
                <input required type="radio" name="forMyTeam09" id="forMyTeam09_03" value="気づかせるよう工夫してほしい" <?php if ($result['forMyTeam09'] == "気づかせるよう工夫してほしい") echo 'checked'; ?>><label for="forMyTeam09_03">気づかせるよう工夫してほしい</label>
            </div>
        </li>
        <li>    
        <p>10.うれしいことは？</p>
            <div>
                <input required type="radio" name="forMyTeam10" id="forMyTeam10_01" value="皆で一緒に共有したい！" <?php if ($result['forMyTeam10'] == "皆で一緒に共有したい！") echo 'checked'; ?>><label for="forMyTeam10_01">皆で一緒に共有したい！</label>
                <input required type="radio" name="forMyTeam10" id="forMyTeam10_02" value="個別に教えてほしい" <?php if ($result['forMyTeam10'] == "個別に教えてほしい") echo 'checked'; ?>><label for="forMyTeam10_02">個別に教えてほしい</label>
                <input required type="radio" name="forMyTeam10" id="forMyTeam10_03" value="特に何も必要ない" <?php if ($result['forMyTeam10'] == "特に何も必要ない") echo 'checked'; ?>><label for="forMyTeam10_03">特に何も必要ない</label>
            </div>
        </li>
    </ul>

    <a id="back_to_forMyBoss">戻る</a>
    <a id="submit">登録</a>
            <!-- <input type="submit" value="送信"> -->

</fieldset>

</section>

</form>





<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- JQuery -->


<script>

// 画面遷移
$('#forMyColleague').show();
$('#forMyBoss').hide();
$('#forMyTeam').hide();


$("#go_to_forMyBoss").on('click',function(){
    $('#forMyColleague').toggle();  //hide
    $('#forMyBoss').toggle();  //show
    $("html,body").scrollTop(0); // 画面の一番上にスクロール
    // $('#forMyTeam').hide();
});

$("#back_to_forMyColleague").on('click',function() {
    $('#forMyColleague').toggle();  //show
    $('#forMyBoss').toggle();  // hide
    // $('#forMyTeam').hide();
    $("html,body").scrollTop(0); // 画面の一番上にスクロール
});

$("#go_to_forMyTeam").on('click',function() {
    // $('#forMyColleague').hide();
    $('#forMyBoss').toggle();  //hide
    $('#forMyTeam').toggle();  //show
    $("html,body").scrollTop(0); // 画面の一番上にスクロール
});

$("#back_to_forMyBoss").on('click',function(){
    // $('#forMyColleague').hide();
    $('#forMyBoss').toggle();  //show
    $('#forMyTeam').toggle();  //hide
    $("html,body").scrollTop(0); // 画面の一番上にスクロール
});



// ボタンクリックでフォームを送信

$("#submit").click(function(){

$('#torisetsu').submit();

});




</script>




</body>

</html>
