//获取标头显示状态
function getUserStatus() {
    $.ajax({
        type:"GET",
        url:"../php/NIITHeaderClient.php",
        success:function (data) {
            if(data.home!=="0"){
                $(".sn-home").css("display","block");
            }
            if(data.login!=="0"){
                $(".sn-login").css("display","block");
            }
            if(data.user!=="0"){
                $(".sn-user").css("display","block");
                $(".sn-user").html("hi,"+data.user);
                //给写文章按钮用的
                $(".sn-write").attr("name","1");
            }
            if(data.admin!=="0"){
                $(".sn-admin").css("display","block");
                $(".sn-admin").html("hi,"+data.admin);
            }
            if(data.logout!=="0"){
                $(".sn-logout").css("display","block");
            }
            if(data.write!=="0"){
                $(".sn-write").css("display","block");
            }
        },
        error:function () {
            alert("发生错误!");
        }
    });
}


$(function () {
    //获取标头显示状态
    getUserStatus();

    //给下拉菜单的图标添加点击事件
    $(".sn-showmenu").click(function () {
        $(".sn-quick-menu").slideToggle();
    });

    //点击退出连接时，弹出确认退出对话框
    $(".sn-logout").click(function () {
        var response=confirm("确定退出本系统?");
        //如果用户确认退出，则后台会清除会话变量，并且此脚本会将页面跳转到首页
        //begin
        if(response==true){
            $.ajax({
                type:"GET",
                url:"../php/NIITLogoutClient.php",
                success:function (data) {
                    window.location.href="http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITHome.html";
                },
                error:function () {
                    alert("发生错误!");
                }
            });
        }
        //end
    });

    //点击写文章按钮
    $(".sn-write").click(function () {
        if($(".sn-write").attr("name")==undefined){
            alert("您还未登录,请先登录!");
        }else{
            window.location.href="http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITWriteLog.html";
        }
    });
});