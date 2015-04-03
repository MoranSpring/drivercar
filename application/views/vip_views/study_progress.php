<script>
    $(function () {
        set_date();

    });
    function set_date() {
        $(".date").each(function () {
            var date = $(this).html();
            var newdate = parseISO8601(date);
            var day = newdate.getDate();
            var month = newdate.getMonth() + 1;
            $(this).empty();
            $(this).html(month + "月" + day + "日");
        });

    }
    function parseISO8601(dateStringInRange) {
        var isoExp = /^\s*(\d{4})-(\d\d)-(\d\d)\s*$/,
                date = new Date(NaN), month,
                parts = isoExp.exec(dateStringInRange);

        if (parts) {
            month = +parts[2];
            date.setFullYear(parts[1], month - 1, parts[3]);
            if (month != date.getMonth() + 1) {
                date.setTime(NaN);
            }
        }
        return date;
    }
</script>
<div id="content" class="clearfix">
    <div id="con-left">
        <ul>
            <li><a href="<?= base_url() . 'index.php/vipcenter/vip_center' ?>"><span>个人信息</span></a></li>
            <li><a href="<?= base_url() . 'index.php/vipcenter/study_progress' ?>"><span>学习进度</span></a></li>
            <li><a href="<?= base_url() . 'index.php/vipcenter/study_book' ?>"><span>预约培训</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/ser_info' ?>"><span>学习管理</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/coach_info' ?>"><span>学习反馈</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/sch_info' ?>"><span>我的积分</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/sch_info' ?>"><span>申诉</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/sch_info' ?>"><span>我的学友</span></a></li>
        </ul>
    </div>
    <div id="con-right">
        <div id="con-nav">
            <p><a href="void">首页</a> > <a href="void">会员中心</a> >学习进度</p>
        </div>
        <div id="con-con" class ="real_content content">
            <div class="wrapper">

                <div class="main">
                    <h1 class="title">
                        我的学习进度
                    </h1>
                    <?= $year ?>
                    <div class="year">
                        <h2>
                            <a href="#">
                                2013年
                                <i>
                                </i>
                            </a>
                        </h2>
                        <div class="list">
                            <ul>
                                <li class="cls ">
                                    <p class="date">
                                        12.24
                                    </p>
                                    <p class="intro">
                                        微一微信V1.0bate正式上线
                                    </p>
                                    <p class="version">
                                        V1.0 beta
                                    </p>
                                    <div class="more">
                                        <p>
                                            修复微信墙现场抽奖成功但前台没反应的情况
                                        </p>
                                        <p>
                                            提供29套微官网模板
                                        </p>
                                        <p>
                                            修复登陆失效后登陆页面被包含在框架中的问题
                                        </p>
                                        <p>
                                            修复消息管理中搜索个别事件出错的问题
                                        </p>
                                        <p>
                                            修复找回密码URL失效问题
                                        </p>
                                        <p>
                                            增加微官网快捷菜单选择图标功能
                                        </p>
                                        <p>
                                            优化和修复其它一些细节和界面UI
                                        </p>
                                        <p>
                                            <br />
                                        </p>
                                        <p>
                                            <br />
                                        </p>
                                    </div>
                                </li>
                                <li class="cls ">
                                    <p class="date">
                                        12.10
                                    </p>
                                    <p class="intro">
                                        微房产上线
                                    </p>
                                    <p class="version">
                                        V1.0 beta
                                    </p>
                                    <div class="more">
                                        <p>
                                            优化通知邮件模板
                                        </p>
                                        <p>
                                            优化图文素材界面UI
                                        </p>
                                        <p>
                                            统一表单验证方法和UI
                                        </p>
                                        <p>
                                            统一系统弹框UI
                                        </p>
                                        <p>
                                            修改过缓存机制增加微房产微官网的相关关键词触发
                                        </p>
                                    </div>
                                </li>
                                <li class="cls ">
                                    <p class="date">
                                        11.26
                                    </p>
                                    <p class="intro">
                                        完善微信墙并为百会CRM年会提供微信上墙服务
                                    </p>
                                    <p class="version">
                                        V1.0 beta
                                    </p>
                                    <div class="more">
                                        <p>
                                            完善并优化微信墙功能
                                        </p>
                                        <p>
                                            增加关注自动同步粉丝资料
                                        </p>
                                        <p>
                                            增加粉丝“足迹”功能，可跟踪粉丝的每一个动作
                                        </p>
                                        <p>
                                            增加手动更新粉丝资料的功能，便于在自动更新失败或粉丝资料变化时手动更新
                                        </p>
                                    </div>
                                </li>
                                <li class="cls ">
                                    <p class="date">
                                        11.23
                                    </p>
                                    <p class="intro">
                                        微一微信V1.0bate上线试运行
                                    </p>
                                    <p class="version">
                                        V1.0 beta
                                    </p>
                                    <div class="more">
                                        提供公众号自动接入，自动应答，素材管理，菜单管理，粉丝管理，消息管理，微官网，微信墙等功能
                                        <br />
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
