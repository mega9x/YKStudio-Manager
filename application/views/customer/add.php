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
    <script src="<?php echo base_url()?>theme/default/js/Ajax.js"></script>
<link href="<?php echo base_url()?>theme/default/css/jquery.vtip.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url()?>theme/default/js/jquery.vtip.js"></script>
</head>
<body style="padding-bottom:50px;">
<script language="JavaScript">
<!-- 必填项提示
function CheckInput(){
      
     if (<?php echo isset($config['bt_name']) ? 1 : 0?>=="1"){if ($("#name").val()== ""){ art.dialog({title: 'Error',time: 1,icon: 'warning',content: '任务国家不能为空！'});$("#name").focus();return false;}}
	 
	 
	 if (<?php echo isset($config['bt_type']) ? 1 : 0?>=="1"){if ($("#type").val()== ""){ art.dialog({title: 'Error',time: 1,icon: 'warning',content: '转化情况不能为空！'});$("#type").focus();return false;}}
	 
	 if (<?php echo isset($config['bt_area']) ? 1 : 0?>=="1"){if ($("#area1").val()== ""){ art.dialog({title: 'Error',time: 1,icon: 'warning',content: '任务国家不能为空！'});$("#area1").focus();return false;}}
	 
	 if (<?php echo isset($config['bt_area']) ? 1 : 0?>=="1"){if ($("#area2").val()== ""){ art.dialog({title: 'Error',time: 1,icon: 'warning',content: '任务国家不能为空！'});$("#area2").focus();return false;}}
	 
	 if (<?php echo isset($config['bt_address']) ? 1 : 0?>=="1"){if ($("#address").val()== ""){ art.dialog({title: 'Error',time: 1,icon: 'warning',content: '任务国家不能为空！'});$("#address").focus();return false;}}
	 
	 if (<?php echo isset($config['bt_linkman']) ? 1 : 0?>=="1"){if ($("#linkman").val()== ""){ art.dialog({title: 'Error',time: 1,icon: 'warning',content: '任务链接或链接不能为空！'});$("#address").focus();return false;}}
	 
	 if (<?php echo isset($config['bt_job']) ? 1 : 0?>=="1"){if ($("#job").val()== ""){ art.dialog({title: 'Error',time: 1,icon: 'warning',content: '任务链接不能为空！'});$("#job").focus();return false;}}

 callback();
	 
	 if (<?php echo isset($config['bt_qq']) ? 1 : 0?>=="1"){if ($("#qq").val()== ""){ art.dialog({title: 'Error',time: 1,icon: 'warning',content: '合作站点不能为空！'});$("#qq").focus();return false;}}
	 
	 if (<?php echo isset($config['bt_trade']) ? 1 : 0?>=="1"){if ($("#trade").val()== ""){ art.dialog({title: 'Error',time: 1,icon: 'warning',content: '任务类型不能为空！'});$("#trade").focus();return false;}}
	 
	 if (<?php echo isset($config['bt_website']) ? 1 : 0?>=="1"){}
	 
	 if (<?php echo isset($config['bt_email']) ? 1 : 0?>=="1"){}
	 
	 if (<?php echo isset($config['bt_start']) ? 1 : 0?>=="1"){if ($("#start").val()== ""){ art.dialog({title: 'Error',time: 1,icon: 'warning',content: '流量状况不能为空！'});$("#start").focus();return false;}}
	 
	 if (<?php echo isset($config['bt_source']) ? 1 : 0?>=="1"){if ($("#source").val()== ""){ art.dialog({title: 'Error',time: 1,icon: 'warning',content: '所属联盟不能为空！'});$("#source").focus();return false;}}


     if (<?php echo isset($config['bt_record']) ? 1 : 0?>=="1"){if ($("#record").val()== ""){ art.dialog({title: 'Error',time: 1,icon: 'warning',content: '任务代码不能为空！'});$("#record").focus();return false;}}
	  if (<?php echo isset($config['bt_remark']) ? 1 : 0?>=="1"){}
	 
 
  
 }
 -->
 function check_customer_name(name) {
	var url,data
	url  = "<?php echo site_url('common/customer_name')?>";
	data = "name="+encodeURIComponent(name); 
	$.ajax({
			type: "post",
			cache: !1,
			url: url,
			async: false,
			data: data,
			timeout: 1e4,
			error: function() {},
			success: function(e) {
			    if (e) {
					$("#customer_name_err").html(e);
					$("#submit").attr({"disabled":"disabled"});
				} else {	
				    $("#customer_name_err").html("");
				    $("#submit").removeAttr("disabled"); 
				}
			}
	})
  }
 </script>
 
