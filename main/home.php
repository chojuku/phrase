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

  <div id="tabmenu">
    <div id="tab">
      <a href="home.php">Phrases</a>
      <a href="tests.php">Tests</a>
      <a href="favorites.php">Favorites</a>
      <a href="category.php">Category</a>
      <a href="submit.php">Submit</a>
    </div>
    <div id="tab_contents">
      <ul>
	<li id="tab1" name="Phrases">
	  <div class="styled-select blue semi-square">
	    <form action="home.php" method="get">
	      <select name="sid">title: 
		<?php
		   while($titlecols = $titlestmt->fetch(PDO::FETCH_NUM)){
		print "<option value=$titlecols[0]>$titlecols[1]";
		  }
		  ?>
	      </select>
	      <input type="submit" value="select">
	    </form>
	    <table>
	      <tr>  
	<?php
	   $selectid = $_GET['sid'];
	   // jsp fspの取得
	   $jspsql = "SELECT sid,jsp FROM script WHERE $selectid = sid";
	   $jspstmt = $db->prepare($jspsql);
	$jspstmt -> execute();
	$fspsql = "SELECT sid,fsp FROM script WHERE $selectid = sid";
	$fspstmt = $db->prepare($fspsql);
	$fspstmt -> execute();

	while($jspcols = $jspstmt->fetch(PDO::FETCH_NUM)){
	
	//$jsppieces = explode('n',$jspscols[1]);
	print "<td><div class='middlebox'><option value=$jspcols[0]>";
		     
		      print ($jspcols[1]);
		      //	foreach($jsppieces as $key){
		      //	print ($jsppieces);
		      //}
		      print "</div></td>";
	}
		      
	while($fspcols = $fspstmt->fetch(PDO::FETCH_NUM)){

	$fsppieces = explode(' ', $fspscols[1]);
	print "<td><div class='middlebox'><option value=$fspcols[0]>";
		      print ($fspcols[1]);
	foreach($fsppieces as $key){
	print ($key);
		      }
		      print "</div></td>";
      }	
?>
	      </tr>
	    </table>
	    </div>
      </li>
      </ul>
    </div>
  </div>
  <!--
    <div class="box2"
	 data-300="transform:translate(0,0%)">
      [absolute mode] 左から出現して右へ消える。data-○○○はいくつ並べてもOK。
    </div>
   --> <!--
    <div class="box2"
    data-100="transform:translate(0,100%)"
    data-200="transform:translate(0,80%)"
    data-300="transform:translate(0,60%)"
    data-400="transform:translate(0,40%)"
    data-500="transform:translate(0,0%)"
    data-600="transform:translate(0,0%)"
    data-700="transform:translate(0,0%)"
    data-800="transform:translate(0,-60%)"
    data-900="transform:translate(0,-120%)">
    [absolute mode] 左から出現して右へ消える。data-○○○はいくつ並べてもOK。
    </div>
    -->
    
    <script src="../js/skrollr.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
    var s = skrollr.init();
</script>
</body>
</html>
