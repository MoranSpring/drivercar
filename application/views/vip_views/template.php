<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>驾途网-首页</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href='<?= base_url() ?>application/css/index.css'>
        <link rel="stylesheet" type="text/css" href='<?= base_url() ?>application/css/vip/vip.css'>
        <link rel="shortcut icon" href="<?php echo base_url() . 'application/images/iconfont-suo.png' ?>" type="image/x-icon">
        <script src="<?php echo base_url() . 'application/js/jquery-1.7.1.min.js' ?>" type="text/javascript"></script>
       
        <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=RbYDrD0LPcQqzZTo21PFZ6kR"></script>
                <link rel="stylesheet" href="<?= base_url() ?>application/css/admin/amazeui.min.css"/>
        <link rel="stylesheet" href="<?= base_url() ?>application/css/admin/admin.css">
        <style type="text/css">
            body{min-width:960px}
            ul,li{list-style:none}
            a{text-decoration:none}
            .cls{zoom:1}
            .cls:after{content:".";display:block;height:0;clear:both;visibility:hidden}
            .link:hover{text-decoration:underline}
            hr{height:0;border-left:none;border-right:0;border-top:1px auto}
            .header {border-bottom:10px solid #0b84e9;box-shadow:0 1px 1px #2fa0ff;background:#42bbc7;}
            .header .top{height:60px;background:#fff}.header
            .top h1{float:left;padding:6px 0 0 14px}
            .header .top h1 a{display:block;width:153px;height:0;padding-top:48px;overflow:hidden;}
            .header .top .nav{float:right;position:relative;margin-top:16px}
            .header .top .nav li{padding:8px 6px;margin:0 10px;display:inline-block}
            .header .top .nav li a{color:#999}
            .header .top .nav li.current{border-bottom:1px solid #63d029}
            .header .top .nav li.current a{color:#63d029}.header .top
            .nav li.last{margin-right:0;padding-right:0}
            .header .top .nav li.last:hover{text-decoration:underline}.header
            .top .nav li.underscore{position:absolute;width:100%;left:0;bottom:0;margin:0;padding:0}
            .header .top .nav li.underscore i{position:absolute;display:none;height:1px;bottom:0;background:#63d029;-webkit-transition:.5s;-moz-transition:.5s;-ms-transition:.5s;-o-transition:.5s;transition:.5s}.footer{height:120px;padding-top:18px;color:#adafba;background:#2c2f38;text-align:center}.footer
            p{line-height:24px}
            .ie6 .header .top .nav li,.ie7 .header .top .nav li{display:inline;zoom:1}.ie6

            .header .top .nav li.underscore i{overflow:hidden}
        </style>
        <style type="text/css">
            .content{padding:50px 0;min-height:720px}.content
            .wrapper{position:relative;}
            .content .light{position:absolute;left:55px;top:-50px;width:152px;height:191px;}.content .light i{position:absolute;width:100%;height:100%;top:0;background:url(http://p4.qhimg.com/t01cfdd74c38452f86c.png)
                                                       no-repeat top center}.content .line-left{position:absolute;left:0;top:15px;width:70px}.content
            .line-right{position:absolute;right:0;top:15px;width:460px}
            .content .main{background:url(http://p0.qhimg.com/d/inn/05a63fc5/line-bg.png) repeat-y 149px 0}
            .content .main .title{position:absolute;line-height:40px;padding-left:67px;left:130px;top:0;color:#58a6fb;font-size:24px;background:url("<?=base_url()?>application/images/clock.png")
                                                       no-repeat left top}
            .content .main .year{position:relative;z-index:1}
            .content .main .year h2{height:40px;width:270px;padding-right:30px;font-size:24px;line-height:40px;text-align:left}
            .content .main .year h2 a{color:#58a6fb}
            .content .main .year h2 i{display:block;position:relative;height:0;width:0;left:90px;top:-20px;border-width:6px;border-style:solid;border-color:#59a7fb
                                                                         transparent transparent transparent;-webkit-transition:.5s;-moz-transition:.5s;-ms-transition:.5s;-o-transition:.5s;transition:.5s;-webkit-transform-origin:6px
                                                                         3px;-moz-transform-origin:6px 3px;-ms-transform-origin:6px 3px;-o-transform-origin:6px
                                                                         3px;transform-origin:6px 3px}
            .content .main .year .list{margin:10px 0;position:relative;overflow:hidden;-webkit-transition:height
                                                                        1s cubic-bezier(0.025,0.025,0.000,1.115),opacity 1s;-moz-transition:height
                                                                        1s cubic-bezier(0.025,0.025,0.000,1.115),opacity 1s;-ms-transition:height
                                                                        1s cubic-bezier(0.025,0.025,0.000,1.115),opacity 1s;-o-transition:height
                                                                        1s cubic-bezier(0.025,0.025,0.000,1.115),opacity 1s;transition:height 1s
                                                                        cubic-bezier(0.025,0.025,0.000,1.115),opacity 1s}
            .content .main .year .list ul{bottom:0}
            .content .main .year .cls{background:url("<?=base_url()?>application/images/circle.png")
                                                             no-repeat 135px 31px;padding:30px 0;color:#a1a4b8}
            .content .main .year .list ul li .date,.content .main .year .list ul li .version{float:left;display:block;clear:left;width:100px;line-height:24px;text-align:right}.content
            .main .year .list ul li .date{font-size:18px;line-height:32px;color:#bec1d5}.content
            .main .year .list ul li .intro,.content .main .year .list ul li .more{float:left;display:block;width:400px;margin-left:100px;line-height:24px}.content
            .main .year .list ul li .intro{font-size:18px;line-height:32px;color:#63d029}.content
            .main .year .list ul li.highlight{background-image:url(http://p4.qhimg.com/d/inn/05a63fc5/circle-h.png)}.content
            .main .year .list ul li.highlight .date,.content .main .year .list ul li.highlight
            .intro{color:#ec6a13}.content .wrapper:first-child .main .year.close h2
            i{transform:rotate(-90deg);-webkit-transform:rotate(-90deg);-moz-transform:rotate(-90deg);-ms-transform:rotate(-90deg);-o-transform:rotate(-90deg)}.content
            .wrapper:first-child .main .year.close .list{opacity:0;height:0!important}.ie7
            .content .main .year h2 i{left:40px}.ie6 .content .wrapper{background-image:url(http://p2.qhimg.com/d/inn/05a63fc5/release-bg-8.png)}.ie6
            .content .light{display:none}.ie6 .content .line-left{width:100px}.ie6
            .content .main .year h2{padding-right:0;width:200px}.ie6 .content .main
            .year h2 a{cursor:default}.ie6 .content .main .year h2 i{display:none}
        </style>
    </head>
    <body>
        <?= $header ?>
        <?= $navigation ?>
        <?= $content ?>
        <?= $footer ?>
        <script>
            function setTab(name, cursel, n) {
                for (i = 1; i <= n; i++) {
                    var thismenu = document.getElementById(name + i);
                    var con = document.getElementById("content" + i);
                    thismenu.className = i == cursel ? "selected-li" : "";
                    con.style.display = i == cursel ? "block" : "none";
                }
            }
        </script>


        <script type="text/javascript">


            $('.menu-ul >li').hover(function () {
                $(this).find('.menu-chir').animate({opacity: 'show', height: 'show'}, 200);
            }, function () {
                $('.menu-chir').stop(true, true).hide();
            });
            $.cxSelect.defaults.url = "<?php echo base_url() . 'application/js/cityData.min.json' ?>";
            $('#city_china_val').cxSelect({
                selects: ['province', 'city', 'area'],
                nodata: 'none'
            });

            function saveLast() {
                var select = document.getElementById("citys");

                var lastIndex = select.selectedIndex;
                var midValue = select.options[lastIndex].value;
//var text = select.options[index].text;
                if (midValue != "0") {
                    lastIndex = select.selectedIndex;
                    lastValue = select.options[lastIndex].value;
                    var map = new BMap.Map("allmap");  // 创建Map实例
                    map.centerAndZoom(lastValue, 11);      // 初始化地图,用城市名设置地图中心点
                    map.enableScrollWheelZoom();                 //启用滚轮放大缩小

                }
            }

        </script>
        <script language="javascript" type="text/javascript">
            function myFunction()
            {
                $(".user_header_img").css("background", "url( '<?= base_url() ?>application/images/arrow.png')");
                $(".user_header_img").css("background-position", "-32px 32px");
            }
            $(document).ready(myFunction);
        </script>
        
        <script>
          $(".main .year .list").each(function(e, t) {
            var n = $(t),
            r = n.find(".list>ul");
            n.height(r.outerHeight()),
            r.css("position", "absolute");
          }),
          $(".main .year>h2>a").click(function(e) {
            e.preventDefault(),
            $(this).parents(".year").toggleClass("close")
          })
        </script>
        <!--[if lt IE 9]>
    <script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
    <script src="assets/js/polyfill/rem.min.js"></script>
    <script src="assets/js/polyfill/respond.min.js"></script>
    <script src="assets/js/amazeui.legacy.js"></script>
    <![endif]-->

    <!--[if (gte IE 9)|!(IE)]><!-->
    <script src="<?php echo base_url() . 'application/js/admin/jquery.min.js' ?>" ></script>
    <script src="<?= base_url() ?>application/js/admin/amazeui.min.js"></script>
    <!--<![endif]-->
    <script src="<?= base_url() ?>application/js/admin/app.js"></script>
    </body>
</html>
