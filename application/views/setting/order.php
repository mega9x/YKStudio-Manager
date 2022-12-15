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

<form name="Save" action="<?php echo site_url('setting/config')?>?type=order" method="post"onSubmit="return CheckInput();">
 <table width="100%" border="0" cellpadding="0" cellspacing="0">
 <tr>
 <td valign="top" class="td_n pdl10 pdr10 pdt10"><table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1">
 <col width="25%" />
 <col width="25%" />
 <col width="25%" />
 <col width="25%" />
 <tr class="tr_t">
 <td class="td_l_l" COLSPAN="8"><B>列显示字段</B></td>
 </tr>
 <tr>
 <td colspan="1" class="td_l_c"><label>任务链接
 <input name="linkman" type="checkbox" id="linkman" value="1" <?php echo isset($value['linkman']) ? 'checked' : ''?> class="okon"/>
 </label></td>
 <td colspan="1" class="td_l_c"><label>下单日期
 <input name="sdate" type="checkbox" id="sdate" value="1" <?php echo isset($value['sdate']) ? 'checked' : ''?> class="okon"/>
 </label></td>
 <td colspan="1" class="td_l_c"><label>交单日期
 <input name="edate" type="checkbox" id="edate" value="1" <?php echo isset($value['edate']) ? 'checked' : ''?> class="okon"/>
 </label></td>
 <td colspan="1" class="td_l_c"><label>预付款
 <input name="deposit" type="checkbox" id="deposit" value="1" <?php echo isset($value['deposit']) ? 'checked' : ''?> class="okon"/>
 </label></td>
 </tr>
 <tr>
 <td colspan="1" class="td_l_c"><label>状态
 <input name="state" type="checkbox" id="state" value="1" <?php echo isset($value['state']) ? 'checked' : ''?> class="okon"/>
 </label></td>
 <td colspan="1" class="td_l_c"><label>详情备注
 <input name="content" type="checkbox" id="content" value="1" <?php echo isset($value['content']) ? 'checked' : ''?> class="okon"/>
 </label></td>
 <td colspan="1" class="td_l_c"><label>业务员
 <input name="user" type="checkbox" id="user" value="1" <?php echo isset($value['user']) ? 'checked' : ''?> class="okon"/>
 </label></td>
 <td colspan="1" class="td_l_c"><label>录入时间
 <input name="time" type="checkbox" id="time" value="1" <?php echo isset($value['time']) ? 'checked' : ''?> class="okon"/>
 </label></td>
 </tr>
 </table>
 <script language="JavaScript">funxs();</script></td>
 </tr>
 <tr>
 <td valign="top" class="td_n pdl10 pdr10 pdt10"><table width="100%" border="0" cellspacing="0" cellpadding
="0" CLASS="table_1">
 <col width="25%" />
 <col width="25%" />
 <col width="25%" />
 <col width="25%" />
 <tr class="tr_t">
 <td class="td_l_l" COLSPAN="4"><B>必填项 ( 新增/修改 )</B></td>
 </tr>
 <tr>
 <td class="td_l_c"><label>任务链接
 <input name="bt_linkman" type="checkbox" id="bt_linkman" value="1" <?php echo isset($value['bt_linkman']) ? 'checked' : ''?> class="okon_bt"/
>
 </label></td>
 <td class="td_l_c"><label>下单日期
 <input name="bt_sdate" type="checkbox" id="bt_sdate" value="1" <?php echo isset($value['bt_sdate']) ? 'checked' : ''?> class="okon_bt"/>
 </label></td>
 <td class="td_l_c"><label>交单日期
 <input name="bt_edate" type="checkbox" id="bt_edate" value="1" <?php echo isset($value['bt_edate']) ? 'checked' : ''?> class="okon_bt"/>
 </label></td>
 <td class="td_l_c"><label>预付款
 <input name="bt_deposit" type="checkbox" id="bt_deposit" value="1" <?php echo isset($value['bt_deposit']) ? 'checked' : ''?> class="okon_bt"/>
 </label></td>
 </tr>
 <tr>
 <td class="td_l_c"><label>状态
 <input name="bt_state" type="checkbox" id="bt_state" value="1" <?php echo isset($value['bt_state']) ? 'checked' : ''?> class="okon_bt"/>
 </label></td>
 <td class="td_l_c"><label>详情备注
 <input name="bt_content" type="checkbox" id="bt_content" value="1" <?php echo isset($value['bt_content']) ? 'checked' : ''?> class="okon_bt"/>
 </label></td>
 <td colspan="2" class="td_l_c"></td>
 </tr>
 </table>
 <script language="JavaScript">funbt();</script></td>
 </tr>
 </table>
 <div class="h50b"></div>
 <div class="fixed_bg_B">
 <table width="100%" border="0" cellpadding="0" cellspacing="0">
 <tr>
 <td valign="top" class="td_n Bottom_pd ">
 <input type="submit"  class="btn2 btnbaoc" value="保存">
 <input name="Back" type="button" id="Back" class="btn2 btnguanb" value="关闭" onClick="art.dialog.close();"></td>
 </tr>
 </table>
 </div>
</form>

<script src="<?php echo base_url()?>theme/default/WdatePicker.js"></script>
</body>
</html>