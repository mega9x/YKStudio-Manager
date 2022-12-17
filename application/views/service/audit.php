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


<script>
    function Setdisabled(evt) {
        var evt = evt || window.event;
        var e = evt.srcElement || evt.target;
        if (e.value == "1") {
            document.all.sInfo.disabled = false;
            document.all.sInfo.readOnly = false;
            document.all.sEDate.disabled = false;
            document.all.sEDate.readOnly = false;
            document.all.sEDate.classname = "Wdate int";
            document.all.sEDate.value = "2016-08-18";
        } else {
            document.all.sInfo.disabled = true;
            document.all.sInfo.readOnly = true;
            document.all.sEDate.disabled = true;
            document.all.sEDate.readOnly = true;
            document.all.sEDate.classname = "";
            document.all.sEDate.value = "";
        }
    }
</script>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <form name="Save" action="<?php echo site_url('service/audit') ?>?id=<?php echo $id ?>" method="post"
          onSubmit="return CheckInput();">

        <tr>
            <td valign="top" class="td_n pdl10 pdr10 pdt10">
                <table width="100%" border="0" cellspacing="0" cellpadding
                ="0" CLASS="table_1">
                    <col width="120"/>
                    <col/>
                    <col width="120"/>
                    <tr class="tr_t">
                        <td class="td_l_l" COLSPAN="2"><B>售后处理结果</B></td>
                    </tr>
                    <tr>
                        <td class="td_l_r title">相关产品</td>
                        <td class="td_r_l"></td>
                    </tr>
                    <tr>
                        <td class="td_l_r title">反馈主题</td>
                        <td class="td_r_l"><?php echo $title ?></td>
                    </tr>
                    <tr>
                        <td class="td_l_r title">反馈分类</td>
                        <td class="td_r_l"><?php echo $type ?></td>
                    </tr>
                    <tr>
                        <td class="td_l_r title">任务链接</td>
                        <td class="td_r_l"><?php echo $linkman ?></td>
                    </tr>
                    <tr>
                        <td class="td_l_r title">反馈日期</td>
                        <td class="td_r_l"><?php echo $sdate ?></td>
                    </tr>
                    <tr>
                        <td class="td_l_r title">详情备注</td>
                        <td class="td_r_l" style="height:65px;"><?php echo $content ?></td>
                    </tr>
                    <tr>
                        <td class="td_l_r title">是否解决</td>
                        <td class="td_r_l">

                            <input name="issolve" type="radio" value="2" <?php echo $issolve == 2 ? 'checked' : '' ?>
                                   onClick="Setdisabled()">
                            未解决
                            　
                            <input name="issolve" type="radio" value="1" <?php echo $issolve == 1 ? 'checked' : '' ?>
                                   onClick="Setdisabled()">
                            已解决
                        </td>
                    </tr>
                    <tr>
                        <td class="td_l_r title">结束日期</td>
                        <td class="td_r_l"><input name="edate" type="text" id="sEDate" class="int" size="15"
                                                  onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})"
                                                  value="<?php echo $edate ?>"/></td>
                    </tr>
                    <tr>
                        <td class="td_l_r title">处理结果</td>
                        <td class="td_r_l" style="padding:5px 10px;">
                            <textarea name="info" rows="4" id="sInfo" class="int"
                                      style="height:50px;width:98%;"><?php echo $info ?></textarea></td>
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
