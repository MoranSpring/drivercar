<div class="am-margin-xs" style="border:1px solid #ddd">
    <div class="am-g am-padding-top-sm am-padding-bottom-sm" style="background:#eee">
        <div class="am-u-sm-3 am-u-md-3">
            <span class="am-badge am-text-default  am-badge-secondary" >科目二</span>
        </div>
        <div class="am-u-sm-5 am-u-md-5 am-text-center">
            <?=$book_date?>
        </div>
        <div class="am-u-sm-3 am-u-md-3 am-text-center">
            第<?=$book_cls_num?>节
        </div>

    </div>
    <div class="am-g am-padding-sm am-text-sm" style="background:#fff">
        <div class="am-u-sm-8 am-u-md-8 ">
            <span class=""><a   target='_blank' href="<?=  base_url()?>index.php/first/school_info/<?=$book_sch_id?>"><?=$sch_name?></a></span>
        </div>
        <div class="am-u-sm-4 am-u-md-4">
            <span><a   target='_blank' href="<?=  base_url()?>index.php/first/coach_self_info/<?=$book_coa_id?>"><?=$coa_name?></a></span>
        </div>
    </div>
    <div class="am-g am-padding-xs" style="border-top: 1px solid #eee">
        <div class="am-u-sm-5 am-u-md-5"><span class="am-text-sm" style="line-height: 35px">消费<span class="am-icon-rmb" style="color:#900;font-weight: bold;">100</span>分</div>
        <div class="am-u-sm-3 am-u-md-3"><lable type="button" class="am-btn  am-radius am-btn-danger am-btn-sm <?php if($book_state==7)  echo 'unbook_end'; else echo 'unbook';?>"><?php if($book_state==7)  echo '已申请'; else echo '申请退订';?></lable></div>
        <div class="am-u-sm-4 am-u-md-4 am-text-sm am-text-right">
            <a href='http//:www.baidu.com'  style="color:#999;line-height: 35px">详情>></a>
        </div>
    </div>
</div>
<!--  分割线 --><div class="am-margin-top am-margin-bottom" style="width:100%;border-bottom: 1px dotted #ddd"></div>

