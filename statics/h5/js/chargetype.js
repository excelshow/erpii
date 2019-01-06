$(function () {
    $("#chargetypebox").find("a[chargetype]").click(function () {
        if ($(this).hasClass("maskxz")) {
            $(this).removeClass("maskxz");
        }
        else {
            $(this).addClass("maskxz");
            $(this).parent().siblings().find("a[chargetype]").removeClass("maskxz");
        }
    });
    $("#btnchargetypecancell").click(function () {
        $(".mask_box,#chargetypebox").hide();
    });
    $("#btnchargetypeconfirm").click(function () {
        var select = $("#chargetypebox").find("a[chargetype][class=maskxz]");
        var itemid = $(chargetypeobj).parents(".item_list").find("ul a[itemid]").attr("itemid");
        if (select.length == 0) {
            $(chargetypeobj).attr("chargetype", "").text("");
            $(".item_title").find("dd").find("font[lang=" + itemid + "]").attr("chargetype", "").attr("chargetypename", "");
        }
        else {
            $(chargetypeobj).attr("chargetype", select.attr("chargetype")).text(select.text());
            $(".item_title").find("dd").find("font[lang=" + itemid + "]").attr("chargetype", select.attr("chargetype")).attr("chargetypename", select.text());
        }
        $(".mask_box,#chargetypebox").hide();
    });
});

function getchargetypename(chargetype) {
    switch (chargetype) {
        case "1":
            return "自费";
        case "2":
            return "保险";
        case "3":
            return "返工";
        case "4":
            return "索赔";
        case "5":
            return "免单";
        case "6":
            return "公务车";
        default:
            return "自费";
    }
}