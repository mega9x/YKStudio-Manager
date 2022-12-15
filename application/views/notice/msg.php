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
</head>
<body>
<div class="msg-content">
 <ul>
 <?php 
 foreach($list as $arr=>$row) {
 ?>
 <li class='none'><span class="r" style="padding-left:10px;"><?php echo $row['cdate']?></span><a onclick='Receive_InfoEdit104()'><?php echo $row['title']?></a></li>
 <script>function Receive_InfoEdit<?php echo $row['id']?>() {$.dialog.open('<?php echo site_url('message/edit')?>?id=<?php echo $row['id']?>', {title: '回复', width: 800,height: 450, fixed: true}); };</script>
 <?php }?>
 </ul>
</div>
</body>
</html>


 