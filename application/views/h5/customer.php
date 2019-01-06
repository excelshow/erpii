<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>客户</title>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/jquery-1.8.2.min.js"></script>
    <link media="all" href="<?php echo base_url()?>statics/h5/css/index.css" type="text/css" rel="stylesheet">
    <link media="all" href="<?php echo base_url()?>statics/h5/css/style.css" type="text/css" rel="stylesheet">
    <link media="all" href="<?php echo base_url()?>statics/h5/css/simple.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/androidviewport.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/common.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/jquery.simplemodal.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/placeholder.js"></script>
    <script type="text/javascript">
        adaptUILayout.adapt(720);
    </script><meta name="viewport" content="target-densitydpi=device-dpi, width=720px, user-scalable=no">
</head>
    <body>
        <div class="mask_div" id="tip" style="height: 240px; margin-top: -120px;display:none">
            <h2 style="font-size: 36px;">提示</h2>
            <ul style="height: 84px;">
                <li class="quit">该车辆有未完成的车况检查</li>
            </ul>
            <div class="mask_btn">
                <a href="javascript:" id="search">查看</a>
                <a href="javascript:" class="queding" id="order">继续开单</a>
            </div>
        </div>
        <div class="system" style="background:#f5f5f5;">
            <div class="title">
                <a href="javascript:history.back(-1);" class="back">返回</a>
                <ul class="sytime">客户</ul>
            </div>

            <div class="search" style=" position:relative;">
                <div class="xzkh" style="top: 78px; display: none; z-index:99;">
                    <div id="loading2" class="loading2" style="display: none;">
                        <img src="<?php echo base_url()?>statics/h5/images/loading2.gif" width="32" height="32">加载中，请稍后..
                    </div>
                    <ul style="display: none;"></ul><ul style="display: none;"></ul><ul style="display: none;"></ul><ul style="display: none;"></ul><ul style="display: none;"></ul><ul style="display: none;"></ul><ul style="display: none;"></ul><ul style="display: none;"></ul>
                </div>
                <input type="text" id="search_input" class="phoneinput" style="color: rgb(85, 85, 85);">
