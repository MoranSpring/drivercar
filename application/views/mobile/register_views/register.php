

<script type="text/javascript">
    var real_code = 'o_o';
    var is_user_exist = 0;
    var curWwwPath = window.document.location.href;
    var pathName = window.document.location.pathname;
    var pos = curWwwPath.indexOf(pathName);
    var localhostPath = curWwwPath.substring(0, pos);
    $(function () {
        //验证邮箱是否有效
        var result = '';
        var reg_email_str2 = '';
        var send_time = '';

        var name_flag = false;
        var email_flag = false;
        var emailkey_flag = false;
        var pwd_flag = false;
        var code_flag = false;
        var userkind_flag = false;
        var selected_kind=3;

        //验证用户名格式是否正确
        function isUserNameForm(str) {
            var patrn = /^[a-zA-Z0-9]{1}([a-zA-Z0-9]|[._]){5,15}$/;
            if (!patrn.exec(str))
                return false;
            return true;
        }
        //验证用户名是否已存在，若存在，则不可用
//                function isUserNameExist(username) {                 
//                }
        $('#username').focus();
        $('#username').blur(function () {
            var username = $('#username').val();
            username = $.trim(username);
            if (isUserNameForm(username) && (username != null || username != "")) {
                var userName = "name=" + username;
                $.ajax({
                    type: "GET",
                    url: "<?= base_url() ?>index.php/first/login_check?r=" + Math.random(),
                    async: true,
                    data: userName,
                    success: function (data) {
                        if (data == "1" || data == true) {
                            $("#user_name_span").html('<img src="<?= base_url() ?>application/images/text_error.png"><font color=red>已存在该用户名，请更换~</font>');
                            name_flag = false;
                            $("#btn_sub").attr("disabled", true);
                        } else {
                            $("#user_name_span").html("");
                            name_flag = true;
                            $("#btn_sub").attr("disabled", false);
                        }
                    }
                });
            } else {
                name_flag = false;
                $("#btn_sub").attr("disabled", true);
                $("#user_name_span").html("<font color=red>用户名格式错误 !</font>");
            }
        });

        //验证邮箱的格式
        function isEmailForm(email) {
            var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\-|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
            if (!myreg.test(email))
                return false;
            return true;
        }
        //检验两个字符串是否相同
        function isStrSame(str1, str2) {
            if (str1 === str2) {
                return true;
            } else {
                return false;
            }
        }

        //产生随机码
        function randomAlphanumeric(dstElem, charsLength, chars) {
            var length = charsLength;
            if (!chars)
                var chars = "abcdefghijkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ23456789";
            var randomChars = "";
            for (x = 0; x < length; x++) {
                var i = Math.floor(Math.random() * chars.length);
                randomChars += chars.charAt(i);
            }
            return  randomChars;
        }

        /**
         * 设置再次发送邮件时间
         * @param {type} countdown 单位为秒
         * @returns {undefined}                 */
        function setTime(countdown) {
            var btn_reg_emailkey = $('#send_reg_message');
            if (countdown == 0) {
                btn_reg_emailkey.val("发送邮件");
                btn_reg_emailkey.attr("disabled", false);
                countdown = 60;
                return;
            } else {
                btn_reg_emailkey.attr("disabled", true);
                btn_reg_emailkey.val("重新发送(" + countdown + ")");
            }
            setTimeout(function () {
                countdown--;
                setTime(countdown)
            }, 1000);
        }
        //
        $('#send_reg_message').click(function () {
            $("#send_reg_message").attr("disabled", true);
            var countdown = 10;
            var phone = $('#phone').val();
            phone = $.trim(phone);
            send_time = Math.round(new Date().getTime() / 1000);
            if (isphone(phone) && (phone != null || phone != "")) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url() ?>index.php/first/send_message?r=" + Math.random(),
                    async: true,
                    data: {phone: phone},
                    success: function (data) {
                        if (data == '1') {
                            email_flag = true;
                            setTime(countdown);
                            $("#mail_span").html("<font color=green>邮件已正确发送,请注意查收！</font>");
                        } else if (data == '3') {
                            $("#mail_span").html('<img src="<?= base_url() ?>application/images/text_error.png"><font color=red>该手机已被注册~</font>');
                            $("#btn_sub").attr("disabled", true);
                            $("#send_reg_message").attr("disabled", false);
                        } else {
                            $("#send_reg_message").attr("disabled", false);
                            $("#btn_sub").attr("disabled", true);
                            $("#mail_span").html("<font color=red>手机号输入有误 !</font>");
                        }
                        
                        }
                });
            } else {
                $("#send_reg_message").attr("disabled", false);
                $("#btn_sub").attr("disabled", true);
                $("#mail_span").html("<font color=red>手机号输入有误 !</font>");

            }
        });
        //检测是否超时，传入参数为Unix时间戳，且first大于second
        function  isValiKeyTimeout(first_time, second_time) {
            //alert(first_time+":"+second_time);
            var count = first_time - second_time;
            //为方便测试  设置为60，实际应为600
            if (count > -600 && count < 600) {
                return true;
            } else {
                return false;
            }
        }
        //发送验证邮件返回的结果
        $('#reg_mail_key').blur(function () {
            var regpage_mail_key = $('#reg_mail_key').val();
            regpage_mail_key = $.trim(regpage_mail_key);
            var mailkey_right_icon = document.getElementById("mailkey_right_icon");
            var mailkey_wrong_icon = document.getElementById("mailkey_wrong_icon");
            var cur_time = Math.round(new Date().getTime() / 1000);
            if (regpage_mail_key != null || regpage_mail_key != "") {
                if (isValiKeyTimeout(cur_time, send_time)) {
                    $.ajax({
                    type: "POST",
                    url: "<?= base_url() ?>index.php/first/is_phone_verify_code?r=" + Math.random(),
                    async: true,
                    data: {code: regpage_mail_key},
                    success: function (data) {
                        if (data == '1') {
                           emailkey_flag = true;
                        $('#mailkey_span').html("<font color=green>验证码正确</font>");
                        $('#btn_sub').attr("disabled", false);
                        } else if (data == '3') {
                            emailkey_flag = false;
                        $("#btn_sub").attr("disabled", true);
                        $('#mailkey_span').html('<img src="<?= base_url() ?>application/images/text_error.png"><font color=red>验证码错误</font>');
                        } else {
                            $("#send_reg_message").attr("disabled", false);
                            $("#btn_sub").attr("disabled", true);
                            $("#mail_span").html("<font color=red>手机号输入有误 !</font>");
                        }
                        }
                });
                    //alert(regpage_mail_key+"::"+reg_email_str2);
                } else {
                    emailkey_flag = false;
                    $('#mailkey_span').html("<font color=red>验证码超时</font>");
                    mailkey_right_icon.style.display = "none";
                    mailkey_wrong_icon.style.display = "none";
                }
            } else {
                emailkey_flag = false;
                mailkey_right_icon.style.display = "none";
                mailkey_wrong_icon.style.display = "none";
                $('#mailkey_span').html("<font color=red>请输入邮件中的验证码！</font>");
            }
        });
        $('#password1').blur(function () {
            var pwd1 = $('#password1').val();
            pwd1 = $.trim(pwd1);
            var myreg = /^[0-9_a-zA-Z]{6,20}$/;
            var ispwd = myreg.test(pwd1);
            if (ispwd) {
                $('#password1_span').html("<font color=green>密码格式正确！</font>");
                $("#btn_sub").attr("disabled", false);
            } else {
                $('#password1_span').html("<font color=red>密码格式不正确！</font>");
                $("#btn_sub").attr("disabled", true);
            }
        });

        $('#password2').blur(function () {
            var pwd1 = $('#password1').val();
            var pwd2 = $('#password2').val();
            if (isStrSame(pwd1, pwd2)) {
                pwd_flag = true;
                $('#password2_span').html("");
                $("#btn_sub").attr("disabled", false);
            } else {
                pwd_flag = false;
                $('#password2_span').html("<font color=red>两次密码不一致！</font>");
                $("#btn_sub").attr("disabled", true);
            }
        });

        //*******************************************************************       
        //有默认选中的情况
        //获取选中项的值，一般采用遍历的方法，判断哪一项选中，获取其value属性的值
        $('.user_type').click(function () {
            var check_val = $(this).children('.radio').val();
            selected_kind=check_val;
            setSerialShowHide(check_val);
        });
        function getRadioValue(radioName) {
            var chkRadio = document.getElementsByName(radioName);
            var radio_val = '';
            for (var i = 0; i < chkRadio.length; i++) {
                if (chkRadio[i].checked) {
                    radio_val = chkRadio[i].value;
                    break;
                }
            }
            return radio_val;
        }
        //用户类型
        var vipstr = 2;
        var trainerstr = 1;

        function setSerialShowHide(check_val) {
            var vip_serial_div = document.getElementById("vip_serial_div");
            var train_serial_div = document.getElementById("train_serial_div");

            if (check_val == vipstr) {
                vip_serial_div.style.display = "block";
                train_serial_div.style.display = "none";
            } else if (check_val == trainerstr) {
                vip_serial_div.style.display = "none";
                train_serial_div.style.display = "block";
            } else {
                vip_serial_div.style.display = "none";
                train_serial_div.style.display = "none";
                $("#btn_sub").attr("disabled", false);
            }
        }

        $('#vip_serial_num').blur(function () {
            var vip_page_num = $('#vip_serial_num').val();
            var vip_right_icon = document.getElementById("vip_right_icon");
            var vip_wrong_icon = document.getElementById("vip_wrong_icon");
            //alert(vip_page_num);
            if (vip_page_num != null || vip_page_num != "") {
                $.ajax({
                    type: "POST",
                    dataType: "text",
                    url: "<?= base_url() ?>index.php/register/ValiVipSerNum",
                    async: true,
                    data: {vip_page_num: vip_page_num, ser_type: vipstr},
                    success: function (data) {
                        //alert(data);
                        if (data == 1 || data == "1") {
                            userkind_flag=true;
                            vip_wrong_icon.style.display = "none";
                            vip_right_icon.style.display = "";
                            $("#btn_sub").attr("disabled", false);
                        } else {
                            vip_wrong_icon.style.display = "";
                            vip_right_icon.style.display = "none";
                            $("#btn_sub").attr("disabled", true);
                        }

                    }});
            } else {
                $('#vip_serial_span').html("<font color=red>序列号不能为空！</font>");
            }
        });
        $('#train_serial_num').blur(function () {
            var train_page_num = $('#train_serial_num').val();

            var train_right_icon = document.getElementById("train_right_icon");
            var train_wrong_icon = document.getElementById("train_wrong_icon");
            if (train_page_num != null && train_page_num != "") {
                $.ajax({
                    type: "POST",
                    dataType: "text",
                    url: "<?= base_url() ?>index.php/register/ValiTrainSerNum",
                    async: true,
                    data: {train_page_num: train_page_num, ser_type: trainerstr},
                    success: function (data) {
                        if (data == 1 || data == "1") {
                            userkind_flag=true;
                            train_wrong_icon.style.display = "none";
                            train_right_icon.style.display = "";
                            $("#btn_sub").attr("disabled", false);
                        } else {
                            train_wrong_icon.style.display = "";
                            train_right_icon.style.display = "none";
                            $("#btn_sub").attr("disabled", true);
                        }
                    }});
            } else {
                $('#train_serial_span').html("<font color=red>序列号不能为空！</font>");
            }
        });
        //**********************************************************************

        $('#varcode').blur(function () {
            var varcode = $('#varcode').val();
            $.ajax({
                url: "<?= base_url() ?>index.php/first/get_verify_code?r=" + Math.random(),
                async: true,
                success: function (data) {
                    real_code = data;
                    if (isStrSame(varcode, data)) {
                        code_flag = true;
                        $("#changeCode_span").html("");
                        $("#btn_sub").val('注册').attr("disabled", false);
                    } else {
                        code_flag = false;
                        $("#changeCode_span").html('<img src="<?= base_url() ?>application/images/text_error.png"><font color=red>验证码错误!</font>');
                        $("#varcode").focus();
                        $("#btn_sub").val('注册').attr("disabled", true);
                    }
                }
            });
        });

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

        $("#btn_sub").click(function () {
            getRadioValue('user_type');
            if (!name_flag) {
                alert("用户名错误");
            } else if (!email_flag) {
                alert("邮件地址错误");
            } else if (!emailkey_flag) {
                alert("邮件验证码错误");
            } else if (!pwd_flag) {
                alert("密码异常");
            } else if (!userkind_flag&&selected_kind!=3) {
                alert("验证码有误");
            } else {
                $("#btn_sub").val('注册').attr("disabled", false);
                document.getElementById('registerForm').submit();

            }
        });
        //{"reg_email_str":"265s9nct","send_time":1429244408,"result":true}

    });
    function changeCode() {
        $("#verify_code").attr("src", "<?= base_url() ?>index.php/first/verify_image?r=" + Math.random());
    }
    function isphone(num) {
        var partten = /^1[3,5,7,8]\d{9}$/;
        if (partten.test(num)) {
            return true;
        } else {
            return false;
        }
    }

