<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top">
        <div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="/admin/index">H for Admin</a>
			<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
				<ul class="cl">
					<li><?= $this->session->userdata('role')?></li>
					<li class="dropDown dropDown_hover"> <a href="#" class="dropDown_A">
                        <a href="#" class="dropDown_A"><?= $this->session->userdata('nickname')?> <i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
                            <li><a href="javascript:;" onClick="myselfinfo()">个人信息</a></li>
                            <li><a class="check_out" href="javascript:;">切换账户</a></li>
                            <li><a class="logout" href="/main/logout">退出</a></li>
						</ul>
					</li>
					<li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
							<li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
							<li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
							<li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
							<li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
							<li><a href="javascript:;" data-val="orange" title="橙色">橙色</a></li>
						</ul>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</header>
<script type="text/javascript">
    document.querySelector(".check_out").onclick = function(){
        layer.confirm('确认要切换用户吗？', {
            btn: ['确认','取消'] //按钮
        }, function(){
            $.ajax({
                url:'/main/check_out',
                type:'post',
                dataType:'json',
                success:function(data){
                    if(data.code==200){
                        layer.msg('切换成功!',{time:1000,icon:6,end:function(){
                                window.location.href=data.data.url
                            }});
                    }
                },
                error:function(){
                    layer.msg('网络错误！',{time:5000,icon:5});
                }
            })
        }, function(){
        });
    }
</script>