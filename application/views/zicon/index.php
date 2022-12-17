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
    <script src="<?php echo base_url() ?>theme/default/js/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>theme/default/css/sweetalert.css">
    <!--选项按钮美化-->
    <link rel="stylesheet" href="<?php echo base_url() ?>theme/default/css/jquery-labelauty.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>theme/editor/themes/default/default.css"/>
    <script src="<?php echo base_url() ?>theme/editor/kindeditor.js" charset="utf-8"></script>
    <script src="<?php echo base_url() ?>theme/editor/lang/zh_CN.js" charset="utf-8"></script>
    <link href="<?php echo base_url() ?>theme/default/css/jquery.vtip.css" rel="stylesheet" type="text/css">
    <script src="<?php echo base_url() ?>theme/default/js/jquery.vtip.js"></script>
</head>
<body>
<span class="MenuboxS">
<ul>
 <li><span><a href="<?php echo site_url('setting') ?>">基本设置</a></span></li>
 <li class="hover"><span><a href="<?php echo site_url('zicon') ?>">自定义图标</a></span></li>
 <li><span><a href="<?php echo site_url('setting/mail') ?>">邮箱配置</a></span></li>
 <li><span><a href="<?php echo site_url('select') ?>">选项值设置</a></span></li>
 <li><span><a href="<?php echo site_url('group') ?>">部门设置</a></span></li>
 <li><span><a href="<?php echo site_url('role') ?>">权限设置</a></span></li>
 
</ul>
</span>
<div id="setxhing">

    <ul class="xhing">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" id="set_bumen">
            <tr>
                <td width="202" valign="top" class="pdt10">
                    <div class="MenuboxL">
                        <ul>
                            <li class="hover"><span><a href="?sstype=zicon">图标列表</a></span></li>
                            <li class=""><span><a href="javascript:;" onclick='Zicon_Add()'>新增图标</a></span></li>
                        </ul>
                    </div>
                </td>
                <td valign="top">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td valign="top" class="td_n pdr10 pdt10">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1">
                                    <tr class="tr_t">
                                        <td width="60" class="td_l_c">序号</td>
                                        <td width="90" class="td_l_c">桌面位置</td>
                                        <td width="90" class="td_l_c">图标名称</td>
                                        <td width="90" class="td_l_c">图标</td>
                                        <td width="90" class="td_l_c">页面链接</td>
                                        <td width="90" class="td_l_c vtip" title="数字越小越靠前">排序</td>
                                        <td width="90" class="td_l_c">是否显示</td>
                                        <td width="90" class="td_l_c">管理</td>
                                    </tr>
                                    <?php foreach ($list as $arr => $row) { ?>
                                        <tr class="tr">
                                            <td class="td_l_c"><?php echo $arr + 1 ?></td>
                                            <td class="td_l_c">第 <?php echo $row['class'] ?> 屏</td>
                                            <td class="td_l_c"><?php echo $row['name'] ?></td>
                                            <td class="td_l_c" style="padding:5px;"><img
                                                        src="<?php echo base_url() ?>theme/windows/icon1/<?php echo $row['icon'] ?>"
                                                        width="60" height="60"
                                                /></td>
                                            <td nowrap="nowrap" class="td_l_l"><?php echo $row['url'] ?></td>
                                            <td class="td_l_c"><?php echo $row['ordnum'] ?></td>
                                            <td class="td_l_c"><?php echo $row['isdel'] == 0 ? '显示' : '不显示' ?></td>
                                            <td class="td_l_c">
                                                <input type="button" class="btn1 btnxiug" value="修改" title="修改"
                                                       onclick='Zicon_InfoEdit<?php echo $row['id'] ?>()'/>
                                                <input type="button" class="btn1 btnshanc" value="删除" title="删除"
                                                       onclick="if(confirm(' 你真的要删除吗？'))

                                                               {location.href='<?php echo site_url('zicon/del') ?>?id=<?php echo $row['id'] ?>';};"/>
                                            </td>
                                        </tr>
                                        <script>function Zicon_InfoEdit<?php echo $row['id']?>() {
                                                $.dialog.open('<?php echo site_url('zicon/edit')?>?id=<?php echo $row['id']?>', {
                                                    title: '修改图标',
                                                    width: 500,
                                                    height: 350,
                                                    fixed: true
                                                });
                                            };</script>
                                    <?php } ?>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <script>function Zicon_Add() {
                $.dialog.open('<?php echo site_url('zicon/add')?>', {
                    title: '新增图标',
                    width: 500,
                    height: 350,
                    fixed: true
                });
            };</script>

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

 