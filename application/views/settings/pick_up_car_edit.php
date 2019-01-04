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
    .add>.add_header{
        background-color: #f5f5f5;
        height: 32px;
        width: 100%;
        border-radius: 3px;
    }
    .add>.add_header>.add_title{
        float: left;
        height: 32px;
        line-height: 32px;
        font-size: 14px;
        font-weight: 700;
        margin-left: 10px;
    }
    .add>.add_header>.add_close{
        float: right;
        height: 32px;
        line-height: 32px;
        color: #aaa;
        font-size: 18px;
        width: 20px;
        cursor: pointer;
    }
    .add>.add_content{
        width: 100%;
        height: 435px;
        box-sizing: border-box;
        padding: 25px;
    }
    .add>.add_content>.content_title{
        height: 18px;
        width: 100%;
        border-bottom: 1px solid #ccc;
    }
    .add>.add_content>.content_main{
        width: 100%;
        box-sizing: border-box;
        padding: 20px 0;
    }
    .add>.add_content>.content_main:first-child{
        height: 50%;
    }
    .add>.add_content>.content_main:last-child{
        height: 20%;
    }
    .add>.add_content>.content_main>li{
        width: 50%;
        float: left;
        margin-bottom: 5px;
    }
    .add>.add_content>.content_main>li>span{
        display: inline-block;
        width: 70px;
        height: 30px;
    }
    .add>.add_content>.content_main>li>input{
        width: 140px;
        height: 24px;
        border: 1px solid #ddd;
    }
    .add>.add_content>.content_main>li>span>select{
        border: none;
        width: 100%;
        height: 100%;
    }
    .add>.add_content>.content_main>li>.sel{
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
    .tankuang{
        padding: 0;
        height: 90%;
    }
    #page{
        position: absolute;
        bottom: 0;
        width: 100%;
        background-color: #f1f1f1;
        line-height: 30px;
    }
    #page>div{
        float: left;
        width: 33.333%;
        text-align: center;
    }
    #page>div:first-child{
        width: 25%;
    }
    #page>div:nth-child(2){
        width: 40%;
    }
    #page>div:last-child{
        text-align: right;
    }
    .page_center>div{
        float: left;
        margin-left: 10px;
    }
    .page_center>div:first-child{
        background-image: url(<?php echo base_url()?>statics/css/img/ui-icons_20150410.png);
        background-repeat: no-repeat;
        background-position: -48px 0px;
        width: 16px;
        height: 16px;
        margin-top: 8px;
    }
    .page_center>div:nth-child(2){
        background-image: url(<?php echo base_url()?>statics/css/img/ui-icons_20150410.png);
        background-repeat: no-repeat;
        background-position: -16px 0px;
        width: 16px;
        height: 16px;
        margin-top: 8px;
    }
    .page_center>div:nth-child(3){
        width: 42px;
        height: 18px;
    }
    .page_center>div:nth-child(3)>input{
        width: 100%;
        height: 100%;
    }
    .page_center>div:nth-child(5){
        background-image: url(<?php echo base_url()?>statics/css/img/ui-icons_20150410.png);
        background-repeat: no-repeat;
        background-position: 0px 0px;
        width: 16px;
        height: 16px;
        margin-top: 8px;
    }
    .page_center>div:nth-child(6){
        background-image: url(<?php echo base_url()?>statics/css/img/ui-icons_20150410.png);
        background-repeat: no-repeat;
        background-position: -32px 0px;
        width: 16px;
        height: 16px;
        margin-top: 8px;
    }
    .row-item >.label-wrap{
        width:80px;
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
        width: 100%;
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

    /*选择工时弹窗*/
    .add>.add_content .add_content_title{
        background-color: #f1f1f1;
        height: 30px;
        width: 100%;
        text-align: center;
        line-height: 30px;
        font-size: 18px;
    }
    .add>.add_content .add_content_ul{
        height: 355px;
        overflow-y: auto;
    }
    .add>.add_content .add_content_li{
        height: 30px;
        width: 100%;
        line-height: 30px;
        text-align: center;
        border-bottom: 1px solid #f1f1f1;
    }
    .add>.add_content .add_content_li:hover{
        background-color: #f8ff94;
    }
    .add>.add_content .add_content_l{
        height: 100%;
        width: 25%;
        border: 1px solid #ddd;
        float: left;
        border-right: none;
    }
    .add>.add_content .add_content_l .add_content_ul .add_content_li span{
        display: inline-block;
        width: 48%;
    }
    .add>.add_content .add_content_l .add_content_ul .add_content_li span:last-child{
        text-align: right;
        font-size: 18px;
    }
    .add>.add_content .add_content_c{
        height: 100%;
        width: 45%;
        border: 1px solid #ddd;
        float: left;
    }
    .add>.add_content .add_content_c .add_content_title li{
        width: 48%;
        display: inline-block;
    }
    .add>.add_content .add_content_c .add_content_ul .add_content_li span{
        display: inline-block;
        width: 48%;
    }
    .add>.add_content .add_content_r{
        height: 100%;
        width: 25%;
        border: 1px solid #ddd;
        float: right;
    }
    .add>.add_content .add_content_r .add_content_ul .add_content_li span{
        display: inline-block;
        width: 48%;
    }
    .add>.add_content .add_content_r .add_content_ul .add_content_li .delete{
        height: 20px;
        background: url(<?php echo base_url()?>statics/css/img/delete.gif) no-repeat;
        background-position:center bottom;
    }

    /*配件按钮*/
    .table table tbody .name>span{
        width: 47%;
    }
    .table table tbody .name>.parts{
        width: 70px;
        height: 25px;
        line-height: 25px;
        border-radius: 20px;
        border: 1px solid #578ccd;
        background-color: #578ccd;
        color: #fff;
        transition: all .3s linear;
        cursor: pointer;
        margin-bottom: -3px;
    }
    .table table tbody .name>.parts>.parts_logo{
        display: inline-block;
        width: 25px;
        height: 25px;
        border-radius: 20px;
        background-color: #99b6d9;
        float: left;
        margin-left: 2px;
        font-size: 18px;
        transition: all .3s linear;
    }
    .table table tbody .name>.parts>.parts_text{
        font-size: 15px;
        font-weight: bold;
    }
    .table table tbody .name>.parts:hover{
        background-color: #dc0000;
        border-color: #dc0000;
    }
    .table table tbody .name>.parts:hover>.parts_logo{
        color: #dc0000;
        background-color: #fff;
    }

    /*配件弹框*/
    #add_parts .add_content .parts_l{
        float: left;
        height: 100%;
        width: 69%;
        border: 1px solid #f1f1f1;
        overflow-y: auto;
    }
    #add_parts .add_content .parts_l table{
        /*height: 99.99%;*/
        width: 99.99%;
    }
    #add_parts .add_content .parts_l table thead tr{
        /*width: 453px;*/
        width: 100%;
        height: 40px;
        background-color: #ddd;
        /*position: fixed;*/
        /*top: 57px;*/
    }
    #add_parts .add_content .parts_l table tbody tr:hover{
        background-color: #f8ff94;
    }
    #add_parts .add_content .parts_l table tbody tr td{
        width: 11.111%;
        height: 30px;
        border: none;
        border-bottom: 1px solid #f1f1f1;
        border-right: 1px solid #f1f1f1;
    }
    #add_parts .add_content .parts_r{
        float: right;
        height: 100%;
        width: 30%;
        border: 1px solid #f1f1f1;
        overflow-y: auto;
    }
    .add_parts_title{
        width: 100%;
        height: 40px;
        line-height: 40px;
        background-color: #ddd;
        text-align: center;
        font-size: 12px;
        font-weight: bold;
    }
    .parts_r .add_parts_ul .parts_li{
        height: 30px;
        width: 100%;
    }
    .parts_r .add_parts_ul .parts_li span{
        display: inline-block;
        width: 48%;
        height: 30px;
        line-height: 30px;
        float: left;
        text-align: center;
        border-bottom: 1px solid #f1f1f1;
    }
    .parts_r .add_parts_ul .parts_li .del_parts{
        height: 30px;
        background: url(<?php echo base_url()?>statics/css/img/delete.gif) no-repeat;
        background-position:center center;
    }

    /*服务进度*/
    .itemStatus{
        position: fixed;
        width: 100%;
        height: 70px;
        bottom: 0;
        background-color: rgba(210,210,210,.4);
    }
    .itemStatus_div{
        width: 10%;
        height: 30px;
        line-height: 30px;
        margin-top: 16px;
        text-align: center;
        font-size: 16px;
        font-family: "微软雅黑", "宋体","黑体", Arial, simsun, Verdana, Lucida, Helvetica, sans-serif;
    }
    .itemStatus_div:nth-child(2){
        width: 50%;
        text-align: left;
    }
    .itemStatus_div:nth-child(3){
        width: 20%;
    }
    .itemStatus_div:nth-child(4){
        text-align: right;
        font-size: 14px;
    }
    .begin_text{
        display: inline-block;
        height: 28px;
        line-height: 28px;
        text-align: center;
        padding: 0 15px;
        border-radius: 12px;
        border: 1px solid #aab4c8;
        font-size: 14px;
        color: #96aab4;
    }
    .begin:first-child,
    .begin:nth-child(3){
        background-color: #78c800;
        border-color: #78c800;
        color: #fff;
    }
    .begin_icon{
        display: inline-block;
        width: 20px;
        height: 15px;
        background: url(<?php echo base_url()?>statics/css/img/fwjdjt.png) no-repeat;
    }
    .begin:nth-child(2){
        background-position-y: -30px;
    }
    .itemStatus_div:nth-child(3) span{
        display: inline-block;
        height: 30px;
        line-height: 30px;
        padding: 0 20px;
        border-radius: 5px;
        border: 1px solid #000;
        color: #fff;
        cursor: pointer;
        transition: all .3s linear;
    }
    .itemStatus_div:nth-child(3) span:first-child{
        background-color: #578ccd;
        border-color: #578ccd;
    }
    .itemStatus_div:nth-child(3) span:first-child:hover{
        background-color: #df0024;
        border-color: #df0024;
    }
    .itemStatus_div:nth-child(3) span:last-child{
        background-color: #ff6600;
        border-color: #ff6600;
    }
    .itemStatus_div:nth-child(3) span:last-child:hover{
        background-color: #df0024;
        border-color: #df0024;
    }

    /*服务进度,状态3*/
    .changeStatus3 .itemStatus_div:nth-child(2) .begin:nth-child(4){
        background-position-y: -30px;
    }
    .changeStatus3 .itemStatus_div:nth-child(2) .begin:nth-child(5){
        background-color: #78c800;
        border-color: #78c800;
        color: #fff;
    }

    /*服务进度,状态4*/
    .changeStatus4 .itemStatus_div:nth-child(2) .begin:nth-child(4),
    .changeStatus4 .itemStatus_div:nth-child(2) .begin:nth-child(6){
        background-position-y: -30px;
    }
    .changeStatus4 .itemStatus_div:nth-child(2) .begin:nth-child(5),
    .changeStatus4 .itemStatus_div:nth-child(2) .begin:nth-child(7){
        background-color: #78c800;
        border-color: #78c800;
        color: #fff;
    }

    /*服务进度,状态5*/
    .changeStatus5 .itemStatus_div:nth-child(2) .begin:nth-child(4),
    .changeStatus5 .itemStatus_div:nth-child(2) .begin:nth-child(6),
    .changeStatus5 .itemStatus_div:nth-child(2) .begin:nth-child(8){
        background-position-y: -30px;
    }
    .changeStatus5 .itemStatus_div:nth-child(2) .begin:nth-child(5),
    .changeStatus5 .itemStatus_div:nth-child(2) .begin:nth-child(7),
    .changeStatus5 .itemStatus_div:nth-child(2) .begin:nth-child(9){
        background-color: #78c800;
        border-color: #78c800;
        color: #fff;
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
<!--            <li class="row-item">-->
<!--                <div class="label-wrap"><label for="company">工作单位:</label></div>-->
<!--                <div class="ctn-wrap"><input type="text" value="" class="ui-input normal" name="company" id="company"></div>-->
<!--            </li>-->
<!--            <li class="row-item">-->
<!--                <div class="label-wrap"><label for="reception">接待人员:</label></div>-->
<!--                <div class="ctn-wrap">-->
<!--                    <select name="reception" id="reception" class="sel">-->
<!--                        <option value="1" selected>待确定</option>-->
<!--                        <option value="2">已确定</option>-->
<!--                        <option value="3">已取消</option>-->
<!--                    </select>-->
<!--                </div>-->
<!--            </li>-->

            <li class="row-item">
                <div class="label-wrap"><label for="songCarRen">送修人:</label></div>
                <div class="ctn-wrap"><input type="text" value="" class="ui-input normal" name="songCarRen" id="songCarRen"></div>
            </li>
            <li class="row-item">
                <div class="label-wrap"><label for="songCarRenPhone">送修人电话:</label></div>
                <div class="ctn-wrap"><input type="text" value="" class="ui-input normal" name="songCarRenPhone" id="songCarRenPhone"></div>
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
<!--            <li class="row-item">-->
<!--                <div class="label-wrap"><label for="source">客户来源:</label></div>-->
<!--                <div class="ctn-wrap"><input type="text" value="" class="ui-input normal" name="source" id="source"></div>-->
<!--            </li>-->
<!--            <li class="row-item" style="width: 100% ;">-->
<!--                <div class="label-wrap"><label for="address">顾客地址:</label></div>-->
<!--                <div class="ctn-wrap"><textarea value="" class="ui-input normal" name="address" id="address" style="width: 80.5%;height: 100%;"></textarea></div>-->
<!--            </li>-->
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
<!--            <li class="row-item">-->
<!--                <div class="label-wrap"><label for="displacement">排量 :</label></div>-->
<!--                <div class="ctn-wrap clearfix">-->
<!--                    <input type="radio" value="1" class="ui-input normal" name="displacement" id="displacement" checked="checked" style="width: 25%;float:left;margin-top: 8px">-->
<!--                    <span style="float:left;margin-left: -10%">良好</span>-->
<!--                    <input type="radio" value="2" class="ui-input normal" name="displacement" id="displacement" style="width: 25%;float:left;margin-top: 8px">-->
<!--                    <span style="float:left;margin-left: -10%">不正常</span>-->
<!--                </div>-->
<!--            </li>-->
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
                <input type="file" name="li0_img" id="li0_img" accept="image/*" hidden>
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
                <ul class="item clearfix" >
                    <li class="item_title">
                        <span class="item_title_text">发动机部分</span>
                        <span class="item_title_photo">
                            <i></i>
                            上传照片
                        </span>
                    </li>
                    <li class="item_item base">
                        <span class="item_name" >1.   着车检查发动机有无异响</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" class = "checks" name="1" value="0"><!-- 0正常1不正常-->
                    </li>
                    <li class="item_item base">
                        <span class="item_name">2.   检查正时皮带是否老化或磨损（建议每3年或7万公里更换）</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" class = "checks" name="2" value="0">
                    </li>
                    <li class="item_item base">
                        <span class="item_name">3.   检查风扇、空调、助力泵皮带的有无异响、老化、裂纹</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" class = "checks" name="3" value="0">
                    </li>
                    <li class="item_item">
                        <span class="item_name">4.   清洁或更换空气格、空调格</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" class = "checks" name="4" value="0">
                    </li>
                    <li class="item_item base">
                        <span class="item_name">5.   检查气门垫片是否漏油</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" class = "checks" name="5" value="0">
                    </li>
                    <li class="item_item base">
                        <span class="item_name">6.   检查火花塞、点火线圈是否漏电</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" class = "checks" name="6" value="0">
                    </li>
                    <li class="item_item base">
                        <span class="item_name">7.   检查上、下水管有无老化、膨胀、漏水现象</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" class = "checks" name="7" value="0">
                    </li>
                    <li class="item_item base">
                        <span class="item_name">8.   检查碳罐是否堵塞（建议每3年或8万公里更换）</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" class = "checks" name="8" value="0">
                    </li>
                    <li class="item_item base">
                        <span class="item_name">9.   检查节气门是否脏、堵塞</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" class = "checks" name="9" value="0">
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
                        <input type="hidden" class = "checks" name="10" value="0"><!-- 0正常1不正常-->
                    </li>
                    <li class="item_item">
                        <span class="item_name">11.   检查离合器是否有打滑现象</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" class = "checks" name="11" value="0">
                    </li>
                    <li class="item_item">
                        <span class="item_name">12.   检查变速器紧固情况，油平面及有无漏油现象</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" class = "checks" name="12" value="0">
                    </li>
                    <li class="item_item">
                        <span class="item_name">13.   检查悬挂各球头是否松动或胶套漏油现象</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" class = "checks" name="13" value="0">
                    </li>
                    <li class="item_item">
                        <span class="item_name">14.   检查前、后减震器是否漏油或变形</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" class = "checks" name="14" value="0">
                    </li>
                    <li class="item_item">
                        <span class="item_name">15.   检查前、后桥是否碰撞变形</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" class = "checks" name="15" value="0">
                    </li>
                    <li class="item_item">
                        <span class="item_name">16.   检查排气管是否变形或吊胶脱落</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" class = "checks" name="16" value="0">
                    </li>
                    <li class="item_item">
                        <span class="item_name">17.   检查油箱固定螺丝是否紧固</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" class = "checks" name="17" value="0">
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
                        <input type="hidden" class = "checks" name="18" value="0"><!-- 0正常1不正常-->
                    </li>
                    <li class="item_item">
                        <span class="item_name">19.   检查发电机是否供电正常</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" class = "checks" name="19" value="0">
                    </li>
                    <li class="item_item">
                        <span class="item_name">20.   检查内部灯光是否正常、仪表指示灯、室内阅读灯</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" class = "checks" name="20" value="0">
                    </li>
                    <li class="item_item">
                        <span class="item_name">21.   检查外部灯光是否正常、大灯、小灯、前后雾灯、牌照灯、制动灯等</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" class = "checks" name="21" value="0">
                    </li>
                    <li class="item_item">
                        <span class="item_name">22.   检查喇叭是否沙哑、单音等故障</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" class = "checks" name="22" value="0">
                    </li>
                    <li class="item_item">
                        <span class="item_name">23.   检查四门玻璃升降是否正常</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" class = "checks" name="23" value="0">
                    </li>
                    <li class="item_item">
                        <span class="item_name">24.   检查空调温度是否制冷正常</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" class = "checks" name="24" value="0">
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
                        <input type="hidden" class = "checks" name="25" value="0"><!-- 0正常1不正常-->
                    </li>
                    <li class="item_item">
                        <span class="item_name">26.   检查前后轮磨损情况是否需要对调动平衡（建议半年更换1次）</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" class = "checks" name="26" value="0">
                    </li>
                    <li class="item_item">
                        <span class="item_name">27.   清理胎纹石子用袋子装好展示给客户</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" class = "checks" name="27" value="0">
                    </li>
                    <li class="item_item">
                        <span class="item_name">28.   紧固轮胎螺丝</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" class = "checks" name="28" value="0">
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
                        <input type="hidden" class = "checks" name="29" value="0"><!-- 0正常1不正常-->
                    </li>
                    <li class="item_item">
                        <span class="item_name">30.   检查刹车分泵是否卡死或漏油</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" class = "checks" name="30" value="0">
                    </li>
                    <li class="item_item">
                        <span class="item_name">31.   检查手刹工作情况</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" class = "checks" name="31" value="0">
                    </li>
                    <li class="item_item">
                        <span class="item_name">32.   检查刹车皮厚度是否正常</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" class = "checks" name="32" value="0">
                    </li>
                    <li class="item_item">
                        <span class="item_name">33.   检查刹车碟是否平整</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" class = "checks" name="33" value="0">
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
                        <input type="hidden" class = "checks" name="34" value="0"><!-- 0正常1不正常-->
                    </li>
                    <li class="item_item">
                        <span class="item_name">35.   检查或更换方向机油、变速箱油、刹车油（建议2年或4万公里更换）</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" class = "checks" name="35" value="0">
                    </li>
                    <li class="item_item">
                        <span class="item_name">36.   补充或更换雨刮水、防冻液，建议2年或4万公里更换防冻液</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" class = "checks" name="36" value="0">
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
                        <input type="hidden" class = "checks" name="37" value="0"><!-- 0正常1不正常-->
                    </li>
                    <li class="item_item">
                        <span class="item_name">38.   保养机油灯复位归零</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" class = "checks" name="38" value="0">
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
                        <input type="hidden" class = "checks" name="39" value="0"><!-- 0正常1不正常-->
                    </li>
                    <li class="item_item">
                        <span class="item_name">40.   右侧车身</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" class = "checks" name="40" value="0">
                    </li>
                    <li class="item_item">
                        <span class="item_name">41.   车顶</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" class = "checks" name="41" value="0"><!-- 0正常1不正常-->
                    </li>
                    <li class="item_item">
                        <span class="item_name">42.   车前部</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" class = "checks" name="42" value="0">
                    </li>
                    <li class="item_item">
                        <span class="item_name">43.   车后部</span>
                        <span class="item_discribe">正常</span>
                        <span class="item_icon"></span>
                        <input type="hidden" class = "checks" name="43" value="0">
                    </li>
                    <li class="item_item upload_img">
                        <input type="file" name="li8_img" id="li8_img" class="file" accept="image/*" hidden>
                    </li>
                </ul>
            </li>
        </ul>

        <ul class="main_title car_service" style="display: none">服务项目</ul>
        <ul class="mod-form-rows base-form clearfix car_service" style="display: none;" id="base-form">
            <li class="row-item" style="width: 100%;margin-top: 10px">
                <a class="ui-btn ui-btn-sp choose_type">标准工时</a>
                <a class="ui-btn choose_type">VIP套餐</a>
            </li>
            <li class="row-item type_standard" style="width: 100%;border: 1px solid #ddd;">
                <div class="table">
                    <table style="width: 100%;">
                        <thead style="width: 100%;">
                            <tr style="width: 100%;">
                                <th style="width: 20%;">名称</th>
                                <th style="width: 10%;">项目类型</th>
                                <th style="width: 10%;">收费类型</th>
                                <th style="width: 10%;">单价</th>
                                <th style="width: 5%;">数量</th>
                                <th style="width: 10%;">折扣</th>
                                <th style="width: 10%;">金额</th>
                                <th style="width: 5%;">减免</th>
                                <th style="width: 5%;">施工员</th>
                                <th style="width: 10%;">销售员</th>
                                <th style="width: 5%;">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="serviceItem_1">
                                <td class="name">
                                    <span>1</span>
                                    <span class="parts clearfix">
                                        <span class="parts_logo">+</span>
                                        <span class="parts_text">配件</span>
                                    </span>
                                </td>
                                <td><span>2</span></td>
                                <td><span>3</span></td>
                                <td><span>4</span></td>
                                <td><span>5</span></td>
                                <td><span>6</span></td>
                                <td><span>7</span></td>
                                <td><span>8</span></td>
                                <td><span>9</span></td>
                                <td><span>10</span></td>
                                <td><span><a href="javascript:void(0);" class="ui-btn mrb detail" onclick="delItem(1)" style="margin: 0;">删除</a></span></td><!--放id-->
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
                        <table class="table_new">
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
            <li class="row-item type_meal" style="display: none; width: 50%;">
                <div class="label-wrap"><label for="VIPNumber">VIP卡号:</label></div>
                <div class="ctn-wrap"><input type="text" value="" class="ui-input" name="VIPNumber" id="VIPNumber"></div>
            </li>
            <li class="row-item type_meal" style="display: none; width: 50%;text-align: right">
                <a href="javascript:void(0);" class="ui-btn mrb addMeal" style="margin: 0;">添加套餐</a>
            </li>
            <li class="row-item type_meal" style="display: none; width: 100%;">
                <div class="table">
                    <table style="width: 100%;">
                        <thead style="width: 100%;">
                            <tr style="width: 100%;">
                                <th style="width: 25%;">名称</th>
                                <th style="width: 10%;">售价</th>
                                <th style="width: 60%;">套餐内容</th>
                                <th style="width: 5%;">操作</th>
                            </tr>
                        </thead>
                        <tbody id="taocan_all">
                            <tr class="mealItem_2">
                                <td><span>1</span></td>
                                <td><span>3</span></td>
                                <td><span>4</span></td>
                                <td><span><a href="javascript:void(0);" class="ui-btn mrb detail" onclick="delMeal(2)" style="margin: 0;">删除</a></span></td><!--放id-->
                            </tr>
                        </tbody>
                    </table>
                </div>
            </li>
            <input type="hidden" value="" id="taocan_id"> <!--存放套餐ID-->
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

    <!--进度-->
    <input type="hidden" id="itemStatus" value="4"><!--当前状态-->
    <input type="hidden" id="read" value="0"><!--报价是否接受-->
    <input type="hidden" id="orderID" value="0"><!--订单ID-->
    <div class="itemStatus clearfix">
        <div class="itemStatus_div" style="float:left">服务进度：</div>
        <div class="itemStatus_div" style="float:left">
            <span class="begin begin_text">等待报价</span>
            <span class="begin begin_icon"></span>
            <span class="begin begin_text">报价</span>
            <span class="begin begin_icon"></span>
            <span class="begin begin_text">施工</span>
            <span class="begin begin_icon"></span>
            <span class="begin begin_text">完工</span>
            <span class="begin begin_icon"></span>
            <span class="begin begin_text">结算</span>
        </div>
        <div class="itemStatus_div" style="float:right">
            <span id="rework" style="display: none;">返工</span>
            <span id="finish">施工</span>
        </div>
        <div class="itemStatus_div" id="noticeCustomer" style="float:right">
            <span>
                <input type="checkbox" name="notice">
            </span>
            <span>通知车主</a></span>
        </div>
    </div>

<!--弹窗开始-->
    <div id="ldg_lockmask" style="position: fixed; left: 0px; top: 0px; width: 100%; height: 100%; overflow: hidden; z-index: 1977;display: none;"></div>

    <!--选择顾客弹框-->
    <div id="add" class="add" style="display: none;">
        <div class="add_header clearfix">
            <div class="add_title">添加客户/车辆</div>
            <div class="add_close close_add">&times;</div>
        </div>
        <div class="add_content">
            <ul class="content_main clearfix" style="position: relative;">
                <li style="margin-bottom: 20px"><span>手机号:</span><input type="text" name="userPhone" id="userPhone" style="width: 70%;height: 30px;"  placeholder=" 请输入手机号进行搜索" onblur="phone()"></li>

                <li style="margin-bottom: 20px"><span>姓名:</span><input type="text" name="userName" id="userName" style="width: 70%;height: 30px;">
                    <input type="hidden" value="" id="userId">
                </li>
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
        <div class="add_footer">
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
    <div class="add_header clearfix">
        <div class="add_title">选择工时</div>
        <div class="add_close close_add">&times;</div>
    </div>
    <div class="add_content">
        <div class="add_content_l">
            <ul class="add_content_title">类型</ul>
            <ul class="add_content_ul">
                <li class="add_content_li">
                    <span>1</span>
                    <span>&gt;</span>
                </li>
                <li class="add_content_li">
                    <span>1</span>
                    <span>&gt;</span>
                </li>
                <li class="add_content_li">
                    <span>1</span>
                    <span>&gt;</span>
                </li>
                <li class="add_content_li">
                    <span>1</span>
                    <span>&gt;</span>
                </li>
                <li class="add_content_li">
                    <span>1</span>
                    <span>&gt;</span>
                </li>
            </ul>
        </div>
        <div class="add_content_c">
            <ul class="add_content_title">
                <li>名称</li>
                <li>售价</li>
            </ul>
            <ul class="add_content_ul">
                <li class="add_content_li add_content_c_li">
                    <span>1</span>
                    <span>2</span>
                    <input type="hidden" value="1">
                </li>
                <li class="add_content_li add_content_c_li">
                    <span>2</span>
                    <span>2</span>
                    <input type="hidden" value="2">
                </li>
                <li class="add_content_li add_content_c_li">
                    <span>3</span>
                    <span>2</span>
                    <input type="hidden" value="3">
                </li>
                <li class="add_content_li add_content_c_li">
                    <span>4</span>
                    <span>2</span>
                    <input type="hidden" value="4">
                </li>
                <li class="add_content_li add_content_c_li">
                    <span>5</span>
                    <span>2</span>
                    <input type="hidden" value="5">
                </li>
            </ul>
        </div>
        <div class="add_content_r">
            <ul class="add_content_title">已选工时</ul>
            <ul class="add_content_ul"></ul>
        </div>
    </div>
    <div class="add_footer">
        <td colspan="2">
            <div class="ui_buttons">
                <input type="button" id="add_working_val" value="确定" class="ui_state_highlight" />
                <input type="button" class="close_add" value="关闭" />
            </div>
        </td>
    </div>
</div>

    <!--选择配件弹框-->
    <div id="add_parts" class="add" style="display: none;">
        <div class="add_header clearfix">
            <div class="add_title">选择配件</div>
            <div class="add_close close_add">&times;</div>
        </div>
        <div class="add_content clearfix">
            <div class="parts_l">
                <table>
                    <thead>
                        <tr>
                            <th>名称</th>
                            <th>规格/型号</th>
                            <th>品牌</th>
                            <th>编码</th>
                            <th>OEM</th>
                            <th>仓位</th>
                            <th>库存</th>
                            <th>适用车型</th>
                            <th>售价</th>
                        </tr>
                    </thead>
                    <tbody class="parts_main">
                        <tr class="parts_tr">
                            <td class="parts_td">111</td>
                            <td class="parts_td">2</td>
                            <td class="parts_td">3</td>
                            <td class="parts_td">4</td>
                            <td class="parts_td">5</td>
                            <td class="parts_td">6</td>
                            <td class="parts_td">7</td>
                            <td class="parts_td">8</td>
                            <td class="parts_td">9</td>
                            <input type="hidden" value="1">
                        </tr>
                    </tbody>
                    </thead>
                </table>
            </div>
            <div class="parts_r">
                <ul class="add_parts_title">已选工时</ul>
                <ul class="add_parts_ul"></ul>
            </div>
        </div>
        <div class="add_footer">
            <td colspan="2">
                <div class="ui_buttons">
                    <input type="button" id="add_parts_val" value="确定" class="ui_state_highlight" />
                    <input type="button" class="close_add" value="关闭" />
                </div>
            </td>
        </div>
    </div>

    <!--选择套餐弹框-->
    <div id="add_meal" class="add" style="display: none;">
        <div class="add_header clearfix">
            <div class="add_title">选择套餐</div>
            <div class="add_close close_add">&times;</div>
        </div>
        <div class="add_content">
            <div class="mod-search cf">
                <div class="fl">
                    <ul class="ul-inline">
                        <li>
                            <span id="catorage"></span>
                        </li>
                        <li>
                            <input type="text" id="matchCon" class="ui-input ui-input-ph matchCon" value="输入名称" style="width: 280px;">
                        </li>
                        <li><a class="ui-btn mrb" id="search">查询</a></li>
                    </ul>
                </div>
            </div>
            <div class="grid-wrap tankuang">
                <div class="table">
                    <table style="width: 100%;">
                        <thead style="width: 100%;">
                        <tr style="width: 100%;">
                            <th style="width: 5%;">
                                <input type="checkbox" id="all">
                            </th>
                            <th style="width: 15%;">套餐名称</th>
                            <th style="width: 70%;">套餐项目</th>
                            <th style="width: 10%;">金额(元)</th>
                        </tr>
                        </thead>
                        <tbody id="meal_all">
                            <tr>
                                <td class="check" style="width: 5%;">
                                    <input type="checkbox" class="check_child" value="1"><!--放id-->

                                </td>
                                <td><span class="taocan_name">1</span></td>
                                <td><span class="taocan_item">2</span></td>
                                <td><span class="taocan_price">3</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="page">
                    <div class="page_left">&nbsp;</div>
                    <div class="page_center">
                        <div></div>
                        <div></div>
                        <div>
                            <input type="text" value="1">
                        </div>
                        <div>共 1 页</div>
                        <div></div>
                        <div></div>
                        <div>
                            <select name="pages" id="pages">
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                            </select>
                        </div>
                    </div>
                    <div class="page_right">1 -  1 &nbsp;&nbsp; 共  1  条</div>
                </div>
            </div>
        </div>
        <div class="add_footer">
            <td colspan="2">
                <div class="ui_buttons">
                    <input type="button" id="add_meal_btn" value="确定" class="ui_state_highlight" />
                    <input type="button" class="close_add" value="关闭" />
                </div>
            </td>
        </div>
    </div>
<!--弹窗结束-->

</div>
<script>
    function phone(){
        var mobile =$("#userPhone").val();

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('billing/phone');?>",
            data: {
                mobile:mobile,
            },
            dataType: "json",

            success: function (data) {

                if(data.length != 0){
                    $("#userName").val(data.name);
                    $("#userId").val(data.id);
                }else{
                    $("#userName").val("无此账号");
                }

            },
        });
    }
    $("#save_all").click(function () {
        var describe = $("#describe").text(); //故障描述
        var advice = $("#advice").text();   //维修建议
        var report = $("#report").text();  //出车报告
        var request = $("#request").text();  //顾客要求
        var remarks = $("#remarks").text();  //备注
        var  name = $("#name").val();  //客户用户名
        var  phone = $("#phone").val();  //客户电话
        var  number = $("#number").val();  //车牌
        var  songCarRen = $("#songCarRen").val();  //送修人名字
        var  songCarRenPhone = $("#songCarRenPhone").val();  //送修人电话
        var  startTime = $("#startTime").val();  //开工时间
        var  estimateTime = $("#estimateTime").val();  //预计完工时间
        var  endTime = $("#endTime").val();  //完工时间

        var  brand = $("#brand").val();   //品牌
        var  vin = $("#vin").val();  //vin
        var  insureCompany = $("#insureCompany").val();   //交强险保险公司
        var  system = $("#system").val();  //车系
        var  notice = $("#notice").val();  //公告号
        var  insuranceEndTime = $("#insuranceEndTime").val();  //保险到期
        var  shape = $("#shape").val();  //车型年款
        var  lastMileage = $("#lastMileage").val();  //上次里程
        var  annualEndTime = $("#annualEndTime").val();  //年审到期
        var  carShape = $("#carShape").val();   //车型
        var  useMileage = $("#useMileage").val();  //行驶里程
        var  suggestedMaintenanceTime = $("#suggestedMaintenanceTime").val();  //建议保养时间
        var  carName = $("#carName").val();  //车主姓名
        var  engineNumber = $("#engineNumber").val();   //发动机号
        var  suggestedMaintenance = $("#suggestedMaintenance").val(); //建议保养里程
        var  idNumber = $("#idNumber").val();   //身份证号
        var  carColor = $("#carColor").val();  //车辆颜色
        var  carPrice = $("#carPrice").val();  //车辆价格
        var  carAddress = $("#carAddress").val();  //车主地址
        var  registedTime = $("#registedTime").val();   //注册时间
        var  natureUsage = $("#natureUsage").val(); //使用性质
        var  frontWheelType = $("#frontWheelType").val(); //前轮型号
        var  backWheelType = $("#backWheelType").val(); //后轮型号
        var  carType = $("#carType").val();  //车辆类型
        var  transmission = $("#transmission").val();  //变速箱型号
        var  carRmarks = $("#carRmarks").val();  //车辆备注
        var  displacement = $("#displacement").val();  //排量
        var  oilVolume = $("#oilVolume").val();  //油量

        var image = new FormData();

        //实录照片
        $.each(url_arr['li0_img'],function ($key,$val) {
            image.append('li0_img'+$key,$val);
        });
        //发动机部分照片
        $.each(url_arr['li1_img'],function ($key,$val) {
            image.append('li1_img'+$key,$val);
        });
        //底盘部分照片
        $.each(url_arr['li2_img'],function ($key,$val) {
            image.append('li2_img'+$key,$val);
        });
        //电气设备照片
        $.each(url_arr['li3_img'],function ($key,$val) {
            image.append('li3_img'+$key,$val);
        });
        //轮胎部分照片
        $.each(url_arr['li4_img'],function ($key,$val) {
            image.append('li4_img'+$key,$val);
        });
        //刹车系统照片
        $.each(url_arr['li5_img'],function ($key,$val) {
            image.append('li5_img'+$key,$val);
        });
        //油水部分照片
        $.each(url_arr['li6_img'],function ($key,$val) {
            image.append('li6_img'+$key,$val);
        });
        //电脑检测照片
        $.each(url_arr['li7_img'],function ($key,$val) {
            image.append('li7_img'+$key,$val);
        });
        //外观检测照片
        $.each(url_arr['li8_img'],function ($key,$val) {
            image.append('li8_img'+$key,$val);
        });
        image.append('number',number);

        var checks = new Array();

        $(".checks").each(function($key,$val){
            checks.push($val.value);
        });
        image.append('checks',checks);
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('billing/start');?>",
            traditional: false,
            dataType: "json",
            processData :false,
            contentType :false,
            data:image,

            success: function (data) {
                console.log(data);

            },
        });

    });

    $('#save').click(function () {
        var  car_number = $("#number").val();
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('billing/car');?>",
            data: {
                car_number:car_number,
            },
            dataType: "json",

            success: function (data) {

                if(data.length != 0){
                    $("#brand").val(data.brand);
                    $("#vin").val(data.vin);
                    $("#insureCompany").find("option[value = "+data.compulsoryCompany +"]").attr("selected",true);
                    $("#system").val(data.system);
                    $("#notice").val(data.notice);
                    $("#insuranceEndTime").val(data.compulsoryTime);
                    $("#shape").val(data.annual);
                    $("#annualEndTime").val(data.review);
                    $("#carShape").val(data.shape);
                    $("#carName").val(data.username);
                    $("#engineNumber").val(data.engine);
                    $("#idNumber").val(data.people_id);
                    $("#carColor").val(data.color);
                    $("#carPrice").val(data.price);
                    $("#carAddress").val(data.address);
                    $("#registedTime").val(data.registration);
                    $("#frontWheelType").val(data.front);
                    $("#backWheelType").val(data.rear);
                    $("#carType").find("option[value = "+data.type +"]").attr("selected",true);
                    $("#transmission").val(data.transmission);
                    $("#displacement").val(data.displacement);
                    $("#natureUsage").find("option[value = "+data.nature +"]").attr("selected",true);
                }

            },
        });
    });



