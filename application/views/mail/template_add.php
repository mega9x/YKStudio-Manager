<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="<?php echo base_url()?>theme/default/css/common.css" rel="stylesheet" type="text/css">
<script language="javascript" src="<?php echo base_url()?>theme/default/js/Common.js"></script>
<script language="javascript" src="<?php echo base_url()?>theme/default/js/jquery.min.js"></script>
<script language="javascript" src="<?php echo base_url()?>theme/default/js/tips.js"></script>
<script src="<?php echo base_url()?>theme/default/js/jquery.artDialog.js?skin=default"></script>
<script src="<?php echo base_url()?>theme/default/js/iframeTools.js"></script>
<script src="<?php echo base_url()?>theme/editor/kindeditor.js" charset="utf-8"></script>
<script src="<?php echo base_url()?>theme/editor/lang/zh_CN.js" charset="utf-8"></script>
</head>
<body>

<span class="MenuboxS">
 <ul>
 <li class="hover"><span><a href="<?php echo site_url('mail/template')?>">邮件模板管理</a></span></li>
 <!--<li><span><a href="mailsjx.asp">收件箱列表</a></span></li>-->
 <li><span><a href="<?php echo site_url('mail')?>">已发送列表</a></span></li>
 <li><span><a href="<?php echo site_url('mail/add')?>">发送邮件</a></span></li>
 <!--<li><span><a href="sendemail_auto.asp">自动发送设置</a></span></li>-->
 
 <a href="<?php echo site_url('mail/template_add')?>" class="btn1 btnsou" style="margin-right:8px; color:#fff;">新增模版</a>

 </ul>
</span>
<div class="clear"></div>
<div class="mailpage">
 
<script>
function checkadd()
{
if (document.add.leixing.value=='')
{
alert('邮件类型不能为空');
document.add.leixing.focus();
return false
}
 
if (document.add.t0.value=='')
{
alert('邮件标题不能为空');
document.add.t0.focus();
return false
}
if (document.add.t1.value=='')
{
alert('邮件模版不能为空');
return false
}
}
</script>
 <form name="add" method="post" action="<?php echo site_url('mail/template_add')?>" onSubmit='javascript:document.getElementById("t1").value = editor.html();return checkadd()'>
 <table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1">
 <col width="100" />
 <tr class="tr_t">
 <td class="td_l_l" COLSPAN="4">新增邮件模版</td>
 </tr>
 <tr class="tr">
 <td class="td_l_c title">邮件类型：</td>
 <td class="td_r_l"><input name="type" type="text" class="int" id="leixing" size="80"></td>
 </tr>
 <tr class="tr">
 <td class="td_l_c title">邮件标题：</td>
 <td class="td_r_l"><input name="title" type="text" class="int" id="t0" size="80"></td>
 </tr>
 <tr class="tr">
 <td class="td_l_c title">模版内容：</td>
 <td class="td_r_l" style="padding:10px;"><!-- 加载编辑器的容器 --> 
 <script>
 KindEditor.ready(function(K) {
 window.editor = K.create('#t1');
 });
</script>
 <textarea name="content" id="t1" style="width:99.6%;height:300px;"></textarea></td>
 </tr>
 <tr class="tr">
 <td class="td_l_c title">标签说明：</td>
 <td class="td_r_l"><div class="mail_bq"> 标签说明：<br />
 [Mail_任务名称] 任务名称<br />
  
 </div></td>
 </tr>
 </table>
 <div class="fixed_bg">
 <input  type="submit" class="btn2 btnbaoc" value="保 存">
 <input name="Back" type="button" id="Back" class="btn2 btnguanb" value="关闭" onclick="art.dialog.close();">
 </div>
 </form>
 
</div>
</body>
</html>
 