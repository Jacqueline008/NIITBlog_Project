//获取页面间传递的值
function Request(strName) {
    var strHref=window.location.href;
    var intPos=strHref.indexOf("?");
    var strRight=strHref.substr(intPos+1);
    var arrTmp=strRight.split("&");
    for(var i=0;i<arrTmp.length;i++){
        var arrTemp=arrTmp[i].split("=");
        if(arrTemp[0].toUpperCase()==strName.toUpperCase()){
            return arrTemp[1];
        }
    }
    return "";
}

$(function () {
    //立即填充要发送的私信对象的名称
    var beMsgName=Request("beMsgName");
    $(".sendMsg-title span").html(beMsgName);
    //立即填充要发送的私信对象的图片
    var beMsgNamePic=Request("beMsgNamePic");
    $(".sendMsg-title img").attr("src",beMsgNamePic);


    //点击发送私信按钮
    $(".sendMsg-ContentContainer button").click(function () {
            $.ajax({
                type:"POST",
                url:"../php/NIITSendMsgClient.php",
                data:{
                    beMsgName:beMsgName,
                    MsgContent:$(".sendMsg-ContentContainer textarea").val()
                },
                success:function (data) {
                    if(data=="success"){
                        // alert("私信发送成功!");
                        $(".modal-body").html("私信发送成功!");
                        $("#mymodal").modal("toggle");
                    }
                },
                error:function () {
                    // alert("发生错误!");
                    $(".modal-body").html("发生错误!");
                    $("#mymodal").modal("toggle");
                }
            });
    });

});