<?php
   
if(!$db = new PDO("sqlite:../phrase.db")){
    header("HTTP/1.1 301 Moved Permanently");
    //header("Location: login.php?err=0");      
    exit;
}

if(!$_POST['fword'] ||!$_POST['jword']){
    header("HTTP/1.1 301 Moved Permanently");
    // header("Location: login.php?err=1");//“ü—Í‘«‚è‚È‚¢      
    exit;
} else {
    $fword = mb_convert_encoding($_POST['fword'], "UTF-8", "auto");
    $jword = mb_convert_encoding($_POST['jword'], "UTF-8", "auto");
    $sid = $_POST['sid'];
    $uid = $_POST['uid'];

    $sql = "INSERT INTO card (fword, jword, suc, fail, sid, uid) VALUES ('$fword','$jword', 0, 0, $sid, $uid);"; 
    $stmt = $db -> prepare($sql);
    $flag = $stmt -> execute();
    $cols = $stmt->fetch(PDO::FETCH_NUM);
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
