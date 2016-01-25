<html>
<head><title>Phrase of World and Japanese</title>
  <link rel="stylesheet" href="../default.css" type="text/css" />
  <meta http-equiv="Content-Type" content="text/htmll charset=utf8"/>
</head>
<body>
<div id="main">
<h1>Phrase of World and Japanese<br/>DBアプリケーションサンプル<br/>（検索)</h1>
<div id="description">
世界のフレーズの対訳を用意しました
</div>

<?php

if(! $db = new PDO("sqlite:phrase.db")){
  die("DB Connection Failed.");
}

$sql = "SELECT sid,stitle FROM script ";
$stmt = $db->prepare($sql);
$stmt -> execute();
?>

<form action="query.php" method="post">
  <select name="title">タイトル： 

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
   $sql = "SELECT sid,jsp FROM script WHERE sid = '$sid'";
   $stmt = $db -> prepare($sql);
   $stmt -> execute();
   $col = $stmt->fetch(PDO::FETCH_NUM);
   print "選択されたtile：$col[0]";

   $sql=<<<EOM
     SELECT s.fsp, s.jsp
     FROM  script s
     WHERE s.sid = '$sid'
EOM;

   $stmt = $db -> prepare($sql);
   $stmt -> execute();

   print "<table border=1>\n";
   print "<tr>";
   print "<th>原文</th>";
   print "<th>和訳</th>";

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
</body>
</html>
