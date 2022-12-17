<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="<?php echo base_url() ?>theme/default/css/common.css" rel="stylesheet" type="text/css">
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/Ajax.js"></script>
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/Common.js"></script>
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/jquery.min.js"></script>
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/tips.js"></script>
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/Float.js"></script>
    <script src="<?php echo base_url() ?>theme/default/js/jquery.artDialog.js?skin=default"></script>
    <script src="<?php echo base_url() ?>theme/default/js/iframeTools.js"></script>
    <!--选项按钮美化-->
    <link rel="stylesheet" href="<?php echo base_url() ?>theme/default/css/jquery-labelauty.css"/>
</head>
<body> 
 
 <span class="MenuboxS">
 <ul>
 <li><span><a href="<?php echo site_url('export/client') ?>">客户列表</a></span></li>
 <li><span><a href="<?php echo site_url('export/records') ?>">跟单记录</a></span></li>
 <li><span><a href="<?php echo site_url('export/order') ?>">订单记录</a></span></li>
 <li><span><a href="<?php echo site_url('export/hetong') ?>">合同记录</a></span></li>
 <li><span><a href="<?php echo site_url('export/service') ?>">售后记录</a></span></li>
 <li class="hover"><span><a href="<?php echo site_url('export/expense') ?>">收支记录</a></span></li>
 </ul>
 </span>

 <script>
     function Show() {
         if (document.getElementById('eOutIn').value == "1") {
             document.getElementById("eTypeA").style.display = "block";
             document.getElementById("eTypeB").style.display = "none";
         } else if (document.getElementById('eOutIn').value == "0") {
             document.getElementById("eTypeA").style.display = "none";
             document.getElementById("eTypeB").style.display = "block";
         } else if (document.getElementById('eOutIn').value == "") {
             document.getElementById("eTypeA").style.display = "none";
             document.getElementById("eTypeB").style.display = "none";
         }
     }
 </script>
 <tr>
     <td valign="top" class="td_n">
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
             <tr>
                 <td valign="top" class="td_n pdl10 pdr10 pdt10">
                     <table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1">
                         <tr class="tr_t">
                             <td class="td_l_l" COLSPAN="6"><B>按条件筛选</B></td>
                         </tr>
                     </table>
                     <form name="searchForm" action="?Action=ExpensetoExcel" method="post">
                         <table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1">
                             <col width="100"/>
                             <col width="120"/>
                             <col width="100"/>
                             <col width="250"/>
                             <col width="100"/>
                             <col width="80"/>
                             <tr>
                                 <td class="td_l_c title" style="border-top:0;">业务员</td>
                                 <td class="td_r_l" style="border-top:0;"><select name='jinke_user' class='int'>
                                         <option value="">请选择</option>
                                         <?php foreach ($select_service as $arr => $row) { ?>
                                             <option value="<?php echo $row['name'] ?>">
                                                 <?php echo $row['name'] ?></option>
                                         <?php } ?>
                                     </select></td>
                                 <td class="td_l_c title" style="border-top:0;">收支日期</td>
                                 <td class="td_r_l" style="border-top:0;"><input name="TimeBegin" type="text"
                                                                                 id="TimeBegin" class="int Wdate"
                                                                                 style="width:100px;"
                                                                                 onFocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})"/>&nbsp;~&nbsp;<input
                                             name="TimeEnd" type="text" id="TimeEnd" class="int Wdate"
                                             style="width:100px;"
                                             onFocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})"/></td>
                                 <td class="td_l_c title" style="border-top:0;">收入/支出</td>
                                 <td class="td_r_l" style="border-top:0;border-right:0;"><select name='eOutIn'
                                                                                                 class="int"
                                                                                                 onChange="Show();">
                                         <option value="">请选择</option>
                                         <option value="0">支出</option>
                                         <option value="1">收入</option>
                                     </select>
                                 </td>
                                 <td class="td_r_l" style="border-top:0;">
                                     <span id=eTypeA STYLE="display:none;"><select name="eTypeA" id="Select_ExpenseIN"><option
                                                     value="">请选择</option><option
                                                     value="订单预付款">订单预付款</option><option
                                                     value="合同款">合同款</option><option
                                                     value="维护费">维护费</option><option
                                                     value="产品续费">产品续费</option><option
                                                     value="其它">其它</option></select></span>
                                     <span id=eTypeB STYLE="display:none;"><select name="eTypeB" id="Select_ExpenseOUT"><option
                                                     value="">请选择</option><option value="交通费">交通费</option><option
                                                     value="通讯费">通讯费</option><option
                                                     value="餐饮住宿">餐饮住宿</option><option
                                                     value="赠送礼品">赠送礼品</option><option
                                                     value="硬件采购">硬件采购</option><option
                                                     value="其它">其它</option></select></span>
                                 </td>
                             </tr>
                             <tr>
                                 <td class="td_l_c title">导出项目</td>
                                 <td class="td_r_l" colspan=6>
                                     <input class="noborder" data-labelauty="编号" type="checkbox" name="Exportitem1"
                                            value="1" checked>
                                     <input class="noborder" data-labelauty="任务名称" type="checkbox"
                                            name="Exportitem2" value="1" checked>
                                     <input class="noborder" data-labelauty="收支日期" type="checkbox"
                                            name="Exportitem3" value="1" checked>
                                     <input class="noborder" data-labelauty="收入/支出" type="checkbox"
                                            name="Exportitem4" value="1" checked>
                                     <input class="noborder" data-labelauty="收支类别" type="checkbox"
                                            name="Exportitem5" value="1" checked>
                                     <input class="noborder" data-labelauty="总金额" type="checkbox" name="Exportitem6"
                                            value="1" checked>
                                     <input class="noborder" data-labelauty="详情备注" type="checkbox"
                                            name="Exportitem7" value="1" checked>
                                     <input class="noborder" data-labelauty="业务员" type="checkbox" name="Exportitem8"
                                            value="1" checked>
                                     <input class="noborder" data-labelauty="录入时间" type="checkbox"
                                            name="Exportitem9" value="1" checked>
                                 </td>
                             </tr>
                         </table>
                         <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
                             <tr>
                                 <td>
                                     <input type="submit" name="Submit" class="btn2 btnbaoc" value=" 导出 ">　
                                     <!--<input type="button" class="btn2 btnxiaz" value=" 下载文件 "  onclick="userfile_guanli()"/>　
                                     <script>function userfile_guanli() {$.dialog.open('filement.asp', {title: '文件管理', width:1000, height: 520,fixed: true}); };</script>-->
                                     <input type="button" class="btn2 btnguanb" value="清空条件"
                                            onClick=window.location.href="?action=killSession&otype=Gendan"/>　
                                 </td>
                             </tr>
                         </table>
                     </form>
                 </td>
             </tr>
         </table>
     </td>
 </tr>
 </table>
</body>
</html>
<script src="<?php echo base_url() ?>theme/default/WdatePicker.js"></script>

<!--选项按钮美化-->
<script type="text/javascript" src="<?php echo base_url() ?>theme/default/js/jquery-labelauty.js"></script>
<script type="text/javascript">
    $(function () {
        $(':input').labelauty();
    });
</script>

