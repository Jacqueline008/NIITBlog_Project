<?php
include_once "INIITClearSession.php";

class NIITLogoutClearSession implements INIITClearSession {
    public function clearSession(){}

    public function theniitlogoutClearSession(){
        unset($_SESSION["userName"]);
        unset($_SESSION["userType"]);
    }
}

?>