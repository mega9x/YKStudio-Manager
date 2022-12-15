<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url()?>theme/default/css/common.css" rel="stylesheet" type="text/css">
<script language="javascript" src="<?php echo base_url()?>theme/default/js/Common.js"></script>
<script language="javascript" src="<?php echo base_url()?>theme/default/js/jquery.min.js"></script>
<script language="javascript" src="<?php echo base_url()?>theme/default/js/tips.js"></script>
<script src="<?php echo base_url()?>theme/default/js/jquery.artDialog.js?skin=default"></script>
<script src="<?php echo base_url()?>theme/default/js/iframeTools.js"></script>
<style>
label { display: block; cursor: pointer; }
.okon, .okon_bt, .okon_yc, .qxon { display: none; }
.okon_on_yes { background: #108A54; height: 35px; line-height: 35px; color: #fff; font-weight: bold; }
.okon_bt_yes { background: #C00; height: 35px; line-height: 35px; color: #fff; font-weight: bold; }
.okon_yc_yes { background: #999; height: 35px; line-height: 35px; color: #fff; font-weight: bold; }
.qxyes { background: #099; height: 35px; line-height: 35px; color: #fff; font-weight: bold; }
.qxno { }
</style>
<script language="JavaScript">
//显示
var funxs=function(){
 
var okon = document.getElementsByClassName('okon');
for (i = 0; i <= okon.length; i++) {
 //alert(i)
 if (okon[i].checked) {
 okon[i].parentNode.className = "okon_on_yes";
 } else {
 okon[i].parentNode.className = "okonno";
 }
 okon[i].onclick = function() {
 if (this.checked) {
 this.parentNode.className = "okon_on_yes";
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
 okon_bt[i].parentNode.className = "okon_bt_yes";
 } else {
 okon_bt[i].parentNode.className = "okonno";
 }
 okon_bt[i].onclick = function() {
 if (this.checked) {
 this.parentNode.className = "okon_bt_yes";
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
 okon_yc[i].parentNode.className = "okon_yc_yes";
 } else {
 okon_yc[i].parentNode.className = "okonno";
 }
 okon_yc[i].onclick = function() {
 if (this.checked) {
 this.parentNode.className = "okon_yc_yes";
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
 if(document.getElementById('gId').value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content: '部门编号不能为空！'});document.getElementById('gId').focus();return false;}
 if(document.getElementById('gName').value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content: '部门名称不能为空！'});document.getElementById('gName').focus();return false;}
 }
 -->
 </script>

<form name="Save" action="<?php echo site_url('group/edit')?>?id=<?php echo $id?>" method="post" onSubmit="return CheckInput();">
 <table width="100%" border="0" cellpadding="0" cellspacing="0">
 <tr>
 <td valign="top" class="td_n pdl10 pdr10 pdt10"><table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1">
 <col width="100" />
 <tr class="tr_t">
 <td class="td_l_l" COLSPAN="2"><B>修改部门 </B></td>
 </tr>
 <tr style="display:none;">
 <td class="td_l_r title">部门编号</td>
 <td class="td_l_l"><input  type="text" class="int" id="gId" onkeyup='this.value=this.value.replace(/\D/gi,"")' value="7" size="10" maxlength="2" >
 <span class="info_help help01">限：数字 1 - 99</span></td>
 </tr>
 <tr>
 <td class="td_l_r title">部门名称</td>
 <td class="td_l_l"><input name="name" type="text" class="int" id="gName" size="30" value="<?php echo $name?>" maxlength="16" ></td>
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
