<?php
include_once "INIITGenerateJSON.php";

class NIITBlogMgSelectGenerateJSON implements INIITGenerateJSON {
    public function generateJSON(){}

    public function theniitBlogMgSelectGenerateJSON($conn){
        $sql="select * from (select * from blog where content like '%".$_POST["word"]."%' or title like '%".$_POST["word"]."%') a , User b where a.author=b.name order by id desc";
        $stmt=$conn->prepare($sql);
        $stmt->execute(array());
        $flag=0;
        foreach($stmt as $row){
            $flag=1;
        }

        if($flag==0){
            //说明没有记录
            $result1='{"istheBlog":"0"}';
        }else{
            //说明有记录
            $result1='{"istheBlog":"1",';

            $sql="select * from (select * from blog where content like '%".$_POST["word"]."%' or title like '%".$_POST["word"]."%') a join User b where a.author=b.name  order by id desc";
            $stmt=$conn->prepare($sql);
            $stmt->execute(array());

            $result1=$result1.'"theBlogList":[';

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
        }

        return $result1;
    }
}

?>