<?php
include_once "INIITGenerateJSON.php";

class NIITUserMgShowGenerateJSON implements INIITGenerateJSON {
    public function generateJSON(){}

    public function theniitUserMgShowGenerateJSON($conn){

        $sql="select * from user where name not like '%*%' ";
        $stmt=$conn->prepare($sql);
        $stmt->execute();

        $result1='{"userList":[';

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

        return $result1;
    }
}

?>