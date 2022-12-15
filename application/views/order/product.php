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
 <!-- 产品必填项提示
 function CheckInput()
 {
 if (=="1"){if(document.all.ProTitle.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning'
,content: '产品名称不能为空！'});document.all.ProTitle.focus();return false;}}
 if (=="1"){if(document.all.oProNum.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content
: '数量不能为空！'});document.all.oProNum.focus();return false;}}
 if (=="1"){if(document.all.oDiscount.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning'
,content: '折扣不能为空！'});document.all.oDiscount.focus();return false;}}
 if (=="1"){if(document.all.oContent.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning'
,content: '详情备注不能为空！'});document.all.oContent.focus();return false;}}
 }
 -->
 </script>

<table width="100%" border="0" cellpadding="0" cellspacing="0" class="top_bg">
 <tr>
 <td width="96%" class="top_left td_t_n td_r_n">订单编号: <?php echo $number?></td>
 <td width="4%" class="top_right td_t_n td_r_n"></td>
 </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
 <tr>
 <td valign="top" class="td_n pdl10 pdr10 pdt10"><table width="100%" border="0" cellspacing="0" cellpadding
="0" CLASS="table_1">
 <tr class="tr_t">
 <td class="td_l_c">序号</td>
 <td class="td_l_c">产品名称</td>
 
 <td class="td_l_c">单价</td>
 <td class="td_l_c">数量</td>
 <td class="td_l_c">折扣</td>
 <td class="td_l_c">总金额</td>
 <td class="td_l_c">业务员</td>
 <td class="td_l_c">录入时间</td>
 <td class="td_l_c">管理</td>
 </tr>
 
 <?php foreach($list as $arr=>$row) {?>
 <tr class="tr">
 <td class="td_l_c"><?php echo $arr+1?></td>
 <td class="td_l_c"><?php echo $row['protitle']?></td>
 <td class="td_l_c"><?php echo $row['proprice']?></td>
 <td class="td_l_c"><?php echo $row['pronum']?></td>
 <td class="td_l_c"><?php echo $row['discount']?></td>
 <td class="td_l_c"><?php echo $row['money']?></td>
 <td class="td_l_c"><?php echo $row['adduser']?></td>
 <td class="td_l_c"><?php echo $row['adddate']?></td>
 <td class="td_l_c">
 <input type="button" class="btn1 btnxiug" value="修改" title="修改"  onclick='Edit<?php echo $row['id']?>()' />
 <input type="button" class="btn1 btnshanc" value="删除" title="删除" onclick='Del<?php echo $row['id']?>()' />
</td>
 </tr>
 <script>function Edit<?php echo $row['id']?>() {$.dialog.open('<?php echo site_url('order/product_edit')?>?id=<?php echo $row['id']?>', {title: '编辑', width: 600,height: 400, fixed: true}); };</script> 
 <script>function Del<?php echo $row['id']?>() {$.dialog( { content: '是否确定删除？',icon: 'error',ok: function () { art.dialog.open('<?php echo site_url('order/product_del')?>?id=<?php echo $row['id']?>');return false;},cancel: true }); };</script>
 <?php }?> 
 </table></td>
 </tr>
</table>
<div class="fixed_bg_B">
 <table width="100%" border="0" cellpadding="0" cellspacing="0">
 <tr>
 <td valign="top" class="td_n Bottom_pd ">
<input id="Back" class="btn2 btnbaoc" type="button" onclick="Add()" value="新增" name="Back">
<input id="Back" class="btn2 btnguanb" type="button" onclick="art.dialog.open.origin.location.reload();art.dialog.close();" value="关闭" name="Back">
 
 </tr>
 </table>
</div>
<script>function Add() {$.dialog.open('<?php echo site_url('order/product_add')?>?orderid=<?php echo $id?>', {title: '新增订单产品', width: 600, height: 400,fixed: true}); };</script>
<script src="<?php echo base_url()?>theme/default/WdatePicker.js"></script>
</body>
</html>

 