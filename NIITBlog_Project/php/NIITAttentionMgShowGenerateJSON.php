<?php
include_once "INIITGenerateJSON.php";

class NIITAttentionMgShowGenerateJSON implements INIITGenerateJSON {
    public function generateJSON(){}

    //生成是否有我关注的
    public function theniitAttentionMgShowGenerateJSON1($conn,$userName){

        //检查该登录用户是否在attention的attentionName中有记录
        $sql="select * from attention,User where beAttentionedName=name and attentionName=? order by attentionID desc";
        $stmt=$conn->prepare($sql);
        $stmt->execute(array($userName));
        $flag=0;
        foreach($stmt as $row){
            $flag=1;
        }

        if($flag==0){
            //说明该登录用户是否在attention的attentionName中没有记录
            $result1='"isAttention":"0"';
        }else{
            //说明该登录用户是否在attention的attentionName中有记录
            $result1='"isAttention":"1",';

            $sql="select * from attention,User where beAttentionedName=name and attentionName=? order by attentionID desc";
            $stmt=$conn->prepare($sql);
            $stmt->execute(array($userName));

            $result1=$result1.'"AttentionList":[';

            //
            $flag=0;
            while(true){
                if($flag==0){
                    $row=$stmt->fetch();
                    $result1=$result1.'{';
                    $result1=$result1.'"beAttentionedName":"'.$row[1].'","userPic":"'.$row[6].'"';
                    $result1=$result1.'}';
                    $flag=1;
                }
                if($row=$stmt->fetch()){
                    $result1=$result1.',{';
                    $result1=$result1.'"beAttentionedName":"'.$row[1].'","userPic":"'.$row[6].'"';
                    $result1=$result1.'}';
                }else{
                    break;
                }
            }
            //
            $result1=$result1.']';
        }

        return $result1;
    }

    //生成是否有关注我的
    public function theniitAttentionMgShowGenerateJSON2($conn,$userName){

        //检查该登录用户是否在attention的beAttentionedName中有记录
        $sql="select * from attention,User where attentionName=name and beAttentionedName=? order by attentionID desc";
        $stmt=$conn->prepare($sql);
        $stmt->execute(array($userName));
        $flag=0;
        foreach($stmt as $row){
            $flag=1;
        }

        if($flag==0){
            //说明该登录用户是否在attention的attentionName中没有记录
            $result2='"isBeAttention":"0"';
        }else{
            //说明该登录用户是否在attention的attentionName中有记录
            $result2='"isBeAttention":"1",';

            $sql="select * from attention,User where attentionName=name and beAttentionedName=? order by attentionID desc";
            $stmt=$conn->prepare($sql);
            $stmt->execute(array($userName));

            $result2=$result2.'"BeAttentionList":[';

            //
            $flag=0;
            while(true){
                if($flag==0){
                    $row=$stmt->fetch();
                    $result2=$result2.'{';
                    $result2=$result2.'"attentionName":"'.$row[2].'","userPic":"'.$row[6].'"';
                    $result2=$result2.'}';
                    $flag=1;
                }
                if($row=$stmt->fetch()){
                    $result2=$result2.',{';
                    $result2=$result2.'"attentionName":"'.$row[2].'","userPic":"'.$row[6].'"';
                    $result2=$result2.'}';
                }else{
                    break;
                }
            }
            //
            $result2=$result2.']';
        }

        return $result2;
    }
}


?>