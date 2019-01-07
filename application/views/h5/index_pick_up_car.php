<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
    <title>首页</title>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/androidviewport.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/common.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/jquery.simplemodal.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/placeholder.js"></script>
    <script type="text/javascript">
        adaptUILayout.adapt(720);
    </script>
    <meta name="viewport" content="target-densitydpi=device-dpi, width=720px, user-scalable=no">
    <link media="all" href="<?php echo base_url()?>statics/h5/css/index.css" type="text/css" rel="stylesheet">
    <link media="all" href="<?php echo base_url()?>statics/h5/css/style.css" type="text/css" rel="stylesheet">
    <link media="all" href="<?php echo base_url()?>statics/h5/css/simple.css" type="text/css" rel="stylesheet">
</head>
<body>
    <div class="system">
<!--        选择记录类型-->
        <div class="djtype" id="box_addrecord" style="height: 250px; display: none;">
            <ul>
                <li><a href="sever_deailed_add" class="dt1" indepth="true"><font></font>综合服务单</a></li>
                <li><a href="sever_simple_add" class="dt2" indepth="true"><font></font>工时快速单</a></li>
            </ul>
        </div>
<!--        头部-->
        <div class="title">
            <a href="sever_deailed_add" class="syxj" indepth="true">新建服务记录</a>
            <a href="javascript:void(0);" class="jiaose">接车员</a>
            <div class="jiaoselist" style="display: none;">
                <a href="javascript:void(0);" class="xz" style="width: 158px;">接车员</a>
                <a href="index_construction" class="hs" style="width: 158px;" indepth="true">施工员</a>
            </div>
            <ul class="sytime">
                <a href="javascript:void(0);" class="xztime date_time" indepth="true">今天</a>
                <a href="javascript:void(0);" class="date_time" indepth="true">本月</a>
            </ul>
        </div>
<!--        搜索-->
        <div class="khtopss" style="background: rgb(20, 160, 200) none repeat scroll 0% 0%; height: 290px;">
            <table width="580" border="0" align="center" cellspacing="0" cellpadding="0">
                <tbody>
                    <tr>
                        <td height="55">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="font-size: 36px; color: rgb(255, 255, 255);" height="80">请输入手机号：</td>
                    </tr>
                    <tr>
                        <td style="position: relative;">
                            <a href="javascript:void(0);" id="PlateAI" style="position: absolute; right: 30px;">
                                <img src="<?php echo base_url()?>statics/h5/images/index/sys.png">
                            </a>
                            <div class="xzkh" style="display: none;">
                                <div id="loading2" class="loading2">
                                    <img src="<?php echo base_url()?>statics/h5/images/loading2.gif" width="32" height="32">加载中，请稍后..
                                </div>
                            </div>
                            <input class="khtopinput" id="txtSearch" style="border-color: rgb(255, 255, 255); width: 568px;border-radius: 8px" value="" type="text">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
<!--        底部-->
        <div class="fw_menu">
            <ul>
                <li class="fw1" id="addrecord"><a href="javascript:"><font></font>新建记录</a></li>
                <li class="fw2"><a href="sever_history" indepth="true"><font></font>服务记录</a></li>
<!--                <li class="fw3"><a href="datelist.html" indepth="true"><font></font>预约记录</a></li>-->
                <li class="fw6"><a href="customer_list" indepth="true"><font></font>客户列表</a></li>
