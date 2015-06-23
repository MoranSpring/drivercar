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
<script src="<?php echo base_url() . 'application/js/headpic/ajaxfileupload.js' ?>" type="text/javascript"></script>
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
            <a href="#title-link" class="ml-color-white">信息编辑</a>
        </h1>
    </header>
    <div>
        <section class="am-panel am-panel-default" style='border-color:#ddd;'>
            <div onclick="change(1)"  class="am-g ml-ontouch" style="margin: 0;">
                <div class="am-u-sm-10" style="font-size: 1em;margin: 0;padding:5px;">
                    <img  id="elemend" class="am-img am-circle" src="<?= $this->session->userdata('face') == FALSE ? 'http://img3.douban.com/lpic/o626254.jpg' : $this->session->userdata('face') . '@!nail250'; ?>" style="height:80px;width:80px;" />
                </div>
                <div class="am-u-sm-2 am-text-center" style="height:50px;font-size: 1em;padding: 0;margin: 0;">
                    <span class="am-icon-angle-right" style="line-height:80px;font-size: 1.5em;color:#ccc;">&nbsp;</span>
                </div>
            </div>
        </section>
        <section class="am-panel am-panel-default" style='border-color:#ddd;'>
            <div onclick="change(2)" class="am-g ml-ontouch" style="margin: 0;border-bottom: 1px solid #ddd;">
                <div class="am-u-sm-10 " style="height:50px;font-size: 1em;margin: 0;">
                    <span class="am-fl" style="line-height:50px;font-size: 1.1em;color:#888;">用户昵称</span>
                    <span class="am-fr" style="line-height:50px;font-size: 0.9em;color:#bbb;"><?= $this->session->userdata('stu_nick_name') == FALSE ? '未填写' : $this->session->userdata('stu_nick_name'); ?></span>
                </div>
                <div class="am-u-sm-2 am-text-center" style="height:50px;font-size: 1em;padding: 0;margin: 0;">
                    <span class="am-icon-angle-right" style="line-height:50px;font-size: 1.5em;color:#ccc;">&nbsp;</span>
                </div>

            </div>
            <div onclick="change(3)" class="am-g ml-ontouch" style="margin: 0;border-bottom: 1px solid #ddd;">
                <div class="am-u-sm-10" style="height:50px;font-size: 1em;margin: 0;">
                    <span class="am-fl" style="line-height:50px;font-size: 1.1em;color:#888;">真实姓名</span>
                    <span class="am-fr" style="line-height:50px;font-size: 0.9em;color:#bbb;"><?= $this->session->userdata('true_name') == FALSE ? '未填写' : $this->session->userdata('true_name'); ?></span>
                </div>
                <div class="am-u-sm-2 am-text-center" style="height:50px;font-size: 1em;padding: 0;margin: 0;">
                    <span class="am-icon-angle-right" style="line-height:50px;font-size: 1.5em;color:#ccc;">&nbsp;</span>
                </div>
            </div>
        </section>

        <section class="am-panel am-panel-default" style='border-color:#ddd;'>
            <div onclick="change(4)" class="am-g ml-ontouch" style="margin: 0;border-bottom: 1px solid #ddd;">
                <div class="am-u-sm-10" style="height:50px;font-size: 1em;margin: 0;">
                    <span class="am-fl" style="line-height:50px;font-size: 1.1em;color:#888;">联系电话</span>
                    <span class="am-fr" style="line-height:50px;font-size: 0.9em;color:#bbb;"><?= $this->session->userdata('TEL') == FALSE ? '未填写' : $this->session->userdata('TEL'); ?></span>
                </div>
                <div class="am-u-sm-2 am-text-center" style="height:50px;font-size: 1em;padding: 0;margin: 0;">
                    <span class="am-icon-angle-right" style="line-height:50px;font-size: 1.5em;color:#ccc;">&nbsp;</span>
                </div>

            </div>
            <div onclick="change(5)" class="am-g ml-ontouch" style="margin: 0;border-bottom: 1px solid #ddd;">
                <div class="am-u-sm-10" style="height:50px;font-size: 1em;margin: 0;">
                    <span class="" style="line-height:50px;font-size: 1.1em;color:#888;">修改密码</span>
                </div>
                <div class="am-u-sm-2 am-text-center" style="height:50px;font-size: 1em;padding: 0;margin: 0;">
                    <span class="am-icon-angle-right" style="line-height:50px;font-size: 1.5em;color:#ccc;">&nbsp;</span>
                </div>

            </div>
            <div onclick="change(6)" class="am-g  ml-ontouch" style="margin: 0;">
                <div class="am-u-sm-10" style="height:50px;font-size: 1em;margin: 0;">
                    <span class="" style="line-height:50px;font-size: 1.1em;color:#888;">更&nbsp;&nbsp;多</span>
                </div>
                <div class="am-u-sm-2 am-text-center" style="height:50px;font-size: 1em;padding: 0;margin: 0;">
                    <span class="am-icon-angle-right" style="line-height:50px;font-size: 1.5em;color:#ccc;">&nbsp;</span>
                </div>
            </div>
        </section>




    </div>
