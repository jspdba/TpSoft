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
        
    <div class="container-fluid text-center">
        <h2>日本最大ビジネスソフト専門店</h2>
        <p class="lead"> 連絡先：jpsoft777@163.com</p>
    </div>

        
    <div id="content">
        <!--<ul class="media-list">
            <?php if(is_array($newest)): $i = 0; $__LIST__ = $newest;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$it): $mod = ($i % 2 );++$i;?><li class="media">
                    <a class="pull-left" href="#">
                        &lt;!&ndash;<img class="media-object" src="/TpSoft/Public/<?php echo ($it["icon"]); ?>" alt="<?php echo ($it["name"]); ?>">&ndash;&gt;
                        <img class="thumbnail" src="/TpSoft/Public/<?php echo ($it["icon"]); ?>" alt="<?php echo ($it["name"]); ?>">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo ($it["name"]); ?></h4>
                        <P><?php echo ($it["lang"]); ?></P>
                        <P><?php echo ($it["env"]); ?></P>
                        <P><?php echo ($it["info"]); ?></P>
                    </div>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>-->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>商品情報</h3>
                <!--分类-->
                <?php if(is_array($topics)): $i = 0; $__LIST__ = $topics;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$it): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Home/Soft/listByTopic','topic='.$it[id]);?>" class="btn btn-link"><?php echo ($it["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>

                <a href="<?php echo U('Home/Soft/Index');?>" class="pull-right"><?php echo L('more');?></a>

            </div>
            <div class="panel-body">
                <div class="row">

                    <?php if(is_array($softs)): $i = 0; $__LIST__ = $softs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$it): $mod = ($i % 2 );++$i;?><div class="col-md-3 col-lg-3">
                            <div class="thumbnail">
                                <a href="<?php echo U('Home/Soft/index','id='.$it['id']);?>"><img src="/TpSoft/Public/<?php echo ($it["icon"]); ?>" alt="<?php echo ($it["name"]); ?>" ></a>
                                <div class="caption">
                                    <h3>ソフトウェアの名称:<?php echo ($it["name"]); ?></h3>
                                    <p><?php echo L('soft_env');?>:<?php echo ($it["env"]); ?></p>
                                    <p><?php echo L('soft_lang');?>:<?php echo ($it["lang"]); ?></p>
                                    <p><?php echo L('soft_price');?>:<?php echo ($it["price"]); ?></p>
                                    <p>类别：<?php echo ($it["tname"]); ?></p>
                                    <p><a href="<?php echo U('Home/Soft/index','id='.$it['id']);?>" class="btn btn-primary" role="button"><?php echo L('look');?></a></p>
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
            <div class="panel-heading"><?php echo L('tips');?></div>
            <div class="panel-body">
                <p><?php echo ($tip['content']); ?></p>
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