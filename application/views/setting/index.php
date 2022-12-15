<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url()?>theme/default/css/common.css?23" rel="stylesheet" type="text/css">
<script language="javascript" src="<?php echo base_url()?>theme/default/js/Common.js"></script>
<script language="javascript" src="<?php echo base_url()?>theme/default/js/jquery.min.js"></script>
<script language="javascript" src="<?php echo base_url()?>theme/default/js/tips.js"></script>
<script src="<?php echo base_url()?>theme/default/js/jquery.artDialog.js?skin=default"></script>
<script src="<?php echo base_url()?>theme/default/js/iframeTools.js"></script>
<script src="<?php echo base_url()?>theme/default/js/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>theme/default/css/sweetalert.css">
<!--选项按钮美化-->
<link rel="stylesheet" href="<?php echo base_url()?>theme/default/css/jquery-labelauty.css" />

<!--<link rel="stylesheet" href="../inc/editor/themes/default/default.css" />
<script src="../inc/editor/kindeditor.js" charset="utf-8"></script>
<script src="../inc/editor/lang/zh_CN.js" charset="utf-8"></script>-->
</head>
<body>
<span class="MenuboxS">
 <ul>
 <li class="hover"><span><a href="<?php echo site_url('setting')?>">基本设置</a></span></li>
 <li ><span><a href="<?php echo site_url('zicon')?>">自定义图标</a></span></li>
 <li ><span><a href="<?php echo site_url('setting/mail')?>">邮箱配置</a></span></li>
 <li ><span><a href="<?php echo site_url('select')?>">选项值设置</a></span></li>
 <li ><span><a href="<?php echo site_url('group')?>">部门设置</a></span></li>
 <li ><span><a href="<?php echo site_url('role')?>">权限设置</a></span></li>
 </ul>
 </span>
 
<div id="setxhing">

<ul class="xhing">
 
<?php if ($this->input->get('act')) {?>
<script>swal("保存成功", "3秒后自动关闭", "success");setTimeout("this.location.href='<?php echo site_url('setting')?>'",3000);</script>
<?php }?>
 <form action="<?php echo site_url('setting')?>" method="post">
 <table width="100%" border="0" cellpadding="0" cellspacing="0" id="TableMain">
 <tr>
 <td valign="top" class="td_n pdl10 pdr10 pdt10"><table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1">
 
 
 <col width="70" /><col width="260" /><col width="60" /><col width="260" />
 <tr class="tr">
 <td nowrap="nowrap" class="td_l_r title">任务系统</td>
 <td class="td_r_l">
