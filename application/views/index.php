<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html >
<html>
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
body { background: #3d9aae; }
</style>
<img id="loading" src="<?php echo base_url()?>theme/windows/images/loading2.gif" style="position:absolute; top:49%; left:50%; margin-left:-73px;">
<head>
<title>CRM任务管理系统</title>
<link rel="shortcut icon" href="<?php echo base_url()?>theme/default/images/Favicon.ico" type="image/x-icon" />
<link href="<?php echo base_url()?>theme/windows/css/jquery-ui-1.8.24.custom.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>theme/windows/css/main.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>theme/windows/css/skins/black.css" rel="stylesheet" />
<script>
var base_url = "<?php echo base_url()?>";
var site_url = "<?php echo site_url()?>";
var sys_setting       = "<?php echo site_url('setting')?>";
var sys_noticemsg     = "<?php echo site_url('notice/msg')?>";
var sys_theme         = "<?php echo site_url('theme/skin')?>"; 
var sys_user_info     = "<?php echo site_url('user/info')?>"; 
var sys_support       = "<?php echo site_url('home/support')?>"; 
var sys_logout        = "<?php echo site_url('login/logout')?>"; 
var sys_locks         = "<?php echo site_url('login/locks')?>"; 
</script>
<script type="text/javascript" src="<?php echo base_url()?>theme/windows/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>theme/windows/js/jquery-ui-1.8.24.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>theme/windows/js/main-min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>theme/windows/js/artDialog.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>theme/windows/js/iframeTools.js"></script>
<!--顶部切换-->
<script type="text/javascript" src="<?php echo base_url()?>theme/windows/js/interface.js"></script>
<!--桌面参数-->
<script>var iconml = 'icon<?php echo $icon?>/'</script>
<script>
DATA={
 menu:[{//一级菜单
 menuid:'m001',
 name:'1',
 code:'m001',
 icon:''
 },{
 menuid:'m002',
 name:'2',
 code:'m002',
 icon:''
 },{
 menuid:'m003',
 name:'3',
 code:'m003',
 icon:''
 }],
 app:{//桌面1
 /*'m1001':{
 appid:'1001',
 icon:'readGod.png',
 name:'任务管理',
 url:'listkehu.asp',
 sonMenu:"[{"+
 "'appid':'8856',"+
 "'icon':'sosomap.png',"+
 "'name':'菜单1',"+
 "'url':'#'"+
 "},{"+
 "appid:'8857',"+
 "icon:'time.png',"+
 "name:'菜单2',"+
 "url:'#'"+
 "},{"+
 "appid:'8858',"+
 "icon:'jinshan.png',"+
 "name:'菜单3',"+
 "url:'#'"+
 "}]",
 asc :1
 },*///上面为子菜单示范
 <?php 
 $Icon1 = $Icon2 = $Icon3 = array();
 foreach($applist as $arr=>$row){
 if (in_array($row['id'],$lever)) {
	 if ($row['class']==1) {
		 $Icon1[] = 'm'.$row['appid'];
	 } elseif($row['class']==2) {
		 $Icon2[] = 'm'.$row['appid'];
	 } else {
		 $Icon3[] = 'm'.$row['appid'];
	 }
 ?>
 'm<?php echo $row['appid']?>':{
 appid:'<?php echo $row['appid']?>',
 icon:'<?php echo $row['icon']?>',
 name:'<?php echo $row['name']?>',
 url:'<?php echo $row['target']=='self' ? site_url($row['url']) : $row['url']?>',
 sonMenu:"[]",
 asc :<?php echo $row['ordnum']?>
 }<?php echo count($applist)!=$arr+1 ? ',' : ''?>
 <?php }}?>
 },
 
 
 sApp:{//开始菜单应用
 <?php 
 $leftMenu = array();
 foreach($sapplist as $arr=>$row){
 if (in_array($row['id'],$lever)) {
     $leftMenu[] = 'm'.$row['appid'];
 ?>
 'm<?php echo $row['appid']?>':{
 appid:'<?php echo $row['appid']?>',
 icon:'<?php echo $row['icon']?>',
 name:'<?php echo $row['name']?>',
 url:'<?php echo $row['target']=='self' ? site_url($row['url']) : $row['url']?>',
 sonMenu:"[]",
 asc :<?php echo $row['ordnum']?>
 }<?php echo count($applist)!=$arr+1 ? ',' : ''?>
 <?php }}?>
 }
};
ops = {//向桌面添加应用
 Icon1:<?php echo json_encode($Icon1)?>,
 Icon2:<?php echo json_encode($Icon2)?>,
 Icon3:<?php echo json_encode($Icon3)?>
}
//初始化左边快捷菜单
var leftMenu = new Array(<?php echo json_encode($leftMenu)?>);
</script>

<script type="text/javascript">var xtsz = <?php echo in_array(1,$lever) ? 1 : 0?></script>

<script type="text/javascript" src="<?php echo base_url()?>theme/windows/js/win-desk-new.js?<?php echo time()?>"></script>
<!--[if lt IE 7]>
<style type="text/css">
div, img { behavior: url(js/iepngfix.htc) }
</style>
<![endif]-->
<script>
var uid=1
window.onload=function(){tick();}
function CloseRD1(){
 document.getElementById('RightDesk1').style.display='none';
 document.getElementById('RightDesk2').style.top='42px';
}
function CloseRD2(){
 document.getElementById('RightDesk2').style.display='none';
}
</script>


 
<link href="<?php echo base_url()?>theme/layui/css/layui.css?<?php echo time()?>" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url()?>theme/layui/layui.js?<?php echo time()?>"></script>

</head>
<body>
<script type="text/javascript" src="<?php echo base_url()?>chat/chat.js?<?php echo time()?>"></script>
<div id="frame">
 <div id="scroller">
 <div id="content">
 <div class="section" id="pane-0">
 <div class="page1">
 <div class="content">
 <div class="first_screen">
 <div class="time"> <span id="h1"></span> <span id="h2"></span><strong>:</strong> <span id="m1"></span> <span id="m2"></span><strong>:</strong> <span id="s1"></span> <span id="s2"></span> </div>
 <div class="date" id="currentime"></div>
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
 <div class="clear"></div>
</div>

<div id="themezoom" class="themezoom" style="background:url(<?php echo get_cookie('themepic') ? base_url(get_cookie('themepic')) : base_url('theme/windows/bg/bg1.jpg')?>) 100% 0 repeat;"> <!--<img id="themebg" class="themebg" src="<?php echo base_url()?>theme/windows/bg/bg3.jpg">--></div>
<div id="theme_wrap" style="display:none;">
 <div id="theme_body" class="theme_body">
 <div id="theme_area"  class="theme_area" style="display: block;">
 <?php foreach($theme as $arr=>$row){?>
 <a href="javascript:;" themeid="theme_<?php echo $row['id']?>" nowid="<?php echo $row['id']?>" bigpicurl="<?php echo base_url($row['bigpic'])?>" class="theme_setting " id="theme_id_<?php echo $row['id']?>">
 <div class="theme_icon"><img src="<?php echo base_url($row['smallpic'])?>" width="140" height="100"></div>
 <div class="theme_text"><?php echo $row['name']?></div>
 </a>
 <?php }?>
 
 
 <a href="javascript:;" class="theme_upload" onclick='Theme_Add()'>
 <div class="theme_icon"><img src="<?php echo base_url()?>theme/windows/images/uploadbg.png"></div>
 <div class="theme_text">自定义上传</div>
 </a> </div>
 <div id="theme_w" class="theme_w" style="display: none;"></div>
 </div>
</div>
<script>function Theme_Add() {$.dialog.open('<?php echo site_url('theme/add')?>', {title: '自定义主题', width: 800, height: 500,fixed: true}); };</script> 
<!--右侧部分开始-->
<div id="RightDesk1" class="RDclass">
 <div class="RDtitle"><span><a href="javascript:;" title="删除卡片" onClick="CloseRD1();"><img src="<?php echo base_url()?>theme/windows/images/del.png" height="18"></a></span>跟单提醒</div>
 <iframe width=100% height=100% frameborder=0 scrolling=auto src=<?php echo site_url('notice/single')?> allowTransparency="true"></iframe>
</div>
<div id="RightDesk2" class="RDclass">
 <div class="RDtitle"><span><a href="javascript:;" title="删除卡片" onClick="CloseRD2();"><img src="<?php echo base_url()?>theme/windows/images/del.png" height="18"></a></span>合同到期提醒</div>
 <iframe width=100% height=100% frameborder=0 scrolling=auto src=<?php echo site_url('notice/contract')?> allowTransparency="true"></iframe>
</div>
<!--end--> 
<!--短信-->

<!--end--> 
<a id="StartmenuA">
<table width="99%" border="0" cellspacing="0" cellpadding="0">
 <tr>
 <td width="50" align="center"><img src="<?php echo base_url()?>theme/windows/images/start.png" height="35"></td>
 <td><span>开始菜单</span></td>
 </tr>
</table>
</a>
<div id="light" class="white_content">
 <div class="spuser"> <img src="<?php echo base_url()?>theme/windows/images/avatar.jpg" class="avatar"> <br>
 <span>已锁定</span>
 <div class="sp-pass">
 <input class="input-sp" type="password" id="sppass" name="sppass" value="" onKeyPress="if(event.keyCode==13) {submit.click();return false;}" placeholder="请输入登录密码" autocomplete="off"/>
 </div>
 <input class="sp-submit" id="submit" name="submit" type="submit" value="解除锁屏" onClick="checkspclose()"/>
 <div id="result" class="spresult"></div>
 </div>
</div>
<div id="fade" class="black_overlay"> </div>
<script src="<?php echo base_url()?>theme/windows/js/time.js" language="javascript"></script>
<style>
#RightDesk1{ width:300px; height:200px; overflow:hidden; position:fixed; right:30px; top:42px; z-index:1001;}
#RightDesk2{ width:300px; height:200px; overflow:hidden; position:fixed; right:30px; top:252px; z-index:1002;}
.RDclass{ border-radius: 3px; -moz-border-radius: 3px; -webkit-border-radius: 3px; background: url(<?php echo base_url()?>theme/windows/images/bobg.png) repeat;}
.RDtitle{ line-height:26px; color:#fff; padding:0 3px 0 3px; background:url(<?php echo base_url()?>theme/windows/images/bobg-t.png); font-size:12px;}
.RDtitle span{ float:right; padding-top:5px; line-height:22px;}
</style>

</body>
<script>document.getElementById('loading').style.display='none';</script>
</html>
 