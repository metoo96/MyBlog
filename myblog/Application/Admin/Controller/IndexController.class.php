<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
	/**
	 * 后台主页
	 */
    public function index(){
    	if($this->checkCookie()){
         $this->display();
        }else{
   	     $this->redirect('Admin/Index/login');
        }
    }
    /**
     * 错误时返回
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
     * 后台登录页面
     */
    public function login(){
      $this->display();
    }
    /**
     * 后台登录处理
     * */
    public function loginAjax(){
       $xcode = new \Think\Verify();
       $data['username'] = I('post.username');
       $data['password'] = md5(I('post.password'));
       $data['yzm'] = I('post.yzm');
       $this->checkData($data);
       $data['cookie'] = md5($data['username']).md5($data['password']);
       $admin=M('t_user')->where( array('username'=>$data['username']) )->find();
       if( $xcode->check($data['yzm']) ){
       if( $data['cookie'] === $admin['cookie'] ){
        cookie('key',$admin['cookie']);
        cookie('username',$data['username']);
        $this->successReturn('登录成功');
       }else{
        $this->errorReturn('登录失败');
       }
       }else{
        $this->errorReturn('验证码错误');
       }
    }
    /**
     * 随机产生一个验证码
     */
    public function yzm(){
		$xcode =new \Think\Verify();
		$xcode->imageW = 200;
		$xcode->imageH = 50;
		$xcode->useNoise = false;
		$xcode->fontSize = 24;
		$xcode->length = 4;
		$xcode->entry();
    }

     /**
     * 手动加密插入一个管理员
     */
     public function insertAdmin(){
     $data['username'] = 'zhuguozhu';
     $data['password'] = md5('1211651004');
     $data['cookie'] = md5($data['username']).md5($data['password']);
     M('t_user')->add($data);
     }
     /**
      * 检验数据是否完整
      */
     public function checkData($data){
        foreach($data as $key => $value){
        	if( $data[$key] = null || $data[$key] == ''){
        		$this->errorReturn('信息不完整');
        	}
        }
     }

     /**
      * 退出
      */
     public function logout(){
     	cookie('key', null);
        cookie('username', null);
        $this->redirect('Admin/Index/login');
     }
    
      /**
     * 检验cookie
     */
    public function checkCookie(){
       $admin = M('t_user')->where( array('username'=>cookie('username')) )->find();
       if( !empty(cookie('key')) && !empty(cookie('username')) ){
       if( cookie('key') === $admin['cookie'] ){
       	return true;
       }else{
       	return false;
       }
      }else{
        return false;
      }
    }
}