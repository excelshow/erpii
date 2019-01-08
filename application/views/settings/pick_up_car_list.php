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

        height: 33px;
        line-height: 33px;

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
	          <input type="text" id="matchCon" class="ui-input ui-input-ph matchCon" value="输入客户编号/ 名称/ 联系人/ 电话查询" style="width: 280px;">
	        </li>
	        <li><a class="ui-btn mrb" id="search">查询</a></li>
	      </ul>
	    </div>
	    <div class="fr">
            <a href="javascript:void(0);" class="ui-btn ui-btn-sp mrb" id="btn-batchDel">取消</a>
        </div>
	  </div>
    <div class="grid-wrap">
        <div class="table">
            <table style="width: 100%;">
                <thead style="width: 100%;">
                    <tr style="width: 100%;">
                        <th style="width: 3%;">
                            <input type="checkbox" id="all">
                        </th>
                        <th style="width: 7%;">服务单号</th>
                        <th style="width: 7%;">车牌号</th>
                        <th style="width: 5%;">客户名称</th>
                        <th style="width: 5%;">客户微信</th>
                        <th style="width: 7%;">电话</th>
                        <th style="width: 7%;">开始时间</th>
                        <th style="width: 5%;">项目类型</th>
                        <th style="width: 5%;">送修人</th>
                        <th style="width: 7%;">送修电话</th>
                        <th style="width: 5%;">接待人员</th>
                        <th style="width: 5%;">总金额</th>
                        <th style="width: 5%;">目前进度</th>
                        <th style="width: 7%;">结算时间</th>
                        <th style="width: 5%;">操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($data) :?>
                        <?php foreach ($data as $k=>$v) :?>
                        <tr>
                            <td class="check">
                                <input type="checkbox" class="check_child" value="<?php echo $v->id ?>"><!--放id-->
                            </td>
                            <td><span><?php echo $v->uid ?></span></td>
                            <td><span><?php echo $v->number ?></span></td>
                            <td><span><?php echo $v->name ?></span></td>
                            <td><span><?php echo $v->wechat ?></span></td>
                            <td><span><?php echo $v->phone ?></span></td>
                            <td><span><?php echo date('Y-m-d H:i',$v->startTime) ?></span></td>
                            <?php if($v->service == 1) :?>
                                <td><span>正常服务</span></td>
                            <?php elseif($v->service == 2) :?>
                                <td><span>保险</span></td>
                            <?php elseif($v->service == 3) :?>
                                <td><span>返工</span></td>
                            <?php elseif($v->service == 4) :?>
                                <td><span>索赔</span></td>
                            <?php endif;?>
                            <td><span><?php echo $v->songCarRen ?></span></td>
                            <td><span><?php echo $v->songCarRenPhone ?></span></td>
                            <td><span>接待人员</span></td>
                            <td><span><?php echo $v->actual_total ?></span></td>
                            <?php if($v->schedule == 1) :?>
                                <td><span>客户确认报价中</span></td>
                            <?php elseif($v->schedule == 2) :?>
                                <td><span>准备施工</span></td>
                            <?php elseif($v->schedule == 3) :?>
                                <td><span>施工中</span></td>
                            <?php elseif($v->schedule == 4) :?>
                                <td><span>已完成，待结算</span></td>
                            <?php elseif($v->schedule == 5) :?>
                                <td><span>已结算</span></td>
                            <?php elseif($v->schedule == 6) :?>
                                <td><span>客户拒绝报价</span></td>
                            <?php endif;?>
                            <td><span><?php echo date('Y-m-d H:i',$v->balance_time) ?></span></td>
                            <td><span><a tabTxt="服务记录详情" parentOpen="true" rel="pageTab" href="<?php echo site_url("billing/billingdetail?id=$v->id")?>" class="ui-btn mrb detail">查看</a></span></td><!--放id-->
                        </tr>
                        <?php endforeach;?>
                    <?php else: ?>
                        <tr>
                            <td colspan="10">暂无记录</td>
                        </tr>
                    <?php endif ;?>

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
<script>
    $(function () {
        // 单选框
        $('#all').on('click',function () {
            var thisChecked = $(this).prop('checked');
            $('.check_child').prop('checked',thisChecked);

        });

        $('.check_child').on('click',function(){
            var totalNum =  $('.check_child').length;
            var checkedNum =  $('.check_child:checked').length;
            $('#all').prop('checked',totalNum==checkedNum);
        });
        
        $('#btn-batchDel').on('click',function () {
            var checkitems = new Array();
            $.each($('.check_child:checked'),function(){
                checkitems.push($(this).val());
            });
            if (checkitems != ''){
                $.ajax({
                    url: "",
                    type: "POST",
                    data:{id:checkitems},
                    dataType: "JSON",
                    success:function (res) {
                        if (res == 1){
                            parent.Public.tips({
                                content:'删除成功！'
                            });
                        } else{
                            parent.Public.tips({
                                type:1,
                                content:'删除失败！'
                            });
                        }

                    },
                    error:function () {
                        parent.Public.tips({
                            type:1,
                            content:'出错啦！'
                        });
                    }
                })
            } else{
                parent.Public.tips({
                    type:2,
                    content:'未选择要删除的项！'
                });
            }
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

 