</script>
<script>
    $(function () {
        // 弹框
        $('#save').on('click',function () {
            $('#ldg_lockmask').css('display','none');
            $('#add').css('display','none');
            if($('#userName').val() == "无此账号"){
                $('#phone').val("");
                $('#name').val("");
                $('#number').val("");
            }else{
                $('#phone').val($('#userPhone').val());
                $('#name').val($('#userName').val());
                $('#number').val($('#show_province').html()+$('#carNumberLast').val());
            }


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
            $('#add_parts').css('display','none');
            $('#add_meal').css('display','none');
        });

        // 切换
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
        $('.choose_type').on('click',function () {
            $('.choose_type').removeClass('ui-btn-sp');
            $(this).addClass('ui-btn-sp');
            if ($(this).html() == '标准工时'){
                $('.type_standard').css('display','');
                $('.type_meal').css('display','none');
            } else{
                $('.type_standard').css('display','none');
                $('.type_meal').css('display','');
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
        url_arr['li0_img'] = new Array();//实录照片
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
                    url_arr[upload_file_name].push(this.files[0]);
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
            $('#li0_img').click();
            $('#li0_img').on('change',function () {
                if (this.files[0]){
                    var url = getObjectURL(this.files[0]);
                    url_arr['li0_img'].push(this.files[0]);
                    var img = img1 + url + img2 + url + img3;
                    $('.upload_image').append(img);
                }
                $('#li0_img').val('');
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

        //添加选择工时弹框
        $('#add_working_btn').on('click',function () {
            $('#ldg_lockmask').css('display','');
            $('#add_working').css('display','');
        });

        //添加工时，选中工时
        $('.add_content_c_li').on('click',function () {
            var val = $(this).find('span:first-child').html();
            var id = $(this).find('input').val();
            var str1 = '<li class="add_content_li add_content_r_li add_content_r_li_';
            var str2 = '"><span>';
            var str3 = '</span><span class="delete" onclick="delLi(';
            var str4 = ')"></span><input type="hidden" value="';
            var str5 = '"> </li>';
            var str = str1 + id + str2 + val + str3 + id + str4 + id + str5;
            $('.add_content_r .add_content_ul').append(str);
        });

        //添加工时，添加工时
        $('#add_working_val').on('click',function () {
            $('#ldg_lockmask').css('display','none');
            $('#add_working').css('display','none');
            var input = $('.add_content_r_li input');
            var arr = new Array();
            $.each(input,function () {
                arr.push($(this).val());
            });
            $('.add_content_r_li').remove();
            // $.ajax({
            //
            // });
        });

        //添加选择配件弹框
        $('.parts').on('click',function () {
            $('#ldg_lockmask').css('display','');
            $('#add_parts').css('display','');
        });

        //添加配件，选中配件
        $('.parts_tr').on('click',function () {
            var id = $(this).find('input').val();
            var name = $(this).find('td:first-child').html();
            var str = '';
            var str1 = '<li onclick="delParts(';
            var str2 = ')" class="parts_li parts_tr_';
            var str3 = '"><span>';
            var str4 = '</span><span class="del_parts"></span><input type="hidden" value="';
            var str5 = '"></li>';
            str = str1 + id + str2 + id + str3 + name + str4 + id + str5;
            $('.add_parts_ul').append(str);
        });

        //添加配件,添加配件
        $('#add_parts_val').on('click',function () {
            $('#ldg_lockmask').css('display','none');
            $('#add_parts').css('display','none');
            var input = $('.parts_li input');
            var arr = new Array();
            $.each(input,function () {
                arr.push($(this).val());
            });
            // $.ajax({
            //
            // });
            $('.parts_li').remove();
        });

        //添加套餐
        $('.addMeal').on('click',function () {
            var vipNumber = $('#VIPNumber').val();
            $.ajax({
               url: "",
               data: {},
               type: "",
               datatype: "",
               success: function (data) {
                   var str1 = '<tr><td class="check" style="width: 5%;"><input type="checkbox" class="check_child" value="';
                   var str2 = '"></td><td><span class="taocan_name">';
                   var str3 = '</span></td><td><span class="taocan_item">';
                   var str4 = '</span></td><td><span class="taocan_price">';
                   var str5 = '</span></td></tr>';
                   var str = '';
                   $.each(data,function () {
                       str += str1 + this.id + str2 + this.name + str3 + this.item + str4 + this.price + str5;
                   });
                   $('#meal_all').append(str);
               } ,
                error:function () {

                }
            });
            $('#ldg_lockmask').css('display','');
            $('#add_meal').css('display','');
        });

        //添加套餐，单选框
        $('#all').on('click',function () {
            var thisChecked = $(this).prop('checked');
            $('.check_child').prop('checked',thisChecked);

        });
        $('.check_child').on('click',function(){
            var totalNum =  $('.check_child').length;
            var checkedNum =  $('.check_child:checked').length;
            $('#all').prop('checked',totalNum==checkedNum);
        });

        //添加套餐，添加套餐
        $('#add_meal_btn').on('click',function () {
            var checkitems = new Array();
            var checkvalues = new Array();
            $.each($('.check_child:checked'),function(){
                var biaoji = $(this);
                var num = 0;
                if ($('.biaoji').val() != null) {
                    $.each($('.biaoji'),function () {
                        if ($(this).val() == biaoji.val()){
                            num = num + 1;
                        }
                    });
                    if (num <= 0){
                        checkitems.push($(this).val());
                        var value1 = '<tr class="mealItem_';
                        var value2 = '"><input type="hidden" class="biaoji" value="';
                        var value3 = '"><td><span>'
                        var value4 = '</span></td>\n' +
                            '                    <td><span>';
                        var value5 = '</span></td>\n' +
                            '                    <td><span><a href="javascript:void(0);" onclick="delMeal(';
                        var value6 = ')" class="ui-btn mrb detail" style="margin:0">删除</a></span></td>\n' +
                            '                </tr>';
                        var value = value1 + biaoji.val() + value2 + biaoji.val() + value3 + biaoji.parent().parent().find('.taocan_name').html() + value4 + biaoji.parent().parent().find('.taocan_price').html() +  value4 + biaoji.parent().parent().find('.taocan_item').html() + value5 + biaoji.val() + value6;

                        checkvalues.push(value);
                    }
                }else{
                    checkitems.push($(this).val());
                    var value1 = '<tr class="mealItem_';
                    var value2 = '"><input type="hidden" class="biaoji" value="';
                    var value3 = '"><td ><span>'
                    var value4 = '</span></td>\n' +
                        '                    <td><span>';
                    var value5 = '</span></td>\n' +
                        '                    <td><span><a href="javascript:void(0);" onclick="delMeal(';
                    var value6 = ')" class="ui-btn mrb detail" style="margin:0">删除</a></span></td>\n' +
                        '                </tr>';
                    var value = value1 + $(this).val() + value2 + $(this).val() + value3 + $(this).parent().parent().find('.taocan_name').html() + value4 + $(this).parent().parent().find('.taocan_price').html() +  value4 + $(this).parent().parent().find('.taocan_item').html() + value5 + $(this).val() + value6;

                    checkvalues.push(value);
                }

            });
            if (checkitems != ''){
                $('#taocan_id').val(checkitems);
                $.each(checkvalues, function (key,value) {
                    $('#taocan_all').append(value);
                });
                $('#ldg_lockmask').css('display','none');
                $('#add_meal').css('display','none');
            }else{
                $('#ldg_lockmask').css('display','none');
                $('#add_meal').css('display','none');
            }
        });

        //读取状态
        var itemStatus = $('#itemStatus').val();
        var read = $('#read').val();
        var url = '';
        if (itemStatus == '2'){
            if (read == '0'){
                $('#finish').html('再次通知');
                $('#noticeCustomer').css('display','none');
            }
        } else if (itemStatus == '3') {
            $('.itemStatus').addClass('changeStatus3');
            $('#finish').html('完工');
        } else if (itemStatus == '4') {
            $('.itemStatus').addClass('changeStatus4');
            $('#finish').html('结算');
            $('#rework').css('display','');
        } else if (itemStatus == '5') {
            $('.itemStatus').addClass('changeStatus5');
            $('#finish').css('display','none');
            $('#noticeCustomer').css('display','none');
        };

        //改变状态
        $('#finish').on('click',function () {
            if (itemStatus == '2'){
                if (read == '0'){
                    type = 1;
                } else{
                    type = 2;
                }
            } else if (itemStatus == '3'){
                type = 3;
            } else if (itemStatus == '4'){
                type = 4;
            }
            changeStatus(type)
        });
        $('#rework').on('click',function () {
            changeStatus(5)
        });
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
        url_arr['li0_img'].splice($.inArray(url,url_arr['li0_img']),1);
        var items = $('.show_image_span');
        $.each(items,function () {
            if ($(this).find('img').attr('src') == url){
                $(this).remove();
                return false;
            }

        })
    }

    // 删除已选工时
    function delLi(id) {
        $('.add_content_r_li_' + id).remove();
    }

    //删除已选配件
    function delParts(id) {
        $('.parts_tr_' + id).remove();
    }

    //删除以显示服务项目
    function delItem(id) {
        $('.serviceItem_' + id).remove();
    }

    //删除以显示套餐
    function delMeal(id) {
        $('.mealItem_' + id).remove();
    }

    //提交改变状态
    function changeStatus(type) {
        //type:1再次通知确认|2施工|3完工|4结算|5返工
        
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