<script>function AddMust() {$.dialog.open('<?php echo site_url('setting/config')?>?type=customer_addmust', {title: '自定义设置', width: 600, height: 450,fixed: true}); };</script>
<form name="Add" action="<?php echo site_url('customer/add')?>" method="post" onSubmit="return CheckInput();">

	<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td valign="top" class="td_n pdl10 pdr10 pdt10">
			<table width="100%" border="0" cellspacing="0" cellpadding ="0" class="table_1">
			<col width="100"/>
			<col width="400"/>
			<col width="100"/>
			<col width="400"/>
			<tr>
				<td colspan="4" class="td_l_l title3 icon_t01">
					基本信息
				</td>
			</tr>
			<tr>
				<td class="td_l_r title">
					<?php echo isset($value['bt_name']) ? '<font color="#FF0000">*</font>' : ''?>
                    任务名称
				</td>
				<td colspan="3" class="td_r_l" >
					<input type="text" class="int" name="name" id="name" size="50" maxlength="50" autocomplete="off" onchange="check_customer_name(this.value);">
					<span id="customer_name_err"><span class="info_warn help01">任务识别信息</span></span>
				</td>
			</tr>
			<tr>
				<td class="td_l_r title" <?php echo isset($value['hidden_type']) ? 'style="display:none;"' : ''?>>
					<?php echo isset($value['bt_type']) ? '<font color="#FF0000">*</font>' : ''?>
                    转化情况
				</td>
				<td class="td_r_l" <?php echo isset($value['hidden_type']) ? 'style="display:none;"' : ''?>>
					<select name="type" id="type">
						<option value="">请选择</option>
						<?php foreach($select_type as $arr=>$row) {?>
						<option value="<?php echo $row['name']?>"><?php echo $row['name']?></option>
						<?php }?>
					</select>
 &nbsp;
				</td>
				
				<td class="td_l_r title" <?php echo isset($value['hidden_address']) ? 'style="display:none;"' : ''?>>
					<?php echo isset($value['bt_address']) ? '<font color="#FF0000">*</font>' : ''?>
 账户信息
				</td>
				<td class="td_r_l" <?php echo isset($value['hidden_address']) ? 'style="display:none;"' : ''?>>

					<input name="address" type="text" class="int" id="address" size="30">
 邮编：
					<input name="Zip" type="text" class="int" id="Zip" size="10" maxlength="6" onkeyup='this.value=this .value.replace(/\D/gi,"")'>
					<span class="info_help vtip" title="限：数字">&nbsp;</span>
				</td>
			</tr>
		<!--<tr>
				<td class="td_l_r title" <?php echo isset($value['hidden_area']) ? 'style="display:none;"' : ''?>>
					<?php echo isset($value['bt_area']) ? '<font color="#FF0000">*</font>' : ''?>
 所在地区
				</td>
				<td class="td_r_l" <?php echo isset($value['hidden_area']) ? 'style="display:none;"' : ''?>>
				
				
		    
			<input name="area1" type="text" class="int" id="area_name1"  value="123" size="15" readonly onclick='choose_area1()'>
			 
			<script>function choose_area1() {$.dialog.open('<?php echo site_url('common/choose_area1')?>', {title:'选择国家', width: 700, height: 520,fixed: true}); };</script>
			 
			<input name="area2" type="text" class="int" id="area_name2"  value="" size="15" readonly onclick='choose_area2()'>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $('#area_name2').click(function(){
                                //alert('test');
                                var area_name1=$('#area_name1').val();
                                $.ajax({
                                    type:'POST',
                                    data:{area_name1:area_name1},
                                    url:'<?php echo site_url('common/choose_area2');?>',


                                });

                            });

                        });

                    </script>
			<script>function choose_area2() {
                        $.dialog.open('<?php echo site_url('common/choose_area2')?>', {title:'选择市', width: 700, height: 520,fixed: true}); };</script>
			
				</td>
				<td class="td_l_r title" <?php echo isset($value['hidden_address']) ? 'style="display:none;"' : ''?>>
					<?php echo isset($value['bt_address']) ? '<font color="#FF0000">*</font>' : ''?>
 账户信息
				</td>
				<td class="td_r_l" <?php echo isset($value['hidden_address']) ? 'style="display:none;"' : ''?>>

					<input name="Address" type="text" class="int" id="Address" size="30">
 邮编：
					<input name="Zip" type="text" class="int" id="Zip" size="10" maxlength="6" onkeyup='this.value=this .value.replace(/\D/gi,"")'>
					<span class="info_help vtip" title="限：数字">&nbsp;</span>
				</td>
			</tr>-->
			<tr>
				<td class="td_l_r title" <?php echo isset($value['hidden_start']) ? 'style="display:none;"' : ''?>>
					<?php echo isset($value['bt_start']) ? '<font color="#FF0000">*</font>' : ''?>流量状况
				</td>
				<td class="td_r_l" <?php echo isset($value['hidden_start']) ? 'style="display:none;"' : ''?>>
					<select name="Start" id="Select_Star">
						<option value="">请选择</option>
						 <?php foreach($select_star as $arr=>$row) {?>
						 <option value="<?php echo $row['name']?>"><?php echo $row['name']?></option>
						 <?php }?>
					</select>
 &nbsp;
				</td>
				<td class="td_l_r title" <?php echo isset($value['hidden_source']) ? 'style="display:none;"' : ''?>>
					 <?php echo isset($value['bt_source']) ? '<font color="#FF0000">*</font>' : ''?>所属联盟
				</td>
				<td class="td_r_l" <?php echo isset($value['hidden_source']) ? 'style="display:none;"' : ''?>>
					<select name="Source" id="Select_Source">
						<option value="">请选择</option>
						<?php foreach($select_source as $arr=>$row) {?>
						<option value="<?php echo $row['name']?>"><?php echo $row['name']?></option>
						<?php }?>
					</select>
 &nbsp;
				</td>
			</tr>
			<tr>
				<td class="td_l_r title" <?php echo isset($value['hidden_website']) ? 'style="display:none;"' : ''?>>
					<?php echo isset($value['bt_website']) ? '<font color="#FF0000">*</font>' : ''?>
 公司网址
				</td>
				<td class="td_r_l" <?php echo isset($value['hidden_website']) ? 'style="display:none;"' : ''?>>
					<input name="website" type="text" class="int" id="website" size="35">
					<span class="info_help help01 vtip" title="加：http://">&nbsp;</span>
				</td>
				<td class="td_l_r title" <?php echo isset($value['hidden_trade']) ? 'style="display:none;"' : ''?>>
					<?php echo isset($value['bt_trade']) ? '<font color="#FF0000">*</font>' : ''?>
 任务类型
				</td>
				<td class="td_r_l" <?php echo isset($value['hidden_trade']) ? 'style="display:none;"' : ''?>>
					<select name="trade" id="trade">
						<option value="">请选择</option>
						 <?php foreach($select_trade as $arr=>$row) {?>
						 <option value="<?php echo $row['name']?>" id="<?php echo $row['id']?>"><?php echo $row['name']?></option>
						 <?php }?>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="4" class="td_l_l title3 icon_t02">
					任务资料
				</td>
			</tr>
			<tr>
				<td class="td_l_r title">
					<?php echo isset($value['bt_linkman']) ? '<font color="#FF0000">*</font>' : ''?>
