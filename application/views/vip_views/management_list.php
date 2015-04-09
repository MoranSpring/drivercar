<tr>
    <td><?=$book_date?></td>
    <td>第<?=$book_cls_num?>节</td>
    <td><?=$sch_name?> </td>
    <td><?=$coa_name?></td>
    <td><?=$book_cls_name?></td>
    <td>100积分</td>
    <td class="<?php if($exist==1)  echo 'unbook_end'; else echo 'teach-comment';?>" value="<?=$book_id?>">
        <?php if($exist==1)  echo '已评价'; else echo '评价';?></td>
</tr>
