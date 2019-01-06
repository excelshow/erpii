/*管理费编辑所需脚本处理*/

$(function () {

    //点击打开管理费窗口
    $("a[name=editmanage]").click(function () {

        var customerid = customeData.customerid;
        if (customerid == "0" || customerid == 0 || customerid.length == 0) {
            Ewewo.Tips("请输入手机号!");
            return false;
        }

        //获取总工时
        var fontlabour = parseFloat($(".shishou font[name=fontsumlabour]").attr("itemid"));
        fontlabour = isNaN(fontlabour) ? 0 : fontlabour;
        fontlabour = fontlabour - getlabourreducemoney();
        //获取总配件费
        var fontpart = parseFloat($(".shishou font[name=fontsumpart]").attr("itemid"));
        fontpart = isNaN(fontpart) ? 0 : fontpart;
        fontpart = fontpart - getpartreducemoney();
        $("#managefontlabour").text(fontlabour.toFixed(2));
        $("#managefontpart").text(fontpart.toFixed(2));

        $("#txtlabourrate").text(TaxManage.labourrate == null ? '未设置' : TaxManage.labourrate.toFixed(2));
        $("#txtlabourdiscount").val(TaxManage.labourdiscount == null ? 100 : TaxManage.labourdiscount.toFixed(2));

        $("#txtpartsrate").text(TaxManage.partsrate == null ? '未设置' : TaxManage.partsrate.toFixed(2));
        $("#txtpartsdiscount").val(TaxManage.partsdiscount == null ? 100 : TaxManage.partsdiscount.toFixed(2));

        $("#allmme").text(((TaxManage.labour == null ? 0 : TaxManage.labour) + (TaxManage.parts == null ? 0 : TaxManage.parts)).toFixed(2));

        if ((TaxManage.labour == null ? 0 : TaxManage.labour) + (TaxManage.parts == null ? 0 : TaxManage.parts) > 0) {
            $("#managecleardiv").show();
        } else {
            $("#managecleardiv").hide();
        }

        calculationlabour(true);
        calculationpart(true);

        $("#managewind,.mask_box").show();
        mask_box("#managewind");
    })




    //计算工时费
    function calculationlabour(ischangerate) {
        //获取总工时
        var fontlabour = parseFloat($(".shishou font[name=fontsumlabour]").attr("itemid"));
        fontlabour = isNaN(fontlabour) ? 0 : fontlabour;
        fontlabour = fontlabour - getlabourreducemoney();

        if (ischangerate == true) {
            //用户修改了工时折扣比例,更改金额
            var discount = parseFloat($("#txtlabourdiscount").val());
            if (isNaN(discount)) {
                discount = 0;
                $("#txtlabourdiscount").val('')
            }
            $("#txtprojectmanagementcost").val((fontlabour * (TaxManage.labourrate == null ? 0 : TaxManage.labourrate) * discount / 10000).toFixed(2));
        } else {
            //用户修改的是金额,更改费率
            var cost = $("#txtprojectmanagementcost").val();
            if (fontlabour == 0) {
                $("#txtlabourdiscount").val('');
            } else {
                //管理费/(管理费比例*金额)=折扣比例;
                $("#txtlabourdiscount").val((cost / ((TaxManage.labourrate == null ? 0 : TaxManage.labourrate) * fontlabour / 10000)).toFixed(3));
            }
        }
    }



    //计算配件费
    function calculationpart(ischangerate) {
        //获取总配件
        var fontpart = parseFloat($(".shishou font[name=fontsumpart]").attr("itemid"));
        fontpart = isNaN(fontpart) ? 0 : fontpart;
        fontpart = fontpart - getpartreducemoney();

        if (ischangerate == true) {
            //用户修改了配件费率,更改金额
            var discount = parseFloat($("#txtpartsdiscount").val());
            if (isNaN(discount)) {
                discount = 0;
                $("#txtpartsdiscount").val('')
            }
            $("#txtstockpartmanagementcost").val((fontpart * (TaxManage.partsrate == null ? 0 : TaxManage.partsrate) * discount / 10000).toFixed(2));

        } else {
            //用户修改的是金额,更改费率
            var cost = $("#txtstockpartmanagementcost").val();
            if (fontpart == 0) {
                $("#txtpartsdiscount").val('');
            } else {
                //管理费/(管理费比例*金额)=折扣比例;
                $("#txtpartsdiscount").val((cost / ((TaxManage.partsrate == null ? 0 : TaxManage.partsrate) * fontpart / 10000)).toFixed(3));
            }
        }

    }





    //配件管理费修改
    $("#txtpartsdiscount").on("input", function () {
        var d = $(this).val();
        var v = parseFloat(d);
        if (d != '' && isNaN(v)) {
            Ewewo.Tips("请填写有效数值");
            $(this).val(0);
        }
        if (v < 0) {
            Ewewo.Tips("请填写有效数值");
            $(this).val(0);
        }
        calculationpart(true);
    })

    $("#txtstockpartmanagementcost").on("input", function () {
        if (TaxManage.partsrate == null) {
            Ewewo.Tips("所选顾客没有设置配件管理费,请先设置!");
            $(this).val("0.00");
            return;
        }

        var d = $(this).val();
        var v = parseFloat(d);
        if (d != '' && isNaN(v)) {
            Ewewo.Tips("请填写有效数值");
            $(this).val(0);
        }
        if (v < 0) {
            Ewewo.Tips("请填写有效数值");
            $(this).val(0);
        }
        calculationpart(false);
    })




    //修改工时折扣比例
    $("#txtlabourdiscount").on("input", function () {
        var d = $(this).val();
        var v = parseFloat(d);
        if (d != '' && isNaN(v)) {
            Ewewo.Tips("请填写有效数值");
            $(this).val(0);
        }
        if (v < 0) {
            Ewewo.Tips("请填写有效数值");
            $(this).val(0);
        }
        calculationlabour(true);
    })
    $("#txtprojectmanagementcost").on("input", function () {

        if (TaxManage.labourrate == null) {
            Ewewo.Tips("所选顾客没有设置工时管理费,请先设置!");
            $(this).val("0.00");
            return;
        }

        var d = $(this).val();
        var v = parseFloat(d);
        if (d != '' && isNaN(v)) {
            Ewewo.Tips("请填写有效数值");
            $(this).val(0);
        }
        if (v < 0) {
            Ewewo.Tips("请填写有效数值");
            $(this).val(0);
        }
        calculationlabour(false);
    })


    //保存管理费修改
    $("a[name=savemanage]").click(function () {
        TaxManage.isentrymanage = true;
        updatebottomtotal();
    })


    //管理费清零
    $("a[name=clearmme]").click(function () {
        $("#txtlabourdiscount").val(0);
        $("#txtprojectmanagementcost").val("");
        $("#txtpartsdiscount").val(0);
        $("#txtstockpartmanagementcost").val("");
        // $("a[name=savemanage]").click();
        TaxManage.isentrymanage = false;
        TaxManage.labour = null;
        TaxManage.labourdiscount = 0;
        TaxManage.parts = null;
        TaxManage.partsdiscount = 0;
        $(".mask_box,.mask_div").hide();
        updatebottomtotal();
    })



    /*以下开始是税费逻辑*/


    //税费编辑窗口
    $("a[name=edittax]").click(function () {
        var customerid = customeData.customerid;
        if (customerid == "0" || customerid == 0 || customerid.length == 0) {
            Ewewo.Tips("请输入手机号!");
            return false;
        }

        if ((TaxManage.tax == null ? 0 : TaxManage.tax) > 0) {
            $("#taxcleardiv").show();
        } else {
            $("#taxcleardiv").hide();
        }

        $("#taxmoney").text(TaxManage.tax == null ? '' : TaxManage.tax);
        $("#txttaxrate").val((TaxManage.taxrate == null ? parseFloat(taxnum) : TaxManage.taxrate).toFixed(2));
        $("#txttax").val((TaxManage.tax == null ? 0 : TaxManage.tax).toFixed(2));

        $("#taxwind,.mask_box").show();
        mask_box("#taxwind");

     
    })

    //税费更改事件
    $("#txttaxrate").bind("keyup", function (e) {
        if (e.keyCode == '13') {
            calculationtax(true);
        }
    }).bind("input", function () {
        var d = $(this).val();
        var v = parseFloat(d);
        if (d != '' && isNaN(v)) {
            Ewewo.Tips("请填写有效数值");
            $(this).val(0);
        }
        if (v < 0) {
            Ewewo.Tips("请填写有效数值");
            $(this).val(0);
        }
        calculationtax(true);
    })
    $("#txttax").bind("input", function () {
        var d = $(this).val();
        var v = parseFloat(d);
        if (d != '' && isNaN(v)) {
            Ewewo.Tips("请填写有效数值");
            $(this).val(0);
        }
        if (v < 0) {
            Ewewo.Tips("请填写有效数值");
            $(this).val(0);
        }
        calculationtax(false);
    })

    //计算税费
    function calculationtax(ischangerate) {
        var allmoney = getallmoney();
        //如果是税率更改,则用税率去算出税金
        if (ischangerate == true) {
            var rate = parseFloat($("#txttaxrate").val());
            if (isNaN(rate)) {
                rate = 0;
                $("#txttaxrate").val('')
            }
            $("#txttax").val((allmoney * rate / 100).toFixed(2));

        } else {
            var money = parseFloat($("#txttax").val());
            money = isNaN(money) ? 0 : money;
            if (allmoney == 0) {
                $("#txttaxrate").val("0");
            }
            $("#txttaxrate").val(((money / allmoney) * 100).toFixed(2));

        }
    }

    //清零处理
    $("a[name=cleartax]").click(function () {
        $("#txttaxrate").val("");
        $("#txttax").val("");
        //$("a[name=savetax]").click();
        TaxManage.tax = null;
        TaxManage.taxrate = null;
        TaxManage.isentrytax = false;
        $(".boxbg").hide();
        $("#taxwindow").hide();
        updatebottomtotal();
    })

    //税费保存处理
    $("a[name=savetax]").click(function () {
        TaxManage.isentrytax = true;
        updatebottomtotal();
    })

  

    function getallmoney() {
        var labourtotal = 0.0;
        var parttotal = 0.0;
        var itioaltotal = 0.0;
        var reducemoneytotal = 0.0;
        $("#workhour .workhour").each(function () {
            var tdtotal = $(this)
                .find("font[f=workhourtotal]")
                .attr("itemid");
            var total = tdtotal;
            if ($.trim(total) == "") {
                total = "0.0";
            }
            labourtotal += parseFloat(total);
            var reducemoney = $(this).find("dt font").attr("reducemoney");
            reducemoneytotal += parseFloat(reducemoney == '' ? 0 : reducemoney);
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
            var reducemoney = $(this).find("dd").attr("reducemoney");
            reducemoneytotal += parseFloat(reducemoney == '' ? 0 : reducemoney);
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


        labourtotal = isNaN(labourtotal) ? 0 : labourtotal;
        parttotal = isNaN(parttotal) ? 0 : parttotal;
        itioaltotal = isNaN(itioaltotal) ? 0 : itioaltotal;
        reducemoneytotal = isNaN(reducemoneytotal) ? 0 : reducemoneytotal;
        return labourtotal + parttotal + itioaltotal - reducemoneytotal;


    }

    //获取工时减免
    function getlabourreducemoney() {
        var reducemoney = 0;
        $("#workhour .workhour").each(function () {
            var money = $(this).find("dt font").attr("reducemoney");
            reducemoney += parseFloat(money == "" ? 0 : money);
        });
        return isNaN(reducemoney) ? 0 : reducemoney;
    }
    //获取配件减免
    function getpartreducemoney() {
        var reducemoney = 0;
        $("#workhour .workhour .accost dl").each(function () {
            var money = $(this).find("dd").attr("reducemoney");
            reducemoney += parseFloat(money == "" ? 0 : money);
        });
        return isNaN(reducemoney) ? 0 : reducemoney;;
    }


})