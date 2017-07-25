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


//立即填充页面内容
$.ajax({
    type:"POST",
    url:"../php/NIITAuthorShowClient.php",
    data:{
        name:Request("name")
    },
    success:function (data) {
        //填充作者名字
        $(".msg-name").html(data.name);
        //填充作者图片
        $(".msg-userPic").attr("src",data.userPic);
        //填充作者描述
        $(".msg-userDes").html(data.userDes);

        //判断该作者是否有博文
        if(data.isblog==0){
            //没有任何博文
            $(".noContent-Container").css("display","block");
            $(".hasContent-Container").css("display","none");
        }else{
            //有博文
            $(".noContent-Container").css("display","none");
            $(".hasContent-Container").css("display","block");
            $result="";
            for(var i=0;i<data.blogList.length;i++){
                $result=$result+'<div class="blogItem" name="'+data.blogList[i].id+'"><div class="blog-mixcontainer"><img class="blog-userPic" src="'+data.blogList[i].userPic+'"/><span class="blog-author">'+data.blogList[i].author+'</span><span class="blog-createTime">'+data.blogList[i].createTime+'</span></div><div class="blog-title">'+data.blogList[i].title+'</div><div class="blog-smallcontent">'+data.blogList[i].smallcontent+'</div></div>';
            }
            $(".hasContent-Container").html($result);
        }
    },
    error:function () {
        // alert("发生错误!");
        $(".modal-body").html("发生错误!");
        $("#mymodal").modal("toggle");
    }
});


$(function () {

    //点击文章标题跳转到指定的页面
    $(".hasContent-Container").on("click",".blogItem",function () {
        window.location.href="http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITBlog.html"+"?blogID="+$(this).attr("name");
    });

});

