<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url()?>theme/default/css/common.css" rel="stylesheet" type="text/css">
<script language="javascript" src="<?php echo base_url()?>theme/default/js/Ajax.js"></script>
<script language="javascript" src="<?php echo base_url()?>theme/default/js/Common.js"></script>
<script language="javascript" src="<?php echo base_url()?>theme/default/js/jquery.min.js"></script>
<script language="javascript" src="<?php echo base_url()?>theme/default/js/tips.js"></script>
<script language="javascript" src="<?php echo base_url()?>theme/default/js/Float.js"></script>
<script src="<?php echo base_url()?>theme/default/js/jquery.artDialog.js?skin=default"></script>
<script src="<?php echo base_url()?>theme/default/js/iframeTools.js"></script>
</head>
<body style="padding-bottom:50px;">
<span class="MenuboxS">
 <ul>
 <li <?php echo $issolve=='' ? 'class="hover"' :''?> id="CheckB"><span><a href="?">售后列表</a></span></li>
 <li <?php echo $issolve==2 ? 'class="hover"' :''?> id="CheckF"><span><a href="?issolve=2">已解决</a></span></li>
 <li <?php echo $issolve==1 ? 'class="hover"' :''?> id="CheckG"><span><a href="?issolve=1">未解决</a></span></li>
 <?php if ($this->common_model->check_lever(45)){?> 
 <li class="btn_new" id="CheckC"><span><a href="#" onclick='InfoAdd_Chose()'>新增售后</a></span></li>
 <?php }?>
 </ul>
