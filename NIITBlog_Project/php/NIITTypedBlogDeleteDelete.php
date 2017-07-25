<?php
include_once "INIITDelete.php";

class NIITTypedBlogDeleteDelete implements INIITDelete {
    public function delete($conn){}

    public function deleteBlod($conn,$id){
        $sql="delete from blog where id=?";
        $stmt=$conn->prepare($sql);
        $stmt->execute(array($id));
    }
}

?>