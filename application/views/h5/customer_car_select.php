<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>选择客户</title>
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

    <script type="text/javascript">
        var resource_url = 'http://res.ewewo.com';
        var carmodel_url = '/Service/CarModelList';
    </script>

    <script type="text/javascript" src="/Service/brandscripts"></script>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/addcar.js"></script>

    <div id="addcarinfo">
        <div class="title">

            <a href="javascript:;" class="sure">确定</a>
            <ul class="sytime">
                车辆信息
            </ul>
        </div>
        <div class="car">
            <input type="hidden" id="modelsourceid" name="modelsourceid" value="" />
            <ul id="select-car-info">
                <li id="select_car_brand"><a href="javascript:;" class="carmore" lang="show" itemid="0"><font>品牌</font><span>请选择</span></a></li>
                <li id="select_car_line"><a href="javascript:;" class="carmore" lang="show" itemid="0"><font>车系</font><span>请选择</span></a></li>
                <li id="select_car_year"><a href="javascript:;" class="carmore" lang="show" itemid="0"><font>车型年款</font><span>请选择</span></a></li>
                <li id="select_car_kuan"><a href="javascript:;" class="carmore" lang="show" itemid="0"><font>车型</font><span vehicleName="">请选择</span></a></li>
                <li>
                    <font>VIN码</font><span>
                        <input type="text" class="carinput" id="vin_one" style="color: rgb(51, 51, 51);">
                        <a href="javascript:;" id="VINAI_one" style="position: absolute;right: 10px;margin-top: 12px;">
                            <img src="/Content/Images/sys.png" />
                        </a>
                    </span>
                </li>
                <li>
                    <a href="javascript:;" class="nofind" id="btn_sync">同步车型</a>
                </li>
            </ul>
            <ul style="display:none" id="type-car-info">
                <li>
                    <font>品牌</font><span>
                        <input type="text" class="carinput" name="brandname" />
                    </span>
                </li>
                <li>
                    <font>车系</font><span>
                        <input type="text" class="carinput" name="linename" />
                    </span>
                </li>
                <li>
                    <font>车型年款</font><span>
                        <input type="text" class="carinput" name="caryear" id="txtcaryear" />
                    </span>
                </li>
                <li>
                    <font>车型</font><span>
                        <input type="text" class="carinput" name="carkuanname" vehicleName="" />
                    </span>
                </li>
                <li>
                    <font>VIN码</font>
                    <span>
                        <input type="text" class="carinput" id="vin_two" name="vin" />
                        <a href="javascript:;" id="VINAI_two" style="position: absolute;right: 10px;margin-top: 12px;">
                            <img src="/Content/Images/sys.png" />
                        </a>
                    </span>
                </li>
                <input type="hidden" id="textcarprice" />
                <li>
                    <a href="javascript:;" class="nofind" id="btn_sync">同步车型</a>
                </li>

            </ul>
        </div>
    </div>
    <!--品牌弹出层开始-->
    <div class="mask" id="window_brand" style="display: none; top: 540px;">
        <div class="chexing_menu" id="letter_list">
        </div>
        <div class="title">
            <a href="javascript:;" lang="window_brand" class="sure">确定</a>
            <ul class="sytime">
                选择车辆品牌
            </ul>
        </div>

        <div class="chexing" id="brand_list">
        </div>
    </div>
    <!--品牌弹出层结束-->
    <!--车系弹出层开始-->
    <div id="window_carline" style="display: none; top: 540px;">
        <div class="title">
            <a href="javascript:;" id="back_carline" class="back">返回</a>
            <a href="javascript:;" lang="window_carline" class="sure">确定</a>
            <ul class="sytime">
                选择车系
            </ul>
        </div>
        <div class="cxxz_title">
            <font>已选车型：</font>
        </div>
        <div class="chexi window-chexi-parent">
        </div>
    </div>
    <!--车系弹出层结束-->
    <!--车型年款弹出层开始-->
    <div id="window_caryear" style="display: none; top: 540px;">
        <div class="title">
            <a href="javascript:;" id="back_caryear" class="back">返回</a>
            <a href="javascript:;" lang="window_caryear" class="sure">确定</a>
            <ul class="sytime">
                选择车型年款
            </ul>
        </div>
        <div class="cxxz_title">
            <font>已选车型：</font>
        </div>
        <div class="chexi" style="border-top: 1px #dcdcdc solid;">
            <ul id="caryear_list"></ul>
        </div>
    </div>
    <!--车型年款弹出层结束-->
    <!--车型弹出层开始-->
    <div id="window_carkuan" style="display: none; top: 540px;">
        <div class="title">
            <a href="javascript:;" id="back_carkuan" class="back">返回</a>
            <a href="javascript:;" lang="window_carkuan" class="sure">确定</a>
            <ul class="sytime">
                选择车型
            </ul>
        </div>
        <div class="cxxz_title">
            <font>已选车型：</font>
        </div>
        <div class="chexi" style="border-top: 1px #dcdcdc solid;">
            <ul class="car4" id="carkuan_list"></ul>
        </div>
    </div>
    <!--车型弹出层结束-->

    <script type="text/javascript">
        $("#txtcaryear").on("input", function () {
            var year = $.trim($(this).val().replace("请填写", ""));
            if (year != "" && isNaN(year)) {
                Ewewo.Tips('车型年款请输入数字');
                $(this).val("");
                return;
            }
        });
        $('.carinput').placeholder({
            word: '请填写'
        });
        $("#addcarinfo").find(".title .sure").click(function () {

            var textcarprice = $.trim($("#textcarprice").val());
            if ($("#select-car-info").is(':visible')) {
                var brandid = $('#select_car_brand a[lang=show]').attr('itemid');
                var brandname = $('#select_car_brand a[lang=show]').find("span").text().replace("请选择", "");
                var lineid = $('#select_car_line a[lang=show]').attr('itemid');
                var linename = $('#select_car_line a[lang=show]').find("span").text().replace("请选择", "");
                var yearid = $('#select_car_year a[lang=show]').attr('itemid');
                var yearname = $('#select_car_year a[lang=show]').find("span").text().replace("请选择", "");
                var kuanid = $('#select_car_kuan a[lang=show]').attr('itemid');
                var kuanname = $('#select_car_kuan a[lang=show]').find("span").attr("vehicleName").replace("请选择", "");
                var vin = $("#vin_one").val().replace("请填写", "");
                var modelsourceid = 0;
                if (parseInt(brandid) > 0) {
                    modelsourceid = 1;
                }
                if (brandname != '' || linename != '' || yearname != '' || kuanname != '') {
                    $(".fwadd_car dd").eq(1).find('a').css("background", "none").find("font")
                        .attr("brand", brandid).attr("line", lineid)
                        .attr("modelyear", yearid).attr("model", kuanid)
                        .attr("brandname", brandname).attr("linename", linename)
                        .attr("modelyearname", yearname).attr("modelname", kuanname).attr("vin", vin).attr("modelsourceid", modelsourceid).attr("vin", $("#vin_one").val())
                        .attr("price", textcarprice)
                        .html(brandname + "  " + linename + "  " + yearname + "  " + kuanname);
                }
                else {
                    $(".fwadd_car dd").eq(1).find('a').removeAttr("style");
                }
                maskshow(1);
            }
            else {
                var brandid = $('#select_car_brand a[lang=show]').attr('itemid');
                var brandname = $('#select_car_brand a[lang=show]').find("span").text().replace("请选择", "");
                var lineid = $('#select_car_line a[lang=show]').attr('itemid');
                var linename = $('#select_car_line a[lang=show]').find("span").text().replace("请选择", "");
                var yearid = $('#select_car_year a[lang=show]').attr('itemid');
                var yearname = $('#select_car_year a[lang=show]').find("span").text().replace("请选择", "");
                var kuanid = $('#select_car_kuan a[lang=show]').attr('itemid');
                var kuanname = $('#select_car_kuan a[lang=show]').find("span").attr("vehicleName").replace("请选择", "");
                var modelsourceid = 0;
                if (parseInt(brandid) > 0) {
                    modelsourceid = 1;
                }
                if (brandname != '' || linename != '' || yearname != '' || kuanname != '') {
                    $(".fwadd_car dd").eq(1).find('a').css("background", "none").find("font")
                        .attr("brand", brandid).attr("line", lineid)
                        .attr("modelyear", yearid).attr("model", kuanid)
                        .attr("brandname", brandname).attr("linename", linename)
                        .attr("modelyearname", yearname).attr("modelname", kuanname).attr("modelsourceid", modelsourceid).attr("vin", $("#vin_two").val())
                        .attr("price", textcarprice)
                        .html(brandname + "  " + linename + "  " + yearname + "  " + kuanname);
                }
                else {
                    $(".fwadd_car dd").eq(1).find('a').removeAttr("style");
                }
                maskshow(1);
            }
        });
        $("#vin_one,#vin_two").bind("input", function () {
            if ($("#select-car-info").is(':visible')) {
                $("#txtvin").val($("#vin_one").val());
                $("[name=vin]").val($("#vin_one").val())
            }
            else {
                $("#txtvin").val($("[name=vin]").val());
                $("#vin_one").val($("[name=vin]").val())
            }
            $("#txtvin").val($(this).val());
            $("#vin_one").val($(this).val())
            $("#vin_two").val($(this).val())
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $("#VINAI_one,#VINAI_two,#VINAI_three").hide();
        });
    </script>

</body>
</html>