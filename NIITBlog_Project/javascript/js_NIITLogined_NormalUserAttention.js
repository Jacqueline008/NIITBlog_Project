//立即填充页面内容
$.ajax({
    type:"GET",
    url:"../php/NIITAttentionMgShowClient.php",
    success:function (data) {
        //我关注的
        if(data.isAttention=="0"){
            $("#Attention-container .noContent-Container").css("display","block");
            $("#Attention-container .hasContent-Container").css("display","none");
        }else{
            $("#Attention-container .noContent-Container").css("display","none");
            $("#Attention-container .hasContent-Container").css("display","block");
            $result1="";
            for(var i=0;i<data.AttentionList.length;i++){
                $result1=$result1+'<div class="AttentionItem"><img name="'+data.AttentionList[i].beAttentionedName+'" src="'+data.AttentionList[i].userPic+'"><span name="'+data.AttentionList[i].beAttentionedName+'">'+data.AttentionList[i].beAttentionedName+'</span><button name="'+data.AttentionList[i].beAttentionedName+'">取消关注</button></div>';
            }
            $("#Attention-container .hasContent-Container").html($result1);
        }
        //关注我的
        if(data.isBeAttention=="0"){
            $("#beAttention-container .noContent-Container").css("display","block");
            $("#beAttention-container .hasContent-Container").css("display","none");
        }else{
            $("#beAttention-container .noContent-Container").css("display","none");
            $("#beAttention-container .hasContent-Container").css("display","block");
            $result2="";
            for(var j=0;j<data.BeAttentionList.length;j++){
                $result2=$result2+'<div class="beAttentionItem"><img name="'+data.BeAttentionList[j].attentionName+'" src="'+data.BeAttentionList[j].userPic+'"><span name="'+data.BeAttentionList[j].attentionName+'">'+data.BeAttentionList[j].attentionName+'</span></div>';
            }
            $("#beAttention-container .hasContent-Container").html($result2);
        }

    },
    error:function () {
        // alert("发生错误!");
        $(".modal-body").html("发生错误!");
        $("#mymodal").modal("toggle");
    }
});

$(function () {
    //点击取消关注按钮
    $("#Attention-container").on("click","button",function () {
        $.ajax({
            type:"POST",
            url:"../php/NIITAttentionMgDeleteClient.php",
            data:{
                beAttentionedName:$(this).attr("name")
            },
            success:function (data) {
                if(data=="success"){
                    window.location.href="http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITLogined_NormalUserAttention.html";
                }
            },
            error:function () {
                // alert("发生错误!");
                $(".modal-body").html("发生错误!");
                $("#mymodal").modal("toggle");
            }
        });
    });


    //在我关注的栏目中，点击头像或者名字都会跳转到该作者页面
    $("#Attention-container .hasContent-Container").on("click","img",function () {
        window.location.href="http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITAuthor.html"+"?name="+$(this).attr("name");
    });
    $("#Attention-container .hasContent-Container").on("click","span",function () {
        window.location.href="http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITAuthor.html"+"?name="+$(this).attr("name");
    });

    //在关注我的栏目中，点击头像或者名字都会跳转到该作者页面
    $("#beAttention-container .hasContent-Container").on("click","img",function () {
        window.location.href="http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITAuthor.html"+"?name="+$(this).attr("name");
    });
    $("#beAttention-container .hasContent-Container").on("click","span",function () {
        window.location.href="http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITAuthor.html"+"?name="+$(this).attr("name");
    });
});