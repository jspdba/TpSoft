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
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">/TpSoft/index.php/Xssxyby/Soft</div>
            <div class="panel-body">
                <!--<table class="table table-bordered table-condensed">
                    <tr>
                        <th>序号</th><th>软件名称</th><th>软件语言</th><th>软件环境</th><th>软件价格</th><th>图标路径</th><th colspan="2">操作</th>
                    </tr>
                    <?php if(is_array($softs)): $i = 0; $__LIST__ = $softs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$it): $mod = ($i % 2 );++$i;?><tr>
                            <td><?php echo ($i); ?></td>
                            <td><a href="#" target="_blank"><?php echo ($it["name"]); ?></td>
                            <td><a href="#" target="_blank"><?php echo ($it["lang"]); ?></td>
                            <td><a href="#" target="_blank"><?php echo ($it["env"]); ?></td>
                            <td><a href="#" target="_blank"><?php echo ($it["price"]); ?></td>
                            <td><a href="#" target="_blank"><?php echo ($it["icon"]); ?></td>
                            <td><a href="<?php echo U('Xssxyby/Soft/delete?id='.$it['id']);?>"><i class="glyphicon glyphicon-check"></i> 删除</a></td>
                            <td><a href="<?php echo U('Xssxyby/Soft/input?id='.$it['id']);?>"><i class="glyphicon glyphicon-check"></i> 修改</a></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </table>-->
                <div class="row">
                    <?php if(is_array($softs)): $i = 0; $__LIST__ = $softs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$it): $mod = ($i % 2 );++$i;?><div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <!--<img data-src="/TpSoft/Public/<?php echo ($it["icon"]); ?>" alt="/TpSoft/Public/<?php echo ($it["icon"]); ?>">-->
                                <img src="/TpSoft/Public/<?php echo ($it["icon"]); ?>" alt="/TpSoft/Public/<?php echo ($it["icon"]); ?>">
                                <div class="caption">
                                    <h3><?php echo ($it["name"]); ?></h3>
                                    <p>语言：<?php echo ($it["lang"]); ?></p>
                                    <p>环境：<?php echo ($it["env"]); ?></p>
                                    <p>价格：<?php echo ($it["price"]); ?></p>
                                    <p><a href="<?php echo U('Xssxyby/Soft/input?id='.$it['id']);?>" class="btn btn-primary" role="button">修改</a> <a href="<?php echo U('Xssxyby/Soft/delete?id='.$it['id']);?>" class="btn btn-default" role="button">删除</a></p>
                                </div>
                            </div>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
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