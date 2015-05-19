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
        <div id="con-nav">
            <p><a href="#">首页</a> >>驾培资讯</p>
        </div>
        <style>
            .news-wrap a:hover{
                text-decoration:underline;  
            }
            .news-wrap{
                width:100%;
            }
            .news-wrap li{
                float: left;
                list-style-type:none;
            }
            .news-list-wrap{
                width:100%;
                border-bottom:1px dashed #ccc;
                 padding:10px;
                height:136px;
                position:relative;
            }
            .news-list-wrap:hover{
                background:#ECEFF4;
            }
            .news-list-wrap li{
                float: left;
                list-style-type:none;
            }
            .news-title-main{
                padding:0 0 5px 10px; 
                position:relative;
                width:100%;
                height:74px;
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
        <div margin:10px;">
            <ul class="news-wrap clearfix">
                <li style="width:65%;overflow: hidden;border: 1px solid #aaa;background: #fff;">
                    <div class="news-title-main">
                        <div style="color:#FFF;font-size: 1.3em;line-height:2em"><a style="color:#fff;" href="<?= base_url()?>index.php/first/news/<?=$topNewsId[0]?>"><?=$topNewsTitle[0]?></a></div>
                    <div style="color:#ddd;font-size: 0.9em;line-height: 1em"><?=$topNewsMainidea[0]?></div>
                    </div>
                    <img class="am-img-responsive" style="width:100%;height:300px;position:relative; z-index: 9;margin-top:-83px;"  src="<?=$topNewsUrl[0]?>@!topnews"/>
                    <p style="padding-left:5px;"><span class="am-icon-certificate" style="padding-left:5px;color:green; line-height: 2.5em;"> <?=$topNewsAuthor[0]?></span>     <?=$topNewsTime[0]?></p>
                </li>
                <li  style="float: right;width:34%; border:0;">
                    <div style="overflow: hidden">
                        <img style="position:relative; z-index: 9;margin-bottom:-37px;" src="<?=$sub1NewsUrl[0]?>@!subtopnews" width="100%" height="165"/>
                        <p class="news-title-second" style="font-size: 0.9em;padding-left: 3px; color:#FFF;line-height: 2.5em;width:100%;text-overflow:ellipsis; height:2.5em"><a style="color:#fff;" href="<?= base_url()?>index.php/first/news/<?=$sub1NewsId[0]?>"><?=$sub1NewsTitle[0]?></a></p>
                    </div>
                     <div style="overflow: hidden;margin-top: 10px">
                    <img style="position:relative; z-index: 9;margin-bottom:-37px;" src="<?=$sub2NewsUrl[0]?>@!subtopnews" width="100%" height="165"/>
                    <p class="news-title-second" style="font-size: 0.9em;padding-left: 3px; color:#FFF;line-height: 2.5em;width:100%;text-overflow:ellipsis; height:2.5em"><a style="color:#fff;" href="<?= base_url()?>index.php/first/news/<?=$sub2NewsId[0]?>"><?=$sub2NewsTitle[0]?></a></p>
                    </div>
                </li>
            </ul>

        </div>



        <div id="con-con" class ="real_content" style="margin-top:20px;">
            <ul class="tab clearfix">
                <li id="one1" class="selected-li" onclick="setTab('one', 1, 6)">行业新闻</li>
                <li id="one2" onclick="setTab('one', 2, 6)">政策解读</li>
                <li id="one3" onclick="setTab('one', 3, 6)">法律法规</li>
                <li id="one4" onclick="setTab('one', 4, 6)">学车资讯</li>
                <li id="one5" onclick="setTab('one', 5, 6)">学车须知</li>
                <li id="one6" onclick="setTab('one', 6, 6)" style="border-right:1px solid #aaa;">学车流程</li>

            </ul>
            <div id="main_content" class="clearfix">
                <div id="content1" class="clearfix">
                    <?php
                    if (isset($news1)) {
                    foreach ($news1 as $row)
                    echo $row;
                    }?>
                </div>
                <div id="content2" style="display:none;" class="clearfix">
                    <?php
                    if (isset($news2)) {
                    foreach ($news2 as $row)
                    echo $row;
                    }?>
                    <!------------------------------------------------------>
                </div>
                <div id="content3" style="display:none" class="clearfix">
                    <?php
                    if (isset($news3)) {
                    foreach ($news3 as $row)
                    echo $row;
                    }?>
                </div>
                <div id="content4" style="display:none">
                    <?php
                     if (isset($news4)) {
                    foreach ($news4 as $row)
                        echo $row;
                     }?></div>
                <div id="content5" style="display:none">
                    <?php
                    if (isset($news5)) {
                        foreach ($news5 as $row)
                            echo $row;
                    }?></div>
                <div id="content6" style="display:none">
                    <?php
                    if (isset($news6)) {
                    foreach ($news6 as $row)
                        echo $row;
                    }?></div>

            </div>
        </div>

    </div>
</div>
<script>
    function onDisplay(num){}

</script>
