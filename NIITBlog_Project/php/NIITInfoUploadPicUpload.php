<?php
include_once "INIITUpload.php";

class NIITInfoUploadPicUpload implements INIITUpload {
    public function upload(){}

    public function theniitInfoUploadPicUpload(){
        //获取用户上传的头像名称
        $picname=$_FILES['newpic-upload']["name"];
        //设置保存到服务器本地的路径
        $picpath="../images/".$picname;
        //将用户上传的图片从临时路径存储到服务器的一个本地路径
        move_uploaded_file($_FILES['newpic-upload']["tmp_name"],$picpath);

        //
        return $picpath;
    }
}

?>