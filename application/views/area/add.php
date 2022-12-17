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
<body>

<form name="Save" action="<?php echo site_url('area/add') ?>" method="post" onSubmit="return CheckInput();">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td valign="top" class="td_n pdl10 pdr10 pdt10">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1">
                    <col width="100"/>
                    <tr class="tr_t">
                        <td class="td_l_l" COLSPAN="2"><B>新增内容</B></td>
                    </tr>
                    <tr>
                        <td class="td_l_r title">上级分类</td>
                        <td class="td_r_l">
                            <select name="parentid" class="int">
                                <option value="">请选择</option>
                                <?php foreach ($select_area as $arr => $row) { ?>
                                    <option value="<?php echo $row['id'] ?>" <?php echo $parentid == $row['id'] ? 'selected' : '' ?>><?php echo $row['name'] ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="td_l_r title">类别名称</td>
                        <td class="td_l_l"><input name="name" type="text" id="aName" class="int" size="40"/></td>
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
                    <input type="submit" class="btn2 btnbaoc" value="保存">　
                    <input name="Back" type="button" id="Back" class="btn2 btnguanb" value="关闭"
                           onClick="art.dialog.close();">
                </td>
            </tr>
        </table>
    </div>
</form>

<script src="<?php echo base_url() ?>theme/default/WdatePicker.js"></script>
</body>
