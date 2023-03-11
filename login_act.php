<?php

// SESSION開始！！
session_start();
// 関数群の読み込み
require_once('funcs.php');
// // ログインチェック処理！
// loginCheck();


//POST値を受け取る
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];


//1.  DB接続します
require_once('funcs.php');
$pdo = db_conn();

//2. データ登録SQL作成
// gs_user_tableに、IDとWPがあるか確認する。
$stmt = $pdo->prepare('SELECT * FROM register00_photo WHERE lid = :lid AND lpw = :lpw');
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$status = $stmt->execute();

//3. SQL実行時にエラーがある場合STOP
if($status === false){
    sql_error($stmt);
}

//4. 抽出データ数を取得
$val = $stmt->fetch();



// if(password_verify($lpw, $val['lpw'])){ //* PasswordがHash化の場合はこっちのIFを使う
    // && password_verify($lpw, $val['lpw'])

if( $val['id'] != '' ){
    //Login成功時 該当レコードがあればSESSIONに値を代入
    $_SESSION['chk_ssid'] = session_id();
    // $_SESSION['name01j'] = $val['name01j'];
    // $_SESSION['name02j'] = $val['name02j'];
    $_SESSION['lid'] = $val['lid'];
    header('Location: top.php');


}else{
    //Login失敗時(Logout経由)
    header('Location: login.php');
}

exit();


?>