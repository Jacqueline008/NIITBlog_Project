<?php
include_once "INIITController.php";
include_once "NIITConnectDB.php";
include_once "NIITRegisterSelect.php";
include_once "NIITRegisterInsert.php";
include_once "NIITRegisterShowResult.php";
include_once "NIITCloseDB.php";

class NIITRegisterController implements INIITController {
    public function control(){}

    public function theniitregisterControl($registerUserFormatted){
        //获取数据库连接
        $conn=NIITConnectDB::connecttheDB();
        //获取格式化后的注册用户的信息中的姓名
        $name=$registerUserFormatted->getName();
        //检查user表中是否有同名用户
        $niitregisterSelect=new NIITRegisterSelect();
        $selectResult=$niitregisterSelect->theniitregisterSelect($name,$conn);

        if($selectResult==0){
            //没有同名用户，则加入user表
            //获取格式化后的注册用户的信息
            $name=$registerUserFormatted->getName();
            $pwd=$registerUserFormatted->getPwd();
            $tel=$registerUserFormatted->getTel();
            $userPic=$registerUserFormatted->getUserPic();
            $userDes=$registerUserFormatted->getUserDes();
            //将用户信息插入数据库
            $niitregisterInsert=new NIITRegisterInsert();
            $niitregisterInsert->theniitregisterInsert($name,$pwd,$tel,$userPic,$userDes,$conn);

            //向用户返回注册成功信息
            $niitregisterShowResult=new NIITRegisterShowResult();
            $niitregisterShowResult->showSuccessResult();
        }else{
            //存在同名用户
            //向用户返回注册失败信息
            $niitregisterShowResult=new NIITRegisterShowResult();
            $niitregisterShowResult->showErrorResult();
        }

        //关闭数据库连接
        NIITCloseDB::closetheDB($conn);
    }
}


?>