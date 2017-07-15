<?php
include_once "INIITGenerateJSON.php";

class NIITHeaderGenerateJOSN implements INIITGenerateJSON {
    public function generateJSON(){}

    public function theniitheaderGenerateJSON($arr){
        $json=json_encode($arr);
        return $json;
    }
}

?>