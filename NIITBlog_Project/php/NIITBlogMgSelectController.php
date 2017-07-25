<?php
include_once "INIITController.php";
include_once "NIITConnectDB.php";
include_once "NIITBlogMgSelectGenerateJSON.php";
include_once "NIITCloseDB.php";

class NIITBlogMgSelectController implements INIITController {
    public function control(){}

    public function theniitBlogMgSelectControl(){
        //链接数据库
        $conn=NIITConnectDB::connecttheDB();

        //生成json数据
        $niitBlogMgSelectGenerateJSON=new NIITBlogMgSelectGenerateJSON();
        $json=$niitBlogMgSelectGenerateJSON->theniitBlogMgSelectGenerateJSON($conn);

        echo $json;

        //关闭数据库连接
        NIITCloseDB::closetheDB($conn);

    }
}


?>