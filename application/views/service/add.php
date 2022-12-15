<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="<?php echo base_url()?>theme/default/css/common.css" rel="stylesheet" type="text/css">
<script language="javascript" src="<?php echo base_url()?>theme/default/js/Common.js"></script>
<script language="javascript" src="<?php echo base_url()?>theme/default/js/jquery.min.js"></script>
<script language="javascript" src="<?php echo base_url()?>theme/default/js/tips.js"></script>
<script src="<?php echo base_url()?>theme/default/js/jquery.artDialog.js?skin=default"></script>
<script src="<?php echo base_url()?>theme/default/js/iframeTools.js"></script>
</head>
<body>
<script language="JavaScript">
 <!-- 售后记录必填项提示
 function CheckInput()
 {
 if (<?php echo isset($value['bt_sh_proid']) ? 1 : 0?>=="1"){if(document.all.ProId.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content: '相关产品不能为空！'});document.all.ProId.focus();return false;}}
 if (<?php echo isset($value['bt_title']) ? 1 : 0?>=="1"){if(document.all.title.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content: '反馈主题不能为空！'});document.all.title.focus();return false;}}
 if (<?php echo isset($value['bt_type']) ? 1 : 0?>=="1"){if(document.all.type.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content: '反馈分类不能为空！'});document.all.type.focus();return false;}}
 if (<?php echo isset($value['bt_linkman']) ? 1 : 0?>=="1"){if(document.all.linkman.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content: '任务链接不能为空！'});document.all.linkman.focus();return false;}}
 if (<?php echo isset($value['bt_edate']) ? 1 : 0?>=="1"){if(document.all.sdate.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content: '反馈日期不能为空！'});document.all.sdate.focus();return false;}}
 if (<?php echo isset($value['bt_content']) ? 1 : 0?>=="1"){if(document.all.content.value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content: '详情备注不能为空！'});document.all.content.focus();return false;}}
 }
 -->
 </script>
<script>
 function Setdisabled(evt)
 {
 var evt=evt || window.event; 
 var e =evt.srcElement || evt.target;
 if(e.value=="1")
 {
 document.all.sInfo.disabled = false; document.all.sInfo.readOnly = false;
 document.all.sEDate.disabled = false; document.all.sEDate.readOnly = false;
 document.all.sEDate.classname = "Wdate int";document.all.sEDate.value = "2016-08-18";
 }
 else
 {
 document.all.sInfo.disabled = true; document.all.sInfo.readOnly = true;
 document.all.sEDate.disabled = true; document.all.sEDate.readOnly = true;
 document.all.sEDate.classname = "";document.all.sEDate.value = "";
 }
 }
 </script>
