<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>爱德拉-管理后台</title>

<link rel="stylesheet" href="/easy-city/Public/admin/css/style.default.css" type="text/css" />
<link rel="stylesheet" href="/easy-city/Public/admin/css/font-awesome.min.css" />

<script type="text/javascript" src="/easy-city/Public/admin/js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="/easy-city/Public/admin/js/plugins/jquery-ui-1.8.16.custom.min.js"></script>

<script src="/easy-city/Public/admin/js/plugins/timepicker/jquery-ui-timepicker-addon.js" type="text/javascript"></script>
<script src="/easy-city/Public/admin/js/plugins/timepicker/jquery.ui.datepicker-zh-CN.js.js" type="text/javascript" charset="gb2312"></script>
<script src="/easy-city/Public/admin/js/plugins/timepicker/jquery-ui-timepicker-zh-CN.js" type="text/javascript"></script>

<script type="text/javascript" src="/easy-city/Public/admin/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/easy-city/Public/admin/js/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="/easy-city/Public/admin/js/custom/tables.js"></script>

<script type="text/javascript" src="/easy-city/Public/admin/js/plugins/jquery.validate.min.js"></script>
<!--
<script type="text/javascript" src="/easy-city/Public/admin/js/plugins/jquery.tagsinput.min.js"></script>-->
<script type="text/javascript" src="/easy-city/Public/admin/js/plugins/charCount.js"></script>
<!--
<script type="text/javascript" src="/easy-city/Public/admin/js/plugins/ui.spinner.min.js"></script>-->
<script type="text/javascript" src="/easy-city/Public/admin/js/plugins/chosen.jquery.min.js"></script>

<script type="text/javascript" src="/easy-city/Public/admin/js/custom/general.js"></script>
<script type="text/javascript" src="/easy-city/Public/admin/js/custom/forms.js"></script>

<!--editor-->
<link rel="stylesheet" href="/easy-city/Public/admin/js/plugins/editor/themes/default/default.css" />
<link rel="stylesheet" href="/easy-city/Public/admin/js/plugins/editor/plugins/code/prettify.css" />
<script charset="utf-8" src="/easy-city/Public/admin/js/plugins/editor/kindeditor.js"></script>
<script charset="utf-8" src="/easy-city/Public/admin/js/plugins/editor/lang/zh_CN.js"></script>
<script charset="utf-8" src="/easy-city/Public/admin/js/plugins/editor/plugins/code/prettify.js"></script>

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
                        <li><a href="<?php echo U('Setpwd/index');?>">密码设置</a></li>
                        <li><a href="<?php echo U('Index/logout');?>">退出后台</a></li>
                    </ul>
                </div><!--userdata-->
            </div><!--userinfodrop-->
        </div><!--right-->
    </div><!--topheader-->
    
    <div class="header">
    	<ul class="headermenu">
        	<li <?php if(($cname) == "Index"): ?>class="current"<?php endif; ?>>
                <a href="<?php echo U('Index/index');?>"><i class="fa fa-desktop" style="font-size:30px;"></i><br/>首页</a>
            </li>
            <li <?php if(($cname) == "Option"): ?>class="current"<?php endif; ?>><a href="<?php echo U('Option/index');?>"><i class="fa fa-cog" style="font-size:30px;"></i><br/>基本设置</a></li>
            <li <?php if(($cname) == "Machine"): ?>class="current"<?php endif; ?>><a href="<?php echo U('Machine/index');?>"><i class="fa fa-delicious" style="font-size:30px;"></i><br/>设备管理</a></li>
            <li <?php if(($cname) == "User"): ?>class="current"<?php endif; ?>><a href="<?php echo U('User/index');?>"><i class="fa fa-users" style="font-size:30px;"></i><br/>用户记录</a></li>
        </ul>
        
       <div class="headerwidget">
        	<div class="earnings">
            	<div class="one_half">
                	<h4>今日收入</h4>
                    <h2>￥<?php echo ($today_amount); ?></h2>
                </div><!--one_half-->
                <div class="one_half last alignright">
                	<h4>当月收入</h4>
                    <h2>￥<?php echo ($month_amount); ?></h2>
                </div><!--one_half last-->
            </div><!--earnings-->
        </div><!--headerwidget-->
        
    </div><!--header-->
    
    <div class="vernav2 iconmenu">
	<ul>
		<li <?php if(($cname) == "Option"): ?>class="current"<?php endif; ?>><a href="<?php echo U('Option/index');?>"><i class="fa fa-cog"></i> <span class="nav-label">基本设置</span></a></li>
        <li <?php if(($cname) == "Machine"): ?>class="current"<?php endif; ?>><a href="<?php echo U('Machine/index');?>"><i class="fa fa-delicious"></i> <span class="nav-label">设备管理</span></a></li>
        <li <?php if(($cname) == "User"): ?>class="current"<?php endif; ?>><a href="<?php echo U('User/index');?>"><i class="fa fa-users"></i> <span class="nav-label">用户记录</span></a></li>
        <li <?php if(($cname) == "News"): ?>class="current"<?php endif; ?>><a href="<?php echo U('News/index');?>"><i class="fa fa-newspaper-o"></i> <span class="nav-label">新闻管理</span></a></li>
    </ul>
    <a class="togglemenu"></a>
    <br /><br />
</div>
        
    <div class="centercontent">
    
        <div class="pageheader">
            <h1 class="pagetitle">控制台</h1>
            <span class="pagedesc">页面的描述内容</span>
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper">
        
        	<div id="updates" class="subcontent">
                <div class="notibar announcement">
                    <!--<a class="close"></a>-->
                    <h3>官网管理系统功能介绍</h3>
                    <p>
                        1、使用左侧系统功能导航来完成你的管理任务。<br/><br/>
                        2、对数据进行操作时，所有表单中带有 * 符号的项目都是必须要填写的项目。<br/><br/>
                        3、本系统使用完后点击右上角 【退出后台】 项来退出会更安全。<br/><br/>
                        4、请注意：在更新信息时，请谨慎操作，所有数据将无法恢复。<br/><br/>
                        5、即时反馈给我们使用中的错误信息，我们将为您提供更加优质的服务。<br/><br/>
                        如有其它问题，请通过以下途径联系我：
                        Mail：<a href="mailto:44189483@qq.com" title="发送邮件">44189483@qq.com</a> QQ：44189483
                    </p>
                </div><!-- notification announcement -->
            </div><!-- #updates -->
                    
        </div><!--contentwrapper-->
        
        <br clear="all" />
        
	</div><!-- centercontent -->
    
    
</div><!--bodywrapper-->

</body>
</html>