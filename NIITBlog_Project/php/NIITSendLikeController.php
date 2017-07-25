<?php
include_once "INIITController.php";
include_once "NIITConnectDB.php";
include_once "NIITSendLikeUpdate.php";
include_once "NIITSendLikeSelect.php";
include_once "NIITCloseDB.php";

class NIITSendLikeController implements INIITController {
    public function control(){}

    public function theniitSendLikeControl(){
        //连接数据库
        $conn=NIITConnectDB::connecttheDB();
        //获取要添加喜欢数量的blogID
        $blogID=$_POST["blogID"];

        //将blogID的喜欢数量+1
        $niitSendLikeUpdate=new NIITSendLikeUpdate();
        $niitSendLikeUpdate->theniitSendLikeUpdate($conn,$blogID);

        //获取更新后的blogID的喜欢数量
        $niitSendLikeSelect=new NIITSendLikeSelect();
        $blogLike=$niitSendLikeSelect->theniitSendLikeSelect($conn,$blogID);

        echo $blogLike;

        //关闭数据库连接
        NIITCloseDB::closetheDB($conn);
    }
}

?>