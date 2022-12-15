<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript" src="<?php echo base_url()?>theme/default/js/jquery.min.js"></script>
<link href="<?php echo base_url()?>theme/default/css/common.css" rel="stylesheet" type="text/css">
<!--选项按钮美化-->
<link rel="stylesheet" href="<?php echo base_url()?>theme/default/css/jquery-labelauty.css" />
</head>
<body>
<span class="MenuboxS">
 <ul>
 <li ><span><a href="<?php echo site_url('user/info')?>">基本资料</a></span></li>
 <li class="hover"><span><a href="<?php echo site_url('user/summary')?>">个人统计</a></span></li>
 </ul>
 </span>
 
 

<!--合并个人概要-->

<table width="100%" border="0" cellpadding="0" cellspacing="0">
 <tr>
 <td valign="top" colspan=2 style="padding:10px 10px 0;" class="td_n"><table width="100%" border="0"
 cellspacing="0" cellpadding="0" class="table_1">
 <tr class="tr_b">
 <td class="td_l_l">概况统计</td>
 <td width="20%" class="td_l_l">7天内</td>
 <td width="20%" class="td_l_l">7-30天</td>
 <td width="20%" class="td_l_l">>30天</td>
 <td width="20%" class="td_l_l">总计</td>
 </tr>
 
 <tr>
 <td class="td_l_l">任务</td>
 <td class="td_l_l">8</td>
 <td class="td_l_l">0</td>
 <td class="td_l_l">0</td>
 <td class="td_l_l">8</td>
 </tr>
 <tr>
 <td class="td_l_l">跟单</td>
 <td class="td_l_l">3</td>
 <td class="td_l_l">0</td>
 <td class="td_l_l">0</td>
 <td class="td_l_l">3</td>
 </tr>
 <tr>
 <td class="td_l_l">订单</td>
 <td class="td_l_l">3</td>
 <td class="td_l_l">0</td>
 <td class="td_l_l">0</td>
 <td class="td_l_l">3</td>
 </tr>
 <tr>
 <td class="td_l_l">合同</td>
 <td class="td_l_l">2</td>
 <td class="td_l_l">0</td>
 <td class="td_l_l">0</td>
 <td class="td_l_l">2</td>
 </tr>
 <tr>
 <td class="td_l_l">售后</td>
 <td class="td_l_l">2</td>
 <td class="td_l_l">0</td>
 <td class="td_l_l">0</td>
 <td class="td_l_l">2</td>
 </tr>
 
 </table></td>
 </tr>
</table>

</body>
</html>
<script src="<?php echo base_url()?>theme/default/WdatePicker.js"></script>
<!--选项按钮美化-->
<script type="text/javascript" src="<?php echo base_url()?>theme/default/js/jquery-labelauty.js"></script>
<script type="text/javascript">
$(function(){
 $(':input').labelauty();
});
</script>