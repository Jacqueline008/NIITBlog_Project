<?php
//指定该PHP返回的数据为text无格式正文
header("Content-Type: text/plain;charset=utf-8");
//解决跨域问题
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:POST,GET");

include_once "NIITLoginView.php";
include_once "NIITLoginController.php";

//生成登录用户
$niitloginView=new NIITLoginView();
$loginUser=$niitloginView->toObject();
//生成登录控制者
$niitloginController=new NIITLoginController();
$niitloginController->theniitloginControl($loginUser);

?>