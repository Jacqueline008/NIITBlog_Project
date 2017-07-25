<?php
include_once "INIITShowResult.php";

class NIITInfoUploadPicShowResult implements INIITShowResult {
    public function showResult(){}

    public function theniitInfoUploadPicShowResult(){
        header("Location:http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITLogined_NormalUser.html");
    }
}

?>