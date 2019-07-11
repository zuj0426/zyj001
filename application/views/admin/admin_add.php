<?php $this->load->view('public/_meta');?>
<title>添加管理员 - 管理员管理 - H-ui.admin v3.1</title>
</head>
<body>
<article class="page-container">
	<form action="/admin/add" method="post" class="form form-horizontal" id="form-admin-add" name="form" >
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>账号名：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="username" name="username">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>昵称：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="nickname" name="nickname">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>初始密码：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="password" class="input-text" autocomplete="off" value="" placeholder="密码" id="password" name="password">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>确认密码：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="password" class="input-text" autocomplete="off"  placeholder="确认新密码" id="password2" name="password2">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="tel" name="tel">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">角色：</label>
            <div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
                <select class="select" id="adminRole" name="adminRole" size="1">
                    <?php foreach ($role_arr as $key=>$val){?>
                        <option value="<?= $val['id']?>"><?= $val['names']?></option>
                    <?php }?>
                </select>
                </span> </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">备注：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <textarea id="notes" name="notes" cols="" rows="" class="textarea"  placeholder="说点什么...100个字符以内" dragonfly="true" onKeyUp="$.Huitextarealength(this,100)"></textarea>
                <p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" type="submit" id="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
            </div>
        </div>
	</form>
</article>

<?php $this->load->view('public/_footer');?>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="<?php echo $this->config->item('domain_static'); ?>lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="<?php echo $this->config->item('domain_static'); ?>lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="<?php echo $this->config->item('domain_static'); ?>lib/jquery.validation/1.14.0/messages_zh.js"></script> 
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});

    /* 表单验证，提交 */
    $("#submit").click(function() {
        var username = $('#username').val();
        var nickname = $('#nickname').val();
        var password = $('#password').val();
        var password2 = $('#password2').val();
        var tel = $('#tel').val();
        var adminRole = $('#adminRole').val();
        var notes = $('#notes').val();

        $.ajax({
            type: "POST",
            url: '/admin/add',
            dataType: 'json',
            data: {
                "username": username,
                "nickname": nickname,
                "password": password,
                "password2": password2,
                "tel": tel,
                "adminRole": adminRole,
                "notes": notes,
            },
            success: function(data) {
                // console.log('data',data);
                //popTip(data.msg)
                if (data.success == true) {
                    layer.msg('添加成功!',{icon:1,time:1000});
                } else {
                    layer.msg('error!',{icon:1,time:1000});
                    //popTip(data.msg)
                }
            }
        });
        // var index = parent.layer.getFrameIndex(window.name);
        parent.$('.btn-refresh').click();
        // parent.layer.close(index);
    });
});
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>