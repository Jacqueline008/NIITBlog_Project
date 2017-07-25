<?php
include_once "INIITController.php";
include_once "NIITConnectDB.php";
include_once "NIITStartSession.php";
include_once "NIITSendViewGetSession.php";
include_once "NIITSendViewInsert.php";
include_once "NIITSendViewShowResult.php";
include_once "NIITCloseDB.php";

class NIITSendViewController implements INIITController {
    public function control(){}

    public function theniitSendViewController(){
        //连接数据库
        $conn=NIITConnectDB::connecttheDB();

        //获取当前登录用户名（评论者名称）
        NIITStartSession::starttheSession();
        $niitsendViewGetSession=new NIITSendViewGetSession();
        $viewAuthor=$niitsendViewGetSession->getSessionUserName();

        //获取博文id,评论内容
        $blogID=$_POST["blogID"];
        $content=$_POST["content"];

        //将博文id,评论者名称，评论内容插入view表中
        $niitSendViewInsert=new NIITSendViewInsert();
        $niitSendViewInsert->theniitSendViewInsert($blogID,$viewAuthor,$content,$conn);

        //展示评论成功信息
        $niitSendViewShowResult=new NIITSendViewShowResult();
        $niitSendViewShowResult->showSuccessView();

        //关闭数据库连接
        NIITCloseDB::closetheDB($conn);
    }
}

?>