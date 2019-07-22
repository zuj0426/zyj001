﻿<?php $this->load->view('public/_meta');?>
<title>管理员列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 管理员列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c"> 日期范围：
		<input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
		<input type="text" class="input-text" style="width:250px" placeholder="输入管理员名称" id="" name="">
		<button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"> <a href="javascript:;" onclick="admin_add('添加管理员','/admin/add','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加管理员</a></span> <span class="r">共有数据：<strong><?php echo count($list);?></strong> 条</span> </div>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="9">管理员列表</th>
			</tr>
			<tr class="text-c">
				<th width="40">ID</th>
				<th width="150">昵称</th>
				<th width="100">手机</th>
				<th width="150">角色</th>
				<th width="130">加入时间</th>
				<th width="100">是否已启用</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
        <?php foreach ($list as $k=>$v){?>
			<tr class="text-c">
				<td><?php echo $v['id']?></td>
				<td><?php echo $v['nickname']?></td>
				<td><?php echo $v['tel']?></td>
				<td><?php echo $v['role']?></td>
				<td><?php echo $v['add_time']?></td>
                <?php if ($v['status']==1){?>
				    <td class="td-status"><span class="label label-success radius">已启用</span></td>
                    <td class="td-manage"><a style="text-decoration:none" onClick="admin_stop(this,<?php echo $v['id']?>)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a> <a title="编辑" href="javascript:;" onclick="admin_edit('管理员编辑','admin-add.html','1','800','500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a title="删除" href="javascript:;" onclick="admin_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
                <?php }else{?>
                    <td class="td-status"><span class="label label-default radius">已禁用</span></td>
                    <td class="td-manage"><a style="text-decoration:none" onClick="admin_start(this,<?php echo $v['id']?>)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe615;</i></a> <a title="编辑" href="javascript:;" onclick="admin_edit('管理员编辑','admin-add.html','1','800','500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a title="删除" href="javascript:;" onclick="admin_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
                <?php }?>
			</tr>
        <?php }?>
		</tbody>
	</table>
</div>
<!--分页样式-->
<!--<nav aria-label="Page navigation">-->
<!--    <ul class="pagination">-->
<!--        <li>-->
<!--            <a href="#" aria-label="Previous">-->
<!--                <span aria-hidden="true">&laquo;</span>-->
<!--            </a>-->
<!--        </li>-->
<!--        <li><a href="#">1</a></li>-->
<!--        <li><a href="#">2</a></li>-->
<!--        <li><a href="#">3</a></li>-->
<!--        <li><a href="#">4</a></li>-->
<!--        <li><a href="#">5</a></li>-->
<!--        <li>-->
<!--            <a href="#" aria-label="Next">-->
<!--                <span aria-hidden="true">&raquo;</span>-->
<!--            </a>-->
<!--        </li>-->
<!--    </ul>-->
<!--</nav>-->
<?php $this->load->view('public/_footer');?>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="<?php echo $this->config->item('domain_static'); ?>lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="<?php echo $this->config->item('domain_static'); ?>lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="<?php echo $this->config->item('domain_static'); ?>lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
/*
	参数解释：
	title	标题
	url		请求的url
	id		需要操作的数据id
	w		弹出层宽度（缺省调默认值）
	h		弹出层高度（缺省调默认值）
*/
/*管理员-增加*/
function admin_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*管理员-删除*/
function admin_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}

/*管理员-编辑*/
function admin_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*管理员-停用*/
function admin_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
        $.ajax({url:"/admin/admin_stop",
            data:{id:id},
            type:'post',
            dataType:'json',
            success:function(data){
                if(data.code==200){
                    $(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_start(this,id)" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">已禁用</span>');
                    $(obj).remove();
                    layer.msg('已停用!',{icon: 5,time:1000});
                }else {
                    layer.msg('禁用失败！',{time:5000,icon:5});
                }
            },
            error:function(){
                layer.msg('网络错误！',{time:5000,icon:5});
        }});
	});
}

/*管理员-启用*/
function admin_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
        $.ajax({url:"/admin/admin_start",
            data:{id:id},
            type:'post',
            dataType:'json',
            success:function(data){
                if(data.code==200){
                    $(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_stop(this,id)" href="javascript:;" title="停用" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
                    $(obj).remove();
                    layer.msg('已启用!', {icon: 6,time:1000});
                }else {
                    layer.msg('启用失败！',{time:5000,icon:5});
                }
            },
            error:function(){
                layer.msg('网络错误！',{time:5000,icon:5});
            }});
	});
}
</script>
</body>
</html>