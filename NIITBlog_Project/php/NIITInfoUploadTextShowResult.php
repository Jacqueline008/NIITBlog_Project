<?php
include_once "INIITShowResult.php";

class NIITInfoUploadTextShowResult implements INIITShowResult {
    public function showResult(){}

    public function theniitInfoUploadTextShowResult(){
        header("Location:http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITLogined_NormalUser.html");
    }
}

?>