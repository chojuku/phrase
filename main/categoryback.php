<?php
ini_set('display_errors', 'Off');
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
// user login 情報の取得
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
<?php

if(! $db = new PDO("sqlite:../phrase.db")){
  die("DB Connection Failed.");
}
$cname = $_GET['cname'];
if($cname){
$spsql = "SELECT s.sid,s.stitle FROM script s, category c WHERE c.cname ='$cname' and s.sid=c.sid";
$stmt = $db->prepare($spsql);
$stmt -> execute();

$cols = $stmt->fetch(PDO::FETCH_NUM);
print "選択されたカテゴリ:$cname";

   $sql=<<<EOM
     SELECT s.sid, s.stitle, s.fsp, s.jsp,s.comment, s.video
     FROM script s, category c
     WHERE s.sid = c.sid
       and c.cname = '$cname';
EOM;

   $stmt = $db -> prepare($sql);
   $stmt -> execute();

   print "<tr>";
   while($cols = $stmt->fetch(PDO::FETCH_NUM)){
     if($cols[5]){
           print "<iframe width='560' height='315' src='https://www.youtube.com/embed/$cols[5]' frameborder=0 allowfullscreen></iframe><br><br>";
       }
       print "<table border=1>\n";
       print "<tr><font size=5 color='#007b71'>$cols[1]</font></tr>";       
       print "<th>Original</th>";
       print "<th>Japanese</th>";
       print "<tr>\n";
       print "<td>$cols[2]</td><td>$cols[3]</td>";
       print "</tr>";
       print "</table>";
       print "<table border=1><th>Comment</th><tr><td>$cols[4]</td></tr></table>\n";
   }
}else{
   print "授業名を選択してください。\n";
 }

?>
</div>
</body>
</html>
