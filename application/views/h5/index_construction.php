<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
    <title>首页</title>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/androidviewport.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/common.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/jquery.simplemodal.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/placeholder.js"></script>
    <script type="text/javascript">
        adaptUILayout.adapt(720);
    </script>
    <meta name="viewport" content="target-densitydpi=device-dpi, width=720px, user-scalable=no">
    <link media="all" href="<?php echo base_url()?>statics/h5/css/index.css" type="text/css" rel="stylesheet">
    <link media="all" href="<?php echo base_url()?>statics/h5/css/style.css" type="text/css" rel="stylesheet">
    <link media="all" href="<?php echo base_url()?>statics/h5/css/simple.css" type="text/css" rel="stylesheet">
</head>
    <body>
        <div class="system">
            <div class="djtype" id="box_addrecord" style="height: 250px; display: none;">
            <ul>
                <li><a href="addrecord.html" class="dt1" indepth="true"><font></font>综合服务单</a></li>
                <li><a href="addquickrecord.html" class="dt2" indepth="true"><font></font>工时快速单</a></li>
            </ul>
        </div>
            <div class="title">
                <a href="javascript:;" class="jiaose">施工员</a>
                <div class="jiaoselist">
                    <a href="index_pick_up_car" class="hs" style="width: 158px;" indepth="true">接车员</a>
                    <a href="javascript:void(0);" class="xz" style="width: 158px;">施工员</a>
                </div>
                <ul class="sytime">
                    <a href="javascript:void(0)" class="xztime date_time" indepth="true">今天</a>
                    <a href="javascript:void(0)" class="date_time   " indepth="true">本月</a>
                </ul>
            </div>
            <div class="sy_count">
                <dl>
                    <dt>施工绩效(元)</dt>
                    <dd>0.00</dd>
                </dl>
                <ul>
                    <li>施工项目(个)<font>0</font></li>
                    <li>施工台次(台)<font>0</font></li>
                    <li>质检台次(台)<font>0</font></li>
<!--                    <li>今日提成(元)<font>0</font></li>-->
<!--                    <li>本月累计提成(元)<font>0</font></li>-->
<!--                    <li>本月收入(元)<font>0</font></li>-->
                    <li>收入(元)<font>0</font></li>
                </ul>
            </div>
            <div class="fw_menu">
                    <ul>
                        <li class="fw4"><a href="task_list" indepth="true"><font></font>施工任务</a></li>
                        <li class="fw5"><a href="qclist.html" indepth="true"><font></font>质检任务</a></li>
                        <li class="fw15"><a href="checkercarchecklist.html" indepth="true"><font></font>车况检查</a></li>
<!--                        <li class="fw19"><a href="bonusdetail_001.html" indepth="true"><font></font>我的提成</a></li>-->
<!--                        <li class="fw20"><a href="stockpartslist.html" indepth="true"><font></font>库存查询</a></li>-->
<!--                        <li class="fw22"><a href="workshopnodispatch.html" indepth="true"><font></font>车间管理</a></li>-->
                    </ul>
                </div>
        </div>
        <div style="padding-top: 120px;"></div>
        <script type="text/javascript">
            $(function () {
                // 切換角色
                $(document).bind("click", function (e) {
                    var target = $(e.target);
                    if (target.closest(".jiaose").length == 0) {
                        $(".jiaoselist").hide();
                    }
                });
                $(".jiaose").click(function () {
                    $(".jiaoselist").toggle();
                });

                // 切换显示的数据
                $('.date_time').on('click',function () {
                    var time = $(this).html();
                    var showTime = '';
                    $('.xztime').removeClass('xztime');
                    $(this).addClass('xztime');
                    if (time == '本月'){
                        showTime = 'mouth';
                    } else{
                        showTime = 'day';
                    }
                    $.ajax({

                    })
                });
            })
        </script>
    </body>
</html>
