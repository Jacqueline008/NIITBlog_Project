//立即填充页面内容
$.ajax({
    type:"GET",
    url:"../php/NIITTypedBlogShowClient.php",
    success:function (data) {
        //
        var mobileflag=0;var mobileresult="";
        var webflag=0;var webresult="";
        var schemaflag=0;var schemaresult="";
        var mixflag=0;var mixresult="";
        //
        for(var i=0;i<data.blogList.length;i++){
            switch (data.blogList[i].blogType){
                case "1":
                    mobileflag=1;
                    mobileresult=mobileresult+'<div class="hasblog-item"><div class="hasblog-itemleft"><div class="hasblog-title" name="'+data.blogList[i].id+'">'+data.blogList[i].title+'</div><div class="hasblog-createTime">'+data.blogList[i].createTime+'</div></div><div class="hasblog-itemright"><button class="hasblog-delete" name="'+data.blogList[i].id+'">删除</button></div></div>';
                    break;
                case "2":
                    webflag=1;
                    webresult=webresult+'<div class="hasblog-item"><div class="hasblog-itemleft"><div class="hasblog-title" name="'+data.blogList[i].id+'">'+data.blogList[i].title+'</div><div class="hasblog-createTime">'+data.blogList[i].createTime+'</div></div><div class="hasblog-itemright"><button class="hasblog-delete" name="'+data.blogList[i].id+'">删除</button></div></div>';
                    break;
                case "3":
                    schemaflag=1;
                    schemaresult=schemaresult+'<div class="hasblog-item"><div class="hasblog-itemleft"><div class="hasblog-title" name="'+data.blogList[i].id+'">'+data.blogList[i].title+'</div><div class="hasblog-createTime">'+data.blogList[i].createTime+'</div></div><div class="hasblog-itemright"><button class="hasblog-delete" name="'+data.blogList[i].id+'">删除</button></div></div>';
                    break;
                case "4":
                    mixflag=1;
                    mixresult=mixresult+'<div class="hasblog-item"><div class="hasblog-itemleft"><div class="hasblog-title" name="'+data.blogList[i].id+'">'+data.blogList[i].title+'</div><div class="hasblog-createTime">'+data.blogList[i].createTime+'</div></div><div class="hasblog-itemright"><button class="hasblog-delete" name="'+data.blogList[i].id+'">删除</button></div></div>';
                    break;
            }
        }
        //
        if(mobileflag==0){
            $("#typedBlog_mobile .noContent-Container").css("display","block");
        }else{
            $("#typedBlog_mobile .hasContent-Container").css("display","block");
            $("#typedBlog_mobile .hasContent-Container").html(mobileresult);
        }
        if(webflag==0){
            $("#typedBlog_web .noContent-Container").css("display","block");
        }else{
            $("#typedBlog_web .hasContent-Container").css("display","block");
            $("#typedBlog_web .hasContent-Container").html(webresult);
        }
        if(schemaflag==0){
            $("#typedBlog_schema .noContent-Container").css("display","block");
        }else{
            $("#typedBlog_schema .hasContent-Container").css("display","block");
            $("#typedBlog_schema .hasContent-Container").html(schemaresult);
        }
        if(mixflag==0){
            $("#typedBlog_mix .noContent-Container").css("display","block");
        }else{
            $("#typedBlog_mix .hasContent-Container").css("display","block");
            $("#typedBlog_mix .hasContent-Container").html(mixresult);
        }

    },
    error:function () {
        // alert("发生错误!");
        $(".modal-body").html("发生错误!");
        $("#mymodal").modal("toggle");
    }
});

$(function () {

    //点击删除按钮，删除相应的博文
    $(".hasContent-Container").on("click",".hasblog-delete",function () {
        $.ajax({
            type:"POST",
            url:"../php/NIITTypedBlogDeleteClient.php",
            data:{
                id:$(this).attr("name")
            },
            success:function (data) {
                if(data=="success"){
                    window.location.href="http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITLogined_NormalUserBlog.html";
                }
            },
            error:function () {
                // alert("发生错误!");
                $(".modal-body").html("发生错误!");
                $("#mymodal").modal("toggle");
            }
        });
    });

    //点击分类中的博文标题跳转到相应的博文页面
    $(".hasContent-Container").on("click",".hasblog-title",function () {
        window.location.href="http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITBlog.html"+"?blogID="+$(this).attr("name");
    });


});