</span>
<script>function InfoAdd_Chose() {$.dialog.open('<?php echo site_url('common/choose_customer')?>', {title: '新增售后【第一步：选择售后任务】', width: 1080, height: 550,fixed: true}); };</script> 
<script>function ChoseOK(i){{$.dialog.open('<?php echo site_url('service/add')?>?id='+i, {title: '新增售后【第二步：录入售后信息】', width: 600, height: 500,fixed: true}); };}</script> 
<script>function Setting_Shouhou() {$.dialog.open('<?php echo site_url('setting/config')?>?type=service', {title: '自定义设置', width: 600, height: 330,fixed: true}); };</script>
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
             <span id="ss_suggest" style="display:none;"></span>日期
             <input name="sttdate" type="text" maxlength="10" id="TimeBegin" class="int Wdate" size="10" onfocus="WdatePicker()" value="<?php echo $sttdate?>" />
             ~
             <input name="enddate" type="text" maxlength="10" id="TimeEnd" class="int Wdate" size="10" onfocus="WdatePicker()" value="<?php echo $enddate?>" /> 
			  
			 <select name="type" id="Select_Shouhou">
			 <option value="">反馈分类</option>
			 <?php foreach($select_service as $arr=>$row) {?>
			 <option value="<?php echo $row['name']?>" <?php echo $type==$row['name'] ? 'selected' :''?>>
			 <?php echo $row['name']?></option>
			 <?php }?>
			 </select>
			
			<select name='adduser' class='int'>
			 <option value="">业务员</option>
			 <?php foreach($select_user as $arr=>$row) {?>
			 <option value="<?php echo $row['name']?>" <?php echo $adduser==$row['name'] ? 'selected' :''?>>
			 <?php echo $row['name']?></option>
			 <?php }?>
			 </select>
			  
			 <select name='issolve'>
			 <option value="">是否解决</option>
			 <option value="1" <?php echo $issolve==1 ? 'selected' :''?>>未解决</option>
			 <option value="2" <?php echo $issolve==2 ? 'selected' :''?>>已解决</option>
			 </select>
			 
			  
			 
		     <input type="submit" name="Submit" id="ss_button" class="btn1 btnxiug" value="搜索" />
			 <input type="button" class="btn1 btnxiug" value="清空条件" onClick=window.location.href="?" />
			 <input type="button" class="btn1 btnxiug" value="导出" onClick=window.location.href="<?php echo site_url('service/excel')?>?<?php echo $parameter?>" /> 
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
 
 
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr>
 
 <td valign="top" colspan=2 style="padding:10px 10px 0;" class="td_n">
 
 <form name="Search" action="?action=CheckSub&saction=Search&PN=1" method="post">
 
 <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_1">
 <tr class="tr_b">
 <td class="td_l_c">编号</td>
 
 <td class="td_l_l">任务名称</td>

 <?php if (isset($value['title'])){?>
 <td class="td_l_c">反馈主题</td>
 <?php }?>
 <?php if (isset($value['linkman'])){?>
 <td class="td_l_c">任务链接</td>
 <?php }?>
 <?php if (isset($value['type'])){?>
 <td class="td_l_c">反馈分类</td>
 <?php }?>
 <?php if (isset($value['edate'])){?>
 <td class="td_l_c">反馈日期</td>
 <?php }?>
 <?php if (isset($value['info'])){?>
 <td class="td_l_c">处理</td>
 <?php }?>
 <?php if (isset($value['adduser'])){?>
 <td class="td_l_c">业务员</td>
 <?php }?>
 <?php if (isset($value['addtime'])){?>
 <td class="td_l_c">录入时间</td>
 <?php }?>
 
 
 <td class="td_l_c">管理</td>
 </tr>
 <?php foreach($list as $arr=>$row) {?>
 <tr class="tr">
 <td class="td_l_c"><?php echo $row['id']?></td>
 <td class="td_l_l"><a onclick='Kehu_InfoView<?php echo $row['customerid']?>()' style="cursor:pointer;"><?php echo $row['customername']?></a></td>
 
 <?php if (isset($value['title'])){?>
 <td class="td_l_c"><?php echo $row['title']?></td>
 <?php }?>
 <?php if (isset($value['linkman'])){?>
 <td class="td_l_c"><?php echo $row['linkman']?></td>
 <?php }?>
 <?php if (isset($value['type'])){?>
 <td class="td_l_c"><?php echo $row['type']?></td>
 <?php }?>
 <?php if (isset($value['edate'])){?>
 <td class="td_l_c"><?php echo $row['sdate']?></td>
 <?php }?>
 <?php if (isset($value['info'])){?>
 <td class="td_l_c">
 <a class="btn_sh<?php echo $row['issolve']?>" onclick='Audit<?php echo $row['id']?>()'><?php echo $row['issolve']==1 ? '已解决' : '未解决'?></a>
 </td>
 <?php }?>
 <?php if (isset($value['adduser'])){?>
 <td class="td_l_c"><?php echo $row['adduser']?></td>
 <?php }?>
 <?php if (isset($value['addtime'])){?>
 <td class="td_l_c"><?php echo $row['adddate']?></td>
 <?php }?>
 <td class="td_l_c">
 <?php if ($this->common_model->check_lever(46)){?> 
 <input type="button" class="btn1 btnxiug" value="修改" title="修改"  onclick='Edit<?php echo $row['id']?>()' />
 <?php }?>
 <?php if ($this->common_model->check_lever(47)){?> 
 <input type="button" class="btn1 btnshanc" value="删除" title="删除" onclick='Del<?php echo $row['id']?>()' />
 <?php }?>
 </td>
 </tr>
 <script>function Kehu_InfoView<?php echo $row['customerid']?>() {$.dialog.open('<?php echo site_url('customer/service')?>?id=<?php echo $row['customerid']?>', {title: '查看', width: 1200,height: 500, fixed: true}); };</script> 
 <script>function Edit<?php echo $row['id']?>() {$.dialog.open('<?php echo site_url('service/edit')?>?id=<?php echo $row['id']?>', {title: '编辑', width: 600,height: 500, fixed: true}); };</script> 
 <script>function Audit<?php echo $row['id']?>() {$.dialog.open('<?php echo site_url('service/audit')?>?id=<?php echo $row['id']?>', {title: '问题处理', width: 600,height: 500, fixed: true}); };</script> 
 <script>function Del<?php echo $row['id']?>(){art.dialog({content: '是否确定删除？',icon: 'error',ok: function () {$.dialog.open('<?php echo site_url('service/del')?>?id=<?php echo $row['id']?>',{title: '删除原因', width: 400,height: 150, fixed: true}); 
 art.dialog.close();},cancelVal: '关闭',cancel: true});};
 </script>
 
 <?php }?> 
 </table>
 </form>
 
</table>
<div class="fixed_bg"> <span style="float:left;">
 
 <a class="button_top_set" title="自定义设置" onclick='Setting_Shouhou()'>自定义设置</a>
 
 </span> 
 <!--分页代码开始-->
 <div class="pagepostion">
 <ul class="pagination">
 <?php echo $this->lib_page->showpage()?>
 <script language='javascript'>function getValue(obj){if (document.getElementById("geturl").value!="") {location.href="?page="+escape(document.getElementById("geturl").value)+""}}</script>
<input class="pagenum" id="geturl" value="<?php echo $this->lib_page->nowPage?>"><li class="last"><a href='javascript:void(0);' onclick="getValue(geturl.value)">跳转</a></li></ul>
 </div>
 <!--分页代码结束--> 
 
</div>

<script src="<?php echo base_url()?>theme/default/WdatePicker.js"></script>
</body>
</html>