<?php
include_once "INIITController.php";
include_once "NIITConnectDB.php";
include_once "NIITTypedBlogShowGenerateJSON.php";
include_once "NIITCloseDB.php";

class NIITTypedBlogShowController implements INIITController {
    public function control(){}

    public function theniitTypedBlogShowControl(){

        //连接数据库
        $conn=NIITConnectDB::connecttheDB();

        //生成当前登录用户的博文列表json数据
        $niitTypedBlogShowGenerateJSON=new NIITTypedBlogShowGenerateJSON();
        $json=$niitTypedBlogShowGenerateJSON->theniitTypedBlogShowGenerateJSON($conn);
        echo $json;

        //关闭数据库连接
        NIITCloseDB::closetheDB($conn);

    }
}

?>