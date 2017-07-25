<?php
include_once "INIITController.php";
include_once "NIITConnectDB.php";
include_once "NIITUserMgDeleteDelete.php";
include_once "NIITUserMgDeleteShowResult.php";
include_once "NIITCloseDB.php";

class NIITUserMgDeleteController implements INIITController {
    public function control(){}

    public function theniitUserMgDeleteControl(){
        //连接数据库
        $conn=NIITConnectDB::connecttheDB();

        //获取要删除的用户名
        $name=$_POST["name"];
        $niitUserMgDeleteDelete=new NIITUserMgDeleteDelete();
        $niitUserMgDeleteDelete->deleteUser($conn,$name);

        //显示删除成功信息
        $niitUserMgDeleteShowResult=new NIITUserMgDeleteShowResult();
        $niitUserMgDeleteShowResult->showSuccessDelete();

        //关闭数据库连接
        NIITCloseDB::closetheDB($conn);
    }
}

?>