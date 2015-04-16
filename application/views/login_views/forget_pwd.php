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
                width: 600px;
                height: 300px;
                margin: 99px auto;
                border: 1px solid #CCC9C0;
                border-radius: 10px;
            }
            .testli{
                margin-bottom: 10px;
                margin-top: 10px;
            }
            .sub-div{
                margin-bottom: 5px;
                margin-top: 5px;
            }
            .sub-div input{
                float: right;
                margin-right: 150px;
            }
        </style>
        <script>
            var curWwwPath = window.document.location.href;
            var pathName = window.document.location.pathname;
            var pos = curWwwPath.indexOf(pathName);
            var localhostPath = curWwwPath.substring(0, pos);
            $(document).ready(function () {
                var active_email;
                $('#hasbind_email').blur(function(){
                    active_email=$('#hasbind_email').val();
                    alert(active_email);
                });
                $('#btn_send_valimail').click(function(){
                    $.ajax({
                        type:"POST",
                        dataType:"text",
                        url: localhostPath + "/CarUnion/index.php/info_change/getAllInfo",
                    });
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
                         <div class="am-g">
                             <div class="am-u-sm-4 am-u-md-4 am-text-right">
                                 请输入绑定的邮箱:
                             </div>
                             <div  class="am-u-sm-8 am-u-md-8 am-u-end col-end" >
                                 <input type="email"   id="hasbind_email" >
                                 <input type="button" value="发送邮件" id="btn_send_valimail">
                             </div>
                         </div>
                     </li>
                     <li class="testli">        
                         <div class="am-g">
                             <div class="am-u-sm-4 am-u-md-4 am-text-right">
                                 请输入收到的验证码：
                             </div>
                             <div  class="am-u-sm-8 am-u-md-8 am-u-end col-end" >
                                 <input type="text"   id="email_vali_key">
                             </div>
                         </div>
                     </li>
                     <li class="testli">        
                         <div class="am-g">
                             <div class="am-u-sm-4 am-u-md-4 am-text-right">
                                 请输入新密码：
                             </div>
                             <div  class="am-u-sm-8 am-u-md-8 am-u-end col-end" >
                                 <input type="text" id="email_new_pwd1">
                             </div>
                         </div>
                     </li>
                     <li class="testli">        
                         <div class="am-g">
                             <div class="am-u-sm-4 am-u-md-4 am-text-right">
                                 再次输入新密码：
                             </div>
                             <div class="am-u-sm-8 am-u-md-8 am-u-end col-end" >
                                 <input type="text"  id="email_new_pwd2">
                             </div>
                         </div>
                     </li>
                 </ul>
                <div class="sub-div">
                    <input type="button" id="btn_sub_newpwd" value="确认提交">
                </div>
                
            </div>
        </div>
        <div id="footer">
            <div class="copyright">Copyright © 2015 drvierunion.com. All Rights Reserved. 驾途网 版权所有</div>
        </div>

    </body>
</html>
