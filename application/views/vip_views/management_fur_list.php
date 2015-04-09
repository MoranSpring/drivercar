<tr>
 <td><?=$book_date?></td>
    <td>第<?=$book_cls_num?>节</td>
    <td><?=$sch_name?> </td>
    <td><?=$coa_name?></td>
    <td><?=$book_cls_name?></td>
    <td>100积分</td>
    <td class="<?php if($book_state==7)  echo 'unbook_end'; else echo 'unbook';?>" book_id="<?=$book_id?>">
        <?php if($book_state==7)  echo '已申请'; else echo '申请退订';?></td>
</tr>
