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

$sql = "SELECT s.sid, s.stitle, s.fsp, s.jsp, s.video, s.comment  FROM fav f, script s WHERE s.sid=f.sid and f.uid ='$id'";
$stmt = $db->prepare($sql);
$stmt -> execute();

   while($cols = $stmt->fetch(PDO::FETCH_NUM)){
       if($cols[4]){
           print "<iframe width='560' height='315' src='https://www.youtube.com/embed/$cols[4]' frameborder=0 allowfullscreen></iframe><br><br>";
       }
       print "<table border=1>\n";
       print "<tr><font size=5 color='#007b71'>$cols[1]</font><tr>";       
       print "<th>Original</th>";
       print "<th>Japanese</th>";
       
       print "<tr>";
       print "<tr>\n";
       print "<td>$cols[2]</td><td>$cols[3]</td>\n";
       print "</tr>\n";
       print "</table><br>\n";
     
   } print "お気に入り登録しよう！(:3";

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
