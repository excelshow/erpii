/**
 * 点选车型
 */
function carmodelselected(currentitem, brandId, brandName) {
    $('li.selected[lang=carmodel]').removeClass('selected');
    $(currentitem).addClass('selected');
    var lineid = $(currentitem).attr('itemid');
    var code = $(currentitem).attr('code');
    var lineName = $(currentitem).text();
    var yearHtml = "";
    addtitle(lineid, lineName, "munmode");
    $.ajax({
        type: "POST",
        url: "/Service/GetJYGroupByFamilyId",
        data: { familyid: code },
        dataType: "json",
        async: false,
        success: function (result) {
            if (result.result == 'T') {
                yearHtml += '<ul>';
                for (var i = 0; i < result.models.length; i++) {
                    yearHtml += Ewewo.StringFormat('<li lang="caryear" itemid="{0}" code="{1}"><a href="javascript:;">{2}</a></li>'
                        , result.models[i].Id
                        , result.models[i].groupId
                        , result.models[i].groupName);
                }
                yearHtml += '</ul>';
                $('#caryear_list').html(yearHtml);
            } else {
                Ewewo.Tips(data.message);
            }
            //console.log(carlineHtml);
        },
        error: function () {
            Ewewo.Tips('网络错误!');
        }
    });


    $('#window_carline').hide(0, function () {
        $("#window_caryear").stop().animate({ "top": "0" }, 300).show();
        $('#window_carline').stop().animate({ "top": "540px" }, 600);
    });


    $('li[lang=caryear]').each(function () {
        $(this).click(function () {
            $('html,body').animate({
                scrollTop: 0
            }, 200);
            var groupid = $(this).attr('itemid');
            $('li.selected[lang=caryear]').removeClass('selected');
            var code = $(this).attr('code');
            $(this).addClass('selected');
            var kuanHtml = '';
            addtitle(groupid, $(this).text(), "munyear")
            $.ajax({
                type: "POST",
                url: "/Service/GetJYModelByYear",
                data: { groupid: code },
                dataType: "json",
                async: false,
                success: function (result) {
                    if (result.result == 'T') {
                        kuanHtml += '<ul>';
                        for (var i = 0; i < result.models.length; i++) {
                            kuanHtml += Ewewo.StringFormat('<li lang="carkuan" itemid="{0}" yearpattern="{1}"><a href="javascript:;">{2}</a></li>'
                                , result.models[i].id
                                , (result.models[i].yearPattern || "")
                                , result.models[i].vehicleName);
                        }
                        kuanHtml += '</ul>';
                        $('#carkuan_list').html(kuanHtml);
                    } else {
                        Ewewo.Tips(data.message);
                    }
                },
                error: function () {
                    Ewewo.Tips('网络错误!');
                }
            });
            $('#window_caryear').hide(0, function () {
                $('#window_caryear').stop().animate({ "top": "540px" }, 600);
                $("#window_carkuan").stop().animate({ "top": "0" }, 300).show();

            });


            $('li[lang=carkuan]').each(function () {
                $(this).click(function () {

                    $('li.selected[lang=carkuan]').removeClass('selected');
                    $(this).addClass('selected');
                    $('#select_car_brand a[lang=show]').attr('itemid', brandId).find("span").text(brandName);
                    $('#select_car_line a[lang=show]').attr('itemid', lineid).find("span").text(lineName);
                    $('#select_car_year a[lang=show]').attr('itemid', $(this).attr('yearpattern')||"").find("span").text($(this).attr('yearpattern')||"");
                    if ($(this).text().length > 23) {
                        $('#select_car_kuan a[lang=show]').attr('itemid', $(this).attr('itemid')).find("span").text($(this).text().substr(0, 22)).attr("vehicleName", $(this).text());
                    }
                    else {
                        $('#select_car_kuan a[lang=show]').attr('itemid', $(this).attr('itemid')).find("span").text($(this).text()).attr("vehicleName", $(this).text());;
                    }
                    //datacolor();
                    $('#window_carkuan').hide();
                    $('#addcarinfo').show();
                    Ewewo.RemoveShadow();
                });
            });
        });
    });
}

