<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url()?>theme/default/css/common.css" rel="stylesheet" type="text/css">
<script>
var common_getarea  = "<?php echo site_url('common/getarea')?>";
var common_gettrade = "<?php echo site_url('common/gettrade')?>";
var common_customer_check  = "<?php echo site_url('common/customer_check')?>";
</script>
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
 function CheckInput(){
 if(document.getElementById('pBigClass').value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning'
,content: '商品大类 不能为空！'});document.getElementById('pBigClass').focus();return false;}
 if(document.getElementById('Strade').value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning'
,content: '商品小类 不能为空！'});document.getElementById('Strade').focus();return false;}
 if(document.getElementById('pTitle').value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning'
,content: '产品名 不能为空！'});document.getElementById('pTitle').focus();return false;}
 if(document.getElementById('pUprice').value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning'
,content: '价格 不能为空！'});document.getElementById('pUprice').focus();return false;}
 }
 </script>
<style>
body{overflow-y:hidden}
</style>
<form name="Save" action="<?php echo site_url('product/add')?>" method="post">
 <table width="100%" border="0" cellpadding="0" cellspacing="0">
 <tr>
 <td valign="top" class="td_n pdl10 pdr10 pdt10"><script language="javascript" src="<?php echo base_url()?>theme/default/js/Ajax.js?1"></script>
 <table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1">
 <col width="100" />
 <tr class="tr_t">
 <td class="td_l_l" COLSPAN="2"><B>详细内容</B></td>
 </tr>
 <tr>
 <td class="td_l_r title">分类</td>
 <td class="td_l_l">
 <select name="trade" class="int" onChange="getTrade(this.options[this.selectedIndex].id);">
 <option value="">请选择</option>
  <?php foreach($classlist as $arr=>$row) {?>
 <option value="<?php echo $row['name']?>" id="<?php echo $row['id']?>"><?php echo $row['name']?></option>
 <?php }?> 
 </select>
 <span id="Stradediv"  style="margin-left:10px;padding:0;">
 <select name="strade" class="int">
 <option value="">未选择大类</option>
 </select>
 </span>
</td>
 </tr>
 <tr>
 <td class="td_l_r title">产品名</td>
 <td class="td_l_l"><input name="title" type="text" id="pTitle" class="int" size="40" /></td>
 </tr>
 
 <tr>
 <td class="td_l_r title">规格</td>
 <td class="td_l_l"><input name="property1" type="text" id="cp_ziduan1" class="int" size="30" /></td
>
 </tr>
 
 <tr>
 <td class="td_l_r title">型号</td>
 <td class="td_l_l"><input name="property2" type="text" id="cp_ziduan2" class="int" size="30" /></td>
 </tr>
 
 <tr>
 <td class="td_l_r title">商品库存</td>
 <td class="td_l_l">
 <input name="qtys" type="text" id="cp_ziduan4" class="int" size="20" />
 当商品存库低于
 <input name="minqty" type="text" class="int" id="cp_ziduan3" value="10" size="10" />
 时告警！
 </td>
 </tr>
 
 <tr>
 <td class="td_l_r title">成本单价</td>
 <td class="td_l_l"><input name="purprice" type="text" id="cp_ziduan5" class="int" size="20" />
 元</td>
 </tr>
 
 <tr>
 <td class="td_l_r title">销售单价</td>
 <td class="td_l_l"><input name="saleprice" type="text" id="pUprice" class="int" size="20" />
 元</td>
 </tr>
 </table></td>
 </tr>
 </table>
 <div class="h50b"></div>
<div class="fixed_bg_B">
 <table width="100%" border="0" cellpadding="0" cellspacing="0">
 <tr>
 <td valign="top" class="td_n Bottom_pd ">
 <input type="submit" id="submit" class="btn2 btnbaoc" value="保存">
 <input name="Back" type="button" id="Back" class="btn2 btnguanb" value="关闭" onClick="art.dialog.close();"> 
 </tr>
 </table>
 </div>
</form>

<script src="<?php echo base_url()?>theme/default/WdatePicker.js"></script>
</body>
</html>


 