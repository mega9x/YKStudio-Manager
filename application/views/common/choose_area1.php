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
    <link href="<?php echo base_url() ?>theme/default/css/jquery.vtip.css" rel="stylesheet" type="text/css">
    <script src="<?php echo base_url() ?>theme/default/js/jquery.vtip.js"></script>
</head>
<body>

<script>function changese(obj) {
        window.location.href = obj.value
    }</script>
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
                    <td class="td_l_c">ID</td>
                    <td class="td_l_c">名称</td>
                    <td class="td_l_c">选择</td>

                </tr>
                <?php foreach ($list as $arr => $row) { ?>
                    <tr class="tr" style="cursor:pointer;">
                        <td class="td_l_c"><?php echo $row['id'] ?></td>
                        <td class="td_l_c"><?php echo $row['name'] ?></td>
                        <td class="td_l_c">
                            <input type="button" class="btn1 btnxiug"
                                   onClick=window.location.href="javascript:$.dialog.open.origin.$('#area_id1').val('<?php echo $row['id'] ?>');$.dialog.open.origin.$('#area_name1').val('<?php echo $row['name'] ?>');$.dialog.open.origin.$('#area_id2').val('');$.dialog.open.origin.$('#area_name2').val('');$.dialog.close();"
                                   value="确定" title="确定"/>


                        </td>


                    </tr>
                <?php } ?>
            </table>
        </td>
    </tr>
</table>
<div class="fixed_bg">
    <!--分页代码开始-->
    <div class="pagepostion">
        <ul class="pagination">
            <?php echo $this->lib_page->showpage() ?>
            <script language='javascript'>function getValue(obj) {
                    if (document.getElementById("geturl").value != "") {
                        location.href = "?page=" + escape(document.getElementById("geturl").value) + ""
                    }
                }</script>
            <input class="pagenum" id="geturl" value="<?php echo $this->lib_page->nowPage ?>">
            <li class="last"><a href='javascript:void(0);' onclick="getValue(geturl.value)">跳转</a></li>
        </ul>
    </div>
    <!--分页代码结束-->

</div>

<script src="<?php echo base_url() ?>theme/default/WdatePicker.js"></script>
</body>
</html>

