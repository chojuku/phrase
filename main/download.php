<?php
$sql = "SELECT * FROM card";
        $sth = $dbh->query($sql);
        $i=0;
        $ii=0;
        while($row = $sth->fetch(PDO::FETCH_ASSOC)){
            $lineData = $row[$i] . ",";
            $i++;
            while($i<$numOfRows){
                $lineData .= $row[$i] . "," ;
                $i++;
            }
            $lineData .= $row[$formsAllField[$numOfLastRow]];  
            $csvData[$ii] = split(',',$lineData);
            $ii++;
            $i=0;
        }
//headerの指定によってファイルとして認識させ、ダウンロード可能
        header("Content-disposition: attachment; filename=data.csv");
        header("Content-type: plain/text; name=data.csv");   
//php://outputに出力することで書き込み可能な上にファイルは残らない！素敵！
        $fp = fopen('php://output','w');
//foreachでライン毎にfputcsvでCSV出力
        foreach($csvData as $line){
            fputcsv($fp, $line);
        }
        fclose($fp);
 //exit処理しないとHTML本文も一緒に出力されてしまう
       exit;
}

?>