<?php

// SESSION開始！！
session_start();
// 関数群の読み込み
require_once('funcs.php');
// ログインチェック処理！
loginCheck();


// ※ILTy動画より  ---- 入力チェック ---
// もしも、送られてこない or 空欄である 場合 ⇒ エラーを表示

// if (!isset($_POST["catch_phrase"]) || $_POST["catch_phrase"]==""){
//   exit("Parameter Error! catch Phrase!");
// }

// if (!isset($_FILES["photo_on"]["name"]) || $_FILES["photo_on"]["name"]==""){
//   exit("Parameter Error! photo_on!");
// }

// if (!isset($_FILES["photo_off"]["name"]) || $_FILES["photo_off"]["name"]==""){
//   exit("Parameter Error! photo_off!");
// }


//1. POSTデータ取得
$lid = $_SESSION['lid'];

// もしも、送られてこない or 空欄である 場合 ⇒ 既存ファイルのまま
// if (!isset($_FILES["photo_on"]["name"]) || $_FILES["photo_on"]["name"]==""){ 
// ;
// }else{$photo_on = date('YmdHis') . "_" . $_FILES["photo_on"]["name"];
// };
// if (!isset($_FILES["photo_off"]["name"]) || $_FILES["photo_off"]["name"]==""){ 
// ;
// }else{$photo_off = date('YmdHis') . "_" . $_FILES["photo_off"]["name"];
// };
// if (!isset($_FILES["photo_old"]["name"]) || $_FILES["photo_old"]["name"]==""){ 
// ;
// }else{$photo_old = date('YmdHis') . "_" . $_FILES["photo_old"]["name"];
// };

$photo_on = date('YmdHis') . "_" . $_FILES["photo_on"]["name"];
$photo_off = date('YmdHis') . "_" . $_FILES["photo_off"]["name"];
$photo_old = date('YmdHis') . "_" . $_FILES["photo_old"]["name"];


// ファイル名を決定。日付時間をファイル名に付与して、同じ名前をアップロードされても重複しないようにする。


//1-2. FileUpload処理
$upload = "./img/"; //画像アップロードフォルダへのパス
//アップロードした画像を./img/へ移動させる記述↓

if(move_uploaded_file($_FILES['photo_on']['tmp_name'], $upload.$photo_on)){
  //FileUpload:OK
} else {
  //FileUpload:NG
  echo "Upload failed";
  echo $_FILES['photo_on']['error'];
}

if(move_uploaded_file($_FILES['photo_off']['tmp_name'], $upload.$photo_off)){
  //FileUpload:OK
} else {
  //FileUpload:NG
  echo "Upload failed";
  echo $_FILES['photo_off']['error'];
}

if(move_uploaded_file($_FILES['photo_old']['tmp_name'], $upload.$photo_old)){
  //FileUpload:OK
} else {
  //FileUpload:NG
  echo "Upload failed";
  echo $_FILES['photo_old']['error'];
}


//2. DB接続します   try=内容を実行  catch=エラーがあれば処理を止めて以下を実行
$pdo = db_conn();


//３．データ登録SQL作成

// 1. SQL文を用意    【 処理の内容 を記述 】
$stmt = $pdo->prepare('UPDATE register00_photo SET
      photo_on = :photo_on,
      photo_off = :photo_off,
      photo_old = :photo_old,
      date = sysdate()
                        
    where lid = :lid'
  
    );

    
//  2. バインド変数を用意    【 SQL injection 攻撃の回避 】
// ※フォームからそのままデータを取り込むのは危険 → :○○と置いてから取り込み処理を実行

// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR

$stmt->bindValue(':lid', $lid, PDO::PARAM_STR); 
$stmt->bindValue(':photo_on', $photo_on, PDO::PARAM_STR);
$stmt->bindValue(':photo_off', $photo_off, PDO::PARAM_STR);
$stmt->bindValue(':photo_old', $photo_old, PDO::PARAM_STR);


//  3. 実行
$status = $stmt->execute();


//４．データ登録処理後
if($status === false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit('ErrorMessage:'.$error[2]);
}else{



  
  //５．index.phpへリダイレクト
header('Location: index.php');
}


?>
