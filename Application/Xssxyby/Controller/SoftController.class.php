<?php
namespace Xssxyby\Controller;
header("Content-type: text/html; charset=utf-8");
class SoftController extends XssxybyController
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
        $model=M("Soft");
        $id=I('id');
        $where=array();
        if(!empty($id)){
            $where['id']=array('eq',$id);
        }
        //分页类实现
        $count = $model->where($where)->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        //更改样式,无效
        #$Page->setConfig('theme',"<li>%FIRST%</li> <li>%UP_PAGE%</li> <li>%LINK_PAGE%</li> <li>%DOWN_PAGE% %END%</li>");
        $Page->setConfig('theme',"<ul class='pagination'></li><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li><li><a> %HEADER%  %NOW_PAGE%/%TOTAL_PAGE% 页</a></ul>");

        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $model->order('createTime desc')->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('softs',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->assign("title",'软件搜索');
        $this->display(); // 输出模板
	}
    public function input(){
        //修改前先查询
        $id=I('id');
        $softModel=M('Soft');
        $soft=$softModel->find($id);
        if($soft){
            $this->assign("soft",$soft);
        }
        //分类（下拉）
        $topicModel=M('Topic');
        $topics=$topicModel->select();
        if($topics){
            $this->assign("topics",$topics);
        }
        $this->assign("title",'软件添加');
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
                $this->success('新增成功', U('Soft/input'));
            }else{
                $this->error('新增失败,'.$entity->getDbError(),U('Soft/input'));
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
            //上传
            $icon=$_FILES['icon'];
            if(($icon['error'])==0){
                //如果包含图标则上传
                $icon=$this->upload();
                //设置文件路径
                $_POST['icon']=$icon;
            }
            $entity=M('Soft');
            if($entity->create($_POST,2)){
                if($result=$entity->save()){
                    $this->success('保存完成',U('Xssxyby/Soft/index'));
                }else{
                    $this->error('保存失败,'.$entity->getDbError(),U('Xssxyby/Soft/index'));
                }
            }

        }else{
            $this->error('非法请求',U('Xssxyby/Soft/index'));
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

    public function listByTopic(){
        $model=M("Soft");
        $T=M('Topic');
        $topicId=$_GET['topic'];

        if (isset($topicId)) {
            $topics=$T->select();
            $this->assign("topics",$topics);
            $this->assign('topicId',$topicId);
        }else{
            $this->error('参数错误');
        }

        //按分类搜索
        $where['cid']=array('eq',$topicId);
        //分页类实现
        $count = $model->where($where)->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        //更改样式,无效
        #$Page->setConfig('theme',"<li>%FIRST%</li> <li>%UP_PAGE%</li> <li>%LINK_PAGE%</li> <li>%DOWN_PAGE% %END%</li>");
        $Page->setConfig('theme',"<ul class='pagination'></li><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li><li><a> %HEADER%  %NOW_PAGE%/%TOTAL_PAGE% 页</a></ul>");

        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $model->order('createTime desc')->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('softs',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
    }

    public function search(){
        $model=M("Soft");
        //按名称搜索
        $name=I("name");
        $where['name']=array('like',"%".$name."%");
        //分页类实现
        $count = $model->where($where)->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        //更改样式,无效
        #$Page->setConfig('theme',"<li>%FIRST%</li> <li>%UP_PAGE%</li> <li>%LINK_PAGE%</li> <li>%DOWN_PAGE% %END%</li>");
        $Page->setConfig('theme',"<ul class='pagination'></li><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li><li><a> %HEADER%  %NOW_PAGE%/%TOTAL_PAGE% 页</a></ul>");

        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $model->order('createTime desc')->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('softs',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->assign("title",'软件搜索');
        $this->display(); // 输出模板
    }
}
?>