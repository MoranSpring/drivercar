<nav data-am-widget="menu" class="am-menu  am-menu-dropdown1" data-am-menu-offcanvas>
    <a href="javascript: void(0)" class="am-menu-toggle">
        <i class="am-menu-toggle-icon am-icon-list am-icon">&nbsp</i>
    </a>
    <div class="am-offcanvas">
        <div class="am-offcanvas-bar">
            <ul class="am-menu-nav am-avg-sm-1">
                <li class=""style="background:#333;border-bottom: 1px dotted #999;">
                    <div class="am-g am-margin-sm">
                        <div class="am-u-sm-4 am-u-md-4">
                            <img class="am-circle" src="<?= $this->session->userdata('face'); ?>@!nail250" height="80px" height="80px"/>
                        </div>
                        <div class="am-u-sm-7 am-u-md-7" style="color:#fff">
                            <span class=" am-text-lg am-fl"  style="color:#fff"><?= $this->session->userdata('name'); ?></span>
                            <lable type="button" class="am-btn-sm am-fr am-btn-warning am-radius" onclick="window.location='<?= base_url()?>index.php/first/login_exit'"  style="width:50px;text-align: center">退出</lable>
                        </div>
                        <div class="am-u-sm-8 am-u-md-8 am-text-lg"  style="color:#fff">学员，下午好！</div>
                    </div>
                </li>
                <li class="">
                    <a href="##" class=""style="background:#333;border-bottom: 1px dotted #999;">首页</a>
                </li>
                <li class="am-parent">
                    <a href="##" class=""style="background:#333;border-bottom: 1px dotted #999">驾培资讯</a>
                    <ul class="am-menu-sub am-collapse">
                        <li class="">
                            <a href="##" class=""style="background:#555;border-bottom: 1px dashed #999;color: #ddd">驾培资讯</a>
                        </li>
                        <li class="">
                            <a href="##" class=""style="background:#555;border-bottom: 1px dashed #999;color: #ddd">驾培点信息</a>
                        </li>
                        <li class="">
                            <a href="##" class=""style="background:#555;border-bottom: 1px dashed #999;color: #ddd">服务指南</a>
                        </li>
                        <li class="">
                            <a href="##" class=""style="background:#555;border-bottom: 1px dashed #999;color: #ddd">教练信息</a>
                        </li>
                        <li class="">
                            <a href="##" class=""style="background:#555;border-bottom: 1px dashed #999;color: #ddd">教学大纲</a>
                        </li>
                    </ul>
                </li>
                <li class="am-parent">
                    <a href="##" class=""style="background:#333;border-bottom: 1px dotted #999">会员中心</a>
                    <ul class="am-menu-sub am-collapse">
                        <li class="">
                            <a href="##" class=""style="background:#555;border-bottom: 1px dashed #999;color: #ddd">学习进度</a>
                        </li>
                        <li class="">
                            <a href="<?= base_url()?>index.php/mobile/study_book" class=""style="background:#555;border-bottom: 1px dashed #999;color: #ddd">预约培训</a>
                        </li>
                        <li class="">
                            <a href="<?= base_url() ?>index.php/mobile/management" class=""style="background:#555;border-bottom: 1px dashed #999;color: #ddd">学习管理</a>
                        </li>
                        <li class="">
                            <a href="##" class=""style="background:#555;border-bottom: 1px dashed #999;color: #ddd">我的积分</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>
