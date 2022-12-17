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


                业务员 :
                <select name='adduser' class='int'>
                    <option value="">请选择</option>
                    <?php foreach ($user as $arr => $row) { ?>
                        <option value="<?php echo $row['name'] ?>" <?php echo $row['name'] == $adduser ? 'selected' : '' ?>><?php echo $row['name'] ?></option>
                    <?php } ?>
                </select>
                行为 :
                <select name="action">
                    <option value="">请选择</option>
                    <option value="新增" <?php echo $action == '新增' ? 'selected' : '' ?>>新增</option>
                    <option value="修改" <?php echo $action == '修改' ? 'selected' : '' ?>>修改</option>
                    <option value="删除" <?php echo $action == '删除' ? 'selected' : '' ?>>删除</option>
                </select>


                <input type="submit" name="Submit" class="btn1 btnsou2" value=" 搜索 ">
                <input type="button" name="button" class="btn1 btnqingk2" value=" 清空条件 "
                       onClick=window.location.href="?action=killSession"/>
            </form>
        </td>
    </tr>
    <tr>
        <td valign="top" class="td_n pdl10 pdr10 ">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1">
                <tr class="tr_t">
                    <td class="td_l_c">编号</td>
                    <td class="td_l_c">时间</td>
                    <td class="td_l_l">企业名称</td>
                    <td class="td_l_c">行为</td>
                    <td class="td_l_c">数据表</td>
                    <td class="td_l_c">原因</td>
                    <td class="td_l_c">业务员</td>
                    <td class="td_l_c">管理</td>
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
                                                  onclick="View<?php echo $row['id'] ?>()" value="查看"></td>
                        <td class="td_l_c"><?php echo $row['adduser'] ?></td>
                        <td class="td_l_c"><input type="button" class="btn1 btnshanc" value="删除" title="删除"
                                                  onclick="art.dialog({content: '是否确定删除？',icon: 'error',ok: function () {art.dialog.open('<?php echo site_url('userlog/del') ?>?id=<?php echo $row['id'] ?>');art.dialog.close();},cancelVal: '关闭',cancel: true })"/>
                        </td>
                    </tr>
                    <script>function Kehu_InfoView<?php echo $row['id']?>() {
                            $.dialog.open('<?php echo site_url('customer/infoview')?>?id=<?php echo $row['cid']?>', {
                                title: '查看',
                                width: 1000,
                                height: 520,
                                fixed: true
                            });
                        };</script>
                    <script>function View<?php echo $row['id']?>() {
                            art.dialog(
                                {
                                    title: '操作原因',
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
 <input name="Back" type="button" id="Back" class="btn1 btnpilsc" value="清空记录"
        onClick=window.location.href="<?php echo site_url('userlog/clear') ?>">
 </span>

    <!--分页代码开始-->
    <div class="pagepostion">
        <ul class="pagination">
            <?php echo $this->lib_page->showpage() ?>
            <script language='javascript'>function getValue(obj) {
                    if (document.getElementById("geturl").value != "") {
                        location.href = "<?php echo site_url('userlog')?>?page=" + escape(document.getElementById("geturl").value) + ""
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


