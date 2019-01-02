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

<style>
    .clearfix::before,
    .clearfix::after{
        content:'';
        display: block;
        line-height: 0;
        height: 0;
        visibility: hidden;
        clear: both;
    }
    .grid-wrap{
        background-color: #fff;
        border: 1px solid #ddd;
        height: 800px;
        width: 100%;
        overflow: auto;
        position: relative;
        box-sizing: border-box;
        padding: 15px 20px;
    }
    #config{
        background: url(<?php echo base_url()?>statics/css/img/ui-icons_20150410.png) -304px 0 no-repeat;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 2;
        cursor: pointer;
        border: none;
    }
    .add{
        position: fixed;
        width: 770px;
        height: 500px;
        background-color: #fff;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        box-shadow: 1px 1px 10px 10px #a9a9a9;
        border-radius: 3px;
        z-index: 1998;
    }
    .add>#add_header{
        background-color: #f5f5f5;
        height: 32px;
        width: 100%;
        border-radius: 3px;
    }
    .add>#add_header>#add_title{
        float: left;
        height: 32px;
        line-height: 32px;
        font-size: 14px;
        font-weight: 700;
        margin-left: 10px;
    }
    .add>#add_header>#add_close{
        float: right;
        height: 32px;
        line-height: 32px;
        color: #aaa;
        font-size: 18px;
        width: 20px;
        cursor: pointer;
    }
    .add>#add_content{
        width: 100%;
        height: 435px;
        box-sizing: border-box;
        padding: 25px;
    }
    .add>#add_content>.content_title{
        height: 18px;
        width: 100%;
        border-bottom: 1px solid #ccc;
    }
    .add>#add_content>.content_main{
        width: 100%;
        box-sizing: border-box;
        padding: 20px 0;
    }
    .add>#add_content>.content_main:first-child{
        height: 50%;
    }
    .add>#add_content>.content_main:last-child{
        height: 20%;
    }
    .add>#add_content>.content_main>li{
        width: 50%;
        float: left;
        margin-bottom: 5px;
    }
    .add>#add_content>.content_main>li>span{
        display: inline-block;
        width: 70px;
        height: 30px;
    }
    .add>#add_content>.content_main>li>input{
        width: 140px;
        height: 24px;
        border: 1px solid #ddd;
    }
    .add>#add_content>.content_main>li>span>select{
        border: none;
        width: 100%;
        height: 100%;
    }
    .add>#add_content>.content_main>li>.sel{
        display: inline-block;
        border: 1px solid #ddd;
        height: 24px;
        line-height: 24px;
        width: 140px;
        margin-left: -3px;
        outline: none;
    }
    .add_footer{
        position: absolute;
        width: 770px;
        height: 33px;
        bottom: 0;
        right: 0;
    }
    .base-form{
        border-bottom: 1px solid #ddd;
        margin-bottom: 20px;
    }
    .main_title{
        font-size: 20px;
        font-weight: bold;
    }
    .row-item{
        float: left;
        width: 33.33%;
    }
    .row-item .label-wrap{
        width: 90px;
    }
    .row-item input{
        width: 162px;
        height: 16px;
    }
    .sel{
        width: 172px;
        height: 30px;
        border: 1px solid #ddd;
    }
    .sel>select{
        width: 100%;
        height: 100%;
        border: none;
    }
    .table{
        width: 100%;
    }
    table{
        border-collapse:collapse;
    }
    .table tr{
        border: 1px solid #000;
        height: 33px;
    }
    .table th{
        background-color: #f1f1f1;
        height: 30px;
    }
    .table th,td{
        border: 1px solid #e2e2e2;
        /*width: 30%;*/
        height: 33px;
        text-align: center;
    }
    .table tr:hover{
        background-color: #f8ff94;
    }
    .table td>span{
        display: inline-block;
        width: 100px;
        height: 33px;
        line-height: 33px;
        margin-bottom: -6px;
        overflow: hidden;
        text-overflow:ellipsis;
    }
    .fr>#taocan_add{
        margin-top: -5px;
    }
    .tankuang{
        padding: 0;
        height: 90%;
    }
    .item{
        width: 100%;
        margin-top: 2%;
        border-bottom: 1px solid #ddd;
    }
    .item:first-child{
        margin: 0;
    }
    .item .item_title{
        width: 100%;
        height: 40px;
        line-height: 40px;
        background-color: #f5f5f5;
    }
    .item .item_title .item_title_text{
        font-size: 20px;
        font-weight: bold;
        float: left;
        padding-left: 1%;
    }
    .item .item_title .item_title_photo{
        float: right;
        text-align: right;
        width: 75px;
        height: 25px;
        margin-right: 2%;
        cursor: pointer;
        background-image: url(<?php echo base_url()?>statics/css/img/img_upload.png);
        background-repeat: no-repeat;
    }
    .item .item_title .item_title_photo:hover{
        background-position: 0 -40px;
        color: rgb(255,150,0);
    }
    .item .item_item{
        width: 50%;
        height: 40px;
        line-height: 40px;
        float: left;
        border-top: 1px solid #ddd;
        box-sizing: border-box;
        padding:0 1%;
    }
    .item .item_item .item_name{
        float: left;
        /*min-width: 380px;*/
        /*overflow: hidden;*/
        /*white-space: nowrap;*/
        /*text-overflow:ellipsis;*/
    }
    .item .item_item .item_icon{
        float: right;
        width: 40px;
        height: 25px;
        margin-top: 7.5px;
        background-image: url(<?php echo base_url()?>statics/css/img/iszc.png);
        background-repeat: no-repeat;
    }
    .item_icon_click{
        background-position: 0px -40px;
    }
    .item .item_item .item_discribe{
        float: right;
        color: #999;
        display: inline-block;
        width: 50px;
    }
    .item .item_item .item_discribe_click{
        color: red;
    }
    .item .upload_img{
        width: 100%;
        height: 0%;
        line-height: 10px;
        border-top: 1px solid #ddd;
    }
    .item .upload_img span{
        position: relative;
        display: inline-block;
        height: 120px;
        width: 120px;
        box-sizing: border-box;
        padding: 5px;
        margin: 10px;
        border: 1px solid #000;
    }
    .item .upload_img span img{
        position: relative;
        width: 100%;
        height: 100%;
    }
    .item .upload_img span .del_img{
        position: absolute;
        display: block;
        z-index: 555;
        height: 29px;
        width: 29px;
        background: url(<?php echo base_url()?>statics/css/img/img_close.png) no-repeat;
        text-decoration: none;
        right: -13px;
        top: -13px;
    }
    /*实录照片*/
    .upload_image{
        width: 100%;
        height: 0%;
        border: 1px solid #bdbdbd;
    }
    .upload_image_click{
        display: inline-block;
        float: left;
        width: 120px;
        height: 120px;
        margin: 10px;
        border: 1px solid #bdbdbd;
        text-align: center;
        background-color: #ecf0f3;
        cursor: pointer;
        box-sizing: border-box;
    }
    .upload_image_click>span{
        display: inline-block;
        width: 100%;
        height: 50%;
        font-size: 20px;
    }
    .upload_image_click>span:first-child{
        font-size: 80px;
        line-height: 40px;
        box-sizing: border-box;
        padding-top: 20px;
    }
    .upload_image .show_image_span{
        position: relative;
        display: inline-block;
        height: 120px;
        width: 120px;
        box-sizing: border-box;
        padding: 5px;
        margin: 10px;
        border: 1px solid #bdbdbd;
    }
    .upload_image .show_image_span .show_image{
        position: relative;
        width: 100%;
        height: 100%;
    }
    .upload_image .show_image_span .del_img{
        position: absolute;
        display: block;
        z-index: 555;
        height: 29px;
        width: 29px;
        background: url(<?php echo base_url()?>statics/css/img/img_close.png) no-repeat;
        text-decoration: none;
        right: -13px;
        top: -13px;
    }
    .province{
        width: 600px;
        height: 150px;
        border: 1px solid #ddd;
        position: absolute;
        top: 108px;
        left: 70px;
        /*display: none;*/
    }
    .province>.province_li{
        width: 50px;
        height: 50px;
        line-height: 50px;
        float: left;
        text-align: center;
        box-sizing: border-box;
        border-right: 1px solid #ddd;
        border-bottom: 1px solid #ddd;
        cursor: pointer;
    }
    .province>.province_li:nth-child(12n){
        border-right: none;
    }
    .province>.province_li:nth-child(25),
    .province>.province_li:nth-child(26),
    .province>.province_li:nth-child(27),
    .province>.province_li:nth-child(28),
    .province>.province_li:nth-child(29),
    .province>.province_li:nth-child(30),
    .province>.province_li:nth-child(31),
    .province>.province_li:nth-child(32){
        border-bottom: none;
    }
    .province>.province_li:hover{
        background-color: #eee;
    }

    /*服务项目*/
    .table_add{
        height: 40px;
        width: 100%;
        line-height: 40px;
        background-color: #f1f1f1;
        margin: 10px 0;
        text-align: center;
    }
    .table_add span{
        display: inline-block;
        text-align: center;
        height: 30px;
        line-height: 30px;
    }
    .table_add span:first-child{
        float: left;
        margin: 5px 20px 0 10px;
        font-size: 18px;
    }
    .table_add span:last-child{
        width: 70px;
        color: #fff;
        background-color: #578ccd;
        border-radius: 20px;
        margin-left: -336px;
        cursor: pointer;
    }
    .table_total .table_total_l{
        float: left;
        margin-left: 10px;
    }
    .table_total .table_total_l span:nth-child(2){
        color: red;
        display: inline-block;
        width: 50px;
        height: 25px;
        border: 1px solid #dcdcdc;
        border-radius: 15px;
        text-align: left;
        box-sizing: border-box;
        padding: 0 5px;
    }
    .table_total .table_total_l span:nth-child(2) i{
        display: inline-block;
        width: 15px;
        height: 15px;
        border: 1px solid #ededed;
        border-radius: 20px;
        background: #ededed;
        margin-top: 3px;
        transition: all .3s linear;
    }
    .table_total .table_total_l span:nth-child(2) .check{
        background: #28aaff;
        border: 1px #28aaff solid;
        transform: translateX(20px);
    }
    .table_total .table_total_r{
        float: right;
        width: 70%;
    }
    .table_total .table_total_r table{
        width: 100%;
    }
    .table_total .table_total_r table td{
        width: 14.5%;
        font-weight: bold;
        border: none;
    }
    .table_total .table_total_r table td span{
        color: #21c064;
    }
    .table_total .table_total_r table td:last-child span{
        color: #ff6600;
    }
