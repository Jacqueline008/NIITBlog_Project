<?php
include_once "INIITView.php";
include_once "NIITUser.php";

class NIITLoginView implements INIITView {
    public function toObject(){
        $loginUser=new NIITUser();
        $loginUser->setName($_POST["loginuser"]);
        $loginUser->setPwd($_POST["loginpwd"]);
        return $loginUser;
    }
}

?>