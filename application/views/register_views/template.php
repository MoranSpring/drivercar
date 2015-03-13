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
            function myFunctions()
            {
                alert("Hello World!");
            }
            function changeCode() {
                $("#verify_code").attr("src", "<?= base_url() ?>index.php/first/verify_image?r=" + Math.random());
            }
        </script>
        <script type="text/javascript">

            $(function () {
                $(".btn").click(function () {
                    var agreenMent = $("#agreement").attr("data");

                    //alert(agreenMent);0
                    var userName = $("#username").val();
                    var userPass = $("#password1").val();
                    var userPass2 = $("#password2").val();
                    var userEmail = $("#mail").val();
                    var vercode = $("#varcode").val();

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
                    } else if (vercode == '') {
                        $(".input_div5 span").html('<img src="<?= base_url() ?>application/images/text_error.png"><font color=red>输入图片验证码</font>').fadeIn();
                        $("#varcode").focus();
                        $(".btn").val('注册').removeAttr('disabled');
                        return false;
                    } else if (vercode == ) {
                        $(".input_div5 span").html('<img src="<?= base_url() ?>application/images/text_error.png"><font color=red>输入图片验证码</font>').fadeIn();
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

                $(".change").click(function () {
                    $("#imgcode").attr('src', 'vercode');
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
                });

            });
            function isCodeRight() {
                data = 'name=' + str;
                $.ajax({
                    type: "GET",
                    url: base_url + "/first/login_check",
                    async: true,
                    data: data,
                    success: function (data) {
                        if (data != true)
                            $(".name_alert").text(data);
                    }
                });

            }
            function isRegisterUserName(s) {
                var patrn = /^[a-zA-Z0-9]{1}([a-zA-Z0-9]|[._]){5,19}$/;
                if (!patrn.exec(s))
                    return false
                return true
            }
            function isEmail(email) {
                var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\-|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
                if (!myreg.test(email))
                    return false;
                return true;
            }
        </script>
        <style>
            .input_div span{ background:#FFF;}
        </style>
    </head>
    <body>
        <div id="header">
            <div class="header">
                <h1 class="png_bg">JS代码网</h1>
            <button style='float: right' onclick="changeCode()">点击这里</button>
                <button class="png_bg"  onclick="myFunctions()">返回主页</button>
            </div>
        </div>

        <div class="register_content">

            <ul class="step_ul step1 clear">
                <li class="li1">01、填写资料</li>
                <li class="li2">02、完成注册</li>
            </ul>

            <form name="registerForm" id='registerForm' method="post" style="padding:60px 40px 88px 40px;font-family:Microsoft Yahei">
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
                        <input id="varcode" name="vercode" type="text" maxlength="2">
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
            <div class="bg"></div>
        </div>

        <!-- footer start -->
        <div id="footer" class="clear">
            <p>上海微一科技有限公司©版权所有 沪ICP备83823823号</p>
        </div>
        <script type="text/javascript">
            var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
            document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F5d12e2b4eed3b554ae941c0ac43c330a' type='text/javascript'%3E%3C/script%3E"));
        </script>
        <script language="javascript" type="text/javascript">
            function myFunction()
            {
                $(".step_ul").css("background", "url(<?= base_url() ?>application/images/iphone.png)  0 -314px no-repeat");
                $(".step1").css("background", "url(<?= base_url() ?>application/images/iphone.png)  center -381px no-repeat");
                $(".step2").css("background", "url(<?= base_url() ?>application/images/iphone.png)  center -314px no-repeat");
                $(".check2").css("background", "url(<?= base_url() ?>application/images/check2.png) no-repeat");
                $(".check1").css("background", "url(<?= base_url() ?>application/images/check1.png) no-repeat");
            }
            $(document).ready(myFunction);
        </script>
        <!-- footer end -->
    </body>
</html>
















