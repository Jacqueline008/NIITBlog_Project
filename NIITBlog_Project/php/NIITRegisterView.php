<?php
include_once "INIITView.php";
include_once "NIITUser.php";

class NIITRegisterView implements INIITView {
    public function toObject(){
        $registerUser=new NIITUser();
        $registerUser->setName($_POST["registeruser"]);
        $registerUser->setPwd($_POST["registerpwd"]);
        $registerUser->setTel($_POST["registertel"]);
        return $registerUser;
    }
}

?>