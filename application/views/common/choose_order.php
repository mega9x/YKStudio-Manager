<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
        if (1 == "0") {
            if (document.all.hNum.value == "") {
                art.dialog({title: 'Error', time: 1, icon: 'warning', content
            :
                '合同编号不能为空！'
            })
                ;document.all.hNum.focus();
                return false;
            }
        }
        if (0 == "1") {
            if (document.all.oId.value == "") {
                art.dialog({title: 'Error', time: 1, icon: 'warning', content
            :
                '订单编号不能为空！'
            })
                ;document.all.oId.focus();
                return false;
            }
        }
        if (1 == "1") {
            if (document.all.hSdate.value == "") {
                art.dialog({title: 'Error', time: 1, icon: 'warning', content
            :
                '起始时间不能为空！'
            })
                ;document.all.hSdate.focus();
                return false;
            }
        }
        if (0 == "1") {
            if (document.all.hEdate.value == "") {
                art.dialog({title: 'Error', time: 1, icon: 'warning', content
            :
                '到期时间不能为空！'
            })
                ;document.all.hEdate.focus();
                return false;
            }
        }
        if (1 == "1") {
            if (document.all.hType.value == "") {
                art.dialog({title: 'Error', time: 1, icon: 'warning', content
            :
                '合同分类不能为空！'
            })
                ;document.all.hType.focus();
                return false;
            }
        }
        if (1 == "1") {
            if (document.all.hMoney.value == "") {
                art.dialog({title: 'Error', time: 1, icon: 'warning', content
            :
                '总金额不能为空！'
            })
                ;document.all.hMoney.focus();
                return false;
            }
        }
        if (1 == "1") {
            if (document.all.hRevenue.value == "") {
                art.dialog({
                    title: 'Error', time: 1, icon: 'warning'
                    , content: '已收款不能为空！'
                });
                document.all.hRevenue.focus();
                return false;
            }
        }
        if (1 == "1") {
            if (document.all.hInvoice.value == "") {
                art.dialog({
                    title: 'Error', time: 1, icon: 'warning'
                    , content: '提供发票不能为空！'
                });
                document.all.hInvoice.focus();
                return false;
            }
        }
        if (1 == "1") {
            if (document.all.hTax.value == "") {
                art.dialog({title: 'Error', time: 1, icon: 'warning', content
            :
                '是否含税不能为空！'
            })
                ;document.all.hTax.focus();
                return false;
            }
        }
        if (1 == "1") {
            if (document.all.hContent.value == "") {
                art.dialog({
                    title: 'Error', time: 1, icon: 'warning'
                    , content: '详情备注不能为空！'
                });
                document.all.hContent.focus();
                return false;
            }
        }
    }

    -->
</script>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td class="top_left td_t_n td_r_n">订单列表 （单击选中）</td>
        <td class="top_right td_t_n td_r_n"></td>
    </tr>
</table>

<table width="100%" border="0" cellpadding="0" cellspacing="0" class="top_bg">
    <tr>
        <td class="top_left td_t_n td_r_n">
            <form name="searchForm" action="?saction=ssdetail" method="post">
                <input name="keyword" type="text" class="int" id="keyword" size="30" value="<?php echo $keyword ?>"
                       onkeyup="searchSuggest();"/>
                <input type="submit" name="Submit" id="ss_button" class="btn1 btnxiug" value="搜索"/>
                <input type="button" class="btn1 btnxiug" value="清空条件" onClick=window.location.href="?"/>
        </td>
        <td class="top_right td_t_n td_r_n"></td>
    </tr>
</table>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td valign="top" class="td_n pdl10 pdr10 pdt10">
            <table width="100%" border="0" cellspacing="0" cellpadding
            ="0" CLASS="table_1">
                <tr class="tr_t">

                    <td class="td_l_c">任务链接</td>

                    <td class="td_l_c">下单日期</td>

                    <td class="td_l_c">交单日期</td>

                    <td class="td_l_c">预付款</td>

                    <td class="td_l_c">订单金额</td>
                    <td class="td_l_c">欠款金额</td>

                    <td class="td_l_c">订单状态</td>

                    <td class="td_l_c">业务员</td>

                    <td class="td_l_c">录入时间</td>

                </tr>

                <?php foreach ($list as $arr => $row) { ?>
                    <tr class="tr"
                        onClick=window.location.href="javascript:$.dialog.open.origin.$('#oId').val('<?php echo $row['id'] ?>');$.dialog.open.origin.$('#oCode').val('<?php echo $row['number'] ?>');$.dialog.open.origin.$('#hMoney').val('<?php echo $row['money'] ?>');$.dialog.open.origin.$('#qkMoney').val('<?php echo $row['qkmoney'] ?>');$.dialog.open.origin.$('#hRevenue').val('<?php echo $row['deposit'] ?>');$.dialog.close();"
                        style="cursor:pointer;">

                        <td class="td_l_c"><?php echo $row['linkman'] ?></td>
                        <td class="td_l_c"><?php echo $row['sdate'] ?></td>
                        <td class="td_l_c"><?php echo $row['edate'] ?></td>
                        <td class="td_l_c"><?php echo $row['deposit'] ?></td>
                        <td class="td_l_c"><?php echo $row['money'] ?></td>
                        <td class="td_l_c"><?php echo $row['qkmoney'] ?></td>
                        <td class="td_l_c"><?php echo $audit[$row['state']] ?> </td>
                        <td class="td_l_c"><?php echo $row['adduser'] ?></td>
                        <td class="td_l_c"><?php echo $row['adddate'] ?></td>
                    </tr>
                <?php } ?>
            </table>
        </td>
    </tr>
</table>

<script src="<?php echo base_url() ?>theme/default/WdatePicker.js"></script>
</body>
</html>