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
    .item> .row-item> .label-wrap{
        width: 120px;
    }
    .label-wrap>label{
        font: 12px/1.5 arial, \5b8b\4f53;
        color: #555;
    }
    .ui-input{
        width: 150px;
        height: 16px;
    }
    .sel{
        width: 160px;
        height: 30px;
        line-height: 30px;
        border: 1px solid #ddd;
        color: #555;
        outline: 0;
    }
    .selectItem{
        border: none;
        outline: none;
        width: 100%;
        height: 20px;
        line-height: 30px;
    }
    .row-item{
        float: left;
        width: 30%;
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
    .item{
        border-bottom: 1px solid #bbb;
        padding-bottom: 20px;
        margin-bottom: 20px;
    }
    .item:last-child{
        border: none;
    }
</style>
</head>
<body>
    <div class="wrapper">
        <span id="config" class="ui-icon ui-state-default ui-icon-config"></span>
        <div class="bills">
            <div class="grid-wrap mb10" id="acGridWrap">
                <form id="manage-form" action="">
                    <ul style="font-size: 20px;font-weight: bold">基本信息</ul>
                    <input type="hidden" id="user_id" value="<?php echo $data->user_id ?>">
                    <input type="hidden" id="id" value="<?php echo $id ?>">
                    <ul class="mod-form-rows base-form clearfix item" id="base-form">
                        <li class="row-item">
                            <div class="label-wrap"><label for="number">车牌号:</label></div>
                            <div class="ctn-wrap"><input type="text" value="<?php echo $data->plateNo ?>" class="ui-input" name="plateNo" id="plateNo"></div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="vin">VIN码:</label></div>
                            <div class="ctn-wrap"><input type="text" value="<?php echo $data->vin ?>" class="ui-input" name="vin" id="vin"></div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="name">车主姓名:</label></div>
                            <div class="ctn-wrap"><input type="text" value="<?php echo $data->username ?>" class="ui-input" name="username" id="username"></div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="brand">品牌:</label></div>
                            <div class="ctn-wrap"><input type="text" value="<?php echo $data->brand ?>" class="ui-input" name="brand" id="brand"></div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="notice">公告号:</label></div>
                            <div class="ctn-wrap"><input type="text" value="<?php echo $data->notice ?>" class="ui-input" name="notice" id="notice"></div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="tel">车主电话:</label></div>
                            <div class="ctn-wrap"><input type="text" value="<?php echo $data->tel ?>" class="ui-input" name="tel" id="tel"></div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="system">车系:</label></div>
                            <div class="ctn-wrap"><input type="text" value="<?php echo $data->system ?>" class="ui-input" name="system" id="system"></div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="engine">发动机号:</label></div>
                            <div class="ctn-wrap"><input type="text" value="<?php echo $data->engine ?>" class="ui-input" name="engine" id="engine"></div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="id">身份证号:</label></div>
                            <div class="ctn-wrap"><input type="text" value="<?php echo $data->people_id ?>" class="ui-input" name="people_id" id="people_id"></div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="annual">车型年款:</label></div>
                            <div class="ctn-wrap"><input type="text" value="<?php echo $data->annual ?>" class="ui-input" name="annual" id="annual"></div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="color">车辆颜色:</label></div>
                            <div class="ctn-wrap"><input type="text" value="<?php echo $data->color ?>" class="ui-input" name="color" id="color"></div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="address">车主地址:</label></div>
                            <div class="ctn-wrap"><input type="text" value="<?php echo $data->address ?>" class="ui-input" name="address" id="address"></div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="shape">车型:</label></div>
                            <div class="ctn-wrap"><input type="text" value="<?php echo $data->shape ?>" class="ui-input" name="shape" id="shape"></div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="price">车辆价格:</label></div>
                            <div class="ctn-wrap"><input type="text" value="<?php echo $data->price ?>" class="ui-input" name="price" id="price"></div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="type">车辆类型:</label></div>
                            <div class="ctn-wrap sel">
                                <select name="type" class="selectItem" id="type">
                                    <?php if($data->type == 1):?>
                                        <option value="1" selected>小型轿车</option>
                                    <?php else:?>
                                        <option value="1">小型轿车</option>
                                    <?php endif ;?>
                                    <?php if($data->type == 2):?>
                                        <option value="2" selected>大型汽车</option>
                                    <?php else:?>
                                        <option value="2">大型汽车</option>
                                    <?php endif ;?>
                                    <?php if($data->type == 3):?>
                                        <option value="3" selected>专用汽车</option>
                                    <?php else:?>
                                        <option value="3">专用汽车</option>
                                    <?php endif ;?>
                                    <?php if($data->type == 4):?>
                                        <option value="4" selected>特种车</option>
                                    <?php else:?>
                                        <option value="4">特种车</option>
                                    <?php endif ;?>
                                    <?php if($data->type == 5):?>
                                        <option value="5" selected>三轮摩托车</option>
                                    <?php else:?>
                                        <option value="5">三轮摩托车</option>
                                    <?php endif ;?>

                                </select>
                            </div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="registration">注册时间:</label></div>
                            <div class="ctn-wrap"><input type="date" value="<?php echo $data->registration ?>" class="ui-input" name="registration" id="registration"></div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="review">年审到期:</label></div>
                            <div class="ctn-wrap"><input type="date" value="<?php echo $data->review ?>" class="ui-input" name="review" id="review"></div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="nature">使用性质:</label></div>
                            <div class="ctn-wrap sel">
                                <select name="nature" class="selectItem" id="nature">
                                    <?php if($data->nature == 1):?>
                                        <option value="1" selected>营运</option>
                                    <?php else:?>
                                        <option value="1">营运</option>
                                    <?php endif ;?>
                                    <?php if($data->nature == 2):?>
                                        <option value="2" selected>非营运</option>
                                    <?php else:?>
                                        <option value="2">非营运</option>
                                    <?php endif ;?>

                                </select>
                            </div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="administrator">车辆管理者:</label></div>
                            <div class="ctn-wrap"><input type="text" value="<?php echo $data->administrator ?>" class="ui-input" name="administrator" id="administrator"></div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="phone">管理者电话:</label></div>
                            <div class="ctn-wrap"><input type="text" value="<?php echo $data->phone ?>" class="ui-input" name="phone" id="phone"></div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="displacement">排量:</label></div>
                            <div class="ctn-wrap"><input type="text" value="<?php echo $data->displacement ?>" class="ui-input" name="displacement" id="displacement"></div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="front">前轮型号:</label></div>
                            <div class="ctn-wrap"><input type="text" value="<?php echo $data->front ?>" class="ui-input" name="front" id="front"></div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="rear">后轮型号:</label></div>
                            <div class="ctn-wrap"><input type="text" value="<?php echo $data->rear ?>" class="ui-input" name="rear" id="rear"></div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="transmission">变速箱型号:</label></div>
                            <div class="ctn-wrap"><input type="text" value="<?php echo $data->transmission ?>" class="ui-input" name="transmission" id="transmission"></div>
                        </li>
                    </ul>


                    <ul style="font-size: 20px;font-weight: bold">保养</ul>
                    <ul class="mod-form-rows base-form clearfix item" id="base-form">
                        <li class="row-item">
                            <div class="label-wrap"><label for="currentMileage">当前里程(KM):</label></div>
                            <div class="ctn-wrap"><input type="text" value="<?php echo $data->currentMileage ?>" class="ui-input" name="currentMileage" id="currentMileage"></div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="adviceMileage">建议保养里程(KM):</label></div>
                            <div class="ctn-wrap"><input type="text" value="<?php echo $data->adviceMileage ?>" class="ui-input" name="adviceMileage" id="adviceMileage"></div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="adviceTime">建议保养时间:</label></div>
                            <div class="ctn-wrap"><input type="date" value="<?php echo $data->adviceTime ?>" class="ui-input" name="adviceTime" id="adviceTime"></div>
                        </li>
                    </ul>


                    <ul style="font-size: 20px;font-weight: bold">保险</ul>
                    <ul class="mod-form-rows base-form clearfix item" id="base-form">
                        <li class="row-item">
                            <div class="label-wrap"><label for="compulsoryTime">交强险到期时间:</label></div>
                            <div class="ctn-wrap"><input type="date" value="<?php echo $data->compulsoryTime ?>" class="ui-input" name="compulsoryTime" id="compulsoryTime"></div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="compulsoryNo">交强险保单号:</label></div>
                            <div class="ctn-wrap"><input type="text" value="<?php echo $data->compulsoryNo ?>" class="ui-input" name="compulsoryNo" id="compulsoryNo"></div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="compulsoryCompany">交强险保险公司:</label></div>
                            <div class="ctn-wrap sel">
                                <select name="compulsoryCompany" class="selectItem" id="compulsoryCompany">
                                    <?php if($data->compulsoryCompany == 0):?>
                                        <option value="0" selected>---请选择交强险公司---</option>
                                    <?php else:?>
                                        <option value="0">---请选择交强险公司---</option>
                                    <?php endif ;?>
                                    <?php if($data->compulsoryCompany == 1):?>
                                        <option value="1" selected>太平洋车险</option>
                                    <?php else:?>
                                        <option value="1">太平洋车险</option>
                                    <?php endif ;?>
                                    <?php if($data->compulsoryCompany == 2):?>
                                        <option value="2" selected>平安车险</option>
                                    <?php else:?>
                                        <option value="2">平安车险</option>
                                    <?php endif ;?>
                                    <?php if($data->compulsoryCompany == 3):?>
                                        <option value="3" selected>人保车险</option>
                                    <?php else:?>
                                        <option value="3">人保车险</option>
                                    <?php endif ;?>
                                    <?php if($data->compulsoryCompany == 4):?>
                                        <option value="4" selected>中国人寿财险</option>
                                    <?php else:?>
                                        <option value="4">中国人寿财险</option>
                                    <?php endif ;?>
                                    <?php if($data->compulsoryCompany == 5):?>
                                        <option value="5" selected>中华联合车险</option>
                                    <?php else:?>
                                        <option value="5">中华联合车险</option>
                                    <?php endif ;?>
                                    <?php if($data->compulsoryCompany == 6):?>
                                        <option value="6" selected>大地车险</option>
                                    <?php else:?>
                                        <option value="6">大地车险</option>
                                    <?php endif ;?>
                                    <?php if($data->compulsoryCompany == 7):?>
                                        <option value="7" selected>阳光车险</option>
                                    <?php else:?>
                                        <option value="7">阳光车险</option>
                                    <?php endif ;?>
                                    <?php if($data->compulsoryCompany == 8):?>
                                        <option value="8" selected>太平车险</option>
                                    <?php else:?>
                                        <option value="8">太平车险</option>
                                    <?php endif ;?>
                                    <?php if($data->compulsoryCompany == 9):?>
                                        <option value="9" selected>华安车险</option>
                                    <?php else:?>
                                        <option value="9">华安车险</option>
                                    <?php endif ;?>
                                    <?php if($data->compulsoryCompany == 10):?>
                                        <option value="10" selected>天安车险</option>
                                    <?php else:?>
                                        <option value="10">天安车险</option>
                                    <?php endif ;?>
                                    <?php if($data->compulsoryCompany == 11):?>
                                        <option value="11" selected>英大泰和车险</option>
                                    <?php else:?>
                                        <option value="11">英大泰和车险</option>
                                    <?php endif ;?>
                                    <?php if($data->compulsoryCompany == 12):?>
                                        <option value="12" selected>安盛天平车险</option>
                                    <?php else:?>
                                        <option value="12">安盛天平车险</option>
                                    <?php endif ;?>
                                    <?php if($data->compulsoryCompany == 13):?>
                                        <option value="13" selected>安心车险</option>
                                    <?php else:?>
                                        <option value="13">安心车险</option>
                                    <?php endif ;?>
                                    <?php if($data->compulsoryCompany == 14):?>
                                        <option value="14" selected>紫金车险</option>
                                    <?php else:?>
                                        <option value="14">紫金车险</option>
                                    <?php endif ;?>
                                    <?php if($data->compulsoryCompany == 15):?>
                                        <option value="15" selected>合众车险</option>
                                    <?php else:?>
                                        <option value="15">合众车险</option>
                                    <?php endif ;?>
                                    <?php if($data->compulsoryCompany == 16):?>
                                        <option value="16" selected>利保车险</option>
                                    <?php else:?>
                                        <option value="16">利保车险</option>
                                    <?php endif ;?>
                                    <?php if($data->compulsoryCompany == 17):?>
                                        <option value="17" selected>其他</option>
                                    <?php else:?>
                                        <option value="17">其他</option>
                                    <?php endif ;?>

                                </select>
                            </div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="compulsorySale">交强险销售人员:</label></div>
                            <div class="ctn-wrap"><input type="text" value="<?php echo $data->compulsorySale ?>" class="ui-input" name="compulsorySale" id="compulsorySale"></div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="commercialTime">商业险到期时间:</label></div>
                            <div class="ctn-wrap"><input type="date" value="<?php echo $data->commercialTime ?>" class="ui-input" name="commercialTime" id="commercialTime"></div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="commercialCompany">商业险保险公司:</label></div>
                            <div class="ctn-wrap sel">
                                <select name="commercialCompany" class="selectItem" id="commercialCompany">
                                    <?php if($data->commercialCompany == 0):?>
                                        <option value="0" selected>---请选择交强险公司---</option>
                                    <?php else:?>
                                        <option value="0">---请选择交强险公司---</option>
                                    <?php endif ;?>
                                    <?php if($data->commercialCompany == 1):?>
                                        <option value="1" selected>太平洋车险</option>
                                    <?php else:?>
                                        <option value="1">太平洋车险</option>
                                    <?php endif ;?>
                                    <?php if($data->commercialCompany == 2):?>
                                        <option value="2" selected>平安车险</option>
                                    <?php else:?>
                                        <option value="2">平安车险</option>
                                    <?php endif ;?>
                                    <?php if($data->commercialCompany == 3):?>
                                        <option value="3" selected>人保车险</option>
                                    <?php else:?>
                                        <option value="3">人保车险</option>
                                    <?php endif ;?>
                                    <?php if($data->commercialCompany == 4):?>
                                        <option value="4" selected>中国人寿财险</option>
                                    <?php else:?>
                                        <option value="4">中国人寿财险</option>
                                    <?php endif ;?>
                                    <?php if($data->commercialCompany == 5):?>
                                        <option value="5" selected>中华联合车险</option>
                                    <?php else:?>
                                        <option value="5">中华联合车险</option>
                                    <?php endif ;?>
                                    <?php if($data->commercialCompany == 6):?>
                                        <option value="6" selected>大地车险</option>
                                    <?php else:?>
                                        <option value="6">大地车险</option>
                                    <?php endif ;?>
                                    <?php if($data->commercialCompany == 7):?>
                                        <option value="7" selected>阳光车险</option>
                                    <?php else:?>
                                        <option value="7">阳光车险</option>
                                    <?php endif ;?>
                                    <?php if($data->commercialCompany == 8):?>
                                        <option value="8" selected>太平车险</option>
                                    <?php else:?>
                                        <option value="8">太平车险</option>
                                    <?php endif ;?>
                                    <?php if($data->commercialCompany == 9):?>
                                        <option value="9" selected>华安车险</option>
                                    <?php else:?>
                                        <option value="9">华安车险</option>
                                    <?php endif ;?>
                                    <?php if($data->commercialCompany == 10):?>
                                        <option value="10" selected>天安车险</option>
                                    <?php else:?>
                                        <option value="10">天安车险</option>
                                    <?php endif ;?>
                                    <?php if($data->commercialCompany == 11):?>
                                        <option value="11" selected>英大泰和车险</option>
                                    <?php else:?>
                                        <option value="11">英大泰和车险</option>
                                    <?php endif ;?>
                                    <?php if($data->commercialCompany == 12):?>
                                        <option value="12" selected>安盛天平车险</option>
                                    <?php else:?>
                                        <option value="12">安盛天平车险</option>
                                    <?php endif ;?>
                                    <?php if($data->commercialCompany == 13):?>
                                        <option value="13" selected>安心车险</option>
                                    <?php else:?>
                                        <option value="13">安心车险</option>
                                    <?php endif ;?>
                                    <?php if($data->commercialCompany == 14):?>
                                        <option value="14" selected>紫金车险</option>
                                    <?php else:?>
                                        <option value="14">紫金车险</option>
                                    <?php endif ;?>
                                    <?php if($data->commercialCompany == 15):?>
                                        <option value="15" selected>合众车险</option>
                                    <?php else:?>
                                        <option value="15">合众车险</option>
                                    <?php endif ;?>
                                    <?php if($data->commercialCompany == 16):?>
                                        <option value="16" selected>利保车险</option>
                                    <?php else:?>
                                        <option value="16">利保车险</option>
                                    <?php endif ;?>
                                    <?php if($data->commercialCompany == 17):?>
                                        <option value="17" selected>其他</option>
                                    <?php else:?>
                                        <option value="17">其他</option>
                                    <?php endif ;?>
                                </select>
                            </div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="commercialNo">商业险保单号:</label></div>
                            <div class="ctn-wrap"><input type="text" value="<?php echo $data->commercialNo ?>" class="ui-input" name="commercialNo" id="commercialNo"></div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="commercialSale">商业险销售人员:</label></div>
                            <div class="ctn-wrap"><input type="text" value="<?php echo $data->commercialSale ?>" class="ui-input" name="commercialSale" id="commercialSale"></div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="policyHolder">投保人:</label></div>
                            <div class="ctn-wrap"><input type="text" value="<?php echo $data->policyHolder ?>" class="ui-input" name="policyHolder" id="policyHolder"></div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="insured">被保险人:</label></div>
                            <div class="ctn-wrap"><input type="text" value="<?php echo $data->insured ?>" class="ui-input" name="insured" id="insured"></div>
                        </li>
                        <li class="row-item">
                            <div class="label-wrap"><label for="remarks">保险备注:</label></div>
                            <div class="ctn-wrap"><input type="text" value="<?php echo $data->remarks ?>" class="ui-input" name="remarks" id="remarks"></div>
                        </li>
                    </ul>
                </form>
                <div style="height: 30px;text-align: center;">
                    <button type="button" class="btn" id="submit" style="border: 1px solid #3279a0;background: -webkit-gradient(linear,0 0,0 100%,from(#4994be),to(#337fa9));color: #fff;">保存</button>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url()?>statics/js/dist/customer_add.js"></script>
</body>
<script>
    $("#submit").click(function () {
        var plateNo = $("#plateNo").val();
        var brand = $("#brand").val();
        var system = $("#system").val();
        var annual = $("#annual").val();
        var shape = $("#shape").val();
        var vin = $("#vin").val();
        var username = $("#username").val();
        var notice = $("#notice").val();
        var tel = $("#tel").val();
        var engine = $("#engine").val();
        var people_id = $("#people_id").val();
        var color = $("#color").val();
        var address = $("#address").val();
        var price = $("#price").val();
        var type = $("#type").val();
        var registration = $("#registration").val();
        var review = $("#review").val();
        var nature = $("#nature").val();
        var administrator = $("#administrator").val();
        var phone = $("#phone").val();
        var displacement = $("#displacement").val();
        var front = $("#front").val();
        var rear = $("#rear").val();
        var transmission = $("#transmission").val();
        var currentMileage = $("#currentMileage").val();
        var adviceMileage = $("#adviceMileage").val();
        var adviceTime = $("#adviceTime").val();
        var compulsoryTime = $("#compulsoryTime").val();
        var compulsoryNo = $("#compulsoryNo").val();
        var compulsorySale = $("#compulsorySale").val();
        var compulsoryCompany = $("#compulsoryCompany").val();
        var commercialTime = $("#commercialTime").val();
        var commercialCompany = $("#commercialCompany").val();
        var commercialNo = $("#commercialNo").val();
        var commercialSale = $("#commercialSale").val();
        var policyHolder = $("#policyHolder").val();
        var insured = $("#insured").val();
        var remarks = $("#remarks").val();
        var user_id = $("#user_id").val();
        var id = $("#id").val();

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('customer/caradd');?>",
            traditional: false,
            data: {
                    plateNo : plateNo,
                    brand : brand,
                    system : system,
                    annual : annual,
                    shape : shape,
                    vin : vin,
                    username : username,
                    notice : notice,
                    tel : tel,
                    engine : engine,
                    people_id : people_id,
                    color : color,
                    address : address,
                    price :price,
                    type : type,
                    registration : registration,
                    review : review,
                    nature : nature,
                    administrator : administrator,
                    phone : phone,
                    displacement : displacement,
                    front : front,
                    rear : rear,
                    transmission : transmission,
                    currentMileage : currentMileage,
                    adviceMileage : adviceMileage,
                    adviceTime : adviceTime,
                    compulsoryTime : compulsoryTime,
                    compulsoryNo : compulsoryNo,
                    compulsoryCompany : compulsoryCompany,
                    commercialTime : commercialTime,
                    commercialCompany : commercialCompany,
                    commercialNo : commercialNo,
                    commercialSale :commercialSale,
                    policyHolder : policyHolder,
                    insured : insured,
                    remarks : remarks,
                    compulsorySale:compulsorySale,
                    id:id,
                    user_id:user_id,
            },
            dataType: "json",

            success: function (data) {

                if(data.code == 0){
                    parent.Public.tips({
                        content:data.text
                    });
                    location.href = "<?php echo site_url('customer/detail?id=')?>"+id;
                }else if (data.code == 1){
                    parent.Public.tips({
                        type:1,
                        content:data.text
                    });
                } else{
                    parent.Public.tips({
                        type:1,
                        content:"未知错误"
                    });
                }

            },
        });
    });
</script>
</html>


 