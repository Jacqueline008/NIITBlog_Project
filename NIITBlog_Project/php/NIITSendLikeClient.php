<?php
//指定该PHP返回的数据为text无格式正文
header("Content-Type: text/plain;charset=utf-8");
//解决跨域问题
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:POST,GET");

include_once "NIITSendLikeController.php";

$niitsendLikeController=new NIITSendLikeController();
$niitsendLikeController->theniitSendLikeControl();

?>