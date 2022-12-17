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
    <script src="<?php echo base_url() ?>theme/default/js/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>theme/default/css/sweetalert.css">
    <!--选项按钮美化-->
    <link rel="stylesheet" href="<?php echo base_url() ?>theme/default/css/jquery-labelauty.css"/>
    <link rel="stylesheet" href="../inc/editor/themes/default/default.css"/>
    <script src="../inc/editor/kindeditor.js" charset="utf-8"></script>
    <script src="../inc/editor/lang/zh_CN.js" charset="utf-8"></script>
</head>
<body>
<span class="MenuboxS">
 <ul>
 <li><span><a href="<?php echo site_url('setting') ?>">基本设置</a></span></li>
 <li><span><a href="<?php echo site_url('zicon') ?>">自定义图标</a></span></li>
 <li><span><a href="<?php echo site_url('setting/mail') ?>">邮箱配置</a></span></li>
 <li class="hover"><span><a href="<?php echo site_url('select') ?>">选项值设置</a></span></li>
 <li><span><a href="<?php echo site_url('group') ?>">部门设置</a></span></li>
 <li><span><a href="<?php echo site_url('role') ?>">权限设置</a></span></li>
 </ul>
 </span>

<div id="setxhing">

    <ul class="xhing">
        <iframe src="<?php echo site_url('select/main') ?>?type=type" id="set_select" name="set_select" frameborder="0"
                scrolling="auto" width="100%" height="450"></iframe>
    </ul>

    <script src="<?php echo base_url() ?>theme/default/WdatePicker.js"></script>


    <!--选项按钮美化-->
    <script type="text/javascript" src="<?php echo base_url() ?>theme/default/js/jquery-labelauty.js"></script>
    <script type="text/javascript">
        $(function () {
            $(':input').labelauty();
        });
    </script>
</body>
</html>