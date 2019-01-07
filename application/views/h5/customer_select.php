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
    </script>
    <meta name="viewport" content="target-densitydpi=device-dpi, width=720px, user-scalable=no">
</head>
<style>
    .gmviptopbg {
        height: 90px;
        background: #000;
        filter: alpha(Opacity=30);
        -moz-opacity: 0.3;
        opacity: 0.3;
    }

    .gmviptop {
        position: absolute;
        width: 720px;
        color: #fff;
        z-index: 11;
        top: 0;
        line-height: 90px;
    }

    .gmviptop img {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        margin: 0 15px 0 25px;
    }

    .gmviptop font {
        float: right;
        margin-right: 40px;
    }

    .vipmc {
        position: absolute;
        z-index: 11;
        font-size: 36px;
        font-weight: bold;
        color: #6b2927;
        line-height: 80px;
        top: 6px;
        left: 25px;
    }

    .vipno {
        position: absolute;
        z-index: 11;
        width: 600px;
        text-align: right;
        top: 345px;
        font-size: 30px;
        color: #333;
        font-family: Tahoma, Geneva, sans-serif;
    }

    .vipcp {
        position: absolute;
        z-index: 11;
        left: 138px;
        width: 350px;
        text-align: center;
        top: 423px;
        font-size: 24px;
        color: #785a46;
        line-height: 64px;
    }

    .vipcp font {
        font-weight: bold;
        color: #6b2927;
        font-size: 30px;
    }

    .vipbtn {
        width: 628px;
        margin: 0 auto;
        height: 96px;
    }

    .vipbtn a {
        background: #936923 url(/Areas/Content/Images/vipbtnjt.png) right center no-repeat;
        display: block;
        padding-left: 20px;
        width: 280px;
        height: 66px;
        line-height: 66px;
        font-size: 26px;
        color: #e4d9a2;
        border-radius: 10px;
    }

    .vipny {
        border: 3px #ad5156 dotted;
        width: 600px;
        margin: 0 auto;
        border-radius: 10px;
        padding-left: 26px;
    }

    .vipny td {
        color: #e4a2a2;
        font-size: 22px;
        line-height: 36px;
    }

    .vippay {
        text-align: center;
        width: 628px;
        position: fixed;
        bottom: 40px;
        left: 50%;
        margin-left: -314px;
        z-index: 44;
    }

    .vippay a {
        font-size: 30px;
        text-align: center;
        color: #fff;
        background: #5cb63c;
        border-radius: 8px;
        display: block;
        height: 76px;
        line-height: 76px;
        box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.4);
    }

    .vippay a font {
        font-size: 24px;
        margin-left: 10px;
    }

    .xzcar {
        position: fixed;
        z-index: 356;
        bottom: 0;
        width: 720px;
        margin-left: -360px;
        left: 50%;
        box-shadow: 0px -3px 10px rgba(0, 0, 0, 0.4);
    }

    .xzcar ul {
        max-height: 600px;
        overflow: auto;
    }

    .xzcar ul li a {
        background: #936923;
        display: block;
        color: #e4d9a2;
        text-align: center;
        font-size: 26px;
        height: 76px;
        line-height: 76px;
        border-bottom: 1px #a67f3e solid;
    }

    .xzcar ul li:last-child a {
        border-bottom: none;
    }

    .xzcar ul li a.xz {
        background: #a67f3e url(/Areas/Shop/Content/Images/vipbtnjt.png) right center no-repeat;
        color: #fff;
    }

    .srcar {
        position: fixed;
        z-index: 356;
        bottom: 0;
        width: 720px;
        margin-left: -360px;
        left: 50%;
        box-shadow: 0px -3px 10px rgba(0, 0, 0, 0.4);
        background: #d2d5dc;
        padding-bottom: 4px;
    }

    .srcar dl {
        height: 76px;
        line-height: 76px;
        border-bottom: 1px #c2c7d4 solid;
        background: #fafafa;
        text-align: center;
        font-size: 30px;
        color: #38486d;
    }

    .srcar ul li {
        margin: 18px 0 0 20px;
    }

    .srcar ul li a {
        width: 86px;
        height: 80px;
        line-height: 80px;
        font-size: 26px;
        color: #555;
        display: block;
        background: #fafafa;
        border-radius: 5px;
        box-shadow: 0px 2px 3px rgba(0, 0, 0, 0.1);
        text-align: center;
        float: left;
        margin: 0 13px 15px 0;
    }

    .ul_input {
        padding: 0 0 0 300px;
    }

    .ul_input li {
        float: left;
        text-align: center;
    }
    .srcar dl a{ width:81px; height:76px; display:block; float:right;background:url(<?php echo base_url()?>statics/h5/images/zdzt.png) left top no-repeat; }
</style>
<body>
    <div class="title" style="position: fixed; width: 720px; z-index: 100;">
        <a href="javascript:void(0);" class="back" id="customersearchback" itemid="0">返回</a>
        <a href="javascript:void(0);" id="search_save" class="sure">保存</a>
        <ul class="sytime">
            选择顾客
        </ul>
    </div>
<!--    搜索-->
    <div class="search" style="margin-top:80px; position:relative;">
        <div class="xzkh" style="top:78px; z-index:99; display: none">
            <div id="loading2" class="loading2">
                <img src="<?php echo base_url()?>statics/h5/images/loading2.gif" width="32" height="32" />加载中，请稍后..
            </div>
        </div>
        <input type="text" id="search_input" class="phoneinput" value="" />
    </div>
<!--    用户信息-->
    <div class="fwadd_info" style="display:none;">
        <input type="hidden" id="txtdiscount" labourdiscount="100" stockdiscount="100">
        <ul>
            <li itemid="1" style="position:relative;"><a style="display:inline-block;">手机号码</a> <input type="text" id="search_mobile" class="infoinput" style="float:right; text-align:right; width:70%;" readonly/>
                <div class="xzkh1" style="top: 60px; z-index: 2; right:20px; width:65%;  display:none;">
                    <a id="nomobilediv" style="font-size: 26px;text-align:center;" href="javascript:void(0);">无手机号</a>
                </div>
            </li>
            <li itemid="2"><a style="display:inline-block;">顾客姓名</a> <input type="text" id="search_name" class="infoinput" style="float:right; text-align:right; width:70%;" readonly/> </li>
            <li itemid="3"><a style="display:inline-block;">车牌号</a> <input type="text" readonly="readonly" id="search_carno" onfocus="this.blur()" value="" class="infoinput" style="float:right; text-align:right; width:70%;" readonly/> </li>
        </ul>
    </div>
    <div class="" id="" style="height: 650px; overflow: auto; margin-top: -325px; display: none;"></div>


    <script type="text/javascript">
        var next = 0;
        $(function () {
            $(".srcar").find("ul").eq(0).find("li span").text("").removeClass("ppHas").removeClass("hasPro");
            for (var i = 0; i < customeData.carno.length; i++)
            {
                var s = customeData.carno.substr(i, 1);
                $(".srcar").find("ul").eq(0).find("li").eq(i).addClass("ppHas").find("span").text(s);
            }


        });
    </script>

</body>
</html>