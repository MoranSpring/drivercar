<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'application/css/mycss.css' ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'application/css/login.css' ?>">
        <link rel="stylesheet" type="text/css" href="../css/login.css">
        <script src="<?php echo base_url() . 'application/js/jquery-1.7.1.min.js' ?>" type="text/javascript"></script>
        <link href="<?php echo base_url() . 'application/css/wstyle.css' ?>" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="header" class="clearfix">
            <div id="head_box">
                <div id = user class= 'header_content'><a href="http://www.baidu.com">Solemnkyle</a></div>
                <div id = user class= 'header_content'>|</div>
                <div id = message class= 'header_content'><a href="http://www.baidu.com">Message</a></div>
                <div id = register class= 'header_content2'><a href="http://www.baidu.com">Rigister</a></div>
                <div id = user class= 'header_content2'>|</div>
                <div id = login class= 'header_content2'><a href="http://www.baidu.com">Login</a></div>
            </div>
        </div>
        <div>
            <div id ="loginbox">
                <form>
                    <h2>
                        登陆驾培网
                    </h2>
                    <div><lable id="userimg">dddd</lable>
                        <input class="input_cls" type = "text"/>
                    </div><br/><br/>
                    <div>
                        <lable id="userimg" class="pswimg">dddd</lable>
                        <input class="input_cls" type = "password"  oncontextmenu="return false" onpaste="return false" oncopy="return false" oncut="return false" autocomplete="off"/>
                    </div>
                    <p class="forget clearfix">
                        <a class="" href="" target="_blank" style="color:#fff">忘记登录密码？</a>
                    </p>
                    <div>
                        <input id="submit"type="submit" value="确  定"/>
                    </div>


                </form>
            </div>
<!--            <div id = "background-img"><img src="https://i.alipayobjects.com/e/201311/1V52qKurDp_src.jpg" width="100%" height="100%" />-->
        </div>





        <div id="footer">Copyright W3School.com.cn</div>
        <script language="javascript" type="text/javascript">
            function myFunction()
            {
                $("#userimg").css("background", "url( '<?= base_url() ?>application/images/icon.png')");
                $("#userimg").css("background-position","-5px 0px");
                $(".pswimg").css("background", "url( '<?= base_url() ?>application/images/icon.png')");
                $(".pswimg").css("background-position","-44px 0px");
            }
            $(document).ready(myFunction);
        </script>
    </body>
</html>
