<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url()?>theme/default/css/common.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url()?>theme/default/js/Common.js" type="text/javascript"></script>
</head>
<body> 

<table width="100%" border="0" cellpadding="0" cellspacing="0">
 <tr>
 <td valign="top" class="td_n"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#ffffff;">
 <tr>
 <td valign="top" class="td_n pdl10 pdr10 pdt10"><div id="ss" style="height:37px;overflow:hidden; ">
   <form name="searchForm" action="?saction=ssdetail" method="post">
     <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_1">
       
       <tr>
         <td class="td_l_r title">关键字</td>
         <td class="td_r_l">
		    
 
		     <input name="keyword" type="text" class="int" id="keyword" size="20" value="<?php echo $keyword?>" onkeyup="searchSuggest();" />
			 
 
			 
			  
			 
		     <input type="submit" name="Submit" id="ss_button" class="btn1 btnxiug" value="搜索" />
			 <input type="button" class="btn1 btnxiug" value="清空条件" onClick=window.location.href="?" />
			 
			</td>
 
       </tr>
     </table>
   </form>
 </td>
 </tr>
 </table> 
 </td>
 </tr>
 </table>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr> 
 <td valign="top" class="td_n pd10">
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr>
 <td valign="top" colspan=2 class="td_n">
 <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_1">
 <tr class="tr_t">
 <td width="60" class="td_l_c">编号</td>
 <td width="100" class="td_l_c">真实姓名</td>
 <td width="120" class="td_l_c">合作站点</td>
 <td class="td_l_l">电子邮箱</td>
 <td class="td_l_l">部门</td>
 <td width="100" class="td_l_c">生日</td>
 <td width="100" class="td_l_c">入司时间</td>
 </tr>
 <?php foreach($list as $arr=>$row) {?>
 <Tr class="tr">
 <TD class="td_l_c"><?php echo $row['uid']?></TD>
 <TD class="td_l_c"><?php echo $row['name']?></a></TD>
 <TD class="td_l_c"><?php echo $row['mobile']?></TD>
 <TD class="td_l_l"><?php echo $row['email']?></TD>
 <TD class="td_l_l"><?php echo $row['groupname']?></TD>
 <TD class="td_l_c"><?php echo $row['birthday']?></TD>
 <TD class="td_l_c"><?php echo $row['adddate']?></TD>
 </TR>
 <?php }?>
 
 </table> 
 </td>
 </tr>
 </table> 
 </td>
 </tr>
</table>
<div class="fixed_bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
 <tr>
 <td valign="top" class="td_n Bottom_pd ">
 
 <div class="pagepostion">
 <ul class="pagination">
 <?php echo $this->lib_page->showpage()?>
 <script language='javascript'>function getValue(obj){if (document.getElementById("geturl").value!="") {location.href="<?php echo site_url('customer')?>?page="+escape(document.getElementById("geturl").value)+""}}</script>
<input class="pagenum" id="geturl" value="<?php echo $this->lib_page->nowPage?>"><li class="last"><a href='javascript:void(0);' onclick="getValue(geturl.value)">跳转</a></li></ul>
 </div>
 
 </td> 
 </tr>
</table>
</div>
</body>
</html>