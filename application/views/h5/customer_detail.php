<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>会员详情</title>
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
    <div class="system">
        <div class="title">
            <a href="javascript:history.back(-1);" class="back">返回</a>
            <ul class="sytime">客户详情</ul>
        </div>
        <div class="khview_top">
            <dl>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody><tr>
                        <td align="center">
                            <img src="<?php echo base_url()?>statics/h5/images/nohead.jpg" width="170" height="170" class="hyhead">
                        </td>
                    </tr>
                    <tr>
                        <td height="50" align="center" style="font-size: 28px;">
                            贾真人
                        </td>
                    </tr>
                    </tbody></table>
            </dl>
        </div>
        <div class="khview report">
            <h2>
                <a href="customer_edit_base" class="user_edit">编辑</a>
                个人资料
            </h2>
            <ul class="user_list">
                <li><font>未知</font>性别</li>
                <li><font>15057725702</font>联系方式</li>
                <li><font>直接到店</font>客户来源</li>
                <li><font>未填</font>服务顾问</li>
                <li><font>未填</font>生日</li>
                <li><font>未填</font>地址</li>
                <li><font>2018-12-27</font>建档时间</li>
            </ul>
        </div>
        <div class="khview report" style="margin-top: 16px;">
            <h2>
                <a href="customer_edit_invoice" class="user_edit">编辑</a>
                开票信息
            </h2>
            <ul class="user_list">
                <li><font>未填</font>开票抬头</li>
                <li><font>未填</font>公司地址</li>
                <li><font>未填</font>公司电话</li>
                <li><font>未填</font>纳税人识别号</li>
                <li><font>未填</font>开户行</li>
                <li><font>未填</font>银行账号</li>
            </ul>
        </div>
        <div class="khview report" style="margin-top: 16px;">
            <h2>资料照片</h2>
            <div class="zhaopian" id="customerinfo">
                <ul>
                    <li style="height: 184px;"><a href="javascript:" class="photoadd"><font></font>添加照片</a></li>
                </ul>
            </div>
        </div>

        <div class="khview report" style="margin-top: 16px;">
            <h2><a href="customer_edit_car" class="c_add">编辑</a>车辆信息</h2>
            <div class="kh_car" id="mycar_2735735">
                <dl>
                    <a href="javascript:;" class="sdss">
                        <img src="<?php echo base_url()?>statics/h5/images/null.jpg" width="100" height="100">


                    </a>
                    <dd><font>购买时间：</font>粤A12342<span>(公里)</span></dd>
                    <dd class="cxpp">   </dd>
                </dl>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody><tr>
                        <td width="90">发动机号</td>
                        <td width="220" align="right" class="color999">未填</td>
                        <td width="160" align="right">建议保养里程</td>
                        <td align="right" class="color999">未填</td>
                    </tr>
                    <tr>
                        <td>
                            VIN码<br>
                        </td>
                        <td align="right" class="color999">未填</td>
                        <td align="right">建议保养时间</td>
                        <td align="right" class="color999">未填</td>
                    </tr>
                    <tr>
                        <td>投保公司</td>
                        <td colspan="3" align="right" class="color999">未填</td>
                    </tr>
                    <tr>
                        <td>保险到期</td>
                        <td align="right" class="color999"></td>
                        <td align="right">年审到期</td>
                        <td align="right" class="color999"> </td>
                    </tr>
                    </tbody></table>
                <div class="zhaopian" style="width:calc(100% + 50px); margin-left:-25px;">
                    <ul>
                    </ul>
                </div>
                <div class="kh_car_btn"><a href="javascript:;" name="adelcar" itemid="2735735"><font>删除</font></a><a href="/Customer/addcar?Customerid=2340187&amp;carid=2735735&amp;reurl=%2FCustomer%2Fview%2F2340187" class="cedit"><font>修改</font></a></div>
            </div>
        </div>

        <div class="khview report" style="margin-top: 16px;">
            <h2>服务记录</h2>
            <div class="ser_list">
            </div>
        </div>


        <div style="padding-top: 120px;"></div>
    </div>

</body>
</html>