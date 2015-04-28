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
            var lastCity=0;

            function saveLast() {
                $('#citys').val()>100? refrashMap($('#citys').val()):($('#province').val()>100?refrashMap($('#province').val()):false);
            }
            function refrashMap(num){
                if(num===lastCity){
                    return false;
                }
                lastCity=num;
                alert(num);
                 var map = new BMap.Map("allmap"); 
                map.centerAndZoom();
                map.enableScrollWheelZoom();
                var pointArray = new Array();
                var markerArray = new Array();
                for (var i = 0; i < 10; i++) {
                    pointArray[i] = new BMap.Point(116.4122 + i / 10, 39.9422 + i / 10);
                    markerArray[i] = new BMap.Marker(pointArray[i]);
                    markerArray[i].index = i;
                    map.addOverlay(markerArray[i]);
                    markerArray[i].addEventListener("mouseover", function () {
                        this.openInfoWindow(infoWindow1);
                    });
                    markerArray[i].addEventListener("click", function () {
                        alert(this.index);
                    });
                }
                map.setViewport(pointArray);
                
            }
             var opts1 = {title: '<span style="font-size:14px;color:#0A8021">如家快捷酒店</span>'};
                var infoWindow1 = new BMap.InfoWindow(
                        "<div style='line-height:1.8em;font-size:12px;'>\n\
                          <b>地址:</b>北京市朝阳区高碑店小学旁</br>\n\
                          <b>电话:</b>010-59921010</br>\n\
                          <b>口碑：</b><img src='http://cdn2.iconfinder.com/data/icons/diagona/icon/16/031.png' />\n\
                          <a style='text-decoration:none;color:#2679BA;float:right' href='#'>详情>></a>\n\
                           </div>"
                        , opts1);  // 创建信息窗口对象，引号里可以书写任意的html语句。

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