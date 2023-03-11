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
$stmt = $pdo->prepare('SELECT * FROM register03_off where lid = :lid');
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
    <title>【 Selfy 】「私のプロフ」の登録 - オフの私 / OFF</title>

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<h1>「オフの私 / OFF」の登録</h1>
    
<form method="POST" action="update03_off.php" id="profileOFF" name="profileOFF">


    <section id="profileOff_01">
        <h2>【1/2】オフの私 / OFF</h2>

        <fieldset>
            <UL>
                <h3>■休日の私をひとことで</h3>
                    <li id="js_catch_phrase_off"><input type="text" maxlength=20 name="catch_phrase_off" value="<?= $result['catch_phrase_off'] ?>"></li>

                <h3>■基本情報</h3>

                    <li><P>居住エリア</P></li>
                    <li ><input type="text" maxlength=20  name="residence" value="<?= $result['residence'] ?>"></li>
                    <li><P>家族構成</P></li>
                    <li ><input type="text" maxlength=30  name="family" value="<?= $result['family'] ?>"></li>
                    <li><P>趣味</P></li>
                    <li ><input type="text" maxlength=30  name="hobby" value="<?= $result['hobby'] ?>"></li>

                    <li><P>睡眠時間（平日）</P></li>
                    <ul  class="sleep_weekday" name="sleep_weekday">
                        <li>
                            <select name="time_weekday">
                                <option value="" <?php if ($result['time_weekday'] == "") echo 'selected'; ?>>時間を選択</option>
                                <option value="0" <?php if ($result['time_weekday'] == "0") echo 'selected'; ?>>0</option>    
                                <option value="1" <?php if ($result['time_weekday'] == "1") echo 'selected'; ?>>1</option>    
                                <option value="2" <?php if ($result['time_weekday'] == "2") echo 'selected'; ?>>2</option>    
                                <option value="3" <?php if ($result['time_weekday'] == "3") echo 'selected'; ?>>3</option>    
                                <option value="4" <?php if ($result['time_weekday'] == "4") echo 'selected'; ?>>4</option>    
                                <option value="5" <?php if ($result['time_weekday'] == "5") echo 'selected'; ?>>5</option>    
                                <option value="6" <?php if ($result['time_weekday'] == "6") echo 'selected'; ?>>6</option>    
                                <option value="7" <?php if ($result['time_weekday'] == "7") echo 'selected'; ?>>7</option>    
                                <option value="8" <?php if ($result['time_weekday'] == "8") echo 'selected'; ?>>8</option>    
                                <option value="9" <?php if ($result['time_weekday'] == "9") echo 'selected'; ?>>9</option>    
                                <option value="10" <?php if ($result['time_weekday'] == "10") echo 'selected'; ?>>10</option>    
                                <option value="11" <?php if ($result['time_weekday'] == "11") echo 'selected'; ?>>11</option>    
                                <option value="12" <?php if ($result['time_weekday'] == "12") echo 'selected'; ?>>12</option>    
                                <option value="13" <?php if ($result['time_weekday'] == "13") echo 'selected'; ?>>13</option>    
                                <option value="14" <?php if ($result['time_weekday'] == "14") echo 'selected'; ?>>14</option>    
                                <option value="15" <?php if ($result['time_weekday'] == "15") echo 'selected'; ?>>15</option>    
                                <option value="16" <?php if ($result['time_weekday'] == "16") echo 'selected'; ?>>16</option>    
                                <option value="17" <?php if ($result['time_weekday'] == "17") echo 'selected'; ?>>17</option>    
                                <option value="18" <?php if ($result['time_weekday'] == "18") echo 'selected'; ?>>18</option>    
                                <option value="19" <?php if ($result['time_weekday'] == "19") echo 'selected'; ?>>19</option>    
                                <option value="20" <?php if ($result['time_weekday'] == "20") echo 'selected'; ?>>20</option>    
                                <option value="21" <?php if ($result['time_weekday'] == "21") echo 'selected'; ?>>21</option>    
                                <option value="22" <?php if ($result['time_weekday'] == "22") echo 'selected'; ?>>22</option>    
                                <option value="23" <?php if ($result['time_weekday'] == "23") echo 'selected'; ?>>23</option>    
                                <option value="24" <?php if ($result['time_weekday'] == "24") echo 'selected'; ?>>24</option>    
                            </select><label>時間</label> 
                        </li>
                    </ul>
                    <li><P>睡眠時間（休日）</P></li>
                    <ul  class="sleep_weekend" name="sleep_weekend">
                        <li>
                        <select name="time_weekend">
                                <option value="" <?php if ($result['time_weekend'] == "") echo 'selected'; ?>>時間を選択</option>
                                <option value="0" <?php if ($result['time_weekend'] == "0") echo 'selected'; ?>>0</option>    
                                <option value="1" <?php if ($result['time_weekend'] == "1") echo 'selected'; ?>>1</option>    
                                <option value="2" <?php if ($result['time_weekend'] == "2") echo 'selected'; ?>>2</option>    
                                <option value="3" <?php if ($result['time_weekend'] == "3") echo 'selected'; ?>>3</option>    
                                <option value="4" <?php if ($result['time_weekend'] == "4") echo 'selected'; ?>>4</option>    
                                <option value="5" <?php if ($result['time_weekend'] == "5") echo 'selected'; ?>>5</option>    
                                <option value="6" <?php if ($result['time_weekend'] == "6") echo 'selected'; ?>>6</option>    
                                <option value="7" <?php if ($result['time_weekend'] == "7") echo 'selected'; ?>>7</option>    
                                <option value="8" <?php if ($result['time_weekend'] == "8") echo 'selected'; ?>>8</option>    
                                <option value="9" <?php if ($result['time_weekend'] == "9") echo 'selected'; ?>>9</option>    
                                <option value="10" <?php if ($result['time_weekend'] == "10") echo 'selected'; ?>>10</option>    
                                <option value="11" <?php if ($result['time_weekend'] == "11") echo 'selected'; ?>>11</option>    
                                <option value="12" <?php if ($result['time_weekend'] == "12") echo 'selected'; ?>>12</option>    
                                <option value="13" <?php if ($result['time_weekend'] == "13") echo 'selected'; ?>>13</option>    
                                <option value="14" <?php if ($result['time_weekend'] == "14") echo 'selected'; ?>>14</option>    
                                <option value="15" <?php if ($result['time_weekend'] == "15") echo 'selected'; ?>>15</option>    
                                <option value="16" <?php if ($result['time_weekend'] == "16") echo 'selected'; ?>>16</option>    
                                <option value="17" <?php if ($result['time_weekend'] == "17") echo 'selected'; ?>>17</option>    
                                <option value="18" <?php if ($result['time_weekend'] == "18") echo 'selected'; ?>>18</option>    
                                <option value="19" <?php if ($result['time_weekend'] == "19") echo 'selected'; ?>>19</option>    
                                <option value="20" <?php if ($result['time_weekend'] == "20") echo 'selected'; ?>>20</option>    
                                <option value="21" <?php if ($result['time_weekend'] == "21") echo 'selected'; ?>>21</option>    
                                <option value="22" <?php if ($result['time_weekend'] == "22") echo 'selected'; ?>>22</option>    
                                <option value="23" <?php if ($result['time_weekend'] == "23") echo 'selected'; ?>>23</option>    
                                <option value="24" <?php if ($result['time_weekend'] == "24") echo 'selected'; ?>>24</option>    
                            </select><label>時間</label> 
                        </li>
                    </ul>
                    <li><P>Facebook</P></li>
                    <li ><input type="url"  name="facebook" value="<?= $result['facebook'] ?>"></li>                            
                    <li><P>Instagram</P></li>
                    <li ><input type="url"  name="instagram" value="<?= $result['instagram'] ?>"></li>                            
                    <li><P>Twitter</P></li>
                    <li ><input type="url"  name="twitter" value="<?= $result['twitter'] ?>"></li>                            

                <a id="go_to_profileOff_02">次へ</a>

            </ul>
        </fieldset>
    </section>


    <section id="profileOff_02">
        <h2>【2/2】オフの私 / OFF</h2>

        <fieldset>
            <ul>
                <h3>■私のお気に入り</h3>
                <p>（各200文字以内）</p>

                    <li><P>休日の過ごし方</P></li>
                    <li id="js_holiday"><input type="textarea" maxlength=200 id="js_holiday" name="holiday" value="<?= $result['holiday'] ?>"></li>
                    <li><P>興味関心のあること   </P></li>
                    <li id="js_interest"><input type="textarea" maxlength=200 id="js_interest" name="interest" value="<?= $result['interest'] ?>"></li>
                    <li><P>ハマっているもの</P></li>
                    <li id="js_crazy"><input type="textarea" maxlength=200 id="js_crazy" name="crazy" value="<?= $result['crazy'] ?>"></li>
                    <li><P>最近好きになったもの</P></li>
                    <li id="js_love"><input type="textarea" maxlength=200 id="js_love" name="love" value="<?= $result['love'] ?>"></li>
                    <li><P>大切にしているもの</P></li>
                    <li id="js_important"><input type="textarea" maxlength=200 id="js_important" name="important" value="<?= $result['important'] ?>"></li>
                    <li><P>自慢のコレクション</P></li>
                    <li id="js_collection"><input type="textarea" maxlength=200 id="js_collection" name="collection" value="<?= $result['collection'] ?>"></li>
                    <li><P>一番高価な買い物</P></li>
                    <li id="js_expensive"><input type="textarea" maxlength=200 id="js_expensive" name="expensive" value="<?= $result['expensive'] ?>"></li>
                    <li><P>尊敬する人や憧れの人</P></li>
                    <li id="js_respect"><input type="textarea" maxlength=200 id="js_respect" name="respect" value="<?= $result['respect'] ?>"></li>


                <a id="back_to_profileOff_01">戻る</a>
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
$('#profileOff_01').show();
$('#profileOff_02').hide();

$("#go_to_profileOff_02").on('click',function(){
    $('#profileOff_01').toggle();  //hide
    $('#profileOff_02').toggle();  //show
    $("html,body").scrollTop(0); // 画面の一番上にスクロール
});

$("#back_to_profileOff_01").on('click',function() {
    $('#profileOff_01').toggle();  //show
    $('#profileOff_02').toggle();  // hide
    $("html,body").scrollTop(0); // 画面の一番上にスクロール
});


// 睡眠時間のプルダウン作成
function SelectBoxCreate(start, end){
    let str = "";
    for(let i=start; i<end; i++){
        str += `<option>${i}</option>`;
    }
    return str;
}

const hour = SelectBoxCreate(0,25);

$("#js_time_weekday").html(hour);    
$("#js_time_weekend").html(hour);    



// ボタンクリックでフォームを送信

$("#submit").click(function(){

$('#profileOFF').submit();

});



</script>


</body>

</html>