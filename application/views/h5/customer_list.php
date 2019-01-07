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
<!--        头部-->
        <div class="title">
            <a href="index" class="back">返回</a>
            <a href="javascript:void(0);" class="topsearch">搜索</a>
            <ul class="sytime">客户</ul>
        </div>
<!--        搜索-->
        <div class="khtopss">
            <table width="580" border="0" align="center" cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td height="55">&nbsp;</td>
                    </tr>
                    <tr>
                        <td height="80" style="font-size: 30px;">请输入手机号码：</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" class="khtopinput" id="txtkey" value="<?php echo $data['keyword'] ?>">
                            <input type="button" class="khtopbtn" id="btnsearch">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

<!--        搜索结果-->
        <div class="yuyue_title">
            <div class="left font28">搜索结果<font>(共 <?php echo $data['count'] ?> 条)</font></div>
        </div>
        <div id="adddata">
<!--            如果存在-->
            <?php if ($data['count']) :?>
                <?php foreach ($data['items'] as $k=>$v) : ?>
                    <div class="kh_list">
                        <div class="kh_ny">
                            <dl>
                                <?php if ($v->vipId) : ?>
                                    <dt class="hy">
                                        <a href="customer_detail?uid=<?php echo $v->id ?>"><p class="link"><?php echo $v->name?></p></a>
                                        <span class="yhkh">会员</span>
                                <?php else :?>
                                    <dt>
                                        <a href="customer_detail?uid=<?php echo $v->id ?>"><p class="link"><?php echo $v->name?></p></a>
                                        <span class="ptkh">(普通客户)</span>
                                <?php endif;?>

                                    <?php if ($v->wechat) : ?>
                                    <font class="wxyh"><?php echo $v->wechat ?></font>
                                    <?php else :?>
                                    <font class="">未注册</font>
                                    <?php endif;?>
                                </dt>
                                <dd>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <?php if ($v->org_name) :?>
                                                    <td><?php echo $v->org_name ?> </td>
                                                <?php else : ?>
                                                    <td>无注册门店 </td>
                                                <?php endif; ?>
                                                <?php if ($v->mobile) : ?>
                                                    <td width="17%" align="right"><?php echo $v->mobile?></td>
                                                <?php else :?>
                                                    <td width="17%" align="right">无手机号</td>
                                                <?php endif;?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </dd>
                            </dl>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else :?>
<!--            如果没有-->
                <div class="nophoto">
                <span>暂无客户</span>
            </div>
            <?php endif; ?>
        </div>
<!--        loading-->
        <div class="loading" style="display: none;" lang="item_loading">
            <img src="<?php echo base_url()?>statics/h5/images/loading.gif" width="24" height="24" style="margin-top: -5px;">&nbsp;正在加载中
        </div>
        <div style="padding-top: 120px;"></div>
    </div>

    <script type="text/javascript">
        $(function (){
            $(document).bind("click",function(e){
                var target  = $(e.target);
                if(target.closest("#asearch").length == 0){
                    $("#ulsearchstatus").hide();
                }
            });

            // 搜索
            $("#btnsearch").click(function(){
                var url="customer_list" +"?keyword=" + $.trim($("#txtkey").val());
                window.location.href=url;
            });

            function contains(arr, obj) {
                var i = arr.length;
                while (i--) {
                    if (arr[i] === obj) {
                        return true;
                    }
                }
                return false;
            };

            //筛选按钮
            $("#asearch").click(function(){
                $(this).next("ul").toggle();
            });

            // 上拉加载下一页
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
                    url: '',
                    data: { page: page,keyword: keyword },
                    cache:false,
                    success: function (result) {
                        $(".loading").hide();
                        $("#adddata").append(result);
                        i++;
                    },
                    error: function () {
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