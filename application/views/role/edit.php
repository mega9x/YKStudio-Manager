<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
    <script language="JavaScript">
        //显示
        var funxs = function () {

            var okon = document.getElementsByClassName('okon');
            for (i = 0; i <= okon.length; i++) {
                //alert(i)
                if (okon[i].checked) {
                    okon[i].parentNode.className = "okon_on";
                } else {
                    okon[i].parentNode.className = "okonno";
                }
                okon[i].onclick = function () {
                    if (this.checked) {
                        this.parentNode.className = "okon_on";
                    } else {
                        this.parentNode.className = "okonno";
                    }
                }
            }

        }
        //必填
        var funbt = function () {

            var okon_bt = document.getElementsByClassName('okon_bt');
            for (i = 0; i <= okon_bt.length; i++) {
                //alert(i)
                if (okon_bt[i].checked) {
                    okon_bt[i].parentNode.className = "okon_on";
                } else {
                    okon_bt[i].parentNode.className = "okonno";
                }
                okon_bt[i].onclick = function () {
                    if (this.checked) {
                        this.parentNode.className = "okon_on";
                    } else {
                        this.parentNode.className = "okonno";
                    }
                }
            }


        }
        //隐藏
        var funyc = function () {

            var okon_yc = document.getElementsByClassName('okon_yc');
            for (i = 0; i <= okon_yc.length; i++) {
                //alert(i)
                if (okon_yc[i].checked) {
                    okon_yc[i].parentNode.className = "okon_on";
                } else {
                    okon_yc[i].parentNode.className = "okonno";
                }
                okon_yc[i].onclick = function () {
                    if (this.checked) {
                        this.parentNode.className = "okon_on";
                    } else {
                        this.parentNode.className = "okonno";
                    }
                }
            }

        }
        //权限
        var funqx = function () {

            var qxon = document.getElementsByClassName('qxon');
            for (i = 0; i <= qxon.length; i++) {
                //alert(i)
                if (qxon[i].checked) {
                    qxon[i].parentNode.className = "qxyes";
                } else {
                    qxon[i].parentNode.className = "qxno";
                }
                qxon[i].onclick = function () {
                    if (this.checked) {
                        this.parentNode.className = "qxyes";
                    } else {
                        this.parentNode.className = "qxno";
                    }
                }
            }


        }
    </script>
</head>
<body>
<!--<script>art.dialog({title: 'Error',time: 1.5,icon: 'warning',content: '角色名称有重复'});</script>-->

<style>
    body {
        padding: 0 0 55px 0;
    }
</style>
<script language="JavaScript">
    <!--
    必填项提示

    function CheckInput() {
        if (document.getElementById('lId').value == "") {
            art.dialog({title: 'Error', time: 1, icon: 'warning', content: '权限值不能为空！'});
            document.getElementById('lId').focus();
            return false;
        }
        if (document.getElementById('lName').value == "") {
            art.dialog({title: 'Error', time: 1, icon: 'warning', content: '角色名称不能为空！'});
            document.getElementById('lName').focus();
            return false;
        }
    }

    -->
</script>
<script language=javascript>
    //全选/反选
    function selectall(id) { //用id区分
        var tform = document.forms['Level'];
        for (var i = 0; i < tform.length; i++) {
            var e = tform.elements[i];
            if (e.type == "checkbox" && e.id == id) e.checked = !e.checked;
        }
    }
</script>

