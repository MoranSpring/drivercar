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
    .swiper-container {
        margin:0 auto;
        position:relative;
        overflow:hidden;
        -webkit-backface-visibility:hidden;
        -moz-backface-visibility:hidden;
        -ms-backface-visibility:hidden;
        -o-backface-visibility:hidden;
        backface-visibility:hidden;
        /* Fix of Webkit flickering */
        z-index:1;
    }
    .swiper-wrapper {
        position:relative;
        width:100%;
        -webkit-transition-property:-webkit-transform, left, top;
        -webkit-transition-duration:0s;
        -webkit-transform:translate3d(0px,0,0);
        -webkit-transition-timing-function:ease;

        -moz-transition-property:-moz-transform, left, top;
        -moz-transition-duration:0s;
        -moz-transform:translate3d(0px,0,0);
        -moz-transition-timing-function:ease;

        -o-transition-property:-o-transform, left, top;
        -o-transition-duration:0s;
        -o-transform:translate3d(0px,0,0);
        -o-transition-timing-function:ease;
        -o-transform:translate(0px,0px);

        -ms-transition-property:-ms-transform, left, top;
        -ms-transition-duration:0s;
        -ms-transform:translate3d(0px,0,0);
        -ms-transition-timing-function:ease;

        transition-property:transform, left, top;
        transition-duration:0s;
        transform:translate3d(0px,0,0);
        transition-timing-function:ease;

        -webkit-box-sizing: content-box;
        -moz-box-sizing: content-box;
        box-sizing: content-box;
    }
    .swiper-free-mode > .swiper-wrapper {
        -webkit-transition-timing-function: ease-out;
        -moz-transition-timing-function: ease-out;
        -ms-transition-timing-function: ease-out;
        -o-transition-timing-function: ease-out;
        transition-timing-function: ease-out;
        margin: 0 auto;
    }
    .swiper-slide {
        float: left;
        -webkit-box-sizing: content-box;
        -moz-box-sizing: content-box;
        box-sizing: content-box;
    }

    /* IE10 Windows Phone 8 Fixes */
    .swiper-wp8-horizontal {
        -ms-touch-action: pan-y;
    }
    .swiper-wp8-vertical {
        -ms-touch-action: pan-x;
    }

    /* ===============================================================
    Your custom styles, here you need to specify container's and slide's
    sizes, pagination, etc.
    ================================================================*/
    .swiper-container {
        /* Specify Swiper's Size: */

        /*width:200px;
        height: 100px;*/
    }
    .swiper-slide {
        /* Specify Slides's Size: */

        /*width: 100%;
        height: 100%;*/
    }
    .swiper-slide-active {
        /* Specific active slide styling: */

    }
    .swiper-slide-visible {
        /* Specific visible slide styling: */	

    }
    /* ===============================================================
    Pagination Styles
    ================================================================*/
    .swiper-pagination-switch {
        /* Stylize pagination button: */	

    }
    .swiper-active-switch {
        /* Specific active button style: */	

    }
    .swiper-visible-switch {
        /* Specific visible button style: */	

    }
    .preloader {
        position: absolute;
        /*left: 0;*/
        /*top: -100px;*/
        z-index: 0;
        color: #aaa;
        text-align: center;
        height: 50px;
        width: 100%;
        opacity: 0;
        display: none;
        font-size: 20px;
        line-height: 30px;
        -webkit-transition: 300ms;
        -moz-transition: 300ms;
        -ms-transition: 300ms;
        -o-transition: 300ms;
        transition: 300ms;
        /*background: rgba(0,0,0,0.4);*/
    }
    .visible {
        display: block;
        /*top: 0;*/
        opacity: 1;
    }
    .swiper-container {
        width: 100%;
        height: 100%;
        color: #fff;
        text-align: center;
        position: relative;
        z-index: 10;
    }

    .swiper-slide {
        width: 100%;
        opacity: 0.2;
        -webkit-transition: 300ms;
        -moz-transition: 300ms;
        -ms-transition: 300ms;
        -o-transition: 300ms;
        transition: 300ms;
    }
    .swiper-slide-visible {
        opacity: 1;
    }
    .swiper-slide .title {
        font-style: italic;
        font-size: 42px;
    }
