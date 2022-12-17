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
<body>

<script language="JavaScript">
    <!--
    合同记录必填项提示

    function CheckInput() {
        if (1 == "1") {
            if (document.all.number.value == "") {
                art.dialog({title: 'Error', time: 1, icon: 'warning', content: '合同编号不能为空！'});
                document.all.number.focus();
                return false;
            }
        }
        if (<?php echo isset($config['bt_ht_oid']) ? 1 : 0?> =="1"
    )
        {
            if (document.all.oId.value == "") {
                art.dialog({title: 'Error', time: 1, icon: 'warning', content: '订单编号不能为空！'});
                document.all.oId.focus();
                return false;
            }
        }
        if (<?php echo isset($config['bt_sdate']) ? 1 : 0?> =="1"
    )
        {
            if (document.all.sdate.value == "") {
                art.dialog({title: 'Error', time: 1, icon: 'warning', content: '起始时间不能为空！'});
                document.all.sdate.focus();
                return false;
            }
        }
        if (<?php echo isset($config['bt_edate']) ? 1 : 0?> =="1"
    )
        {
            if (document.all.edate.value == "") {
                art.dialog({title: 'Error', time: 1, icon: 'warning', content: '到期时间不能为空！'});
                document.all.edate.focus();
                return false;
            }
        }
        if (<?php echo isset($config['bt_type']) ? 1 : 0?> =="1"
    )
        {
            if (document.all.type.value == "") {
                art.dialog({title: 'Error', time: 1, icon: 'warning', content: '合同分类不能为空！'});
                document.all.type.focus();
                return false;
            }
        }
        if (<?php echo isset($config['bt_money']) ? 1 : 0?> =="1"
    )
        {
            if (document.all.money.value == "") {
                art.dialog({title: 'Error', time: 1, icon: 'warning', content: '总金额不能为空！'});
                document.all.money.focus();
                return false;
            }
        }
        if (<?php echo isset($config['bt_revenue']) ? 1 : 0?> =="1"
    )
        {
            if (document.all.revenue.value == "") {
                art.dialog({title: 'Error', time: 1, icon: 'warning', content: '已收款不能为空！'});
                document.all.hRevenue.focus();
                return false;
            }
        }
        if (<?php echo isset($config['bt_invoice']) ? 1 : 0?> =="1"
    )
        {
            if (document.all.isinvoice.value == "") {
                art.dialog({title: 'Error', time: 1, icon: 'warning', content: '提供发票不能为空！'});
                document.all.isinvoice.focus();
                return false;
            }
        }
        if (1 == "1") {
            if (document.all.istax.value == "") {
                art.dialog({title: 'Error', time: 1, icon: 'warning', content: '是否含税不能为空！'});
                document.all.hTax.focus();
                return false;
            }
        }
        if (<?php echo isset($config['bt_content']) ? 1 : 0?> =="1"
    )
        {
            if (document.all.content.value == "") {
                art.dialog({title: 'Error', time: 1, icon: 'warning', content: '详情备注不能为空！'});
                document.all.content.focus();
                return false;
            }
        }
    }

    -->
</script>