<form name="Save" id="Level" action="<?php echo site_url('role/edit') ?>?id=<?php echo $id ?>" method="post"
      onSubmit="return CheckInput();">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td valign="top" class="td_n pdl10 pdr10 pdt10">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1">
                    <col width="100"/>
                    <tr class="tr_t">
                        <td class="td_l_l" COLSPAN="4"><B>编辑角色 </B></td>
                    </tr>

                    <tr>
                        <td colspan="3" class="td_l_r title"><font color="#FF0000">*</font> 权限值</td>
                        <td class="td_l_l"><input name="right" type="text" class="int" id="lId" size="10" maxlength="3"
                                                  onkeyup='this.value=this.value.replace(/\D/gi,"")'
                                                  value="<?php echo $right ?>">
                            <span class="info_help help02">注：权限值大的可以管理和查看权限值小的帐号客户信息</span></td>
                    </tr>

                    <tr>
                        <td colspan="3" class="td_l_r title"><font color="#FF0000">*</font> 角色名称</td>
                        <td class="td_l_l"><input name="name" type="text" class="int" id="lName" size="20"
                                                  maxlength="16" value="<?php echo $name ?>"></td>
                    </tr>
                    <tr>
                        <td colspan="3" class="td_l_r title"><font color="#FF0000">*</font> 是否同步</td>
                        <td class="td_l_l"><input name="isupdate" type="radio" id="YnUpdate" value="1">
                            是　
                            <input name="isupdate" type="radio" id="YnUpdate" value="0" checked>
                            否 <span class="info_help help01">选中“是”，则更新当前角色内所有成员的权限</span></td>
                    </tr>
                </table>
            </td>
        </tr>


        <tr>
            <td valign="top" class="td_n pdl10 pdr10 pdt10">
                <fieldset style="padding:10px;">
                    <legend>&nbsp;<B style="font-size:14px;">全局权限</B>&nbsp;</legend>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1">
                        <col width="20%">
                        <col width="20%">
                        <col width="20%">
                        <col width="20%">
                        <col width="20%">

                        <tr>
                            <?php foreach ($system as $arr => $row) { ?>
                                <td class="td_l_c"><label><?php echo $row['name'] ?>
                                        <input type="checkbox" name="lever[]"
                                               value="<?php echo $row['id'] ?>" <?php echo in_array($row['id'], $lever) ? 'checked' : '' ?>
                                               class="qxon"/></label></td>
                                <?php echo ($arr + 1) % 5 == 0 ? '</tr><tr>' : '';
                            } ?>
                            <td class="td_l_c"></td>
                            <td class="td_l_c"></td>
                            <td class="td_l_c"></td>
                            <td class="td_l_c"></td>
                        </tr>


                        <div style="display:none;">
                            <label>高级搜索
                                <input type="checkbox" name="qxflag11" value="1" class="qxon"/>
                            </label>
                        </div>
                    </table>
                </fieldset>


                <fieldset style="margin-top:10px;padding:10px;">
                    <input type="button" class="button246"
                           onClick="javascript:selectall('levelA')" <?php echo in_array($row['id'], $lever) ? 'checked' : '' ?>
                           value="全选/反选" style="margin-bottom:10px;"/>
                    <legend>&nbsp;<B style="font-size:14px;">任务管理</B>&nbsp;</legend>
                    <?php foreach ($customer as $arr => $row) { ?>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1">
                            <col width="20%">
                            <col width="20%">
                            <col width="20%">
                            <col width="20%">
                            <col width="20%">
                            <tr>
                                <!--<td class="td_l_c fontbold"><?php echo $row['name'] ?></td>-->
                                <td class="td_l_c">
                                    <label><?php echo $row['name'] ?>
                                        <input type="checkbox" id="levelA" name="lever[]"
                                               value="<?php echo $row['id'] ?>" <?php echo in_array($row['id'], $lever) ? 'checked' : '' ?>
                                               class="qxon"/>
                                    </label>
                                </td>
                                <?php
                                if (isset($row['child']) && count($row['child']) > 0) {
                                    foreach ($row['child'] as $arr2 => $row2) {
                                        ?>
                                        <td class="td_l_c">
                                            <label><?php echo $row2['name'] ?>
                                                <input type="checkbox" id="levelA" name="lever[]"
                                                       value="<?php echo $row2['id'] ?>" <?php echo in_array($row2['id'], $lever) ? 'checked' : '' ?>
                                                       class="qxon"/>
                                            </label>
                                        </td>
                                    <?php }
                                } ?>
                            </tr>
                        </table>
                    <?php } ?>
                </fieldset>

                <fieldset style="margin-top:10px;padding:10px;">
                    <input type="button" class="button246" onClick="javascript:selectall('levelB')" value="全选/反选"
                           style="margin-bottom:10px;"/>
                    <legend>&nbsp;<B style="font-size:14px;">其它权限</B>&nbsp;</legend>

                    <?php foreach ($other as $arr => $row) { ?>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1">
                            <col width="20%">
                            <col width="20%">
                            <col width="20%">
                            <col width="20%">
                            <col width="20%">
                            <tr>
                                <!--<td class="td_l_c fontbold"><?php echo $row['name'] ?></td>-->
                                <td class="td_l_c"><label><?php echo $row['name'] ?>
                                        <input type="checkbox" id="levelB" name="lever[]"
                                               value="<?php echo $row['id'] ?>" <?php echo in_array($row['id'], $lever) ? 'checked' : '' ?>
                                               class="qxon"/>
                                    </label></td>
                                <?php
                                if (isset($row['child']) && count($row['child']) > 0) {
                                    foreach ($row['child'] as $arr2 => $row2) {
                                        ?>
                                        <td class="td_l_c"><label><?php echo $row2['name'] ?>
                                                <input type="checkbox" id="levelB" name="lever[]"
                                                       value="<?php echo $row2['id'] ?>" <?php echo in_array($row2['id'], $lever) ? 'checked' : '' ?>
                                                       class="qxon"/>
                                            </label></td>
                                    <?php }
                                } ?>
                            </tr>
                        </table>
                    <?php } ?>

                </fieldset>
            </td>
        </tr>
    </table>
    <script language="JavaScript">funqx();</script>
    <div class="h50b"></div>
    <div class="fixed_bg_B">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td valign="top" class="td_n Bottom_pd ">
                    <input type="submit" class="btn2 btnbaoc" value="保存">
                    <input name="Back" type="button" id="Back" class="btn2 btnguanb" value="关闭" onClick="art.dialog.close
();"></td>
            </tr>
        </table>
    </div>
</form>

<script src="<?php echo base_url() ?>theme/default/WdatePicker.js"></script>
</body>
</html>

 