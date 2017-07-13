<?php

class NIITUser{
    private $name=null;
    private $pwd=null;
    private $tel=null;
    private $userPic=null;
    private $userDes=null;
    //
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name=$name;
    }
    //
    public function getPwd(){
        return $this->pwd;
    }
    public function setPwd($pwd){
        $this->pwd=$pwd;
    }
    //
    public function getTel(){
        return $this->tel;
    }
    public function setTel($tel){
        $this->tel=$tel;
    }
    //
    public function getUserPic(){
        return $this->userPic;
    }
    public function setUserPic($userPic){
        $this->userPic=$userPic;
    }
    //
    public function getUserDes(){
        return $this->userDes;
    }
    public function setUserDes($userDes){
        $this->userDes=$userDes;
    }
}




?>