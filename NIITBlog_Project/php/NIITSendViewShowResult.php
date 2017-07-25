<?php
include_once "INIITShowResult.php";

class NIITSendViewShowResult implements INIITShowResult {
    public function showResult(){}

    public function showSuccessView(){
        echo "success";
    }
}

?>