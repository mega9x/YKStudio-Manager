<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url()?>theme/default/css/common.css" rel="stylesheet" type="text/css">
<script language="javascript" src="<?php echo base_url()?>theme/default/js/Common.js"></script>
<script language="javascript" src="<?php echo base_url()?>theme/default/js/jquery.min.js"></script>
<script language="javascript" src="<?php echo base_url()?>theme/default/js/tips.js"></script>
<script src="<?php echo base_url()?>theme/default/js/jquery.artDialog.js?skin=default"></script>
<script src="<?php echo base_url()?>theme/default/js/iframeTools.js"></script>
</head>
<body style="padding-bottom:50px;">

<script language="JavaScript">
 <!-- 跟单记录必填项提示
 function CheckInput()
 {
 if(document.all.reason.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content: '不
能为空！'});document.all.reason.focus();return false;}
 }
 -->
</script>
 <table width="100%" border="0" cellpadding="0" cellspacing="0">
 
 <form name="Save" action="<?php echo site_url('single/reason')?>?id=<?php echo $id?>" method="post" onSubmit="return CheckInput();">
 <tr>
 <td valign="top" class="td_n pdl10 pdr10 pdt10"> 
 <textarea name="reason" rows="4" id="lReason" class="int" style="height:80px;width:98%;"></textarea>
 </td>
 </tr>
 </table>
<div class="fixed_bg_B">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
 <tr>
 <td valign="top" class="td_n Bottom_pd "> 
<input type="submit" id="submit" class="btn2 btnbaoc" value="保存">
<input name="Back" type="button" id="Back" class="btn2 btnguanb" value="关闭" onClick="art.dialog.close();"> 
 </td>
 </tr>
</table>
</div>
 </form>

<script src="<?php echo base_url()?>theme/default/WdatePicker.js"></script>
</body>
</html>
