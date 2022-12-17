<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="<?php echo base_url() ?>theme/default/css/common.css" rel="stylesheet" type="text/css">
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/Ajax.js"></script>
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/Common.js"></script>
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/jquery.min.js"></script>
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/tips.js"></script>
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/Float.js"></script>
    <script src="<?php echo base_url() ?>theme/default/js/jquery.artDialog.js?skin=default"></script>
    <script src="<?php echo base_url() ?>theme/default/js/iframeTools.js"></script>
    <script src="<?php echo base_url() ?>theme/default/js/jquery.artDialog.js?skin=default"></script>
    <script src="<?php echo base_url() ?>theme/default/js/iframeTools.js"></script>
    <link href="<?php echo base_url() ?>theme/default/css/jquery.vtip.css" rel="stylesheet" type="text/css">
    <script src="<?php echo base_url() ?>theme/default/js/jquery.vtip.js"></script>

    <script language="JavaScript">

        <!--
function CheckAll(form) {
    for (var i = 0; i < form.elements.length; i++) {
        var e = form.elements[i];
        if (e.name != 'chkall')
            e.checked = form.chkall.checked;
    }
}
    </script>
</head>
<body style="padding-bottom:50px;">

<span class="MenuboxS">
 <ul>
 <li <?php echo $timetype == '' ? 'class="hover"' : '' ?> id="CheckB"><span><a href="?otype=Main">已删除列表</a></span></li>
 <li <?php echo $timetype == 'd' ? 'class="hover"' : '' ?> id="CheckF"><span><a
                 href="?otype=timetype&timetype=d">今日删除</a></span></li>
 <li <?php echo $timetype == 'w' ? 'class="hover"' : '' ?> id="CheckG"><span><a
                 href="?otype=timetype&timetype=w">近7天删除</a></span></li>
 <li <?php echo $timetype == 'm' ? 'class="hover"' : '' ?> id="CheckH"><span><a
                 href="?otype=timetype&timetype=m">本月删除</a></span></li>
 </ul>
