<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>登录</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>statics/h5/css/style.css">
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/androidviewport.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>statics/h5/js/common.js"></script>
    <script src="<?php echo base_url()?>statics/h5/js/placeholder.js"></script>
    <script>
        adaptUILayout.adapt(720);
    </script>
    <meta name="viewport" content="target-densitydpi=device-dpi, width=720px, user-scalable=no">
</head>
<style>
    /*.title{*/
        /*width: 100%;*/
        /*height: 100px;*/
    /*}*/
    .price{
        width: 100%;
        height: 150px;
        font-size: 80px;
    }
    .price{
        width: 100%;
        height: 100%;
        line-height: 150px;
        text-align: center;
        color: #ff6c00;
    }
    .button{
        width: 90%;
        margin: 0 auto;
        text-align: center;
    }
    .button input{
        width: 100%;
        height: 100px;
        margin-top: 50px;
        border: 1px solid #000;
        outline: none;
        border-radius: 20px;
        font-size: 45px;
        color: #fff;
    }
    .button input:first-child{
        border-color: #3acdc5;
        background-color: #3acdc5;
    }
    .button input:last-child{
        border-color: #f05050;
        background-color: #f05050;
    }
</style>
<body>
    <div class="title">
        <ul class="sytime">
            服务报价
        </ul>
    </div>
    <div class="price"><span>￥<?php echo $actual_total ?></span></div>
    <div class="button">
        <input type="hidden" id="id" value="<?php echo $id ?>">
        <input type="hidden" id="uid" value="<?php echo $uid ?>">

        <input type="button" class = "check" value="同意">
        <input type="button" class = "check" value="拒绝">
    </div>

</body>
<script>
    $(".check").click(function () {
        var id = $("#id").val();
        var uid = $("#uid").val();
        if($(this).val() == "同意"){
            var code = 1;
        }else{
            var code = 2;
        }
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('login/sure');?>",
            traditional: false,
            dataType: "json",

            data:{
                code:code,
                id:id,
                uid:uid,
            },

            success: function (data) {
                if(data.code == 2){
                    parent.Public.tips({
                        type:1,
                        content:data.text,
                    });
                }else if(data.code == 1){
                    parent.Public.tips({
                        content:data.text,

                    });
                }

            },
        });
    });

</script>
</html>