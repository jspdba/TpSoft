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
        
    <div class="container-fluid text-center">
        <h2>日本最大ビジネスソフト専門店</h2>
        <p class="lead"> 連絡先：jpsoft777@163.com</p>
    </div>

        
    <div id="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>商品情報</h3>
                <!--分类-->
                <?php if(is_array($topics)): $i = 0; $__LIST__ = $topics;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$it): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Xssxyby/Soft/listByTopic','topic='.$it[id]);?>" class="btn btn-link"><?php echo ($it["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>

                <a href="<?php echo U('Xssxyby/Soft/Index');?>" class="pull-right">更多</a>

            </div>
            <div class="panel-body">
                <div class="row">

                    <?php if(is_array($softs)): $i = 0; $__LIST__ = $softs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$it): $mod = ($i % 2 );++$i;?><div class="col-md-3 col-lg-3">
                            <div class="thumbnail">
                                <img src="/TpSoft/Public/<?php echo ($it["icon"]); ?>" alt="<?php echo ($it["name"]); ?>" >
                                <div class="caption">
                                    <h3>软件名称:<?php echo ($it["name"]); ?></h3>
                                    <p>软件环境:<?php echo ($it["env"]); ?></p>
                                    <p>软件语言:<?php echo ($it["lang"]); ?></p>
                                    <p>软件价格:<?php echo ($it["price"]); ?></p>
                                    <p>提示信息</p>
                                    <p><a href="<?php echo U('/Xssxyby/Soft/Index','id='.$it['id']);?>" class="btn btn-primary" role="button">查看</a>
                                    <a href="<?php echo U('/Xssxyby/Soft/input','id='.$it['id']);?>" class="btn btn-primary" role="button">修改</a>
                                    <a href="<?php echo U('/Xssxyby/Soft/delete','id='.$it['id']);?>" class="btn btn-primary" role="button">删除</a></p>
                                </div>
                            </div>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>

                </div>
                <div class="row">
                    <div class="nav navbar-right"><?php echo ($page); ?></div>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">小提示</div>
            <div class="panel-body">
                <p><?php echo ($tip['content']); ?></p>
            </div>
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