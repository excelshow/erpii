<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>服务记录列表</title>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/jquery-1.8.2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>statics/h5/css/index.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>statics/h5/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>statics/h5/css/simple.css">
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
<!--筛选-->
    <div class="mask_box" style="display: none;" id="mask_box">&nbsp;</div>
    <div class="ser_ss" style="display: none; position: fixed;" id="divsearch">
        <h2>姓名/手机号/车牌号</h2>
        <ul style="height: 50px;">
            <input name="" type="text" class="ss_time" placeholder="请输入关键字" style="width: 650px;" id="txtkeyword">
        </ul>
        <h2>开始时间</h2>
        <ul style="height: 52px;">
            <input name="" type="text" class="ss_time" id="starttime" value="2019-01-01" readonly=""><span style="margin: 0 22px;">至</span><input name="" type="text" class="ss_time" id="endtime" value="2019-01-06" readonly="">
        </ul>
        <h2>服务状态</h2>
        <dl id="dlstatus" style="margin-bottom: 30px;">
            <a href="javascript:void(0);" itemid="8" class="ssxz">等待报价</a>
            <a href="javascript:void(0);" itemid="4" class="ssxz">报价</a>
            <a href="javascript:void(0);" itemid="5" class="ssxz">施工</a>

            <a href="javascript:void(0);" itemid="20" class="ssxz">完工</a>
            <a href="javascript:void(0);" itemid="25" class="ssxz">已结算</a>
            <a href="javascript:void(0);" itemid="24" class="ssxz">服务取消</a>

        </dl>
        <div class="mask_btn"><a href="javascript:void(0);" id="cancel">取消</a><a href="javascript:;" id="btnSearch" class="queding">确定</a></div>
    </div>

<!--取消服务-->
    <div class="mask_box" style="display: none;" id="mask_box1">&nbsp;</div>
    <div class="mask_div" style="height: 240px; display: none; margin-top: -120px;" id="divcancelrecord">
        <h2>取消服务</h2>
        <ul style="height: 84px;">
            <li style="font-size: 24px; color: #999; text-align: left; padding-left: 10px;">您确定取消服务吗？</li>
        </ul>
        <div class="mask_btn"><a href="javascript:void(0);" id="cancel1">取消</a><a href="javascrip:;" class="queding" id="cancelconfirm">确定</a></div>
    </div>

<!--删除服务-->
    <div class="mask_box" style="display: none;" id="mask_box2">&nbsp;</div>
    <div class="mask_div" style="height: 240px; display: none; margin-top: -120px;" id="divdeleterecord">
        <h2>删除服务</h2>
        <ul style="height: 84px;">
            <li style="font-size: 24px; color: #999; text-align: left; padding-left: 10px;">您确定删除服务吗？</li>
        </ul>
        <div class="mask_btn"><a href="javascript:void(0);" id="cancel2">取消</a><a href="javascript:void(0);" class="queding" id="deleteconfirm">确定</a></div>
    </div>

    <div class="system">
        <div class="title">
            <a href="javascript:history.back(-1);" class="back">返回</a>
            <a href="sever_deailed_add" class="fw_add">新建</a>
            <ul class="sytime">服务记录</ul>
        </div>
