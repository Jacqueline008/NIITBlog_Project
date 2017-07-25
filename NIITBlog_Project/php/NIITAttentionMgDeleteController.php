<?php
include_once "INIITController.php";
include_once "NIITConnectDB.php";
include_once "NIITStartSession.php";
include_once "NIITAttentionMgDeleteGetSession.php";
include_once "NIITAttentionMgDeleteDelete.php";
include_once "NIITAttentionMgDeleteShowResult.php";
include_once "NIITCloseDB.php";

class NIITAttentionMgDeleteController implements INIITController {
    public function control(){}

    public function theniitAttentionMgDeleteControl(){
        //连接数据库
        $conn=NIITConnectDB::connecttheDB();
        //获取当前登录用户名字
        NIITStartSession::starttheSession();
        $niitAttentionMgDeleteGetSession=new NIITAttentionMgDeleteGetSession();
        $userName=$niitAttentionMgDeleteGetSession->getSessionUserName();

        //删除在attention表中当前用户想要取消的关注
        //获取想要取消关注的被关注的名字
        $beAttentionedName=$_POST["beAttentionedName"];
        $niitAttentionMgDeleteDelete=new NIITAttentionMgDeleteDelete();
        $niitAttentionMgDeleteDelete->deleteAttention($conn,$beAttentionedName,$userName);

        //显示删除成功消息
        $niitAttentionMgDeleteShowResult=new NIITAttentionMgDeleteShowResult();
        $niitAttentionMgDeleteShowResult->showSuccessDelete();

        //关闭数据库连接
        NIITCloseDB::closetheDB($conn);
    }
}

?>