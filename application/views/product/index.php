<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>商品进销存</title>
    <link href="<?php echo base_url() ?>theme/default/css/common.css" rel="stylesheet" type="text/css">
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/Common.js"></script>
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/jquery.min.js"></script>
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/tips.js"></script>
    <script src="<?php echo base_url() ?>theme/default/js/jquery.artDialog.js?skin=default"></script>
    <script src="<?php echo base_url() ?>theme/default/js/iframeTools.js"></script>
    <script src="<?php echo base_url() ?>theme/default/js/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>theme/default/css/sweetalert.css">
    <!--必要样式-->
    <link rel="stylesheet" href="<?php echo base_url() ?>theme/default/css/jquery-labelauty.css"/>
</head>
<body>
<span class="MenuboxS">
 <ul>
 <li class="hover"><span><a href="">产品列表</a></span></li>
 <li><span><a href="#" onclick='cp_ClassList()'>分类管理</a></span></li>
 <li><span><a href="#" onclick='Add()'>添加产品</a></span></li>
 </ul>
 </span>
<script>function cp_ClassList() {
        $.dialog.open('<?php echo site_url('product/classlist')?>', {
            title: '分类管理',
            width: 600,
            height: 450,
            fixed: true
        });
    };</script>
<script>function Add() {
        $.dialog.open('<?php echo site_url('product/add')?>', {
            title: '添加产品',
            width: 600,
            height: 400,
            fixed: true
        });
    };</script>


<div class="allpage">

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
            <td valign="top" class="td_n pd10">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td valign="top" colspan=2 class="td_n">
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_1">
                                <tr class="tr_t">
                                    <td class="td_l_c">商品大类</td>
                                    <td class="td_l_c">商品小类</td>
                                    <td class="td_l_l">产品名称</td>
                                    <td class="td_l_c">规格</td>
                                    <td class="td_l_c">型号</td>
                                    <td width="100" class="td_l_c">商品库存</td>
                                    <td width="100" class="td_l_c">库存状态</td>
                                    <td class="td_l_c">成本单价</td>
                                    <td class="td_l_c">销售单价</td>
                                    <td class="td_l_c">管理</td>
                                </tr>
                                <?php foreach ($list as $arr => $row) { ?>
                                    <Tr class="tr">
                                        <td class="td_l_c"><?php echo $row['trade'] ?></td>
                                        <td class="td_l_c"><?php echo $row['strade'] ?></td>
                                        <td class="td_l_l"><?php echo $row['title'] ?></td>
                                        <td class="td_l_c"><?php echo $row['property1'] ?></td>
                                        <td class="td_l_c"><?php echo $row['property2'] ?></td>
                                        <td class="td_l_c"><?php echo $row['qtys'] ?></td>
                                        <td class="td_l_c">
                                            <?php
                                            if ($row['qtys'] < $row['minqty'])
                                                echo '库存不足'
                                            ?>
                                            <?php
                                            if ($row['qtys'] >= $row['minqty'])
                                                echo '库存正常'
                                            ?>
                                        <td class="td_l_c"><?php echo $row['purprice'] ?></td>
                                        <td class="td_l_c"><?php echo $row['saleprice'] ?></td>
                                        <td class="td_l_c" nowrap="nowrap">
                                            <input type="button" class="btn1 btnxiug" value="修改" title="修改"
                                                   onclick='Edit<?php echo $row['id'] ?>()'/>
                                            <input type="button" class="btn1 btnshanc" value="删除" title="删除"
                                                   onclick='Del<?php echo $row['id'] ?>()'/>
                                        </td>
                                    </TR>
                                    <script>function Edit<?php echo $row['id']?>() {
                                            $.dialog.open('<?php echo site_url('product/edit')?>?id=<?php echo $row['id']?>', {
                                                title: '编辑产品',
                                                width: 600,
                                                height: 400,
                                                fixed: true
                                            });
                                        };</script>
                                    <script>function Del<?php echo $row['id']?>() {
                                            $.dialog({
                                                content: '是否确定删除？', icon: 'error', ok: function () {
                                                    art.dialog.open('<?php echo site_url('product/del')?>?id=<?php echo $row['id']?>', {
                                                        title: '删除原因',
                                                        width: 400,
                                                        height: 150,
                                                        fixed: true
                                                    });
                                                    return false;
                                                }, cancel: true
                                            });
                                        };</script>

                                <?php } ?>

                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <div class="fixed_bg">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td valign="top" class="td_n Bottom_pd ">

                    <div class="pagepostion">
                        <ul class="pagination">
                            <?php echo $this->lib_page->showpage() ?>
                            <script language='javascript'>function getValue(obj) {
                                    if (document.getElementById("geturl").value != "") {
                                        location.href = "?page=" + escape(document.getElementById("geturl").value) + ""
                                    }
                                }</script>
                            <input class="pagenum" id="geturl" value="<?php echo $this->lib_page->nowPage ?>">
                            <li class="last"><a href='javascript:void(0);' onclick="getValue(geturl.value)">跳转</a>
                            </li>
                        </ul>
                    </div>

                </td>
            </tr>
        </table>
    </div>


    <script>function Setting_cp() {
            $.dialog.open('save3.asp?action=Setting&sType=Products', {
                title: '用户设置',
                width: 500,
                height: 320,
                fixed: true
            });
        };</script>
</body>
</html>

 