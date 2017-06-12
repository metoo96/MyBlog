<?php
namespace Home\Controller;
use Think\Controller;
class CatController extends Controller {
	/**
	 *显示分类目录下文章
	 */
    public function catDetail(){
        $data['cat_id'] = I('get.cat_id');
        $cat=M('t_cat')->order('cat_id desc')->limit(0,5)->select();//分类
        $hot=M('t_art')->order('art_click desc')->limit(0,5)->select();//热门文章
        $near=M('t_art')->order('art_pubtime desc')->limit(0,5)->select();//最近的文章
        $page = (I('get.p') ==null || I('get.p')==0)?1:I('get.p');
        $list = M('t_art')->where(array('art_catid'=>$data['cat_id']))->limit(($page-1)*5,5)->select();
        $sum=M('t_art')->where(array('art_catid'=>$data['cat_id']))->count();//总条数
        $pages =ceil($sum/5);//总页数
        $this->assign('list',$list);
        $this->assign("page",$page);//当前页
        $this->assign("pages",$pages);//总页数
        $this->assign("sum",$sum);//总条数
        $this->assign('cat',$cat);
        $this->assign('hot',$hot);
        $this->assign('near',$near);
        $this->assign('catid',$data['cat_id']);
        $this->display();
    }
 }