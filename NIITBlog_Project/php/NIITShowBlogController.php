<?php
include_once "INIITController.php";
include_once "NIITConnectDB.php";
include_once "NIITShowBlogGenerateJSON.php";
include_once "NIITCloseDB.php";

class NIITShowBlogController implements INIITController  {
    public function control(){}

    public function theniitShowBlogContentControl(){
        //连接数据库
        $conn=NIITConnectDB::connecttheDB();

        //获取要展示的博文id
        $blogID=$_POST["blogID"];
//        $blogID=19;
        //将博文展示信息存入数组
        $niitshowBlogGenerateJSON1=new NIITShowBlogGenerateJSON();
        $json1=$niitshowBlogGenerateJSON1->theniitShowBlogGenerateJSON($conn,$blogID);

        //将博文展示信息存入数组
        $niitshowBlogGenerateJSON2=new NIITShowBlogGenerateJSON();
        $json2=$niitshowBlogGenerateJSON2->theniitShowBlogGenerateJSON2($conn,$blogID);

        $finalJSON=$json1.','.$json2.'}';
        echo $finalJSON;

        //关闭数据库连接
        NIITCloseDB::closetheDB($conn);
    }
}

?>