<?php
include_once "NIITStartSession.php";
include_once "NIITLogoutClearSession.php";

NIITStartSession::starttheSession();
//清除已经设置的会话变量
$niitlogoutClearSession=new NIITLogoutClearSession();
$niitlogoutClearSession->theniitlogoutClearSession();

?>