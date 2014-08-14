<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-7-24
 * Time: 下午1:40
 */

namespace Admin\Controller;

class TipsController extends  AdminController {
    public function index(){
        $model=M('Tips');
        $list=$model->select();
        if($list){
            $this->assign("tips",$list);
        }
        $this->assign("title","分类展示");
        $this->display();
    }
    public function input(){
        $id=I('id');
        if($id){
            $tips=M('Tips');
            $result=$tips->find($id);
            if($result){
                $this->assign("tips",$result);
                dump($result);
            }
        }
        $this->display();
    }
    public function update(){
        if (IS_POST){
            $Topic = M('Tips');
            $Topic->create();
            $Topic->save();
            $this->success('保存完成',U('Admin/Tips/index'));
        }else{
            $this->error('非法请求',U('Admin/Tips/index'));
        }
    }
    public function add(){
        //		$entity=M('Soft','think_','DB_CONFIG');
        $entity=M('Tips');
        if($entity->create($_POST,1)){
            if($result=$entity->add()){
                $this->success('新增成功', U('Tips/index'));
            }
        }else{
            $this->error('新增失败,'.$entity->getDbError(),true);
        }
    }
    public function delete(){
        $entity=M('Tips');
        $id=I("id");
        if($ct=$entity->delete($id)){
            $this->success('删除成功!'.'删除'.$ct.'条', U('Topic/index'));
        }
        $this->error('删除失败'.$entity->getDbError(),U('Topic/index'));
    }
} 