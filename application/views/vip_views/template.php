<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>驾途网-首页</title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" type="text/css" href='<?= base_url() ?>application/css/index.css'/>
        <link rel="stylesheet" type="text/css" href='<?= base_url() ?>application/css/vip/vip.css'/>
        <link type="text/css" href="<?= base_url() ?>application/css/jqueryui/jquery-ui.min.css" rel="stylesheet">
        <link type="text/css" href="<?= base_url() ?>application/css/feedback/feedback.css" rel="stylesheet">
        <link type="text/css" href="<?= base_url() ?>application/css/ml.css" rel="stylesheet">
        <link rel="shortcut icon" href="<?php echo base_url() . 'application/images/iconfont-suo.png' ?>" type="image/x-icon"/>
        <script src="<?php echo base_url() . 'application/js/jquery-1.7.1.min.js' ?>" type="text/javascript"></script>
        <script src="<?= base_url() ?>application/js/jqueryui/jquery-ui.min.js"></script>
        <script src="<?= base_url() ?>application/js/jqueryui/datepicker-zh-cn.js"></script>

        <link rel="stylesheet" href="<?= base_url() ?>application/css/admin/amazeui.min.css"/>
        <link rel="stylesheet" href="<?= base_url() ?>application/css/admin/admin.css">
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

            $('.user_header').hover(function () {
                $(this).find('.menu-chir').animate({opacity: 'show', height: 'show'}, 200);
            }, function () {
                $('.menu-chir').stop(true, true).hide();
            });
            $('.menu-ul >li').hover(function () {
                $(this).find('.menu-chir').animate({opacity: 'show', height: 'show'}, 200);
            }, function () {
                $('.menu-chir').stop(true, true).hide();
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
            $(".main .year .list").each(function (e, t) {
                var n = $(t),
                        r = n.find(".list>ul");
                n.height(r.outerHeight()),
                        r.css("position", "absolute");
            }),
                    $(".main .year>h2>a").click(function (e) {
                e.preventDefault(),
                        $(this).parents(".year").toggleClass("close");
            })
        </script>




    </body>
</html>
