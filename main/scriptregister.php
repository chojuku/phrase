<?php
ini_set('display_errors', 'Off');
date_default_timezone_set('Asia/Tokyo');

if(!$db = new PDO("sqlite:../phrase.db")){
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: submit.php?err=0");
    exit;
}
if(!$_POST['title'] ||!$_POST['fsp'] || !$_POST['jsp']){
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: submit.php?err=1");//“ü—Í‘«‚è‚È‚¢      exit;
} else{
    $title = mb_convert_encoding($_POST['title'], "UTF-8", "auto");
    $category = mb_convert_encoding($_POST['category'], "UTF-8", "auto");
    $fsp =    nl2br(mb_convert_encoding(sqlite_escape_string($_POST['fsp']), "UTF-8", "auto"));
    $jsp = 	nl2br(mb_convert_encoding($_POST['jsp'], "UTF-8", "auto"));
    $video = mb_convert_encoding($_POST['video'], "UTF-8", "auto");
    $comment = 	nl2br(mb_convert_encoding($_POST['comment'], "UTF-8", "auto"));
    $id = $_POST['id'];
    print "$fsp";
    /* $sql = "SELECT count(*) FROM script WHERE stitle = '$title';"; //Šù‚É“o˜^‚³‚ê‚Ä‚¢‚é‚©Šm”F‚·‚é
    $stmt = $db -> prepare($sql);
    $flag = $stmt -> execute();
    if(!$flag){
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: submit.php?err=2");//–â‡‚¹Ž¸”s
        exit;      
    }
    $cols = $stmt->fetch(PDO::FETCH_NUM);
    if($cols[0]>0){ //Šù‚É“o˜^‚³‚ê‚Ä‚¢‚é‚Ì‚Åã‘‚«‚·‚é
        $sql = "UPDATE script SET fsp='$fsp', jsp='$jsp', video='$video', comment='$comment' where stitle='$title';";
        }else{*/
    if($comment && $video) {
    $sql = "INSERT INTO script (stitle, upid, fsp, jsp, video, comment) VALUES('$title', $id , '$fsp', '$jsp', '$video', '$comment');"; 
    } else if ($comment) {
        $sql = "INSERT INTO script (stitle, upid, fsp, jsp, comment) VALUES('$title', $id , '$fsp', '$jsp', '$comment');"; 
    }else if ($video) {
        $sql = "INSERT INTO script (stitle, upid, fsp, jsp, video) VALUES('$title', $id, '$fsp', '$jsp', '$video');"; 
    } else {
        $sql = "INSERT INTO script (stitle, upid, fsp, jsp) VALUES('$title', $id , '$fsp', '$jsp');"; 
    }
  

    // }
    $stmt = $db -> prepare($sql);
    $flag = $stmt -> execute();
    $cols = $stmt->fetch(PDO::FETCH_NUM);
    if(!$flag){
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: submit.php?err=3");
        exit;      
    }else{

        if($category){
            $sql = "SELECT sid FROM script WHERE stitle='$title' and fsp = '$fsp' and upid = '$id'";
             $stmt = $db -> prepare($sql);
            $flag = $stmt -> execute();
            $cols = $stmt->fetch(PDO::FETCH_NUM);
            $sql = "INSERT INTO category(cname, sid) VALUES ('$category', $cols[0])";
            $stmt = $db -> prepare($sql);
            $flag = $stmt -> execute();
        }
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: submit.php?pass=1");
        exit;      
    }
}
?>
