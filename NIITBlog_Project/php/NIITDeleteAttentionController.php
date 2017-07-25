<?php
include_once "INIITController.php";
include_once "NIITConnectDB.php";
include_once "NIITStartSession.php";
include_once "NIITDeleteAttentionGetSession.php";
include_once "NIITDeleteAttentionSelect.php";
include_once "NIITDeleteAttentionDelete.php";
include_once "NIITDeleteAttentionShowResult.php";
include_once "NIITCloseDB.php";

class NIITDeleteAttentionController implements INIITController {
    public function control(){}

    public function theniitDeleteAttentionControl(){
        //连接数据库
        $conn=NIITConnectDB::connecttheDB();
        //获取当前登录用户名
        NIITStartSession::starttheSession();
        $niitDeleteAttentionGetSession=new NIITDeleteAttentionGetSession();
        $attentionName=$niitDeleteAttentionGetSession->getSessionUserName();

        //获取要取消关注的作者名称
        $blogID=$_POST["blogID"];
        $niitDeleteAttentionSelect=new NIITDeleteAttentionSelect();
        $beAttentionedName=$niitDeleteAttentionSelect->theniitDeleteAttentionSelect($conn,$blogID);

        //将要取消关注的作者名称和当前登录用户名在attention表中删除
        $niitDeleteAttentionDelete=new NIITDeleteAttentionDelete();
        $niitDeleteAttentionDelete->theniitDeleteAttentionDelete($conn,$beAttentionedName,$attentionName);

        //返回成功取消关注消息
        $niitDeleteAttentionShowResult=new NIITDeleteAttentionShowResult();
        $niitDeleteAttentionShowResult->showSuccessDeleteAttention();

        //关闭数据库连接
        NIITCloseDB::closetheDB($conn);
    }
}

?>