<input name="title" type="text" id="title" class="int" value="<?php echo TITLE?>" size="35" style="background:#F1F1F1;cursor:not-allowed;">
<span class="info_help help01" onMouseOver="tip.start(this)" title="演示版可以修改，我们是慈善家">&nbsp;</span> </td>
 <td class="td_l_r title"></td>
 <td class="td_r_l"></td>
 </tr>
 <tr class="tr">
 <td nowrap="nowrap" class="td_l_r title">分页数量</td>
 <td class="td_r_l"><input name="pagesize" type="text" id="pagenumset" class="int" value="<?php echo PAGESIZE?>" size="6">
 <span class="info_help help01" onMouseOver="tip.start(this)" title="每页显示多少条数据">&nbsp;</span></td>
 <td nowrap="nowrap" class="td_l_r title"></td>
 <td class="td_r_l"></td>
 </tr>
 <tr class="tr">
 <td nowrap="nowrap" class="td_l_r title">任务唯一</td>
 <td class="td_r_l"> 
 <input name="Onlycompany" type="checkbox" class="noborder" value="1" <?php echo ONLYCOMPANY==1 ? 'checked' :''?> data-labelauty="任务名称" >
 <input name="Onlylinkman" type="checkbox" class="noborder" value="1" <?php echo ONLYLINKMAN==1 ? 'checked' :''?> data-labelauty="任务链接">
 <input name="Onlytel" type="checkbox" class="noborder" value="1" <?php echo ONLYTEL==1 ? 'checked' :''?> data-labelauty="合作站点" >
 <span class="info_help help01" onmouseover="tip.start(this)" title="判断任务唯一的标准">&nbsp;</span> </td>
 <td nowrap="nowrap" class="td_l_r title">记录日志</td>
 <td class="td_r_l">
 <input name="islog" type="radio" class="noborder" value="1" <?php echo ISLOG==1 ? 'checked' :''?>  data-labelauty="是"/>
 <input name="islog" type="radio" class="noborder" value="0" <?php echo ISLOG==0 ? 'checked' :''?>  data-labelauty="否"/>
 <span class="info_help help01" onMouseOver="tip.start(this)" title="登录日志和操作记录">&nbsp;</span></td>
 </tr>
 <tr class="tr">
 <td nowrap="nowrap" class="td_l_r title">订单编号</td>
 <td class="td_r_l">
 <input name="odernumber" type="radio" class="noborder" value="1"  <?php echo ODERNUMBER==1 ? 'checked' :''?> data-labelauty="自动">
 <input name="odernumber" type="radio" class="noborder" value="0"  <?php echo ODERNUMBER==0 ? 'checked' :''?> data-labelauty="手动">
 <span class="info_help help01" onMouseOver="tip.start(this)" title="自动格式为：DD20150808120000001">&nbsp;</span></td>
 <td nowrap="nowrap" class="td_l_r title">合同编号</td>
 <td class="td_r_l">
 <input name="contractnumber" type="radio" class="noborder" value="1" <?php echo CONTRACTNUMBER==1 ? 'checked' :''?> data-labelauty="自动"/>
 <input name="contractnumber" type="radio" class="noborder" value="0" <?php echo CONTRACTNUMBER==0 ? 'checked' :''?> data-labelauty="手动"/>
 <span class="info_help help01" onMouseOver="tip.start(this)" title="自动格式为：HT20150808120000001">&nbsp;</span></td>
 </tr>
 <tr class="tr">
 <td nowrap="nowrap" class="td_l_r title">删除原因</td>
 <td class="td_r_l">
 <input name="delreason" type="radio" class="noborder" value="1" data-labelauty="是" <?php echo DELREASON==1 ? 'checked' :''?>>
 <input name="delreason" type="radio" class="noborder" value="0" data-labelauty="否" <?php echo DELREASON==0 ? 'checked' :''?>>
 <span class="info_help help01" onMouseOver="tip.start(this)" title="删除任务管理是否需要填写原因">&nbsp;</span></td>
 <td nowrap="nowrap" class="td_l_r title">转移保留</td>
 <td class="td_r_l">
 <input name="saveolduser" type="radio" class="noborder" value="1" <?php echo SAVEOLDUSER==1 ? 'checked' :''?> data-labelauty="保留"/>
 <input name="saveolduser" type="radio" class="noborder" value="0" <?php echo SAVEOLDUSER==0 ? 'checked' :''?> data-labelauty="不保留"/>
 <span class="info_help help01" onMouseOver="tip.start(this)" title="任务转移后，是否保留原有业务员">&nbsp;</span></td>
 </tr>
 <tr class="tr">
 <td nowrap="nowrap" class="td_l_r title">跟进结束</td>
 <td class="td_r_l">
 <select name="followup" id="Select_Type">
 <option value="">请选择</option>
 <option value="已成交" <?php echo FOLLOWUP=='已成交' ? 'selected' :''?>>已成交</option>
 <option value="未成交" <?php echo FOLLOWUP=='未成交' ? 'selected' :''?>>未成交</option>
 <option value="跟进中" <?php echo FOLLOWUP=='跟进中' ? 'selected' :''?>>跟进中</option>
 </select>
 <span class="info_help help01" onmouseover="tip.start(this)" title="任务跟进流程结束时的状态">&nbsp;</span></td>
 <td class="td_l_r title">上传类型</td>
 <td class="td_r_l">
 <input name="uploadtype" type="text" id="uploadtype" class="int" value="<?php echo UPLOADTYPE?>" size="35" style="background:#F1F1F1;cursor:not-allowed;">
 <span class="info_help help01" onmouseover="tip.start(this)" title="例：gif/jpg/doc/xls/rar">&nbsp;</span></td>
 </tr>
 <tr class="tr nonetr">
 <td nowrap="nowrap" class="td_l_r title">处理乱码</td>
 <td class="td_r_l"><input name="SelectCharset" type="radio" class="noborder" value="1"  checked>
 是　
 <input name="SelectCharset" type="radio" class="noborder" value="0">
 否　<!--<span class="info_help help01">不同服务器环境可能会出现乱码，请改变设置</span>--></td>
 <td nowrap="nowrap" class="td_l_r title"></td>
 <td class="td_r_l"></td>
 </tr>
 <tr class="tr">
 <td nowrap="nowrap" class="td_l_r title">登陆界面</td>
 <td colspan="3" class="td_r_l">
 <input name="loginstyle" type="radio" class="noborder" value="1" <?php echo LOGINSTYLE==1 ? 'checked' :''?> data-labelauty="风格一" />
 <input name="loginstyle" type="radio" class="noborder" value="2" <?php echo LOGINSTYLE==2 ? 'checked' :''?>  data-labelauty="风格二" />
 <input name="loginstyle" type="radio" class="noborder" value="3" <?php echo LOGINSTYLE==3 ? 'checked' :''?>  data-labelauty="风格三" />
 <input name="loginstyle" type="radio" class="noborder" value="4" <?php echo LOGINSTYLE==4 ? 'checked' :''?>  data-labelauty="风格四" />
 <span class="info_help help01" onmouseover="tip.start(this)" title="选择系统默认登录界面">&nbsp;</span>  </td>
 </tr>
   

 
 <tr class="tr" >
 <td nowrap="nowrap" class="td_r_l">&nbsp;</td>
 <td colspan="3" class="td_r_l"></td>
 </tr>
 
  
 </table></td>
 </tr>
 </table>
 <div class="h50b"></div>
<div class="fixed_bg_B">
 <table width="100%" border="0" cellpadding="0" cellspacing="0">
 <tr>
 <td valign="top" class="td_n Bottom_pd ">
 <input type="submit" class="btn2 btnbaoc" id="Submit" value=" 保存 "></td>
 </tr>
 </table>
 </div>
 </form>
</ul>

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
