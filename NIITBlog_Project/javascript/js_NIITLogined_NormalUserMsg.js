//立即填充页面内容
$.ajax({
    type:"GET",
    url:"../php/NIITMsgMgShowClient.php",
    success:function (data) {
        //我接收的
        if(data.isbeMsg=="0"){
            $("#beMsg-container .noContent-Container").css("display","block");
            $("#beMsg-container .hasContent-Container").css("display","none");
        }else{
            $("#beMsg-container .noContent-Container").css("display","none");
            $("#beMsg-container .hasContent-Container").css("display","block");
            var result1='';
            for(var i=0;i<data.beMsgList.length;i++){
                result1=result1+'<div class="Item"><div class="Item-mix"><img src="'+data.beMsgList[i].userPic+'" name="'+data.beMsgList[i].MsgName+'"><span class="Item-name" name="'+data.beMsgList[i].MsgName+'">'+data.beMsgList[i].MsgName+'</span><span class="Item-time">'+data.beMsgList[i].MsgTime+'</span></div><div class="Item-content">'+data.beMsgList[i].MsgContent+'</div></div>';
            }
            $("#beMsg-container .hasContent-Container").html(result1);
        }
        //我发送的
        if(data.isMsg=="0"){
            $("#msg-container .noContent-Container").css("display","block");
            $("#msg-container .hasContent-Container").css("display","none");
        }else{
            $("#msg-container .noContent-Container").css("display","none");
            $("#msg-container .hasContent-Container").css("display","block");
            var result2='';
            for(var j=0;j<data.MsgList.length;j++){
                result2=result2+'<div class="Item"><div class="Item-mix"><img src="'+data.MsgList[j].userPic+'" name="'+data.MsgList[j].beMsgName+'"><span class="Item-name" name="'+data.MsgList[j].beMsgName+'">'+data.MsgList[j].beMsgName+'</span><span class="Item-time">'+data.MsgList[j].MsgTime+'</span></div><div class="Item-content">'+data.MsgList[j].MsgContent+'</div></div>';
            }
            $("#msg-container .hasContent-Container").html(result2);
        }

    },
    error:function () {
        // alert("发生错误!");
        $(".modal-body").html("发生错误!");
        $("#mymodal").modal("toggle");
    }
});


$(function () {

    //在我接收的栏目中，点击头像或者名字都会跳转到该作者页面
    $("#beMsg-container .hasContent-Container").on("click","img",function () {
        window.location.href="http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITAuthor.html"+"?name="+$(this).attr("name");
    });
    $("#beMsg-container .hasContent-Container").on("click",".Item-name",function () {
        window.location.href="http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITAuthor.html"+"?name="+$(this).attr("name");
    });

    //在我发送的栏目中，点击头像或者名字都会跳转到该作者页面
    $("#msg-container .hasContent-Container").on("click","img",function () {
        window.location.href="http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITAuthor.html"+"?name="+$(this).attr("name");
    });
    $("#msg-container .hasContent-Container").on("click",".Item-name",function () {
        window.location.href="http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITAuthor.html"+"?name="+$(this).attr("name");
    });
});