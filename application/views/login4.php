<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<title>用户登录</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>theme/login/css/login1.css?4"/>
<link href="<?php echo base_url()?>theme/login/04/css/style.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo base_url()?>theme/login/04/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>theme/login/04/js/all.js"></script>
<!--[if IE]>
<script src="<?php echo base_url()?>theme/login/js/html5shiv.min.js"></script>
<![endif]-->
</head>
<body class="custom-background">
<div class="snow-container">
</div>
<form name="loginForm" method="post" action="<?php echo site_url('login');?>?token=<?php echo set_token()?>" autocomplete="off" onSubmit="return check();">
<div class="logo_box">
	<h3><img src="<?php echo base_url()?>theme/login/images/avatar.png" class="imguser"><br>
	 用户登录</h3>
	<div class="input_outer">
		<span class="u_user"></span><input id="uName" name="username" class="text" onfocus=" if(this.value='请输入用户名') this.value=''" onBlur="if(this.value=='') this.value='请输入用户名'" value="请输入用户名" style="color: #FFFFFF !important" type="text">
	</div>
	<div class="input_outer">
		<span class="us_uer"></span><label class="l-login login_password" style="display: block;">请输入密码</label><input id="uPassword" name="userpwd" class="text" style="color: #FFFFFF !important; position:absolute; z-index:100;" onfocus="$('.login_password').hide()" onblur="if(this.value=='') $('.login_password').show()" value="" type="password">
	</div>
	<div class="mb2">
		<input id="submit" type="Submit" name="Submit" value="登 录" class="act-but submit">
		<div style="text-align:center; color:#fff; margin-top:20px;">
			<span id="save1" style="padding:5px 10px;"></span>
		</div>
	</div>
	<div class="admintip">
	</div>
</div>
 </form>
</body>
</html>