</style>
</head>
<body>
<div class="wrapper">
    <div class="mod-search cf">
        <div class="fl">
            <a class="ui-btn ui-btn-sp choose">顾客信息</a>
            <a class="ui-btn choose">车辆信息</a>
            <a class="ui-btn choose">实录照片</a>
            <a class="ui-btn choose">车检报告</a>
            <a class="ui-btn choose">服务项目</a>
        </div>
        <div class="fr">
            <a id="save_all" class="ui-btn ui-btn-sp mrb">施工</a>
        </div>
    </div>
<!--信息-->
    <div class="grid-wrap">
        <span id="config" class="ui-icon ui-state-default ui-icon-config"></span>
        <ul class="main_title customer_information">顾客信息</ul>
        <ul class="mod-form-rows base-form clearfix customer_information" id="base-form">
            <li class="row-item">
                <div class="label-wrap"><label for="name">客户姓名:</label></div>
                <div class="ctn-wrap"><input type="text" value="" class="ui-input normal" name="name" id="name" readonly></div>
            </li>
            <li class="row-item">
                <div class="label-wrap"><label for="phone">手机号:</label></div>
                <div class="ctn-wrap"><input type="tel" value="" class="ui-input normal" name="phone" id="phone" readonly></div>
            </li>
            <li class="row-item">
                <div class="label-wrap"><label for="number">车牌号:</label></div>
                <div class="ctn-wrap"><input type="text" value="" class="ui-input normal" name="number" id="number" readonly></div>
            </li>
            <li class="row-item">
                <div class="label-wrap"><label for="company">工作单位:</label></div>
                <div class="ctn-wrap"><input type="text" value="" class="ui-input normal" name="company" id="company"></div>
            </li>
            <li class="row-item">
                <div class="label-wrap"><label for="reception">接待人员:</label></div>
                <div class="ctn-wrap">
                    <select name="reception" id="reception" class="sel">
                        <option value="1" selected>待确定</option>
                        <option value="2">已确定</option>
                        <option value="3">已取消</option>
                    </select>
                </div>
            </li>
            <li class="row-item">
                <div class="label-wrap"><label for="service">服务性质:</label></div>
                <div class="ctn-wrap">
                    <select name="service" id="service" class="sel">
                        <option value="1" selected>正常服务</option>
                        <option value="2">保险</option>
                        <option value="3">返工</option>
                        <option value="3">索赔</option>
                        <option value="3">免单</option>
                        <option value="3">公务车</option>
                    </select>
                </div>
            </li>
            <li class="row-item">
                <div class="label-wrap"><label for="songCarRen">送修人:</label></div>
                <div class="ctn-wrap"><input type="text" value="" class="ui-input normal" name="songCarRen" id="songCarRen"></div>
            </li>
            <li class="row-item">
                <div class="label-wrap"><label for="songCarRenPhone">送修人电话:</label></div>
                <div class="ctn-wrap"><input type="text" value="" class="ui-input normal" name="songCarRenPhone" id="songCarRenPhone"></div>
            </li>
            <li class="row-item">
                <div class="label-wrap"><label for="source">客户来源:</label></div>
                <div class="ctn-wrap"><input type="text" value="" class="ui-input normal" name="source" id="source"></div>
            </li>
            <li class="row-item" style="width: 100% ;">
                <div class="label-wrap"><label for="address">顾客地址:</label></div>
                <div class="ctn-wrap"><textarea value="" class="ui-input normal" name="address" id="address" style="width: 80.5%;height: 100%;"></textarea></div>
            </li>
            <li class="row-item">
                <div class="label-wrap"><label for="startTime">开工时间:</label></div>
                <div class="ctn-wrap"><input type="date" value="" class="ui-input normal" name="startTime" id="startTime"></div>
            </li>
            <li class="row-item">
                <div class="label-wrap"><label for="estimateTime">预计完工时间:</label></div>
                <div class="ctn-wrap"><input type="date" value="" class="ui-input normal" name="estimateTime" id="estimateTime"></div>
            </li>
            <li class="row-item">
                <div class="label-wrap"><label for="endTime">完工时间:</label></div>
                <div class="ctn-wrap"><input type="date" value="" class="ui-input normal" name="endTime" id="endTime"></div>
            </li>

        </ul>

        <ul class="main_title car_information" style="display: none">车辆信息</ul>
        <ul class="mod-form-rows base-form clearfix car_information" style="display: none;" id="base-form">
            <li class="row-item">
                <div class="label-wrap"><label for="brand">品牌:</label></div>
                <div class="ctn-wrap"><input type="text" value="" class="ui-input normal" name="brand" id="brand"></div>
            </li>
            <li class="row-item">
                <div class="label-wrap"><label for="vin">VIN码:</label></div>
                <div class="ctn-wrap"><input type="text" value="" class="ui-input normal" name="vin" id="vin"></div>
            </li>
            <li class="row-item">
                <div class="label-wrap"><label for="insureCompany">投保公司:</label></div>
                <div class="ctn-wrap">
                    <select name="insureCompany" id="insureCompany" class="sel">
                        <option value="1" selected>太平洋车险</option>
                        <option value="2">平安车险</option>
                        <option value="3">人保车险</option>
                        <option value="4">中国人寿财险</option>
                        <option value="5">中华联合车险</option>
                        <option value="6">大地车险</option>
                        <option value="7">阳光车险</option>
                        <option value="8">太平车险</option>
                        <option value="9">华安车险</option>
                        <option value="10">天安车险</option>
                        <option value="11">英大泰和车险</option>
                        <option value="12">安盛天平车险</option>
                        <option value="13">安心车险</option>
                        <option value="14">紫金车险</option>
                        <option value="15">合众车险</option>
                        <option value="16">利宝车险</option>
                        <option value="17">其他</option>
                    </select>
                </div>
            </li>
            <li class="row-item">
                <div class="label-wrap"><label for="system">车系:</label></div>
                <div class="ctn-wrap"><input type="text" value="" class="ui-input normal" name="system" id="system"></div>
            </li>
            <li class="row-item">
                <div class="label-wrap"><label for="notice">公告号	:</label></div>
                <div class="ctn-wrap"><input type="text" value="" class="ui-input normal" name="notice" id="notice"></div>
            </li>
            <li class="row-item">
                <div class="label-wrap"><label for="insuranceEndTime">保险到期	:</label></div>
                <div class="ctn-wrap"><input type="date" value="" class="ui-input normal" name="insuranceEndTime" id="insuranceEndTime"></div>
            </li>
            <li class="row-item">
                <div class="label-wrap"><label for="shape">车型年款:</label></div>
                <div class="ctn-wrap"><input type="text" value="" class="ui-input normal" name="shape" id="shape"></div>
            </li>
            <li class="row-item">
                <div class="label-wrap"><label for="lastMileage">上次里程:</label></div>
                <div class="ctn-wrap"><input type="number" value="" class="ui-input normal" name="lastMileage" id="lastMileage"></div>
            </li>
            <li class="row-item">
                <div class="label-wrap"><label for="annualEndTime">年审到期:</label></div>
                <div class="ctn-wrap"><input type="date" value="" class="ui-input normal" name="annualEndTime" id="annualEndTime"></div>
            </li>
            <li class="row-item">
                <div class="label-wrap"><label for="carShape">车型:</label></div>
                <div class="ctn-wrap"><input type="text" value="" class="ui-input normal" name="carShape" id="carShape"></div>
            </li>
            <li class="row-item">
                <div class="label-wrap"><label for="useMileage">行驶里程:</label></div>
                <div class="ctn-wrap"><input type="number" value="" class="ui-input normal" name="useMileage" id="useMileage"></div>
            </li>
            <li class="row-item">
                <div class="label-wrap"><label for="suggestedMaintenanceTime">	建议保养时间:</label></div>
                <div class="ctn-wrap"><input type="date" value="" class="ui-input normal" name="suggestedMaintenanceTime" id="suggestedMaintenanceTime"></div>
            </li>
            <li class="row-item">
                <div class="label-wrap"><label for="carName">车主姓名:</label></div>
                <div class="ctn-wrap"><input type="text" value="" class="ui-input normal" name="carName" id="carName"></div>
            </li>
            <li class="row-item">
                <div class="label-wrap"><label for="engineNumber">发动机号:</label></div>
                <div class="ctn-wrap"><input type="text" value="" class="ui-input normal" name="engineNumber" id="engineNumber"></div>
            </li>
            <li class="row-item">
                <div class="label-wrap"><label for="suggestedMaintenance">建议保养里程:</label></div>
                <div class="ctn-wrap"><input type="text" value="" class="ui-input normal" name="suggestedMaintenance" id="suggestedMaintenance"></div>
            </li>
            <li class="row-item">
                <div class="label-wrap"><label for="idNumber">身份证号:</label></div>
                <div class="ctn-wrap"><input type="text" value="" class="ui-input normal" name="idNumber" id="idNumber"></div>
            </li>
            <li class="row-item">
                <div class="label-wrap"><label for="carColor">车辆颜色:</label></div>
                <div class="ctn-wrap"><input type="text" value="" class="ui-input normal" name="carColor" id="carColor"></div>
            </li>
            <li class="row-item">
                <div class="label-wrap"><label for="carPrice">车辆价格:</label></div>
                <div class="ctn-wrap"><input type="text" value="" class="ui-input normal" name="carPrice" id="carPrice"></div>
            </li>
            <li class="row-item">
                <div class="label-wrap"><label for="carAddress">车主地址 :</label></div>
                <div class="ctn-wrap"><input type="text" value="" class="ui-input normal" name="carAddress" id="carAddress"></div>
            </li>
            <li class="row-item">
                <div class="label-wrap"><label for="registedTime">注册时间 :</label></div>
                <div class="ctn-wrap"><input type="text" value="" class="ui-input normal" name="registedTime" id="registedTime"></div>
            </li>
            <li class="row-item">
                <div class="label-wrap"><label for="natureUsage">使用性质:</label></div>
                <div class="ctn-wrap">
                    <select name="natureUsage" id="natureUsage" class="sel">
                        <option value="1" selected>营运</option>
                        <option value="2">非营运</option>
                    </select>
                </div>
            </li>
            <li class="row-item">
                <div class="label-wrap"><label for="frontWheelType">前轮型号 :</label></div>
                <div class="ctn-wrap"><input type="text" value="" class="ui-input normal" name="frontWheelType" id="frontWheelType"></div>
            </li>
            <li class="row-item">
                <div class="label-wrap"><label for="backWheelType">后轮型号 :</label></div>
                <div class="ctn-wrap"><input type="text" value="" class="ui-input normal" name="backWheelType" id="backWheelType"></div>
            </li>
            <li class="row-item">
                <div class="label-wrap"><label for="carType">车辆类型:</label></div>
                <div class="ctn-wrap">
                    <select name="carType" id="carType" class="sel">
                        <option value="1" selected>小型轿车</option>
                        <option value="2">大型汽车</option>
                        <option value="2">专用汽车</option>
                        <option value="2">特种车</option>
                        <option value="2">三轮摩托车</option>
                    </select>
                </div>
            </li>
            <li class="row-item">
                <div class="label-wrap"><label for="transmission">变速箱型号 :</label></div>
                <div class="ctn-wrap"><input type="text" value="" class="ui-input normal" name="transmission" id="transmission"></div>
            </li>
            <li class="row-item">
                <div class="label-wrap"><label for="carRmarks">车辆备注 :</label></div>
                <div class="ctn-wrap">
                    <input type="text" value="" class="ui-input normal" name="carRmarks" id="carRmarks">
