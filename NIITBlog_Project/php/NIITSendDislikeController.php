<?php
include_once "INIITController.php";
include_once "NIITConnectDB.php";
include_once "NIITSendDislikeUpdate.php";
include_once "NIITSendDislikeSelect.php";
include_once "NIITCloseDB.php";

class NIITSendDislikeController implements INIITController {
    public function control(){}

    public function theniitSendDislikeControl(){
        //连接数据库
        $conn=NIITConnectDB::connecttheDB();

        //获取要添加不喜欢数量的blogID
        $blogID=$_POST["blogID"];

        //将blogID的不喜欢数量+1
        $niitSendDislikeUpdate=new NIITSendDislikeUpdate();
        $niitSendDislikeUpdate->theniitSendDislikeUpdate($conn,$blogID);

        //获取更新后的blogID的不喜欢数量
        $niitSendDislikeSelect=new NIITSendDislikeSelect();
        $dislike=$niitSendDislikeSelect->theniitSendDislikeSelect($conn,$blogID);

        echo $dislike;

        //关闭数据库连接
        NIITCloseDB::closetheDB($conn);
    }
}


?>