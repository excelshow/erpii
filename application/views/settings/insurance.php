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
    .grid-wrap{
        background-color: #fff;
        border: 1px solid #ddd;
        height: 800px;
        width: 100%;
        overflow: auto;
        position: relative;
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
        border-right: 1px solid #e2e2e2;
        border-bottom: 1px solid #e2e2e2;
        border-top: 1px solid #fff;
        border-left: 1px solid #fff;
        width: 100px;
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
    .detail{
        background: #78cd51;
        border-color: #78cd51;
        color: #fff;
        font-weight: bold;
    }
    .detail:hover{
        background: #78cd51;
        color: #fff;
        font-weight: bold;
    }
    #add{
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
    #add>#add_header{
        background-color: #f5f5f5;
        height: 32px;
        width: 100%;
        border-radius: 3px;
    }
    #add>#add_header>#add_title{
        float: left;
        height: 32px;
        line-height: 32px;
        font-size: 14px;
        font-weight: 700;
        margin-left: 10px;
    }
    #add>#add_header>#add_close{
        float: right;
        height: 32px;
        line-height: 32px;
        color: #aaa;
        font-size: 18px;
        width: 20px;
        cursor: pointer;
    }
    #add>#add_content{
        width: 100%;
        height: 435px;
        box-sizing: border-box;
        padding: 25px;
    }
    #add>#add_content>.content_title{
        height: 18px;
        width: 100%;
        border-bottom: 1px solid #ccc;
    }
    #add>#add_content>.content_main{
        width: 100%;
        box-sizing: border-box;
        padding: 20px 0;
    }
    #add>#add_content>.content_main:first-child{
        height: 50%;
    }
    #add>#add_content>.content_main:last-child{
        height: 20%;
    }
    #add>#add_content>.content_main>li{
        width: 50%;
        float: left;
        margin-bottom: 5px;
    }
    #add>#add_content>.content_main>li>span{
        display: inline-block;
        width: 70px;
        height: 30px;
    }
    #add>#add_content>.content_main>li>input{
        width: 140px;
        height: 24px;
        border: 1px solid #ddd;
    }
    #add_footer{
        position: absolute;
        width: 770px;
        height: 33px;
        bottom: 0;
        right: 0;
    }

    #sel{
        width: 200px;
        height: 30px;
        border: 1px solid #ddd;
    }

</style>
</head>
<body>
<div class="wrapper">
    <div class="mod-search cf">
        <div class="fl">
            <ul class="ul-inline">
                <li>
                    <span id="catorage"></span>
                </li>
                <li>
<!--                    <input type="text" id="matchCon" class="ui-input ui-input-ph matchCon" value="输入客户编号/ 名称/ 联系人/ 电话查询" style="width: 280px;">-->
                    <select id="sel">
                        <option value="1" selected>一周</option>
                        <option value="2">二周</option>
                        <option value="3">三周</option>
                        <option value="4">四周</option>
                    </select>
                </li>
                <li><a class="ui-btn mrb" id="edit">确定修改</a></li>
            </ul>
        </div>
        <!--        <div class="fl">-->
        <!--            <a tabTxt="会员列表" parentOpen="true" rel="pageTab" href="--><?php //echo site_url('settings/customer')?><!--" class="ui-btn ui-btn-sp mrb">会员列表</a>-->
        <!--            <a tabTxt="车辆列表" parentOpen="true" rel="pageTab" href="--><?php //echo site_url('settings/customer_car')?><!--" class="ui-btn ui-btn-sp mrb">车辆列表</a>-->
        <!--        </div>-->
        	    <div class="fr">
                    <a href="javascript:void(0);" class="ui-btn ui-btn-sp mrb notice_message">提醒信息</a>
                </div>
    </div>
    <div class="grid-wrap">
        <div class="table">
            <table style="width: 100%;">
                <thead>
                <tr>
                    <th>车牌号</th>
                    <th>车型</th>
                    <th>客户姓名</th>
                    <th>电话</th>
                    <th>保险公司</th>
                    <th>下次保险</th>
                    <th>所属门店</th>
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

<div id="ldg_lockmask" style="position: fixed; left: 0px; top: 0px; width: 100%; height: 100%; overflow: hidden; z-index: 1977;display: none;"></div>
<div id="add" style="display: none;">
    <div id="add_header" class="clearfix">
        <div id="add_title">微信提醒</div>
        <div id="add_close" class="close_add">&times;</div>
    </div>
    <div id="add_content">
        <ul class="content_title"><h3>提醒信息</h3></ul>
        <ul class="content_main clearfix" style="width: 100%;">
            <li style="width: 100%;"><span style="float: left">提醒内容:</span><textarea style="width: 80%;float:left;height: 100px;" id="message">grewhg</textarea></li>
        </ul>
        <div>&nbsp;</div>
        <ul class="content_title"><h3>提醒预览</h3></ul>
        <ul class="content_main clearfix" style="width: 100%;">
            <li style="width: 100%;">
                <span style="float: left">提醒预览:</span>
                <ul style="font-size: 18px">
                    <li style="color: #578ccd;" id="show_message">grewhg</li>
                    <li style="color: #ff6600;margin-left: 70px">会员姓名：***</li>
                    <li style="color: #ff6600;margin-left: 70px">车牌号码：浙A*****</li>
                    <li style="color: #ff6600;margin-left: 70px">到期时间：****年**月**日 **:**</li>
                </ul>
            </li>
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
        $('.notice_message').on('click',function () {
            $('#ldg_lockmask').css('display','');
            $('#add').css('display','');
            $('#type').val('add');
        });
        $('.close_add').on('click',function () {
            $('#ldg_lockmask').css('display','none');
            $('#add').css('display','none');
        });

        $('#message').on('input',function () {
            var val = $('#message').val();
            $('#show_message').html(val);
        });

        //修改提示语句
        $('#save').on('click',function () {
            var notice = $('#message').val();
            $('#ldg_lockmask').css('display','none');
            $('#add').css('display','none');
            $.ajax({

            });
        });

        //选择提醒时间进行筛选
        $('#sel').on('change',function () {
            var time = $('#sel').val();
            $.ajax({
                url:'',
                data:{time:time},
                datatype:"json",
                method:"post",
                success:function (data) {
                    location.reload();
                }
            })
        });
        //修改提醒时间
        $('#edit').on('click',function () {
            var time = $('#sel').val();
            $.ajax({
                url:'',
                data:{time:time},
                datatype:"json",
                method:"post",
                success:function (data) {
                    location.reload();
                }
            })
        });
    });

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


 