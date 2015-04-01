<div id="header">
    <nav class="clearfix">
        <ul class="hea-ul">
            <li>
                <a href="<?= base_url() ?>index.php"><span >首页</span></a>
            </li>
            <li class="user_header">
                <span class="am-icon-users"> <?= $username ?> <span class="am-icon-caret-down" style="display: inline ;padding: 0; "></span></span>
                <ul class='menu-chir chir user_menu'>
                    <li><a class="am-icon-user" href="<?= base_url() . 'index.php/vipcenter/vip_center' ?>">  教练中心</a></li>
                    <li><a class="am-icon-info-circle"  href="<?= base_url() . 'index.php/vipcenter/study_progress' ?>">  个人信息</a></li>
                    <li><a class="am-icon-power-off" style="color:#A00;"href="<?= base_url() . 'index.php/first/login_exit' ?>">  退出登录</a></li>
                </ul>

            </li>
        </ul>
    </nav> 
</div>
