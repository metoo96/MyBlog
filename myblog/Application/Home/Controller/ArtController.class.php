<?php
namespace Home\Controller;
use Think\Controller;
class ArtController extends Controller {
	/**
	 *显示Detail
	 */
    public function artDetail(){
        $data['art_id'] = I('get.art_id');
        $list = M('t_art')->where(array('art_id'=>$data['art_id']))->find();
        $click=$list['art_click'];
        $artclick=$click+1;
        M('t_art')->where(array('art_id'=>$data['art_id']))->setField(array('art_click'=>$artclick));//修改点击量
        $row = M('t_cat')->where(array('cat_id'=>$data['art_catid']))->find();
        $this->assign('list',$list);
        $this->assign('row',$list);
        $this->display();
    }
 }