<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>

 <table width="100%" border="1" cellpadding="0" cellspacing="0" >
 <tr class="tr_b">
 <?php if (isset($Exportitem1)){?>
 <td width="80" class="td_l_c">编号</td>
 <?php }?>
 <?php if (isset($Exportitem2)){?>
 <td class="td_l_l">任务名称</td>
  <?php }?>
 <?php if (isset($Exportitem4)){?>
 <td class="td_l_c">任务链接</td>
 <?php }?>
 <?php if (isset($Exportitem5)){?>
 <td class="td_l_c">下单日期</td>
 <?php }?>
 <?php if (isset($Exportitem5)){?>
 <td class="td_l_c">交单日期</td>
 <?php }?>
 <?php if (isset($Exportitem7)){?>
 <td class="td_l_c">预付款</td>
 <?php }?>
 <?php if (isset($Exportitem8)){?>
 <td class="td_l_c">订单金额</td>
 <?php }?>
 <?php if (isset($Exportitem9)){?>
 <td class="td_l_c">状态</td>
 <?php }?>
 <?php if (isset($Exportitem11)){?>
 <td class="td_l_c">业务员</td>
 <?php }?>
 <?php if (isset($Exportitem12)){?>
 <td class="td_l_c">录入时间</td>
 <?php }?>


 </tr>
 
 <?php foreach($list as $arr=>$row) {?>
 <tr class="tr">
 <?php if (isset($Exportitem1)){?>
 <td class="td_l_c"><?php echo $row['id']?></td>
 <?php }?>
 <?php if (isset($Exportitem2)){?>
 <td class="td_l_l"><?php echo $row['company']?></td>
 <?php }?>
 <?php if (isset($Exportitem4)){?>
 <td class="td_l_c"><?php echo $row['linkman']?></td>
 <?php }?>
 <?php if (isset($Exportitem5)){?>
 <td class="td_l_c"><?php echo $row['sdate']?></td>
 <?php }?>
 <?php if (isset($Exportitem6)){?>
 <td class="td_l_c"><?php echo $row['edate']?></td>
 <?php }?>
 <?php if (isset($Exportitem7)){?>
 <td class="td_l_c"><?php echo $row['deposit']?></td>
 <?php }?>
 <?php if (isset($Exportitem8)){?>
 <td class="td_l_c"><?php echo $row['money']?></td>
 <?php }?>
 <?php if (isset($Exportitem9)){?>
 <td class="td_l_c">
 <?php echo $audit[$row['state']]?>
 </td>
 <?php }?>
 <?php if (isset($Exportitem11)){?>
 <td class="td_l_c"><?php echo $row['user']?></td>
 <?php }?>
<?php if (isset($Exportitem12)){?>
 <td class="td_l_c"><?php echo $row['cdate']?></td>
 <?php }?>

 </tr>

 <?php }?> 
 
 
 </table>
