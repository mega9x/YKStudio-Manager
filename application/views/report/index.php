<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="<?php echo base_url() ?>theme/default/css/common.css" rel="stylesheet" type="text/css">
    <script src="<?php echo base_url() ?>theme/default/js/Common.js" type="text/javascript"></script>
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/jquery.min.js"></script>
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/tips.js"></script>
    <script src="<?php echo base_url() ?>theme/default/js/jquery.artDialog.js?skin=default"></script>
    <script src="<?php echo base_url() ?>theme/default/js/iframeTools.js"></script>
</head>
<body>
<span class="MenuboxS">
 <ul>
 <li <?php echo $oclass == '' && $oIsread == '' ? 'class="hover"' : '' ?>><span><a
                 href="?action=main">全部</a></span></li>
 <li <?php echo $oIsread == 1 ? 'class="hover"' : '' ?> ><span><a href="?action=main&oType=B&oIsread=1">未读</a></span></li>
 <li <?php echo $oclass == '日报' ? 'class="hover"' : '' ?> ><span><a
                 href="?action=main&oType=C&oclass=日报">日报</a></span></li>
 <li <?php echo $oclass == '周报' ? 'class="hover"' : '' ?> ><span><a
                 href="?action=main&oType=D&oclass=周报">周报</a></span></li>
 <li <?php echo $oclass == '月报' ? 'class="hover"' : '' ?> ><span><a
                 href="?action=main&oType=E&oclass=月报">月报</a></span></li>
 <li <?php echo $oclass == '季报' ? 'class="hover"' : '' ?> ><span><a
                 href="?action=main&oType=F&oclass=季报">季报</a></span></li>
 <li <?php echo $oclass == '年报' ? 'class="hover"' : '' ?> ><span><a
                 href="?action=main&oType=G&oclass=年报">年报</a></span></li>
 
 <li><span><a href="#" onclick='Report_Add()'>写报告</a></span></li>
 
 </ul>
</span>
<script>function Report_Add() {
        $.dialog.open('<?php echo site_url('report/add')?>', {title: '写报告', width: 1000, height: 550, fixed: true});
    };</script>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td valign="top" class="td_n">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td valign="top" colspan=2 style="padding:10px 10px 0;" class="td_n">
                        <table width="100%" border="0"
                               cellpadding="0" cellspacing="0" class="table_1">
                            <tr class="tr_t">
                                <td class="td_l_l" COLSPAN=6><B>报告列表</B></td>
                            </tr>
                            <tr class="tr_b">
                                <td width="80" class="td_l_c">阅读</td>
                                <td width="100" class="td_l_c">分类</td>
                                <td class="td_l_l">标题</td>
                                <td width="100" class="td_l_c">提交人</td>
                                <td width="150" class="td_l_c">时间</td>
                                <td width="100" class="td_l_c">管理</td>
                            </tr>

                            <?php
                            if (count($list) > 0) {
                            foreach ($list as $arr => $row) {
                                ?>
                                <tr class="tr">
                                    <td class="td_l_c"><img
                                                src="<?php echo base_url() ?>theme/default/images/ico/message_<?php echo $row['isread'] == 2 ? 'old' : 'new' ?>.png">
                                    </td>
                                    <td class="td_l_c"><a
                                                href="?action=main&oClass=<?php echo $row['class'] ?>"><?php echo $row['class'] ?></a>
                                    </td>
                                    <td class="td_l_l"><a
                                                onclick='Report_InfoView<?php echo $row['id'] ?>()'><?php echo $row['user'] ?>
                                            的工作日报</a></td>
                                    <td class="td_l_c"><?php echo $row['user'] ?></td>
                                    <td class="td_l_c"><?php echo $row['ctime'] ?></td>
                                    <td class="td_l_c">
                                        <?php if ($row['isread'] == 1) { ?>
                                            <?php if ($this->common_model->check_lever(66)) { ?>
                                                <input type="button" class="btn1 btnxiug" value="批注" title="批注"
                                                       onclick='Report_InfoViews<?php echo $row['id'] ?>()'/>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <?php if ($this->common_model->check_lever(64)) { ?>
                                                <input type="button" class="button_info_view" value="查看" title="批注"
                                                       onclick='Report_InfoView<?php echo $row['id'] ?>()'/>
                                            <?php } ?>
                                        <?php } ?>
                                        <?php if ($this->common_model->check_lever(67)) { ?>
                                            <input type="button" class="btn1 btnshanc" value="删除" title="删除"
                                                   onclick='Report_InfoDel<?php echo $row['id'] ?>()'/>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php if ($this->common_model->check_lever(64)){ ?>
                                <script>function Report_InfoView<?php echo $row['id']?>() {
                                        $.dialog.open('<?php echo site_url('report/edit')?>?id=<?php echo $row['id']?>', {
                                            title: '查看报告',
                                            width: 1000,
                                            height: 500,
                                            fixed: true
                                        });
                                    };</script>
                            <?php } ?>
                            <?php if ($this->common_model->check_lever(66)){ ?>
                                <script>function Report_InfoViews<?php echo $row['id']?>() {
                                        $.dialog.open('<?php echo site_url('report/edit')?>?id=<?php echo $row['id']?>', {
                                            title: '查看报告',
                                            width: 1000,
                                            height: 500,
                                            fixed: true
                                        });
                                    };</script>
                            <?php } ?>
                                <script>function Report_InfoDel<?php echo $row['id']?>() {
                                        art.dialog({
                                            content: '是否确定删除？',
                                            icon: 'error',
                                            ok: function () {
                                                art.dialog.open('<?php echo site_url('report/del')?>?id=<?php echo $row['id']?>');
                                                art.dialog.close();
                                            },
                                            cancelVal: '关闭',
                                            cancel: true
                                        });
                                    };
                                </script>

                            <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td class="td_l_l" colspan=6>抱歉，暂无相关记录！</td>
                                </tr>
                            <?php } ?>


                        </table>
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
                        location.href = "<?php echo site_url('customer')?>?page=" + escape(document.getElementById("geturl").value) + ""
                    }
                }</script>
            <input class="pagenum" id="geturl" value="<?php echo $this->lib_page->nowPage ?>">
            <li class="last"><a href='javascript:void(0);' onclick="getValue(geturl.value)">跳转</a></li>
        </ul>
    </div>

    <!--分页代码结束-->

</div>

</body>
</html>
 