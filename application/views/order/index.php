<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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
 <li <?php echo $timetype == '' ? 'class="hover"' : '' ?> id="CheckB"><span><a
                 href="?otype=Main">订单列表</a></span></li>
 <li <?php echo $timetype == 'd' ? 'class="hover"' : '' ?> id="CheckF"><span><a
                 href="?otype=timetype&timetype=d">今日新增</a></span></li>
 <li <?php echo $timetype == 'w' ? 'class="hover"' : '' ?> id="CheckG"><span><a
                 href="?otype=timetype&timetype=w">近7天新增</a></span></li>
 <li <?php echo $timetype == 'm' ? 'class="hover"' : '' ?> id="CheckH"><span><a
                 href="?otype=timetype&timetype=m">本月新增</a></span></li>
<?php if ($this->common_model->check_lever(35)) { ?>
    <li class="btn_new" id="CheckC"><span><a href="#" onclick='InfoAdd_Chose()'>新增订单</a></span></li>
<?php } ?>
 
 </ul>
</span>
<script>function InfoAdd_Chose() {
        $.dialog.open('<?php echo site_url('common/choose_customer')?>', {
            title: '新增订单【第一步：选择订单客户】',
            width: 1080,
            height: 550,
            fixed: true
        });
    };</script>
<script>function ChoseOK(i) {
        {
            $.dialog.open('<?php echo site_url('order/add')?>?id=' + i, {
                title: '新增订单【第二步：录入订单信息】',
                width: 600,
                height: 400,
                fixed: true
            });
        }
        ;
    }</script>
