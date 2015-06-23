<style>
    .am-page {
        position: relative;
        min-height: 100%;
        width: 100%;
        overflow: hidden;
    }
    #mobile-index {
        -webkit-transform: translate(0%,0);
        -ms-transform: translate(0%,0);
        transform: translate(0%,0);
        -webkit-transition: all .3s ease-in-out;
        transition: all .3s ease-in-out;
    }
    #demo-list-page {
        position: absolute;
        top: 0;
        left: 0;
        background-color: #FFF;
        -webkit-transition: all .3s ease-in-out;
        transition: all .3s ease-in-out;
        -webkit-transform: translate(100%,0);
        -ms-transform: translate(100%,0);
        transform: translate(100%,0);
    }
    .demo-list-active #mobile-index {
        -webkit-transform: translate(-100%,0);
        -ms-transform: translate(-100%,0);
        transform: translate(-100%,0);
    }
    .demo-list-active #demo-list-page {
        display: block;
        -webkit-transform: translate(0%,0);
        -ms-transform: translate(0%,0);
        transform: translate(0%,0);
    }
    .ml-comment-avatar {
        float: left;
        width: 34px;
        height: 34px;
        border-radius: 50%;
    }

</style>
<script src="<?php echo base_url() . 'application/js/jquery.Jcrop.js' ?>" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo base_url() . 'application/css/jquery.Jcrop.css' ?>">

