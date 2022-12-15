<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url()?>theme/default/css/common.css" rel="stylesheet" type="text/css">
<script language="javascript" src="<?php echo base_url()?>theme/default/js/Common.js"></script>
<script language="javascript" src="<?php echo base_url()?>theme/default/js/jquery.min.js"></script>
<script language="javascript" src="<?php echo base_url()?>theme/default/js/tips.js"></script>
<script src="<?php echo base_url()?>theme/default/js/jquery.artDialog.js?skin=default"></script>
<script src="<?php echo base_url()?>theme/default/js/iframeTools.js"></script>
<link href="<?php echo base_url()?>theme/default/css/jquery.vtip.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url()?>theme/default/js/jquery.vtip.js"></script>
</head>
<body>
<script>

    var common_getTrade = "<?php echo site_url('common/gettrade')?>";

</script>

<script>function changese(obj){  window.location.href=obj.value }</script>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="top_bg">
 <tr>
 <td class="top_left td_t_n td_r_n">商品 （单击选中）

     <form name="searchForm" action="?saction=ssdetail" method="post">
         大分类：&nbsp;&nbsp;<input name="bigclass" type="text" class="int" id="bigclass" size="20" value="<?php echo $bigclass?>"  />
         小分类：&nbsp;&nbsp;<input name="smallclass" type="text" class="int" id="smallclass" size="20" value="<?php echo $smallclass?>"  />
         关键词搜索：&nbsp;&nbsp;<input name="keyword" type="text" class="int" id="keyword" size="20" value="<?php echo $keyword?>"  />

     <input type="submit" name="Submit" id="ss_button" class="btn1 btnxiug" value="搜索" /> &nbsp;&nbsp;<input type="button" class="btn1 btnxiug" value="清空条件" onClick=window.location.href="?" />
     </form>

 </td>
 <td class="top_right td_t_n td_r_n"></td>
 </tr>
</table>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
 <tr>
 <td valign="top" class="td_n pdl10 pdr10 pdt10"><table width="100%" border="0" cellspacing="0" cellpadding
="0" CLASS="table_1">
 <tr class="tr_t">
 <td width="100" class="td_l_c">大分类</td>
 <td width="100" class="td_l_c">小分类</td>
 <td class="td_l_l">产品名称</td>
 
 <td class="td_l_c">商品库存</td>
 
 <td class="td_l_c">成本单价</td>
 
 <td width="80" class="td_l_c">单价</td>
 </tr>
 <?php foreach($list as $arr=>$row) {?>
 <tr class="tr" onClick=window.location.href="javascript:$.dialog.open.origin.$('#ProId').val('<?php echo $row['id']?>');$.dialog.open.origin.$('#ProTitle').val('<?php echo $row['title']?>');$.dialog.open.origin.$('#oProItemA').val('');$.dialog.open.origin.$('#oProItemB').val('');$.dialog.open.origin.$('#oProItemC').val('<?php echo $row['minqty']?>');$.dialog.open.origin.$('#oProItemD').val('<?php echo $row['qtys']?>');$.dialog.open.origin.$('#oProItemE').val('<?php echo $row['purprice']?>');$.dialog.open.origin.$('#oProPrice').val('<?php echo $row['saleprice']?>');$.dialog.open.origin.$('#oMoney').val('<?php echo $row['saleprice']?>');$.dialog.close();" style="cursor:pointer;" >
 <td class="td_l_c"><?php echo $row['trade']?></td>
 <td class="td_l_c"><?php echo $row['strade']?></td>
 <td class="td_l_l"><?php echo $row['title']?></td>
 <td class="td_l_c"><?php echo $row['qtys']?></td>
 <td class="td_l_c"><?php echo $row['purprice']?></td>
 <td class="td_l_c"><?php echo $row['saleprice']?></td>
  
 </tr>
 <?php }?>
 </table></td>
 </tr>
</table>
<div class="fixed_bg"> 
 <!--分页代码开始-->
<div class="pagepostion">
 <ul class="pagination">
 <?php echo $this->lib_page->showpage()?>
 <script language='javascript'>
     function getValue(obj){if (document.getElementById("geturl").value!="")
     {location.href="<?php echo site_url('common/choose_product')?>?page="+escape(document.getElementById("geturl").value)+""}}</script>
<input class="pagenum" id="geturl" value="<?php echo $this->lib_page->nowPage?>">
     <li class="last">
         <a href='javascript:void(0);' onclick="getValue(geturl.value)">跳转</a>
     </li>
 </ul>
 </div>
 <!--分页代码结束--> 
 
</div>

<script src="<?php echo base_url()?>theme/default/WdatePicker.js"></script>
</body>
</html>

