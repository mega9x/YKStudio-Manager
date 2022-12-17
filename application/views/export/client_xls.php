<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<table width="100%" cellpadding="0" cellspacing="0" border="1">
    <tr>
        <?php if (isset($Exportitem1)) { ?>
            <td width="50">编号</td>
        <?php } ?>
        <?php if (isset($Exportitem4)) { ?>
            <td width="180">任务名称</td>
        <?php } ?>
        <?php if (isset($Exportitem5)) { ?>
            <td width="100">所在地区</td>
        <?php } ?>
        <?php if (isset($Exportitem5)) { ?>
            <td width="100">账户信息</td>
        <?php } ?>
        <?php if (isset($Exportitem11)) { ?>
            <td width="100">转化情况</td>
        <?php } ?>
        <?php if (isset($Exportitem6)) { ?>
            <td width="100">任务要求</td>
        <?php } ?>
        <?php if (isset($Exportitem7)) { ?>
            <td width="120">任务类型</td>
        <?php } ?>
        <?php if (isset($Exportitem10)) { ?>
            <td width="80">商品大类</td>
        <?php } ?>
        <?php if (isset($Exportitem10)) { ?>
            <td width="80">商品小类</td>
        <?php } ?>
        <?php if (isset($Exportitem12)) { ?>
            <td width="80">流量状况</td>
        <?php } ?>
        <?php if (isset($Exportitem13)) { ?>
            <td width="80">所属联盟</td>
        <?php } ?>
        <?php if (isset($Exportitem18)) { ?>
            <td width="80">任务链接</td>
        <?php } ?>
        <?php if (isset($Exportitem19)) { ?>
            <td width="80">任务链接</td>
        <?php } ?>
        <?php if (isset($Exportitem20)) { ?>
            <td width="100">合作站点</td>
        <?php } ?>
        <?php if (isset($Exportitem2)) { ?>
            <td width="100">录入时间</td>
        <?php } ?>
        <?php if (isset($Exportitem3)) { ?>
            <td width="80">最后更新</td>
        <?php } ?>
        <?php if (isset($Exportitem21)) { ?>
            <td width="100">下次跟进</td>
        <?php } ?>
        <?php if (isset($Exportitem22)) { ?>
            <td width="100">交付订单</td>
        <?php } ?>
        <?php if (isset($Exportitem23)) { ?>
            <td width="100">合同到期</td>
        <?php } ?>
        <?php if (isset($Exportitem17)) { ?>
            <td width="80">业务员</td>
        <?php } ?>
    </tr>

    <?php foreach ($list as $arr => $row) { ?>
        <tr class="tr">
            <?php if (isset($Exportitem1)) { ?>
                <td><?php echo $row['id'] ?></td>
            <?php } ?>
            <?php if (isset($Exportitem4)) { ?>
                <td><?php echo $row['company'] ?></td>
            <?php } ?>
            <?php if (isset($Exportitem5)) { ?>
                <td><?php echo $row['area'] ?>&nbsp;&nbsp;<?php echo $row['square'] ?></td>
            <?php } ?>
            <?php if (isset($Exportitem5)) { ?>
                <td><?php echo $row['address'] ?></td>
            <?php } ?>
            <?php if (isset($Exportitem11)) { ?>
                <td><?php echo $row['type'] ?></td>
            <?php } ?>
            <?php if (isset($Exportitem6)) { ?>
                <td><?php echo $row['tel'] ?></td>
            <?php } ?>
            <?php if (isset($Exportitem7)) { ?>
                <td><?php echo $row['tel'] ?></td>
            <?php } ?>
            <?php if (isset($Exportitem10)) { ?>
                <td><?php echo $row['trade'] ?></td>
            <?php } ?>
            <?php if (isset($Exportitem10)) { ?>
                <td><?php echo $row['trade'] ?></td>
            <?php } ?>

            <td><?php echo $row['start'] ?></td>

            <?php if (isset($Exportitem13)) { ?>
                <td><?php echo $row['source'] ?></td>
            <?php } ?>
            <?php if (isset($Exportitem18)) { ?>
                <td><?php echo $row['linkman'] ?></td>
            <?php } ?>
            <?php if (isset($Exportitem19)) { ?>
                <td><?php echo $row['zhiwei'] ?></td>
            <?php } ?>
            <?php if (isset($Exportitem20)) { ?>
                <td><?php echo $row['mobile'] ?></td>
            <?php } ?>
            <td><?php echo $row['linkman'] ?></td>
            <td><font color=red>0 </font>天前</td>
            <td></td>
            <td></td>
            <td></td>
            <?php if (isset($Exportitem17)) { ?>
                <td><?php echo $row['user'] ?></td>
            <?php } ?>
        </tr>
    <?php } ?>
</table>