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
        <link rel="stylesheet" type="text/css" href='<?php  echo base_url().'application/css/index.css'?>'>
        <link rel="shortcut icon" href="<?php  echo base_url().'application/images/iconfont-suo.png'?>" type="image/x-icon">
        <script src="<?php  echo base_url().'application/js/jquery-1.7.1.min.js'?>" type="text/javascript"></script>
    </head>
    <body>
        <?= $header?>
        <?= $navigation?>
        <?= $content?>
        <?= $footer?>
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
            $('#menu-ul >li').hover(function () {
                $(this).find('.menu-chir').animate({opacity: 'show', height: 'show'}, 200);
            }, function () {
                $('.menu-chir').stop(true, true).hide();
            });
        </script>
    </body>
</html>
