<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	/**
	 *显示首页
	 */
    public function index(){
    	$page = (I('get.p')==null || I('get.p') ==0) ?1:I('get.p');
    	$cat=M('t_cat')->order('cat_id desc')->limit(0,5)->select();//分类
    	$art=M('t_art')->order('art_id desc')->limit(($page-1)*5,5)->select();//文章
    	$hot=M('t_art')->order('art_click desc')->limit(0,5)->select();//热门文章
    	$near=M('t_art')->order('art_pubtime desc')->limit(0,5)->select();//最近的文章
    	$sum = M('t_art')->count();//总条数
	 	$pages =ceil($sum/5);//总页数
	 	$this->assign("page",$page);//当前页
	 	$this->assign("pages",$pages);//总页数
	 	$this->assign("sum",$sum);//总条数
    	$this->assign('cat',$cat);
    	$this->assign('art',$art);
    	$this->assign('hot',$hot);
    	$this->assign('near',$near);
        $this->display();
    }
}