<form name="Save" action="<?php echo site_url('contract/edit') ?>?id=<?php echo $id ?>" method="post"
      onSubmit="return CheckInput();">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td valign="top" class="td_n pdl10 pdr10 pdt10">
                <table width="100%" border="0" cellspacing="0" cellpadding
                ="0" CLASS="table_1">
                    <col width="100"/>
                    <col/>
                    <col width="100"/>
                    <col/>
                    <tr class="tr_t">
                        <td class="td_l_l" COLSPAN="2"><B>修改合同记录</B></td>
                    </tr>
                    <tr>
                        <td class="td_l_r title">合同编号</td>
                        <td class="td_r_l"><?php echo $number ?> <span class="info_help help01">&nbsp;不可修改</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="td_l_r title">
                            <?php echo isset($config['bt_type']) ? '<font color="#FF0000">*</font>' : '' ?>
                            合同分类
                        </td>
                        <td class="td_r_l">
                            <select name="type" id="Select_Hetong">
                                <option value="">请选择</option>
                                <?php foreach ($select_hetong as $arr => $row) { ?>
                                    <option value="<?php echo $row['name'] ?>" <?php echo $row['name'] == $type ? 'selected' : '' ?>><?php echo $row['name'] ?></option>
                                <?php } ?>
                            </select>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td class="td_l_r title">
                            <?php echo isset($config['bt_ordernumber']) ? '<font color="#FF0000">*</font>' : '' ?>
                            订单编号
                        </td>
                        <td class="td_r_l"><input name="orderid" type="hidden" id="oId" size="23"
                                                  value="<?php echo $orderid ?>" readonly/>

                            <input name="ordernumber" type="text" id="oCode" size="23" class="int"
                                   value="<?php echo $ordernumber ?>" readonly/>
                        </td>
                    </tr>
                    <tr>
                        <td class="td_l_r title">
                            <?php echo isset($config['bt_sdate']) ? '<font color="#FF0000">*</font>' : '' ?>
                            起始时间
                        </td>
                        <td class="td_r_l"><input name="sdate" type="text" id="hSdate" class="int Wdate" size="15"
                                                  onFocus="WdatePicker({dateFmt:'yyyy-MM-dd'})"
                                                  value="<?php echo $sdate ?>"/></td>
                    </tr>
                    <tr>
                        <td class="td_l_r title">
                            <?php echo isset($config['bt_edate']) ? '<font color="#FF0000">*</font>' : '' ?>
                            到期时间
                        </td>
                        <td class="td_r_l"><input name="edate" type="text" id="hEdate" class="int Wdate" size="15"
                                                  onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})"
                                                  value="<?php echo $edate ?>"/></td>
                    </tr>
                    <tr>
                        <td class="td_l_r title">
                            <?php echo isset($config['bt_money']) ? '<font color="#FF0000">*</font>' : '' ?>
                            总金额
                        </td>
                        <td class="td_r_l">
                            <input type="text" id="hMoney" name="money" class="int" size="10"
                                   value="<?php echo $money ?>" readonly/>
                            元
                        </td>


                    </tr>

                    <tr>
                        <td class="td_l_r title">

                            欠款金额
                        </td>
                        <td class="td_r_l">
                            <input type="text" id="qkMoney" type="hidden" name="qkmoney" class="int"
                                   value="<?php echo $qkmoney ?>" size="10" readonly value="0"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="td_l_r title">
                            <?php echo isset($config['bt_invoice']) ? '<font color="#FF0000">*</font>' : '' ?>
                            提供发票
                        </td>
                        <td class="td_r_l"><select name="isinvoice" id="Select_YN">
                                <option value="">请选择</option>
                                <option value="是" <?php echo $isinvoice == '是' ? 'selected' : '' ?>>是</option>
                                <option value="否" <?php echo $isinvoice == '否' ? 'selected' : '' ?>>否</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td class="td_l_r title">

                            是否含税
                        </td>
                        <td class="td_r_l"><select name="istax" id="Select_YN">
                                <option value="">请选择</option>
                                <option value="是" <?php echo $istax == '是' ? 'selected' : '' ?>>是</option>
                                <option value="否" <?php echo $istax == '否' ? 'selected' : '' ?>>否</option>
                            </select></td>
                    </tr>

                    <tr>
                        <td class="td_l_r title">
                            <?php echo isset($config['bt_content']) ? '<font color="#FF0000">*</font>' : '' ?>
                            详情备注
                        </td>
                        <td class="td_r_l" style="padding:5px 10px;"><textarea name="content" rows="4" id="hContent"
                                                                               class="int"
                                                                               style="height:80px;width:98%;"><?php echo $content ?></textarea>
                        </td>
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
                    <input type="submit" class="btn2 btnbaoc" title="保存" value="保存">
                    <input name="Back" type="button" id="Back" class="btn2 btnguanb" value="关闭"
                           onClick="art.dialog.close();"></td>
            </tr>
        </table>
    </div>
</form>

<script src="<?php echo base_url() ?>theme/default/WdatePicker.js"></script>
</body>
</html>