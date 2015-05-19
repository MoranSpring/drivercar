<!DOCTYPE HTML>
<html>
    <head>
        <title>注册 - 我爱开车网</title>
        <meta charset="UTF-8">
        <link type="text/css" href="<?= base_url() ?>application/css/register/reset.css" rel="stylesheet">
        <link type="text/css" href="<?= base_url() ?>application/css/register/public.css" rel="stylesheet">
        <link type="text/css" href="<?= base_url() ?>application/css/register/register.css" rel="stylesheet">
        <link rel="shortcut icon" href="favicon.ico" />
        <script src="<?php echo base_url() . 'application/js/jquery-1.7.1.min.js' ?>" type="text/javascript"></script>

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
                
                var name_flag=false;
                var email_flag=false;
                var emailkey_flag=false;
                var pwd_flag=false;
                var code_flag=false;
                
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
                    username=$.trim(username);
                    if(isUserNameForm(username)&&(username!=null||username!="")){
                        var userName = "name=" + username;
                        $.ajax({
                            type: "GET",
                            url: "<?= base_url() ?>index.php/first/login_check?r=" + Math.random(),
                            async: true,
                            data:userName,
                            success: function (data) {
                                if (data == "1"||data==true){
                                    $("#user_name_span").html('<img src="<?= base_url() ?>application/images/text_error.png"><font color=red>已存在该用户名，请更换~</font>');
                                    name_flag=false;
                                    $("#btn_sub").attr("disabled", true);
                                }else{
                                    $("#user_name_span").html("");
                                    name_flag=true;
                                    $("#btn_sub").attr("disabled", false);
                                }
                            }
                        });
                    }else{
                        name_flag=false;
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

                //{"reg_email_str":"cdvcqhew","send_time":1429246459,"result":true}
                function setTime(countdown) {
                    var btn_reg_emailkey=$('#send_reg_emailkey');
                    if (countdown == 0) {
                        btn_reg_emailkey.val("发送邮件");
                        btn_reg_emailkey.attr("disabled", false);
                        countdown=60;
                        return;
                    } else {
                        btn_reg_emailkey.attr("disabled", true);
                        btn_reg_emailkey.val("重新发送(" + countdown + ")");
                    }
                    setTimeout(function() {
                        countdown--;
                        setTime(countdown)
                    },1000);
                }
                //{"reg_email_str":"pwqzayn5","send_time":1429244818,"result":true}
                $('#send_reg_emailkey').click(function () {
                    $("#send_reg_emailkey").attr("disabled", true);
                    var countdown=10;
                    var email=$('#mail').val();
                    email=$.trim(email);
                    if(isEmailForm(email)&&(email!=null||email!="")){
                        $.ajax({
                            type: "POST",
                            url: "<?= base_url() ?>index.php/first/login_mailexist?r=" + Math.random(),
                            async: true,
                            data:{email:email},
                            success: function (data) {
//                                is_user_exist = data;
                                if (data == "1"||data==true){
                                    $("#mail_span").html('<img src="<?= base_url() ?>application/images/text_error.png"><font color=red>该邮箱已被注册，请更换~</font>');
                                    //$("#send_reg_emailkey").attr("disabled", true);
                                    $("#btn_sub").attr("disabled", true);
                                    $("#send_reg_emailkey").attr("disabled", false);
                                }else{
                                    setTime(countdown);
                                    $("#mail_span").html("<font color=green>恭喜,邮箱可以注册 !</font>");
                                    //$("#send_reg_emailkey").attr("disabled", false).css("color","green");
                                    var reg_email = $('#mail').val();
                                    var reg_email_str = randomAlphanumeric('text', 8, '0123456789abcdefghijkmnpqrstuvwxyz');
                                         $.ajax({
                                        type: "POST",
                                        dataType: "text",
                                        url: "<?= base_url() ?>index.php/first/RegmailVali",
                                        async: true,
                                        data: {reg_email: reg_email, reg_email_str: reg_email_str},
                                        success: function (data) {
                                            alert(data);
                                            var email_statua = eval("(" + data + ")");//转换为json对象 
                                            result = email_statua.result; 
                                            reg_email_str2 = email_statua.reg_email_str;
                                            send_time = email_statua.send_time;
                                            if (result) {
                                                email_flag=true;
                                                $("#mail_span").html("<font color=green>邮件已正确发送,请注意查收！</font>");
                                            } else {
                                                email_flag=false;
                                                $("#mail_span").html("<font color=red>邮件发送错误,请检查邮箱地址！</font>");
                                            }
                                        }
                                    });
                                }
                            }
                        });
                    }else{
                        $("#send_reg_emailkey").attr("disabled", false);
                        $("#btn_sub").attr("disabled", true);
                        $("#mail_span").html("<font color=red>邮箱格式错误 !</font>");
                        
                    }
                });
                //检测是否超时，传入参数为Unix时间戳，且first大于second
                function  isValiKeyTimeout(first_time, second_time) {
                    alert(first_time+":"+second_time);
                    var count = first_time - second_time;
                    //为方便测试  设置为60，实际应为600
                    if (count > 0 && count<200) {
                        return true;
                    } else {
                        return false;
                    }
                }
                //发送验证邮件返回的结果{"reg_email_str":"jpekj7a1","send_time":1429245588,"result":true}
                $('#reg_mail_key').blur(function () {
                    var regpage_mail_key = $('#reg_mail_key').val();
                    regpage_mail_key=$.trim(regpage_mail_key);
                    var mailkey_right_icon = document.getElementById("mailkey_right_icon");
                    var mailkey_wrong_icon = document.getElementById("mailkey_wrong_icon");
                    var cur_time = Math.round(new Date().getTime() / 1000);
                    if (regpage_mail_key != null||regpage_mail_key != "") {
                        if (isValiKeyTimeout(cur_time, send_time)) {
                           //{"reg_email_str":"vxxzr5hw","send_time":1429243467,"result":true}         
                           alert(regpage_mail_key+"::"+reg_email_str2);
                            if (isStrSame(regpage_mail_key, reg_email_str2)) {
                                emailkey_flag=true; 
                                $('#mailkey_span').html("<font color=green>验证码正确</font>");
                                $('#btn_sub').attr("disabled", false);
                            } else {//y64ik2x4
                                emailkey_flag=false;
                                $("#btn_sub").attr("disabled", true);
                                $('#mailkey_span').html('<img src="<?= base_url() ?>application/images/text_error.png"><font color=red>验证码错误</font>');
                            }
                        } else {
                            emailkey_flag=false;
                            $('#mailkey_span').html("<font color=red>验证码超时</font>");
                            mailkey_right_icon.style.display = "none";
                            mailkey_wrong_icon.style.display = "none";
                        }
                    } else {
                        emailkey_flag=false;
                        mailkey_right_icon.style.display = "none";
                        mailkey_wrong_icon.style.display = "none";
                        $('#mailkey_span').html("<font color=red>请输入邮件中的验证码！</font>");
                    }
                });
                $('#password1').blur(function(){
                    var pwd1=$('#password1').val();
                    pwd1=$.trim(pwd1);
                    var myreg = /^[0-9_a-zA-Z]{6,20}$/;
                    var ispwd=myreg.test(pwd1);
                    if(ispwd){
                        $('#password1_span').html("<font color=green>密码格式正确！</font>");
                        $("#btn_sub").attr("disabled", false);
                    }else{
                        $('#password1_span').html("<font color=red>密码格式不正确！</font>");
                        $("#btn_sub").attr("disabled", true);
                    }
                });
                
                $('#password2').blur(function(){
                    var pwd1=$('#password1').val();
                    var pwd2=$('#password2').val();
                    if(isStrSame(pwd1,pwd2)){
                        pwd_flag=true;
                        $('#password2_span').html("");
                        $("#btn_sub").attr("disabled", false);
                    }else{
                        pwd_flag=false;
                        $('#password2_span').html("<font color=red>两次密码不一致！</font>");
                        $("#btn_sub").attr("disabled", true);
                    }
                });

                //*******************************************************************       
                //有默认选中的情况
                //获取选中项的值，一般采用遍历的方法，判断哪一项选中，获取其value属性的值
                $('input[name="user_type"]').click(function () {
                    var check_val = getRadioValue("user_type");
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
                }//{"reg_email_str":"f3iu6mp6","send_time":1429249007,"result":true}
                function setSerialShowHide(check_val) {
                    var vip_serial_div = document.getElementById("vip_serial_div");
                    var train_serial_div = document.getElementById("train_serial_div");
                    var vipstr = 2;
                    var trainerstr = 1;
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
                            data: {vip_page_num: vip_page_num},
                            success: function (data) {
                                //alert(data);
                                if (data == 1 || data == "1") {
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
                    if (train_page_num != null&& train_page_num != "") {
                        $.ajax({
                            type: "POST",
                            dataType: "text",
                            url: "<?= base_url() ?>index.php/register/ValiTrainSerNum",
                            async: true,
                            data: {train_page_num: train_page_num},
                            success: function (data) {
                                if (data == 1 || data == "1") {
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

                $('#varcode').blur(function (){
                    var varcode=$('#varcode').val();
                    $.ajax({
                        url: "<?= base_url() ?>index.php/first/get_verify_code?r=" + Math.random(),
                        async: true,
                        success: function (data) {
                            alert(data);
                            real_code = data;
                            if(isStrSame(varcode, data)){
                                code_flag=true;
                                $("#changeCode_span").html("");
                                $("#btn_sub").val('注册').attr("disabled", false);
                            }else{
                                code_flag=false;
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
                    var agreenMent = $("#agreement").attr("data");
                    if(!name_flag){
                        alert("用户名错误");
                    }else if(!email_flag){
                        alert("邮件地址错误");
                    }else if(!emailkey_flag){
                        alert("邮件验证码错误");
                    }else if(!pwd_flag){
                        alert("密码异常");
                    }else if(!code_flag){
                        alert("页面验证码错误");
                    }else if (agreenMent != '1') {
                        $("#aggreement_span").html('<img src="<?= base_url() ?>application/images/text_error.png"><font color=red>请先同意用户条款!</font>');
                        return false;
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

            .serial_input{font-size:12px;width:308px!important; height:26px;line-height:26px;padding:10px 5px; border:1px solid #aeaeae; border-radius:4px; color:#666;}
            .input_div5 .user_type{ margin: 16px 10px;}
            .send_reg_emailkey{padding:8px;margin: 0px 10px;}
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
    </head>
    <body>
        <div id="header">
            <div class="header">  
                <center style="font-size:40px;color:#666;font-family:SimSUn;">我爱开车网</center>
                <a class="png_bg"  onclick="myFunctions()">返回主页</a>
            </div>
        </div>

        <div class="register_content">

            <ul class="step_ul step1 clear">
                <li class="li1">01、填写资料</li>
                <li class="li2">02、完成注册</li>
            </ul>
            <div class="body1">
                <form name="registerForm" id='registerForm' method="post" action="<?= base_url() ?>index.php/first/register_insert"  style="padding:60px 40px 88px 40px;font-family:Microsoft Yahei">
                    <div class="div_form clear ">
                        <label>账户名：</label>
                        <div class="input_div input_div1">
                            <input id="username" name="username" type="text" placeholder="格式6-24位数字字母组合" maxlength="24">
                            <span id="user_name_span"></span>
                        </div>
                    </div>
                    <div class="div_form clear ">
                        <label>常用的邮箱帐号：</label>
                        <div class="input_div input_div2" >
                            <input id="mail" name="useremail"  type="text" placeholder="请填写正确的邮箱，以便接收账号激活邮件" maxlength="64">
                            <input class="send_reg_emailkey" type="button" id="send_reg_emailkey" value="发送邮件"><span id="mail_span"></span>
                        </div>
                    </div>
                    <div class="div_form clear ">
                        <label>邮件验证码：</label>
                        <div class="input_div " >
                            <input class="serial_input" id="reg_mail_key" name="reg_mail_key"  type="text" placeholder="请输入邮件验证码" maxlength="64">
                            <span id="mailkey_span"><img id="mailkey_right_icon" src="<?= base_url() ?>application/images/reg/right_icon.png" style="display:none;"><img id="mailkey_wrong_icon" src="<?= base_url() ?>application/images/reg/wrong_icon.png" style="display:none;"></span>
                        </div>
                    </div>
                    <div class="div_form clear ">
                        <label>请创建一个密码：</label>
                        <div class="input_div input_div3">
                            <input id="password1" name="userpass" type="password" placeholder="最少 8 个字符，区分大小写" maxlength="32">
                            <span id="password1_span"></span>
                        </div>
                    </div>
                    <div class="div_form clear ">
                        <label>再次输入密码：</label>
                        <div class="input_div input_div4">
                            <input id="password2" name="userpass2" type="password" placeholder="再次输入密码" maxlength="32">
                            <span id="password2_span"></span>
                        </div>
                    </div>
                    <div class="div_form clear ">
                        <label>请选择注册账户类型：</label>
                        <div class="input_div input_div5 " id="user_radio_div">
                            <input class="user_type" type="radio" name="user_type" id="common_user" value="3" checked="checked">普通用户
                            <input class="user_type" type="radio" name="user_type" id="vip_user" value="2">学员
                            <input class="user_type" type="radio" name="user_type" id="trainer" value="1">教练
                        </div>
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
                    <div class="div_form clear " >
                        <label>输入验证码：</label>
                        <div class="input_div input_div8">
                            <input id="varcode" name="vercode" type="text"  value="" placeholder="请输入验证码">
                            <img src="<?= base_url() ?>index.php/first/verify_image" alt="验证码" id="verify_code" class="yz_img" />
                            <a class="changeone" href="javascript:void(0);" onclick="changeCode()" >点击换一张</a>
                            <span id="changeCode_span"></span>
                        </div>
                    </div>
                    <div class="div_form clear ">
                        <label></label>
                        <div class="input_div check2 input_div9" data="0" id="agreement">
                            我已阅读并接受《我爱开车网用户服务协议》
                            <span  id="aggreement_span"></span>
                        </div>
                    </div>
                    
                    <div class="div_form clear ">
                        <label></label>
                        <div class="input_div">
                            <input id="btn_sub" class="btn_sub" type="button" value="注册">
                        </div>
                    </div>

                </form>

                <div class="reg_login">
                    <p>已有帐号？</p>
                    <a class="btn2" href="login">登录</a>
                </div>
            </div>
            <div class="body2"></div>
        </div>

        <!-- footer start -->
       <center class="am-footer-miscs ">
        <span>由
            <a href="http://www.baidu.com/" title="kyle" target="_blank" class="">Kyle</a>提供技术支持</span>
        <span>CopyRight©2015 52drivercar.com Inc.</span>
        <span>鄂ICP备15005490号</span>
    </center>
        <!-- footer end -->
    </body>
</html>
















