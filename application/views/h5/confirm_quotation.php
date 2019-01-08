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
    <div class="price"><span>￥100</span></div>
    <div class="button">
        <input type="button" value="确认">
        <input type="button" value="拒绝">
    </div>

</body>
</html>