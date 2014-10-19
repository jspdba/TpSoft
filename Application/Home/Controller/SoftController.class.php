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
        $model=M();
        $where = "s.cid=t.id";
        //分页类实现
        $count = $model->table('__SOFT__ s, __TOPIC__ t')->where($where)->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        //更改样式,无效
        #$Page->setConfig('theme',"<li>%FIRST%</li> <li>%UP_PAGE%</li> <li>%LINK_PAGE%</li> <li>%DOWN_PAGE% %END%</li>");
        $Page->setConfig('theme',"<ul class='pagination'></li><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li><li><a> <span class='rows'>全部で %TOTAL_ROW% 条記録</span>  %NOW_PAGE%/%TOTAL_PAGE% ページ</a></ul>");

        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $id=I('id');
        if(!empty($id)){
            $where.=" and s.id=".$id;
            $list = $model->field('s.id id,s.name name,s.lang,s.env,s.price,s.icon icon,s.info,s.cid,t.name tname')->table('__SOFT__ s,__TOPIC__ t')->order('s.createTime desc')->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
        }else{
            $list = $model->field('s.id id,s.name name,s.lang,s.env,s.price,s.icon icon,s.info,s.cid,t.name tname')->table('__SOFT__ s,__TOPIC__ t')->order('s.createTime desc')->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
        }
        $this->assign('softs',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
	}

    //详细信息页面
    public function info(){
        $id=I('id');
        $soft=M('Soft');
        $info=$soft->find($id);
        $this->assign("info",info);
        $this->display();
    }
    public function search(){
        $model=M();
        //按名称搜索
        $name=I("name");
        if(!empty($name)){
//            $where['name']=array('like',"%".$name."%");
            $where="s.name like '%".$name."%' ";
        }else{
            $where="1=1 ";
        }

        //分页类实现
        $count = $model->table('__SOFT__ s')->where($where)->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        //更改样式,无效
        #$Page->setConfig('theme',"<li>%FIRST%</li> <li>%UP_PAGE%</li> <li>%LINK_PAGE%</li> <li>%DOWN_PAGE% %END%</li>");
        $Page->setConfig('theme',"<ul class='pagination'></li><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li><li><a> <span class='rows'>全部で %TOTAL_ROW% 条記録</span>  %NOW_PAGE%/%TOTAL_PAGE% ページ</a></ul>");

        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $where.=" and s.cid=t.id";
        $list = $model->field('s.id id,s.name name,s.lang,s.env,s.price,s.icon icon,s.info,s.cid,t.name tname')->table('__SOFT__ s,__TOPIC__ t')->order('s.createTime desc')->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
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
            if(!empty($topicId)){
                $this->assign("tp",$T->find($topicId));
            }
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
        $Page->setConfig('theme',"<ul class='pagination'></li><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li><li><a> <span class='rows'>全部で %TOTAL_ROW% 条記録</span>  %NOW_PAGE%/%TOTAL_PAGE% ページ</a></ul>");

        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $model->order('createTime desc')->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('softs',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
    }
}
?>