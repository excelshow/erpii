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
<body>
    <div class="loginbg system" style="min-height: 1280px;">
        <div class="login_logo">
            <img alt="" src="<?php echo base_url()?>statics/h5/images/login/logo.png">
        </div>
        <div class="login">
            <div class="login_baibg">&nbsp;</div>
            <div class="login_aa">
                <input type="text" name="" id="username" class="username" value="用户名">
                <input type="password" name="" id="password" class="password" value="*请输入密码">
            </div>
        </div>
        <div class="login_btn"><a href="javascript:void(0);" id="btn_login">登录</a></div>
    </div>

    <script type="text/javascript">
        // 显示placeholder
        $(function () {
            $('#username').placeholder({
                word: '用户名'
            });

            $('#password').placeholder({
                word: '*请输入密码'
            });

            $("#password").keypress(function (e) {
                if (e.which == 13) {
                    $("#btn_login").click();
                }
            });
        });

        // 校验数据
        function getFormVals() {
            var username = $.trim($("#username").val()).replace("用户名", "");
            var password = $.trim($("#password").val()).replace("*请输入密码", "");
            if (username == '') {
                Ewewo.Tips('*请输入用户名!');
                return;
            }
            if (password == '') {
                Ewewo.Tips('*请输入密码!');
                return;
            }
            return { username: username, userpwd: password, token: "<?php echo token()?>" };
        }

        $('#btn_login').click(function () {
            var temp = getFormVals();
            if (temp == undefined && temp == null) {
                return;
            }
            $.ajax({
                type: "POST",
                url: "login",
                data: temp,
                dataType: "json",
                success: function (data) {
                    if (data.code == 4){
                        Ewewo.Tips_Success(data.msg);
                        setTimeout(function () {
                            window.location.href = 'index';
                        },1100);
                    } else{
                        Ewewo.Tips(data.msg);
                        setTimeout(function () {
                            location.reload();
                        },1100)
                    }

                }
            });
        });
    </script>
</body>
</html>