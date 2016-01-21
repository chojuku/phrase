<?php	
ini_set('display_errors', 'Off');
date_default_timezone_set('Asia/Tokyo');
session_start();

// 既にログインしている
if(isset($_SESSION["S_USERID"])) {  
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: index.php");
    exit;
} elseif(isset($_POST['id']) && isset($_POST['password'])) {
    if(! $db = new PDO("sqlite:../phrase.db")) { 
        print "<div id=warning>DB connection is failed.</div>";
        goto end;
    }
    // login.phpへの入力値
    $id = $_POST['id'];
    $password = sha1($_POST['password']);
    //パスワード情報を取得
    $sql = "SELECT password FROM user WHERE uid = '$id';";
    $stmt = $db -> prepare($sql);
    $flag = $stmt -> execute();
    $cols = $stmt->fetch(PDO::FETCH_NUM);
    
    if($cols[0]==$password) {//認証成功
        $_SESSION = array();
        $_SESSION["S_USERID"]=$id;
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: index.php");
        exit;
    } else {
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: login.php?failed=true");
        //ログインし直し
        exit;
    }
}
?>

<html>
<head>
<meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Phrases</title>
      <link rel="stylesheet" type="text/css" href="basic.css">
      </head>
      <body
      <div id="bg1">
      <h1>Phrases Of World & Japanese</h1>
      <div id="center">
      <div id="left" align="right">
      <form action="login.php" method="post"> 
      <input type="text" name="id" size="12" ><br><br>
      <input type="password" name="password" size="12" ><br>
      <input type="submit" name="login" value="Login" >
      </form>
<?php
      if(isset($_GET['failed'])){ //ログインに失敗している
	      print "<div id=warning>Login Failed</div>";
	      goto end;
      }
if($_GET['err']){
    $errno=$_GET['err'];
    $err_message= array("Can't connect with DB","Input all items","Password missmatch","fail to ragister");
    print "<div id=warning> $err_message[$errno]</div>"; 
}	      
end:
?>
</div>
<div id="right" align="center">
    <form action="registration.php" method="post"> 
    <input type="text" name="newid" size="12"><br><br>
    <input type="text" name="newname" size="12"><br><br>
    <input type="password" name="newpass1" size="12"><br>
    <input type="password" name="newpass2" size="12"><br>
    <input type="submit" name="login" value="Register">
    </form>
    </div>
    </div>
    </div> 
    </body>
    </html>