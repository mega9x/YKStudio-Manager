<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
     <li class="hover"><span><a
                     href="<?php echo site_url('customer/infoview') ?>?id=<?php echo $id ?>">任务资料</a></span></li>
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
  
 <li><span><a href="<?php echo site_url('customer/share') ?>?id=<?php echo $id ?>">任务共享</a></span></li>
 
 <?php if (in_array(71, $lever)) { ?>
     <li><span><a href="<?php echo site_url('customer/history') ?>?id=<?php echo $id ?>">操作记录</a></span></li>
 <?php } ?>
 
 
 
 
 </ul>
 </span>
<span>
 
 </span>


<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td valign="top" class="td_n pdl10 pdr10 pdt10">
            <table width="100%" border="0" cellspacing="0" cellpadding
            ="0" CLASS="table_1">
                <col width="100"/>
                <col width="400"/>
                <col width="100"/>
                <col width="400"/>
                <tr class="tr_t">
                    <td class="td_l_l" COLSPAN="2" style="border-right:0;"><B>基本资料</B></td>
                    <td class="td_l_r" COLSPAN="2" style="font-size:12px; line-height:18px;"><span
                                class="Bottom_pd r fontnobold">录入时间：<?php echo $adddate ?>  &nbsp;&nbsp;&nbsp;&nbsp;最近更新：<?php echo $lastupdtime ?></span>
                    </td>
                </tr>

                <tr>
                    <td class="td_l_r title">任务名称</td>
                </tr>
                <tr>
                    <td class="td_l_r title">账户信息</td>
                    <td class="td_r_l" colspan=3><?php echo $area1 ?>&nbsp;&nbsp;<?php echo $area2 ?>
                        &nbsp;&nbsp;<?php echo $address ?></td>
                </tr>
                <tr>
                    <td class="td_l_r title">流量状况</td>
                    <td class="td_r_l"><?php echo $start ?></td>
                    <td class="td_l_r title">所属联盟</td>
                    <td class="td_r_l"><?php echo $source ?></td>
                </tr>
                <tr>
                    <td class="td_l_r title">公司网址</td>
                    <td class="td_r_l"><?php echo $website ?></td>
                    <td class="td_l_r title">任务类型</td>
                    <td class="td_r_l"><?php echo $trade ?></td>
                </tr>

                <tr>
                    <td class="td_l_r title">任务链接</td>
                    <td class="td_r_l"><?php echo $linkman ?></td>
                    <td class="td_l_r title">合作站点</td>
                    <td class="td_r_l"><?php echo $mobile ?></td>
                </tr>
                <tr>
                    <td class="td_l_r title">任务要求</td>
                    <td class="td_r_l"><?php echo $qq ?></td>
                </tr>
                <tr>
                    <td class="td_l_r title">任务代码</td>
                    <td class="td_r_l" colspan=3><?php echo htmlentities($record) ?></td>
                </tr>
                <tr>
                    <td class="td_l_r title">备注</td>
                    <td class="td_r_l" colspan=3><?php echo $remark ?></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<div class="h50b"></div>
<div class="fixed_bg_B">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td valign="top" class="td_n Bottom_pd ">
                <input type="button" class="btn2 btnbaoc" value="编辑" onclick='Kehu_InfoEdit();'/>
                <input name="Back" type="button" id="Back" class="btn2 btnguanb" value="关闭"
                       onClick="art.dialog.close();"></td>
        </tr>
    </table>
</div>
<script>function Kehu_InfoEdit() {
        $.dialog.open('<?php echo site_url('customer/edit')?>?id=<?php echo $id?>', {
            title: '编辑任务资料',
            width: 1000,
            height: 520,
            fixed: true
        });
    };</script>
<script src="<?php echo base_url() ?>theme/default/WdatePicker.js"></script>
</body>
</html>
