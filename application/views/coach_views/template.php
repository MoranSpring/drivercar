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
        <link rel="shortcut icon" href="<?php echo base_url() . 'application/images/web_logo.ico' ?>" type="image/x-icon">
        <script src="<?php echo base_url() . 'application/js/jquery-1.7.1.min.js' ?>" type="text/javascript"></script>
        <script src="<?php echo base_url() . 'application/js/jquery.cxselect.min.js' ?>" type="text/javascript"></script>
        <link rel="stylesheet" href="<?= base_url() ?>application/css/admin/amazeui.min.css"/>
        <link rel="stylesheet" href="<?= base_url() ?>application/css/admin/admin.css">
        <!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->
    </head>
    <body>
        <?= $header ?>
        <?= $navigation ?>
        <?= $content ?>
        <?= $footer ?>

        <script type="text/javascript">


            $('.menu-ul >li').hover(function () {
                $(this).find('.menu-chir').animate({opacity: 'show', height: 'show'}, 200);
            }, function () {
                $('.menu-chir').stop(true, true).hide();
            });
            $.cxSelect.defaults.url = "<?php echo base_url() . 'index.php/first/getcityData' ?>";
            $('#city_china_val').cxSelect({
                selects: ['province', 'city', 'area'],
                nodata: 'none'
            });



        </script>

        <!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/polyfill/rem.min.js"></script>
<script src="assets/js/polyfill/respond.min.js"></script>
<script src="<?php echo base_url() . 'application/js/coach/amazeui.legacy.js' ?>"></script>
<![endif]-->

        <!--[if (gte IE 9)|!(IE)]><!-->
        <script src="<?php echo base_url() . 'application/js/admin/jquery.min.js' ?>" ></script>
        <script src="<?= base_url() ?>application/js/admin/amazeui.min.js"></script>
        <!--<![endif]-->
        <script src="<?= base_url() ?>application/js/admin/app.js"></script>
    </body>
</html>