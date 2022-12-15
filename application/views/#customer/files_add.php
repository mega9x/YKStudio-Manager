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

<script language="JavaScript">
 <!-- 附件记录必填项提示
 function CheckInput()
 {
 if(document.all.fFile.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content: '未选择要上传的附件！'});document.all.fFile.focus();return false;}
 }
 -->
 </script>

<form name="Save" action="<?php echo site_url('customer/files_add')?>" method="post" enctype="multipart/form-data" onSubmit="return CheckInput();">
 <table width="100%" border="0" cellpadding="0" cellspacing="0">
 <tr>
 <td valign="top" class="td_n pdl10 pdr10 pdt10"><table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1">
 <col width="120" />
 <tr class="tr_t">
 <td class="td_l_l" COLSPAN="2"><B>新增附件记录</B></td>
 </tr>
 <tr>
 <td class="td_l_r title"><font color="#FF0000">*</font> 请选择</td>
 <td class="td_r_l" style="padding:5px 10px;"><input name="file" type="file" id="fFile" value="" class
="int"></td>
 </tr>
 <tr>
 <td class="td_l_r title">详情备注</td>
 <td class="td_r_l" style="padding:5px 10px;"><textarea name="content" rows="4" id="fContent" class="int" style="height:50px;width:98%;"></textarea></td>
 </tr>
 </table></td>
 </tr>
 </table>
 <div class="fixed_bg_B">
 <table width="100%" border="0" cellpadding="0" cellspacing="0">
 <tr>
 <td valign="top" class="td_n Bottom_pd ">
 <input name="customerid"  type="hidden"  value="<?php echo $id ?>">
 <input name="customername"  type="hidden"  value="<?php echo $name ?>">
     
 <input type="submit" class="btn2 btnbaoc" onClick="fTitle.value=/[^\\]+\.\w+$/.exec(fFile.value)[0]" value="保存">
 <input name="Back" type="button" id="Back" class="btn2 btnguanb" value="关闭" onClick="art.dialog.close();"
></td>
 </tr>
 </table>
 </div>
</form>

<script src="<?php echo base_url()?>theme/default/WdatePicker.js"></script>
</body>
</html>

 