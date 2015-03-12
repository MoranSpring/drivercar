<!DOCTYPE html>
<html>
    <head>
        <title>驾培网-登录</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <link rel="shortcut icon" type="image/x-icon" href="res/homepage/favicon.ico?v=3.9" />
        <link href="<?= base_url() ?>application/css/login/screen.css" media="screen, projection" rel="stylesheet" type="text/css" >
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>application/css/login/base.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>application/css/login/login.css">
        <script src="<?php echo base_url() . 'application/js/jquery-1.7.1.min.js' ?>" type="text/javascript"></script>
        <script  language="javascript" src="<?=base_url()?>application/js/login.js"></script>  
    </head>
    <body background="<?= base_url() ?>application/images/login-al.png">
        <div class="logina-logo" style="height: 55px">
            <a href="">
                <img src="<?= base_url() ?>application/images/logo.png" height="50" alt="">
            </a>
        </div>
        <div class="logina-main main clearfix">
            <div class="tab-con">
                <form id="form-login" method="post" action="<?= base_url()?>index.php/first/login_psw_check">
                    <div id='login-error' class="error-tip"></div>
                    <table border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <th>账户</th>
                                <td width="245">
                                    <input id="name" type="text" name="name" placeholder="电子邮箱/手机号" autocomplete="off" value="" onfocus="check_onfocus()" onblur="check_onbulr(this.value)">
                                    
                                </td>
                                <td  class="name_alert">
                                </td>
                            </tr>
                            <tr>
                                <th>密码</th>
                                <td width="245">
                                    <input id="password" type="password" name="password" placeholder="请输入密码" autocomplete="off"  value="">
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr id="tr-vcode" style="display:none;" >
                                <th>验证码</th>
                                <td width="245">
                                    <div class="valid">
                                        <input type="text" name="vcode"><img class="vcode" src="passport/vcode?_=1411476793" width="85" height="35" alt="">
                                    </div>
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr class="find">
                                <th></th>
                                <td>
                                    <div>
                                        <label class="checkbox" for="chk11"><input style="height: auto;" id="chk11" type="checkbox" name="remember_me" >记住我</label>
                                        <a href="passport/forget-pwd">忘记密码？</a>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td width="245"><input class="confirm" type="submit" value="登  录"></td>
                                <td><?php  echo$error;?></td>
                            </tr>
                        </tbody>
                    </table>
                    <input type="hidden" name="refer" value="site/">
                </form>
            </div>
            <div class="reg" style="background:url(<?= base_url() ?>application/images/login-sep.png) no-repeat 0 50%">
                <p>还没有账号？<br>赶快免费注册一个吧！</p>
                <a class="reg-btn" href="<?= base_url() . 'index.php/first/register' ?>">立即免费注册</a>
            </div>
        </div>
        <div id="footer">
            <div class="copyright">Copyright © 2015 drvierunion.com. All Rights Reserved. 驾途网 版权所有</div>
        </div>

    </body>
</html>
