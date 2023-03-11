<?php

// SESSION開始！！
session_start();
// 関数群の読み込み
require_once('funcs.php');
// ログインチェック処理！
loginCheck();

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
                <input required type="radio" name="forMyColleague01" id="forMyColleague01_01" value="常に楽しみです！"><label for="forMyColleague01_01">常に楽しみです！</label>
                <input required type="radio" name="forMyColleague01" id="forMyColleague01_02" value="実は緊張してます"><label for="forMyColleague01_02">実は緊張してます</label>
                <input required type="radio" name="forMyColleague01" id="forMyColleague01_03" value="できれば避けたい"><label for="forMyColleague01_03">できれば避けたい</label>
            </div>
        </li>
        <li>    
        <p>2.誰かに話しかけられるのは？</p>
            <div>
                <input required type="radio" name="forMyColleague02" id="forMyColleague02_01" value="いつでも話しかけてほしい！"><label for="forMyColleague02_01">いつでも話しかけてほしい！</label>
                <input required type="radio" name="forMyColleague02" id="forMyColleague02_02" value="様子を見つつ話しかけてほしい"><label for="forMyColleague02_02">様子を見つつ話しかけてほしい</label>
                <input required type="radio" name="forMyColleague02" id="forMyColleague02_03" value="あまり話しかけられたくない"><label for="forMyColleague02_03">あまり話しかけられたくない</label>
            </div>
        </li>
        <li>    
        <p>3.自分から話しかけるのは？</p>
            <div>
                <input required type="radio" name="forMyColleague03" id="forMyColleague03_01" value="いつでも話しかけたい！"><label for="forMyColleague03_01">いつでも話しかけたい！</label>
                <input required type="radio" name="forMyColleague03" id="forMyColleague03_02" value="様子を見つつ話しかけたい"><label for="forMyColleague03_02">様子を見つつ話しかけたい</label>
                <input required type="radio" name="forMyColleague03" id="forMyColleague03_03" value="あまり話しかけたくない"><label for="forMyColleague03_03">あまり話しかけたくない</label>
            </div>
        </li>
        <li>    
        <p>4.誰かに教わるのは？</p>
            <div>
                <input required type="radio" name="forMyColleague04" id="forMyColleague04_01" value="先回りしてアドバイスされたい！"><label for="forMyColleague04_01">先回りしてアドバイスされたい！</label>
                <input required type="radio" name="forMyColleague04" id="forMyColleague04_02" value="聞いた時には教えてほしい"><label for="forMyColleague04_02">聞いた時には教えてほしい</label>
                <input required type="radio" name="forMyColleague04" id="forMyColleague04_03" value="なるべく自分で考えたい"><label for="forMyColleague04_03">なるべく自分で考えたい</label>
            </div>
        </li>
        <li>    
        <p>5.自分が教えるのは？</p>
            <div>
                <input required type="radio" name="forMyColleague05" id="forMyColleague05_01" value="あれこれ教えてあげたい！"><label for="forMyColleague05_01">あれこれ教えてあげたい！</label>
                <input required type="radio" name="forMyColleague05" id="forMyColleague05_02" value="聞かれれば教えたい"><label for="forMyColleague05_02">聞かれれば教えたい</label>
                <input required type="radio" name="forMyColleague05" id="forMyColleague05_03" value="自分以外に聞いてほしい"><label for="forMyColleague05_03">自分以外に聞いてほしい</label>
            </div>
        </li>
        <li>    
        <p>6.自分が仕事で困ったら？</p>
            <div>
                <input required type="radio" name="forMyColleague06" id="forMyColleague06_01" value="なるべく助けてほしい！"><label for="forMyColleague06_01">なるべく助けてほしい！</label>
                <input required type="radio" name="forMyColleague06" id="forMyColleague06_02" value="話だけでも聞いてほしい"><label for="forMyColleague06_02">話だけでも聞いてほしい</label>
                <input required type="radio" name="forMyColleague06" id="forMyColleague06_03" value="そっと見守ってほしい"><label for="forMyColleague06_03">そっと見守ってほしい</label>
            </div>
        </li>
        <li>    
        <p>7.誰かが仕事で困ったら？</p>
            <div>
                <input required type="radio" name="forMyColleague07" id="forMyColleague07_01" value="なるべく助けたい！"><label for="forMyColleague07_01">なるべく助けたい！</label>
                <input required type="radio" name="forMyColleague07" id="forMyColleague07_02" value="話だけでも聞いてあげたい"><label for="forMyColleague07_02">話だけでも聞いてあげたい</label>
                <input required type="radio" name="forMyColleague07" id="forMyColleague07_03" value="そっと見守りたい"><label for="forMyColleague07_03">そっと見守りたい</label>
            </div>
        </li>
        <li>    
        <p>8.ランチの誘いは？</p>
                <div>
                <input required type="radio" name="forMyColleague08" id="forMyColleague08_01" value="ぜひ誘ってほしい！"><label for="forMyColleague08_01">ぜひ誘ってほしい！</label>
                <input required type="radio" name="forMyColleague08" id="forMyColleague08_02" value="タイミングが合えば"><label for="forMyColleague08_02">タイミングが合えば</label>
                <input required type="radio" name="forMyColleague08" id="forMyColleague08_03" value="一人で過ごしたい"><label for="forMyColleague08_03">一人で過ごしたい</label>
            </div>
        </li>
        <li>    
        <p>9.飲み会の誘いは？</p>
            <div>
                <input required type="radio" name="forMyColleague09" id="forMyColleague09_01" value="ぜひ誘ってほしい！"><label for="forMyColleague09_01">ぜひ誘ってほしい！</label>
                <input required type="radio" name="forMyColleague09" id="forMyColleague09_02" value="タイミングが合えば"><label for="forMyColleague09_02">タイミングが合えば</label>
                <input required type="radio" name="forMyColleague09" id="forMyColleague09_03" value="できれば不参加で"><label for="forMyColleague09_03">できれば不参加で</label>
            </div>
        </li>
        <li>    
        <p>10.プライベートの話は？</p>
            <div>
                <input required type="radio" name="forMyColleague10" id="forMyColleague10_01" value="なんでも聞いて！"><label for="forMyColleague10_01">なんでも聞いて！</label>
                <input required type="radio" name="forMyColleague10" id="forMyColleague10_02" value="普通に話します"><label for="forMyColleague10_02">普通に話します</label>
                <input required type="radio" name="forMyColleague10" id="forMyColleague10_03" value="なるべく避けたい"><label for="forMyColleague10_03">なるべく避けたい</label>
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
                <input required type="radio" name="forMyBoss01" id="forMyBoss01_01" value="あれこれ任されたい！"><label for="forMyBoss01_01">あれこれ任されたい！</label>
                <input required type="radio" name="forMyBoss01" id="forMyBoss01_02" value="これから広げていきたい"><label for="forMyBoss01_02">これから広げていきたい</label>
                <input required type="radio" name="forMyBoss01" id="forMyBoss01_03" value="役割だけを忠実に果たしたい"><label for="forMyBoss01_03">役割だけを忠実に果たしたい</label>
            </div>
        </li>
        <li>    
        <p>2.仕事のペースは？</p>
            <div>
                <input required type="radio" name="forMyBoss02" id="forMyBoss02_01" value="常に全速力で走りたい！"><label for="forMyBoss02_01">常に全速力で走りたい！</label>
                <input required type="radio" name="forMyBoss02" id="forMyBoss02_02" value="早くなるよう努力したい"><label for="forMyBoss02_02">早くなるよう努力したい</label>
                <input required type="radio" name="forMyBoss02" id="forMyBoss02_03" value="チームのペースで進めたい"><label for="forMyBoss02_03">チームのペースで進めたい</label>
            </div>
        </li>
        <li>    
        <p>3.仕事の進め方は？</p>
            <div>
                <input required type="radio" name="forMyBoss03" id="forMyBoss03_01" value="常によりよく変えていきたい！"><label for="forMyBoss03_01">常によりよく変えていきたい！</label>
                <input required type="radio" name="forMyBoss03" id="forMyBoss03_02" value="より良い方法を皆で考えたい"><label for="forMyBoss03_02">より良い方法を皆で考えたい</label>
                <input required type="radio" name="forMyBoss03" id="forMyBoss03_03" value="これまでの方法に従いたい"><label for="forMyBoss03_03">これまでの方法に従いたい</label>
            </div>
        </li>
        <li>    
        <p>4.指示の頻度は？</p>
            <div>
                <input required type="radio" name="forMyBoss04" id="forMyBoss04_01" value="日常的に指示してほしい！"><label for="forMyBoss04_01">日常的に指示してほしい！</label>
                <input required type="radio" name="forMyBoss04" id="forMyBoss04_02" value="必要なタイミングでしてほしい"><label for="forMyBoss04_02">必要なタイミングでしてほしい</label>
                <input required type="radio" name="forMyBoss04" id="forMyBoss04_03" value="できるだけ少なくしてほしい"><label for="forMyBoss04_03">できるだけ少なくしてほしい</label>
            </div>
        </li>
        <li>    
        <p>5.指示の細かさは？</p>
            <div>
                <input required type="radio" name="forMyBoss05" id="forMyBoss05_01" value="作業手順まで細かく指示してほしい！"><label for="forMyBoss05_01">作業手順まで細かく指示してほしい！</label>
                <input required type="radio" name="forMyBoss05" id="forMyBoss05_02" value="方針や期日だけ指示してほしい"><label for="forMyBoss05_02">方針や期日だけ指示してほしい</label>
                <input required type="radio" name="forMyBoss05" id="forMyBoss05_03" value="全て丸投げしてほしい"><label for="forMyBoss05_03">全て丸投げしてほしい</label>
            </div>
        </li>
        <li>    
        <p>6.指示の伝え方は？</p>
            <div>
                <input required type="radio" name="forMyBoss06" id="forMyBoss06_01" value="はっきり明確に指示されたい！"><label for="forMyBoss06_01">はっきり明確に指示されたい！</label>
                <input required type="radio" name="forMyBoss06" id="forMyBoss06_02" value="大きな方向性だけ伝えてもらいたい"><label for="forMyBoss06_02">大きな方向性だけ伝えてもらいたい</label>
                <input required type="radio" name="forMyBoss06" id="forMyBoss06_03" value="確認しながら決めてほしい"><label for="forMyBoss06_03">確認しながら決めてほしい</label>
            </div>
        </li>
        <li>    
        <p>7.報告・連絡・相談は？</p>
            <div>
                <input required type="radio" name="forMyBoss07" id="forMyBoss07_01" value="日常的に行いたい！"><label for="forMyBoss07_01">日常的に行いたい！</label>
                <input required type="radio" name="forMyBoss07" id="forMyBoss07_02" value="何か変化があったときに行いたい"><label for="forMyBoss07_02">何か変化があったときに行いたい</label>
                <input required type="radio" name="forMyBoss07" id="forMyBoss07_03" value="問題が起きたときだけ行いたい"><label for="forMyBoss07_03">問題が起きたときだけ行いたい</label>
            </div>
        </li>
        <li>    
        <p>8.困ったときには？</p>
            <div>
                <input required type="radio" name="forMyBoss08" id="forMyBoss08_01" value="なるべく助けてほしい！"><label for="forMyBoss08_01">なるべく助けてほしい！</label>
                <input required type="radio" name="forMyBoss08" id="forMyBoss08_02" value="話だけでも聞いてほしい"><label for="forMyBoss08_02">話だけでも聞いてほしい</label>
                <input required type="radio" name="forMyBoss08" id="forMyBoss08_03" value="そっと見守ってほしい"><label for="forMyBoss08_03">そっと見守ってほしい</label>
            </div>
        </li>
        <li>    
        <p>9.誤りや失敗は？</p>
            <div>
                <input required type="radio" name="forMyBoss09" id="forMyBoss09_01" value="はっきり指摘されたい！"><label for="forMyBoss09_01">はっきり指摘されたい！</label>
                <input required type="radio" name="forMyBoss09" id="forMyBoss09_02" value="個別に教えてほしい"><label for="forMyBoss09_02">個別に教えてほしい</label>
                <input required type="radio" name="forMyBoss09" id="forMyBoss09_03" value="気づかせるよう助言してほしい"><label for="forMyBoss09_03">気づかせるよう助言してほしい</label>
            </div>
        </li>
        <li>    
        <p>10.大きな成功は？</p>
            <div>
                <input required type="radio" name="forMyBoss10" id="forMyBoss10_01" value="皆の前で称賛されたい！"><label for="forMyBoss10_01">皆の前で称賛されたい！</label>
                <input required type="radio" name="forMyBoss10" id="forMyBoss10_02" value="個別に褒められたい"><label for="forMyBoss10_02">個別に褒められたい</label>
                <input required type="radio" name="forMyBoss10" id="forMyBoss10_03" value="特に何も必要ない"><label for="forMyBoss10_03">特に何も必要ない</label>
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
                <input required type="radio" name="forMyTeam01" id="forMyTeam01_01" value="どんどん任せたい！"><label for="forMyTeam01_01">どんどん任せたい！ </label>
                <input required type="radio" name="forMyTeam01" id="forMyTeam01_02" value="タイミングを見て任せたい"><label for="forMyTeam01_02">タイミングを見て任せたい</label>
                <input required type="radio" name="forMyTeam01" id="forMyTeam01_03" value="役割を忠実に果たしてほしい"><label for="forMyTeam01_03">役割を忠実に果たしてほしい</label>
            </div>
        </li>
        <li>    
        <p>2.仕事のペースは？</p>
            <div>
                <input required type="radio" name="forMyTeam02" id="forMyTeam02_01" value="どんどん先読みして進めてほしい！"><label for="forMyTeam02_01">どんどん先読みして進めてほしい！</label>
                <input required type="radio" name="forMyTeam02" id="forMyTeam02_02" value="私のペースに合わせてほしい"><label for="forMyTeam02_02">私のペースに合わせてほしい</label>
                <input required type="radio" name="forMyTeam02" id="forMyTeam02_03" value="チームのペースに合わせてほしい"><label for="forMyTeam02_03">チームのペースに合わせてほしい</label>
            </div>
        </li>
        <li>    
        <p>3.仕事の進め方は？</p>
            <div>
                <input required type="radio" name="forMyTeam03" id="forMyTeam03_01" value="常に判断を確認してほしい"><label for="forMyTeam03_01">常に判断を確認してほしい</label>
                <input required type="radio" name="forMyTeam03" id="forMyTeam03_02" value="困ったら相談してほしい  "><label for="forMyTeam03_02">困ったら相談してほしい   </label>
                <input required type="radio" name="forMyTeam03" id="forMyTeam03_03" value="自分で判断して進めてほしい"><label for="forMyTeam03_03">自分で判断して進めてほしい</label>
            </div>
        </li>
        <li>    
        <p>4.報告や相談の頻度は？</p>
            <div>
                <input required type="radio" name="forMyTeam04" id="forMyTeam04_01" value="日常的に報告してほしい！"><label for="forMyTeam04_01">日常的に報告してほしい！</label>
                <input required type="radio" name="forMyTeam04" id="forMyTeam04_02" value="必要な時は遠慮なくしてほしい"><label for="forMyTeam04_02">必要な時は遠慮なくしてほしい</label>
                <input required type="radio" name="forMyTeam04" id="forMyTeam04_03" value="できるだけ少なくしてほしい"><label for="forMyTeam04_03">できるだけ少なくしてほしい</label>
            </div>
        </li>
        <li>    
        <p>5.報告や相談の細かさは？</p>
            <div>
                <input required type="radio" name="forMyTeam05" id="forMyTeam05_01" value="進捗状況を細かく報告してほしい！"><label for="forMyTeam05_01">進捗状況を細かく報告してほしい！</label>
                <input required type="radio" name="forMyTeam05" id="forMyTeam05_02" value="何か変化があったときにしてほしい"><label for="forMyTeam05_02">何か変化があったときにしてほしい</label>
                <input required type="radio" name="forMyTeam05" id="forMyTeam05_03" value="問題が起きたときだけにしてほしい"><label for="forMyTeam05_03">問題が起きたときだけにしてほしい</label>
            </div>
        </li>
        <li>    
        <p>6.報告や相談の伝え方は？</p>
            <div>
                <input required type="radio" name="forMyTeam06" id="forMyTeam06_01" value="ミーティングでまとめて"><label for="forMyTeam06_01">ミーティングでまとめて</label>
                <input required type="radio" name="forMyTeam06" id="forMyTeam06_02" value="必要な時に個別に"><label for="forMyTeam06_02">必要な時に個別に</label>
                <input required type="radio" name="forMyTeam06" id="forMyTeam06_03" value="メールで伝えられたい"><label for="forMyTeam06_03">メールで伝えられたい</label>
            </div>
        </li>
        <li>    
        <p>7.業務の指示は？</p>
            <div>
                <input required type="radio" name="forMyTeam07" id="forMyTeam07_01" value="細かく日常的に行いたい！"><label for="forMyTeam07_01">細かく日常的に行いたい！</label>
                <input required type="radio" name="forMyTeam07" id="forMyTeam07_02" value="必要な時だけ行いたい"><label for="forMyTeam07_02">必要な時だけ行いたい</label>
                <input required type="radio" name="forMyTeam07" id="forMyTeam07_03" value="なるべく少なくしたい"><label for="forMyTeam07_03">なるべく少なくしたい</label>
            </div>
        </li>
        <li>    
        <p>8.困ったときには？</p>
            <div>
                <input required type="radio" name="forMyTeam08" id="forMyTeam08_01" value="できる限り助けたい！"><label for="forMyTeam08_01">できる限り助けたい！</label>
                <input required type="radio" name="forMyTeam08" id="forMyTeam08_02" value="話だけでも聞いてあげたい"><label for="forMyTeam08_02">話だけでも聞いてあげたい</label>
                <input required type="radio" name="forMyTeam08" id="forMyTeam08_03" value="そっと見守りたい"><label for="forMyTeam08_03">そっと見守りたい</label>
            </div>
        </li>
        <li>    
        <p>9.不安や不満は？</p>
            <div>
                <input required type="radio" name="forMyTeam09" id="forMyTeam09_01" value="積極的に伝えられたい！"><label for="forMyTeam09_01">積極的に伝えられたい！</label>
                <input required type="radio" name="forMyTeam09" id="forMyTeam09_02" value="個別に教えてほしい"><label for="forMyTeam09_02">個別に教えてほしい</label>
                <input required type="radio" name="forMyTeam09" id="forMyTeam09_03" value="気づかせるよう工夫してほしい"><label for="forMyTeam09_03">気づかせるよう工夫してほしい</label>
            </div>
        </li>
        <li>    
        <p>10.うれしいことは？</p>
            <div>
                <input required type="radio" name="forMyTeam10" id="forMyTeam10_01" value="皆で一緒に共有したい！"><label for="forMyTeam10_01">皆で一緒に共有したい！</label>
                <input required type="radio" name="forMyTeam10" id="forMyTeam10_02" value="個別に教えてほしい"><label for="forMyTeam10_02">個別に教えてほしい</label>
                <input required type="radio" name="forMyTeam10" id="forMyTeam10_03" value="特に何も必要ない"><label for="forMyTeam10_03">特に何も必要ない</label>
            </div>
        </li>
    </ul>

    <a id="back_to_forMyBoss">戻る</a>
    <a id="submit">送信</a>
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
