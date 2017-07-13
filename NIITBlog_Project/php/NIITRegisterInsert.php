<?php
include_once "INIITInsert.php";

class NIITRegisterInsert implements INIITInsert {
    public function insert($conn){}

    public function theniitregisterInsert($name,$pwd,$tel,$userPic,$userDes,$conn){
        $sqlInsert="insert into user(name,pwd,tel,userPic,userDes) values(?,?,?,?,?)";
        $stmt=$conn->prepare($sqlInsert);
        $stmt->execute( array($name,$pwd,$tel,$userPic,$userDes) ) ;
    }
}

?>