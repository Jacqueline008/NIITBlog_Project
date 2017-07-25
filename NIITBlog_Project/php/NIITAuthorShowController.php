<?php
include_once "INIITController.php";
include_once "NIITConnectDB.php";
include_once "NIITAuthorShowGenerateJSON.php";
include_once "NIITCloseDB.php";

class NIITAuthorShowController implements INIITController {
    public function control(){}

    public function theniitAuthorShowControl(){
        //连接数据库
        $conn=NIITConnectDB::connecttheDB();

        //获取要展示的博主名称
        $name=$_POST["name"];

        //生成json数据
        $niitAuthorShowGenerateJSON=new NIITAuthorShowGenerateJSON();
        $json1=$niitAuthorShowGenerateJSON->theniitAuthorShowGenerateJSON1($conn,$name);
        $json2=$niitAuthorShowGenerateJSON->theniitAuthorShowGenerateJSON2($conn,$name);

        echo '{'.$json1.','.$json2.'}';

        //关闭数据库连接
        NIITCloseDB::closetheDB($conn);
    }
}

?>