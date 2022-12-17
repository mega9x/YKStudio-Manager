<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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


<script>function Setting_Hetong() {
        $.dialog.open('<?php echo site_url('setting/config')?>?type=contract', {
            title: '自定义设置',
            width: 600,
            height: 370,
            fixed: true
        });
    };</script>


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
         <li class="hover"><span><a
                         href="<?php echo site_url('customer/hetong') ?>?id=<?php echo $id ?>">合同记录</a></span></li>
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
     <li><span><a href="<?php echo site_url('customer/history') ?>?id=<?php echo $id ?>">操作记录</a></span></li>
 <?php } ?>
 
 
 </ul>
 </span>
<span>
 
 <a class="button_top_set" title="自定义设置" onclick='Setting_Hetong()'>自定义设置</a>
 
 </span>


<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td valign="top" class="td_n pdl10 pdr10 pdt10">
            <table width="100%" border="0" cellspacing="0" cellpadding
            ="0" CLASS="table_1">
                <tr class="tr_t">
                    <?php if (isset($value['number'])) { ?>
                        <td class="td_l_c">合同编号</td>
                    <?php } ?>
                    <td class="td_l_c">订单编号</td>

                    <?php if (isset($value['sdate'])) { ?>
                        <td class="td_l_c">起始时间</td>
                    <?php } ?>
                    <?php if (isset($value['edate'])) { ?>
                        <td class="td_l_c">到期时间</td>
                    <?php } ?>
                    <?php if (isset($value['type'])) { ?>
                        <td class="td_l_c">合同分类</td>
                    <?php } ?>
                    <?php if (isset($value['money'])) { ?>
                        <td class="td_l_c">总金额</td>
                    <?php } ?>
                    <?php if (isset($value['yjmoney'])) { ?>
                        <td class="td_l_c">已收款</td>
                    <?php } ?>
                    <?php if (isset($value['qkmoney'])) { ?>
                        <td class="td_l_c">欠款</td>
                    <?php } ?>
                    <?php if (isset($value['invoice'])) { ?>
                        <td class="td_l_c">提供发票</td>
                    <?php } ?>
                    <?php if (isset($value['tax'])) { ?>
                        <td class="td_l_c">含税</td>
                    <?php } ?>
                    <td class="td_l_c">状态</td>
                    <?php if (isset($value['audit'])) { ?>
                        <td class="td_l_c">审核人</td>
                    <?php } ?>
                    <?php if (isset($value['audittime'])) { ?>
                        <td class="td_l_c">审核时间</td>
                    <?php } ?>
                    <?php if (isset($value['adduser'])) { ?>
                        <td class="td_l_c">业务员</td>
                    <?php } ?>
                    <?php if (isset($value['addtime'])) { ?>
                        <td class="td_l_c">录入时间</td>
                    <?php } ?>
                    <td width="130" class="td_l_c">管理</td>
                </tr>

                <?php foreach ($list as $arr => $row) { ?>
                    <tr class="tr">

                        <?php if (isset($value['number'])) { ?>
                            <td class="td_l_c"><?php echo $row['number'] ?></a></td>
                        <?php } ?>

                        <td class="td_l_c">
                            <?php echo $row['ordernumber'] ?>
                        </td>


                        <?php if (isset($value['sdate'])) { ?>
                            <td class="td_l_c"><?php echo $row['sdate'] ?></td>
                        <?php } ?>
                        <?php if (isset($value['edate'])) { ?>
                            <td class="td_l_c"><?php echo $row['edate'] ?></td>
                        <?php } ?>
                        <?php if (isset($value['type'])) { ?>
                            <td class="td_l_c"><?php echo $row['type'] ?></td>
                        <?php } ?>
                        <?php if (isset($value['money'])) { ?>
                            <td class="td_l_c"><?php echo $row['money'] ?></td>
                        <?php } ?>
                        <?php if (isset($value['yjmoney'])) { ?>
                            <td class="td_l_c"><?php echo $row['yjmoney'] ?></td>
                        <?php } ?>
                        <?php if (isset($value['qkmoney'])) { ?>
                            <td class="td_l_c"><?php echo $row['qkmoney'] ?></td>
                        <?php } ?>
                        <?php if (isset($value['invoice'])) { ?>
                            <td class="td_l_c"><?php echo $row['isinvoice'] ?></td>
                        <?php } ?>
                        <?php if (isset($value['tax'])) { ?>
                            <td class="td_l_c"><?php echo $row['istax'] ?></td>
                        <?php } ?>

                        <td class="td_l_c"> <?php echo $row['state'] ?>  </td>

                        <?php if (isset($value['audit'])) { ?>
                            <td class="td_l_c"><?php echo $row['auditname'] ?></td>
                        <?php } ?>
                        <?php if (isset($value['audittime'])) { ?>
                            <td class="td_l_c"><?php echo $row['auditdate'] ?></td>
                        <?php } ?>
                        <?php if (isset($value['adduser'])) { ?>
                            <td class="td_l_c"><?php echo $row['adduser'] ?></td>
                        <?php } ?>
                        <?php if (isset($value['addtime'])) { ?>
                            <td class="td_l_c"><?php echo $row['adddate'] ?></td>
                        <?php } ?>
                        <td class="td_l_c" nowrap="nowrap">
                            <input name="Back" type="button" id="Back" class="btn1 btnxinz" value="收款"
                                   onclick='Hetong_Revenue_InfoAdd<?php echo $row['id'] ?>()'>
                            <!-- <input type="button" class="button_info_add" value=" " title="快速续费"  onclick='hetong_xufei_InfoAdd<?php echo $row['id'] ?>()' />-->
                            <input type="button" class="btn1 btnxiug" value="修改" title="修改"
                                   onclick='Edit<?php echo $row['id'] ?>()'/>
                            <input type="button" class="btn1 btnshanc" value="删除" title="删除"
                                   onclick='Del<?php echo $row['id'] ?>()'/>
                        </td>
                    </tr>
                    <script>function Hetong_Revenue_InfoAdd<?php echo $row['id']?>() {
                            $.dialog.open('<?php echo site_url('contract/addrevenue')?>?id=<?php echo $row['id']?>', {
                                title: '新窗口',
                                width: 400,
                                height: 200,
                                fixed: true
                            });
                        };</script></td>
                    <script>function hetong_xufei_InfoAdd<?php echo $row['id']?>() {
                            $.dialog.open('<?php echo site_url('contract/addrenew')?>?id=<?php echo $row['id']?>', {
                                title: '续费',
                                width: 600,
                                height: 560,
                                fixed: true
                            });
                        };</script>
                    <script>function View12() {
                            $.dialog.open('save1.asp?action=Client&sType=InfoView&otype=Hetong&cId=12', {
                                title: '查看',
                                width: 1220,
                                height: 520,
                                fixed: true
                            });
                        };</script>
                    <script>function hetong_xufei_List<?php echo $row['id']?>() {
                            $.dialog.open('save2.asp?action=Hetong&sType=RenewList&Id=7', {
                                title: '查看',
                                width: 860,
                                height: 440,
                                fixed: true
                            });
                        };</script>
                    <script>function order_cp_List() {
                            $.dialog.open('save2.asp?action=Ordercp&sType=List&Id=', {
                                title: '查看订单产品明细',
                                width: 860,
                                height: 440,
                                fixed: true
                            });
                        };</script>
                    <script>function Edit<?php echo $row['id']?>() {
                            $.dialog.open('<?php echo site_url('contract/edit')?>?id=<?php echo $row['id']?>', {
                                title: '编辑',
                                width: 600,
                                height: 560,
                                fixed: true
                            });
                        };</script>
                    <script>function Audit<?php echo $row['id']?>() {
                            $.dialog.open('<?php echo site_url('contract/audit')?>?id=<?php echo $row['id']?>', {
                                title: '审核',
                                width: 400,
                                height: 180,
                                fixed: true
                            });
                        };</script>
                    <script>function Del<?php echo $row['id']?>() {
                            art.dialog({
                                content: '是否确定删除？', icon: 'error', ok: function () {
                                    $.dialog.open('<?php echo site_url('contract/del')?>?id=<?php echo $row['id']?>', {
                                        title: '删除原因',
                                        width: 400,
                                        height: 150,
                                        fixed: true
                                    });
                                    art.dialog.close();
                                }, cancelVal: '关闭', cancel: true
                            });
                        };
                    </script>


                <?php } ?>


            </table>
        </td>
    </tr>
</table>
<div class="h50b"></div>
<div class="fixed_bg_B">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td valign="top" class="td_n Bottom_pd ">
                <input name="Back" type="button" id="Back" class="btn2 btnbaoc" value="新增" onclick='Add()'>

                <input name="Back" type="button" id="Back" class="btn2 btnguanb" value="关闭"
                       onClick="art.dialog.close();"></td>
        </tr>
    </table>
</div>
<script>function Add() {
        $.dialog.open('<?php echo site_url('contract/add')?>?id=<?php echo $id?>', {
            title: '新增合同',
            width: 800,
            height: 550,
            fixed: true
        });
    };</script>

<script src="<?php echo base_url() ?>theme/default/WdatePicker.js"></script>
</body>
</html>

 