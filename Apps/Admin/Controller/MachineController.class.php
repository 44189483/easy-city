<?php
namespace Admin\Controller;
use Think\Controller;
class MachineController extends Controller {

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

		$number = I('get.number','','trim');//设备码
		$this->assign('number',$number);

		if(!empty($number)){
			$where = "deviceNo LIKE'%{$number}%'";
		}

		$device = M('device'); // 实例化Data数据对象  date 是你的表名

	    $count = $device->where($where)->count();// 查询满足要求的总记录数 表示查询条件

	    $length = 5;

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
	    $rows = $device->where($where)->order('deviceId DESC')->limit($Page->firstRow.','.$Page->listRows)->select(); // $Page->firstRow 起始条数 $Page->listRows 获取多少条

	    //echo $device->_sql();

	    $this->assign('length',$length);// 每页条数

	    $this->assign('p',I('get.p'));//当前页数
	    
	    $this->assign('rows',$rows);// 赋值数据集

	    $this->assign('page',$show);// 赋值分页输出

	    $this->display(); // 输出模板

	}

	public function save(){

		$id = I('post.id');

		$device = M('device');

		$number = I('post.number');

		//文件存在判断
		if(!empty($_FILES["attchment"]["name"]) && is_uploaded_file($_FILES["attchment"]["tmp_name"])){

			$upload = new \Think\Upload();// 实例化上传类
		    $upload->maxSize   = 3145728 ;// 设置附件上传大小
		    $upload->exts      = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		    $upload->autoSub   = false;//去除子目录
		    $upload->rootPath  = 'upload/devcode/'; // 设置附件上传根目录
			//$upload->savePath  = ''; // 设置附件上传（子）目录
		    // 上传文件 
		    $info = $upload->upload();

		    if($info && !empty($id)){//删除旧图
				$row = $device->where("deviceId={$id}")->find(); 
				@unlink($row['deviceCode']);
		    }

		}
		
		$device->deviceNo   = $number;
		$device->deviceCode = $upload->rootPath.$info['attchment']['savename'];
		
		if(empty($id)){
			$row = $device->where("deviceNo='{$number}'")->find(); 
			if($row){
				$this->error('该设备已存在！');
			}
			$bool = $device->add();
		}else{
			$bool = $device->where("deviceId={$id}")->save();
		}
		
		if($bool) {
            $this->success('操作成功！',U('Machine/index'));
        }else{
            $this->error('操作错误！');
        }

	}

	public function view($id=''){

		if(!empty($id)){
			$device = M('device');
			$row = $device->where("deviceId={$id}")->find(); 
			$this->assign('row',$row);
		}
		$this->display();

	}

	public function del(){

		$device = M('device');

		$consumption = M('consumption');

		$pid = I('post.id');

		$gid = I('get.id');

		if($pid){//多删

			$rows = $device->where("deviceId IN(".implode(',', $pid).")")->select(); 

			foreach ($rows as $k => $v) {
				@unlink($v['deviceCode']);
			}

			$bool = $device->where("deviceId IN(".implode(',', $pid).")")->delete(); 

			//删除相关设备消息费用
			$consumption->where("deviceId IN(".implode(',', $pid).")")->delete();

		}else if (!empty($gid)) {//单删
			$row = $device->field('deviceCode')->where("deviceId={$gid}")->find();
			//删除图片
			@unlink($row['deviceCode']);
			$bool = $device->where("deviceId={$gid}")->delete();

			//删除相关设备消息费用
			$consumption->where("deviceId={$gid}")->delete();
		}
		
		if($bool) {
            $this->success('操作成功！');
        }else{
            $this->error('操作错误！');
        }

	}

	//消费记录
	public function record($id){

		$where = "deviceId={$id}";

		//设备信息
		$device = M('device');
		$row = $device->where($where)->find(); 
		$this->assign('row',$row);

		//消费记录
		$consumption = M('consumption'); // 实例化Data数据对象

		//按时间查询
		$start = I('get.start');
		$this->assign('start',$start);

		$end = I('get.end');
		$this->assign('start',$start);

		if(!empty($start) && !empty($end)){
			$where .= " AND (consTime BETWEEN '{$start}' AND '{$end}')";
		}
		//累计消费总和
		$total = $consumption->where($where)->sum('amount');
		$this->assign('total',$total == '' ? 0 : $total);

	    $count = $consumption->where($where)->count();// 查询满足要求的总记录数 表示查询条件

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
	    $rows = $consumption->where($where)->order('deviceId DESC')->limit($Page->firstRow.','.$Page->listRows)->select(); // $Page->firstRow 起始条数 $Page->listRows 获取多少条

	    //echo $device->_sql();

	    $this->assign('length',$length);// 每页条数

	    $this->assign('p',I('get.p'));//当前页数
	    
	    $this->assign('rows',$rows);// 赋值数据集

	    $this->assign('page',$show);// 赋值分页输出

	    $this->display(); // 输出模板

	}

}