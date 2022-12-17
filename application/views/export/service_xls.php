<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<table width="100%" border="1" cellpadding="0" cellspacing="0">
    <tr class="tr_b">
        <?php if (isset($Exportitem1)) { ?>
            <td width="80">编号</td>
        <?php } ?>
        <?php if (isset($Exportitem2)) { ?>
            <td>任务名称</td>
        <?php } ?>
        <?php if (isset($Exportitem4)) { ?>
            <td>反馈主题</td>
        <?php } ?>
        <?php if (isset($Exportitem5)) { ?>
            <td>任务链接</td>
        <?php } ?>
        <?php if (isset($Exportitem6)) { ?>
            <td>反馈分类</td>
        <?php } ?>
        <?php if (isset($Exportitem7)) { ?>
            <td>反馈日期</td>
        <?php } ?>
        <?php if (isset($Exportitem8)) { ?>
            <td>结束日期</td>
        <?php } ?>
        <?php if (isset($Exportitem9)) { ?>
            <td>详情备注</td>
        <?php } ?>
        <?php if (isset($Exportitem10)) { ?>
            <td width="60">是否解决</td>
        <?php } ?>
        <?php if (isset($Exportitem11)) { ?>
            <td>处理结果</td>
        <?php } ?>
        <?php if (isset($Exportitem12)) { ?>
            <td>业务员</td>
        <?php } ?>
        <?php if (isset($Exportitem13)) { ?>
            <td>录入时间</td>
        <?php } ?>

    </tr>
    <?php foreach ($list as $arr => $row) { ?>
        <tr class="tr">
            <?php if (isset($Exportitem1)) { ?>
                <td><?php echo $row['id'] ?></td>
            <?php } ?>
            <?php if (isset($Exportitem2)) { ?>
                <td><?php echo $row['company'] ?></td>
            <?php } ?>
            <?php if (isset($Exportitem4)) { ?>
                <td><?php echo $row['title'] ?></td>
            <?php } ?>
            <?php if (isset($Exportitem5)) { ?>
                <td><?php echo $row['linkman'] ?></td>
            <?php } ?>
            <?php if (isset($Exportitem6)) { ?>
                <td><?php echo $row['type'] ?></td>
            <?php } ?>
            <?php if (isset($Exportitem7)) { ?>
                <td><?php echo $row['sdate'] ?></td>
            <?php } ?>
            <?php if (isset($Exportitem8)) { ?>
                <td><?php echo $row['edate'] ?></td>
            <?php } ?>
            <?php if (isset($Exportitem9)) { ?>
                <td><?php echo $row['content'] ?></td>
            <?php } ?>
            <?php if (isset($Exportitem10)) { ?>
                <td><?php echo $row['issolve'] == 2 ? 'yes' : 'no' ?></td>
            <?php } ?>
            <?php if (isset($Exportitem11)) { ?>
                <td>
                    <a class="btn_sh1" onclick='Shouhou_InfoAudit1()'>已解决</a>
                </td>
            <?php } ?>
            <?php if (isset($Exportitem12)) { ?>
                <td><?php echo $row['user'] ?></td>
            <?php } ?>
            <?php if (isset($Exportitem13)) { ?>
                <td><?php echo $row['cdate'] ?></td>
            <?php } ?>

        </tr>

    <?php } ?>
</table>
</form>

</table>
