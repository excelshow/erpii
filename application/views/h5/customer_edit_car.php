<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>添加爱车</title>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/jquery-1.8.2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>statics/h5/css/index.css?v=20161115">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>statics/h5/css/style.css?v=20181229141316">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>statics/h5/css/simple.css?v=1">
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/androidviewport.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/common.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/jquery.simplemodal.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/placeholder.js"></script>
    <script type="text/javascript">
        adaptUILayout.adapt(720);
    </script>
    <meta name="viewport" content="target-densitydpi=device-dpi, width=720px, user-scalable=no">
</head>
<body>
<script type="text/javascript">
    var resource_url = 'http://res.ewewo.com';
    var carmodel_url = '/Service/CarModelList';
    var reurl = '/Customer/view/2340187';
    var add_url = '/Customer/SaveAddCar';
    var car_search = '/Customer/CarSearchBykeyword';
    var chooseoperationurl = '/Home/ChooseOperation';
    var addrecordurl = '/Service/AddRecord';
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
<script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/brandscripts"></script>
<script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/addcar.js"></script>
<div class="mask_box" style="display: none">&nbsp;</div>
<div class="system" id="addcarinfo" itemid="0" customerid="2340187">
    <div class="title" style="position: fixed; width: 720px; z-index: 100;">
        <a href="javascript:history.back(-1);" class="back">返回</a>
        <a href="javascript:void(0);" class="sure">确定</a>
        <ul class="sytime">
            车辆信息
        </ul>
    </div>
    <div style="padding-top: 90px;"></div>
    <div class="car">
        <ul>
            <li>
                <font style="color: #ff0000;">车牌号</font>
                <span style="position: relative;">
                    <div class="xzkh" style="display: none; top: 78px; width: 110%;">
                        <div id="loading2" class="loading2">
                            <img src="<?php echo base_url()?>statics/h5/images/loading2.gif" width="32" height="32">加载中，请稍后..
                        </div>
                    </div>
                    <input type="text" class="carinput" id="txtcarplate" name="carplate" selectid="0">
                </span>
            </li>
        </ul>
        <div class="car">
            <ul id="select-car-info">
                <li id="select_car_brand"><a href="javascript:void(0);" class="carmore" lang="show" itemid="0"><font>品牌</font><span>请选择</span></a></li>
                <li id="select_car_line"><a href="javascript:void(0);" class="carmore" lang="show" itemid="0"><font>车系</font><span>请选择</span></a></li>
                <li id="select_car_year"><a href="javascript:void(0);" class="carmore" lang="show" itemid="0"><font>车型年款</font><span>请选择</span></a></li>
                <li id="select_car_kuan"><a href="javascript:void(0);" class="carmore" lang="show" itemid="0"><font>车型</font><span vehiclename="">请选择</span></a></li>
                <li>
                    <font>VIN码</font><span>
                        <input type="text" class="carinput" id="vin_one" style="color: rgb(51, 51, 51);">
                        <a href="javascript:void(0);" id="VINAI_one" style="position: absolute; right: 10px; margin-top: 12px; display: none;">
                            <img src="<?php echo base_url()?>statics/h5/images/index/sys.png">
                        </a>
                    </span>
                </li>
                <li>
                    <a href="javascript:void(0);" class="nofind" id="btn_sync">同步车型</a>
                </li>
            </ul>
            <ul style="display: none" id="type-car-info">
                <li>
                    <font>品牌</font><span>
                        <input type="text" class="carinput" name="brandname">
                    </span>
                </li>
                <li>
                    <font>车系</font><span>
                        <input type="text" class="carinput" name="linename">
                    </span>
                </li>
                <li>
                    <font>车型年款</font><span>
                        <input type="text" class="carinput" id="txtcaryear" name="caryear" value="">
                    </span>
                </li>
                <li>
                    <font>车型</font><span>
                        <input type="text" class="carinput" name="carkuanname">
                    </span>
                </li>
                <li>
                    <font>VIN码</font><span>
                        <input type="text" class="carinput" id="vin_two" name="vin">
                        <a href="javascript:void(0);" id="VINAI_two" style="position: absolute; right: 10px; margin-top: 12px; display: none;">
                            <img src="<?php echo base_url()?>statics/h5/images/index/sys.png">
                        </a>
                    </span>
                </li>
                <li>
                    <a href="javascript:void(0);" class="nofind" id="btn_sync">同步车型</a>
                </li>
            </ul>
        </div>

        <ul>
            <li>
                <a href="javascript:void(0);">
                    <font>购买时间</font><span>
                        <input type="text" class="carinput" value="请选择" id="txtbuydate" readonly="" style="color: rgb(51, 51, 51);">
                    </span>
                </a>
            </li>
            <li>
                <font>行驶里程</font><span>
                    <input type="text" class="carinput" id="txtmileage" value="请填写">
                </span>
            </li>
            <li>
                <font>发动机号</font><span>
                    <input type="text" class="carinput" id="txtenginenumber">
                </span>
            </li>
            <li>
                <font>VIN码</font>
                <span>
                    <input type="text" class="carinput" id="txtvin">
                    <a href="javascript:void(0);" id="VINAI_three" style="position: absolute; right: 10px; margin-top: 12px; display: none;">
                        <img src="<?php echo base_url()?>statics/h5/images/index/sys.png">
                    </a>
                </span>
            </li>
            <li>
                <font>投保公司</font><span>
                    <input type="text" class="carinput" id="txtinsurecompany">
                </span>
            </li>

            <li>
                <a href="javascript:void(0);">
                    <font>年审到期</font><span>
                        <input type="text" class="carinput" value="请选择" id="txtannualdue" readonly="" style="color: rgb(51, 51, 51);">
                    </span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <font>建议保养时间</font><span>
                        <input type="text" class="carinput" value="请选择" id="txtnextmaintenancetime" readonly="" style="color: rgb(51, 51, 51);">
                    </span>
                </a>
            </li>
            <li>
                <font>建议保养里程</font><span>
                    <input type="text" class="carinput" id="txtnextmaintenancemileage" value="">
                </span>
            </li>

            <li>
                <font>送修人</font><span>
                    <input type="text" id="txtsendman" value="" class="carinput" placeholder="请填写">
                </span>
            </li>
            <li>
                <font>送修人电话</font><span>
                    <input type="text" id="txtsendmanmobile" value="" class="carinput" placeholder="请填写">
                </span>
            </li>

        </ul>



        <ul>
            <li>
                <font>车主姓名</font><span>
                    <input type="text" id="txtusername" class="carinput" placeholder="请填写">
                </span>
            </li>
            <li>
                <font>车主电话</font><span>
                    <input type="text" class="carinput" id="txtownermobile" value="" placeholder="请填写">
                </span>
            </li>
            <li>
                <font>身份证号</font><span>
                    <input type="text" class="carinput" id="txtusercard" value="" placeholder="请填写">
                </span>
            </li>
            <li>
                <font>车主地址</font><span>
                    <input type="text" class="carinput" id="txtcaraddress" value="" placeholder="请填写">
                </span>
            </li>
            <li>
                <font>车辆颜色</font><span>
                    <input type="text" class="carinput" id="txtcarcolor" value="" placeholder="请填写">
                </span>
            </li>
            <li>
                <font>车辆价格</font><span>
                    <input type="text" class="carinput" id="txtcarprices" value="" placeholder="请填写" style="width:380px;">
                    万元
                </span>
            </li>
            <li>
                <font>车辆类型</font><span>
                    <select class="carinput" id="txtvehicletype" style="border: none; width: 400px; height: 78px; font-size: 26px; color: rgb(51, 51, 51);">
                        <option value="0">请选择</option>
                        <option value="1" selected="'selected'">小型轿车</option>
                        <option value="2">大型汽车</option>
                        <option value="3">专用汽车</option>
                        <option value="4">特种车</option>
                        <option value="8">三轮摩托车</option>
                    </select>
                </span>
            </li>
            <li>
                <font>使用性质</font><span>
                    <select class="carinput" id="txtusingnaturetype" style="border: none; width: 400px; height: 78px; font-size: 26px; color: rgb(51, 51, 51);">
                        <option value="0">请选择</option>
                        <option value="2">营运</option>
                        <option value="1">非营运</option>
                    </select>
                </span>
            </li>
            <li style="height: 130px;">
                <font>车辆备注</font><span>
                    <textarea class="carinput" id="txtcarnote" value="" style="width: 420px; margin: 0 auto; height: 80px; line-height: 30px; border: 1px #ccc solid; border-radius: 6px; font-size: 28px; padding: 8px; margin-top: 16px;" placeholder="请填写"></textarea>
                </span>
            </li>
        </ul>



        <ul>
            <li>

                <font>交强险到期时间</font>
                <input type="text" class="carinput" id="txtforceexpiredate" value="" readonly="">

            </li>
            <li>
                <font>交强险保险公司</font><span>
                    <select class="carinput" style="border: none; width: 400px; height: 78px; font-size: 26px; color: rgb(51, 51, 51);" id="txtforceexpirecompanyid">
                        <option value="0">---请选择交强险公司---</option>
                            <option value="682">太平洋车险</option>
                            <option value="1705">平安车险</option>
                            <option value="2728">人保车险</option>
                            <option value="3751">中国人寿财险</option>
                            <option value="4774">中华联合车险</option>
                            <option value="5797">大地车险</option>
                            <option value="6820">阳光车险</option>
                            <option value="7843">太平车险</option>
                            <option value="8866">华安车险</option>
                            <option value="9889">天安车险</option>
                            <option value="10912">英大泰和车险</option>
                            <option value="11935">安盛天平车险</option>
                            <option value="12958">安心车险</option>
                            <option value="13981">紫金车险</option>
                            <option value="15004">合众车险</option>
                            <option value="16027">利宝车险</option>
                            <option value="17050">其他</option>
                    </select>
                </span>
            </li>
            <li>
                <font>交强险保单号</font><span>
                    <input type="text" id="txtforceexpireorderno" value="" class="carinput" placeholder="请填写">
                </span>
            </li>
            <li>
                <font>交强险销售人员</font><span>
                    <input type="text" id="txtforceexpiresaleman" value="" class="carinput" placeholder="请填写">
                </span>
            </li>
            <li>
                <font>商业险到期时间</font>
                <input type="text" class="carinput" id="txtinsuranceexpires" value="" readonly="">
            </li>
            <li>
                <font>商业险保险公司</font><span>
                    <select class="carinput" style="border: none; width: 400px; height: 78px; font-size: 26px; color: rgb(51, 51, 51);" id="txtbusinessexpirecompanyid">
                        <option value="0">---请选择商业险公司---</option>
                            <option value="682">太平洋车险</option>
                            <option value="1705">平安车险</option>
                            <option value="2728">人保车险</option>
                            <option value="3751">中国人寿财险</option>
                            <option value="4774">中华联合车险</option>
                            <option value="5797">大地车险</option>
                            <option value="6820">阳光车险</option>
                            <option value="7843">太平车险</option>
                            <option value="8866">华安车险</option>
                            <option value="9889">天安车险</option>
                            <option value="10912">英大泰和车险</option>
                            <option value="11935">安盛天平车险</option>
                            <option value="12958">安心车险</option>
                            <option value="13981">紫金车险</option>
                            <option value="15004">合众车险</option>
                            <option value="16027">利宝车险</option>
                            <option value="17050">其他</option>
                    </select>
                </span>
            </li>
            <li>
                <font>商业险保单号</font><span>
                    <input type="text" id="txtbusinessexpireorderno" value="" class="carinput" placeholder="请填写">
                </span>
            </li>
            <li>
                <font>商业险销售人员</font><span>
                    <input type="text" id="txtbusinessexpiresaleman" value="" class="carinput" placeholder="请填写">
                </span>
            </li>
            <li>
                <font>保险备注</font><span>
                    <input type="text" id="txtinsurancenote" value="" class="carinput" placeholder="请填写">
                </span>
            </li>
        </ul>



    </div>
    <div class="khview report" style="margin-top: 16px;">

        <div class="zhaopian" id="customerinfo">
            <ul>
                <li style="height: 184px;"><a href="javascript:" class="photoadd"><font></font>添加照片</a></li>
            </ul>
        </div>
    </div>
    <div style="padding-top: 130px;"></div>