<!--                    <textarea class="ui-input" name="carRmarks" id="carRmarks"></textarea>-->
                </div>
            </li>
            <li class="row-item">
                <div class="label-wrap"><label for="displacement">排量 :</label></div>
                <div class="ctn-wrap"><input type="text" value="" class="ui-input normal" name="displacement" id="displacement"></div>
            </li>
            <li class="row-item">
                <div class="label-wrap"><label for="displacement">排量 :</label></div>
                <div class="ctn-wrap clearfix">
                    <input type="radio" value="1" class="ui-input normal" name="displacement" id="displacement" checked="checked" style="width: 25%;float:left;margin-top: 8px">
                    <span style="float:left;margin-left: -10%">良好</span>
                    <input type="radio" value="2" class="ui-input normal" name="displacement" id="displacement" style="width: 25%;float:left;margin-top: 8px">
                    <span style="float:left;margin-left: -10%">不正常</span>
                </div>
            </li>
            <li class="row-item" style="width: 50%;">
                <div class="label-wrap"><label for="oilVolume">剩余油量 :</label></div>
                <div class="ctn-wrap clearfix">
                    <input type="radio" value="1" class="ui-input normal" name="oilVolume" id="oilVolume" checked="checked" style="width: 15%;float:left;margin-top: 8px">
                    <span style="float:left;margin-left: -5%">0</span>
                    <input type="radio" value="2" class="ui-input normal" name="oilVolume" id="oilVolume" style="width: 15%;float:left;margin-top: 8px">
                    <span style="float:left;margin-left: -5%">1/4</span>
                    <input type="radio" value="3" class="ui-input normal" name="oilVolume" id="oilVolume" style="width: 15%;float:left;margin-top: 8px">
                    <span style="float:left;margin-left: -5%">1/2</span>
                    <input type="radio" value="4" class="ui-input normal" name="oilVolume" id="oilVolume" style="width: 15%;float:left;margin-top: 8px">
                    <span style="float:left;margin-left: -5%">3/4</span>
                    <input type="radio" value="5" class="ui-input normal" name="oilVolume" id="oilVolume" style="width: 15%;float:left;margin-top: 8px">
                    <span style="float:left;margin-left: -5%">1</span>
                </div>
            </li>
        </ul>

        <ul class="main_title car_photo" style="display: none">实录照片</ul>
        <ul class="mod-form-rows base-form clearfix car_photo" style="display: none;" id="base-form">
            <li class="item_item upload_image clearfix">
                <input type="file" name="li_img" id="li_img" accept="image/*" hidden>
                <span class="upload_image_click">
                    <span>+</span>
                    <span>上传照片</span>
                </span>
            </li>
        </ul>

        <ul class="main_title car_report" style="display: none">车检报告</ul>
        <ul class="mod-form-rows base-form clearfix car_report" style="display: none;" id="base-form">
            <li class="row-item" style="width: 100% ;">
                <div class="label-wrap"><label for="examination_advice">体检建议:</label></div>
                <div class="ctn-wrap"><textarea value="" class="ui-input normal" name="examination_advice" id="examination_advice" style="width: 83.1%;height: 100%;"></textarea></div>
            </li>
            <li class="row-item" style="width: 100%;">
                <a class="ui-btn ui-btn-sp choose_inspect">全面检查</a>
                <a class="ui-btn choose_inspect">基础检查</a>
            </li>
            <li class="row-item" style="width: 100%;border: 1px solid #ddd;">
                <ul class="item clearfix">
                    <li class="item_title">
                        <span class="item_title_text">发动机部分</span>
                        <span class="item_title_photo">
                            <i></i>
                            上传照片
                        </span>
                    </li>
                    <li class="item_item base">
                        <span class="item_name">1.   着车检查发动机有无异响</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0"><!-- 0正常1不正常-->
                    </li>
                    <li class="item_item base">
                        <span class="item_name">2.   检查正时皮带是否老化或磨损（建议每3年或7万公里更换）</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0">
                    </li>
                    <li class="item_item base">
                        <span class="item_name">3.   检查风扇、空调、助力泵皮带的有无异响、老化、裂纹</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0">
                    </li>
                    <li class="item_item">
                        <span class="item_name">4.   清洁或更换空气格、空调格</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0">
                    </li>
                    <li class="item_item base">
                        <span class="item_name">5.   检查气门垫片是否漏油</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0">
                    </li>
                    <li class="item_item base">
                        <span class="item_name">6.   检查火花塞、点火线圈是否漏电</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0">
                    </li>
                    <li class="item_item base">
                        <span class="item_name">7.   检查上、下水管有无老化、膨胀、漏水现象</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0">
                    </li>
                    <li class="item_item base">
                        <span class="item_name">8.   检查碳罐是否堵塞（建议每3年或8万公里更换）</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0">
                    </li>
                    <li class="item_item base">
                        <span class="item_name">9.   检查节气门是否脏、堵塞</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0">
                    </li>
                    <li class="item_item upload_img">
                        <input type="file" name="li1_img" id="li1_img" class="file" accept="image/*" hidden>
                    </li>
                </ul>
                <ul class="item clearfix base">
                    <li class="item_title">
                        <span class="item_title_text">底盘部分</span>
                        <span class="item_title_photo">
                            <i></i>
                            上传照片
                        </span>
                    </li>
                    <li class="item_item">
                        <span class="item_name">10.   紧固底盘螺丝</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0"><!-- 0正常1不正常-->
                    </li>
                    <li class="item_item">
                        <span class="item_name">11.   检查离合器是否有打滑现象</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0">
                    </li>
                    <li class="item_item">
                        <span class="item_name">12.   检查变速器紧固情况，油平面及有无漏油现象</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0">
                    </li>
                    <li class="item_item">
                        <span class="item_name">13.   检查悬挂各球头是否松动或胶套漏油现象</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0">
                    </li>
                    <li class="item_item">
                        <span class="item_name">14.   检查前、后减震器是否漏油或变形</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0">
                    </li>
                    <li class="item_item">
                        <span class="item_name">15.   检查前、后桥是否碰撞变形</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0">
                    </li>
                    <li class="item_item">
                        <span class="item_name">16.   检查排气管是否变形或吊胶脱落</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0">
                    </li>
                    <li class="item_item">
                        <span class="item_name">17.   检查油箱固定螺丝是否紧固</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0">
                    </li>
                    <li class="item_item upload_img">
                        <input type="file" name="li2_img" id="li2_img" class="file" accept="image/*" hidden>
                    </li>
                </ul>
                <ul class="item clearfix">
                    <li class="item_title">
                        <span class="item_title_text">电气设备</span>
                        <span class="item_title_photo">
                            <i></i>
                            上传照片
                        </span>
                    </li>
                    <li class="item_item">
                        <span class="item_name">18.   检查蓄电池电压是否正常</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0"><!-- 0正常1不正常-->
                    </li>
                    <li class="item_item">
                        <span class="item_name">19.   检查发电机是否供电正常</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0">
                    </li>
                    <li class="item_item">
                        <span class="item_name">20.   检查内部灯光是否正常、仪表指示灯、室内阅读灯</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0">
                    </li>
                    <li class="item_item">
                        <span class="item_name">21.   检查外部灯光是否正常、大灯、小灯、前后雾灯、牌照灯、制动灯等</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0">
                    </li>
                    <li class="item_item">
                        <span class="item_name">22.   检查喇叭是否沙哑、单音等故障</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0">
                    </li>
                    <li class="item_item">
                        <span class="item_name">23.   检查四门玻璃升降是否正常</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0">
                    </li>
                    <li class="item_item">
                        <span class="item_name">24.   检查空调温度是否制冷正常</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0">
                    </li>
                    <li class="item_item upload_img">
                        <input type="file" name="li3_img" id="li3_img" class="file" accept="image/*" hidden>
                    </li>
                </ul>
                <ul class="item clearfix">
                    <li class="item_title">
                        <span class="item_title_text">轮胎部分</span>
                        <span class="item_title_photo">
                            <i></i>
                            上传照片
                        </span>
                    </li>
                    <li class="item_item">
                        <span class="item_name">25.   检查前、后轮胎和备用胎是否漏气、老化、磨损</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0"><!-- 0正常1不正常-->
                    </li>
                    <li class="item_item">
                        <span class="item_name">26.   检查前后轮磨损情况是否需要对调动平衡（建议半年更换1次）</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0">
                    </li>
                    <li class="item_item">
                        <span class="item_name">27.   清理胎纹石子用袋子装好展示给客户</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0">
                    </li>
                    <li class="item_item">
                        <span class="item_name">28.   紧固轮胎螺丝</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0">
                    </li>
                    <li class="item_item upload_img">
                        <input type="file" name="li4_img" id="li4_img" class="file" accept="image/*" hidden>
                    </li>
                </ul>
                <ul class="item clearfix base">
                    <li class="item_title">
                        <span class="item_title_text">刹车系统</span>
                        <span class="item_title_photo">
                            <i></i>
                            上传照片
                        </span>
                    </li>
                    <li class="item_item">
                        <span class="item_name">29.   检查刹车软管是否漏油、老化（建议3年更换1次）</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0"><!-- 0正常1不正常-->
                    </li>
                    <li class="item_item">
                        <span class="item_name">30.   检查刹车分泵是否卡死或漏油</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0">
                    </li>
                    <li class="item_item">
                        <span class="item_name">31.   检查手刹工作情况</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0">
                    </li>
                    <li class="item_item">
                        <span class="item_name">32.   检查刹车皮厚度是否正常</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0">
                    </li>
                    <li class="item_item">
                        <span class="item_name">33.   检查刹车碟是否平整</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0">
                    </li>
                    <li class="item_item upload_img">
                        <input type="file" name="li5_img" id="li5_img" class="file" accept="image/*" hidden>
                    </li>
                </ul>
                <ul class="item clearfix">
                    <li class="item_title">
                        <span class="item_title_text">油水部分</span>
                        <span class="item_title_photo">
                            <i></i>
                            上传照片
                        </span>
                    </li>
                    <li class="item_item">
                        <span class="item_name">34.   检查或更换机油、机油格</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0"><!-- 0正常1不正常-->
                    </li>
                    <li class="item_item">
                        <span class="item_name">35.   检查或更换方向机油、变速箱油、刹车油（建议2年或4万公里更换）</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0">
                    </li>
                    <li class="item_item">
                        <span class="item_name">36.   补充或更换雨刮水、防冻液，建议2年或4万公里更换防冻液</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0">
                    </li>
                    <li class="item_item upload_img">
                        <input type="file" name="li6_img" id="li6_img" class="file" accept="image/*" hidden>
                    </li>
                </ul>
                <ul class="item clearfix base">
                    <li class="item_title">
                        <span class="item_title_text">电脑检测</span>
                        <span class="item_title_photo">
                            <i></i>
                            上传照片
                        </span>
                    </li>
                    <li class="item_item">
                        <span class="item_name">37.   电脑检测读取故障码</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0"><!-- 0正常1不正常-->
                    </li>
                    <li class="item_item">
                        <span class="item_name">38.   保养机油灯复位归零</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0">
                    </li>
                    <li class="item_item upload_img">
                        <input type="file" name="li7_img" id="li7_img" class="file" accept="image/*" hidden>
                    </li>
                </ul>
                <ul class="item clearfix">
                    <li class="item_title">
                        <span class="item_title_text">外观检测</span>
                        <span class="item_title_photo">
                            <i></i>
                            上传照片
                        </span>
                    </li>
                    <li class="item_item">
                        <span class="item_name">39.   左侧车身</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0"><!-- 0正常1不正常-->
                    </li>
                    <li class="item_item">
                        <span class="item_name">40.   右侧车身</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0">
                    </li>
                    <li class="item_item">
                        <span class="item_name">41.   车顶</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0"><!-- 0正常1不正常-->
                    </li>
                    <li class="item_item">
                        <span class="item_name">42.   车前部</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0">
                    </li>
                    <li class="item_item">
                        <span class="item_name">43.   车后部</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" name="" value="0">
                    </li>
                    <li class="item_item upload_img">
                        <input type="file" name="li8_img" id="li8_img" class="file" accept="image/*" hidden>
                    </li>
                </ul>
            </li>
        </ul>

        <ul class="main_title car_service" style="display: none">服务项目</ul>
        <ul class="mod-form-rows base-form clearfix car_service" style="display: none;" id="base-form">
            <li class="row-item" style="width: 100%;border: 1px solid #ddd;">
                <div class="table">
                    <table style="width: 100%;">
                        <thead style="width: 100%;">
                            <tr style="width: 100%;">
                            <th style="width: 10%;">名称</th>
                            <th style="width: 10%;">项目类型</th>
                            <th style="width: 10%;">收费类型</th>
                            <th style="width: 10%;">单价</th>
                            <th style="width: 10%;">数量</th>
                            <th style="width: 10%;">折扣</th>
                            <th style="width: 10%;">金额</th>
                            <th style="width: 10%;">减免</th>
                            <th style="width: 10%;">施工员</th>
                            <th style="width: 10%;">销售员</th>
                            <th style="width: 5%;">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td><span>1</span></td>
                            <td><span>2</span></td>
                            <td><span>3</span></td>
                            <td><span>4</span></td>
                            <td><span>5</span></td>
                            <td><span>6</span></td>
                            <td><span>7</span></td>
                            <td><span>8</span></td>
                            <td><span>9</span></td>
                            <td><span>10</span></td>
                            <td><span><a href="javascript:void(0);" class="ui-btn mrb detail" style="margin: 0;">删除</a></span></td><!--放id-->
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table_add clearfix">
                    <span>
                        质检员:
                        <select name="inspector" id="inspector" class="sel">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </span>
                    <span id="add_working_btn">选择工时</span>
                </div>
                <div class="table_total clearfix">
                    <div class="table_total_l">
                        <span>发票：</span>
                        <span id="change"><i></i></span>
                        <span id="shifou">否</span>
                    </div>
                    <div class="table_total_r">
                        <table>
                            <tr>
                                <td>工时费：  <span>9490.00</span></td>
                                <td>配件费：  <span>65.00</span></td>
                                <td>附加费：	 <span>0.00</span></td>
                                <td>减免：   <span>0.00</span></td>
                                <td>管理费： <span>0.00</span></td>
                                <td>税费：   <span>0.00</span></td>
                                <td>总费用： <span>9555.00</span></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </li>
        </ul>

        <ul class="main_title"></ul>
        <ul class="mod-form-rows base-form clearfix" id="base-form">
            <li class="row-item" style="width: 45% ;">
                <div class="label-wrap"><label for="describe">故障描述:</label></div>
                <div class="ctn-wrap"><textarea value="" class="ui-input normal" name="describe" id="describe" style="width: 85%;height: 100%;"></textarea></div>
            </li>
            <li class="row-item" style="width: 45% ;">
                <div class="label-wrap"><label for="advice">维修建议:</label></div>
                <div class="ctn-wrap"><textarea value="" class="ui-input normal" name="advice" id="advice" style="width: 85%;height: 100%;"></textarea></div>
            </li>
            <li class="row-item" style="width: 45% ;">
                <div class="label-wrap"><label for="report">出车报告:</label></div>
                <div class="ctn-wrap"><textarea value="" class="ui-input normal" name="report" id="report" style="width: 85%;height: 100%;"></textarea></div>
            </li>
            <li class="row-item" style="width: 45% ;">
                <div class="label-wrap"><label for="request">顾客要求:</label></div>
                <div class="ctn-wrap"><textarea value="" class="ui-input normal" name="request" id="request" style="width: 85%;height: 100%;"></textarea></div>
            </li>
            <li class="row-item" style="width: 100% ;">
                <div class="label-wrap"><label for="remarks">备注:</label></div>
                <div class="ctn-wrap"><textarea value="" class="ui-input normal" name="remarks" id="remarks" style="width: 83.1%;height: 100%;"></textarea></div>
            </li>


        </ul>
    </div>


