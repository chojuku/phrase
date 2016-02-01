<?php
ini_set('display_errors', 'Off');
if(!$db = new PDO("sqlite:../phrase.db")){
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: home.php?err=0");      
    exit;
}
$sid =  mb_convert_encoding($_POST['sid'], "UTF-8", "auto");
$uname = mb_convert_encoding($_POST['uname'], "UTF-8", "auto");
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
          header("Location: home.php?title=$sid");
          exit;   
     }

?>
