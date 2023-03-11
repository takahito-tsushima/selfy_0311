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
    <title>【 Selfy 】「私の写真」の登録</title>

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<h1>「私の写真」の登録</h1>
    
<form method="POST" action="update00_photo.php" id="photo" name="photo" enctype="multipart/form-data">


<section id="photo_01">
        <h2>【1/1】私の写真</h2>

        <fieldset>
            <ul>
            <h3>■オン / ON の写真</h3>
            <p class="photo_on"><img src="https://placehold.jp/c9c9c9/ffffff/600×600.png?text=%E3%83%80%E3%83%9F%E3%83%BC%E7%94%BB%E5%83%8F" width="200"></p>

                <li><P>アップロードする画像ファイルを選択する:</P></li>
                <li><input type="file" name="photo_on" id="photo_on" accept="image/*" size="35"></li>

            <h3>■オフ / OFF の写真</h3>
            <p class="photo_off"><img src="https://placehold.jp/c9c9c9/ffffff/600×600.png?text=%E3%83%80%E3%83%9F%E3%83%BC%E7%94%BB%E5%83%8F" width="200"></p>

                <li><P>アップロードする画像ファイルを選択する:</P></li>
                <li><input type="file" name="photo_off" id="photo_off" accept="image/*" size="35"></li>

            <h3>■私のキャッチコピー</h3>
                <li id="js_catch_phrase"><input type="text" maxlength=12 id="js_catch_phrase" name="catch_phrase"></li>


            <a id="submit">送信</a>

            </ul>
        </fieldset>
    </section>
    
</form>



   
    
<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- JQuery -->





<!-- ↓↓ ILTyのコードよりコピペ -->

<script src="http://code.jquery.com/jquery-3.0.0.js"></script>
<script>
//---------------------------------------------------
//画像サムネイル表示
//---------------------------------------------------
// アップロードするファイルを選択
$('#photo_on').change(function() {
  //選択したファイルを取得し、file変数に格納
  var file = $(this).prop('files')[0];
  // 画像以外は処理を停止
  if (!file.type.match('image.*')) {
    // クリア
    $(this).val(''); //選択されてるファイルを空にする
    $('.photo_on > img').html(''); //画像表示箇所を空にする
    return;
  }
  // 画像表示
  var reader = new FileReader(); //1
  reader.onload = function() {   //2
    $('.photo_on > img').attr('src', reader.result);
  }
  reader.readAsDataURL(file);    //3
});

$('#photo_off').change(function() {
  //選択したファイルを取得し、file変数に格納
  var file = $(this).prop('files')[0];
  // 画像以外は処理を停止
  if (!file.type.match('image.*')) {
    // クリア
    $(this).val(''); //選択されてるファイルを空にする
    $('.photo_off > img').html(''); //画像表示箇所を空にする
    return;
  }
  // 画像表示
  var reader = new FileReader(); //1
  reader.onload = function() {   //2
    $('.photo_off > img').attr('src', reader.result);
  }
  reader.readAsDataURL(file);    //3
});



// ボタンクリックでフォームを送信

$("#submit").click(function(){

$('#photo').submit();

});



</script>


</body>

</html>

