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
    <script language="JavaScript">
        //显示
        var funxs = function () {

            var okon = document.getElementsByClassName('okon');
            for (i = 0; i <= okon.length; i++) {
                //alert(i)
                if (okon[i].checked) {
                    okon[i].parentNode.className = "okon_on";
                } else {
                    okon[i].parentNode.className = "okonno";
                }
                okon[i].onclick = function () {
                    if (this.checked) {
                        this.parentNode.className = "okon_on";
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
                    okon_bt[i].parentNode.className = "okon_on";
                } else {
                    okon_bt[i].parentNode.className = "okonno";
                }
                okon_bt[i].onclick = function () {
                    if (this.checked) {
                        this.parentNode.className = "okon_on";
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
                    okon_yc[i].parentNode.className = "okon_on";
                } else {
                    okon_yc[i].parentNode.className = "okonno";
                }
                okon_yc[i].onclick = function () {
                    if (this.checked) {
                        this.parentNode.className = "okon_on";
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

<form name="Save" action="<?php echo site_url('setting/config') ?>?type=contract" method="post" onSubmit="return CheckInput
();">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td valign="top" class="td_n pdl10 pdr10 pdt10">
                <table width="100%" border="0" cellspacing="0" cellpadding
                ="0" CLASS="table_1">
                    <col width="25%"/>
                    <col width="25%"/>
                    <col width="25%"/>
                    <col width="25%"/>
                    <tr class="tr_t">
                        <td class="td_l_l" COLSPAN="4"><B>列显示字段</B></td>
                    </tr>
                    <tr>
                        <td class="td_l_c"><label>合同编号
                                <input name="number" type="checkbox" id="number"
                                       value="1" <?php echo isset($value['number']) ? 'checked' : '' ?> class="okon"/>
                            </label></td>
                        <td class="td_l_c"><label>订单编号
                                <input name="ordernumber" type="checkbox" id="ordernumber"
                                       value="1" <?php echo isset($value['ordernumber']) ? 'checked' : '' ?>
                                       class="okon"/>
                            </label></td>
                        <td class="td_l_c"><label>起始时间
                                <input name="sdate" type="checkbox" id="sdate"
                                       value="1" <?php echo isset($value['sdate']) ? 'checked' : '' ?> class="okon"/>
                            </label></td>
                        <td class="td_l_c"><label>到期时间
                                <input name="edate" type="checkbox" id="edate"
                                       value="1" <?php echo isset($value['edate']) ? 'checked' : '' ?> class="okon"/>
                            </label></td>
                    </tr>
                    <tr>
                        <td class="td_l_c"><label>合同分类
                                <input name="type" type="checkbox" id="type"
                                       value="1" <?php echo isset($value['type']) ? 'checked' : '' ?> class="okon"/>
                            </label></td>
                        <td class="td_l_c"><label>总金额
                                <input name="money" type="checkbox" id="money"
                                       value="1" <?php echo isset($value['money']) ? 'checked' : '' ?> class="okon"/>
                            </label></td>
                        <td class="td_l_c"><label>已收款
                                <input name="yjmoney" type="checkbox" id="revenue"
                                       value="1" <?php echo isset($value['yjmoney']) ? 'checked' : '' ?> class="okon"/>
                            </label></td>
                        <td class="td_l_c"><label>欠款
                                <input name="qkmoney" type="checkbox" id="qkmoney"
                                       value="1" <?php echo isset($value['qkmoney']) ? 'checked' : '' ?> class="okon"/>
                            </label></td>
                    </tr>
                    <tr>
                        <td class="td_l_c"><label>提供发票
                                <input name="invoice" type="checkbox" id="invoice"
                                       value="1" <?php echo isset($value['invoice']) ? 'checked' : '' ?> class="okon"/>
                            </label></td>
                        <td class="td_l_c"><label>是否含税
                                <input name="tax" type="checkbox" id="tax"
                                       value="1" <?php echo isset($value['tax']) ? 'checked' : '' ?> class="okon"/>
                            </label></td>
                        <td class="td_l_c"><label>审核人员
                                <input name="audit" type="checkbox" id="audit"
                                       value="1" <?php echo isset($value['audit']) ? 'checked' : '' ?> class="okon"/>
                            </label></td>
                        <td class="td_l_c"><label>审核时间
                                <input name="audittime" type="checkbox" id="auditTime"
                                       value="1" <?php echo isset($value['audittime']) ? 'checked' : '' ?>
                                       class="okon"/>
                            </label></td>
                    </tr>
                    <tr>
                        <td class="td_l_c"><label>业务员
                                <input name="adduser" type="checkbox" id="user"
                                       value="1" <?php echo isset($value['adduser']) ? 'checked' : '' ?> class="okon"/>
                            </label></td>
                        <td class="td_l_c"><label>录入时间
                                <input name="addtime" type="checkbox" id="time"
                                       value="1" <?php echo isset($value['addtime']) ? 'checked' : '' ?> class="okon"/>
                            </label></td>
                        <td class="td_l_c " colspan=3></td>
                    </tr>
                </table>
                <script language="JavaScript">funxs();</script>
            </td>
        </tr>
        <tr>
            <td valign="top" class="td_n pdl10 pdr10 pdt10">
                <table width="100%" border="0" cellspacing="0" cellpadding
                ="0" CLASS="table_1">
                    <col width="25%"/>
                    <col width="25%"/>
                    <col width="25%"/>
                    <col width="25%"/>
                    <tr class="tr_t">
                        <td class="td_l_l" COLSPAN="4"><B>必填项 ( 新增/修改 )</B></td>
                    </tr>
                    <tr>
                        <td class="td_l_c"><label>订单编号
                                <input name="bt_ordernumber" type="checkbox" id="bt_ordernumber"
                                       value="1" <?php echo isset($value['bt_ordernumber']) ? 'checked' : '' ?>
                                       class="okon_bt"/>
                            </label></td>
                        <td class="td_l_c"><label>起始时间
                                <input name="bt_sdate" type="checkbox" id="bt_sdate"
                                       value="1" <?php echo isset($value['bt_sdate']) ? 'checked' : '' ?>
                                       class="okon_bt"/>
                            </label></td>
                        <td class="td_l_c"><label>到期时间
                                <input name="bt_edate" type="checkbox" id="bt_edate"
                                       value="1" <?php echo isset($value['bt_edate']) ? 'checked' : '' ?>
                                       class="okon_bt"/>
                            </label></td>
                        <td class="td_l_c"><label>合同分类
                                <input name="bt_type" type="checkbox" id="bt_type"
                                       value="1" <?php echo isset($value['bt_type']) ? 'checked' : '' ?>
                                       class="okon_bt"/>
                            </label></td>
                    </tr>
                    <tr>
                        <td class="td_l_c"><label>总金额
                                <input name="bt_money" type="checkbox" id="bt_money"
                                       value="1" <?php echo isset($value['bt_money']) ? 'checked' : '' ?>
                                       class="okon_bt"/>
                            </label></td>
                        <td class="td_l_c"><label>已收款
                                <input name="bt_revenue" type="checkbox" id="bt_revenue"
                                       value="1" <?php echo isset($value['bt_revenue']) ? 'checked' : '' ?>
                                       class="okon_bt"/>
                            </label></td>
                        <td class="td_l_c"><label>提供发票
                                <input name="bt_invoice" type="checkbox" id="bt_invoice"
                                       value="1" <?php echo isset($value['bt_invoice']) ? 'checked' : '' ?>
                                       class="okon_bt"/>
                            </label></td>
                        <td class="td_l_c"><label>详情备注
                                <input name="bt_content" type="checkbox" id="bt_content"
                                       value="1" <?php echo isset($value['bt_content']) ? 'checked' : '' ?>
                                       class="okon_bt"/>
                            </label></td>
                    </tr>
                </table>
                <script language="JavaScript">funbt();</script>
            </td>
        </tr>
    </table>
    <div class="h50b"></div>
    <div class="fixed_bg_B">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td valign="top" class="td_n Bottom_pd "><input type="submit" class="btn2 btnbaoc" value="保存">
                    <input name="Back" type="button" id="Back" class="btn2 btnguanb" value="关闭"
                           onClick="art.dialog.close();"></td>
            </tr>
        </table>
    </div>
</form>

<script src="<?php echo base_url() ?>theme/default/WdatePicker.js"></script>
</body>
</html>
