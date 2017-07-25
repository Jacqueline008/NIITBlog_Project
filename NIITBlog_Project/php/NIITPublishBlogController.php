<?php
include_once "INIITController.php";
include_once "NIITConnectDB.php";
include_once "NIITStartSession.php";
include_once "NIITPublishBlogGetSession.php";
include_once "NIITPublishBlogInsert.php";
include_once "NIITPublishBlogShowResult.php";
include_once "NIITCloseDB.php";

class NIITPublishBlogController implements INIITController {
    public function control(){}

    public function theniitpublishBlogControl(){
        //连接数据库
        $conn=NIITConnectDB::connecttheDB();

        //获取当前登录用户名（博文作者）
        NIITStartSession::starttheSession();
        $niitpublishBlogGetSession=new NIITPublishBlogGetSession();
        $author=$niitpublishBlogGetSession->getSessionUserName();

        //获取标题，内容，类型，喜欢，不喜欢
        $title=$_POST["title"];
        $content=$_POST["content"];
        $blogType=$_POST["blogType"];
        $blogLike=0;
        $dislike=0;

        //将博文作者，标题，内容，类型，喜欢，不喜欢插入blog表中
        $niitpublishBlogInsert=new NIITPublishBlogInsert();
        $niitpublishBlogInsert->theniitpublishBlogInsert($author,$title,$content,$blogType,$blogLike,$dislike,$conn);

        //展示发表成功信息
        $niitpublishBlogShowResult=new NIITPublishBlogShowResult();
        $niitpublishBlogShowResult->showSuccessPublish();

        //关闭数据库连接
        NIITCloseDB::closetheDB($conn);
    }
}

?>