</span>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td valign="top" class="td_n">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#ffffff;">
                <tr>
                    <td valign="top" class="td_n pdl10 pdr10 pdt10">
                        <div id="ss" style="height:37px;overflow:hidden; ">
                            <form name="searchForm" action="?saction=ssdetail" method="post">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_1">

                                    <tr>
                                        <td class="td_l_r title">关键字</td>
                                        <td class="td_r_l">


                                            <input name="keyword" type="text" class="int" id="keyword" size="20"
                                                   value="<?php echo $keyword ?>" onkeyup="searchSuggest();"/>
                                            <span id="ss_suggest" style="display:none;"></span>日期
                                            <input name="sttdate" type="text" maxlength="10" id="TimeBegin"
                                                   class="int Wdate" size="10" onfocus="WdatePicker()"
                                                   value="<?php echo $sttdate ?>"/>
                                            ~
                                            <input name="enddate" type="text" maxlength="10" id="TimeEnd"
                                                   class="int Wdate" size="10" onfocus="WdatePicker()"
                                                   value="<?php echo $enddate ?>"/>

                                            <select name="type" id="Select_Type">
                                                <option value="">转化情况</option>
                                                <?php foreach ($select_type as $arr => $row) { ?>
                                                    <option value="<?php echo $row['name'] ?>" <?php echo $row['name'] == $type ? 'selected' : '' ?>><?php echo $row['name'] ?></option>
                                                <?php } ?>
                                            </select>
                                            <select name="start" id="Select_Star">
                                                <option value="">流量状况</option>
                                                <?php foreach ($select_star as $arr => $row) { ?>
                                                    <option value="<?php echo $row['name'] ?>" <?php echo $row['name'] == $start ? 'selected' : '' ?>><?php echo $row['name'] ?></option>
                                                <?php } ?>
                                            </select>

                                            <select name="source" id="Select_source">
                                                <option value="">所属联盟</option>
                                                <?php foreach ($select_source as $arr => $row) { ?>
                                                    <option value="<?php echo $row['name'] ?>" <?php echo $row['name'] == $source ? 'selected' : '' ?>><?php echo $row['name'] ?></option>
                                                <?php } ?>
                                            </select>

                                            <select name='adduser' class='int'>
                                                <option value="">业务员</option>
                                                <?php foreach ($select_user as $arr => $row) { ?>
                                                    <option value="<?php echo $row['name'] ?>" <?php echo $row['name'] == $adduser ? 'selected' : '' ?>><?php echo $row['name'] ?></option>
                                                <?php } ?>
                                            </select>


                                            所在地区

                                            <input name="area1" type="text" class="int" id="area_name1" value=""
                                                   size="15" readonly onclick='choose_area1()'>

                                            <script>function choose_area1() {
                                                    $.dialog.open('<?php echo site_url('common/choose_area1')?>', {
                                                        title: '选择国家',
                                                        width: 700,
                                                        height: 520,
                                                        fixed: true
                                                    });
                                                };</script>

                                            <input name="area2" type="text" class="int" id="area_name2" value=""
                                                   size="15" readonly onclick='choose_area2()'>

                                            <script>function choose_area2() {
                                                    $.dialog.open('<?php echo site_url('common/choose_area2')?>', {
                                                        title: '选择市',
                                                        width: 700,
                                                        height: 520,
                                                        fixed: true
                                                    });
                                                };</script>


                                            <input type="submit" name="Submit" id="ss_button" class="btn1 btnxiug"
                                                   value="搜索"/>
                                            <input type="button" class="btn1 btnxiug" value="清空条件"
                                                   onClick=window.location.href="?"/>
                                            <input type="button" class="btn1 btnxiug" value="导出"
                                                   onClick=window.location.href="<?php echo site_url('customer/excel') ?>?<?php echo $parameter ?>"/>
                                        </td>

                                    </tr>
                                </table>
                            </form>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_1">
    <tr class="tr_b">

        <td width="40" class="td_l_c">
            <input name="chkall" type="checkbox" id="chkall" onClick="CheckAll(this.form);getBlock('chkall','CheckSub')"
                   value="checkbox">

        </td>
        <td width="80" class="td_l_c">编号</td>
        <td class="td_l_l">任务名称</td>
        <td width="80" class="td_l_c">删除时间</td>
        <td width="100" class="td_l_c">业务员</td>
        <td width="100" class="td_l_c">管理</td>
    </tr>
    <?php foreach ($list as $arr => $row) { ?>
        <tr class="tr">
            <td class="td_l_c"><input type="checkbox" name="cId[]" id="cId<?php echo $row['id'] ?>"
                                      value="<?php echo $row['id'] ?>"
                                      onClick="getBlock('cId<?php echo $row['id'] ?>','CheckSub')"></td>
            <td class="td_l_c"><?php echo $row['id'] ?></td>
            <td class="td_l_l"><a onclick='Kehu_InfoView<?php echo $row['id'] ?>()'
                                  style="cursor:pointer;"><?php echo $row['name'] ?></a></td>
            <td class="td_l_c">
                <font color=red><?php echo date_maktime($row['deltime']) ?> </font>
            </td>
            <td class="td_l_c"><?php echo $row['adduser'] ?></td>
            <td class="td_l_c">
                <input type="button" class="button_info_restore" value=" " title="撤销删除"
                       onclick='Recycler_InfoReDel<?php echo $row['id'] ?>()'/>
                <input type="button" class="button_info_delete" value=" " title="彻底删除"
                       onclick='Recycler_InfoRealDel<?php echo $row['id'] ?>()'/>
            </td>
        </tr>
        <script>function Kehu_InfoView6() {
                $.dialog.open('<?php echo site_url('customer/infoview')?>?id=<?php echo $row['id']?>', {
                    title: '查看',
                    width: 1220,
                    height: 520,
                    fixed: true
                });
            };</script>
        <script>function Recycler_InfoReDel<?php echo $row['id']?>() //撤销删除
            {
                art.dialog({
                    content: '数据将被还原到原业务员名下，是否确定该操作？',
                    icon: 'face-smile',
                    ok: function () {
                        art.dialog.open('<?php echo site_url('recycle/restore')?>?id=<?php echo $row['id']?>');
                        art.dialog.close();
                    },
                    cancelVal: '关闭',
                    cancel: true
                });
            };
        </script>
        <script>function Recycler_InfoRealDel<?php echo $row['id']?>() //彻底删除
            {
                art.dialog({
                    content: '彻底删除包括：<BR><BR>【任务管理、任务链接、跟单、订单、合同<BR>售后、收支、附件等所有相关记录】<BR><BR>请再次确认是否删除？',
                    icon: 'warning',
                    ok: function () {
                        art.dialog.open('<?php echo site_url('recycle/del')?>?id=<?php echo $row['id']?>');
                        art.dialog.close();
                    },
                    cancelVal: '关闭',
                    cancel: true
                });
            };
        </script>
    <?php } ?>

</table>
<!--
<div class="piliang">

<input type="submit" name="Checkexecute" id="Checkexecute" class="btn1 btnpilsc" onclick='Del()' value="彻底删除">

</div> -->
</form></td>
</tr>
</table></td>
</tr>
</table>
<div class="fixed_bg">
    <!--分页代码开始-->
    <div class="pagepostion">
        <ul class="pagination">
            <?php echo $this->lib_page->showpage() ?>
            <script language='javascript'>function getValue(obj) {
                    if (document.getElementById("geturl").value != "") {
                        location.href = "<?php echo site_url('recycle')?>?page=" + escape(document.getElementById("geturl").value) + ""
                    }
                }</script>
            <input class="pagenum" id="geturl" value="<?php echo $this->lib_page->nowPage ?>">
            <li class="last"><a href='javascript:void(0);' onclick="getValue(geturl.value)">跳转</a></li>
        </ul>
    </div>
    <!--分页代码结束-->

</div>
<script language="JavaScript">
    <!--
    for (var i = 0; i < document.getElementById('Area').options.length; i++) {
        if (document.getElementById('Area').options[i].value == "") {
            document.getElementById('Area').options[i].selected = true;
        }
    }
    for (var i = 0; i < document.getElementById('Squares').options.length; i++) {
        if (document.getElementById('Squares').options[i].value == "") {
            document.getElementById('Squares').options[i].selected = true;
        }
    }
    -->
</script>

<script src="<?php echo base_url() ?>theme/default/WdatePicker.js"></script>
</body>
</html>


 