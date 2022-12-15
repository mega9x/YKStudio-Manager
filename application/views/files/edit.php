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
<link rel="stylesheet" href="<?php echo base_url()?>theme/editor/themes/default/default.css" />
<script src="<?php echo base_url()?>theme/editor/kindeditor.js" charset="utf-8"></script>
<script src="<?php echo base_url()?>theme/editor/lang/zh_CN.js" charset="utf-8"></script>
<!--选项按钮美化-->
<link rel="stylesheet" href="<?php echo base_url()?>theme/default/css/jquery-labelauty.css" />
</head>
<body>

<form name="Save" action="<?php echo site_url('files/edit')?>?id=<?php echo $id?>" method="post" enctype="multipart/form-data" onSubmit="return CheckInput();"
>
 <table width="100%" border="0" cellpadding="0" cellspacing="0">
 <tr>
 <td valign="top" class="td_n pdl10 pdr10 pdt10"><table width="100%" border="0" cellspacing="0" cellpadding
="0" CLASS="table_1">
 <col width="120" />
 <tr class="tr_t">
 <td class="td_l_l" COLSPAN="2"><B>上传文件</B></td>
 </tr>
 <tr>
 <td class="td_l_r title"><font color="#FF0000">*</font> 分类</td>
 <td class="td_r_l"><select name="class" id="Select_SoftClass"><option value="">请选择</option>
 <?php foreach($select_soft as $arr=>$row){?>
 <option value="<?php echo $row['name']?>" <?php echo $class==$row['name'] ? 'selected' :''?>><?php echo $row['name']?></option>
 <?php }?>
 
 </select></td>
 </tr>
 <tr>
 <td class="td_l_r title">共享</td>
 <td class="td_r_l">
 <input name="isshare" type="radio" class="noborder" value="1" <?php echo $isshare==1 ? 'checked' :''?>  data-labelauty="是"> 
 <input name="isshare" type="radio" class="noborder" value="2" <?php echo $isshare==2 ? 'checked' :''?> data-labelauty="否"></td>
 </tr>
 <tr>
 <td class="td_l_r title"><font color="#FF0000">*</font> 附件</td>
 <td class="td_r_l" style="padding:5px 10px;">
 
<input name="file" type="file" id="fFile" value="" class="int">
 
 <span class="info_help help01" onMouseOver="tip.start(this)" title="不修改请留空">&nbsp;</span></td>
 </tr>
 <tr>
 <td class="td_l_r title">详情备注</td>
 <td class="td_r_l" style="padding:5px 10px;"><textarea name="content" rows="4" id="s_content" class="int" style="height:50px;width:98%;"><?php echo $content?></textarea></td>
 </tr>
 </table></td>
 </tr>
 
 </table>
  <div class="fixed_bg_B">
 <table width="100%" border="0" cellpadding="0" cellspacing="0">
 <tr>
 <td valign="top" class="td_n Bottom_pd ">
 <input type="submit" class="btn2 btnbaoc" value="保存">
 <input name="Back" type="button" id="Back" class="btn2 btnguanb" value="关闭" onClick="art.dialog.close();"></td>
 </tr>
 </table>
 </div>
</form>

<script src="<?php echo base_url()?>theme/default/WdatePicker.js"></script>
<!--选项按钮美化-->
<script type="text/javascript" src="<?php echo base_url()?>theme/default/js/jquery-labelauty.js"></script>
<script type="text/javascript">
$(function(){
 $(':input').labelauty();
});
</script>
</body>
</html>