<?php
   ini_set('display_errors', 'Off');
   date_default_timezone_set('Asia/Tokyo');
?>
<?php
    if(!$db = new PDO("sqlite:../phrase.db")){
       header("HTTP/1.1 301 Moved Permanently");
       header("Location: submit.php?err=0");//DB�̖��  
       exit;
   }
$title = $_POST['title'];
$langid = $_POST['langid'];
$fsp = $_POST['fsp'];
$jsp = $_POST['jsp'];
$video = $_POST['video'];
$comment = $_POST['comment'];


   if(!$_POST['newid'] ||!$_POST['newname'] || !$_POST['newpass1'] || !$_POST['newpass2']){
       header("HTTP/1.1 301 Moved Permanently");
       header("Location: submit.php?err=1");//���͑���Ȃ�      
       exit;
   } 
   elseif($_POST['newpass1']!=$_POST['newpass2']){
       header("HTTP/1.1 301 Moved Permanently");
       header("Location: submit.php?err=2");//�p�X���[�h�s��v
       exit;      
   }
   else{
     $newid = $_POST['newid'];
     $name = mb_convert_encoding($_POST['newname'], "UTF-8", "auto");
     $newpass1 = sha1($_POST['newpass1']);

     $sql = "SELECT count(*) FROM user WHERE uid = '$newid';"; //���ɓo�^����Ă��邩�m�F����
   //  print $sql;
     $stmt = $db -> prepare($sql);
     $flag = $stmt -> execute();
     if(!$flag){
       header("HTTP/1.1 301 Moved Permanently");
       header("Location: submit.php?err=2");//�⍇�����s
       exit;      
     }

     $cols = $stmt->fetch(PDO::FETCH_NUM);
     if($cols[0]>0){ //���ɓo�^����Ă���̂ŏ㏑������
       $sql = "UPDATE user SET uname = '$name', password='$newpass1' where uid='$newid';";
     }//���[�U����o�^
     else{
       $sql = "INSERT INTO user(uid, uname, password) VALUES('$newid','$name','$newpass1');"; 
     }
     $stmt = $db -> prepare($sql);
     $flag = $stmt -> execute();
     if(!$flag){
       header("HTTP/1.1 301 Moved Permanently");
       header("Location: submit.php?err=3");//�⍇�����s
       exit;      
     }
     else{
       //���O�C�������Ⴄ
       session_start();
       $_SESSION['S_USERID']=$newid;
       header("HTTP/1.1 301 Moved Permanently");
       header("Location: home.php");
       exit;            
     }
   }
?>