</div>
<!--品牌弹出层开始-->
<div class="mask" id="window_brand" style="display: none; top: 0px;">
    <div class="chexing_menu" id="letter_list"><a href="#A" letter="A" lang="letteritem">A</a><a href="#B" letter="B" lang="letteritem">B</a><a href="#C" letter="C" lang="letteritem">C</a><a href="#D" letter="D" lang="letteritem">D</a><a href="#F" letter="F" lang="letteritem">F</a><a href="#G" letter="G" lang="letteritem">G</a><a href="#H" letter="H" lang="letteritem">H</a><a href="#J" letter="J" lang="letteritem">J</a><a href="#K" letter="K" lang="letteritem">K</a><a href="#L" letter="L" lang="letteritem">L</a><a href="#M" letter="M" lang="letteritem">M</a><a href="#N" letter="N" lang="letteritem">N</a><a href="#O" letter="O" lang="letteritem">O</a><a href="#P" letter="P" lang="letteritem">P</a><a href="#Q" letter="Q" lang="letteritem">Q</a><a href="#R" letter="R" lang="letteritem">R</a><a href="#S" letter="S" lang="letteritem">S</a><a href="#T" letter="T" lang="letteritem">T</a><a href="#W" letter="W" lang="letteritem">W</a><a href="#X" letter="X" lang="letteritem">X</a><a href="#Y" letter="Y" lang="letteritem">Y</a><a href="#Z" letter="Z" lang="letteritem">Z</a></div>
    <div class="title">
        <a href="javascript:;" lang="window_brand" class="sure">确定</a>
        <ul class="sytime">
            选择车辆品牌
        </ul>
    </div>

    <div class="chexing" id="brand_list" style="margin-top: 0px;"><h2 id="A" letter="A">A</h2><ul><li letter="A" itemid="33" code="402880861203d16701122d764d7a0085" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/1000.jpg" alt="一汽奥迪" width="52px" height="52px">一汽奥迪</a></li> <li letter="A" itemid="294" code="402880ef0cd29b61010cd7e6dade004d" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/1000.jpg" alt="奥迪" width="52px" height="52px">奥迪</a></li> <li letter="A" itemid="830" code="I0000000000000000200000000000287" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/35.jpg" alt="阿斯顿-马丁" width="52px" height="52px">阿斯顿-马丁</a></li> <li letter="A" itemid="842" code="I0000000000000000200000000000320" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/34.jpg" alt="阿尔法罗密欧" width="52px" height="52px">阿尔法罗密欧</a></li> <li letter="A" itemid="920" code="I0000000000000000530000000000318" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/5001.jpg" alt="安凯" width="52px" height="52px">安凯</a></li> <h2 id="B" letter="B">B</h2><ul><li letter="B" itemid="4" code="402880860de3bd77010dedaed3c802c1" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/1166.jpg" alt="东风标致" width="52px" height="52px">东风标致</a></li> <li letter="B" itemid="11" code="402880860de3bd77010dee92c5f83100" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/biaozhi.png" alt="标致" width="52px" height="52px">标致</a></li> <li letter="B" itemid="13" code="402880860e4ffe94010e543164964104" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/beiqi.jpg" alt="北汽" width="52px" height="52px">北汽</a></li> <li letter="B" itemid="19" code="402880860e732189010e7346542c0256" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/baoshijie.png" alt="保时捷" width="52px" height="52px">保时捷</a></li> <li letter="B" itemid="22" code="402880860e7ecf53010e8770eb952842" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/bieke.png" alt="别克" width="52px" height="52px">别克</a></li> <li letter="B" itemid="111" code="402880881eaf2b86011eb92a57f003c8" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/37.jpg" alt="布加迪" width="52px" height="52px">布加迪</a></li> <li letter="B" itemid="143" code="4028808827176b6b01271882e274022e" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/benchi.png" alt="福建奔驰" width="52px" height="52px">福建奔驰</a></li> <li letter="B" itemid="171" code="40288088309d00b60130b03a550b05ef" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/5004.jpg" alt="北汽威旺" width="52px" height="52px">北汽威旺</a></li> <li letter="B" itemid="177" code="4028808831adfffa0131b293502e0284" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/baojun.png" alt="宝骏" width="52px" height="52px">宝骏</a></li> <li letter="B" itemid="274" code="402880ef0ca4b73f010ca88d84000002" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/bentian.png" alt="广汽本田" width="52px" height="52px">广汽本田</a></li> <li letter="B" itemid="279" code="402880ef0ca9c2b6010cc27929a6002c" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/bieke.png" alt="上汽通用别克" width="52px" height="52px">上汽通用别克</a></li> <li letter="B" itemid="289" code="402880ef0ca9c2b6010cd1edbed7019d" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/baoma.png" alt="华晨宝马" width="52px" height="52px">华晨宝马</a></li> <li letter="B" itemid="293" code="402880ef0cd29b61010cd74ec68e0043" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/baoma.png" alt="宝马" width="52px" height="52px">宝马</a></li> <li letter="B" itemid="312" code="402880ef0d7694be010d7d155fbe050c" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/bentian.png" alt="东风本田" width="52px" height="52px">东风本田</a></li> <li letter="B" itemid="313" code="402880ef0d7694be010d8c3b09813707" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/benchi.png" alt="梅赛德斯-奔驰" width="52px" height="52px">梅赛德斯-奔驰</a></li> <li letter="B" itemid="326" code="4028b2883619a79f01362db397f80873" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/beijingqiche.png" alt="北京汽车" width="52px" height="52px">北京汽车</a></li> <li letter="B" itemid="331" code="4028b28838b1bcb70138d67b968e2b4f" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/yiqibenteng.png" alt="一汽奔腾" width="52px" height="52px">一汽奔腾</a></li> <li letter="B" itemid="342" code="4028b2883bca4966013bcb7df69a0370" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/shenbao.png" alt="北汽绅宝" width="52px" height="52px">北汽绅宝</a></li> <li letter="B" itemid="361" code="4028b28844b618a001451be0397c0171" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/huansu.png" alt="北汽幻速" width="52px" height="52px">北汽幻速</a></li> <li letter="B" itemid="401" code="4028b2b653c77fc401542c640d8a6c8e" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/baowo.png" alt="宝沃" width="52px" height="52px">宝沃</a></li> <li letter="B" itemid="417" code="4028b2b658b8788a0158f238e8615b94" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/5006.jpg" alt="北汽新能源" width="52px" height="52px">北汽新能源</a></li> <li letter="B" itemid="421" code="5ea38e3a0dc1c163010dceeed48555b4" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/biyadi.png" alt="比亚迪" width="52px" height="52px">比亚迪</a></li> <li letter="B" itemid="433" code="5ea38e3a0dc1c163010dd43cdd04371a" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/bentian.png" alt="本田" width="52px" height="52px">本田</a></li> <li letter="B" itemid="846" code="I0000000000000000200000000000327" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/39.jpg" alt="宾利" width="52px" height="52px">宾利</a></li> <li letter="B" itemid="887" code="I0000000000000000200000000000423" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/benchi.png" alt="北京奔驰" width="52px" height="52px">北京奔驰</a></li> <h2 id="C" letter="C">C</h2><ul><li letter="C" itemid="18" code="402880860e4ffe94010e72f6a9270365" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/changhe.png" alt="昌河" width="52px" height="52px">昌河</a></li> <li letter="C" itemid="300" code="402880ef0cd29b61010d0be728060238" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/changcheng.png" alt="长城" width="52px" height="52px">长城</a></li> <li letter="C" itemid="350" code="4028b288414ee80801415df36fa9104c" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/ds.png" alt="长安谛艾仕" width="52px" height="52px">长安谛艾仕</a></li> <li letter="C" itemid="424" code="5ea38e3a0dc1c163010dd30fecea67a4" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/changan.png" alt="长安" width="52px" height="52px">长安</a></li> <h2 id="D" letter="D">D</h2><ul><li letter="D" itemid="28" code="402880861203d16701122d6f2f740080" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/dongfengfengxing.png" alt="东风风行" width="52px" height="52px">东风风行</a></li> <li letter="D" itemid="34" code="402880861203d16701122d7fc6670086" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/tianjinluda.jpg" alt="天津达路" width="52px" height="52px">天津达路</a></li> <li letter="D" itemid="128" code="402880882255030c012259d140c702f8" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/dongfengfengshen.png" alt="东风风神" width="52px" height="52px">东风风神</a></li> <li letter="D" itemid="182" code="4028808832a004df0132e2789cb418a1" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/5066.jpg" alt="上汽大通" width="52px" height="52px">上汽大通</a></li> <li letter="D" itemid="258" code="402880ac1167b1fa01116fd060e616c6" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/zzdf.jpg" alt="郑州东风" width="52px" height="52px">郑州东风</a></li> <li letter="D" itemid="275" code="402880ef0ca4b73f010ca8afb2bb0010" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/dazhong.png" alt="一汽大众" width="52px" height="52px">一汽大众</a></li> <li letter="D" itemid="282" code="402880ef0ca9c2b6010cc8428d8c00e7" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/dongnan.png" alt="东南" width="52px" height="52px">东南</a></li> <li letter="D" itemid="287" code="402880ef0ca9c2b6010cd19acf460187" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/dazhong.png" alt="上汽大众" width="52px" height="52px">上汽大众</a></li> <li letter="D" itemid="301" code="402880ef0d151e6a010d1f0c124d281f" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/dazhong.png" alt="大众" width="52px" height="52px">大众</a></li> <li letter="D" itemid="378" code="4028b2b64b5995f9014b5c9bd6160156" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/5019.jpg" alt="东风风度" width="52px" height="52px">东风风度</a></li> <li letter="D" itemid="422" code="5ea38e3a0dc1c163010dcf0132bb5887" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/qita.png" alt="大宇" width="52px" height="52px">大宇</a></li> <li letter="D" itemid="426" code="5ea38e3a0dc1c163010dd3668a2207fd" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/daoqi.png" alt="道奇" width="52px" height="52px">道奇</a></li> <li letter="D" itemid="890" code="I0000000000000000490000000000040" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/dongfengfengxing.png" alt="东风" width="52px" height="52px">东风</a></li> <h2 id="F" letter="F">F</h2><ul><li letter="F" itemid="285" code="402880ef0ca9c2b6010ccd683fbf0138" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/futian.png" alt="福田" width="52px" height="52px">福田</a></li> <li letter="F" itemid="299" code="402880ef0cd29b61010d0b1574db021b" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/fengtian.png" alt="天津一汽丰田" width="52px" height="52px">天津一汽丰田</a></li> <li letter="F" itemid="304" code="402880ef0d4a5670010d4d6ff9ee2a82" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/fengtian.png" alt="丰田" width="52px" height="52px">丰田</a></li> <li letter="F" itemid="307" code="402880ef0d4a5670010d4db535fd453f" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/feiyate.png" alt="南京菲亚特" width="52px" height="52px">南京菲亚特</a></li> <li letter="F" itemid="308" code="402880ef0d5d9e8c010d5e22c22b2eac" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/fengtian.png" alt="四川一汽丰田" width="52px" height="52px">四川一汽丰田</a></li> <li letter="F" itemid="309" code="402880ef0d5d9e8c010d5e51159b3cac" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/fute.png" alt="长安福特" width="52px" height="52px">长安福特</a></li> <li letter="F" itemid="314" code="40288aaf0ca9a797010ca9b481c30002" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/fengtian.png" alt="广汽丰田" width="52px" height="52px">广汽丰田</a></li> <li letter="F" itemid="336" code="4028b28839aa3b5e0139b36fb0f50dbb" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/feiyate.png" alt="广汽菲亚特" width="52px" height="52px">广汽菲亚特</a></li> <li letter="F" itemid="434" code="5ea38e3a0dc1c163010dd4416bd338ae" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/fute.png" alt="福特" width="52px" height="52px">福特</a></li> <li letter="F" itemid="852" code="I0000000000000000200000000000353" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/feiyate.png" alt="菲亚特" width="52px" height="52px">菲亚特</a></li> <li letter="F" itemid="874" code="I0000000000000000200000000000395" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/default.jpg" alt="飞碟" width="52px" height="52px">飞碟</a></li> <li letter="F" itemid="875" code="I0000000000000000200000000000396" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/42.jpg" alt="法拉利" width="52px" height="52px">法拉利</a></li> <h2 id="G" letter="G">G</h2><ul><li letter="G" itemid="158" code="402880882ce35a1f012d0814e2f019e8" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/guangqicyc.jpg" alt="广汽乘用车" width="52px" height="52px">广汽乘用车</a></li> <li letter="G" itemid="192" code="402880990fc25df8010fc336f9a300c2" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/116.jpg" alt="光冈" width="52px" height="52px">光冈</a></li> <li letter="G" itemid="352" code="4028b288426abccd014293141f3d3626" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/guanzhi.png" alt="观致" width="52px" height="52px">观致</a></li> <h2 id="H" letter="H">H</h2><ul><li letter="H" itemid="24" code="402880860e7ecf53010e88bc5b8c750f" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/huanghai.png" alt="黄海" width="52px" height="52px">黄海</a></li> <li letter="H" itemid="26" code="40288086119bd32d01119d375a770e6f" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/haima.png" alt="海马" width="52px" height="52px">海马</a></li> <li letter="H" itemid="280" code="402880ef0ca9c2b6010cc2ad76800034" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/huapu.png" alt="华普" width="52px" height="52px">华普</a></li> <li letter="H" itemid="283" code="402880ef0ca9c2b6010cc8ed5c6a0111" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/hafei.png" alt="哈飞" width="52px" height="52px">哈飞</a></li> <li letter="H" itemid="288" code="402880ef0ca9c2b6010cd1bf1be00198" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/hongqi.png" alt="一汽红旗" width="52px" height="52px">一汽红旗</a></li> <li letter="H" itemid="324" code="4028b28835b224340136062c16b53582" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/haima.png" alt="郑州海马" width="52px" height="52px">郑州海马</a></li> <li letter="H" itemid="370" code="4028b2b6495650c701495a65cb380909" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/hafu.png" alt="哈弗" width="52px" height="52px">哈弗</a></li> <li letter="H" itemid="376" code="4028b2b64b2aec76014b2ebbd6e4041a" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/5031.jpg" alt="华颂" width="52px" height="52px">华颂</a></li> <li letter="H" itemid="406" code="4028b2b655e3b5990155ec4e0b3610d2" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/267.jpg" alt="汉腾" width="52px" height="52px">汉腾</a></li> <li letter="H" itemid="879" code="I0000000000000000200000000000405" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/43.jpg" alt="悍马" width="52px" height="52px">悍马</a></li> <li letter="H" itemid="880" code="I0000000000000000200000000000407" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/huatai.png" alt="华泰" width="52px" height="52px">华泰</a></li> <h2 id="J" letter="J">J</h2><ul><li letter="J" itemid="30" code="402880861203d16701122d73e5c10082" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/jipu.png" alt="北京吉普" width="52px" height="52px">北京吉普</a></li> <li letter="J" itemid="127" code="40288088212f7c8e0121329d9f70007e" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/jili.png" alt="吉利帝豪" width="52px" height="52px">吉利帝豪</a></li> <li letter="J" itemid="302" code="402880ef0d35ed44010d3a0f767328ef" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/jianghuai.png" alt="江淮" width="52px" height="52px">江淮</a></li> <li letter="J" itemid="306" code="402880ef0d4a5670010d4d888c6532db" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/jili.png" alt="吉利" width="52px" height="52px">吉利</a></li> <li letter="J" itemid="310" code="402880ef0d5d9e8c010d620fc82e7fa8" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/jinbei.png" alt="金杯" width="52px" height="52px">金杯</a></li> <li letter="J" itemid="360" code="4028b288446880fa014477adea0a0ec9" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/5044.jpg" alt="江铃轻汽" width="52px" height="52px">江铃轻汽</a></li> <li letter="J" itemid="430" code="5ea38e3a0dc1c163010dd3a79e1b1f7d" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/jiao.png" alt="吉奥" width="52px" height="52px">吉奥</a></li> <li letter="J" itemid="857" code="I0000000000000000200000000000366" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/jiebao.png" alt="捷豹" width="52px" height="52px">捷豹</a></li> <li letter="J" itemid="860" code="I0000000000000000200000000000371" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/5045.jpg" alt="金旅" width="52px" height="52px">金旅</a></li> <li letter="J" itemid="861" code="I0000000000000000200000000000372" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/jipu.png" alt="吉普" width="52px" height="52px">吉普</a></li> <li letter="J" itemid="883" code="I0000000000000000200000000000415" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/jiangling.png" alt="江铃" width="52px" height="52px">江铃</a></li> <li letter="J" itemid="884" code="I0000000000000000200000000000416" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/jiangnan.png" alt="江南" width="52px" height="52px">江南</a></li> <li letter="J" itemid="928" code="I0000000000000000530000000000331" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/5047.jpg" alt="金龙" width="52px" height="52px">金龙</a></li> <h2 id="K" letter="K">K</h2><ul><li letter="K" itemid="29" code="402880861203d16701122d71e1650081" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/kelaisile.png" alt="克莱斯勒" width="52px" height="52px">克莱斯勒</a></li> <li letter="K" itemid="122" code="4028808820ad777c0120ade5684e007e" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/kairui.png" alt="开瑞" width="52px" height="52px">开瑞</a></li> <li letter="K" itemid="199" code="4028809910766abf01107c72a84c01c8" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/bjkelaisile.jpg" alt="北京克莱斯勒" width="52px" height="52px">北京克莱斯勒</a></li> <li letter="K" itemid="337" code="4028b28839c421fc0139e811e88e2803" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/5049.jpg" alt="卡威" width="52px" height="52px">卡威</a></li> <li letter="K" itemid="343" code="4028b2883bca4966013bda68fc0910a4" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/100.jpg" alt="科尼赛克" width="52px" height="52px">科尼赛克</a></li> <li letter="K" itemid="371" code="4028b2b6498492f701499d03cedb0df7" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/5048.jpg" alt="凯翼" width="52px" height="52px">凯翼</a></li> <li letter="K" itemid="420" code="5ea38e3a0dc1c163010dcde4b2944e28" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/kaidilake.png" alt="凯迪拉克" width="52px" height="52px">凯迪拉克</a></li> <li letter="K" itemid="833" code="I0000000000000000200000000000300" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/kaidilake.png" alt="上汽通用凯迪拉克" width="52px" height="52px">上汽通用凯迪拉克</a></li> <h2 id="L" letter="L">L</h2><ul><li letter="L" itemid="20" code="402880860e732189010e7de961ac15e2" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/liebao.png" alt="猎豹" width="52px" height="52px">猎豹</a></li> <li letter="L" itemid="78" code="40288088179ac9370117a0c7fbaa0262" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/lianhua.png" alt="青年莲花" width="52px" height="52px">青年莲花</a></li> <li letter="L" itemid="167" code="402880882f2a43c3012f66b15f96204c" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/linian.png" alt="广汽本田理念" width="52px" height="52px">广汽本田理念</a></li> <li letter="L" itemid="284" code="402880ef0ca9c2b6010cccccda41012f" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/changhe.png" alt="昌河铃木" width="52px" height="52px">昌河铃木</a></li> <li letter="L" itemid="298" code="402880ef0cd29b61010ce99faea9018c" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/lingmu.png" alt="长安铃木" width="52px" height="52px">长安铃木</a></li> <li letter="L" itemid="377" code="4028b2b64b2aec76014b47d2dc681dc8" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/qrjblh.jpg" alt="奇瑞捷豹路虎" width="52px" height="52px">奇瑞捷豹路虎</a></li> <li letter="L" itemid="398" code="4028b2b6537f19ef0153838185040450" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/leinuo.png" alt="东风雷诺" width="52px" height="52px">东风雷诺</a></li> <li letter="L" itemid="427" code="5ea38e3a0dc1c163010dd38a05431700" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/leikesasi.png" alt="雷克萨斯" width="52px" height="52px">雷克萨斯</a></li> <li letter="L" itemid="428" code="5ea38e3a0dc1c163010dd38f6136190d" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/linken.png" alt="林肯" width="52px" height="52px">林肯</a></li> <li letter="L" itemid="834" code="I0000000000000000200000000000303" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/48.jpg" alt="兰博基尼" width="52px" height="52px">兰博基尼</a></li> <li letter="L" itemid="836" code="I0000000000000000200000000000305" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/lifan.png" alt="力帆(乘用车)" width="52px" height="52px">力帆(乘用车)</a></li> <li letter="L" itemid="837" code="I0000000000000000200000000000306" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/lufeng.png" alt="陆风" width="52px" height="52px">陆风</a></li> <li letter="L" itemid="840" code="I0000000000000000200000000000309" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/luhu.png" alt="路虎" width="52px" height="52px">路虎</a></li> <li letter="L" itemid="841" code="I0000000000000000200000000000315" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/lingmu.png" alt="铃木" width="52px" height="52px">铃木</a></li> <li letter="L" itemid="864" code="I0000000000000000200000000000375" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/54.jpg" alt="劳斯莱斯" width="52px" height="52px">劳斯莱斯</a></li> <li letter="L" itemid="885" code="I0000000000000000200000000000418" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/leinuo.png" alt="雷诺" width="52px" height="52px">雷诺</a></li> <li letter="L" itemid="1028" code="4028b2b65ec6cb5a015ec6f67bc70017" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/default.jpg" alt="领克" width="52px" height="52px">领克</a></li> <h2 id="M" letter="M">M</h2><ul><li letter="M" itemid="8" code="402880860de3bd77010dee32b9491c76" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/mazida.png" alt="一汽马自达" width="52px" height="52px">一汽马自达</a></li> <li letter="M" itemid="17" code="402880860e4ffe94010e605247d8700e" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/mazida.png" alt="海南马自达" width="52px" height="52px">海南马自达</a></li> <li letter="M" itemid="180" code="40288088324bcf80013261447b240566" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/168.jpg" alt="摩根" width="52px" height="52px">摩根</a></li> <li letter="M" itemid="250" code="402880991229bc0c01122b8d756f0004" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/mg.png" alt="MG名爵" width="52px" height="52px">MG名爵</a></li> <li letter="M" itemid="866" code="I0000000000000000200000000000377" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/55.jpg" alt="迈巴赫" width="52px" height="52px">迈巴赫</a></li> <li letter="M" itemid="867" code="I0000000000000000200000000000378" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/mini.png" alt="迷你" width="52px" height="52px">迷你</a></li> <li letter="M" itemid="869" code="I0000000000000000200000000000381" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/mazida.png" alt="马自达" width="52px" height="52px">马自达</a></li> <li letter="M" itemid="870" code="I0000000000000000200000000000383" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/mazida.png" alt="长安马自达" width="52px" height="52px">长安马自达</a></li> <li letter="M" itemid="886" code="I0000000000000000200000000000422" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/57.jpg" alt="玛莎拉蒂" width="52px" height="52px">玛莎拉蒂</a></li> <h2 id="N" letter="N">N</h2><ul><li letter="N" itemid="139" code="4028808825c023de0125c39ab8710107" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/nazhijie.png" alt="纳智捷" width="52px" height="52px">纳智捷</a></li> <h2 id="O" letter="O">O</h2><ul><li letter="O" itemid="332" code="4028b28838b1bcb70138d684ed2e2b8d" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/oulang.png" alt="一汽欧朗" width="52px" height="52px">一汽欧朗</a></li> <li letter="O" itemid="429" code="5ea38e3a0dc1c163010dd39dc7001cac" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/oubao.png" alt="欧宝" width="52px" height="52px">欧宝</a></li> <li letter="O" itemid="843" code="I0000000000000000200000000000321" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/ouge.png" alt="讴歌" width="52px" height="52px">讴歌</a></li> <h2 id="P" letter="P">P</h2><ul><li letter="P" itemid="347" code="4028b2883f506d56013f7f0c4f323e61" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/61.jpg" alt="帕加尼" width="52px" height="52px">帕加尼</a></li> <h2 id="Q" letter="Q">Q</h2><ul><li letter="Q" itemid="133" code="4028808823cb1dca0123cc3349b60168" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/quanqiuying.jpg" alt="全球鹰" width="52px" height="52px">全球鹰</a></li> <li letter="Q" itemid="281" code="402880ef0ca9c2b6010cc3c5f8de0055" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/qiya.png" alt="东风悦达起亚" width="52px" height="52px">东风悦达起亚</a></li> <li letter="Q" itemid="296" code="402880ef0cd29b61010ce7a1798100a4" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/qirui.png" alt="奇瑞" width="52px" height="52px">奇瑞</a></li> <li letter="Q" itemid="323" code="4028b28835b224340135d21c78c618c4" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/qichen.png" alt="启辰" width="52px" height="52px">启辰</a></li> <li letter="Q" itemid="355" code="4028b28842e6dc8f014398ac462922d7" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/qiteng.png" alt="福汽启腾" width="52px" height="52px">福汽启腾</a></li> <li letter="Q" itemid="425" code="5ea38e3a0dc1c163010dd33ff03c7502" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/qiya.png" alt="起亚" width="52px" height="52px">起亚</a></li> <li letter="Q" itemid="889" code="I0000000000000000200000000000427" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/qingling.png" alt="庆铃(五十铃)" width="52px" height="52px">庆铃(五十铃)</a></li> <h2 id="R" letter="R">R</h2><ul><li letter="R" itemid="123" code="4028808820ad777c0120ade688640082" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/ruizuo.png" alt="瑞麒" width="52px" height="52px">瑞麒</a></li> <li letter="R" itemid="185" code="402880883387cb920133a08f69e30bd4" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/174.jpg" alt="如虎" width="52px" height="52px">如虎</a></li> <li letter="R" itemid="194" code="402880990fc25df8010fc701524400d6" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/rongwei.png" alt="荣威" width="52px" height="52px">荣威</a></li> <li letter="R" itemid="290" code="402880ef0cd29b61010cd6bcef2a001c" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/richan.png" alt="郑州日产" width="52px" height="52px">郑州日产</a></li> <li letter="R" itemid="303" code="402880ef0d35ed44010d3e3aa5bb3e26" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/richan.png" alt="东风日产" width="52px" height="52px">东风日产</a></li> <li letter="R" itemid="418" code="5ea38e3a0dc1c163010dc95fa9583728" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/richan.png" alt="日产" width="52px" height="52px">日产</a></li> <h2 id="S" letter="S">S</h2><ul><li letter="S" itemid="7" code="402880860de3bd77010dee278bc619c4" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/shuanglong.png" alt="双龙" width="52px" height="52px">双龙</a></li> <li letter="S" itemid="15" code="402880860e4ffe94010e556d500314e0" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/sikeda.png" alt="斯柯达" width="52px" height="52px">斯柯达</a></li> <li letter="S" itemid="32" code="402880861203d16701122d759b220084" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/sanling.png" alt="东南三菱" width="52px" height="52px">东南三菱</a></li> <li letter="S" itemid="172" code="4028808830d0a8bb0130d4be5d5b05c4" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/smart.png" alt="精灵Smart" width="52px" height="52px">精灵Smart</a></li> <li letter="S" itemid="277" code="402880ef0ca9c2b6010cb397c9b20008" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/sanling.png" alt="北京三菱" width="52px" height="52px">北京三菱</a></li> <li letter="S" itemid="327" code="4028b2883696f90c0136be2b29ea30b1" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/siming.jpg" alt="思铭" width="52px" height="52px">思铭</a></li> <li letter="S" itemid="338" code="4028b2883b166e0f013b2bbc6e5a332b" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/sanling.png" alt="广汽三菱" width="52px" height="52px">广汽三菱</a></li> <li letter="S" itemid="431" code="5ea38e3a0dc1c163010dd3e38177233b" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/sanling.png" alt="三菱" width="52px" height="52px">三菱</a></li> <li letter="S" itemid="432" code="5ea38e3a0dc1c163010dd43442ed35da" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/shuanghuan.png" alt="双环" width="52px" height="52px">双环</a></li> <li letter="S" itemid="795" code="I0000000000000000200000000000219" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/sabo.png" alt="萨博" width="52px" height="52px">萨博</a></li> <li letter="S" itemid="796" code="I0000000000000000200000000000220" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/sibalu.png" alt="斯巴鲁" width="52px" height="52px">斯巴鲁</a></li> <li letter="S" itemid="803" code="I0000000000000000200000000000229" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/sikeda.png" alt="上汽大众斯柯达" width="52px" height="52px">上汽大众斯柯达</a></li> <li letter="S" itemid="804" code="I0000000000000000200000000000232" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/sanling.png" alt="长丰三菱" width="52px" height="52px">长丰三菱</a></li> <h2 id="T" letter="T">T</h2><ul><li letter="T" itemid="356" code="4028b28843bcb8940143c1e08d990b7f" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/133.jpg" alt="特斯拉" width="52px" height="52px">特斯拉</a></li> <li letter="T" itemid="363" code="4028b288453ef2bf01458238132b53c5" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/202.jpg" alt="泰卡特" width="52px" height="52px">泰卡特</a></li> <li letter="T" itemid="364" code="4028b288453ef2bf0145887fa2826827" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/5069.jpg" alt="腾势" width="52px" height="52px">腾势</a></li> <li letter="T" itemid="807" code="I0000000000000000200000000000240" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/qita.png" alt="天马" width="52px" height="52px">天马</a></li> <h2 id="W" letter="W">W</h2><ul><li letter="W" itemid="132" code="402880882394491101239738a66f002e" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/weizuo.png" alt="威麟" width="52px" height="52px">威麟</a></li> <li letter="W" itemid="257" code="402880ac1167b1fa01116ea6a923169c" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/shuanghuan.png" alt="双环红星" width="52px" height="52px">双环红星</a></li> <li letter="W" itemid="291" code="402880ef0cd29b61010cd6c3ec1b0022" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/5070.jpg" alt="上汽通用五菱" width="52px" height="52px">上汽通用五菱</a></li> <li letter="W" itemid="353" code="4028b28842e6dc8f0142f8e96dda0432" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/woerwo.png" alt="沃尔沃亚太" width="52px" height="52px">沃尔沃亚太</a></li> <li letter="W" itemid="437" code="5ea38e3a0dc1c163010de27da69d5d9c" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/woerwo.png" alt="沃尔沃" width="52px" height="52px">沃尔沃</a></li> <li letter="W" itemid="810" code="I0000000000000000200000000000247" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/woerwo.png" alt="长安沃尔沃" width="52px" height="52px">长安沃尔沃</a></li> <li letter="W" itemid="1026" code="4028b2b65b848531015b856bdeda0398" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.comWPC0.jpg" alt="魏派" width="52px" height="52px">魏派</a></li> <h2 id="X" letter="X">X</h2><ul><li letter="X" itemid="9" code="402880860de3bd77010dee5035fe2815" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/xuetielong.png" alt="雪铁龙" width="52px" height="52px">雪铁龙</a></li> <li letter="X" itemid="21" code="402880860e7ecf53010e874b7e68264f" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/xuefolan.png" alt="上汽通用五菱雪佛兰" width="52px" height="52px">上汽通用五菱雪佛兰</a></li> <li letter="X" itemid="27" code="4028808611a0b18f0111a0e87ccf03a9" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/qita.png" alt="金杯通用雪佛兰" width="52px" height="52px">金杯通用雪佛兰</a></li> <li letter="X" itemid="31" code="402880861203d16701122d74a5580083" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/xiali.jpg" alt="夏利" width="52px" height="52px">夏利</a></li> <li letter="X" itemid="276" code="402880ef0ca9a797010ca9b481c30002" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/xiandai.png" alt="北京现代" width="52px" height="52px">北京现代</a></li> <li letter="X" itemid="292" code="402880ef0cd29b61010cd7040f4c0032" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/xuetielong.png" alt="东风雪铁龙" width="52px" height="52px">东风雪铁龙</a></li> <li letter="X" itemid="295" code="402880ef0cd29b61010cd852e7a20057" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/xuefolan.png" alt="上汽通用雪佛兰" width="52px" height="52px">上汽通用雪佛兰</a></li> <li letter="X" itemid="419" code="5ea38e3a0dc1c163010dcdd25ab746fd" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/xiandai.png" alt="现代" width="52px" height="52px">现代</a></li> <li letter="X" itemid="815" code="I0000000000000000200000000000255" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/xiandai.png" alt="华泰现代" width="52px" height="52px">华泰现代</a></li> <li letter="X" itemid="817" code="I0000000000000000200000000000258" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/xuefolan.png" alt="雪佛兰" width="52px" height="52px">雪佛兰</a></li> <li letter="X" itemid="818" code="I0000000000000000200000000000261" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/185.jpg" alt="新凯" width="52px" height="52px">新凯</a></li> <li letter="X" itemid="820" code="I0000000000000000200000000000268" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/98.jpg" alt="西雅特" width="52px" height="52px">西雅特</a></li> <h2 id="Y" letter="Y">Y</h2><ul><li letter="Y" itemid="10" code="402880860de3bd77010dee5792a329c5" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/qita.png" alt="云雀" width="52px" height="52px">云雀</a></li> <li letter="Y" itemid="89" code="402880881b73698c011b769024000001" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/yinglun.jpg" alt="英伦" width="52px" height="52px">英伦</a></li> <li letter="Y" itemid="252" code="402880991236a03501126eab020e0028" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/dafa.png" alt="一汽大发" width="52px" height="52px">一汽大发</a></li> <li letter="Y" itemid="297" code="402880ef0cd29b61010ce9064345012c" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/237.jpg" alt="一汽华利" width="52px" height="52px">一汽华利</a></li> <li letter="Y" itemid="305" code="402880ef0d4a5670010d4d7ee13d2f67" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/yiqijilin.png" alt="一汽吉林" width="52px" height="52px">一汽吉林</a></li> <li letter="Y" itemid="311" code="402880ef0d5d9e8c010d631ad22e3067" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/tianjinyiqi.png" alt="天津一汽" width="52px" height="52px">天津一汽</a></li> <li letter="Y" itemid="368" code="4028b288463800ea014646e243ae1383" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/huaichaiqiche.jpg" alt="潍柴汽车" width="52px" height="52px">潍柴汽车</a></li> <li letter="Y" itemid="373" code="4028b2b6499e62490149c07651fd1d29" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/yingfeinidi.png" alt="东风英菲尼迪" width="52px" height="52px">东风英菲尼迪</a></li> <li letter="Y" itemid="814" code="I0000000000000000200000000000252" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/yingfeinidi.png" alt="英菲尼迪" width="52px" height="52px">英菲尼迪</a></li> <li letter="Y" itemid="823" code="I0000000000000000200000000000274" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/yema.png" alt="野马" width="52px" height="52px">野马</a></li> <li letter="Y" itemid="824" code="I0000000000000000200000000000276" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/144.jpg" alt="南京依维柯" width="52px" height="52px">南京依维柯</a></li> <h2 id="Z" letter="Z">Z</h2><ul><li letter="Z" itemid="187" code="402880990f56d8c5010f5fad30e800d3" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/zhongtai.png" alt="众泰" width="52px" height="52px">众泰</a></li> <li letter="Z" itemid="286" code="402880ef0ca9c2b6010ccdfc6ac70178" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/zhonghua.png" alt="华晨中华" width="52px" height="52px">华晨中华</a></li> <li letter="Z" itemid="365" code="4028b288453ef2bf0145f329038278c0" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/5080.jpg" alt="知豆" width="52px" height="52px">知豆</a></li> <li letter="Z" itemid="435" code="5ea38e3a0dc1c163010dd4540fdc3feb" lang="branditem"><a href="javascript:;"><img src="http://res.ewewo.com/brandlogo/zhongxing.png" alt="中兴" width="52px" height="52px">中兴</a></li> </ul></ul></ul></ul></ul></ul></ul></ul></ul></ul></ul></ul></ul></ul></ul></ul></ul></ul></ul></ul></ul></ul></div>