<div id="ldg_lockmask" style="position: fixed; left: 0px; top: 0px; width: 100%; height: 100%; overflow: hidden; z-index: 1977;display: none;"></div>

<!--选择顾客弹框-->
<div id="add" class="add" style="display: none;">
    <div id="add_header" class="clearfix">
        <div id="add_title">添加客户/车辆</div>
        <div id="add_close" class="close_add">&times;</div>
    </div>
    <div id="add_content">
        <ul class="content_main clearfix" style="position: relative;">
            <li style="margin-bottom: 20px"><span>手机号:</span><input type="text" name="userPhone" id="userPhone" style="width: 70%;height: 30px;"  placeholder=" 请输入手机号/客户姓名进行搜索"></li>
            <li style="margin-bottom: 20px"><span>姓名:</span><input type="text" name="userName" id="userName" style="width: 70%;height: 30px;"></li>
            <li>
                <span>车牌号:</span>
                <span style="border: 1px solid #ddd;width: 40px;height: 30px;line-height: 30px;margin-left: -3px;position: relative;"  class="change">
                    <span id="show_province" style="padding-left: 5px">粤</span>
                    <i style="width: 20px;height: 20px;background: url(<?php echo base_url()?>statics/css/img/ssxljt.png) no-repeat;position: absolute;top: 5px;right: 2px;"></i>
                </span>
                <input type="text" name="carNumberLast" id="carNumberLast" style="width: 50%;height: 30px;margin-left: -5px">
            </li>
            <ul class="province clearfix" hidden>
                <li class="province_li">粤</li>
                <li class="province_li">浙</li>
                <li class="province_li">京</li>
                <li class="province_li">沪</li>
                <li class="province_li">苏</li>
                <li class="province_li">津</li>
                <li class="province_li">渝</li>
                <li class="province_li">冀</li>
                <li class="province_li">豫</li>
                <li class="province_li">云</li>
                <li class="province_li">辽</li>
                <li class="province_li">黑</li>
                <li class="province_li">甘</li>
                <li class="province_li">晋</li>
                <li class="province_li">蒙</li>
                <li class="province_li">陕</li>
                <li class="province_li">吉</li>
                <li class="province_li">皖</li>
                <li class="province_li">鲁</li>
                <li class="province_li">新</li>
                <li class="province_li">赣</li>
                <li class="province_li">川</li>
                <li class="province_li">湘</li>
                <li class="province_li">鄂</li>
                <li class="province_li">桂</li>
                <li class="province_li">闽</li>
                <li class="province_li">贵</li>
                <li class="province_li">青</li>
                <li class="province_li">藏</li>
                <li class="province_li">宁</li>
                <li class="province_li">琼</li>
                <li class="province_li">WJ</li>
            </ul>
        </ul>
    </div>
    <div id="add_footer">
        <td colspan="2">
            <div class="ui_buttons">
                <input type="button" id="save" value="确定" class="ui_state_highlight" />
                <input type="button" class="close_add" value="关闭" />
            </div>
        </td>
    </div>
