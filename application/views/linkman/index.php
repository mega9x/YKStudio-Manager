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

<script>function Setting_Linkmans() {
        $.dialog.open('<?php echo site_url('setting/config')?>?type=linkmans', {
            title: '自定义设置',
            width: 600,
            height: 360,
            fixed: true
        });
    };</script>

<span class="MenuboxS">
 <ul>
 <li><span><a href="<?php echo site_url('customer/infoview') ?>?id=<?php echo $id ?>">客户资料</a></span></li>
 <li class="hover"><span><a href="<?php echo site_url('linkman') ?>?id=<?php echo $id ?>">任务链接</a></span></li>
 <li><span><a href="<?php echo site_url('customer/records') ?>?id=<?php echo $id ?>">跟单记录</a></span></li>
 <li><span><a href="<?php echo site_url('customer/order') ?>?id=<?php echo $id ?>">订单记录</a></span></li>
 <li><span><a href="<?php echo site_url('customer/hetong') ?>?id=<?php echo $id ?>">合同记录</a></span></li>
 <li><span><a href="<?php echo site_url('customer/service') ?>?id=<?php echo $id ?>">售后记录</a></span></li>
 <li><span><a href="<?php echo site_url('customer/expense') ?>?id=<?php echo $id ?>">收支记录</a></span></li>
 <li><span><a href="<?php echo site_url('customer/files') ?>?id=<?php echo $id ?>">附件记录</a></span></li>
 <li><span><a href="<?php echo site_url('customer/share') ?>?id=<?php echo $id ?>">客户共享</a></span></li>
 <li><span><a href="<?php echo site_url('customer/history') ?>?id=<?php echo $id ?>">操作记录</a></span></li>

 </ul>
 </span>
<span>
 
 <a class="button_top_set" title="自定义设置" onclick='Setting_Linkmans()'>自定义设置</a>
 
 </span>


<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td valign="top" class="td_n pdl10 pdr10 pdt10">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1">
                <tr class="tr_t">
                    <?php if (isset($value['name'])) { ?>
                        <td class="td_l_c">任务链接</td>
                    <?php } ?>
                    <?php if (isset($value['sex'])) { ?>
                        <td class="td_l_c">性别</td>
                    <?php } ?>
                    <?php if (isset($value['job'])) { ?>
                        <td class="td_l_c">任务链接</td>
                    <?php } ?>
                    <?php if (isset($value['mobile'])) { ?>
                        <td class="td_l_c">合作站点</td>
                    <?php } ?>
                    <?php if (isset($value['tel'])) { ?>
                        <td class="td_l_c">联系电话</td>
                    <?php } ?>
                    <?php if (isset($value['email'])) { ?>
                        <td class="td_l_c">电子邮件</td>
                    <?php } ?>
                    <?php if (isset($value['qq'])) { ?>
                        <td class="td_l_c">腾讯QQ</td>
                    <?php } ?>
                    <?php if (isset($value['msn'])) { ?>
                        <td class="td_l_c">MSN</td>
                    <?php } ?>
                    <?php if (isset($value['alww'])) { ?>
                        <td class="td_l_c">阿里旺旺</td>
                    <?php } ?>
                    <?php if (isset($value['birthday'])) { ?>
                        <td class="td_l_c">生日</td>
                    <?php } ?>
                    <?php if (isset($value['content'])) { ?>
                        <td class="td_l_c">备注说明</td>
                    <?php } ?>
                    <?php if (isset($value['addtime'])) { ?>
                        <td class="td_l_c">录入时间</td>
                    <?php } ?>
                    <td width="90" class="td_l_c">管理</td>

                </tr>

                </tr>
                <?php foreach ($list as $arr => $row) { ?>
                    <tr class="tr">
                        <?php if (isset($value['name'])) { ?>
                            <td class="td_l_c"><?php echo $row['name'] ?></td>
                        <?php } ?>
                        <?php if (isset($value['sex'])) { ?>
                            <td class="td_l_c"><?php echo $row['sex'] ?></td>
                        <?php } ?>
                        <?php if (isset($value['job'])) { ?>
                            <td class="td_l_c"><?php echo $row['job'] ?></td>
                        <?php } ?>
                        <?php if (isset($value['mobile'])) { ?>
                            <td class="td_l_c"><?php echo $row['mobile'] ?></td>
                        <?php } ?>
                        <?php if (isset($value['tel'])) { ?>
                            <td class="td_l_c"><?php echo $row['tel'] ?></td>
                        <?php } ?>
                        <?php if (isset($value['email'])) { ?>
                            <td class="td_l_c"><?php echo $row['email'] ?></td>
                        <?php } ?>
                        <?php if (isset($value['qq'])) { ?>
                            <td class="td_l_c"><?php echo $row['qq'] ?></td>
                        <?php } ?>
                        <?php if (isset($value['msn'])) { ?>
                            <td class="td_l_c"><?php echo $row['msn'] ?></td>
                        <?php } ?>
                        <?php if (isset($value['alww'])) { ?>
                            <td class="td_l_c"><?php echo $row['alww'] ?></td>
                        <?php } ?>
                        <?php if (isset($value['birthday'])) { ?>
                            <td class="td_l_c"><?php echo $row['birthday'] ?></td>
                        <?php } ?>
                        <?php if (isset($value['content'])) { ?>
                            <td class="td_l_c"><?php echo $row['content'] ?></td>
                        <?php } ?>
                        <?php if (isset($value['addtime'])) { ?>
                            <td class="td_l_c"><?php echo $row['adddate'] ?></td>
                        <?php } ?>
                        <td class="td_l_c" nowrap="nowrap">
                            <input type="button" class="btn1 btnxiug" value="修改" title="修改"
                                   onclick='Edit<?php echo $row['id'] ?>()'/>
                            <?php if ($arr > 0) { ?>
                                <input type="button" class="btn1 btnshanc" value="删除" title="删除"
                                       onclick='Del<?php echo $row['id'] ?>()'/>
                            <?php } ?>

                        </td>

                    </tr>
                    <script>function Edit<?php echo $row['id']?>() {
                            $.dialog.open('<?php echo site_url('linkman/edit')?>?id=<?php echo $row['id']?>', {
                                title: '编辑',
                                width: 800,
                                height: 340,
                                fixed: true
                            });
                        };</script>
                    <script>function Del<?php echo $row['id']?>() {
                            $.dialog({
                                content: '是否确定删除？', icon: 'error', ok: function () {
                                    art.dialog.open('<?php echo site_url('linkman/del')?>?id=<?php echo $row['id']?>');
                                    return false;
                                }, cancel: true
                            });
                        };</script>
                    <script>function View<?php echo $row['id']?>() {
                            art.dialog({
                                title: '详情备注',
                                content: '<?php echo $row['content']?>',
                                drag: false,
                                resize: false
                            });
                        };</script>
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
        $.dialog.open('<?php echo site_url('linkman/add')?>?id=<?php echo $id?>', {
            title: '新窗口',
            width: 900,
            height: 420,
            fixed: true
        });
    };</script>

<script src="<?php echo base_url() ?>theme/default/WdatePicker.js"></script>
</body>
</html>
 