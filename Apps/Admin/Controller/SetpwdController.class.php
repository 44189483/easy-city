<?php
namespace Admin\Controller;
use Think\Controller;
class SetpwdController extends Controller {

	public function __construct(){

        parent::__construct();

        //未登录
        if(empty($_SESSION['admin'])){
    		redirect(U('Index/login'), 3, '请登陆,页面跳转中...');
    	}

    	//e10adc3949ba59abbe56e057f20f883e

        $this->assign('cname',CONTROLLER_NAME);

        $commn = new \Admin\Common\Controller\PublicController();
        $data = $commn->getAmountData();

		//当日 消费记录
		$this->assign('today_amount',$data['today_amount']);

		//当月 消费记录
		$this->assign('month_amount',$data['month_amount']);

    }

    public function index(){

		$admin = I('session.admin');

		$this->assign('admin',$admin);

		$this->display();

	}

	public function changepwd(){

		$option = M('option');

		$admin = I('session.admin');

		$pwd = I('post.pwd','','md5');

		$option->optionValue = $pwd;

		$bool = $option->where("optionType='AdminCtrol' AND optionKey='{$admin}'")->save();

		if($bool) {
            $this->success('操作成功！',U('Setpwd/index'));
        }else{
            $this->error('操作错误！');
        }

	}

}