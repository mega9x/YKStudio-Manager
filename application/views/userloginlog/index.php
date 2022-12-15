<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional
.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url()?>theme/default/css/common.css" rel="stylesheet" type="text/css">
<script language="javascript" src="<?php echo base_url()?>theme/default/js/jquery.min.js"></script>
<script language="javascript" src="<?php echo base_url()?>theme/default/js/tips.js"></script>
<script src="<?php echo base_url()?>theme/default/js/jquery.artDialog.js?skin=default"></script>
<script src="<?php echo base_url()?>theme/default/js/iframeTools.js"></script>
</head>

<body style="padding-bottom:50px;">
<script>
window.onload=function(){
 
 var oSetxh=document.getElementById('setxh');
 var oLi=oSetxh.getElementsByTagName('li');
 var oSetxhing=document.getElementById('setxhing');
 var oUling=oSetxhing.getElementsByClassName('xhing');
 
 for(var i=0;i<oLi.length;i++){
 
 oLi[i].xuhao=i;
 oLi[i].onclick=function(){
 
 for(var i=0; i<oLi.length;i++){
 oLi[i].className='';
 oUling[i].style.display='none';
 }
 this.className='hover';
 oUling[this.xuhao].style.display='block';
 }
 }
 
}
</script>
<style>
.xhing{ display:none;}
</style>
<span class="MenuboxS">
 <ul id="setxh">
 <li class="hover"><span><a href="javascript:;">登录日志</a></span></li>
 <li><span><a href="javascript:;">操作日志</a></span></li>
 </ul>
</span>
<div id="setxhing">
 <ul class="xhing" style="display:block;">
 <table width="100%" border="0" cellpadding="0" cellspacing="0">
 <tr>
 <td colspan=2 class="ss_All td_n">
 <form name="searchForm" method="post" action="<?php echo site_url('userloginlog')?>">
 <input name="sttdate" type="text" id="TimeBegin" class="int Wdate" value="<?php echo $sttdate?>" style="width:100px;" onFocus="WdatePicker()" />
 &nbsp;~&nbsp;
 <input name="enddate" type="text" id="TimeEnd" class="int Wdate" value="<?php echo $enddate?>" style="width:100px;" onFocus="WdatePicker()" />

 <input type="submit" name="Submit" class="btn1 btnsou2" value=" 搜索 ">
 <input type="button" name="button" class="btn1 btnqingk2" value=" 清空条件 " onClick=window.location.href
="?action=killSession" />
 </form></td>
 </tr>
 <tr>
 <td valign="top" colspan=2 style="padding:0 10px 10px 10px;" class="td_n"><table width="100%" border
="0" cellpadding="0" cellspacing="0" class="table_1">
 <tr class="tr_t">
 <td class="td_l_c">编号</td>
 <td class="td_l_l">账户</td>
 <td class="td_l_c">时间</td>
 <td class="td_l_c">登录IP</td>
 <td class="td_l_c">管理</td>
 </tr>
 <?php foreach($list as $arr=>$row) {?>
 <tr class="tr">
 <td class="td_l_c"><?php echo $row['id']?></td>
 <td class="td_l_l"><?php echo $row['adduser']?></a></td>
 <td class="td_l_c"><?php echo $row['addtime']?></td>
 <td class="td_l_c"><?php echo $row['ip']?></td>
 <td class="td_l_c"><input type="button" class="btn1 btnshanc" value="删除" title="删除" onclick='Del<?php echo $row['id']?>()' /></td>
 </tr>
 <script>function Del<?php echo $row['id']?>() {$.dialog( { content: '是否确定删除？',icon: 'error',ok: function () {art.dialog.open('<?php echo site_url('userloginlog/del')?>?id=<?php echo $row['id']?>');art.dialog.close();},cancel: true }); };</script>
 <?php }?> 
  
 </table></td>
 </tr>
 </table>
 <div class="fixed_bg"> <span class="r">
 <input name="Back" type="button" id="Back" class="btn1 btnpilsc" value="清空记录" onClick=window.location.href="<?php echo site_url('userloginlog/clear')?>">
 </span> 
 
 <!--分页代码开始-->
 <div class="pagepostion">
 <ul class="pagination">
 <?php echo $this->lib_page->showpage()?>
 <script language='javascript'>function getValue(obj){if (document.getElementById("geturl").value!="") {location.href="<?php echo site_url('userloginlog')?>?page="+escape(document.getElementById("geturl").value)+""}}</script>
<input class="pagenum" id="geturl" value="<?php echo $this->lib_page->nowPage?>"><li class="last"><a href='javascript:void(0);' onclick="getValue(geturl.value)">跳转</a></li></ul>
 </div>
 <!--分页代码结束--> 
 </div>
 
 </ul>
 <ul class="xhing">
 <iframe src ="<?php echo site_url('userlog')?>" frameborder="0" marginheight="0" marginwidth="0" frameborder="0" scrolling="auto" width="100%" height="550">
 </iframe>
 </ul>
</div>
<script src="<?php echo base_url()?>theme/default/WdatePicker.js"></script>
</body>
</html>
 