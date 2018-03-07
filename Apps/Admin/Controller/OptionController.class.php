<?php
namespace Admin\Controller;
use Think\Controller;
class OptionController extends Controller {

	public function __construct(){

        parent::__construct();

        //未登录
        if(empty($_SESSION['admin'])){
    		redirect(U('Index/login'), 3, '请登陆,页面跳转中...');
    	}

        $this->assign('cname',CONTROLLER_NAME);

        $commn = new \Admin\Common\Controller\PublicController();
        $data = $commn->getAmountData();

		//当日 消费记录
		$this->assign('today_amount',$data['today_amount']);

		//当月 消费记录
		$this->assign('month_amount',$data['month_amount']);

    }

    public function index(){

		$option = M('option');

		//网站信息
		$res = $option->where('optionType="give"')->select();
		foreach($res as $k => $v){
			$info[$v['optionKey']] = $v['optionValue'];
		}
		$this->assign('info',$info);

		if(I('post.')){
	
			$option->where("optionType='give'")->delete();

			foreach(I('post.') as $k => $v){
				$option->optionType  = 'give';
				$option->optionKey   = $k;
				$option->optionValue = $v;
				$option->add();
			}

			redirect(U('Option/index'), 1, '提交成功,跳转中...');
			
		}

		$this->display();

	}

}