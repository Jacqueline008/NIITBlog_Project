<?php
include_once "INIITGenerateJSON.php";

class NIITTypedBlogShowGenerateJSON implements INIITGenerateJSON {
    public function generateJSON(){}

    public function theniitTypedBlogShowGenerateJSON($conn){

        //获取当前登录用户名
        session_start();
        $userName=$_SESSION["userName"];

        //检查该博主是否在blog中有记录
        $sql="select * from blog where author=? order by id desc";
        $stmt=$conn->prepare($sql);
        $stmt->execute(array($userName));
        $flag=0;
        foreach($stmt as $row){
            $flag=1;
        }

        if($flag==0){
            //说明该博主在blog中没有记录
            $result='{"blogList":[]}';
        }else{
            //*************else begin

            //说明该博主在blog中有记录
            $sql="select * from blog where author=? order by id desc";
            $stmt=$conn->prepare($sql);
            $stmt->execute(array($userName));

            //访问搜索出的?条数据
            $result='{"blogList":[';

            //
            $flag=0;
            while(true){
                if($flag==0){
                    $row=$stmt->fetch();
                    $result=$result.'{';
                    $result=$result.'"id":"'.$row[0].'","title":"'.$row[2].'","createTime":"'.$row[4].'","blogType":"'.$row[5].'"';
                    $result=$result.'}';
                    $flag=1;
                }
                if($row=$stmt->fetch()){
                    $result=$result.',{';
                    $result=$result.'"id":"'.$row[0].'","title":"'.$row[2].'","createTime":"'.$row[4].'","blogType":"'.$row[5].'"';
                    $result=$result.'}';
                }else{
                    break;
                }
            }
            //

            $result=$result.']}';

            //*************else end
        }



        return $result;
    }
}

?>