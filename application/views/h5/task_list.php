<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>施工任务</title>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/jquery-1.8.2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>statics/h5/css/index.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>statics/h5/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>statics/h5/css/simple.css?v=1">
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/androidviewport.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/common.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/jquery.simplemodal.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/placeholder.js"></script>
    <script type="text/javascript">
        adaptUILayout.adapt(720);
    </script>

    <link href="<?php echo base_url()?>statics/h5/css/mobiscroll.icons.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>statics/h5/css/mobiscroll.scroller.android.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>statics/h5/css/mobiscroll.scroller.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/mobiscroll.core.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/mobiscroll.datetime.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/mobiscroll.i18n.zh.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/mobiscroll.scroller.android.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/mobiscroll.scroller.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/mobiscroll.select.js"></script>
    <meta name="viewport" content="target-densitydpi=device-dpi, width=720px, user-scalable=no">
</head>
<body>
    <div class="system">
        <div class="title">
            <a href="javascript:history.back(-1);" class="back">返回</a>
            <a href="" id="arefresh" class="shuaxin">刷新</a>
        </div>
        <div class="chexing_title">
            <a href="javascript:void(0);" class="cxxz">未完工(<span id="spfinishcount"></span>)</a>
            <a href="javascript:void(0);" style="right: 0;" class="">已完工(<span id="spunfinishcount"></span>)</a>
        </div>

        <div class="yj_menu" style="padding-top:20px;">
            <input type="text" class="ss_time" id="txtstart" value="2019-01-01" style="width:225px;" readonly=""><span style="margin:0 22px; font-size:22px; color:#999;">至</span><input type="text" class="ss_time" id="txtend" value="2019-01-31" style="width:225px;" readonly="">
            <input type="button" class="khtopbtn" style="background:#ffb400; width:100px; height:52px; font-size:22px; color:#fff;  border-radius:8px; margin-left:15px;" value="搜索">
        </div>

        <div id="adddata">
            <div class="nophoto">
                <span>暂无施工任务</span>
            </div>
        </div>

        <div style="padding-top: 120px;"></div>
    </div>
    <div id="pausebox" class="mask_div" style="height:540px; margin-top:-270px;display:none;">
        <h2>中断施工</h2>
        <ul style="height:384px;">
            <li><a href="javascript:void(0);" name="projectpause" statusid="8">等待客户答复</a></li>
            <li><a href="javascript:void(0);" name="projectpause" statusid="9">等待保险公司定损</a></li>
            <li><a href="javascript:void(0);" name="projectpause" statusid="10">等待配件</a></li>
            <li><a href="javascript:void(0);" name="projectpause" statusid="1">等待施工</a></li>
            <li><a href="javascript:void(0);" name="projectpause" statusid="11">等待洗车</a></li>
        </ul>
        <div class="mask_btn"><a href="javascript:void(0);" id="cancell">取消</a><a href="javascript:void(0);" id="confirm" itemid="" recordid="" class="queding">确定</a></div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $("a[name=startprj]").live("click", function () {
                var id = $(this).attr("itemid");
                var recordid = $(this).attr("recordid");
                var flag = modifystatus(id, '2', recordid);
                if (flag == true) {
                    $(this).next("font").text("作业中");
                    $(this).after('<a href="javascript:;" itemid="' + id + '" recordid="' + recordid+'" name="pause" style="background:#ff6600;">中断</a>');
                    $(this).attr("name", "doingprj").css("background", "#ff6600").text("完工");
                    $(this).next("a[name=pause]").click(function () {
                        $("#confirm").attr("itemid", $(this).attr("itemid")).attr("recordid", $(this).attr("recordid"));
                        pauseobj = $(this);
                        $("#pausebox,.mask_box").show();
                    });
                }
            });

            $("a[name=doingprj]").live("click", function () {
                var id = $(this).attr("itemid");
                var recordid = $(this).attr("recordid");
                //var checkid= $(this).attr("checkid");
                var flag = modifystatus(id, '4', recordid);
                if (flag == true) {
                    $(this).nextAll("font").text("已完成").addClass("tlevel").css("color", "#ff6600").append("<br /><span style='color:#999;'>" + worktime + "分钟</span>");
                    $(this).next("a[name=pause]").remove();
                    $(this).remove();
                    //如果全部完工则消除这一记录
                    if (isfinish) {
                        $("#wl" + recordid).remove();
                        $("#spfinishcount").text(parseInt($("#spfinishcount").text()) - 1);
                        $("#spunfinishcount").text(parseInt($("#spunfinishcount").text()) + 1);
                    }
                }
            });
            var pauseobj;
            $("a[name=pause]").click(function () {
                $("#confirm").attr("itemid", $(this).attr("itemid")).attr("recordid", $(this).attr("recordid"));
                pauseobj = $(this);
                $("#pausebox,.mask_box").show();
            });

            $("a[name=projectpause]").click(function () {
                $(this).toggleClass("maskxz");
                $(this).parent().siblings().find("a").removeClass("maskxz");
            });

            $("#cancell").click(function () {
                $("#pausebox,.mask_box").hide();
            });

            $("#confirm").click(function () {
                var item = $("a[name=projectpause][class=maskxz]");
                if (item.length==0) {
                    Ewewo.Tips("请选择类型");
                    return;
                }
                var id = $(this).attr("itemid");
                var recordid = $(this).attr("recordid");
                var statusid = item.attr("statusid");
                var flag = modifystatus(id, statusid, recordid);
                if (flag == true) {
                    $(pauseobj).nextAll("font").text(item.text());
                    $(pauseobj).prev("a[name=doingprj]").attr("name", "startprj").css("background", "").text("开始");
                    $(pauseobj).remove();
                    $("#pausebox,.mask_box").hide();
                }
            });
        });

        var worktime = 0; var isfinish = false; var lock = false;
        function modifystatus(prjid, status,recordid,checkid) {

            var flag = false;
            if (!lock) {
                lock = true;
                $.ajax({
                    type: "POST",
                    data: { prjid: prjid, status: status, recordid: recordid, checkemployeei: checkid },
                    url: "/service/modifyprojectstatus",
                    dataType: "json",
                    async: false,
                    success: function (data) {
                        if (data.result == 'T') {
                            flag = true;
                            worktime = data.worktime;
                            isfinish = data.isfinish;
                        }
                        else {
                            Ewewo.Tips('更新状态不成功!');
                        }
                        lock = false;
                    },
                    error: function () {
                        Ewewo.Tips_Error('网络错误,更新状态不成功!');
                        lock = false;
                    }
                });
            }
            return flag;
        }

    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            function contains(arr, obj) {
                var i = arr.length;
                while (i--) {
                    if (arr[i] === obj) {
                        return true;
                    }
                }
                return false;
            }

            var myArray = new Array();
            var totalpage = '1'; //总页数，防止超过总页数继续滚动
            var winH = $(window).height(); //页面可视区域高度
            var i = 2;
            $(window).scroll(function () {
                if (i < totalpage) { // 当滚动的页数小于总页数的时候，继续加载
                    var pageH = $(document.body).height();
                    var scrollT = $(window).scrollTop(); //滚动条top
                    var rate = (pageH - winH - scrollT) / winH;
                    if (rate < 0.01) {
                        if (!contains(myArray, i)) {
                            //alert(i);
                            getJson(i);
                            myArray.push(i);
                        }
                    }
                }
            });

            function getJson(page) {
                //alert("getJson:"+page);
                var start = $.trim($("#txtstart").val());
                var end = $.trim($("#txtend").val());
                $(".loading").show();
                $.ajax({
                    async: true,
                    type: "POST",
                    url: '/Service/WorkListIndex',
                    data: { page: page, start: start, end: end, status: '1' },
                    cache: false,
                    success: function (result) {
                        //alert(result);
                        $(".loading").hide();
                        $("#adddata").append(result);
                        i++;
                    },
                    error: function () {
                        //Ewewo.Tips('网络错误!');
                        Ewewo.RemoveLoading();
                    }
                });
            }
        });

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
        $('#txtstart,#txtend').change(
            function () {
                return false;
            }
        ).mobiscroll(opt_data);

        $(".khtopbtn").click(function () {
            var start = $.trim($("#txtstart").val());
            var end = $.trim($("#txtend").val());
            window.location.href = "/Service/WorkList?start=" + start + "&end=" + end +"&status=1";
        });
    </script>

</body>
</html>