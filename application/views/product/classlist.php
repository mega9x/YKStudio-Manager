<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="<?php echo base_url() ?>theme/default/css/common.css" rel="stylesheet" type="text/css">
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/Common.js"></script>
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/jquery.min.js"></script>
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/tips.js"></script>
    <script src="<?php echo base_url() ?>theme/default/js/jquery.artDialog.js?skin=default"></script>
    <script src="<?php echo base_url() ?>theme/default/js/iframeTools.js"></script>
    <style>
        label {
            display: block;
            cursor: pointer;
        }

        .okon, .okon_bt, .okon_yc, .qxon {
            display: none;
        }

        .okon_on_yes {
            background: #108A54;
            height: 35px;
            line-height: 35px;
            color: #fff;
            font-weight: bold;
        }

        .okon_bt_yes {
            background: #C00;
            height: 35px;
            line-height: 35px;
            color: #fff;
            font-weight: bold;
        }

        .okon_yc_yes {
            background: #999;
            height: 35px;
            line-height: 35px;
            color: #fff;
            font-weight: bold;
        }

        .qxyes {
            background: #099;
            height: 35px;
            line-height: 35px;
            color: #fff;
            font-weight: bold;
        }

        .qxno {
        }
    </style>
    <script language="JavaScript">
        //显示
        var funxs = function () {

            var okon = document.getElementsByClassName('okon');
            for (i = 0; i <= okon.length; i++) {
                //alert(i)
                if (okon[i].checked) {
                    okon[i].parentNode.className = "okon_on_yes";
                } else {
                    okon[i].parentNode.className = "okonno";
                }
                okon[i].onclick = function () {
                    if (this.checked) {
                        this.parentNode.className = "okon_on_yes";
                    } else {
                        this.parentNode.className = "okonno";
                    }
                }
            }

        }
        //必填
        var funbt = function () {

            var okon_bt = document.getElementsByClassName('okon_bt');
            for (i = 0; i <= okon_bt.length; i++) {
                //alert(i)
                if (okon_bt[i].checked) {
                    okon_bt[i].parentNode.className = "okon_bt_yes";
                } else {
                    okon_bt[i].parentNode.className = "okonno";
                }
                okon_bt[i].onclick = function () {
                    if (this.checked) {
                        this.parentNode.className = "okon_bt_yes";
                    } else {
                        this.parentNode.className = "okonno";
                    }
                }
            }


        }
        //隐藏
        var funyc = function () {

            var okon_yc = document.getElementsByClassName('okon_yc');
            for (i = 0; i <= okon_yc.length; i++) {
                //alert(i)
                if (okon_yc[i].checked) {
                    okon_yc[i].parentNode.className = "okon_yc_yes";
                } else {
                    okon_yc[i].parentNode.className = "okonno";
                }
                okon_yc[i].onclick = function () {
                    if (this.checked) {
                        this.parentNode.className = "okon_yc_yes";
                    } else {
                        this.parentNode.className = "okonno";
                    }
                }
            }

        }
        //权限
        var funqx = function () {

            var qxon = document.getElementsByClassName('qxon');
            for (i = 0; i <= qxon.length; i++) {
                //alert(i)
                if (qxon[i].checked) {
                    qxon[i].parentNode.className = "qxyes";
                } else {
                    qxon[i].parentNode.className = "qxno";
                }
                qxon[i].onclick = function () {
                    if (this.checked) {
                        this.parentNode.className = "qxyes";
                    } else {
                        this.parentNode.className = "qxno";
                    }
                }
            }


        }
    </script>
</head>
<body>

<table width="100%" border="0" cellpadding="0" cellspacing="0" id="crm_save3">
    <tr>
        <td valign="top" class="td_n pdl10 pdr10 pdt10 pdb10">
            <div style="float:left;padding-bottom:10px;width:100%;"><span style="float:right;"></span>
                <input type="button" class="btn2 btnbaoc" value="新增大类" onclick='cp_BClass_Add()'/>
            </div>
            <script>function cp_BClass_Add() {
                    $.dialog.open('<?php echo site_url('product/class_add')?>', {
                        title: '新增产品/服务大类',
                        width: 400,
                        height: 145,
                        fixed: true
                    });
                };</script>
            <table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1">
                <tr class="tr_t">
                    <td class="td_l_l">分类标题</td>
                    <td class="td_l_c" width="120">管理</td>
                </tr>
                <?php foreach ($list as $arr => $row) { ?>
                    <tr class="tr">
                        <td class="tr_f"><a href="javascript:void(0)" onclick='cp_BClass_Edit<?php echo $row['id'] ?>()'
                                            title='修改'><?php echo $row['name'] ?></a></td>
                        <td nowrap="nowrap" class="td_l_r title"><input type="button" class="button_info_add" value=" "
                                                                        title="添加小类"
                                                                        onclick='cp_SClass_Add<?php echo $row['id'] ?>()'/>
                            <input type="button" class="button_info_edit" value="修改" title="修改"
                                   onclick='cp_BClass_Edit<?php echo $row['id'] ?>()'/>
                            <input type="button" class="button_info_del" value="删除" title="删除"
                                   onclick="art.dialog({content: '是否确定删除？',icon: 'error',ok: function () {art.dialog.open('<?php echo site_url('product/class_del') ?>?id=<?php echo $row['id'] ?>');art.dialog.close();},cancelVal: '关闭',cancel: true })"/>
                        </td>
                    </tr>
                    <script>function cp_BClass_Edit<?php echo $row['id']?>() {
                            $.dialog.open('<?php echo site_url('product/class_edit')?>?id=<?php echo $row['id']?>', {
                                title: '编辑产品/服务大类',
                                width: 400,
                                height: 145,
                                fixed: true
                            });
                        };</script>
                    <script>function cp_SClass_Add<?php echo $row['id']?>() {
                            $.dialog.open('<?php echo site_url('product/class_add')?>?parentid=<?php echo $row['id']?>', {
                                title: '添加产品/服务小类',
                                width: 400,
                                height: 180,
                                fixed: true
                            });
                        };</script>
                <?php
                if (isset($row['child']) && count($row['child']) > 0) {
                foreach ($row['child'] as $arr2 => $row2) { ?>
                    <tr class="tr">
                        <td class="td_l_l" style="padding-left:30px;">┗━━ <a href="javascript:void(0)"
                                                                             onclick='cp_SClass_Edit<?php echo $row2['id'] ?>()'
                                                                             title='修改'><?php echo $row2['name'] ?></a>
                        </td>
                        <td nowrap="nowrap" class="td_l_r"><input type="button" class="button_info_edit" value="修改"
                                                                  title="修改"
                                                                  onclick='cp_SClass_Edit<?php echo $row2['id'] ?>()'/>
                            <input type="button" class="button_info_del" value="删除" title="删除"
                                   onclick="art.dialog({content: '是否确定删除？',icon: 'error',ok: function () {art.dialog.open('<?php echo site_url('product/class_del') ?>?id=<?php echo $row2['id'] ?>');art.dialog.close();},cancelVal: '关闭',cancel: true })"/>
                        </td>
                    </tr>
                    <script>function cp_SClass_Edit<?php echo $row2['id']?>() {
                            $.dialog.open('<?php echo site_url('product/class_edit')?>?id=<?php echo $row2['id']?>', {
                                title: '编辑产品/服务小类',
                                width: 400,
                                height: 180,
                                fixed: true
                            });
                        };</script>
                <?php }
                } ?>
                <?php } ?>
            </table>
        </td>
    </tr>
</table>

<script src="<?php echo base_url() ?>theme/default/WdatePicker.js"></script>
</body>
</html>

