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

<form name="Save" action="<?php echo site_url('setting/config') ?>?type=customer_addmust" method="post"
      onSubmit="return CheckInput();">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td valign="top" class="td_n pdl10 pdr10 pdt10">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1">
                    <col width="25%"/>
                    <col width="25%"/>
                    <col width="25%"/>
                    <col width="25%"/>
                    <tr class="tr_t">
                        <td class="td_l_l" COLSPAN="4"><B>必填字段</B></td>
                    </tr>
                    <tr>
                        <td class="td_l_c"><label>任务名称
                                <input name="bt_name" type="checkbox" id="bt_name"
                                       value="1" <?php echo isset($value['bt_name']) ? 'checked' : '' ?>
                                       class="okon_bt"/>
                            </label></td>
                        <td class="td_l_c"><label id="kh_type"
                                                  onclick="bkx('bt_type','#kh_type','kh_type','hidden_type')">转化情况
                                <input name="bt_type" type="checkbox" id="bt_type"
                                       value="1" <?php echo isset($value['bt_type']) ? 'checked' : '' ?>
                                       class="okon_bt"/>
                            </label></td>
                        <td class="td_l_c"><label id="kh_area"
                                                  onclick="bkx('bt_area','#kh_area','kh_area','hidden_area')">所在地区
                                <input name="bt_area" type="checkbox" id="bt_area"
                                       value="1" <?php echo isset($value['bt_area']) ? 'checked' : '' ?>
                                       class="okon_bt"/>
                            </label></td>
                        <td class="td_l_c"><label id="kh_address"
                                                  onclick="bkx('bt_address','#kh_address','kh_address','hidden_address')">账户信息
                                <input name="bt_address" type="checkbox" id="bt_address"
                                       value="1" <?php echo isset($value['bt_address']) ? 'checked' : '' ?>
                                       class="okon_bt"/>
                            </label></td>
                    </tr>
                    <tr>
                        <td class="td_l_c"><label id="kh_start"
                                                  onclick="bkx('bt_start','#kh_start','kh_start','hidden_start')">流量状况
                                <input name="bt_start" type="checkbox" id="bt_start"
                                       value="1" <?php echo isset($value['bt_start']) ? 'checked' : '' ?>
                                       class="okon_bt"/>
                            </label></td>
                        <td class="td_l_c"><label id="kh_source"
                                                  onclick="bkx('bt_source','#kh_source','kh_source','hidden_source')">所属联盟
                                <input name="bt_source" type="checkbox" id="bt_source"
                                       value="1" <?php echo isset($value['bt_source']) ? 'checked' : '' ?>
                                       class="okon_bt"/>
                            </label></td>
                        <td class="td_l_c"><label id="kh_trade"
                                                  onclick="bkx('bt_trade','#kh_trade','kh_cfax2','hidden_fax')">任务类型
                                <input name="bt_trade" type="checkbox" id="bt_trade"
                                       value="1" <?php echo isset($value['bt_trade']) ? 'checked' : '' ?>
                                       class="okon_bt"/>
                            </label></td>
                        <td class="td_l_c"><label id="kh_website"
                                                  onclick="bkx('bt_website','#kh_website','kh_cweb2','hidden_website')">公司网址
                                <input name="bt_website" type="checkbox" id="bt_website"
                                       value="1" <?php echo isset($value['bt_website']) ? 'checked' : '' ?>
                                       class="okon_bt"/>
                            </label></td>
                    </tr>
                    <tr>
                        <td class="td_l_c"><label>任务链接
                                <input name="bt_linkman" type="checkbox" id="bt_linkman"
                                       value="1" <?php echo isset($value['bt_linkman']) ? 'checked' : '' ?>
                                       class="okon_bt"/>
                            </label>
                        </td>
                        <td class="td_l_c"><label id="kh_job"
                                                  onclick="bkx('bt_job','#kh_job','kh_job','hidden_zhiwei')">任务链接
                                <input name="bt_job" type="checkbox" id="bt_job"
                                       value="1" <?php echo isset($value['bt_job']) ? 'checked' : '' ?>
                                       class="okon_bt"/>
                            </label>
                        </td>
                        <td class="td_l_c"><label>合作站点
                                <input name="bt_mobile" type="checkbox" id="bt_mobile"
                                       value="1" <?php echo isset($value['bt_mobile']) ? 'checked' : '' ?>
                                       class="okon_bt"/>
                            </label>
                        </td>
                        <td class="td_l_c"><label id="kh_qq" onclick="bkx('bt_qq','#kh_qq','kh_qq','hidden_qq')">任务要求
                                <input name="bt_qq" type="checkbox" id="bt_qq"
                                       value="1" <?php echo isset($value['bt_qq']) ? 'checked' : '' ?> class="okon_bt"/>
                            </label>
                        </td>
                    </tr>

                    <tr>
                        <td class="td_l_c">
                            <label id="kh_email" onclick="bkx('bt_email','#kh_email','kh_email','hidden_email')">电子邮件
                                <input name="bt_email" type="checkbox" id="bt_email"
                                       value="1" <?php echo isset($value['bt_email']) ? 'checked' : '' ?>
                                       class="okon_bt"/>
                            </label>
                        </td>
                        <td class="td_l_c"><label id="kh_record"
                                                  onclick="bkx('bt_record','#kh_record','kh_record','hidden_record')">任务代码
                                <input name="bt_record" type="checkbox" id="bt_record"
                                       value="1" <?php echo isset($value['bt_record']) ? 'checked' : '' ?>
                                       class="okon_bt"/>
                            </label>
                        </td>
                        <td class="td_l_c"><label id="kh_remark"
                                                  onclick="bkx('bt_remark','#kh_remark','kh_cbeizhu2','hidden_remark')">备注
                                <input name="bt_remark" type="checkbox" id="bt_remark"
                                       value="1" <?php echo isset($value['bt_remark']) ? 'checked' : '' ?>
                                       class="okon_bt"/>
                            </label>
                        </td>
                        <td class="td_l_c">&nbsp;</td>

                    </tr>
                </table>
                <script language="JavaScript">funbt();</script>
            </td>
        </tr>
        <tr>
            <td valign="top" class="td_n pdl10 pdr10 pdt10">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1">
                    <col width="25%"/>
                    <col width="25%"/>
                    <col width="25%"/>
                    <col width="25%"/>
                    <tr class="tr_t">
                        <td class="td_l_l" COLSPAN="4"><B>不显示字段</B></td>
                    </tr>
                    <tr>
                        <td class="td_l_c"><label
                                    id="kh_job" <?php echo isset($value['bt_job']) ? 'style=" display:none;"' : '' ?>>任务链接
                                <input name="hidden_job" type="checkbox" id="hidden_zhiwei"
                                       value="1" <?php echo isset($value['hidden_zhiwei']) ? 'checked' : '' ?>
                                       class="okon_yc"/>
                            </label></td>
                        <td class="td_l_c"><label
                                    id="kh_type" <?php echo isset($value['bt_type']) ? 'style=" display:none;"' : '' ?>>转化情况
                                <input name="hidden_type" type="checkbox" id="hidden_type"
                                       value="1" <?php echo isset($value['hidden_type']) ? 'checked' : '' ?>
                                       class="okon_yc"/>
                            </label></td>
                        <td class="td_l_c"><label
                                    id="kh_area" <?php echo isset($value['bt_area']) ? 'style=" display:none;"' : '' ?>>所在地区
                                <input name="hidden_area" type="checkbox" id="hidden_area"
                                       value="1" <?php echo isset($value['hidden_area']) ? 'checked' : '' ?>
                                       class="okon_yc"/>
                            </label></td>
                        <td class="td_l_c"><label
                                    id="kh_address" <?php echo isset($value['bt_address']) ? 'style=" display:none;"' : '' ?>>账户信息
                                <input name="hidden_address" type="checkbox" id="hidden_address"
                                       value="1" <?php echo isset($value['hidden_address']) ? 'checked' : '' ?>
                                       class="okon_yc"/>
                            </label></td>
                    </tr>
                    <tr>
                        <td class="td_l_c"><label
                                    id="kh_start" <?php echo isset($value['bt_start']) ? 'style=" display:none;"' : '' ?>>流量状况
                                <input name="hidden_start" type="checkbox" id="hidden_start"
                                       value="1" <?php echo isset($value['hidden_start']) ? 'checked' : '' ?>
                                       class="okon_yc"/>
                            </label></td>
                        <td class="td_l_c"><label
                                    id="kh_source" <?php echo isset($value['bt_source']) ? 'style=" display:none;"' : '' ?>>所属联盟
                                <input name="hidden_source" type="checkbox" id="hidden_source"
                                       value="1" <?php echo isset($value['hidden_source']) ? 'checked' : '' ?>
                                       class="okon_yc"/>
                            </label></td>
                        <td class="td_l_c"><label
                                    id="kh_cfax2" <?php echo isset($value['bt_trade']) ? 'style=" display:none;"' : '' ?>>任务类型
                                <input name="hidden_trade" type="checkbox" id="hidden_trade"
                                       value="1" <?php echo isset($value['hidden_trade']) ? 'checked' : '' ?>
                                       class="okon_yc"/>
                            </label></td>
                        <td class="td_l_c"><label
                                    id="kh_cweb2" <?php echo isset($value['bt_website']) ? 'style=" display:none;"' : '' ?>>公司网址
                                <input name="hidden_website" type="checkbox" id="hidden_website"
                                       value="1" <?php echo isset($value['hidden_website']) ? 'checked' : '' ?>
                                       class="okon_yc"/>
                            </label></td>
                    </tr>
                    <tr>
                        <td class="td_l_c"><label
                                    id="kh_qq" <?php echo isset($value['bt_qq']) ? 'style=" display:none;"' : '' ?>>任务要求
                                <input name="hidden_qq" type="checkbox" id="hidden_tel"
                                       value="1" <?php echo isset($value['hidden_qq']) ? 'checked' : '' ?>
                                       class="okon_yc"/>
                            </label></td>
                        <td class="td_l_c"><label
                                    id="kh_email"<?php echo isset($value['bt_email']) ? 'style=" display:none;"' : '' ?> >电子邮件
                                <input name="hidden_email" type="checkbox" id="hidden_email"
                                       value="1" <?php echo isset($value['hidden_email']) ? 'checked' : '' ?>
                                       class="okon_yc"/>
                            </label>
                        </td>
                        <td class="td_l_c"><label
                                    id="kh_record"<?php echo isset($value['bt_record']) ? 'style=" display:none;"' : '' ?> >任务代码
                                <input name="hidden_record" type="checkbox" id="hidden_record"
                                       value="1" <?php echo isset($value['hidden_record']) ? 'checked' : '' ?>
                                       class="okon_yc"/>
                            </label>
                        </td>
                        <td class="td_l_c">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="td_l_c"><label
                                    id="kh_cbeizhu2" <?php echo isset($value['bt_remark']) ? 'style=" display:none;"' : '' ?>>备注
                                <input name="hidden_remark" type="checkbox" id="hidden_remark"
                                       value="1" <?php echo isset($value['hidden_remark']) ? 'checked' : '' ?>
                                       class="okon_yc"/>
                            </label></td>
                        <td class="td_l_c">&nbsp;</td>
                        <td class="td_l_c">&nbsp;</td>
                        <td class="td_l_c">&nbsp;</td>
                    </tr>
                </table>
                <script>
                    function bkx(btx, id1, id2, bxs) {
                        var ischeck = document.getElementById(btx).value
                        if ($(id1).hasClass('okon_on')) {
                            document.getElementById(id2).style.display = "none";
                            document.getElementById(bxs).value = "0";
                        } else {
                            document.getElementById(id2).style.display = "";
                        }
                    }
                </script>
                <script language="JavaScript">funyc();</script>
            </td>
        </tr>
    </table>
    <div class="h50b"></div>
    <div class="fixed_bg_B">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td valign="top" class="td_n Bottom_pd "><input type="submit" name="Submit" class="btn2 btnbaoc"
                                                                value="保存">
                    <input name="Back" type="button" id="Back" class="btn2 btnguanb" value="关闭"
                           onClick="art.dialog.close();"></td>
            </tr>
        </table>
    </div>
</form>

<script src="<?php echo base_url() ?>theme/default/WdatePicker.js"></script>
</body>
</html>
 