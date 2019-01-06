
$(function () {
    $('.carinput').placeholder({
        word: '请填写'
    });
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
    $('#txtbuydate,#txtinsuranceexpires,#txtannualdue,#txtnextmaintenancetime,#txtforceexpiredate,#txtinsuranceexpires').click(
        function () {
            var txtopencartime = $("#txtopencartime").val();
            var txtbirthday = $("#txtbirthday").val();
        }).mobiscroll(opt_data);
    $("#bodyappearance").click(function () {

        $(".mask_box,#selectbodyappearance").show();
        var appearance = $(this).attr("itemid");
        $("#selectbodyappearance li a").removeClass("carxz");
        $("#selectbodyappearance li a[itemid=" + appearance + "]").addClass("carxz");
        mask_box("#selectbodyappearance");
    });
    $("#remaining").click(function () {

        $(".mask_box,#selectremaining").show();
        var remainingid = $(this).attr("itemid");
        $("#selectremaining li a").removeClass("carxz");
        $("#selectremaining li a[itemid='" + remainingid + "']").addClass("carxz");
        mask_box("#selectremaining");
    });
    $("#selectbodyappearance li a").each(function () {
        $(this).click(function () {
            $("#selectbodyappearance li a").removeClass("carxz");
            $("#bodyappearance").attr("itemid", $(this).attr("itemid")).find("span").text($(this).text());
            $(this).addClass("carxz");
            $(".mask_box,#selectbodyappearance").hide();
        });

    });
    $("#selectremaining li a").each(function () {
        $(this).click(function () {
            $("#selectremaining li a").removeClass("carxz");
            $("#remaining").attr("itemid", $(this).attr("itemid")).find("span").text($(this).text());
            $(this).addClass("carxz");
            $(".mask_box,#selectremaining").hide();
        });

    });
    $("#txtnextmaintenancemileage").on("input", function () {
        var sum = $.trim($(this).val().replace("请填写", ""));
        if (sum != "" && isNaN(sum)) {
            Ewewo.Tips('建议保养里程请输入数值');
            $(this).val("");
            return;
        }
    });
    $("#txtcaryear").on("input", function () {
        var sum = $.trim($(this).val().replace("请填写", ""));
        if (sum != "" && isNaN(sum)) {
            Ewewo.Tips('年款请输入数值');
            $(this).val("");
            return;
        }
    });
    $("#txtmileage").on("input", function () {
        var sum = $.trim($(this).val().replace("请填写", ""));
        if (sum != "" && isNaN(sum)) {
            Ewewo.Tips('行驶里程请输入数值');
            $(this).val("");
            return;
        }
    });
    $("#addcarinfo").find(".sure").click(function () {
        var temp = { id: 0, customerid: null, username: "", usercard: "", caraddress: "", carcolor: "", carprices: 0.00, vehicletype: "", usingnaturetype: "", carnote: "", carno: "", brandid: null, custombrand: "", carlineid: null, customline: "", modelyear: null, modelid: null, custommodel: "", buytime: null, mileage: null, enginenumber: "", nextmaintenancemileage: null, insurecompany: "", vin: "", nextmaintenancetime: null, insuranceexpires: null, annualdue: null, cardetail: null };
        var txtcarplate = $.trim($("#txtcarplate").val().replace("请填写", ""));
        var txtbuydate = $.trim($("#txtbuydate").val().replace("请选择", ""));
        var txtmileage = $.trim($("#txtmileage").val().replace("请填写", ""));
        var txtenginenumber = $.trim($("#txtenginenumber").val().replace("请填写", ""));
        var txtvin = $.trim($("#txtvin").val().replace("请填写", ""));
        var txtinsurecompany = $.trim($("#txtinsurecompany").val().replace("请填写", ""));
        var txtinsuranceexpires = $.trim($("#txtinsuranceexpires").val().replace("请选择", "").replace("请填写", ""));
        var txtannualdue = $.trim($("#txtannualdue").val().replace("请选择", ""));
        var txtnextmaintenancetime = $.trim($("#txtnextmaintenancetime").val().replace("请选择", ""));
        var txtnextmaintenancemileage = $.trim($("#txtnextmaintenancemileage").val().replace("请填写", ""));
        var brandid = 0, brandname, lineid = 0, linename, yearname, kuanid = 0, kuanname, yearid = 0;
        if ($("#select-car-info").is(':visible')) {
            brandid = $('#select_car_brand a[lang=show]').attr('itemid');
            brandname = $('#select_car_brand a[lang=show]').find("span").text().replace("请选择", "");
            lineid = $('#select_car_line a[lang=show]').attr('itemid');
            linename = $('#select_car_line a[lang=show]').find("span").text().replace("请选择", "");
            yearid = $('#select_car_year a[lang=show]').attr('itemid');
            yearname = $('#select_car_year a[lang=show]').find("span").text().replace("请选择", "");
            kuanid = $('#select_car_kuan a[lang=show]').attr('itemid');
            kuanname = $('#select_car_kuan a[lang=show]').find("span").attr("vehicleName").replace("请选择", "");
        }
        else {
            brandname = $("input[name=brandname]").val().replace("请填写", "");
            linename = $("input[name=linename]").val().replace("请填写", "");
            yearname = $("input[name=caryear]").val().replace("请填写", "");
            kuanname = $("input[name=carkuanname]").val().replace("请填写", "");

            if ($("input[name=brandname]").attr("valueid") > 0) {
                brandid = $("input[name=brandname]").attr("valueid");
                brandname = $("input[name=brandname]").val();
                lineid = $("input[name=linename]").attr("valueid");
                linename = $("input[name=linename]").val();
                // yearid = $('#txtcaryear]').attr('valueid');
                yearname = $('#txtcaryear').val();
                kuanid = $('input[name=carkuanname]').attr('valueid');
                kuanname = $('input[name=carkuanname]').val();
            }
        }




        temp.carno = txtcarplate;
        if (temp.carno == "") {
            Ewewo.Tips('请输入车牌!');
            return;
        }
        temp.buytime = txtbuydate;
        if (brandid == 0) {
            temp.brandid = null;
        }
        else {
            temp.brandid = brandid;
            temp.modelsourceid = 1;
        }
        temp.custombrand = brandname;
        if (lineid == 0) {
            temp.carlineid = null;
        }
        else {
            temp.carlineid = lineid;
        }
        temp.customline = linename;
        if (yearid == 0) {
            temp.modelyear = yearname;
        }
        else {
            temp.modelyear = yearid;
        }
        if (kuanid == 0) {
            temp.modelid = null;
        }
        else {
            temp.modelid = kuanid;
        }
        temp.custommodel = kuanname;
        var mileage = txtmileage;
        temp.mileage = mileage;
        temp.enginenumber = txtenginenumber;
        temp.nextmaintenancemileage = txtnextmaintenancemileage;
        temp.insurecompany = txtinsurecompany;
        temp.vin = txtvin;
        temp.nextmaintenancetime = txtnextmaintenancetime;
        temp.insuranceexpires = txtinsuranceexpires;
        temp.annualdue = txtannualdue;
        temp.id = $("#addcarinfo").attr("itemid");
        temp.customerid = parseInt($("#addcarinfo").attr("customerid"));
        temp.selectid = $.trim($("#txtcarplate").attr("selectid"));



        temp.username = $.trim($("#txtusername").val()).replace("请选择", "").replace("请填写", "");
        temp.usercard = $.trim($("#txtusercard").val()).replace("请选择", "").replace("请填写", "");
        temp.caraddress = $.trim($("#txtcaraddress").val()).replace("请选择", "").replace("请填写", "");
        temp.carcolor = $.trim($("#txtcarcolor").val()).replace("请选择", "").replace("请填写", "");
        temp.carprices = $.trim($("#txtcarprices").val()).replace("请选择", "").replace("请填写", "");
        temp.vehicletype = ($("#txtvehicletype").val()).replace("请选择", "").replace("请填写", "");
        temp.usingnaturetype = ($("#txtusingnaturetype").val()).replace("请选择", "").replace("请填写", "");
        temp.carnote = $.trim($("#txtcarnote").val()).replace("请选择", "").replace("请填写", "");

        var cd = new Object();
        cd.ownermobile = ($("#txtownermobile").val()).replace("请选择", "").replace("请填写", "");
        cd.sendman = ($("#txtsendman").val()).replace("请选择", "").replace("请填写", "");

        cd.sendmanmobile = ($("#txtsendmanmobile").val()).replace("请选择", "").replace("请填写", "");
        cd.forceexpiredate = ($("#txtforceexpiredate").val()).replace("请选择", "").replace("请填写", "");
        cd.forceexpirecompanyid = ($("#txtforceexpirecompanyid").val()).replace("请选择", "").replace("请填写", "");
        cd.forceexpireorderno = ($("#txtforceexpireorderno").val()).replace("请选择", "").replace("请填写", "");
        cd.forceexpiresaleman = ($("#txtforceexpiresaleman").val()).replace("请选择", "").replace("请填写", "");

        cd.businessexpirecompanyid = ($("#txtbusinessexpirecompanyid").val()).replace("请选择", "").replace("请填写", "");
        cd.businessexpireorderno = ($("#txtbusinessexpireorderno").val()).replace("请选择", "").replace("请填写", "");
        cd.businessexpiresaleman = ($("#txtbusinessexpiresaleman").val()).replace("请选择", "").replace("请填写", "");
        cd.insurancenote = ($("#txtinsurancenote").val()).replace("请选择", "").replace("请填写", "");

        temp.cardetail = cd;

        var json = JSON.stringify(temp);

        var images = new Array();
        $.each($(".zhaopian ul li img"), function (i, ele) {
            var $image = {
                Id: $(ele).attr("id") || "0",
                url: $(ele).attr("src"),
            };
            images.push($image);
        });

        $.ajax({
            type: "POST",
            data: { carjson: json, images: JSON.stringify(images) },
            url: add_url,
            dataType: "json",
            success: function (data) {
                if (data.result == 'T') {
                    Ewewo.Tips_Success('车辆信息保存成功!');
                    location.href = reurl;
                }
                else if (data.result == 'E') {
                    Ewewo.Tips('车牌已经存在!');
                }
                else if (data.result == 'F') {
                    Ewewo.Tips(data.message);
                }
                else {
                    Ewewo.Tips_Error('车辆信息保存不成功!');
                }
            },
            error: function () {
                Ewewo.Tips_Error('网络错误,车辆信息保存不成功!');
            }
        });
    });

    $("[name=vin],#vin_one").bind("input", function () {
        if ($("#select-car-info").is(':visible')) {
            $("#txtvin").val($("#vin_one").val());
            $("[name=vin]").val($("#vin_one").val())
        }
        else
        {
            $("#txtvin").val($("[name=vin]").val());
            $("#vin_one").val($("[name=vin]").val())
        }
    });

    //2017-10-13 add

    $(function () {
        //定义局部函数对象
        var Func = (function () {
            var private = {
                CarModel: null
            };
            var obj = {
                Box_SyncToggle: function () {
                    if ($("#box_sync").is(":hidden")) {
                        $(".mask_box").show();
                        $("#box_sync").show();
                    }
                    else {
                        $(".mask_box").hide();
                        $("#box_sync").hide();
                    }
                },
                Box_SyncLoad: function (e) {
                    private.CarModel = e;
                    $("#box_sync .item_list").remove();
                    $.each(e, function (i, ele) {
                        var $html = "<div class=\"item_list\" style=\"padding: 10px 0 10px 0;\"><ul style=\"inline-block\"><a href=\"javascript:\" vehicleId=" + ele.vehicleId + " modelid=" + ele.id + " carbrandid=" + (ele.JYCarBrand ? ele.JYCarBrand.Id : null) + " carlineid=" + (ele.JYCarLine ? ele.JYCarLine.Id : null) + ">" + ele.vehicleName + "</a></ul></div>";
                        $("#box_sync #itemList a").css("line-height", null);
                        $("#box_sync #itemList").append($html);
                        if (ele.vehicleName.length > 33)
                            $("#box_sync #itemList a").css("line-height", "39px");
                        else
                            $("#box_sync #itemList a").css("line-height", "79px");
                        //车型选择事件
                        $(document).on("click", "#box_sync .item_list a", function () {
                            $("#box_sync .item_list a").removeClass("itemxz");
                            $(this).addClass("itemxz");
                        });
                    });

                },
                LoadingToggle: function (t) {
                    if ($(".saveing").is(":hidden")) {
                        $(".mask_box").show();
                        $(".saveing").show();
                    }
                    else {
                        $(".mask_box").hide();
                        $(".saveing").hide();
                    }
                },
                GetCarModelById: function (vehicleId) {
                    var $value = null;
                    if (private.CarModel == null || typeof (private.CarModel) == "undefined")
                        return $value;
                    $.each(private.CarModel, function (i, ele) {
                        if (ele.vehicleId == vehicleId) {
                            $value = ele; return false;//结束循环
                        }
                    });
                    return $value;
                },
                CheckDefaultCarModel: function (v) {
                    $.ajax({
                        dataType: "json",
                        type: "post",
                        data: { vinCode: v },
                        url: "/service/GetVehicleIdByVinCode",
                        success: function (result) {
                            $("[vehicleid=" + result.VehicleId + "]").addClass("itemxz");
                        },
                        error: function () {
                            Ewewo.Tips_Error("系统错误请联系管理员");
                        }
                    });
                }
            };
            return obj;
        })();

        //同步车型
        $(document).on("click", "#btn_sync", function () {
            var $text = "";
            if ($("#select-car-info").is(':visible'))
                $text = $("#vin_one").val();
            else
                $text = $.trim($("[name=vin]").val());
            if ($text == "") {
                Ewewo.Tips_Error("请输入查询的vin码");
                return;
            }
            if ($text.length < 17) {
                Ewewo.Tips_Error("vin码不能少于17位");
                return;
            }
            Func.LoadingToggle();
            $.ajax({
                dataType: "json",
                type: "post",
                data: { vinCode: $text },
                url: "/service/GetVehicleListByVin",
                success: function (result) {
                    Func.LoadingToggle();
                    if (result.IsSuccess) {
                        Func.Box_SyncToggle();
                        Func.Box_SyncLoad(result.Data);
                        Func.CheckDefaultCarModel($text);
                    }
                    else {
                        if (result.Message)
                            Ewewo.Tips(result.Message);
                        else
                            Ewewo.Tips("未查询到可同步数据!");
                    }
                },
                error: function () {
                    Func.LoadingToggle();
                    Ewewo.Tips_Error("系统错误请联系管理员");
                }
            });
        });

        //关闭
        $(document).on("click", "#btn_close_box_sync", function () { Func.Box_SyncToggle(); });

        //同步
        $(document).on("click", "#btn_Sync_Sure", function () {
            var $checkEleId = $("#box_sync .item_list a[class=itemxz]").attr("vehicleId") || "";
            if ($("#box_sync .item_list a[class=itemxz]").length == 0) {
                Ewewo.Tips("请选择需要同步的数据");
                return;
            }
            var CarModel = Func.GetCarModelById($checkEleId);


            //同步手动填写车型的信息
            $("#type-car-info [name=brandname]").val(CarModel == null ? "" : CarModel.brandName).attr("itemid", CarModel.JYCarBrand ? CarModel.JYCarBrand.Id : null);
            $("#type-car-info [name=linename]").val(CarModel == null ? "" : CarModel.familyName).attr("itemid", CarModel.JYCarLine ? CarModel.JYCarLine.Id : null);
            $("#type-car-info [name=caryear]").val(CarModel == null ? "" : CarModel.yearPattern).attr("itemid", CarModel.yearPattern);
            $("#type-car-info [name=carkuanname]").val(CarModel == null ? "" : CarModel.vehicleName).attr("itemid", CarModel.id);

            //同步选择的车型信息
            $("#select_car_brand a[lang=show] span").text(CarModel == null ? "" : CarModel.brandName).parent().attr("itemid", CarModel.JYCarBrand ? CarModel.JYCarBrand.Id : null);
            $("#select_car_line a[lang=show] span").text(CarModel == null ? "" : CarModel.familyName).parent().attr("itemid", CarModel.JYCarLine ? CarModel.JYCarLine.Id : null);;
            $("#select_car_year a[lang=show] span").text(CarModel == null ? "" : CarModel.yearPattern).parent().attr("itemid", CarModel.yearPattern);
            $("#select_car_kuan a[lang=show] span").text(CarModel == null ? "" : CarModel.vehicleName.length > 21 ? CarModel.vehicleName.substring(0, 21) : CarModel.vehicleName).parent().attr("itemid", CarModel.id);

            //同步车辆价格
            $("#txtcarprices").val(CarModel == null ? "" : CarModel.listPrice / 10000);

            Func.Box_SyncToggle();
            Func.LoadingToggle();
            var obj = new Object();
            obj.vehicleId = $checkEleId;
            if ($("#select-car-info").is(':visible'))
                obj.vinCode = $("#vin_one").val();
            else
                obj.vinCode = $("[name=vin]").val();

            $("#txtvin").val(obj.vinCode);
            $("[name=vin]").val(obj.vinCode);
            $("#vin_one").val(obj.vinCode);
            $.ajax({
                dataType: "json",
                type: "post",
                data: obj,
                url: "/service/SyncCarModel",
                success: function (result) {
                    Func.LoadingToggle();
                    if (result.IsSuccess) {
                        Ewewo.Tips_Success("同步成功");
                    }
                    else {
                        if (result.Message)
                            Ewewo.Tips(result.Message);
                        else
                            Ewewo.Tips("同步失败");
                    }
                },
                error: function () {
                    Func.LoadingToggle();
                    Ewewo.Tips_Error("系统错误请联系管理员");
                }
            });
        });
    });

    $("#txtcarplate").on("input", function () {
        $(this).css("color", "#555555").removeAttr("selectid");
        var keyword = $.trim($(this).val());
        var input = $(this);
        if (keyword != "") {
            setTimeout(function () { datekeyword(keyword, input) }, 500);
        }
        else {
            $(".xzkh ul").empty().hide();

        }
    });


    function txtcarsearch(key,input)
    {
        var keyword = $.trim($(input).val());
        if (key == keyword) {
            $.ajax({
                type: "POST",
                data: { keyword: key },
                url: car_search,
                dataType: "json",
                success: function (data) {
                    $(input).prev(".table_box").remove();
                    if (data.result.length > 0) {
                        var html = '<dl class="table_box" style="height: 197px;overflow: auto;top:42px;left:8px;border:1px; width:300px;"><table id="tbname" width="100%" border="0" cellspacing="0" cellpadding="0"> <thead><tr>';
                        html += '<th style="border-right:1px #dce1e5 solid;" width="100">车牌号</th><th style="border-right:1px #dce1e5 solid;" width="100">品牌</th></tr></thead><tbody>';
                        for (var i = 0; i < data.result.length; i++) {
                            html += '<tr tid="' + data.result[i].Id + '" Plate="' + data.result[i].Plate + '" BrandId="'+(data.result[i].BrandId==null?"":data.result[i].BrandId) +'" CarLineId="'+(data.result[i].CarLineId==null?"":data.result[i].CarLineId)+'" ModelId="'+(data.result[i].ModelId==null?"":data.result[i].ModelId)+'" CustomBrand="'+data.result[i].CustomBrand+'" CustomLine="'+data.result[i].CustomLine+'" CustomModel="'+data.result[i].CustomModel+'" CustomDisplacement="'+data.result[i].CustomDisplacement+'" ModelYear="'+(data.result[i].ModelYear==null?"":data.result[i].ModelYear)+'" BuyTime="'+data.result[i].BuyTime+'" MileAge="'+(data.result[i].MileAge==null?"":data.result[i].MileAge)+'" NextMaintenanceMileAge="'+(data.result[i].NextMaintenanceMileAge==null?"":data.result[i].NextMaintenanceMileAge)+'" NextMaintenanceTime="'+data.result[i].NextMaintenanceTime+'" MaintenanceRemindComment="'+data.result[i].MaintenanceRemindComment+'" InsuranceExpires="'+data.result[i].InsuranceExpires+'" ForcEexpireDate="'+data.result[i].ForcEexpireDate+'" InsuranceRemindCommnet="'+data.result[i].InsuranceRemindCommnet+'" AnnualDue="'+data.result[i].AnnualDue+'" ExpiresQueryTime="'+data.result[i].ExpiresQueryTime+'" AnnualDueRemindComment="'+data.result[i].AnnualDueRemindComment+'" CarReportRemindComment="'+data.result[i].CarReportRemindComment+'" EngineNumber="'+data.result[i].EngineNumber+'" Vin="'+data.result[i].Vin+'" InsureCompany="'+data.result[i].InsureCompany+'" Color="'+data.result[i].Color+'" > <td align="center">' + data.result[i].Plate + '</td><td align="center">' + ((data.result[i].CustomLine==null||data.result[i].CustomLine=="undefined")?"": data.result[i].CustomLine)+ '</td></tr>';
                        }
                        html += '</tbody></table></dl>'
                        $(input).before(html);

                        var editid=$(input).parent().parent().parent().find("a[name=savecar]").attr("editid");
                        var edindex=$(input).parent().parent().parent().find("a[name=savecar]").attr("index");
                        $("#tbname tr:gt(0)").click(function () {
                            isblur=false;
                            var obj=new Object();
                            obj.id=$(this).attr("tid");
                            obj.Plate=$(this).attr("Plate");
                            obj.BrandId=$(this).attr("BrandId");
                            obj.CustomLine=$(this).attr("CustomLine");
                            obj.CarLineId=$(this).attr("CarLineId");
                            obj.BuyTime=$(this).attr("BuyTime");
                            obj.ModelYear=$(this).attr("ModelYear");
                            obj.CustomModel=$(this).attr("CustomModel");
                            obj.CustomBrand=$(this).attr("CustomBrand");
                            obj.ModelId=$(this).attr("ModelId");
                            obj.MileAge=$(this).attr("MileAge");
                            obj.EngineNumber=$(this).attr("EngineNumber");
                            obj.NextMaintenanceMileAge=$(this).attr("NextMaintenanceMileAge");
                            obj.InsureCompany=$(this).attr("InsureCompany");
                            obj.Vin=$(this).attr("Vin");
                            obj.NextMaintenanceTime=$(this).attr("NextMaintenanceTime");
                            obj.InsuranceExpires=$(this).attr("InsuranceExpires");
                            obj.AnnualDue=$(this).attr("AnnualDue");

                            $("#txtcarno_"+edindex).val(obj.Plate).attr("selectid",obj.id);
                            $("#txtbrand_"+edindex).val(obj.CustomBrand).attr("valueid",obj.BrandId);
                            $("#txtline_"+edindex).val(obj.CustomLine);
                            $("#txtbuytime_"+edindex).val(obj.BuyTime);


                            $("#txtmodelyear_"+edindex).val(obj.ModelYear);
                            $("#txtmodel_"+edindex).val(obj.CustomModel).attr("valueid",obj.ModelId);
                            $("#txtmileage_"+edindex).val(obj.MileAge);
                            $("#txtenginenumber_"+edindex).val(obj.EngineNumber);
                            $("#txtnextmaintenancemileage_"+edindex).val(obj.NextMaintenanceMileAge);
                            $("#txtinsurecompany_"+edindex).val(obj.InsureCompany);
                            $("#txtvin_"+edindex).val(obj.Vin);
                            $("#txtnextmaintenancetime_"+edindex).val(obj.NextMaintenanceTime);
                            $("#txtinsuranceexpires_"+edindex).val(obj.InsuranceExpires);
                            $("#txtannualdue_"+edindex).val(obj.AnnualDue);
                            $("#txtbuytime"+edindex).val(obj.BuyTime);

                            $(input).prev(".table_box").remove();
                        }).hover(function () {
                            $(this).addClass("crk_s");
                        }, function () { $(this).removeClass("crk_s") });
                    }
                    else {
                        $(input).prev(".table_box").remove();
                    }
                },
                error: function () {
                    Ewewo.Tips_Error('网络错误,获取数据不成功!');
                }
            });
        }
    }


    function datekeyword(key, input) {
        $(".xzkh ul").empty();
        var keyword = $.trim($(input).val());
        if (key == keyword) {
            $("#loading2,.xzkh").show();
            $.ajax({
                type: "POST",
                data: { keyword: keyword },
                url: car_search,
                dataType: "json",
                success: function (data) {
                    if (data.result.length > 0) {
                        $(".xzkh ul").empty().show();
                        var employeelist = '<ul style="margin:0;">';
                        for (var i = 0; i < data.result.length; i++) {
                            employeelist += '<li tid="' + data.result[i].Id + '" Plate="' + data.result[i].Plate + '" BrandId="' + (data.result[i].BrandId == null ? "" : data.result[i].BrandId) + '" CarLineId="' + (data.result[i].CarLineId == null ? "" : data.result[i].CarLineId) + '" ModelId="' + (data.result[i].ModelId == null ? "" : data.result[i].ModelId) + '" CustomBrand="' + data.result[i].CustomBrand + '" CustomLine="' + data.result[i].CustomLine + '" CustomModel="' + data.result[i].CustomModel + '" CustomDisplacement="' + data.result[i].CustomDisplacement + '" ModelYear="' + (data.result[i].ModelYear == null ? "" : data.result[i].ModelYear) + '" BuyTime="' + data.result[i].BuyTime + '" MileAge="' + (data.result[i].MileAge == null ? "" : data.result[i].MileAge) + '" NextMaintenanceMileAge="' + (data.result[i].NextMaintenanceMileAge == null ? "" : data.result[i].NextMaintenanceMileAge) + '" NextMaintenanceTime="' + data.result[i].NextMaintenanceTime + '" MaintenanceRemindComment="' + data.result[i].MaintenanceRemindComment + '" InsuranceExpires="' + data.result[i].InsuranceExpires + '" ForcEexpireDate="' + data.result[i].ForcEexpireDate + '" InsuranceRemindCommnet="' + data.result[i].InsuranceRemindCommnet + '" AnnualDue="' + data.result[i].AnnualDue + '" ExpiresQueryTime="' + data.result[i].ExpiresQueryTime + '" AnnualDueRemindComment="' + data.result[i].AnnualDueRemindComment + '" CarReportRemindComment="' + data.result[i].CarReportRemindComment + '" EngineNumber="' + data.result[i].EngineNumber + '" Vin="' + data.result[i].Vin + '" InsureCompany="' + data.result[i].InsureCompany + '" Color="' + data.result[i].Color + '" ><a href="javascript:void(0)" style="height:100%;:" >' + data.result[i].Plate + ' -- ' + ((data.result[i].CustomLine == null || data.result[i].CustomLine == "undefined") ? "" : data.result[i].CustomLine) + '</a> </li>';
                        }
                        employeelist += "</ul>";
                        $("#loading2").hide();
                        $(".xzkh").append(employeelist);
                        $(input).parent().find(".xzkh ul li a").click(function () {
                            var obj = new Object();
                            obj.id = $(this).parent().attr("tid");
                            obj.Plate = $(this).parent().attr("Plate");
                            obj.BrandId = $(this).parent().attr("BrandId");
                            obj.CustomLine = $(this).parent().attr("CustomLine");
                            obj.CarLineId = $(this).parent().attr("CarLineId");
                            obj.BuyTime = $(this).parent().attr("BuyTime");
                            obj.ModelYear = $(this).parent().attr("ModelYear");
                            obj.CustomModel = $(this).parent().attr("CustomModel");
                            obj.CustomBrand = $(this).parent().attr("CustomBrand");
                            obj.ModelId = $(this).parent().attr("ModelId");
                            obj.MileAge = $(this).parent().attr("MileAge");
                            obj.EngineNumber = $(this).parent().attr("EngineNumber");
                            obj.NextMaintenanceMileAge = $(this).parent().attr("NextMaintenanceMileAge");
                            obj.InsureCompany = $(this).parent().attr("InsureCompany");
                            obj.Vin = $(this).parent().attr("Vin");
                            obj.NextMaintenanceTime = $(this).parent().attr("NextMaintenanceTime");
                            obj.InsuranceExpires = $(this).parent().attr("InsuranceExpires");
                            obj.AnnualDue = $(this).parent().attr("AnnualDue");



                            $("#txtcarplate").val(obj.Plate).attr("selectid", obj.id);
                            $("input[name=brandname]").val(obj.CustomBrand).attr("valueid", obj.BrandId);
                            $("input[name=linename]").val(obj.CustomLine).attr("valueid", obj.CarLineId);
                            $("input[name=carkuanname]").val(obj.CustomModel).attr("valueid", obj.ModelId);
                            $("#txtbuydate").val(obj.BuyTime);
                            $("#txtcaryear").val(obj.ModelYear);
                            $("#txtmileage").val(obj.MileAge);
                            $("#txtenginenumber").val(obj.EngineNumber);
                            $("#txtvin").val(obj.Vin);
                            $("#txtinsurecompany").val(obj.InsureCompany);
                            $("#txtinsuranceexpires").val(obj.InsuranceExpires);
                            $("#txtannualdue").val(obj.AnnualDue);
                            $("#txtnextmaintenancetime").val(obj.NextMaintenanceTime);
                            $("#txtnextmaintenancemileage").val(obj.NextMaintenanceMileAge);
                            $("#loading2,.xzkh").hide();
                            $('#select-car-info').hide();
                            $('#type-car-info').show();

                        });
                    }
                    else {
                        $("#loading2,.xzkh").hide();
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


});