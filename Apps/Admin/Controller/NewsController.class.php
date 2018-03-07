<?php
namespace Admin\Controller;
use Think\Controller;
class NewsController extends Controller {

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

		$title = I('get.title','','trim');
		$this->assign('title',$title);

		if(!empty($title)){
			$where = "articleTitle LIKE'%{$title}%'";
		}

		$article = M('article'); // 实例化Data数据对象  date 是你的表名

	    $count = $article->where($where)->count();// 查询满足要求的总记录数 表示查询条件

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
	    $rows = $article->where($where)->order('articleId DESC')->limit($Page->firstRow.','.$Page->listRows)->select(); // $Page->firstRow 起始条数 $Page->listRows 获取多少条

	    //echo $article->_sql();

	    $this->assign('length',$length);// 每页条数

	    $this->assign('p',I('get.p'));//当前页数
	    
	    $this->assign('rows',$rows);// 赋值数据集

	    $this->assign('page',$show);// 赋值分页输出

	    $this->display(); // 输出模板

	}

	public function save(){

		$id = I('post.id');

		$article = M('article');

		$title = I('post.title');

		$content = I('post.content');

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
				$row = $article->where("articleId={$id}")->find(); 
				@unlink($row['articleImg']);
		    }

		}
		
		$article->articleTitle = $title;
		$article->articleContent = $content;
		$article->addDate = date('Y-m-d');
		$article->articleImg = $upload->rootPath.$info['attchment']['savename'];
		
		if(empty($id)){
			$row = $article->where("articleTitle='{$title}'")->find(); 
			if($row){
				$this->error('该设备已存在！');
			}
			$bool = $article->add();
		}else{
			$bool = $article->where("articleId={$id}")->save();
		}
		
		if($bool) {
            $this->success('操作成功！',U('News/index'));
        }else{
            $this->error('操作错误！');
        }

	}

	public function view($id=''){

		if(!empty($id)){
			$article = M('article');
			$row = $article->where("articleId={$id}")->find(); 
			$this->assign('row',$row);
		}
		$this->display();

	}

	public function del(){

		$article = M('article');

		$pid = I('post.id');

		$gid = I('get.id');

		if($pid){//多删

			$rows = $article->where("articleId IN(".implode(',', $pid).")")->select(); 

			foreach ($rows as $k => $v) {
				@unlink($v['articleImg']);
			}

			$bool = $article->where("articleId IN(".implode(',', $pid).")")->delete(); 

		}else if (!empty($gid)) {//单删
			$row = $article->field('articleImg')->where("articleId={$gid}")->find();
			//删除图片
			@unlink($row['articleImg']);
			$bool = $article->where("articleId={$gid}")->delete();
		}
		
		if($bool) {
            $this->success('操作成功！');
        }else{
            $this->error('操作错误！');
        }

	}

}