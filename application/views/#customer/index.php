<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>任务管理</title>
    <link href="<?php echo base_url() ?>theme/default/css/common.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>theme/default/css/csstable.css">

    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/Ajax.js?311"></script>
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/Common.js"></script>
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/jquery.min.js"></script>
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/tips.js"></script>
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/Float.js"></script>
    <script src="<?php echo base_url() ?>theme/default/js/jquery.artDialog.js?skin=default"></script>
    <script src="<?php echo base_url() ?>theme/default/js/iframeTools.js"></script>
    <link href="<?php echo base_url() ?>theme/default/css/jquery.vtip.css" rel="stylesheet" type="text/css">
    <script src="<?php echo base_url() ?>theme/default/js/jquery.vtip.js"></script>
</head>
<body style="padding-bottom:50px;">
<span class="MenuboxS">
<ul>
 <li <?php echo $timetype == '' ? 'class="hover"' : '' ?> id="CheckB"><span><a href="?">客户列表</a></span></li>
 <li <?php echo $timetype == 'd' ? 'class="hover"' : '' ?> id="CheckF"><span><a
                 href="?timetype=d">今日新增</a></span></li>
 <li <?php echo $timetype == 'w' ? 'class="hover"' : '' ?> id="CheckG"><span><a href="?timetype=w">近7天新增</a></span></li>
 <li <?php echo $timetype == 'm' ? 'class="hover"' : '' ?> id="CheckH"><span><a
                 href="?timetype=m">本月新增</a></span></li>
 <?php if ($this->common_model->check_lever(20)) { ?>
     <li class="btn_new" id="CheckC"><span><a href="#" onclick='add()'>新增客户</a></span></li>
 <?php } ?>
 
</ul>
</span>
<script>function setting_diy() {
        $.dialog.open('<?php echo site_url('setting/config')?>?type=customer', {
            title: '自定义设置',
            width: 600,
            height: 330,
            fixed: true
        });
    };</script>
