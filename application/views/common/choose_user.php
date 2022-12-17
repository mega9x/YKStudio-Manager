<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="<?php echo base_url() ?>theme/default/css/common.css?12" rel="stylesheet" type="text/css">
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/Common.js?12"></script>
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/jquery.min.js"></script>
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/tips.js"></script>
    <script src="<?php echo base_url() ?>theme/default/js/jquery.artDialog.js?skin=default"></script>
    <script src="<?php echo base_url() ?>theme/default/js/iframeTools.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>theme/editor/themes/default/default.css"/>
    <script src="<?php echo base_url() ?>theme/editor/kindeditor.js" charset="utf-8"></script>
    <script src="<?php echo base_url() ?>theme/editor/lang/zh_CN.js" charset="utf-8"></script>
    <!--选项按钮美化-->
    <link rel="stylesheet" href="<?php echo base_url() ?>theme/default/css/jquery-labelauty.css"/>
</head>
<body>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td valign="top" class="td_n pdl10 pdr10 pdt10">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1">
                <col width="100"/>
                <tr class="tr_t">
                    <td class="td_l_l" COLSPAN="2">选择收件人</td>
                </tr>

                <?php foreach ($group as $arr => $row) { ?>
                    <tr>
                        <td class="td_l_r title"><?php echo $row['name'] ?></td>
                        <td class="td_l_l">
                            <?php
                            foreach ($user as $arr1 => $row1) {
                                if ($row1['groupid'] == $row['id']) {
                                    ?>
                                    <input type="checkbox" name="Receive" onClick="Choose()"
                                           value='<?php echo $row1['name'] ?>'
                                           data-labelauty="<?php echo $row1['name'] ?>">
                                <?php }
                            } ?>
                        </td>
                    </tr>
                <?php } ?>

            </table>
        </td>
    </tr>
    <tr>
        <td valign="top" class="td_n pdl10 pdr10 pdb10">
            <div style="float:left;padding:10px 0;">
                <input type="hidden" id="sReceiver" value="">
                <input type="button" name="button" class="btn2 btnbaoc"
                       onClick="javascript:$.dialog.open.origin.$('#oReceiver').val(document.getElementById('sReceiver').value);art.dialog.close();"
                       value="确认选择">
                <input name="Back" type="button" id="Back" class="btn2 btnguanb" value="关闭"
                       onClick="art.dialog.close();">
            </div>
        </td>
    </tr>
</table>
<script LANGUAGE="Javascript">
    eval(function (p, a, c, k, e, r) {
        e = String;
        if ('0'.replace(0, e) == 0) {
            while (c--) r[e(c)] = k[c];
            k = [function (e) {
                return
                r[e] || e
            }];
            e = function () {
                return '[24-7]'
            };
            c = 1
        }
        ;
        while (c--) if (k[c]) p = p.replace(new RegExp('\\b' + e(c) + '\\b'
            , 'g'), k[c]);
        return p
    }('function Choose(){4 s=5.getElementsByName("Receive");4 2="";for(4 i=0;i<s.6;i++)
    {
        if (s[i].checked) {
            2 = 2 + s[i]
            .7 +\',\'}}2=2.substr(0,2.6-1);5.getElementById("sReceiver").7=2}', [], 8, '
            || s2 ||
            var |
            document | length | value
            '.split(' | '),0,{}))
</script>

<script src="<?php echo base_url() ?>theme/default/WdatePicker.js"></script>
<!--选项按钮美化-->
<script type="text/javascript" src="<?php echo base_url() ?>theme/default/js/jquery-labelauty.js"></script>
<script type="text/javascript">
    $(function () {
        $(':input').labelauty();
    });
</script>
</body>
</html>
 