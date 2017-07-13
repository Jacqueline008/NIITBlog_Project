<?php
include_once "INIITShowResult.php";

class NIITRegisterShowResult implements INIITShowResult {
    public function showResult(){}

    public function showSuccessResult(){
        header("Location:http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITRegisterSuccess.html");
    }

    public function showErrorResult(){
        header("Location:http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITRegisterError.html");
    }
}

?>