<?php
include_once "INIITController.php";
include_once "NIITConnectDB.php";
include_once "NIITShowGenerateJSON.php";
include_once "NIITCloseDB.php";

class NIITShowController implements INIITController {
    public function control(){}

    public function theniitShowController(){
        //连接数据库
        $conn=NIITConnectDB::connecttheDB();

        //获取当前行
        $currentrow=intval($_POST["currentrow"]);
        $niitShowGenerateJSON=new NIITShowGenerateJSON();
        $json=$niitShowGenerateJSON->theniitShowGenerateJSON($conn,$currentrow);

        echo $json;

        //关闭数据库连接
        NIITCloseDB::closetheDB($conn);
    }
}


?>