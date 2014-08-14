<?php
namespace Admin\Controller;
header("Content-type: text/html; charset=utf-8");
class SoftController extends AdminController
{
	/*
	public function index(){
		$entity=M('Soft','think_','DB_CONFIG');
		#$list=$entity->select();
		$list=$entity->field("id,name,url,cid")->select();
		if($list){
			$this->assign("list",$list);
		}
		$this->display();
	}
	*/
    //改成分页的？最后改
	public function index(){
        $m=M("Soft");
        $list=$m->select();
        if($list){
            $this->assign("softs",$list);
        }
		$this->display();
	}
    public function input(){
        //修改前先查询
        $id=I('id');
        $softModel=M('Soft');
        $soft=$softModel->find($id);
        if($soft){
            $this->assign("soft",$soft);
        }
        $this->display();
    }
	//稍后改名为input
	public function add(){
        //上传
        $icon=$_FILES['icon'];
        if(!empty($icon)){
            //如果包含图标则上传
            $icon=$this->upload();
            //设置文件路径
            $_POST['icon']=$icon;
        }
        $entity=M('Soft');
        if($entity->create($_POST,1)){
            if($result=$entity->add()){
                $this->success('新增成功', U('Soft/index'));
            }else{
                $this->error('新增失败,'.$entity->getDbError(),U('Soft/index'));
            }
        }
//        $this->error('新增失败,'.$entity->getDbError(),U('Soft/index'));
	}
    private function upload(){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 3145728 ;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath="./Public/";
        $upload->savePath = 'Uploads/'; // 设置附件上传目录
        // 上传单个文件
        $info = $upload->uploadOne($_FILES['icon']);
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功 获取上传文件信息
            $path=$info['savepath'].$info['savename'];
            return $path;
        }
    }
	public function delete(){
		$entity=M('Soft');
		$id=I("id");
        $res=$entity->find($id);
        $path="./Public/".$res['icon'];
        //删除文件
        $ok=$this->deleteFile($path);
        if($ok){//查看是否空目录，如果是空目录，也删掉
            $dir=dirname($path);
            $emptydir = $this->dir_is_empty($dir);
            if($emptydir){
                rmdir($dir);//删除空目录
            }
        }
		if($ct=$entity->delete($id)){
			$this->success('删除成功!'.'删除'.$ct.'条',U('Soft/index'));
		}else{
		    $this->error('删除失败'.$entity->getDbError(),U('Soft/index'));
        }
	}
    private function deleteFile($file){
        return @unlink($file);
    }
    public function update(){
        if (IS_POST){
            $Topic = M('Soft');
            $Topic->create();
            $Topic->save();
            $this->success('保存完成',U('Admin/Soft/index'));
        }else{
            $this->error('非法请求',U('Admin/Soft/index'));
        }
    }

    /**
     * 判断目录非空
     * @param $dir
     * @return bool
     */
    function dir_is_empty($dir){
        if($handle = opendir("$dir")){
            while($item = readdir($handle)){
                if ($item != "." && $item != "..")return false;
            }
        }
        return true;
    }
}
?>