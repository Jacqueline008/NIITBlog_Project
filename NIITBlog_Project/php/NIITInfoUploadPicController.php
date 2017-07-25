<?php
include_once "INIITController.php";
include_once "NIITConnectDB.php";
include_once "NIITInfoUploadPicUpload.php";
include_once "NIITStartSession.php";
include_once "NIITInfoUploadPicGetSession.php";
include_once "NIITInfoUploadPicUpdate.php";
include_once "NIITCloseDB.php";
include_once "NIITInfoUploadPicShowResult.php";

class NIITInfoUploadPicController implements INIITController {
    public function control(){}

    public function theNiitInfoUploadPicControl(){
        //获取数据库连接
        $conn=NIITConnectDB::connecttheDB();

        //将用户上传的图片从临时路径存储到服务器的一个本地路径
        $niitInfoUploadPicUpload=new NIITInfoUploadPicUpload();
        $picPath=$niitInfoUploadPicUpload->theniitInfoUploadPicUpload();

        NIITStartSession::starttheSession();
        //获取到该会话中的用户名
        $niitInfoUploadPicGetSession=new NIITInfoUploadPicGetSession();
        $userName=$niitInfoUploadPicGetSession->getSessionUserName();
        //将该用户名对应的picPath更改为$picPath
        $niitInfoUploadPicUpdate=new NIITInfoUploadPicUpdate();
        $niitInfoUploadPicUpdate->theniitInfoUploadPicUpdate($picPath,$userName,$conn);

        //关闭数据库连接
        NIITCloseDB::closetheDB($conn);

        //再次跳转到该页
        $niitInfoUploadPicShowResult=new NIITInfoUploadPicShowResult();
        $niitInfoUploadPicShowResult->theniitInfoUploadPicShowResult();
    }
}

?>