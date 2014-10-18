<?php
$langArray=array(
    'LANG_SWITCH_ON' => true, // 开启语言包功能
     'LANG_AUTO_DETECT' => false, // 自动侦测语言 开启多语言功能后有效
    'DEFAULT_LANG'=>'ja-jp',
    'LANG_LIST' => 'zh-cn,en-us,ja-jp', // 允许切换的语言列表 用逗号分隔
    'VAR_LANGUAGE' => 'l', // 默认语言切换变量
);
return array_merge(include './Conf/config.php',$langArray);
?>