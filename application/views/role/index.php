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
<script src="<?php echo base_url()?>theme/default/js/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>theme/default/css/sweetalert.css">
<!--选项按钮美化-->
 
</head>
<body>
<span class="MenuboxS">
 <ul>
 <li ><span><a href="<?php echo site_url('setting')?>">基本设置</a></span></li>
 <li ><span><a href="<?php echo site_url('zicon')?>">自定义图标</a></span></li>
 <li ><span><a href="<?php echo site_url('setting/mail')?>">邮箱配置</a></span></li>
 <li ><span><a href="<?php echo site_url('select')?>">选项值设置</a></span></li>
 <li ><span><a href="<?php echo site_url('group')?>">部门设置</a></span></li>
 <li class="hover"><span><a href="<?php echo site_url('role')?>">权限设置</a></span></li>
 </ul>
 </span>
 
<div id="setxhing">

<ul class="xhing">
 <table width="100%" border="0" cellspacing="0" cellpadding="0" id="user_level">
 <tr>
 <td width="202" valign="top" class="pdt10"><div class="MenuboxL">
 <ul>
 <li class="hover"><span><a href="?">角色列表</a></span></li>
 <li class=""><span><a href="javascript:;" onclick='Level_Add()'>新增角色</a></span></li>
 </ul>
 </div></td>
 <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
 <tr>
 <td valign="top" class="td_n pdr10 pdt10">
 <table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1">
 <tr class="tr_t">
 <td width="90" class="td_l_c">编号</td>
 <td width="90" class="td_l_c">权限值</td>
 <td class="td_l_l">角色名称</td>
 <td width="90" class="td_l_c">管理</td>
 </tr>
 
 <?php foreach($list as $arr=>$row) {?>
 <tr class="tr">
 <td class="td_l_c"><?php echo $row['id']?></td>
 <td class="td_l_c"><?php echo $row['right']?></td>
 <td class="td_l_l"><a href='#' onclick='Level_InfoEdit<?php echo $row['id']?>()'><?php echo $row['name']?></a></td>
 <td class="td_l_c" nowrap="nowrap">
  
 <input type="button" class="btn1 btnxiug" value="修改" title="修改"  onclick='Level_InfoEdit<?php echo $row['id']?>()' />
 <input class="btn1 btnshanc" type="button" onclick="if(confirm(' 你真的要删除吗？')) {location.href='<?php echo site_url('role/del')?>?id=<?php echo $row['id']?>';};" title="删除" value="删除">
 
<!-- <input type="button" class="btn1 btnshanc" value="删除" title="删除" onClick="art.dialog({title: '提示',time: 2,icon: 'warning',content: '有关联数据，无法删除！'}); " />-->
 
</td>
 </tr>
 <script>function Level_InfoEdit<?php echo $row['id']?>() {$.dialog.open('<?php echo site_url('role/edit')?>?id=<?php echo $row['id']?>', {title: '新窗口', width: 800,height: 480, fixed: true}); };</script> 
 <?php }?> 
 
 

 
 <tr class="tr_t">
 <td colspan="4" class="td_l_l"><span class="info_help help02">注：权限值大的可以管理和查看权限值小的帐号任务信息</span></td>
 </tr>
 </table></td>
 </tr>
 </table>
</td>
 </tr>
 </table>
 <script>function Level_Add() {$.dialog.open('<?php echo site_url('role/add')?>', {title: '新增权限信息', width: 800, height: 600,fixed: true}); };</script>
 
</ul>

 <script src="<?php echo base_url()?>theme/default/WdatePicker.js"></script>
 
 
<!--选项按钮美化-->
<script type="text/javascript" src="<?php echo base_url()?>theme/default/js/jquery-labelauty.js"></script>
<script type="text/javascript">
$(function(){
 $(':input').labelauty();
});
</script>
</body>
</html>
 