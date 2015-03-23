<!doctype html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>驾培网管理系统-首页</title>
        <meta name="keywords" content="index">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" href="<?= base_url() ?>application/css/admin/amazeui.min.css"/>
        <link rel="stylesheet" href="<?= base_url() ?>application/css/admin/amazeui.chosen.min.css"/>
        <link rel="stylesheet" href="<?= base_url() ?>application/css/admin/admin.css">
    </head>
    <body>
        <!--[if lte IE 9]>
        <p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
          以获得更好的体验！</p>
        <![endif]-->

        <header class="am-topbar admin-header">
            <div class="am-topbar-brand">
                <strong>驾培网</strong> <small>后台管理系统</small>
            </div>

            <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

            <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

                <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
                    <li><a href="javascript:;"><span class="am-icon-envelope-o"></span> 收件箱 <span class="am-badge am-badge-warning">5</span></a></li>
                    <li class="am-dropdown" data-am-dropdown>
                        <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                            <span class="am-icon-users"></span> 管理员 <span class="am-icon-caret-down"></span>
                        </a>
                        <ul class="am-dropdown-content">
                            <li><a href="#"><span class="am-icon-user"></span> 资料</a></li>
                            <li><a href="#"><span class="am-icon-cog"></span> 设置</a></li>
                            <li><a href="#"><span class="am-icon-power-off"></span> 退出</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:;" id="admin-fullscreen"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
                </ul>
            </div>
        </header>

        <div class="am-cf admin-main">
            <!-- sidebar start -->
            <div class="admin-sidebar">
                <ul class="am-list admin-sidebar-list">
                    <li><a href="admin-index.html"><span class="am-icon-home"></span> 首页</a></li>
                    <li class="admin-parent">
                        <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-file"></span> 信息编辑 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                        <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
                            <li><a href="<?=  base_url()?>index.php/admin/insert_info" class="am-cf"><span class="am-icon-check"></span> 信息录入 <span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
                            <li><a href="<?=  base_url()?>index.php/admin/check_info"><span class="am-icon-puzzle-piece"></span> 检查信息</a></li>
                            <li><a href="admin-gallery.html"><span class="am-icon-th"></span>驾校信息查看<span class="am-badge am-badge-secondary am-margin-right am-fr">24</span></a></li>
                            <li><a href="admin-log.html"><span class="am-icon-calendar"></span> 教练信息查看</a></li>
                        </ul>
                    </li>
                </ul>

                <div class="am-panel am-panel-default admin-sidebar-panel">
                    <div class="am-panel-bd">
                        <p><span class="am-icon-bookmark"></span> 公告</p>
                        <p>时光静好，与君语；细水流年，与君同。—— Amaze</p>
                    </div>
                </div>
            </div>
            <!-- sidebar end -->

            <!-- content start -->
            <?= $content ?>
            <!-- content end -->
        </div>


    </div>

    <footer>
        <hr>
        <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
    </footer>

    <!--[if lt IE 9]>
    <script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
    <script src="assets/js/polyfill/rem.min.js"></script>
    <script src="assets/js/polyfill/respond.min.js"></script>
    <script src="assets/js/amazeui.legacy.js"></script>
    <![endif]-->

    <!--[if (gte IE 9)|!(IE)]><!-->
    <script src="<?php echo base_url() . 'application/js/admin/jquery.min.js' ?>" ></script>
    <script src="<?= base_url() ?>application/js/admin/amazeui.min.js"></script>
    <script src="<?= base_url() ?>application/js/admin/amazeui.chosen.js"></script>
    <!--<![endif]-->
    <script src="<?= base_url() ?>application/js/admin/app.js"></script>
    <script>
        function setImagePreview() {
            var docObj = $('.file');
            document.getElementById("file");
            var imgObjPreview = document.getElementById("preview");
            if (docObj.files && docObj.files[0]) {
                //火狐下，直接设img属性  
                imgObjPreview.style.display = 'block';
                imgObjPreview.style.width = '400px';
                //imgObjPreview.src = docObj.files[0].getAsDataURL();  

                //火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式    
                imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);
            } else {
                //IE下，使用滤镜  
                docObj.select();
                var imgSrc = document.selection.createRange().text;
                var localImagId = document.getElementById("localImag");
                //必须设置初始大小  
                //                    localImagId.style.width = "300px";
                //                    localImagId.style.height = "120px";
                //图片异常的捕捉，防止用户修改后缀来伪造图片  
                try {
                    localImagId.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
                    localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;
                } catch (e) {
                    alert("您上传的图片格式不正确，请重新选择!");
                    return false;
                }
                imgObjPreview.style.display = 'none';
                document.selection.empty();
            }
            return true;
        }
    </script> 
    <script>
         $(function () {
                $.ajax({
                    type: "GET",
                    url: "<?= base_url() ?>index.php/admin/get_schools?r=" + Math.random(),
                    async: true,
                    success: function (data) {
                        var json = eval ("(" + data + ")");
                        for(var i=0 ;i<json.length;i++){
                            
                             $('#select_sch').append("<option value='" +json[i].jp_id+ "'>" + json[i].jp_name + "</option>");
                             
                        }
                        $('#select_sch').trigger('chosen:updated');
                        

                    }
                });

         })
         
    
    </script>
</body>
</html>
