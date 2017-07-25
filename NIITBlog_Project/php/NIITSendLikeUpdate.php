<?php
include_once "INIITUpdate.php";

class NIITSendLikeUpdate implements INIITUpdate {
    public function update($conn){}

    public function theniitSendLikeUpdate($conn,$blogID){
        $sql="update blog set blogLike=blogLike+1 where id=?";
        $stmt=$conn->prepare($sql);
        $stmt->execute( array($blogID) ) ;
    }
}

?>