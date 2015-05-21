<html>
    <head>
        <title>预定</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="我爱开车网是国内首个驾驶培训预约学习平台，为用户提供客观的、第三方的驾培机构评价信息，同时也为用户提供汽车相关咨询服务。">
        <link rel="shortcut icon" href="<?php echo base_url() . 'application/images/iconfont-suo.png' ?>" type="image/x-icon">
        <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
        <script src="http://cdn.amazeui.org/amazeui/2.3.0/js/amazeui.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="http://cdn.amazeui.org/amazeui/2.3.0/css/amazeui.min.css">
        <link type="text/css" href="<?= base_url() ?>application/css/ml.css" rel="stylesheet">
        <script src="<?php echo base_url() . 'application/js/ml.js' ?>" type="text/javascript"></script>

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
            <div class="am-header-left am-header-nav">
                <a href="javascript:history.back();" class="">
                    <img class="am-header-icon-custom" src="data:image/svg+xml;charset=utf-8,&lt;svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 12 20&quot;&gt;&lt;path d=&quot;M10,0l2,2l-8,8l8,8l-2,2L0,10L10,0z&quot; fill=&quot;%23fff&quot;/&gt;&lt;/svg&gt;"
                         alt="" />.
                </a>
            </div>
            <h1 class="am-header-title">
                教练预约
            </h1>
        </header>

        <div class="ml_step_ul am-margin-top-sm">
            <ul class="clear" style="padding-left:0;">
                <li id="ml-step1"class=" ml_li">1.选择课程</li>
                <li class=" ml_li"><img id="ml-step_img1"  src="<?= base_url() ?>application/images/cover.png" style="height: 40px; vertical-align:top"  height="40px" width="26" /></li>
                <li id="ml-step2" class=" ml_li">2.选择课程</li>
                <li class=" ml_li"><img id="ml-step_img2"  src="<?= base_url() ?>application/images/cover.png"  style="height: 40px; vertical-align:top" height="40px" width="26" /></li>
                <li id="ml-step3" class=" ml_li">3.完成选课</li>
                <li class=" ml_li"><img id="ml-step_img3"  src="<?= base_url() ?>application/images/cover.png"  style="height: 40px; vertical-align:top" height="40px" width="20" /></li>
            </ul>
        </div>

        <div class="am-margin-top">
            <label for="doc-select-1">下拉多选框</label>
            <select id="doc-select-1" data-am-selected >
                <option value="option1">选项一...</option>
                <option value="option2">选项二.....</option>
                <option value="option3">选项三........</option>
            </select>
        </div>
        <div class="am-margin-top">
            <label for="doc-select-1">下拉多选框</label>
            <select id="doc-select-1" data-am-selected >
                <option value="option1">选项一...</option>
                <option value="option2">选项二.....</option>
                <option value="option3">选项三........</option>
            </select>
        </div>
        <div class="am-center am-margin-top-xl" style="width:210px">
                        <button id="bt21" type="button" class=" am-btn am-btn-primary am-fl" style="width:100px" >上一步</button>
                        <button id="bt22" type="button" class=" am-btn am-btn-primary am-fr" style="width:100px">下一步</button>
                    </div>






    </body>
</html>