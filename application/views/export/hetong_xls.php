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
 <td class="td_l_c">合同编号</td>
 <?php }?>
 <?php if (isset($Exportitem5)){?>
 <td class="td_l_c">起始时间</td>
 <?php }?>
 <?php if (isset($Exportitem6)){?>
 <td class="td_l_c">到期时间</td>
 <?php }?>
 <?php if (isset($Exportitem7)){?>
 <td class="td_l_c">合同分类</td>
 <?php }?>
 <?php if (isset($Exportitem10)){?>
 <td class="td_l_c">总金额</td>
 <?php }?>
 <?php if (isset($Exportitem8)){?>
 <td class="td_l_c">已收款</td>
 <?php }?>
 <?php if (isset($Exportitem9)){?>
 <td class="td_l_c">欠款</td>
 <?php }?>
 <?php if (isset($Exportitem11)){?>
 <td class="td_l_c">提供发票</td>
 <?php }?>
 <?php if (isset($Exportitem12)){?>
 <td class="td_l_c">是否含税</td>
 <?php }?>
 <?php if (isset($Exportitem13)){?>
 <td class="td_l_c">合同状态</td>
 <?php }?> 
 <?php if (isset($Exportitem15)){?>
 <td class="td_l_c">审核人员</td>
 <?php }?>
 <?php if (isset($Exportitem16)){?>
 <td class="td_l_c">审核时间</td>
 <?php }?>
 <?php if (isset($Exportitem18)){?>
 <td class="td_l_c">业务员</td>
 <?php }?>
 <?php if (isset($Exportitem19)){?>
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
 <td class="td_l_c">
 <?php echo $row['number']?>
 </td>
 <?php }?>
 <?php if (isset($Exportitem5)){?>
 <td class="td_l_c"><?php echo $row['sdate']?></td>
 <?php }?>
 <?php if (isset($Exportitem6)){?>
 <td class="td_l_c"><?php echo $row['edate']?></td>
 <?php }?>
<?php if (isset($Exportitem7)){?>
 <td class="td_l_c"><?php echo $row['type']?></td>
 <?php }?>
<?php if (isset($Exportitem10)){?>
 <td class="td_l_c"><?php echo $row['money']?></td>
 <?php }?>
  <?php if (isset($Exportitem8)){?>
 <td class="td_l_c"><?php echo $row['revenue']?></td>
 <?php }?>
 <?php if (isset($Exportitem9)){?>
 <td class="td_l_c">-1</td>
 <?php }?>
<?php if (isset($Exportitem11)){?>
 <td class="td_l_c"><?php echo $row['isinvoice']?></td>
 <?php }?>
 <?php if (isset($Exportitem12)){?>
 <td class="td_l_c"><?php echo $row['istax']?></td>
 <?php }?>
  <?php if (isset($Exportitem13)){?>
 <td class="td_l_c">
<a class="btn_sh1" onclick='Hetong_InfoAudit3()'>合同有效</a>
<a class="btn_yxf" onclick='hetong_xufei_List3()' title="查看续费">续费有效</a>
 </td>
 <?php }?>
 
 <?php if (isset($Exportitem15)){?>
 <td class="td_l_c"><?php echo $row['aname']?></td>
 <?php }?>
 <?php if (isset($Exportitem16)){?>
 <td class="td_l_c"><?php echo $row['adate']?></td>
 <?php }?>
<?php if (isset($Exportitem18)){?>
 <td class="td_l_c"><?php echo $row['user']?></td>
 <?php }?>
 <?php if (isset($Exportitem19)){?>
 <td class="td_l_c"><?php echo $row['cdate']?></td>
 <?php }?>

 </tr>

  
 <?php }?> 
  
 
 </table>
 