<?php
include_once "INIITSelect.php";

class NIITInfoSelect implements INIITSelect {
    public function select($conn){}

    public function theniitInfoSelect($niituser,$conn){
        //用户名
        $name=$niituser->getName();
        //从数据库中查找出该用户名对应的电话，头像，地址
        $sqlSelect="select * from user where name=?";
        $stmt=$conn->prepare($sqlSelect);
        $stmt->execute(array($name));
        foreach($stmt as $row){
            $tel=$row["tel"];
            $userPic=$row["userPic"];
            $userDes=$row["userDes"];
        }
        //用户实例已经拥有了用户名，电话，头像，地址
        $niituser->setTel($tel);
        $niituser->setUserPic($userPic);
        $niituser->setUserDes($userDes);
        //
        return $niituser;
    }
}

?>