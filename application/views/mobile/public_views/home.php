<style>
    .box {
        border-bottom: 1px solid #ddd;
        border-right: 1px solid #ddd;
        color: #000;
        text-align: center;
        font-weight: bold;
        transition: all .2s ease;
    }
    .box-top{
        border-top: 1px solid #ddd;
    }
    .box-reight{
        border-right: 1px solid #fff  !important;
    }
    .unview{
        display:none;
    }
</style>    
<header data-am-widget="header" class="am-header am-header-default ml-color-bg-main">
    <div class="am-header-nav am-dropdown " data-am-dropdown>

        <a href="#left-link" class="am-text-center <?php if ($islogin == 1) echo 'am-dropdown-toggle'; ?> " style="height:49px;font-size:1.2em;position: relative;left:-10px;padding-left: 10px;">
            <span class="am-header-icon am-icon-envelope-o am-icon" style="position: relative;font-size:1.3em">&nbsp</span>
            <div class="<?php if ($islogin == 0) echo 'unview'; ?>" style="position: relative;top:-37px;right:-20px;width:10px;height:10px;border-radius: 50%;background: #f00;"></div>
        </a>
        <div class="am-dropdown-content am-text-sm" style="width:168px;color:#000;padding:0;">
            <ul class="am-list am-list-static" style="border:0;margin-bottom: 2px;">
                <li onclick="javascript:window.location.href = '<?= base_url() ?>index.php/mobile/management'"  class="ml-ontouch" style="border:0px;border-bottom: 1px dashed #ccc;margin-bottom: 0px;padding-right: 5px;padding-left: 5px;">
                    <span class="am-badge am-badge-danger am-round" ><?= $un_study ?></span>
                    预约提醒
                </li>
                <li onclick="javascript:window.location.href = '<?= base_url() ?>index.php/mobile/management'" class="ml-ontouch" style="border:0px;border-bottom: 1px dashed #ccc;margin-bottom: 0px;padding-right: 5px;padding-left: 5px;">
                    <span class="am-badge am-badge-danger am-round" >8</span>
                    教练建议
                </li>
                <li onclick="javascript:window.location.href = '<?= base_url() ?>index.php/mobile/management'" class="ml-ontouch" style="border:0px;margin-bottom: -2px;padding-right: 5px;padding-left: 5px;">
                    <span class="am-badge am-badge-danger am-round" ><?php
                        if (isset($un_comment) && $un_comment > 0)
                            echo $un_comment;
                        ?></span>
                    待评价
                </li>
            </ul>
        </div>
    </div>
    <h1 class="am-header-title">
        <a href="#title-link" class="">我爱开车网</a>
    </h1>
</header>
<?= $menu ?>
<div class="am-margin-sm">
    <div data-am-widget="slider" class="am-slider  am-slider-c3 " style="min-height: 177px;" data-am-slider='{&quot;controlNav&quot;:false}'>
        <ul class="am-slides" onclick="javascript:window.location.href = '<?= base_url() ?>index.php/mobile/news'">
            <li>
                <img src="<?=$topNewsUrl?>@!topnews">
                <div class="am-slider-desc am-text-xs">
                    <div class="am-slider-counter ml-color-bg-main">
                        <span class="am-active">1</span>/3</div><?=$topNewsTitle?></div>
            </li>
            <li>
                <img src="<?=$sub1NewsUrl?>@!topnews">
                <div class="am-slider-desc am-text-xs">
                    <div class="am-slider-counter ml-color-bg-main">
                        <span class="am-active">2</span>/3</div><?=$sub1NewsTitle?></div>
            </li>
            <li>
                <img src="<?=$sub2NewsUrl?>@!topnews">
                <div class="am-slider-desc am-text-xs">
                    <div class="am-slider-counter ml-color-bg-main">
                        <span class="am-active">3</span>/3</div><?=$sub2NewsTitle?></div>
            </li>
        </ul>
    </div>
</div>
<div>
    <ul class="am-avg-sm-4 boxes">
        <li class="box box-top ml-ontouch">
            <a href="<?= base_url() ?>index.php/mobile/study_book" style="height: 100%">
                <img class="home-img" src="http://image.52drivecar.com/images/mobile/coach_book.png" style="width:100%;"/>
            </a>
        </li>
        <li class="box box-top ml-ontouch">
            <a href="<?= base_url() ?>index.php/mobile/main_school_list" style="height: 100%">
                <img class="home-img" src="http://image.52drivecar.com/images/mobile/school.png" style="width:100%;"/>
            </a>
        </li>
        <li class="box box-top ml-ontouch">
            <a href="<?= base_url() ?>index.php/mobile/main_coach_list" style="height: 100%">
                <img class="home-img" src="http://image.52drivecar.com/images/mobile/coach.png" style="width:100%;"/>
            </a>
        </li>
        <li class="box box-top box-reight ml-ontouch">
            <a href="<?= base_url() ?>index.php/mobile/news" style="height: 100%">
                <img class="home-img" src="http://image.52drivecar.com/images/mobile/news.png" style="width:100%;"/>
            </a>
        </li>
        <li class="box box-bottom ml-ontouch">
            <a href="<?= base_url() ?>index.php/mobile/map_main" style="height: 100%">
                <img class="home-img" src="http://image.52drivecar.com/images/mobile/coach_book.png" style="width:100%;"/>
            </a>
        </li>
        <li class="box box-bottom ml-ontouch">
            <a href="<?= base_url() ?>index.php/mobile/register" style="height: 100%">
                <img class="home-img" src="http://image.52drivecar.com/images/mobile/coach_book.png" style="width:100%;"/>
            </a>
        </li>
        <li class="box box-bottom ml-ontouch">
            <a href="" style="height: 100%">
                <img class="home-img" src="http://image.52drivecar.com/images/mobile/coach_book.png" style="width:100%;"/>
            </a>
        </li>
        <li class="box box-bottom box-reight ml-ontouch">
            <a href="<?= base_url() ?>index.php/mobile/article" style="height: 100%">
                <img class="home-img" src="http://image.52drivecar.com/images/mobile/coach_book.png" style="width:100%;"/>
            </a>
        </li>

    </ul>
</div>






