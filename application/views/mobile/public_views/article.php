<header data-am-widget="header" class="am-header am-header-default ml-color-bg-main">
    <div class="am-header-left am-header-nav" >
        <a href="javascript:history.back();">
            <img class="am-header-icon-custom" src="data:image/svg+xml;charset=utf-8,&lt;svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 12 20&quot;&gt;&lt;path d=&quot;M10,0l2,2l-8,8l8,8l-2,2L0,10L10,0z&quot; fill=&quot;%23fff&quot;/&gt;&lt;/svg&gt;"
                 alt="" />&nbsp;
        </a>
    </div>
    <h1 class="am-header-title">
        <a href="#title-link" class="">新闻</a>
    </h1>
</header>
<div class="am-padding-sm" style="background: #fff;">
    <article class="am-article">
        <div class="am-article-hd am-margin-top">
            <h1 class="am-article-title" style="font-size: 1.5em"><?=$news_title?></h1>
            <p class="am-article-meta"><?=$news_author?><br/><?=$news_date?></p>
        </div>
        <div class="am-margin-top-sm am-margin-bottom-sm">
            <img class="am-img-thumbnail" src="<?=$news_imge?>@!newsimg"/>

</figure>
    </div>
        <div class="am-article-bd" style="font-size:1.8rem;">
            <p class="am-article-lead"><?=$news_mainidea?></p>
            <?=$news_content?>
        </div>
</div>
</article>

