<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
 <table width="100%" border="1" cellpadding="0" cellspacing="0">
 <tr class="tr_b">
 <?php if (isset($Exportitem1)){?>
 <td width="80">编号</td>
 <?php }?>
 <?php if (isset($Exportitem2)){?>
 <td>任务名称</td>
 <?php }?>
 <?php if (isset($Exportitem3)){?>
 <td>收支日期</td>
 <?php }?>
 <?php if (isset($Exportitem4)){?>
 <td>收入/支出</td>
 <?php }?>
 <?php if (isset($Exportitem5)){?>
 <td>收支类别</td>
 <?php }?>
 <?php if (isset($Exportitem6)){?>
 <td>总金额</td>
 <?php }?>
 <?php if (isset($Exportitem7)){?>
 <td>详情备注</td>
 <?php }?>
 <?php if (isset($Exportitem8)){?>
 <td>业务员</td>
 <?php }?>
 <?php if (isset($Exportitem9)){?>
 <td>录入时间</td>
 <?php }?>
 </tr>
 <?php foreach($list as $arr=>$row) {?>
 <tr class="tr">
 <?php if (isset($Exportitem1)){?>
 <td><?php echo $row['id']?></td>
 <?php }?>
 <?php if (isset($Exportitem2)){?>
 <td><?php echo $row['company'] ? $row['company'] : '无公司资料关联'?></td>
 <?php }?>
 <?php if (isset($Exportitem3)){?>
 <td><?php echo $row['edate']?></td>
 <?php }?>
 <?php if (isset($Exportitem4)){?>
 <td><?php echo $row['outin']==1 ? '收入' : '支出'?></td>
 <?php }?>
  <?php if (isset($Exportitem5)){?>
 <td><?php echo $row['type']?></td>
 <?php }?>
 <?php if (isset($Exportitem6)){?>
 <td><?php echo $row['money']?></td>
 <?php }?>
 <?php if (isset($Exportitem7)){?>
 <td style="line-height:25px;"><?php echo $row['content']?></td>
 <?php }?>
 <?php if (isset($Exportitem8)){?>
 <td><?php echo $row['user']?></td>
 <?php }?>
 <?php if (isset($Exportitem9)){?>
 <td><?php echo $row['cdate']?></td>
 <?php }?>
 </tr>
 <?php }?> 
 </table>
 