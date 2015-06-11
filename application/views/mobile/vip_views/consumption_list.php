<li style="padding:3px 5px 3px 5px;">
    <div style="font-size:0.8em;color: #bbb;"><?=$csm_date?></div>
    <div class='am-g'>
        <div class='am-u-sm-4' style="padding:0;">
            <?=$csm_type?>
        </div>
        <div class='am-u-sm-4 am-text-center' style="padding:0;">
            <?php if($csm_in_out==1)echo '支出';else echo '收入';?>
        </div>
        <div class='am-u-sm-4 am-text-right' style="padding:0;">
            <span class='ml-color-currency'><?php 
            if($csm_in_out==1)
                echo '-'.$csm_coin;
            else 
                echo '+'.$csm_coin;
            ?></span>&nbsp;C币
        </div>
</li>
