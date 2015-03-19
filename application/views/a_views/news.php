<div id="content" class="clearfix">
    <div id="con-left">
        <ul>
                    <li><a href="<?=base_url() . 'index.php/first/sch_info'?>"><span>驾培资讯</span></a></li>
                    <li><a href="<?=base_url() . 'index.php/first/pos_info'?>"><span>培训点信息</span></a></li>
                    <li><a href="<?=base_url() . 'index.php/first/ser_info'?>"><span>服务指南</span></a></li>
                    <li><a href="<?=base_url() . 'index.php/first/coach_info'?>"><span>教练信息</span></a></li>
                    <li><a href="<?=base_url() . 'index.php/first/sch_info'?>"><span>教学大纲</span></a></li>
                </ul>
    </div>
    <div id="con-right">
        <div id="con-nav">
            <p><a href="void">首页</a> > <a href="void"> 驾培首页</a> > <a href="void"> 驾培资讯</a>> 新闻</p>
        </div>
        <div id="con-con" class ="real_content artical">
            <h2 class="headline"><?=$news_title?></h2><br/>
            <div><?=$news_date?></div>
            <div>来源：中国新闻网</div><br/>
            <img  src="<?=$news_imge?>"/>  <br/><br/>           
            <p>
                <?=$news_content?>
                
            </p>
        </div>
    </div>

</div>

