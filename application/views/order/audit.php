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
</head>
<body>


<table width="100%" border="0" cellpadding="0" cellspacing="0">
 <form name="Save" action="<?php echo site_url('order/audit')?>?id=<?php echo $id?>" method="post" onSubmit="return CheckInput();">
 
 <tr>
 <td valign="top" class="td_n pdl10 pdr10 pdt10"> 状态：
 <input name="state" type="radio" value="1" <?php echo $state==1 ? 'checked' :''?>>
 已完成　
 <input name="state" type="radio" value="2" <?php echo $state==2 ? 'checked' :''?>>
 处理中 　
 <input name="state" type="radio" value="3" <?php echo $state==3 ? 'checked' :''?>>
 转未处理 </td>
 </tr>
 <tr>
 <td valign="top" class="td_n pdl10 pdr10 pdt10"><textarea name="auditreason" rows="4" id="oAuditReasons" class="int" style="height:80px;width:98%;"><?php echo $auditreason?></textarea></td>
 </tr>
</table>
<div class="fixed_bg_B">
 <table width="100%" border="0" cellpadding="0" cellspacing="0">
 <tr>
 <td valign="top" class="td_n Bottom_pd ">
 <input class="btn2 btnbaoc" type="submit" value="保存" >
<input id="Back" class="btn2 btnguanb" type="button" onclick="art.dialog.close();" value="关闭" name="Back">

</td>
 </tr>
 </table>
</div>
</form>

<script src="<?php echo base_url()?>theme/default/WdatePicker.js"></script>
</body>
</html>