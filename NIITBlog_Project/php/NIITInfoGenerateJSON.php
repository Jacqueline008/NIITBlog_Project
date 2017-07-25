<?php
include_once "INIITGenerateJSON.php";

class NIITInfoGenerateJSON implements INIITGenerateJSON {
    public function generateJSON(){}

    public function theniitInfoGenerateJSON($arr){
        $json=json_encode($arr);
        return $json;
    }
}

?>