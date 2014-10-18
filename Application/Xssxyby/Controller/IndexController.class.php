<?php
namespace Xssxyby\Controller;
//use Think\Controller\AdminController;
header("Content-type: text/html; charset=utf-8");

class IndexController extends XssxybyController {
    public function index(){
//        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>[ 您现在访问的是Home模块的Index控制器 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
        $title = "后台，首页";
        $this -> assign("title",$title);

        $model=M("Soft");
        //按名称搜索
        $name=I("name");
        $where['name']=array('like',"%".$name."%");
        //分页类实现
        $count = $model->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        //更改样式,无效
        #$Page->setConfig('theme',"<li>%FIRST%</li> <li>%UP_PAGE%</li> <li>%LINK_PAGE%</li> <li>%DOWN_PAGE% %END%</li>");
        $Page->setConfig('theme',"<ul class='pagination'></li><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li><li><a> %HEADER%  %NOW_PAGE%/%TOTAL_PAGE% 页</a></ul>");
        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $model->order('createTime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('softs',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出

        $topicModel=M('Topic');
        $topics=$topicModel->select();
        $this->assign('topics',$topics);

        $tips=M("Tips");
        $tip=$tips->order("createTime desc")->find();
        $this->assign("tip",$tip);
        $this->display();
    }

    /**
     * 输出变量的内容，通常用于调试
     *
     * @package Core
     *
     * @param mixed $vars 要输出的变量
     * @param string $label
     * @param boolean $return
     */
    private function dump($vars, $label = '', $return = false){
        if (ini_get('html_errors')) {
            $content = "<pre>\n";
            if ($label != '') {
                $content .= "<strong>{$label} :</strong>\n";
            }
            $content .= htmlspecialchars(print_r($vars, true));
            $content .= "\n</pre>\n";
        } else {
            $content = $label . " :\n" . print_r($vars, true);
        }
        if ($return) { return $content; }
        echo $content;
        return null;
    }
}