</div>
<!-------------------------------------------第二个页面分分割线-------------------------------------------->


<div class="am-page" id="demo-list-page" style="display: none;">
    <header data-am-widget="header" class="am-header am-header-default ml-color-bg-main" data-am-sticky>
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

            <div class="all-page changeHead" style='display:none;'><!--修改头像-->
                <div class="am-center" style=" overflow: none;" >
                    <div class="am-form-file am-margin-top">
                        <button type="button" class="am-btn am-btn-danger am-btn-sm">
                            <i class="am-icon-cloud-upload"></i> 选择要上传的图片</button>
                        <input id="doc-form-file" type="file" name="imageUpload" onchange="showPreview(this)" multiple>
                    </div>
                    <div id="file-list" style="position: relative;top:-50px;"></div>
                    <img  id="element_id" src="" >
                    <img  id="element_id_shadow" src="" style="display:none;">
                </div>
            </div>

            <div class="all-page edit-nick-name" style='display:none;font-size: 1em;'><!--修改昵称-->
                <div class="login-alert am-alert am-alert-danger"  style="margin:0;">
                    <p class="name_alert" onchange="toAlert()"></p>
                </div>
                <div class="nick_name_container am-margin">
                    <form class="am-form" method="post" onsubmit="return checkNickNameForm(this)">
                        <input class="am-form-field" id="nick_name_input" value="" name="nick_name_input" onfocus="check_onfocus()" maxlength=10 type="text" placeholder="<?= $this->session->userdata('stu_nick_name') == FALSE ? '给自己起个美美的昵称吧' : $this->session->userdata('stu_nick_name'); ?>" style="border-top: 0;border-left: 0;border-right: 0;"><br/>
                        <button type="submit" class="am-btn am-btn-primary am-btn-block">确&nbsp;&nbsp;&nbsp;定</button>
                    </form>

                </div>
            </div>

            <div class="all-page edit-true-name" style='display:none;font-size: 1em;'><!--修改真实姓名-->
                <div class="login-alert am-alert am-alert-danger"  style="margin:0;">
                    <p class="name_alert" onchange="toAlert()"></p>
                </div>
                <div class="true_name_container am-margin">
                    <form class="am-form" method="post" onsubmit="return checkTrueNameForm(this)">
                        <input class="am-form-field" id="true_name_input" value="" name="true_name_input" onfocus="check_onfocus()" maxlength=4 type="text" placeholder="<?= $this->session->userdata('true_name') == FALSE ? '请输入真实姓名' : $this->session->userdata('true_name'); ?>" style="border-top: 0;border-left: 0;border-right: 0;"><br/>
                        <button type="submit" class="am-btn am-btn-primary am-btn-block">确&nbsp;&nbsp;&nbsp;定</button>
                    </form>
                </div>
            </div>

            <div class="all-page edit-psw" style='display:none;font-size: 1em;'><!--修改密码-->
                <div class="login-alert am-alert am-alert-danger"  style="margin:0;">
                    <p class="name_alert" onchange="toAlert()"></p>
                </div>
                <div class="true_name_container am-margin">
                    <form class="am-form" method="post" onsubmit="return checkPswForm(this)">
                        <input class="am-form-field" id="old_psw" value="" name="old_psw" onfocus="check_onfocus()"  type="password" placeholder="请输入旧密码" style="border-top: 0;border-left: 0;border-right: 0;">
                        <input class="am-form-field" id="new_psw" value="" name="new_psw" onfocus="check_onfocus()"  type="password" placeholder="请输入新密码" style="border-top: 0;border-left: 0;border-right: 0;">
                        <input class="am-form-field" id="re_new_psw" value="" name="re_new_psw" onfocus="check_onfocus()" type="password" placeholder="再输一遍新密码" style="border-top: 0;border-left: 0;border-right: 0;"><br/>

                        <button type="submit" class="am-btn am-btn-primary am-btn-block">确&nbsp;&nbsp;&nbsp;定</button>
                    </form>
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
<div class="preview-btn" style="position:fixed;bottom:0px;width:100%;z-index:1100; display: none;">
    <button class="am-btn am-btn-lg am-btn-primary" style="width: 100%;" onclick="showCanvas()">预&nbsp;&nbsp;&nbsp;览</button>
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

