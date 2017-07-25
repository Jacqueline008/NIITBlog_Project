<?php
include_once "INIITInsert.php";

class NIITSendViewInsert implements INIITInsert {
    public function insert($conn){}

    public function theniitSendViewInsert($blogID,$viewAuthor,$content,$conn){
        $sqlInsert="insert into view(blogID,viewAuthor,content) values(?,?,?)";
        $stmt=$conn->prepare($sqlInsert);
        $stmt->execute( array($blogID,$viewAuthor,$content) ) ;
    }
}

?>