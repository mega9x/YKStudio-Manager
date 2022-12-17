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

<form name="Save" action="<?php echo site_url('setting/config') ?>?type=customer" method="post"
      onSubmit="return CheckInput();">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td valign="top" class="td_n pdl10 pdr10 pdt10">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1 x-choose">
                    <!--<col width="50" />-->
                    <col width="25%"/>
                    <col width="25%"/>
                    <col width="25%"/>
                    <col width="25%"/>
                    <tr class="tr_t">
                        <td class="td_l_l" COLSPAN="4"><B><b>列表</b>显示选项</B></td>
                    </tr>
                    <tr>
                        <td class="td_l_c"><label>任务名称
                                <input name="name" type="checkbox" id="name"
                                       value="1" <?php echo isset($value['name']) ? 'checked' : '' ?> class="okon"/>
                            </label></td>
                        <td class="td_l_c"><label>转化情况
                                <input name="type" type="checkbox" id="type"
                                       value="1" <?php echo isset($value['type']) ? 'checked' : '' ?> class="okon"/>
                            </label></td>
                        <td class="td_l_c"><label>所在地区
                                <input name="area" type="checkbox" id="area"
                                       value="1" <?php echo isset($value['area']) ? 'checked' : '' ?> class="okon"/>
                            </label></td>
                        <td class="td_l_c"><label>账户信息
                                <input name="address" type="checkbox" id="address"
                                       value="1" <?php echo isset($value['address']) ? 'checked' : '' ?> class="okon"/>
                            </label></td>
                    </tr>
                    <tr>
                        <td class="td_l_c"><label>任务链接
                                <input name="linkman" type="checkbox" id="linkman"
                                       value="1" <?php echo isset($value['linkman']) ? 'checked' : '' ?> class="okon"/>
                            </label></td>
                        <td class="td_l_c"><label>标记
                                <input name="job" type="checkbox" id="job"
                                       value="1" <?php echo isset($value['job']) ? 'checked' : '' ?> class="okon"/>
                            </label></td>
                        <td class="td_l_c"><label>合作站点
                                <input name="mobile" type="checkbox" id="mobile"
                                       value="1" <?php echo isset($value['mobile']) ? 'checked' : '' ?> class="okon"/>
                            </label></td>
                        <td class="td_l_c"><label>任务要求
                                <input name="qq" type="checkbox" id="qq"
                                       value="1" <?php echo isset($value['qq']) ? 'checked' : '' ?> class="okon"/>
                            </label></td>
                    </tr>

                    <tr>

                        <td class="td_l_c"><label>流量状况
                                <input name="start" type="checkbox" id="start"
                                       value="1" <?php echo isset($value['start']) ? 'checked' : '' ?> class="okon"/>
                            </label>
                        </td>
                        <td class="td_l_c"><label>所属联盟
                                <input name="source" type="checkbox" id="source"
                                       value="1" <?php echo isset($value['source']) ? 'checked' : '' ?> class="okon"/>
                            </label>
                        </td>
                        <td class="td_l_c"><label>任务代码
                                <input name="record" type="checkbox" id="record"
                                       value="1" <?php echo isset($value['record']) ? 'checked' : '' ?> class="okon"/>
                            </label>
                        </td>
                    </tr>

                    <tr>

                        <td class="td_l_c"><label>录入时间
                                <input name="adddate" type="checkbox" id="adddate"
                                       value="1" <?php echo isset($value['adddate']) ? 'checked' : '' ?> class="okon"/>
                            </label></td>

                        <td class="td_l_c"><label>下次跟进
                                <input name="nexttime" type="checkbox" id="nexttime"
                                       value="1" <?php echo isset($value['nexttime']) ? 'checked' : '' ?> class="okon"/>
                            </label></td>

                    </tr>
                    <tr>
                        <td class="td_l_c"><label>任务类型
                                <input name="trade" type="checkbox" id="trade"
                                       value="1" <?php echo isset($value['trade']) ? 'checked' : '' ?> class="okon"/>
                            </label></td>

                        <td class="td_l_c"><label>工号
                                <input name="adduser" type="checkbox" id="adduser"
                                       value="1" <?php echo isset($value['adduser']) ? 'checked' : '' ?> class="okon"/>
                            </label></td>
                        <td class="td_l_c">&nbsp;</td>
                    </tr>
                </table>
                <script language="JavaScript">funxs();</script>
            </td>
        </tr>

    </table>

    <div class="fixed_bg_B">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td valign="top" class="td_n Bottom_pd ">

                    <input type="submit" id="submit" class="btn2 btnbaoc" value="保存">
                    <input name="Back" type="button" id="Back" class="btn2 btnguanb" value="关闭"
                           onclick="art.dialog.close ();">

                </td>
            </tr>
        </table>
    </div>
</form>

<script src="<?php echo base_url() ?>theme/default/WdatePicker.js"></script>
</body>
</html>
