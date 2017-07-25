var currentrow=0;
//立即填充页面内容
$.ajax({
    type:"POST",
    url:"../php/NIITShowClient.php",
    data:{
        currentrow:0
    },
    success:function (data) {
        var result='';
        var blogType='';
        for(var i=0;i<data.blogList.length;i++){
            switch (data.blogList[i].blogType){
                case "1":blogType="移动开发";break;
                case "2":blogType="web前端";break;
                case "3":blogType="架构设计";break;
                case "4":blogType="综合";break;
            }
            result=result+'<div class="blogItem" name="'+data.blogList[i].id+'"><div class="blog-left"><img src="'+data.blogList[i].userPic+'"><span>'+data.blogList[i].author+'</span></div><div class="blog-right"><div class="blog-title">'+data.blogList[i].title+'</div><div class="blog-smallcontent">'+data.blogList[i].smallcontent+'</div><div class="blog-mix"><img class="blog-typeimg" src="../images/blog-type.png"><span class="blog-typespan">'+blogType+'</span><span class="blog-timespan">'+data.blogList[i].createTime+'</span><img class="blog-timeimg" src="../images/blog-time.png"></div></div></div>';
        }
        $(result).insertBefore(".readmore");
        currentrow=currentrow+10;
    },
    error:function () {
        // alert("发生错误!");
        $(".modal-body").html("发生错误!");
        $("#mymodal").modal("toggle");
    }
});

$(function () {

    //在轮播组件中点击博文跳转到相应博文页面
    $("#mycarousel .hotblog").click( function () {
        window.location.href = "http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITBlog.html" + "?blogID=" + $(this).attr("name");
    });

    //当页面滚动到一定位置back按钮出现否则隐藏(这里也包含了标头)
    window.onscroll=function(){
        var top=window.pageYOffset||document.documentElement.scrollTop||document.body.scrollTop;
        var node=document.getElementById('back');
        var node2=document.getElementById('site-nav');
        if(top>200){
            node.style.display='block';
            node2.style.display='none';
        }else{
            node.style.display='none';
            node2.style.display='block';
        }
    }
    //点击back按钮返回页面顶部
    $("#back").click(function () {
        window.scroll(0,0);
    });

    //在作者推荐栏目点击头像或者名字都会跳转到该作者页面
    $(".authorItem").click(function () {
        window.location.href="http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITAuthor.html"+"?name="+$(this).attr("name");
    });

    //*********************************************************
    //在博文展示区点击查看更多按钮
    $(".readmore").click(function () {
        $.ajax({
            type:"POST",
            url:"../php/NIITShowClient.php",
            data:{
                currentrow:currentrow
            },
            success:function (data) {
                if(data.isblog==0){
                    // alert("没有更多内容了!");
                    $(".modal-body").html("没有更多内容了!");
                    $("#mymodal").modal("toggle");
                }else{
                    var result='';
                    var blogType='';
                    for(var i=0;i<data.blogList.length;i++){
                        switch (data.blogList[i].blogType){
                            case "1":blogType="移动开发";break;
                            case "2":blogType="web前端";break;
                            case "3":blogType="架构设计";break;
                            case "4":blogType="综合";break;
                        }
                        result=result+'<div class="blogItem" name="'+data.blogList[i].id+'"><div class="blog-left"><img src="'+data.blogList[i].userPic+'" name="'+data.blogList[i].author+'"><span name="'+data.blogList[i].author+'">'+data.blogList[i].author+'</span></div><div class="blog-right"><div class="blog-title">'+data.blogList[i].title+'</div><div class="blog-smallcontent">'+data.blogList[i].smallcontent+'</div><div class="blog-mix"><img class="blog-typeimg" src="../images/blog-type.png"><span class="blog-typespan">'+blogType+'</span><span class="blog-timespan">'+data.blogList[i].createTime+'</span><img class="blog-timeimg" src="../images/blog-time.png"></div></div></div>';
                    }
                    $(result).insertBefore(".readmore");
                    currentrow=currentrow+10;
                }
            },
            error:function () {
                // alert("发生错误!");
                $(".modal-body").html("发生错误!");
                $("#mymodal").modal("toggle");
            }
        });
    });

    //在博文展示区中点击博文标题跳转到相应博文页面
    $(".blogList-container").on("click",".blogItem",function () {
        window.location.href="http://localhost/phpStorm_Project/NIITBlog_Project/html/NIITBlog.html"+"?blogID="+$(this).attr("name");
    });
});
