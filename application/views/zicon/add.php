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
<!--选项按钮美化-->
<link rel="stylesheet" href="<?php echo base_url()?>theme/default/css/jquery-labelauty.css" />
<link href="<?php echo base_url()?>theme/default/css/jquery.vtip.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url()?>theme/default/js/jquery.vtip.js"></script>
</head>
<body>

<script language="JavaScript">
 <!-- 必填项提示
 function CheckInput()
 {
 if(document.getElementById('gId').value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content
: '部门编号不能为空！'});document.getElementById('gId').focus();return false;}
 if(document.getElementById('gName').value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning'
,content: '部门名称不能为空！'});document.getElementById('gName').focus();return false;}
 }
 -->
 </script>

<form name="Save" action="<?php echo site_url('zicon/add')?>" method="post" onSubmit="return CheckInput();"
>
 <table width="100%" border="0" cellpadding="0" cellspacing="0">
 <tr>
 <td valign="top" class="td_n pdl10 pdr10 pdt10"><table width="100%" border="0" cellspacing="0" cellpadding
="0" CLASS="table_1">
 <col width="100" />
 <tr class="tr_t">
 <td class="td_l_l" COLSPAN="2"><B>修改图标 </B></td>
 </tr>
 <tr>
 <td class="td_l_r title">桌面位置</td>
 <td class="td_l_l"><select name="class">
 <option value="1" selected="selected">第1屏</option>
 <option value="2" >第2屏</option>
 <option value="3" >第3屏</option>
 </select></td>
 </tr>
 <tr>
 <td class="td_l_r title">图标名称</td>
 <td class="td_l_l"><input name="name" type="text" class="int" id="iname" size="30" value="自定义图标" >
 <input type="hidden" name="appid" value="<?php echo rand(2000,10000)?>">
</td>
 </tr>
 <tr>
 <td class="td_l_r title">选择图标</td>
 <td class="td_l_l">
 <input type="radio" name="icon" value="01.png" checked="checked" data-labelauty="
<img src='<?php echo base_url()?>theme/windows/icon1/01.png' width='40' height='40'>"/>
 <input type="radio" name="icon" value="02.png"   data-labelauty="<img src='<?php echo base_url()?>theme/windows/icon1/02.png' width='40' height='40'>"/>
 <input type="radio" name="icon" value="03.png"   data-labelauty="<img src='<?php echo base_url()?>theme/windows/icon1/03.png' width='40' height='40'>"/>
 <input type="radio" name="icon" value="04.png"   data-labelauty="<img src='<?php echo base_url()?>theme/windows/icon1/04.png' width='40' height='40'>"/></td>
 </tr>
 <tr>
 <td class="td_l_r title">页面链接</td>
 <td class="td_l_l"><input name="url" type="text" class="int" id="iurl" value="http://www.baidu.com"
 size="30" >
 <span class="info_help">网址前加 http://</span></td>
 </tr>
 <tr>
 <td class="td_l_r title">排序</td>
 <td class="td_l_l"><input name="ordnum" type="text" class="int" id="paixu" value="1" size="30" >
 <span class="info_help">数字越小越靠前</span></td>
 </tr>
 <tr>
 <td class="td_l_r title">是否显示</td>
 <td class="td_l_l">
 <input name="isdel" type="radio" class="noborder" value="0"  checked data-labelauty="是" />
 <input name="isdel" type="radio" class="noborder" value="1" data-labelauty="否" /></td>
 </tr>
 </table></td>
 </tr>
 </table>
 <div class="h50b"></div>
 <div class="fixed_bg_B">
 <table width="100%" border="0" cellpadding="0" cellspacing="0">
 <tr>
 <td valign="top" class="td_n Bottom_pd ">
 <input type="submit"  class="btn2 btnbaoc" value="保存">
 <input name="Back" type="button" id="Back" class="btn2 btnguanb" value="关闭" onClick="art.dialog.close
();"></td>
 </tr>
 </table>
 </div>
</form>

<!--选项按钮美化--> 
<script type="text/javascript" src="<?php echo base_url()?>theme/default/js/jquery-labelauty.js"></script> 
<script type="text/javascript">
$(function(){
 $(':input').labelauty();
});
</script> 
<script src="<?php echo base_url()?>theme/default/WdatePicker.js"></script>
</body>
</html>
 