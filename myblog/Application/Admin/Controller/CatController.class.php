<?php 
namespace Admin\Controller;
use Think\Controller;
class CatController extends Controller{
	public function index(){

	}
	/**
	*错误时返回
	 */
	public function errorReturn($msg){
        $res['success'] = false;
        $res['errmsg'] = $msg;
        $this->ajaxReturn($res);
	}
	/**
	 * 成功时返回
	 */
	public function successReturn($msg){
       $res['success'] = true;
       $res['msg'] = $msg;
       $this->ajaxReturn($res);
	}

	
	/**
	 * 类别添加页面
	 */
	 public function addCat(){
        $this->display();
	 }

	 /**
	  * 类别添加
	  */
	public function addCatAjax(){
        $data['cat_name'] = I('post.catname');
        $this->checkData($data);
        $rs = M('t_cat')->add($data);//面向过程的插入数据
        if($rs!==false){
        	$this->successReturn("添加类别成功");
        }else{
        	$this->errorReturn("添加类别失败");
        }
	}
	
	 /**
	  * 检验数据是否完整
	  */
	 public function checkData($data){
	 	foreach($data as $key => $value){
	 		if($data[$key] == null || $data[$key] == ''){
	 			$this->errorReturn("信息不完整");
	 		}
	 	}
	 }
	 /**
	  * 类别列表显示
	  */
	 public function listCat(){
	 	$page=(I('get.p') == null || I('get.p') == 0)?1:I('get.p');//当前页
	 	$list=M('t_cat')->order('cat_id asc')->limit(($page-1)*5,5)->select();
	 	$sum = M('t_cat')->count();//总条数
	 	$pages =ceil($sum/5);//总页数
	 	$this->assign("list",$list);
	 	$this->assign("page",$page);
	 	$this->assign("pages",$pages);
	 	$this->assign("sum",$sum);
	 	$this->display();
	 }
	 /**
	  * 类别删除
	  */
     public function delCat(){
     	$data['cat_id'] = I('get.cat_id');
     	$rs = M('t_cat')->where(array('cat_id'=>$data['cat_id']))->delete();
     	$this->redirect('Admin/Cat/listCat');
     }
     /**
      * 类别修改
      */
     public function editCat(){
     	$data['cat_id'] = I('get.cat_id');
     	$list = M('t_cat')->where(array('cat_id'=>$data['cat_id']))->find();
     	$this->assign('list',$list);
     	$this->display();
     }
     public function editCatAjax(){
     	$data['cat_name'] = I('post.catname');
     	$data['cat_id'] = I('post.cat_id');
     	$this->checkData($data);
     	$rs = M('t_cat')->where(array('cat_id'=>$data['cat_id']))->setField(array('cat_name'=>$data['cat_name']));
     	if($rs!==false){
     		$this->successReturn("修改成功");
     	}else{
     		$this->errorReturn("修改失败");
     	}
     }
}