<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<table width="100%" cellpadding="0" cellspacing="0" border="1">
    <tr>

        <td width="80" class="td_l_c">���</td>
        <td class="td_l_l">�ͻ�����</td>

        <td class="td_l_c">��ϵ��</td>


        <td class="td_l_c">�µ�����</td>


        <td class="td_l_c">��������</td>

        <td class="td_l_c">�������</td>

        <td class="td_l_c">״̬</td>

        <td class="td_l_c">ҵ��Ա</td>


        <td class="td_l_c">¼��ʱ��</td>

    </tr>

    <?php foreach ($list as $arr => $row) { ?>
        <tr class="tr">
            <td class="td_l_c"><?php echo $row['id'] ?></td>
            <td class="td_l_l"><?php echo iconv("UTF-8", "gbk//TRANSLIT", $row['customername']); ?></td>

            <td class="td_l_c"><?php echo iconv("UTF-8", "gbk//TRANSLIT", $row['linkman']); ?></td>


            <td class="td_l_c"><?php echo $row['sdate'] ?></td>


            <td class="td_l_c"><?php echo $row['edate'] ?></td>


            <td class="td_l_c"><?php echo $row['money'] ?></td>

            <td class="td_l_c">
                <?php echo iconv("UTF-8", "gbk//TRANSLIT", $audit[$row['state']]); ?>
            </td>


            <td class="td_l_c"> <?php echo iconv("UTF-8", "gbk//TRANSLIT", $row['adduser']); ?>
            </td>


            <td class="td_l_c"><?php echo $row['addtime'] ?></td>


        </tr>
    <?php } ?>
</table>