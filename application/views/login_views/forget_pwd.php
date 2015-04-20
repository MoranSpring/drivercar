<!DOCTYPE html>
<html>
    <head>
        <title>忘记密码</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <link rel="shortcut icon" type="image/x-icon" href="res/homepage/favicon.ico?v=3.9" />
        <link href="<?= base_url() ?>application/css/login/screen.css" media="screen, projection" rel="stylesheet" type="text/css" >
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>application/css/login/base.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>application/css/login/login.css">
        <link rel="stylesheet" href="<?= base_url() ?>application/css/admin/amazeui.min.css">
        <script src="<?php echo base_url() . 'application/js/jquery-1.7.1.min.js' ?>" type="text/javascript"></script>
        <script  language="javascript" src="<?=base_url()?>application/js/login.js"></script> 
        <style>
            *{
                margin: 0px;
                padding: 0px;
            }
            .logina-log h1{
                margin-left: 20px;
                line-height: 55px;
                font-size: 20px;
                font-weight: bold;
            }
            .change_pwd_title{
                margin: 30px auto;
                font-size: 20px;
                font-weight: bold;
                text-align: center;
                
            }
            .change_div{
                overflow: hidden;
                width: 1000px;
                min-height: 500px;
                margin: 20px auto;
            }
            .change_con{
                width: 100%;
                height:500px;
                margin: 99px auto;
                border: 1px solid #CCC9C0;
                border-radius: 10px;
            }
            .testli{
                
                margin-bottom: 10px;
                margin-top: 10px;
            }
            .testli .linheight{
                line-height: 48px;
            }
            .testli .input_height{
                height: 40px;
                font-size: 14px;
                border-radius: 5px;
            }
            .sub-div{
                width: 100%;
                margin-bottom: 5px;
                margin-top: 5px;
            }
            .sub-div input{
                padding: 3px;
                width: 230px;
                margin-top: 10px;
                margin-left: 435px;
            }
        </style>
        <script>
            var curWwwPath = window.document.location.href;
            var pathName = window.document.location.pathname;
            var pos = curWwwPath.indexOf(pathName);
            var localhostPath = curWwwPath.substring(0, pos);
            $(document).ready(function () {
                var bind_email;
                
                var result ='';
                var change_pwd_key= '';
                var send_time = '';
                var pwd_key_flag=false;
                var pwd_flag=false;
//                $('#hasbind_email').blur(function(){
//                    active_email=$('#hasbind_email').val();
//                    alert(active_email);
//                });
                //验证email格式
                function isEmailForm(email) {
                    var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\-|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
                    if (!myreg.test(email))
                        return false;
                    return true;
                }
                                //产生随机码{"chage_pwd_str":"egd1p6hs","send_time":1429262226,"result":true}
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
                //检测是否超时，传入参数为Unix时间戳，且first大于second
                function  isValiKeyTimeout(first_time, second_time) {
                    var count = first_time - second_time;
                    if (count > 0 && count < 600) {
                        return true;
                    } else {
                        return false;
                    }
                }
                
                function setTime(countdown) {
                    var btn_send_valimail=$('#btn_send_valimail');
                    if (countdown == 0) {
                        btn_send_valimail.val("发送邮件");
                        btn_send_valimail.attr("disabled", false);
                        countdown=60;
                        return;
                    } else {
                        btn_send_valimail.attr("disabled", true);
                        btn_send_valimail.val("重新发送(" + countdown + ")");
                    }
                    setTimeout(function() {
                        countdown--;
                        setTime(countdown);
                    },1000);
                }
                $('#btn_send_valimail').click(function(){
                    $("#btn_send_valimail").attr("disabled", true);
                    bind_email=$('#hasbind_email').val();
                    bind_email=$.trim(bind_email);
                    var countdown=10;
                    if(isEmailForm(bind_email)&&(bind_email!=null||bind_email!="")){
                        setTime(countdown);
                        $.ajax({
                            type: "POST",
                            dataType:"text",
                            url: "<?= base_url() ?>index.php/info_change/emialChange",//?r=" + Math.random()
                            async: true,
                            data:{bind_email:bind_email},
                            success: function (data) {
                                alert("emialChange"+data);
                                //is_user_exist = data;
                                if (data == "1"||data==true){
                                    $("#bind_mail_span").html('');
                                    var chage_pwd_str = randomAlphanumeric('text', 8, '0123456789abcdefghijkmnpqrstuvwxyz');
                                    $.ajax({
                                        type: "POST",
                                        dataType: "text",
                                        url: "<?= base_url() ?>index.php/info_change/ForgetPwdVali",
                                        async: true,
                                        data: {bind_email: bind_email, chage_pwd_str: chage_pwd_str},
                                        success: function (data) {
                                            alert(data);
                                            var email_statua = eval("(" + data + ")");//转换为json对象 
                                            result = email_statua.result;
                                            change_pwd_key= email_statua.chage_pwd_str;
                                            send_time = email_statua.send_time;
                                            if (result) {
                                                $("#bind_mail_span").html("<font color=green>邮件已正确发送,请注意查收！</font>");
                                            } else {
                                                $("#bind_mail_span").html("<font color=red>邮件发送错误,请检查邮箱地址！</font>");
                                            }
                                        }
                                    });
                                    $("#btn_sub_newpwd").attr("disabled", false);

                                }else{
                                    $("#btn_sub_newpwd").attr("disabled", true);
                                    $("#bind_mail_span").html("<font color=red>邮箱未注册，请先注册 !</font>");
                                }
                            }
                        });
                    } else {
                        $("#btn_send_valimail").attr("disabled", false);
                        $("#btn_sub_newpwd").attr("disabled", true);
                        $("#bind_mail_span").html("<font color=red>邮箱格式错误 !</font>");
                    }
                });
                function isStrSame(str1,str2){
                    if(str1===str2){
                        return true;
                    }else{
                        return false;
                    }
                } 
                $('#email_vali_key').blur(function(){
                    var email_vali_key=$('#email_vali_key').val();
                    email_vali_key=$.trim(email_vali_key);
                    if(email_vali_key!=null&&email_vali_key!=""){
                        alert(email_vali_key+":::"+change_pwd_key);
                        if(isStrSame(email_vali_key,change_pwd_key)){
                            var now=Math.round(new Date().getTime()/1000);
                            if(isValiKeyTimeout(now,send_time)){
                                pwd_key_flag=true;
                                $("#btn_sub_newpwd").attr("disabled", false);
                                $('#vali_key_span').html("<font color=green>验证码正确!</font>");
                            }else{
                                $('#vali_key_span').html("<font color=red>验证码超时!</font>");
                            }
                            
                        }else{
                            $('#vali_key_span').html("<font color=red>验证码错误!</font>");
                        }
                    }else{
                        $('#vali_key_span').html("<font color=red>验证码不能为空!</font>");
                    }
                });
                
                $('#email_new_pwd1').blur(function(){
                    var pwd1=$('#email_new_pwd1').val();
                    pwd1=$.trim(pwd1);
                    var myreg = /^[0-9_a-zA-Z]{6,20}$/;
                    var ispwd=myreg.test(pwd1);
                    if(ispwd){
                        $('#new_pwd1_span').html("<font color=green>密码格式正确！</font>");
                        //$("#btn_sub_newpwd").attr("disabled", false);
                    }else{
                        $('#new_pwd1_span').html("<font color=red>密码格式不正确！</font>");
                        $("#btn_sub_newpwd").attr("disabled", true);
                    }
                });
                
                $('#email_new_pwd2').blur(function(){
                    var pwd1=$('#email_new_pwd1').val();
                    var pwd2=$('#email_new_pwd2').val();
                    if(isStrSame(pwd1,pwd2)){
                        pwd_flag=true;
                        $('#new_pwd2_span').html("");
                        $("#btn_sub_newpwd").attr("disabled", false);
                    }else{
                        $('#new_pwd2_span').html("<font color=red>两次密码不一致！</font>");
                        $("#btn_sub_newpwd").attr("disabled", true);
                    }
                });//{{"chage_pwd_str":"rzap28xy","send_time":1429259234,"result":true}
                $('#btn_sub_newpwd').click(function(){
                    var bindemail=$('#hasbind_email').val();
                    var newpwd=$('#email_new_pwd2').val();
                    if(!pwd_key_flag){
                        alert("验证码错误!");
                    }else if(!pwd_flag){
                        alert("密码异常!");
                    }else {
                        $.ajax({
                            type:"POST",
                            dataType:"text",
                            url:"<?= base_url() ?>index.php/info_change/pdwChangeByEmail",
                            async:true,
                            data:{bindemail:bindemail,newpwd:newpwd},
                            success:function (data){
                                alert("data"+data);
                            }
                        });
                    }
                });
            });
        </script>
            
    </head>
    <body background="<?= base_url() ?>application/images/login-al.png">
        <div class="logina-log" style="height: 55px">
            <h1>导航栏</h1>
        </div>
        <div class="change_div">
            <div class="change_con">
                <div class="change_pwd_title">
                    <p >修改密码</p>
                </div>
                 <ul>
                     <li class="testli">        
                         <div class="am-g linheight">
                             <div class="am-u-sm-5 am-u-md-5 am-text-right">
                                 请输入绑定的邮箱:
                             </div>
                             <div  class="am-u-sm-7 am-u-md-7 am-u-end col-end" >
                                 <input type="email"  class="input_height" id="hasbind_email" placeholder="请输入邮箱" >
                                 <input type="button" value="发送邮件" id="btn_send_valimail">
                                 <span id="bind_mail_span"></span>
                             </div>
                         </div>
                     </li>
                     <li class="testli">        
                         <div class="am-g linheight">
                             <div class="am-u-sm-5 am-u-md-5 am-text-right">
                                 请输入收到的验证码：
                             </div>
                             <div  class="am-u-sm-7 am-u-md-7 am-u-end col-end" >
                                 <input type="text" class="input_height" placeholder="请输入验证码" id="email_vali_key">
                                 <span id="vali_key_span"></span>
                             </div>
                         </div>
                     </li>
                     <li class="testli">        
                         <div class="am-g linheight">
                             <div class="am-u-sm-5 am-u-md-5 am-text-right">
                                 请输入新密码：
                             </div>
                             <div  class="am-u-sm-7 am-u-md-7 am-u-end col-end" >
                                 <input type="password" class="input_height"  placeholder="新密码" id="email_new_pwd1">
                                 <span id="new_pwd1_span"></span>
                             </div>
                         </div>
                     </li>
                     <li class="testli">        
                         <div class="am-g linheight">
                             <div class="am-u-sm-5 am-u-md-5 am-text-right">
                                 再次输入新密码：
                             </div>
                             <div class="am-u-sm-7 am-u-md-7 am-u-end col-end" >
                                 <input type="password" class="input_height"  placeholder="再次输入密码"  id="email_new_pwd2">
                                 <span id="new_pwd2_span"></span>
                             </div>
                         </div>
                     </li>
                 </ul>
                <div class="sub-div ">
                    
                    <input type="button" id="btn_sub_newpwd" value="提交">
                </div>
                
            </div>
        </div>
        <div id="footer">
            <div class="copyright">Copyright © 2015 drvierunion.com. All Rights Reserved. 驾途网 版权所有</div>
        </div>
    </body>
</html>
