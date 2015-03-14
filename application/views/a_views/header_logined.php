<div id="header">
    <nav class="clearfix">
        <ul class="hea-ul">
            <li>
                <a href="<?= base_url() ?>index.php"><span >首页</span></a>
            </li>
            <li class="user_header">
                <a href="<?= base_url() ?>index.php/first/login"><span><?=$username?> <img src='<?= base_url()?>application/images/cover.png'style="float:right;vertical-align:middle;" class="user_header_img"/></span></a>
                    <ul class='menu-chir chir user_menu'>
                        <li><a href="<?= base_url() . 'index.php/first/sch_info' ?>"><span>会员中心</span></a></li>
                        <li><a href="<?= base_url() . 'index.php/first/pos_info' ?>"><span>个人信息</span></a></li>
                        <li><a href="<?= base_url() . 'index.php/first/login_exit' ?>"><span>退出登录</span></a></li>
                    </ul>
            </li>

            <li>
                <a href="<?= base_url() ?>index.php/first/register"><span>注册</span></a>
            </li>
        </ul>

    </nav> 
</div>
