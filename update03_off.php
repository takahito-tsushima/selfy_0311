<?php

// SESSION開始！！
session_start();
// 関数群の読み込み
require_once('funcs.php');
// ログインチェック処理！
loginCheck();


//1. POSTデータ取得
$lid = $_SESSION['lid'];

$catch_phrase_off = $_POST['catch_phrase_off'];
$residence = $_POST['residence'];
$family = $_POST['family'];
$hobby = $_POST['hobby'];
$time_weekday = $_POST['time_weekday'];
$time_weekend = $_POST['time_weekend'];
$facebook = $_POST['facebook'];
$instagram = $_POST['instagram'];
$twitter = $_POST['twitter'];
$holiday = $_POST['holiday'];
$interest = $_POST['interest'];
$crazy = $_POST['crazy'];
$love = $_POST['love'];
$important = $_POST['important'];
$collection = $_POST['collection'];
$expensive = $_POST['expensive'];
$respect = $_POST['respect'];


//2. DB接続します   try=内容を実行  catch=エラーがあれば処理を止めて以下を実行
$pdo = db_conn();


//３．データ登録SQL作成

// 1. SQL文を用意    【 処理の内容 を記述 】
$stmt = $pdo->prepare('UPDATE register03_off SET

      catch_phrase_off = :catch_phrase_off,
      residence = :residence,
      family = :family,
      hobby = :hobby,
      time_weekday = :time_weekday,
      time_weekend = :time_weekend,
      facebook = :facebook,
      instagram = :instagram,
      twitter = :twitter,
      holiday = :holiday,
      interest = :interest,
      crazy = :crazy,
      love = :love,
      important = :important,
      collection = :collection,
      expensive = :expensive,
      respect = :respect,
      date = sysdate()
                        
    where lid = :lid'
                      
    );
                    

//  2. バインド変数を用意    【 SQL injection 攻撃の回避 】
// ※フォームからそのままデータを取り込むのは危険 → :○○と置いてから取り込み処理を実行

// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR

$stmt->bindValue(':catch_phrase_off', $catch_phrase_off, PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR); 
$stmt->bindValue(':residence', $residence, PDO::PARAM_STR);
$stmt->bindValue(':family', $family, PDO::PARAM_STR);
$stmt->bindValue(':hobby', $hobby, PDO::PARAM_STR);
$stmt->bindValue(':time_weekday', $time_weekday, PDO::PARAM_INT);
$stmt->bindValue(':time_weekend', $time_weekend, PDO::PARAM_INT);
$stmt->bindValue(':facebook', $facebook, PDO::PARAM_STR);
$stmt->bindValue(':instagram', $instagram, PDO::PARAM_STR);
$stmt->bindValue(':twitter', $twitter, PDO::PARAM_STR);
$stmt->bindValue(':holiday', $holiday, PDO::PARAM_STR);
$stmt->bindValue(':interest', $interest, PDO::PARAM_STR);
$stmt->bindValue(':crazy', $crazy, PDO::PARAM_STR);
$stmt->bindValue(':love', $love, PDO::PARAM_STR);
$stmt->bindValue(':important', $important, PDO::PARAM_STR);
$stmt->bindValue(':collection', $collection, PDO::PARAM_STR);
$stmt->bindValue(':expensive', $expensive, PDO::PARAM_STR);
$stmt->bindValue(':respect', $respect, PDO::PARAM_STR);


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
