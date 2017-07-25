<?php
include_once "INIITGenerateJSON.php";

class NIITBlogMgShowGenerateJSON implements INIITGenerateJSON{
    public function generateJSON(){}

    public function theniitBlogMgShowGenerateJSON($conn){
        $sql="select * from blog,User where author=name order by id desc";
        $stmt=$conn->prepare($sql);
        $stmt->execute();

        $result1='{"blogList":[';

        //
        $flag=0;
        while(true){
            if($flag==0){
                $row=$stmt->fetch();
                $result1=$result1.'{';
                $result1=$result1.'"id":"'.$row[0].'","userPic":"'.$row[11].'","author":"'.$row[1].'","createTime":"'.$row[4].'","title":"'.$row[2].'"';
                $result1=$result1.'}';
                $flag=1;
            }
            if($row=$stmt->fetch()){
                $result1=$result1.',{';
                $result1=$result1.'"id":"'.$row[0].'","userPic":"'.$row[11].'","author":"'.$row[1].'","createTime":"'.$row[4].'","title":"'.$row[2].'"';
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