<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>爱德拉后台管理-登录页面</title>
<link rel="stylesheet" href="/easy-city/Public/admin/css/style.default.css" type="text/css" />
<script type="text/javascript" src="/easy-city/Public/admin/js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="/easy-city/Public/admin/js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="/easy-city/Public/admin/js/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="/easy-city/Public/admin/js/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="/easy-city/Public/admin/js/custom/general.js"></script>
<script type="text/javascript" src="/easy-city/Public/admin/js/custom/index.js"></script>
<!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="/easy-city/Public/admin/css/style.ie9.css"/>
<![endif]-->
<!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="/easy-city/Public/admin/css/style.ie8.css"/>
<![endif]-->
<!--[if lt IE 9]>
	<script src="/easy-city/Public/admin/js/plugins/css3-mediaqueries.js"></script>
<![endif]-->
<script type="text/javascript">
    function RefreshImage(valImageId) {
        var objImage = document.images[valImageId];
        if (objImage == undefined) {
            return;
        }
        var now = new Date();
        objImage.src = objImage.src.split('?')[0] + '?x=' + now.toUTCString();
    }
</script>
</head>

<body class="loginpage">
	<div class="loginbox">
    	<div class="loginboxinner">
        	
            <div class="logo">
            	<h1 class="logo">爱德拉.<span>Admin</span></h1>
				<span class="slogan">后台管理系统</span>
            </div><!--logo-->
            
            <br clear="all" /><br />
            
            <div class="tips nousername">
				<div class="loginmsg">用户名必填.</div>
            </div><!--nousername-->
            
            <div class="tips nopassword">
				<div class="loginmsg">密码必填.</div>
            </div><!--nopassword-->

            <div class="tips noprovenum">
                <div class="loginmsg">验证码必填.</div>
            </div><!--noprovenum-->
            
            <form id="login" action="" method="post">
            	
                <div class="username">
                	<div class="usernameinner">
                    	<input type="text" name="username" id="username" />
                    </div>
                </div>
                
                <div class="password">
                	<div class="passwordinner">
                    	<input type="password" name="password" id="password"/>
                    </div>
                </div>

                <div class="icode">
                    <div class="icodeinner">
                        <input type="text" name="provenum" id="provenum" /> <img src="/easy-city/index.php/Admin/Index/provenum" name="imgCaptcha" id="imgCaptcha" onClick="RefreshImage('imgCaptcha');" class="code"/>
                    </div>
                </div>

                <input type="hidden" name="act" value="submit" />
                
                <button>登录</button>
                            
            </form>
            
        </div><!--loginboxinner-->
    </div><!--loginbox-->


</body>
</html>