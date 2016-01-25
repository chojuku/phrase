<?php
ini_set('display_errors', 'Off');
date_default_timezone_set('Asia/Tokyo');
?>
<html>
<head>
<meta http-equiv="Content-Type" 
    content="text/html; charset=utf8">       
    <title>Chojuku</title>
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
    $sql = "select uname from user where uid='$id'";
    $stmt = $db -> prepare($sql);
    $flag = $stmt -> execute();
    if(! $flag){ 
        print "<div id=warning>問合せ失敗…</div>";
    }
  // titleの取得
  $titlesql = "SELECT sid,stitle FROM script";
  $titlestmt = $db->prepare($titlesql);
  $titlestmt -> execute();

    $cols = $stmt->fetch(PDO::FETCH_NUM);
    print "<div class=name>You're <font size=5 color=#ec6604> $cols[0] </font> <a href=logout.php>ログアウト</a></div>";

}
$color= array("#ffec72", "#90cdb2");
?>


 <!-- <div id="tabmenu">-->
    <div id="tab">
      <a href="home.php">Phrases</a>
      <a href="tests.php">Tests</a>
      <a href="favorites.php">Favorites</a>
      <a href="category.php">Category</a>
      <a href="submit.php">Submit</a>
    </div>

<!--    <div id="tab_contents">-->
    
  <div id="main">
<?php

if(! $db = new PDO("sqlite:../phrase.db")){
  die("DB Connection Failed.");
}

$sql = "SELECT sid,stitle FROM script ";
$stmt = $db->prepare($sql);
$stmt -> execute();
?>

<form action="home.php" method="post">
    <select name="title">title: 
<?php
while($cols = $stmt->fetch(PDO::FETCH_NUM)){
  print "<option value=$cols[0]>$cols[1]";
}
?>
 </select>
<input type="submit" value="選択">
</form>

<?php
 $sid=$_POST['title'];
 if($sid){
   $sql = "SELECT sid,jsp,stitle FROM script WHERE sid = '$sid'";
   $stmt = $db -> prepare($sql);
   $stmt -> execute();
   $col = $stmt->fetch(PDO::FETCH_NUM);
   print "<font  color='#007b71'>title：$col[2]</font>";

   $sql=<<<EOM
     SELECT s.fsp, s.jsp
     FROM  script s
     WHERE s.sid = '$sid'
EOM;

   $stmt = $db -> prepare($sql);
   $stmt -> execute();

   print "<table border=1>\n";
   print "<tr>";
   print "<th>Original</th>";
   print "<th>Japanese</th>";

   print "<tr>";
   while($cols = $stmt->fetch(PDO::FETCH_NUM)){
     print "<tr>\n";
     print "<td>$cols[0]</td><td>$cols[1]</td>\n";
     print "</tr>\n";
   }
   print "</table>\n";
 }
 else{
   print "titleを選択してください。\n";
 }
?>

</div>

  </div> 

   <!-- 
    <script src="../js/skrollr.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
    var s = skrollr.init();
</script>-->
</body>
</html>
