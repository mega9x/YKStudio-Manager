<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <link href="<?php echo base_url() ?>theme/default/css/common.css" rel="stylesheet" type="text/css">
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/Common.js"></script>
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/jquery.min.js"></script>
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/tips.js"></script>
    <script src="<?php echo base_url() ?>theme/default/js/jquery.artDialog.js?skin=default"></script>
    <script src="<?php echo base_url() ?>theme/default/js/iframeTools.js"></script>
    <script src="<?php echo base_url() ?>theme/editor/kindeditor.js" charset="utf-8"></script>
    <script src="<?php echo base_url() ?>theme/editor/lang/zh_CN.js" charset="utf-8"></script>
</head>
<body>

<span class="MenuboxS">
 <ul>
 <li class="hover"><span><a href="<?php echo site_url('mail/template') ?>">邮件模板管理</a></span></li>
     <!--<li><span><a href="mailsjx.asp">收件箱列表</a></span></li>-->
 <li><span><a href="<?php echo site_url('mail') ?>">已发送列表</a></span></li>
 <li><span><a href="<?php echo site_url('mail/add') ?>">发送邮件</a></span></li>
     <!--<li><span><a href="sendemail_auto.asp">自动发送设置</a></span></li>-->
 
 <a href="<?php echo site_url('mail/template_add') ?>" class="btn1 btnsou"
    style="margin-right:8px; color:#fff;">新增模版</a>

 </ul>
</span>
<div class="clear"></div>
<div class="mailpage">

    <table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1">
        <col width="12%"/>
        <col width="58%"/>
        <col width="15%"/>
        <!--<col width="15%" />-->
        <tr class="tr">
            <td class="td_l_c title"><strong>邮件类型</strong></td>
            <td class="td_r_l title"><strong>邮件标题</strong></td>
            <!-- <td class="td_r_l title"><strong>发送次数</strong></td>-->
            <td class="td_r_l title"><strong>操作</strong></td>
        </tr>

        <?php foreach ($list as $arr => $row) { ?>
            <tr class="tr">
                <td class="td_l_c title"><?php echo $row['type'] ?></td>
                <td class="td_r_l"><?php echo $row['title'] ?></td>
                <!--<td class="td_r_l"><?php echo $row['type'] ?></td>-->
                <td class="td_r_l">
                    <a href="<?php echo site_url('mail/template_edit') ?>?id=<?php echo $row['id'] ?>"
                       class="btn1 btnxiug">修改</a>
                    <a href="javascript:;"
                       onclick="art.dialog({content: '是否确定删除？',icon: 'error',ok: function () {art.dialog.open('<?php echo site_url('mail/template_del') ?>?id=<?php echo $row['id'] ?>');art.dialog.close();},cancelVal: '关闭',cancel: true })"
                       class="btn1 btnshanc">删除</a></td>
            </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>

 