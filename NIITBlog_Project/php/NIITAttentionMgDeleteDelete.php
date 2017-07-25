<?php
include_once "INIITDelete.php";

class NIITAttentionMgDeleteDelete implements INIITDelete {
    public function delete($conn){}

    public function deleteAttention($conn,$beAttentionedName,$userName){
        $sql="delete from attention where beAttentionedName=? and attentionName=?";
        $stmt=$conn->prepare($sql);
        $stmt->execute( array($beAttentionedName,$userName) ) ;
    }

}

?>