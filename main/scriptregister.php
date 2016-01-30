<?php
ini_set('display_errors', 'Off');
date_default_timezone_set('Asia/Tokyo');

if(!$db = new PDO("sqlite:../phrase.db")){
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: submit.php?err=0");
    exit;
}
if(!$_POST['title'] ||!$_POST['fsp'] || !$_POST['jsp'] || !$_POST['langid']){
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: submit.php?err=1");//入力足りない      
    exit;
} else{
    $title = mb_convert_encoding($_POST['title'], "UTF-8", "auto");
    $langid = mb_convert_encoding($_POST['langid'], "UTF-8", "auto");
    $fsp = mb_convert_encoding($_POST['fsp'], "UTF-8", "auto");
    $jsp = mb_convert_encoding($_POST['jsp'], "UTF-8", "auto");
    $video = mb_convert_encoding($_POST['video'], "UTF-8", "auto");
    $comment = mb_convert_encoding($_POST['comment'], "UTF-8", "auto");
    $id = $_POST['id'];
    
    /* $sql = "SELECT count(*) FROM script WHERE stitle = '$title';"; //既に登録されているか確認する
    $stmt = $db -> prepare($sql);
    $flag = $stmt -> execute();
    if(!$flag){
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: submit.php?err=2");//問合せ失敗
        exit;      
    }
    $cols = $stmt->fetch(PDO::FETCH_NUM);
    if($cols[0]>0){ //既に登録されているので上書きする
        $sql = "UPDATE script SET fsp='$fsp', jsp='$jsp', video='$video', comment='$comment' where stitle='$title';";
        }else{*/
    $sql = "INSERT INTO script (stitle, upid, langid, fsp, jsp, video, comment) VALUES('$title', $id ,'$langid', '$fsp', '$jsp', '$video', '$comment');"; 
    // }
    $stmt = $db -> prepare($sql);
    $flag = $stmt -> execute();
    $cols = $stmt->fetch(PDO::FETCH_NUM);
    if(!$flag){
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: submit.php?err=3");//問合せ失敗
        exit;      
    }else{
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: submit.php?pass=1");
        exit;      
    }
}
?>
