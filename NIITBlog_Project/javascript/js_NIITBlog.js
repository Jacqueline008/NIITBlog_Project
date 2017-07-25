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

//vue-博文展示区域
var vm_blogcontent=new Vue({
    el:"#blogContent",
    data:{
        compiledMarkdown:""
    }
});

//直接请求NIITShowBlogClient.php，返回的数据填充到页面
$.ajax({
    type:"POST",
    url:"../php/NIITShowBlogClient.php",
    data:{
        blogID:Request("blogID")
    },
    success:function (data) {
        //填充博主名称
        $(".blog-authorname").html(data.author);
        $(".blog-authorname").attr("name",data.author);
        //填充博文标题
        $(".blog-title").html(data.title);
        //填充博文正文(Vue)
        vm_blogcontent.compiledMarkdown=marked(data.content, { sanitize: true });
        //填充创建时间
        $(".blog-time").html(data.createTime);
        //填充所属分类
        switch (data.blogType){
            case "1":$(".blog-type").html("移动开发");break;
            case "2":$(".blog-type").html("web前端");break;
            case "3":$(".blog-type").html("架构设计");break;
            case "4":$(".blog-type").html("综合");break;
        }
        //填充喜欢数量
        $(".like-btn .number").html(data.blogLike);
        //填充不喜欢数量
        $(".dislike-btn .number").html(data.dislike);
        //填充博主头像
        $(".blog-authorimg").attr("src",data.userPic);
        $(".blog-authorimg").attr("name",data.author);
        //填充是否关注
        if(data.isAttention=="0"){
            $(".addAttention").css("display","block");
            $(".deleteAttention").css("display","none");
        }else{
            $(".addAttention").css("display","none");
            $(".deleteAttention").css("display","block");
        }
        //填充登录用户头像
        if(data.loginUserPic!=""){
            $(".writeView-author img").attr("src",data.loginUserPic);
        }else{
            $(".writeView-author img").attr("src","../images/NoLoginUser.png");
        }
        //填充评论区
        if(data.isView=="1"){
            //说明有评论
            $(".ViewContainer").css("display","block");
            $(".NoViewContainer").css("display","none");
            //记录评论条数
            var i;
            //记录评论
            var result="";
            for(i=0;i<data.viewList.length;i++){
                result=result+'<div class="ViewItem"><div class="ViewItem-up"><img src="'+data.viewList[i].viewUserPic+'"><span class="ViewItem-up-author">'+data.viewList[i].viewAuthor+'</span><span class="ViewItem-up-time">'+data.viewList[i].viewTime+'</span></div><div class="ViewItem-down">'+data.viewList[i].viewContent+'</div></div>';
            }
            $(".ViewContainer").html(result);
            $(".ViewNumbers span").html(i+"条评论");
        }else{
            //说明没有评论
            $(".ViewContainer").css("display","none");
            $(".NoViewContainer").css("display","block");
            $(".ViewNumbers span").html(0+"条评论");
        }

    },
    error:function () {
        // alert("发生错误!");
        $(".modal-body").html("发生错误!");
        $("#mymodal").modal("toggle");
    }
});


$(function () {
    //点击博文展示中的作者头像或者作者名字跳转到该作者简介页面
    $(".blog-mixcontainer .blog-authorimg").click(function () {
        window.location.href="http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITAuthor.html"+"?name="+$(this).attr("name");
    });
    $(".blog-mixcontainer .blog-authorname").click(function () {
        window.location.href="http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITAuthor.html"+"?name="+$(this).attr("name");
    });


    //点击加关注按钮]
    $(".addAttention").click(function () {
        //这里引用了标头中.sn-write的信息
        if($(".sn-write").attr("name")==undefined){
            // alert("您还未登录,请先登录!");
            $(".modal-body").html("您还未登录,请先登录!");
            $("#mymodal").modal("toggle");
        }else{
            $.ajax({
                type:"POST",
                url:"../php/NIITAddAttentionClient.php",
                data:{
                    blogID:Request("blogID")
                },
                success:function (data) {
                    if(data=="success"){
                        window.location.href="http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITBlog.html"+"?blogID="+Request("blogID");
                    }
                },
                error:function () {
                    // alert("发生错误!");
                    $(".modal-body").html("发生错误!");
                    $("#mymodal").modal("toggle");
                }
            });
        }
    });

    //点击取消关注按钮
    $(".deleteAttention").click(function () {
        $.ajax({
            type:"POST",
            url:"../php/NIITDeleteAttentionClient.php",
            data:{
                blogID:Request("blogID")
            },
            success:function (data) {
                if(data=="success"){
                    window.location.href="http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITBlog.html"+"?blogID="+Request("blogID");
                }
            },
            error:function () {
                // alert("发生错误!");
                $(".modal-body").html("发生错误!");
                $("#mymodal").modal("toggle");
            }
        });
    });

    //点击发私信按钮
    $(".sendMsg").click(function () {
        //这里引用了标头中.sn-write的信息
        if($(".sn-write").attr("name")==undefined){
            // alert("您还未登录,请先登录!");
            $(".modal-body").html("您还未登录,请先登录!");
            $("#mymodal").modal("toggle");
        }else{
            //将要发送的私信对象的名称和要发送的私信对象的图片附加到发私信页面url
            window.location.href="http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITSendMsg.html"+"?beMsgName="+$(".blog-authorname").html()+"&beMsgNamePic="+$(".blog-authorimg").attr("src");
        }
    });

    //点击发送评论按钮
    $(".writeView-send").click(function () {
        //这里引用了标头中.sn-write的信息
        if($(".sn-write").attr("name")==undefined){
            // alert("您还未登录,请先登录!");
            $(".modal-body").html("您还未登录,请先登录!");
            $("#mymodal").modal("toggle");
        }else{
            $.ajax({
                type:"POST",
                url:"../php/NIITSendViewClient.php",
                data:{
                    blogID:Request("blogID"),
                    content:$(".writeView-content textarea").val()
                },
                success:function (data) {
                    if(data=="success"){
                        window.location.href="http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITBlog.html"+"?blogID="+Request("blogID");
                    }
                },
                error:function () {
                    // alert("发生错误!");
                    $(".modal-body").html("发生错误!");
                    $("#mymodal").modal("toggle");
                }
            });
        }
    });

    //点击喜欢按钮
    $(".like-btn").click(function () {
        //这里引用了标头中.sn-write的信息
        if($(".sn-write").attr("name")==undefined){
            // alert("您还未登录,请先登录!");
            $(".modal-body").html("您还未登录,请先登录!");
            $("#mymodal").modal("toggle");
        }else{
            $.ajax({
                type:"POST",
                url:"../php/NIITSendLikeClient.php",
                data:{
                    blogID:Request("blogID")
                },
                success:function (data) {
                    $(".like-btn .number").html(data);
                },
                error:function () {
                    alert("发生错误!");
                }
            });
        }
    });

    //点击不喜欢按钮
    $(".dislike-btn").click(function () {
        //这里引用了标头中.sn-write的信息
        if($(".sn-write").attr("name")==undefined){
            // alert("您还未登录,请先登录!");
            $(".modal-body").html("您还未登录,请先登录!");
            $("#mymodal").modal("toggle");
        }else{
            $.ajax({
                type:"POST",
                url:"../php/NIITSendDislikeClient.php",
                data:{
                    blogID:Request("blogID")
                },
                success:function (data) {
                    $(".dislike-btn .number").html(data);
                },
                error:function () {
                    alert("发生错误!");
                }
            });
        }
    });


});