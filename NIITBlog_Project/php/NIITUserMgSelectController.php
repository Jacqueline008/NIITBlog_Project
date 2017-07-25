<?php
include_once "INIITController.php";
include_once "NIITConnectDB.php";
include_once "NIITUserMgSelectGenerateJSON.php";
include_once "NIITCloseDB.php";

class NIITUserMgSelectController implements INIITController {
    public function control(){}

    public function theniitUserMgSelectControl(){
        //连接数据库
        $conn=NIITConnectDB::connecttheDB();

        //生成json
        $niitUserMgSelectGenerateJSON=new NIITUserMgSelectGenerateJSON();
        $json=$niitUserMgSelectGenerateJSON->theniitUserMgSelectGenerateJSON($conn);

        echo $json;

        //关闭数据库连接
        NIITCloseDB::closetheDB($conn);
    }
}

?>