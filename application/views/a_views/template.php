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
        <link rel="stylesheet" type="text/css" href='<?= base_url() ?>application/css/index.css'>
        <link rel="shortcut icon" href="<?php echo base_url() . 'application/images/iconfont-suo.png' ?>" type="image/x-icon">
        <script src="<?php echo base_url() . 'application/js/jquery-1.7.1.min.js' ?>" type="text/javascript"></script>
        <script src="<?php echo base_url() . 'application/js/jquery.cxselect.min.js' ?>" type="text/javascript"></script>
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
//                onDisplay(cursel);
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
            var lastCity = 0;
            function saveLast() {
                var city = $('#citys').val() > 100 ? $('#citys').val() : ($('#province').val() > 100 ? $('#province').val() : false);
                if (city !== false && city !== lastCity) {
                    lastCity = city;
                    $.ajax({
                        type: "POST",
                        dataType: "text",
                        url: "<?= base_url() ?>index.php/first/get_school_info",
                        async: true,
                        data: {city: city},
                        success: function (data) {
                            var json = eval("(" + data + ")");
                            refrashMap(json);
                        }});
                }
            }
            function refrashMap(json) {

                var map = new BMap.Map("allmap");
                map.centerAndZoom();
                map.enableScrollWheelZoom();
                var pointArray = new Array();
                var markerArray = new Array();
                for (var i = 0; i < json.length; i++) {
                    pointArray[i] = new BMap.Point(json[i].jp_gps_latitude, json[i].jp_gps_longitude);
                    markerArray[i] = new BMap.Marker(pointArray[i]);
                    markerArray[i].index = i;
                    map.addOverlay(markerArray[i]);
                    markerArray[i].addEventListener("mouseover", function () {
                        this.openInfoWindow(new BMap.InfoWindow(
                                "<div style='width:300px;'>\n\
                <ul class='clearfix' style='line-height:1.5em;font-size:0.8em;'> <li style='line-height:1.5em;font-size:0.8em;float:left;width:60%;'>\n\
            <b>地址:</b>" + json[this.index].jp_detail_addr + "<br/>\n\
            <b>电话:</b>" + json[this.index].jp_tel + "<br/>\n\
            <b>评价:</b><img src='http://cdn2.iconfinder.com/data/icons/diagona/icon/16/031.png' /><br/>\n\
            <a style='text-decoration:none;color:#2679BA;text-align:right;'>详情&gt;&gt;</a>\n\
            </li><li style='float:left;width:40%;line-height:1em;font-size:0.8em;list-style:none;'>\n\
            <img src=" + json[this.index].jp_imge + " width='120px'>\n\
            </li></ul></div>"
                                , {title: "<span style='font-size:14px;color:#0A8021'>" + json[this.index].jp_name + "</span>"}));
                    });
                    markerArray[i].addEventListener("click", function () {
                        alert(this.index);
                    });
                }
                map.setViewport(pointArray);

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