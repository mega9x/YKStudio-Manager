<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
 <table width="100%" border="1" cellpadding="0" cellspacing="0">
 <tr >
 <?php if (isset($Exportitem1)){?>
 <td width="80" >编号</td>
 <?php }?>
 <?php if (isset($Exportitem2)){?>
 <td >任务名称</td>
 <?php }?>
 <?php if (isset($Exportitem3)){?>
 <td >跟单类型</td>
 <?php }?>
 <?php if (isset($Exportitem4)){?>
 <td >跟单进度</td>
 <?php }?>
 <?php if (isset($Exportitem5)){?>
 <td >跟单对象</td>
 <?php }?>
 <?php if (isset($Exportitem6)){?>
 <td >下次联系</td>
 <?php }?>
 <?php if (isset($Exportitem7)){?>
 <td >详细内容</td>
 <?php }?>
 <?php if (isset($Exportitem8)){?>
 <td >业务员</td>
 <?php }?>
 <?php if (isset($Exportitem9)){?>
 <td >录入时间</td>
 <?php }?>
 
 </tr>
 
 <?php foreach($list as $arr=>$row) {?>
 <tr class="tr">
 <?php if (isset($Exportitem1)){?>
 <td ><?php echo $row['id']?></td>
 <?php }?>
 <?php if (isset($Exportitem2)){?>
 <td ><?php echo $row['company']?></td>
 <?php }?>
 <?php if (isset($Exportitem3)){?>
 <td ><?php echo $row['type']?></td>
 <?php }?>
 <?php if (isset($Exportitem4)){?>
 <td ><?php echo $row['state']?></td>
 <?php }?>
 <?php if (isset($Exportitem5)){?>
 <td ><?php echo $row['linkman']?></td>
 <?php }?>
  <?php if (isset($Exportitem6)){?>
 <td ><?php echo $row['nexttime']?></td>
 <?php }?>
  <?php if (isset($Exportitem7)){?>
 <td  style="line-height:25px;"><?php echo $row['content']?></td>
 <?php }?>
  <?php if (isset($Exportitem8)){?>
 <td ><?php echo $row['user']?></td>
 <?php }?>
  <?php if (isset($Exportitem9)){?>
 <td ><?php echo $row['cdate']?></td>
 <?php }?>
 
 </tr>
 
 <?php }?> 
 </table>
 
  