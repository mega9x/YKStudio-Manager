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
<link href="<?php echo base_url()?>theme/default/css/jquery.vtip.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url()?>theme/default/js/jquery.vtip.js"></script>
</head>
<body>



<script language="JavaScript">
 <!-- 合同到款记录必填项提示
 function CheckInput()
 {
 if(document.all.rEdate.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content: '到期
时间不能为空！'});document.all.rEdate.focus();return false;}
 }
 -->
 </script>
<form name="Save" action="<?php echo site_url('contract/addrevenue')?>?id=<?php echo $id?>" method="post" onSubmit="return CheckInput();">
 <table width="100%" border="0" cellpadding="0" cellspacing="0">
 <tr>
 <td valign="top" class="td_n pdl10 pdr10 pdt10"><table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1">
 <col width="100" />
 <col  />
 <tr class="tr_t">
 <td class="td_l_l" COLSPAN="2"><B>新增到款</B></td>
 </tr>
 <tr>
 <td class="td_l_r title"><font color="#FF0000">*</font> 到款金额</td>
 <td class="td_r_l">
 <input name="revenue" type="text" id="hRevenue" class="int" size="10" value="0" onFocus="if (value =='0'){value =''}"onblur="if (value ==''){value='0'}" />元</td>
 </tr>
 <tr>
 <td class="td_l_r title">详情备注</td>
 <td class="td_r_l" style="padding:5px 10px;">
 <textarea name="content" rows="4" id="eContent" class="int" style="height:50px;width:95%;"></textarea></td>
 </tr>
 </table></td>
 </tr>
 </table>
 <div class="h50b"></div>
 <div class="fixed_bg_B">
 <table width="100%" border="0" cellpadding="0" cellspacing="0">
 <tr>
 <td valign="top" class="td_n Bottom_pd ">
 <input type="submit"  class="btn2 btnbaoc" value="保存" >
 <input name="Back" type="button" id="Back" class="btn2 btnguanb" value="关闭" onClick="art.dialog.close();"></td>
 </tr>
 </table>
 </div>
</form>

<script src="<?php echo base_url()?>theme/default/WdatePicker.js"></script>
</body>
</html>
 