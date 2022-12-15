<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CRM任务管理系统</title>
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
 <li class="hover"><span><a href="<?php echo site_url('summary/yeardata')?>?action=Yeardata&otype=Yeardata">年度曲线</a></span></li>
 <li ><span><a href="<?php echo site_url('summary/searchdata')?>?action=Searchdata&otype=Searchdata">详细数据</a></span></li>
 
 
 </ul>
</span>

<script type="text/javascript">
theme = 'grid';
var chart;$(document).ready(function(){chart=new Highcharts.Chart({chart:{renderTo:'container',defaultSeriesType:'line'},title: {text:''},xAxis:{categories:['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月']},yAxis:{title:{text:''}},tooltip:{enabled:false,formatter:function(){return'<b>'+this.series.name+'</b><br/>'+this.x+': '+this.y+'°C'}},plotOptions:{line:{dataLabels:{enabled:true},enableMouseTracking:false}},series:[
{name:'新增任务',data:[<?php echo join(',',$customer)?>]},
{name:'跟单次数',data:[<?php echo join(',',$single)?>]},
{name:'订单数量',data:[<?php echo join(',',$order)?>]},
{name:'合同数量',data:[<?php echo join(',',$hetong)?>]},
{name:'售后次数',data:[<?php echo join(',',$service)?>]}
]})});
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr>
 <td valign="top" class="td_n pd10"><table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1">
 <tr class="tr_t">
 <td class="td_l_l"><B><?php echo date('Y')?> 年度任务统计报表</B></td>
 </tr>
 <tr >
 <td class="td_l_tj"><div id="container" style="width: 100%; height: 400px;"></div></td>
 </tr>
 </table></td>
 </tr>
</table>

<div class="PX10"></div>
</body>
</html>
<script src="<?php echo base_url()?>theme/default/WdatePicker.js"></script>
