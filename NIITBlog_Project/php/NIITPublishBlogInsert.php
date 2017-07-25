<?php
include_once "INIITInsert.php";

class NIITPublishBlogInsert implements INIITInsert {
    public function insert($conn){}

    public function theniitpublishBlogInsert($author,$title,$content,$blogType,$blogLike,$dislike,$conn){
        $sqlInsert="insert into blog(author,title,content,blogType,blogLike,dislike) values(?,?,?,?,?,?)";
        $stmt=$conn->prepare($sqlInsert);
        $stmt->execute( array($author,$title,$content,$blogType,$blogLike,$dislike) ) ;
    }
}

?>