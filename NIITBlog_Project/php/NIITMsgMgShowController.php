<?php
include_once "INIITController.php";
include_once "NIITConnectDB.php";
include_once "NIITStartSession.php";
include_once "NIITMsgMgShowGetSession.php";
include_once "NIITMsgMgShowGenerateJSON.php";
include_once "NIITCloseDB.php";

class NIITMsgMgShowController implements INIITController {
    public function control(){}

    public function theniitMsgMgShowControl(){
        //连接数据库
        $conn=NIITConnectDB::connecttheDB();

        //获取当前登录用户名
        NIITStartSession::starttheSession();
        $niitMsgMgShowGetSession=new NIITMsgMgShowGetSession();
        $userName=$niitMsgMgShowGetSession->getSessionUserName();

        $niitMsgMgShowGenerateJSON=new NIITMsgMgShowGenerateJSON();
        $json1=$niitMsgMgShowGenerateJSON->theniitMsgMgShowGenerateJSON1($conn,$userName);
        $json2=$niitMsgMgShowGenerateJSON->theniitMsgMgShowGenerateJSON2($conn,$userName);

        echo '{'.$json1.','.$json2.'}';

        //关闭数据库连接
        NIITCloseDB::closetheDB($conn);
    }

}


?>