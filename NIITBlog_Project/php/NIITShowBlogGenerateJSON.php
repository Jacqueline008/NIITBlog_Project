<?php
include_once "INIITGenerateJSON.php";

class NIITShowBlogGenerateJSON implements INIITGenerateJSON  {
    public function generateJSON(){}

    public function theniitShowBlogGenerateJSON($conn,$blogID){
        //获取博主名称，博文标题，博文正文，创建时间，所属分类，喜欢数量，不喜欢数量
        $sqlSelect="select * from blog where id=?";
        $stmtSelect=$conn->prepare($sqlSelect);
        $stmtSelect->execute(array($blogID));
        foreach($stmtSelect as $row){
            $author=$row[1];
            $title=$row[2];
            $content=str_replace("\n","\\n",str_replace("\r\n","\\n",$row[3]));
            $createTime=$row[4];
            $blogType=$row[5];
            $blogLike=$row[6];
            $dislike=$row[7];
        }
        //获取博主头像
        $sqlSelect="select * from User where name=?";
        $stmtSelect=$conn->prepare($sqlSelect);
        $stmtSelect->execute(array($author));
        foreach($stmtSelect as $row){
            $userPic=$row[3];
        }

        //获取登录用户名称
        session_start();
        if(isset($_SESSION["userName"])){
            $loginname=$_SESSION["userName"];
        }else{
            $loginname="";
        }
        //获取登录用户头像
        $sqlSelect="select * from User where name=?";
        $stmtSelect=$conn->prepare($sqlSelect);
        $stmtSelect->execute(array($loginname));
        $loginUserPic="";
        foreach($stmtSelect as $row){
            $loginUserPic=$row[3];
        }

        //获取是否关注
        $sqlSelect="select * from attention where beAttentionedName=? and attentionName=?";
        $stmtSelect=$conn->prepare($sqlSelect);
        $stmtSelect->execute(array($author,$loginname));
        $flag=0;
        foreach($stmtSelect as $row){
            $flag=1;
        }
        if($flag==1){
            $isAttention=1;
        }else{
            $isAttention=0;
        }

        $json='{"author":"'.$author.'","title":"'.$title.'","content":"'.$content.'","createTime":"'.$createTime.'","blogType":"'.$blogType.'","blogLike":"'.$blogLike.'","dislike":"'.$dislike.'","userPic":"'.$userPic.'","isAttention":"'.$isAttention.'","loginUserPic":"'.$loginUserPic.'"';
        return $json;
    }

    public function theniitShowBlogGenerateJSON2($conn,$blogID){
        //检查该博文是否在view中有记录
        $sqlSelect="select * from view,User where viewAuthor=name and blogID=? order by viewID desc";
        $stmtSelect=$conn->prepare($sqlSelect);
        $stmtSelect->execute(array($blogID));
        $flag=0;
        foreach($stmtSelect as $row){
            $flag=1;
        }

        //如果没有记录
        if($flag==0){
            $json='"isView":"0"';
        }else{
            //如果有记录
            //else begin
            $sqlSelectJoin="select * from view,User where viewAuthor=name and blogID=? order by viewID desc";
            $stmtSelectJoin=$conn->prepare($sqlSelectJoin);
            $stmtSelectJoin->execute(array($blogID));

            //访问搜索出的?条数据
            $result='"viewList":[';
            //
            $joinflag=0;
            while(true){
                if($joinflag==0){
                    $row=$stmtSelectJoin->fetch();
                    $result=$result.'{';
                    $result=$result.'"viewAuthor":"'.$row[2].'","viewContent":"'.$row[3].'","viewTime":"'.$row[4].'","viewUserPic":"'.$row[8].'"';
                    $result=$result.'}';
                    $joinflag=1;
                }
                if($row=$stmtSelectJoin->fetch()){
                    $result=$result.',{';
                    $result=$result.'"viewAuthor":"'.$row[2].'","viewContent":"'.$row[3].'","viewTime":"'.$row[4].'","viewUserPic":"'.$row[8].'"';
                    $result=$result.'}';
                }else{
                    break;
                }
            }
            //
            $result=$result.']';
            //组合搜索结果
            $json='"isView":"1",'.$result;
            //else end
        }
        return $json;
    }
}

?>