<?php
include_once "INIITSelect.php";

class NIITAddAttentionSelect implements INIITSelect {
    public function select($conn){}

    public function theniitAddAttentionSelect($conn,$blogID){
        $sql="select author from blog where id=?";
        $stmt=$conn->prepare($sql);
        $stmt->execute( array($blogID) ) ;

        foreach($stmt as $row){
            $author=$row[0];
        }
        return $author;
    }
}

?>