<style>
    .ck-slide { width: 523px; height: 250px;}
    .ck-slide ul.ck-slide-wrapper { height: 250px;}
</style>
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<link rel="stylesheet" href="<?= base_url() ?>application/css/slide.css">
<script src="<?= base_url() ?>application/js/slide.js"></script>

<div id="content" class="clearfix">
    <div id="con-left">
        <ul>
            <li><a href="<?= base_url() . 'index.php/first/sch_info' ?>"><span>驾培资讯</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/pos_info' ?>"><span>培训点信息</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/ser_info' ?>"><span>服务指南</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/coach_info' ?>"><span>教练信息</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/sch_info' ?>"><span>教学大纲</span></a></li>
        </ul>
    </div>
    <div id="con-right" style="background: #f0f0f0;">
        <div class="ck-slide">
            <ul class="ck-slide-wrapper">
                <li>
                    <a href=""><img src="<?= base_url() ?>application/images/schimg.png"  alt=""></a>
                </li>
                <li style="display:none">
                    <a href=""><img src="<?= base_url() ?>application/images/schimg.png"   alt=""></a>
                </li>
                <li style="display:none">
                    <a href="javascript:"><img src="<?= base_url() ?>application/images/schimg.png" alt=""></a>
                </li>
                <li style="display:none">
                    <a href="javascript:"><img src="<?= base_url() ?>application/images/schimg.png" alt=""></a>
                </li>
                <li style="display:none">
                    <a href="javascript:"><img src="<?= base_url() ?>application/images/schimg.png" alt=""></a>
                </li>
            </ul>
            <a href="javascript:;" class="ctrl-slide ck-prev">上一张</a>
            <a href="javascript:;" class="ctrl-slide ck-next">下一张</a>
            <div class="ck-slidebox">
                <div class="slideWrap">
                    <ul class="dot-wrap">
                        <li class="current"><em>1</em></li>
                        <li><em>2</em></li>
                        <li><em>3</em></li>
                        <li><em>4</em></li>
                        <li><em>5</em></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
     <div style="float: right;">
        <ul>
            <li><a href="<?= base_url() . 'index.php/first/sch_info' ?>"><span>驾培资讯</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/pos_info' ?>"><span>培训点信息</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/ser_info' ?>"><span>服务指南</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/coach_info' ?>"><span>教练信息</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/sch_info' ?>"><span>教学大纲</span></a></li>
        </ul>
    </div>
</div>
<script>
    $('.ck-slide').ckSlide({
        dir: 'x'
    });
</script>