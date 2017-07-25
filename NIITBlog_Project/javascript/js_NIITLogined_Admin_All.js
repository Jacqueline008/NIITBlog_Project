//立即填充页面内容
$.ajax({
    type:"GET",
    url:"../php/NIITUserMgShowClient.php",
    success:function (data) {
        var result='';
        for(var i=0;i<data.userList.length;i++){
            result=result+'<div class="UserItem"><img src="'+data.userList[i].userPic+'" name="'+data.userList[i].name+'"><span name="'+data.userList[i].name+'">'+data.userList[i].name+'</span><button name="'+data.userList[i].name+'">删除</button></div>';
        }
        $("#allUser-container .hasContent-Container").html(result);
    },
    error:function () {
        // alert("发生错误!");
        $(".modal-body").html("发生错误!");
        $("#mymodal").modal("toggle");
    }
});


$(function () {

    //在全部用户点击头像或者名字都会跳转到该作者页面
    $("#allUser-container .hasContent-Container").on("click","img",function () {
        window.location.href="http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITAuthor.html"+"?name="+$(this).attr("name");
    });
    $("#allUser-container .hasContent-Container").on("click","span",function () {
        window.location.href="http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITAuthor.html"+"?name="+$(this).attr("name");
    });

    //在全部用户栏目点击删除按钮
    $("#allUser-container .hasContent-Container").on("click","button",function () {
        $.ajax({
            type:"POST",
            url:"../php/NIITUserMgDeleteClient.php",
            data:{
                name:$(this).attr("name")
            },
            success:function (data) {
                if(data=="success"){
                    window.location.href="http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITLogined_Admin_All.html";
                }
            },
            error:function () {
                // alert("发生错误!");
                $(".modal-body").html("发生错误!");
                $("#mymodal").modal("toggle");
            }
        });
    });

    //********************************************************************
    //在用户筛选栏目点击搜索按钮
    $(".search-container button").click(function () {
        if($(".search-container input").val()==""){
            alert("请输入您想要查询的用户名称!");
        }else{
            $.ajax({
                type:"POST",
                url:"../php/NIITUserMgSelectClient.php",
                data:{
                    word:$(".search-container input").val()
                },
                success:function (data) {
                    if(data.istheUser==0){
                        $("#theUser-container .noContent-Container").css("display","block");
                        $("#theUser-container .hasContent-Container").css("display","none");
                    }else{
                        $("#theUser-container .noContent-Container").css("display","none");
                        $("#theUser-container .hasContent-Container").css("display","block");
                        var result='';
                        for(var i=0;i<data.theUserList.length;i++){
                            result=result+'<div class="UserItem"><img src="'+data.theUserList[i].userPic+'" name="'+data.theUserList[i].name+'"><span name="'+data.theUserList[i].name+'">'+data.theUserList[i].name+'</span><button name="'+data.theUserList[i].name+'">删除</button></div>';
                        }
                        $("#theUser-container .hasContent-Container").html(result);
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

    //在用户筛选点击头像或者名字都会跳转到该作者页面
    $("#theUser-container .hasContent-Container").on("click","img",function () {
        window.location.href="http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITAuthor.html"+"?name="+$(this).attr("name");
    });
    $("#theUser-container .hasContent-Container").on("click","span",function () {
        window.location.href="http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITAuthor.html"+"?name="+$(this).attr("name");
    });

    //在用户筛选栏目点击删除按钮
    $("#theUser-container .hasContent-Container").on("click","button",function () {
        $.ajax({
            type:"POST",
            url:"../php/NIITUserMgDeleteClient.php",
            data:{
                name:$(this).attr("name")
            },
            success:function (data) {
                if(data=="success"){
                    window.location.href="http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITLogined_Admin_All.html";
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