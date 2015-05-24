<html>
    <head>
        <title>登录</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="我爱开车网是国内首个驾驶培训预约学习平台，为用户提供客观的、第三方的驾培机构评价信息，同时也为用户提供汽车相关咨询服务。">
        <link rel="shortcut icon" href="<?php echo base_url() . 'application/images/iconfont-suo.png' ?>" type="image/x-icon">
        <script src="<?php echo base_url() . 'application/js/jquery-1.7.1.min.js' ?>" type="text/javascript"></script>
        <script src="<?php echo base_url() . 'application/js/jquery.cxselect.min.js' ?>" type="text/javascript"></script>
        <script src="http://cdn.amazeui.org/amazeui/2.3.0/js/amazeui.min.js" type="text/javascript"></script>
        <script src="http://a.static.amazeui.org/assets/2.x/js/handlebars.min.js?v=i89kryv3"></script>
        <script src="http://cdn.amazeui.org/amazeui/2.3.0/js/amazeui.widgets.helper.min.js"></script>
        <link rel="stylesheet" href="http://cdn.amazeui.org/amazeui/2.3.0/css/amazeui.min.css">
        <script  language="javascript" src="<?=base_url()?>application/js/login.js"></script>
    </head>
    <style>
        .clearfix:after {
            visibility: hidden;
            display: block;
            font-size: 0;
            content: ".";
            clear: both;
            height: 0;
        }
    </style>
    <body>
        <header data-am-widget="header" class="am-header am-header-default">
            <div class="am-header-left am-header-nav">
                <a href="javascript:history.back();" class="">
                    <img class="am-header-icon-custom" src="data:image/svg+xml;charset=utf-8,&lt;svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 12 20&quot;&gt;&lt;path d=&quot;M10,0l2,2l-8,8l8,8l-2,2L0,10L10,0z&quot; fill=&quot;%23fff&quot;/&gt;&lt;/svg&gt;"
                         alt="" />.
                </a>
            </div>
            <h1 class="am-header-title">
                登录
            </h1>
        </header>
        <form class="am-form"  id="form-login" method="post" action="<?= base_url()?>index.php/first/login_psw_check">
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
    <footer data-am-widget="footer" class="am-footer am-footer-default" data-am-footer="{  }">
            <div class="am-footer-switch">
                <span class="am-footer-ysp" data-rel="mobile" data-am-modal="{target: '#am-switch-mode'}">云适配版</span>
                <span class="am-footer-divider">|</span>
                <a id="godesktop" data-rel="desktop" class="am-footer-desktop"
                   href="javascript:">电脑版</a>
            </div>
            <div class="am-footer-miscs ">
                <p>由
                    <a href="http://www.yunshipei.com/" title="诺亚方舟" target="_blank" class="">诺亚方舟</a>提供技术支持</p>
                <p>CopyRight©2014 AllMobilize Inc.</p>
                <p>京ICP备13033158</p>
            </div>
            <div data-am-widget="gotop" class="am-gotop am-gotop-fixed">
                <a href="#top" title="">
                    <img class="am-gotop-icon-custom" src="http://amazeui.b0.upaiyun.com/assets/i/cpts/gotop/goTop.gif"
                         />
                </a>
            </div>
        </footer>
         <div id="am-footer-modal" class="am-modal am-modal-no-btn am-switch-mode-m am-switch-mode-m-default">
            <div class="am-modal-dialog">
                <div class="am-modal-hd am-modal-footer-hd">
                    <a href="javascript:void(0)" data-dismiss="modal" class="am-close am-close-spin "
                       data-am-modal-close>&times;</a>
                </div>
                <div class="am-modal-bd">您正在浏览的是
                    <span class="am-switch-mode-owner">云适配</span>
                    <span class="am-switch-mode-slogan">为您当前手机订制的移动网站。</span>
                </div>
            </div>
        </div>

</body>
</html>