function addtitle(brandId, brandName, lang) {
    $(".cxxz_title").append("<a href=\"javascript:;\" style=\"overflow: hidden;height: 29px;\" itemid=\"" + brandId + "\" lang=\"" + lang + "\">" + (brandName.length > 8 ? (brandName.substr(0, 7) + "..") : brandName) + "</a>");
    $('a[lang=' + lang + ']').click(function () {

        if (lang == 'munyear') {
            back_carkuan();
            removetitle("munyear", 1);
            $("#window_brand").stop().animate({ "top": "540px" }, 300).hide();
        }
        else if (lang == 'munmode') {
            back_caryear();
            removetitle("munmode", 1);
            removetitle("munyear", 1);
            $("#window_brand").stop().animate({ "top": "540px" }, 300).hide();

            $("#window_carkuan").stop().animate({ "top": "540px" }, 300).hide();
        }
        else if (lang == 'munbrand') {
            back_carline();
            $("#window_caryear").stop().animate({ "top": "540px" }, 300).hide();
            $("#window_carkuan").stop().animate({ "top": "540px" }, 300).hide();
            removetitle("munmode", 1);
            removetitle("munyear", 1);
            removetitle("munbrand", 1);

        }

    });
}
function removetitle(lang, type) {
    if (type == 1) {
        $('.cxxz_title a[lang=' + lang + ']').remove();
    }
    else {
        $('.cxxz_title a').remove();
    }
}
$(document).ready(function () {

    var brandHtml = '';
    var letterHtml = '';
    var currentLetter = '';
    for (var i = 0; i < all_brand_scripts.length; i++) {
        //if (currentLetter != "" && currentLetter != all_brand_scripts[i].FirstLetter) {
        //    brandHtml += Ewewo.StringFormat(' </ul>		 </div>');
        //}
        if (currentLetter != all_brand_scripts[i].brandInitial) {
            currentLetter = all_brand_scripts[i].brandInitial;

            letterHtml += Ewewo.StringFormat('<a href="#{0}"  letter="{0}" lang="letteritem">{0}</a>', currentLetter);
            brandHtml += Ewewo.StringFormat('<h2  id="{0}" letter="{0}">{0}</h2>', all_brand_scripts[i].brandInitial);
            brandHtml += Ewewo.StringFormat('<ul>');


        }

        brandHtml += Ewewo.StringFormat('<li letter="{0}" itemid="{1}" code="{5}" lang="branditem"><a href="javascript:;"><img src="{2}{3}" alt="{4}" width="52px" height="52px" />{4}</a></li> '
            , all_brand_scripts[i].brandInitial
            , all_brand_scripts[i].Id
            , resource_url
            , all_brand_scripts[i].brandIcon
            , all_brand_scripts[i].brandName
            , all_brand_scripts[i].brandId);

    }
    brandHtml += '</ul></div>';
    $('#brand_list').html(brandHtml);
    $('#letter_list').html(letterHtml);

    $('a[lang=letteritem]').each(function () {
        $(this).click(function () {

            $('a.selected[lang=letteritem]').removeClass('selected');
            $(this).addClass('selected');
            var letter = $(this).attr('letter');
            var first = $('h2[letter=' + letter + ']').eq(0);
            $('html,body').animate({
                scrollTop: first.offset().top
            }, 700);
        });
    });

    $('li[lang=branditem]').each(function () {
        $(this).click(function () {
            $('li.selected[lang=branditem]').removeClass('selected');
            $(this).addClass('selected');

            var brandId = $(this).attr('itemid');
            var code = $(this).attr('code');
            var brandName = $(this).text();
            $('html,body').animate({
                scrollTop: 0
            }, 0, 'swing', function () {
                $('#window_brand').hide(0, function () {
                    $('#window_brand').stop().animate({ "top": "540px" }, 600);
                    $("#window_carline").stop().animate({ "top": "0" }, 300).show();
                });
            });
            addtitle(brandId, brandName, "munbrand");
            var carlineHtml = '';
            var carFactory = '';
            $.ajax({
                type: "POST",
                url: "/Service/GetJYLinesByBrandId",
                data: { brandid: code },
                dataType: "json",
                async: false,
                success: function (result) {
                    if (result.result == 'T') {
                        carlineHtml += '<ul>';
                        for (var i = 0; i < result.lines.length;i++) {
                            carlineHtml += Ewewo.StringFormat('<li lang="carmodel" itemid="{0}" code="{1}"><a href="javascript:;" >{2}</a></li>', result.lines[i].Id, result.lines[i].familyId, result.lines[i].familyName);
                        }
                        carlineHtml += '</ul>';
                    } else {
                        Ewewo.Tips(data.message);
                    }
                    //console.log(carlineHtml);
                },
                error: function () {
                    Ewewo.Tips('网络错误!');
                }
            });
            $('.window-chexi-parent').html(carlineHtml);
            $('li[lang=carmodel]').each(function () {
                $(this).click(function () {
                    $('html,body').animate({
                        scrollTop: 0
                    }, 200);
                    carmodelselected($(this), brandId, brandName);
                });
            });
        });
    });

    $(".title a[lang=window_brand]").click(function () {
        cookswinds();
        $('li.selected[lang=branditem]').removeClass('selected');
        $('li.selected[lang=carmodel]').removeClass('selected');
        $('li.selected[lang=caryear]').removeClass('selected');
        $('li.selected[lang=carkuan]').removeClass('selected');
        $('li.selected[lang=letteritem]').removeClass('selected');
        //$('#select_car_brand a[lang=show]').attr('itemid', 0).find("span").text("请选择");
        //$('#select_car_line a[lang=show]').attr('itemid', 0).find("span").text("请选择");
        //$('#select_car_year a[lang=show]').attr('itemid', 0).find("span").text("请选择");
        //$('#select_car_kuan a[lang=show]').attr('itemid', 0).find("span").text("请选择");
    });

    $(".title a[lang=window_carline]").click(function () {
        var brandId = $(".cxxz_title a[lang=munbrand]").eq(0).attr("itemid");
        var brandName = $(".cxxz_title a[lang=munbrand]").eq(0).text();
        $('#select_car_brand a[lang=show]').attr('itemid', brandId).find("span").text(brandName);
        $('#select_car_line a[lang=show]').attr('itemid', 0).find("span").text("请选择");
        $('#select_car_year a[lang=show]').attr('itemid', 0).find("span").text("请选择");
        $('#select_car_kuan a[lang=show]').attr('itemid', 0).find("span").text("请选择");
        cookswinds();
    });

    $(".title a[lang=window_caryear]").click(function () {
        var brandId = $(".cxxz_title a[lang=munbrand]").eq(0).attr("itemid");
        var brandName = $(".cxxz_title a[lang=munbrand]").eq(0).text();
        var lineid = $(".cxxz_title a[lang=munmode]").eq(0).attr("itemid");
        var lineName = $(".cxxz_title a[lang=munmode]").eq(0).text();
        $('#select_car_brand a[lang=show]').attr('itemid', brandId).find("span").text(brandName);
        $('#select_car_line a[lang=show]').attr('itemid', lineid).find("span").text(lineName);
        $('#select_car_year a[lang=show]').attr('itemid', 0).find("span").text("请选择");
        $('#select_car_kuan a[lang=show]').attr('itemid', 0).find("span").text("请选择");
        cookswinds();
    });
    $(".title a[lang=window_carkuan]").click(function () {
        var brandId = $(".cxxz_title a[lang=munbrand]").eq(0).attr("itemid");
        var brandName = $(".cxxz_title a[lang=munbrand]").eq(0).text();
        var lineid = $(".cxxz_title a[lang=munmode]").eq(0).attr("itemid");
        var lineName = $(".cxxz_title a[lang=munmode]").eq(0).text();
        var yearid = $(".cxxz_title a[lang=munyear]").eq(0).attr("itemid");
        var yearName = $(".cxxz_title a[lang=munyear]").eq(0).text();
        $('#select_car_brand a[lang=show]').attr('itemid', brandId).find("span").text(brandName);
        $('#select_car_line a[lang=show]').attr('itemid', lineid).find("span").text(lineName);
        $('#select_car_year a[lang=show]').attr('itemid', yearid).find("span").text(yearName);
        $('#select_car_kuan a[lang=show]').attr('itemid', 0).find("span").text("请选择");
        cookswinds();
    });
    $('#back_carline').click(function () {
        back_carline();
    });

    $('#back_caryear').click(function () {
        back_caryear();
    });
    $('#back_carkuan').click(function () {
        back_carkuan();
    });

    $('#select_car_brand').click(function () {
        $('li.selected[lang=letteritem]').removeClass('selected');
        $("#window_brand").stop().animate({ "top": "0" }, 300).show();
        setTimeout(function () {
            $("#addcarinfo").hide();
        }, 400);
        $('html,body').animate({
            scrollTop: 0
        }, 200);
        removetitle("", 0);
    });

    $('#select_car_line').click(function () {
        //Ewewo.Shadow(function () {
        //    $('.new-windows:visible').hide(200);
        //});
        $("#addcarinfo").hide(); $('li.selected[lang=letteritem]').removeClass('selected');
        if ($('li.selected[lang=branditem]').length > 0) {
            removetitle("munyear", 1); removetitle("munmode", 1);
            $("#window_carline").stop().animate({ "top": "0" }, 300).show();
        } else {
            $('html,body').animate({
                scrollTop: 0
            }, 200);
            $("#window_brand").stop().animate({ "top": "0" }, 300).show();
        }
    });

    $('#select_car_year').click(function () {
        //Ewewo.Shadow(function () {
        //    $('.new-windows:visible').hide(200);
        //});
        $("#addcarinfo").hide(); $('li.selected[lang=letteritem]').removeClass('selected');
        var isbrandselected = $('li.selected[lang=branditem]').length > 0;
        var iscarlineselected = $('li.selected[lang=carmodel]').length > 0;
        if (iscarlineselected) {
            removetitle("munyear", 1);
            $("#window_caryear").stop().animate({ "top": "0" }, 300).show();
        } else if (isbrandselected) {
            removetitle("munyear", 1); removetitle("munmode", 1);
            $("#window_carline").stop().animate({ "top": "0" }, 300).show();
        }
        else {
            removetitle("munyear", 1);
            $('html,body').animate({
                scrollTop: 0
            }, 200);
            $("#window_brand").stop().animate({ "top": "0" }, 300).show();
        }
    });

    $('#select_car_kuan').click(function () {
        //Ewewo.Shadow(function () {
        //    $('.new-windows:visible').hide(200);
        //});
        $("#addcarinfo").hide(); $('li.selected[lang=letteritem]').removeClass('selected');
        var isbrandselected = $('li.selected[lang=branditem]').length > 0;
        var iscarlineselected = $('li.selected[lang=carmodel]').length > 0;
        var isyearselected = $('li.selected[lang=caryear]').length > 0;
        if (isyearselected) {

            $("#window_carkuan").stop().animate({ "top": "0" }, 300).show();
        } else if (iscarlineselected) {
            $("#window_caryear").stop().animate({ "top": "0" }, 300).show();

        } else if (isbrandselected) {
            $("#window_carline").stop().animate({ "top": "0" }, 300).show();

        }
        else {
            $('html,body').animate({
                scrollTop: 0
            }, 200);
            $("#window_brand").stop().animate({ "top": "0" }, 300).show();

        }

    });


    var nowDate = new Date();
    var nowYear = nowDate.getFullYear();
    var nowMonth = nowDate.getMonth() + 1;
    $("#month option").not($(".time_option")).remove();
    for (var i = nowMonth; i >= 1; i--) {
        $("#month").append("<option>" + i + "</option>");
    }
    $("#year").change(function () {
        var year = $("#year").val();
        $("#month option").not($(".time_option")).remove();
        /*如果选的是今年*/
        if (year == nowYear) {
            for (var i = nowMonth; i >= 1; i--) {
                $("#month").append("<option>" + i + "</option>");
            }
        }
        else {
            for (var i = 12; i >= 1; i--) {
                $("#month").append("<option>" + i + "</option>");
            }
        }
    });
    $('#btnSubmit').click(function () {
        var carid = $('#addcarinfo').attr('carid');
        var platenumber = $('input[name=platenumber]').val();
        var year = $('select[name=year]').val();
        var month = $('select[name=month]').val();
        var mileage = $('input[name=mileage]').val();
        var branditem = $('#select_car_brand a[lang=show]');
        var lineitem = $('#select_car_line a[lang=show]');
        var caryearitem = $('#select_car_year a[lang=show]');
        var carkuanitem = $('#select_car_kuan a[lang=show]');

        var brandid = branditem.attr('itemid');
        var brandname = branditem.text();
        var lineid = lineitem.attr('itemid');
        var linename = lineitem.text();

        var caryear = caryearitem.attr('itemid');

        var carkuanid = carkuanitem.attr('itemid');
        var carkuanname = carkuanitem.text();

        var istypecar = $('#type-car-info').is(':hidden');

        if (platenumber == '' || platenumber == '例如:粤B00544') {
            Ewewo.Tips('请输入车牌!');
            return;
        }
        if (!istypecar) {
            brandid = 'null';
            lineid = 'null';
            carkuanid = 'null';
            brandname = $('input[name=brandname]').val();
            linename = $('input[name=linename]').val();
            caryear = $('input[name=caryear]').val();
            carkuanname = $('input[name=carkuanname]').val();

            brandname = (brandname == '输入车辆车型') ? '' : brandname;
            linename = (linename == '输入车系') ? '' : linename;
            caryear = (caryear == '例如:2012') ? '' : caryear;
            carkuanname = (carkuanname == '输入车型') ? '' : carkuanname;

            if (brandname == '') {
                Ewewo.Tips('车品牌不能为空!');
                return;
            }
            if (linename == '') {
                Ewewo.Tips('车系不能为空!');
                return;
            }
            if (caryear == '') {
                Ewewo.Tips('年款不能为空!');
                return;
            }
            if (carkuanname == '') {
                Ewewo.Tips('车型不能为空!');
                return;
            }
        } else {
            if (brandid == '') {
                Ewewo.Tips('请选择车辆!');
                return;
            }
        }
        if (mileage == '' || mileage == '例如:5000公里') {
            Ewewo.Tips('请输入里程!');
            return;
        }
        Ewewo.Loading();
        $.ajax({
            type: "POST",
            url: post_url,
            data: {
                carid: carid,
                platenumber: platenumber, brandid: brandid, brand: brandname, modelid: carkuanid, modelname: carkuanname,
                lineid: lineid, linename: linename, year: year, month: month, mileage: mileage, modelyear: caryear
            },
            dataType: "json",
            success: function (data) {
                if (data.result == 'T') {

                    Ewewo.WXBack();
                    Ewewo.RemoveLoading();
                } else {
                    Ewewo.RemoveLoading();
                    Ewewo.Tips(data.message);
                }
            },
            error: function () {
                Ewewo.RemoveLoading();
                Ewewo.Tips('网络错误!');
            }
        });
    });
});
function back_carkuan() {
    $('#window_carkuan').hide(0, function () {
        $('li.selected[lang=letteritem]').removeClass('selected');
        $("#window_carkuan").stop().animate({ "top": "540px" }, 300);
        $("#window_caryear").stop().animate({ "top": "0" }, 300).show();
        $('html,body').animate({
            scrollTop: 0
        }, 200);
    });
    removetitle("munyear", 1);
}
function back_caryear() {
    $('#window_caryear').hide(0, function () {
        $('li.selected[lang=letteritem]').removeClass('selected');
        $("#window_caryear").stop().animate({ "top": "540px" }, 300);
        $("#window_carline").stop().animate({ "top": "0" }, 300).show();
        $('html,body').animate({
            scrollTop: 0
        }, 200);
    });
    removetitle("munmode", 1);
}
function back_carline() {
    $('#window_carline').hide(0, function () {
        $('li.selected[lang=letteritem]').removeClass('selected');
        $("#window_carline").stop().animate({ "top": "540px" }, 300);
        $("#window_brand").stop().animate({ "top": "0" }, 300).show();
        $('html,body').animate({
            scrollTop: 0
        }, 200);
    });
    removetitle("munbrand", 1);
}
function cookswinds() {
    $("#window_brand").stop().animate({ "top": "540px" }, 300).hide();
    $("#window_carline").stop().animate({ "top": "540px" }, 300).hide();
    $("#window_caryear").stop().animate({ "top": "540px" }, 300).hide();
    $("#window_carkuan").stop().animate({ "top": "540px" }, 300).hide();
    $("#addcarinfo").show();

}
$(document).scroll(function () {
    var scrollTop = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
    if (scrollTop > 200) {
        $('#letter-static').addClass('fudong');
        $('#brand_list').css('margin-top', "388px");
    } else {
        $('#letter-static').removeClass('fudong');
        $('#brand_list').css('margin-top', "0");
    }
});