</div>
<!--品牌弹出层结束-->
<!--车系弹出层开始-->
<div class="mask" id="window_carline" style="display: none; top: 0px;">
    <div class="title">
        <a href="javascript:void(0);" id="back_carline" class="back">返回</a>
        <a href="javascript:void(0);" lang="window_carline" class="sure">确定</a>
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
<div class="mask" id="window_caryear" style="display: none; top: 0px;">
    <div class="title">
        <a href="javascript:void(0);" id="back_caryear" class="back">返回</a>
        <a href="javascript:void(0);" lang="window_caryear" class="sure">确定</a>
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
<div class="mask" id="window_carkuan" style="display: none; top: 0px;">
    <div class="title">
        <a href="javascript:void(0);" id="back_carkuan" class="back">返回</a>
        <a href="javascript:void(0);" lang="window_carkuan" class="sure">确定</a>
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

<div class="ktc_box" id="box_sync" style="display: none">
    <a href="javascript:void(0);" class="ktcclose" id="btn_close_box_sync">
        <img src="<?php echo base_url()?>statics/h5/images/shanchu.png" width="40" height="40">
    </a>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <thead>
        <tr>
            <th align="left">同步车型</th>
            <th align="right"><a href="javascript:;" class="xinjian" style="float: right; margin: 5px" id="btn_Sync_Sure">同步</a></th>
        </tr>
        </thead>
    </table>
    <div style="overflow: auto; height: 495px" id="itemList">
    </div>
</div>



<script src="<?php echo base_url()?>statics/h5/js/customeraddcar.js"></script>
<script type="text/javascript">
    $(function () {
        $("#VINAI_one,#VINAI_two,#VINAI_three").hide();
    });
</script>


</body>
</html>