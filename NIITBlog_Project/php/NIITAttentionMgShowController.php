<?php
include_once "INIITController.php";
include_once "NIITConnectDB.php";
include_once "NIITStartSession.php";
include_once "NIITAttentionMgShowGetSession.php";
include_once "NIITAttentionMgShowGenerateJSON.php";
include_once "NIITCloseDB.php";

class NIITAttentionMgShowController implements INIITController {
    public function control(){}

    public function theniitAttentionMgShowControl(){
        //连接数据库
        $conn=NIITConnectDB::connecttheDB();

        //获取当前登录用户名
        NIITStartSession::starttheSession();
        $niitAttentionMgShowGetSession=new NIITAttentionMgShowGetSession();
        $userName=$niitAttentionMgShowGetSession->getSessionUserName();

        $niitAttentionMgShowGenerateJSON=new NIITAttentionMgShowGenerateJSON();
        $json1=$niitAttentionMgShowGenerateJSON->theniitAttentionMgShowGenerateJSON1($conn,$userName);
        $json2=$niitAttentionMgShowGenerateJSON->theniitAttentionMgShowGenerateJSON2($conn,$userName);

        $json='{'.$json1.','.$json2.'}';
        echo $json;

        //关闭数据库连接
        NIITCloseDB::closetheDB($conn);
    }
}

?>