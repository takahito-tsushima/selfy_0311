<?php

// SESSION開始！！
session_start();
// 関数群の読み込み
require_once('funcs.php');
// ログインチェック処理！
loginCheck();


//1. POSTデータ取得
$lid = $_SESSION['lid'];

$usual01 = $_POST['usual01'];
$usual02 = $_POST['usual02'];
$usual03 = $_POST['usual03'];
$usual04 = $_POST['usual04'];
$usual05 = $_POST['usual05'];
$usual06 = $_POST['usual06'];
$usual07 = $_POST['usual07'];
$usual08 = $_POST['usual08'];
$usual09 = $_POST['usual09'];
$usual10 = $_POST['usual10'];
$values01 = $_POST['values01'];
$values02 = $_POST['values02'];
$values03 = $_POST['values03'];
$values04 = $_POST['values04'];
$values05 = $_POST['values05'];
$values06 = $_POST['values06'];
$chara01 = $_POST['chara'][0];
$chara02 = $_POST['chara'][1];
$chara03 = $_POST['chara'][2];
$phrase = $_POST['phrase'];
$ilike = $_POST['ilike'];
$dislike = $_POST['dislike'];
$complex = $_POST['complex'];


//2. DB接続します   try=内容を実行  catch=エラーがあれば処理を止めて以下を実行
$pdo = db_conn();


//３．データ登録SQL作成

// 1. SQL文を用意    【 処理の内容 を記述 】
$stmt = $pdo->prepare('UPDATE register04_truth SET

    usual01 = :usual01,
    usual02 = :usual02,
    usual03 = :usual03,
    usual04 = :usual04,
    usual05 = :usual05,
    usual06 = :usual06,
    usual07 = :usual07,
    usual08 = :usual08,
    usual09 = :usual09,
    usual10 = :usual10,
    values01 = :values01,
    values02 = :values02,
    values03 = :values03,
    values04 = :values04,
    values05 = :values05,
    values06 = :values06,
    chara01 = :chara01,
    chara02 = :chara02,
    chara03 = :chara03,
    phrase = :phrase,
    ilike = :ilike,
    dislike = :dislike,
    complex = :complex,
    date = sysdate()

  where lid = :lid'
  
  );
                    


//  2. バインド変数を用意    【 SQL injection 攻撃の回避 】
// ※フォームからそのままデータを取り込むのは危険 → :○○と置いてから取り込み処理を実行

// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR

$stmt->bindValue(':lid', $lid, PDO::PARAM_STR); 
$stmt->bindValue(':usual01', $usual01, PDO::PARAM_STR);
$stmt->bindValue(':usual02', $usual02, PDO::PARAM_STR);
$stmt->bindValue(':usual03', $usual03, PDO::PARAM_STR);
$stmt->bindValue(':usual04', $usual04, PDO::PARAM_STR);
$stmt->bindValue(':usual05', $usual05, PDO::PARAM_STR);
$stmt->bindValue(':usual06', $usual06, PDO::PARAM_STR);
$stmt->bindValue(':usual07', $usual07, PDO::PARAM_STR);
$stmt->bindValue(':usual08', $usual08, PDO::PARAM_STR);
$stmt->bindValue(':usual09', $usual09, PDO::PARAM_STR);
$stmt->bindValue(':usual10', $usual10, PDO::PARAM_STR);
$stmt->bindValue(':values01', $values01, PDO::PARAM_STR);
$stmt->bindValue(':values02', $values02, PDO::PARAM_STR);
$stmt->bindValue(':values03', $values03, PDO::PARAM_STR);
$stmt->bindValue(':values04', $values04, PDO::PARAM_STR);
$stmt->bindValue(':values05', $values05, PDO::PARAM_STR);
$stmt->bindValue(':values06', $values06, PDO::PARAM_STR);
$stmt->bindValue(':chara01', $chara01, PDO::PARAM_STR);
$stmt->bindValue(':chara02', $chara02, PDO::PARAM_STR);
$stmt->bindValue(':chara03', $chara03, PDO::PARAM_STR);
$stmt->bindValue(':phrase', $phrase, PDO::PARAM_STR);
$stmt->bindValue(':ilike', $ilike, PDO::PARAM_STR);
$stmt->bindValue(':dislike', $dislike, PDO::PARAM_STR);
$stmt->bindValue(':complex', $complex, PDO::PARAM_STR);



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
