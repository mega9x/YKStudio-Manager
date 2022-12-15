<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>自定义主题上传</title>
<link href="<?php echo base_url()?>theme/default/css/common.css" rel="stylesheet" type="text/css">
<script language="javascript" src="<?php echo base_url()?>theme/default/js/Common.js"></script>
<script language="javascript" src="<?php echo base_url()?>theme/default/js/jquery.min.js"></script>
<script language="javascript" src="<?php echo base_url()?>theme/default/js/tips.js"></script>
<script src="<?php echo base_url()?>theme/default/js/jquery.artDialog.js?skin=default"></script>
<script src="<?php echo base_url()?>theme/default/js/iframeTools.js"></script>
<link rel="stylesheet" href="<?php echo base_url()?>theme/editor/themes/default/default.css" />
<script src="<?php echo base_url()?>theme/editor/kindeditor.js" charset="utf-8"></script>
<script src="<?php echo base_url()?>theme/editor/lang/zh_CN.js" charset="utf-8"></script>
<script>
KindEditor.ready(function(K) {
 var editor = K.editor({
 uploadJson : '<?php echo site_url('common/upload')?>',
 fileManagerJson : '<?php echo site_url('common/upload_manage')?>',
 allowFileManager : true
 });
 K('#image1').click(function() {
 editor.loadPlugin('image', function() {
 editor.plugin.imageDialog({
 showRemote : false,
 imageUrl : K('#tsmallpic').val(),
 clickFn : function(url, title, width, height, border, align) {
 K('#tsmallpic').val(url);
 document.getElementById('pic1').src=url;
 editor.hideDialog();
 }
 });
 });
 });
 
 K('#image3').click(function() {
 editor.loadPlugin('image', function() {
 editor.plugin.imageDialog({
 showRemote : false,
 imageUrl : K('#tbigpic').val(),
 clickFn : function(url, title, width, height, border, align) {
 K('#tbigpic').val(url);
 document.getElementById('pic2').src=url;
 editor.hideDialog();
 }
 });
 });
 });
 
});
</script>
<script src="<?php echo base_url()?>theme/default/js/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>theme/default/css/sweetalert.css">
</head>
<body>
<?php if ($this->input->get('act')) {?>
<script>swal("保存成功", "3秒后自动关闭", "success");setTimeout("this.location.href='<?php echo site_url('theme')?>'",3000);</script>
<?php }?>
<span class="MenuboxS">
 <ul>
 <li ><span><a href="<?php echo site_url('theme/add')?>">主题上传</a></span></li>
 <li ><span><a href="<?php echo site_url('theme')?>">主题管理</a></span></li>
 <li class="hover"><span><a href="<?php echo site_url('theme/edit')?>?id=<?php echo $id?>">主题修改</a></span></li>
 
 </ul>
</span>

<div class="allpage"> 
 <script language="javascript">
function CheckFormThemeadd()
{
 if(document.Themeadd.tname.value=="")
 {
 alert("请输入主题名称！");
 document.Themeadd.tname.focus();
 return false;
 }
 
 if(document.Themeadd.tsmallpic.value=="")
 {
 alert("请上传缩略图！");
 document.Themeadd.tsmallpic.focus();
 return false;
 }
 
 if(document.Themeadd.tbigpic.value=="")
 {
 alert("请上传主题大图！");
 document.Themeadd.tbigpic.focus();
 return false;
 }
 
 
}
</script>
 
 <form action="<?php echo site_url('theme/edit')?>?id=<?php echo $id?>" name="Themeadd" method="post" onSubmit="return CheckFormThemeadd();">
 <table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1">
 <col width="15%" />
 <col width="" />
 <col width="21%" />
 <tr class="tr">
 <td nowrap="nowrap" class="td_l_r title">主题名称</td>
 <td colspan="2" class="td_r_l"><input name="name" type="text" id="tname" class="int" value="<?php echo $name?>" size="35"></td>
 </tr>
 <tr class="tr">
 <td nowrap="nowrap" class="td_l_r title">缩略图</td>
 <td valign="middle" class="td_r_l">
 <input name="smallpic" type="text" id="tsmallpic" class="int" value="<?php echo $smallpic?>" size="35">
 <input type="button" id="image1" value="选择图片" />
 尺寸：140*100px </td>
 <td valign="middle" class="td_r_l"><img src='<?php echo base_url($smallpic)?>' width="140" height="100" style="margin:10px 0 10px 0;" id="pic1"/></td>
 </tr>
 <tr class="tr">
 <td nowrap="nowrap" class="td_l_r title">主题大图</td>
 <td class="td_r_l"><input name="bigpic" type="text" id="tbigpic" class="int" value="<?php echo $bigpic?>" size="35">
 <input type="button" id="image3" value="选择图片" />
 尺寸：1920*1080px </td>
 <td class="td_r_l"><img src='<?php echo base_url($bigpic)?>' width="140" height="100" style="margin:10px 0 10px 0;" id="pic2"/></td>
 </tr>
 </table>
 <div class="h50b"></div>
<div class="fixed_bg_B">
 <table width="100%" border="0" cellpadding="0" cellspacing="0">
 <tr>
 <td valign="top" class="td_n Bottom_pd ">
 
 <input  type="submit" class="btn2 btnbaoc" id="Submit" value=" 保存 "></td>
 </tr>
 </table>
 </div>
 </form>
 
</div>

</body>
</html>

