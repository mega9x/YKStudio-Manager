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
    <script language="JavaScript">
        <!--
        function CheckAll(form) {
            for (var i = 0; i < form.elements.length; i++) {
                var e = form.elements[i];
                if (e.name != 'chkall') e.checked = form.chkall.checked;
            }
        }

        -->
    </script>
</head>
<body style="padding-bottom:50px;">
<span class="MenuboxS">
 <ul>
 <li class="hover" id="CheckB"><span><a href="?otype=Main">文件列表</a></span></li>
 <li class="" id="CheckC"><span><a href="#" onclick='Add()'>上传文件</a></span></li>
 </ul>
</span>
<script>function Add() {
        $.dialog.open('<?php echo site_url('files/add')?>', {title: '新增', width: 500, height: 280, fixed: true});
    };</script>

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

                                            <select name="isshare" class="int">
                                                <option value="">是否共享</option>
                                                <option value="2" <?php echo $isshare == 2 ? 'selected' : '' ?>>是
                                                </option>
                                                <option value="1" <?php echo $isshare == 1 ? 'selected' : '' ?>>否
                                                </option>
                                            </select>

                                            <select name="class" id="Select_SoftClass">
                                                <option value="">文件类型</option>
                                                <?php foreach ($select_soft as $arr => $row) { ?>
                                                    <option value="<?php echo $row['name'] ?>" <?php echo $class == $row['name'] ? 'selected' : '' ?>><?php echo $row['name'] ?></option>
                                                <?php } ?>
                                            </select>


                                            <select name='adduser' class='int'>
                                                <option value="">业务员</option>
                                                <?php foreach ($select_user as $arr => $row) { ?>
                                                    <option value="<?php echo $row['name'] ?>" <?php echo $row['name'] == $adduser ? 'selected' : '' ?>><?php echo $row['name'] ?></option>
                                                <?php } ?>
                                            </select>


                                            <input type="submit" name="Submit" id="ss_button" class="btn1 btnxiug"
                                                   value="搜索"/>
                                            <input type="button" class="btn1 btnxiug" value="清空条件"
                                                   onClick=window.location.href="?"/>

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

<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td valign="top" colspan=2 style="padding:5px 10px 0;" class="td_n">
            <form name="Search" action="<?php echo site_url('customer/other') ?>?action=CheckSub&saction=Search&PN=1"
                  method="post">
                <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_1">
                    <tr class="tr_b">
                        <td class="td_l_c"><input name="chkall" type="checkbox" id="chkall"
                                                  onClick="CheckAll(this.form);getBlock('chkall','CheckSub')"
                                                  value="checkbox"></td>
                        <td class="td_l_c">编号</td>
                        <td class="td_l_c">分类</td>
                        <td class="td_l_l">文件名</td>
                        <td class="td_l_c">下载</td>
                        <td class="td_l_c">共享</td>
                        <td class="td_l_c">发布人</td>
                        <td class="td_l_c">时间</td>
                        <td class="td_l_c">管理</td>
                    </tr>


                    <?php foreach ($list as $arr => $row) { ?>
                        <tr class="tr">
                            <td class="td_l_c"><input type="checkbox" name="sId" id="sId<?php echo $row['id'] ?>"
                                                      value="<?php echo $row['id'] ?>"
                                                      onClick="getBlock('sId<?php echo $row['id'] ?>','CheckSub'
)"></td>
                            <td class="td_l_c"><?php echo $row['id'] ?></td>
                            <td class="td_l_c"><?php echo $row['class'] ?></td>
                            <td class="td_l_l"><?php echo $row['title'] ?></td>

                            <td class="td_l_c"><a
                                        href="<?php echo site_url('files/down') ?>?id=<?php echo $row['id'] ?>">下载</a>
                            </td>

                            <td class="td_l_c"><a
                                        href="<?php echo site_url('files/share') ?>?id=<?php echo $row['id'] ?>&isshare=<?php echo $row['isshare'] == 1 ? 2 : 1 ?>&PN=0"
                                        style="color:#f00;"><img
                                            src="<?php echo base_url() ?>theme/default/images/ico/<?php echo $row['isshare'] == 1 ? 'yes' : 'no' ?>.gif"
                                            border=0></a></td>
                            <td class="td_l_c"><?php echo $row['adduser'] ?></td>
                            <td class="td_l_c"><?php echo $row['addtime'] ?></td>

                            <td class="td_l_c"><input type="button" class="btn1 btnxiug" value="修改" title="修改"
                                                      onclick='Edit<?php echo $row['id'] ?>()'/>
                                <input type="button" class="btn1 btnshanc" value="删除" title="删除"
                                       onclick='Del<?php echo $row['id'] ?>()'/></td>

                        </tr>
                        <script>function Edit<?php echo $row['id']?>() {
                                $.dialog.open('<?php echo site_url('files/edit')?>?id=<?php echo $row['id']?>', {
                                    title: '查看',
                                    width: 500,
                                    height: 280,
                                    fixed: true
                                });
                            };</script>
                        <script>function Del<?php echo $row['id']?>() //彻底删除
                            {
                                art.dialog({
                                    content: '是否确定删除？',
                                    icon: 'warning',
                                    ok: function () {
                                        art.dialog.open('<?php echo site_url('files/del')?>?id=<?php echo $row['id']?>');
                                        art.dialog.close();
                                    },
                                    cancelVal: '关闭',
                                    cancel: true
                                });
                            };
                        </script>
                    <?php } ?>


                </table>
            </form>
        </td>
    </tr>
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
<script language="JavaScript">
    <!--
    for (var i = 0; i < document.getElementById('sShare').options.length; i++) {
        if (document.getElementById('sShare').options[i].value == "") {
            document.getElementById('sShare').options[i].selected = true;
        }
    }
    -->
</script>

</table>
</body>
</html>

<script src="<?php echo base_url() ?>theme/default/WdatePicker.js"></script>


