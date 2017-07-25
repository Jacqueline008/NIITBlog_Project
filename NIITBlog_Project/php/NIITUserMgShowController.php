<?php
include_once "INIITController.php";
include_once "NIITConnectDB.php";
include_once "NIITUserMgShowGenerateJSON.php";
include_once "NIITCloseDB.php";

class NIITUserMgShowController implements INIITController {
    public function control(){}

    public function theniitUserMgShowControl(){
        //连接数据库
        $conn=NIITConnectDB::connecttheDB();

        //生成所有用户的json数据
        $niitUserMgShowGenerateJSON=new NIITUserMgShowGenerateJSON();
        $json=$niitUserMgShowGenerateJSON->theniitUserMgShowGenerateJSON($conn);

        echo $json;

        //关闭数据库连接
        NIITCloseDB::closetheDB($conn);
    }
}

?>