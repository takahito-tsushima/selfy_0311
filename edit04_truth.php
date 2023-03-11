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
$stmt = $pdo->prepare('SELECT * FROM register04_truth where lid = :lid');
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
    <title>【 Selfy 】「私の素顔図鑑」の登録</title>

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<h1>「私の素顔図鑑」の登録</h1>
    
<form method="POST" action="update04_truth.php" id="truth" name="truth">


    <section id="truth_01">
        <h2>【1/3】私の素顔図鑑</h2>

        <fieldset>
            <UL>
                <h3>■私の日常</h3>
                <p>（3択）</p>
                <li>    
                    <p>1.あいさつ</p>
                        <div>
                            <input required type="radio" name="usual01" id="usual01_01" value="自分からします" <?php if ($result['usual01'] == "自分からします") echo 'checked'; ?>><label for="usual01_01">自分からします</label>
                            <input required type="radio" name="usual01" id="usual01_02" value="されたら返します" <?php if ($result['usual01'] == "されたら返します") echo 'checked'; ?>><label for="usual01_02">されたら返します</label>
                            <input required type="radio" name="usual01" id="usual01_03" value="実は苦手です" <?php if ($result['usual01'] == "実は苦手です") echo 'checked'; ?>><label for="usual01_03">実は苦手です</label>
                        </div>
                </li>
                <li>    
                    <p>2.SNS</p>
                        <div>
                            <input required type="radio" name="usual02" id="usual02_01" value="よく発信します" <?php if ($result['usual02'] == "よく発信します") echo 'checked'; ?>><label for="usual02_01">よく発信します</label>
                            <input required type="radio" name="usual02" id="usual02_02" value="見るだけです" <?php if ($result['usual02'] == "見るだけです") echo 'checked'; ?>><label for="usual02_02">見るだけです</label>
                            <input required type="radio" name="usual02" id="usual02_03" value="やってません" <?php if ($result['usual02'] == "やってません") echo 'checked'; ?>><label for="usual02_03">やってません</label>
                        </div>
                </li>
                <li>    
                    <p>3.LINE</p>
                        <div>
                            <input required type="radio" name="usual03" id="usual03_01" value="ほぼ返信します" <?php if ($result['usual03'] == "ほぼ返信します") echo 'checked'; ?>><label for="usual03_01">ほぼ返信します</label>
                            <input required type="radio" name="usual03" id="usual03_02" value="既読スルーもします" <?php if ($result['usual03'] == "既読スルーもします") echo 'checked'; ?>><label for="usual03_02">既読スルーもします</label>
                            <input required type="radio" name="usual03" id="usual03_03" value="やってません" <?php if ($result['usual03'] == "やってません") echo 'checked'; ?>><label for="usual03_03">やってません</label>
                        </div>
                </li>
                <li>    
                    <p>4.メール</p>
                        <div>
                            <input required type="radio" name="usual04" id="usual04_01" value="すぐに返信します" <?php if ($result['usual04'] == "すぐに返信します") echo 'checked'; ?>><label for="usual04_01">すぐに返信します</label>
                            <input required type="radio" name="usual04" id="usual04_02" value="普通に返信します" <?php if ($result['usual04'] == "普通に返信します") echo 'checked'; ?>><label for="usual04_02">普通に返信します</label>
                            <input required type="radio" name="usual04" id="usual04_03" value="やってません" <?php if ($result['usual04'] == "やってません") echo 'checked'; ?>><label for="usual04_03">やってません</label>
                        </div>
                </li>
                <li>    
                    <p>5.歩くスピード</p>
                        <div>
                            <input required type="radio" name="usual05" id="usual05_01" value="人より早いです" <?php if ($result['usual05'] == "人より早いです") echo 'checked'; ?>><label for="usual05_01">人より早いです</label>
                            <input required type="radio" name="usual05" id="usual05_02" value="普通くらいです" <?php if ($result['usual05'] == "普通くらいです") echo 'checked'; ?>><label for="usual05_02">普通くらいです</label>
                            <input required type="radio" name="usual05" id="usual05_03" value="人より遅いです" <?php if ($result['usual05'] == "人より遅いです") echo 'checked'; ?>><label for="usual05_03">人より遅いです</label>
                        </div>
                </li>
                <li>    
                    <p>6.食べるスピード</p>
                        <div>
                            <input required type="radio" name="usual06" id="usual06_01" value="人より早いです" <?php if ($result['usual06'] == "人より早いです") echo 'checked'; ?>><label for="usual06_01">人より早いです</label>
                            <input required type="radio" name="usual06" id="usual06_02" value="普通くらいです" <?php if ($result['usual06'] == "普通くらいです") echo 'checked'; ?>><label for="usual06_02">普通くらいです</label>
                            <input required type="radio" name="usual06" id="usual06_03" value="人より遅いです" <?php if ($result['usual06'] == "人より遅いです") echo 'checked'; ?>><label for="usual06_03">人より遅いです</label>
                        </div>
                </li>
                <li>    
                    <p>7.運動</p>
                        <div>
                            <input required type="radio" name="usual07" id="usual07_01" value="よくしてます" <?php if ($result['usual07'] == "よくしてます") echo 'checked'; ?>><label for="usual07_01">よくしてます</label>
                            <input required type="radio" name="usual07" id="usual07_02" value="たまにしてます" <?php if ($result['usual07'] == "たまにしてます") echo 'checked'; ?>><label for="usual07_02">たまにしてます</label>
                            <input required type="radio" name="usual07" id="usual07_03" value="ほとんどしません" <?php if ($result['usual07'] == "ほとんどしません") echo 'checked'; ?>><label for="usual07_03">ほとんどしません</label>
                        </div>
                </li>
                <li>    
                    <p>8.酒</p>
                        <div>
                            <input required type="radio" name="usual08" id="usual08_01" value="よく飲みます" <?php if ($result['usual08'] == "よく飲みます") echo 'checked'; ?>><label for="usual08_01">よく飲みます</label>
                            <input required type="radio" name="usual08" id="usual08_02" value="嗜む程度です" <?php if ($result['usual08'] == "嗜む程度です") echo 'checked'; ?>><label for="usual08_02">嗜む程度です</label>
                            <input required type="radio" name="usual08" id="usual08_03" value="飲みません" <?php if ($result['usual08'] == "飲みません") echo 'checked'; ?>><label for="usual08_03">飲みません</label>
                        </div>
                </li>
                <li>    
                    <p>9.タバコ</p>
                        <div>
                            <input required type="radio" name="usual09" id="usual09_01" value="よく吸います" <?php if ($result['usual09'] == "よく吸います") echo 'checked'; ?>><label for="usual09_01">よく吸います</label>
                            <input required type="radio" name="usual09" id="usual09_02" value="嗜む程度です" <?php if ($result['usual09'] == "嗜む程度です") echo 'checked'; ?>><label for="usual09_02">嗜む程度です</label>
                            <input required type="radio" name="usual09" id="usual09_03" value="吸いません" <?php if ($result['usual09'] == "吸いません") echo 'checked'; ?>><label for="usual09_03">吸いません</label>
                        </div>
                </li>
                <li>    
                    <p>10.ギャンブル</p>
                        <div>
                            <input required type="radio" name="usual10" id="usual10_01" value="よくやります" <?php if ($result['usual10'] == "よくやります") echo 'checked'; ?>><label for="usual10_01">よくやります</label>
                            <input required type="radio" name="usual10" id="usual10_02" value="嗜む程度です" <?php if ($result['usual10'] == "嗜む程度です") echo 'checked'; ?>><label for="usual10_02">嗜む程度です</label>
                            <input required type="radio" name="usual10" id="usual10_03" value="やりません" <?php if ($result['usual10'] == "やりません") echo 'checked'; ?>><label for="usual10_03">やりません</label>
                        </div>
                </li>



                <a id="go_to_truth_02">次へ</a>

            </ul>
        </fieldset>
    </section>


    <section id="truth_02">
        <h2>【2/3】私の素顔図鑑</h2>

        <fieldset>
            <ul>
                <h3>■私の価値観</h3>
                <p>（4択）</p>
                <li>    
                    <p>1.仕事とは</p>
                        <div>
                            <input required type="radio" name="values01" id="values01_01" value="生きがいややりがい" <?php if ($result['values01'] === "生きがいややりがい") echo 'checked'; ?>><label for="values01_01">生きがいややりがい</label>
                            <input required type="radio" name="values01" id="values01_02" value="生活のために必要なもの" <?php if ($result['values01'] === "生活のために必要なもの") echo 'checked'; ?>><label for="values01_02">生活のために必要なもの</label>
                            <input required type="radio" name="values01" id="values01_03" value="つらく苦しいもの"  <?php if ($result['values01'] === "つらく苦しいもの") echo 'checked'; ?>><label for="values01_03">つらく苦しいもの</label>
                            <input required type="radio" name="values01" id="values01_04" value="できればやりたくないもの"  <?php if ($result['values01'] === "できればやりたくないもの") echo 'checked'; ?>><label for="values01_04">できればやりたくないもの</label>
                        </div>
                </li>
                <li>    
                    <p>2.家族とは</p>
                        <div>
                            <input required type="radio" name="values02" id="values02_01" value="なくてはならない大切なもの" <?php if ($result['values02'] == "なくてはならない大切なもの") echo 'checked'; ?>><label for="values02_01">なくてはならない大切なもの</label>
                            <input required type="radio" name="values02" id="values02_02" value="当たり前の空気のようなもの" <?php if ($result['values02'] == "当たり前の空気のようなもの") echo 'checked'; ?>><label for="values02_02">当たり前の空気のようなもの</label>
                            <input required type="radio" name="values02" id="values02_03" value="あまりいい思い出のないもの" <?php if ($result['values02'] == "あまりいい思い出のないもの") echo 'checked'; ?>><label for="values02_03">あまりいい思い出のないもの</label>
                            <input required type="radio" name="values02" id="values02_04" value="特に必要ないもの" <?php if ($result['values02'] == "特に必要ないもの") echo 'checked'; ?>><label for="values02_04">特に必要ないもの</label>
                        </div>
                </li>
                <li>    
                    <p>3.恋愛とは</p>
                        <div>
                            <input required type="radio" name="values03" id="values03_01" value="常にしていたいもの" <?php if ($result['values03'] == "常にしていたいもの") echo 'checked'; ?>><label for="values03_01">常にしていたいもの</label>
                            <input required type="radio" name="values03" id="values03_02" value="ときどき落ちるもの" <?php if ($result['values03'] == "ときどき落ちるもの") echo 'checked'; ?>><label for="values03_02">ときどき落ちるもの</label>
                            <input required type="radio" name="values03" id="values03_03" value="あまり縁がないもの" <?php if ($result['values03'] == "あまり縁がないもの") echo 'checked'; ?>><label for="values03_03">あまり縁がないもの</label>
                            <input required type="radio" name="values03" id="values03_04" value="それほど興味がないもの" <?php if ($result['values03'] == "それほど興味がないもの") echo 'checked'; ?>><label for="values03_04">それほど興味がないもの</label>
                        </div>
                </li>
                <li>    
                    <p>4.結婚とは</p>
                        <div>
                            <input required type="radio" name="values04" id="values04_01" value="してみたい／していたいもの" <?php if ($result['values04'] == "してみたい／していたいもの") echo 'checked'; ?>><label for="values04_01">してみたい／していたいもの</label>
                            <input required type="radio" name="values04" id="values04_02" value="多様であっていいもの" <?php if ($result['values04'] == "多様であっていいもの") echo 'checked'; ?>><label for="values04_02">多様であっていいもの</label>
                            <input required type="radio" name="values04" id="values04_03" value="既に過去のもの" <?php if ($result['values04'] == "既に過去のもの") echo 'checked'; ?>><label for="values04_03">既に過去のもの</label>
                            <input required type="radio" name="values04" id="values04_04" value="それほど興味がないもの" <?php if ($result['values04'] == "それほど興味がないもの") echo 'checked'; ?>><label for="values04_04">それほど興味がないもの</label>
                        </div>
                </li>
                <li>    
                    <p>5.友達とは</p>
                        <div>
                            <input required type="radio" name="values05" id="values05_01" value="ずっと変わらないもの" <?php if ($result['values05'] == "ずっと変わらないもの") echo 'checked'; ?>><label for="values05_01">ずっと変わらないもの</label>
                            <input required type="radio" name="values05" id="values05_02" value="ときどき時間を共有するもの" <?php if ($result['values05'] == "ときどき時間を共有するもの") echo 'checked'; ?>><label for="values05_02">ときどき時間を共有するもの</label>
                            <input required type="radio" name="values05" id="values05_03" value="時間と共に変わるもの" <?php if ($result['values05'] == "時間と共に変わるもの") echo 'checked'; ?>><label for="values05_03">時間と共に変わるもの</label>
                            <input required type="radio" name="values05" id="values05_04" value="それほど興味がないもの" <?php if ($result['values05'] == "それほど興味がないもの") echo 'checked'; ?>><label for="values05_04">それほど興味がないもの</label>
                        </div>
                </li>
                <li>    
                    <p>6.お金とは</p>
                        <div>
                            <input required type="radio" name="values06" id="values06_01" value="稼ぐのが楽しいもの" <?php if ($result['values06'] == "稼ぐのが楽しいもの") echo 'checked'; ?>><label for="values06_01">稼ぐのが楽しいもの</label>
                            <input required type="radio" name="values06" id="values06_02" value="必要のために稼ぐもの" <?php if ($result['values06'] == "必要のために稼ぐもの") echo 'checked'; ?>><label for="values06_02">必要のために稼ぐもの</label>
                            <input required type="radio" name="values06" id="values06_03" value="あまり縁がないもの" <?php if ($result['values06'] == "あまり縁がないもの") echo 'checked'; ?>><label for="values06_03">あまり縁がないもの</label>
                            <input required type="radio" name="values06" id="values06_04" value="それほど興味がないもの" <?php if ($result['values06'] == "それほど興味がないもの") echo 'checked'; ?>><label for="values06_04">それほど興味がないもの</label>
                        </div>
                </li>

                <h3>■私の性格（実は○○）</h3>
                <P>（最大３つ）</P>
                <div class="character">
                <ul>motivation
                    <li><P>【対人関係】</P></li>
                    <li><input type="checkbox" name="chara[]" class="chara" id="character01" value="【対人関係】社交的" onclick="click_cb();" <?php if ($result['chara01'] == "【対人関係】社交的" || $result['chara02'] == "【対人関係】社交的" || $result['chara03'] == "【対人関係】社交的") echo 'checked'; ?>><label for="character01">社交的</label></li>
                    <li><input type="checkbox" name="chara[]" class="chara" id="character02" value="【対人関係】人見知り" onclick="click_cb();" <?php if ($result['chara01'] == "【対人関係】人見知り" || $result['chara02'] == "【対人関係】人見知り" || $result['chara03'] == "【対人関係】人見知り") echo 'checked'; ?>><label for="character02">人見知り</label></li>
                    <li><input type="checkbox" name="chara[]" class="chara" id="character03" value="【対人関係】一人が好き" onclick="click_cb();" <?php if ($result['chara01'] == "【対人関係】一人が好き" || $result['chara02'] == "【対人関係】一人が好き" || $result['chara03'] == "【対人関係】一人が好き") echo 'checked'; ?>><label for="character03">一人が好き</label></li>
                    <li><input type="checkbox" name="chara[]" class="chara" id="character04" value="【対人関係】さみしがり" onclick="click_cb();" <?php if ($result['chara01'] == "【対人関係】さみしがり" || $result['chara02'] == "【対人関係】さみしがり" || $result['chara03'] == "【対人関係】さみしがり") echo 'checked'; ?>><label for="character04">さみしがり</label></li>
                    <li><input type="checkbox" name="chara[]" class="chara" id="character05" value="【対人関係】頼られたい" onclick="click_cb();" <?php if ($result['chara01'] == "【対人関係】頼られたい" || $result['chara02'] == "【対人関係】頼られたい" || $result['chara03'] == "【対人関係】頼られたい") echo 'checked'; ?>><label for="character05">頼られたい</label></li>
                    <li><input type="checkbox" name="chara[]" class="chara" id="character06" value="【対人関係】頼りたい" onclick="click_cb();" <?php if ($result['chara01'] == "【対人関係】頼りたい" || $result['chara02'] == "【対人関係】頼りたい" || $result['chara03'] == "【対人関係】頼りたい") echo 'checked'; ?>><label for="character06">頼りたい</label></li>
                    <li><input type="checkbox" name="chara[]" class="chara" id="character07" value="【対人関係】負けず嫌い" onclick="click_cb();" <?php if ($result['chara01'] == "【対人関係】負けず嫌い" || $result['chara02'] == "【対人関係】負けず嫌い" || $result['chara03'] == "【対人関係】負けず嫌い") echo 'checked'; ?>><label for="character07">負けず嫌い</label></li>
                    <li><input type="checkbox" name="chara[]" class="chara" id="character08" value="【対人関係】競争が苦手" onclick="click_cb();" <?php if ($result['chara01'] == "【対人関係】競争が苦手" || $result['chara02'] == "【対人関係】競争が苦手" || $result['chara03'] == "【対人関係】競争が苦手") echo 'checked'; ?>><label for="character08">競争が苦手</label></li>
                    <li><P>【対物関係】</P></li>
                    <li><input type="checkbox" name="chara[]" class="chara" id="character09" value="【対物関係】几帳面" onclick="click_cb();" <?php if ($result['chara01'] == "【対物関係】几帳面" || $result['chara02'] == "【対物関係】几帳面" || $result['chara03'] == "【対物関係】几帳面") echo 'checked'; ?>><label for="character09">几帳面</label></li>
                    <li><input type="checkbox" name="chara[]" class="chara" id="character10" value="【対物関係】大雑把" onclick="click_cb();" <?php if ($result['chara01'] == "【対物関係】大雑把" || $result['chara02'] == "【対物関係】大雑把" || $result['chara03'] == "【対物関係】大雑把") echo 'checked'; ?>><label for="character10">大雑把</label></li>
                    <li><input type="checkbox" name="chara[]" class="chara" id="character11" value="【対物関係】きれい好き" onclick="click_cb();" <?php if ($result['chara01'] == "【対物関係】きれい好き" || $result['chara02'] == "【対物関係】きれい好き" || $result['chara03'] == "【対物関係】きれい好き") echo 'checked'; ?>><label for="character11">きれい好き</label></li>
                    <li><input type="checkbox" name="chara[]" class="chara" id="character12" value="【対物関係】ずぼら" onclick="click_cb();" <?php if ($result['chara01'] == "【対物関係】ずぼら" || $result['chara02'] == "【対物関係】ずぼら" || $result['chara03'] == "【対物関係】ずぼら") echo 'checked'; ?>><label for="character12">ずぼら</label></li>
                    <li><input type="checkbox" name="chara[]" class="chara" id="character13" value="【対物関係】コレクター" onclick="click_cb();" <?php if ($result['chara01'] == "【対物関係】コレクター" || $result['chara02'] == "【対物関係】コレクター" || $result['chara03'] == "【対物関係】コレクター") echo 'checked'; ?>><label for="character13">コレクター</label></li>
                    <li><input type="checkbox" name="chara[]" class="chara" id="character14" value="【対物関係】断捨離好き" onclick="click_cb();" <?php if ($result['chara01'] == "【対物関係】断捨離好き" || $result['chara02'] == "【対物関係】断捨離好き" || $result['chara03'] == "【対物関係】断捨離好き") echo 'checked'; ?>><label for="character14">断捨離好き</label></li>
                    <li><input type="checkbox" name="chara[]" class="chara" id="character15" value="【対物関係】高級好き" onclick="click_cb();" <?php if ($result['chara01'] == "【対物関係】高級好き" || $result['chara02'] == "【対物関係】高級好き" || $result['chara03'] == "【対物関係】高級好き") echo 'checked'; ?>><label for="character15">高級好き</label></li>
                    <li><input type="checkbox" name="chara[]" class="chara" id="character16" value="【対物関係】チープ好き" onclick="click_cb();" <?php if ($result['chara01'] == "【対物関係】チープ好き" || $result['chara02'] == "【対物関係】チープ好き" || $result['chara03'] == "【対物関係】チープ好き") echo 'checked'; ?>><label for="character16">チープ好き</label></li>
                    <li><P>【状況対峙】</P></li>
                    <li><input type="checkbox" name="chara[]" class="chara" id="character17" value="【状況対峙】図太い" onclick="click_cb();" <?php if ($result['chara01'] == "【状況対峙】図太い" || $result['chara02'] == "【状況対峙】図太い" || $result['chara03'] == "【状況対峙】図太い") echo 'checked'; ?>><label for="character17">図太い</label></li>
                    <li><input type="checkbox" name="chara[]" class="chara" id="character18" value="【状況対峙】あがり症" onclick="click_cb();" <?php if ($result['chara01'] == "【状況対峙】あがり症" || $result['chara02'] == "【状況対峙】あがり症" || $result['chara03'] == "【状況対峙】あがり症") echo 'checked'; ?>><label for="character18">あがり症</label></li>
                    <li><input type="checkbox" name="chara[]" class="chara" id="character19" value="【状況対峙】スリル好き" onclick="click_cb();" <?php if ($result['chara01'] == "【状況対峙】スリル好き" || $result['chara02'] == "【状況対峙】スリル好き" || $result['chara03'] == "【状況対峙】スリル好き") echo 'checked'; ?>><label for="character19">スリル好き</label></li>
                    <li><input type="checkbox" name="chara[]" class="chara" id="character20" value="【状況対峙】怖がり" onclick="click_cb();" <?php if ($result['chara01'] == "【状況対峙】怖がり" || $result['chara02'] == "【状況対峙】怖がり" || $result['chara03'] == "【状況対峙】怖がり") echo 'checked'; ?>><label for="character20">怖がり</label></li>
                    <li><input type="checkbox" name="chara[]" class="chara" id="character21" value="【状況対峙】チャレンジャー" onclick="click_cb();" <?php if ($result['chara01'] == "【状況対峙】チャレンジャー" || $result['chara02'] == "【状況対峙】チャレンジャー" || $result['chara03'] == "【状況対峙】チャレンジャー") echo 'checked'; ?>><label for="character21">チャレンジャー</label></li>
                    <li><input type="checkbox" name="chara[]" class="chara" id="character22" value="【状況対峙】安定志向" onclick="click_cb();" <?php if ($result['chara01'] == "【状況対峙】安定志向" || $result['chara02'] == "【状況対峙】安定志向" || $result['chara03'] == "【状況対峙】安定志向") echo 'checked'; ?>><label for="character22">安定志向</label></li>
                    <li><input type="checkbox" name="chara[]" class="chara" id="character23" value="【状況対峙】粘り強い" onclick="click_cb();" <?php if ($result['chara01'] == "【状況対峙】粘り強い" || $result['chara02'] == "【状況対峙】粘り強い" || $result['chara03'] == "【状況対峙】粘り強い") echo 'checked'; ?>><label for="character23">粘り強い</label></li>
                    <li><input type="checkbox" name="chara[]" class="chara" id="character24" value="【状況対峙】あきらめが早い" onclick="click_cb();" <?php if ($result['chara01'] == "【状況対峙】あきらめが早い" || $result['chara02'] == "【状況対峙】あきらめが早い" || $result['chara03'] == "【状況対峙】あきらめが早い") echo 'checked'; ?>><label for="character24">あきらめが早い</label></li>
                    <li><P>【行動傾向】</P></li>
                    <li><input type="checkbox" name="chara[]" class="chara" id="character25" value="【行動傾向】外出好き  " onclick="click_cb();" <?php if ($result['chara01'] == "【行動傾向】外出好き" || $result['chara02'] == "【行動傾向】外出好き" || $result['chara03'] == "【行動傾向】外出好き") echo 'checked'; ?>><label for="character25">外出好き   </label></li>
                    <li><input type="checkbox" name="chara[]" class="chara" id="character26" value="【行動傾向】出不精" onclick="click_cb();" <?php if ($result['chara01'] == "【行動傾向】出不精" || $result['chara02'] == "【行動傾向】出不精"     || $result['chara03'] == "【行動傾向】出不精") echo 'checked'; ?>><label for="character26">出不精</label></li>
                    <li><input type="checkbox" name="chara[]" class="chara" id="character27" value="【行動傾向】すぐに行動する" onclick="click_cb();" <?php if ($result['chara01'] == "【行動傾向】すぐに行動する" || $result['chara02'] == "【行動傾向】すぐに行動する" || $result['chara03'] == "【行動傾向】すぐに行動する") echo 'checked'; ?>><label for="character27">すぐに行動する</label></li>
                    <li><input type="checkbox" name="chara[]" class="chara" id="character28" value="【行動傾向】じっくり考える" onclick="click_cb();" <?php if ($result['chara01'] == "【行動傾向】じっくり考える" || $result['chara02'] == "【行動傾向】じっくり考える" || $result['chara03'] == "【行動傾向】じっくり考える") echo 'checked'; ?>><label for="character28">じっくり考える</label></li>
                    <li><input type="checkbox" name="chara[]" class="chara" id="character29" value="【行動傾向】探求好き" onclick="click_cb();" <?php if ($result['chara01'] == "【行動傾向】探求好き" || $result['chara02'] == "【行動傾向】探求好き" || $result['chara03'] == "【行動傾向】探求好き") echo 'checked'; ?>><label for="character29">探求好き</label></li>
                    <li><input type="checkbox" name="chara[]" class="chara" id="character30" value="【行動傾向】飽きっぽい" onclick="click_cb();" <?php if ($result['chara01'] == "【行動傾向】飽きっぽい" || $result['chara02'] == "【行動傾向】飽きっぽい" || $result['chara03'] == "【行動傾向】飽きっぽい") echo 'checked'; ?>><label for="character30">飽きっぽい</label></li>
                    <li><input type="checkbox" name="chara[]" class="chara" id="character31" value="【行動傾向】せっかち" onclick="click_cb();" <?php if ($result['chara01'] == "【行動傾向】せっかち" || $result['chara02'] == "【行動傾向】せっかち" || $result['chara03'] == "【行動傾向】せっかち") echo 'checked'; ?>><label for="character31" >せっかち</label></li>
                    <li><input type="checkbox" name="chara[]" class="chara" id="character32" value="【行動傾向】おっとり" onclick="click_cb();" <?php if ($result['chara01'] == "【行動傾向】おっとり" || $result['chara02'] == "【行動傾向】おっとり" || $result['chara03'] == "【行動傾向】おっとり") echo 'checked'; ?>><label for="character32" >おっとり</label></li>
                    <li><P>【内面感情】</P></li>
                    <li><input type="checkbox" name="chara[]" class="chara" id="character33" value="【内面感情】穏やか" onclick="click_cb();" <?php if ($result['chara01'] == "【内面感情】穏やか" || $result['chara02'] == "【内面感情】穏やか" || $result['chara03'] == "【内面感情】穏やか") echo 'checked'; ?>><label for="character33">穏やか</label></li>
                    <li><input type="checkbox" name="chara[]" class="chara" id="character34" value="【内面感情】怒りっぽい" onclick="click_cb();" <?php if ($result['chara01'] == "【内面感情】怒りっぽい" || $result['chara02'] == "【内面感情】怒りっぽい" || $result['chara03'] == "【内面感情】怒りっぽい") echo 'checked'; ?>><label for="character34">怒りっぽい</label></li>
                    <li><input type="checkbox" name="chara[]" class="chara" id="character35" value="【内面感情】笑い上戸" onclick="click_cb();" <?php if ($result['chara01'] == "【内面感情】笑い上戸" || $result['chara02'] == "【内面感情】笑い上戸" || $result['chara03'] == "【内面感情】笑い上戸") echo 'checked'; ?>><label for="character35">笑い上戸</label></li>
                    <li><input type="checkbox" name="chara[]" class="chara" id="character36" value="【内面感情】泣き虫" onclick="click_cb();" <?php if ($result['chara01'] == "【内面感情】泣き虫" || $result['chara02'] == "【内面感情】泣き虫" || $result['chara03'] == "【内面感情】泣き虫") echo 'checked'; ?>><label for="character36">泣き虫</label></li>
                    <li><input type="checkbox" name="chara[]" class="chara" id="character37" value="【内面感情】切り替えが早い" onclick="click_cb();" <?php if ($result['chara01'] == "【内面感情】切り替えが早い" || $result['chara02'] == "【内面感情】切り替えが早い" || $result['chara03'] == "【内面感情】切り替えが早い") echo 'checked'; ?>><label for="character37">切り替えが早い</label></li>
                    <li><input type="checkbox" name="chara[]" class="chara" id="character38" value="【内面感情】失敗を引きずる" onclick="click_cb();" <?php if ($result['chara01'] == "【内面感情】失敗を引きずる" || $result['chara02'] == "【内面感情】失敗を引きずる" || $result['chara03'] == "【内面感情】失敗を引きずる") echo 'checked'; ?>><label for="character38">失敗を引きずる</label></li>
                    <li><input type="checkbox" name="chara[]" class="chara" id="character39" value="【内面感情】自分大好き" onclick="click_cb();" <?php if ($result['chara01'] == "【内面感情】自分大好き" || $result['chara02'] == "【内面感情】自分大好き" || $result['chara03'] == "【内面感情】自分大好き") echo 'checked'; ?>><label for="character39">自分大好き</label></li>
                    <li><input type="checkbox" name="chara[]" class="chara" id="character40" value="【内面感情】コンプレックスの塊" onclick="click_cb();" <?php if ($result['chara01'] == "【内面感情】コンプレックスの塊" || $result['chara02'] == "【内面感情】コンプレックスの塊" || $result['chara03'] == "【内面感情】コンプレックスの塊") echo 'checked'; ?>><label for="character40">コンプレックスの塊</label></li>
                </ul>
                </div>

                <a id="back_to_truth_01">戻る</a>
                <a id="go_to_truth_03">次へ</a>
            </ul>
        </fieldset>
    </section>


    <section id="truth_03">
        <h2>【3/3】私の素顔図鑑</h2>

        <fieldset>
            <ul>
                <h3>■私の自画像</h3>
                <p>（各200文字以内）</p>

                    <li><P>自分の性格をひとことで！</P></li>
                    <li id="js_phrase"><input type="textarea" maxlength=200 name="phrase" value="<?= $result['phrase'] ?>"></li>
                    <li><P>自分自身の好きな部分</P></li>
                    <li id="js_ilike"><input type="textarea" maxlength=200 name="ilike" value="<?= $result['ilike'] ?>"></li>
                    <li><P>自分自身の嫌いな部分</P></li>
                    <li id="js_dislike"><input type="textarea" maxlength=200 name="dislike" value="<?= $result['dislike'] ?>"></li>
                    <li><P>密かな悩みやコンプレックス</P></li>
                    <li id="js_complex"><input type="textarea" maxlength=200 name="complex" value="<?= $result['complex'] ?>"></li>


                <a id="back_to_truth_02">戻る</a>
                <a id="submit">登録</a>
            
            </ul>
        </fieldset>
    </section>
    
