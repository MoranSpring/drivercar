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
                    <img  id="elemend" class="am-img am-circle" src="http://img3.douban.com/lpic/o626254.jpg" style="height:80px;width:80px;" />
                </div>
                <div class="am-u-sm-2 am-text-center" style="height:50px;font-size: 1em;padding: 0;margin: 0;">
                    <span class="am-icon-angle-right" style="line-height:80px;font-size: 1.5em;color:#ccc;">&nbsp;</span>
                </div>
            </div>
        </section>
        <section class="am-panel am-panel-default" style='border-color:#ddd;'>
            <div onclick="change(2)" class="am-g ml-ontouch" style="margin: 0;border-bottom: 1px solid #ddd;">
                <div class="am-u-sm-10 " style="height:50px;font-size: 1em;margin: 0;">
                    <span class="" style="line-height:50px;font-size: 1.1em;color:#888;">用户昵称</span>
                </div>
                <div class="am-u-sm-2 am-text-center" style="height:50px;font-size: 1em;padding: 0;margin: 0;">
                    <span class="am-icon-angle-right" style="line-height:50px;font-size: 1.5em;color:#ccc;">&nbsp;</span>
                </div>

            </div>
            <div onclick="change(3)" class="am-g ml-ontouch" style="margin: 0;border-bottom: 1px solid #ddd;">
                <div class="am-u-sm-10" style="height:50px;font-size: 1em;margin: 0;">
                    <span class="" style="line-height:50px;font-size: 1.1em;color:#888;">用户真实姓名</span>
                </div>
                <div class="am-u-sm-2 am-text-center" style="height:50px;font-size: 1em;padding: 0;margin: 0;">
                    <span class="am-icon-angle-right" style="line-height:50px;font-size: 1.5em;color:#ccc;">&nbsp;</span>
                </div>
            </div>
        </section>

        <section class="am-panel am-panel-default" style='border-color:#ddd;'>
            <div onclick="change(4)" class="am-g ml-ontouch" style="margin: 0;border-bottom: 1px solid #ddd;">
                <div class="am-u-sm-10" style="height:50px;font-size: 1em;margin: 0;">
                    <span class="" style="line-height:50px;font-size: 1.1em;color:#888;">联系电话</span>
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
                    <span class="" style="line-height:50px;font-size: 1.1em;color:#888;">更多</span>
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

            <div class="all-page changeHead" style='display:none;'><!--修改头像-->
                <div style="width:300px;height:300px; overflow: none;" >
                    <input type="file" name="imageUpload" onchange="showPreview(this)"/>
                    <img  id="element_id" src="" style="max-width:300px;max-height: 260px;">
                    <img  id="element_id_shadow" src="" style="display:none;">
                </div>
                <div>
                    <input onclick="UploadPic()" type="button" class="am-btn am-btn-danger" value="summit"/>
                </div>
                <div>
                    <canvas id="myCanvas" height="200" width="200"></canvas>
                </div>



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
    var radio = '';

    $(function () {
        $('#doc-my-tabs').tabs();
    });

    function showPreview(source) {
        var file = source.files[0];
        if (window.FileReader) {
            var fr = new FileReader();
            fr.onloadend = function (e) {
                $("#element_id").attr("src", e.target.result);
                $("#element_id_shadow").attr("src", e.target.result);
//                setTimeout(getRaio(),1000);
changeHead();
            };
            fr.readAsDataURL(file);
        }

    }
    function getRaio(){
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
//                changeHead();
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
        }
        $('#demo-list-page').css('display', 'block');
        setTimeout(function () {
            $('body').addClass('demo-list-active');
        }, 1);
//        setTimeout(openModel, 300);
    }

    function changeHead() {
        $('#element_id').Jcrop({
            aspectRatio: 1,
            onSelect: updateCoords,
            boxWidth: '300'
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
        alert(radio);
        var canvas = document.getElementById("myCanvas");
        var ctx = canvas.getContext("2d");
        var img = document.getElementById("element_id");
        ctx.drawImage(img, x * radio, y * radio, w * radio, h * radio, 0, 0, 200, 200);



    }
    function UploadPic() {
        alert('toLoad');
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
                    window.location.href = '<?= base_url() ?>index.php/mobile/vip_home';
                }
                alert(msg);
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


</script>




