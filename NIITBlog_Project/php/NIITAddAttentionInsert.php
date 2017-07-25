<?php
include_once "INIITInsert.php";

class NIITAddAttentionInsert implements INIITInsert {
    public function insert($conn){}

    public function theniitAddAttentionInsert($conn,$beAttentionedName,$attentionName){
        $sqlInsert="insert into attention(beAttentionedName,attentionName) values(?,?)";
        $stmt=$conn->prepare($sqlInsert);
        $stmt->execute( array($beAttentionedName,$attentionName) ) ;
    }
}

?>