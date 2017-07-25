<?php
include_once "INIITController.php";
include_once "NIITConnectDB.php";
include_once "NIITTypedBlogDeleteDelete.php";
include_once "NIITCloseDB.php";
include_once "NIITTypedBlogDeleteShowResult.php";

class NIITTypedBlogDeleteController implements INIITController {
    public function control(){}

    public function theniitTypedBlogDeleteControl(){
        //连接数据库
        $conn=NIITConnectDB::connecttheDB();
        //删除相应blogid对应的博文
        $id=$_POST["id"];
        $niitTypedBlogDeleteDelete=new NIITTypedBlogDeleteDelete();
        $niitTypedBlogDeleteDelete->deleteBlod($conn,$id);

        //关闭数据库连接
        NIITCloseDB::closetheDB($conn);

        //展示删除成功
        $niitTypedBlogDeleteShowResult=new NIITTypedBlogDeleteShowResult();
        $niitTypedBlogDeleteShowResult->showDeleteSuccess();
    }
}

?>