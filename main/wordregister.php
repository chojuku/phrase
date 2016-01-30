<?php
   ini_set('display_errors', 'Off');
   date_default_timezone_set('Asia/Tokyo');
   session_start();
if($_SESSION["S_USERID"]){     
    $id = $_SESSION["S_USERID"];
}else{
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: index.php");
    exit;            
}
if(!$db = new PDO("sqlite:../phrase.db")){
    header("HTTP/1.1 301 Moved Permanently");
    //header("Location: login.php?err=0");//DB‚Ì–â‘è      
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
     $sql = "INSERT INTO card (fword, jword, suc, fail, sid, uid) VALUES ('$fword','$jword', 0, 0, $sid, $id);"; 
     $stmt = $db -> prepare($sql);
     $flag = $stmt -> execute();
     if(!$flag){
       header("HTTP/1.1 301 Moved Permanently");
       // header("Location: login.php?err=3");//–â‡‚¹Ž¸”s
       exit;      
     }
   }
?>
