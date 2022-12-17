<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>财务管理</title>
    <link href="<?php echo base_url() ?>theme/default/css/common.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url() ?>theme/default/chosen/chosen.css" rel="stylesheet"/>
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/Ajax.js"></script>
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/Common.js"></script>
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/jquery.min.js"></script>
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/tips.js"></script>
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/Float.js"></script>
    <script src="<?php echo base_url() ?>theme/default/js/jquery.artDialog.js?skin=default"></script>
    <script src="<?php echo base_url() ?>theme/default/js/iframeTools.js"></script>
</head>
<body style="padding-bottom:50px;">
<span class="MenuboxS">
<ul>
 <li <?php echo $timetype == '' ? 'class="hover"' : '' ?> id="CheckB"><span><a href="?">收支列表</a></span></li>
 <li <?php echo $timetype == 'd' ? 'class="hover"' : '' ?> id="CheckF"><span><a
                 href="?timetype=d">今日收支</a></span></li>
 <li <?php echo $timetype == 'w' ? 'class="hover"' : '' ?> id="CheckG"><span><a href="?timetype=w">近7天收支</a></span></li>
 <li <?php echo $timetype == 'm' ? 'class="hover"' : '' ?> id="CheckH"><span><a
                 href="?timetype=m">本月收支</a></span></li>
 <?php if (in_array(50, $lever)) { ?>
     <li class="btn_new"><span><a href="#" onclick='Add_IN()'>新增收入</a></span></li>
     <li class="btn_new2"><span><a href="#" onclick='Add_OUT()'>新增支出</a></span></li>
 <?php } ?>
 <span class="Bottom_pd r">总收入：<?php echo $inmoney['money']; ?>元　 总支出：<?php echo $outmoney['money']; ?>元</span>
