<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>编辑客户资料</title>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/jquery-1.8.2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>statics/h5/css/index.css?v=20161115">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>statics/h5/css/style.css?v=20181229141316">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>statics/h5/css/simple.css?v=1">
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/androidviewport.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/common.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/jquery.simplemodal.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/placeholder.js"></script>

    <link href="<?php echo base_url()?>statics/h5/css/mobiscroll.icons.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>statics/h5/css/mobiscroll.scroller.android.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>statics/h5/css/mobiscroll.scroller.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/mobiscroll.core.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/mobiscroll.datetime.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/mobiscroll.i18n.zh.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/mobiscroll.scroller.android.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/mobiscroll.scroller.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/mobiscroll.select.js"></script>
    <script type="text/javascript">
        adaptUILayout.adapt(720);
    </script>
    <meta name="viewport" content="target-densitydpi=device-dpi, width=720px, user-scalable=no">
</head>
<body>
    <div class="mask_box" style="display: none;" id="mask1">&nbsp;</div>
    <div class="car_box" style="display: none;" id="asex">
        <ul id="ulsex">
            <li><a href="javascript:void(0);" itemid="1">男</a></li>
            <li><a href="javascript:void(0);" itemid="0">女</a></li>
        </ul>
    </div>
    <div class="mask_box" style="display: none;" id="mask2">&nbsp;</div>
    <div class="car_box" style="margin-top: -165px; display: none;" id="asource">
        <ul id="ulsource">
            <li><a href="javascript:void(0)" itemid="329" class="">直接到店</a></li>
            <li><a href="javascript:void(0)" itemid="1352" class="">网络平台</a></li>
            <li><a href="javascript:void(0)" itemid="2375" class="">客户介绍</a></li>
            <li><a href="javascript:void(0)" itemid="3398" class="">商家联盟</a></li>
            <li><a href="javascript:void(0)" itemid="4421" class="">其它</a></li>

        </ul>
    </div>

    <div class="system">
        <div class="title">
            <a href="javascript:history.back(-1);" class="back">返回</a>
            <a href="javascript:void(0);" class="sure" id="btnsave">保存</a>
            <ul class="sytime">编辑客户资料</ul>
        </div>
        <div class="my_edit">
            <ul>
                <li class="txedit">
                    <font>上传头像</font>
                    <input type="file" name="fileField" id="txtfileupload" style="display: none"><a href="javascript:;" style="float: left; height: 120px;" id="aupload">
                        <img id="imghead" src="<?php echo base_url()?>statics/h5/images/nohead.jpg" width="120" height="120" style="border-radius:70px;">
                    </a>
                </li>
                <li>
                    <font>姓名</font><span>
                        <input type="text" class="carinput" value="贾真人" id="txtusername">
                    </span>
                </li>
                <li><a href="javascript:void(0);" id="asexchoose"><font>性别</font><span id="spsex" itemid="">请选择</span></a></li>
                <li>
                    <font>联系方式</font><span>
                        <input type="text" class="carinput" mobile="15057725702" value="15057725702" id="txtmobile">
                    </span>
                </li>

                <li><a href="javascript:void(0);" id="achoosesource"><font>客户来源</font><span id="spsource" itemid="1">直接到店</span></a></li>
                <li>
                    <font>生日</font><span>
                        <input type="text" class="carinput" value="" id="txtbirthday" readonly="">
                    </span>
                </li>
                <li>
                    <font>地址</font><span>
                        <input type="text" class="carinput" onblur="if(!value){value=defaultValue;}" value="" id="txtaddress">
                    </span>
                </li>
                <input type="hidden" id="txtvipid" value="0">
                <li>
                    <font>建档时间</font><span>
                        <input type="text" class="carinput" value="2018-12-27" id="txtdoccreatetime" readonly="">
                    </span>
                </li>

            </ul>
        </div>

        <div style="padding-top: 120px;"></div>
    </div>

    <script type="text/javascript">
        $(function () {

            $(document).bind("click", function (e) {
                var target = $(e.target);

                if (target.closest("#asex").length == 0 && target.closest("#asexchoose").length == 0) {
                    $("#mask1").hide();
                    $("#asex").hide();
                }
                if (target.closest("#asource").length == 0 && target.closest("#achoosesource").length == 0) {
                    $("#mask2").hide();
                    $("#asource").hide();
                }
            })

            $("#asexchoose").click(function () {
                $("#mask1").show();
                $("#asex").show();
            })

            $("#ulsex li a").each(function () {
                $(this).click(function () {
                    $("#spsex").attr("itemid", $(this).attr("itemid"));
                    $("#spsex").text($(this).text());
                    $("#mask1").hide();
                    $("#asex").hide();
                })

            })

            $("#achoosesource").click(function () {
                $("#mask2").show();
                $("#asource").show();
            })

            $("#ulsource li a").each(function () {
                $(this).click(function () {
                    $("#ulsource li a").removeClass("carxz");
                    $("#spsource").attr("itemid", $(this).attr("itemid"));
                    $("#spsource").text($(this).text());
                    $(this).addClass("carxz");
                    $("#mask2").hide();
                    $("#asource").hide();
                })
            })

            //日历
            var opt_data = {
                preset: 'date', //日期
                theme: 'android', //皮肤样式
                display: 'modal', //显示方式
                mode: 'clickpick', //日期选择模式
                dateFormat: 'yy-mm-dd', // 日期格式
                setText: '确定', //确认按钮名称
                cancelText: '取消',//取消按钮名籍我
                dateOrder: 'yymmdd', //面板中日期排列格式
                yearText: '年', monthText: '月', dayText: '日',  //面板中年月日文字
                endYear: 2030, //结束年份
                showNow: true,
                nowText: '今天',
                hourText: '小时',
                minuteText: '分',
                timeWheels: 'HHii',
                timeFormat: 'HH:ii'
            };
            $("#txtdoccreatetime").mobiscroll(opt_data);

            $('#txtbirthday').click(
                function () {
                    var txtbirthday = $("#txtbirthday").val();
                }).mobiscroll(opt_data);

            $("#btnsave").click(function () {
                if (check() == false) {
                    return;
                }
                var customerid = '2340187';
                var img = $("#imghead").attr("src");

                var resoururl = "http://res.ewewo.com";
                var headimg = img.replace(resoururl, "");

                if (img.replace(resoururl, "") == "/Content/images/nohead.jpg") {
                    headimg = "";
                }
                var username = $.trim($("#txtusername").val());

                var mobile = $.trim($("#txtmobile").val());
                var phone = $.trim($("#txtmobile").attr("mobile"));
                if (mobile == "无手机号" && phone != "") {
                    mobile = phone;
                }
                var sexint = $("#spsex").attr("itemid");
                var sex = null;
                if (sexint == "1") {
                    sex = true;
                }
                else if (sexint == "0") {
                    sex = false;
                }

                var customerSourceId = $("#spsource").attr("itemid");
                var birthday = $.trim($("#txtbirthday").val());
                var address = $.trim($("#txtaddress").val());
                var doccreatetime = $.trim($("#txtdoccreatetime").val());

                //开票信息
                //var Invoicetitle = $.trim($("#txtInvoicetitle").val());
                //var Invoicetaxpayerid = $.trim($("#txtInvoicetaxpayerid").val());
                //var Invoiceaddress = $.trim($("#txtInvoiceaddress").val());
                //var Invoicetel = $.trim($("#txtInvoicetel").val());
                //var Invoicebank = $.trim($("#txtInvoicebank").val());
                //var Invoicebankaccount = $.trim($("#txtInvoicebankaccount").val());

                $.ajax({
                    type: "POST",
                    data: { customerId: customerid, sex: sex, mobile: mobile, customerSourceId: customerSourceId, birthday: birthday, address: address, username: username, img: headimg, doccreatetime: doccreatetime },
                    url: "/Customer/ModifyCoustomer",
                    dataType: "json",
                    success: function (data) {
                        if (data.result == 'T') {
                            Ewewo.Tips_Success('个人资料保存成功!');
                            window.location.href = "/Customer/Detail/" + data.returnId;
                        }
                        else if (data.result == 'E') {
                            Ewewo.Tips('手机号码(' + mobile + ')已存在!');
                        }
                        else {
                            Ewewo.Tips_Error('个人资料保存不成功!');
                        }
                    },
                    error: function (data) {
                        if (data.status == 401) {
                            Ewewo.Tips_Error(data.responseText);
                        }
                        else {
                            Ewewo.Tips_Error("网络错误,保存不成功!");
                        }
                    }
                });

            });

            function check() {
                var username = $.trim($("#txtusername").val());
                if (username == "") {
                    Ewewo.Tips('请输入姓名');
                    return;
                }
                var mobile = $.trim($("#txtmobile").val());
                if (mobile == "") {
                    Ewewo.Tips('请输入联系方式');
                    return false;
                }
                else if (isNaN(mobile) && mobile != "无手机号") {
                    Ewewo.Tips('联系方式请输入11位数字');
                    return false;
                }
                else if (mobile.length != 11 && mobile != "无手机号") {
                    Ewewo.Tips('联系方式请输入11位数字');
                    return false;
                }
                return true;
            }

            $("#aupload").click(function () {
                $("#txtfileupload").click();
                $("#txtfileupload").change(function () {
                    if ($("#txtfileupload")[0].files.length > 0) {
                        upladfile();
                    }
                });
            })



            function upladfile() {
                var files = $("#txtfileupload")[0].files;
                var resroot = "http://res.ewewo.com";
                var FileController = "/Common/UploadImage";
                var form = new FormData();

                for (var i = 0; i < files.length; i++) {
                    form.append("file", files[i]);
                }
                var xhr = new XMLHttpRequest();
                xhr.open("post", FileController, true);
                xhr.onload = function () {
                    if (xhr.status == 200) {
                        var json = eval("(" + xhr.responseText + ")");
                        if (json.result == "T") {
                            if (json.images.length == 1) {
                                var url = json.images[0].url;
                                $("#imghead").attr("src", url);
                            }
                        }
                    }
                };
                xhr.send(form);
            }
        })
    </script>

</body>
</html>