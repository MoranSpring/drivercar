<html>   
    <head>   
        <meta charset="utf-8">   
    </head>   
     <script src="<?php echo base_url() . 'application/js/jquery-1.7.1.min.js' ?>" type="text/javascript"></script>
     <script src="<?php echo base_url() . 'application/js/ml.js' ?>" type="text/javascript"></script>
     <link type="text/css" href="<?= base_url() ?>application/css/ml.css" rel="stylesheet">
    <body>   
        <div class="ml_step_ul">
            <ul class="clear">
                <li id="ml-step1"class=" ml_li ml_li_width" onclick="step1()">01、填写资料</li>
                <li class=" ml_li"><img id="ml-step_img1"  src="http://localhost:8888/application/images/cover.png"  height="40" width="26" /></li>
                <li id="ml-step2" class=" ml_li ml_li_width" onclick="step2()">02、完成注册</li>
                <li class=" ml_li"><img id="ml-step_img2"  src="http://localhost:8888/application/images/cover.png"  height="40" width="26" /></li>
                <li id="ml-step3" class=" ml_li ml_li_width" onclick="step3()">03、完成注册</li>
            </ul>
        </div>
    </body>   
</html> 