//投保公司点击显示选择列表
$("#txtinsurecompany").click(function () {
    $(".mask_box,#selectcompany").show();
    var companyname = $(this).attr("itemid");
    $("#selectcompany li a").removeClass("carxz");
    $("#selectcompany li a[itemid='" + companyname + "']").addClass("carxz");
    mask_box("#selectcompany");
})

//车辆等级点击显示选择列表
$("#txtcarlevel").click(function () {
    $(".mask_box,#selectcarlevel").show();
    var levelid = $(this).attr("itemid");
    $("#selectcarlevel li a").removeClass("carxz");
    $("#selectcarlevel li a[itemid='" + levelid + "']").addClass("carxz");
    mask_box("#selectcarlevel");
})



//投保列表点击事件处理
$("#selectcompany li a").each(function () {
    $(this).click(function () {
        $("#selectcompany li a").removeClass("carxz");
        $("#txtinsurecompany").attr("itemid", $(this).attr("itemid")).find("span").text($(this).text());
        $(this).addClass("carxz");
        $(".mask_box,#selectcompany").hide();
    });

});


//车辆等级列表点击事件处理
$("#selectcarlevel li a").each(function () {
    $(this).click(function () {
        $("#selectcarlevel li a").removeClass("carxz");
        $("#txtcarlevel").attr("typeid", 1).attr("itemid", $(this).attr("itemid")).attr("partweight", $(this).attr("partweight")).attr("labourweight", $(this).attr("labourweight")).find("span").text($(this).text());
        $(this).addClass("carxz");
        $(".mask_box,#selectcarlevel").hide();
    });

});


