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
<script language="JavaScript">
//显示
var funxs=function(){
 
var okon = document.getElementsByClassName('okon');
for (i = 0; i <= okon.length; i++) {
 //alert(i)
 if (okon[i].checked) {
 okon[i].parentNode.className = "okon_on";
 } else {
 okon[i].parentNode.className = "okonno";
 }
 okon[i].onclick = function() {
 if (this.checked) {
 this.parentNode.className = "okon_on";
 } else {
 this.parentNode.className = "okonno";
 }
 }
} 
 
}
//必填 
var funbt=function(){
 
var okon_bt = document.getElementsByClassName('okon_bt');
for (i = 0; i <= okon_bt.length; i++) {
 //alert(i)
 if (okon_bt[i].checked) {
 okon_bt[i].parentNode.className = "okon_on";
 } else {
 okon_bt[i].parentNode.className = "okonno";
 }
 okon_bt[i].onclick = function() {
 if (this.checked) {
 this.parentNode.className = "okon_on";
 } else {
 this.parentNode.className = "okonno";
 }
 }
} 
 
 
}
//隐藏 
var funyc=function(){
 
var okon_yc = document.getElementsByClassName('okon_yc');
for (i = 0; i <= okon_yc.length; i++) {
 //alert(i)
 if (okon_yc[i].checked) {
 okon_yc[i].parentNode.className = "okon_on";
 } else {
 okon_yc[i].parentNode.className = "okonno";
 }
 okon_yc[i].onclick = function() {
 if (this.checked) {
 this.parentNode.className = "okon_on";
 } else {
 this.parentNode.className = "okonno";
 }
 }
} 
 
}
//权限 
var funqx=function(){
 
var qxon = document.getElementsByClassName('qxon');
for (i = 0; i <= qxon.length; i++) {
 //alert(i)
 if (qxon[i].checked) {
 qxon[i].parentNode.className = "qxyes";
 } else {
 qxon[i].parentNode.className = "qxno";
 }
 qxon[i].onclick = function() {
 if (this.checked) {
 this.parentNode.className = "qxyes";
 } else {
 this.parentNode.className = "qxno";
 }
 }
} 
 
 
}
</script>
</head>
<body>

<script language="JavaScript">
 <!-- 必填项提示
 function CheckInput()
 {
 if(document.getElementById('account').value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning'
,content: '登录账号不能为空！'});document.getElementById('account').focus();return false;}
 if(document.getElementById('name').value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content
: '真实姓名不能为空！'});document.getElementById('name').focus();return false;}
 if(document.getElementById('password').value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning'
,content: '登录密码不能为空！'});document.getElementById('password').focus();return false;}
 if(document.getElementById('password').value != document.getElementById('confirmPWS').value){art.dialog
({title: 'Error',time: 1,icon: 'warning',content: '两次输入的密码不一样！'});document.getElementById('password'
).focus();return false;}
 if(document.getElementById('level').value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning'
,content: '系统角色不能为空！'});document.getElementById('level').focus();return false;}
 if(document.getElementById('group').value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning'
,content: '所属部门不能为空！'});document.getElementById('group').focus();return false;}
 if(document.getElementById('Mobile').value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning'
,content: '合作站点不能为空！'});document.getElementById('Mobile').focus();return false;}
 if(document.getElementById('Email').value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning'
,content: 'E-mail不能为空！'});document.getElementById('Email').focus();return false;}
 }
 -->
 </script>

<span class="MenuboxS">
<ul>
 <li class="hover"><span><a href="#">添加员工</a></span></li>
 <!--<li><span><a href="#" style="text-decoration:line-through;color:#999">管理范围</a></span></li>
 <li><span><a href="#" style="text-decoration:line-through;color:#999">详细权限</a></span></li>-->
</ul>
</span>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<form name="Save" action="<?php echo site_url('user/add')?>" method="post" onSubmit="return CheckInput();">
 <tr>
 <td valign="top" class="td_n pdl10 pdr10 pdt10"><table width="100%" border="0" cellspacing="0" cellpadding
="0" CLASS="table_1">
 <col width="120" />
 <col width="260" />
 <col width="120" />
 <tr class="tr_t">
 <td class="td_l_l" COLSPAN="3" style="border-right:0;"><B>基本信息 </B></td>
 <td class="td_l_r"></td>
 </tr>
 <tr>
 <td nowrap="nowrap" class="td_l_r title"><font color="#FF0000">*</font> 登录账号</td>
 <td class="td_l_l"><input name="username" type="text" class="int" id="account" size="20" maxlength="16"
>
 <span class="info_help help01" onMouseOver="tip.start(this)" title="录入后不可修改">&nbsp;</span></td>
 <td class="td_l_r title"><font color="#FF0000">*</font> 真实姓名</td>
 <td class="td_l_l"><input name="name" type="text" class="int" id="name" size="20" maxlength="16"></td
>
 </tr>
 <tr>
 <td nowrap="nowrap" class="td_l_r title"><font color="#FF0000">*</font> 登录密码</td>
 <td class="td_l_l"><input name="userpwd" type="password" class="int" id="password" size="20" maxlength
="16"></td>
 <td class="td_l_r title"><font color="#FF0000">*</font> 重复密码</td>
 <td class="td_l_l"><input name="confirmpwd" type="password" class="int" id="confirmPWS" size="20" maxlength
="16"></td>
 </tr>
 <tr>
 <td nowrap="nowrap" class="td_l_r title"><font color="#FF0000">*</font> 系统权限</td>
 <td class="td_l_l">
 <select name='roleid' class='int'>
 <option value="">请选择</option>
 <option value="0">超级管理员</option>
 <?php foreach($role as $arr=>$row) {?>
 <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
 <?php }?>
 </select></td>
 <td class="td_l_r title"><font color="#FF0000">*</font> 所属部门</td>
 <td class="td_l_l"><select name='groupid' class='int'><option value="">请选择</option>
 <?php foreach($select_group as $arr=>$row) {?>
 <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
 <?php }?>
 </select>
 </td>
 </tr>
 <tr>
 <td nowrap="nowrap" class="td_l_r title"><font color="#FF0000">*</font> 手机</td>
 <td class="td_l_l"><input name="mobile" type="text" class="int" id="Mobile" size="20" maxlength="16"
></td>
 <td class="td_l_r title"><font color="#FF0000">*</font> E-mail</td>
 <td class="td_l_l"><input name="email" type="text" class="int" id="Email" size="30"></td>
 </tr>
 <tr>
 <td nowrap="nowrap" class="td_l_r title">生日</td>
 <td class="td_l_l"><input name="birthday" type="text" id="Birthday" class="int Wdate" size="20" onFocus="WdatePicker()"></td>
 <td class="td_l_r title">入司时间</td>
 <td class="td_l_l"><input name="adddate" type="text" id="addtime" class="int Wdate" size="20" onFocus="WdatePicker()"></td>
 </tr>
 </table></td>
 </tr>
 

</table>
<div class="fixed_bg_B">
 <table width="100%" border="0" cellpadding="0" cellspacing="0">
 <tr>
 <td valign="top" class="td_n Bottom_pd ">
 <input type="submit" class="btn2 btnbaoc" value="保存">
 <input name="Back" type="button" id="Back" class="btn2 btnguanb" value="关闭" onClick="art.dialog.close();"></td>
 </tr>
 </table>
 </div>
  </form>

<script src="<?php echo base_url()?>theme/default/WdatePicker.js"></script>
</body>
</html>

