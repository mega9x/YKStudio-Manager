<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>发送邮件</title>
<link href="<?php echo base_url()?>theme/default/css/common.css" rel="stylesheet" type="text/css">
<script language="javascript" src="<?php echo base_url()?>theme/default/js/Common.js"></script>
<script language="javascript" src="<?php echo base_url()?>theme/default/js/jquery.min.js"></script>
<script language="javascript" src="<?php echo base_url()?>theme/default/js/tips.js"></script>
<script src="<?php echo base_url()?>theme/default/js/jquery.artDialog.js?skin=default"></script>
<script src="<?php echo base_url()?>theme/default/js/iframeTools.js"></script>
<script src="<?php echo base_url()?>theme/editor/kindeditor.js" charset="utf-8"></script>
<script src="<?php echo base_url()?>theme/editor/lang/zh_CN.js" charset="utf-8"></script>
 
<!--选项按钮美化-->
<link rel="stylesheet" href="<?php echo base_url()?>theme/default/css/jquery-labelauty.css" />
</head>
<body>
<span class="MenuboxS">
<ul>
 <li><span><a href="<?php echo site_url('mail/template')?>">邮件模板管理</a></span></li>
 <!--<li><span><a href="mailsjx.asp">收件箱列表</a></span></li>-->
 <li><span><a href="<?php echo site_url('mail')?>">已发送列表</a></span></li>
 <li class="hover"><span><a href="<?php echo site_url('mail/add')?>">发送邮件</a></span></li>
 <!--<li><span><a href="sendemail_auto.asp">自动发送设置</a></span></li>-->
</ul>
</span>
<div class="clear"></div>
<div class="mailpage">
 
 <script>
function checkadd() {
	if (document.add.receive.value==''){
		alert('收件人不能为空');
		document.add.receive.focus();
		return false
	}
	var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
	if(!myreg.test(document.add.receive.value)){
	   alert('提示\n\n请输入有效的E_mail！');
	   document.add.receive.focus();
	   return false;
	}
	 
	if (document.add.title.value==''){
		alert('邮件标题不能为空');
		document.add.title.focus();
		return false
	}
	if (document.add.txaContent.value==''){
		alert('邮件内容不能为空');
		document.add.txaContent.focus();
		return false
	}
}
</script>
 <form name="add" method="post" action="<?php echo site_url('mail/add')?>?id=<?php echo $id?>" onSubmit='javascript:document.getElementById("txaContent").value = editor.html();return checkadd()'>
 <table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1">
 <col width="100" />
 <tr class="tr_t">
 <td class="td_l_l" COLSPAN="4">发送邮件</td>
 </tr>
 <tr class="tr">
 <td class="td_l_c title">收件邮箱：</td>
 <td class="td_r_l">
 <input name="receive" type="text"class="int" id="receive" value="<?php echo isset($email) ? $email : ''?>" size="50" />
 </td>
 </tr>
 
 
 <?php if (isset($template)) {?>
 <tr class="tr">
 <td class="td_l_c title">邮件类型：</td>
 <td class="td_r_l">
 <?php foreach($template as $arr=>$row){?>
 <input name="type" type="radio" class="noborder" value="<?php echo $row['title']?>" data-labelauty="<?php echo $row['type']?>" onClick="changenr('mb<?php echo $row['id']?>','<?php echo $row['title']?>')">
 <div id="mb<?php echo $row['id']?>" style="display:none;">
 <?php echo  str_htmldecode($row['content'])?>
 </div>
 <?php }}?>
  
 
 
 </td>
 </tr>
 
 
 
 
 <tr class="tr"> </tr>
 
 <tr class="tr">
 <td class="td_l_c title">邮件标题：</td>
 <td class="td_r_l"><input name="title" type="text" class="int" id="title" size="80" /></td>
 </tr>
 <tr class="tr">
 <td class="td_l_c title">邮件内容：</td>
 <td class="td_l_l" style="padding:10px;"><!-- 加载编辑器的容器 --> 
 <script>
KindEditor.ready(function(K) {
window.editor = K.create('#txaContent'),{
	uploadJson : '<?php echo site_url('common/upload')?>',
	fileManagerJson : '<?php echo site_url('common/upload_manage')?>',
	allowFileManager : true
}
});
</script>
 <textarea name="content" id="txaContent" style="width:99.6%;height:350px;"></textarea>
 <script>
function changenr(id,title){
mb=document.getElementById(id).innerHTML
KindEditor.html("#txaContent",mb);
document.getElementById("title").value = title;
}
</script></td>
 </tr>
 </table>
 <div class="fixed_bg">
 <input type="submit" class="btn2 btnbaoc" value="发送">
 <input name="Back" type="button" id="Back" class="btn2 btnguanb" value="关闭" onclick="art.dialog.close();">
 </div>
 </form>
 
</div>
<!--选项按钮美化--> 
<script type="text/javascript" src="<?php echo base_url()?>theme/default/js/jquery-labelauty.js"></script> 
<script type="text/javascript">
$(function(){
 $(':input').labelauty();
});
</script>
</body>
</html>
