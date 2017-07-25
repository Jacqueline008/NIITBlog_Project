<?php
include_once "INIITGenerateArray.php";

class NIITInfoGenerateArray implements INIITGenerateArray {
    public function generateArray(){}

    public function theniitInfoGenerateArray($name,$tel,$userPic,$userDes){
        $arr=array(
            "name"=>$name,
            "tel"=>$tel,
            "userPic"=>$userPic,
            "userDes"=>$userDes
        );
        return $arr;
    }
}

?>