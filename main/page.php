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
    print "ログイン中：$cols[0]さん <a href=logout.php>[LOGOUT]</a><br>";
}
?>
<div class="box2"
    data-100="transform:translate(0,0%)">
    [absolute mode] 左から出現して右へ消える。data-○○○はいくつ並べてもOK。
    </div>
    
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

    
    <script src="../js/skrollr.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
    var s = skrollr.init();
</script>
</body>
</html>
