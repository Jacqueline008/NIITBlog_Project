<?php
include_once "INIITDelete.php";

class NIITDeleteAttentionDelete implements INIITDelete {
    public function delete($conn){}

    public function theniitDeleteAttentionDelete($conn,$beAttentionedName,$attentionName){
        $sql="delete from attention where beAttentionedName=? and attentionName=?";
        $stmt=$conn->prepare($sql);
        $stmt->execute( array($beAttentionedName,$attentionName) ) ;
    }
}

?>