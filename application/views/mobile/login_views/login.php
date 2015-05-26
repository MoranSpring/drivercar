<body>
    <script  language="javascript" src="<?= base_url() ?>application/js/login.js"></script>
    <header data-am-widget="header" class="am-header am-header-default">
        <div class="am-header-left am-header-nav">
            <a href="javascript:history.back();" class="">
                <img class="am-header-icon-custom" src="data:image/svg+xml;charset=utf-8,&lt;svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 12 20&quot;&gt;&lt;path d=&quot;M10,0l2,2l-8,8l8,8l-2,2L0,10L10,0z&quot; fill=&quot;%23fff&quot;/&gt;&lt;/svg&gt;"
                     alt="" />&nbsp
            </a>
        </div>
        <h1 class="am-header-title">
            登录
        </h1>
    </header>
    <div class="login-alert am-alert am-alert-danger"  style="margin:0;">
        <p class="name_alert" onchange="toAlert()"></p>
    </div>
    <form class="am-form"  id="form-login" method="post" onsubmit="return checkForm(this)" action="<?= base_url() ?>index.php/first/login_psw_check">
        <div class="am-input-group am-margin">
            <span class="am-input-group-label"><i class="am-icon-user am-icon-fw"></i></span>
            <input id="name" name="name"  type="text" class="am-form-field" autocomplete="off" value="" onfocus="check_onfocus()" onblur="check_onbulr(this.value)" placeholder="输入注册邮箱">
        </div>
        <div class="am-input-group  am-margin">
            <span class="am-input-group-label"><i class="am-icon-lock am-icon-fw"></i></span>
            <input class="am-form-field" id="password" type="password" name="password" placeholder="请输入密码" autocomplete="off"  value="">
        </div>
        <div class="am-margin">
            <button type="submit"   class="am-btn confirm am-btn-primary am-btn-block">登  录</button>
        </div>
    </form>
    <script>
        $('.login-alert').css('display','none');
        function toAlert() {
            $('.login-alert').css('display','block');
        }

    </script>
</body>