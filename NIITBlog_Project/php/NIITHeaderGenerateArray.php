<?php
include_once "INIITGenerateArray.php";

class NIITHeaderGenerateArray implements INIITGenerateArray {
    public function generateArray(){}

    public function theniitheaderGenerateArray($home,$login,$user,$admin,$logout,$write){
        $arr=array(
            "home"=>$home,
            "login"=>$login,
            "user"=>$user,
            "admin"=>$admin,
            "logout"=>$logout,
            "write"=>$write
        );
        return $arr;
    }
}

?>