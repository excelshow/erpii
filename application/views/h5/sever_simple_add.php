<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>新建工时快速单</title>
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
        var isdetail = false;
        var issaved = false;
    </script><meta name="viewport" content="target-densitydpi=device-dpi, width=720px, user-scalable=no">
</head>
<body>
    <div class="mask_box" style="display:none"></div>
    <div class="saveing" style="display:none">加载中...</div>

    <div class="mask" style="background: #f5f5f5; display: none;">
    </div>
    <div class="ktc_box" style="display: none" id="timespackagebox">
        <a href="javascript:;" class="ktcclose">
            <img src="<?php echo base_url()?>statics/h5/images/shanchu.png" width="40" height="40">
        </a>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <thead>
            <tr>
                <th align="left">次卡套餐-项目名称</th>
                <th width="80">类型</th>
                <th width="80">消费</th>
                <th width="100">剩余</th>
                <th width="70">操作</th>
            </tr>
            </thead>
        </table>
        <div style="width: 100%; height: 400px; position: relative; overflow: auto;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody id="timespackage">
                <tr>
                    <td colspan="5" align="center" style="height: 360px; border: 0; color: #999; font-size: 32px;">暂无次卡套餐项目</td>

                </tr>

                </tbody>
            </table>
        </div>
    </div>

    <div class="ktc_box" style="display: none" id="textpackagebox">
        <a href="javascript:;" class="ktcclose">
            <img src="<?php echo base_url()?>statics/h5/images/shanchu.png" width="40" height="40">
        </a>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <thead>
            <tr>
                <th align="left">文本套餐</th>
            </tr>
            </thead>
        </table>
        <div style="width: 100%; height: 400px; position: relative; overflow: auto;" class="wbtc">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody id="textpackagelist">
                <tr>
                    <td colspan="4" align="center" style="height: 320px; border: 0; color: #999; font-size: 32px;">暂无文本套餐项目</td>

                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="ktc_box" style="display: none" id="cardbox">
        <a href="javascript:;" class="ktcclose">
            <img src="<?php echo base_url()?>statics/h5/images/shanchu.png" width="40" height="40">
        </a>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <thead>
            <tr>
                <th align="left">卡号</th>
                <th width="150">开卡时间</th>
                <th width="130">到期时间</th>
                <th width="120">余额</th>
            </tr>
            </thead>
        </table>
        <div style="width: 100%; height: 400px; position: relative; overflow: auto;" class="hyks">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody id="vipcardlist">
                <tr>
                    <td colspan="4" align="center" style="height: 320px; border: 0; color: #999; font-size: 32px;">暂无储值卡</td>

                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="ktc_box" style="display: none" id="fastwork">
        <a href="javascript:;" class="ktcclose">
            <img src="<?php echo base_url()?>statics/h5/images/shanchu.png" width="40" height="40">
        </a>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <thead>
            <tr>
                <th align="left">常用项目</th>
                <th width="120">单价</th>
                <th width="100">操作</th>
            </tr>
            </thead>
        </table>
        <div style="width: 100%; height: 400px; position: relative; overflow: auto;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody id="fastworklist">
                <tr>
                    <td colspan="3" align="center" style="height: 320px; border: 0; color: #999; font-size: 32px;">暂无常用项目</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>


    <div class="mask_div" style="width: 560px; margin-left: -280px; display: none;">
        <h2>实收金额</h2>
        <ul>
            <table width="470" border="0" align="center" cellpadding="0" cellspacing="0" class="shmoney">
                <tbody><tr name="trsumlabour">
                    <td width="120" height="64">总工时费</td>
                    <td align="center"><s></s></td>
                    <td width="120">
                        <input type="text" value="">
                    </td>
                </tr>
                <tr name="trsumpart">
                    <td height="64">总配件费</td>
                    <td align="center"><s></s></td>
                    <td>
                        <input type="text" value="">
                    </td>
                </tr>
                <tr name="trsum">
                    <td height="64">总费用</td>
                    <td align="center"><s></s></td>
                    <td style="color: #f05050;"></td>
                </tr>
                </tbody></table>
        </ul>
        <div class="mask_btn"><a href="javascript:;">取消</a><a href="javascript:;" class="queding">确定</a></div>
    </div>

    <div class="mask_div" style="height: 240px; display: none; margin-top: -120px;" id="divstatus">
        <h2>确定报价吗？</h2>
        <ul class="fswxtz" id="ulstatus" style="height: 84px;">
            <font id="sendwenotchat" style="line-height: 42px; font-size: 26px; float: left; margin-left: 30px; color: #ff3232; display: none;">车主未关注微信</font>
            <a href="javascript:void(0)" id="SendWeChat" class="" itemid="0">微信通知车主</a>
            <font id="senddxchat" style="line-height: 42px; font-size: 26px; float: left; margin-left: 30px; color: #ff3232; display: none;">无效手机号码</font>
            <a href="javascript:void(0)" style="float: left;" id="SendDx" class="" itemid="0">短信通知车主</a>
        </ul>
        <div class="mask_btn"><a href="javascript:;">取消</a><a href="javascript:;" class="queding" id="confirm">确定</a></div>
    </div>
    <div class="mask_div" id="pending" style="height: 240px; margin-top: -120px; display: none">
        <h2 style="font-size: 36px;">提示</h2>
        <ul style="height: 84px;">
            <li class="quit">该客户有未结算的服务</li>
        </ul>
        <div class="mask_btn" id="newphone"><a>查看</a><a href="javascript:;" class="queding">继续开单</a></div>
    </div>
    <div class="car_box" id="carchecker" style="height: 650px; overflow: auto; margin-top: -325px; display: none;">
    </div>
    <div class="ktc_box" id="box_sync" style="display:none">
        <a href="javascript:;" class="ktcclose" id="btn_close_box_sync">
            <img src="<?php echo base_url()?>statics/h5/images/shanchu.png" width="40" height="40">
        </a>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <thead>
            <tr>
                <th align="left">同步车型</th>
                <th align="right"><a href="javascript:;" class="xinjian" style="float:right;margin:5px" id="btn_Sync_Sure">同步</a></th>
            </tr>
            </thead>
        </table>
        <div style="overflow:auto;height:495px" id="itemList">
        </div>
    </div>





    <div class="fw_addmenu">
        <div class="fw_addmenu_left" style="width:480px;">
            <ul>
                <li><a href="javascript:;">选择工时项目</a></li>
                <li><a href="javascript:;">自定义工时项目</a></li>
            </ul>
            <dl>
                <dd class="add1" style="width:119px;"><a href="javascript:;" style="width:129px; margin-left:-5px;">工时</a></dd>
                <dd class="add5" style="width:119px;"><a href="javascript:;" style="width:129px; margin-left:-5px;">常用</a></dd>
                <dd class="add2" style="width:119px;"><a href="javascript:;" style="width:129px; margin-left:-5px;">套餐</a></dd>
                <dd class="add3" style="width:119px;"><a href="javascript:;" style="width:129px; margin-left:-5px;">储值卡</a></dd>
            </dl>
        </div>
        <div class="fw_addmenu_right" style="width:240px;">
            <a href="javascript:void(0);" itemname="报价" itemid="4" class="hui">报价</a>

        </div>
    </div>

    <div class="system" id="indexshow">
        <div class="title">
            <a href="javascript:history.back(-1)" class="back">返回</a>
            <a href="javascript:;" class="sure" id="servicesave">保存</a>
            <ul class="sytime">新建工时快速单</ul>
        </div>
        <div class="fwadd_car" date="2019-01-06 15:34:39" itemid="0">
            <dl>
                <a href="javascript:;" class="sdss">
                    <img src="<?php echo base_url()?>statics/h5/images/car.png" width="100" height="100">
                </a>
                <dd itemid="0"><a href="javascript:void(0);" carid="0" carname="" style="font-size: 32px; color: rgb(0, 180, 255); background: none;">车牌号 <font></font></a></dd>
                <dd style="border: none; padding-top: 10px; height: auto;"><a href="javascript:void(0);">车辆型号<font brand="0" line="0" modelyear="0" model="0" style="width: 400px; overflow: hidden; height: 35px; text-align: right;"></font></a></dd>
            </dl>
        </div>
        <div class="fwadd_info" name="customerinfodiv">
            <input type="hidden" id="txtdiscount" labourdiscount="100" stockdiscount="100">
            <ul>
                <li itemid="1"><a href="javascript:;" mobile="" customerid="0"><font class="iswx" title="微信未注册">请填写</font>手机号码</a></li>
                <li>
                    <font><input name="" type="text" id="txtcustomername" class="infoinput" value=""></font>顾客姓名
                </li>
                <li>
                    <font>
                        <a href="javascript:;" class="ktc" id="cktcitem">次卡套餐<span style="font-size:18px;" id="timespackagecount">(0)</span></a>
                        <a href="javascript:;" class="ktc" id="wbtcitem">文本套餐<span style="font-size:18px;" id="textpackagecount">(0)</span></a>
                        <a href="javascript:;" class="ktc" id="hykitem">储值卡<span style="font-size:18px;" id="cardcount">(0)</span></a>
                    </font>卡/套餐
                </li>
                <li>
                    <font>
                        <a href="javascript:;" class="ktc">¥<span style="font-size:18px;" id="creditmoney">0.00</span></a>
                    </font>挂账金额
                </li>
            </ul>
        </div>

        <div class="fwxmxx" id="Workshilist" style="display: none">
            <h2><font>服务项目信息</font></h2>
            <div style="padding-top: 40px;"></div>
            <div class="qc_staff"><a href="javascript:void(0);" name="aserviceadvisor" checkerid="0"><font>请选择</font>接待人员</a></div>
            <div class="qc_staff"><a href="javascript:void(0);" name="achecker" checkerid=""><font>请选择</font>质检员</a></div>

            <div id="workhour">
            </div>
            <div class="shishou">
                <ul>
                    <li>
                        <p class="fl">工时<font name="fontsumlabour" itemid="0"></font></p>
                        <p class="fr">附加<font name="tdadditional">0</font></p>
                        <p class="mid">配件<font name="fontsumpart" itemid="0"></font></p>
                    </li>
                    <li>
                        <p class="fl"><em>管理费<font name="managetxtfont">0.00</font></em><a name="editmanage" href="javascript:void(0);"><img src="<?php echo base_url()?>statics/h5/images/edit_all.png" width="24" height="24"></a></p>
                        <p class="fr" name="divsum" itemid="0">合计<font style="color:#ff6600;font-weight:bold; font-size:24px;">0.00</font></p>
                        <p class="mid"><em>税费<font name="taxtxtfont">0.00</font></em><a name="edittax" href="javascript:void(0);"><img src="<?php echo base_url()?>statics/h5/images/edit_all.png" width="24" height="24"></a></p>
                    </li>
                </ul>
            </div>
        </div>



        <div class="fwxmxx" id="packagetemplist" style="display: none">
            <h2><font style="margin-left: -100px;">套餐申请</font></h2>
            <div style="padding-top: 40px;"></div>
            <div id="packagetemp">
            </div>
        </div>
        <div class="fwxmxx" id="membershipcardlist" style="display: none">
            <h2><font style="margin-left: -100px;">充值申请</font></h2>
            <div style="padding-top: 40px;"></div>
            <div id="membershipcard">
            </div>
        </div>
        <div class="fwxmxx" id="chongzhilist" style="display: none">
            <h2><font style="margin-left: -100px;">储值卡申请</font></h2>
            <div style="padding-top: 40px;"></div>
            <div id="chongzhi">
            </div>
        </div>




        <div class="zhdqt">
            <h3>出车报告</h3>
            <textarea id="txtoutreport"></textarea>
            <h3>备注</h3>
            <textarea id="txtcomment"></textarea>
        </div>

        <div style="padding-top: 120px;"></div>
    </div>



    <div class="mask_div" id="managewind" style="height:600px; width:600px; margin:-300px 0 0 -300px; display:none;">
        <h2 style="font-size:36px;">管理费用</h2>
        <ul style="height:444px;">
            <li class="glfy" id="managecleardiv">
                <p style="padding: 12px 15px; border: 1px #e6e6e6 solid; background: #f8f8f8; border-radius:5px; font-size:24px; color:#888;">
                    现管理费用为
                    <lable id="allmme">0.00</lable>元
                    <a href="javascript:void(0);" name="clearmme" class="qinglin">清零</a>
                </p>
            </li>
            <li class="glfy">工时金额：<lable id="managefontlabour">0.00</lable>元</li>
            <li class="glfy">配件金额：<label id="managefontpart">0.00</label> 元</li>
            <li class="glfy color999"><span style="color:#555;">工时管理费：</span><lable id="txtlabourrate">未设置</lable> ×  <input type="text" class="ss_time" id="txtlabourdiscount" placeholder="折扣比例" value="100" style="width:60px;"> % =  <input id="txtprojectmanagementcost" type="text" class="ss_time" value="0.00" style="width:100px;"> 元</li>
            <li class="glfy color999"><span style="color:#555;">配件管理费：</span><lable id="txtpartsrate">未设置</lable> ×  <input type="text" class="ss_time" id="txtpartsdiscount" value="100" style="width:60px;"> % =  <input type="text" id="txtstockpartmanagementcost" class="ss_time" value="0.00" style="width:100px;"> 元</li>
            <li class="glfy color999" style="border-top:1px #e6e6e6 solid; margin-top:10px; padding-top:20px;">1. 管理费=金额*管理费比例*折扣比例</li>
            <li class="glfy color999">2.管理费比例未设置，请到客户详情页设置</li>
        </ul>
        <div class="mask_btn"><a href="javascript:;">取消</a><a href="javascript:;" name="savemanage" class="queding">确定</a></div>
    </div>



    <div class="mask_div" id="taxwind" style="height:340px; width:600px; margin:-170px 0 0 -300px; display:none">
        <h2 style="font-size:36px;">税费</h2>
        <ul style="height:184px;">
            <li class="glfy color999">&nbsp;</li>
            <li class="glfy color999" style="text-align:center;"><span style="color:#555;">税率：</span><input type="text" id="txttaxrate" class="ss_time" value="15" style="width:70px; margin-left:10px;"> % =  <input type="text" id="txttax" class="ss_time" value="0.00" style="width:120px;"> 元</li>
        </ul>
        <div class="mask_btn"><a href="javascript:;">取消</a><a href="javascript:;" name="savetax" class="queding">确定</a></div>
    </div>


    <div id="chargetypebox" class="mask_div" style="height:606px; margin-top:-303px;display:none;">
        <h2>收费类型</h2>
        <ul style="height:450px;">
            <li><a href="javascript:;" chargetype="1" class="maskxz">自费</a></li>
            <li><a href="javascript:;" chargetype="2">保险</a></li>
            <li><a href="javascript:;" chargetype="3">返工</a></li>
            <li><a href="javascript:;" chargetype="4">索赔</a></li>
            <li><a href="javascript:;" chargetype="5">免单</a></li>
            <li><a href="javascript:;" chargetype="6">公务车</a></li>
        </ul>
        <div class="mask_btn"><a href="javascript:;" id="btnchargetypecancell">取消</a><a href="javascript:;" id="btnchargetypeconfirm" class="queding">确定</a></div>
    </div>

    <script src="<?php echo base_url()?>statics/h5/js/manageedit.js"></script>
    <script src="<?php echo base_url()?>statics/h5/js/chargetype.js"></script>
    <script type="text/javascript">
        var partweight = 1, labourweight = 1;
        var openlevel='0';
        var taxnum = parseFloat('0');
        var mydate = new Date();
        var nowtime = new Date('2019-01-06');
        var resource_url = 'http://res.ewewo.com';
        var servicechecker_url = '/Service/GetServiceChecker';
        var statusindeid = '8';
        var CheckCardNoIsExist = '/Service/CheckCardNoIsExist';
        var getdiscount_url = ' /Service/GetDiscount';
        var getCustomerinfobykeyword = '/Service/GetCustomerInfoByKeyword';
        var getvipinfo_url = '/Service/GetVipInfo';
        var getpendingservicerecord_url = '/Service/GetPendingServiceRecord';
        var servicestatusvule = '8|4|5|20';
        var servicestart = mydate.getFullYear() + "-01-01";
        var serviceend = mydate.getFullYear() + "-" + (mydate.getMonth() + 1) + "-" + mydate.getDate() + "";
        var service_recordlist = '/Service/RecordList';
        var service_levelcarddiscount = '/Service/GetLevelCardDiscount';
        var carcustomersearch = '/Service/CustomerMobileFuzzySearch';
        var getcarlevelweight_url='/Service/GetCarLevelWeight';
        var customeData = { customerid: '0', name: '', carno: '', carid: '0', mobile: '' };
        var CarDefaultStr = '';
        //税费管理费对象
        var TaxManage = { taxrate: null, tax: null, labourrate: null, labour: null, labourdiscount: null, partsrate: null, parts: null, partsdiscount: null, isentrytax: false, isentrymanage: false };
        var isClickAddServiceSaveButton = false;
        var ServiceTypeEnum = {"未知":0,"保养":1,"钣金":2,"喷漆":3,"美容":4,"洗车":8,"机修":16,"精品":32,"改装":64,"轮胎":128,"其它":1024};
    </script>
    <script src="js/addquickrecord.js"></script>
    <script type="text/javascript">
        var mobile = "";
        var carno = "";
        if (mobile != "") {
            $(".fwadd_info li:first").find('a').attr("mobile", mobile).attr("customerid", 0).attr("isvip", 0).removeAttr("style").find("font").html(mobile);
            spackageinfo();
        }
        else {
            $(".fwadd_car dd:first").find('a').attr("carid", 0).attr("carname", carno).css("background", "none").find("font").html(carno);
        }
    </script>

</body>
</html>