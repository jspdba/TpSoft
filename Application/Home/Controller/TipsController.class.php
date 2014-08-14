<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-7-24
 * Time: 下午1:40
 */

namespace Home\Controller;

use Think\Controller;

class TipsController extends  Controller {
    public function index(){
        $model=M('Tips');
        $list=$model->select();
        if($list){
            $this->assign("list",$list);
        }
        $this->display();
    }
} 