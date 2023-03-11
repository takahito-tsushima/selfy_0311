<?php

// SESSION開始！！
session_start();
// 関数群の読み込み
require_once('funcs.php');
// ログインチェック処理！
loginCheck();


//1. POSTデータ取得

$lid = $_SESSION['lid'];

$forMyColleague01 = $_POST['forMyColleague01'];
$forMyColleague02 = $_POST['forMyColleague02'];
$forMyColleague03 = $_POST['forMyColleague03'];    
$forMyColleague04 = $_POST['forMyColleague04'];
$forMyColleague05 = $_POST['forMyColleague05'];
$forMyColleague06 = $_POST['forMyColleague06'];
$forMyColleague07 = $_POST['forMyColleague07'];
$forMyColleague08 = $_POST['forMyColleague08'];
$forMyColleague09 = $_POST['forMyColleague09'];
$forMyColleague10 = $_POST['forMyColleague10'];

$forMyBoss01 = $_POST['forMyBoss01'];
$forMyBoss02 = $_POST['forMyBoss02'];
$forMyBoss03 = $_POST['forMyBoss03'];
$forMyBoss04 = $_POST['forMyBoss04'];
$forMyBoss05 = $_POST['forMyBoss05'];
$forMyBoss06 = $_POST['forMyBoss06'];
$forMyBoss07 = $_POST['forMyBoss07'];
$forMyBoss08 = $_POST['forMyBoss08'];
$forMyBoss09 = $_POST['forMyBoss09'];
$forMyBoss10 = $_POST['forMyBoss10'];

$forMyTeam01 = $_POST['forMyTeam01'];
$forMyTeam02 = $_POST['forMyTeam02'];
$forMyTeam03 = $_POST['forMyTeam03'];
$forMyTeam04 = $_POST['forMyTeam04'];
$forMyTeam05 = $_POST['forMyTeam05'];
$forMyTeam06 = $_POST['forMyTeam06'];
$forMyTeam07 = $_POST['forMyTeam07'];
$forMyTeam08 = $_POST['forMyTeam08'];
$forMyTeam09 = $_POST['forMyTeam09'];
$forMyTeam10 = $_POST['forMyTeam10'];


//2. DB接続します   try=内容を実行  catch=エラーがあれば処理を止めて以下を実行
$pdo = db_conn();


//３．データ登録SQL作成

// 1. SQL文を用意    【 処理の内容 を記述 】
$stmt = $pdo->prepare('UPDATE register02_torisetsu SET
      forMyColleague01 = :forMyColleague01,
      forMyColleague02 = :forMyColleague02,
      forMyColleague03 = :forMyColleague03,
      forMyColleague04 = :forMyColleague04,
      forMyColleague05 = :forMyColleague05,
      forMyColleague06 = :forMyColleague06,
      forMyColleague07 = :forMyColleague07,
      forMyColleague08 = :forMyColleague08,
      forMyColleague09 = :forMyColleague09,
      forMyColleague10 = :forMyColleague10,
      forMyBoss01 = :forMyBoss01,
      forMyBoss02 = :forMyBoss02,
      forMyBoss03 = :forMyBoss03,
      forMyBoss04 = :forMyBoss04,
      forMyBoss05 = :forMyBoss05,
      forMyBoss06 = :forMyBoss06,
      forMyBoss07 = :forMyBoss07,
      forMyBoss08 = :forMyBoss08,
      forMyBoss09 = :forMyBoss09,
      forMyBoss10 = :forMyBoss10,
      forMyTeam01 = :forMyTeam01,
      forMyTeam02 = :forMyTeam02,
      forMyTeam03 = :forMyTeam03,
      forMyTeam04 = :forMyTeam04,
      forMyTeam05 = :forMyTeam05,
      forMyTeam06 = :forMyTeam06,
      forMyTeam07 = :forMyTeam07,
      forMyTeam08 = :forMyTeam08,
      forMyTeam09 = :forMyTeam09,
      forMyTeam10 = :forMyTeam10,
      date = sysdate()
                        
    where lid = :lid'
                      
    );


//  2. バインド変数を用意    【 SQL injection 攻撃の回避 】
// ※フォームからそのままデータを取り込むのは危険 → :○○と置いてから取り込み処理を実行

// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR); 

$stmt->bindValue(':forMyColleague01', $forMyColleague01, PDO::PARAM_STR);
$stmt->bindValue(':forMyColleague02', $forMyColleague02, PDO::PARAM_STR);
$stmt->bindValue(':forMyColleague03', $forMyColleague03, PDO::PARAM_STR);
$stmt->bindValue(':forMyColleague04', $forMyColleague04, PDO::PARAM_STR);
$stmt->bindValue(':forMyColleague05', $forMyColleague05, PDO::PARAM_STR);
$stmt->bindValue(':forMyColleague06', $forMyColleague06, PDO::PARAM_STR);
$stmt->bindValue(':forMyColleague07', $forMyColleague07, PDO::PARAM_STR);
$stmt->bindValue(':forMyColleague08', $forMyColleague08, PDO::PARAM_STR);
$stmt->bindValue(':forMyColleague09', $forMyColleague09, PDO::PARAM_STR);
$stmt->bindValue(':forMyColleague10', $forMyColleague10, PDO::PARAM_STR);
$stmt->bindValue(':forMyBoss01', $forMyBoss01, PDO::PARAM_STR);
$stmt->bindValue(':forMyBoss02', $forMyBoss02, PDO::PARAM_STR);
$stmt->bindValue(':forMyBoss03', $forMyBoss03, PDO::PARAM_STR);
$stmt->bindValue(':forMyBoss04', $forMyBoss04, PDO::PARAM_STR);
$stmt->bindValue(':forMyBoss05', $forMyBoss05, PDO::PARAM_STR);
$stmt->bindValue(':forMyBoss06', $forMyBoss06, PDO::PARAM_STR);
$stmt->bindValue(':forMyBoss07', $forMyBoss07, PDO::PARAM_STR);
$stmt->bindValue(':forMyBoss08', $forMyBoss08, PDO::PARAM_STR);
$stmt->bindValue(':forMyBoss09', $forMyBoss09, PDO::PARAM_STR);
$stmt->bindValue(':forMyBoss10', $forMyBoss10, PDO::PARAM_STR);
$stmt->bindValue(':forMyTeam01', $forMyTeam01, PDO::PARAM_STR);
$stmt->bindValue(':forMyTeam02', $forMyTeam02, PDO::PARAM_STR);
$stmt->bindValue(':forMyTeam03', $forMyTeam03, PDO::PARAM_STR);
$stmt->bindValue(':forMyTeam04', $forMyTeam04, PDO::PARAM_STR);
$stmt->bindValue(':forMyTeam05', $forMyTeam05, PDO::PARAM_STR);
$stmt->bindValue(':forMyTeam06', $forMyTeam06, PDO::PARAM_STR);
$stmt->bindValue(':forMyTeam07', $forMyTeam07, PDO::PARAM_STR);
$stmt->bindValue(':forMyTeam08', $forMyTeam08, PDO::PARAM_STR);
$stmt->bindValue(':forMyTeam09', $forMyTeam09, PDO::PARAM_STR);
$stmt->bindValue(':forMyTeam10', $forMyTeam10, PDO::PARAM_STR);


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