<div class="am-page" id="mobile-index"> 
    <header data-am-widget="header" class="am-header am-header-default ml-color-bg-main" data-am-sticky>
        <div class="am-header-left am-header-nav" >
            <a href="javascript:history.back()">
                <img class="am-header-icon-custom" src="data:image/svg+xml;charset=utf-8,&lt;svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 12 20&quot;&gt;&lt;path d=&quot;M10,0l2,2l-8,8l8,8l-2,2L0,10L10,0z&quot; fill=&quot;%23fff&quot;/&gt;&lt;/svg&gt;"
                     alt="" />&nbsp;
            </a>
        </div>
        <h1 class="am-header-title">
            <a href="#title-link" class="ml-color-white">个人主页</a>
        </h1>
    </header>
    <div onclick="javascript:window.location.assign( '<?= base_url() ?>index.php/mobile/self_info_edit')"  style='max-height: 120px;overflow: hidden'>
        <div style="top:0;height:120px;width:100%;position: relative;z-index: -10;overflow: hidden;" >
            <img  id="element_id" src="http://image.52drivecar.com/bg_img/vip_home_bg.png@!topnews" width="100%" style="">
        </div>
        <div style="position:relative;top:-120px; width:100%;height:120px;overflow:hidden;">
            <div class="am-padding-top-sm">
                <div class="am-margin-left-sm" style="position:relative;">
                    <img id="elemend" class="am-img am-circle" src="<?= $stu_face == '' ? 'http://img3.douban.com/lpic/o626254.jpg' : $stu_face . '@!nail250'; ?>" style="height:100px;width:100px;" />
                </div>
                <div style="color:#fff;top:-88px;;heght:45px;position:relative;padding-left: 120px;">
                    <div class="clearfix">
                        <span  style="float:left;font-size: 1.5em;"><?= $name ?></span>
                    </div>

                    <span class="ml-color-gray" style="font-size: 1em;">余额：<span class="ml-color-currency"><?= $coin ?></span>&nbsp;C币</span>
                </div>
            </div>

        </div>
    </div>
    <div>
        <section class="am-panel am-panel-default" style='border-color:#ddd;height:70px;'>
            <div class="am-g" style="margin: 0;">
                <div onclick="change(1)" class="am-u-sm-6 am-text-center ml-ontouch" style="height:70px;font-size: 1em;border-right: 1px solid #ddd;padding: 0;margin: 0;">
                    <div class="a-g">
                        <div class="am-u-sm-5 " style="padding: 0;">
                            <a class="am-icon-btc ml-color-currency" style="line-height:70px;font-size:30px;">&nbsp;</a>
                        </div>
                        <div class="am-u-sm-7 am-text-left" style="padding: 0;">
                            <span style="line-height: 70px;font-size: 1em;"> C币充值</span>


                        </div>
                    </div>
                </div>
                <div onclick="change(2)" class="am-u-sm-6 am-text-center ml-ontouch" style="height:70px;font-size: 1em;border-right: 1px solid #ddd;padding: 0;margin: 0;">
                    <div class="a-g">
                        <div class="am-u-sm-5 " style="padding: 0;">
                            <a class="am-icon-clock-o" style="line-height:70px;font-size:30px;">&nbsp;</a>
                        </div>
                        <div class="am-u-sm-7 am-text-left" style="padding: 0;">
                            <span style="line-height: 70px;font-size: 1em;"> 学习记录</span>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <section class="am-panel am-panel-default" style='border-color:#ddd;'>
            <div onclick="change(3)" class="am-g ml-ontouch" style="margin: 0;border-bottom: 1px solid #ddd;">
                <div class="am-u-sm-10 " style="height:50px;font-size: 1em;margin: 0;">
                    <span class="" style="line-height:50px;font-size: 1.1em;color:#888;">教练反馈</span>
                </div>
                <div class="am-u-sm-2 am-text-center" style="height:50px;font-size: 1em;padding: 0;margin: 0;">
                    <span class="am-icon-angle-right" style="line-height:50px;font-size: 1.5em;color:#ccc;">&nbsp;</span>
                </div>

            </div>
            <div onclick="javascript:window.location.href = '<?= base_url() ?>index.php/mobile/management'"  class="am-g ml-ontouch" style="margin: 0;">
                <div class="am-u-sm-10" style="height:50px;font-size: 1em;margin: 0;">
                    <span class="" style="line-height:50px;font-size: 1.1em;color:#888;">学习管理</span>
                </div>
                <div class="am-u-sm-2 am-text-center" style="height:50px;font-size: 1em;padding: 0;margin: 0;">
                    <span class="am-icon-angle-right" style="line-height:50px;font-size: 1.5em;color:#ccc;">&nbsp;</span>
                </div>
            </div>
        </section>

        <section class="am-panel am-panel-default" style='border-color:#ddd;'>
            <div onclick="change(5)" class="am-g ml-ontouch" style="margin: 0;border-bottom: 1px solid #ddd;">
                <div class="am-u-sm-10" style="height:50px;font-size: 1em;margin: 0;">
                    <span class="" style="line-height:50px;font-size: 1.1em;color:#888;">消费记录</span>
                </div>
                <div class="am-u-sm-2 am-text-center" style="height:50px;font-size: 1em;padding: 0;margin: 0;">
                    <span class="am-icon-angle-right" style="line-height:50px;font-size: 1.5em;color:#ccc;">&nbsp;</span>
                </div>

            </div>
            <div onclick="javascript:window.location.href = '<?= base_url() ?>index.php/mobile/self_info_edit'" class="am-g ml-ontouch" style="margin: 0;border-bottom: 1px solid #ddd;">
                <div class="am-u-sm-10" style="height:50px;font-size: 1em;margin: 0;">
                    <span class="" style="line-height:50px;font-size: 1.1em;color:#888;">个人设置</span>
                </div>
                <div class="am-u-sm-2 am-text-center" style="height:50px;font-size: 1em;padding: 0;margin: 0;">
                    <span class="am-icon-angle-right" style="line-height:50px;font-size: 1.5em;color:#ccc;">&nbsp;</span>
                </div>
            </div>
            
        </section>


        <div class="am-margin">
            <button type="submit"   class="am-btn confirm ml-btn-danger am-btn-block am-radius">退        出</button>
        </div>



    </div>
</div>
<!-------------------------------------------第二个页面分分割线-------------------------------------------->