<script>function Setting_Order() {
        $.dialog.open('<?php echo site_url('setting/config')?>?type=order', {
            title: '自定义设置',
            width: 600,
            height: 290,
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
                                            <!--
			 <select name="wheredate" id="Select_Type">
			 <option value="">按条件</option>
			 <option value="1" <?php echo $wheredate == 1 ? 'selected' : '' ?>>按录入时间</option>
			 <option value="2" <?php echo $wheredate == 2 ? 'selected' : '' ?>>按交单时间</option>
		 
			 
			</select>-->


                                            <span id="ss_suggest" style="display:none;"></span>交单日期
                                            <input name="sttdate" type="text" maxlength="10" id="TimeBegin"
                                                   class="int Wdate" size="10" onfocus="WdatePicker()"
                                                   value="<?php echo $sttdate ?>"/>
                                            ~
                                            <input name="enddate" type="text" maxlength="10" id="TimeEnd"
                                                   class="int Wdate" size="10" onfocus="WdatePicker()"
                                                   value="<?php echo $enddate ?>"/>

                                            <select name='state'>
                                                <option value="">状态</option>
                                                <option value="1" <?php echo $state == 1 ? 'selected' : '' ?>>未处理
                                                </option>
                                                <option value="2" <?php echo $state == 2 ? 'selected' : '' ?>>处理中
                                                </option>
                                                <option value="3" <?php echo $state == 3 ? 'selected' : '' ?>>已完成
                                                </option>
                                            </select>

                                            <select name='adduser' class='int'>
                                                <option value="">业务员</option>
                                                <?php foreach ($select_user as $arr => $row) { ?>
                                                    <option value="<?php echo $row['name'] ?>" <?php echo $adduser == $row['name'] ? 'selected' : '' ?>>
                                                        <?php echo $row['name'] ?></option>
                                                <?php } ?>
                                            </select>


                                            <input type="submit" name="Submit" id="ss_button" class="btn1 btnxiug"
                                                   value="搜索"/>
                                            <input type="button" class="btn1 btnxiug" value="清空条件"
                                                   onClick=window.location.href="?"/>
                                            <input type="button" class="btn1 btnxiug" value="导出"
                                                   onClick=window.location.href="<?php echo site_url('order/excel') ?>?<?php echo $parameter ?>"/>
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
                        <td class="td_l_l">任务名称</td>
                        <?php if (isset($config['linkman'])) { ?>
                            <td class="td_l_c">任务链接</td>
                        <?php } ?>
                        <?php if (isset($config['sdate'])) { ?>
                            <td class="td_l_c">下单日期</td>
                        <?php } ?>
                        <?php if (isset($config['edate'])) { ?>
                            <td class="td_l_c">交单日期</td>
                        <?php } ?>


                        <td class="td_l_c">订单金额</td>

                        <?php if (isset($config['state'])) { ?>
                            <td class="td_l_c">状态</td>
                        <?php } ?>
                        <?php if (isset($config['adduser'])) { ?>
                            <td class="td_l_c">业务员</td>
                        <?php } ?>
                        <?php if (isset($config['addtime'])) { ?>
                            <td class="td_l_c">录入时间</td>
                        <?php } ?>

                        <td width="180" class="td_l_c">管理</td>
                    </tr>

                    <?php foreach ($list as $arr => $row) { ?>
                        <tr class="tr">
                            <td class="td_l_c"><?php echo $row['id'] ?></td>
                            <td class="td_l_l"><a onclick='View<?php echo $row['customerid'] ?>()'
                                                  style="cursor:pointer;"><?php echo $row['customername'] ?></a></td>
                            <?php if (isset($config['linkman'])) { ?>
                                <td class="td_l_c"><?php echo $row['linkman'] ?></td>
                            <?php } ?>
                            <?php if (isset($config['sdate'])) { ?>
                                <td class="td_l_c"><?php echo $row['sdate'] ?></td>
                            <?php } ?>
                            <?php if (isset($config['edate'])) { ?>
                                <td class="td_l_c"><?php echo $row['edate'] ?></td>
                            <?php } ?>

                            <td class="td_l_c"><?php echo $row['money'] ?></td>
                            <?php if (isset($config['state'])) { ?>
                                <td class="td_l_c">
                                    <a onclick='Audit<?php echo $row['id'] ?>()'
                                       class="btn_sh<?php echo $row['state'] ?>"><?php echo $audit[$row['state']] ?></a>
                                </td>
                            <?php } ?>
                            <?php if (isset($config['adduser'])) { ?>
                                <td class="td_l_c"><?php echo $row['adduser'] ?></td>
                            <?php } ?>
                            <?php if (isset($config['addtime'])) { ?>
                                <td class="td_l_c"><?php echo $row['adddate'] ?></td>
                            <?php } ?>
                            <td nowrap="nowrap" class="td_l_c">
                                <input type="button" class="button_info_add" value=" " title="快速添加产品"
                                       onclick='prod_add<?php echo $row['id'] ?>()'/>
                                <input type="button" class="btn1 btnchanp" value="产品" title="查看订单产品明细"
                                       onclick='prod_list<?php echo $row['id'] ?>()'/>
                                <?php if ($this->common_model->check_lever(36)) { ?>
                                    <input type="button" class="btn1 btnxiug" value="修改" title="修改"
                                           onclick='Edit<?php echo $row['id'] ?>()'/>
                                <?php } ?>
                                <?php if ($this->common_model->check_lever(37)) { ?>
                                    <input type="button" class="btn1 btnshanc" value="删除" title="删除"
                                           onclick='Del<?php echo $row['id'] ?>()'/>
                                <?php } ?>
                            </td>
                        </tr>
                        <script>function prod_add<?php echo $row['id']?>() {
                                $.dialog.open('<?php echo site_url('order/product_add')?>?orderid=<?php echo $row['id']?>', {
                                    title: '添加订单',
                                    width: 600,
                                    height: 400,
                                    fixed: true
                                });
                            };</script>
                        <script>function View<?php echo $row['cid']?>() {
                                $.dialog.open('<?php echo site_url('customer/order')?>?id=<?php echo $row['cid']?>', {
                                    title: '查看',
                                    width: 1220,
                                    height: 520,
                                    fixed: true
                                });
                            };</script>
                        <script>function prod_list<?php echo $row['id']?>() {
                                $.dialog.open('<?php echo site_url('order/product')?>?id=<?php echo $row['id']?>', {
                                    title: '查看订单产品明细',
                                    width: 860,
                                    height: 440,
                                    fixed: true
                                });
                            };</script>
                        <script>function Audit<?php echo $row['id']?>() {
                                $.dialog.open('<?php echo site_url('order/audit')?>?id=<?php echo $row['id']?>', {
                                    title: '审核',
                                    width: 400,
                                    height: 180,
                                    fixed: true
                                });
                            };</script>
                        <script>function Edit<?php echo $row['id']?>() {
                                $.dialog.open('<?php echo site_url('order/edit')?>?id=<?php echo $row['id']?>', {
                                    title: '编辑',
                                    width: 600,
                                    height: 400,
                                    fixed: true
                                });
                            };</script>
                        <script>function Del<?php echo $row['id']?>() {
                                art.dialog({
                                    content: '是否确定删除？', icon: 'error', ok: function () {
                                        $.dialog.open('<?php echo site_url('order/del')?>?id=<?php echo $row['id']?>', {
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
<div class="fixed_bg"> <span style="float:left">
 
 <a class="button_top_set" title="自定义设置" onclick='Setting_Order()'>自定义设置</a>
 
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

<script src="<?php echo base_url() ?>theme/default/WdatePicker.js"></script>
</body>
</html>