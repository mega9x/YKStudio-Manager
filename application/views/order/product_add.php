<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="<?php echo base_url() ?>theme/default/css/common.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>theme/default/css/csstable.css">
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/Common.js"></script>
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/jquery.min.js"></script>
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/tips.js"></script>
    <script src="<?php echo base_url() ?>theme/default/js/jquery.artDialog.js?skin=default"></script>
    <script src="<?php echo base_url() ?>theme/default/js/iframeTools.js"></script>

</head>
<body>

<script language="JavaScript">
    <!--
    产品必填项提示

    function CheckInput() {
        if (=="1"
    )
        {
            if (document.all.ProTitle.value == "") {
                art.dialog({title: 'Error', time: 1, icon: 'warning', content: '产品名称不能为空！'});
                document.all.ProTitle.focus();
                return false;
            }
        }
        if (=="1"
    )
        {
            if (document.all.oProNum.value == "") {
                art.dialog({title: 'Error', time: 1, icon: 'warning', content: '数量不能为空！'});
                document.all.oProNum.focus();
                return false;
            }
        }
        if (=="1"
    )
        {
            if (document.all.oDiscount.value == "") {
                art.dialog({title: 'Error', time: 1, icon: 'warning', content: '折扣不能为空！'});
                document.all.oDiscount.focus();
                return false;
            }
        }
        if (=="1"
    )
        {
            if (document.all.oContent.value == "") {
                art.dialog({title: 'Error', time: 1, icon: 'warning', content: '详情备注不能为空！'});
                document.all.oContent.focus();
                return false;
            }
        }
    }

    -->
</script>

<form name="Save" action="<?php echo site_url('order/product_add') ?>" method="post" onSubmit="return CheckInput();">
    <div class="cssout">

        <div class="cssin">
            <ul>
                <li class="w100 bg"><B>新增订单产品</B></li>


                <li class="w25 bg cl tr">
                    产品名称
                </li>
                <li class="w75">
                    <input name="ProId" type="hidden" id="ProId" size="23" value="" readonly/>
                    <input name="ProTitle" type="text" id="ProTitle" size="23" value="" readonly onclick='Choose_cp()'/>
                    <script>function Choose_cp() {
                            $.dialog.open('<?php echo site_url('common/choose_product')?>', {
                                title: '新增订单产品',
                                width: 900,
                                height: 480,
                                fixed: true
                            });
                        };</script>
                </li>


                <li class="w25 bg cl tr">

                    成本单价
                </li>
                <li class="w75">
                    <input type="text" id="oProItemE" value="" readonly/></li>


                <li class="w25 bg cl tr">

                    销售单价
                </li>
                <li class="w75">
                    <input name="ProPrice" type="text" id="oProPrice" size="10"
                           onchange="oMoney.value=oProPrice.value*parseInt(oProNum.value)-oDiscount.value"/>
                    元
                </li>


                <li class="w25 bg cl tr">
                    数量
                </li>
                <li class="w75">
                    <input name="ProNum" type="text" id="oProNum" size="10"
                           onChange="oMoney.value=oProPrice.value*parseInt(oProNum.value)-oDiscount.value" value="1"
                           onFocus="if (value =='1'){value ='1'}" onblur="if (value ==''){value='1'}"/>
                </li>


                <li class="w25 bg cl tr">折扣</li>

                <li class="w75">
                    <input name="Discount" type="text" id="oDiscount" size="10"
                           onchange="oMoney.value=oProPrice.value*parseInt(oProNum.value)-oDiscount.value" value="0"
                           onfocus="if (value =='0'){value =''}" onblur="if (value ==''){value='0'}"/>元
                </li>


                <li class="w25 bg cl tr">


                    总金额
                </li>
                <li class="w75">
                    <input name="Money" type="text" id="oMoney" size="10" style="font-weight:bold;color:Red;" class=""
                           value="0" onFocus="if (value =='0'){value =''}" onblur="if (value ==''){value='0'}"
                           readonly/>
                </li>


                <li class="w25 bg cl duohang tr">
                    详情备注
                </li>
                <li class="w75 duohang">

                    <textarea name="content" rows="4" id="oContent" class="int"
                              style="height:80px;width:99%;"></textarea>
                </li>


            </ul>
        </div>
        <div class="h50b"></div>
        <div class="fixed_bg_B">
            <input name="orderid" type="hidden" value="<?php echo $id ?>" readonly/>
            <input type="submit" class="btn2 btnbaoc" value="保存">
            <input name="Back" type="button" id="Back" class="btn2 btnguanb" value="关闭" onClick="art.dialog.close();">
        </div>
</form>
</div>


<script src="<?php echo base_url() ?>theme/default/WdatePicker.js"></script>
</body>
</html>


 
 