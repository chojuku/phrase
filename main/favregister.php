<?php
ini_set('display_errors', 'Off');
if(!$db = new PDO("sqlite:../phrase.db")){
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: home.php?err=0");      
    exit;
}
$sid = $_POST['sid'];
$uname = $_POST['uname'];
$fav = $_POST['fav'];

if($fav == 'up'){
    $sql = "INSERT INTO user(uname, fav) VALUES('$uname', $sid)";
}
else if($fav == 'down'){
    $sql = "UPDATE user SET fav=0 WHERE uname='$uname' and fav=$sid";
}
    $stmt = $db -> prepare($sql);
    $flag = $stmt -> execute();
     if(!$flag){
         header("HTTP/1.1 301 Moved Permanently");
          header("Location: home.php?err=3");
          exit;      
     }else{
         header("HTTP/1.1 301 Moved Permanently");
          header("Location: home.php");
          exit;   
     }

?>
