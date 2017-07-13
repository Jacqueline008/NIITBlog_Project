<?php
include_once "INIITShowResult.php";

class NIITLoginShowResult implements INIITShowResult {
    public function showResult(){}

    public function showNoUserError(){
        echo "抱歉,该用户还未注册!";
    }

    public function showSuccessResult(){
        echo 1;
    }

    public function showPwdError(){
        echo "抱歉,您的密码错误!";
    }
}

?>