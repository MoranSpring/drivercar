<tr>
    <td><?=$book_date?></td>
    <td>第<?=$book_cls_num?>节</td>
    <td><a   target='_blank' href="<?=  base_url()?>index.php/first/school_info/<?=$book_sch_id?>"><?=$sch_name?> </a></td>
    <td><a   target='_blank' href="<?=  base_url()?>index.php/first/coach_self_info/<?=$book_coa_id?>"><?=$coa_name?></a></td>
    <td><?=$book_cls_name?></td>
    <td>100积分</td>
    <td class="<?php if($exist==1)  echo 'unbook_end'; else echo 'teach-comment';?>" value="<?=$book_id?>">
        <?php if($exist==1)  echo '已评价'; else echo '评价';?></td>
</tr>
