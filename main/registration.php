<?php
   ini_set('display_errors', 'Off');
   date_default_timezone_set('Asia/Tokyo');
?>
<?php
    if(!$db = new PDO("sqlite:../phrase.db")){
       header("HTTP/1.1 301 Moved Permanently");
       header("Location: login.php?err=0");//DB‚Ì–â‘è      
       exit;
   }

   if(!$_POST['newid'] ||!$_POST['newname'] || !$_POST['newpass1'] || !$_POST['newpass2']){
       header("HTTP/1.1 301 Moved Permanently");
       header("Location: login.php?err=1");//“ü—Í‘«‚è‚È‚¢      
       exit;
   } 
   elseif($_POST['newpass1']!=$_POST['newpass2']){
       header("HTTP/1.1 301 Moved Permanently");
       header("Location: login.php?err=2");//ƒpƒXƒ[ƒh•sˆê’v
       exit;      
   }
   else{
     $newid = $_POST['newid'];
     $name = mb_convert_encoding($_POST['newname'], "UTF-8", "auto");
     $newpass1 = sha1($_POST['newpass1']);

     $sql = "SELECT count(*) FROM user WHERE uid = '$newid';"; //Šù‚É“o˜^‚³‚ê‚Ä‚¢‚é‚©Šm”F‚·‚é
   //  print $sql;
     $stmt = $db -> prepare($sql);
     $flag = $stmt -> execute();
     if(!$flag){
       header("HTTP/1.1 301 Moved Permanently");
       header("Location: login.php?err=2");//–â‡‚¹Ž¸”s
       exit;      
     }

     $cols = $stmt->fetch(PDO::FETCH_NUM);
     if($cols[0]>0){ //Šù‚É“o˜^‚³‚ê‚Ä‚¢‚é‚Ì‚Åã‘‚«‚·‚é
       $sql = "UPDATE user SET uname = '$name', password='$newpass1' where uid='$newid';";
     }//ƒ†[ƒUî•ñ‚ð“o˜^
     else{
       $sql = "INSERT INTO user(uid, uname, password) VALUES('$newid','$name','$newpass1');"; 
     }
     $stmt = $db -> prepare($sql);
     $flag = $stmt -> execute();
     if(!$flag){
       header("HTTP/1.1 301 Moved Permanently");
       header("Location: login.php?err=3");//–â‡‚¹Ž¸”s
       exit;      
     }
     else{
       //ƒƒOƒCƒ“‚µ‚¿‚á‚¤
       session_start();
       $_SESSION['S_USERID']=$newid;
       header("HTTP/1.1 301 Moved Permanently");
       header("Location: index.php");
       exit;            
     }
   }
?>
