<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
 <table width="100%" cellpadding="0" cellspacing="0" border="1">
 <tr>
 
 <td width="80" class="td_l_c">编号</td>
 <td class="td_l_l">客户名称</td>

 <td class="td_l_c">联系人</td>


 <td class="td_l_c">下单日期</td>


 <td class="td_l_c">交单日期</td>

 <td class="td_l_c">订单金额</td>

 <td class="td_l_c">状态</td>

 <td class="td_l_c">业务员</td>


 <td class="td_l_c">录入时间</td>

 </tr>

 <?php foreach($list as $arr=>$row) {?>
 <tr class="tr">
 <td class="td_l_c"><?php echo $row['id']?></td>
 <td class="td_l_l"><?php echo iconv("UTF-8","gbk//TRANSLIT",$row['customername']);?></td>

 <td class="td_l_c"><?php echo iconv("UTF-8","gbk//TRANSLIT",$row['linkman']);?></td>


 <td class="td_l_c"><?php echo $row['sdate']?></td>


 <td class="td_l_c"><?php echo $row['edate']?></td>


 <td class="td_l_c"><?php echo $row['money']?></td>

 <td class="td_l_c">
 <?php echo iconv("UTF-8","gbk//TRANSLIT",$audit[$row['state']]);?>
 </td>


 <td class="td_l_c"> <?php echo iconv("UTF-8","gbk//TRANSLIT",$row['adduser']);?>
	</td>


 <td class="td_l_c"><?php echo $row['addtime']?></td>

  
 </tr>
 <?php }?>
 </table>