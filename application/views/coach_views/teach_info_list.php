<tr>
    <td><?=$stu_name?></td>
    <td><?=$sch_name?></td>
    <td><?=$book_cls_name?></td>
    <td><?=$book_date?></td>
    <td>第<?=$book_cls_num?>节</td>
    <td>205</td>
    <td class="<?php if($book_suggest!="")  echo 'unbook_end'; else echo 'teach-comment';?>" value="<?=$book_id?>">
        <?php if($book_suggest!="")  echo '已建议'; else echo '建议';?></td>
</tr>

