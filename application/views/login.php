<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>后台登录界面</title>
    <meta name="description" content="particles.js is a lightweight JavaScript library for creating particles.">
    <meta name="author" content="Vincent Garreau" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" media="screen" href="<?php echo $this->config->item('domain_static'); ?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('domain_static'); ?>css/reset.css"/>
</head>
<body>

<div id="particles-js">
    <div class="login">
        <div class="login-top">
            登录
        </div>
        <div class="login-center clearfix">
            <div class="login-center-img"><img src="<?php echo $this->config->item('domain_static'); ?>img/name.png"/></div>
            <div class="login-center-input">
                <input type="text" id="username" name="username" value="" placeholder="请输入您的用户名" onfocus="this.placeholder=''" onblur="this.placeholder='请输入您的用户名'"/>
                <div class="login-center-input-text">用户名</div>
            </div>
        </div>
        <div class="login-center clearfix">
            <div class="login-center-img"><img src="<?php echo $this->config->item('domain_static'); ?>img/password.png"/></div>
            <div class="login-center-input">
                <input type="password" id="pwd" name="pwd"value="" placeholder="请输入您的密码" onfocus="this.placeholder=''" onblur="this.placeholder='请输入您的密码'"/>
                <div class="login-center-input-text">密码</div>
            </div>
        </div>
        <div class="login-button" id="login">
            登录
        </div>
    </div>
    <div class="sk-rotating-plane"></div>
</div>

<!-- scripts -->
<script src="<?php echo $this->config->item('domain_static'); ?>js/jquery-3.3.1.min.js"></script>
<script src="<?php echo $this->config->item('domain_static'); ?>js/particles.min.js"></script>
<script src="<?php echo $this->config->item('domain_static'); ?>js/app.js"></script>
<script type="text/javascript">
    function hasClass(elem, cls) {
        cls = cls || '';
        if (cls.replace(/\s/g, '').length == 0) return false; //当cls没有参数时，返回false
        return new RegExp(' ' + cls + ' ').test(' ' + elem.className + ' ');
    }
    document.querySelector(".login-button").onclick = function(){
        //登陆验证
        $.post('/main/login', {
                'username': $('input[name=username]').val(),
                'pwd': $('input[name=pwd]').val()
            },
            function(data) {
                if (data.code == "200") {
                    // console.log(data);
                    window.location.href = '/admin/index';
                } else {
                    alert(data.msg);
                };
            }, "json");
    }
</script>
</body>
</html>