</div>

<!--选择工时弹窗-->
<div id="add_working" class="add" style="display: none;">
    <div id="add_header" class="clearfix">
        <div id="add_title">选择工时</div>
        <div id="add_close" class="close_add">&times;</div>
    </div>
    <div id="add_content">
        <ul class="content_main clearfix" style="position: relative;">
            <li style="margin-bottom: 20px"><span>手机号:</span><input type="text" name="userPhone" id="userPhone" style="width: 70%;height: 30px;"  placeholder=" 请输入手机号/客户姓名进行搜索"></li>
            <li style="margin-bottom: 20px"><span>姓名:</span><input type="text" name="userName" id="userName" style="width: 70%;height: 30px;"></li>

        </ul>
    </div>
    <div id="add_footer">
        <td colspan="2">
            <div class="ui_buttons">
                <input type="button" id="save" value="确定" class="ui_state_highlight" />
                <input type="button" class="close_add" value="关闭" />
            </div>
        </td>
    </div>
</div>

<script>
    $(function () {
        // 弹框
        $('#save').on('click',function () {
            $('#ldg_lockmask').css('display','none');
            $('#add').css('display','none');

            $('#phone').val($('#userPhone').val());
            $('#name').val($('#userName').val());
            $('#number').val($('#show_province').html()+$('#carNumberLast').val());

            $('#userPhone').val('');
            $('#userName').val('');
            $('#carNumberLast').val('');
            $('#show_province').html('粤');
        });
        $('#name,#phone,#number').on('focus',function () {
            $('#ldg_lockmask').css('display','');
            $('#add').css('display','');
        });
        $('.close_add').on('click',function () {
            $('#ldg_lockmask').css('display','none');
            $('#add').css('display','none');
            $('#add_working').css('display','none');
        });

        // 两个切换
        $('.choose').on('click',function () {
            $('.choose').removeClass('ui-btn-sp');
            $(this).addClass('ui-btn-sp');
            if ($(this).html() == '顾客信息') {
                $('.customer_information').css('display','');
                $('.car_information').css('display','none');
                $('.car_photo').css('display','none');
                $('.car_report').css('display','none');
                $('.car_service').css('display','none');
            }else if ($(this).html() == '车辆信息') {
                $('.customer_information').css('display','none');
                $('.car_information').css('display','');
                $('.car_photo').css('display','none');
                $('.car_report').css('display','none');
                $('.car_service').css('display','none');
            }else if ($(this).html() == '实录照片'){
                $('.customer_information').css('display','none');
                $('.car_information').css('display','none');
                $('.car_photo').css('display','');
                $('.car_report').css('display','none');
                $('.car_service').css('display','none');
            }else if ($(this).html() == '车检报告'){
                $('.customer_information').css('display','none');
                $('.car_information').css('display','none');
                $('.car_photo').css('display','none');
                $('.car_report').css('display','');
                $('.car_service').css('display','none');
            }else if ($(this).html() == '服务项目') {
                $('.customer_information').css('display','none');
                $('.car_information').css('display','none');
                $('.car_photo').css('display','none');
                $('.car_report').css('display','none');
                $('.car_service').css('display','');
            }
        });
        $('.choose_inspect').on('click',function () {
            $('.choose_inspect').removeClass('ui-btn-sp');
            $(this).addClass('ui-btn-sp');
            if ($(this).html() == '基础检查'){
                $('.base').css('display','none');
            } else{
                $('.base').css('display','');
            }
        });

        // 正常和不正常
        $('.item_icon').on('click',function () {
            $(this).toggleClass('item_icon_click');
            if ($(this).hasClass('item_icon_click')) {
                $(this).parent().find('input').val(1);
                $(this).parent().find('.item_discribe').html('不正常');
                $(this).parent().find('.item_discribe').addClass('item_discribe_click');
            }else{
                $(this).parent().find('input').val(0);
                $(this).parent().find('.item_discribe').html('正常');
                $(this).parent().find('.item_discribe').removeClass('item_discribe_click');
            }
        });

        // 车检报告上传照片
        window.url_arr = new Array();
        url_arr['li1_img'] = new Array();
        url_arr['li2_img'] = new Array();
        url_arr['li3_img'] = new Array();
        url_arr['li4_img'] = new Array();
        url_arr['li5_img'] = new Array();
        url_arr['li6_img'] = new Array();
        url_arr['li7_img'] = new Array();
        url_arr['li8_img'] = new Array();
        url_arr['li_img'] = new Array();//实录照片
        $('.item_title_photo').on('click',function () {
            var img1 = '<span><img src="';
            var img2 = '" class="show_img"><a href="javascript:void(0);" class="del_img" onclick="delImg(\'';
            var img3 = '\')"></span>';
            var upload_img = $(this).parent().parent().find('.upload_img');
            var upload_file = $(this).parent().parent().find('.upload_img .file');
            var upload_file_name = upload_file.attr('name');
            upload_file.click();
            upload_file.on('change',function () {
                if (this.files[0]){
                    var url = getObjectURL(this.files[0]);
                    url_arr[upload_file_name].push(url);
                    var img = img1 + url + img2 + upload_file_name + "','" + url + img3;
                    upload_img.append(img);
                }
                upload_file.val('');
            })
        });

        // 实录照片上传照片
        $('.upload_image_click').on('click',function () {
            var img1 = '<span class="show_image_span"><img src="';
            var img2 = '" class="show_image"><a href="javascript:void(0);" class="del_img" onclick="delImage(\'';
            var img3 = '\')"></span>';
            $('#li_img').click();
            $('#li_img').on('change',function () {
                if (this.files[0]){
                    var url = getObjectURL(this.files[0]);
                    url_arr['li_img'].push(url);
                    var img = img1 + url + img2 + url + img3;
                    $('.upload_image').append(img);
                }
                $('#li_img').val('');
            })
        });
        // 获取图片路径
        function getObjectURL(file) {
            var url = null ;
            if (window.createObjectURL!=undefined) { // basic
                url = window.createObjectURL(file) ;
            } else if (window.URL!=undefined) { // mozilla(firefox)
                url = window.URL.createObjectURL(file) ;
            } else if (window.webkitURL!=undefined) { // webkit or chrome
                url = window.webkitURL.createObjectURL(file) ;
            }
            return url ;
        }


        // 选择车牌号省份
        $('.change').on('click',function () {
            $('.province').toggle();
        });
        $('.province_li').on('click',function () {
            $('#show_province').html($(this).html());
        });

        //是否有发票
        $('#change').on('click',function () {
            $('#change i').toggleClass('check');
            if ($('#shifou').html() == '是'){
                $('#shifou').html('否');
            } else{
                $('#shifou').html('是');
            }
        });

        //添加选择工时
        $('#add_working_btn').on('click',function () {
            $('#ldg_lockmask').css('display','');
            $('#add_working').css('display','');
        })
    });

    // 车检报告删除照片
    function delImg(upload_file_name,url) {
        url_arr[upload_file_name].splice($.inArray(url,url_arr[upload_file_name]),1);
        var items = $('#'+upload_file_name).parent().find('span');
        $.each(items,function () {
            if ($(this).find('img').attr('src') == url){
                $(this).remove();
                return false;
            }

        })
    }

    // 删除实录照片
    function delImage(url) {
        url_arr['li_img'].splice($.inArray(url,url_arr['li_img']),1);
        var items = $('.show_image_span');
        $.each(items,function () {
            if ($(this).find('img').attr('src') == url){
                $(this).remove();
                return false;
            }

        })
    }
</script>
<script>
    Public.pageTab();
    reportParam();
    function reportParam(){
        $("[tabid^='report']").each(function(){
            var dateParams = "beginDate="+parent.SYSTEM.beginDate+"&endDate="+parent.SYSTEM.endDate;
            var href = this.href;
            href += (this.href.lastIndexOf("?")===-1) ? "?" : "&";
            if($(this).html() === '商品库存余额表'){
                this.href = href + "beginDate="+parent.SYSTEM.startDate+"&endDate="+parent.SYSTEM.endDate;
            }
            else{
                this.href = href + dateParams;
            }
        });
    }

    var goodsCombo = Business.goodsCombo($('#goodsAuto'), {
        extraListHtml: ''
    });
</script>
</body>
</html>