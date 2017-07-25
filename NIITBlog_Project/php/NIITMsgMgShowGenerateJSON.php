<?php
include_once "INIITGenerateJSON.php";

class NIITMsgMgShowGenerateJSON implements INIITGenerateJSON {
    public function generateJSON(){}

    //先生成我接收的
    public function theniitMsgMgShowGenerateJSON1($conn,$userName){

        $sql="select * from msg,User where MsgName=name and beMsgName=? order by msgID desc";
        $stmt=$conn->prepare($sql);
        $stmt->execute(array($userName));
        $flag=0;
        foreach($stmt as $row){
            $flag=1;
        }

        if($flag==0){
            //说明该登录用户在msg的beMsgName中没有记录
            $result1='"isbeMsg":"0"';
        }else{
            //说明该登录用户在msg的beMsgName中有记录
            $result1='"isbeMsg":"1",';

            $sql="select * from msg,User where MsgName=name and beMsgName=? order by msgID desc";
            $stmt=$conn->prepare($sql);
            $stmt->execute(array($userName));

            $result1=$result1.'"beMsgList":[';

            //
            $flag=0;
            while(true){
                if($flag==0){
                    $row=$stmt->fetch();
                    $result1=$result1.'{';
                    $result1=$result1.'"userPic":"'.$row[8].'","MsgName":"'.$row[2].'","MsgTime":"'.$row[4].'","MsgContent":"'.$row[3].'"';
                    $result1=$result1.'}';
                    $flag=1;
                }
                if($row=$stmt->fetch()){
                    $result1=$result1.',{';
                    $result1=$result1.'"userPic":"'.$row[8].'","MsgName":"'.$row[2].'","MsgTime":"'.$row[4].'","MsgContent":"'.$row[3].'"';
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

    //生成我发送的
    public function theniitMsgMgShowGenerateJSON2($conn,$userName){

        $sql="select * from msg,User where beMsgName=name and MsgName=? order by msgID desc";
        $stmt=$conn->prepare($sql);
        $stmt->execute(array($userName));
        $flag=0;
        foreach($stmt as $row){
            $flag=1;
        }

        if($flag==0){
            //说明该登录用户是否在msg的MsgName中没有记录
            $result2='"isMsg":"0"';
        }else{
            //说明该登录用户是否在msg的MsgName中有记录
            $result2='"isMsg":"1",';

            $sql="select * from msg,User where beMsgName=name and MsgName=? order by msgID desc";
            $stmt=$conn->prepare($sql);
            $stmt->execute(array($userName));

            $result2=$result2.'"MsgList":[';

            //
            $flag=0;
            while(true){
                if($flag==0){
                    $row=$stmt->fetch();
                    $result2=$result2.'{';
                    $result2=$result2.'"userPic":"'.$row[8].'","beMsgName":"'.$row[1].'","MsgTime":"'.$row[4].'","MsgContent":"'.$row[3].'"';
                    $result2=$result2.'}';
                    $flag=1;
                }
                if($row=$stmt->fetch()){
                    $result2=$result2.',{';
                    $result2=$result2.'"userPic":"'.$row[8].'","beMsgName":"'.$row[1].'","MsgTime":"'.$row[4].'","MsgContent":"'.$row[3].'"';
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