<?php
include_once "INIITUpdate.php";

class NIITSendDislikeUpdate implements INIITUpdate {
    public function update($conn){}

    public function theniitSendDislikeUpdate($conn,$blogID){
        $sql="update blog set disLike=disLike+1 where id=?";
        $stmt=$conn->prepare($sql);
        $stmt->execute( array($blogID) ) ;
    }
}

?>