<?php
ini_set('display_errors', 'Off');
date_default_timezone_set('Asia/Tokyo');
?>
<html>
  <head>
    <meta http-equiv="Content-Type"
	  content="text/html; charset=utf8">      
    <title>Phrase</title>
    <link rel="stylesheet" type="text/css" href="basic.css">
  </head>
  <body
     <div id="bg1"
	  data-2000="background-position:800px -1000px;"
	  data-0="background-position:0px 0px;">
     </div>
     <h1>Phrases of Word & Japanese</h1>
     
<?php
    session_start();
if($_SESSION["S_USERID"]){     
	$id = $_SESSION["S_USERID"];
}else{
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: index.php");
	exit;            
}
if(! $db = new PDO("sqlite:../phrase.db")) {
    print "DB接続に失敗しました<br>";
} else {
    $sql = "select uname,uid from user where uid='$id'";
    $stmt = $db -> prepare($sql);
    $flag = $stmt -> execute();
    if(! $flag){ 
        print "<div id=warning>問合せ失敗…</div>";
    }
    $cols = $stmt->fetch(PDO::FETCH_NUM);
    print "<div class=name>You're <font size=5 color=#ec6604> $cols[0] </font> <a href=logout.php>ログアウト</a></div>";
}
?>
<div id="tab">
  <a href="home.php">Phrases</a>
  <a href="tests.php">Tests</a>
  <a href="favorites.php">Favorites</a>
  <a href="category.php">Category</a>
  <a href="submit.php">Submit</a>
</div>
<div id="main">
  投稿フォーム
  <form action="scriptregister.php" method="post">
    <?php    
       print "<input type='hidden' name='id' value=$id>"; 
       ?>
    <left>
      Title:<input type="text" name="title" size="40" ><br>
      Original Sentence <textarea name="fsp" rows="4" cols="80"></textarea><br>
      Translated Sentence<textarea name="jsp" rows="4" cols="80"></textarea><br>
      LangId:<input type="text" name="langid" size="12" >
      Youtube ID<input type="text" name="video" size="20" ><br>
      Comment<textarea name="comment" rows="4" cols="80"></textarea>
      <input type="submit" value="投稿">
    </left>
  </form>
</body>
</html>