</ul>
</span>
<script>function Setting_Expense() {
        $.dialog.open('<?php echo site_url('setting/config')?>?type=financier', {
            title: '新增财务记录',
            width: 600,
            height: 400,
            fixed: true
        });
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

                                            <select name='outin' class="int" onChange="Show();">
                                                <option value="">收入/支出</option>
                                                <option value="1" <?php echo $outin == 1 ? 'selected' : '' ?>>收入
                                                </option>
                                                <option value="2" <?php echo $outin == 2 ? 'selected' : '' ?>>支出
                                                </option>
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
                                            <input type="button" class="btn1 btnxiug" value="导出"
                                                   onClick=window.location.href="<?php echo site_url('financier/excel') ?>?<?php echo $parameter ?>"/>
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
        <td valign="top" colspan=2 style="padding:10px 10px 0;" class="td_n">
            <form name="Search" action="?action=CheckSub&saction=Search&PN=1" method="post">
                <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_1">
                    <tr class="tr_b">
                        <td width="80" class="td_l_c">编号</td>
                        <?php if (isset($value['type'])) { ?>
                            <td class="td_l_c">收支类别</td>
                        <?php } ?>
                        <td class="td_l_l">任务名称</td>
                        <?php if (isset($value['edate'])) { ?>
                            <td class="td_l_c">收支日期</td>
                        <?php } ?>
                        <?php if (isset($value['outin'])) { ?>
                            <td class="td_l_c">收入/支出</td>
                        <?php } ?>
                        <?php if (isset($value['money'])) { ?>
                            <td class="td_l_c">总金额</td>
                        <?php } ?>
                        <?php if (isset($value['content'])) { ?>
                            <td class="td_l_l">详情备注</td>
                        <?php } ?>
                        <?php if (isset($value['adduser'])) { ?>
                            <td class="td_l_c">业务员</td>
                        <?php } ?>
                        <?php if (isset($value['addtime'])) { ?>
                            <td class="td_l_c">录入时间</td>
                        <?php } ?>
                        <td width="100" class="td_l_c">管理</td>
                    </tr>

                    <?php foreach ($list as $arr => $row) { ?>
                        <tr class="tr">
                            <td class="td_l_c"><?php echo $row['id'] ?></td>
                            <?php if (isset($value['type'])) { ?>
                                <td class="td_l_c"><?php echo $row['type'] ?></td>
                            <?php } ?>

                            <td class="td_l_l">
                                <a onclick='Kehu_InfoView<?php echo $row['customerid'] ?>()'
                                   style="cursor:pointer;"><?php echo $row['customername'] ? $row['customername'] : '无公司资料关联' ?></a>
                            </td>

                            <?php if (isset($value['edate'])) { ?>
                                <td class="td_l_c"><?php echo $row['edate'] ?></td>
                            <?php } ?>
                            <?php if (isset($value['outin'])) { ?>
                                <td class="td_l_c"><?php echo $row['outin'] == 1 ? '收入' : '支出' ?></td>
                            <?php } ?>
                            <?php if (isset($value['money'])) { ?>
                                <td class="td_l_c"><?php echo $row['money'] ?></td>
                            <?php } ?>
                            <?php if (isset($value['content'])) { ?>
                                <td class="td_l_l" style="line-height:25px;"><?php echo $row['content'] ?></td>
                            <?php } ?>
                            <?php if (isset($value['adduser'])) { ?>
                                <td class="td_l_c"><?php echo $row['adduser'] ?></td>
                            <?php } ?>
                            <?php if (isset($value['addtime'])) { ?>
                                <td class="td_l_c"><?php echo $row['adddate'] ?></td>
                            <?php } ?>

                            <td class="td_l_c">
                                <?php if (in_array(51, $lever)) { ?>
                                    <input type="button" class="btn1 btnxiug" value="修改" title="修改"
                                           onclick='Edit<?php echo $row['id'] ?>()'/>
                                <?php } ?>
                                <?php if (in_array(52, $lever)) { ?>
                                    <input type="button" class="btn1 btnshanc" value="删除" title="删除"
                                           onclick='Del<?php echo $row['id'] ?>()'/>
                                <?php } ?>
                            </td>
                        </tr>
                        <script>function Kehu_InfoView<?php echo $row['cid']?>() {
                                $.dialog.open('<?php echo site_url('customer/expense')?>?id=<?php echo $row['cid']?>', {
                                    title: '查看',
                                    width: 1220,
                                    height: 520,
                                    fixed: true
                                });
                            };</script>
                        <script>function Edit<?php echo $row['id']?>() {
                                $.dialog.open('<?php echo site_url('financier/edit')?>?id=<?php echo $row['id']?>', {
                                    title: '编辑',
                                    width: 600,
                                    height: 400,
                                    fixed: true
                                });
                            };</script>
                        <script>function Del<?php echo $row['id']?>() {
                                art.dialog({
                                    content: '是否确定删除？', icon: 'error', ok: function () {
                                        art.dialog.open('<?php echo site_url('financier/del')?>?id=<?php echo $row['id']?>', {
                                            title: '删除原因',
                                            width: 400,
                                            height: 150,
                                            fixed: true
                                        });
                                        art.dialog.close();
                                    }, cancelVal: '关闭', cancel: true
                                });
                            };
                        </script>
                    <?php } ?>
                </table>
            </form>
</table>
</td>
</tr>
</table>
<div class="fixed_bg"> <span style="float:left;">
 
 <a class="button_top_set" value="自定义设置" onclick='Setting_Expense()'>自定义设置</a>
 
 </span>

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
<script>function Add_IN() {
        $.dialog.open('<?php echo site_url('financier/add')?>?outin=1', {
            title: '新增收入记录',
            width: 600,
            height: 400,
            fixed: true
        });
    };</script>
<script>function Add_OUT() {
        $.dialog.open('<?php echo site_url('financier/add')?>?outin=2', {
            title: '新增支出记录',
            width: 600,
            height: 400,
            fixed: true
        });
    };</script>
<script src="<?php echo base_url() ?>theme/default/WdatePicker.js"></script>
</body>
</html>

 