<div class="am-modal am-modal-confirm" tabindex="-1" id="my-confirm">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">您的头像</div>
        <div class="am-modal-bd">
            <canvas id="myCanvas" height="200" width="200"></canvas>
        </div>
        <div class="am-modal-footer">
            <span class="am-modal-btn" data-am-modal-cancel>取消</span>
            <span class="am-modal-btn" data-am-modal-confirm>上传</span>
        </div>
    </div>
</div>
<script>
    var curWwwPath = window.document.location.href;
    var pathName = window.document.location.pathname;
    var pos = curWwwPath.indexOf(pathName);
    var localhostPath = curWwwPath.substring(0, pos);
    var radio = '';
    var jcrop_api;
    var realWidth;
    var realHeight;
    function toAlert() {
        $('.login-alert').css('display', 'block');
    }

    $(function () {
        $('#doc-my-tabs').tabs();
        $('.login-alert').css('display', 'none');
        realWidth = document.body.clientWidth;
        realHeight = document.body.clientHeight;
//        $('#element_id').css('max-height', realHeight - 20);
        $('#element_id').css('max-width', realWidth);

        $('#doc-form-file').on('change', function () {
            var fileNames = '';
            $.each(this.files, function () {
                fileNames += "<span class='am-badge'  style='width:100%;line-height:12px;font-size:0.7em;background:url(/application/images/alpha50.png)'>" + this.name + '</span> ';
            });
            $('#file-list').html(fileNames);
        });
    });

    function showPreview(source) {
        openModel();
        $('.preview-btn').css('display', 'none');
        if (typeof (jcrop_api) != 'undefined') {
            jcrop_api.destroy();
            $('#element_id').css('height', '');
            $('#element_id').css('widhth', '');
        }
        var file = source.files[0];
        if (window.FileReader) {
            var fr = new FileReader();
            fr.onloadend = function (e) {
                $("#element_id").attr("src", e.target.result);
                $("#element_id_shadow").attr("src", e.target.result);
//                setTimeout(getRaio(),1000);
                closeModel();
                changeHead();
            };
            fr.readAsDataURL(file);
        }

    }
    function getRaio() {
        var real_w = $("#element_id_shadow").width();
        var w = $("#element_id").width();
        radio = real_w / w;
        alert(real_w);

    }

    function  change(id) {
        window.scroll(0, 0);
        switch (id) {
            case 1:
                $('.changeHead').css('display', 'block');
                $('.my_title').html('修改头像');
                break;
            case 2:
                $('.edit-nick-name').css('display', 'block');
                $('.my_title').html('修改昵称');
//                study_record();
                break;
            case 3:
                $('.edit-true-name').css('display', 'block');
                $('.my_title').html('修改真实姓名');
                break;
            case 5:
                $('.edit-psw').css('display', 'block');
                $('.my_title').html('修改密码');
                break;
        }
        $('#demo-list-page').css('display', 'block');
        setTimeout(function () {
            $('body').addClass('demo-list-active');
        }, 1);
//        setTimeout(openModel, 300);
    }

    function changeHead() {
        $('.preview-btn').css('display', 'block');
        $('#element_id').Jcrop({
            aspectRatio: 1,
            allowSelect: false,
            onSelect: updateCoords,
//            boxWidth: realWidth,
            handleSize: 12
        }
        , function () {
            jcrop_api = this;
            jcrop_api.animateTo([20, 20, 120, 120]);
        }
        );
    }
    function updateCoords(c) {
        var x = c.x;
        var y = c.y;
        var w = c.w;
        var h = c.h;
        var real_width = $("#element_id_shadow").width();
        var width = $("#element_id").width();
        radio = real_width / width;
        var thiswindow = $(window);
        thiswindow.smoothScroll({position: y - 30, speed: 1000});
        var canvas = document.getElementById("myCanvas");
        var ctx = canvas.getContext("2d");
        var img = document.getElementById("element_id");
        ctx.drawImage(img, x * radio, y * radio, w * radio, h * radio, 0, 0, 200, 200);
//        showCanvas();



    }
    function UploadPic() {
        openModel();
        // Generate the image data
        var Pic = document.getElementById("myCanvas").toDataURL("image/png");
        Pic = Pic.replace(/^data:image\/(png|jpg);base64,/, "");
        // Sending the image data to Server
        $.ajax({
            type: 'POST',
            url: '<?= base_url() ?>index.php/mobile/upload_image',
            data: {img: Pic},
            dataType: 'text', //返回值类型 一般设置为json
            success: function (msg) {
                if (msg == 1) {
                    location.replace(localhostPath + "/index.php/mobile/vip_home");
                }
                closeModel();
            }
        });
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

    function showCanvas() {
        $('#my-confirm').modal({
            relatedTarget: this,
            onConfirm: function (options) {
                UploadPic();
            },
            // closeOnConfirm: false,
            onCancel: function () {
            }
        });
    }

    function checkNickNameForm(thisform) {
        with (thisform)
        {
            if (nick_name_input.value === "") {
                nick_name_input.focus();
                toAlert();
                $(".name_alert").text("输入不能为空");
                return false;
            } else if (checkSpecialCharacter(nick_name_input.value)) {
                toAlert();
                $(".name_alert").text("不能有特殊字符");
            } else if (nick_name_input.value.length < 3) {
                toAlert();
                $(".name_alert").text("太短啦");
            }
            else {
                $.ajax({
                    type: "POST",
                    dataType: "text",
                    url: localhostPath + "/index.php/info_change/nickName",
                    async: true,
                    data: {nickName: nick_name_input.value},
                    success: function (data) {
                        location.replace(localhostPath + "/index.php/mobile/vip_home");


                    }});
            }

        }
        return false;
    }

    function checkTrueNameForm(thisform) {
        with (thisform)
        {
            if (true_name_input.value === "") {
                true_name_input.focus();
                toAlert();
                $(".name_alert").text("输入不能为空");
                return false;
            } else if (!isChn(true_name_input.value)) {
                toAlert();
                $(".name_alert").text("必须是中文，谢谢");
            } else if (true_name_input.value.length < 2) {
                toAlert();
                $(".name_alert").text("太短啦");
            }
            else {
                $.ajax({
                    type: "POST",
                    dataType: "text",
                    url: localhostPath + "/index.php/info_change/realName",
                    async: true,
                    data: {realName: true_name_input.value},
                    success: function (data) {
//                        window.location.replace( localhostPath + "/index.php/mobile/vip_home");
//                        history.go(-1);
                       location.replace(localhostPath + "/index.php/mobile/vip_home");



                    }});
            }

        }
        return false;
    }
    function checkPswForm(thisform) {
        with (thisform)
        {
            if (old_psw.value === "" || new_psw.value === "" || re_new_psw.value === "") {
                old_psw.focus();
                toAlert();
                $(".name_alert").text("输入不能为空");
                return false;
            } else if (new_psw.value !== re_new_psw.value) {
                new_psw.focus();
                toAlert();
                $(".name_alert").text("新密码输入不一致");
                return false;
            } else if (new_psw.value.length < 8) {
                new_psw.focus();
                toAlert();
                $(".name_alert").text("密码必须大于8个字符");
                return false;
            }
            else {
                $.ajax({
                    type: "POST",
                    dataType: "text",
                    url: localhostPath + "/index.php/info_change/pwdChange",
                    async: true,
                    data: {pwd_active: old_psw.value, new_pwd_one: new_psw.value},
                    success: function (data) {
                        switch (data) {
                            case '1':
                                location.replace(localhostPath + "/index.php/mobile/vip_home");
                                break;
                            case '3':
                                new_psw.focus();
                                toAlert();
                                $(".name_alert").text("旧密码错误");
                                break;
                            case '7':
                                new_psw.focus();
                                toAlert();
                                $(".name_alert").text("修改异常");
                                break;
                            case '9':
                                new_psw.focus();
                                toAlert();
                                $(".name_alert").text("修改出错");
                                break;
                        }



                    }});
            }

        }
        return false;
    }
    function check_onfocus() {
        $(".name_alert").text('');
        $('.login-alert').css('display', 'none');
    }
    /**
     * 昵称限制特殊字符验证
     */

    function checkSpecialCharacter(str) {
        var specialKey = "~\!@()&#$%\^*\'\"\+！@#￥%…&*（）——+-=？“：；‘，。《》、{}【】";//Specific Key list
        for (var i = 0; i < str.length; i++) {
            flag = specialKey.indexOf(str.substr(i, 1));
            if (flag >= 0)
                return true;
        }
        return false;
    }
    //真实姓名
    //只能输入中文
    function isChn(str) {
        var reg = /^[\u4E00-\u9FA5]+$/;
        if (!reg.test(str)) {
            return false;
        }
        return true;
    }

</script>




