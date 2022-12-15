<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="<?php echo base_url()?>theme/default/css/common.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url()?>theme/default/js/Common.js" type="text/javascript"></script>
<script language="javascript" src="<?php echo base_url()?>theme/default/js/jquery.min.js"></script>
<script language="javascript" src="<?php echo base_url()?>theme/default/js/tips.js"></script>
<script language="javascript" src="<?php echo base_url()?>theme/default/js/Float.js"></script>
<link rel="stylesheet" href="<?php echo base_url()?>theme/default/js/skin/default.css?4.1.6">
<script src="<?php echo base_url()?>theme/default/js/jquery.artDialog.js?skin=default"></script>
<script src="<?php echo base_url()?>theme/default/js/iframeTools.js"></script>
</head>
<body>
<span class="MenuboxS">
<ul>
 <li><span><a href="<?php echo site_url('mail/template')?>">邮件模板管理</a></span></li>
 <!--<li><span><a href="mailsjx.asp">收件箱列表</a></span></li>-->
 <li class="hover"><span><a href="<?php echo site_url('mail')?>">已发送列表</a></span></li>
 <li><span><a href="<?php echo site_url('mail/add')?>">发送邮件</a></span></li>
 <!--<li><span><a href="sendemail_auto.asp">自动发送设置</a></span></li>-->
</ul>
</span>
<div class="allpage">
 <table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1">
 <col width="60" />
 <col width="100" />
 <col width="100" />
 <col width="100" />
 <col width="150" />
<!-- <col width="400" />-->
 <col width="100" />
 <col width="80" />
 <tr class="tr">
 <td class="td_l_c title"><strong>编号</strong></td>
 <td class="td_l_c title"><strong>邮件类型</strong></td>
 <td class="td_l_c title"><strong>发送者</strong></td>
 <td class="td_l_c title"><strong>接收邮箱</strong></td>
 <td class="td_l_c title"><strong>邮件标题</strong></td>
<!-- <td class="td_l_c title"><strong>邮件内容</strong></td>-->
 <td class="td_l_c title"><strong>发送时间</strong></td>
 <td class="td_l_c title"><strong>操作</strong></td>
 </tr>
 <?php foreach($list as $arr=>$row) {?>
 <tr class="tr">
 <td class="td_l_c"><?php echo $row['id']?></td>
 <td class="td_l_c"><?php echo $row['type']?></td>
 <td class="td_r_l"><?php echo $row['user']?></td>
 <td class="td_r_l"><?php echo $row['receive']?></td>
 <td class="td_r_l"><?php echo $row['title']?></td>
<!-- <td class="td_r_l"><?php echo $row['content']?></td>-->
 <td class="td_r_l"><?php echo $row['ctime']?></td>
 <td class="td_r_c"><a href="javascript:;" class="btn1 btnshanc" onclick="art.dialog({content: '是否确定删除？',icon: 'error',ok: function () {art.dialog.open('<?php echo site_url('mail/del')?>?id=<?php echo $row['id']?>');art.dialog.close();},cancelVal: '关闭',cancel: true })">删除</a></td>
 </tr>
 <?php }?>
 <!--<tr class="tr">
 <td colspan="8" class="td_l_c title">上一页 [<a href=?page=1><font color=red><b>1</b></font></a>] 下一页 
页次:1/1 页   每页: 10 条  总数: 1 条</td>
 </tr>-->
 </table>
 
<!--分页代码开始-->
<div class="fixed_bg"> 
 <!--分页代码开始-->
 <div class="pagepostion">
 <ul class="pagination">
 <?php echo $this->lib_page->showpage()?>
 <script language='javascript'>function getValue(obj){if (document.getElementById("geturl").value!="") {location.href="<?php echo site_url('customer')?>?page="+escape(document.getElementById("geturl").value)+""}}</script>
<input class="pagenum" id="geturl" value="<?php echo $this->lib_page->nowPage?>"><li class="last"><a href='javascript:void(0);' onClick="getValue(geturl.value)">跳转</a></li></ul>
 </div>
 <!--分页代码结束--> 
</div>
  
 
</div>
</body>
</html>
 