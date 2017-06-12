<?php 
namespace Admin\Controller;
use Think\Controller;
class ArtController extends Controller{
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
	 public function addArt(){
	 	$list = M('t_cat')->select();
	 	$this->assign('list',$list);
        $this->display();
	 }

	 /**
	  * 文章添加
	  */
	public function addArtAjax(){
      
        if(IS_POST){
			if(!M('t_art')->create($_POST)){//create()会对Ueditor的内容进行处理
				echo M('t_art')->getError();
				exit;
			}
		    $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145999999999;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =     './Public/Upload/'; // 设置附件上传根目录
            $upload->savePath  =     ''; // 设置附件上传（子）目录
            // 上传文件
            $info   =   $upload->upload();
            if(!$info) {
                $this->error($upload->getError());
            }else{// 上传成功
                $img_path1 = './Public/Upload/'.$info['art_img']['savepath'];
                $name= $info['art_img']['savename'];
                $image = new \Think\Image();
                $image->open($img_path1.$name);
                // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
                // thumb的文件夹需要自己建
                $img_xiao = './Public/Upload/thumb/'.$name;
                $image->thumb(100,100)->save($img_xiao);
                M('t_art')->art_thumb_img = str_replace('./Public/','',$img_xiao);
                M('t_art')->art_img = str_replace('./Public/','',$img_path1.$name);
                M('t_art')->art_pubtime=time();
				M('t_art')->add();
				$this->redirect('Admin/Index/index');
		   }
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
	  * 文章列表显示
	  */
	 public function listArt(){
	 	$page=(I('get.p') == null || I('get.p') == 0)?1:I('get.p');//当前页
	 	$list=M('t_art')->order('art_pubtime desc')->limit(($page-1)*5,5)->select();
	 	$sum = M('t_art')->count();//总条数
	 	$pages =ceil($sum/5);//总页数
	 	$this->assign("list",$list);
	 	$this->assign("page",$page);
	 	$this->assign("pages",$pages);
	 	$this->assign("sum",$sum);
	 	$this->display();
	 }
	 /**
	  * 文章删除
	  */
     public function delArt(){
     	$data['art_id'] = I('get.art_id');
     	$rs = M('t_art')->where(array('art_id'=>$data['art_id']))->delete();
     	$this->redirect('Admin/Art/listArt');
     }
     /**
      * 文章修改
      */
     public function editArt(){
     	$data['art_id'] = I('get.art_id');
     	$list = M('t_art')->where(array('art_id'=>$data['art_id']))->find();
     	$this->assign('list',$list);
     	$this->display();
     }
     public function editArtAjax(){
     	 if(IS_POST){
			if(!M('t_art')->create($_POST)){//create()会对Ueditor的内容进行处理
				echo M('t_art')->getError();
				exit;
			}
     	$rs = M('t_art')->where(array('art_id'=>I('post.art_id')))->save();
        $this->redirect('Admin/Index/index');
     }
     }
     /**
      * 文章详情
      */
     public function artDetail(){
 	    $data['art_id'] = I('get.art_id');
     	$list = M('t_art')->where(array('art_id'=>$data['art_id']))->find();
     	$this->assign('list',$list);
     	$this->display();
     }
}