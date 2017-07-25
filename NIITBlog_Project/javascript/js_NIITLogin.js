$(function () {
    //给登录按钮添加点击事件，请求一个后台登录逻辑页
    $("#loginsubmit").click(function () {
        $.ajax({
            type:"POST",
            url:"../php/NIITLoginClient.php",
            data:{
                loginuser:$("#loginuser").val(),
                loginpwd:$("#loginpwd").val()
            },
            success:function (data) {
                if(data==1){
                    //说明用户名和密码都输入正确，则跳转到首页
                    window.location.href="http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITHome.html";
                }
                $("#error_message").html(data);
            },
            error:function () {
                // alert("发生错误!");
                $(".modal-body").html("发生错误!");
                $("#mymodal").modal("toggle");
            }
        });
    });
});
