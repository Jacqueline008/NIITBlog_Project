<?php
include_once "INIITFormatView.php";

class NIITRegisterFormatView implements INIITFormatView {
    public function toFormatObject($unFormatOject){
        $unFormatOject->setUserPic("../images/userPic.jpg");
        $unFormatOject->setUserDes("未填写个人简介");
        $formattedObject=$unFormatOject;
        return $formattedObject;
    }
}


?>