<?php
include_once "INIITController.php";
include_once "NIITConnectDB.php";
include_once "NIITStartSession.php";
include_once "NIITSendMsgGetSession.php";
include_once "NIITSendMsgInsert.php";
include_once "NIITSendMsgShowResult.php";
include_once "NIITCloseDB.php";

class NIITSendMsgController implements INIITController {
    public function control(){}

    public function theniitSendMsgControl(){
        //连接数据库
        $conn=NIITConnectDB::connecttheDB();

        //获取当前登录用户名（私信者名称）
        NIITStartSession::starttheSession();
        $niitSendMsgGetSession=new NIITSendMsgGetSession();
        $MsgName=$niitSendMsgGetSession->getSessionUserName();

        //获取要发送的被私信者名称和私信内容
        $beMsgName=$_POST["beMsgName"];
        $MsgContent=$_POST["MsgContent"];

        //将要发送的被私信者名称和私信内容和私信者名称插入msg表中
        $niitSendMsgInsert=new NIITSendMsgInsert();
        $niitSendMsgInsert->theniitSendMsgInsert($conn,$beMsgName,$MsgName,$MsgContent);

        //展示发送私信成功消息
        $niitSendMsgShowResult=new NIITSendMsgShowResult();
        $niitSendMsgShowResult->showSuccessMsg();

        //关闭数据库连接
        NIITCloseDB::closetheDB($conn);
    }
}

?>