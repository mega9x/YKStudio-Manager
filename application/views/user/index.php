<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url()?>theme/default/css/common.css" rel="stylesheet" type="text/css">
<script language="javascript" src="<?php echo base_url()?>theme/default/js/jquery.min.js"></script>
<script language="javascript" src="<?php echo base_url()?>theme/default/js/tips.js"></script>
<script src="<?php echo base_url()?>theme/default/js/jquery.artDialog.js?skin=default"></script>
<script src="<?php echo base_url()?>theme/default/js/iframeTools.js"></script>
</head>
<body> 




<table width="100%" border="0" cellpadding="0" cellspacing="0">
 <tr>
 <td valign="top" class="td_n pdr10 pdt10"> 
 <div class="MenuboxS">
 <ul>
 <li class="hover"><span><a href="<?php echo site_url('user')?>">员工列表</a></span></li>
 <li class=""><span><a href="#" onclick='User_Add()'>新增员工</a></span></li>
 </ul>
 </div>
 </td>
 </tr>
</table>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
 <tr>
 <td valign="top" class="td_n"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#ffffff;">
 <tr>
 <td valign="top" class="td_n pdl10 pdr10 pdt10"><div id="ss" style="height:37px;overflow:hidden; ">
   <form name="searchForm" action="?saction=ssdetail" method="post">
     <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_1">
       
       <tr>
         <td class="td_l_r title">关键字</td>
         <td class="td_r_l">
		    
 
		     <input name="keyword" type="text" class="int" id="keyword" size="20" value="<?php echo $keyword?>" onkeyup="searchSuggest();" />
			 

		     <input type="submit" name="Submit" id="ss_button" class="btn1 btnxiug" value="搜索" />
			 <input type="button" class="btn1 btnxiug" value="清空条件" onClick=window.location.href="?" />
			 
			</td>
 
       </tr>
     </table>
   </form>
 </td>
 </tr>
 </table> 
 </td>
 </tr>
 </table>




<script>function User_Add() {$.dialog.open('<?php echo site_url('user/add')?>?action=User&sType=Add', {title: '新窗口', width: 800, height: 400,fixed: true}); };</script>
<table width="100%" border="0" cellpadding="0" cellspacing="0" >
 <tr>
 <td valign="top" class="td_n pdl10 pdr10 pdt10">

 <table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1" >
 <tr class="tr_t">
 <td width="90" class="td_l_c">编号</td>
 <td class="td_l_l">帐号</td>
 <td width="100" class="td_l_c">姓名</td>
 <td width="100" class="td_l_c">部门</td>
 <td width="100" class="td_l_c">等级</td>
 <td width="150" class="td_l_c">管理</td>
 </tr>
 <?php foreach($list as $arr=>$row) {?>
 <tr class="tr">
 <td class="td_l_c"><?php echo $row['uid']?></td>
 <td class="td_l_l"><a href='#' onclick='User_InfoEdit<?php echo $row['uid']?>()'><?php echo $row['username']?></a></td>
 <td class="td_l_c"><?php echo $row['name']?></td>
 <td class="td_l_c"><?php echo $row['groupname']?></td>
 <td class="td_l_c"><?php echo $row['role']?></td>
 <td nowrap="nowrap" class="td_l_c">
 
<?php if ($row['roleid']>0) {?>
<input type="button" class="button_info_quanxian" value="权限" title="用户权限"  onclick='User_Quxnain<?php echo $row['uid']?>()' />
<input type="button" class="btn1 btnxiug" value="修改" title="修改"  onclick='User_InfoEdit<?php echo $row['uid']?>()' /> 
<input type="button" class="btn1 btnshanc" value="删除" title="删除" onClick="art.dialog({content: '是否确定删除？',icon: 'error',ok: function () {art.dialog.open('<?php echo site_url('user/del')?>?id=<?php echo $row['uid']?>');art.dialog.close();},cancelVal: '关闭',cancel: true })" />
<?php } else {?>
<input class="btn1 btnshanc" type="button" title="超级管理员不可修改和删除!" value="超级管理员" style="background:#757777;">
<?php }?>

</td>
 </tr>
 <script>function User_Quxnain<?php echo $row['uid']?>() {$.dialog.open('<?php echo site_url('user/lever')?>?id=<?php echo $row['uid']?>', {title: '新窗口', width: 800,height: 550, fixed: true}); };</script>
 <script>function User_InfoEdit<?php echo $row['uid']?>() {$.dialog.open('<?php echo site_url('user/edit')?>?id=<?php echo $row['uid']?>', {title: '新窗口', width: 800,height: 400, fixed: true}); };</script>
 <!--<script>function User_InfoDel2() {$.dialog( { content: '是否确定删除？',icon: 'error',ok: function () {art.dialog.open('?action=delete&uId=2');return false;},cancel: true }); };</script>-->
 <?php }?> 
 

 </table>
 </td>
 </tr>
</table>
<div class="fixed_bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
 <tr>
 <td valign="top" class="td_n Bottom_pd "> 
 <div class="pagepostion">
 <ul class="pagination">
 <?php echo $this->lib_page->showpage()?>
 <script language='javascript'>function getValue(obj){if (document.getElementById("geturl").value!="") {location.href="<?php echo site_url('customer')?>?page="+escape(document.getElementById("geturl").value)+""}}</script>
<input class="pagenum" id="geturl" value="<?php echo $this->lib_page->nowPage?>"><li class="last"><a href='javascript:void(0);' onclick="getValue(geturl.value)">跳转</a></li></ul>
 </div>
  
 </td>
 </tr>
</table>
</div>

<script src="<?php echo base_url()?>theme/default/WdatePicker.js"></script>
</body>
</html>
