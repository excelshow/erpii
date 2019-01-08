<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>选择工时</title>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/jquery-1.8.2.min.js"></script>
    <link media="all" href="<?php echo base_url()?>statics/h5/css/index.css" type="text/css" rel="stylesheet">
    <link media="all" href="<?php echo base_url()?>statics/h5/css/style.css" type="text/css" rel="stylesheet">
    <link media="all" href="<?php echo base_url()?>statics/h5/css/simple.css" type="text/css" rel="stylesheet">
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
    <div class="mask" style="display: block; background: rgb(245, 245, 245);">
        <div id="selectworking">
            <div style="position: fixed; width: 720px; z-index: 100;">
                <div class="title">
                    <a href="javascript:void(0);" class="back" itemid="1">返回</a>
                    <a href="javascript:void(0);" class="sure" id="addservice">确定(<em id="num">0</em>)</a>
                    <ul class="sytime">
                        选择工时项目
                    </ul>
                </div>
                <div class="search">
                    <input type="text" id="WorkingSearch" class="phoneinput" value="">
                </div>
            </div>
            <div style="padding-top: 190px;"></div>
            <div class="item_title">
                <dl>
                    <dt>已选项目：</dt>
                    <dd id="hasAdd">

                    </dd>
                </dl>
            </div>
            <div id="nosearchworking">
                <?php foreach ($data as $k=>$v) :?>
                <div class="item">
                    <h2 itemid="<?php echo $v->id ?>">
                        <a href="javascript:void(0);" class="">
                            <?php echo $v->name ?>
                        </a>
                    </h2>
                    <div name="workinglistinfo" style="display: none;">
