<?php
ini_set('display_errors', 'Off');
if(!$db = new PDO("sqlite:../phrase.db")){
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: home.php?err=0");      
    exit;
}
$sid =  mb_convert_encoding($_POST['sid'], "UTF-8", "auto");
$uid = mb_convert_encoding($_POST['uid'], "UTF-8", "auto");
$fav = $_POST['fav'];

if($fav == 'up'){
    $sql = "INSERT INTO fav(uid, sid) VALUES('$uid', $sid)";
}
else if($fav == 'down'){
    $sql = "DELETE FROM fav WHERE sid = $sid and uid = $uid";
}
    $stmt = $db -> prepare($sql);
    $flag = $stmt -> execute();
     if(!$flag){
         header("HTTP/1.1 301 Moved Permanently");
          header("Location: home.php?err=3");
          exit;      
     }else{
         header("HTTP/1.1 301 Moved Permanently");
          header("Location: home.php?title=$sid");
          exit;   
     }

?>
