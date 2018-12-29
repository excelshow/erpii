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
        width: 50%;
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
    .grid-wrap>ul>li>div>input{
        text-align: center;
    }
</style>
</head>
<body>
    <div class="wrapper">
        <span id="config" class="ui-icon ui-state-default ui-icon-config"></span>
        <div class="bills">
            <div class="grid-wrap mb10" id="acGridWrap">

                    <ul style="font-size: 20px;font-weight: bold;">基本信息</ul>
                    <ul class="mod-form-rows base-form clearfix" id="base-form" style="border-bottom: 1px solid #ddd;margin-bottom: 10px;margin-top: 20px">
                        <li class="row-item" style="width: 100%;">
                            <div class="ctn-wrap"><input type="text" value="" class="ui-input" name="mobile" id="mobile" placeholder="手机号" style="width: 250px;margin-bottom: 10px" onblur="phone()"><input style="border: none;color: red;" type="text" id="username" value="" readonly></div>
                            <input type="hidden" name="userId" id="userId"><!--放id-->
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="cardNumber">卡号:</label></div>
                            <div class="ctn-wrap"><input type="text" value="" onblur="card()" class="input" name="cardNumber" id="cardNumber"><input style="border: none;color: red;" type="text" id="card" value="" readonly></div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="cardType">卡名称:</label></div>
                            <div class="ctn-wrap"><input type="text" value="" class="input" name="cardName" id="cardName" readonly></div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="addMoney">储值卡金额:</label></div>
                            <div class="ctn-wrap"><input type="text" value="" class="input" name="addMoney" id="addMoney" readonly><span style="margin-left: 5px">元</span></div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="giveMoney">赠送金额:</label></div>
                            <div class="ctn-wrap"><input type="text" value="" class="input" name="giveMoney" id="giveMoney" readonly><span style="margin-left: 5px">元</span></div>
                        </li>
                        <li class="row-item" style="width: 100%;">
                            <div class="label-wrap" style="width: 80px;"><label for="freeMoney">账面金额总计:</label></div>
                            <div class="ctn-wrap"><input type="text" value="" class="ui-input" name="total_num" id="total_num" style="width: 180px;margin-bottom: 10px"><span style="margin-left: 5px">元</span></div>
                            <input type="hidden" name="userId" id="userId"><!--放id-->
                        </li>
                    </ul>
                    <ul style="font-size: 20px;font-weight: bold">结算</ul>
                    <ul class="mod-form-rows base-form clearfix" id="base-form">
                        <li class="row-item" style="width: 100%;">
                            <div class="label-wrap" style="width: 80px;"><label for="freeMoney">待收金额:</label></div>
                            <div class="ctn-wrap"><span style="color: red;font-size: 20px" id="amount">0.00</span><span style="margin-left: 5px">元</span></div>
                            <input type="hidden" name="userId" id="userId"><!--放id-->
                        </li>
                        <li class="row-item" style="width: 100%;">
                            <div class="label-wrap"><label for="freeMoney">优惠金额:</label></div>
                            <div class="ctn-wrap"><input type="text" value="0" onblur="actually()" class="input" name="freeMoney" id="freeMoney"><span style="margin-left: 5px">元</span></div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="receiptsMoney">实收金额:</label></div>
                            <div class="ctn-wrap"><input type="text" value="" class="input" name="receiptsMoney" id="receiptsMoney" readonly><span style="margin-left: 5px">元</span></div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="salesman">销售人员:</label></div>
                            <div class="ctn-wrap"><input type="text" value="" class="input" name="salesman" id="salesman"></div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="payee">收款人:</label></div>
                            <div class="ctn-wrap"><input type="text" value="" class="input" name="payman" id="payman"></div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="collectionTime">收款时间:</label></div>
                            <div class="ctn-wrap"><input type="date" value="" class="input" name="collectionTime" id="collectionTime"></div>
                        </li>
                        <li class="row-item" style="width: 100%;">
                            <div class="label-wrap"><label for="collectionRemarks">收款备注:</label></div>
                            <div class="ctn-wrap">
                                <textarea style="width: 65%;border: 1px solid #ddd;" name="collectionRemarks" id="collectionRemarks"></textarea>
                            </div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="source">收款方式:</label></div>
                            <div class="ctn-wrap sel">
                                <select name="source" id="source">
                                    <option value="1"></option>
                                </select>
                            </div>
                        </li>
                    </ul>

                <div style="height: 30px;text-align: center;">
                    <button type="button" class="btn" id="submit" style="border: 1px solid #3279a0;background: -webkit-gradient(linear,0 0,0 100%,from(#4994be),to(#337fa9));color: #fff;">确认购买</button>
                </div>
            </div>
        </div>
    </div>


</body>
<script>
    function phone() {
        var mobile =$("#mobile").val();
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('card/buycard');?>",
            data: {
                mobile:mobile,
            },
            dataType: "json",

            success: function (data) {
                console.log(data);
                if(data.length != 0){
                    $("#username").val(data.name);
                }else{
                    $("#username").val("无此账号");
                }

            },
        });
    }

    function card() {
        var cardNumber =$("#cardNumber").val();
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('card/buycard');?>",
            data: {
                cardNumber:cardNumber,
            },
            dataType: "json",

            success: function (data) {
                console.log(data);
                if(data.length != 0){
                    $("#cardName").val(data.car_name);
                    $("#addMoney").val(data.sale);
                    $("#giveMoney").val(data.present);
                    $("#total_num").val(parseFloat(data.sale)+parseFloat(data.present));
                    $("#amount").text(data.sale);
                }else{
                    $("#card").val("无此卡号");
                    $("#cardName").val('');
                    $("#addMoney").val('');
                    $("#giveMoney").val('');
                    $("#total_num").val('');
                }

            },
        });
    }
    function actually(){

        $("#receiptsMoney").val($("#amount").text() - $("#freeMoney").val());
    }
    
    $("#submit").click(function () {

    });
</script>
</html>


 