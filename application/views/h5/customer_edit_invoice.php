<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>开票信息</title>
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
            <a href="javascript:void(0);" class="sure" id="btnsave">保存</a>
            <ul class="sytime">编辑开票信息</ul>
        </div>
        <div class="khview report my_edit" style="margin-top: 16px;">
            <ul>
                <li>
                    <font>开票抬头</font><span>
                        <input type="text" class="carinput" value="" id="txtInvoicetitle" maxlength="50">
                    </span>
                </li>
                <li>
                    <font>公司地址</font><span>
                        <input type="text" class="carinput" value="" id="txtInvoiceaddress" maxlength="50">
                    </span>
                </li>
                <li>
                    <font>公司电话</font><span>
                        <input type="text" class="carinput" value="" id="txtInvoicetel" maxlength="13">
                    </span>
                </li>
                <li>
                    <font>纳税人识别号</font><span>
                        <input type="text" class="carinput" value="" id="txtInvoicetaxpayerid" maxlength="20">
                    </span>
                </li>
                <li>
                    <font>开户银行</font><span>
                        <input type="text" class="carinput" value="" id="txtInvoicebank" maxlength="20">
                    </span>
                </li>
                <li>
                    <font>银行账号</font><span>
                        <input type="text" class="carinput" value="" id="txtInvoicebankaccount" maxlength="50">
                    </span>
                </li>


            </ul>
        </div>
    </div>

    <script type="text/javascript">
        $(function () {

            $("#btnsave").click(function () {

                var customerid = '2340187';

                //开票信息
                var Invoicetitle = $.trim($("#txtInvoicetitle").val());
                var Invoicetaxpayerid = $.trim($("#txtInvoicetaxpayerid").val());
                var Invoiceaddress = $.trim($("#txtInvoiceaddress").val());
                var Invoicetel = $.trim($("#txtInvoicetel").val());
                var Invoicebank = $.trim($("#txtInvoicebank").val());
                var Invoicebankaccount = $.trim($("#txtInvoicebankaccount").val());

                $.ajax({
                    type: "POST",
                    data: { customerId: customerid, Invoicetitle: Invoicetitle, Invoicetaxpayerid: Invoicetaxpayerid, Invoiceaddress: Invoiceaddress, Invoicetel: Invoicetel, Invoicebank: Invoicebank, Invoicebankaccount: Invoicebankaccount },
                    url: "/Customer/ModifyCoustomerInvoice",
                    dataType: "json",
                    success: function (data) {
                        if (data.result == 'T') {
                            Ewewo.Tips_Success('个人资料保存成功!');
                            window.location.href = "/Customer/View/" + data.returnId;
                        }
                        else {
                            Ewewo.Tips_Error('保存不成功!');
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

            });
        })
    </script>

</body>
</html>