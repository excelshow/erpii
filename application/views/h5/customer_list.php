<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>客户列表</title>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/jquery-1.8.2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>statics/h5/css/index.css?v=20161115">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>statics/h5/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>statics/h5/css/simple.css">
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/androidviewport.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/common.js?v=20180818160828"></script>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/jquery.simplemodal.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/placeholder.js"></script>
    <script type="text/javascript">
        adaptUILayout.adapt(720);
    </script>
    <meta name="viewport" content="target-densitydpi=device-dpi, width=720px, user-scalable=no">
</head>
<body>

    <div class="system">
        <div class="title">
            <a href="javascript:history.back(-1);" class="back">返回</a>
            <a href="javascript:void(0);" class="topsearch">搜索</a>
            <ul class="sytime">客户</ul>
        </div>

        <div class="khtopss">
            <table width="580" border="0" align="center" cellpadding="0" cellspacing="0">
                <tbody><tr>
                    <td height="55">&nbsp;</td>
                </tr>
                <tr>
                    <td height="80" style="font-size: 30px;">请输入客户、车牌或手机号码：</td>
                </tr>
                <tr>
                    <td>
                        <input type="text" class="khtopinput" id="txtkey"><input type="button" class="khtopbtn" id="btnsearch"></td>
                </tr>
                </tbody></table>
        </div>
        <div class="yuyue_title">
        </div>

        <div id="adddata">

            <div class="nophoto">
                <span>暂无客户</span>
            </div>
        </div>

        <div class="loading" style="display: none;" lang="item_loading">
            <img src="<?php echo base_url()?>statics/h5/images/loading.gif" width="24" height="24" style="margin-top: -5px;">&nbsp;正在加载中
        </div>
        <div style="padding-top: 120px;"></div>
    </div>

    <script type="text/javascript">
        $(function ()
        {
            $(document).bind("click",function(e){
                var target  = $(e.target);
                if(target.closest("#asearch").length == 0)
                {
                    $("#ulsearchstatus").hide();
                }
            })

            //$(".topsearch").click(function()
            //{
            //    $(".kh_ss").slideToggle(500);
            //});

            $("#btnsearch").click(function()
            {
                var url="/Customer/List" +"?keyword=" + $.trim($("#txtkey").val());
                window.location.href=url;
            })

            function contains(arr, obj) {
                var i = arr.length;
                while (i--) {
                    if (arr[i] === obj) {
                        return true;
                    }
                }
                return false;
            }

            //筛选按钮
            $("#asearch").click(function()
            {
                $(this).next("ul").toggle();
            })

            var myArray = new Array();
            var totalpage = 1; //总页数，防止超过总页数继续滚动
            var winH = $(window).height(); //页面可视区域高度
            var i=2;
            $(window).scroll(function () {
                if (i < totalpage) { // 当滚动的页数小于总页数的时候，继续加载
                    var pageH = $(document.body).height();
                    var scrollT = $(window).scrollTop(); //滚动条top
                    var rate = (pageH - winH - scrollT) / winH;
                    if (rate < 0.01) {
                        if(!contains(myArray,i))
                        {
                            getJson(i);
                            myArray.push(i);
                        }
                    }
                }
            });
            function getJson(page) {
                var keyword = $("#txtkey").val();
                $(".loading").show();
                $.ajax({
                    async:true,
                    type: "POST",
                    url: '/Customer/ListIndex',
                    data: { page: page,keyword: keyword },
                    cache:false,
                    success: function (result) {
                        $(".loading").hide();
                        $("#adddata").append(result);
                        i++;
                    },
                    error: function () {
                        //Ewewo.Tips('网络错误!');
                        Ewewo.RemoveLoading();
                    }
                });
            }

            $(".kh_list").click(function(){
                $(this).find("p")[0].click();
            });
        })
    </script>

</body>
</html>