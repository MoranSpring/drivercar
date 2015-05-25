<html>
    <head>
        <title>首页</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="我爱开车网是国内首个驾驶培训预约学习平台，为用户提供客观的、第三方的驾培机构评价信息，同时也为用户提供汽车相关咨询服务。">
        <link rel="shortcut icon" href="<?php echo base_url() . 'application/images/iconfont-suo.png' ?>" type="image/x-icon">
        <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
        <script src="<?php echo base_url() . 'application/js/jquery.cxselect.min.js' ?>" type="text/javascript"></script>
        <script src="http://cdn.amazeui.org/amazeui/2.3.0/js/amazeui.min.js" type="text/javascript"></script>
        <script src="http://a.static.amazeui.org/assets/2.x/js/handlebars.min.js?v=i89kryv3"></script>
        <script src="http://cdn.amazeui.org/amazeui/2.3.0/js/amazeui.widgets.helper.min.js"></script>
        <link rel="stylesheet" href="http://cdn.amazeui.org/amazeui/2.3.0/css/amazeui.min.css">
    </head>
    <style>
        .clearfix:after {
            visibility: hidden;
            display: block;
            font-size: 0;
            content: ".";
            clear: both;
            height: 0;
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
        <div style="width:100%;" class="clearfix">
            <div style="float:left;width:31%;margin:  6px 0 0 6px;">
                <a  href="<?= base_url() ?>index.php/first/mobile_login"  data-rel="accordion"><img  src="http://image.52drivecar.com/coach_imges/1428902550.jpg@!nail250"style="width:100%" height="auto"/></a>
            </div>
            <div style="float:left;width:31%;margin: 6px 0 0 6px">
                <a  href="<?= base_url() ?>index.php/first/mobile_book"  data-rel="accordion"><img src="http://image.52drivecar.com/coach_imges/1428902550.jpg@!nail250" style="width:100%" height="auto"  /></a>
            </div><div style="float:left;width:31%;margin:  6px 0 0 6px;">
                <img src="http://image.52drivecar.com/coach_imges/1428902550.jpg@!nail250"style="width:100%" height="auto"/>
            </div>
            <div style="float:left;width:31%;margin:  6px 0 0 6px;">
                <img src="http://image.52drivecar.com/coach_imges/1428902550.jpg@!nail250"style="width:100%" height="auto"/>
            </div>
            <div style="float:left;width:31%;margin:  6px 0 0 6px;">
                <img src="http://image.52drivecar.com/coach_imges/1428902550.jpg@!nail250"style="width:100%" height="auto" />
            </div><div style="float:left;width:31%;margin:  6px 0 0 6px;">
                <img src="http://image.52drivecar.com/coach_imges/1428902550.jpg@!nail250"style="width:100%" height="auto"/>
            </div>
            <div style="float:left;width:31%;margin:  6px 0 0 6px;">
                <img src="http://image.52drivecar.com/coach_imges/1428902550.jpg@!nail250"style="width:100%" height="auto"/>
            </div>
            <div style="float:left;width:31%;margin:  6px 0 0 6px;">
                <img src="http://image.52drivecar.com/coach_imges/1428902550.jpg@!nail250"style="width:100%" height="auto" />
            </div><div style="float:left;width:31%;margin:  6px 0 0 6px;">
                <img src="http://image.52drivecar.com/coach_imges/1428902550.jpg@!nail250"style="width:100%" height="auto"/>
            </div>

        </div>
        <figure data-am-widget="figure" class="am am-figure am-figure-default "
                data-am-figure="{  pureview: 'true' }">
            <img src="http://image.52drivecar.com/news_imges/1429669168.jpg@!topnews" data-rel="http://image.52drivecar.com/news_imges/1429669168.jpg"
                 alt="春天的花开秋天的风以及冬天的落阳" />
            <figcaption class="am-figure-capition-btm">春天的花开秋天的风以及冬天的落阳</figcaption>
        </figure>
        <figure data-am-widget="figure" class="am am-figure am-figure-default "
                data-am-figure="{  pureview: 'true' }">
            <img src="http://image.52drivecar.com/news_imges/1429461478.jpg@!subtopnews" data-rel="http://image.52drivecar.com/news_imges/1429461478.jpg"
                 alt="春天的花开秋天的风以及冬天的落阳" />
            <figcaption class="am-figure-capition-btm">春天的花开秋天的风以及冬天的落阳</figcaption>
        </figure>
        <figure data-am-widget="figure" class="am am-figure am-figure-default "
                data-am-figure="{  pureview: 'true' }">
            <img src="http://amui.qiniudn.com/pure-1.jpg?imageView2/0/w/640" data-rel="http://amui.qiniudn.com/pure-1.jpg"
                 alt="春天的花开秋天的风以及冬天的落阳" />
            <figcaption class="am-figure-capition-btm">春天的花开秋天的风以及冬天的落阳</figcaption>
        </figure>
        <select data-am-selected>
            <option value="a">Apple</option>
            <option value="b">Banana</option>
            <option value="o">Orange</option>
            <option value="m">Mango</option>
            <option value="d" disabled>禁用鸟</option>
        </select>

    </body>
</html>