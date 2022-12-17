<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<table width="100%" cellpadding="0" cellspacing="0" border="1">
    <tr>

    <tr class="tr_b">
        <td width="80" class="td_l_c">编号</td>
        <td class="td_l_l">任务名称</td>

        <td class="td_l_c">合同编号</td>


        <td class="td_l_c">起始时间</td>


        <td class="td_l_c">到期时间</td>


        <td class="td_l_c">合同分类</td>


        <td class="td_l_c">总金额</td>


        <td class="td_l_c">已收款</td>


        <td class="td_l_c">欠款</td>


        <td class="td_l_c">提供发票</td>

        <td class="td_l_c">是否含税</td>


        <td class="td_l_c">合同状态</td>


        <td class="td_l_c">审核人员</td>


        <td class="td_l_c">审核时间</td>


        <td class="td_l_c">业务员</td>


        <td class="td_l_c">录入时间</td>


    </tr>

    <?php foreach ($list as $arr => $row) { ?>
        <tr class="tr">
            <td class="td_l_c"><?php echo $row['id'] ?></td>
            <td class="td_l_l"><?php echo $row['customername'] ?></td>

            <td class="td_l_c">

                <?php echo $row['number'] ?>

            </td>

            <td class="td_l_c"><?php echo $row['sdate'] ?></td>


            <td class="td_l_c"><?php echo $row['edate'] ?></td>


            <td class="td_l_c"><?php echo $row['type'] ?></td>


            <td class="td_l_c"><?php echo $row['money'] ?></td>


            <td class="td_l_c"><?php echo $row['yjmoney'] ?></td>


            <td class="td_l_c"><?php echo $row['qkmoney'] ?></td>


            <td class="td_l_c"><?php echo $row['isinvoice'] ?></td>


            <td class="td_l_c"><?php echo $row['istax'] ?></td>


            <td class="td_l_c">
                <?php echo $row['state'] ?>
            </td>


            <td class="td_l_c"><?php echo $row['auditname'] ?></td>

            <td class="td_l_c"><?php echo $row['auditdate'] ?></td>


            <td class="td_l_c"><?php echo $row['adduser'] ?></td>

            <td class="td_l_c"><?php echo $row['addtime'] ?></td>


        </tr>
    <?php } ?>
</table>