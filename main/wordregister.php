<?php
ini_set('display_errors', 'Off');
if(!$db = new PDO("sqlite:../phrase.db")){
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: home.php?err=0");      
    exit;
}
if(!$_POST['fword'] ||!$_POST['jword']){
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: home.php?err=4");
    exit;
} else {
    $fword = mb_convert_encoding($_POST['fword'], "UTF-8", "auto");
    $jword = mb_convert_encoding($_POST['jword'], "UTF-8", "auto");
    $sid = $_POST['sid'];
    $uid = $_POST['uid'];
    $other = mb_convert_encoding($_POST['other'], "UTF-8", "auto");
    if($sid && $other){
    $sql = "INSERT INTO card (fword, jword, other, suc, fail, sid, uid) VALUES ('$fword','$jword', '$other', 0, 0, $sid, $uid);"; 
    } else if ($sid) {
        $sql = "INSERT INTO card (fword, jword, suc, fail, sid, uid) VALUES ('$fword','$jword', 0, 0, $sid, $uid);"; 
    } else if ($other) {
        $sql = "INSERT INTO card (fword, jword, other, suc, fail, uid) VALUES ('$fword','$jword', '$other', 0, 0, $uid);"; 
    } else {
        $sql = "INSERT INTO card (fword, jword, suc, fail, uid) VALUES ('$fword','$jword', 0, 0, $uid);"; 
    }
    $stmt = $db -> prepare($sql);
    $flag = $stmt -> execute();
     if(!$flag){
         header("HTTP/1.1 301 Moved Permanently");
         header("Location: home.php?err=3");
         exit;      
     }else{
         header("HTTP/1.1 301 Moved Permanently");
         header("Location: home.php?pass=1");
         exit;   
     }
}

?>
