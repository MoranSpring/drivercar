<tr>
 <td><?=$book_date?></td>
    <td>第<?=$book_cls_num?>节</td>
    <td><a   target='_blank' href="<?=  base_url()?>index.php/first/school_info/<?=$book_sch_id?>"><?=$sch_name?></a></td>
    <td><a   target='_blank' href="<?=  base_url()?>index.php/first/coach_self_info/<?=$book_coa_id?>"><?=$coa_name?></a></td>
    <td><?=$book_cls_name?></td>
    <td>100积分</td>
    <td class="<?php if($book_state==7)  echo 'unbook_end'; else echo 'unbook';?>" book_id="<?=$book_id?>">
        <?php if($book_state==7)  echo '已申请'; else echo '申请退订';?></td>
</tr>
