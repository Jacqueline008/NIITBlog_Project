<?php
include_once "INIITDelete.php";

class NIITUserMgDeleteDelete implements INIITDelete {
    public function delete($conn){}

    public function deleteUser($conn,$name){
        $sql="delete from User where name=?";
        $stmt=$conn->prepare($sql);
        $stmt->execute( array($name) ) ;
    }
}

?>