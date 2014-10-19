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
<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
        <!--<div class="collapse navbar-collapse">-->
        <ul class="nav navbar-nav col-lg-9">
            <li ><a href="<?php echo U('Home/Index/index');?>">トップ</a></li>
            <li ><a href="<?php echo U('Home/Soft/index');?>">すべての商品</a></li>
            <li class="col-lg-3 clearfix">
                <div class="navbar-form">
                    <form id="search" action="<?php echo U('Home/Soft/search');?>" method="post">
                        <div class="input-group">
                            <input name="name" class="form-control" type="text" placeholder="商品検索">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" onclick="document.getElementById('search').submit();">Go!</button>
                                </span>
                        </div>
                    </form>
                </div>
            </li>
        </ul>
        <!--</div>&lt;!&ndash; /.navbar-collapse &ndash;&gt;-->
    </div>
</div>
<!--页面内容放这里-->
<div id="wrap">
    <div class="container">
        
        
    <div class="container">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">
                <h3>商品情報</h3>
                <!--分类-->
                <?php if(is_array($topics)): $i = 0; $__LIST__ = $topics;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$it): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Home/Soft/listByTopic','topic='.$it[id]);?>" class="btn btn-link <?php echo ($it['id']==$topicId? 'active':''); ?>"><?php echo ($it["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
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
                                    <p>软件描述：<?php echo ($it["info"]); ?></p>
                                    <p>类别：<?php echo ($tp["name"]); ?></p>
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
<!--<div id="footer">
    <div class="container">
        this is a footer ,you can print something here
    </div>
</div>-->
<!--<footer>
    <p class="pull-right"><a href="#">Back to top</a></p>
    <p>© 2013 Company, Inc. · <a href="#">Privacy</a> · <a href="#">Terms</a></p>
</footer>-->

<div class="container marketing">
    <a href="javascript:void(0);" class="backtop" style="display: inline;"></a>
    <hr class="featurette-divider">
    <!-- FOOTER -->
    <footer>
        <p>© 2013 Company, Inc. · <a href="#">wcf</a> · <a href="#">Terms</a></p>
    </footer>
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