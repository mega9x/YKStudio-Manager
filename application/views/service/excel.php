<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<table width="100%" cellpadding="0" cellspacing="0" border="1">
    <tr class="tr_b">
        <td width="80" class="td_l_c">编号</td>

        <td class="td_l_l">任务名称</td>

        <td class="td_l_c">反馈主题</td>

        <td class="td_l_c">任务链接</td>

        <td class="td_l_c">反馈分类</td>

        <td class="td_l_c">反馈日期</td>

        <td class="td_l_c">处理</td>

        <td class="td_l_c">业务员</td>


        <td class="td_l_c">录入时间</td>


    </tr>
    <?php foreach ($list as $arr => $row) { ?>
        <tr class="tr">
            <td class="td_l_c"><?php echo $row['id'] ?></td>
            <td class="td_l_l"><?php echo iconv("UTF-8", "gbk//TRANSLIT", $row['customername']); ?></td>
            <td class="td_l_c"><?php echo $row['title'] ?></td>

            <td class="td_l_c"><?php echo $row['linkman'] ?></td>

            <td class="td_l_c"><?php echo $row['type'] ?></td>

            <td class="td_l_c"><?php echo $row['sdate'] ?></td>


            <td class="td_l_c">
                <?php echo $row['issolve'] == 1 ? '已解决' : '未解决' ?>
            </td>


            <td class="td_l_c"><?php echo $row['adduser'] ?></td>

            <td class="td_l_c"><?php echo $row['addtime'] ?></td>


        </tr>
    <?php } ?>
</table>