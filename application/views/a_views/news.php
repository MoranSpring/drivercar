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
    <div id="con-right">
        <div id="con-nav">
            <p> <a href="<?= base_url() . 'index.php/first/sch_info' ?>"> 驾培资讯</a> >> 新闻</p>
        </div>
        <hr data-am-widget="divider" style="" class="am-divider am-divider-sm"/>
        <div id="con-con" class ="real_content artical">
            <h2 class="headline"><?= $news_title ?></h2>
            <div><?= $news_date ?></div>
            <div><?= $news_author ?></div><br/>
            <img  src="<?= $news_imge ?>"/>  <br/>   <br/>      
            <p>
                <?= $news_content ?>

            </p>
        </div>
    </div>

</div>

