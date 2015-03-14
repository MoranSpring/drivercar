<!DOCTYPE HTML>
<html>
    <head>
        <title>驾途网-注册</title>
        <meta charset="UTF-8">
        <link type="text/css" href="<?= base_url() ?>application/css/register/reset.css" rel="stylesheet">
        <link type="text/css" href="<?= base_url() ?>application/css/register/public.css" rel="stylesheet">
        <link type="text/css" href="<?= base_url() ?>application/css/register/register.css" rel="stylesheet">
        <link rel="shortcut icon" href="favicon.ico" />
        <script src="<?php echo base_url() . 'application/js/jquery-1.7.1.min.js' ?>" type="text/javascript"></script>

        <script type="text/javascript">
            var real_code = '';
            $(function () {
                $(".btn").click(function () {
                    var agreenMent = $("#agreement").attr("data");
                    var userName = $("#username").val();
                    var userPass = $("#password1").val();
                    var userPass2 = $("#password2").val();
                    var userEmail = $("#mail").val();
                    var varCode = $("#varcode").val();
                    userPass = $.trim(userPass);
                    userPass2 = $.trim(userPass2);

                    $(".input_div1 span,.input_div2 span,.input_div3 span,.input_div4 span,.input_div6 span,.input_div5 span").html("");
                    $(".btn").val('注册中...').attr('disabled', 'disabled');

                    if (!isRegisterUserName(userName)) {
                        $(".input_div1 span").html('<img src="<?= base_url() ?>application/images/text_error.png"><font color=red>账户名格式不正确!</font>');
                        $("#username").focus();
                        $(".btn").val('注册').removeAttr('disabled');
                        return false;
                    } else if (!isEmail(userEmail)) {
                        $(".input_div2 span").html('<img src="<?= base_url() ?>application/images/text_error.png"><font color=red>邮箱格式不正确!</font>');
                        $("#mail").focus();
                        $(".btn").val('注册').removeAttr('disabled');
                        return false;
                    } else if (userPass.length < 8) {
                        $(".input_div3 span").html('<img src="<?= base_url() ?>application/images/text_error.png"><font color=red>密码格式不正确!</font>');
                        $("#password1").focus();
                        $(".btn").val('注册').removeAttr('disabled');
                        return false;
                    } else if (userPass != userPass2) {
                        $(".input_div4 span").html('<img src="<?= base_url() ?>application/images/text_error.png"><font color=red>两次输入的密码不一致!</font>');
                        $("#password2").focus();
                        $(".btn").val('注册').removeAttr('disabled');
                        return false;
                    } else if (varCode != real_code) {
                        alert(varCode + '___' + real_code);
                        $(".input_div5 span").html('<img src="<?= base_url() ?>application/images/text_error.png"><font color=red>验证码错误!</font>');
                        $("#varcode").focus();
                        $(".btn").val('注册').removeAttr('disabled');
                        return false;
                    }
                    else if (agreenMent != '1') {
                        //$(".agreenment-tips").html('请先同意用户条款!').fadeIn();
                        $(".input_div6 span").html('<img src="<?= base_url() ?>application/images/text_error.png"><font color=red>请先同意用户条款!</font>');
                        $(".btn").val('注册').removeAttr('disabled');
                        return false;
                    } else {
                        $("#registerForm").ajaxSubmit(function (e) {
                            var obj = json_parse(e);
                            var code = obj.code;
                            var info = '<img src="<?= base_url() ?>application/images/text_error.png"><font color=red>' + obj.info + "</font>";
                            if (code == '-1' || code == '-5') {
                                $(".input_div1 span").html(info);
                                $("#username").focus();
                            } else if (code == '-2' || code == '-4') {
                                $(".input_div2 span").html(info);
                                $("#password1").focus();
                            } else if (code == '-3' || code == '-7') {
                                $(".input_div2 span").html(info);
                                $("#mail").focus();
                            } else if (code == '-8') {
                                $(".input_div6 span").html(info);
                                $("#varcode").focus();
                            } else if (code == '-99') {
                                $(".input_div3 span").html(info);
                                $("#mail").focus();
                            } else if (code == '1') {
                                //alert('恭喜您，注册成功!');
                                //window.location.href='register/success';
                                window.location.href = obj.acturl;
                            }
                            //flushCode();
                            $(".change").click();
                            $(".btn").val('注册').removeAttr('disabled');
                        })
                    }

                })



                $('.check2').click(function () {
                    var rel = $('#agreement').attr("data");
                    //alert(rel);
                    if (rel == '1') {
                        $('#agreement').attr("data", "0");
                    } else {
                        $('#agreement').attr("data", "1");
                    }
                    $('.check2').toggleClass("check1");
                })
            })

            function isRegisterUserName(s) {
                var patrn = /^[a-zA-Z0-9]{1}([a-zA-Z0-9]|[._]){5,19}$/;
                if (!patrn.exec(s))
                    return false;
                return true;
            }
            function isEmail(email) {
                var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\-|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
                if (!myreg.test(email))
                    return false;
                return true;
            }
            function isCodeRight() {
                var base_url = 'http://' + window.document.location.hostname + ':' + window.document.location.port + '/index.php';
                $.ajax({
                    type: "GET",
                    url: base_url + "/first/get_verify_code",
                    async: true,
                    success: function (data) {
                        real_code = data;

                    }
                });

            }

            function changeCode() {
                $("#verify_code").attr("src", "<?= base_url() ?>index.php/first/verify_image?r=" + Math.random());
            }
        </script>
        <style>
            .input_div span{ background:#FFF;}
            .header a{position:absolute; top:60px; right:50px; font-size:12px; color:#666; height:20px; line-height:20px;background:url(<?= base_url() ?>application/images/iphone.png) -25px -290px no-repeat; text-indent:20px;}

            .check2{background:url(<?= base_url() ?>application/images/check2.png) no-repeat;}
            .check1{background:url(<?= base_url() ?>application/images/check1.png) no-repeat;}
            .step_ul{background:url(<?= base_url() ?>application/images/iphone.png)  0 -314px no-repeat}
            .step1{background:url(<?= base_url() ?>application/images/iphone.png)  center -381px no-repeat}
            .step2{background:url(<?= base_url() ?>application/images/iphone.png)  center -314px no-repeat}           
            .div_user span, .div_pw span{position:absolute; left:15px; top:12px; width:16px; height:18px; background:url(<?= base_url() ?>application/images/iphone.png) 0 -480px no-repeat; z-index:1;}
#login_form h2{background:url(<?= base_url() ?>application/images/iphone.png) left -452px no-repeat; padding-left:46px; color:#009fe3; font-size:16px; font-weight:bold; height:20px; line-height:20px; margin-bottom:24px;}

        </style>
    </head>
    <body>
        <div id="header">
            <div class="header">
                <h1 class="png_bg">JS代码网</h1>
                <a class="png_bg"  onclick="myFunctions()">返回主页</a>
            </div>
        </div>

        <div class="register_content">

            <ul class="step_ul step1 clear">
                <li class="li1">01、填写资料</li>
                <li class="li2">02、完成注册</li>
            </ul>
<div>
            <form name="registerForm" id='registerForm' method="post"  style="padding:60px 40px 88px 40px;font-family:Microsoft Yahei">
                <div class="div_form clear ">
                    <label>账户名：</label>
                    <div class="input_div input_div1">
                        <input id="username" name="username" type="text" placeholder="格式6-24位数字字母组合" maxlength="24">
                        <span></span>
                    </div>
                </div>
                <div class="div_form clear ">
                    <label>常用的邮箱帐号：</label>
                    <div class="input_div input_div2" >
                        <input id="mail" name="useremail"  type="text" placeholder="请填写正确的邮箱，以便接收账号激活邮件" maxlength="64">
                        <span></span>
                    </div>
                </div>
                <div class="div_form clear ">
                    <label>请创建一个密码：</label>
                    <div class="input_div input_div3">
                        <input id="password1" name="userpass" type="password" placeholder="最少 8 个字符，区分大小写" maxlength="32">
                        <span></span>
                    </div>
                </div>
                <div class="div_form clear ">
                    <label>重新输入密码：</label>
                    <div class="input_div input_div4">
                        <input id="password2" name="userpass2" type="password" placeholder="再次输入密码" maxlength="32">
                        <span></span>
                    </div>
                </div>
                <div class="div_form clear ">
                    <label>输入验证码：</label>
                    <div class="input_div input_div5">
                        <input id="varcode" name="vercode" type="text" onblur="isCodeRight()" >
                        <img src="<?= base_url() ?>index.php/first/verify_image" alt="验证码" id="verify_code" class="yz_img" />
                        <a class="changeone" href="javascript:void(0);" onclick="changeCode()">点击换一张</a>
                        <span></span>
                    </div>
                </div>
                <div class="div_form clear ">
                    <label></label>
                    <div class="input_div check2 input_div6" data="0" id="agreement">
                        我已阅读并接受《JS代码网用户服务协议》
                        <span></span>
                    </div>
                </div>

                <div class="div_form clear ">
                    <label></label>
                    <div class="input_div">
                        <input id="btn" class="btn" type="button" value="注册" />
                    </div>
                </div>

            </form>

            <div class="reg_login">
                <p>已有帐号？</p>
                <a class="btn2" href="login">登录</a>
            </div>
    </div>
            <div class="bg"></div>
        </div>

        <!-- footer start -->
        <div id="footer" class="clear">
            <p>驾途网©版权所有 沪ICP备83823823号</p>
        </div>

        <!-- footer end -->
    </body>
</html>
















