<?php
namespace Admin\Controller;
use Think\Controller;

class IndexController extends Controller {

	public function __construct(){

        parent::__construct();

        $this->assign('cname',CONTROLLER_NAME);

        $commn = new \Admin\Common\Controller\PublicController();
        $data = $commn->getAmountData();

		//当日 消费记录
		$this->assign('today_amount',$data['today_amount']);

		//当月 消费记录
		$this->assign('month_amount',$data['month_amount']);

    }

    public function login(){

		if(I('post.act') == 'submit'){

			if(I('post.provenum') != I('session.authImg')){
    			$this->error('对不起，请输入正确的验证码！');
			}

			$username = I('post.username');

			$userpwd = I('post.password','','md5');
				
			$option = M('option');

			$row = $option->where("optionType='AdminCtrol' AND optionKey='{$username}' AND optionValue='{$userpwd}'")->find();
				
			if(!$row){
				$this->error('请您输入正确的用户名和密码！');
			}else{
				session('admin',$username);
				$this->success('登录成功,页面跳转中...', 'index');
			}
		}else{
			$this->display();
		}

	}

    public function index(){ 

    	if(empty($_SESSION['admin'])){
    		redirect(U('Index/login'), 3, '请登陆,页面跳转中...');
    	}
        $this->display();

    }

    public function provenum(){

    	$rand = "";

		for($i = 0;$i < 4;$i++){
			$rand.= dechex(rand(1,15));
		} 
		session('authImg',$rand);

		$im = imagecreatetruecolor(110,45);//尺寸 

		$bg = imagecolorallocate($im,255,255,255);	//背景色

		imagefill($im,0,0,$bg);

		$te = imagecolorallocate($im,0,0,0);			//字符串颜色

		$te2 = imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));

		for($i = 0; $i < 3; $i++){
			imageline($im,rand(0,110),0,110,40,$te2);
		}

		for($i = 0;$i < 200;$i++){
		    imagesetpixel($im,rand(0,110),rand(0,40),$te2);
		}

		imagestring($im,10,25,6,$rand,$te);//输出图像的位置（数字验证）

		header('Content-type:image/jpeg');

		imagejpeg($im);

		imagedestroy($im);

    }

    public function logout(){
    	//退出 清除session
		I('session.admin','');
		session_destroy();
		redirect(U('Index/login'), 3, '正在退出...');
    }

}