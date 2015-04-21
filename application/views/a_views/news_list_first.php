<div>
    <ul class="news-list-wrap clearfix">
        <li style="width:25%">
            <img src="<?= $news_imge?>@!subtopnews" style="width:100%;height:116px;"/>
        </li>
        <li  style="padding-left:10px;width:75%;height:100%">
            <a href="<?= base_url()?>index.php/first/news/<?=$news_id?>"><div style="font-size: 1.3em;"><?=$news_title?></div></a>
            <div style="color:#777;line-height: 1em;font-size: 0.9em;margin-top: 10px;"><?= $news_mainidea ?></div>
            <div style="font-size: 0.8em;line-height: 1.5em;position:absolute;top:110px;"><a><?= $news_author?></a>   <?=$news_date?>   阅读（89）</div>
        </li>
    </ul>
</div>