<div class="am-page" id="demo-list-page" style="display: none;">
    <header data-am-widget="header" class="am-header am-header-default ml-color-bg-main">
        <div class="am-header-left am-header-nav">
            <a onclick="back();">
                <img class="am-header-icon-custom" src="data:image/svg+xml;charset=utf-8,&lt;svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 12 20&quot;&gt;&lt;path d=&quot;M10,0l2,2l-8,8l8,8l-2,2L0,10L10,0z&quot; fill=&quot;%23fff&quot;/&gt;&lt;/svg&gt;"
                     alt="" />&nbsp;
            </a>
        </div>
        <h1 class="am-header-title my_title">

        </h1>

    </header>
    <div id="demo-list">
        <div id="demo-scroller" style="transition: 0ms cubic-bezier(0.1, 0.57, 0.1, 1); -webkit-transition: 0ms cubic-bezier(0.1, 0.57, 0.1, 1); transform: translate(0px, 0px) translateZ(0px);">
            <!--这中间是不同功能的显示的div-->

            <div class="all-page recharge" style='display:none;'><!--充值-->
                <div class="am-tabs am-margin-top" id="doc-my-tabs">
                    <ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
                        <li class="am-active"><a href="">充值卡充值</a></li>
                        <li><a href="">其他方式充值</a></li>
                    </ul>
                    <div class="am-tabs-bd">
                        <div class="am-tab-panel am-active">
                            <div class="login-alert am-alert am-alert-danger"  style="margin:0;">
                                <p class="name_alert" onchange="toAlert()">dddd</p>
                            </div>
                            <form class="am-form"  id="form-recharge" method="post" onsubmit="return checkForm(this)" action="<?= base_url() ?>index.php/mobile/recharge_by_card">
                                <div class="am-input am-margin">
                                    <input id="card_id" name="card_id"  type="text" class="am-form-field" autocomplete="off" value="" onfocus="check_onfocus()" onblur="check_onbulr(this.value)" placeholder="请输入卡号">
                                </div>
                                <div class="am-input  am-margin">
                                    <input class="am-form-field" id="card_psw" type="password" name="card_psw" placeholder="请输入密码" autocomplete="off"  value="">
                                </div>
                                <div class="am-margin">
                                    <button type="submit"   class="am-btn confirm ml-btn-normal am-btn-block am-radius">确&nbsp;&nbsp;认</button>
                                </div>
                            </form>
                        </div>
                        <div class="am-tab-panel">...</div>
                    </div>
                </div>



            </div>

            <div class="all-page comsumpation" style='display:none;'><!--消费记录-->
                <ul class="am-list csm-list-container">
                </ul>
            </div>

            <div class="all-page Record" style='display:none;font-size: 1em;'><!--学习记录-->

                <div class="record_container">

                </div>
            </div>
            <div class="all-page coach_comment" style='display:none;font-size: 1em'><!--教练评价-->
                <ul class="am-comments-list am-comments-list-flip am-padding coach_comment_container">

                </ul>


            </div>

            <!--这中间是不同功能的显示的div-->
        </div>
    </div>
</div>
<!----------------------加载提示框。。。。。--------------------------------->
<div class="loading am-modal am-modal-loading am-modal-no-btn" tabindex="-1" id="my-modal-loading">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">正在加载...</div>
        <div class="am-modal-bd">
            <span class="am-icon-spinner am-icon-spin"></span>
        </div>
    </div>
