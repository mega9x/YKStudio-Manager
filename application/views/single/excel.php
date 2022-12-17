<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<table width="100%" border="1" cellpadding="0" cellspacing="0">
    <td class="td_l_c">���</td>
    <td class="td_l_l">�ͻ�����</td>

    <td class="td_l_c">��������</td>


    <td class="td_l_c">��������</td>


    <td class="td_l_c">��������</td>

    <td class="td_l_c">�´���ϵ</td>

    <td class="td_l_l">��ϸ����</td>


    <td class="td_l_c">ҵ��Ա</td>


    <td class="td_l_c">¼��ʱ��</td>


    </tr>

    <?php foreach ($list as $arr => $row) { ?>
        <tr class="tr">
            <td class="td_l_c"><?php echo $row['id'] ?></td>
            <td class="td_l_l"><?php echo iconv("UTF-8", "gbk//TRANSLIT", $row['customername']); ?></td>

            <td class="td_l_c"><?php echo iconv("UTF-8", "gbk//TRANSLIT", $row['type']); ?></td>


            <td class="td_l_c"><?php echo iconv("UTF-8", "gbk//TRANSLIT", $row['state']); ?></td>


            <td class="td_l_c"><?php echo iconv("UTF-8", "gbk//TRANSLIT", $row['linkman']); ?></td>


            <td class="td_l_c"><?php echo $row['nexttime'] ?></td>


            <td class="td_l_l"
                style="line-height:25px;"><?php echo iconv("UTF-8", "gbk//TRANSLIT", $row['content']); ?></td>


            <td class="td_l_c"><?php echo iconv("UTF-8", "gbk//TRANSLIT", $row['adduser']); ?></td>

            <td class="td_l_c"><?php echo $row['adddate'] ?></td>

        </tr>

    <?php } ?>
</table>
 
  