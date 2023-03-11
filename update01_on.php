<?php

// SESSION開始！！
session_start();
// 関数群の読み込み
require_once('funcs.php');
// ログインチェック処理！
loginCheck();


//1. POSTデータ取得
$lid = $_SESSION['lid'];

$catch_phrase_on = $_POST['catch_phrase_on'];
$name01j = $_POST['name01j'];
$name02j = $_POST['name02j'];
$name01e = $_POST['name01e'];
$name02e = $_POST['name02e'];
$birth_year = $_POST['birth_year'];
$birth_month = $_POST['birth_month'];
$born_place = $_POST['born_place']; 
$prefecture = $_POST['prefecture'];
$country = $_POST['country'];
$occupation = $_POST['occupation'];
$affiliation = $_POST['affiliation'];
$division = $_POST['division'];
$start_year = $_POST['start_year'];
$start_month = $_POST['start_month'];
$postal = $_POST['postal'];
$address01 = $_POST['address01'];
$address02 = $_POST['address02'];
$phone = $_POST['phone'];
$fax = $_POST['fax'];
$url = $_POST['url'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$univ = $_POST['univ'];
$univ_major = $_POST['univ_major'];
$univ_start_year = $_POST['univ_start_year'];
$univ_start_month = $_POST['univ_start_month'];
$univ_end_year = $_POST['univ_end_year'];
$univ_end_month = $_POST['univ_end_month'];
$hs = $_POST['hs'];
$hs_major = $_POST['hs_major'];
$hs_start_year = $_POST['hs_start_year'];
$hs_start_month = $_POST['hs_start_month'];
$hs_end_year = $_POST['hs_end_year'];
$hs_end_month = $_POST['hs_end_month'];
$grad = $_POST['grad'];
$grad_major = $_POST['grad_major'];
$grad_start_year = $_POST['grad_start_year'];
$grad_start_month = $_POST['grad_start_month'];
$grad_end_year = $_POST['grad_end_year'];
$grad_end_month = $_POST['grad_end_month'];
$career01 = $_POST['career01'];
$division01 = $_POST['division01'];
$career01_start_year = $_POST['career01_start_year'];
$career01_start_month = $_POST['career01_start_month'];
$career01_end_year = $_POST['career01_end_year'];
$career01_end_month = $_POST['career01_end_month'];
$career01_detail = $_POST['career01_detail'];
$career02 = $_POST['career02'];
$division02 = $_POST['division02'];
$career02_start_year = $_POST['career02_start_year'];
$career02_start_month = $_POST['career02_start_month'];
$career02_end_year = $_POST['career02_end_year'];
$career02_end_month = $_POST['career02_end_month'];
$career02_detail = $_POST['career02_detail'];
$career03 = $_POST['career03'];
$division03 = $_POST['division03'];
$career03_start_year = $_POST['career03_start_year'];
$career03_start_month = $_POST['career03_start_month'];
$career03_end_year = $_POST['career03_end_year'];
$career03_end_month = $_POST['career03_end_month'];
$career03_detail = $_POST['career03_detail'];
$motiv01 = $_POST['motiv'][0];
$motiv02 = $_POST['motiv'][1];
$motiv03 = $_POST['motiv'][2];
$episode = $_POST['episode'];
$episode_detail = $_POST['episode_detail'];


//2. DB接続します   try=内容を実行  catch=エラーがあれば処理を止めて以下を実行
$pdo = db_conn();


//３．データ登録SQL作成

// 1. SQL文を用意    【 処理の内容 を記述 】
$stmt = $pdo->prepare('UPDATE register01_on SET

      catch_phrase_on = :catch_phrase_on,
      name01j = :name01j,
      name02j = :name02j,
      name01e = :name01e,
      name02e = :name02e,
      birth_year = :birth_year,
      birth_month = :birth_month,
      born_place = :born_place,
      prefecture = :prefecture,
      country = :country,
      occupation = :occupation,
      affiliation = :affiliation,
      division = :division,
      start_year = :start_year,
      start_month = :start_month,
      postal = :postal,
      address01 = :address01,
      address02 = :address02,
      phone = :phone,
      fax = :fax,
      url = :url,
      email = :email,
      mobile = :mobile,
      univ = :univ,
      univ_major = :univ_major,
      univ_start_year = :univ_start_year,
      univ_start_month = :univ_start_month,
      univ_end_year = :univ_end_year,
      univ_end_month = :univ_end_month,
      hs = :hs,
      hs_major = :hs_major,
      hs_start_year = :hs_start_year,
      hs_start_month = :hs_start_month,
      hs_end_year = :hs_end_year,
      hs_end_month = :hs_end_month,
      grad = :grad,
      grad_major = :grad_major,
      grad_start_year = :grad_start_year,
      grad_start_month = :grad_start_month,
      grad_end_year = :grad_end_year,
      grad_end_month = :grad_end_month,
      career01 = :career01,
      division01 = :division01,
      career01_start_year = :career01_start_year,
      career01_start_month = :career01_start_month,
      career01_end_year = :career01_end_year,
      career01_end_month = :career01_end_month,
      career01_detail = :career01_detail,
      career02 = :career02,
      division02 = :division02,
      career02_start_year = :career02_start_year,
      career02_start_month = :career02_start_month,
      career02_end_year = :career02_end_year,
      career02_end_month = :career02_end_month,
      career02_detail = :career02_detail,
      career03 = :career03,
      division03 = :division03,
      career03_start_year = :career03_start_year,
      career03_start_month = :career03_start_month,
      career03_end_year = :career03_end_year,
      career03_end_month = :career03_end_month,
      career03_detail = :career03_detail,
      motiv01 = :motiv01,
      motiv02 = :motiv02,
      motiv03 = :motiv03,
      episode = :episode,
      episode_detail = :episode_detail,
      date = sysdate()
                      
    where lid = :lid'
                    
    );
                  

//  2. バインド変数を用意    【 SQL injection 攻撃の回避 】
// ※フォームからそのままデータを取り込むのは危険 → :○○と置いてから取り込み処理を実行

// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR

$stmt->bindValue(':lid', $lid, PDO::PARAM_STR); 
$stmt->bindValue(':catch_phrase_on', $catch_phrase_on, PDO::PARAM_STR);
$stmt->bindValue(':name01j', $name01j, PDO::PARAM_STR);
$stmt->bindValue(':name02j', $name02j, PDO::PARAM_STR);
$stmt->bindValue(':name01e', $name01e, PDO::PARAM_STR);
$stmt->bindValue(':name02e', $name02e, PDO::PARAM_STR);
$stmt->bindValue(':birth_year', $birth_year, PDO::PARAM_INT);
$stmt->bindValue(':birth_month', $birth_month, PDO::PARAM_INT);
$stmt->bindValue(':born_place', $born_place, PDO::PARAM_STR);
$stmt->bindValue(':prefecture', $prefecture, PDO::PARAM_STR);
$stmt->bindValue(':country', $country, PDO::PARAM_STR);
$stmt->bindValue(':occupation', $occupation, PDO::PARAM_STR);
$stmt->bindValue(':affiliation', $affiliation, PDO::PARAM_STR);
$stmt->bindValue(':division', $division, PDO::PARAM_STR);
$stmt->bindValue(':start_year', $start_year, PDO::PARAM_INT);
$stmt->bindValue(':start_month', $start_month, PDO::PARAM_INT);
$stmt->bindValue(':postal', $postal, PDO::PARAM_INT);
$stmt->bindValue(':address01', $address01, PDO::PARAM_STR);
$stmt->bindValue(':address02', $address02, PDO::PARAM_STR);
$stmt->bindValue(':phone', $phone, PDO::PARAM_STR);
$stmt->bindValue(':fax', $fax, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':mobile', $mobile, PDO::PARAM_STR);
$stmt->bindValue(':univ', $univ, PDO::PARAM_STR);
$stmt->bindValue(':univ_major', $univ_major, PDO::PARAM_STR);
$stmt->bindValue(':univ_start_year', $univ_start_year, PDO::PARAM_INT);
$stmt->bindValue(':univ_start_month', $univ_start_month, PDO::PARAM_INT);
$stmt->bindValue(':univ_end_year', $univ_end_year, PDO::PARAM_INT);
$stmt->bindValue(':univ_end_month', $univ_end_month, PDO::PARAM_INT);
$stmt->bindValue(':hs', $hs, PDO::PARAM_STR);
$stmt->bindValue(':hs_major', $hs_major, PDO::PARAM_STR);
$stmt->bindValue(':hs_start_year', $hs_start_year, PDO::PARAM_INT);
$stmt->bindValue(':hs_start_month', $hs_start_month, PDO::PARAM_INT);
$stmt->bindValue(':hs_end_year', $hs_end_year, PDO::PARAM_INT);
$stmt->bindValue(':hs_end_month', $hs_end_month, PDO::PARAM_INT);
$stmt->bindValue(':grad', $grad, PDO::PARAM_STR);
$stmt->bindValue(':grad_major', $grad_major, PDO::PARAM_STR);
$stmt->bindValue(':grad_start_year', $grad_start_year, PDO::PARAM_INT);
$stmt->bindValue(':grad_start_month', $grad_start_month, PDO::PARAM_INT);
$stmt->bindValue(':grad_end_year', $grad_end_year, PDO::PARAM_INT);
$stmt->bindValue(':grad_end_month', $grad_end_month, PDO::PARAM_INT);
$stmt->bindValue(':career01', $career01, PDO::PARAM_STR);
$stmt->bindValue(':division01', $division01, PDO::PARAM_STR);
$stmt->bindValue(':career01_start_year', $career01_start_year, PDO::PARAM_INT);
$stmt->bindValue(':career01_start_month', $career01_start_month, PDO::PARAM_INT);
$stmt->bindValue(':career01_end_year', $career01_end_year, PDO::PARAM_INT);
$stmt->bindValue(':career01_end_month', $career01_end_month, PDO::PARAM_INT);
$stmt->bindValue(':career01_detail', $career01_detail, PDO::PARAM_STR);
$stmt->bindValue(':career02', $career02, PDO::PARAM_STR);
$stmt->bindValue(':division02', $division02, PDO::PARAM_STR);
$stmt->bindValue(':career02_start_year', $career02_start_year, PDO::PARAM_INT);
$stmt->bindValue(':career02_start_month', $career02_start_month, PDO::PARAM_INT);
$stmt->bindValue(':career02_end_year', $career02_end_year, PDO::PARAM_INT);
$stmt->bindValue(':career02_end_month', $career02_end_month, PDO::PARAM_INT);
$stmt->bindValue(':career02_detail', $career02_detail, PDO::PARAM_STR);
$stmt->bindValue(':career03', $career03, PDO::PARAM_STR);
$stmt->bindValue(':division03', $division03, PDO::PARAM_STR);
$stmt->bindValue(':career03_start_year', $career03_start_year, PDO::PARAM_INT);
$stmt->bindValue(':career03_start_month', $career03_start_month, PDO::PARAM_INT);
$stmt->bindValue(':career03_end_year', $career03_end_year, PDO::PARAM_INT);
$stmt->bindValue(':career03_end_month', $career03_end_month, PDO::PARAM_INT);
$stmt->bindValue(':career03_detail', $career03_detail, PDO::PARAM_STR);
$stmt->bindValue(':motiv01', $motiv01, PDO::PARAM_STR);
$stmt->bindValue(':motiv02', $motiv02, PDO::PARAM_STR);
$stmt->bindValue(':motiv03', $motiv03, PDO::PARAM_STR);
$stmt->bindValue(':episode', $episode, PDO::PARAM_STR);
$stmt->bindValue(':episode_detail', $episode_detail, PDO::PARAM_STR);


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
