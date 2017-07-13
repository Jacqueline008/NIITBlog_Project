<?php
include_once "INIITSetSession.php";

class NIITLoginSetSession implements INIITSetSession{
    public function setSession(){}

    //注册两个会话变量 userType userName
    public function theniitloginSetSession($name){
        if(preg_match("/^\\*/",$name)){
            $_SESSION["userType"]="admin";
        }else{
            $_SESSION["userType"]="normal";
        }
        $_SESSION["userName"]=$name;
    }
}

?>