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
</head>
<body>

<script language="JavaScript">
 <!-- 收支记录必填项提示
 function CheckInput()
 {
 if (<?php echo isset($value['bt_edate']) ? 1 : 0?>=="1"){if(document.all.eDate.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content: '收支日期不能为空！'});document.all.eDate.focus();return false;}}
 if (<?php echo isset($value['bt_type']) ? 1 : 0?>=="1"){if(document.all.eType.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content: '收支类别不能为空！'});document.all.eType.focus();return false;}}
 if (<?php echo isset($value['bt_money']) ? 1 : 0?>=="1"){if(document.all.eMoney.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content: '总金额不能为空！'});document.all.eMoney.focus();return false;}}
 if (<?php echo isset($value['bt_content']) ? 1 : 0?>=="1"){if(document.all.eContent.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content: '详情备注不能为空！'});document.all.eContent.focus();return false;}}
 }
 -->
 </script>

<form name="Save" action="<?php echo site_url('financier/edit')?>?id=<?php echo $id?>" method="post" onSubmit="return CheckInput();">
 <table width="100%" border="0" cellpadding="0" cellspacing="0">
 <tr>
 <td valign="top" class="td_n pdl10 pdr10 pdt10"><table width="100%" border="0" cellspacing="0" cellpadding
="0" CLASS="table_1">
 <col width="120" />
 <tr class="tr_t">
 <td class="td_l_l" COLSPAN="4"><B>修改
 记录</B></td>
 </tr>
 <tr>
 <td class="td_l_r title">
 <?php echo isset($value['bt_edate']) ? '<font color="#FF0000">*</font>' : ''?>
 收支日期</td>
 <td class="td_r_l"><input name="edate" type="text" id="eDate" class="Wdate int" size="15" onFocus="WdatePicker
({dateFmt:'yyyy-MM-dd'})" value="<?php echo $edate?>" /></td>
 </tr>
 <tr>
 <td class="td_l_r title">
 <?php echo isset($value['bt_type']) ? '<font color="#FF0000">*</font>' : ''?>
 收支类别</td>
 
 <td class="td_r_l"><select name="type" id="Select_ExpenseIN"><option value="">请选择</option>
 <?php foreach($select_expense as $arr=>$row) {?>
 <option value="<?php echo $row['name']?>" <?php echo $type==$row['name'] ? 'selected' : ''?>><?php echo $row['name']?></option>
 <?php }?>
 </select>
 &nbsp; </td>
 
 </tr>
 <tr>
 <td class="td_l_r title">
 <?php echo isset($value['bt_money']) ? '<font color="#FF0000">*</font>' : ''?>
 总金额</td>
 <td class="td_r_l"><input name="money" type="text" id="eMoney" class="int" size="10" value="<?php echo $money?>" onFocus="if (value =='0'){value =''}"onblur="if (value ==''){value='0'}" />
 元</td>
 </tr>
 <tr>
 <td class="td_l_r title">
  <?php echo isset($value['bt_content']) ? '<font color="#FF0000">*</font>' : ''?>
 详情备注</td>
 <td class="td_r_l" colspan=3 style="padding:5px 10px;">
 <textarea name="content" rows="4" id="eContent" class="int" style="height:80px;width:99%;"><?php echo $content?></textarea></td>
 </tr>
 </table></td>
 </tr>
 </table>
 <div class="h50b"></div>
 <div class="fixed_bg_B">
 <table width="100%" border="0" cellpadding="0" cellspacing="0">
 <tr>
 <td valign="top" class="td_n Bottom_pd "> 
 <input type="submit" class="btn2 btnbaoc" value="保存" >
 <input name="Back" type="button" id="Back" class="btn2 btnguanb" value="关闭" onClick="art.dialog.close
();"></td>
 </tr>
 </table>
 </div>
</form>

<script src="<?php echo base_url()?>theme/default/WdatePicker.js"></script>
</body>
</html>

