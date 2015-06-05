<html>
    <head>
        <title><?= $title ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="我爱开车网是国内首个驾驶培训预约学习平台，为用户提供客观的、第三方的驾培机构评价信息，同时也为用户提供汽车相关咨询服务。">
        <link rel="shortcut icon" href="<?php echo base_url() . 'application/images/iconfont-suo.png' ?>" type="image/x-icon">
        <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
        <script src="<?php echo base_url() . 'application/js/jquery.cxselect.min.js' ?>" type="text/javascript"></script>
        <script src="http://cdn.amazeui.org/amazeui/2.3.0/js/amazeui.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="http://cdn.amazeui.org/amazeui/2.3.0/css/amazeui.min.css">
        <link type="text/css" href="<?= base_url() ?>application/css/ml.css" rel="stylesheet">
    </head>
    <body  style="background:url('<?= base_url() ?>application/images/mobile/bg_EEE.png');">



        <?= $content ?>
        <?= $footer ?>
        <script>
            $('.ml-ontouch').on('touchstart', function () {
                $(this).css('background', '#ccc');
            });
            $('.ml-ontouch').on('touchend', function () {
                $(this).css('background', '');
            });
            $('.ml-ontouch').on('touchmove', function () {
                $(this).css('background', '');
            });
        </script>
    </body>
</html>

