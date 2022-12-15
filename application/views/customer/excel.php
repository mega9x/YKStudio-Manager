<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
 <table width="100%" cellpadding="0" cellspacing="0" border="1">
 <tr>
 
  <td width="50" nowrap="nowrap" class="td_l_c">编号</td>
  
 <td width="180" nowrap="nowrap" class="td_l_l">任务名称</td>
  

 <td width="100" nowrap="nowrap" class="td_l_c">所在地区</td>


 <td width="100" nowrap="nowrap" class="td_l_c">账户信息</td>


 <td width="100" nowrap="nowrap" class="td_l_c">转化情况</td>
 
 <td width="100" nowrap="nowrap" class="td_l_c">任务要求</td>

 <td width="120" nowrap="nowrap" class="td_l_c">任务类型</td>


 <td width="80" nowrap="nowrap" class="td_l_c">流量状况</td>

 <td width="80" nowrap="nowrap" class="td_l_c">所属联盟</td>

 <td width="80" nowrap="nowrap" class="td_l_c">任务链接</td>

 <td width="100" nowrap="nowrap" class="td_l_c">合作站点</td>

 <td width="100" nowrap="nowrap" class="td_l_c">录入时间</td>

 <td width="80" nowrap="nowrap" class="td_l_c">业务员</td>

 </tr>

 <?php foreach($list as $arr=>$row) {?>
 <tr class="tr">
  
 <td class="td_l_c"><?php echo $row['id']?></td>
  
 <td class="td_l_l vtip"><?php echo $row['name']?></td>
  

 <td class="td_l_c"><?php echo $row['area1']?>&nbsp;&nbsp;<?php echo $row['area2']?></td>

 <td class="td_l_c"><?php echo $row['address']?></td>

 <td class="td_l_c"><?php echo $row['type']?></td>

 <td class="td_l_c"><?php echo $row['qq']?></td>

 <td class="td_l_c"><?php echo $row['trade']?></td>

 <td class="td_l_c"><?php echo $row['start']?></td>

 <td class="td_l_c"><?php echo $row['source']?></td>

 <td class="td_l_c"><?php echo $row['linkman']?></td>

 <td class="td_l_c"><?php echo $row['mobile']?></td>

 <td class="td_l_c"><?php echo $row['adddate']?></td>

  


 <td class="td_l_c"><?php echo $row['adduser']?></td>

 </tr>
 <?php }?>
 </table>