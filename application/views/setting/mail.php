<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url()?>theme/default/css/common.css" rel="stylesheet" type="text/css">
<script language="javascript" src="<?php echo base_url()?>theme/default/js/Common.js"></script>
<script language="javascript" src="<?php echo base_url()?>theme/default/js/jquery.min.js"></script>
<script language="javascript" src="<?php echo base_url()?>theme/default/js/tips.js"></script>
<script src="<?php echo base_url()?>theme/default/js/jquery.artDialog.js?skin=default"></script>
<script src="<?php echo base_url()?>theme/default/js/iframeTools.js"></script>
<script src="<?php echo base_url()?>theme/default/js/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>theme/default/css/sweetalert.css">
<!--选项按钮美化-->
<link rel="stylesheet" href="<?php echo base_url()?>theme/default/css/jquery-labelauty.css" />
 
<link href="<?php echo base_url()?>theme/default/css/jquery.vtip.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url()?>theme/default/js/jquery.vtip.js"></script>
</head>
<body>
<span class="MenuboxS">
<ul>
 <li ><span><a href="<?php echo site_url('setting')?>">基本设置</a></span></li>
 <li ><span><a href="<?php echo site_url('zicon')?>">自定义图标</a></span></li>
 <li class="hover"><span><a href="<?php echo site_url('setting/mail')?>">邮箱配置</a></span></li>
 <li ><span><a href="<?php echo site_url('select')?>">选项值设置</a></span></li>
 <li ><span><a href="<?php echo site_url('group')?>">部门设置</a></span></li>
 <li ><span><a href="<?php echo site_url('role')?>">权限设置</a></span></li>
</ul>
</span>
<div id="setxhing">

<div class="allpage" style="padding:10px;">
 <form name="mailset" method="post" action="<?php echo site_url('setting/mail')?>">
 <table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1">
 <col width="60" />
 <col width="260" />
 <col width="60" />
 <col width="260" />
 <tr class="tr_t">
 <td class="td_l_l" COLSPAN="6">发件箱设置</td>
 </tr>
 <tr class="tr">
 <td class="td_l_c title">SMTP：</td>
 <td class="td_r_l"><input name="mail_smtp" type="text" class="int" id="t0" size="40" value="<?php echo MAIL_SMTP?>"></td>
 <td class="td_l_c title">端口</td>
 <td class="td_r_l"><input name="mail_port" type="text" class="int" id="E_Port" size="40" value="<?php echo MAIL_PORT?>"  /></td>
 </tr>
 <tr class="tr">
 <td class="td_l_c title">发件箱：</td>
 <td class="td_r_l"><input name="mail_user" type="text" class="int" id="t1" size="40" value="<?php echo MAIL_USER?>"  /></td>
 <td class="td_l_c title">密码：</td>
 <td class="td_r_l"><input name="mail_pwd" type="password" class="int" id="t2" size="40" value="<?php echo MAIL_PWD?>" /></td>
 </tr>
 <tr class="tr">
 <td class="td_l_c title">显示邮箱：</td>
 <td class="td_r_l"><input name="mail_admin" type="text" class="int" id="t3" size="40" value="<?php echo MAIL_ADMIN?>" /></td>
 <td class="td_l_c title">发件者名称：</td>
 <td class="td_r_l"><input name="mail_name" type="text" class="int" id="t4" size="40" value="<?php echo MAIL_NAME?>"  /></td>
 </tr>
 </table>
 <div class="h50b"></div>
 <div class="fixed_bg_B">
 <table width="100%" border="0" cellpadding="0" cellspacing="0">
 <tr>
 <td valign="top" class="td_n Bottom_pd "><input type="submit" class="btn2 btnbaoc" value="保 存"></td>
 </tr>
 </table>
 </div>
 </form>
</div>

<script src="<?php echo base_url()?>theme/default/WdatePicker.js"></script> 
<!--选项按钮美化--> 
<script type="text/javascript" src="<?php echo base_url()?>theme/default/js/jquery-labelauty.js"></script> 
<script type="text/javascript">
$(function(){
 $(':input').labelauty();
});
</script>
</body>
</html>

 