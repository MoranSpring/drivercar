<!doctype html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>驾培网管理系统-首页</title>
        <meta name="keywords" content="index">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" href="<?= base_url() ?>application/css/admin/amazeui.min.css"/>
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
                        <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-file"></span> 驾校信息 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                        <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
                            <li><a href="admin-user.html" class="am-cf"><span class="am-icon-check"></span> 驾校信息录入 <span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
                            <li><a href="admin-help.html"><span class="am-icon-puzzle-piece"></span> 教练信息录入</a></li>
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
            <div class="admin-content">

                <div class="am-cf am-padding">
                    <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> / <small>一些常用模块</small></div>
                </div>
                <div class="am-tabs am-margin" data-am-tabs="{noSwipe: 1}">
                    <ul class="am-tabs-nav am-nav am-nav-tabs">
                        <li class="am-active"><a href="#tab1">基本信息</a></li>
                        <li><a href="#tab2">详细描述</a></li>
                        <li><a href="#tab3">图片上传</a></li>
                    </ul>
                    <div class="am-tabs-bd">


                        <div class="am-tab-panel am-fade am-in am-active" id="tab1" style="padding-bottom: 200px">
                            <form class="am-form" action="<?= base_url() . 'index.php/admin/upload' ?>" method="post" enctype="multipart/form-data">
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">新闻分类</div>
                                    <div class="am-u-sm-8 am-u-md-10">
                                        <select data-am-selected="{btnSize: 'sm'}" name="news_type">
                                            <option value="1">行业新闻</option>
                                            <option value="2">政策解读</option>
                                            <option value="3">法律法规</option>
                                            <option value="4">学车资讯</option>
                                            <option value="5">学车须知</option>
                                            <option value="6">学车流程</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">显示状态</div>
                                    <div class="am-u-sm-8 am-u-md-10">
                                        <div class="am-btn-group" data-am-button>
                                            <label class="am-btn am-btn-primary am-btn-xs">
                                                <input type="radio" name="options" id="option1"> 正   常
                                            </label>
                                            <label class="am-btn am-btn-primary am-btn-xs">
                                                <input type="radio" name="options" id="option2"> 待审核
                                            </label>
                                            <label class="am-btn am-btn-primary am-btn-xs">
                                                <input type="radio" name="options" id="option3"> 不显示
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">日历组件</div>
                                    <div class="am-u-sm-8 am-u-md-10 ">
                                        <input type="text" class="am-form-field" name="news_date" style="width: 200px" placeholder="日历组件" data-am-datepicker readonly/>
                                    </div>
                                </div>
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">文章标题</div>
                                    <div class="am-u-sm-8 am-u-md-4">
                                        <input type="text" class="am-input-sm" name="news_title">
                                    </div>
                                    <div class="am-hide-sm-only am-u-md-6">*必填，不可重复</div>
                                </div>

                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        文章作者
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                        <input type="text" class="am-input-sm" name="news_author">
                                    </div>
                                </div>


                                <div class="am-g am-margin-top-sm">
                                    <div class="am-u-sm-22 am-u-md-2 am-text-right admin-form-text">
                                        内容描述
                                    </div>
                                    <div class="am-u-sm-22 am-u-md-10">
                                        <textarea rows="10" placeholder="请使用富文本编辑插件" name="news_content"></textarea>
                                    </div>
                                </div>


                                <div class="am-g am-margin-top-sm">
                                    <div class="am-u-sm-22 am-u-md-2 am-text-right admin-form-text">Filename: </div>
                                    <div class="am-u-sm-22 am-u-md-10">
                                        <input type="file" name="file"   id="file" onchange="setImagePreview()"/> 
                                        <div id="localImag"><img id="preview" width=-1 height=-1 style="diplay:none" /></div>
                                    </div>
                                    <br />
                                    
                                    <br />
                                </div>
                                 <div class="am-margin">
                    <button type="submit" class="am-btn am-btn-primary am-btn-default">提交保存</button>
                    <button type="button" class="am-btn am-btn-primary am-btn-default">放弃保存</button>
                </div>
                            </form>
                        </div>

                        <div class="am-tab-panel am-fade" id="tab2">
                        </div>

                        <div class="am-tab-panel am-fade" id="tab3">
                        </div>

                    </div>
                </div>

               
            </div>

        </div>
        <!-- content end -->

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
    <!--<![endif]-->
    <script src="<?= base_url() ?>application/js/admin/app.js"></script>
    <script>
                                        function setImagePreview() {
                                            var docObj = document.getElementById("file");
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
</body>
</html>
