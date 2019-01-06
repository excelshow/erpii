var d;
var scrtop = 0;
var levelCardDiscount = "";
$(function () {
    $(".fwadd_car dd:first,div[name=customerinfodiv] li:first").click(function () {
        var carkey = $(this).find("a").find("font").text().replace("请填写", "");
        var servicerecord = new Object();
        servicerecord.iscar = $(this).attr("itemid");
        servicerecord.name = carkey;
        var mobile = $.trim(
    	$("div[name=customerinfodiv] li:first").find("a").attr("mobile"));
        mobile = typeof mobile == "undefined" ? "" : mobile;
        servicerecord.mobile = mobile;

        var json = JSON.stringify(servicerecord);
        $(".mask").html("");
        masklayer(0, "加载中...");
        maskshow(2);
        $(".mask").load("/Service/ShowHtml?viewName=_SelectCarCustomer", {
            thisobj: json
        }, function () {
            masklayer(1, "加载中...");
            $(this).show();
        });
    });
    $(".fwadd_car dd").eq(1).click(function () {
        $(".mask").html("");
        masklayer(0, "加载中...");
        var servicerecord = new Object();
        var cardd = $(".fwadd_car dd").eq(1).find("a font");
        servicerecord.brandid = cardd.attr("brand");
        servicerecord.lineid = cardd.attr("line");
        servicerecord.modelyearid = cardd.attr("modelyear");
        servicerecord.modelid = cardd.attr("model");
        servicerecord.brandname = cardd.attr("brandname");
        servicerecord.linename = cardd.attr("linename");
        servicerecord.modelyearname = cardd.attr("modelyearname");
        servicerecord.modelname = cardd.attr("modelname");
        servicerecord.vin = cardd.attr("vin");
        var json = JSON.stringify(servicerecord);
        maskshow(2);
        $(".mask").load("/Service/ShowHtml?viewName=_SelectCarModel", {
            thisobj: json
        }, function () {
            masklayer(1, "加载中...");
            $(this).show();
        });
    });
    $("#txtcustomername").placeholder({ word: "请填写" });

    $(".fw_addmenu_right a").click(function () {
        if (!$(this).hasClass("hui")) {
            var isvalid = checkform();
            if (isvalid == false) {
                return false;
            }
            getcurrenwx();
        }
    });

    $("#servicesave").click(function () {

        var statusid = statusindeid;
        var isvalid = checkform();
        if (isvalid == false) {
            return false;
        }
        //禁止手机用户点击保存按钮结果未返回重复点击
        if (isClickAddServiceSaveButton == true) {
            Ewewo.Tips("数据保存中...");
            return;
        }
        isClickAddServiceSaveButton = true;
        save(statusid);
    });
    $(".fw_addmenu_left .add1").find("a").click(function () {
        var customerid = $("div[name=customerinfodiv] li:first").find("a").attr("customerid");
        if (customerid == "" || customerid.length == 0) {
            Ewewo.Tips("请输入手机号!");
            return false;
        }
        var servicerecord = new Object();
        servicerecord.iscar = 1;
        servicerecord.name = "";
        servicerecord.id = customerid;
        var json = JSON.stringify(servicerecord);
        masklayer(0, "加载中...");
        maskshow(2);
        $(".mask").load("/Service/ShowHtml?viewName=_WorkingView", {
            thisobj: json
        }, function () {
            returnview();
            masklayer(1, "加载中...");
            $(this).show();
        });
    });
    $(".fw_addmenu_left .add2").find("a").click(function () {
        var customerid = $("div[name=customerinfodiv] li:first").find("a").attr("customerid");
        if (customerid == "" || customerid.length == 0) {
            Ewewo.Tips("请输入手机号!");
            return false;
        }
        var servicerecord = new Object();
        servicerecord.packegelist = selectpackage();
        var json = JSON.stringify(servicerecord);
        masklayer(0, "加载中...");
        maskshow(2);
        $(".mask").load("/Service/ShowHtml?viewName=_SelectPackage", {
            thisobj: json
        }, function () {
            returnview();
            masklayer(1, "加载中...");
            $(this).show();
        });
    });
    $(".fw_addmenu_left .add3").find("a").click(function () {
        var customerid = $("div[name=customerinfodiv] li:first").find("a").attr("customerid");
        if (customerid == "" || customerid.length == 0) {
            Ewewo.Tips("请输入手机号!");
            return false;
        }
        var servicerecord = new Object();
        servicerecord.customersourceid = customerid;
        servicerecord.salesid = "";
        servicerecord.salesname = "";
        servicerecord.randomid = 0;
        var json = JSON.stringify(servicerecord);
        masklayer(0, "加载中...");
        maskshow(2);
        $(".mask").load("/Service/ShowHtml?viewName=_ChongZhi", {
            thisobj: json
        }, function () {
            returnview();
            masklayer(1, "加载中...");
            $(this).show();
        });
    });
    $("#threeproject li").eq(0).click(function () {
        var customerid = $("div[name=customerinfodiv] li:first").find("a").attr("customerid");

        customerid = customeData.customerid;
        if (customerid == "" || customerid.length == 0 || customerid == "0" || customerid == 0) {
            Ewewo.Tips("请输入手机号!");
            return false;
        }

        $("#fastwork,.mask_box").show();
        mask_box("#fastwork");
    });
    $("#fastworklist .addtcxm").click(function () {
        var wid = $(this).attr("itemid");
        var name = $(this).attr("name");
        var isshowwork = $("#workhour div[wid=" + wid + "]").size();
        if (isshowwork == 0) {
            var discount = $("#txtdiscount").attr("labourdiscount");
            var price = $(this).attr("price");
            var vipprice = $(this).attr("vipprice");
            var qty = $(this).attr("qty");
            var servicetypeid = $(this).attr("servicetypeid");
            var typename = $(this).attr("typename");
            var operaterid = $(this).attr("operaterid");
            var operatername = $(this).attr("operatername");
            var salesid = $(this).attr("salesid");
            var salesname = $(this).attr("salesname");
            var total = parseFloat(price) * parseFloat(qty) * parseFloat(discount) / 100;
            var randomid = getRandom(9999);
            assemblyhtml(wid, randomid, total, salesname, salesid, operatername, operaterid, typename, name, qty, price, vipprice, servicetypeid, discount, "", 1, "自费");
            updatebottomtotal();
        } else {
            Ewewo.Tips("已存在工时项目：" + name + "!");
            return false;
        }
    });
    $("#threeproject li").eq(1).click(function () {

        var customerid = customeData.customerid;

        if (customerid == "" || customerid.length == 0 || customerid == "0" || customerid == 0) {
            Ewewo.Tips("请输入手机号!");
            return false;
        }

        var servicerecord = new Object();
        servicerecord.iscar = 1;
        servicerecord.name = "";
        var json = JSON.stringify(servicerecord);
        masklayer(0, "加载中...");
        maskshow(2);
        $(".mask").load("/Service/ShowHtml?viewName=_AdditionalProject", {
            thisobj: json
        }, function () {
            returnview();
            masklayer(1, "加载中...");
            $(this).show();
        });
    });
    shishou();
    servicestatus();
    $("#Workshilist a[name=achecker],#Workshilist a[name=aserviceadvisor]").click(function () {
        var qcstaff = $(this);
        var qcstaffid = qcstaff.attr("checkerid");
        $("#carchecker,.mask_box").show();
        mask_box("#carchecker");
        if ($("#carchecker ul").length <= 10) {
            $.ajax({
                type: "POST",
                data: {},
                url: servicechecker_url,
                dataType: "json",
                success: function (data) {
                    $("#carchecker").next("ul").remove();
                    var html = "<ul>";
                    for (var i = 0; i < data.result.length; i++) {
                        if (qcstaffid == data.result[i].id) {
                            html += '<li name="' + data.result[i].name + '" checkerid="' + data.result[i].id + '"><a href="javascript:void(0)"  class="carxz" >' + data.result[i].name + "&nbsp;-&nbsp;" + data.result[i].no + "</a></li>";
                        } else {
                            html += '<li name="' + data.result[i].name + '" checkerid="' + data.result[i].id + '"><a href="javascript:void(0)" >' + data.result[i].name + "&nbsp;-&nbsp;" + data.result[i].no + "</a></li>";
                        }
                    }
                    html += "</ul>";
                    $("#carchecker").html(html);
                    $("#carchecker ul li").each(function () {
                        $(this).click(function () {
                            qcstaff.attr("checkerid", $(this).attr("checkerid")).find("font").text($(this).attr("name"));
                            $(this).find("a").addClass("carxz");
                            $("#carchecker,.mask_box").hide();
                        });
                    });
                },
                error: function () {
                    Ewewo.Tips_Error("网络错误,获取数据失败!");
                }
            });
        } else {
            $("#carchecker ul li").find("a").removeClass("carxz");
            $("#carchecker ul li").each(function () {
                if (qcstaffid == $(this).attr("checkerid")) {
                    $(this).find("a").addClass("carxz");
                }
            });
        }
    });

    $("#cktcitem").click(function () {
        $("#timespackagebox,.mask_box").show();
        mask_box("#timespackagebox");
    });
    $("#wbtcitem").click(function () {
        $("#textpackagebox,.mask_box").show();
        mask_box("#textpackagebox");
    });
    $("#hykitem").click(function () {
        $("#cardbox,.mask_box").show();
        mask_box("#cardbox");
    });
    $(".ktcclose").click(function () {
        $("#cardbox,#textpackagebox,#timespackagebox,#fastwork").hide();
        $(".mask_box").hide();
    });
    //点击新建顾客
    $(document).on("click", "#addcustomernew", function () {
        $(".fwadd_info").show();
        if ($(this).attr("unclick") == "0") {
            var v = $("#search_input").val().trim();
            v = v.length == 0 ? "无手机号" : v;
            var ismobile = Ewewo.IsMobileOrCarNo(v);
            if (v == "无手机号") {
                ismobile = true;
            }

            var v1 = "";
            if (v != "无手机号") {
                v1 = v;
            } else {
                for (var i = 0; i < 18; i++) {
                    v1 += Math.floor(Math.random() * 9) + "";
                }
                if (v1.length != 18) {
                    v1 = v1.substr(0, 18);
                }
            }
            if (ismobile == 1) {
                $("#search_mobile").val(v).attr("selectid", "-1").attr("mobile", v1);
                $("#search_name").val("");
                $("#search_carno").val(CarDefaultStr).removeAttr("valueid");
                fillplate(CarDefaultStr);
            } else if (ismobile == 2) {
                $("#search_mobile").val("").attr("selectid", "-1").attr("mobile", v1);
                $("#search_name").val("");
                $("#search_carno").val(v).removeAttr("valueid");
                fillplate(v);
            } else {
                $("#search_mobile").val("").attr("selectid", "-1").attr("mobile", v1);
                $("#search_name").val(v);
                $("#search_carno").val(CarDefaultStr).removeAttr("valueid");
                fillplate(CarDefaultStr);
            }
        }
    });
    //顾客输入搜索
    $(document).on("input", "#search_input", function () {
        $(this).css("color", "#555555");
        var keyword = $.trim($(this).val());
        var input = $(this);
        if (keyword != "") {
            setTimeout(function () {
                carcustomersearchbykeyword(keyword, input);
            }, 500);
        }
    });



    //点击保存按钮
    $(document).on("click", "#search_save", function () {
        d = getdata();
        if (typeof d.customerid == "undefined") {
            Ewewo.Tips("请选择/添加用户!");
            return;
        }

        if (d.mobile.length < 8 && d.mobile.length != 18) {
            Ewewo.Tips("请输入11位手机号!");
            return;
        }
        if (d.name.length == 0) {
            Ewewo.Tips("请输入姓名!");
            return;
        }

        if (d.plate.length == 0) {
            Ewewo.Tips("请输入车牌号!");
            return;
        }

        $.ajax({
            type: "POST",
            data: { mobile: d.mobile },
            url: "/Service/MobileIsNew",
            dataType: "json",
            success: function (data) {
                if (data.result == "T" && d.customerid > 0) {
                    $("#newphoneconfig").show();
                    // mask_box("#newphoneconfig");

                    /*返回ID处理信息绑定*/
                    //closewindow(d.plate, data.id, d.mobile);

                    customeData.customerid = data.id;
                    customeData.name = d.name;
                    customeData.carno = d.plate;
                    customeData.carid = data.carid;
                    customeData.mobile = d.mobile;
                    //maskshow(1);
                } else {
                    saveeditcustomer(d);

                    //Ewewo.Tips_Error(data.message);
                }
            },
            error: function (data) {
                if (data.status == 401) {
                    Ewewo.Tips_Error(data.responseText);
                } else {
                    Ewewo.Tips_Error("网络错误,保存失败!");
                }
            }
        });
    });

    //创建新客户
    $(document).on("click", "#newmobile", function () {
        d.edittype = "add";
        saveeditcustomer(d);
    });

    //替换老客户
    $(document).on("click", "#replacephone", function () {
        d.edittype = "replace";
        saveeditcustomer(d);
    });



    $(document).on("click", "#customersearchback", function () {
        maskshow(1);
    });

    $(document).on("input", "#search_mobile", function () {
        var v = $(this).val();
        if (v.length == 0) {
            $(this).next(".xzkh1").show();
        } else {
            $(this).next(".xzkh1").hide();
        }
    })

    $(document).on("focus", "#search_mobile", function () {
        var v = $(this).val();
        if (v.length == 0) {
            $(this).next(".xzkh1").show();
        } else {
            $(this).next(".xzkh1").hide();
        }
    })

    $(document).on("blur", "#search_mobile", function () {
        setTimeout(function () { $("#search_mobile").next(".xzkh1").hide(); }, 200);
    })

    $(document).on("click", "#nomobilediv", function () {
        var v1 = "";

        for (var i = 0; i < 18; i++) {
            v1 += (Math.round(Math.random() * 10) + "");
        }
        if (v1.length > 18) {
            v1 = v1.substr(0, 18);
        }
        $("#search_mobile").val("无手机号").attr("mobile", v1);
        $(this).parent().hide();
    })
    //未添加工时项目时,继续保存确定
    $("#wtjgsbcts .mask_btn a").eq(1).click(function () {
        var statusid = statusindeid;
        isClickAddServiceSaveButton = true;
        var record = getservicerecord(statusid);
        savedata(record);
    });
    $("#abatchdispatch").click(function () {
        if ($("#hideditDispatcheddiv").children().length > 0) {
            return;
        }

        masklayer(0, "加载中...");
        $("#hideditDispatcheddiv").load("/Service/ShowSaleBonus", function () {
            bindmaskbox('1', '0|0|0', '', null);
            $("#item_box_open").show();
            masklayer(1, "加载中...");
            $(".mask_box").show();
        });
        $(".mask_box").show();
    });


    //同步车型
    $(document).on("click", "#btn_sync", function () {
        var $text = "";
        if ($("#select-car-info").is(":visible")) $text = $("#vin_one").val();
        else $text = $.trim($("[name=vin]").val());
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
                } else {
                    if (result.Message) Ewewo.Tips(result.Message);
                    else Ewewo.Tips("未查询到可同步数据!");
                }
            },
            error: function () {
                Func.LoadingToggle();
                Ewewo.Tips_Error("系统错误请联系管理员");
            }
        });
    });

    //关闭
    $(document).on("click", "#btn_close_box_sync", function () {
        Func.Box_SyncToggle();
    });

    //同步
    $(document).on("click", "#btn_Sync_Sure", function () {
        var $checkEleId =
            $("#box_sync .item_list a[class=itemxz]").attr("vehicleId") || "";
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
        $("#select_car_kuan a[lang=show] span").attr("vehicleName", CarModel == null ? "" : CarModel.vehicleName).text(CarModel == null ? "" : CarModel.vehicleName.length > 21 ? CarModel.vehicleName.substring(0, 21) : CarModel.vehicleName).parent().attr("itemid", CarModel.id);

        //同步车辆价格
        $("#textcarprice").val(CarModel == null ? "" : CarModel.listPrice / 10000);

        Func.Box_SyncToggle();
        Func.LoadingToggle();
        var obj = new Object();
        obj.vehicleId = $checkEleId;
        if ($("#select-car-info").is(":visible")) obj.vinCode = $("#vin_one").val();
        else obj.vinCode = $("[name=vin]").val();

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
                } else {
                    if (result.Message) Ewewo.Tips(result.Message);
                    else Ewewo.Tips("同步失败");
                }
            },
            error: function () {
                Func.LoadingToggle();
                Ewewo.Tips_Error("系统错误请联系管理员");
            }
        });




    });
});
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
            } else {
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
                else $("#box_sync #itemList a").css("line-height", "79px");
                //车型选择事件
                $(document).on("click", "#box_sync .item_list a", function () {
                    $("#box_sync .item_list a").removeClass("itemxz");
                    $(this).addClass("itemxz");
                });
            });
        },
        LoadingToggle: function (t) {
            if ($(".saveing").is(":hidden")) {
                $(".mask_box").show().css({ "z-index": "2235" });
                $(".saveing").show();
            } else {
                $(".mask_box").hide().css({ "z-index": "2233" });
                $(".saveing").hide();
            }
        },
        GetCarModelById: function (vehicleId) {
            var $value = null;
            if (private.CarModel == null || typeof private.CarModel == "undefined")
                return $value;
            $.each(private.CarModel, function (i, ele) {
                if (ele.vehicleId == vehicleId) {
                    $value = ele;
                    return false; //结束循环
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

function checkform() {
    var txtcarno = $(".fwadd_car dd:first").find("a").attr("carname");
    if ($.trim(txtcarno) == "") {
        Ewewo.Tips("请输入车牌!");
        return false;
    }
    var mobile = $.trim(
	$("div[name=customerinfodiv] li:first").find("a font").text());
    if (mobile == "" || mobile.length == 0) {
        Ewewo.Tips("请输入手机号!");
        return false;
    } else if (isNaN(mobile) && mobile != "无手机号") {
        Ewewo.Tips("手机号，请输入数字!");
        return false;
    } else if (mobile.length < 8 && mobile != "无手机号") {
        Ewewo.Tips("请输入11位手机号!");
        return false;
    }
    if (
	$.trim(
	$("#txtcustomername").val().replace("请填写", "")) == "") {
        Ewewo.Tips("请输入顾客姓名!");
        return false;
    }

    //lixuan 2019-1-3 add
    var isneedcarno = $("#packagetemp").attr("isneedcardno");
    if (isneedcarno == 1) {
        var isvalid = true;
        $("#packagetemp .taocansqlist").each(function () {
            var cardno = $(this).find("input[name=cardno]").val() || "";
            var cardid = $(this).attr("packageid") || 0;
            if ($.trim(cardno) == "") {
                Ewewo.Tips("请输入套餐卡号");
                isvalid = false;
                return false;
            }
            if (checkCardNoExist(cardno, cardid) == true) {
                Ewewo.Tips('套餐卡号' + cardno + '已存在');
                isvalid = false;
                return false;
            }
        });
        return isvalid;
    }
    //end

    return true;
}

function checkCardNoExist(cardno, cardid) {
    var exist = false;
    if (cardno != "") {
        $.ajax({
            type: "POST",
            data: { cardNo: cardno, cardid: cardid },
            async: false,
            url: "/Service/CheckVipPackageCardNoIsExist",
            dataType: "json",
            success: function (data) {
                if (data.result == 'N') {
                    exist = true;
                }
            },
            error: function () {
                Ewewo.Tips_Error('网络错误,获取数据不成功!');
            }
        });
    }
    return exist;
}

function serviceextent() {
    var expire = { id: 0, payexpirecompanyname: "", expirepaymoney: 0, tax: 0, taxrate: 0, stockpartmanagementcost: 0, smcrate: 0, projectmanagementcost: 0, pmcrate: 0, smcdiscount: 0, pmcdiscount: 0, isopentax: false };
    //expire.id = parseInt($("#textpayexpirecompanyname").attr("itemid"));
    //expire.payexpirecompanyname = $("#textpayexpirecompanyname").text().replace("请选择", "");
    //expire.expirepaymoney = $("#textexpirepaymoney").val();
    //expire.isopentax=$("a[name=isopeninvoice]").hasClass("on");
    if (TaxManage.isentrytax == true) {
        expire.tax = TaxManage.tax;
        expire.taxrate = TaxManage.taxrate;
    }
    if (TaxManage.isentrymanage == true) {
        expire.stockpartmanagementcost = TaxManage.parts;
        expire.smcrate = TaxManage.partsrate;
        expire.projectmanagementcost = TaxManage.labour;
        expire.pmcrate = TaxManage.labourrate;
        expire.smcdiscount = TaxManage.partsdiscount;
        expire.pmcdiscount = TaxManage.labourdiscount;
    }
    return expire;
}

function getservicerecord(statusid) {
    var servicerecord = new Object();
    servicerecord.id = 0;
    servicerecord.starttime = $(".fwadd_car").attr("date");
    var isvip = $("div[name=customerinfodiv] li:first").find("a").attr("isvip");
    if (isvip == "1") {
        servicerecord.isvip = true;
    } else {
        servicerecord.isvip = false;
    }
    servicerecord.customername = $.trim($("#txtcustomername").val());
    servicerecord.customermobile = $("div[name=customerinfodiv] li:first").find("a").attr("mobile").replace("无手机号", "");
    servicerecord.carno = $(".fwadd_car dd:first").find("a").attr("carname");
    var cardd = $(".fwadd_car dd").eq(1).find("a font");
    servicerecord.carmodel = cardd.attr("modelname");
    servicerecord.modelsourceid = cardd.attr("modelsourceid") || 0;
    if (cardd.attr("vin") != null && cardd.attr("vin") != undefined) {
        servicerecord.vin = cardd.attr("vin");
    }
    if (cardd.attr("brand") != null && cardd.attr("brand") != undefined) {
        servicerecord.brandid = parseInt(cardd.attr("brand"));
        if (servicerecord.brandid == 0) {
            servicerecord.brandid = null;
        }
        servicerecord.custombrand = cardd.attr("brandname");
    } else {
        servicerecord.brandid = null;
        servicerecord.custombrand = cardd.attr("brandname");
    }
    if (cardd.attr("line") != null && cardd.attr("line") != undefined) {
        servicerecord.carlineid = parseInt(cardd.attr("line"));
        if (servicerecord.carlineid == 0) {
            servicerecord.carlineid = null;
        }
        servicerecord.customline = cardd.attr("linename");
    } else {
        servicerecord.carlineid = null;
        servicerecord.customline = cardd.attr("linename");
    }
    if (cardd.attr("modelyear") != null && cardd.attr("modelyear") != undefined) {
        servicerecord.modelyear = parseInt(cardd.attr("modelyear"));
        if (servicerecord.modelyear == 0) {
            servicerecord.modelyear = null;
            servicerecord.custommodeyear = cardd.attr("modelyearname");
        } else {
            servicerecord.custommodeyear = cardd.attr("modelyear");
        }
    } else {
        servicerecord.modelyear = null;
        servicerecord.custommodeyear = cardd.attr("modelyearname");
    }
    if (cardd.attr("model") != null && cardd.attr("model") != undefined) {
        servicerecord.modelid = parseInt(cardd.attr("model"));
        if (servicerecord.modelid == 0) {
            servicerecord.modelid = null;
        }
        servicerecord.custommodel = cardd.attr("modelname");
    } else {
        servicerecord.modelid = null;
        servicerecord.custommodel = cardd.attr("modelname");
    }
    servicerecord.serviceextent = serviceextent();

    //lixuan add 2018-7-26 保存车辆价格
    servicerecord.extension = {
        carprices: cardd.attr("price") || ""
    };

    servicerecord.isvisiting = false;
    servicerecord.servicestatusid = statusid;
    var paid = getpaid();
    servicerecord.labourpaid = paid.labourpaid;
    servicerecord.partspaid = paid.partpaid;
    servicerecord.totalpaid = paid.totalpaid;
    servicerecord.image = getimages();
    servicerecord.project = getserviceprojects();
    servicerecord.vippackage = getvippackage();
    servicerecord.rechargeapplication = getrechargeapplicaction();
    servicerecord.ServiceAdditionalProject = getserviceadditionalproject();
    var checkerid = $("#Workshilist a[name=achecker]").attr("checkerid");
    if (checkerid != "0" && checkerid != undefined) {
        servicerecord.checkerid = checkerid;
    } else {
        servicerecord.checkerid = null;
    }
    var employeeid = $("#Workshilist a[name=aserviceadvisor]").attr("checkerid");
    servicerecord.serviceadvisor = $("#Workshilist a[name=aserviceadvisor]").find("font").text().replace("请选择", "");
    if (employeeid != "0" && employeeid != undefined) {
        servicerecord.employeeid = employeeid;
    } else {
        servicerecord.employeeid = null;
    }
    servicerecord.comment = $.trim($("#txtcomment").val());
    var json = JSON.stringify(servicerecord);
    return json;
}

function getpaid() {
    var paid = {
        labourpaid: 0,
        partpaid: 0,
        totalpaid: 0
    };
    var fontlabour = $(".shishou font[name=fontsumlabour]").attr("itemid");
    var fontpart = $(".shishou font[name=fontsumpart]").attr("itemid");
    var fontsum = $(".shishou p[name=divsum]").attr("itemid");
    paid.labourpaid = parseFloat(fontlabour);
    paid.partpaid = parseFloat(fontpart);
    paid.totalpaid = parseFloat(fontsum);
    return paid;
}

function getdiscount() {
    var customerid = $("div[name=customerinfodiv] li:first").find("a").attr("customerid");
    if (customerid != "" && customerid !="0") {
        $.ajax({
            type: "POST",
            data: {
                customerId: customerid
            },
            url: getdiscount_url,
            dataType: "json",
            success: function (data) {
                $("#txtdiscount").attr("labourdiscount", data.LabourDiscount).attr("stockdiscount", data.StockDiscount);
            },
            error: function () {
                Ewewo.Tips_Error("网络错误,获取数据不成功!");
            }
        });
    }
}
function getdiscountvule(customerid) {
    if (customerid != "" || customerid > 0) {
        $.ajax({
            type: "POST",
            data: {
                customerId: customerid
            },
            url: getdiscount_url,
            dataType: "json",
            success: function (data) {
                $("#txtdiscount").attr("labourdiscount", data.LabourDiscount).attr("stockdiscount", data.StockDiscount);
            },
            error: function () {
                Ewewo.Tips_Error("网络错误,获取数据不成功!");
            }
        });
    }
}
function getserviceadditionalproject() {
    var list = new Array();
    $("#additionalprojectlist  .workhour").each(function () {
        var item = { id: 0, additionalprojectid: null, name: "", qty: null, price: null, total: null, discount: null, comment: "", isotherpay: null, state: 1 };
        var ition = $(this);
        item.id = 0;
        item.additionalprojectid = ition.find("dl").attr("additionalprojectid");
        item.name = $.trim(ition.find("dt").attr("name"));
        item.qty = ition.find("dd font[f=workhourtotal]").attr("qty");
        item.price = ition.find("dd font[f=workhourtotal]").attr("price");
        item.total = ition.find("dd font[f=workhourtotal]").attr("itemid");
        item.discount = ition.find("dd font[f=workhourtotal]").attr("discount");
        item.isotherpay = ition.find("dl").attr("isotherpay");
        item.comment = $.trim(
		ition.find("dd font[f=workhourtotal]").attr("comment"));
        list.push(item);
    });
    return list;
}

function getserviceprojects() {
    var projects = new Array();
    $("#workhour .workhour").each(function () {
        var project = { id: 0, labourprojectid: 0, parentid: null, islabour: 0, name: "", serviceprojecttypeid: 0, price: 0.0, qty: 0.0, total: 0.0, workeemployeeid: "", stockpartsid: null, salesemployeeid: "", discount: null, state: 1, chargetype: 1 };
        var list = new Array();
        var ctr = $(this);
        var islabour = 1;
        var tdid = 0;
        var tdname = $.trim(ctr.find("dt").attr("name"));
        var tdtype = "工时费";
        var tdprice = ctr.find("dt font").attr("price");
        var tdqty = ctr.find("dt font").attr("qty");
        var tddiscount = ctr.find("dt font").attr("discount");
        var tdtotal = ctr.find("dd font[f=workhourtotal]").attr("itemid");
        var tdprojecttype = ctr.find("dd font[f=workhourtotal]").attr("typename");
        var tdoperater = ctr.find("dd em[f=operater]");
        var tdsales = ctr.find("dd em[f=sales]");
        var chargetype = ctr.find("dt font").attr("chargetype");
        project.name = $.trim(tdname);
        project.total = parseFloat(tdtotal);
        project.price = parseFloat(tdprice);
        project.qty = parseFloat(tdqty);
        project.discount = parseFloat(tddiscount);
        project.serviceprojecttypeid = 0; //getserviceprojectid($.trim(tdprojecttype));
        project.id = tdid;
        project.labourprojectid = ctr.attr("wid");
        project.islabour = islabour == 1 ? true : false;
        project.parentid = null;
        project.workeemployeeId = tdoperater.attr("workeemployeeid");
        if (project.workeemployeeId == "undefined") {
            project.workeemployeeId = null;
        }
        project.salesemployeeid = tdsales.attr("salesid");
        project.chargetype = chargetype == "undefined" ? "1" : chargetype;
        $(this).find(".accost dl").each(function () {
            var children = {
                id: 0,
                labourprojectid: 0,
                parentid: null,
                islabour: 0,
                name: "",
                serviceprojecttypeid: 0,
                price: 0.0,
                qty: 0.0,
                total: 0.0,
                workeemployeeid: "",
                stockpartsid: null,
                discount: null,
                state: 1,
                chargetype: 1
            };
            var childrenctr = $(this);
            var childrenislabour = 0;
            var childrentdid = 0;
            var childrentdname = childrenctr.find("dt").attr("name");
            var childrentdtype = "配件费";
            var childrentdprice = childrenctr.find("dd").attr("price");
            var childrentdqty = childrenctr.find("dd").attr("qty");
            var childrentddiscount = childrenctr.find("dd").attr("discount");
            var childrenchargetype = childrenctr.find("dd").attr("chargetype");
            var childrentdtotal = childrenctr.find("dd span[f=partstotal]").attr("itemid");
            var childrentdprojecttype = childrenctr.find("dd span").eq(3).attr("projecttype");
            var childrentdsales = childrenctr.find("dd span[f=sales]");
            children.name = $.trim(childrentdname);
            children.total = parseFloat(childrentdtotal);
            children.price = parseFloat(childrentdprice);
            children.qty = parseFloat(childrentdqty);
            children.discount = parseFloat(childrentddiscount);
            children.serviceprojecttypeid = 0; //getserviceprojectid($.trim(childrentdprojecttype));
            children.parentid = 0;
            children.workeemployeeid = "";
            children.id = childrentdid;
            children.labourprojectid = null;
            children.islabour = false;
            children.salesemployeeid = childrentdsales.attr("salesid");
            children.chargetype = childrenchargetype == "undefined" ? "1" : childrenchargetype;;
            if (
			childrenctr.attr("pid") != undefined && childrenctr.attr("pid") != "0") {
                children.stockpartsid = parseInt(childrenctr.attr("pid"));
            }
            list.push(children);
        });
        project.children = list;
        projects.push(project);
    });
    return projects;
}

function getimages() {
    var images = new Array();
    return images;
}

function getvippackage() {
    var packages = new Array();
    $("#packagetemp .taocansqlist").each(function () {
        var p = { id: 0, servicename: "", cardno: "", servicecontent: "", price: null, expirationdate: null, salesemployeeid: "", templateid: null, state: 1 };
        p.id = $(this).attr("packageid");
        p.cardno = $(this).find("input[name=cardno]").val();
        p.templateid = $(this).attr("itemid");
        p.servicename = $(this).find("font[f=packagecar]").attr("name");
        p.price = $(this).find("font[f=packagecar]").attr("price");
        p.servicecontent = $(this).find("dd[f=packagecontent]").attr("content");
        p.expirationdate = $(this).find("font[f=packagecar]").attr("effectivemoths").replace("长期有效", "");
        p.salesemployeeid = $(this).find("dd[f=sales]").attr("salesid");
        packages.push(p);
    });
    return packages;
}

function getrechargeapplicaction() {
    var recharge = new Array();
    $("#membershipcard .taocansqlist").each(function () {
        var item = { Id: 0, VipRechargeCardTemplateId: null, VipRechargeCardId: null, CardNo: "", Money: null, PaymentMethodTypeId: null, RealMoney: null, IsOpenCard: null, SalesEmployeeId: "", state: 1 };
        item.Id = $(this).attr("applicationid");
        item.VipRechargeCardTemplateId = $(this).attr("templateid");
        item.VipRechargeCardId = $(this).find("font[f=car]").attr("itemid");
        if (item.VipRechargeCardId == "0") item.VipRechargeCardId = null;
        item.CardNo = $(this).find("font[f=car]").attr("cardno");
        item.Money = $(this).find("dd[f=partstotal]").attr("total");
        item.RealMoney = $(this).find("dd[f=partstotal]").attr("realmoney");
        item.IsOpenCard = false;
        item.SalesEmployeeId = $(this).find("dd[f=sales]").attr("salesid");
        recharge.push(item);
    });
    $("#chongzhi .taocansqlist").each(function () {
        var item = { Id: 0, VipRechargeCardTemplateId: null, VipRechargeCardId: null, CardNo: "", Money: null, PaymentMethodTypeId: null, RealMoney: null, IsOpenCard: null, SalesEmployeeId: "", state: 1 };
        item.Id = $(this).attr("applicationid");
        item.VipRechargeCardTemplateId = $(this).attr("templateid");
        item.VipRechargeCardId = $(this).find("font[f=car]").attr("itemid");
        if (item.VipRechargeCardId == "0") item.VipRechargeCardId = null;
        item.CardNo = $(this).find("font[f=car]").attr("cardno");
        item.Money = $(this).find("dd[f=partstotal]").attr("total");
        item.PaymentMethodTypeId = null;
        item.RealMoney = $(this).find("dd[f=partstotal]").attr("amount");
        item.IsOpenCard = true;
        item.SalesEmployeeId = $(this).find("dd[f=sales]").attr("salesid");
        recharge.push(item);
    });
    return recharge;
}

function getserviceprojectid(name) {
    var projecttypeid = null;
    if (name == "代办") {
        projecttypeid = parseInt("3");
    } else if (name == "返工") {
        projecttypeid = parseInt("4");
    } else if (name == "其它") {
        projecttypeid = parseInt("10");
    } else if (name == "外发") {
        projecttypeid = parseInt("1");
    }
        //else if (name == "钣喷") {
        //    projecttypeid = parseInt("2");
        //}
    else if (name == "钣金") {
        projecttypeid = parseInt("2");
    } else if (name == "喷漆") {
        projecttypeid = parseInt("3");
    } else if (name == "机电") {
        projecttypeid = parseInt("6");
    } else if (name == "美容") {
        projecttypeid = parseInt("7");
    } else if (name == "精品") {
        projecttypeid = parseInt("8");
    }
    return projecttypeid;
}

function carcustomersearchbykeyword(key, input) {
    $(".xzkh ul").empty();
    var keyword = $.trim($(input).val());
    if (key == keyword) {
        $("#loading2,.xzkh").show();
        $.ajax({
            type: "POST",
            data: {
                keyword: keyword
            },
            url: carcustomersearch,
            dataType: "json",
            success: function (data) {
                if (data.result.length > 0) {
                    $(".xzkh ul").empty().show();
                    var employeelist = "<ul>";
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
                        $(".fwadd_info").show();
                        var customerid = $(this).attr("customerid");
                        var carno = $(this).attr("carno");
                        var name = $(this).attr("name");
                        var mobile = $(this).attr("mobile");
                        var carId = $(this).attr("carid");

                        $("#search_mobile").val(mobile.length == 18 ? "无手机号" : mobile).attr("selectid", customerid).attr("mobile", mobile);
                        $("#search_name").val(name);
                        $("#search_carno").val(carno).attr("valueid", carId);
                        $(".xzkh ul").empty().hide();
                        $(".xzkh").hide();
                        $("#addcustomernew").attr("unclick", "1").attr("style", "background: #999;");
                        fillplate(carno);
                    });
                } else {
                    $(".xzkh").hide();
                    $("#addcustomernew").attr("unclick", "0").attr("style", "");
                }
            },
            error: function () {
                Ewewo.Tips_Error("网络错误,获取数据不成功!");
            }
        });
    } else {
        $(".loading2").show();
        if (iscar == "1") {
            $(".search_fruit ul").html("<li><a href='javascript:void(0)' customerid='' carno='' nomobile=1 mobile='无手机号' style='text-align: center;'>无手机号</a></li>");
            $(".search_fruit ul li a").click(function () {
                if ($(this).attr("nomobile") == 1) {
                    spackageinfo();
                    $("div[name=customerinfodiv] li:first").find("a").attr("mobile", $(this).attr("mobile")).attr("customerid", 0).find("font").html($(this).attr("mobile"));
                    maskshow(1);
                }
            });
        } else {
            $(".search_fruit ul").empty().hide();
        }
        $(".loading2").hide();
    }
}
//2018-12-28修改
function saveeditcustomer(d) {
    $.ajax({
        type: "POST",
        data: {
            strdata: JSON.stringify(d)
        },
        url: "/Service/ecsave",
        dataType: "json",
        success: function (data) {
            if (data.result == "T") { /*返回ID处理信息绑定*/

                //d.plate d.mobile d.name  data.carid data.id
                //console.log(d.mobile);

                closewindow(d.plate, data.id, data.mobile, data.carid);

                customeData.customerid = data.id;
                customeData.name = d.name;
                customeData.carno = d.plate;
                customeData.carid = data.carid;
                customeData.mobile = d.mobile;
                maskshow(1);
            } else {
                $("#newphoneconfig").hide();
                Ewewo.Tips_Error(data.message);
            }
        },
        error: function (data) {
            if (data.status == 401) {
                $("#newphoneconfig").hide();
                Ewewo.Tips_Error(data.responseText);
            } else {
                $("#newphoneconfig").hide();
                Ewewo.Tips_Error("网络错误,保存失败!");
            }
        }
    });
}

function getdata() {
    var obj = new Object();
    obj.customerid = $("#search_mobile").attr("selectid");
    obj.name = $("#search_name").val();
    obj.mobile = $("#search_mobile").val();
    obj.plate = $("#search_carno").val();
    obj.carid = $("#search_carno").attr("valueid");
    obj.selected = obj.customerid;
    obj.serverrecordid = 0;
    obj.edittype = "edit";
    if (
	obj.mobile == "无手机号" && $("#search_mobile").attr("mobile").length == 18) {
        obj.mobile = $("#search_mobile").attr("mobile");
    } else if (obj.mobile == "无手机号") {
        var v1 = "";
        for (var i = 0; i < 18; i++) {
            v1 += Math.floor(Math.random() * 9) + "";
        }
        if (v1.length != 18) {
            v1 = v1.substr(0, 18);
        }
        obj.mobile = v1;
    }
    return obj;
}

function servicestatus() {
    $("#SendWeChat").click(function () {
        $(this).toggleClass("fstz");
        if ($(this).hasClass("fstz")) {
            $(this).attr("itemid", 1);
        } else {
            $(this).attr("itemid", 0);
        }
    });
    $("#SendDx").click(function () {
        $(this).toggleClass("fstz");
        if ($(this).hasClass("fstz")) {
            $(this).attr("itemid", 1);
        } else {
            $(this).attr("itemid", 0);
        }
    });
    $("#divstatus .mask_btn a").eq(1).click(function () {
        var statusid = $(".fw_addmenu_right a").attr("itemid");
        save(statusid);
    });
}



function save(statusid) {
    var isvalid = checkform();
    if (isvalid == false) {
        return false;
    }
    var record = getservicerecord(statusid);
    var recordObj = JSON.parse(record);
    if (isWtjgsbcts == 1 && (recordObj.project == null || recordObj.project.length == 0)) {
        isClickAddServiceSaveButton = false;

        $("#wtjgsbcts,.mask_box").show();
        mask_box("#wtjgsbcts");
        return false;
    }
    else {
        return savedata(record);
    }
}

function savedata(record) {
    var isSendWx = false;
    var isSendDx = false;
    var isshowwx = $("#sendwenotchat").attr("itemid");
    var sumwx = $("#SendWeChat").attr("itemid");
    if (isshowwx > 0 && sumwx > 0) {
        isSendWx = true;
    }
    var sumdx = $("#SendDx").attr("itemid");
    if (sumdx > 0) {
        isSendDx = true;
    }
    var processing = false;

    masklayer(0, "保存中...");
    if (!processing) {
        processing = true;
        var isbasic = null;
        $.ajax({
            type: "POST",
            data: {
                record: record,
                isBasic: isbasic,
                isSendWx: isSendWx,
                isSendDx: isSendDx
            },
            url: "/Service/Save",
            dataType: "json",
            success: function (data) {
                if (data.result == "T") {
                    masklayer(1, "保存中...");
                    Ewewo.Tips_Success("保存成功!");
                    window.location.href = "/Service/detail/" + data.id;
                } else {
                    masklayer(1, "保存中...");
                    Ewewo.Tips_Error("保存不成功!" + data.message);
                    processing = false;
                    isClickAddServiceSaveButton = false;
                }
            },
            error: function (data) {
                if (data.status == 401) {
                    Ewewo.Tips_Error(data.responseText);
                } else {
                    Ewewo.Tips_Error("网络错误,保存不成功!");
                }
                processing = false;
                masklayer(1, "保存中...");
                isClickAddServiceSaveButton = false;
            }
        });
    }
    return false;
}

function selectpackage() {
    var list = new Array();
    $("#packagetemp .taocansqlist").each(function () {
        var packageitemlist = { id: 0, cardno: "", salesid: "", salesname: "" };
        var packageitem = $(this);
        var cardno = packageitem.find("input[name=cardno]").val();
        var salesid = packageitem.find("dd[f=sales]").attr("salesid");
        var salesname = packageitem.find("dd[f=sales]").attr("name");
        var templateid = packageitem.attr("itemid");
        packageitemlist.id = templateid;
        packageitemlist.cardno = cardno;
        packageitemlist.salesid = salesid;
        packageitemlist.salesname = salesname;
        list.push(packageitemlist);
    });
    return list;
}
function maskshow(type) {
    if (type == 1) {
        $(".mask").hide();
        systemshow(0);
    } else if (type == 2) {
        $(".mask").hide();
        systemshow(1);
    } else {
        $(".mask").show();
    }
}

function systemshow(type) {
    if (type == 1) {
        //$("#indexshow").css("visibility", "hidden");
        $("#indexshow").hide();
    } else {
        //scrtop = document.body.scrollTop;
        // $('html,body').animate({ scrollTop: '' + scrtop + 'px' }, 0);
        // $("#indexshow").css("visibility", "visible");
        $("#indexshow").show();
    }
}
function Workshilist() {
    $("#Workshilist").show();
    $(".mask").hide();
    $("#addworking").hide();
    systemshow(0);
    showhtmlcss();
}
function Itionalproject() {
    $("#additionalprojectlist").show();
}
function ChongZhiShow() {
    $("#chongzhilist").show();
    $(".mask").hide();
    systemshow(0);
    showhtmlcss();
}
function MemberShipCardShow() {
    $("#membershipcardlist").show();
    $(".mask").hide();
    systemshow(0);
    showhtmlcss();
}
function PackageShow() {
    $("#packagetemplist").show();
    $(".mask").hide();
    systemshow(0);
    showhtmlcss();
}
function showhtmlcss() {
    if (
        $("#workhour").html().length > 10 ||
        $("#chongzhi").html().length > 10 ||
        $("#membershipcard").html().length > 10 ||
        $("#packagetemp").html().length > 10 ||
        $("#additionalprojectlist").html().length > 136
    ) {
        isshowboot(true);
    } else {
        isshowboot(false);
    }
}
function returnview() {
    $(".back").click(function () {
        var itemid = $(this).attr("itemid");
        if (itemid == 1) {
            maskshow(1);
        }
    });
}
function onlyfigure(input) {
    input
        .keypress(function (event) {
            var keyCode = event.which;
            if (keyCode == 46 || (keyCode >= 48 && keyCode <= 57)) return true;
            else return false;
        })
        .focus(function () {
            this.style.imeMode = "disabled";
        });
}
function substringname(name, num) {
    if (name.length > num) {
        return name.substring(0, num);
    } else {
        return name;
    }
}
function updatebottomtotal() {
    updatepric();
    updateworkhname();
    updatepartsname();
    updateitionalname();
}
function updatechongzhihtml() {
    $("#chongzhi .taocansqlist dl")
        .find("dt a[f=updatechongzhi]")
        .unbind("click");
    $("#chongzhi .taocansqlist dl")
        .find("dt a[f=deletechongzhi]")
        .unbind("click");
    $("#chongzhi .taocansqlist dl").each(function () {
        $(this)
            .find("dt a[f=updatechongzhi]")
            .click(function () {
                var customerid = $("div[name=customerinfodiv] li:first")
                    .find("a")
                    .attr("customerid");
                if (customerid == "" || customerid.length == 0) {
                    Ewewo.Tips("请输入手机号!");
                    return false;
                }
                var partsitem = $(this)
                    .parent()
                    .parent()
                    .parent()
                    .parent();
                var randomid = partsitem.attr("itemid");
                var cardno = partsitem.find("font[f=car]").attr("cardno");
                var carid = partsitem.attr("templatenameid");
                var price = partsitem.find("dd[f=partstotal]").attr("giftamount");
                var qty = partsitem.find("dd[f=partstotal]").attr("amount");
                var total = partsitem.find("dd[f=partstotal]").attr("total");
                var salesid = partsitem.find("dd[f=sales]").attr("salesid");
                var salesname = partsitem.find("dd[f=sales]").attr("name");
                var servicerecord = new Object();
                servicerecord.randomid = randomid;
                servicerecord.customersourceid = customerid;
                servicerecord.carno = cardno;
                servicerecord.iscar = carid;
                servicerecord.wxopenid = 1;
                servicerecord.price = price;
                servicerecord.qty = qty;
                servicerecord.total = total;
                servicerecord.salesid = salesid;
                servicerecord.salesname = salesname;
                var json = JSON.stringify(servicerecord);
                maskshow(2);
                $(".mask").load(
                    "/Service/ShowHtml?viewName=_ChongZhi",
                    {
                        thisobj: json
                    },
                    function () {
                        returnview();
                        masklayer(1, "加载中...");
                        $(this).show();
                    }
                );
            });
        $(this)
            .find("dt a[f=deletechongzhi]")
            .click(function () {
                var partsitem = $(this)
                    .parent()
                    .parent()
                    .parent()
                    .parent();
                partsitem.remove();
                if ($("#chongzhi .taocansqlist").length <= 0) {
                    $("#chongzhilist").hide();
                    showhtmlcss();
                }
            });
    });
}
function updatechongmembershipcard() {
    $("#membershipcard .taocansqlist dl")
        .find("dt a[f=updatemembershipcard]")
        .unbind("click");
    $("#membershipcard .taocansqlist dl")
        .find("dt a[f=deletemembershipcard]")
        .unbind("click");
    $("#membershipcard .taocansqlist dl").each(function () {
        $(this)
            .find("dt a[f=updatemembershipcard]")
            .click(function () {
                var customerid = $("div[name=customerinfodiv] li:first")
                    .find("a")
                    .attr("customerid");
                if (customerid == "" || customerid.length == 0) {
                    Ewewo.Tips("请输入手机号!");
                    return false;
                }
                var partsitem = $(this)
                    .parent()
                    .parent()
                    .parent()
                    .parent();
                var randomid = partsitem.attr("itemid");
                var cardno = partsitem.find("font[f=car]").attr("cardno");
                var carid = partsitem.find("font[f=car]").attr("itemid");
                var price = partsitem.find("dd[f=partstotal]").attr("presrent");
                var qty = partsitem.find("dd[f=partstotal]").attr("realmoney");
                var total = partsitem.find("dd[f=partstotal]").attr("total");
                var salesid = partsitem.find("dd[f=sales]").attr("salesid");
                var salesname = partsitem.find("dd[f=sales]").attr("name");
                var servicerecord = new Object();
                servicerecord.randomid = randomid;
                servicerecord.customersourceid = customerid;
                servicerecord.carno = cardno;
                servicerecord.iscar = carid;
                servicerecord.wxopenid = 0;
                servicerecord.price = price;
                servicerecord.qty = qty;
                servicerecord.total = total;
                servicerecord.salesid = salesid;
                servicerecord.salesname = salesname;
                var json = JSON.stringify(servicerecord);
                maskshow(2);
                $(".mask").load(
                    "/Service/ShowHtml?viewName=_ChongZhi",
                    {
                        thisobj: json
                    },
                    function () {
                        returnview();
                        masklayer(1, "加载中...");
                        $(this).show();
                    }
                );
            });
        $(this)
            .find("dt a[f=deletemembershipcard]")
            .click(function () {
                var partsitem = $(this)
                    .parent()
                    .parent()
                    .parent()
                    .parent();
                partsitem.remove();
                if ($("#membershipcard .taocansqlist").length <= 0) {
                    $("#membershipcardlist").hide();
                    showhtmlcss();
                }
            });
    });
}
function updatepackagehtml() {
    $("#packagetemp .taocansqlist dl")
        .find("dt a[f=deletepackge]")
        .unbind("click");
    $("#packagetemp .taocansqlist dl").each(function () {
        $(this)
            .find("dt a[f=deletepackge]")
            .click(function () {
                var partsitem = $(this)
                    .parent()
                    .parent()
                    .parent()
                    .parent();
                partsitem.remove();
                if ($("#packagetemp .taocansqlist").length <= 0) {
                    $("#packagetemplist").hide();
                    showhtmlcss();
                }
            });
    });
}
function updatepric() {
    var tdlabour = $(".shishou font[name=fontsumlabour]");
    var tdpart = $(".shishou font[name=fontsumpart]");
    var tdaitional = $(".shishou font[name=tdadditional]");
    var tdsum = $(".shishou p[name=divsum]");
    var labourtotal = 0.0;
    var parttotal = 0.0;
    var itioaltotal = 0.0;
    $("#workhour .workhour").each(function () {
        var tdtotal = $(this)
            .find("font[f=workhourtotal]")
            .attr("itemid");
        var total = tdtotal;
        if ($.trim(total) == "") {
            total = "0.0";
        }
        labourtotal += parseFloat(total);
    });

    $("#workhour .workhour .accost dl").each(function () {
        var tdtotal = $(this)
            .find("span[f=partstotal]")
            .attr("itemid");
        var total = tdtotal;
        if ($.trim(total) == "") {
            total = "0.0";
        }
        parttotal += parseFloat(total);
    });
    $("#additionalprojectlist .workhour").each(function () {
        var tdtotal = $(this)
            .find("font[f=workhourtotal]")
            .attr("itemid");
        var total = tdtotal;
        if ($.trim(total) == "") {
            total = "0.0";
        }
        itioaltotal += parseFloat(total);
    });

    var tdtax = $(".shishou font[name=taxtxtfont]");//税费
    var tdmanage = $(".shishou font[name=managetxtfont]");//管理费
    var fontlabour = tdlabour;//.attr("itemid");
    var fontpart = tdpart;//.attr("itemid");


    var taxrate = parseFloat($("#txttaxrate").val());
    taxrate = isNaN(taxrate) ? 0 : taxrate;
    var pmrate = parseFloat(TaxManage.labourrate);//工时管理费率
    var smrate = parseFloat(TaxManage.partsrate);//配件管理费率
    pmrate = isNaN(pmrate) ? 0 : pmrate;
    smrate = isNaN(smrate) ? 0 : smrate;

    var labourdiscount = parseFloat($("#txtlabourdiscount").val());//工时管理折扣比例
    labourdiscount = isNaN(labourdiscount) ? 0 : labourdiscount;


    var partsdiscount = parseFloat($("#txtpartsdiscount").val());//工时管理折扣比例
    partsdiscount = isNaN(partsdiscount) ? 0 : partsdiscount;

    var summoney = labourtotal + parttotal + itioaltotal;//总工时+总配件+总附加
    var realtax = summoney * taxrate / 100; //实算税费


    var reallabour = labourtotal * pmrate * labourdiscount / 10000;//实算工时管理费
    var realpart = parttotal * smrate * partsdiscount / 10000;//实算配件管理费
    $("#txttax").val(realtax.toFixed(2));
    $("#txtprojectmanagementcost").val(reallabour.toFixed(2));
    $("#txtstockpartmanagementcost").val(realpart.toFixed(2));
    if (TaxManage.isentrytax == true) {
        tdtax.text(realtax.toFixed(2));
    } else {
        tdtax.text("0.00");
    }

    if (TaxManage.isentrymanage == true) {
        tdmanage.text((reallabour + realpart).toFixed(2));
    } else {
        tdmanage.text("0.00");
    }
    fontlabour.attr("itemid", labourtotal.toFixed(2));
    fontpart.attr("itemid", parttotal.toFixed(2));
    fontlabour.text(labourtotal.toFixed(2));
    fontpart.text(parttotal.toFixed(2));
    if (TaxManage.isentrytax == true && TaxManage.isentrymanage == true) {
        tdsum.attr("itemid", (summoney + realtax + reallabour + realpart).toFixed(2));
        tdsum.text((summoney + realtax + reallabour + realpart).toFixed(2));
        TaxManage.labour = (reallabour == 0 ? null : reallabour);
        TaxManage.labourdiscount = (labourdiscount == 0 ? null : labourdiscount);
        TaxManage.parts = (realpart == 0 ? null : realpart);
        TaxManage.partsdiscount = (partsdiscount == 0 ? null : partsdiscount);
        TaxManage.tax = (realtax == 0 ? null : realtax);
        TaxManage.taxrate = (taxrate == 0 ? null : taxrate);
        //以下判断是为了处理当费率为0时,当做没设置处理
        if (TaxManage.taxrate == null) {
            TaxManage.isentrytax = false;
        }
        if (TaxManage.labourrate == null && TaxManage.partsrate == null) {
            TaxManage.isentrymanage = false;
        }
        if (TaxManage.partsdiscount == null && TaxManage.labourdiscount == null) {
            TaxManage.isentrymanage = false;
        }

    } else if (TaxManage.isentrytax == true) {
        tdsum.attr("itemid", (summoney + realtax).toFixed(2));
        tdsum.text((summoney + realtax).toFixed(2));
        TaxManage.tax = (realtax == 0 ? null : realtax);
        TaxManage.taxrate = (taxrate == 0 ? null : taxrate);
        if (TaxManage.taxrate == null) {
            TaxManage.isentrytax = false;
        }

    } else if (TaxManage.isentrymanage == true) {
        tdsum.attr("itemid", (summoney + reallabour + realpart).toFixed(2));
        tdsum.text((summoney + reallabour + realpart).toFixed(2));
        TaxManage.labour = (reallabour == 0 ? null : reallabour);
        TaxManage.parts = (realpart == 0 ? null : realpart);
        TaxManage.labourdiscount = (labourdiscount == 0 ? null : labourdiscount);
        TaxManage.partsdiscount = (partsdiscount == 0 ? null : partsdiscount);
        if (TaxManage.labourrate == null && TaxManage.partsrate == null && TaxManage.labourdiscount == null && TaxManage.partsdiscount == null) {
            TaxManage.isentrymanage = false;
        }

    } else {
        tdsum.attr("itemid", (summoney).toFixed(2));
        tdsum.text((summoney).toFixed(2));
    }







    tdlabour.attr("itemid", labourtotal.toFixed(2)).text(labourtotal.toFixed(2));
    tdpart.attr("itemid", parttotal.toFixed(2)).text(parttotal.toFixed(2));
    tdaitional
        .attr("itemid", itioaltotal.toFixed(2))
        .text(itioaltotal.toFixed(2));
    /* tdsum
         .attr("itemid", (parttotal + labourtotal + itioaltotal).toFixed(2))
         .find("font")
         .text((parttotal + labourtotal + itioaltotal).toFixed(2));*/
}

function updateworkhname() {
    $("#workhour .workhour").find(".wh1").unbind("click");
    $("#workhour .workhour").find(".wh2").unbind("click");
    $("#workhour .workhour").find(".wh3").unbind("click");
    $("#workhour .workhour").each(function () {
        $(this).find(".wh1").click(function () {
            var workitem = $(this).parent().parent();
            var randomid = workitem.attr("itemid");
            var price = workitem.find("dt font").attr("price");
            var vipprice = workitem.find("dt font").attr("vipprice");
            var qty = workitem.find("dt font").attr("qty");
            var name = $.trim(workitem.find("dt").attr("name"));
            var total = workitem.find("dd font").attr("itemid");
            var operaterid = workitem.find("dd em[f=operater]").attr("workeemployeeid");
            var operatername = workitem.find("dd em[f=operater]").text();
            var salesid = workitem.find("dd em[f=sales]").attr("salesid");
            var salesname = workitem.find("dd em[f=sales]").text();
            var discount = workitem.find("dt font").attr("discount");
            var chargetype = workitem.find("dt font").attr("chargetype");
            var typename = workitem.find("dd font").attr("typename");
            var servicetypeid = workitem.find("dd font").attr("servicetypeid");
            var spentime = workitem.find("dd em[f=operater]").attr("spentime");
            var projectid = workitem.attr("projectid");
            if (projectid == undefined) {
                projectid = 0;
            }
            var servicerecord = new Object();
            servicerecord.randomid = randomid;
            servicerecord.price = price;
            servicerecord.vipprice = vipprice == "null" ? 0 : vipprice;
            servicerecord.qty = qty;
            servicerecord.name = name;
            servicerecord.total = total;
            servicerecord.operaterid = operaterid;
            servicerecord.operatername = operatername;
            servicerecord.salesid = salesid;
            servicerecord.salesname = salesname;
            servicerecord.typename = typename;
            servicerecord.servicetypeid = servicetypeid;
            servicerecord.discount = discount;
            servicerecord.projectid = projectid;
            servicerecord.spentime = spentime;
            servicerecord.chargetype = chargetype == "undefined" ? "1" : chargetype;
            var json = JSON.stringify(servicerecord);
            maskshow(2);
            masklayer(0, "加载中...");
            $(".mask").load("/Service/ShowHtml?viewName=_UpdateWorkingView", {
                thisobj: json
            },
                function () {
                    returnview();
                    masklayer(1, "加载中...");
                    $(this).show();
                });
        });
        $(this).find(".wh2").click(function () {
            var workitem = $(this).parent().parent();
            workitem.remove();
            updatepric();
            if ($("#workhour .workhour").length <= 0) {
                $("#Workshilist").hide();
                showhtmlcss();
            }
        });
        $(this).find(".wh3").click(function () {
            var customerid = $("div[name=customerinfodiv] li:first").find("a").attr("customerid");
            var workitem = $(this).parent().parent();
            var randomid = workitem.attr("itemid");
            var servicerecord = new Object();
            servicerecord.randomid = randomid;
            servicerecord.id = customerid;
            servicerecord.cardid = $("#txtcarno").attr("carid");
            var json = JSON.stringify(servicerecord);
            maskshow(2);
            masklayer(0, "加载中...");
            $(".mask").load("/Service/ShowHtml?viewName=_PartsView", {
                thisobj: json
            },
                function () {
                    returnview();
                    masklayer(1, "加载中...");
                    $(this).show();
                });
        });
    });
}
function updatepartsname() {
    $("#workhour .workhour .accost dl").find("dt font a[f=updateparts]").unbind("click");
    $("#workhour .workhour .accost dl").find("dt font a[f=deleteparts]").unbind("click");
    $("#workhour .workhour .accost dl").each(function () {
        $(this).find("dt font a[f=updateparts]").click(function () {
            var partsitem = $(this).parent().parent().parent();
            var randomid = partsitem.attr("itemid");
            var price = partsitem.find("dd").attr("price");
            var vipprice = partsitem.find("dd").attr("vipprice");
            var qty = partsitem.find("dd").attr("qty");
            var discount = partsitem.find("dd").attr("discount");
            var name = $.trim(partsitem.find("dt").attr("name"));
            var total = partsitem.find("dd span[f=partstotal]").attr("itemid");
            var salesid = partsitem.find("dd span[f=sales]").attr("salesid");
            var salesname = partsitem.find("dd span[f=sales]").attr("name");
            var typename = partsitem.find("dd").attr("projecttype");
            var categoryid = partsitem.find("dd").attr("categoryid");
            var parentcategoryid = partsitem.find("dd").attr("parentcategoryid");
            var chargetype = partsitem.find("dd").attr("chargetype");
            //lixuan add 2018-11-1
            var stockno = partsitem.attr("stockno");

            var servicerecord = new Object();
            servicerecord.randomid = randomid;
            servicerecord.price = price;
            servicerecord.vipprice = vipprice;
            servicerecord.qty = qty;
            servicerecord.discount = discount;
            servicerecord.name = name;
            servicerecord.total = total;
            servicerecord.salesid = salesid;
            servicerecord.salesname = salesname;
            servicerecord.typename = typename;
            servicerecord.categoryid = categoryid;
            servicerecord.parentcategoryid = parentcategoryid;
            servicerecord.stockno = stockno;//lixuan add 2018-11-1
            servicerecord.chargetype = chargetype == "undefined" ? "1" : chargetype;
            var json = JSON.stringify(servicerecord);
            maskshow(2);
            masklayer(0, "加载中...");
            $(".mask").load("/Service/ShowHtml?viewName=_UpdatePartsView", {
                thisobj: json
            },
                function () {
                    returnview();
                    masklayer(1, "加载中...");
                    $(this).show();
                });
        });
        $(this).find("dt font a[f=deleteparts]").click(function () {
            var partsitem = $(this).parent().parent().parent();
            partsitem.remove();
            updatepric();
        });
    });
}
function updateitionalname() {
    $("#additionalprojectlist .workhour").find(".wh1").unbind("click");
    $("#additionalprojectlist .workhour").find(".wh2").unbind("click");
    $("#additionalprojectlist .workhour").each(function () {
        $(this).find(".wh1").click(function () {
            var workitem = $(this).parent().parent().parent().parent();
            var randomid = workitem.attr("itemid");
            var price = workitem.find("dd font").attr("price");
            var qty = workitem.find("dd font").attr("qty");
            var name = $.trim(workitem.find("dt").attr("name"));
            var total = workitem.find("dd font").attr("itemid");
            var discount = workitem.find("dd font").attr("discount");
            var no = $.trim(workitem.find("dt").attr("no"));
            var comment = workitem.find("dd font").attr("comment");
            var servicerecord = new Object();
            servicerecord.randomid = randomid;
            servicerecord.price = price;
            servicerecord.qty = qty;
            servicerecord.name = name;
            servicerecord.total = total;
            servicerecord.carno = no;
            servicerecord.discount = discount;
            servicerecord.remaining = comment;
            var json = JSON.stringify(servicerecord);
            maskshow(2);
            masklayer(0, "加载中...");
            $(".mask").load("/Service/ShowHtml?viewName=_UpdateItionaprojectView", {
                thisobj: json
            },
                function () {
                    returnview();
                    masklayer(1, "加载中...");
                    $(this).show();
                });
        });
        $(this).find(".wh2").click(function () {
            var workitem = $(this).parent().parent().parent().parent();
            workitem.remove();
            updatepric();
            if ($("#additionalprojectlist .workhour").length <= 0) {
                $("#additionalprojectlist").hide();
                showhtmlcss();
                if ($("#workhour .workhour").length <= 0) {
                    $("#Workshilist").hide();
                }
            }
        });
    });
}

function shishou() {
    var tdlabour = $(".shishou font[name=fontsumlabour]");
    var tdpart = $(".shishou font[name=fontsumpart]");
    var tdsum = $(".shishou p[name=divsum]");
    var trlbour = $(".mask_div tr[name=trsumlabour]");
    var trpart = $(".mask_div tr[name=trsumpart]");
    var trsum = $(".mask_div tr[name=trsum]");
    /* $(".shishou a").click(function () {
         $(".mask_div,.mask_box").show();
         mask_box(".mask_div");
         var slabour = trlbour.find("td").eq(1).find("s");
         var spart = trpart.find("td").eq(1).find("s");
         var ssum = trsum.find("td").eq(1).find("s");
         var txtlabour = trlbour.find("td").eq(2).find("input");
         var txtpart = trpart.find("td").eq(2).find("input");
         var txtsum = trsum.find("td").eq(2);
         slabour.text(tdlabour.attr("itemid"));
         spart.text(tdpart.attr("itemid"));
         ssum.text(tdsum.attr("itemid"));
         txtlabour.val(tdlabour.text());
         txtpart.val(tdpart.text());
         txtsum.text(tdsum.find("font").text());
     });*/
    $(".mask_div .mask_btn a").click(function () {
        $(".mask_box,.mask_div").hide();
    });
    $(".mask_div .mask_btn a").eq(1).click(function () {
        var txtlabour = trlbour.find("td").eq(2).find("input");
        var txtpart = trpart.find("td").eq(2).find("input");
        var txtsum = (parseFloat(txtlabour.val()) + parseFloat(txtpart.val())).toFixed(2);
        tdlabour.attr("itemid", txtlabour.val()).text(txtlabour.val());
        tdpart.attr("itemid", txtpart.val()).text(txtpart.val());
        tdsum.attr("itemid", txtsum).find("span").text(txtsum);
    });
    trlbour.find("td").eq(2).find("input").on("input",
        function () {
            var lbour = parseFloat($(this).val());
            var part = parseFloat(trpart.find("td").eq(2).find("input").val());
            var txtsum = trsum.find("td").eq(2);
            txtsum.text((lbour + part).toFixed(2));
        });
    trpart.find("td").eq(2).find("input").on("input",
        function () {
            var part = parseFloat($(this).val());
            var lbour = parseFloat(trlbour.find("td").eq(2).find("input").val());
            var txtsum = trsum.find("td").eq(2);
            txtsum.text((lbour + part).toFixed(2));
        });
    onlyfigure(trlbour);
    onlyfigure(trpart);
}
function onlyfigure(input) {
    input
        .keypress(function (event) {
            var keyCode = event.which;
            if (keyCode == 46 || (keyCode >= 48 && keyCode <= 57)) return true;
            else return false;
        })
        .focus(function () {
            this.style.imeMode = "disabled";
        });
}
function mask_box(id) {
    $(".mask_box").click(function () {
        $(".mask_box").hide();
        $(id).hide();
    });
}
function getRandom(n) {
    return Math.floor(Math.random() * n + 1);
}
function yuangong() {
    $(".yuangong ul li")
        .find("a")
        .click(function () {
            $(this).toggleClass("ygxz");
            if ($(this).is(".ygxz")) {
                var employeeid = $(this).attr("itemid");
                var ddoperater = $("a[f=operater]");
                var workeemployeeid = ddoperater.attr("workeemployeeid");
                var ddoperateritemid = ddoperater.attr("itemid");
                var ddopershowname = ddoperater.attr("itemtype");
                ddoperater.attr("workeemployeeid", workeemployeeid + "|" + employeeid);
                //var list = ddoperater.attr("workeemployeeid").split("|");
                var list = (ddoperater.attr("workeemployeeid") || "").split('|');

                var fullname = "";
                $(".yuangong ul li")
                    .find("a[class=ygxz]")
                    .each(function () {
                        for (var i = 0; i < list.length; i++) {
                            if ($(this).attr("itemid") == list[i]) {
                                if (fullname == "") {
                                    fullname = $.trim($(this).text());
                                } else if (fullname.length < 6) {
                                    fullname += "," + $.trim($(this).text());
                                } else {
                                    if (fullname.indexOf("...") < 0) {
                                        fullname = fullname + "...";
                                    }
                                }
                            }
                        }
                    });
                if (ddoperater.attr("additem") == 1) {
                    ddoperater
                        .find("span")
                        .text(fullname)
                        .css("color", "#555");
                } else if (ddoperater.attr("additem") == 3) {
                    //ddoperater.find("input").val(fullname);
                    ddoperater.find("input[name=salename]").val(fullname)
                } else {
                    ddoperater.text(fullname);
                }
                if (ddoperateritemid > 0) {
                    if (ddopershowname == "1") {
                        $(".item_title")
                            .find("dd")
                            .find("font[lang=" + ddoperateritemid + "]")
                            .attr("operaterid", ddoperater.attr("workeemployeeid"))
                            .attr("operatername", fullname);
                    } else {
                        $(".item_title")
                            .find("dd")
                            .find("font[lang=" + ddoperateritemid + "]")
                            .attr("salesid", ddoperater.attr("workeemployeeid"))
                            .attr("salesname", fullname);
                    }
                }
            } else {
                var employeeid = $(this).attr("itemid");
                var ddoperater = $("a[f=operater]");
                var list = ddoperater.attr("workeemployeeid").split("|");
                var ddoperateritemid = ddoperater.attr("itemid");
                var ddopershowname = ddoperater.attr("itemtype") == "1" ? "施工员" : "销售员";

                var fullname = "";
                $(".yuangong ul li")
                    .find("a[class=ygxz]")
                    .each(function () {
                        for (var i = 0; i < list.length; i++) {
                            if ($(this).attr("itemid") == list[i]) {
                                if (fullname == "") {
                                    fullname = $.trim($(this).text());
                                } else if (fullname.length < 6) {
                                    fullname += "," + $.trim($(this).text());
                                } else {
                                    if (fullname.indexOf("...") < 0) {
                                        fullname = fullname + "...";
                                    }
                                }
                            }
                        }
                    });
                if (ddoperater.attr("additem") == 1) {
                    ddoperater.find("span").text(fullname == "" ? "请选择" : fullname);
                } else if (ddoperater.attr("additem") == 3) {
                    //ddoperater.find("input").val(fullname == "" ? "销售员" : fullname);
                    ddoperater.find("input[name=salename]").val(fullname == "" ? "销售员" : fullname)
                } else {
                    ddoperater.text(fullname == "" ? ddopershowname : fullname);
                }
                ddoperater.attr(
                    "workeemployeeid",
                    ddoperater.attr("workeemployeeid").replace("|" + employeeid, "")
                );
                if (ddoperateritemid > 0) {
                    if (ddopershowname == "1") {
                        $(".item_title")
                            .find("dd")
                            .find("font[lang=" + ddoperateritemid + "]")
                            .attr("operaterid", ddoperater.attr("workeemployeeid"))
                            .attr("operatername", fullname);
                    } else {
                        $(".item_title")
                            .find("dd")
                            .find("font[lang=" + ddoperateritemid + "]")
                            .attr("salesid", ddoperater.attr("workeemployeeid"))
                            .attr("salesname", fullname);
                    }
                }
            }
        });
}
function getcurrenwx() {
    var customerid = $("div[name=customerinfodiv] li:first")
        .find("a")
        .attr("customerid");
    var mobile = $.trim(
        $("div[name=customerinfodiv] li:first")
            .find("a font")
            .text()
    );
    if (mobile == "无手机号") {
        $("#SendDx").hide();
        $("#senddxchat").show();
    } else {
        $("#SendDx").show();
        $("#senddxchat").hide();
    }
    $.ajax({
        type: "POST",
        data: { customerid: customerid },
        url: "/Service/IsWxUser",
        dataType: "json",
        success: function (data) {
            if (data.result == 1) {
                $("#SendWeChat").show();
                $("#sendwenotchat")
                    .attr("itemid", 1)
                    .hide();
            } else {
                $("#SendWeChat").hide();
                $("#sendwenotchat")
                    .attr("itemid", 0)
                    .show();
            }
        },
        error: function (msg) {
            Ewewo.Tips_Error("网络错误,获取服务记录状态不成功!");
        },
        complete: function () {
            $("#divstatus,.mask_box").show();
            mask_box("#divstatus");
        }
    });
}

function isshowboot(ishow) {
    if (ishow) {
        $(".fw_addmenu_right a").removeClass("hui");
    } else {
        $(".fw_addmenu_right a").addClass("hui");
    }
}

function ChangeDateFormat(jsondate) {
    if (jsondate == "" || jsondate == null) {
        return "";
    }
    jsondate = jsondate.replace("/Date(", "").replace(")/", "");
    if (jsondate.indexOf("+") > 0) {
        jsondate = jsondate.substring(0, jsondate.indexOf("+"));
    } else if (jsondate.indexOf("-") > 0) {
        jsondate = jsondate.substring(0, jsondate.indexOf("-"));
    }

    var date = new Date(parseInt(jsondate, 10));
    var month =
        date.getMonth() + 1 < 10
            ? "0" + (date.getMonth() + 1)
            : date.getMonth() + 1;
    var currentDate = date.getDate() < 10 ? "0" + date.getDate() : date.getDate();
    return date.getFullYear() + "-" + month + "-" + currentDate;
}

function closewindow(carno, customerid, mobile, carid) {

    getdiscountvule(customerid);
    $(".fwadd_car dd:first").find("a").css("background", "none").attr("carid", 0).attr("carname", carno).find("font").html(carno);
    // $(".fwadd_info li:first").find('a').find("font").html(mobile);
    getcustomerinfo(carno, mobile, customerid);
    getlevelcarddiscount(carno, carid);
    $("#phonecomment,.three").show();
    if (customerid != "" && customerid != 0) {
        getvipinfo(customerid, carid);
        if ($(".fwadd_car").attr("itemid") == "0") {
            getpendingservicerecord(customerid, mobile);
        }
    }
    maskshow(1);
}
function getcustomerinfo(carno, mobile, customerid) {
    $.ajax({
        type: "POST",
        data: {
            carno: carno,
            mobile: mobile,
            customerId: customerid
        },
        url: getCustomerinfobykeyword,
        dataType: "json",
        success: function (data) {
            if (data.result == "T") {
                TaxManage.partsrate = data.info.smcrate;
                TaxManage.labourrate = data.info.pmcrate;
                if (data.info.vip != null && data.info.vip == true) {
                    $("div[name=customerinfodiv] li:first").find("a").attr("mobile", mobile).attr("customerid", customerid).attr("isvip", 1).find("font").html(mobile.length == 18 ? "无手机号" : mobile)
                } else {
                    $("div[name=customerinfodiv] li:first").find("a").attr("mobile", mobile).attr("customerid", customerid).attr("isvip", 0).find("font").html(mobile.length == 18 ? "无手机号" : mobile)
                }
                if (data.info.wxopenid == "") {
                    $("div[name=customerinfodiv] li:first").find("a font").attr("title", "微信未注册").addClass("iswx").removeClass("iswx2")
                } else {
                    $("div[name=customerinfodiv] li:first").find("a font").attr("title", "微信已注册").addClass("iswx2").removeClass("iswx")
                }
                $("#txtcustomername").val(data.info.customerName).css("color", "#999");
                if (data.info.carId != 0) {
                    $("#txtcarno").attr("carid", data.info.carId);
                    if (data.info.maintainReport == null || data.info.maintainReport.AfterScore == null) {
                        $("#maintainreport").html("车况：<font>无</font>").attr("href", "/carcheck/maintainreport?customerstoreitemid=" + data.info.customerStoreItemId + "&carid=" + data.info.carId + "&isnew=0&templateid=0&reportid=0&carno=" + carno + "&iswx=" + (data.info.wxopenid == "" ? 0 : 1))
                    } else {
                        $("#maintainreport").html("车况：<font>" + data.info.maintainReport.AfterScore + "</font>").attr("href", "/carcheck/maintainreport?customerstoreitemid=" + data.info.customerStoreItemId + "&carid=" + data.info.carId + "&isnew=0&templateid=0&reportid=" + data.info.maintainReport.Id + "&carno=" + carno + "&iswx=" + (data.info.wxopenid == "" ? 0 : 1))
                    }
                } else {
                    $("#maintainreport").html("车况：<font>无</font>").attr("href", "javascript:void(0)")
                }
                var txtbrand = data.info.brandName == null ? "" : data.info.brandName;
                var txtline = data.info.lineName == null ? "" : data.info.lineName;
                var txtmodelyear = data.info.yearModel == null ? "" : data.info.yearModel;
                var txtmodel = data.info.carModel == null ? "" : data.info.carModel;
                var vin = data.info.vin == null ? "" : data.info.vin;
                if (txtbrand != "" || txtline != "" || txtmodelyear != "" || txtmodel != "") {
                    $(".fwadd_car dd").eq(1).find("a").css("background", "none").find("font").attr("brand", data.info.brandId).attr("line", data.info.lineId).attr("modelyear", data.info.modelYear).attr("model", data.info.modelId).attr("brandname", txtbrand).attr("linename", txtline).attr("modelyearname", txtmodelyear).attr("modelname", txtmodel).attr("vin", vin).html(txtbrand + "  " + txtline + "  " + txtmodelyear + "  " + txtmodel)
                }
            }
        }
    })
}
String.prototype.ToString = function (format) {
    if (this == null) {
        return "";
    }
    var dateTime = new Date(parseInt(this.substring(6, this.length - 2)));
    format = format.replace("yyyy", dateTime.getFullYear());
    format = format.replace("yy", dateTime.getFullYear().toString().substr(2));
    format = format.replace("MM", dateTime.getMonth() + 1)
    format = format.replace("dd", dateTime.getDate());
    format = format.replace("hh", dateTime.getHours());
    format = format.replace("mm", dateTime.getMinutes());
    format = format.replace("ss", dateTime.getSeconds());
    format = format.replace("ms", dateTime.getMilliseconds())
    return format;
};

function getvipinfo(customerid, carid) {
    $.ajax({
        type: "POST",
        data: {
            customerId: customerid,
            carId: carid
        },
        url: getvipinfo_url,
        dataType: "json",
        success: function (data) {
            if (data.result == "T") {
                $("#timespackage").empty();
                if (data.timespackage.length > 0) {
                    for (var i = 0; i < data.timespackage.length; i++) {
                        $("#timespackage").append('<tr labourprojectid="' + (data.timespackage[i].LabourProjectId == null ? 0 : data.timespackage[i].LabourProjectId) + '" stockpartsid="' + (data.timespackage[i].StockPartsId == null ? 0 : data.timespackage[i].StockPartsId) + '" remaindtimes="' + data.timespackage[i].RemaindTimes + '">' + '<td align="left">' + data.timespackage[i].Name + (data.timespackage[i].IsShareProject == true ? '<span style=\"font-size:18px; color:#999;\">&nbsp;(通配配件)</span>' : '') + "<span style=\"color: #32b400;font-size:18px; color:#999;\">(" + (data.timespackage[i].ExpirationDate == null ? "长期有效" : data.timespackage[i].ExpirationDate.ToString("yyyy-MM-dd")) + ")</span>" + "</td>" + '<td  width="80" align="center" class="color999">' + (data.timespackage[i].LabourProjectId != null ? "工时" : data.timespackage[i].StockPartsId != null ? "配件" : "") + "</td>" + '<td  width="80" align="center">' + (data.timespackage[i].IsLimitTimes == 0 ? "" : data.timespackage[i].TotalTimes - data.timespackage[i].RemaindTimes) + "</td>" + '<td width="100" align="center"><span style="color: #32b400;">' + (data.timespackage[i].IsLimitTimes != null && data.timespackage[i].IsLimitTimes == 0 ? "不限次数" : data.timespackage[i].RemaindTimes) + "</span></td>" + '<td width="100" align="center"><span style="color: #32b400;">' + (data.timespackage[i].LabourProjectId != null && (data.timespackage[i].ExpirationDate == null || comparetime(data.timespackage[i].ExpirationDate.ToString("yyyy/MM/dd"))) && (data.timespackage[i].IsLimitTimes == 0 || data.timespackage[i].RemaindTimes != 0) ? "<a href='javascript:;'lang='" + data.timespackage[i].LabourProjectId + "' total='" + data.timespackage[i].ProjectPrice + "' salesname='销售员' salesid=''operatername='施工员'  operaterid='' typename='保养' qty='1' price='" + data.timespackage[i].ProjectPrice + "' vipprice='" + data.timespackage[i].VipPrice + "'  servicetypeid='" + data.timespackage[i].ServiceTypeId + "'    discount='100' name='" + data.timespackage[i].Name + "' itemid='" + data.timespackage[i].LabourProjectId + "'  class='addtcxm'><font></font></a>" : "") + "</span></td>" + "</tr>");
                    }
                    selectprojectitem();
                } else {
                    $("#timespackage").append('<tr><td colspan="4" align="center" style="height: 360px; border: 0; color: #999; font-size: 32px;">暂无次卡套餐项目</td> </tr>');
                }
                $("#textpackagelist").empty();
                if (data.textpackage.length > 0) {
                    for (var i = 0; i < data.textpackage.length; i++) {
                        $("#textpackagelist").append("<tr>" + '<td align="left"><b>剩余</b>&nbsp;' + (data.textpackage[i].Comment == null ? "" : data.textpackage[i].Comment) + "</td>" + "</tr>");
                    }
                } else {
                    $("#textpackagelist").append('<tr> <td colspan="4" align="center" style="height: 320px; border: 0; color: #999; font-size: 32px;">暂无文本套餐项目</td></tr>');
                }
                $("#vipcardlist").empty();
                if (data.card.length > 0) {
                    for (var i = 0; i < data.card.length; i++) {
                        $("#vipcardlist").append("<tr>" + '<td align="left">' + data.card[i].CardNo + "<br />(" + data.card[i].TemplateName + ")</td>" + '<td width="150" align="center" >' + ChangeDateFormat(data.card[i].OpenCardTime) + "</td>" + '<td width="130" align="center">' + (data.card[i].ExpirationDate == null ? "长期有效" : ChangeDateFormat(data.card[i].ExpirationDate)) + "</td>" + '<td width="120" align="center"><span style="color: #ff6600;">¥' + data.card[i].Amount + "</span></td>" + "</tr>");
                    }
                } else {
                    $("#vipcardlist").append('<tr><td colspan="4" align="center" style="height: 320px; border: 0; color: #999; font-size: 32px;">暂无储值卡</td> </tr>');
                }
                $("#timespackagecount").text("(" + data.timespackage.length + ")");
                $("#textpackagecount").text("(" + data.textpackage.length + ")");
                $("#cardcount").text("(" + data.card.length + ")");
                $("#creditmoney").text(data.creditmoney.toFixed(2));
            }
          
        },
        error: function () { }
    });
}
function comparetime(str) {
    if (str == '') {
        return true;
    }
    var d = new Date(str);
    var nowtime = new Date();
    if (d >= nowtime) {
        return true;
    }
    return false;

}

function getpendingservicerecord(customerid, mobile) {
    $.ajax({
        type: "POST",
        data: {
            customerId: customerid
        },
        url: getpendingservicerecord_url,
        dataType: "json",
        success: function (data) {
            if (data.result == "T") {
                $("#pending .mask_btn a").eq(0).attr("href", service_recordlist + "?start=" + data.data.CreateTime.ToString("yyyy-MM-01") + "&end=" + serviceend + "&status=" + servicestatusvule + "&keyword=" + mobile);
                $("#pending,.mask_box").show();

                mask_box("#pending");
            }
        },
        error: function () { }
    });
}

function spackageinfo() {
    $("#timespackagecount").text("(0)");
    $("#textpackagecount").text("(0)");
    $("#cardcount").text("(0)");
    $("#creditmoney").text("0.00");
    $("#timespackage").empty().append('<tr><td colspan="4" align="center" style="height: 360px; border: 0; color: #999; font-size: 32px;">暂无次卡套餐项目</td> </tr>');
    $("#textpackagelist").empty().append('<tr> <td colspan="4" align="center" style="height: 320px; border: 0; color: #999; font-size: 32px;">暂无文本套餐项目</td></tr>');
    $("#vipcardlist").empty().append('<tr><td colspan="4" align="center" style="height: 320px; border: 0; color: #999; font-size: 32px;">暂无储值卡</td> </tr>');
}

function assemblyhtml(wid, randomid, total, salesname, salesid, operatername, operaterid, typename, name, qty, price, vipprice, servicetypeid, discount, reducemoney, chargetype, chargetypename) {
    var canaddparts = $(".sure").attr("canaddparts") || 1;
    discount = discount == "" ? 100 : discount;
    var defaultprice = price;
    var newdiscount = computediscount(true, servicetypeid, null, null, price, (vipprice == "" ? 0 : vipprice), discount);
    price = parseFloat(price) * parseFloat(labourweight);
    newdiscount.price = parseFloat(newdiscount.price) * parseFloat(labourweight);
    total = newdiscount.price * parseFloat(qty);
    discount = newdiscount.discount;
    var htmlsb = "<div itemid='" + randomid + "' wid='" + wid + "' class='workhour'><dl f='working'><dt name='" + name + "' ><font defaultprice='" + defaultprice + "' price='" + price + "' vipprice='" + vipprice + "' qty='" + qty + "' discount='" + discount + "' chargetype='" + chargetype + "' chargetypename='" + chargetypename + "'>" + price + " * " + qty + (discount == 100 ? "" : "*<font style='color:#ff6600;'>" + discount + "折</font>") + "</font>" + substringname(name, 20) + "<span class='zp'>" + chargetypename + "</span></dt>";
    htmlsb += "<dd><font f='workhourtotal' typename='" + typename + "' servicetypeid='" + servicetypeid + "'  itemid='" + total.toFixed(2) + "'>¥" + total.toFixed(2) + "</font>施工人:<em f='operater' workeemployeeid='" + operaterid + "' >" + operatername + "</em>&nbsp;&nbsp;销售员:<em f='sales' salesid='" + salesid + "'>" + salesname + "</em></dd></dl>";
    htmlsb += "<ul>";
    htmlsb += "<li class='wh1'><a href='javascript:;'><font>修改</font></a></li>";
    htmlsb += " <li class='wh2'><a href='javascript:;'><font>删除</font></a></li>";
    if (canaddparts > 0) {
        htmlsb += "<li class='wh3'><a href='javascript:;'><font>添加配件</font></a></li>";
    }
    htmlsb += "</ul>";
    htmlsb += "<div itemid=" + randomid + " class='accost'></div>";
    htmlsb += "</div>";
    $("#workhour").append(htmlsb);
    Workshilist();
}

function selectprojectitem() {
    $("#timespackage .addtcxm").click(function () {
        var wid = $(this).attr("itemid");
        var name = $(this).attr("name");
        var isshowwork = $("#workhour div[wid=" + wid + "]").size();
        if (isshowwork == 0) {
            var discount = $("#txtdiscount").attr("labourdiscount");
            var price = $(this).attr("price");
            var vipprice = $(this).attr("vipprice");
            var qty = $(this).attr("qty");
            var typename = $(this).attr("typename");
            var operaterid = $(this).attr("operaterid");
            var operatername = $(this).attr("operatername");
            var salesid = $(this).attr("salesid");
            var salesname = $(this).attr("salesname");
            var servicetypeid = $(this).attr("servicetypeid");
            var total = parseFloat(price) * parseFloat(qty) * parseFloat(discount) / 100;
            var randomid = getRandom(9999);
            assemblyhtml(wid, randomid, total, salesname, salesid, operatername, operaterid, typename, name, qty, price, vipprice, servicetypeid, discount, "", 1, "自费");
            updatebottomtotal();
        } else {
            Ewewo.Tips("已存在工时项目：" + name + "!");
            return false;
        }
    });
}


function getlevelcarddiscount(carno, carid) {
    var gongxiproje = $("#workhour div[class=workhour]").length;
    if (gongxiproje > 0) {
        masklayer(0, "加载数据中...");
    }
    if (carno == "") {
        levelCardDiscount = "";
        if (openlevel == 1) {
            getcarlevelweight(carid);
        }
        else {
            masklayer(1, "加载数据中...");
        }
    } else {
        $.ajax({
            type: "POST",
            data: { carNo: carno },
            url: service_levelcarddiscount,
            dataType: "json",
            success: function (data) {
                levelCardDiscount = data.LevelCardDiscount;
                if (openlevel == 1) {
                    getcarlevelweight(carid);
                }
                else {
                    masklayer(1, "加载数据中...");
                }
            },
            error: function () {
                Ewewo.Tips_Error("获取等级卡折扣失败");
                levelCardDiscount = "";
                if (openlevel == 1) {
                    getcarlevelweight(carid);
                }
                else {
                    masklayer(1, "加载数据中...");
                }
            }
        });
    }
}

//车辆等级加价率
function getcarlevelweight(carid) {
    if (carid == "" || carid == 0) {
        partweight = 1;
        labourweight = 1;
        resetcalculationprice();
    }
    else {
        $.ajax({
            type: "POST",
            data: { carid: carid },
            url: getcarlevelweight_url,
            dataType: "json",
            success: function (data) {
                partweight = data.PartWeight;
                labourweight = data.LabourWeight;
                resetcalculationprice();
            },
            error: function () {
                partweight = 1;
                labourweight = 1;
                resetcalculationprice();
            }
        });
    }


}

//全新计算价格
function resetcalculationprice() {
    var discount = $("#txtdiscount").attr("labourdiscount");
    var stockdiscount = $("#txtdiscount").attr("stockdiscount");
    $("#workhour div[class=workhour]").each(function () {
        discount = discount == "" ? 100 : discount;
        var price = $(this).find("dl[f=working] dt font").attr("defaultprice");
        var vipprice = $(this).find("dl[f=working] dt font").attr("vipprice");
        var qty = $(this).find("dl[f=working] dt font").attr("qty");
        var total = parseFloat(price) * parseFloat(qty) * parseFloat(discount) / 100;
        var servicetypeid = $(this).find("dd font[f=workhourtotal]").attr("servicetypeid");
        var newdiscount = computediscount(true, servicetypeid, null, null, price, (vipprice == "" ? 0 : vipprice), discount);
        price = parseFloat(price) * parseFloat(labourweight);
        newdiscount.price = parseFloat(newdiscount.price) * parseFloat(labourweight);
        total = newdiscount.price * parseFloat(qty);
        discount = newdiscount.discount;
        $(this).find("dl[f=working] dt font").attr("price", price).attr("qty", qty).attr("vipprice", vipprice).attr("discount", discount).html(price + "*" + qty + (discount == 100 ? "" : "*<font style='color:#ff6600;'>" + discount + "折</font>"))
        $(this).find("dd font[f=workhourtotal]").attr("itemid", total).html("¥" + total);
        $(this).find("div[class=accost] dl").each(function () {
            stockdiscount = stockdiscount == "" ? 100 : stockdiscount;
            var categoryid = $(this).find("dd").attr("categoryid");
            var parentcategoryid = $(this).find("dd").attr("parentcategoryid");
            var stockprice = $(this).find("dd").attr("defaultprice");
            var stockvipprice = $(this).find("dd").attr("vipprice");
            var stockqty = $(this).find("dd").attr("qty");
            var stocktotal = parseFloat(stockprice) * parseFloat(stockqty) * parseFloat(stockdiscount) / 100;
            var stocknewdiscount = computediscount(false, null, categoryid, parentcategoryid, stockprice, parseFloat((stockvipprice == "" ? 0 : stockvipprice)), stockdiscount);
            stockprice = parseFloat(stocknewdiscount.price) * parseFloat(partweight);
            stocknewdiscount.price = parseFloat(stocknewdiscount.price) * parseFloat(partweight);
            stocktotal = stocknewdiscount.price * parseFloat(stockqty);
            stockdiscount = stocknewdiscount.discount;
            $(this).find("dd").attr("price", stockprice).attr("vipprice", stockvipprice).attr("qty", stockqty).attr("discount", stockdiscount);
            $(this).find("dd span:eq(0)").html(stockprice + "*" + stockqty + (stockdiscount == 100 ? "" : "*<font style='color:#ff6600;'>" + stockdiscount + "折</font>"));
            $(this).find("dd span[f=partstotal]").attr("itemid", stocktotal).html("¥" + stocktotal);
        });
    });
    updatebottomtotal();
    masklayer(1, "加载数据中...");
}

function computediscount(islabour, labourcategoryid, stockpartcategoryid, parentstockpartcategoryid, price, vipprice, discount) {
    price = price == "" ? 0 : price;
    vipprice = vipprice == "" ? price : vipprice;
    parentstockpartcategoryid = parentstockpartcategoryid == "null" ? null : parentstockpartcategoryid;
    if (levelCardDiscount == "" || (islabour == true && labourcategoryid == 0 && stockpartcategoryid == null && parentstockpartcategoryid == null) ||
        (islabour == false && labourcategoryid == null && (stockpartcategoryid == 0 && (parentstockpartcategoryid == 0 || parentstockpartcategoryid == null)))) {
        return { price: (parseFloat(price) * parseFloat(discount) / 100).toFixed(2), discount: parseFloat(discount).toFixed(4) };
    }
    var newprice = parseFloat(price) * parseFloat(discount) / 100;
    var newdiscount = discount;
    var list = levelCardDiscount;
    if (islabour == true) {//工时
        for (var i = 0; i < list.length; i++) {
            if (list[i].IsLabour == true && list[i].LabourCategoryId == labourcategoryid) {
                if (list[i].IsVipPrice == true) {
                    if (parseFloat(vipprice) <= (parseFloat(price) * parseFloat(discount) / 100)) {
                        newprice = parseFloat(vipprice);
                        newdiscount = parseFloat(price) == 0 ? 0 : newprice / parseFloat(price) * 100;
                    }
                    else if (parseFloat(vipprice) > (parseFloat(price) * parseFloat(discount) / 100)) {
                        newprice = (parseFloat(price) * parseFloat(discount) / 100);
                        newdiscount = discount;
                    }
                }
                else {
                    if (parseFloat((list[i].Discount == null ? 100 : list[i].Discount)) <= parseFloat(discount)) {
                        newprice = parseFloat(price) * parseFloat(list[i].Discount == null ? 100 : list[i].Discount) / 100;
                        newdiscount = list[i].Discount == null ? 100 : list[i].Discount;
                    }
                    else if (parseFloat(list[i].Discount == null ? 100 : list[i].Discount) > parseFloat(discount)) {
                        newprice = (parseFloat(price) * parseFloat(discount) / 100);
                        newdiscount = discount;
                    }
                }
            }
        }
    }
    else {//配件,总部卡全部配件享受VIP价
        for (var i = 0; i < list.length; i++) {
            if (list[i].IsLabour != true && (list[i].StockPartCategoryId == stockpartcategoryid || list[i].StockPartCategoryId == parentstockpartcategoryid || (list[i].StockPartCategoryId == -1 && list[i].LabourCategoryId == -1))) {
                if (list[i].IsVipPrice == true) {
                    if (parseFloat(vipprice) <= (parseFloat(price) * parseFloat(discount) / 100)) {
                        if (newprice > parseFloat(vipprice)) {
                            newprice = parseFloat(vipprice);
                            newdiscount = parseFloat(price) == 0 ? 0 : newprice / parseFloat(price) * 100;
                        }
                    }
                    else if (parseFloat(vipprice) > (parseFloat(price) * parseFloat(discount) / 100)) {
                        if (newprice > (parseFloat(price) * parseFloat(discount) / 100)) {
                            newprice = (parseFloat(price) * parseFloat(discount) / 100);
                            newdiscount = discount;
                        }
                    }
                }
                else {
                    if (parseFloat(list[i].Discount == null ? 100 : list[i].Discount) <= parseFloat(discount)) {
                        if (newprice > parseFloat(price) * parseFloat(list[i].Discount == null ? 100 : list[i].Discount) / 100) {
                            newprice = parseFloat(price) * parseFloat(list[i].Discount == null ? 100 : list[i].Discount) / 100;
                            newdiscount = list[i].Discount == null ? 100 : list[i].Discount;
                        }
                    }
                    else if (parseFloat(list[i].Discount == null ? 100 : list[i].Discount) > parseFloat(discount)) {
                        if (newprice > (parseFloat(price) * parseFloat(discount) / 100)) {
                            newprice = (parseFloat(price) * parseFloat(discount) / 100);
                            newdiscount = discount;
                        }
                    }
                }
            }
        }
    }
    return { price: parseFloat(newprice).toFixed(2), discount: parseFloat(newdiscount).toFixed(4) };
}
//2017-10-13 add

///新增派工功能外部实现函数
function dispatchedconfig(spentime, namestr, idlist, obj) {
    //修改页面填充数据
    $(".car li[f=operater]").find("a").attr("workeemployeeid", idlist);
    $(".car li[f=operater]").find("a span").text(namestr);
    $(".car li[f=operater]").find("a").attr("spentime", spentime);

    //详细页面填充数据(因为派工保存后就发送消息了.所以会直接绑定到详细页面)
    $(obj).find("em[f=operater]").attr("workeemployeeid", idlist);
    $(obj).find("em[f=operater]").attr("spentime", spentime);
    $(obj).find("em[f=operater]").text(namestr);

    $(".mask_box_dispatched,.item_box").hide();
}

//批量派工实现
function batchdispatchconfig(spentime, namestr, idlist) {
    $("#workhour").find("div[class=workhour][projectid]").each(function () {
        var _this = $(this);
        $(_this).find("em[f=operater]").attr("workeemployeeid", idlist);
        $(_this).find("em[f=operater]").attr("spentime", spentime);
        $(_this).find("em[f=operater]").text(namestr);
    })
    $(".mask_box,.item_box").hide();
    thistype = null;

    $("#hideditDispatcheddiv").empty();
}

//保存销售员
function selectsaleemployee(namestr, idlist, obj) {

    $(".car li[f=sales]").find("a").attr("workeemployeeid", idlist);
    $(".car li[f=sales]").find("a span").text(namestr);

    $(".mask_box_dispatched,.item_box").hide();

}

//获取工时减免
function getlabourreducemoney() {
    var reducemoney = 0;
    $("#workhour .workhour").each(function () {
        var money = $(this).find("dt font").attr("reducemoney");
        reducemoney += parseFloat(money == "" ? 0 : money);
    });
    return reducemoney;
}
//获取配件减免
function getpartreducemoney() {
    var reducemoney = 0;
    $("#workhour .workhour .accost dl").each(function () {
        var money = $(this).find("dd").attr("reducemoney");
        reducemoney += parseFloat(money == "" ? 0 : money);
    });
    return reducemoney;
}