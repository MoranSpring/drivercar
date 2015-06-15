<tr>
    <td><?=$book_date?></td>
    <td>第<?=$book_cls_num?>节</td>
    <td><a   target='_blank' href="<?=  base_url()?>index.php/first/school_info/<?=$book_sch_id?>"><?=$jp_name?> </a></td>
    <td><a   target='_blank' href="<?=  base_url()?>index.php/first/coach_self_info/<?=$book_coa_id?>"><?=$coach_name?></a></td>
    <td><?=$course?></td>
    <td><span class=""  style="font-weight: bold;"><?=$coach_cls_cost?></span>&nbsp;C币</td>
    <td class="<?php if($com_id!='')  echo 'unbook_end'; else echo 'teach-comment';?>" value="<?=$book_id?>">
        <?php if($com_id!='')  echo '已评价'; else echo '评价';?></td>
</tr>
