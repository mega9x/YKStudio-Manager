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
 <li <?php echo $timetype == '' ? 'class="hover"' : '' ?> id="CheckB"><span><a href="?">任务列表</a></span></li>
 <li <?php echo $timetype == 'd' ? 'class="hover"' : '' ?> id="CheckF"><span><a
                 href="?timetype=d">今日新增</a></span></li>
 <li <?php echo $timetype == 'w' ? 'class="hover"' : '' ?> id="CheckG"><span><a href="?timetype=w">近7天新增</a></span></li>
 <li <?php echo $timetype == 'm' ? 'class="hover"' : '' ?> id="CheckH"><span><a
                 href="?timetype=m">本月新增</a></span></li>
 <?php if ($this->common_model->check_lever(20)) { ?>
     <li class="btn_new" id="CheckC"><span><a href="#" onclick='add()'>新增任务</a></span></li>
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
            title: '新增任务资料',
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
                                        <td class="td_l_r title">搜索</td>
                                        <td class="td_r_l">
                                            关键词
                                            <input name="keyword" type="text" class="int" id="keyword" size="20"
                                                   value="<?php echo $keyword ?>" onkeyup="searchSuggest();"/>
                                            标题
                                            <input name="title" type="text" class="int" id="keyword" size="20"
                                                   value="<?php echo $title ?>" onkeyup="searchSuggest();"/>
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
                                                <option value="">工号</option>
                                                <?php foreach ($select_user as $arr => $row) { ?>
                                                    <option value="<?php echo $row['name'] ?>" <?php echo $row['name'] == $adduser ? 'selected' : '' ?>><?php echo $row['name'] ?></option>
                                                <?php } ?>
                                            </select>
                                            <select name='job' class='int'>
                                                <option value="">记号</option>
                                                <?php foreach ($select_job as $arr => $row) { ?>
                                                    <option value="<?php echo $row['name'] ?>" <?php echo $row['name'] == $job ? 'selected' : '' ?>><?php echo $row['name'] ?></option>
                                                <?php } ?>
                                            </select>
                                            所在地区
                                            <input name="area1" type="text" class="int" id="area_name1" value=""
                                                   size="15">
                                            <input name="area2" type="text" class="int" id="area_name2" value=""
                                                   size="15" >
                                            <input type="submit" name="Submit" id="ss_button" class="btn1 btnxiug"
                                                   value="搜索"/>
                                            <input type="button" class="btn1 btnxiug" value="清空条件"
                                                   onClick=window.location.href="?"/>
                                            <input type="button" class="btn1 btnxiug" value="导出"
                                                   onClick=window.location.href="<?php echo site_url('customer/excel') ?>?<?php echo $parameter ?>"/>

                                            <input type="button" class="btn1 btnxiug" value="最大化"
                                                   onclick="openThisPage()">
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
                        <td width="150" nowrap="nowrap" class="td_l_l td_l_name">任务名称</td>
                        <?php if (isset($config['job'])){?>
                            <td width="80" nowrap="nowrap" class="td_l_c td_l_job">记号</td>
                        <?php }?>
                        <?php if (isset($config['area'])) { ?>
                            <td width="12" nowrap="nowrap" class="td_l_c">所在地区</td>
                        <?php } ?>
                        <?php if (isset($config['address']) && $this->session->userdata('roleid') != 3) { ?>
                            <td width="100" nowrap="nowrap" class="td_l_c">账户信息</td>
                        <?php } ?>
                        <?php if (isset($config['type'])) { ?>
                            <td width="50" nowrap="nowrap" class="td_l_c">转化情况</td>
                        <?php } ?>
                        <td width="50" nowrap="nowrap" class="td_l_c">转化金额</td>
                        <?php if (isset($config['qq'])) { ?>
                            <td width="120" nowrap="nowrap" class="td_l_c td_l_qq">任务要求</td>
                        <?php } ?>
                        <?php if (isset($config['trade'])) { ?>
                            <td width="50" nowrap="nowrap" class="td_l_c">任务类型</td>
                        <?php } ?>
                        <?php if (isset($config['start'])) { ?>
                            <td width="50" nowrap="nowrap" class="td_l_c">流量状况</td>
                        <?php } ?>
                        <?php if (isset($config['source']) && $this->session->userdata('roleid') != 3) { ?>
                            <td width="50" nowrap="nowrap" class="td_l_c">所属联盟</td>
                        <?php } ?>

                        <?php if (isset($config['record']) && $this->session->userdata('roleid') != 3) { ?>
                            <td width="150" nowrap="nowrap" class="td_l_c td_l_code">任务代码</td>
                        <?php } ?>

                        <?php if (isset($config['linkman'])) { ?>
                            <td width="100" nowrap="nowrap" class="td_l_c">任务链接</td>
                        <?php } ?>
                        <?php if (isset($config['mobile']) && $this->session->userdata('roleid') != 3) { ?>
                            <td width="100" nowrap="nowrap" class="td_l_c">合作站点</td>
                        <?php } ?>
                        <?php if (isset($config['adddate'])) { ?>
                            <td width="100" nowrap="nowrap" class="td_l_c td_l_date">录入时间</td>
                        <?php } ?>
                        <?php if (isset($config['adduser'])) { ?>
                            <td width="80" nowrap="nowrap" class="td_l_c">工号</td>
                        <?php } ?>
                        <?php if ($this->session->userdata('roleid') != 3) { ?>
                            <td width="80" nowrap="nowrap" class="td_l_c">管理</td>
                        <?php } ?>
                    </tr>

                    <?php
                    $namePair = array();
                    if (count($list) > 0) {
                    foreach ($list as $arr => $row) {
                        if(!array_key_exists($row['name'], $namePair)) {
                            $namePair[$row['name']] = 0;
                        } else {
                            $namePair[$row['name']]++;
                        }
                        ?>
                        <tr class="tr">
                            <td class="td_l_c"><input type="checkbox" name="cId" id="cId"
                                                      value="<?php echo $row['id'] ?>"></td>
                            <td class="td_l_c"><?php echo $row['id'] ?></td>

                            <td class="td_l_l td_l_nn td_l_name">
                                <a class="gongsim" onclick='view<?php echo $row['id'] ?>()'
                                   style="cursor:pointer;"><?php echo $row['name']. " -> " .$namePair[$row['name']];?>
                                </a></td>
                            <?php if (isset($config['job'])) { ?>
                                <td class="td_l_c td_l_job"><?php echo $row['job'] ?></td>
                            <?php } ?>
                            <?php if (isset($config['area'])) { ?>
                                <td class="td_l_c td_l_c_area"><?php echo $row['area1'] ?>
                                    &nbsp;&nbsp;<?php echo $row['area2'] ?></td>
                            <?php } ?>
                            <?php if (isset($config['address']) && $this->session->userdata('roleid') != 3) { ?>
                                <td class="td_l_c td_l_nn" onMouseOver="tip.start(this)"
                                    title="<?php echo $row['address'] ?>"><?php echo $row['address'] ?></td>
                            <?php } ?>
                            <?php if (isset($config['type'])) { ?>
                                <td class="td_l_c"><?php echo $row['type'] ?></td>
                            <?php } ?>
                            <td class="td_l_c"><?php echo $row['website'] ?></td>
                            <?php if (isset($config['qq'])) { ?>
                                <td class="td_l_c td_l_qq">
                                    <?php echo "<textarea readonly='readonly' style='min-width: 10px; width: 80px;'>" . $row['qq'] . "</textarea>"
                                    ?>
                                </td>
                            <?php } ?>
                            <?php if (isset($config['trade'])) { ?>
                                <td class="td_l_c"><?php echo $row['trade'] ?></td>
                            <?php } ?>
                            <?php if (isset($config['start'])) { ?>
                                <td class="td_l_c"><?php echo $row['start'] ?></td>
                            <?php } ?>
                            <?php if (isset($config['source']) && $this->session->userdata('roleid') != 3) { ?>
                                <td class="td_l_c"><?php echo $row['source'] ?></td>
                            <?php } ?>
                            <?php if (isset($config['record']) && $this->session->userdata('roleid') != 3) { ?>
                                <td class="td_l_c td_l_code"><?php
                                    echo "<textarea readonly='readonly'>" . $row['record'] . "</textarea>"
                                    ?>
                                </td>
                            <?php } ?>
                            <?php if (isset($config['linkman'])) { ?>
                                <td class="td_l_c td_l_nn"><?php echo $row['linkman'] ?></td>
                            <?php } ?>
                            <?php if (isset($config['mobile'])) { ?>
                                <td class="td_l_c td_l_nn"><?php echo $row['mobile'] ?></td>
                            <?php } ?>
                            <?php if (isset($config['adddate'])) { ?>
                                <td class="td_l_c td_l_date"><?php echo $row['adddate'] ?></td>
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
                        <script>
                            // Added by Omega  at 22/12/16
                            function editAll() {
                                $.dialog.open('<?php echo site_url('customer/editAll')?>', {
                                    title: '模糊匹配并修改',
                                    width: 700,
                                    height: 520,
                                    fixed: true
                                })
                            }
                        </script>
                        <script>function del<?php echo $row['id']?>() {
                                art.dialog({
                                    content: '是否确定删除？',
                                    icon: 'error',
                                    ok: function () {

                                        art.dialog.open('<?php echo site_url('customer/del')?>?id=<?php echo $row['id']?>', {
                                            title: '删除原因',
                                            width: 400,
                                            height: 150,
                                            fixed: true
                                        });

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

  function cutString() {

  }

  function transfer() {
      if (!getids()) {
          art.dialog({
              title: 'Error', time: 1, icon: 'warning', content: '请选择任务'
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
              title: 'Error', time: 1, icon: 'warning', content: '请选择任务！'
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
<div class="fixed_bg"> <span style="float: left;">
 <input type="button" class="btn1 btnxiug" value="自定义设置" onclick='setting_diy()' style="margin-left: 15px;"></input>
            <?php if (isset($config['source']) && $this->session->userdata('roleid') != 3) {?>
                <input type="button" class="btn1 btnxiug" value="模糊匹配并修改"
                       onclick="editAll()">
            <?php } ?>
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
    function openThisPage() {
        window.open("/index.php/customer/index");
    }
function CheckAll(form) {
    for (var i = 0; i < form.elements.length; i++) {
        var e = form.elements[i];
        if (e.name != 'chkall')
            e.checked = form.chkall.checked;
    }
}
</script>
<style type="text/css">
    .tr:hover {
        background: #92dda2;
    }
    .td_l_c {
        max-width: 120px;
    }
    .td_l_l {
        max-width: 60px;
    }
    .td_l_nn {
        word-wrap: break-word;
    }
    .td_l_code {
        max-width: 100%;
    }
    .td_l_c_area {
        max-width: 20px;
        word-wrap: break-word;
    }
    .td_l_date {
        max-width: 80px;
    }
    .td_l_job {
        max-width: 50px;
    }
    .td_l_qq {
        width: 50px;
        max-width: 100%;
    }
    .td_l_name {
        min-width: 120px;
    }
</style>


<script src="<?php echo base_url() ?>theme/default/WdatePicker.js"></script>
</body>
</html>