<form name="Save" action="<?php echo site_url('service/add')?>" method="post" onsubmit="return CheckInput() ;">
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td valign="top" class="td_n pdl10 pdr10 pdt10">
			<table width="100%" border="0" cellspacing="0" cellpadding ="0" class="table_1">
			<col width="120"/>
			<col/>
			<col width="120"/>
			<tr class="tr_t">
				<td class="td_l_l" colspan="2">
					<b>新增售后记录</b>
				</td>
			</tr>
			<tr>
				<td class="td_l_r title">
					任务名称
				</td>
				<td class="td_r_l">
					<?php echo $name?> ( 编号 : <?php echo $id?> )
					<input name="Chongxuan" type="button" id="Chongxuan" class="btn1 btnchongx" value="重选" onclick='$.dialog .open.origin.InfoAdd_Chose();$.dialog.close();'>
				</td>
			</tr>
			<!--<tr style="display:none;">
				<td class="td_l_r title">
					相关产品
				</td>
				<td class="td_r_l">
					<input name="ProId" type="hidden" id="ProId" size="23" value="" readonly/>
					<input name="ProTitle" type="text" id="ProTitle" class="int" size="23" value="" readonly onclick='Choose_cp ()'/>
					<input name="Back" type="button" id="Back" class="btnxuanz" value="…" title="请选择" onclick='Choose_cp ()'>
					<script>function Choose_cp() {$.dialog.open('save2.asp?action=Choose&sType=cp&oType=Shouhou&cID=184', {title: '新窗口', width: 900, height: 480,fixed: true}); };</script>
				</td>
			</tr>-->
			<tr>
				<td class="td_l_r title">
					<?php echo isset($value['bt_title']) ? '<font color="#FF0000">*</font>' : ''?>
 反馈主题
				</td>
				<td class="td_r_l">
					<input name="title" type="text" id="sTitle" class="int" size="30" value=""/>
				</td>
			</tr>
			<tr>
				<td class="td_l_r title">
					<?php echo isset($value['bt_type']) ? '<font color="#FF0000">*</font>' : ''?>
 反馈分类
				</td>
				<td class="td_r_l">
					<select name="type" id="Select_Shouhou">
						<option value="">请选择</option>
						<?php foreach($select_service as $arr=>$row) {?>
						 <option value="<?php echo $row['name']?>"><?php echo $row['name']?></option>
						 <?php }?>
					</select>
					<a class="btn1 btnxinz" onclick='Select_Shouhou("<?php echo site_url('select/main')?>?type=service")'>新增</a>
                    <script>function Select_Shouhou(Dourl) {$.dialog.open(Dourl, {title: '新增选项值', width: 850, height: 400,fixed: true}); };</script> 
				</td>
			</tr>
			<tr>
				<td class="td_l_r title">
					<?php echo isset($value['bt_linkman']) ? '<font color="#FF0000">*</font>' : ''?>
 任务链接
				</td>
				<td class="td_r_l">
					<select name="linkman" id="sLinkman" onchange="getselectids(this.options[this.selectedIndex ].id);">
						<option value="">请选择</option>
						<?php foreach($select_linkman as $arr=>$row) {?>
						 <option value="<?php echo $row['name']?>" id="<?php echo $row['tel']?>"><?php echo $row['name']?></option>
						 <?php }?>
					</select>
 &nbsp;
					<input name="Back" type="button" id="Back" class="btn1 btnxinz" value="新增" onclick='Linkmans_InfoAdd ()'>
					<script>function Linkmans_InfoAdd() {$.dialog.open('<?php echo site_url('linkman/add')?>?id=<?php echo $id?>', {title: '新窗口',  width: 500, height: 500,fixed: true}); };</script>
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
					<span id="linktel"></span>
				</td>
			</tr>
			<tr>
				<td class="td_l_r title">
					<?php echo isset($value['bt_edate']) ? '<font color="#FF0000">*</font>' : ''?>
 反馈日期
				</td>
				<td class="td_r_l">
					<input name="sdate" type="text" id="sSDate" class="Wdate int" size="15" onfocus ="WdatePicker({dateFmt:'yyyy-MM-dd'})" value="<?php echo date('Y-m-d')?>"/>
				</td>
			</tr>
			<tr>
				<td class="td_l_r title">
					<?php echo isset($value['bt_content']) ? '<font color="#FF0000">*</font>' : ''?>
 详情备注
				</td>
				<td class="td_r_l" style="padding:5px 10px;">
					<textarea name="content" rows="4" id="sContent" class ="int" style="height:50px;width:98%;"></textarea>
				</td>
			</tr>
			<tr>
				<td class="td_l_r title">
					是否解决
				</td>
				<td class="td_r_l">
					<input name="issolve" type="radio" value="2" checked onclick="Setdisabled()">
 未解决
　
					<input name="issolve" type="radio" value="1" onclick="Setdisabled()">
 已解决
				</td>
			</tr>
			<tr>
				<td class="td_l_r title">
					结束日期
				</td>
				<td class="td_r_l">
					<input name="edate" type="text" id="sEDate" class="int" size="15" onfocus="WdatePicker ({dateFmt:'yyyy-MM-dd'})" value="" readonly="readonly" disabled="disabled"/>
				</td>
			</tr>
			<tr>
				<td class="td_l_r title">
					处理结果
				</td>
				<td class="td_r_l" style="padding:5px 10px;">
					<textarea name="info" rows="4" id="sInfo" class="int" style="height:50px;width:98%;" readonly="readonly" disabled="disabled"></textarea>
				</td>
			</tr>
			</table>
		</td>
	</tr>
	</table>
	<div class="h50b">
	</div>
	<div class="fixed_bg_B">
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td valign="top" class="td_n Bottom_pd ">
				<input name="customerid" type="hidden"  value="<?php echo $id?>" readonly/>
				<input name="customername" type="hidden"  value="<?php echo $name?>" readonly/>
				<input type="submit" class="btn2 btnbaoc" value="保存">
				<input name="Back" type="button" id="Back" class="btn2 btnguanb" value="关闭" onclick="art.dialog.close ();">
			</td>
		</tr>
		</table>
	</div>
</form>
<script src="<?php echo base_url()?>theme/default/WdatePicker.js"></script>
</body>
</html>

 