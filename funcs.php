<?php

//XSS対応（ echoする場所で使用！）
function h($str){
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}


//DB接続関数：db_conn() 
function db_conn(){
    try {
        $db_name = 'lobby2019_selfy'; //データベース名
        $db_id   = 'lobby2019_selfy'; //アカウント名
        $db_pw   = 'selfy2023'; //パスワード：MAMPは'root'
        $db_host = 'mysql8079.xserver.jp'; //DBホスト
        $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
        // 関数の外でも$pdoを使うための処理
        return $pdo;
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }
}


//SQLエラー関数：sql_error($stmt)
function sql_error($stmt)
{
    $error = $stmt->errorInfo();
    exit('SQLError:' . $error[2]);
}


//リダイレクト関数: redirect($file_name)
function redirect($file_name)
{
    header('Location: ' . $file_name);
    exit();
}



// ログインチェク処理 loginCheck()

// 1. ログインチェック処理！
// 以下、セッションID持ってたら、ok
// 持ってなければ、閲覧できない処理にする。

    function loginCheck()
    {
        if (!isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] != session_id()) {
            // ログインがおかしい、偽物
            exit('LOGIN ERROR');
        } else {
            // ログインok
            session_regenerate_id(true);
            $_SESSION['chk_ssid'] = session_id();
        }
    }

?>