<?php
include_once "INIITInsert.php";

class NIITSendMsgInsert implements INIITInsert {
    public function insert($conn){}

    public function theniitSendMsgInsert($conn,$beMsgName,$MsgName,$MsgContent){
        $sqlInsert="insert into msg(beMsgName,MsgName,MsgContent) values(?,?,?)";
        $stmt=$conn->prepare($sqlInsert);
        $stmt->execute( array($beMsgName,$MsgName,$MsgContent) ) ;
    }
}

?>