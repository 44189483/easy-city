<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller {

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

		$phone = I('get.phone','','trim');//设备码
		$this->assign('phone',$phone);

		if(!empty($phone)){
			$where = "userPhone='{$phone}'";
		}

		$user = M('user'); // 实例化Data数据对象  date 是你的表名

	    $count = $user->where($where)->count();// 查询满足要求的总记录数 表示查询条件

	    $length = 10;

	    $Page = new \Think\Page($count,$length);// 实例化分页类 传入总记录数

	    $Page->rollPage = 0;

	    $Page->setConfig('header','<a>共%TOTAL_ROW%条</a>');
		$Page->setConfig('first','<span class="first paginate_button paginate_button_disabled">首页</span>');
		$Page->setConfig('prev','<span class="previous paginate_button paginate_button_disabled">上一页</span>');
		$Page->setConfig('next','<span class="next paginate_button">下一页</span>');
		//$Page->setConfig('last','共%TOTAL_PAGE%页');
		$Page->setConfig('link','indexpagenumb');//pagenumb 会替换成页码
		$Page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');

	    $show = $Page->show();// 分页显示输出

	    // 进行分页数据查询
	    $rows = $user->where($where)->order('userId DESC')->limit($Page->firstRow.','.$Page->listRows)->select(); // $Page->firstRow 起始条数 $Page->listRows 获取多少条

	    //echo $user->_sql();

	    $this->assign('length',$length);// 每页条数

	    $this->assign('p',I('get.p'));//当前页数
	    
	    $this->assign('rows',$rows);// 赋值数据集

	    $this->assign('page',$show);// 赋值分页输出

	    $this->display(); // 输出模板

	}

	public function del(){

		$user = M('user');

		$record = M('record');

		$pid = I('post.id');

		$gid = I('get.id');

		if($pid){//多删

			$rows = $user->where("userId IN(".implode(',', $pid).")")->select(); 

			foreach ($rows as $k => $v) {
				//删除用户消费
				$record->where("userPhone='{$v['userPhone']}'")->delete();
			}

			$bool = $user->where("userId IN(".implode(',', $pid).")")->delete(); 

		}else if (!empty($gid)) {//单删
			$row = $user->field('userPhone')->where("userId={$gid}")->find();
			$bool = $user->where("userId={$gid}")->delete();

			//删除相关设备消息费用
			$record->where("userId={$row['userPhone']}")->delete();
		}
		
		if($bool) {
            $this->success('操作成功！');
        }else{
            $this->error('操作错误！');
        }

	}

	//消费记录
	public function record($phone){

		$where = "userPhone={$phone}";

		//信息
		$user = M('user');
		$row = $user->where($where)->find(); 
		$this->assign('row',$row);

		//消费记录
		$record = M('record'); // 实例化Data数据对象

		//按时间查询
		$start = I('get.start');
		$this->assign('start',$start);

		$end = I('get.end');
		$this->assign('start',$start);

		if(!empty($start) && !empty($end)){
			$where .= " AND (recordTime BETWEEN '{$start}' AND '{$end}')";
		}
		//累计充值总和
		$ctotal = $record->where($where." AND recordType=2")->sum('amount');
		$this->assign('ctotal',$ctotal == '' ? 0 : $ctotal);

		//累计消费总和
		$xtotal = $record->where($where." AND recordType=0")->sum('amount');
		$this->assign('xtotal',$xtotal == '' ? 0 : $xtotal);

	    $count = $record->where($where)->count();// 查询满足要求的总记录数 表示查询条件

	    $length = 10;

	    $Page = new \Think\Page($count,$length);// 实例化分页类 传入总记录数

	    $Page->rollPage = 0;

	    $Page->setConfig('header','<a>共%TOTAL_ROW%条</a>');
		$Page->setConfig('first','<span class="first paginate_button paginate_button_disabled">首页</span>');
		$Page->setConfig('prev','<span class="previous paginate_button paginate_button_disabled">上一页</span>');
		$Page->setConfig('next','<span class="next paginate_button">下一页</span>');
		//$Page->setConfig('last','共%TOTAL_PAGE%页');
		$Page->setConfig('link','indexpagenumb');//pagenumb 会替换成页码
		$Page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');

	    $show = $Page->show();// 分页显示输出

	    // 进行分页数据查询
	    $rows = $record->where($where)->order('recordTime DESC')->limit($Page->firstRow.','.$Page->listRows)->select(); // $Page->firstRow 起始条数 $Page->listRows 获取多少条

	    //echo $user->_sql();

	    $this->assign('length',$length);// 每页条数

	    $this->assign('p',I('get.p'));//当前页数
	    
	    $this->assign('rows',$rows);// 赋值数据集

	    $this->assign('page',$show);// 赋值分页输出

	    $this->display(); // 输出模板

	}

}