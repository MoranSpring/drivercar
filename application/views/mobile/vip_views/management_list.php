<div class="am-margin-xs" style="background:#fff;border:1px solid #ddd">
    <div class="am-g am-padding-top-sm am-padding-bottom-sm" style="background:#fafafa">
        <div class="am-u-sm-3 am-u-md-3">
            <span class="am-badge am-text-default  am-badge-secondary" ><?=$course?></span>
        </div>
        <div class="am-u-sm-5 am-u-md-5 am-text-center">
            <?=$book_date?>
        </div>
        <div class="am-u-sm-3 am-u-md-3 am-text-center">
           第<?=$book_cls_num?>节
        </div>

    </div>
    <div class="am-g am-padding-sm am-text-sm">
        <div class="am-u-sm-8 am-u-md-8 ">
            <span class=""><a   target='_blank' href="<?=  base_url()?>index.php/first/school_info/<?=$book_sch_id?>"><?=$sch_name?> </a></span>
        </div>
        <div class="am-u-sm-4 am-u-md-4">
            <span> <a   target='_blank' href="<?=  base_url()?>index.php/first/coach_self_info/<?=$book_coa_id?>"><?=$coa_name?></a></span>
        </div>
    </div>
    <div class="am-g am-padding-xs" style="border-top: 1px solid #eee">
        <div class="am-u-sm-5 am-u-md-5"><span class="am-text-sm" style="line-height: 35px">消费<span class="" style="color:#900;font-weight: bold;">100</span>分</div>
        <div class="am-u-sm-3 am-u-md-3"><lable type="button" class="am-btn  am-radius am-btn-success am-btn-sm <?php if($exist==1)  echo 'unbook_end'; else echo 'teach-comment';?>"  value="<?=$book_id?>"><?php if($exist==1)  echo '已评价'; else echo '评价';?></lable></div>
        <div class="am-u-sm-4 am-u-md-4 am-text-sm am-text-right">
            <a href='<?=base_url()?>index.php/mobile/book_detail?id=<?=$book_id?>&isFinish=0'  style="color:#999;line-height: 35px">详情>></a>
        </div>
    </div>
</div>
<!--  分割线 --><div class="am-margin-top am-margin-bottom" style="width:100%;border-bottom: 1px dotted #bbb"></div>

