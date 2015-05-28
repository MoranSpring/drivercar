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
border: 0px solid #fff;
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
<body>
    <header data-am-widget="header" class="am-header am-header-default">
        <div class="am-header-left am-header-nav" >
            <a href="#left-link" class="" >
                <i class="am-header-icon am-icon-home am-icon">&nbsp</i>
            </a>
        </div>
        <h1 class="am-header-title">
            <a href="#title-link" class="">我爱开车网</a>
        </h1>
    </header>
    <?= $menu ?>
    <h2 style="text-align:center"><a style="color:#ff4b4b" href="#">这是一个头条,也是链接</a></h2>
    <div style="text-align:center"><a style="color:#000000" href="#">这是一个新闻</a>  <a style="color:#000000" href="#">这是一个新闻</a></div>
    <div style="text-align:center"><a style="color:#000000" href="#">这还是一个新闻</a></div>
    <div class="am-slider am-slider-default" data-am-flexslider>
        <ul class="am-slides">
            <li><img src="http://image.52drivecar.com/news_imges/1429669168.jpg" /></li>
            <li><img src="http://image.52drivecar.com/news_imges/1429461478.jpg" /></li>
        </ul>
    </div>

    <div class="am-panel am-panel-default">
        <div class="am-panel-hd">
            <h2 class="am-panel-title"><strong>新闻</strong></h2>
        </div>
    <ul class="am-list ">
            <li><a href="#" class="am-text-truncate">每个人都有一个死角， 自己走不出</a></li>
            <li><a href="#" class="am-text-truncate">每个人都有一个死角， 自己</a></li>
            <li><a href="#" class="am-text-truncate">每个人都有一个死角</a></li>
            <li><a href="#" class="am-text-truncate">每个人都有一个死角</a></li>
    <div class="am-panel am-panel-default">
        <div class="am-panel-hd">
            <h2 class="am-panel-title"><strong>资讯</strong></h2>
        </div>
    <ul class="am-list ">
            <li><a href="#" class="am-text-truncate">每个人都有一个死角， 自己走不出</a></li>
            <li><a href="#" class="am-text-truncate">每个人都有一个死角， 自己</a></li>
            <li><a href="#" class="am-text-truncate">每个人都有一个死角</a></li>
            <li><a href="#" class="am-text-truncate">每个人都有一个死角</a></li>
</body>