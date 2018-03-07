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
        
    <div class="centercontent tables">
    
        <div id="contentwrapper" class="contentwrapper">
                
            <div class="contenttitle2">
            	<h3>手机:<?php echo ($row["userPhone"]); ?>消费流水</h3>
            </div><!--contenttitle-->
            
            <div class="tableoptions">
                <form method="GET" action="">
                    <label>
                        <input id="start" name="start" type="text"  placeholder="开始日期" value="<?php echo ($start); ?>"/>
                        -
                        <input id="end" name="end" type="text" placeholder="结束日期" value="<?php echo ($end); ?>" />
                    </label> 
                    &nbsp;
                    <button type="submit">查询</button>
                    &nbsp;
                    累计充值总和:<?php echo ($ctotal); ?>元
                    &nbsp;
                    累计消费总和:<?php echo ($xtotal); ?>元
                </form>
            </div>

            <!--tableoptions-->	

            <form name="form" id="form" method="POST" action="">
                <table cellpadding="0" cellspacing="0" border="0" class="stdtable stdtablecb" id="tab">
                    <colgroup>
                        <col class="con0" style="width: 4%" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="head0" align="center">
                                <input type="checkbox" class="checkall" />
                            </th>
                            <th class="head1">序号</th>
                            <th class="head0">类型</th>
                            <th class="head0">金额</th>
                            <th class="head1">设备</th>
                            <th class="head0">时间</th>
                            <th class="head1">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(!empty($rows)): if(is_array($rows)): $k = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$i): $mod = ($k % 2 );++$k;?><tr>
                            <td align="center">
                                <input type="checkbox" name="id[]" value="<?php echo ($i["userId"]); ?>" />
                            </td>
                            <td>
                                <?php if(($p) == ""): echo ($k); ?>
                                <?php else: ?>
                                <?php echo ($length*($p-1)+$k); endif; ?>
                            </td>
                            <td>
                                <?php if(($i["recordType"] == 0)): ?>支出
                                <?php elseif(($i["recordType"] == 1)): ?>
                                赠送
                                <?php elseif(($i["recordType"] == 2)): ?>
                                充值<?php endif; ?>
                            </td>
                            <td>
                                <?php if(($i["recordType"] == 0)): ?>-
                                <?php elseif(($i["recordType"] == 1)): ?>
                                +
                                <?php elseif(($i["recordType"] == 2)): ?>
                                +<?php endif; ?>
                                <?php echo ($i["amount"]); ?>
                            </td>
                            <td><?php echo ($i["deviceNo"]); ?></td>
                            <td><?php echo ($i["recordTime"]); ?></td>
                            <td class="center">
                                <a href="/easy-city/index.php/Admin/User/del/id/<?php echo ($i["recordId"]); ?>" onclick="return confirm('确定要删除吗?')">删除</a></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    <?php else: ?>
                        <tr><td colspan="7" align="center">暂无信息...</td></tr><?php endif; ?>
                    </tbody>
                </table>

                <div class="dataTables_paginate paging_full_numbers" id="dyntable_paginate">
                    <button type="button" class="deletebutton">删除选中</button>
                    <?php echo ($page); ?>
                </div>
            </form>
        
        </div><!--contentwrapper-->
        
	</div><!-- centercontent -->
    
    
</div><!--bodywrapper-->
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#start').datetimepicker({
            timeFormat: "HH:mm:ss",
            dateFormat: "yy-mm-dd"
        });
        jQuery('#end').datetimepicker({
            timeFormat: "HH:mm:ss",
            dateFormat: "yy-mm-dd"
        });
    });
</script>
</body>
</html>