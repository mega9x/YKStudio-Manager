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
    任务链接必填项提示

    function CheckInput() {
        if (<?php echo isset($value['bt_name']) ? 1 : 0?>=="1"
    )
        {
            if (document.all.Name.value == "") {
                art.dialog({title: 'Error', time: 1, icon: 'warning', content: '任务链接不能为空！'});
                document.all.Name.focus();
                return false;
            }
        }
        if (<?php echo isset($value['bt_sex']) ? 1 : 0?>=="1"
    )
        {
            if (document.all.Sex.value == "") {
                art.dialog({title: 'Error', time: 1, icon: 'warning', content: '性别不能为空！'});
                document.all.Sex.focus();
                return false;
            }
        }
        if (<?php echo isset($value['bt_job']) ? 1 : 0?>=="1"
    )
        {
            if (document.all.job.value == "") {
                art.dialog({title: 'Error', time: 1, icon: 'warning', content: '任务链接不能为空！'});
                document.all.job.focus();
                return false;
            }
        }
        if (<?php echo isset($value['bt_birthday']) ? 1 : 0?>=="1"
    )
        {
            if (document.all.Birthday.value == "") {
                art.dialog({title: 'Error', time: 1, icon: 'warning', content: '生日不能为空！'});
                document.all.Birthday.focus();
                return false;
            }
        }
        if (<?php echo isset($value['bt_mobile']) ? 1 : 0?>=="1"
    )
        {
            if (document.all.Mobile.value == "") {
                art.dialog({title: 'Error', time: 1, icon: 'warning', content: '合作站点不能为空！'});
                document.all.Mobile.focus();
                return false;
            }
        }
        if (<?php echo isset($value['bt_weixin']) ? 1 : 0?>=="1"
    )
        {
            if (document.all.weixin.value == "") {
                art.dialog({title: 'Error', time: 1, icon: 'warning', content: '微信不能为空！'});
                document.all.weixin.focus();
                return false;
            }
        }
        if (<?php echo isset($value['bt_email']) ? 1 : 0?>=="1"
    )
        {
            if (document.all.Email.value == "") {
                art.dialog({title: 'Error', time: 1, icon: 'warning', content: '电子邮件不能为空！'});
                document.all.lEmail.focus();
                return false;
            }
        }
        if (<?php echo isset($value['bt_qq']) ? 1 : 0?>=="1"
    )
        {
            if (document.all.QQ.value == "") {
                art.dialog({title: 'Error', time: 1, icon: 'warning', content: 'QQ不能为空！'});
                document.all.QQ.focus();
                return false;
            }
        }
        if (<?php echo isset($value['bt_content']) ? 1 : 0?>=="1"
    )
        {
            if (document.all.Content.value == "") {
                art.dialog({title: 'Error', time: 1, icon: 'warning', content: '备注说明不能为空！'});
                document.all.Content.focus();
                return false;
            }
        }
    }

    -->
</script>

<form name="Save" action="<?php echo site_url('linkman/edit') ?>?id=<?php echo $id ?>" method="post"
      onSubmit="return CheckInput();">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td valign="top" class="td_n pdl10 pdr10 pdt10">
                <table width="100%" border="0" cellspacing="0" cellpadding
                ="0" CLASS="table_1">
                    <col width="120"/>
                    <col/>
                    <col width="120"/>
                    <tr class="tr_t">
                        <td class="td_l_l" COLSPAN="8"><B>新增任务链接</B></td>
                    </tr>
                    <tr>
                        <td class="td_l_r title">
                            <?php echo isset($value['bt_name']) ? '<font color="#FF0000">*</font>' : '' ?>
                            任务链接
                        </td>
                        <td class="td_r_l"><input type="text" class="int" name="Name" id="lName" size="20"
                                                  value="<?php echo $name ?>" maxlength="20"></td>
                    </tr>
                    <tr>
                        <td class="td_l_r title"><?php echo isset($value['bt_sex']) ? '<font color="#FF0000">*</font>' : '' ?>
                            性别
                        </td>
                        <td class="td_r_l">
                            <select name="sex" id="Select_Sex">
                                <option value="">请选择</option>
                                <option value="先生" <?php echo $sex == '先生' ? 'selected' : '' ?>>先生</option>
                                <option value="女士" <?php echo $sex == '女士' ? 'selected' : '' ?>>女士</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td class="td_l_r title"><?php echo isset($value['bt_job']) ? '<font color="#FF0000">*</font>' : '' ?>
                            任务链接
                        </td>
                        <td class="td_r_l"><select name="job" id="Select_job">
                                <option value="">请选择</option>
                                <?php foreach ($select_job as $arr => $row) { ?>
                                    <option value="<?php echo $row['name'] ?>" <?php echo $row['name'] == $job ? 'selected' : '' ?>><?php echo $row['name'] ?></option>
                                <?php } ?>
                            </select></td>
                    </tr>
                    <tr>
                        <td class="td_l_r title">
                            <?php echo isset($value['bt_mobile']) ? '<font color="#FF0000">*</font>' : '' ?>
                            合作站点
                        </td>
                        <td class="td_r_l"><input name="Mobile" type="text" class="int" id="lMobile" size="20"
                                                  value="<?php echo $mobile ?>"/></td>
                    </tr>
                    <tr>
                        <td class="td_l_r title"><?php echo isset($value['bt_weixin']) ? '<font color="#FF0000">*</font>' : '' ?>
                            微信
                        </td>
                        <td class="td_r_l"><input name="weixin" type="text" class="int" id="lweixin" size="20"
                                                  value="<?php echo $weixin ?>"/></td>
                    </tr>
                    <tr>
                        <td class="td_l_r title"><?php echo isset($value['bt_qq']) ? '<font color="#FF0000">*</font>' : '' ?>
                            QQ
                        </td>
                        <td class="td_r_l"><input name="QQ" type="text" class="int" id="lQQ" size="20"
                                                  value="<?php echo $qq ?>"/></td>
                    </tr>
                    <tr>
                        <td class="td_l_r title"><?php echo isset($value['bt_email']) ? '<font color="#FF0000">*</font>' : '' ?>
                            电子邮件
                        </td>
                        <td class="td_r_l"><input name="Email" type="text" class="int" id="lEmail" size="20"
                                                  value="<?php echo $email ?>"></td>
                    </tr>
                    <tr>
                        <td class="td_l_r title"><?php echo isset($value['bt_birthda']) ? '<font color="#FF0000">*</font>' : '' ?>
                            生日
                        </td>
                        <td class="td_r_l"><input name="Birthday" type="text" id="lBirthday" class="int Wdate" size="20"
                                                  onFocus="WdatePicker({dateFmt:'yyyy-MM-dd'})"
                                                  value="<?php echo $birthday ?>"/></td>
                    </tr>
                    <tr>
                        <td class="td_l_r title"><?php echo isset($value['bt_content']) ? '<font color="#FF0000">*</font>' : '' ?>
                            备注说明
                        </td>
                        <td class="td_r_l" style="padding:5px 10px;"><textarea name="Content" rows="4" id="lContent"
                                                                               class="int"
                                                                               style="height:50px;width:98%;"><?php echo $content ?></textarea>
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

                    <input type="submit" class="btn2 btnbaoc" value="保存">
                    <input name="Back" type="button" id="Back" class="btn2 btnguanb" value="关闭"
                           onClick="art.dialog.close();"></td>
            </tr>
        </table>


    </div>
</form>

<script src="<?php echo base_url() ?>theme/default/WdatePicker.js"></script>
</body>
</html>
