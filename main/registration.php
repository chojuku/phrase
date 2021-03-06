<?php
   ini_set('display_errors', 'Off');
   date_default_timezone_set('Asia/Tokyo');
?>
<?php
    if(!$db = new PDO("sqlite:../phrase.db")){
       header("HTTP/1.1 301 Moved Permanently");
       header("Location: index.php?err=0");//DBの問題      
       exit;
   }

   if(!$_POST['newid'] ||!$_POST['newname'] || !$_POST['newpass1'] || !$_POST['newpass2']){
       header("HTTP/1.1 301 Moved Permanently");
       header("Location: index.php?err=1");//入力足りない      
       exit;
   } 
   elseif($_POST['newpass1']!=$_POST['newpass2']){
       header("HTTP/1.1 301 Moved Permanently");
       header("Location: index.php?err=2");//パスワード不一致
       exit;      
   }
   else{
     $newid = $_POST['newid'];
     $name = mb_convert_encoding($_POST['newname'], "UTF-8", "auto");
     $newpass1 = sha1($_POST['newpass1']);

     $sql = "SELECT count(*) FROM user WHERE uid = '$newid';"; //既に登録されているか確認する
   //  print $sql;
     $stmt = $db -> prepare($sql);
     $flag = $stmt -> execute();
     if(!$flag){
       header("HTTP/1.1 301 Moved Permanently");
       header("Location: index.php?err=2");//問合せ失敗
       exit;      
     }

     $cols = $stmt->fetch(PDO::FETCH_NUM);
     if($cols[0]>0){ //既に登録されているので上書きする
       $sql = "UPDATE user SET uname = '$name', password='$newpass1' where uid='$newid';";
     }//ユーザ情報を登録
     else{
       $sql = "INSERT INTO user(uid, uname, password) VALUES('$newid','$name','$newpass1');"; 
     }
     $stmt = $db -> prepare($sql);
     $flag = $stmt -> execute();
     if(!$flag){
       header("HTTP/1.1 301 Moved Permanently");
       header("Location: index.php?err=3");//問合せ失敗
       exit;      
     }
     else{
       //ログインしちゃう
       session_start();
       $_SESSION['S_USERID']=$newid;
       header("HTTP/1.1 301 Moved Permanently");
       header("Location: home.php");
       exit;            
     }
   }
?>
