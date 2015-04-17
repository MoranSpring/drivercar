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
            <p><a href="void">首页</a> > <a href="void"> 驾培首页</a> >驾培资讯</p>
        </div>
        <style>
            .news-wrap{
                width:100%;
            }
            .news-wrap li{
                float: left;
                list-style-type:none;
            }
            .news-list-wrap{
                width:100%;
            }
            .news-list-wrap li{
                float: left;
                list-style-type:none;
            }
            .news-title-main{
                padding:10px; 
                position:relative;
                width:100%;
                z-index: 10;
                background: url("<?=base_url()?>application/images/alpha50.png");
            }
            .news-title-main:hover{
                background: url("<?=base_url()?>application/images/alpha70.png");
            }
             .news-title-second{
                position:relative;
                width:100%;
                z-index: 10;
                background: url("<?=base_url()?>application/images/alpha50.png");
            }
            .news-title-second:hover{
                background: url("<?=base_url()?>application/images/alpha70.png");
            }
        </style>
        <div stye="margin:10px;">
            <ul class="news-wrap clearfix">
                <li style="width:65%;overflow: hidden;border: 1px solid #aaa;">
                    <div class="news-title-main">
                    <h2 style="color:#FFF">疯狂的用车O2O：五大流派盘点</h2>
                    <div style="color:#ddd">打车、专车、拼车、租车、代驾……下一个会是？</div>
                    </div>
                    <img class="am-img-responsive" style="position:relative; z-index: 9;margin-top:-100px;"  src="http://images.huxiu.com/article/cover/201504/16/064957939469.jpg" width="100%"/>
                    <p>贾培文<span class="am-icon-certificate" style="color:green; line-height: 2em;">   </span>     2015-04-16 06:50</p>
                </li>
                <li  style="float: right;width:34%; border:0;">
                    <div style="overflow: hidden">
                        <img style="position:relative; z-index: 9;margin-bottom:-39px;" src="http://upload.huxiu.com/upload/anthology/20140312/f8268de3c8bbbf27424c212f3d33f084_thumb.jpg" width="100%" height="165"/>
                    <p class="news-title-second" style="padding-left: 3px; color:#FFF;line-height: 2.5em;width:100%;text-overflow:ellipsis; height:2.5em">写作是种高质量的社交</p>
                    </div>
                     <div style="overflow: hidden;margin-top: 15px">
                    <img style="position:relative; z-index: 9;margin-bottom:-39px;" src="http://upload.huxiu.com/upload/anthology/20140312/f8268de3c8bbbf27424c212f3d33f084_thumb.jpg" width="100%" height="165"/>
                    <p class="news-title-second" style="padding-left: 3px; color:#FFF;line-height: 2.5em;width:100%;text-overflow:ellipsis; height:2.5em">写作是种高质量作是种高质量的社交作是种高质量的社交的社交</p>
                    </div>
                </li>
            </ul>

        </div>



        <div id="con-con" class ="real_content" style="margin-top: 10px;">
            <ul class="tab">
                <li id="one1" class="selected-li" onclick="setTab('one', 1, 6)">行业新闻</li>
                <li id="one2" onclick="setTab('one', 2, 6)">政策解读</li>
                <li id="one3" onclick="setTab('one', 3, 6)">法律法规</li>
                <li id="one4" onclick="setTab('one', 4, 6)">学车资讯</li>
                <li id="one5" onclick="setTab('one', 5, 6)">学车须知</li>
                <li id="one6" onclick="setTab('one', 6, 6)">学车流程</li>

            </ul>
            <div id="main_content" class="clearfix">
                <div id="content1" class="clearfix">
                    <div style="border: 1px solid #aaa;">
                        <ul class="news-list-wrap clearfix">
                            <li style="width:25%">
                                <img style="padding:10px;"  src="http://upload.huxiu.com/upload/anthology/20140312/f8268de3c8bbbf27424c212f3d33f084_thumb.jpg" width="100%"/>
                            </li>
                            <li>
                                
                            </li>
                        </ul>
                    </div>
                    <?php
                    foreach ($news1 as $row)
                        echo $row
                        ?>
                </div>
                <div id="content2" style="display:none;" class="clearfix">
                    <?php
                    foreach ($news2 as $row)
                        echo $row
                        ?>
                    <!------------------------------------------------------>
                </div>
                <div id="content3" style="display:none" class="clearfix">
                    <?php
                    foreach ($news3 as $row)
                        echo $row
                        ?>
                </div>
                <div id="content4" style="display:none">
                    <?php
                    foreach ($news4 as $row)
                        echo $row
                        ?></div>
                <div id="content5" style="display:none">
                    <?php
                    if (isset($news5)) {
                        foreach ($news5 as $row)
                            echo $row;
                    }
                    ?></div>
                <div id="content6" style="display:none">
                    <?php
                    foreach ($news6 as $row)
                        echo $row
                        ?></div>

            </div>
        </div>

    </div>
</div>
