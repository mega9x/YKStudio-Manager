<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional
.dtd">
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
 <!-- 合同记录必填项提示
 function CheckInput()
 {
 if (1=="0"){if(document.all.hNum.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content
: '合同编号不能为空！'});document.all.hNum.focus();return false;}}
 if (0=="1"){if(document.all.oId.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content
: '订单编号不能为空！'});document.all.oId.focus();return false;}}
 if (1=="1"){if(document.all.hSdate.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content
: '起始时间不能为空！'});document.all.hSdate.focus();return false;}}
 if (1=="1"){if(document.all.hEdate.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content
: '到期时间不能为空！'});document.all.hEdate.focus();return false;}}
 if (1=="1"){if(document.all.hType.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content
: '合同分类不能为空！'});document.all.hType.focus();return false;}}
 if (1=="1"){if(document.all.hMoney.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content
: '总金额不能为空！'});document.all.hMoney.focus();return false;}}
 if (1=="1"){if(document.all.hRevenue.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning'
,content: '已收款不能为空！'});document.all.hRevenue.focus();return false;}}
 if (1=="1"){if(document.all.hInvoice.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning'
,content: '提供发票不能为空！'});document.all.hInvoice.focus();return false;}}
 if (1=="1"){if(document.all.hTax.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content
: '是否含税不能为空！'});document.all.hTax.focus();return false;}}
 if (0=="1"){if(document.all.hContent.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning'
,content: '详情备注不能为空！'});document.all.hContent.focus();return false;}}
 }
 -->
 </script>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
 <form name="Save" action="<?php echo site_url('contract/audit')?>?id=<?php echo $id?>" method="post" onSubmit="return CheckInput();">
 
 <tr>
 <td valign="top" class="td_n pdl10 pdr10 pdt10"> 状态：
 <input name="state" type="radio" value="1" <?php echo $state=='1' ? 'checked' : ''?> >
 合同有效
 <input name="state" type="radio" value="2" <?php echo $state=='2' ? 'checked' : ''?>>
 合同无效
 <input name="state" type="radio" value="3" <?php echo $state=='3' ? 'checked' : ''?>>
 转待审
 </td>
 </tr>
 <tr>
 <td valign="top" class="td_n pdl10 pdr10 pdt10"><textarea name="auditreasons" rows="4" id="hAuditReasons" class="int" style="height:80px;width:98%;"><?php echo $auditreasons?></textarea></td>
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