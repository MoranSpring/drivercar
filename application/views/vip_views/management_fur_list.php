<tr>
 <td class="this-date"><?=$book_date?></td>
    <td>第<?=$book_cls_num?>节</td>
    <td><a   target='_blank' href="<?=  base_url()?>index.php/first/school_info/<?=$book_sch_id?>"><?=$jp_name?></a></td>
    <td><a   target='_blank' href="<?=  base_url()?>index.php/first/coach_self_info/<?=$book_coa_id?>"><?=$coach_name?></a></td>
    <td><?=$course?></td>
    <td><span style="font-weight: bold;color:#b00;"><?=$coach_cls_cost?></span>&nbsp;C币</td>
    <td class="<?php if($book_state==7)  echo 'unbook_end'; else echo 'unbook';?>" book_id="<?=$book_id?>">
        <?php if($book_state==7)  echo '已申请'; else echo '申请退订';?></td>
</tr>
