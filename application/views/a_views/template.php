<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>我爱开车网-首页</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="我爱开车网是国内首个驾驶培训预约学习平台，为用户提供客观的、第三方的驾培机构评价信息，同时也为用户提供汽车相关咨询服务。">
        <link rel="stylesheet" type="text/css" href='<?=base_url()?>application/css/index.css'>
        <link rel="shortcut icon" href="<?php echo base_url() . 'application/images/iconfont-suo.png' ?>" type="image/x-icon">
        <script src="<?php echo base_url() . 'application/js/jquery-1.7.1.min.js' ?>" type="text/javascript"></script>
        <script src="<?php echo base_url() . 'application/js/jquery.cxselect.js' ?>" type="text/javascript"></script>
        <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=RbYDrD0LPcQqzZTo21PFZ6kR"></script>
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
           
            
            $('.menu-ul >li').hover(function () {
                $(this).find('.menu-chir').animate({opacity: 'show', height: 'show'}, 200);
            }, function () {
                $('.menu-chir').stop(true, true).hide();
            });
            
            $('.user_header').hover(function () {
                $(this).find('.menu-chir').animate({opacity: 'show', height: 'show'}, 200);
            }, function () {
                $('.menu-chir').stop(true, true).hide();
            });
            $.cxSelect.defaults.url = "<?php echo base_url() . 'index.php/first/getcityData' ?>";
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
                $(".user_header_img").css("background-position","-32px 32px");
            }
            $(document).ready(myFunction);
        </script>
                <!--[if lt IE 9]>
    <script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
    <script src="<?= base_url() ?>application/js/admin/polyfill/rem.min.js"></script>
    <script src="<?= base_url() ?>application/js/admin/polyfill/respond.min.js"></script>
    <script src="<?= base_url() ?>application/js/admin/amazeui.legacy.js"></script>
    <![endif]-->

    <!--[if (gte IE 9)|!(IE)]><!-->
    <script src="<?php echo base_url() . 'application/js/admin/jquery.min.js' ?>" ></script>
    <script src="<?= base_url() ?>application/js/admin/amazeui.min.js"></script>
    <!--<![endif]-->
    <script src="<?= base_url() ?>application/js/admin/app.js"></script>
    </body>
</html>