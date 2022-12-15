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
 <!-- 合同记录必填项提示
 function CheckInput()
 {
 if (1 =="1"){if(document.all.number.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content: '合同编号不能为空！'});document.all.number.focus();return false;}}
 if (<?php echo isset($config['bt_ht_oid']) ? 1 : 0?> =="1"){if(document.all.oId.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content: '订单编号不能为空！'});document.all.oId.focus();return false;}}
 if (<?php echo isset($config['bt_sdate']) ? 1 : 0?> =="1"){if(document.all.sdate.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content: '起始时间不能为空！'});document.all.sdate.focus();return false;}}
 if (<?php echo isset($config['bt_edate']) ? 1 : 0?> =="1"){if(document.all.edate.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content: '到期时间不能为空！'});document.all.edate.focus();return false;}}
 if (<?php echo isset($config['bt_type']) ? 1 : 0?> =="1"){if(document.all.type.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content: '合同分类不能为空！'});document.all.type.focus();return false;}}
 if (<?php echo isset($config['bt_money']) ? 1 : 0?> =="1"){if(document.all.money.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content: '总金额不能为空！'});document.all.money.focus();return false;}}
 if (<?php echo isset($config['bt_revenue']) ? 1 : 0?> =="1"){if(document.all.revenue.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content: '已收款不能为空！'});document.all.hRevenue.focus();return false;}}
 if (<?php echo isset($config['bt_invoice']) ? 1 : 0?> =="1"){if(document.all.isinvoice.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content: '提供发票不能为空！'});document.all.isinvoice.focus();return false;}}
 if (1 =="1"){if(document.all.istax.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content: '是否含税不能为空！'});document.all.hTax.focus();return false;}}
 if (<?php echo isset($config['bt_content']) ? 1 : 0?> =="1"){if(document.all.content.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content: '详情备注不能为空！'});document.all.content.focus();return false;}}
 }
 -->
 </script>
 
 
 

<form name="Save" action="<?php echo site_url('contract/add')?>" method="post" onSubmit="return CheckInput();">

<div class="cssout">
  
 <div class="cssin">
 <ul>
 <li class="w100 bg"><B>新增合同信息</B></li>
 <li class="w25 bg tr">任务名称</li>
 <li class="w75"><?php echo $name?> ( 编号 : <?php echo $id?> )
 
<input name="Chongxuan" type="button" id="Chongxuan" class="btn1 btnchongx" value="重选" onclick='$.dialog.open.origin.InfoAdd_Chose();$.dialog.close();'>

 </li>
 <li class="w25 bg tr">合同编号</li>
 <li class="w75">
 <input name="number" type="text" id="hNum" size="23" value="<?php echo CONTRACTNUMBER==1 ? str_number('HT') : ''?>" <?php echo CONTRACTNUMBER==1 ? 'readonly' : ''?> style="border:0;"  class="bor int"/>
 
 <span class="info_help help01" >&nbsp;自动编号</span></li>
 <li class="w25 bg tr">
 
 <?php echo isset($config['bt_type']) ? '<font color="#FF0000">*</font>' : ''?>
 合同分类</li>
 <li class="w75">
 <select name="type" id="Select_Hetong"><option value="">请选择</option>
 <?php foreach($select_hetong as $arr=>$row) {?>
 <option value="<?php echo $row['name']?>"><?php echo $row['name']?></option>
 <?php }?>
</select>
 <a class="btn1 btnxinz" onclick='Select_Hetong("<?php echo site_url('select/main')?>?type=hetong")'>新增</a>
 
 <script>function Select_Hetong(Dourl) {$.dialog.open(Dourl, {title: '新增选项值', width: 850, height: 400,fixed: true}); };</script> 
 </li>
 <li class="w25 bg tr">
  <?php echo isset($config['bt_ordernumber']) ? '<font color="#FF0000">*</font>' : ''?>
 订单编号</li>
 <li class="w75">
 <input name="orderid" type="hidden" id="oId" size="23" value="" readonly />
 <input name="ordernumber" type="text" id="oCode" size="23" class="int" value="" onclick='Choose_Order()'/>
 <script>function Choose_Order() {$.dialog.open('<?php echo site_url('common/choose_order')?>?customerid=<?php echo $id?>', {title: '新窗口', width: 900, height: 480,fixed: true}); };</script>
 
 
  </li>
 <li class="w25 bg tr">
 
<?php echo isset($config['bt_sdate']) ? '<font color="#FF0000">*</font>' : ''?>
 起始时间</li>
 <li class="w25">
 <input name="sdate" type="text" id="hSdate" class="int Wdate" size="15" onFocus="WdatePicker({dateFmt:'yyyy-MM-dd'})" value="<?php echo date('Y-m-d')?>" />
 
 </li>
 <li class="w25 bg tr">
 
 <?php echo isset($config['bt_edate']) ? '<font color="#FF0000">*</font>' : ''?>
 到期时间</li>
 <li class="w25">
 <input name="edate" type="text" id="hEdate" class="int Wdate" size="15" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})" value="" />
 </li>
    <li class="w25 bg tr">

         <?php echo isset($config['bt_money']) ? '<font color="#FF0000">*</font>' : ''?>
         总金额
     </li>
     <li class="w25">
         <input type="text" id="hMoney" name="money" class="int" size="10" readonly  value="0" />
         元
     </li>









     <li class="w25 bg tr">欠款金额</li>
 <li class="w25">

     <input type="text" id="qkMoney"  type="hidden" name="qkmoney" class="int" size="10" readonly  value="0" />
     元
 </li>
 <li class="w25 bg tr">
 <?php echo isset($config['bt_invoice']) ? '<font color="#FF0000">*</font>' : ''?>
 提供发票</li>
 <li class="w25 bg" style="background:#fff;">
 <select name="isinvoice" id="Select_YN"><option value="">请选择</option><option value="是">是</option><option value="否">否</option></select>
 </li>
 <li class="w25 bg tr">
 是否含税</li>
 <li class="w25">
<select name="istax" id="Select_YN"><option value="">请选择</option><option value="是">是</option><option value="否">否</option></select>
 </li>
 
 <li class="w25 bg duohang tr">
 <?php echo isset($config['bt_content']) ? '<font color="#FF0000">*</font>' : ''?>
 详情备注</li>
 <li class="w75 duohang">
 <textarea name="content" rows="4" id="hContent" class="int" style="height:80px;width:98%;"></textarea>
 
 </li>
 </ul>
 </div>
 <div class="h50b"></div>
 <div class="fixed_bg_B">
 <input name="customerid"  type="hidden"  value="<?php echo $id?>">
 <input name="customername"  type="hidden"  value="<?php echo $name?>">
 <input type="submit" class="btn2 btnbaoc" value="保存">
 <input name="Back" type="button" id="Back" class="btn2 btnguanb" value="关闭" onClick="art.dialog.close();">
 </div>
 </form>
</div>


<script src="<?php echo base_url()?>theme/default/WdatePicker.js"></script>
</body>
</html>