//            function isRegEmailKeyVali(reg_email_key){
//                reg_email_key
//            }

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

    .input_div5 .user_type{ margin: 16px 10px;}
    .send_reg_message{padding:8px;margin: 0px 10px;}
    .btn_sub{  background: #0697d5;  width: 320px; 
               font-size:20px;
               height: 60px;
               text-align: center;
               border: 0 none;
               border-radius: 4px;
               color: #fff;
               cursor: pointer;
               letter-spacing: 6px;
               word-spacing: normal;
               text-transform: none;
               text-indent: 0px;
               text-shadow: none;
               display: inline-block;}

</style>
<header data-am-widget="header" class="am-header am-header-default ml-color-bg-main">
    <div class="am-header-left am-header-nav ml-ontouch">
        <a href="javascript:history.back()">
            <img class="am-header-icon-custom" src="data:image/svg+xml;charset=utf-8,&lt;svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 12 20&quot;&gt;&lt;path d=&quot;M10,0l2,2l-8,8l8,8l-2,2L0,10L10,0z&quot; fill=&quot;%23fff&quot;/&gt;&lt;/svg&gt;"
                 alt="" />&nbsp;
        </a>
    </div>
    <h1 class="am-header-title">
        <a href="#title-link" class="">注&nbsp;&nbsp;册</a>
    </h1>
