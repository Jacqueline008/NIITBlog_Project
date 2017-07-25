<?php
include_once "INIITController.php";
include_once "NIITConnectDB.php";
include_once "NIITStartSession.php";
include_once "NIITInfoUploadTextGetSession.php";
include_once "NIITInfoUploadTextUpdate.php";
include_once "NIITCloseDB.php";
include_once "NIITInfoUploadTextShowResult.php";

class NIITInfoUploadTextController implements INIITController {
    public function control(){}

    public function theniitInfoUploadTextControl(){
        //获取数据库连接
        $conn=NIITConnectDB::connecttheDB();
        //获取登录用户名字
        NIITStartSession::starttheSession();
        $niitInfoUploadTextGetSession=new NIITInfoUploadTextGetSession();
        $name=$niitInfoUploadTextGetSession->getSessionUserName();
        //获取用户电话，个人描述
        $tel=$_POST["UserTel"];
        $userDes=$_POST["UserDes"];
        //将用户信息更新
        $niitInfoUploadTextUpdate=new NIITInfoUploadTextUpdate();
        $niitInfoUploadTextUpdate->theniitInfoUploadTextUpload($tel,$userDes,$name,$conn);
        //关闭数据库连接
        NIITCloseDB::closetheDB($conn);
        //直接再次跳转到该页面
        $niitInfoUploadTextShowResult=new NIITInfoUploadTextShowResult();
        $niitInfoUploadTextShowResult->theniitInfoUploadTextShowResult();
    }
}

?>