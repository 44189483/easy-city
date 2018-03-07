<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>爱德拉-管理后台</title>

<link rel="stylesheet" href="/easy-city/Public/admin/css/style.default.css" type="text/css" />
<link rel="stylesheet" href="/easy-city/Public/admin/css/font-awesome.min.css-v=4.4.0.css" />
<script type="text/javascript" src="/easy-city/Public/admin/js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="/easy-city/Public/admin/js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="/easy-city/Public/admin/js/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="/easy-city/Public/admin/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/easy-city/Public/admin/js/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="/easy-city/Public/admin/js/custom/tables.js"></script>
<script type="text/javascript" src="/easy-city/Public/admin/js/plugins/jquery.validate.min.js"></script>
<script type="text/javascript" src="/easy-city/Public/admin/js/plugins/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="/easy-city/Public/admin/js/plugins/charCount.js"></script>
<script type="text/javascript" src="/easy-city/Public/admin/js/plugins/ui.spinner.min.js"></script>
<script type="text/javascript" src="/easy-city/Public/admin/js/plugins/chosen.jquery.min.js"></script>
<script type="text/javascript" src="/easy-city/Public/admin/js/custom/general.js"></script>
<script type="text/javascript" src="/easy-city/Public/admin/js/custom/forms.js"></script>


<!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="/easy-city/Public/admin/css/style.ie9.css"/>
<![endif]-->
<!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="/easy-city/Public/admin/css/style.ie8.css"/>
<![endif]-->
<!--[if lt IE 9]>
    <script src="/easy-city/Public/admin/js/plugins/css3-mediaqueries.js"></script>
<![endif]-->

</head>

<body class="withvernav">
<div class="bodywrapper">
    <div class="topheader">
        <div class="left">
            <h1 class="logo">爱德拉.<span>Admin</span></h1>
            <span class="slogan">后台管理系统</span>            
            <br clear="all" />
        </div><!--left-->
        <div class="right">
            <div class="userinfo">
            	<img src="/easy-city/Public/admin/images/thumbs/avatar.png" alt="" />
                <span>管理员</span>
            </div><!--userinfo-->
            
            <div class="userinfodrop">
            	<div class="avatar">
                	<a href=""><img src="/easy-city/Public/admin/images/thumbs/avatarbig.png" alt="" /></a>
                </div><!--avatar-->
                <div class="userdata">
                	<h4>Admin</h4>
                    <span class="email">email@yourdomain.com</span>
                    <ul>
                    	<!--<li><a href="editprofile.html">编辑资料</a></li>-->
                        <li><a href="accountsettings.html">密码设置</a></li>
                        <li><a href="index.html">安全退出</a></li>
                    </ul>
                </div><!--userdata-->
            </div><!--userinfodrop-->
        </div><!--right-->
    </div><!--topheader-->
    
    <div class="header">
    	<ul class="headermenu">
        	<li class="current"><a href="index.html"><i class="fa fa-desktop" style="font-size:30px;"></i><br/>首页</a></li>
            <li><a href="manageblog.html"><i class="fa fa-desktop" style="font-size:30px;"></i><br/>博客管理</a></li>
            <li><a href="messages.html"><i class="fa fa-desktop" style="font-size:30px;"></i><br/>查看消息</a></li>
            <li><a href="reports.html"><i class="fa fa-desktop" style="font-size:30px;"></i><br/>统计报表</a></li>
        </ul>
        
       <div class="headerwidget">
        	<div class="earnings">
            	<div class="one_half">
                	<h4>今日收入</h4>
                    <h2>￥640.01</h2>
                </div><!--one_half-->
                <div class="one_half last alignright">
                	<h4>当月收入</h4>
                    <h2>￥64000.00</h2>
                </div><!--one_half last-->
            </div><!--earnings-->
        </div><!--headerwidget-->
        
    </div><!--header-->        <div class="vernav2 iconmenu">
	<ul>
		<li <?php if(($cname) == "Option"): ?>class="current"<?php endif; ?>><a href="<?php echo U('Option/index');?>"><i class="fa fa-cog"></i> <span class="nav-label">基本设置</span></a></li>
        <li <?php if(($cname) == "Machine"): ?>class="current"<?php endif; ?>><a href="<?php echo U('Machine/index');?>"><i class="fa fa-delicious"></i> <span class="nav-label">设备管理</span></a></li>
        <li <?php if(($cname) == "User"): ?>class="current"<?php endif; ?>><a href="<?php echo U('User/index');?>"><i class="fa fa-users"></i> <span class="nav-label">用户记录</span></a></li>
        <li <?php if(($cname) == "Record"): ?>class="current"<?php endif; ?>><a href="filemanager.html"><i class="fa fa-car"></i> <span class="nav-label">洗车消费记录</span></a></li>
    </ul>
    <a class="togglemenu"></a>
    <br /><br />
</div>            <div class="centercontent">                <div id="contentwrapper" class="contentwrapper">            <div class="contenttitle2">                <h3>添加设备</h3>            </div><!--contenttitle-->        	            <div id="validation" class="subcontent">            	                    <form id="form1" class="stdform" method="post" action="">                    	<p>                        	<label>设备编号</label>                            <span class="field"><input type="text" name="number" id="number" class="smallinput" /></span>                        </p>                                                <p>                        	<label>设备二维码</label>                            <span class="field"><input type="file" name="attchment" id="attchment"/></span>                        </p>                        <br />                                                <p class="stdformbutton">                        	<button class="submit radius2">提 交</button>                            <button type="button" class="backbutton" onclick="history.back()">返 回</button>                        </p>                    </form>            </div><!--subcontent-->                </div><!--contentwrapper-->        	</div><!-- centercontent -->        </div><!--bodywrapper--></body></html>