</header>

<div class="">
    <div class="body1">
        <form class="am-form" name="registerForm" id='registerForm' method="post" action="<?= base_url() ?>index.php/first/register_insert">
            <div class="am-input-group am-margin-top">
                <span class="am-input-group-label"><i class="am-icon-user"></i></span>
                <input id="username" name="username" type="text" class="am-form-field" placeholder="格式6-24位数字字母组合" maxlength="24">
            </div>
            <span id="user_name_span"></span>



            <div class="am-input-group am-margin-top">
                <span class="am-input-group-label am-icon-phone"></span>
                <input  id="phone" name="phone" type="text" class="am-form-field"  placeholder="请填写手机号" maxlength="14">
                <span class="am-input-group-btn">
                    <button class="send_reg_message am-btn am-btn-xl am-btn-default" id="send_reg_message" value="手机号" type="button">发送验证码</button>
                </span>
            </div> 
            <span id="mail_span"></span>

            <div class="am-input-group am-margin-top">
                <span class="am-input-group-label"><i class="am-icon-chain"></i></span>
                <input class="serial_input am-form-field" id="reg_mail_key" name="reg_mail_key"  type="text" placeholder="请输入验证码" maxlength="4">
            </div>
            <span id="mailkey_span"><img id="mailkey_right_icon am-input-group-label" src="<?= base_url() ?>application/images/reg/right_icon.png" style="display:none;"><img id="mailkey_wrong_icon" src="<?= base_url() ?>application/images/reg/wrong_icon.png" style="display:none;"></span></span>

            <div class="am-input-group am-margin-top">
                <span class="am-input-group-label"><i class="am-icon-lock">&nbsp;</i></span>
                <input id="password1" name="userpass" type="password" placeholder="最少 8 个字符，区分大小写" maxlength="32">
            </div>
            <span id="password1_span"></span>

            <div class="am-input-group am-margin-top">
                <span class="am-input-group-label"><i class="am-icon-lock">&nbsp;</i></span>
                <input id="password2" name="userpass2" type="password" placeholder="再次输入密码" maxlength="32">
            </div>
            <span id="password2_span"></span>

            <div class="am-btn-group am-margin-top" data-am-button>
                <label class="user_type am-btn am-btn-primary am-btn am-active">
                    <input class="radio"  type="radio" name="user_type" id="common_user" value="3" checked="checked"> 普通用户
                </label>
                <label class="user_type am-btn am-btn-primary am-btn">
                    <input  class="radio"  type="radio" name="user_type" id="vip_user" value="2"> &nbsp;&nbsp;学员&nbsp;&nbsp;
                </label>
                <label class="user_type am-btn am-btn-primary am-btn">
                    <input class="radio"  type="radio" name="user_type" id="trainer" value="1"> &nbsp;&nbsp;教练&nbsp;&nbsp;
                </label>
            </div>

            <div class="div_form clear  " id="vip_serial_div" style="display:none;">
                <label>请输入学员序列号：</label>
                <div class="input_div input_div6">
                    <input class="serial_input" id="vip_serial_num" name="vip_serial_num" type="text" placeholder="序列号"   maxlength="12">
                    <span id="vip_serial_span"><img id="vip_right_icon" src="<?= base_url() ?>application/images/reg/right_icon.png" style="display:none;"><img id="vip_wrong_icon" src="<?= base_url() ?>application/images/reg/wrong_icon.png" style="display:none;"></span>
                </div> 
            </div>
            <div class="div_form clear  " id="train_serial_div" style="display:none;">
                <label>请输入教练序列号：</label>
                <div class="input_div input_div7">
                    <input class="serial_input" id="train_serial_num" name="train_serial_num" type="text" placeholder="序列号"   maxlength="12">
                    <span id="train_serial_span"><img id="train_right_icon" src="<?= base_url() ?>application/images/reg/right_icon.png" style="display:none;"><img id="train_wrong_icon" src="<?= base_url() ?>application/images/reg/wrong_icon.png" style="display:none;"></span>
                </div>
            </div>




            <div class="am-margin ">
                <button id="btn_sub" type="button" style="width:100%;"class="am-btn am-radius am-btn-primary am-btn-block">注册</button>
            </div>

        </form>

    </div>
</div>




















