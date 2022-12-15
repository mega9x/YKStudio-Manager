<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url()?>theme/default/css/common.css" rel="stylesheet" type="text/css">
<script language="JavaScript">
function checkInput(o)
{
 var oo = eval("document.all." + o);
 var num = oo.length;
 for(var i=0;i<num;i++){
 if(oo[i].value == ""){
 alert("不能为空！");
 oo[i].focus();
 return false
 break;
 }
 }
}
</script>
</head>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0" id="set_select">
 <tr>
 <td valign="top" class="td_n"> 
 <!---->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr>
 <td width="202" valign="top" class="pdt10">
 <div class="MenuboxL">
 <ul>
 <?php foreach($selecttype as $arr=>$row) {?>
 <li  <?php echo $type==$arr ? 'class="hover"' :''?>><span><a href="<?php echo site_url('select/main')?>?type=<?php echo $arr?>"><?php echo $row?></a></span></li>
 <?php }?>
 
 <!--<li  ><span><a href="?otype=Select_NoticeClass">公文分类</a></span></li>-->
 <!--<li  ><span><a href="?otype=Select_Sex">性别</a></span></li>
 <li  ><span><a href="?otype=Select_YN">是/否</a></span></li>-->
 </ul>
 </div>
 </td>
 <td valign="top">
 
<table width="100%" border="0" cellpadding="0" cellspacing="0">
 <tr>
 <td valign="top" class="td_n pdr10"> 
 
 </td>
 </tr>
 <tr>
 <td valign="top" class="td_n">

 <table width="100%" border="0" cellpadding="0" cellspacing="0">
 <tr>
 <td valign="top" class="td_n pdr10 pdt10"> 
 <form name="menuForm" action="<?php echo site_url('select/main')?>?action=save&type=<?php echo $type?>&id=<?php echo $id?>" method="post" onSubmit="return checkInput('menuForm');">
 
 <table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1">
 <col width="100" />
 <tr class="tr_t"> 
 <td class="td_l_l" COLSPAN="4"><B><?php echo $action=='edit' ? '修改' : '添加'?></B>
 </td>
 </tr>
 <tr class="tr"> 
 <td class="td_l_c title">参　数</td>
 <td class="td_r_l"><input name="name" type="text" class="int" id="otypedata" size="30" maxlength="16" value="<?php echo $name?>"></td>
 </tr>
 <tr> 
 <td colspan="4" align="right" class="td_r_l"><input type="submit" id="submit" class="btn2 btnbaoc" value="保存"></td>
 </tr>
 </table>
 </form>
 </td>
 </tr>
 </table>

 </td>
 </tr>
 <tr>
 <td valign="top" style="padding:10px;" class="td_n"> 
 <table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1" id="Table1">
 <tr class="tr_t"> 
 <td width="1306" class="td_l_c">类型</td>
 <td width="343" class="td_l_c">管理</td>
  </tr>
         <?php foreach($list as $arr=>$row) {?>
         <tr class="tr">
          <td class="td_l_l"><a href="<?php echo site_url('select/main')?>?action=edit&type=<?php echo $row['type']?>&name=<?php echo $row['name']?>"><?php echo $row['name']?></a></td>
          <td class="td_l_c" nowrap="nowrap">
          <input type="button" class="btn1 btnxiug" value="修改" title="修改" onClick="window.location.href='<?php echo site_url('select/main')?>?action=edit&id=<?php echo $row['id']?>&type=<?php echo $row['type']?>&name=<?php echo $row['name']?>'" /> 
          <input type="button" class="btn1 btnshanc" value="删除"  title="删除" onClick="location.href='<?php echo site_url('select/main')?>?action=delete&type=<?php echo $row['type']?>&id=<?php echo $row['id']?>'" />
          </td>
		 <?php }?> 
		  
        

 </tr>
 </table>
 </td>
 </tr>
</table>
 </td>
 </tr>
</table>
<script>
var oTab1=document.getElementById('Table1');
var oTd1Text=oTab1.tBodies[0].rows[1].cells[0].innerText;
if(oTd1Text=="导出存档"){
 oTab1.tBodies[0].rows[1].style.display='none';
}
</script>
<!--end-->
</td>
</tr>
</table>
<script>var height_select=document.getElementById('set_select').clientHeight;</script>
</body>
</html>
