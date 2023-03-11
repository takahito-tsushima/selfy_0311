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
                <h3>■基本情報</h3>

                    <li><P>居住エリア</P></li>
                    <li id="js_residence_area"><input type="text" maxlength=20 id="js_residence" name="residence"></li>
                    <li><P>家族構成</P></li>
                    <li id="js_family_area"><input type="text" maxlength=30 id="js_family" name="family"></li>
                    <li><P>趣味</P></li>
                    <li id="js_hobby_area"><input type="text" maxlength=30 id="js_hobby" name="hobby"></li>

                    <li><P>睡眠時間（平日）</P></li>
                    <ul id="js_sleep_weekday" class="sleep_weekday" name="sleep_weekday">
                        <li>
                            <select name="time_weekday" id="js_time_weekday"></select><label>時間</label>  
                        </li>
                    </ul>
                    <li><P>睡眠時間（休日）</P></li>
                    <ul id="js_sleep_weekend" class="sleep_weekend" name="sleep_weekend">
                        <li>
                            <select name="time_weekend" id="js_time_weekend"></select><label>時間</label>  
                        </li>
                    </ul>
                    <li><P>Facebook</P></li>
                    <li id="js_facebook"><input type="url" id="js_facebook" name="facebook"></li>                            
                    <li><P>Instagram</P></li>
                    <li id="js_instagram"><input type="url" id="js_instagram" name="instagram"></li>                            
                    <li><P>Twitter</P></li>
                    <li id="js_twitter"><input type="url" id="js_twitter" name="twitter"></li>                            

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
                    <li id="js_holiday"><input type="textarea" maxlength=200 id="js_holiday" name="holiday"></li>
                    <li><P>興味関心のあること   </P></li>
                    <li id="js_interest"><input type="textarea" maxlength=200 id="js_interest" name="interest"></li>
                    <li><P>ハマっているもの</P></li>
                    <li id="js_crazy"><input type="textarea" maxlength=200 id="js_crazy" name="crazy"></li>
                    <li><P>最近好きになったもの</P></li>
                    <li id="js_love"><input type="textarea" maxlength=200 id="js_love" name="love"></li>
                    <li><P>大切にしているもの</P></li>
                    <li id="js_important"><input type="textarea" maxlength=200 id="js_important" name="important"></li>
                    <li><P>自慢のコレクション</P></li>
                    <li id="js_collection"><input type="textarea" maxlength=200 id="js_collection" name="collection"></li>
                    <li><P>一番高価な買い物</P></li>
                    <li id="js_expensive"><input type="textarea" maxlength=200 id="js_expensive" name="expensive"></li>
                    <li><P>尊敬する人や憧れの人</P></li>
                    <li id="js_respect"><input type="textarea" maxlength=200 id="js_respect" name="respect"></li>


                <a id="back_to_profileOff_01">戻る</a>
                <a id="submit">送信</a>
            
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