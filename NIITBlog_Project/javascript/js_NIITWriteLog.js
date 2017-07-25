$(function () {
    //此区域是vue实现的markdown编辑区
    new Vue({
        el: '#editor',
        data: {
            input: "## 支持markdown语法\n### 快来试试吧"
        },
        computed: {
            compiledMarkdown: function () {
                return marked(this.input, { sanitize: true })
            }
        },
        methods: {
            update: _.debounce(function (e) {
                this.input = e.target.value
            }, 300)
        }
    })

    //移动端控制编辑和展示区的按钮
    $("#editor-btn").click(function () {
        if($("textarea").css("display")=="block"){
            $("textarea").css("display","none");
            $("#editor-btn").css("background-color","#ef7662");
            $("#editor-btn").html("编辑");
            $("#editor div").css("display","block");
        }else{
            $("#editor div").css("display","none");
            $("#editor-btn").css("background-color","#547abb");
            $("#editor-btn").html("预览");
            $("textarea").css("display","block");
        }
    });

    //发表博客的点击事件
    $(".blog-submit").click(function () {
        $.ajax({
            type:"POST",
            url:"../php/NIITPublishBlogClient.php",
            data:{
                title:$(".blog-title").val(),
                content:$("textarea").val(),
                blogType:$(".blog-type option:selected").val()
            },
            success:function (data) {
                if(data=="1"){
                    // alert("博文发表成功!");
                    $(".modal-body").html("博文发表成功!");
                    $("#mymodal").modal("toggle");
                }
            },
            error:function () {
                // alert("抱歉,博文发表失败!");
                $(".modal-body").html("抱歉,博文发表失败!");
                $("#mymodal").modal("toggle");
            }
        });
    });
});
