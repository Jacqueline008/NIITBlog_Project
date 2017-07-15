<?php
//指定该PHP返回的数据为json格式
header("Content-Type:application/json;charset=utf-8");
//解决跨域问题
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:POST,GET");

include_once "NIITStartSession.php";
include_once "NIITHeaderGetSession.php";
include_once "NIITHeaderGenerateArray.php";
include_once "NIITHeaderGenerateJSON.php";


NIITStartSession::starttheSession();
//获取会话变量
$niitheaderGetSession=new NIITHeaderGetSession();
$userName=$niitheaderGetSession->getSessionUserName();
$userType=$niitheaderGetSession->getSessionUserType();

//普通用户状态，管理员状态，未登录状态
if(($userName!=null)&&($userType!=null)){
    if($userType=="normal"){
        //登录用户为普通用户
        $niitheaderGenerateArray=new NIITHeaderGenerateArray();
        $arr=$niitheaderGenerateArray->theniitheaderGenerateArray("1","0",$userName,"0","1","1");
    }else if($userType=="admin"){
        //登录用户为管理员
        $niitheaderGenerateArray=new NIITHeaderGenerateArray();
        $arr=$niitheaderGenerateArray->theniitheaderGenerateArray("1","0","0",$userName,"1","0");
    }
}else{
    //用户处于未登录状态
    $niitheaderGenerateArray=new NIITHeaderGenerateArray();
    $arr=$niitheaderGenerateArray->theniitheaderGenerateArray("1","1","0","0","0","1");
}

//将用户状态传给页面
$niitheaderGenerateJSON=new NIITHeaderGenerateJOSN();
$json=$niitheaderGenerateJSON->theniitheaderGenerateJSON($arr);
echo $json;

?>