<!--                       <div class="item_list">-->
<!--                           <ul>-->
<!--                               <a href="javascript:void(0);" class="itemxz">-->
<!--                                   <em>50.00</em>更换刹车片-->
<!--                               </a>-->
<!--                           </ul>-->
<!--                       </div>-->
                    </div>
                </div>
                <?php endforeach ;?>
            </div>
            <div class="loading2" style="display: none;">
                <img src="<?php echo base_url()?>statics/h5/images/loading2.gif" width="32" height="32">加载中，请稍后...
            </div>
            <div id="searchworking">
            </div>
        </div>
    </div>

    <script>
        var num = 0;
        // 搜索
        $('#WorkingSearch').on('input',function () {
            var keyword = $('#WorkingSearch').val();
            $('.loading2').css('display','');
            if (keyword == ''){
                $('#searchworking').html('');
                $.ajax({
                    type:'post',
                    url:'customer_info',
                    data:{
                        type:'serveList'
                    },
                    dataType:'json',
                    success:function (data) {
                        if (data != ''){
                            var str = '';
                            var str1 = '<div class="item"><h2 itemid="';
                            var str2 = '"><a href="javascript:void(0);" class="">';
                            var str3 = '</h2><div name="workinglistinfo" style="display:none;"></div></div>';
                            $.each(data,function ($k,$v) {
                                str += str1 + $v.id + str2 + $v.name + str3;
                            });
                            $('#nosearchworking').html(str);
                        }
                        $('.loading2').css('display','none');
                    },
                    error:function () {
                        console.log('失败了')
                    }
                });
            }else{
                $('#nosearchworking').html('');
                $.ajax({
                    type:'post',
                    url:'customer_info',
                    data:{
                        keyword:keyword,
                        type:'searchService'
                    },
                    dataType:'json',
                    success:function (data) {
                        if (data != ''){
                            var str = '';
                            var str1 = '<div class="item_list"><ul><a href="javascript:void(0);" class=""><em>';
                            var str2 = '</em><input type="hidden" class="serviceId" value="';
                            var str3 = '"><input type="hidden" class="price" value="';
                            var str4 = '"><input type="hidden" class="vipPrice" value="';
                            var str5 = '"><input type="hidden" class="name" value="';
                            var str6 = '">';
                            var str7 = '</a></ul></div>';
                            var items = $('#hasAdd').find('font');
                            var degree = 0;
                            $.each(data,function ($k,$v) {
                                degree = 0;
                                $.each(items,function () {
                                    if ($v.id == $(this).attr('serviceid')){
                                        degree++;
                                    }
                                });
                                if (degree <= 0){
                                    str += str1 + $v.price + str2 + $v.id +str3 + $v.price + str4 + $v.vip_price + str5 + $v.name + str6 + $v.name + str7;
                                } else{
                                    str += '<div class="item_list"><ul><a href="javascript:void(0);" class="itemxz"><em>' + $v.price + str2 + $v.id +str3 + $v.price + str4 + $v.vip_price + str5 + $v.name + str6 + $v.name + str7;
                                }
                            });
                            $('#searchworking').html(str);
                        }
                        $('.loading2').css('display','none');
                    },
                    error:function () {
                        console.log('失败了')
                    }
                });
            }

        });
        // 点击
        $('#nosearchworking').on('click','.item',function () {
            var serveId = $(this).find('h2').attr('itemid');
            var a = $(this).find('h2 a');
            var that = $(this);
            a.toggleClass('zd');
            if (a.hasClass('zd')){
                $(this).find('div').css('display','');
            }else{
                $(this).find('div').css('display','none');
            }
            if (a.hasClass('zd') && !that.find('div[name = "workinglistinfo"]>div').html()) {
                $.ajax({
                    type:'post',
                    url:'customer_info',
                    data:{type:'serviceList',serveId:serveId},
                    dataType:'JSON',
                    success:function (data) {
                        var str = '';
                        var str1 = '<div class="item_list"><ul><a href="javascript:void(0);" class=""><em>';
                        var str2 = '</em><input type="hidden" class="serviceId" value="';
                        var str3 = '"><input type="hidden" class="price" value="';
                        var str4 = '"><input type="hidden" class="vipPrice" value="';
                        var str5 = '"><input type="hidden" class="name" value="';
                        var str6 = '">';
                        var str7 = '</a></ul></div>';
                        var items = $('#hasAdd').find('font');
                        var degree = 0;
                        $.each(data,function ($k,$v) {
                            degree = 0;
                            $.each(items,function () {
                                if ($v.id == $(this).attr('serviceid')){
                                    degree++;
                                }
                            });
                            if (degree <= 0){
                                str += str1 + $v.price + str2 + $v.id +str3 + $v.price + str4 + $v.vip_price + str5 + $v.name + str6 + $v.name + str7;
                            } else{
                                str += '<div class="item_list"><ul><a href="javascript:void(0);" class="itemxz"><em>' + $v.price + str2 + $v.id +str3 + $v.price + str4 + $v.vip_price + str5 + $v.name + str6 + $v.name + str7;
                            }
                        });
                        that.find('div[name = "workinglistinfo"]').html(str);
                    },
                    error:function () {
                        console.log('失败了');
                    }
                })
            }
        });
        $('#nosearchworking').on('click','.item_list',function () {
            var str = '';
            var serviceId = $(this).find('.serviceId').val();
            var price = $(this).find('.price').val();
            var vipPrice = $(this).find('.vipPrice').val();
            var name = $(this).find('.name').val();
            $(this).find('a').toggleClass('itemxz');
            if ($(this).find('a').hasClass('itemxz')){
                str = '<font serviceId="' + serviceId + '" price = "' + price + '" vipPrice="' + vipPrice + '">' + name + '</font>';
                $('#hasAdd').append(str);
                num++;
            }else{
                $('font[serviceId="' + serviceId + '"]').remove();
                num--;
            }
            $('#num').html(num);
            return false;
        });

        $('#searchworking').on('click','.item_list',function () {
            var str = '';
            var serviceId = $(this).find('.serviceId').val();
            var price = $(this).find('.price').val();
            var vipPrice = $(this).find('.vipPrice').val();
            var name = $(this).find('.name').val();
            $(this).find('a').toggleClass('itemxz');
            if ($(this).find('a').hasClass('itemxz')){
                str = '<font serviceId="' + serviceId + '" price = "' + price + '" vipPrice="' + vipPrice + '">' + name + '</font>';
                $('#hasAdd').append(str);
                num++;
            }else{
                $('font[serviceId="' + serviceId + '"]').remove();
                num--;
            }
            $('#num').html(num);
            event.stopPropagation();
        })
    </script>
</body>
</html>