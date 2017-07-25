<?php
include_once "INIITController.php";
include_once "NIITConnectDB.php";
include_once "NIITInfoSelect.php";
include_once "NIITInfoGenerateArray.php";
include_once "NIITInfoGenerateJSON.php";
include_once "NIITCloseDB.php";

class NIITInfoController implements INIITController {
    public function control(){}

    public function theniitInfoControl($niituser){
        //获取数据库连接
        $conn=NIITConnectDB::connecttheDB();
        //从数据库中获取该用户的电话，头像，个人描述
        $niitInfoSelect=new NIITInfoSelect();
        $niituser=$niitInfoSelect->theniitInfoSelect($niituser,$conn);

        //
        $name=$niituser->getName();
        $tel=$niituser->getTel();
        $userPic=$niituser->getUserPic();
        $userDes=$niituser->getUserDes();
        //生成数组
        $niitInfoGenerateArray=new NIITInfoGenerateArray();
        $arr=$niitInfoGenerateArray->theniitInfoGenerateArray($name,$tel,$userPic,$userDes);
        //生成json
        $niitInfoGenerateJSON=new NIITInfoGenerateJSON();
        $json=$niitInfoGenerateJSON->theniitInfoGenerateJSON($arr);

        echo $json;

        NIITCloseDB::closetheDB($conn);

    }
}

?>