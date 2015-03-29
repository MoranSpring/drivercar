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
        <div id="con-con" class ="real_content">
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
                </div>
                <div id="content2" style="display:none;" class="clearfix">
                    <!------------------------------------------------------>
                </div>
                <div id="content3" style="display:none" class="clearfix">
                    <?php foreach($news as $row) echo $row ?>
                </div>
                <div id="content4" style="display:none">content 4</div>
                <div id="content5" style="display:none">content 5</div>
                <div id="content6" style="display:none">content 6</div>

            </div>
        </div>

    </div>
</div>