<!--                <a href="javascript:;" class="xinjian" id="addcustomernew" style="">新建</a>-->
            </div>
            <div class="car">
                <ul>
                    <li>
                        <font style="color:#ff0000;">手机号</font><span style="position:relative;">
                            <input type="text" class="carinput" placeholder="请填写" id="mobile" mobile="636823808497890534" selectid="-1">
                            <div class="xzkh1" style="top: 78px; z-index: 2;  display:none;">
                                <a id="nomobilediv" style="font-size: 26px;text-align:center;" href="javascript:void(0)">无手机号</a>
                            </div>
                        </span>

                    </li>
                    <li>
                        <font style="color:#ff0000;">车牌号</font><span>
                            <i style="cursor:pointer; font-style:normal;" carno="" id="carno1">请选择</i>
                            <i style="color:#333;cursor:pointer; font-style:normal;display:none;" id="carno" valueid="0" carno=""></i>
                            <img id="vipimg" src="<?php echo base_url()?>statics/h5/images/V.png" width="33" style="margin:-3px 0 0 5px;display:none;">

                        </span>
                    </li>
                    <li><font style="color:#ff0000;">客户姓名</font><span><input type="text" class="carinput" placeholder="请填写" id="customerName" value=""></span></li>
                    <li><font>上次开单时间</font><span><input type="text" class="carinput" placeholder="-" value="-" disabled=""></span></li>
                    <li><font>上次检查时间</font><span><input type="text" id="lasttime" class="carinput" placeholder="-" value="" disabled=""></span></li>
                    <li name="lastscore">
                        <font>上次检查分数</font><span>-</span>
                    </li>

                </ul>
                <ul>
                    <li><a href="javascript:" id="vippackage" class="carmore"><font>次卡套餐</font><span style="color:#ff6600;" id="spvippackage">0个</span></a></li>
                    <li><a href="javascript:" id="viprechargecard" class="carmore"><font>储值卡</font><span style="color:#ff6600;" id="spviprechargecard">0个</span></a></li>
                </ul>
            </div>
            <div style="height:130px;"></div>
            <div class="boa">
                <dl>
                    <a href="javascript:" id="addQuickRecord">+ 工时快速单</a>
                    <a href="javascript:" class="xz" id="addRecord">+ 综合服务单</a>

                </dl>
            </div>
        </div>


        <div class="mask_div1" id="newphoneconfig" style="height: 240px; margin-top: -120px; display: none">
            <h2 style="font-size: 36px;">提示</h2>
            <ul style="height: 84px;">
                <li class="quit">该手机号为新手机号,请选择!</li>
            </ul>
            <div class="mask_btn1"><a href="javascript:void(0);" id="newmobile">新建新客户</a><a href="javascript:;" id="replacephone" class="queding">替换原手机</a></div>
        </div>
        <div class="" id="" style="height: 650px; overflow: auto; margin-top: -325px; display: none;">
        </div>

        <div class="srcar" style="z-index: 99999; display: none;">
            <dl class="car_input" data-pai="">
                <a name="hidsrcar" href="javascript:;"></a>
                <ul class="clearfix ul_input">
                    <li class="input_pro" style="margin: 0 auto"><span></span></li>
                    <li class="input_pp input_zim" style="margin: 0 auto"><span></span></li>
                    <li class="input_pp" style="margin: 0 auto"><span></span></li>
                    <li class="input_pp" style="margin: 0 auto"><span></span></li>
                    <li class="input_pp" style="margin: 0 auto"><span></span></li>
                    <li class="input_pp" style="margin: 0 auto"><span></span></li>
                    <li class="input_pp" style="margin: 0 auto"><span></span></li>
                    <li class="input_pp" style="margin: 0 auto"><span></span></li>
                </ul>
            </dl>
            <ul style="display: block;">
                <li>
                    <a href="javascript:void(0);">京</a>
                    <a href="javascript:void(0);">沪</a>
                    <a href="javascript:void(0);">粤</a>
                    <a href="javascript:void(0);">津</a>
                    <a href="javascript:void(0);">渝</a>
                    <a href="javascript:void(0);">冀</a>
                    <a href="javascript:void(0);">豫</a>
                    <a href="javascript:void(0);">云</a>
                    <a href="javascript:void(0);">辽</a>
                    <a href="javascript:void(0);">黑</a>
                    <a href="javascript:void(0);">皖</a>
                    <a href="javascript:void(0);">鲁</a>
                    <a href="javascript:void(0);">新</a>
                    <a href="javascript:void(0);">苏</a>
                    <a href="javascript:void(0);">浙</a>
                    <a href="javascript:void(0);">赣</a>
                    <a href="javascript:void(0);">川</a>
                    <a href="javascript:void(0);">湘</a>
                    <a href="javascript:void(0);">鄂</a>
                    <a href="javascript:void(0);">桂</a>
                    <a href="javascript:void(0);">甘</a>
                    <a href="javascript:void(0);">晋</a>
                    <a href="javascript:void(0);">蒙</a>
                    <a href="javascript:void(0);">陕</a>
                    <a href="javascript:void(0);">吉</a>
                    <a href="javascript:void(0);">闽</a>
                    <a href="javascript:void(0);">贵</a>
                    <a href="javascript:void(0);">青</a>
                    <a href="javascript:void(0);">藏</a>
                    <a href="javascript:void(0);">宁</a>
                    <a href="javascript:void(0);">琼</a>
                </li>
            </ul>
            <ul style="display: none;">
                <li>
                    <a href="javascript:void(0);" value="1">1</a>
                    <a href="javascript:void(0);" value="2">2</a>
                    <a href="javascript:void(0);" value="3">3</a>
                    <a href="javascript:void(0);" value="4">4</a>
                    <a href="javascript:void(0);" value="5">5</a>
                    <a href="javascript:void(0);" value="6">6</a>
                    <a href="javascript:void(0);" value="7">7</a>
                    <a href="javascript:void(0);" value="10">A</a>
                    <a href="javascript:void(0);" value="11">B</a>
                    <a href="javascript:void(0);" value="12">C</a>
                    <a href="javascript:void(0);" value="13">D</a>
                    <a href="javascript:void(0);" value="14">E</a>
                    <a href="javascript:void(0);" value="15">F</a>
                    <a href="javascript:void(0);" value="8">8</a>
                    <a href="javascript:void(0);" value="16">G</a>
                    <a href="javascript:void(0);" value="17">H</a>
                    <a href="javascript:void(0);" value="18">J</a>
                    <a href="javascript:void(0);" value="19">K</a>
                    <a href="javascript:void(0);" value="20">L</a>
                    <a href="javascript:void(0);" value="21">M</a>
                    <a href="javascript:void(0);" value="9">9</a>
                    <a href="javascript:void(0);" value="22">N</a>
                    <a href="javascript:void(0);" value="23">P</a>
                    <a href="javascript:void(0);" value="24">Q</a>
                    <a href="javascript:void(0);" value="25">R</a>
                    <a href="javascript:void(0);" value="26">S</a>
                    <a href="javascript:void(0);" value="27">T</a>
                    <a href="javascript:void(0);" value="0">0</a>
                    <a href="javascript:void(0);" value="28">U</a>
                    <a href="javascript:void(0);" value="29">V</a>
                    <a href="javascript:void(0);" value="30">W</a>
                    <a href="javascript:void(0);" value="31">X</a>
                    <a href="javascript:void(0);" value="32">Y</a>
                    <a href="javascript:void(0);" value="33">Z</a>
                    <a href="javascript:void(0);" name="delete" style="background: #adb4be url(/Content/Images/delete2.png) center center no-repeat;">&nbsp;</a>
                    <a href="javascript:void(0);" value="34">港</a>
                    <a href="javascript:void(0);" value="35">澳</a>
                    <a href="javascript:void(0);" value="36">警</a>
                    <a href="javascript:void(0);" value="37">领</a>
                    <a href="javascript:void(0);" value="38">学</a>
                    <a href="javascript:void(0);" name="confirm" style="width: 185px; background: #00b4f0; color: #fff;">确定</a>
                </li>
            </ul>
        </div>

        <script type="text/javascript">
            var next = 0;
            $(function () {
                $(".srcar").find("ul").eq(0).find("li span").text("").removeClass("ppHas").removeClass("hasPro");

                $("a[name=hidsrcar]").click(function () {
                    $(".srcar").hide();

                })

                $(".srcar").children().click(function (e) {
                    e.stopPropagation();
                })

                $("#carno,#carno1").click(function (e) {
                    e.stopPropagation();
                    var v = $(this).attr("carno");
                    $(".car_input").attr("data-pai", v);
                    var carno = $("#carno").attr("carno");
                    if (carno == '') {
                        $(".srcar").show().find("ul").eq(1).show();
                        $(".srcar").show().find("ul").eq(2).hide();
                    }
                    else {
                        $(".srcar").show().find("ul").eq(1).hide();
                        $(".srcar").show().find("ul").eq(2).show();
                    }
                });

                $(".srcar ul").eq(1).find("a").click(function () {
                    var values = $(this).html();
                    $(".input_pro span").text(values);
                    $(".input_pro").addClass("hasPro");
                    $(".input_pp").find("span").text("");
                    $(".ppHas").removeClass("ppHas");
                    next = 0;
                    showKeybord();
                });
                $(".srcar ul").eq(2).find("a").click(function () {
                    var values = $(this).html();
                    var name = $(this).attr("name");
                    var jj = $(this).attr("value");
                    if (name != "delete" && name != "confirm") {
                        if (next > 6) {
                            return
                        }
                        for (var i = 0; i < $(".input_pp").length; i++) {
                            if (next == 0 & jj < 10 & $(".input_pp:eq(" + next + ")").hasClass("input_zim")) {
                                Ewewo.Tips('车牌第二位为字母!');
                                return;
                            }
                            $(".input_pp:eq(" + next + ")").find("span").text(values);
                            $(".input_pp:eq(" + next + ")").addClass("ppHas");
                            next = next + 1;
                            if (next > 6) {
                                next = 7;
                            }

                            getpai();
                            return
                        }

                        $(".srcar dl").append(values);
                    }
                    else if (name == "delete") {
                        if ($(".ppHas").length == 0) {
                            $(".hasPro").find("span").text("");
                            $(".hasPro").removeClass("hasPro");
                            showProvince();
                            next = 0;
                        }
                        $(".ppHas:last").find("span").text("");
                        $(".ppHas:last").removeClass("ppHas");
                        next = next - 1;
                        if (next < 1) {
                            next = 0;
                        }
                        getpai();
                        return;
                    }
                    else if (name == "confirm") {
                        if (next < 6) {
                            Ewewo.Tips('车牌不能少于7位!');
                            return;
                        }
                        else {
                            var carno = $(".car_input").attr("data-pai");
                            $(".vipbtn a").eq(0).attr("carno", carno);
                            $(".vipcp font").attr("carno", carno).html(carno);
                            $(".srcar").hide().find("ul").eq(2).hide();
                            $(".srcar").hide().find("ul").eq(1).hide();
                        }
                    }
                });
                $(".srcar ul").eq(1).find("a[name=delete]").click(function () {
                    $(".srcar dl").append(values);
                });

            });
            function showKeybord() {
                $(".srcar").show().find("ul").eq(1).hide();
                $(".srcar").show().find("ul").eq(2).show();
            }


            function showProvince() {
                $(".srcar").show().find("ul").eq(2).hide();
                $(".srcar").show().find("ul").eq(1).show();
            }
            function trimStr(str) { return str.replace(/(^\s*)|(\s*$)/g, ""); }
            function getpai() {
                var pai = "";
                $(".ul_input li span").each(function () {
                    pai += $(this).text();
                });
                $("#carno").text(pai).attr("carno", pai);
                if (pai == "") {
                    $("#carno").hide();
                    $("#carno1").show();
                }
                else {
                    $("#carno").show();
                    $("#carno1").hide();
                }
            }
        </script>

        <script type="text/javascript">
            $(function () {
                var Businessurl = '/Business/Detail' + "?id=";
                var MaintainReporturl = '/CarCheck/MaintainReport' + "?reportid=";
                var s_carno = '';

                var rid = '0';
                var rcarid = '0';
                if (rid > 0)
                {
                    getcustomerinfo(rid, rcarid);
                }


                var Func = (function () {
                    var _func = {
                        TipToggle: function () {
                            $(".mask_box").toggle();
                            $("#tip").toggle();
                        },
                        BusinessToggle: function () {
                            if ($("#Business").length > 0) {
                                $(".mask_box").toggle();
                                $("#Business").toggle();
                            }
                        }
                    };
                    return _func;
                })();

                //继续开单
                $("#order").click(function () {
                    var $mobile = $.trim($("#mobile").val());
                    var $carno = $.trim($("#carno").attr("carno"));
                    var $customerName = $.trim($("#customerName").val());
                    window.location.href = "/CarCheck/AddCarCheck" + "?carno=" + $carno + "&mobile=" + $mobile + "&customerName=" + $customerName;
                });


                function fillplate(carno) {

                    for (var i = 0; i < carno.length; i++) {
                        var s = carno.substr(i, 1);
                        $(".srcar").find("ul").eq(0).find("li").eq(i).addClass("ppHas").find("span").text(s);
                    }
                    next = carno.length-1;
                }

                fillplate(s_carno);

                $("#addQuickRecord").click(function () {
                    var d = getdata();

                    if (typeof (d.customerid) == "undefined") {
                        Ewewo.Tips('请选择/添加用户!');
                        return;
                    }
                    console.log(d.mobile);
                    if (d.mobile.length <8 && d.mobile.length != 18) {
                        Ewewo.Tips('请输入11位手机号!');
                        return;
                    }
                    if (d.name.length == 0) {
                        Ewewo.Tips('请输入姓名!');
                        return;
                    }

                    if (d.plate.length == 0) {
                        Ewewo.Tips('请输入车牌号!');
                        return;
                    }
                    saveeditcustomer(d, function (data) { window.location.href = "/Service/AddQuickRecord?carno=" + d.plate + "&customerid=" + data.id + "&mobile=" + data.mobile + "&iscorrect=1&customername=" + d.name + "&carid=" + data.carid; });

                });



                //弹出层外任意位置
                $(".mask_box").click(function () {
                    if (!$("#tip").is(":hidden")) {
                        Func.TipToggle();
                    }
                    else if (!$("#Business").is(":hidden")) {
                        Func.BusinessToggle();
                    }

                });

                function getdata() {
                    var obj = new Object();
                    obj.customerid = $("#mobile").attr("selectid");
                    obj.name = $("#customerName").val();
                    obj.mobile = $("#mobile").val();
                    obj.plate = $("#carno").attr("carno");
                    obj.carid = $("#carno").attr("valueid");
                    obj.selected = obj.customerid;
                    obj.serverrecordid = 0;
                    obj.edittype = "edit";

                    if (obj.mobile == "无手机号") {
                        obj.mobile = $("#mobile").attr("mobile");
                    }


                    return obj;
                }

                //新建工单
                $("#addRecord").click(function () {
                    var d = getdata();

                    if (typeof (d.customerid) == "undefined") {
                        Ewewo.Tips('请选择/添加用户!');
                        return;
                    }
                    console.log(d.mobile);
                    if (d.mobile.length <8 && d.mobile.length != 18) {
                        Ewewo.Tips('请输入11位手机号!');
                        return;
                    }
                    if (d.name.length == 0) {
                        Ewewo.Tips('请输入姓名!');
                        return;
                    }

                    if (d.plate.length == 0) {
                        Ewewo.Tips('请输入车牌号!');
                        return;
                    }
                    saveeditcustomer(d, function (data) {window.location.href = "/Service/AddRecord?carno=" + d.plate + "&customerid=" + data.id + "&mobile=" + data.mobile + "&iscorrect=1&customername=" + d.name + "&carid=" + data.carid; });

                });

                $(document).on("click", function () {
                    $(".srcar").hide();
                })

                //商机弹出/关闭
                $("#model_business").click(function () {
                    //if ("False" == "True") {
                    Func.BusinessToggle();
                    //}
                });

                $(document).on("click", "#model_close_business", function () {
                    Func.BusinessToggle();
                })


                //顾客输入搜索
                $(document).on("input", "#search_input", function () {
                    $(this).css("color", "#555555");
                    var keyword = $.trim($(this).val());
                    var input = $(this);
                    if (keyword != "") {
                        setTimeout(function () { carcustomersearchbykeyword(keyword, input) }, 500);
                    }
                })

                function carcustomersearchbykeyword(key, input) {
                    $(".xzkh ul").empty();
                    var keyword = $.trim($(input).val());
                    if (key == keyword) {
                        $("#loading2,.xzkh").show();
                        $.ajax({
                            type: "POST",
                            data: { keyword: keyword },
                            url: "/Service/CustomerMobileFuzzySearch",
                            dataType: "json",
                            success: function (data) {
                                if (data.result.length > 0) {
                                    $(".xzkh ul").empty().show();
                                    var employeelist = '<ul>';
                                    for (var i = 0; i < data.result.length; i++) {
                                        employeelist += "<li><a href='javascript:void(0)' customerid='" + data.result[i].customerId + "' carno='" + data.result[i].carNo + "' name='" + data.result[i].name + "' mobile='" + data.result[i].mobile + "' carid='" + data.result[i].carId + "'  >" + (data.result[i].mobile.length == 18 ? "无手机号" : data.result[i].mobile) + " - " + data.result[i].name + " - " + data.result[i].carNo + "</a></li>";
                                    }
                                    employeelist += "</ul>";
                                    $("#loading2").hide();
                                    $(".xzkh").append(employeelist);

                                    $(document).one("click", function () {
                                        $(".xzkh").hide();
                                    });



                                    $(input).parent().find(".xzkh ul li a").click(function (e) {
                                        e.stopPropagation();

                                        var customerid = $(this).attr("customerid");
                                        var carno = $(this).attr("carno");
                                        var name = $(this).attr("name");
                                        var mobile = $(this).attr("mobile");
                                        var carId = $(this).attr("carid");

                                        $("#mobile").val((mobile.length == 18 ? "无手机号" : mobile)).attr("selectid", customerid).attr("mobile", mobile);
                                        $("#customerName").val(name);
                                        $("#carno").text(carno).attr("valueid", carId).attr("carno", carno);
                                        $(".xzkh ul").empty().hide();
                                        $(".xzkh").hide();
                                        //$("#addcustomernew").attr("unclick", "1").attr("style", "background: #999;")
                                        getcustomerinfo(customerid, carId);
                                        fillplate(carno);
                                        getvipinfo(customerid, carId);
                                    });

                                } else {
                                    $(".xzkh").hide();
                                    //  $("#addcustomernew").attr("unclick", "0").attr("style", "")
                                }

                            },
                            error: function () {
                                Ewewo.Tips_Error('网络错误,获取数据不成功!');
                            }
                        });
                    }
                    else {
                        $(".loading2").show();


                        $(".search_fruit ul").empty().hide();

                        $(".loading2").hide();
                    }
                }

                function getcustomerinfo(customerid, carid) {

                    $.ajax({
                        type: "POST",
                        data: { customerid: customerid, carid: carid },
                        url: "/home/CustomerBusinessAndLastCheckTime",
                        dataType: "json",
                        success: function (data) {
                            if (data != null && data.pmr != null) {
                                var str = '';
                                $("#lasttime").val((data.pmr.Fault == null ? "" : data.pmr.Fault));
                                if (data.pmr != null && data.csi != null && data.pmr.BeforeScore != null) {
                                    str = '<a href="' + MaintainReporturl + data.pmr.Id+'&customerstoreitemid=' + data.csi.Id +'" class="carmore"><font>上次检查分数</font><span id="" style="color:#ff6600;">' + data.pmr.BeforeScore + '分</span> </a>'
                                } else {
                                    str = '<font>上次检查分数</font><span>-</span>';
                                }
                                $("li[name=lastscore]").html(str);

                                var bslist = '';
                                if (data.bslist.length > 0) {

                                    bslist += '<h2><a href="javascript:" id="model_close_business"></a>商机</h2>';
                                    var s = 0;
                                    $.each(data.bslist, function (i, e) {
                                        if (e.CustomerName != "成交" && e.CustomerName != "输单") {
                                            if (e.typeid=="2") {
                                                bslist += '<a id="model_business" href="' + MaintainReporturl + e.Id + '">';
                                            }
                                            else {
                                                bslist += '<a id="model_business" href="' + Businessurl + e.Id + '">';
                                            }

                                            bslist += ' <ul><li><font>¥' + e.Money + '</font>[' + e.CarNo + ']' + e.ProjectName + '<span>(' + (e.CustomerName || "") + ')</span> </li>'
                                            bslist += '<li class="tw"><i>所有者：' + (e.OwnerName == null ? "-" : e.OwnerName) + '</i>预计成单时间：' + (e.EstimatePayTime || "-") + '</li></ul></a>';
                                            s++;
                                        }

                                    })

                                    $("#model_business").children("span").text(s + "个");

                                }
                                $("#Business").html(bslist);

                            }
                        },
                        error: function (data) {
                            if (data.status == 401) {
                                Ewewo.Tips_Error(data.responseText);
                            }
                            else {
                                Ewewo.Tips_Error('网络错误,保存失败!');
                            }
                        }
                    });

                }

                function saveeditcustomer(d,success)    {
                    $.ajax({
                        type: "POST",
                        data: { strdata: JSON.stringify(d) },
                        url: "/Service/ecsave",
                        beforSend: function () { masklayer(0, "加载中..."); },
                        complete: function () { masklayer(1, "加载中..."); },
                        dataType: "json",
                        success: function (data) {
                            if (data.result == 'T') {
                                if(success)
                                    success(data);
                            }
                            else {

                                Ewewo.Tips_Error(data.message);
                            }
                        },
                        error: function (data) {
                            if (data.status == 401) {
                                Ewewo.Tips_Error(data.responseText);
                            }
                            else {
                                Ewewo.Tips_Error('网络错误,保存失败!');
                            }
                        }
                    });
                }


                //点击新建顾客
                $(document).on("click", "#addcustomernew", function () {

                    var v = $("#search_input").val().trim();
                    v = (v.length == 0 ? "无手机号" : v);
                    var v1 = "";

                    for (var i = 0; i < 18; i++) {
                        v1 += (Math.round(Math.random() * 10) + "");
                    }
                    if (v1.length > 18) {
                        v1 = v1.substr(0, 18);
                    }

                    var ismobile = Ewewo.IsMobileOrCarNo(v);
                    if (v == "无手机号") {
                        ismobile = 1;
                    }
                    if (ismobile==1) {
                        console.log("1");
                        $("#mobile").val(v).attr("selectid", "-1").attr("mobile", v1);
                        $("#customerName").val("");
                        $("#carno").text("").removeAttr("valueid").attr("carno", "");
                        $("#carno1").text("").removeAttr("valueid").attr("carno", "");
                    } else if(ismobile==2) {
                        $("#mobile").val("").attr("selectid", "-1").attr("mobile", v1);
                        $("#customerName").val("");
                        $("#carno").text(v).removeAttr("valueid").attr("carno", v);
                        $("#carno1").text(v).removeAttr("valueid").attr("carno", v);
                        $(".car_input").attr("data-pai", v);
                        fillplate(v);
                    }else{
                        $("#mobile").val("").attr("selectid", "-1").attr("mobile", v1);
                        $("#customerName").val(v);
                        $("#carno").text("").removeAttr("valueid").attr("carno", "");
                        $("#carno1").text("").removeAttr("valueid").attr("carno", "");
                    }

                    getcustomerinfo(0, 0);


                })

                $(document).on("input", "#mobile", function () {
                    var v = $(this).val();
                    if (v.length == 0) {
                        $(this).next(".xzkh1").show();
                    } else {
                        $(this).next(".xzkh1").hide();
                    }
                })

                $(document).on("focus", "#mobile", function () {
                    var v = $(this).val();
                    if (v.length == 0) {
                        $(this).next(".xzkh1").show();
                    } else {
                        $(this).next(".xzkh1").hide();
                    }
                })

                $(document).on("blur", "#mobile", function () {
                    setTimeout(function () { $("#mobile").next(".xzkh1").hide(); }, 200);
                })

                $(document).on("click", "#nomobilediv", function () {
                    var v1 = "";

                    for (var i = 0; i < 18; i++) {
                        v1 += (Math.round(Math.random() * 10) + "");
                    }
                    if (v1.length > 18) {
                        v1 = v1.substr(0, 18);
                    }
                    $("#mobile").val("无手机号").attr("mobile", v1);
                    $(this).parent().hide();
                })


                $("#openbill").click(function () {
                    var d = getdata();

                    if (typeof (d.customerid) == "undefined") {
                        Ewewo.Tips('请选择/添加用户!');
                        return;
                    }
                    console.log(d.mobile);
                    if (d.mobile.length <8 && d.mobile.length != 18) {
                        Ewewo.Tips('请输入11位手机号!');
                        return;
                    }
                    if (d.name.length == 0) {
                        Ewewo.Tips('请输入姓名!');
                        return;
                    }

                    if (d.plate.length == 0) {
                        Ewewo.Tips('请输入车牌号!');
                        return;
                    }

                    saveeditcustomer(d, function (data) {
                        var servicerecord = new Object();
                        servicerecord.CarId = data.carid;
                        servicerecord.CustomerId = data.id;
                        servicerecord.CustomerName = data.customername;
                        servicerecord.CustomerMobile = data.mobile;
                        servicerecord.CarNo = data.plate;

                        $.ajax({
                            type: "POST",
                            data: { servicerecordjson: JSON.stringify(servicerecord), recognitionid: 0 },
                            url: "/Home/WorkShopJieCheOpenServiceRecord",
                            beforSend: function () { masklayer(0, "加载中..."); },
                            complete: function () { masklayer(1, "加载中..."); },
                            dataType: "json",
                            success: function (data) {
                                if (data.IsSuccess) {
                                    Ewewo.Tips_Success("开单成功");
                                    window.location.href = "/Service/QuickDetail/" + data.Data
                                }
                                else {
                                    if (data.Message) {
                                        Ewewo.Tips_Error(data.Message);
                                    }
                                    else {
                                        Ewewo.Tips_Error("开单失败");
                                    }
                                }
                            },
                            error: function (data) {
                                if (data.status == 401) {
                                    Ewewo.Tips_Error(data.responseText);
                                }
                                else {
                                    Ewewo.Tips_Error('网络错误,保存失败!');
                                }
                            }
                        });
                    });
                });
            });

            $("#viprechargecard").click(function () {
                $("#viprechargecardbox,.mask_box").show();
            });
            $("#vippackage").click(function () {
                $("#vippackagebox,.mask_box").show();
            });
            $("#closeviprechargecardbox").click(function () {
                $("#viprechargecardbox,.mask_box").hide();
            });
            $("#closepackagebox").click(function () {
                $("#vippackagebox,.mask_box").hide();
            });

            function getvipinfo(customerid, carid) {
                $.ajax({
                    type: "POST",
                    data: { customerid: customerid, carid: carid },
                    url: "/Service/GetVipInfo",
                    dataType: "json",
                    success: function (data) {
                        $("#vippackagelist,#viprechargecardlist").empty();
                        $("#spvippackage").text(data.timespackage.length + "个");
                        $("#spviprechargecard").text(data.card.length + "个");
                        if (data.isvip==true) {
                            $("#vipimg").show();
                        }
                        else {
                            $("#vipimg").hide();
                        }
                        for (var i = 0; i < data.timespackage.length; i++) {
                            $("#vippackagelist").append('<ul><li style="height:auto; padding-bottom:5px;"><font>' + (data.timespackage[i].IsLimitTimes == true ? ("消费" + (data.timespackage[i].TotalTimes - data.timespackage[i].RemaindTimes) + "次") : "") + '/剩余' + (data.timespackage[i].IsLimitTimes == true ? data.timespackage[i].RemaindTimes : "不限") + '次</font>' + data.timespackage[i].Name + '<span>(' + (data.timespackage[i].LabourProjectId != null && data.timespackage[i].LabourProjectId > 0 ? "工时" : "配件") +')</span></li></ul>');
                        }
                        for (var i = 0; i < data.card.length; i++) {
                            $("#viprechargecardlist").append('<ul>'+
                                '<li><font>¥'+data.card[i].Amount+'</font>'+data.card[i].TemplateName+'<span>('+data.card[i].CardNo+')</span></li>'+
                                '<li class="tw"><i>到期时间：' + (data.card[i].ExpirationDate == null ? "长期有效" : ChangeDateFormat(data.card[i].ExpirationDate)) + '</i>开卡时间：' + ChangeDateFormat(data.card[i].OpenCardTime) +'</li>'+
                                '</ul>');
                        }
                    },
                    error: function (data) {
                        if (data.status == 401) {
                            Ewewo.Tips_Error(data.responseText);
                        }
                        else {
                            Ewewo.Tips_Error('网络错误,保存失败!');
                        }
                    }
                });
            }

            function ChangeDateFormat(jsondate) {
                if (jsondate == "" || jsondate == null) {
                    return "";
                }
                jsondate = jsondate.replace("/Date(", "").replace(")/", "");
                if (jsondate.indexOf("+") > 0) {
                    jsondate = jsondate.substring(0, jsondate.indexOf("+"));
                }
                else if (jsondate.indexOf("-") > 0) {
                    jsondate = jsondate.substring(0, jsondate.indexOf("-"));
                }

                var date = new Date(parseInt(jsondate, 10));
                var month = date.getMonth() + 1 < 10 ? "0" + (date.getMonth() + 1) : date.getMonth() + 1;
                var currentDate = date.getDate() < 10 ? "0" + date.getDate() : date.getDate();
                return date.getFullYear() + "-" + month + "-" + currentDate;
            }
        </script>
    </body>
</html>