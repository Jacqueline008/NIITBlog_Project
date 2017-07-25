<?php
include_once "INIITSelect.php";

class NIITSendLikeSelect implements INIITSelect {
    public function select($conn){}

    public function theniitSendLikeSelect($conn,$blogID){
        $sql="select blogLike from blog where id=?";
        $stmt=$conn->prepare($sql);
        $stmt->execute( array($blogID) ) ;

        foreach($stmt as $row){
            $blogLike=$row[0];
        }
        return $blogLike;
    }
}

?>