<!--                <li class="fw16"><a href="list_001.html" indepth="true"><font></font>商机列表</a></li>-->
<!--                <li class="fw15"><a href="carcheckedlist.html" indepth="true"><font></font>车况列表</a></li>-->
<!--                <li class="fw18"><a href="couponlist.html" indepth="true"><font></font>优惠券列表</a></li>-->
<!--                <li class="fw19"><a href="bonusdetail.html" indepth="true"><font></font>我的提成</a></li>-->
<!--                <li class="fw20"><a href="stockpartslist.html" indepth="true"><font></font>库存查询</a></li>-->
            </ul>
        </div>
    </div>

    <div style="width: 100%;height: 50px;position: absolute;bottom: 10px;text-align: center">
        <input type="button" value="退出" id="loginout" style="width: 90%;height: 100%;line-height: 50px;background-color: #f05050;font-size: 24px;color: #fff;border: 1px solid transparent;outline: none;border-radius: 10px">
    </div>
    <div style="padding-top: 120px;"></div>
    <script type="text/javascript">
        $(function () {
            // 搜索
            $("#txtSearch").on("input", function () {
                $(this).css("color", "#555555");
                var keyword = $.trim($(this).val());
                var input = $(this);
                if (keyword != "") {
                    setTimeout(function () { datekeyword(keyword, input) }, 500);
                }
                else {
                    $(".xzkh ul").empty().hide();
                }
            });
            $("body").click(function (e) {
                var t = e.target;
                if (t && $(t).attr("id") != "txtSearch") {
                    $(".xzkh").hide();
                }
            });

            // 选择新建记录类型
            $("#addrecord").click(function (e) {
                $(".mask_box").toggle();
                $("#box_addrecord").toggle();
                e.stopPropagation();
            });
            $(document).click(function () {
                $(".mask_box").hide();
                $("#box_addrecord").hide();
            });

            // 切換角色
            $(document).bind("click", function (e) {
                var target = $(e.target);
                if (target.closest(".jiaose").length == 0) {
                    $(".jiaoselist").hide();
                }
            });
            $(".jiaose").click(function () {
                $(".jiaoselist").toggle();
            });

            // 切换显示的数据
            $('.date_time').on('click',function () {
                $('.xztime').removeClass('xztime');
                $(this).addClass('xztime');
            });

            //退出登录
            $('#loginout').on('click',function () {
               window.location.href = 'loginout';
            });
        });
        // 搜索结果
        function datekeyword(key, input) {
            $(".xzkh ul").empty();
            var keyword = $.trim($(input).val());
            if (key == keyword) {
                $("#loading2,.xzkh").show();
                $.ajax({
                    type: "POST",
                    data: { keyword: keyword},
                    url: "",
                    dataType: "json",
                    success: function (data) {
                        if (data.result.length > 0) {
                            $(".xzkh ul").empty().show();
                            var employeelist = '<ul>';
                            for (var i = 0; i < data.result.length; i++) {
                                employeelist += "<li><li><a href='javascript:void(0)' customerid='" + data.result[i].customerId + "' carno='" + data.result[i].carNo + "' mobile='" + data.result[i].mobile + "' carid='" + data.result[i].carid + "' >" + (data.result[i].mobile.length == 18 ? "无手机号" : data.result[i].mobile) + " - " + data.result[i].carNo + "</a></li>";
                            }
                            employeelist += "</ul>";
                            $("#loading2").hide();
                            $(".xzkh").append(employeelist);
                            $(input).parent().find(".xzkh ul li a").click(function () {
                                var carno = $.trim($(this).attr("carno"));
                                var customerid = $.trim($(this).attr("customerid"));
                                var mobile = $.trim($(this).attr("mobile").length == 18 ? "" : $(this).attr("mobile"));
                                var carid = $.trim($(this).attr("carid"));

                                location.href = '';
                            });
                        }
                        else {
                            $(".xzkh ul").empty().show();
                            var employeelist = '<ul>';
                            employeelist += "<li><li><b style='height: 60px;line-height: 60px;font-size: 24px;padding-left: 20px;display: block; font-weight:initial; ' href='javascript:void(0);'>" + ("暂无查询结果!") + "</b></li>";
                            employeelist += "</ul>";
                            $("#loading2").hide();
                            $(".xzkh").append(employeelist);
                            $(input).parent().find(".xzkh ul li b").click(function () {
                                $(".khtopbtn").click();
                            })
                        }

                    },
                    error: function () {
                        Ewewo.Tips_Error('网络错误,获取数据不成功!');
                    }
                });
            }
            else {
                $("#loading2,.xzkh").hide();
            }
        }
    </script>
</body>
</html>