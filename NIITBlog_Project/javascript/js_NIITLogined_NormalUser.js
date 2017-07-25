//立即填充页面内容
$.ajax({
    type:"GET",
    url:"../php/NIITInfoClient.php",
    success:function (data) {
        //填充用户名字
        $(".UserName").val(data.name);
        //填充手机号
        $(".UserTel").val(data.tel);
        //填充用户头像
        $(".userInfo-oldpic img").attr("src",data.userPic);
        //填充用户描述
        $(".UserDes").html(data.userDes);
    },
    error:function () {
        // alert("发生错误!");
        $(".modal-body").html("发生错误!");
        $("#mymodal").modal("toggle");
    }
});

$(function () {
    
});