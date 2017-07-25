<?php
//指定该PHP返回的数据为json格式
header("Content-Type:application/json;charset=utf-8");
//解决跨域问题
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:POST,GET");

include_once "NIITUser.php";
include_once "NIITStartSession.php";
include_once "NIITInfoGetSession.php";
include_once "NIITInfoController.php";

$niituser=new NIITUser();

NIITStartSession::starttheSession();
//获取到该会话中的用户名
$niitInfoGetSession=new NIITInofGetSession();
$userName=$niitInfoGetSession->getSessionUserName();

//将该用户名赋值给用户实例
$niituser->setName($userName);

//创建一个控制者
$niitInfoController=new NIITInfoController();
$niitInfoController->theniitInfoControl($niituser);


?>