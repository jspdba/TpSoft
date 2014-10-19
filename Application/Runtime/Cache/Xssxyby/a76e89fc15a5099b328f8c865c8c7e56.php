<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="description">
    <meta name="author" content="wcf">

    <!-- <link rel="icon" href="../../favicon.ico">-->

    

    <!-- Bootstrap core CSS -->
    <!--<link href="../../../../Public/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="/TpSoft/Public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!--<link href="../../../../Public/css/starter-template.css" rel="stylesheet">-->
    <link href="/TpSoft/Public/css/index/footer.css" rel="stylesheet">
</head>
<body>
    <!--导航-->
    <nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo U('Xssxyby/Index/index');?>">首页</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">分类管理<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo U('Xssxyby/Topic/index');?>">展示</a></li>
                        <li><a href="<?php echo U('Xssxyby/Topic/input');?>">增加</a></li>
                        <li><a href="<?php echo U('Xssxyby/Topic/index');?>">删除</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">软件管理<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo U('Xssxyby/Soft/index');?>">展示</a></li>
                        <li><a href="<?php echo U('Xssxyby/Soft/input');?>">增加</a></li>
                        <li><a href="<?php echo U('Xssxyby/Soft/index');?>">删除</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">小贴士管理<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo U('Xssxyby/Tips/index');?>">展示</a></li>
                        <li><a href="<?php echo U('Xssxyby/Tips/input');?>">增加</a></li>
                        <li><a href="<?php echo U('Xssxyby/Tips/index');?>">删除</a></li>
                    </ul>
                </li>

                <li class="col-md-4 col-lg-3 clearfix">
                    <div class="navbar-form">
                        <form id="search" action="<?php echo U('Xssxyby/Soft/search');?>" method="post">
                            <div class="input-group">
                                <input name="name" class="form-control" type="text" placeholder="软件搜索" style="width: 100px">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" onclick="document.getElementById('search').submit();">Go!</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </li>
                <!--<li><a href="<?php echo U('Xssxyby/Util/index');?>">导入csv文件</a></li>
                <li><a href="<?php echo U('Xssxyby/Util/getAndInsertTopic');?>">导入topic文件</a></li>
                <li><a href="<?php echo U('Xssxyby/Util/getAndInsertSoft');?>">导入soft文件</a></li>-->
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" role="button" href="#"><i class="glyphicon glyphicon-user"></i> <?php echo (session('username')); ?> <i class="caret"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <!--<li>
                            <a href="#" tabindex="-1"><i class="glyphicon glyphicon-cog"></i>设置</a>
                        </li>-->
                        <!--<li class="divider"></li>-->
                        <?php if(empty($_SESSION['username'])): ?><li><a href="<?php echo U('Xssxyby/Login/checkLogin');?>"><i class="glyphicon glyphicon-ok-sign"></i>登录</a></li>
                        <?php else: ?>
                            <li>
                                <a href="<?php echo U('Xssxyby/Login/logout');?>" tabindex="-1"><i class="glyphicon glyphicon-off"></i>	退出</a>
                            </li><?php endif; ?>
                    </ul>
                </li>
            </ul>
    </div>
</nav>

	<div class="container" id="wrap">
		<div class="row col-md-6 col-sm-offset-3 login">
				<form class="form-horizontal" action="<?php echo U('Login/checkLogin','','');?>" role="form" method="post">
					<div class="form-group">
						<label for="username" class="col-sm-2 control-label">用户名:</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="username" name="username" placeholder="用户名" />
						</div>
					</div>

					<div class="form-group">
						<label for="password" class="col-sm-2 control-label">密 &nbsp; &nbsp;码:</label>
						<div class="col-sm-7">
							<input type="password" class="form-control" id="password" name="password" placeholder="密码" />
							
						</div>				
					</div>
					<!-- 验证码部分 -->
					<!-- <div class="form-group">
						<label for="code" class="col-sm-2 control-label">验证码:</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="code" name="code" placeholder="验证码" />
							
						</div>				
					</div> -->					

					<!-- <div class="form-group">
						<label for="code" class="col-sm-2 control-label"></label>
						<div class="col-sm-7">
							<img src="<?php echo U('Login/verify','','');?>" onclick="javascript:this.src=this.src+'?time='+Math.random()" />						
						</div>				
					</div> -->

					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-7">
							<button type="submit" class="btn btn-primary btn-login">登陆</button>
						</div>
						
					</div>

				</form>	
		</div>
	</div>

    <!--footer-->
    <div id="footer">
    <a href="javascript:void(0);" class="backtop" style="display: inline;"></a>
    <div class="container">
        页脚内容，版权信息
    </div>
</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--<script src="../../../../Public/js/jquery.min.js"></script>-->
    <!--<script src="../../../../Public/js/bootstrap.min.js"></script>-->

    <script src="/TpSoft/Public/js/jquery.min.js"></script>
    <script src="/TpSoft/Public/js/bootstrap.min.js"></script>
</body>
</html>