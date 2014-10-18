<?php
namespace Home\Controller;
use Think\Controller;

header("Content-type: text/html; charset=utf-8");
class SoftController extends Controller{
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
	public function index(){
        $model=M("Soft");
        //分页类实现
        $count = $model->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        //更改样式,无效
        #$Page->setConfig('theme',"<li>%FIRST%</li> <li>%UP_PAGE%</li> <li>%LINK_PAGE%</li> <li>%DOWN_PAGE% %END%</li>");
        $Page->setConfig('theme',"<ul class='pagination'></li><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li><li><a> %HEADER%  %NOW_PAGE%/%TOTAL_PAGE% 页</a></ul>");

        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $id=I('id');
        if(isset($id)){
            $list = $model->order('createTime desc')->limit($Page->firstRow.','.$Page->listRows)->select($id);
        }else{
            $list = $model->order('createTime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        }
        $this->assign('softs',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
	}

	public function insert(){
//		$entity=M('Soft','think_','DB_CONFIG');
		$entity=M('Soft');
		if($entity->create($_POST,1)){
			if($result=$entity->add()){
				$this->success('新增成功', 'index');
			}
		}
		$this->error('新增失败,'.$entity->getDbError(),true);
	}
	//稍后改名为input
	public function add(){
		$entity=M('Topic');
		#$result=$entity->where("id=1 ")->find();//只查询一条
		$list=$entity->field("id,name")->select();

		if($list){
			#dump($list);
			$this->assign("list",$list);
		}else{
			print_r($entity->getDbError());
		}
		$this->display();
	}
	public function delete(){
		$entity=M('Soft');
		$id=I("id");
		if($ct=$entity->delete($id)){
			$this->success('删除成功!'.'删除'.$ct.'条', 'index');
		}
		$this->error('删除失败'.$entity->getDbError(),'index');
	}
    //详细信息页面
    public function info(){
        $id=I('id');
        $soft=M('Soft');
        $info=$soft->where('id='.$id)->find;
        $this->assign("info",info);
        $this->display();
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
        $this->display(); // 输出模板
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
}
?>