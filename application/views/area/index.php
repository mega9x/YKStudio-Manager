<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="<?php echo base_url() ?>theme/default/css/common.css" rel="stylesheet" type="text/css">
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/jquery.min.js"></script>
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/tips.js"></script>
    <script src="<?php echo base_url() ?>theme/default/js/jquery.artDialog.js?skin=default"></script>
    <script src="<?php echo base_url() ?>theme/default/js/iframeTools.js"></script>
</head>
<body>
 
 <span class="MenuboxS">
 <ul>
 <li class="hover"><span><a href="?">地区列表</a></span></li>
 <li class=""><span><a href="#" onclick='jinke_diqu_BClass_Add()'>新增国家</a></span></li>
     <!-- <li class=""><span><a href="#" onclick='jinke_diqu_Import()'>导入数据</a></span></li>-->
 </ul>
 </span>
 <script>function jinke_diqu_BClass_Add() {
         $.dialog.open('<?php echo site_url('area/add')?>', {
             title: '新增地区省份',
             width: 400,
             height: 180,
             fixed: true
         });
     };</script>
 <script>function jinke_diqu_Import() {
         $.dialog.open('diqu_save.asp?action=jinke_diqu&sType=Import', {
             title: '导入全国地区',
             width: 600,
             height: 350,
             fixed: true
         });
     };</script>
 <table width="100%" border="0" cellpadding="0" cellspacing="0">
     <tr>
         <td valign="top" class="td_n pd10">

             <table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1">
                 <tr class="tr_t">
                     <td class="td_l_l">地区列表</td>
                     <td class="td_l_c" width="150">管理</td>
                 </tr>

                 <?php foreach ($list as $arr => $row) { ?>
                     <tr class="tr">
                         <td class="tr_f"><a href="#" onclick='jinke_diqu_BClass_Edit<?php echo $row['id'] ?>()'
                                             title='修改'><?php echo $row['name'] ?></a></td>
                         <td class="td_l_r title">
                             <input type="button" class="button_info_add" value=" " title="添加城市"
                                    onclick='jinke_diqu_SClass_Add<?php echo $row['id'] ?>()'/>
                             <input type="button" class="btn1 btnxiug" value="修改" title="修改"
                                    onclick='jinke_diqu_BClass_Edit<?php echo $row['id'] ?>()'/>
                             <input type="button" class="btn1 btnshanc" value="删除" title="删除"
                                    onclick="art.dialog({content: '是否确定删除？',icon: 'error',ok: function () {art.dialog.open('<?php echo site_url('area/del') ?>?id=<?php echo $row['id'] ?>');art.dialog.close();},cancelVal: '关闭',cancel: true })"/>
                         </td>
                     </tr>
                     <script>function jinke_diqu_BClass_Edit<?php echo $row['id']?>() {
                             $.dialog.open('<?php echo site_url('area/edit')?>?id=<?php echo $row['id']?>', {
                                 title: '编辑地区省份',
                                 width: 400,
                                 height: 145,
                                 fixed: true
                             });
                         };</script>
                     <script>function jinke_diqu_SClass_Add<?php echo $row['id']?>() {
                             $.dialog.open('<?php echo site_url('area/add')?>?parentid=<?php echo $row['id']?>', {
                                 title: '添加地区城市',
                                 width: 400,
                                 height: 180,
                                 fixed: true
                             });
                         };</script>
                 <?php
                 if (isset($row['child']) && count($row['child']) > 0) {
                 foreach ($row['child'] as $arr2 => $row2) {
                 ?>
                     <tr class="tr">
                         <td class="td_l_l" style="padding-left:30px;">┗━━ <a onclick='jinke_diqu_SClass_Edit4()'
                                                                              title='修改'><?php echo $row2['name'] ?></a>
                         </td>
                         <td class="td_l_r">
                             <input type="button" class="btn1 btnxiug" value="修改" title="修改"
                                    onclick='jinke_diqu_SClass_Edit<?php echo $row2['id'] ?>()'/>
                             <input type="button" class="btn1 btnshanc" value="删除" title="删除"
                                    onclick="art.dialog({content: '是否确定删除？',icon: 'error',ok: function () {art.dialog.open('<?php echo site_url('area/del') ?>?id=<?php echo $row2['id'] ?>');art.dialog.close();},cancelVal: '关闭',cancel: true })"/>
                         </td>
                     </tr>
                     <script>function jinke_diqu_SClass_Edit<?php echo $row2['id']?>() {
                             $.dialog.open('<?php echo site_url('area/edit')?>?id=<?php echo $row2['id']?>', {
                                 title: '编辑地区城市',
                                 width: 400,
                                 height: 180,
                                 fixed: true
                             });
                         };</script>
                 <?php }
                 } ?>
                 <?php } ?>
             </table>

         </td>
     </tr>
 </table>
</body>
</html>
