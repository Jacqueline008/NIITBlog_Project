//立即填充页面内容
$.ajax({
    type:"GET",
    url:"../php/NIITBlogMgShowClient.php",
    success:function (data) {
        var result='';
        for(var i=0;i<data.blogList.length;i++){
            result=result+'<div class="BlogItem"><div class="Blog-mix"><img src="'+data.blogList[i].userPic+'" name="'+data.blogList[i].author+'"><span class="Blog-author" name="'+data.blogList[i].author+'">'+data.blogList[i].author+'</span><span class="Blog-createTime">'+data.blogList[i].createTime+'</span><button name="'+data.blogList[i].id+'">删除</button></div><div class="Blog-title" name="'+data.blogList[i].id+'">'+data.blogList[i].title+'</div></div>';
        }
        $("#allBlog-container .hasContent-Container").html(result);
    },
    error:function () {
        // alert("发生错误!");
        $(".modal-body").html("发生错误!");
        $("#mymodal").modal("toggle");
    }
});


$(function () {

    //在全部博文点击头像或者名字都会跳转到该作者页面
    $("#allBlog-container .hasContent-Container").on("click","img",function () {
        window.location.href="http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITAuthor.html"+"?name="+$(this).attr("name");
    });
    $("#allBlog-container .hasContent-Container").on("click",".Blog-author",function () {
        window.location.href="http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITAuthor.html"+"?name="+$(this).attr("name");
    });
    //在全部博文中点击博文标题跳转到相应博文页面
    $("#allBlog-container .hasContent-Container").on("click",".Blog-title",function () {
        window.location.href="http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITBlog.html"+"?blogID="+$(this).attr("name");
    });

    //在全部博文栏目中点击删除按钮
    $("#allBlog-container .hasContent-Container").on("click","button",function () {
        $.ajax({
            type:"POST",
            url:"../php/NIITTypedBlogDeleteClient.php",
            data:{
                id:$(this).attr("name")
            },
            success:function (data) {
                if(data=="success"){
                    window.location.href="http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITLogined_Admin_AllBlog.html";
                }
            },
            error:function () {
                // alert("发生错误!");
                $(".modal-body").html("发生错误!");
                $("#mymodal").modal("toggle");
            }
        });
    });

    //*****************************************************
    //在博文管理栏目
    //点击搜索
    $(".search-container button").click(function () {
        if($(".search-container input").val()==""){
            alert("请输入您想要查询的内容!");
        }else{
            $.ajax({
                type:"POST",
                url:"../php/NIITBlogMgSelectClient.php",
                data:{
                    word:$(".search-container input").val()
                },
                success:function (data) {
                    if(data.istheBlog==0){
                        $("#theBlog-container .noContent-Container").css("display","block");
                        $("#theBlog-container .hasContent-Container").css("display","none");
                    }else{
                        $("#theBlog-container .noContent-Container").css("display","none");
                        $("#theBlog-container .hasContent-Container").css("display","block");
                        var result='';
                        for(var i=0;i<data.theBlogList.length;i++){
                            result=result+'<div class="BlogItem"><div class="Blog-mix"><img src="'+data.theBlogList[i].userPic+'" name="'+data.theBlogList[i].author+'"><span class="Blog-author" name="'+data.theBlogList[i].author+'">'+data.theBlogList[i].author+'</span><span class="Blog-createTime">'+data.theBlogList[i].createTime+'</span><button name="'+data.theBlogList[i].id+'">删除</button></div><div class="Blog-title" name="'+data.theBlogList[i].id+'">'+data.theBlogList[i].title+'</div></div>';
                        }
                        $("#theBlog-container .hasContent-Container").html(result);
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
    //在博文筛选点击头像或者名字都会跳转到该作者页面
    $("#theBlog-container .hasContent-Container").on("click","img",function () {
        window.location.href="http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITAuthor.html"+"?name="+$(this).attr("name");
    });
    $("#theBlog-container .hasContent-Container").on("click",".Blog-author",function () {
        window.location.href="http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITAuthor.html"+"?name="+$(this).attr("name");
    });
    //在博文筛选中点击博文标题跳转到相应博文页面
    $("#theBlog-container .hasContent-Container").on("click",".Blog-title",function () {
        window.location.href="http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITBlog.html"+"?blogID="+$(this).attr("name");
    });
    //在博文筛选栏目中点击删除按钮
    $("#theBlog-container .hasContent-Container").on("click","button",function () {
        $.ajax({
            type:"POST",
            url:"../php/NIITTypedBlogDeleteClient.php",
            data:{
                id:$(this).attr("name")
            },
            success:function (data) {
                if(data=="success"){
                    window.location.href="http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITLogined_Admin_AllBlog.html";
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
