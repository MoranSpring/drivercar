<style>
        .box {
            border-bottom: 1px solid #ddd;
            border-right: 1px solid #ddd;
            color: #000;
            text-align: center;
            font-weight: bold;
            transition: all .2s ease;
        }
        .box-top{
            border-top: 1px solid #ddd;
        }
        .box-reight{
            border-right: 1px solid #fff  !important;
        }

        .home-img:hover{
            background:#eee;
        }
    </style>    
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
    <div class="am-margin-sm">
        <div data-am-widget="slider" class="am-slider  am-slider-c3" style="max-height:200px;min-height: 177px;" data-am-slider='{&quot;controlNav&quot;:false}'>
            <ul class="am-slides">
                <li>
                    <img src="http://image.52drivecar.com/news_imges/1429669168.jpg@!topnews">
                    <div class="am-slider-desc am-text-xs">
                        <div class="am-slider-counter">
                            <span class="am-active">1</span>/4</div>远方 有一个地方 那里种有我们的梦想</div>
                </li>
                <li>
                    <img src="http://image.52drivecar.com/news_imges/1429461478.jpg@!topnews">
                    <div class="am-slider-desc am-text-xs">
                        <div class="am-slider-counter">
                            <span class="am-active">2</span>/4</div>某天 也许会相遇 相遇在这个好地方</div>
                </li>
                <li>
                    <img src="http://image.52drivecar.com/1426697515.jpg@!topnews">
                    <div class="am-slider-desc am-text-xs">
                        <div class="am-slider-counter">
                            <span class="am-active">3</span>/4</div>不要太担心 只因为我相信 终会走过这条遥远的道路</div>
                </li>
                <li>
                    <img src="http://image.52drivecar.com/news_imges/1429461553.jpg@!topnews">
                    <div class="am-slider-desc am-text-xs">
                        <div class="am-slider-counter">
                            <span class="am-active">4</span>/4</div>OH PARA PARADISE 是否那么重要 你是否那么地遥远</div>
                </li>
            </ul>
        </div>
    </div>
<ul class="am-avg-sm-4 boxes" style='background: #fff;'>
        <li class="box box-top">
            <a href="http://www.baidu.com" style="height: 100%">
                <img class="home-img" src="http://192.168.10.137:8888/application/images/mobile/coach_book.png" style="width:100%;"/>
            </a>
        </li>
        <li class="box box-top">
            <a href="<?=  base_url()?>index.php/mobile/select_coach" style="height: 100%">
                <img class="home-img" src="http://192.168.10.137:8888/application/images/mobile/school.png" style="width:100%;"/>
            </a>
        </li>
        <li class="box box-top">
            <a href="<?=  base_url()?>index.php/mobile/coach_home" style="height: 100%">
                <img class="home-img" src="http://192.168.10.137:8888/application/images/mobile/coach.png" style="width:100%;"/>
            </a>
        </li>
        <li class="box box-top box-reight">
            <a href="<?=  base_url()?>index.php/mobile/news" style="height: 100%">
                <img class="home-img" src="http://192.168.10.137:8888/application/images/mobile/news.png" style="width:100%;"/>
            </a>
        </li>
        <li class="box box-bottom">
            <a href="http://www.baidu.com" style="height: 100%">
                <img class="home-img" src="http://192.168.10.137:8888/application/images/mobile/coach_book.png" style="width:100%;"/>
            </a>
        </li>
        <li class="box box-bottom">
            <a href="http://www.baidu.com" style="height: 100%">
                <img class="home-img" src="http://192.168.10.137:8888/application/images/mobile/coach_book.png" style="width:100%;"/>
            </a>
        </li>
        <li class="box box-bottom">
            <a href="http://www.baidu.com" style="height: 100%">
                <img class="home-img" src="http://192.168.10.137:8888/application/images/mobile/coach_book.png" style="width:100%;"/>
            </a>
        </li>
        <li class="box box-bottom box-reight">
            <a href="http://www.baidu.com" style="height: 100%">
                <img class="home-img" src="http://192.168.10.137:8888/application/images/mobile/coach_book.png" style="width:100%;"/>
            </a>
        </li>
       
    </ul>

   
    



