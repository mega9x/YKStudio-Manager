<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCtype html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <link href="<?php echo base_url() ?>theme/default/css/common.css" rel="stylesheet" type="text/css">
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/Common.js"></script>
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/jquery.min.js"></script>
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/tips.js"></script>
    <script src="<?php echo base_url() ?>theme/default/js/jquery.artDialog.js?skin=default"></script>
    <script src="<?php echo base_url() ?>theme/default/js/iframeTools.js"></script>
</head>
<body style="padding-bottom:50px;">

<script language="JavaScript">
    function check_customer_name(name) {
        var url, data
        url = "<?php echo site_url('common/customer_name')?>";
        data = "name=" + encodeURIComponent(name);
        $.ajax({
            type: "post",
            cache: !1,
            url: url,
            async: false,
            data: data,
            timeout: 1e4,
            error: function () {
            },
            success: function (e) {
                if (e) {
                    $("#customer_name_err").html(e);
                    $("#submit").attr({"disabled": "disabled"});
                } else {
                    $("#customer_name_err").html("");
                    $("#submit").removeAttr("disabled");
                }
            }
        })
    }
</script>


<script>function AddMust() {
        $.dialog.open('<?php echo site_url('setting/config')?>?type=customer_addmust', {
            title: '自定义设置',
            width: 600,
            height: 450,
            fixed: true
        });
    };</script>
<form name="Add" action="<?php echo site_url('customer/editall') ?>" method="post">

    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td valign="top" class="td_n pdl10 pdr10 pdt10">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_1">
                    <col width="100"/>
                    <col width="400"/>
                    <col width="100"/>
                    <col width="400"/>
                    <tr>
                        <td colspan="4" class="td_l_l title3 icon_t01">
                            基本信息
                        </td>
                    </tr>
                    <tr>
                        <td class="td_l_r title">
                            <?php echo isset($value['bt_name']) ? '<font color="#FF0000">*</font>' : '' ?>
                            任务名称
                        </td>
                        <td colspan="3" class="td_r_l">
                            <input type="text" class="int" name="name" id="name" size="50" maxlength="50"
                                   autocomplete="off">
                            <span id="customer_name_err"><span class="info_warn help01">任务匹配信息</span></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="td_l_r title" <?php echo isset($value['hidden_type']) ? 'style="display:none;"' : '' ?>>
                            <?php echo isset($value['bt_type']) ? '<font color="#FF0000">*</font>' : '' ?>
                            转化情况
                        </td>
                        <td class="td_r_l" <?php echo isset($value['hidden_type']) ? 'style="display:none;"' : '' ?>>
                            <select name="type" id="type">
                                <option value="">请选择</option>
                                <?php foreach ($select_type as $arr => $row) { ?>
                                    <option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
                                <?php } ?>
                            </select>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td class="td_l_r title" <?php echo isset($value['hidden_start']) ? 'style="display:none;"' : '' ?>>
                            <?php echo isset($value['bt_start']) ? '<font color="#FF0000">*</font>' : '' ?>流量状况
                        </td>
                        <td class="td_r_l" <?php echo isset($value['hidden_start']) ? 'style="display:none;"' : '' ?>>
                            <select name="Start" id="Select_Star">
                                <option value="">请选择</option>
                                <?php foreach ($select_star as $arr => $row) { ?>
                                    <option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
                                <?php } ?>
                            </select>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td class="td_l_r title" <?php echo isset($value['hidden_trade']) ? 'style="display:none;"' : '' ?>>
                            <?php echo isset($value['bt_trade']) ? '<font color="#FF0000">*</font>' : '' ?>
                            任务类型
                        </td>
                        <td class="td_r_l" <?php echo isset($value['hidden_trade']) ? 'style="display:none;"' : '' ?>>
                            <select name="trade" id="trade">
                                <option value="">请选择</option>
                                <?php foreach ($select_trade as $arr => $row) { ?>
                                    <option value="<?php echo $row['name'] ?>"
                                            id="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="td_l_l title3 icon_t02">
                            任务资料
                        </td>
                    </tr>
                    <tr>
                        <td class="td_l_r title">
                            <?php echo isset($value['bt_qq']) ? '<font color="#FF0000">*</font>' : '' ?>
                            任务要求
                        </td>
                        <td class="td_r_l">
                            <input name="qq" type="text" class="int" id="qq" size="30">
                        </td>
                        <td class="td_l_r title" style="display: none;">
                            <?php echo isset($value['bt_email']) ? '<font color="#FF0000">*</font>' : '' ?>
                            电子邮件
                        </td>
                        <td class="td_r_l" style="display: none;">
                            <input name="email" type="text" class="int" id="email" size="30">
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
            </td>
        </tr>
    </table>
    <div class="h50b"></div>
    <div class="fixed_bg_B">
        <table width="100%" border="0" cellpadding="0" cellspacing="0"">
            <tr>
                <td valign="top" class="td_n Bottom_pd">
                    <input type="submit" id="submit" class="btn2 btnbaoc" value="保存">
                    <input name="Back" type="button" id="Back" class="btn2 btnguanb" value="关闭"
                           onClick="art.dialog.close();">
                </td>
            </tr>
        </table>
    </div>
</form>
<script src="<?php echo base_url() ?>theme/default/WdatePicker.js"></script>
</body>
</html>


