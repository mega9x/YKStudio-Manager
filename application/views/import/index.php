<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url()?>theme/default/css/common.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url()?>theme/default/chosen/chosen.css" rel="stylesheet" />
<script language="javascript" src="<?php echo base_url()?>theme/default/js/Ajax.js"></script>
<script language="javascript" src="<?php echo base_url()?>theme/default/js/Common.js"></script>
<script language="javascript" src="<?php echo base_url()?>theme/default/js/jquery.min.js"></script>
<script language="javascript" src="<?php echo base_url()?>theme/default/js/tips.js"></script>
<script language="javascript" src="<?php echo base_url()?>theme/default/js/Float.js"></script>
<script src="<?php echo base_url()?>theme/default/js/jquery.artDialog.js?skin=default"></script>
<script src="<?php echo base_url()?>theme/default/js/iframeTools.js"></script>
</head>
<body>

<script language="JavaScript">
    <!-- 必填项提示
    function CheckInput()
    {
        if(document.getElementById('excelfile').value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content: '未选择要导入的文件！'});document.getElementById('excelfile').focus();return false;}
        if(document.getElementById('User').value == ""){art.dialog({title: 'Error',time: 1,icon: 'warning',content: '未选择业务员！'});document.getElementById('User').focus();return false;}
    }
    -->
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr>
 <td valign="top" class="td_n pd10"> 
 <form name="importForm" action="<?php echo site_url('import/daoru/')?>" enctype="multipart/form-data" method="post" onSubmit="return CheckInput();">
 <table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1">
 <col width="80" />
 <col width="380" />
 <col width="80" />
 <tr class="tr_t"> 
 <td class="td_l_l" COLSPAN="4"><B>外部 Excel 导入数据库</B></td>
 </tr>
 <tr>
 <td class="td_l_r title">上传文件</td>
 <td class="td_r_l"><input name="file" type="file" id="file" value="" maxlength="200" class="int" size="40">
 </td>
 <td class="td_l_r title"></td>
 <td class="td_r_l"></td>
 </tr>
 <tr>
 </td>
 </tr>
 </table> 
 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
 <tr>
 <td colspan="2">
 <input type="submit" name="Submit" class="btn2 btnbaoc" value=" 开始导入 "><a href='<?php echo base_url('data/AnotherOne.xls')?>' target='_blank' class='btn2 btnsous' style='color:#fff;'>模板下载</a>　
 </td>
 </tr>
 </table> 
 </form>
 </td> 
 </tr>
</table> 


</body>
</html>