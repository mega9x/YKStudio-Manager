<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>任务管理</title>
    <link href="<?php echo base_url() ?>theme/default/css/common.css" rel="stylesheet" type="text/css">
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
 <li <?php echo $timetype == '' ? 'class="hover"' : '' ?> id="CheckB"><span><a
                 href="?otype=Main">客户列表</a></span></li>
 <li <?php echo $timetype == 'd' ? 'class="hover"' : '' ?> id="CheckF"><span><a
                 href="?timetype=d">今日新增</a></span></li>
 <li <?php echo $timetype == 'w' ? 'class="hover"' : '' ?> id="CheckG"><span><a
                 href="?timetype=w">近周新增</a></span></li>
 <li <?php echo $timetype == 'm' ? 'class="hover"' : '' ?> id="CheckH"><span><a
                 href="?timetype=m">本月新增</a></span></li>
</ul>
</span>
<script>function Setting_ListAll() {
        $.dialog.open('save3.asp?action=Setting&sType=ListAll', {
            title: '
            自定义设置', width: 600, height: 330,fixed: true}); };</script>
<script>function Kehu_InfoAdd() {
        $.dialog.open('save1.asp?action=Kehu&sType=Add', {title: '新增客户资料', width
    :
        1000, height
    :
        520, fixed
    :
        true
    })
        ;
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

<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td valign="top" class="td_n pdt10">
            <div class="Findtip">①单击选中客户 >> ②录入信息</div>
        </td>
    </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td valign="top" colspan=2 style="padding:5px 10px 0;" class="td_n">
            <form name="Search" action="?action=CheckSub&saction=Search&PN=1" method="post">
                <div style="border:3px solid red;">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_1">
                        <tr class="tr_b">
                            <td width="40" nowrap="nowrap" class="td_l_c"><input name="chkall" type="checkbox"
                                                                                 id="chkall" onClick
                                                                                 ="CheckAll(this.form);getBlock('chkall','CheckSub')"
                                                                                 value="checkbox"></td>
                            <td width="50" nowrap="nowrap" class="td_l_c">编号</td>

                            <td width="180" nowrap="nowrap" class="td_l_l">任务名称</td>

                            <td width="100" nowrap="nowrap" class="td_l_c">任务要求</td>

                            <td width="80" nowrap="nowrap" class="td_l_c">任务链接</td>

                            <td width="100" nowrap="nowrap" class="td_l_c">合作站点</td>

                            <td width="80" nowrap="nowrap" class="td_l_c">最后更新</td>

                            <td width="100" nowrap="nowrap" class="td_l_c">总金额</td>

                            <td width="100" nowrap="nowrap" class="td_l_c">总欠款</td>

                            <td width="80" nowrap="nowrap" class="td_l_c">售后次数</td>

                            <td width="80" nowrap="nowrap" class="td_l_c">业务员</td>

                        </tr>
                        <?php foreach ($list as $arr => $row) { ?>
                            <tr class="tr"
                                onclick=window.location.href="javascript:$.dialog.open.origin.ChoseOK(<?php echo $row['id'] ?>);$.dialog.close();"
                                style="cursor:pointer;" title="点击选中客户">
                                <td class="td_l_c"><input type="checkbox" name="cId" id="cId<?php echo $row['id'] ?>"
                                                          value="<?php echo $row['id'] ?>"
                                                          onClick="getBlock('cId<?php echo $row['id'] ?>'
,'CheckSub');Bianse('cId<?php echo $row['id'] ?>')"></td>
                                <td class="td_l_c"><?php echo $row['id'] ?></td>

                                <td class="td_l_l"><a class="gongsim" onclick='Kehu_InfoView<?php echo $row['id'] ?>()'
                                                      style="cursor:pointer;"><?php echo $row['name'] ?></a>
                                </td>

                                <td class="td_l_c"><?php echo $row['qq'] ?></td>

                                <td class="td_l_c"><?php echo $row['linkman'] ?></td>

                                <td class="td_l_c"><?php echo $row['mobile'] ?></td>

                                <td class="td_l_c"><font color=red><?php echo date_maktime($row['addtime']) ?> </font>
                                </td>

                                <td class="td_l_c"><font color=red> </font> 元</td>

                                <td class="td_l_c"><font color=red> </font> 元</td>

                                <td class="td_l_c"><font color=red>0 </font> 次</td>

                                <td class="td_l_c"><?php echo $row['adduser'] ?></td>

                            </tr>
                            <!-- <script>function Mail_send1<?php echo $row['id'] ?>() {$.dialog.open('../mail/sendemail.asp?cid=19&maildz=', {title: '发送邮件
：小米 - 袁纯军 - ', width: 900,height: 530, fixed: true}); };</script> 
 <script>function Sms_send1<?php echo $row['id'] ?>() {$.dialog.open('../sms/sendsms.asp?cid=19&mobilehm=13477088658', {title
: '发送手机短信：小米 - 袁纯军 - 13477088658', width: 600,height: 400, fixed: true}); };</script> -->

                            <script>function Kehu_InfoView<?php echo $row['id']?>() {
                                    $.dialog.open('<?php echo site_url('customer/infoview')?>?id=<?php echo $row['id']?>', {
                                        title: '任务名称：小米',
                                        width: 1220,
                                        height: 520,
                                        fixed: true
                                    });
                                };</script>
                            <script>function Kehu_InfoEdit<?php echo $row['id']?>() {
                                    $.dialog.open('<?php echo site_url('customer/edit')?>?id=<?php echo $row['id']?>', {
                                        title: '编辑',
                                        width: 1000,
                                        height: 520,
                                        fixed: true
                                    });
                                };</script>
                            <script>function Kehu_InfoDel19() {
                                    art.dialog({
                                        content: '是否确定删除？',
                                        icon: 'error',
                                        ok: function () {

                                            art.dialog.open('<?php echo site_url('customer/reason')?>?id=<?php echo $row['id']?>');

                                            //return false;
                                            art.dialog.close();
                                        },
                                        cancelVal: '关闭',
                                        cancel: true //为true等价于function(){}
                                    });
                                };
                            </script>
                        <?php } ?>


                    </table>
                </div>
            </form>
        </td>
    </tr>
</table>
</td>
</tr>
</table>
<div class="fixed_bg"> <span style="float:left; display:none;">
 
 <a class="button_top_set" value="自定义设置" onclick='Setting_ListAll()'>自定义设置</a>
 
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
    for (var i = 0; i < document.getElementById('Trade').options.length; i++) {
        if (document.getElementById('Trade').options[i].value == "") {
            document.getElementById('Trade').options[i].selected = true;
        }
    }
    for (var i = 0; i < document.getElementById('Strades').options.length; i++) {
        if (document.getElementById('Strades').options[i].value == "") {
            document.getElementById('Strades').options[i].selected = true;
        }
    }
    for (var i = 0; i < document.getElementById('Group').options.length; i++) {
        if (document.getElementById('Group').options[i].value == "") {
            document.getElementById('Group').options[i].selected = true;
        }
    }
    -->
</script>

<script src="<?php echo base_url() ?>theme/default/WdatePicker.js"></script>
</body>
</html>



