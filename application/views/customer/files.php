<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
</head>
<body style="padding-bottom:50px;">


<span class="MenuboxS">
 <ul>
 <?php
 $lever = $this->common_model->get_lever();
 if (in_array(19, $lever)) {
     ?>
     <li><span><a href="<?php echo site_url('customer/infoview') ?>?id=<?php echo $id ?>">客户资料</a></span></li>
 <?php } ?>
     <?php if (in_array(24, $lever)) { ?>
         <li><span><a href="<?php echo site_url('linkman') ?>?id=<?php echo $id ?>">任务链接</a></span></li>
     <?php } ?>
     <?php if (in_array(29, $lever)) { ?>
         <li><span><a href="<?php echo site_url('customer/records') ?>?id=<?php echo $id ?>">跟单记录</a></span></li>
     <?php } ?>
     <?php if (in_array(34, $lever)) { ?>
         <li><span><a href="<?php echo site_url('customer/order') ?>?id=<?php echo $id ?>">订单记录</a></span></li>
     <?php } ?>
     <?php if (in_array(39, $lever)) { ?>
         <li><span><a href="<?php echo site_url('customer/hetong') ?>?id=<?php echo $id ?>">合同记录</a></span></li>
     <?php } ?>
     <?php if (in_array(44, $lever)) { ?>
         <li><span><a href="<?php echo site_url('customer/service') ?>?id=<?php echo $id ?>">售后记录</a></span></li>
     <?php } ?>
     <?php if (in_array(49, $lever)) { ?>
         <li><span><a href="<?php echo site_url('customer/expense') ?>?id=<?php echo $id ?>">收支记录</a></span></li>
     <?php } ?>
     <?php if (in_array(54, $lever)) { ?>
         <li class="hover"><span><a
                         href="<?php echo site_url('customer/files') ?>?id=<?php echo $id ?>">附件记录</a></span></li>
     <?php } ?>
  
 <li><span><a href="<?php echo site_url('customer/share') ?>?id=<?php echo $id ?>">客户共享</a></span></li>
 
 <?php if (in_array(71, $lever)) { ?>
     <li><span><a href="<?php echo site_url('customer/history') ?>?id=<?php echo $id ?>">操作记录</a></span></li>
 <?php } ?>
 
 </ul>
 </span>


<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td valign="top" class="td_n pdl10 pdr10 pdt10">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1">
                <tr class="tr_t">
                    <td class="td_l_c">编号</td>
                    <td class="td_l_l">附件标题</td>
                    <td class="td_l_c">文件大小</td>
                    <td class="td_l_c">下载地址</td>
                    <td class="td_l_c">详情备注</td>
                    <td class="td_l_c">业务员</td>
                    <td class="td_l_c">上传时间</td>
                    <td class="td_l_c">管理</td>
                </tr>
                <?php foreach ($list as $arr => $row) { ?>
                    <tr class="tr">
                        <td class="td_l_c"><?php echo $row['id'] ?></td>
                        <td class="td_l_l"><?php echo $row['title'] ?></td>
                        <td class="td_l_c"><?php echo $row['filesize'] ?></td>
                        <td class="td_l_c"><input class="btn1 btnchak" type="button"
                                                  onclick=window.location.href="<?php echo site_url('customer/files_down') ?>?id=<?php echo $row['id'] ?>"
                                                  value="下载"></td>
                        <td class="td_l_c"><input type="button" class="btn1 btnchak" value="查看"
                                                  onclick='File_ContentView<?php echo $row['id'] ?>()'/></td>
                        <td class="td_l_c"><?php echo $row['adduser'] ?></td>
                        <td class="td_l_c"><?php echo $row['adddate'] ?></td>
                        <td class="td_l_c"><input type="button" class="button_info_del" value="删除" title="删除"
                                                  onclick='Del<?php echo $row['id'] ?>()'/></td>
                    </tr>
                    <script>function Del<?php echo $row['id']?>() {
                            $.dialog({
                                content: '是否确定删除？', icon: 'error', ok: function () {
                                    art.dialog.open('<?php echo site_url('customer/files_del')?>?id=<?php echo $row['id']?>');
                                    return false;
                                }, cancel: true
                            });
                        };</script>
                    <script>function File_ContentView<?php echo $row['id']?>() {
                            art.dialog({
                                title: '详情备注',
                                content: '<?php echo $row['content']?>',
                                drag: false,
                                resize: false
                            });
                        };</script>
                    <script>function View<?php echo $row['id']?>() {
                            art.dialog({title: '查看图片', content: '<img src="" />', lock: true});
                        };</script>
                <?php } ?>
            </table>
        </td>
    </tr>
</table>
<div class="fixed_bg_B">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td valign="top" class="td_n Bottom_pd ">
                <input id="Back" class="btn2 btnbaoc" type="button" onclick="Add()" value="新增" name="Back">
                <input id="Back" class="btn2 btnguanb" type="button" onclick="art.dialog.close();" value="关闭"
                       name="Back">


            </td>
        </tr>
    </table>
</div>
<script>function Add() {
        $.dialog.open('<?php echo site_url('customer/files_add')?>?id=<?php echo $id?>', {
            title: '新窗口',
            width: 500,
            height: 210,
            fixed: true
        });
    };</script>
<script src="<?php echo base_url() ?>theme/default/WdatePicker.js"></script>
</body>
</html>