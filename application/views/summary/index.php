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
 <li class="hover"><span><a href="<?php echo site_url('summary/index')?>?action=Main&otype=Main">客户概况</a></span></li>
 <li ><span><a href="<?php echo site_url('summary/gendan')?>?action=Gendan&otype=Gendan">跟单统计</a></span></li>
 <li ><span><a href="<?php echo site_url('summary/order')?>?action=Order&otype=Order">订单统计</a></span></li>
 <li ><span><a href="<?php echo site_url('summary/hetong')?>?action=Hetong&otype=Hetong">合同统计</a></span></li>
 <li ><span><a href="<?php echo site_url('summary/shouhou')?>?action=Shouhou&otype=Shouhou">售后统计</a></span></li>
 <li ><span><a href="<?php echo site_url('summary/yeardata')?>?action=Yeardata&otype=Yeardata">年度曲线</a></span></li>
 <li ><span><a href="<?php echo site_url('summary/searchdata')?>?action=Searchdata&otype=Searchdata">详细数据</a></span></li>
 
 </ul>
</span>

<script type="text/javascript">
Highcharts.visualize=function(table,options){options.xAxis.categories=[];$('tbody th',table).each(function
(i){options.xAxis.categories.push(this.innerHTML)});options.series=[];$('tr',table).each(function(i)
{var tr=this;$('th, td',tr).each(function(j){if(j>0){if(i==0){options.series[j-1]={name:this.innerHTML
,data:[]}}else{options.series[j-1].data.push(parseFloat(this.innerHTML))}}})});var chart=new Highcharts
.Chart(options)};$(document).ready(function(){var table=document.getElementById('datatable'),options
={chart:{renderTo:'container',defaultSeriesType:'column'},title:{text:''},xAxis:{},yAxis:{title:{text
:''}},tooltip:{formatter:function(){return'<b>'+this.series.name+'</b><br/>'+this.y+' '+this.x.toLowerCase
()}}};Highcharts.visualize(table,options)});
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr>
 <td valign="top" class="td_n pd10"><table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS
="table_1">
 <col width="50%" />
 <col width="50%" />
 <tr class="tr_t">
 <td class="td_l_l" colspan=2>系统概况</td>
 </tr>
 <tr>
 <td class="td_l_c" colspan=2><div id="container" style="width: 100%; height: 400px;"></div></td>
 </tr>
 </table></td>
 </tr>
</table>
<table id="datatable" style="display:none;">
 <thead>
 <tr>
 <th></th>
 <th>今日更新</th>
 <th>本周内更新</th>
 <th>本月内更新</th>
 <th>合计</th>
 </tr>
 </thead>
 <tbody>
 <tr>
 <th>任务管理</th>
 <td><?php echo $customer_1?></td>
 <td><?php echo $customer_2?></td>
 <td><?php echo $customer_3?></td>
 <td><?php echo $customer_4?></td>
 </tr>
 <tr>
 <th>任务链接</th>
 <td><?php echo $linkman_1?></td>
 <td><?php echo $linkman_2?></td>
 <td><?php echo $linkman_3?></td>
 <td><?php echo $linkman_4?></td>
 </tr>
 <tr>
 <th>跟单记录</th>
 <td><?php echo $single_1?></td>
 <td><?php echo $single_2?></td>
 <td><?php echo $single_3?></td>
 <td><?php echo $single_4?></td>
 </tr>
 <tr>
 <th>订单记录</th>
 <td><?php echo $order_1?></td>
 <td><?php echo $order_2?></td>
 <td><?php echo $order_3?></td>
 <td><?php echo $order_4?></td>
 </tr>
 <tr>
 <th>合同记录</th>
 <td><?php echo $contract_1?></td>
 <td><?php echo $contract_2?></td>
 <td><?php echo $contract_3?></td>
 <td><?php echo $contract_4?></td>  
 <tr>
 <th>售后记录</th>
 <td><?php echo $service_1?></td>
 <td><?php echo $service_2?></td>
 <td><?php echo $service_3?></td>
 <td><?php echo $service_4?></td> 
 </tr>
 </tbody>
</table>
<script type="text/javascript" src="<?php echo base_url()?>theme/default/js/themes/grid.js"></script>

<div class="PX10"></div>
</body>
</html>
<script src="<?php echo base_url()?>theme/default/WdatePicker.js"></script>

 