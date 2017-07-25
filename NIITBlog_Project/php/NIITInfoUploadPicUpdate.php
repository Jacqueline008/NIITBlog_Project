<?php
include_once "INIITUpdate.php";

class NIITInfoUploadPicUpdate implements INIITUpdate {
    public function update($conn){}

    public function theniitInfoUploadPicUpdate($picPath,$userName,$conn){
        //将该$userName在user中的$picPath更新
        $sql="update user set userPic=? where name=?";
        $stmt=$conn->prepare($sql);
        $stmt->execute(array($picPath,$userName));
    }
}

?>