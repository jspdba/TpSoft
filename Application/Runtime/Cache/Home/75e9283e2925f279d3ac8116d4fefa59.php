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
        
        

        <?php if(is_array($softs)): $i = 0; $__LIST__ = $softs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$it): $mod = ($i % 2 );++$i;?><div class="row">
                <div class="col-md-4 col-lg-3">
                    <a href="#" class="thumbnail">
                        <img src="/TpSoft/Public/<?php echo ($it['icon']); ?>">
                    </a>
                </div>
                <div class="col-md-8 col-lg-9">
                    <h3>软件名称:<?php echo ($it["name"]); ?></h3>
                    <p>软件语言：<?php echo ($it["lang"]); ?></p>
                    <p>软件环境：<?php echo ($it["env"]); ?></p>
                    <p>软件价格：<?php echo ($it["price"]); ?></p>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
    <div class="row">
        <div class="nav navbar-right"><?php echo ($page); ?></div>
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