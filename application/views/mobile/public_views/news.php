<style>
    *+h1, *+h2, *+h3, *+h4, *+h5, *+h6 {
        margin-top: 10;
        margin-bottom: 5;
    }
    .am-list>li {
        position: relative;
        display: block;
        margin-bottom: -1px;
        background-color: #fff;
        border: 0px solid #f0f0f0;
        line-height:38px;
        border-width: 1px 0;
    }
    .am-panel>.am-list>li>a {
        /* padding-left: 0; */
        /* padding-right: 0; */
        padding: 2;
        margin: 0;
        list-style: none;
        font-style: normal;
        color: black;
    }
</style>
<header data-am-widget="header" class="am-header am-header-default ml-color-bg-main">
    <div class="am-header-left am-header-nav" >
        <a href="javascript:history.back();">
            <img class="am-header-icon-custom" src="data:image/svg+xml;charset=utf-8,&lt;svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 12 20&quot;&gt;&lt;path d=&quot;M10,0l2,2l-8,8l8,8l-2,2L0,10L10,0z&quot; fill=&quot;%23fff&quot;/&gt;&lt;/svg&gt;"
                 alt="" />&nbsp;
        </a>
    </div>
    <h1 class="am-header-title">
        <a href="#title-link" class="">我爱开车网</a>
    </h1>
</header>
<?= $menu ?>
<h2 style="text-align:center;line-height: 40px;"><a style="color:#ff4b4b" href="<?=  base_url()?>index.php/mobile/article/<?=$topNewsId?>"><?=$topNewsTitle?></a></h2>
<div style="text-align:center;line-height: 40px;"><a style="color:#000000" href="<?=  base_url()?>index.php/mobile/article/<?=$sub1NewsId?>"><?=$sub1NewsTitle?></a></div>
<div style="text-align:center;line-height: 40px;"><a style="color:#000000" href="<?=  base_url()?>index.php/mobile/article/<?=$sub2NewsId?>"><?=$sub2NewsTitle?></a></div>
<div class="am-slider am-slider-default" data-am-flexslider>
    <ul class="am-slides">
        <li><img src="<?=$topNewsUrl?>" /></li>
        <li><img src="<?=$sub1NewsUrl?>" /></li>
        <li><img src="<?=$sub2NewsUrl?>" /></li>
    </ul>
</div>

<div class="am-panel am-panel-default">
    <div class="am-panel-hd">
        <h2 class="am-panel-title"><strong>行业新闻</strong></h2>
    </div>
    <ul class="am-list ">
        <?php if(isset($news1)) foreach ($news1 as $row) echo $row;?>
         </ul>
    <div class="am-panel am-panel-default">
        <div class="am-panel-hd">
            <h2 class="am-panel-title"><strong>政策解读</strong></h2>
        </div>
        <ul class="am-list ">
             <?php if(isset($news2)) foreach ($news2 as $row) echo $row;?>
        </ul>
    </div>
    <div class="am-panel am-panel-default">
        <div class="am-panel-hd">
            <h2 class="am-panel-title"><strong>法律法规</strong></h2>
        </div>
        <ul class="am-list ">
            <?php if(isset($news3))  foreach ($news3 as $row) echo $row;?>
        </ul>
    </div>
    <div class="am-panel am-panel-default">
        <div class="am-panel-hd">
            <h2 class="am-panel-title"><strong>学车资讯</strong></h2>
        </div>
        <ul class="am-list ">
             <?php if(isset($news4))  foreach ($news4 as $row) echo $row;?>
        </ul>
    </div>
    <div class="am-panel am-panel-default">
        <div class="am-panel-hd">
            <h2 class="am-panel-title"><strong>学车须知</strong></h2>
        </div>
        <ul class="am-list ">
             <?php if(isset($news5)) foreach ($news5 as $row) echo $row;?>
        </ul>
    </div>
    <div class="am-panel am-panel-default">
        <div class="am-panel-hd">
            <h2 class="am-panel-title"><strong>学车流程</strong></h2>
        </div>
        <ul class="am-list ">
             <?php if(isset($news6)) foreach ($news6 as $row) echo $row;?>
        </ul>
    </div>
</div>