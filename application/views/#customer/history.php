<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="<?php echo base_url() ?>theme/default/css/common.css" rel="stylesheet" type="text/css">
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/Common.js"></script>
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/jquery.min.js"></script>
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/tips.js"></script>
    <script src="<?php echo base_url() ?>theme/default/js/jquery.artDialog.js?skin=default"></script>
    <script src="<?php echo base_url() ?>theme/default/js/iframeTools.js"></script>
</head>
<body style="padding-bottom:50px;">


<span class="MenuboxS">
 <ul>
 <?php
 $lever = $this->common_model->get_lever();
 if (in_array(19, $lever)) {
     ?>
     <li><span><a href="<?php echo site_url('customer/infoview') ?>?id=<?php echo $id ?>">客户资料</a></span></li>
 <?php } ?>
     <?php if (in_array(24, $lever)) { ?>
         <li><span><a href="<?php echo site_url('linkman') ?>?id=<?php echo $id ?>">任务链接</a></span></li>
     <?php } ?>
     <?php if (in_array(29, $lever)) { ?>
         <li><span><a href="<?php echo site_url('customer/records') ?>?id=<?php echo $id ?>">跟单记录</a></span></li>
     <?php } ?>
     <?php if (in_array(34, $lever)) { ?>
         <li><span><a href="<?php echo site_url('customer/order') ?>?id=<?php echo $id ?>">订单记录</a></span></li>
     <?php } ?>
     <?php if (in_array(39, $lever)) { ?>
         <li><span><a href="<?php echo site_url('customer/hetong') ?>?id=<?php echo $id ?>">合同记录</a></span></li>
     <?php } ?>
     <?php if (in_array(44, $lever)) { ?>
         <li><span><a href="<?php echo site_url('customer/service') ?>?id=<?php echo $id ?>">售后记录</a></span></li>
     <?php } ?>
     <?php if (in_array(49, $lever)) { ?>
         <li><span><a href="<?php echo site_url('customer/expense') ?>?id=<?php echo $id ?>">收支记录</a></span></li>
     <?php } ?>
     <?php if (in_array(54, $lever)) { ?>
         <li><span><a href="<?php echo site_url('customer/files') ?>?id=<?php echo $id ?>">附件记录</a></span></li>
     <?php } ?>
  
 <li><span><a href="<?php echo site_url('customer/share') ?>?id=<?php echo $id ?>">客户共享</a></span></li>
  
 <?php if (in_array(71, $lever)) { ?>
     <li class="hover"><span><a
                     href="<?php echo site_url('customer/history') ?>?id=<?php echo $id ?>">操作记录</a></span></li>
 <?php } ?>
 
 </ul>
 </span>


<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td valign="top" class="td_n pdl10 pdr10 pdt10">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1">
                <tr class="tr_t">
                    <td class="td_l_c" width="80">编号</td>
                    <td class="td_l_c" width="80">数据表</td>
                    <td class="td_l_c" width="80">行为</td>
                    <td class="td_l_l">原因</td>
                    <td class="td_l_c" width="80">操作人</td>
                    <td class="td_l_c" width="130">时间</td>
                </tr>
                <?php foreach ($list as $arr => $row) { ?>
                    <tr class="tr">
                        <td class="td_l_c"><?php echo $row['id'] ?></td>
                        <td class="td_l_c"><?php echo $row['module'] ?></td>
                        <td class="td_l_c"><?php echo $row['action'] ?></td>
                        <td class="td_l_l"><?php echo $row['reason'] ?></td>
                        <td class="td_l_c"><?php echo $row['adduser'] ?></td>
                        <td class="td_l_c"><?php echo $row['addtime'] ?></td>
                    </tr>
                <?php } ?>


            </table>
        </td>
    </tr>
</table>
<div class="fixed_bg_B">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td valign="top" class="td_n Bottom_pd ">
                <input id="Back" class="btn2 btnguanb" type="button" onclick="art.dialog.close();" value="关闭"
                       name="Back">

            </td>
        </tr>
    </table>
</div>

<script src="<?php echo base_url() ?>theme/default/WdatePicker.js"></script>
</body>
</html>