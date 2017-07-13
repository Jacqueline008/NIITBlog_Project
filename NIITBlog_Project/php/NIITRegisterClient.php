<?php
include_once "NIITRegisterView.php";
include_once "NIITRegisterFormatView.php";
include_once "NIITRegisterController.php";

//生成注册用户
$niitregisterView=new NIITRegisterView();
$niitregisterUser=$niitregisterView->toObject();
//生成格式化后的注册用户
$niitregisterFormatView=new NIITRegisterFormatView();
$niitregisterUserFormatted=$niitregisterFormatView->toFormatObject($niitregisterUser);
//生成注册控制者
$niitregisterController=new NIITRegisterController();
$niitregisterController->theniitregisterControl($niitregisterUserFormatted);

?>