<?php $this->load->view('header');?>

<script type="text/javascript">
var DOMAIN = document.domain;
var WDURL = "";
var SCHEME= "<?php echo sys_skin()?>";
try{
	document.domain = '<?php echo base_url()?>';
}catch(e){
}
//ctrl+F5 增加版本号来清空iframe的缓存的
$(document).keydown(function(event) {
	/* Act on the event */
	if(event.keyCode === 116 && event.ctrlKey){
		var defaultPage = Public.getDefaultPage();
		var href = defaultPage.location.href.split('?')[0] + '?';
		var params = Public.urlParam();
		params['version'] = Date.parse((new Date()));
		for(i in params){
			if(i && typeof i != 'function'){
				href += i + '=' + params[i] + '&';
			}
		}
		defaultPage.location.href = href;
		event.preventDefault();
	}
});
</script>
<link href="<?php echo base_url()?>statics/css/<?php echo sys_skin()?>/bills.css?ver=20150427" rel="stylesheet" type="text/css">
<style>
    .label-wrap>label{
        font: 12px/1.5 arial, \5b8b\4f53;
        color: #555;
    }
    .ui-input{
        width: 150px;
        height: 16px;
    }
    .sel{
        width: 180px;
        height: 30px;
        line-height: 30px;
        border: 1px solid #ddd;
        color: #555;
        outline: 0;
        /*margin-bottom: 5px;*/
    }
    #gender,#source{
        border: none;
        outline: none;
        width: 100%;
        height: 20px;
        line-height: 30px;
        /*appearance: none;*/
        /*-webkit-appearance: none;*/
        /*-moz-appearance: none;*/
        /*padding-left: 60px;*/
    }
    .row-item{
        float: left;
        width: 33.333%;
        padding: 0;
        margin: 0;
    }
    .btn{
        width: 70px;
        height: 30px;
        color: #555;
        border: 1px solid #c1c1c1;
        border-radius: 2px;
        box-shadow: 0 1px 1px rgba(0,0,0,.15);
        font: 14px/2 \5b8b\4f53;
        background: -webkit-gradient(linear,0 0,0 100%,from(#fff),to(#f4f4f4));
        vertical-align: middle;
        cursor: pointer;
    }
    .clearfix::before,
    .clearfix::after{
        content:'';
        display: block;
        line-height: 0;
        height: 0;
        visibility: hidden;
        clear: both;
    }
    .input{
        height: 30px;
        width: 180px;
        border: 1px solid #ddd;
    }
    .new-input{
        margin-bottom: 10px;
        border: none;
        border-bottom: 1px solid #ddd;
    }
    .new-input:hover,
    .new-input:focus
    {
        border: none;
        box-shadow: none;
        border-bottom: 1px solid #000;
    }
</style>
</head>
<body>
    <div class="wrapper">
        <span id="config" class="ui-icon ui-state-default ui-icon-config"></span>
        <div class="bills">
            <div class="grid-wrap mb10" id="acGridWrap">
                <form id="manage-form" action="">
                    <ul style="font-size: 20px;font-weight: bold;">账户信息</ul>
                    <ul class="mod-form-rows base-form clearfix" id="base-form" style="border-bottom: 1px solid #ddd;margin-bottom: 10px;margin-top: 20px">
                        <input type="hidden" name="orderID" id="orderID" value="<?php echo $data->id ?>"><!--放服务单id-->
                        <li class="row-item" style="width: 33.33%;">
                            <div class="ctn-wrap">
                                <div class="label-wrap"><label for="car">车辆:</label></div>
                                <input type="text" value="<?php echo $data->number ?>" class="ui-input new-input" name="car" id="car" readonly>
                            </div>

                        </li>
                        <li class="row-item" style="width: 33.333%;">
                            <div class="ctn-wrap">
                                <div class="label-wrap"><label for="customer">客户:</label></div>
                                <input type="text" value="<?php echo $data->name ?>" class="ui-input new-input" name="customer" id="customer" readonly>
                            </div>
                        </li>
                        <li class="row-item" style="width: 33.333%;">
                            <div class="ctn-wrap">
                                <div class="label-wrap"><label for="balance">账户余额:</label></div>
                                <input type="text" value="<?php echo $user_data->balance ?>" class="ui-input new-input" name="balance" id="balance" readonly>
                            </div>
                        </li>
                        <li class="row-item" style="width: 100%;">
                            <div class="label-wrap" style="width: 80px;"><label for="amountToBeCollected">待收金额:</label></div>
                            <div class="ctn-wrap"><span style="color: red;font-size: 20px" id="amountToBeCollected"><?php echo $data->actual_total ?></span><span style="margin-left: 5px">元</span></div>
                        </li>
                    </ul>
                    <ul style="font-size: 20px;font-weight: bold">收款方式</ul>
                    <ul class="mod-form-rows base-form clearfix" id="base-form" style="border-bottom: 1px solid #ddd;margin-bottom: 10px;margin-top: 20px">
                        <li class="row-item">
                            <div class="label-wrap"><label for="cash">现金:</label></div>
                            <div class="ctn-wrap">
                                <input type="number" value="" oninput="change()" class="input" name="cash" id="cash" min="0">
                            </div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="payByCard">刷卡:</label></div>
                            <div class="ctn-wrap">
                                <input type="number" value="" oninput="change()" class="input" name="payByCard" id="payByCard" min="0">
                            </div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="check">支票:</label></div>
                            <div class="ctn-wrap">
                                <input type="number" value="" oninput="change()" class="input" name="check" id="check" min="0">
                            </div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="bankTransform">银行转账:</label></div>
                            <div class="ctn-wrap">
                                <input type="number" value="" oninput="change()" class="input" name="bankTransform" id="bankTransform" min="0">
                            </div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="alyPay">支付宝:</label></div>
                            <div class="ctn-wrap">
                                <input type="number" value="" oninput="change()" class="input" name="alyPay" id="alyPay" min="0">
                            </div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="weChat">微信:</label></div>
                            <div class="ctn-wrap">
                                <input type="number" value="" oninput="change()" class="input" name="weChat" id="weChat" min="0">
                            </div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="balancePay">余额:</label></div>
                            <div class="ctn-wrap">
                                <input type="number" value="" oninput="change()" class="input" name="balancePay" id="balancePay" min="0">
                            </div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="other">其他:</label></div>
                            <div class="ctn-wrap">
                                <input type="number" value="" oninput="change()" class="input" name="other" id="other" min="0">
                            </div>
                        </li>
                        <li class="row-item" style="width: 100%;">
                            <div class="label-wrap" style="width: 80px;"><label for="surplus">剩余应收:</label></div>
                            <div class="ctn-wrap"><span style="color: red;font-size: 20px" id="surplusPay"><?php echo $data->actual_total ?></span><span style="margin-left: 5px">元</span></div>
                        </li>
                    </ul>
                </form>
                <div style="height: 30px;text-align: center;" class="clearfix">
                    <button type="button" class="btn" id="submit" style="border: 1px solid #3279a0;background: -webkit-gradient(linear,0 0,0 100%,from(#4994be),to(#337fa9));color: #fff;">结算</button>
                </div>
            </div>
        </div>
    </div>


</body>

<script>


    function change(){

       var all = $('#amountToBeCollected').html();
       var surplusPay = $('#surplusPay');
       var surplus = all;
       var has = 0;

            var val = $('.input');

            if($(this).parent().parent().find('.label-wrap').text() == "余额:"){
                var balance = $("#balance").val();
                var balancePay = $("#balancePay").val();

                if (parseFloat(balance) < parseFloat(balancePay) ){
                    parent.Public.tips({
                        type:1,
                        content:"账户余额不足！",
                    });
                }else{
                    has = 0;
                    surplus = all;
                    $.each(val,function () {
                        if ($(this).val() == ''){
                            has += 0;
                        } else{
                            has += parseInt($(this).val());
                        }
                    });
                    surplus -= has;
                    surplusPay.html(surplus);
                }
            }else{
                has = 0;
                surplus = all;
                $.each(val,function () {
                    if ($(this).val() == ''){
                        has += 0;
                    } else{
                        has += parseInt($(this).val());
                    }
                });
                surplus -= has;
                if(surplus<0){
                    parent.Public.tips({
                        type:1,
                        content:"已超出账单金额！",
                    });
                }else{
                    surplusPay.html(surplus);
                }

            }

    }


    $("#submit").click(function () {
        var surplusPay = $('#surplusPay').text();

        if(surplusPay !== '0'){
            parent.Public.tips({
                type:1,
                content:"金额未全部结算！",
            });
        }else{
            var orderID = $('#orderID').val();
            var cash = $('#cash').val();
            var payByCard = $('#payByCard').val();
            var check = $('#check').val();
            var bankTransform = $('#bankTransform').val();
            var alyPay = $('#alyPay').val();
            var weChat = $('#weChat').val();
            var balancePay = $('#balancePay').val();
            var other = $('#other').val();


            $.ajax({
                type: "POST",
                url: "<?php echo site_url('billing/dobalance');?>",
                data: {
                    orderID:orderID,
                    cash:cash,
                    payByCard:payByCard,
                    check:check,
                    bankTransform:bankTransform,
                    alyPay:alyPay,
                    weChat:weChat,
                    balancePay:balancePay,
                    other:other,
                },
                dataType: "json",

                success: function (data) {
                    console.log(data);
                    if(data.code == 1){
                        parent.Public.tips({
                            content:data.text,
                        });
                        location.href = "<?php echo site_url('billing/billinglist')?>";
                    }else if (data.code == 2){
                        parent.Public.tips({
                            type:1,
                            content:data.text,
                        });
                    } else{
                        parent.Public.tips({
                            type:1,
                            content:"未知错误！",
                        });
                    }

                },
            });
        }




    });
</script>
</html>


 