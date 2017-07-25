<?php
include_once "INIITGetSession.php";

class NIITInfoUploadTextGetSession implements INIITGetSession {
    public function getSession(){}

    //若会话变量userName设置了，则返回该会话变量的值，否则返回null
    public function getSessionUserName(){
        if(isset($_SESSION["userName"])){
            return $_SESSION["userName"];
        }else{
            return null;
        }
    }
}

?>