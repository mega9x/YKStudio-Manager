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

<form name="Save" action="<?php echo site_url('setting/config') ?>?type=linkmans" method="post" onSubmit="return CheckInput
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
                        <td class="td_l_c"><label>任务链接
                                <input name="name" type="checkbox" id="name"
                                       value="1" <?php echo isset($value['name']) ? 'checked' : '' ?> class="okon"/>
                            </label></td>
                        <td class="td_l_c"><label>性别
                                <input name="sex" type="checkbox" id="sex"
                                       value="1" <?php echo isset($value['sex']) ? 'checked' : '' ?> class="okon"/>
                            </label></td>
                        <td class="td_l_c"><label>任务链接
                                <input name="job" type="checkbox" id="job"
                                       value="1" <?php echo isset($value['job']) ? 'checked' : '' ?> class="okon"/>
                            </label></td>
                        <td class="td_l_c"><label>合作站点
                                <input name="mobile" type="checkbox" id="mobile"
                                       value="1" <?php echo isset($value['mobile']) ? 'checked' : '' ?> class="okon"/>
                            </label></td>
                    </tr>
                    <tr>
                        <td class="td_l_c"><label>联系电话
                                <input name="tel" type="checkbox" id="tel"
                                       value="1" <?php echo isset($value['tel']) ? 'checked' : '' ?> class="okon"/>
                            </label></td>
                        <td class="td_l_c"><label>电子邮件
                                <input name="email" type="checkbox" id="email"
                                       value="1" <?php echo isset($value['email']) ? 'checked' : '' ?> class="okon"/>
                            </label></td>
                        <td class="td_l_c"><label>腾讯QQ
                                <input name="qq" type="checkbox" id="qq"
                                       value="1" <?php echo isset($value['qq']) ? 'checked' : '' ?> class="okon"/>
                            </label></td>
                        <td class="td_l_c"><label>MSN
                                <input name="msn" type="checkbox" id="msn"
                                       value="1" <?php echo isset($value['msn']) ? 'checked' : '' ?> class="okon"/>
                            </label></td>
                    </tr>
                    <tr>
                        <td class="td_l_c"><label>阿里旺旺
                                <input name="alww" type="checkbox" id="alww"
                                       value="1" <?php echo isset($value['alww']) ? 'checked' : '' ?> class="okon"/>
                            </label></td>
                        <td class="td_l_c"><label>生日
                                <input name="birthday" type="checkbox" id="birthday"
                                       value="1" <?php echo isset($value['birthday']) ? 'checked' : '' ?> class="okon"/>
                            </label></td>
                        <td class="td_l_c"><label>备注说明
                                <input name="content" type="checkbox" id="content"
                                       value="1" <?php echo isset($value['content']) ? 'checked' : '' ?> class="okon"/>
                            </label></td>
                        <td class="td_l_c"><label>录入时间
                                <input name="addtime" type="checkbox" id="time"
                                       value="1" <?php echo isset($value['addtime']) ? 'checked' : '' ?> class="okon"/>
                            </label></td>
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
                        <td class="td_l_l" COLSPAN="7"><B>必填项 ( 新增/修改 )</B></td>
                    </tr>
                    <tr>
                        <td class="td_l_c"><label>任务链接
                                <input name="bt_name" type="checkbox" id="bt_name"
                                       value="1" <?php echo isset($value['bt_name']) ? 'checked' : '' ?>
                                       class="okon_bt"/>
                            </label></td>
                        <td colspan="1" class="td_l_c"><label>性别
                                <input name="bt_sex" type="checkbox" id="bt_sex"
                                       value="1" <?php echo isset($value['bt_sex']) ? 'checked' : '' ?>
                                       class="okon_bt"/>
                            </label></td>
                        <td colspan="1" class="td_l_c"><label>任务链接
                                <input name="bt_job" type="checkbox" id="bt_job"
                                       value="1" <?php echo isset($value['bt_job']) ? 'checked' : '' ?>
                                       class="okon_bt"/>
                            </label></td>
                        <td colspan="1" class="td_l_c"><label>合作站点
                                <input name="bt_mobile" type="checkbox" id="bt_mobile"
                                       value="1" <?php echo isset($value['bt_mobile']) ? 'checked' : '' ?>
                                       class="okon_bt"/
                                >
                            </label></td>
                    </tr>
                    <tr>
                        <td class="td_l_c"><label>联系电话
                                <input name="bt_tel" type="checkbox" id="bt_tel"
                                       value="1" <?php echo isset($value['bt_tel']) ? 'checked' : '' ?>
                                       class="okon_bt"/>
                            </label></td>
                        <td colspan="1" class="td_l_c"><label>电子邮件
                                <input name="bt_email" type="checkbox" id="bt_email"
                                       value="1" <?php echo isset($value['bt_email']) ? 'checked' : '' ?>
                                       class="okon_bt"/>
                            </label></td>
                        <td colspan="1" class="td_l_c"><label>腾讯QQ
                                <input name="bt_qq" type="checkbox" id="bt_qq"
                                       value="1" <?php echo isset($value['bt_qq']) ? 'checked' : '' ?> class="okon_bt"/>
                            </label></td>
                        <td colspan="1" class="td_l_c"><label>MSN
                                <input name="bt_msn" type="checkbox" id="bt_msn"
                                       value="1" <?php echo isset($value['bt_msn']) ? 'checked' : '' ?>
                                       class="okon_bt"/>
                            </label></td>
                    </tr>
                    <tr>
                        <td class="td_l_c"><label>阿里旺旺
                                <input name="bt_alww" type="checkbox" id="bt_alww"
                                       value="1" <?php echo isset($value['bt_alww']) ? 'checked' : '' ?>
                                       class="okon_bt"/>
                            </label></td>
                        <td colspan="1" class="td_l_c"><label>生日
                                <input name="bt_birthday" type="checkbox" id="bt_birthday"
                                       value="1" <?php echo isset($value['bt_birthday']) ? 'checked' : '' ?>
                                       class="okon_bt"/>
                            </label></td>
                        <td colspan="1" class="td_l_c"><label>备注说明
                                <input name="bt_content" type="checkbox" id="bt_content"
                                       value="1" <?php echo isset($value['bt_content']) ? 'checked' : '' ?>
                                       class="okon_bt"/>
                            </label></td>
                        <td colspan="1" class="td_l_c"></td>
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
                <td valign="top" class="td_n Bottom_pd "><input type="submit" name="Submit" class="btn2 btnbaoc" value
                    ="保存">
                    <input name="Back" type="button" id="Back" class="btn2 btnguanb" value="关闭" onClick="art.dialog.close
();"></td>
            </tr>
        </table>
    </div>
</form>

<script src="<?php echo base_url() ?>theme/default/WdatePicker.js"></script>
</body>
</html>
 