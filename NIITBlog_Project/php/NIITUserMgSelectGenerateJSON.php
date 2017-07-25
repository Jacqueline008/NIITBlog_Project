<?php
include_once "INIITGenerateJSON.php";

class NIITUserMgSelectGenerateJSON implements INIITGenerateJSON {
    public function generateJSON(){}

    public function theniitUserMgSelectGenerateJSON($conn){
        $sql="select * from User where name like '%".$_POST["word"]."%' and name not like '%*%' ";
        $stmt=$conn->prepare($sql);
        $stmt->execute(array());
        $flag=0;
        foreach($stmt as $row){
            $flag=1;
        }

        if($flag==0){
            //说明没有记录
            $result1='{"istheUser":"0"}';
        }else{
            //说明有记录
            $result1='{"istheUser":"1",';

            $sql="select * from User where name like '%".$_POST["word"]."%' and name not like '%*%' ";
            $stmt=$conn->prepare($sql);
            $stmt->execute(array());

            $result1=$result1.'"theUserList":[';

            //
            $flag=0;
            while(true){
                if($flag==0){
                    $row=$stmt->fetch();
                    $result1=$result1.'{';
                    $result1=$result1.'"name":"'.$row[0].'","userPic":"'.$row[3].'"';
                    $result1=$result1.'}';
                    $flag=1;
                }
                if($row=$stmt->fetch()){
                    $result1=$result1.',{';
                    $result1=$result1.'"name":"'.$row[0].'","userPic":"'.$row[3].'"';
                    $result1=$result1.'}';
                }else{
                    break;
                }
            }
            //
            $result1=$result1.']}';
        }

        return $result1;
    }
}

?>