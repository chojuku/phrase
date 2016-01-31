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
    session_start();
if($_SESSION["S_USERID"]){     
    $id = $_SESSION["S_USERID"];
}else{
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: index.php");
    exit;            
}
if(! $db = new PDO("sqlite:../phrase.db")){
    print "DB接続に失敗しました<br>";
}else{
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

$sql = "SELECT id, fword, jword,suc,fail,sid FROM card WHERE uid = '$id'";
$stmt = $db->prepare($sql);
$stmt -> execute();
?>

<form action="tests.php" method="post">
    test mode:
    <select name="mode">
    <option value="allf">すべての単語で和訳テストする</option>
    <option value="allj">すべての単語で外国語訳テストする</option>
    <option value="ramdomf">ランダムで10個和訳テストする</option>
    <option value="ramdomj">ランダムで10個外国語訳テストする</option>
    <option value="lessf">正答率低い順に10個だけ和訳テストする</option>
    <option value="lessj">正答率低い順に10個だけ外国語訳テストする</option>
    <option value="both">すべての要素を表示する</option>
    <option value="fword">外国語のみを表示する</option>
    <option value="jword">日本語のみを表示する</option>
    <option value="download">単語帳をダウンロードする</option>
    </select>
    <input type="submit" value="select">
    </form>
    
<?php
    $mode = $_POST['mode'];

if($mode="allf" || $mode="allj") {
    $sql = "SELECT id, fword, jword FROM card WHERE uid = '$id'";
} else if($mode="ramdomf" || $mode="ramdomj") {
    $sql = "SELECT id, fword, jword FROM card WHERE uid = '$id' ORDER BY RANDOM() LIMIT 10";
} else if($mode="lessf" || $mode="lessj") {
    $sql = "SELECT id, fword, jword FROM card c WHERE uid = '$id' ORDER BY suc <= fail  LIMIT 10";
} else if($mode="both"|| $mode="fword"|| $mode="jword") {
    $sql = "SELECT id, fword, jword, other, suc, fail, sid FROM card WHERE uid='$id'";
} else if($mode="download"){
    // $sql = "";
}

if($mode && $mode != "download"){
    $stmt = $db -> prepare($sql);
    $stmt -> execute();
    $col = $stmt->fetch(PDO::FETCH_NUM);
    
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
   print "TestModeを選択してください。\n";
}
?>
</div>
  </div> 
<!--
    <script src="../js/skrollr.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
    var s = skrollr.init();
</script> -->
</body>
</html>
