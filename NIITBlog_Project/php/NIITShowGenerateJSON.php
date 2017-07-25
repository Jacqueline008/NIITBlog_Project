<?php
include_once "INIITGenerateJSON.php";

class NIITShowGenerateJSON implements INIITGenerateJSON {
    public function generateJSON(){}

    public function theniitShowGenerateJSON($conn,$currentrow){
        $sql="select * from blog,User where author=name order by id desc limit ?,10";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $currentrow, PDO::PARAM_INT);
        $stmt->execute();

        $flag=0;
        foreach($stmt as $row){
            $flag=1;
        }

        if($flag==0){
            //说明没有记录
            $result2='{"isblog":"0"}';
        }else{
            //说明有记录
            $result2='{"isblog":"1",';

            $sql="select * from blog,User where author=name order by id desc limit ?,10";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $currentrow, PDO::PARAM_INT);
            $stmt->execute();

            $result2=$result2.'"blogList":[';

            //
            $flag=0;
            while(true){
                if($flag==0){
                    $row=$stmt->fetch();
                    $result2=$result2.'{';
                    $result2=$result2.'"id":"'.$row[0].'","author":"'.$row[1].'","title":"'.$row[2].'","smallcontent":"'.str_replace("\n"," ",str_replace("\r\n"," ",substr($row[3],0,250))).'","createTime":"'.$row[4].'","blogType":"'.$row[5].'","userPic":"'.$row[11].'"';
                    $result2=$result2.'}';
                    $flag=1;
                }
                if($row=$stmt->fetch()){
                    $result2=$result2.',{';
                    $result2=$result2.'"id":"'.$row[0].'","author":"'.$row[1].'","title":"'.$row[2].'","smallcontent":"'.str_replace("\n"," ",str_replace("\r\n"," ",substr($row[3],0,250))).'","createTime":"'.$row[4].'","blogType":"'.$row[5].'","userPic":"'.$row[11].'"';
                    $result2=$result2.'}';
                }else{
                    break;
                }
            }
            //
            $result2=$result2.']}';
        }

        return $result2;
    }
}


?>