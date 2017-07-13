<?php
include_once "INIITSelect.php";

class NIITRegisterSelect implements INIITSelect {
    public function select($conn){}

    public function theniitregisterSelect($name,$conn){
        $sqlSelect="select * from user where name=?";
        $stmt=$conn->prepare($sqlSelect);
        $stmt->execute(array($name));
        $flag=0;
        foreach($stmt as $row){
            $flag=1;
        }
        return $flag;
    }
}

?>