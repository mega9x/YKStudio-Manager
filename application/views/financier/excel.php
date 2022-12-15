<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
 <table width="100%" cellpadding="0" cellspacing="0" border="1">
  <tr class="tr_b">
 <td width="80" class="td_l_c">编号</td>
  
 <td class="td_l_c">收支类别</td>
 
 <td class="td_l_l">任务名称</td>
  
 <td class="td_l_c">收支日期</td>
 
 <td class="td_l_c">收入/支出</td>
  
 <td class="td_l_c">总金额</td>
 
 <td class="td_l_l">详情备注</td>
 
 <td class="td_l_c">业务员</td>
 
 <td class="td_l_c">录入时间</td>
 
  
 </tr>
 
 <?php foreach($list as $arr=>$row) {?>
 <tr class="tr">
 <td class="td_l_c"><?php echo $row['id']?></td>
  
 <td class="td_l_c"><?php echo $row['type']?></td>
 
 
 <td class="td_l_l">
 <a onclick='Kehu_InfoView<?php echo $row['cid']?>()' style="cursor:pointer;"><?php echo $row['customername'] ? $row['customername'] : '无公司资料关联'?></a>
 </td>
  
 
 <td class="td_l_c"><?php echo $row['edate']?></td>
 
 <td class="td_l_c"><?php echo $row['outin']==1 ? '收入' : '支出'?></td>
 
 <td class="td_l_c"><?php echo $row['money']?></td>
 
 <td class="td_l_l" style="line-height:25px;"><?php echo $row['content']?></td>
 
 <td class="td_l_c"><?php echo $row['adduser']?></td>
  
 <td class="td_l_c"><?php echo $row['adddate']?></td>
  
 
  
 </tr>
  
 <?php }?> 
  
 </table>