<?php
include_once "INIITCompare.php";

class NIITLoginCompare implements INIITCompare {
    public function compare(){}

    //返回指定$pwd与$pwdInDB是否相等
    //1表示相等 0表示不相等
    public function theniitloginCompare($pwd,$pwdInDB){
        if($pwd==$pwdInDB){
            return 1;
        }else{
            return 0;
        }
    }
}


?>