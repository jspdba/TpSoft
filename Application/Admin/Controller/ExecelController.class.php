<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-8-1
 * Time: 下午4:31
 */
namespace Admin\Controller;
header("Content-type: text/html; charset=utf-8");
class ExecelController extends AdminController{
    public function  index(){
        $path=APP_PATH."Admin/Common/baidu.csv";
//        $content=file_get_contents($path);
//        echo $content;
        $f=fopen($path,"r");
        $model=M("Csv");
        //创建一张新表（冗余表）,只用来导入数据
        while(!feof($f)){
            $line=fgets($f);
            echo $line;
            if(empty($line)){
                continue;
            }
            $bean=explode(",","$line");
            $data=array();
            $data['topic']=$bean[0];
            $data['name']=$bean[1];
            $data['url']=$bean[2];
            $model->create($data,1);
            $result =$model->add();
            if($result){
                echo "insert ok!"."<br/>";
            }else{
                echo $model->getDbError()."<br/>";
            }
        }

    }

    public function getAndInsertTopic(){
        $model=M("Csv");
        $topic=M('Topic');
        $result=$model->field("topic")->group("topic")->select();
        foreach($result as $key=>$value){
           $data['name']=$value['topic'];
           $data['leval']=0;
           $topic->create($data,1);
           $ret=$topic->add();
            if(!$ret){
                echo $topic->getDbError()."<br />";
                return;
            }else{
                echo "insert to topic Ok!  ".$value['topic']."<br />";
            }
        }
    }
    public function getAndInsertSoft(){
        $result=M()->field("topic.id,csv.name,csv.url")->table("think_topic topic ,think_csv csv")->where("csv.topic=topic.name")->select();
        foreach($result as $key=>$value){
            $soft=M("Soft");
            $data['name']=$value['name'];
            $data['url']=$value['url'];
            $data['cid']=$value['id'];
            $soft->create($data,1);
            $ret=$soft->add();
            if(!$ret){
                echo $soft->getDbError()."<br />";
                return;
            }else{
                echo "insert to topic Ok!  ".$value['id'].",".$value['name'].",".$value['url']."<br />";
            }
        }
    }
//    导出execel文件
    public function exportExecel(){
        $list= M('Soft')->select();   //查出数据$name='Excelfile';
      /*  Vendor("Classes.PHPExcel");
        Vendor("Classes.PHPExcel.IOFactory");
        Vendor("Classes.PHPExcel.Reader.Excel5");*/

        Vendor("Classes.PHPExcel");
        Vendor("Classes.PHPExcel.IOFactory");
        Vendor("Classes.PHPExcel.Reader.Excel5");
        Vendor("Classes.PHPExcel.Style.Alignment");

        //创建处理对象实例
        $objPhpExcel=new \PHPExcel();
        $objPhpExcel->getActiveSheet()->getDefaultColumnDimension()->setAutoSize(true);//设置单元格宽度
        //设置表格的宽度  手动
        $objPhpExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        $objPhpExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
        $objPhpExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
        $objPhpExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);

        //设置标题
        $rowVal = array(0=>'编号',1=>'名称', 2=>'环境', 3=>'语言', 4=>'价格',
         );

        foreach ($rowVal as $k=>$r){
            $objPhpExcel->getActiveSheet()->getStyleByColumnAndRow($k,1)
                ->getFont()->setBold(true);//字体加粗
            $objPhpExcel->getActiveSheet()->getStyleByColumnAndRow($k,1)->
//                getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);//文字居中
                getAlignment()->setHorizontal(PHPExcel_Style_Alignment.HORIZONTAL_CENTER);//文字居中
            $objPhpExcel->getActiveSheet()->setCellValueByColumnAndRow($k,1,$r);
        }

        //设置当前的sheet索引 用于后续内容操作
        $objPhpExcel->setActiveSheetIndex(0);
        $objActSheet=$objPhpExcel->getActiveSheet();
        //设置当前活动的sheet的名称
        $title="软件列表";
        $objActSheet->setTitle($title);
        //设置单元格内容
        foreach($list as $k => $v)
        {
            $num=$k+2;
            $objPhpExcel->setActiveSheetIndex(0)
                //Excel的第A列，uid是你查出数组的键值，下面以此类推
                ->setCellValue('A'.$num, $v['id'])
                ->setCellValue('B'.$num, $v['name'])
                ->setCellValue('C'.$num, $v['env'])
                ->setCellValue('D'.$num, $v['lang'])
                ->setCellValue('E'.$num, $v['price']);
        }
        $name=date('Y-m-d');//设置文件名
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Transfer-Encoding:utf-8");
        header("Pragma: no-cache");
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$title.'_'.urlencode($name).'.xls"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory.createWriter($objPhpExcel, 'Excel5');
        $objWriter->save('php://output');
    }
}