任务链接
				</td>
				<td class="td_r_l">
					<input name="linkman" type="text" class="int" id="linkman" size="10" onchange="checklinkman (this.value,1);">
 &nbsp;
					<?php echo isset($value['bt_job']) ? '<font color="#FF0000">*</font>' : ''?>
					<select name="job" id="job" style="display: none;">
						<option value="">请选择</option>
						<?php foreach($select_job as $arr=>$row) {?>
						<option value="<?php echo $row['name']?>"><?php echo $row['name']?></option>
						<?php }?>
					</select>
 &nbsp;
				</td>
				<td class="td_l_r title">
					<?php echo isset($value['bt_mobile']) ? '<font color="#FF0000">*</font>' : ''?>
合作站点
				</td>
				<td class="td_r_l" colspan="3">
					<input name="mobile" type="text" class="int" id="mobile" size="30">
				</td>
			</tr>
			<tr>
				<td class="td_l_r title">
					<?php echo isset($value['bt_qq']) ? '<font color="#FF0000">*</font>' : ''?>
任务要求
				</td>
				<td class="td_r_l">
					<input name="qq" type="text" class="int" id="qq" size="30" onkeyup="refreshValue (this)">
				</td>
				<td class="td_l_r title">
					<?php echo isset($value['bt_email']) ? '<font color="#FF0000">*</font>' : ''?>
 电子邮件
				</td>
				<td class="td_r_l">
					<input name="email" type="text" class="int" id="email" size="30">
				</td>
			</tr>
			<tr>
				<td class="td_l_r title">
	<?php echo isset($value['bt_weixin']) ? '<font color="#FF0000">*</font>' : ''?>				
 微信
				</td>
				<td class="td_r_l">
					<input name="weixin" type="text" class="int" id="weixin" size="30" >
				</td>
				<td class="td_l_r title">
	<?php echo isset($value['bt_tel']) ? '<font color="#FF0000">*</font>' : ''?>					
 座机电话
				</td>
				<td class="td_r_l">
					<input name="tel" type="text" class="int" id="tel" size="30">
				</td>
			</tr>
                <tr>
                    <td colspan="4" class="td_l_l title3 icon_t03">
                        任务代码
                    </td>
                </tr>
                <tr <?php echo isset($value['hidden_record']) ? 'style="display:none;"' : ''?>>
                    <td class="td_l_r title">
                        <?php echo isset($value['bt_record']) ? '<font color="#FF0000">*</font>' : ''?>
                        任务代码
                    </td>
                    <td class="td_r_l" colspan="3" style="padding:5px 10px;">
                        <textarea name="record" id="record" class="int" style="height:50px;width:98%;"></textarea>
                    </td>
                </tr>
			<tr>
				<td colspan="4" class="td_l_l title3 icon_t03">
					其它信息
				</td>
			</tr>
			<script language="javascript"> 
			function refreshValue(obj) { 
				var s = obj.value; 
				document.all("email").value = s+"@qq.com"; 
			} 
			</script>
			<tr <?php echo isset($value['hidden_remark']) ? 'style="display:none;"' : ''?>>
				<td class="td_l_r title">
					<?php echo isset($value['bt_remark']) ? '<font color="#FF0000">*</font>' : ''?>
 备注
				</td>
				<td class="td_r_l" colspan="3" style="padding:5px 10px;">
					<textarea name="remark" id="remark" class="int" style="height:50px;width:98%;"></textarea>
				</td>
			</tr>

			</table>
		</td>
	</tr>
	</table>
	
	
	<div class="fixed_bg_B">
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td valign="top" class="td_n Bottom_pd ">
				
				<input type="submit" id="submit" class="btn2 btnbaoc" value="保存">
				<input name="Back" type="button" id="Back" class="btn2 btnguanb" value="关闭" onclick="art.dialog.close ();">
				<a class="button_top_set" title="必填项设置" onclick='AddMust()'>必填项设置</a>
			</td>
		</tr>
		</table>
	</div>
</form>
<script src="<?php echo base_url()?>theme/default/WdatePicker.js"></script>
</body>
</html>

 