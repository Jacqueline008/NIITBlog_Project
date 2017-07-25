<?php
include_once "INIITController.php";
include_once "NIITConnectDB.php";
include_once "NIITBlogMgShowGenerateJSON.php";
include_once "NIITCloseDB.php";

class NIITBlogMgShowController implements INIITController {
    public function control(){}

    public function theniitBlogMgShowControl(){
        //连接数据库
        $conn=NIITConnectDB::connecttheDB();

        //生成json数据
        $niitBlogMgShowGenerateJSON=new NIITBlogMgShowGenerateJSON();
        $json=$niitBlogMgShowGenerateJSON->theniitBlogMgShowGenerateJSON($conn);

        echo $json;

        //关闭数据库连接
        NIITCloseDB::closetheDB($conn);
    }
}


?>