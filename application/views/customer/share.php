<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
         <li><span><a href="<?php echo site_url('customer/files') ?>?id=<?php echo $id ?>">附件记录</a></span></li>
     <?php } ?>

 <li class="hover"><span><a
                 href="<?php echo site_url('customer/share') ?>?id=<?php echo $id ?>">客户共享</a></span></li>

 <?php if (in_array(71, $lever)) { ?>
     <li><span><a href="<?php echo site_url('customer/history') ?>?id=<?php echo $id ?>">操作记录</a></span></li>
 <?php } ?>
 
 </ul>
 </span>
<span>
 
 </span>


<script>
    function Setdisabled(evt) {
        var evt = evt || window.event;
        var e = evt.srcElement || evt.target;

        if (e.value == "1") {
            var a = document.all.cShareRange;
            for (var i = 0; i < a.length; i++) {
                a[i].disabled = false;
                a[i].readOnly = false;
            }
        } else {
            var a = document.all.cShareRange;
            for (var i = 0; i < a.length; i++) {
                a[i].disabled = true;
                a[i].readOnly = true;
            }
        }
    }
</script>
<form name="Save" action="<?php echo site_url('customer/share') ?>?id=<?php echo $id ?>" method="post">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td valign="top" class="td_n pdl10 pdr10 pdt10">
                <table width="100%" border="0" cellspacing="0" cellpadding
                ="0" CLASS="table_1">
                    <col width="100"/>
                    <tr class="tr_t">
                        <td class="td_l_l" COLSPAN="2">选择共享对象</td>
                    </tr>
                    <tr class="tr_f">
                        <td class="td_l_c red">是否共享</td>
                        <td class="td_l_l red">
                            <input type="radio" id="cShare" name="isshare"
                                   value='0' <?php echo $isshare == 0 ? 'checked' : '' ?> onClick="Setdisabled()">
                            否　
                            <input type="radio" id="cShare" name="isshare"
                                   value='1' <?php echo $isshare == 1 ? 'checked' : '' ?> onClick="Setdisabled()">
                            是
                        </td>
                    </tr>


                    <?php foreach ($select_group as $arr => $row) { ?>
                        <tr>
                            <td class="td_l_c title"><?php echo $row['name'] ?></td>
                            <td class="td_l_l">
                                <?php
                                foreach ($select_user as $arr1 => $row1) {
                                    if ($row1['groupid'] == $row['id']) {
                                        ?>
                                        <input type="checkbox" id="cShareRange"
                                               name="sharerange[]" <?php echo in_array($row1['uid'], $sharerange) ? 'checked' : '' ?>
                                               value="<?php echo $row1['uid'] ?>">
                                        <?php echo $row1['name'] ?>
                                    <?php }
                                } ?>
                            </td>
                        </tr>
                    <?php } ?>

                </table>
            </td>
        </tr>
    </table>
    <div class="h50b"></div>
    <div class="fixed_bg_B">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td valign="top" class="td_n Bottom_pd "><input type="Submit" id="Back" class="btn2 btnbaoc"
                                                                value="保存" onclick='Share_InfoSave()'>
                    <input name="Back" type="button" id="Back" class="btn2 btnguanb" value="关闭"
                           onClick="art.dialog.close();"></td>
            </tr>
        </table>
    </div>
</form>

<script src="<?php echo base_url() ?>theme/default/WdatePicker.js"></script>
</body>
</html>