<script>function add() {
        $.dialog.open('<?php echo site_url('customer/add')?>', {
            title: '新增客户资料',
            width: 1000,
            height: 520,
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
                                            <input type="button" class="btn1 btnxiug" value="导出"
                                                   onClick=window.location.href="<?php echo site_url('customer/excel') ?>?<?php echo $parameter ?>"/>
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
        <td valign="top" colspan=2 style="padding:5px 10px 0;" class="td_n">
            <form name="Search" action="<?php echo site_url('customer/other') ?>?action=CheckSub&saction=Search&PN=1"
                  method="post">
                <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_1">
                    <tr class="tr_b">
                        <td width="40" nowrap="nowrap" class="td_l_c"><input name="chkall" type="checkbox" id="chkall"
                                                                             onClick="CheckAll(this.form);getBlock('chkall','CheckSub')"
                                                                             value="checkbox"></td>
                        <td width="50" nowrap="nowrap" class="td_l_c">编号</td>

                        <td width="180" nowrap="nowrap" class="td_l_l">任务名称</td>

                        <?php if (isset($config['area'])) { ?>
                            <td width="100" nowrap="nowrap" class="td_l_c">所在地区</td>
                        <?php } ?>
                        <?php if (isset($config['address'])) { ?>
                            <td width="100" nowrap="nowrap" class="td_l_c">账户信息</td>
                        <?php } ?>
                        <?php if (isset($config['type'])) { ?>
                            <td width="100" nowrap="nowrap" class="td_l_c">转化情况</td>
                        <?php } ?>
                        <?php if (isset($config['qq'])) { ?>
                            <td width="100" nowrap="nowrap" class="td_l_c">任务要求</td>
                        <?php } ?>
                        <?php if (isset($config['trade'])) { ?>
                            <td width="120" nowrap="nowrap" class="td_l_c">任务类型</td>
                        <?php } ?>

                        <?php if (isset($config['start'])) { ?>
                            <td width="80" nowrap="nowrap" class="td_l_c">流量状况</td>
                        <?php } ?>
                        <?php if (isset($config['source'])) { ?>
                            <td width="80" nowrap="nowrap" class="td_l_c">所属联盟</td>
                        <?php } ?>
                        <?php if (isset($config['linkman'])) { ?>
                            <td width="80" nowrap="nowrap" class="td_l_c">任务链接</td>
                        <?php } ?>
                        <?php if (isset($config['job'])) { ?>
                            <td width="80" nowrap="nowrap" class="td_l_c">任务链接</td>
                        <?php } ?>
                        <?php if (isset($config['mobile'])) { ?>
                            <td width="100" nowrap="nowrap" class="td_l_c">合作站点</td>
                        <?php } ?>
                        <?php if (isset($config['adddate'])) { ?>
                            <td width="100" nowrap="nowrap" class="td_l_c">录入时间</td>
                        <?php } ?>


                        <?php if (isset($config['adduser'])) { ?>
                            <td width="80" nowrap="nowrap" class="td_l_c">业务员</td>
                        <?php } ?>

                        <td width="80" nowrap="nowrap" class="td_l_c">管理</td>

                    </tr>


                    <?php
                    if (count($list) > 0) {
                    foreach ($list as $arr => $row) { ?>
                        <tr class="tr">
                            <td class="td_l_c"><input type="checkbox" name="cId" id="cId"
                                                      value="<?php echo $row['id'] ?>"></td>
                            <td class="td_l_c"><?php echo $row['id'] ?></td>

                            <td class="td_l_l vtip"
                                title="任务链接：<?php echo $row['linkman_num'] ?><br>跟单：<?php echo $row['single_num'] ?><br>订单：<?php echo $row['order_num'] ?><br>合同：<?php echo $row['contract_num'] ?><br>售后：<?php echo $row['service_num'] ?><br>附件：<?php echo $row['file_num'] ?><br>">
                                <a class="gongsim" onclick='view<?php echo $row['id'] ?>()'
                                   style="cursor:pointer;"><?php echo $row['name'] ?></a></td>

                            <?php if (isset($config['area'])) { ?>
                                <td class="td_l_c"><?php echo $row['area1'] ?>
                                    &nbsp;&nbsp;<?php echo $row['area2'] ?></td>
                            <?php } ?>
                            <?php if (isset($config['address'])) { ?>
                                <td class="td_l_c" onMouseOver="tip.start(this)"
                                    title="<?php echo $row['address'] ?>"><?php echo $row['address'] ?></td>
                            <?php } ?>
                            <?php if (isset($config['type'])) { ?>
                                <td class="td_l_c"><?php echo $row['type'] ?></td>
                            <?php } ?>
                            <?php if (isset($config['qq'])) { ?>
                                <td class="td_l_c"><?php echo $row['qq'] ?><a class="icon-qq" title="QQ对话"
                                                                              href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $row['qq'] ?>&site=qq&menu=yes"
                                                                              target="_blank"></a></td>
                            <?php } ?>
                            <?php if (isset($config['trade'])) { ?>
                                <td class="td_l_c"><?php echo $row['trade'] ?></td>
                            <?php } ?>


                            <?php if (isset($config['start'])) { ?>
                                <td class="td_l_c"><?php echo $row['start'] ?></td>
                            <?php } ?>
                            <?php if (isset($config['source'])) { ?>
                                <td class="td_l_c"><?php echo $row['source'] ?></td>
                            <?php } ?>
                            <?php if (isset($config['linkman'])) { ?>
                                <td class="td_l_c"><?php echo $row['linkman'] ?></td>
                            <?php } ?>
                            <?php if (isset($config['job'])) { ?>
                                <td class="td_l_c"><?php echo $row['job'] ?></td>
                            <?php } ?>
                            <?php if (isset($config['mobile'])) { ?>
                                <td class="td_l_c"><?php echo $row['mobile'] ?></td>
                            <?php } ?>
                            <?php if (isset($config['adddate'])) { ?>
                                <td class="td_l_c"><?php echo $row['adddate'] ?></td>
                            <?php } ?>


                            <?php if (isset($config['adduser'])) { ?>
                                <td class="td_l_c"><?php echo $row['adduser'] ?></td>
                            <?php } ?>

                            <td nowrap="nowrap" class="td_l_c">


                                <?php if ($this->common_model->check_lever(21)) { ?>
                                    <input type="button" class="btn1 btnxiug" value="修改" title="修改"
                                           onclick='edit<?php echo $row['id'] ?>()'/>
                                <?php } ?>
                                <?php if ($this->common_model->check_lever(22)) { ?>
                                    <input type="button" class="btn1 btnshanc" value="删除" title="删除"
                                           onclick='del<?php echo $row['id'] ?>()'/>
                                <?php } ?>
                            </td>


                        </tr>


                        <script>function view<?php echo $row['id']?>() {
                                $.dialog.open('<?php echo site_url('customer/infoview')?>?id=<?php echo $row['id']?>', {
                                    title: '任务名称：<?php echo $row['name']?>',
                                    width: 1220,
                                    height: 520,
                                    fixed: true
                                });
                            };
                        </script>
                        <script>function edit<?php echo $row['id']?>() {
                                $.dialog.open('<?php echo site_url('customer/edit')?>?id=<?php echo $row['id']?>', {
                                    title: '编辑',
                                    width: 1000,
                                    height: 520,
                                    fixed: true
                                });
                            };</script>
                        <script>function del<?php echo $row['id']?>() {
                                art.dialog({
                                    content: '是否确定删除？',
                                    icon: 'error',
                                    ok: function () {

                                        art.dialog.open('<?php echo site_url('customer/del')?>?id=<?php echo $row['id']?>');

                                        //return false;
                                        art.dialog.close();
                                    },
                                    cancelVal: '关闭',
                                    cancel: true //为true等价于function(){}
                                });
                            };
                        </script>
                    <?php
                    }
                    } else { ?>
                        <tr class="tr">
                            <td class="td_l_c" colspan="29">
                                抱歉，暂无相关记录！
                            </td>
                        </tr>
                    <?php } ?>


                </table>
                <div class="piliang">
 
 <span id="CheckSub">
 
 您可以将选中信息：
 <select name='NewUser' class='int' id="user">
 <option value="">请选择</option>
 <?php foreach ($select_user as $arr => $row) { ?>
     <option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
 <?php } ?>
 </select>
 

  
  <input type="button" class="btn1 btnzhuany" value="转移" title="转移" onclick='transfer()'/>
 
  <input type="button" class="btn1 btnpilsc" value="批量删除" title="批量删除" onclick='dels()'/>
  <script>
  function getids() {
      var arrchk = $("input[id='cId']:checked");
      var id = "";
      $(arrchk).each(function () {
          if (id == "") {
              id += this.value
          } else {
              id += "," + this.value
          }
      });
      return id;
  }

  function transfer() {
      if (!getids()) {
          art.dialog({
              title: 'Error', time: 1, icon: 'warning', content: '请选择客户！'
          });
          return false;
      }


      if ($("#user").val() == "") {
          art.dialog({
              title: 'Error', time: 1, icon: 'warning', content: '请选择员工！'
          });
          return false;
      }

      art.dialog({
          content: '是否确定转移？',
          icon: 'warning',
          ok: function () {
              art.dialog.open('<?php echo site_url('customer/transfer')?>?id=' + getids() + '&user=' + $("#user").val());
              art.dialog.close();
          },
          cancelVal: '关闭',
          cancel: true
      });
  };

  function dels() {
      if (!getids()) {
          art.dialog({
              title: 'Error', time: 1, icon: 'warning', content: '请选择客户！'
          });
          return false;
      }
      art.dialog({
          content: '是否确定删除？',
          icon: 'warning',
          ok: function () {
              art.dialog.open('<?php echo site_url('customer/dels')?>?id=' + getids());
              art.dialog.close();
          },
          cancelVal: '关闭',
          cancel: true
      });
  };
 
  
 
  </script>  
 
 </span>

                </div>
            </form>
        </td>
    </tr>
</table>
</td>
</tr>
</table>
<div class="fixed_bg"> <span style="float:left;">
 
 <a class="button_top_set" value="自定义设置" onclick='setting_diy()'>自定义设置</a>
 
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


<script src="<?php echo base_url() ?>theme/default/WdatePicker.js"></script>
</body>
</html>
