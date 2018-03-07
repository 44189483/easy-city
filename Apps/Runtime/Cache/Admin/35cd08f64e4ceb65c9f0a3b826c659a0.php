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
        
    </div><!--header-->        <div class="vernav2 iconmenu">
	<ul>
		<li <?php if(($cname) == "Option"): ?>class="current"<?php endif; ?>><a href="<?php echo U('Option/index');?>"><i class="fa fa-cog"></i> <span class="nav-label">基本设置</span></a></li>
        <li <?php if(($cname) == "Machine"): ?>class="current"<?php endif; ?>><a href="<?php echo U('Machine/index');?>"><i class="fa fa-delicious"></i> <span class="nav-label">设备管理</span></a></li>
        <li <?php if(($cname) == "User"): ?>class="current"<?php endif; ?>><a href="<?php echo U('User/index');?>"><i class="fa fa-users"></i> <span class="nav-label">用户记录</span></a></li>
        <li <?php if(($cname) == "News"): ?>class="current"<?php endif; ?>><a href="<?php echo U('News/index');?>"><i class="fa fa-newspaper-o"></i> <span class="nav-label">新闻管理</span></a></li>
    </ul>
    <a class="togglemenu"></a>
    <br /><br />
</div>            <div class="centercontent">                <div id="contentwrapper" class="contentwrapper">            <div class="contenttitle2">                <h3>基本设置</h3>            </div><!--contenttitle-->        	            <div id="validation" class="subcontent">            	                    <form id="form1" class="stdform" method="post" action="">                    	<p>                        	<label>注册</label>                            <span class="field">                            <input type="text" name="register" id="register" class="smallinput" value="<?php echo ($info["register"]); ?>" onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}"                  onafterpaste="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'0')}else{this.value=this.value.replace(/\D/g,'')}"/>                             (赠送金额整数元)</span>                        </p>                                                <p>                        	<label>完善资料</label>                            <span class="field"><input type="text" name="fullinfo" id="fullinfo" class="smallinput" value="<?php echo ($info["fullinfo"]); ?>" onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}"                  onafterpaste="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'0')}else{this.value=this.value.replace(/\D/g,'')}"/> (赠送金额整数元)</span>                        </p>                                                <p>                        	<label>充值返利</label>                            <span class="field"><input type="text" name="delta100" id="delta100" class="smallinput" value="<?php echo ($info["delta100"]); ?>" onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}"                  onafterpaste="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'0')}else{this.value=this.value.replace(/\D/g,'')}"/>% (100元起赠送比整数)</span>                        </p>                                                <p class="stdformbutton">                        	<button type="submit" class="submit radius2">提交</button>                            <button type="button" class="backbutton" onclick="history.back()">返 回</button>                        </p>                    </form>            </div><!--subcontent-->                </div><!--contentwrapper-->        	</div><!-- centercontent -->        </div><!--bodywrapper--></body></html>