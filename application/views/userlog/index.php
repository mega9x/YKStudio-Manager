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
<script>
    if (!document.getElementsByClassName) {
        document.getElementsByClassName = function (className, element) {
            var children = (element || document).getElementsByTagName('*');
            var elements = new Array();
            for (var i = 0; i < children.length; i++) {
                var child = children[i];
                var classNames = child.className.split(' ');
                for (var j = 0; j < classNames.length; j++) {
                    if (classNames[j] == className) {
                        elements.push(child);
                        break;
                    }
                }
            }
            return elements;
        };
    }
</script>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td colspan=2 class="ss_All td_n">
            <form name="searchForm" method="post" action="?Action=ssdetail">
                <input name="sttdate" type="text" id="TimeBegin" class="int Wdate" value="<?php echo $sttdate ?>"
                       style="width:100px;" onFocus="WdatePicker()"/>
                &nbsp;~&nbsp;
                <input name="enddate" type="text" id="TimeEnd" class="int Wdate" value="<?php echo $enddate ?>"
                       style="width:100px;" onFocus="WdatePicker()"/>


                ????????? :
                <select name='adduser' class='int'>
                    <option value="">?????????</option>
                    <?php foreach ($user as $arr => $row) { ?>
                        <option value="<?php echo $row['name'] ?>" <?php echo $row['name'] == $adduser ? 'selected' : '' ?>><?php echo $row['name'] ?></option>
                    <?php } ?>
                </select>
                ?????? :
                <select name="action">
                    <option value="">?????????</option>
                    <option value="??????" <?php echo $action == '??????' ? 'selected' : '' ?>>??????</option>
                    <option value="??????" <?php echo $action == '??????' ? 'selected' : '' ?>>??????</option>
                    <option value="??????" <?php echo $action == '??????' ? 'selected' : '' ?>>??????</option>
                </select>


                <input type="submit" name="Submit" class="btn1 btnsou2" value=" ?????? ">
                <input type="button" name="button" class="btn1 btnqingk2" value=" ???????????? "
                       onClick=window.location.href="?action=killSession"/>
            </form>
        </td>
    </tr>
    <tr>
        <td valign="top" class="td_n pdl10 pdr10 ">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1">
                <tr class="tr_t">
                    <td class="td_l_c">??????</td>
                    <td class="td_l_c">??????</td>
                    <td class="td_l_l">????????????</td>
                    <td class="td_l_c">??????</td>
                    <td class="td_l_c">?????????</td>
                    <td class="td_l_c">??????</td>
                    <td class="td_l_c">?????????</td>
                    <td class="td_l_c">??????</td>
                </tr>


                <?php foreach ($list as $arr => $row) { ?>
                    <tr class="tr">
                        <td class="td_l_c"><?php echo $row['id'] ?></td>
                        <td class="td_l_c"><?php echo $row['addtime'] ?></td>
                        <td class="td_l_l"><a href='javascript:void(0)'
                                              onclick='Kehu_InfoView<?php echo $row['customerid'] ?>()'><?php echo $row['customername'] ?></a>
                        </td>
                        <td class="td_l_c"><?php echo $row['action'] ?></td>
                        <td class="td_l_c"><?php echo $row['module'] ?></td>
                        <td class="td_l_c"><input class="btn1 btnxinz" type="button"
                                                  onclick="View<?php echo $row['id'] ?>()" value="??????"></td>
                        <td class="td_l_c"><?php echo $row['adduser'] ?></td>
                        <td class="td_l_c"><input type="button" class="btn1 btnshanc" value="??????" title="??????"
                                                  onclick="art.dialog({content: '?????????????????????',icon: 'error',ok: function () {art.dialog.open('<?php echo site_url('userlog/del') ?>?id=<?php echo $row['id'] ?>');art.dialog.close();},cancelVal: '??????',cancel: true })"/>
                        </td>
                    </tr>
                    <script>function Kehu_InfoView<?php echo $row['id']?>() {
                            $.dialog.open('<?php echo site_url('customer/infoview')?>?id=<?php echo $row['cid']?>', {
                                title: '??????',
                                width: 1000,
                                height: 520,
                                fixed: true
                            });
                        };</script>
                    <script>function View<?php echo $row['id']?>() {
                            art.dialog(
                                {
                                    title: '????????????',
                                    icon: 'question',
                                    content: '<?php echo $row['reason']?>',
                                    drag: false,
                                    resize: false
                                }
                            );
                        };</script>

                <?php } ?>


            </table>
        </td>
    </tr>
</table>
<div class="fixed_bg"> <span class="r">
 <input name="Back" type="button" id="Back" class="btn1 btnpilsc" value="????????????"
        onClick=window.location.href="<?php echo site_url('userlog/clear') ?>">
 </span>

    <!--??????????????????-->
    <div class="pagepostion">
        <ul class="pagination">
            <?php echo $this->lib_page->showpage() ?>
            <script language='javascript'>function getValue(obj) {
                    if (document.getElementById("geturl").value != "") {
                        location.href = "<?php echo site_url('userlog')?>?page=" + escape(document.getElementById("geturl").value) + ""
                    }
                }</script>
            <input class="pagenum" id="geturl" value="<?php echo $this->lib_page->nowPage ?>">
            <li class="last"><a href='javascript:void(0);' onclick="getValue(geturl.value)">??????</a></li>
        </ul>
    </div>
    <!--??????????????????-->
</div>

<script src="<?php echo base_url() ?>theme/default/WdatePicker.js"></script>
</body>
</html>


