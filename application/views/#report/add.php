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


<script language="JavaScript">
    <!--
    必填项提示

    function CheckInput() {
        if (document.getElementById('oReport').value == "") {
            art.dialog({
                title: 'Error', time: 1, icon: 'warning'
                , content: '工作总结不能为空！'
            });
            document.getElementById('oReport').focus();
            return false;
        }
        if (document.getElementById('oFujian').value == "") {
            art.dialog({
                title: 'Error', time: 1, icon: 'warning'
                , content: '附件不能为空！'
            });
            document.getElementById('oFujian').focus();
            return false;
        }
    }

    -->
</script>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <form name="Save" action="<?php echo site_url('report/add') ?>" enctype="multipart/form-data" method="post"
          onSubmit="javascript:document.getElementById('oReport').value = editor.html();">

        <tr>
            <td valign="top" class="td_n pdl10 pdr10 pdt10">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1">
                    <tr class="tr_t">
                        <td class="td_l_l" COLSPAN="2"><B></B></td>
                    </tr>
                    <!-- <tr>
                     <td class="td_l_r title" width="100">选择对象</td>
                     <td class="td_r_l">
                     <input type="checkbox" name="sendname" value="管理员"  data-labelauty="管理员"></td>
                     </tr>-->
                    <tr>
                        <td class="td_l_r title" width="100">分类</td>
                        <td class="td_r_l">

                            <input name="class" type="radio" class="noborder" value="日报" data-labelauty="日报"
                                   checked>
                            <input name="class" type="radio" class="noborder" value="周报" data-labelauty="周报">
                            <input name="class" type="radio" class="noborder" value="月报" data-labelauty="月报">
                            <input name="class" type="radio" class="noborder" value="季报" data-labelauty="季报">
                            <input name="class" type="radio" class="noborder" value="年报" data-labelauty="年报">
                            　
                        </td>
                    </tr>
                    <tr>
                        <td class="td_l_r title">工作总结</td>
                        <td class="td_r_l" style="padding:10px;">

                            <!-- 加载编辑器的容器 -->
                            <script>
                                KindEditor.ready(function (K) {
                                    var editor = K.editor({
                                        uploadJson: '<?php echo site_url('common/upload')?>',
                                        fileManagerJson: '<?php echo site_url('common/upload_manage')?>',
                                        allowFileManager: true
                                    });
                                    window.editor = K.create('#oReport');
                                });
                            </script>
                            <textarea name="report" id="oReport" style="width:100%;height:400px;"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="td_l_r title">附件</td>
                        <td class="td_r_l" style="padding:10px;">
                            <input name="file" type="file" id="fFile" value="" class="int">
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
            <td valign="top" class="td_n Bottom_pd "><span class="r" style="line-height:30px;color:#f00;">★ 提交后无法修改，请认真填写！</span>
                <input type="submit" class="btn2 btnbaoc" value="保存">
                <input name="Back" type="button" id="Back" class="btn2 btnguanb" value="关闭"
                       onClick="art.dialog.close();"></td>
        </tr>
    </table>
</div>
</form>

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