</div>
<script>
    var curWwwPath = window.document.location.href;
    var pathName = window.document.location.pathname;
    var pos = curWwwPath.indexOf(pathName);
    var localhostPath = curWwwPath.substring(0, pos);

    $(function () {
        var histroy = window.document.location.href.split('#')[1];
        if (typeof (histroy) === 'string') {
            var paramStep = histroy.split('&')[0];
            histroyReload(paramStep.split('=')[1]);
        }
    });
    $(function () {
        $('#doc-my-tabs').tabs();

//        var geolocation = new $.AMUI.Geolocation();
//        var $demoArea = $('#doc-geo-demo');
//         
//
//        geolocation.get({timeout: 7000}).then(function (position) {
//            // console.log(position.coords);
//            var contentString = '你的位置：\n\t纬度 ' + position.coords.latitude +
//                    '，\n\t经度 ' + position.coords.longitude + '，\n\t精确度 ' +
//                    position.coords.accuracy;
//            alert(contentString);
//        });
    });
    function  change(id) {
        window.scroll(0, 0);
        switch (id) {
            case 1:
                $('.recharge').css('display', 'block');
                $('.my_title').html('充   值');
                recharge();
                break;
            case 2:
                $('.Record').css('display', 'block');
                $('.my_title').html('学习记录');
                study_record();
                break;
            case 3:
                $('.coach_comment').css('display', 'block');
                $('.my_title').html('教练建议');
                coach_comment();

                break;
            case 5:
                $('.comsumpation').css('display', 'block');
                $('.my_title').html('消费记录');
                Consumpation();
                break;
            case 6:
                
                break;
        }
        $('#demo-list-page').css('display', 'block');
        setTimeout(function () {
            $('body').addClass('demo-list-active');
        }, 1);
//        setTimeout(openModel, 300);
    }
    function recharge() {
        closeModel();
    }
    function Consumpation() {
        $.ajax({
            type: "POST",
            dataType: "text",
            url: localhostPath + "/index.php/mobile/get_consumpation",
            async: true,
            success: function (data) {
                $('.csm-list-container').html(data);
                closeModel();
            }});
    }
    function coach_comment() {
        $.ajax({
            type: "POST",
            dataType: "text",
            url: localhostPath + "/index.php/mobile/get_coach_comment",
            async: true,
            success: function (data) {
                $('.coach_comment_container').html(data);
                closeModel();
            }});
    }
    function user_comment() {
        $.ajax({
            type: "POST",
            dataType: "text",
            url: localhostPath + "/index.php/mobile/get_user_comment",
            async: true,
            success: function (data) {
                $('.user_comment_container').html(data);
                closeModel();
            }});
    }
    function study_record() {
        $.ajax({
            type: "POST",
            dataType: "text",
            url: localhostPath + "/index.php/mobile/get_study_record",
            async: true,
            success: function (data) {
                $('.record_container').html(data);
                closeModel();
            }});
    }

    function back() {      //次页面返回
        window.scroll(0, 0);
        $('body').removeClass('demo-list-active');
        setTimeout(function () {
            $('#demo-list-page').css('display', 'none');
        }, 300);
        $('.all-page').css('display', 'none');
    }
    function HomeBack() {  //主页面返回
        var isHasHistroy = window.document.location.href.split('#')[1];
        if (typeof (isHasHistroy) === 'string') {
            var paramStep = isHasHistroy.split('&')[1];
            var step = paramStep.split('=')[1];
            step = step - (-1);
            step = 0 - step;
            history.go(step);
        } else {
            history.go(-1);
        }
    }



    function openModel() {
        $('.loading').modal();
    }
    function closeModel() {
        $('.loading').modal('close');
    }
    
    $('.login-alert').css('display', 'none');
    function toAlert() {
        $('.login-alert').css('display', 'block');
    }
    
    
    function check_onbulr(str) {
        if(str==''){
            return false;
        }
    data = 'card_id=' + str;
    $.ajax({
        dataType: "text",
        type: "POST",
        async: true,
//        url: base_url + "/first/login_check?r=" + Math.random(),
        url: localhostPath + "/index.php/mobile/card_check_id",
        data: data,
        success: function (data) {
            if (data ==7) {
                $(".name_alert").text('此卡已用过或不可用');
                    toAlert();
            }else if(data ==5){
                $(".name_alert").text('此卡已过期');
                    toAlert();
            }else if(data ==3){
                $(".name_alert").text('没这张卡');
                    toAlert();
            }
        }
    });
}
function check_onfocus() {
    $(".name_alert").text('');
    $('.login-alert').css('display', 'none');
}
    
    function checkForm(thisform) {
    var bol = false;
    with (thisform)
    {
        if (card_id.value === "")
        {
            card_id.focus();
                toAlert();
                $(".name_alert").text("用户名不能为空");
            return false;
        } else if (card_psw.value === "") {
            card_psw.focus();
                toAlert();
                $(".name_alert").text("密码不能为空");
            return false;
        } else {
            $.ajax({
                type: "POST",
                async: false,
                cache: false,
                dataType: "text",
                url: localhostPath + "/index.php/mobile/card_check",
                data: {card_id: card_id.value, card_psw: card_psw.value},
                success: function (data) {
                    if (data == 1) {
                        bol = true;
                    } else if (data == 7) {
                        bol = false;
                            toAlert();
                            $(".name_alert").text("此卡已用过或不可用");
                    } else if (data == 9) {
                        bol = false;
                            toAlert();
                            $(".name_alert").text("密码错误");
                    }else {
                        bol = false;
                            toAlert();
                            $(".name_alert").text("用户压根儿不存在");
                    }
                }});
            return bol;
        }
    }
}

</script>


