<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<link href="<?php echo $this->config->item('domain_static'); ?>css/bootstrap.min.css" rel="stylesheet">
		<title>bootstrsap_index</title>
	</head>

	<body>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<div class="navbar">
						<div class="navbar-inner">
							<div class="container-fluid">
								<a data-target=".navbar-responsive-collapse" data-toggle="collapse" class="btn btn-navbar"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a>
								<a href="#" class="brand">网站名</a>
								<div class="nav-collapse collapse navbar-responsive-collapse">
									<ul class="nav">
										<li class="active">
											<a href="#">主页</a>
										</li>
										<li>
											<a href="#">链接</a>
										</li>
										<li>
											<a href="#">链接</a>
										</li>
										<li class="dropdown">
											<a data-toggle="dropdown" class="dropdown-toggle" href="#">下拉菜单<strong class="caret"></strong></a>
											<ul class="dropdown-menu">
												<li>
													<a href="#">下拉导航1</a>
												</li>
												<li>
													<a href="#">下拉导航2</a>
												</li>
												<li>
													<a href="#">其他</a>
												</li>
												<li class="divider">
												</li>
												<li class="nav-header">
													标签
												</li>
												<li>
													<a href="#">链接1</a>
												</li>
												<li>
													<a href="#">链接2</a>
												</li>
											</ul>
										</li>
									</ul>
									<ul class="nav pull-right">
										<li>
											<a href="#">右边链接</a>
										</li>
										<li class="divider-vertical">
										</li>
										<li class="dropdown">
											<a data-toggle="dropdown" class="dropdown-toggle" href="#">下拉菜单<strong class="caret"></strong></a>
											<ul class="dropdown-menu">
												<li>
													<a href="#">下拉导航1</a>
												</li>
												<li>
													<a href="#">下拉导航2</a>
												</li>
												<li>
													<a href="#">其他</a>
												</li>
												<li class="divider">
												</li>
												<li>
													<a href="#">链接3</a>
												</li>
											</ul>
										</li>
									</ul>
								</div>

							</div>
						</div>

					</div>
					<div class="carousel slide" id="carousel-120578">
						<ol class="carousel-indicators">
							<li data-slide-to="0" data-target="#carousel-120578">
							</li>
							<li data-slide-to="1" data-target="#carousel-120578">
							</li>
							<li data-slide-to="2" data-target="#carousel-120578" class="active">
							</li>
						</ol>
						<div class="carousel-inner">
							<div class="item">
								<img alt="" src="<?php echo $this->config->item('domain_static'); ?>img/1.jpg" />
								<div class="carousel-caption">
									<h4>
                                棒球
                            </h4>
									<p>
										棒球运动是一种以棒打球为主要特点，集体性、对抗性很强的球类运动项目，在美国、日本尤为盛行。
									</p>
								</div>
							</div>
							<div class="item">
								<img alt="" src="<?php echo $this->config->item('domain_static'); ?>img/2.jpg" />
								<div class="carousel-caption">
									<h4>
                                冲浪
                            </h4>
									<p>
										冲浪是以海浪为动力，利用自身的高超技巧和平衡能力，搏击海浪的一项运动。运动员站立在冲浪板上，或利用腹板、跪板、充气的橡皮垫、划艇、皮艇等驾驭海浪的一项水上运动。
									</p>
								</div>
							</div>
							<div class="item active">
								<img alt="" src="<?php echo $this->config->item('domain_static'); ?>img/3.jpg" />
								<div class="carousel-caption">
									<h4>
                                自行车
                            </h4>
									<p>
										以自行车为工具比赛骑行速度的体育运动。1896年第一届奥林匹克运动会上被列为正式比赛项目。环法赛为最著名的世界自行车锦标赛。
									</p>
								</div>
							</div>
						</div>
						<a data-slide="prev" href="#carousel-120578" class="left carousel-control">‹</a>
						<a data-slide="next" href="#carousel-120578" class="right carousel-control">›</a>
					</div>
					<div class="row-fluid">
						<div class="span2">
							<ul class="nav nav-list">
								<li class="nav-header">
									列表标题
								</li>
								<li class="active">
									<a href="#">首页</a>
								</li>
								<li>
									<a href="#">库</a>
								</li>
								<li>
									<a href="#">应用</a>
								</li>
								<li class="nav-header">
									功能列表
								</li>
								<li>
									<a href="#">资料</a>
								</li>
								<li>
									<a href="#">设置</a>
								</li>
								<li class="divider">
								</li>
								<li>
									<a href="#">帮助</a>
								</li>
							</ul>
						</div>
						<div class="span6">
							<div class="tabbable" id="tabs-613033">
								<ul class="nav nav-tabs">
									<li class="active">
										<a href="#panel-186815" data-toggle="tab">第一部分</a>
									</li>
									<li>
										<a href="#panel-289154" data-toggle="tab">第二部分</a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="panel-186815">
										<p>
											第一部分内容.
										</p>
									</div>
									<div class="tab-pane" id="panel-289154">
										<p>
											第二部分内容.
										</p>
									</div>
								</div>
							</div>
							<div class="media">
								<a href="#" class="pull-left"><img src="<?php echo $this->config->item('domain_static'); ?>img/a_002.jpg" class="media-object" alt='' /></a>
								<div class="media-body">
									<h4 class="media-heading">
                                嵌入媒体标题
                            </h4> 请尽量使用HTML5兼容的视频格式和视频代码实现视频播放, 以达到更好的体验效果.
								</div>
							</div>
							<div class="hero-unit">
								<h1>
                            Hello, world!
                        </h1>
								<p>
									这是一个可视化布局模板, 你可以点击模板里的文字进行修改, 也可以通过点击弹出的编辑框进行富文本修改. 拖动区块能实现排序.
								</p>
								<p>
									<a class="btn btn-primary btn-large" href="#">参看更多 »</a>
								</p>
							</div>
							<div class="pagination pagination-centered pagination-small">
								<ul>
									<li>
										<a href="#">上一页</a>
									</li>
									<li>
										<a href="#">1</a>
									</li>
									<li>
										<a href="#">2</a>
									</li>
									<li>
										<a href="#">3</a>
									</li>
									<li>
										<a href="#">4</a>
									</li>
									<li>
										<a href="#">5</a>
									</li>
									<li>
										<a href="#">下一页</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="span4">
							<div class="alert">
								<button type="button" class="close" data-dismiss="alert">×</button>
								<h4>
                            提示!
                        </h4> <strong>警告!</strong> 请注意你的个人隐私安全.
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
	    <script src="<?php echo $this->config->item('domain_static'); ?>js/jquery-3.3.1.min.js"></script>
	    <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
	    <script src="<?php echo $this->config->item('domain_static'); ?>js/bootstrap.min.js"></script>
	</body>

</html>