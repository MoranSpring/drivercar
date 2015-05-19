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
            <li><a href="<?= base_url() . 'index.php/vipcenter/management' ?>"><span>学习管理</span></a></li>
            <li><a href="<?= base_url() . 'index.php/vipcenter/feedback' ?>"><span>学习反馈</span></a></li>
            <li><a href="<?= base_url() . 'index.php/vipcenter/point_manage' ?>"><span>我的积分</span></a></li>
            <li><a href="<?= base_url() . 'index.php/vipcenter/complain_manage' ?>"><span>申诉</span></a></li>
            <li><a href="<?= base_url() . 'index.php/vipcenter/my_partner' ?>"><span>我的学友</span></a></li>
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
                </div>
            </div>
        </div>

    </div>
</div>
