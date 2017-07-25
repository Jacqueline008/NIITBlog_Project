<?php
include_once "INIITController.php";
include_once "NIITConnectDB.php";
include_once "NIITStartSession.php";
include_once "NIITAddAttentionGetSession.php";
include_once "NIITAddAttentionSelect.php";
include_once "NIITAddAttentionInsert.php";
include_once "NIITAddAttentionShowResult.php";
include_once "NIITCloseDB.php";

class NIITAddAttentionController implements INIITController {
    public function control(){}

    public function theniitAddAttentionControl(){
        //连接数据库
        $conn=NIITConnectDB::connecttheDB();

        //获取当前登录用户名
        NIITStartSession::starttheSession();
        $niitAddAttentionGetSession=new NIITAddAttentionGetSession();
        $attentionName=$niitAddAttentionGetSession->getSessionUserName();

        //获取要被关注的作者名称
        $blogID=$_POST["blogID"];
        $niitAddAttentionSelect=new NIITAddAttentionSelect();
        $beAttentionedName=$niitAddAttentionSelect->theniitAddAttentionSelect($conn,$blogID);

        //将被关注者名称和关注者插入attention表中
        $niitAddAttentionInsert=new NIITAddAttentionInsert();
        $niitAddAttentionInsert->theniitAddAttentionInsert($conn,$beAttentionedName,$attentionName);

        //返回成功关注消息
        $niitAddAttentionShowResult=new NIITAddAttentionShowResult();
        $niitAddAttentionShowResult->showSuccessAddAttention();

        //关闭数据库连接
        NIITCloseDB::closetheDB($conn);
    }
}

?>