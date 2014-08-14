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
    <link href="/tpsoft/Public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!--<link href="../../../../Public/css/starter-template.css" rel="stylesheet">-->
    <link href="/tpsoft/Public/css/index/index.css" rel="stylesheet">
    <link href="/tpsoft/Public/css/index/footer.css" rel="stylesheet">
</head>

<body>
    <!--导航-->
    <nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
            <ul class="nav navbar-nav">
                <li>
                    <a class="navbar-brand" href="#"><img alt="Brand" height="20" src="data:image/png;base64,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"></a>
                </li>
                <li><a href="<?php echo U('Admin/Index/index');?>">首页</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">分类管理<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo U('Admin/Topic/index');?>">展示</a></li>
                        <li><a href="<?php echo U('Admin/Topic/input');?>">增加</a></li>
                        <li><a href="<?php echo U('Admin/Topic/index');?>">删除</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">软件管理<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo U('Admin/Soft/index');?>">展示</a></li>
                        <li><a href="<?php echo U('Admin/Soft/input');?>">增加</a></li>
                        <li><a href="<?php echo U('Admin/Soft/index');?>">删除</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">小贴士管理<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo U('Admin/Tips/index');?>">展示</a></li>
                        <li><a href="<?php echo U('Admin/Tips/input');?>">增加</a></li>
                        <li><a href="<?php echo U('Admin/Tips/index');?>">删除</a></li>
                    </ul>
                </li>
                <!--<li><a href="<?php echo U('Admin/Util/index');?>">导入csv文件</a></li>
                <li><a href="<?php echo U('Admin/Util/getAndInsertTopic');?>">导入topic文件</a></li>
                <li><a href="<?php echo U('Admin/Util/getAndInsertSoft');?>">导入soft文件</a></li>-->
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
                        <?php if(empty($_SESSION['username'])): ?><li><a href="<?php echo U('Admin/Login/checkLogin');?>"><i class="glyphicon glyphicon-ok-sign"></i>登录</a></li>
                        <?php else: ?>
                            <li>
                                <a href="<?php echo U('Admin/Login/logout');?>" tabindex="-1"><i class="glyphicon glyphicon-off"></i>	退出</a>
                            </li><?php endif; ?>
                    </ul>
                </li>
            </ul>
    </div>
</nav>
    <div id="wrap">
        
    <div class="container">
        <?php if(empty($soft)): ?><form class="form-horizontal" role="form" action="/tpsoft/index.php/Admin/Soft/add" enctype="multipart/form-data"  class="form-horizontal"  method="post" role="form">
                <div class="form-group">
                    <label for="name">名称</label>
                    <input type="text" class="form-control" name="name" placeholder="软件名称">
                </div>
                <div class="form-group">
                    <label for="lang">语言</label>
                    <input type="text" class="form-control" name="lang" id="lang" placeholder="软件名称">
                </div>
                <div class="form-group">
                    <label for="env">运行环境</label>
                    <input type="text" class="form-control" name="env" id="env" placeholder="软件连接地址">
                </div>
                <div class="form-group">
                    <label for="price">价格</label>
                    <input type="text" class="form-control" name="price" id="price" placeholder="软件价格">
                </div>
                <div class="form-group">
                    <label for="icon">选择图片</label>
                    <input type='file' name='icon' id="icon">
                </div>
                <!--<select class="form-control" name="cid">
                    <?php if(is_array($topics)): $k = 0; $__LIST__ = $topics;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$it): $mod = ($k % 2 );++$k;?><option value="<?php echo ($it["id"]); ?>"><?php echo ($it["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>-->
                <button type="submit" class="btn btn-default">Submit</button>
                <button type="reset" class="btn btn-default">Reset</button>
            </form>
        <?php else: ?>
            <form role="form" action="<?php echo U('Admin/Soft/update');?>" enctype="multipart/form-data"  class="form-horizontal"  method="post" role="form">
                <input type="hidden" name="id" id="id" value="<?php echo ($soft['id']); ?>">
                <div class="form-group">
                    <label for="name">名称</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="软件名称" value="<?php echo ($soft['name']); ?>">
                </div>
                <div class="form-group">
                    <label for="lang">语言</label>
                    <input type="text" class="form-control" name="lang" id="lang" placeholder="软件名称" value="<?php echo ($soft['lang']); ?>">
                </div>
                <div class="form-group">
                    <label for="env">运行环境</label>
                    <input type="text" class="form-control" name="env" id="env" placeholder="软件连接地址" value="<?php echo ($soft['env']); ?>">
                </div>
                <div class="form-group">
                    <label for="price">价格</label>
                    <input type="text" class="form-control" name="price" id="price" placeholder="软件价格" value="<?php echo ($soft['price']); ?>">
                </div>
                <div class="form-group">
                    <label for="icon">图标</label>
                    <input type='file' name='icon'>
                </div>
                <button type="submit" class="btn btn-default">提交</button>
                <button type="reset" class="btn btn-default">取消</button>
            </form><?php endif; ?>
    </div>
    </div>

    </div>
    <!--footer-->
    <div id="footer">
    <div class="container">
        this is a footer ,you can print something here
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!--<script src="../../../../Public/js/jquery.min.js"></script>-->
<!--<script src="../../../../Public/js/bootstrap.min.js"></script>-->

<script src="/tpsoft/Public/js/jquery.min.js"></script>
<script src="/tpsoft/Public/js/bootstrap.min.js"></script>
</body>
</html>