<html>   
    <head>   
        <meta charset="utf-8">   

        <link rel="stylesheet" href="<?= base_url() ?>application/css/admin/amazeui.min.css"/>
        <link type="text/css" href="<?= base_url() ?>application/css/ml.css" rel="stylesheet">
        <link type="text/css" href="<?= base_url() ?>application/css/jqueryui/jquery-ui.min.css" rel="stylesheet">
        <script src="<?php echo base_url() . 'application/js/jquery-1.7.1.min.js' ?>" type="text/javascript"></script>
        <script src="<?= base_url() ?>application/js/admin/amazeui.js"></script>
        <script src="<?= base_url() ?>application/js/jqueryui/jquery-ui.min.js"></script>
        <script src="<?= base_url() ?>application/js/jqueryui/datepicker-zh-cn.js"></script>
        <script src="<?= base_url() ?>application/js/admin/app.js"></script>
    </head>  
    <body>   
        <p>Date: <input type="text" id="datepicker"></p>

        <div>hello</div>
        <script>
            $(function () {
                $("#datepicker").datepicker({ minDate: 0 ,maxDate: "+1M" });
                $("#datepicker").datepicker("option", "dateFormat", "yy-mm-dd");
                $("#datepicker").datepicker("option", $.datepicker.regional[ "zh-TW" ]);
            });
        </script>

    </body>   
</html> 