</form>

   
    
<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- JQuery -->


<script>

// 画面遷移
$('#truth_01').show();
$('#truth_02').hide();
$('#truth_03').hide();


$("#go_to_truth_02").on('click',function(){
    $('#truth_01').toggle();  //hide
    $('#truth_02').toggle();  //show
    $("html,body").scrollTop(0); // 画面の一番上にスクロール
    // $('#forMyTeam').hide();
});

$("#back_to_truth_01").on('click',function() {
    $('#truth_01').toggle();  //show
    $('#truth_02').toggle();  // hide
    // $('#forMyTeam').hide();
    $("html,body").scrollTop(0); // 画面の一番上にスクロール
});

$("#go_to_truth_03").on('click',function() {
    // $('#forMyColleague').hide();
    $('#truth_02').toggle();  //hide
    $('#truth_03').toggle();  //show
    $("html,body").scrollTop(0); // 画面の一番上にスクロール
});

$("#back_to_truth_02").on('click',function(){
    // $('#forMyColleague').hide();
    $('#truth_02').toggle();  //show
    $('#truth_03').toggle();  //hide
    $("html,body").scrollTop(0); // 画面の一番上にスクロール
});



// セレクトボックスの上限設定
function click_cb(){
    //チェックカウント用変数
    var check_count = 0;
    // 箇所チェック数カウント
    $(".character ul li").each(function(){
        var parent_checkbox = $(this).children("input[type='checkbox']");
        if(parent_checkbox.prop('checked')){
            check_count = check_count+1;
        }
    });
    // 0個のとき（チェックがすべて外れたとき）
    if(check_count == 0){
        $(".character ul li").each(function(){
            $(this).find(".locked").removeClass("locked");
        });
    // 3個以上の時（チェック可能上限数）
    }else if(check_count > 2){
        $(".character ul li").each(function(){
            // チェックされていないチェックボックスをロックする
            if(!$(this).children("input[type='checkbox']").prop('checked')){
                $(this).children("input[type='checkbox']").prop('disabled',true);
                $(this).addClass("locked");
            }
        });
    }else{
        $(".character ul li").each(function(){
            // チェックされていないチェックボックスを選択可能にする
            if(!$(this).children("input[type='checkbox']").prop('checked')){
                $(this).children("input[type='checkbox']").prop('disabled',false);
                $(this).removeClass("locked");
            }
        });
    }
    return false;
}


// ボタンクリックでフォームを送信

$("#submit").click(function(){

// ※確認用※チェックボックスの値を配列に格納

// // 配列を宣言
//   var arr_chara = [];
  
//   $('[class="chara"]:checked').each(function(){
//       // 無効化する
//       $(this).prop('disabled', true);
   
//       // チェックされているの値を配列に格納
//       arr_chara.push($(this).val());
//   });
//   console.log(arr_chara);


$('#truth').submit();

});





</script>


</body>

</html>