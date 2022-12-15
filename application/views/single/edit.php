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
function CheckInput() {
   if (<?php echo isset($config['bt_type']) ? 1 : 0?>=="1"){if(document.all.type.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content: '跟单类型不能为空！'});document.all.type.focus();return false;}}
   if (<?php echo isset($config['bt_state']) ? 1 : 0?>=="1"){if(document.all.state.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content: '跟单进度不能为空！'});document.all.state.focus();return false;}}
   if (<?php echo isset($config['bt_linkman']) ? 1 : 0?>=="1"){if(document.all.linkman.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content: '跟单对象不能为空！'});document.all.linkman.focus();return false;}}
   if (<?php echo isset($config['bt_nexttime']) ? 1 : 0?>=="1"){if(document.all.nexttime.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content: '下次联系不能为空！'});document.all.nexttime.focus();return false;}}
   if (0=="1"){if(document.all.remind.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content: '提醒时间不能为空！'});document.all.remind.focus();return false;}}
   if (<?php echo isset($config['bt_content']) ? 1 : 0?>=="1"){if(document.all.content.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content: '详细内容不能为空！'});document.all.content.focus();return false;}}
}
 </script>
 
 

<form name="Save" action="<?php echo site_url('single/edit')?>?id=<?php echo $id?>" method="post" onSubmit="return CheckInput();">
<div class="cssout">
 
 <div class="cssin">
 <ul>
 <li class="w100 bg"><B>修改跟单记录</B></li>
 <li class="w25 bg cl tr">任务名称</li>
 <li class="w75">
<?php echo $customername?> ( 编号 : <?php echo $customerid?> )
 
 </li>
 <li class="w25 bg cl tr">
 
 <?php echo isset($config['bt_type']) ? '<font color="#FF0000">*</font>' : ''?>
 跟单类型</li>
 <li class="w75">
 <select name="type" id="Select_Gendan">
 <option value="">请选择</option>
 
 <?php foreach($select_records as $arr=>$row) {?>
 <option value="<?php echo $row['name']?>" <?php echo $row['name']==$type ? 'selected' :''?>><?php echo $row['name']?></option>
 <?php }?>
 </select>
 <a class="btn1 btnxinz" onclick='Select_Gendan("<?php echo site_url('select/main')?>?type=records")'>新增</a>
 
 <script>function Select_Gendan(Dourl) {$.dialog.open(Dourl, {title: '新增选项值', width: 850, height: 450,fixed: true}); };</script> 
 </li>
 <li class="w25 bg cl tr">
 
 <?php echo isset($config['bt_state']) ? '<font color="#FF0000">*</font>' : ''?>
 跟单进度</li>
 <li class="w75">
<select name="state" id="Select_Type">
 <option value="">请选择</option>
  <?php foreach($select_type as $arr=>$row) {?>
 <option value="<?php echo $row['name']?>" <?php echo $row['name']==$state ? 'selected' : ''?>><?php echo $row['name']?></option>
 <?php }?>
 </select>
 &nbsp; <span class="info_help help01" >&nbsp;同步转化情况</span>
 
 <a class="btn1 btnxinz" onclick='Select_Type("<?php echo site_url('select/main')?>?type=type")'>新增</a>
 
 <script>function Select_Type(Dourl) {$.dialog.open(Dourl, {title: '新增选项值', width: 850, height: 450,fixed: true}); };</script> 
 </li>
 <li class="w25 bg cl tr">
 
 <?php echo isset($config['bt_linkman']) ? '<font color="#FF0000">*</font>' : ''?>
 跟单对象</li>
 <li class="w75">
  <select name="linkman" id="rLinkman" onChange="getselectids(this.options[this.selectedIndex].id);">
 <option value="">请选择</option>
 <?php foreach($select_linkman as $arr=>$row) {
           if ($linkman==$row['name']) {
		       $tel =$row['tel'];
		   }
 ?>
 <option value="<?php echo $row['name']?>" id="<?php echo $row['tel']?>" <?php echo $linkman==$row['name'] ? 'selected' :''?>><?php echo $row['name']?></option>
 <?php }?>
 </select>
  
 &nbsp;
 <input name="Back" type="button" id="Back" class="btn1 btnxinz" value="新增" onclick='Linkmans_InfoAdd("<?php echo site_url('linkman/add')?>?id=<?php echo $customerid?>")'>
 <script>function Linkmans_InfoAdd(Dourl) {$.dialog.open(Dourl, {title: '新增任务链接', width: 500, height: 500,fixed: true}); };</script> 
 <script>
/*选项获取参数*/
function getselectids(tel){
 if(tel==""){
document.getElementById("linktel").innerHTML=" 未查询到信息";
 }else{
document.getElementById("linktel").innerHTML=" 电话：<b style='color:red;'>"+tel+"</b>";
 }
}
</script> 
 <span id="linktel"></span></li>
 <li class="w25 bg cl tr">
 <?php echo isset($config['bt_content']) ? '<font color="#FF0000">*</font>' : ''?>
 下次联系</li>
 <li class="w75">
  <input name="nexttime" type="text" id="rNextTime" class="int Wdate" size="22" value="<?php echo $nexttime?>" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:00:00'})" />
 提前：
 <select name="remind">
 <option value="1" <?php echo $remind==1 ? 'selected' :''?> >1小时</option>
 <option value="2" <?php echo $remind==2 ? 'selected' :''?>>2小时</option>
 <option value="3" <?php echo $remind==3 ? 'selected' :''?>>3小时</option>
 <option value="24" <?php echo $remind==24 ? 'selected' :''?>>1　天</option>
 <option value="48" <?php echo $remind==48 ? 'selected' :''?>>2　天</option>
 <option value="72" <?php echo $remind==72 ? 'selected' :''?>>3　天</option>
 <option value="168" <?php echo $remind==168 ? 'selected' :''?>>1　周</option>
 </select>
 提醒</li>
 
 <li class="w25 bg cl duohang tr">
 <?php echo isset($config['bt_nexttime']) ? '<font color="#FF0000">*</font>' : ''?>
 详细内容</li>
 <li class="w75 duohang">
 
 <textarea name="Content" rows="4" id="rContent" class="bor textarea" style="width:100%;"><?php echo $content?></textarea>
 </li>
 </ul>
 </div>
 <div class="h50b"></div>
 <div class="fixed_bg_B">
  
 <input type="submit" class="btn2 btnbaoc" value="保存">
 <input name="Back" type="button" id="Back" class="btn2 btnguanb" value="关闭" onClick="art.dialog.close();">
 </div>
 </form>
</div> 
 
  

<script src="<?php echo base_url()?>theme/default/WdatePicker.js"></script>
</body>
</html>