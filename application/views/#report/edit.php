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
    <link rel="stylesheet" href="<?php echo base_url() ?>theme/editor/themes/default/default.css"/>
    <script src="<?php echo base_url() ?>theme/editor/kindeditor.js" charset="utf-8"></script>
    <script src="<?php echo base_url() ?>theme/editor/lang/zh_CN.js" charset="utf-8"></script>
    <!--选项按钮美化-->
    <link rel="stylesheet" href="<?php echo base_url() ?>theme/default/css/jquery-labelauty.css"/>
</head>
<body>

<style>
    body {
        padding: 0 0 55px 0;
    }
</style>
<form name="Save" action="<?php echo site_url('report/edit') ?>?id=<?php echo $id ?>" enctype="multipart/form-data"
      method="post" onSubmit="javascript:document.getElementById('oReport').value = editor.html();">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td valign="top" class="td_n pdl10 pdr10 pdt10">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1">
                    <col width="100"/>
                    <tr class="tr_t">
                        <td class="td_l_l" style="border-right:0;"><B> </B></td>
                        <td class="td_l_r"><?php echo $ctime ?></td>
                    </tr>
                    <tr>
                        <td class="td_l_r title" width="100">工作总结</td>
                        <td class="td_r_l" style="padding:5px 10px;"><?php echo $report ?></td>
                    </tr>
                    <tr>
                        <td class="td_l_r title">附件</td>
                        <td class="td_r_l" style="padding:5px 10px;">
                            <?php echo $title ?> <a href="<?php echo site_url('report/down') ?>?id=<?php echo $id ?>">[下载附件]</a>
                        </td>
                    </tr>

                    <tr>
                        <td class="td_l_r title"><font color="#FF0000">*</font> 领导批注</td>
                        <td class="td_r_l" style="padding:10px;">
                            <!-- 加载编辑器的容器 -->
                            <script>
                                KindEditor.ready(function (K) {
                                    window.editor = K.create('#oReply');
                                });
                            </script>
                            <textarea name="Reply" id="oReply"
                                      style="width:100%;height:400px;"><?php echo $reply ?></textarea>
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
<script type="text/javascript" defer>
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