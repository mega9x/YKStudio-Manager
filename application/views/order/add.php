<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url()?>theme/default/css/common.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>theme/default/css/csstable.css">
<script language="javascript" src="<?php echo base_url()?>theme/default/js/Common.js"></script>
<script language="javascript" src="<?php echo base_url()?>theme/default/js/jquery.min.js"></script>
<script language="javascript" src="<?php echo base_url()?>theme/default/js/tips.js"></script>
<script src="<?php echo base_url()?>theme/default/js/jquery.artDialog.js?skin=default"></script>
<script src="<?php echo base_url()?>theme/default/js/iframeTools.js"></script>

</head>
<body>

<script language="JavaScript">
 <!-- 跟单记录必填项提示
 function CheckInput()
 {
 if (<?php echo isset($config['bt_linkman']) ? 1 : 0?>=="1"){if(document.all.linkman.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content: '任务链接不能为空！'});document.all.linkman.focus();return false;}}
 if (<?php echo isset($config['bt_sdate']) ? 1 : 0?>=="1"){if(document.all.sdate.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content: '下单日期不能为空！'});document.all.sdate.focus();return false;}}
 if (<?php echo isset($config['bt_edate']) ? 1 : 0?>=="1"){if(document.all.edate.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content: '交单日期不能为空！'});document.all.edate.focus();return false;}}
 
 if (<?php echo isset($config['bt_content']) ? 1 : 0?>=="1"){if(document.all.content.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content: '详情备注不能为空！'});document.all.content.focus();return false;}}
 }
 -->
 </script>
 


<form name="Save" action="<?php echo site_url('order/add')?>" method="post" onSubmit="return CheckInput();">
<div class="cssout">
 
 <div class="cssin">
 <ul>
 <li class="w100 bg"><B>新增订单</B></li>
 <li class="w25 bg cl tr">任务名称</li>
 <li class="w75">
<?php echo $name?> ( 编号 : <?php echo $id?> )
 
 </li>
 
 
  <li class="w25 bg cl tr">
 
 <?php echo isset($config['bt_type']) ? '<font color="#FF0000">*</font>' : ''?>
 订单编号</li>
 <li class="w75">
 <input name="number" type="text" id="oCode" size="23" class="int"  value="<?php echo ODERNUMBER==1 ? str_number('DD') : ''?>" <?php echo ODERNUMBER==1 ? 'readonly' : ''?> style="border:0;"  />
 
 <span class="info_help help01" >&nbsp;自动编号</span> </li>
 
 
 
 <li class="w25 bg cl tr">
 
 <?php echo isset($config['bt_linkman']) ? '<font color="#FF0000">*</font>' : ''?>
 任务链接</li>
 <li class="w75">
  <select name="linkman" id="oLinkman" onChange="getselectids(this.options[this.selectedIndex].id);">
<option value="">请选择</option>
<?php foreach($select_linkman as $arr=>$row) {?>
 <option value="<?php echo $row['name']?>" id="<?php echo $row['tel']?>"><?php echo $row['name']?></option>
 <?php }?>
</select>
 &nbsp;
 <input name="Back" type="button" id="Back" class="btn1 btnxinz" value="新增" onclick='Linkmans_InfoAdd()'>
 <script>function Linkmans_InfoAdd() {$.dialog.open('<?php echo site_url('linkman/add')?>?id=<?php echo $id?>', {title: '新增任务链接', width: 600, height: 500,fixed: true}); };</script> 
 <script>
选项获取参数
function getselectids(tel){
 if(tel==""){
document.getElementById("linktel").innerHTML=" 未查询到信息";
 }else{
document.getElementById("linktel").innerHTML=" 电话：<b style='color:red;'>"+tel+"</b>";
 }
}
</script> 
 <span id="linktel"></span>
</li>

 
 
 
 
   <li class="w25 bg cl tr">
 
 <?php echo isset($config['bt_sdate']) ? '<font color="#FF0000">*</font>' : ''?>
 下单日期</li>
 <li class="w75">
 <input name="sdate" type="text" id="oSDate" class="int Wdate" size="15" onFocus="WdatePicker({dateFmt:'yyyy-MM-dd'})" value="<?php echo date('Y-m-d')?>" />

 
 </li>



 <li class="w25 bg cl tr">
 
 <?php echo isset($config['bt_edate']) ? '<font color="#FF0000">*</font>' : ''?>
 交单日期</li>
 <li class="w75">
 <input name="edate" type="text" id="oEDate" class="int Wdate" size="15" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})" />
 </li>




  <li class="w25 bg cl duohang tr">
 
<?php echo isset($config['bt_content']) ? '<font color="#FF0000">*</font>' : ''?>
 详情备注</li>
 <li class="w75 duohang">
 
 <textarea name="content" rows="4" id="oContent" class="int" style="height:80px;width:99%;"></textarea>
 </li>

 
 
 
  
 </ul>
 </div>
 <div class="h50b"></div>
 <div class="fixed_bg_B">
 <input name="customerid" type="hidden"  value="<?php echo $id?>" readonly/>
 <input name="customername" type="hidden"  value="<?php echo $name?>" readonly/>
 <input type="submit" class="btn2 btnbaoc" value="保存">
 <input name="Back" type="button" id="Back" class="btn2 btnguanb" value="关闭" onClick="art.dialog.close();">
 </div>
 </form>
</div>

 
<script src="<?php echo base_url()?>theme/default/WdatePicker.js"></script>
</body>
</html>


 