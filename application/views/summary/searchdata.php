<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>任务管理系统</title>
<link href="<?php echo base_url()?>theme/default/css/common.css" rel="stylesheet" type="text/css">
<script language="javascript" src="<?php echo base_url()?>theme/default/js/Common.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>theme/default/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>theme/default/js/highcharts.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>theme/default/js/modules/exporting.js"></script>
<script src="<?php echo base_url()?>theme/default/js/jquery.artDialog.js?skin=default"></script>
<script src="<?php echo base_url()?>theme/default/js/iframeTools.js"></script>
</head>
<body>

<span class="MenuboxS">
 <ul>
 <li ><span><a href="<?php echo site_url('summary/index')?>?action=Main&otype=Main">任务概况</a></span></li>
 <li ><span><a href="<?php echo site_url('summary/gendan')?>?action=Gendan&otype=Gendan">跟单统计</a></span></li>
 <li ><span><a href="<?php echo site_url('summary/order')?>?action=Order&otype=Order">订单统计</a></span></li>
 <li ><span><a href="<?php echo site_url('summary/hetong')?>?action=Hetong&otype=Hetong">合同统计</a></span></li>
 <li ><span><a href="<?php echo site_url('summary/shouhou')?>?action=Shouhou&otype=Shouhou">售后统计</a></span></li>
 <li ><span><a href="<?php echo site_url('summary/yeardata')?>?action=Yeardata&otype=Yeardata">年度曲线</a></span></li>
 <li class="hover"><span><a href="<?php echo site_url('summary/searchdata')?>?action=Searchdata&otype=Searchdata">详细数据</a></span></li>
 
 </ul>
</span>

<style>
body{padding-bottom:48px}
</style>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr>
 <td colspan=2 class="ss_All td_n"><form name="searchForm" method="post" action="?Action=Searchdata&otype=Searchdata&saction=Searchdata">
 <input name="TimeBegin" type="text" id="TimeBegin" class="int Wdate" value="<?php echo $TimeBegin?>" style="width:100px;" onFocus="WdatePicker()" />
 &nbsp;~&nbsp;
 <input name="TimeEnd" type="text" id="TimeEnd" class="int Wdate" value="<?php echo $TimeEnd?>" style="width:100px;" onFocus="WdatePicker()" />
 &nbsp;
 <input type="submit" name="Submit" class="btn1 btnsou2" value=" 搜索 ">
 <input type="button" name="button" class="btn1 btnqingk2" value=" 清空条件 " onClick=window.location.href="?Action=Searchdata&otype=Searchdata&saction=killSession" />
 </form></td>
 </tr>
 <tr>
 <td valign="top" class="td_n pdl10 pdr10 pdb10"><table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1">
 <col width="100" />
 <col width="80" />
 <col width="80" />
 <col width="80" />
 <col width="80" />
 <col width="80" />
 <col width="80" />
 <col width="80" />
 <col width="80" />
 <tr class="tr_t">
 <td class="td_l_c" colspan=6>基本情况</td>
 <td class="td_l_c" colspan=3>活跃状态</td>
 </tr>
 <tr class="tr_f">
 <td class="td_l_l">姓名</td>
 <td class="td_l_c">任务</td>
 <td class="td_l_c">跟单</td>
 <td class="td_l_c">订单</td>
 <td class="td_l_c">合同</td>
 <td class="td_l_c">售后</td>
 <td class="td_l_c">新增</td>
 <td class="td_l_c">修改</td>
 <td class="td_l_c">删除</td>
 </tr>
 <?php 
 $customer_num = 0;
 $single_num   = 0;
 $order_num    = 0;
 $contract_num = 0;
 $service_num  = 0;
 $add_num  = 0;
 $edit_num = 0;
 $del_num  = 0;
 foreach($list as $arr=>$row) {
	 $customer_num += $row['customer_num'];
	 $single_num += $row['single_num'];
	 $order_num += $row['order_num'];
	 $contract_num += $row['contract_num'];
	 $service_num += $row['service_num'];
	 $add_num += $row['add_num'];
	 $edit_num += $row['edit_num'];
	 $del_num += $row['del_num'];
 ?>
 <Tr class="tr">
 <TD class="td_l_l"><a onclick='InfoView1()'> <?php echo $row['username']?></a></TD>
 <td class="td_l_c"><?php echo $row['customer_num']?></td>
 <td class="td_l_c"><?php echo $row['single_num']?></td>
 <td class="td_l_c"><?php echo $row['order_num']?></td>
 <td class="td_l_c"><?php echo $row['contract_num']?></td>
 <td class="td_l_c"><?php echo $row['service_num']?></td>
 <td class="td_l_c"><?php echo $row['add_num']?></td>
 <td class="td_l_c"><?php echo $row['edit_num']?></td>
 <td class="td_l_c"><?php echo $row['del_num']?></td>
 </TR>
 <script>function InfoView<?php echo $row['uid']?>() {$.dialog.open('?action=InfoView&uId=1', {title: '管理员的详细统计', width: 800,height: 480, fixed: true}); };</script>
 <tr style="display:none;" id="box1">
 <td class="td_l_l" colspan="9" style="padding:10px;background-color:#ffffff;Word-break: break-all; word-wrap:break-word;"></td>
 </tr>
 <?php }?>
  
 
 <Tr class="tr" style="background:#FCFAE3; font-weight:bold;">
 <TD class="td_l_l">总计</TD>
 <td class="td_l_c"><?php echo $customer_num?></td>
 <td class="td_l_c"><?php echo $single_num?></td>
 <td class="td_l_c"><?php echo $order_num?></td>
 <td class="td_l_c"><?php echo $contract_num?></td>
 <td class="td_l_c"><?php echo $service_num?></td>
 <td class="td_l_c"><?php echo $add_num?></td>
 <td class="td_l_c"><?php echo $edit_num?></td>
 <td class="td_l_c"><?php echo $del_num?></td>
 </TR> 
 
 </table></td>
 </tr>
</table>
<div class="fixed_bg"> 
 <!--分页代码开始-->
 <div class="pagepostion"> <ul class="pagination"><li class="first disabled"><a href='javascript:void(0);'>4 条记录 1/1页</a></li><li class="next disabled"><a href='?Action=Searchdata&otype=Searchdata&saction=Searchdata&PN=1'>首页</a></li><li class="active"><a href='javascript:void(0);'>1</a></li><li class="next disabled"><a href='?Action=Searchdata&otype=Searchdata&saction=Searchdata&PN=1'>尾页</a></li><script language='javascript'>function getValue(obj){if (document.getElementById("geturl").value!="") {location.href="?Action=Searchdata&otype=Searchdata&saction=Searchdata&PN="+escape(document.getElementById("geturl").value)+""}}</script><input class="pagenum" id="geturl" value="1"><li class="last"><a href='javascript:void(0);' onclick="getValue(geturl.value)">跳转</a></li></ul> </div>
 <!--分页代码结束--> 
 
</div>

<div class="PX10"></div>
</body>
</html>
<script src="<?php echo base_url()?>theme/default/WdatePicker.js"></script>
 