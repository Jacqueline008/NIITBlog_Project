<?php
include_once "INIITUpdate.php";

class NIITInfoUploadTextUpdate implements INIITUpdate {
    public function update($conn){}

    public function theniitInfoUploadTextUpload($tel,$userDes,$name,$conn){
        $sql="update user set tel=?,userDes=? where name=?";
        $stmt=$conn->prepare($sql);
        $stmt->execute(array($tel,$userDes,$name));
    }
}

?>