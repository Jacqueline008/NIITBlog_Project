<?php
include_once "INIITGenerateJSON.php";

class NIITAuthorShowGenerateJSON implements INIITGenerateJSON {
    public function generateJSON(){}

    public function theniitAuthorShowGenerateJSON1($conn,$name){
        $sql="select * from User where name=?";
        $stmt=$conn->prepare($sql);
        $stmt->execute( array($name) ) ;

        foreach($stmt as $row){
            $name=$row[0];
            $userPic=$row[3];
            $userDes=$row[4];
        }
        $result1='"name":"'.$name.'","userPic":"'.$userPic.'","userDes":"'.$userDes.'"';
        return $result1;
    }

    public function theniitAuthorShowGenerateJSON2($conn,$name){
        //检查该登录用户是否在attention的beAttentionedName中有记录
        $sql="select * from blog,User where author=name and author=? order by id desc";
        $stmt=$conn->prepare($sql);
        $stmt->execute(array($name));
        $flag=0;
        foreach($stmt as $row){
            $flag=1;
        }

        if($flag==0){
            //说明该登录用户是否在attention的attentionName中没有记录
            $result2='"isblog":"0"';
        }else{
            //说明该登录用户是否在attention的attentionName中有记录
            $result2='"isblog":"1",';

            $sql="select * from blog,User where author=name and author=? order by id desc";
            $stmt=$conn->prepare($sql);
            $stmt->execute(array($name));

            $result2=$result2.'"blogList":[';

            //
            $flag=0;
            while(true){
                if($flag==0){
                    $row=$stmt->fetch();
                    $result2=$result2.'{';
                    $result2=$result2.'"userPic":"'.$row[11].'","author":"'.$row[1].'","createTime":"'.$row[4].'","title":"'.$row[2].'","smallcontent":"'.str_replace("\n"," ",str_replace("\r\n"," ",substr($row[3],0,250))).'","id":"'.$row[0].'"';
                    $result2=$result2.'}';
                    $flag=1;
                }
                if($row=$stmt->fetch()){
                    $result2=$result2.',{';
                    $result2=$result2.'"userPic":"'.$row[11].'","author":"'.$row[1].'","createTime":"'.$row[4].'","title":"'.$row[2].'","smallcontent":"'.str_replace("\n"," ",str_replace("\r\n"," ",substr($row[3],0,250))).'","id":"'.$row[0].'"';
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