<?php
include_once "INIITController.php";
include_once "NIITConnectDB.php";
include_once "NIITLoginSelect.php";
include_once "NIITLoginCompare.php";
include_once "NIITLoginShowResult.php";
include_once "NIITStartSession.php";
include_once "NIITLoginSetSession.php";
include_once "NIITCloseDB.php";

class NIITLoginController implements INIITController {
    public function control(){}

    public function theniitloginControl($loginUser){
        //获取数据库连接
        $conn=NIITConnectDB::connecttheDB();
        //获取登录用户的信息中的姓名
        $name=$loginUser->getName();
        //检查该登录用户是否在数据库中存在
        $niitloginSelect=new NIITLoginSelect();
        $selectResult=$niitloginSelect->theniitloginSelect($name,$conn);

        if($selectResult==0){
            //$selectResult=0,如果数据库中没有该用户的信息
            //向用户展示还未注册错误
            $niitloginShowResult=new NIITLoginShowResult();
            $niitloginShowResult->showNoUserError();
        }else{
            //$selectResult=1,数据库中有该用户的信息
            //获取该用户在数据库中的密码
            $pwd=$loginUser->getPwd();
            $pwdInDB=$niitloginSelect->theniitloginSelectPwd($name,$conn);
            $niitloginCompare=new NIITLoginCompare();
            $pwdResult=$niitloginCompare->theniitloginCompare($pwd,$pwdInDB);
            if($pwdResult==1){
                //$pwdResult=1,用户输入密码与数据库中一致
                //设置会话变量后跳转到home.html页面
                NIITStartSession::starttheSession();
                $niitloginSetSession=new NIITLoginSetSession();
                $niitloginSetSession->theniitloginSetSession($name);
                $niitloginShowResult=new NIITLoginShowResult();
                $niitloginShowResult->showSuccessResult();
            }else{
                //$pwdResult=0,用户输入密码与数据库不一致
                //向用户展示密码错误
                $niitloginShowResult=new NIITLoginShowResult();
                $niitloginShowResult->showPwdError();
            }
        }

        //关闭数据库
        NIITCloseDB::closetheDB($conn);
    }
}


?>