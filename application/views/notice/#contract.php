<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url()?>theme/default/css/common.css" rel="stylesheet" type="text/css">
<script language="javascript" src="<?php echo base_url()?>theme/default/js/Common.js"></script>
<link href="<?php echo base_url()?>theme/default/css/inettuts.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="<?php echo base_url()?>theme/default/js/jquery.min.js"></script>
<script language="javascript" src="<?php echo base_url()?>theme/default/js/tips.js"></script>
<script src="<?php echo base_url()?>theme/default/js/jquery.artDialog.js?skin=default"></script>
<script src="<?php echo base_url()?>theme/default/js/iframeTools.js"></script>
<script language="JavaScript">
<!--
function killerrors() { return true; } 
window.onerror = killerrors;
-->
</script>
<style>
html{ background:none;}
body{ background-color:transparent;}
</style>
</head>
<body>
<div class="notice-content">
 <ul>
 <?php 
 if (count($list)>0) {
 foreach($list as $arr=>$row){?>
 <li class='none'> <a onclick='gendan_InfoView<?php echo $row['id']?>()' ><span class="r" style=""><?php echo substr($row['edate'],-5)?></span>[<?php echo $row['type']?>] <?php echo $row['customername']?></a></li>
 <script>function gendan_InfoView<?php echo $row['id']?>() {$.dialog.open('<?php echo site_url('customer/hetong')?>?id=<?php echo $row['cid']?>', {title: '查看', width: 1220,height: 520, fixed: true}); };</script>
 <?php }?>
 <?php } else {?>
 <li class='none'>抱歉，暂无相关记录！</li>
 <?php }?>
 </ul>
</div>
</body>
</html>
