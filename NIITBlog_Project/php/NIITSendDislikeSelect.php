<?php
include_once "INIITSelect.php";

class NIITSendDislikeSelect implements INIITSelect {
    public function select($conn){}

    public function theniitSendDislikeSelect($conn,$blogID){
        $sql="select dislike from blog where id=?";
        $stmt=$conn->prepare($sql);
        $stmt->execute( array($blogID) ) ;

        foreach($stmt as $row){
            $dislike=$row[0];
        }
        return $dislike;
    }
}


?>