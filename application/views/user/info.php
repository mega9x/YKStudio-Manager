<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript" src="<?php echo base_url()?>theme/default/js/jquery.min.js"></script>
<link href="<?php echo base_url()?>theme/default/css/common.css?3" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?php echo base_url()?>theme/editor/themes/default/default.css" />
<script src="<?php echo base_url()?>theme/editor/kindeditor.js" charset="utf-8"></script>
<script src="<?php echo base_url()?>theme/editor/lang/zh_CN.js" charset="utf-8"></script>
<link href="<?php echo base_url()?>theme/default/css/jquery.vtip.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url()?>theme/default/js/jquery.vtip.js"></script>
<!--选项按钮美化-->
<link rel="stylesheet" href="<?php echo base_url()?>theme/default/css/jquery-labelauty.css?2" />
</head>
<body>

<!--<span class="MenuboxS">
 <ul>
 
 <li class="hover"><span><a href="<?php echo site_url('user/info')?>">基本资料</a></span></li>
 </ul>
 </span>
 -->

 

<table width="100%" border="0" cellpadding="0" cellspacing="0">
 <tr>
 <td valign="top" class="td_n pdl10 pdr10 pdt10">

 <form name="newUser" id="newUser" action="<?php echo site_url('user/info')?>" method="post" enctype="multipart/form-data" onSubmit="return checkInput();">
 <table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1">
 <col width="80" /><col width="260" /><col width="80" /><col width="260" />
 <tr class="tr_t"> 
 <td class="td_l_l" COLSPAN="4">基本资料</td>
 </tr>
 <tr> 
 <td class="td_l_c title">登录账号</td>
 <td class="td_l_l"><?php echo $username?></td>
 <td class="td_l_c title">真实姓名</td>
 <td class="td_l_l"><?php echo $name?></td>
 </tr>
 <tr>
 <td class="td_l_c title">初始密码</td>
 <td class="td_l_l"><input name="userpwd" type="password" class="int" id="password" size="20" maxlength="16" selfValue=""   style="background:#F1F1F1;cursor:not-allowed;">
 不修改密码请留空！</td>
 <td class="td_l_c title">重复密码</td>
 <td class="td_l_l"><input name="confirmpwd" type="password" class="int" id="confirmPWS" size="20" maxlength="16" selfValue=""   style="background:#F1F1F1;cursor:not-allowed;"></td>
 </tr>
 <tr>
 <td class="td_l_c title">默认权限</td>
 <td class="td_l_l"><?php echo $role ? $role : '管理员'?></td>
 <td class="td_l_c title">所属部门</td>
 <td class="td_l_l"><?php echo $groupname?></td>
 </tr>
 <tr>
 <td class="td_l_c title">生日</td>
 <td class="td_l_l"><input name="birthday" type="text" id="Birthday" class="int Wdate" value="<?php echo $birthday?>" size="20" onFocus="WdatePicker()"></td>
 <td class="td_l_c title">入司时间</td>
 <td class="td_l_l"><?php echo $adddate?></td>
 </tr>
 <tr>
 <td class="td_l_c title">手机</td>
 <td class="td_l_l"><input name="mobile" type="text" class="int" id="Mobile" value="<?php echo $mobile?>" size="30" maxlength="16"></td>
 <td class="td_l_c title">E-mail</td>
 <td class="td_l_l"><input name="email" type="text" class="int" id="Email" value="<?php echo $email?>" size="30" /></td>
 </tr>


     <!--
   <tr>
   <td height="45" class="td_l_c title">头像</td>
   <td class="td_l_l">
      <input name="file" type="file" id="fFile" value="" class="int">
 <input name="avatar" id="avatar" type="text" class="noborder" value="<?php echo $avatar?>" size="30">
 <input type="button" id="upavatar" class="btnupload" value="选择文件">
 </td>
      <td colspan="2" rowspan="2" class="td_l_l"><img src="<?php echo base_url($avatar)?>" width="80" height="80" class="utouxiang" id="logoimg" /></td>
 </tr>
     -->

 <tr>
 <td class="td_l_c title">签名</td>
 <td class="td_l_l"><input name="sign" type="text" class="int" id="sign" size="45" value="<?php echo $sign?>"></td>
 </tr>
<script>
KindEditor.ready(function(K) {
 var editor = K.editor({
 uploadJson : '<?php echo site_url('common/upload')?>',
 fileManagerJson : '<?php echo site_url('common/upload_manage')?>',
 allowFileManager : true
 });
 K('#upavatar').click(function() {
 editor.loadPlugin('insertfile', function() {
 editor.plugin.fileDialog({
 fileUrl : K('#avatar').val(),
 clickFn : function(url) {
 K('#avatar').val(url);
 document.getElementById('logoimg').src=url;
 editor.hideDialog();
 }
 });
 });
 });
});
</script>
 
 
 
 
 
 <tr>
 <td class="td_l_c title">性别</td>
 <td class="td_l_l">
<input name="sex" type="radio" class="noborder" value="1" <?php echo $sex==1 ? 'checked' : ''?> data-labelauty="男"> 
<input name="sex" type="radio" class="noborder" value="2" <?php echo $sex==2 ? 'checked' : ''?> data-labelauty="女">
 
 <!--<input name="card" type="text" class="int" id="card" value="1" size="30" maxlength="18">-->
 
 </td>
 <td class="td_l_c title">&nbsp;</td>
 <td class="td_l_l">&nbsp;</td>
 </tr>
 <tr>
 <td class="td_l_c title">个人简介</td>
 <td colspan="3" class="td_l_l" style=" padding-top:10px; padding-bottom:10px;">
 <textarea name="info" cols="80" rows="4" id="uinfo" style="width:98%;"><?php echo $info?></textarea>
 </td>
 </tr>
 
 <tr> 
 <td class="td_l_c title">图标风格</td>
 <td colspan="3" class="td_r_l" style=" padding-top:10px; padding-bottom:10px;">
 <label class="vtip" title="<img src='<?php echo base_url()?>theme/windows/images/icon1.png' width='300' />">
 <input type="radio" name="icon" value="1" <?php echo $icon==1 ? 'checked' : ''?> data-labelauty="风格1">
 
 </label>
 
 <label class="vtip" title="<img src='<?php echo base_url()?>theme/windows/images/icon2.png' width='300' />">
 <input type="radio" name="icon" value="2" <?php echo $icon==2 ? 'checked' : ''?> data-labelauty="风格2">
 </label>
 </td>
 </tr>
 
 
  
 </table>
 
<div class="h50b"></div>
<div class="fixed_bg_B">
 <table width="100%" border="0" cellpadding="0" cellspacing="0">
 <tr>
 <td valign="top" class="td_n Bottom_pd "><input type="submit" class="btn2 btnbaoc" value="保存修改"></td>
 </tr>
 </table>
</div>
 
 
 </form>
 </td>
 </tr>
</table>

</body>
</html>
<script src="<?php echo base_url()?>theme/default/WdatePicker.js"></script>
<!--选项按钮美化-->
<script type="text/javascript" src="<?php echo base_url()?>theme/default/js/jquery-labelauty.js"></script>
<script type="text/javascript">
$(function(){
 $(':input').labelauty();
});
</script>