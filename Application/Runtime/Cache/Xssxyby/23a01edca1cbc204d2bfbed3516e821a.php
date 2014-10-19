<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="description">
    <meta name="author" content="wcf">

    <!-- <link rel="icon" href="../../favicon.ico">-->

    <title><?php echo ($title); ?></title>

    <!-- Bootstrap core CSS -->
    <!--<link href="../../../../Public/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="/TpSoft/Public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!--<link href="../../../../Public/css/starter-template.css" rel="stylesheet">-->
    <link href="/TpSoft/Public/css/index/index.css" rel="stylesheet">
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
<!--页面内容放这里-->
<div id="wrap">
    <div class="container">
        
        
    <div class="container">

        <?php if(empty($topic)): ?><form role="form" action="<?php echo U('Xssxyby/Topic/add');?>" method="post">
                <input type="hidden" id="id" name="id" >
                <div class="form-group">
                    <label for="name">分类</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="分类名称">
                </div>
                <div class="form-group">
                    <label for="leval">分类级别</label>
                    <input type="number" class="form-control" id="leval" name="leval" placeholder="分类级别">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        <?php else: ?>
            <form role="form" action="<?php echo U('Xssxyby/Topic/update');?>" method="post">
                <input type="hidden" id="id" name="id" value="<?php echo ($topic['id']); ?>" >
                <div class="form-group">
                    <label for="name">分类</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="分类名称" value="<?php echo ($topic['name']); ?>">
                </div>
                <div class="form-group">
                    <label for="leval">分类级别</label>
                    <input type="number" class="form-control" id="leval" name="leval" placeholder="分类级别" value="<?php echo ($topic['leval']); ?>">
                </div>
                <?php echo ($topic['level']); ?>
                <button type="submit" class="btn btn-default">Submit</button>
            </form><?php endif; ?>
    </div>
    </div>

    </div><!-- /.container -->
</div> <!--wrap,end-->
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
<script src="/TpSoft/Public/js/totop.js"></script>
</body>
</html>