<!--        主要内容-->
        <div class="yuyue_title">
            <div class="left font28">服务记录列表<font>(共 <span id="sprecord">1</span> 条)</font></div>
            <div class="right shaixuan">
                <a href="javascript:void(0);" class="sxbtn" id="asearch"><font>筛选</font><span></span></a>
            </div>
        </div>
        <div id="adddata">
            <div class="service_list" id="record5340572">
                <div class="service_left left">
                    <img src="http://res.ewewo.com//brandlogo/5014.jpg" width="100" height="100">
                    <span style="display: block; text-align: center;"></span>
                </div>
                <div class="service_right right">
                    <dl>
                        <dt>
                            <a href="javascript:;" class="fwzt" name="adeleterecord" itemid="5340572" id="adelete5340572" style="display:none; width:80px;">
                                删除
                            </a>
                            <a href="javascript:;" class="fwzt" name="acancelrecord" style="width:80px;" itemid="5340572" id="acancel5340572">
                                取消
                            </a>
                            <a href="sever_deailed_add + id"> 皖J40150 - 王小姐<font>(报价)</font></a>
                        </dt>
                        <dd style="border-bottom:1px #e6e6e6 solid; padding:10px 15px 10px 0;"><font class="fr">综合服务单</font>单号：1901050001</dd>
                        <dd>四轮动平衡换位</dd>
                    </dl>
                    <ul>

                        <li class="left"><a href="tel:18000000009">18000000009</a></li>
                        <li class="right"><font></font><span>2019-01-05 21:34</span></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="loading" style="display: none;" lang="item_loading">
            <img src="<?php echo base_url()?>statics/h5/images/loading.gif" width="24" height="24" style="margin-top: -5px;">&nbsp;正在加载中
        </div>

        <div style="padding-top: 120px;"></div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $(document).bind("click",function(e){
                var target  = $(e.target);
                if(target.closest("a[name=adeleterecord]").length == 0 && target.closest("#divdeleterecord").length == 0)
                {
                    $("#mask_box2").hide();
                    $("#divdeleterecord").hide();
                }
                if(target.closest("a[name=acancelrecord]").length == 0 && target.closest("#divcancelrecord").length == 0)
                {
                    $("#mask_box1").hide();
                    $("#divcancelrecord").hide();
                }
                //点击时，如果点击的不是 筛选按钮 查询层及其中的子元素 日历控件及其中的子元素 就把查询层隐藏
                if(target.closest("#asearch").length == 0 && target.closest("#divsearch").length == 0 && target.closest("div[role=dialog]").length == 0)
                {
                    $("#mask_box").hide();
                    $("#divsearch").hide();
                }

            })

            //日历
            var opt_data = {
                preset: 'datetime', //日期
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
                timeWheels: '',
                timeFormat: ''
            };


            $('#starttime,#endtime').change(function () {
                    var date = new Date($(this).val());
                    var starttime = $("#starttime").val().replace("-", "/");
                    var endtime = $("#endtime").val().replace("-", "/");
                    if (starttime != "" && endtime != "") {
                        var time1 = new Date(starttime);
                        var time2 = new Date(endtime);
                        if (time1 > time2) {
                            Ewewo.Tips('开始时间不能大于结束时间!');
                            return;
                        }
                    }

                }).mobiscroll(opt_data);

            $("#dlstatus a").each(function () {
                $(this).click(function () {
                    $(this).toggleClass("ssxz");
                })
            });


            function GetStatus() {
                var x = "";
                $("#dlstatus a").each(function () {
                    if ($(this).hasClass("ssxz")) {
                        x +=  '|' + $(this).attr("itemid");
                    }
                });
                return x;
            }

            //筛选按钮
            $("#asearch").click(function () {
                $("#mask_box").show();
                $("#divsearch").show();
            })
            var recordid=0;
            //取消服务弹出层
            $("a[name=acancelrecord]").live("click", function () {
                recordid=$(this).attr("itemid");
                $("#mask_box1").show();
                $("#divcancelrecord").show();
            })

            //删除服务弹出层
            $("a[name=adeleterecord]").live("click", function () {
                recordid=$(this).attr("itemid");
                $("#mask_box2").show();
                $("#divdeleterecord").show();
            });
            $(".bbqctz").click(function () {
                var text = $(this).attr("itemid");
                var commited = $(this).attr('data-commited');
                var storeid = $(this).attr('storeid');
                if (!text) {
                    Ewewo.Tips('请输入内容！');
                }
                if (commited == 1) {
                    return;
                }
                $(this).attr('data-commited', 1);
                $.ajax({
                    type: "POST",
                    url: '/Service/getbdtoken',
                    dataType: "json",
                    success: function (data) {
                        $(".bbqctz").attr('data-commited', 0);
                        if (data.result == 'T') {
                            if((navigator.userAgent.indexOf('iPhone') != -1) || (navigator.userAgent.indexOf('iPod') != -1) || (navigator.userAgent.indexOf('iPad') != -1))
                            {

                                Ewewo.iOSplayBDAudio(text, data.token, storeid);
                            }
                            else{
                                Ewewo.playBDAudio(text, data.token, storeid);
                            }
                        }
                        else {
                            Ewewo.Tips('获取失败!');
                        }
                    },
                    error: function () {
                        Ewewo.Tips('获取失败');
                    }
                });
            })
            $("#cancel").click(function () {
                $("#mask_box").hide();
                $("#divsearch").hide();
                return false;
            });
            $("#cancel1").click(function () {
                $("#mask_box1").hide();
                $("#divcancelrecord").hide();
                return false;
            });
            $("#cancel2").click(function () {
                $("#mask_box2").hide();
                $("#divdeleterecord").hide();
                return false;
            });

            $("#btnSearch").click(function () {
                var starttime = $("#starttime").val();
                var endtime = $("#endtime").val();
                var status = GetStatus();
                var keyword = $("#txtkeyword").val();
                var url = "/service/recordlist" + "?start=" + starttime.replace(" ", "_").replace(":", "|") + "&end=" + endtime.replace(" ", "_").replace(":", "|") + "&status=" + status + "&keyword="+keyword;
                window.location.href = url;
            });

            //取消服务
            $("#cancelconfirm").click(function () {
                $.ajax({
                    type: "POST",
                    data: { id: recordid, status: '24' },
                    url: "/service/modifyservicerecordstatus",
                    dataType: "json",
                    success: function (data) {
                        if (data.result == 'T') {
                            $("#adelete" + recordid).show();
                            $("#acancel" + recordid).hide();
                            $("#mask_box1").hide();
                            $("#divcancelrecord").hide();
                        }else if (data.result == 'N') {
                            Ewewo.Tips('服务记录已锁定不能取消!');
                        }
                        else {
                            Ewewo.Tips('更新状态不成功!');
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
                return false;
            });

            //删除服务
            $("#deleteconfirm").click(function () {
                $.ajax({
                    type: "POST",
                    data: { id: recordid },
                    url: "/service/deleterecord",
                    dataType: "json",
                    success: function (data) {
                        if (data.result == 'T') {
                            var spvalue = parseInt($("#sprecord").text());
                            $("#sprecord").text(spvalue-1);
                            $("#record"+ recordid).remove();
                            $("#mask_box2").hide();
                            $("#divdeleterecord").hide();
                        }
                        else if (data.result == 'N') {
                            Ewewo.Tips('服务记录已锁定不能删除!');
                        }
                        else {
                            Ewewo.Tips('删除不成功!');
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
                return false;
            });

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
            var totalpage = 2; //总页数，防止超过总页数继续滚动
            var winH = $(window).height(); //页面可视区域高度
            var i=2;
            $(window).scroll(function () {
                if (i < totalpage) { // 当滚动的页数小于总页数的时候，继续加载
                    var pageH = $(document.body).height();
                    var scrollT = $(window).scrollTop(); //滚动条top
                    var rate = (pageH - winH - scrollT) / winH;
                    if (rate < 0.01) {
                        if(!contains(myArray,i))
                        {
                            getJson(i);
                            myArray.push(i);
                        }
                    }
                }
            });
            function getJson(page) {
                var starttime = $("#starttime").val();
                var endtime = $("#endtime").val();
                var status = GetStatus();
                var keyword = $("#txtkeyword").val();
                $(".loading").show();
                $.ajax({
                    async:true,
                    type: "POST",
                    url: '/Service/RecordListIndex',
                    data: { page: page,status:status,start:starttime,end:endtime,keyword: keyword},
                    cache:false,
                    success: function (result) {
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
    </script>

</body>
</html>