</style>
<script src="<?php echo base_url() . 'application/js/idangerous.swiper.min.js' ?>" type="text/javascript"></script>
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
<div class="preloader"><span class="ml-alert-icon"></span><span class="ml-alert" style="line-height: 50px;"></span> </div>
<div class="swiper-container">
    <div class="swiper-wrapper clearfix">
        <div class="swiper-slide">
            <h2 style="text-align:center"><a style="color:#ff4b4b" href="#">安徽省长王学军接任省委书记|简历</a></h2>
            <div style="text-align:center"><a style="color:#000000" href="#">中韩正式签自贸协定</a>  <a style="color:#000000" href="#">9成商品零关税</a></div>
            <div style="text-align:center"><a style="color:#000000" href="#">中国明起在中缅边境实弹演习</a></div>
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
                    <li><a href="#" class="am-text-truncate">美防长：将要求越南停止南海填海造地</a></li>
                    <li><a href="#" class="am-text-truncate">四川攀枝花经信委主任家中遇害|简历</a></li>
                    <li><a href="#" class="am-text-truncate">蔡英文参加台侨晚宴：我不是来面试</a></li>
                    <li><a href="#" class="am-text-truncate">"港独"游行声称"我不是中国人"|图</a></li>
                </ul>
                <div class="am-panel am-panel-default">
                    <div class="am-panel-hd">
                        <h2 class="am-panel-title"><strong>资讯</strong></h2>
                    </div>
                    <ul class="am-list ">
                        <li><a href="#" class="am-text-truncate">杨子女儿昔日演出照曝光 或将进娱乐圈</a></li>
                        <li><a href="#" class="am-text-truncate">王心凌穿紧身马甲秀胸器 脸红：不习惯</a></li>
                        <li><a href="#" class="am-text-truncate">40岁周迅吞云吐雾抽烟 边做高难度瑜伽</a></li>
                        <li><a href="#" class="am-text-truncate">赵薇半蹲被友人背后拥抱 自嘲姿势雷人</a></li>
                    </ul>
                </div>
                <div class="am-panel am-panel-default">
                    <div class="am-panel-hd">
                        <h2 class="am-panel-title"><strong>资讯</strong></h2>
                    </div>
                    <ul class="am-list ">
                        <li><a href="#" class="am-text-truncate">杨子女儿昔日演出照曝光 或将进娱乐圈</a></li>
                        <li><a href="#" class="am-text-truncate">王心凌穿紧身马甲秀胸器 脸红：不习惯</a></li>
                        <li><a href="#" class="am-text-truncate">40岁周迅吞云吐雾抽烟 边做高难度瑜伽</a></li>
                        <li><a href="#" class="am-text-truncate">赵薇半蹲被友人背后拥抱 自嘲姿势雷人</a></li>
                    </ul>
                </div>
                <div class="am-panel am-panel-default">
                    <div class="am-panel-hd">
                        <h2 class="am-panel-title"><strong>资讯</strong></h2>
                    </div>
                    <ul class="am-list ">
                        <li><a href="#" class="am-text-truncate">杨子女儿昔日演出照曝光 或将进娱乐圈</a></li>
                        <li><a href="#" class="am-text-truncate">王心凌穿紧身马甲秀胸器 脸红：不习惯</a></li>
                        <li><a href="#" class="am-text-truncate">40岁周迅吞云吐雾抽烟 边做高难度瑜伽</a></li>
                        <li><a href="#" class="am-text-truncate">赵薇半蹲被友人背后拥抱 自嘲姿势雷人</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!--<div class="swiper-container">
    <div class="swiper-wrapper">-->


<!--    </div>
</div>-->
<script>
    var holdPosition = 0;
    var mySwiper = new Swiper('.swiper-container', {
        slidesPerView: 'auto',
        mode: 'vertical',
        freeMode: true,
        freeModeFluid: true,
        watchActiveIndex: true,
        onTouchStart: function () {
            holdPosition = 0;
            $('.preloader').addClass('visible');
            $('.preloader').css('height', '50px');
        },
        onResistanceBefore: function (s, pos) {
            holdPosition = pos;
            if (pos < 100) {
                $('.ml-alert').text('  下拉刷新');
                $('.ml-alert-icon').addClass('am-icon-arrow-down');
            } else if (pos >= 100) {
                $('.ml-alert-icon').removeClass('am-icon-arrow-down');
                $('.ml-alert-icon').addClass('am-icon-arrow-up');
                $('.ml-alert').text('  放手刷新');
            }
//            $('.ml-alert').text(pos);
//            $('.preloader').css('width',pos+'px');
        },
        onTouchEnd: function () {
            if (holdPosition > 100) {
                $('.ml-alert-icon').removeClass('am-icon-arrow-down');
                $('.ml-alert-icon').addClass('am-icon-spinner');
                $('.ml-alert-icon').addClass('am-icon-pulse');
                $('.ml-alert').text('  放手刷新');
                mySwiper.setWrapperTranslate(0, 50, 0);
                mySwiper.params.onlyExternal = true;
                $('.preloader').addClass('visible');
                loadNewSlides();
            }
            else {
                $('.preloader').removeClass('visible');
            }
        }
    });
    var slideNumber = 0;
    function loadNewSlides() {
        setTimeout(function () {
//            Prepend new slide
//            var colors = ['red', 'blue', 'green', 'orange', 'pink'];
//            var color = colors[Math.floor(Math.random() * colors.length)];
//            mySwiper.prependSlide('<div class="title">js-css.cn(JS代码网) ' + slideNumber + '</div>', 'swiper-slide ' + color + '-slide');
//            Release interactions and set wrapper
            mySwiper.setWrapperTranslate(0, 0, 0);
            mySwiper.params.onlyExternal = false;
//            Update active slide
            mySwiper.updateActiveSlide(0);
//            Hide loader
            $('.preloader').removeClass('visible');
            $('.ml-alert-icon').removeClass('am-icon-spinner');
            $('.ml-alert-icon').removeClass('am-icon-pulse');
        }, 1000);
    }
</script>