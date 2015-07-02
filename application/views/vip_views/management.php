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
            <p><a href="void">首页</a> > <a href="void">会员中心</a> >学习管理</p>
        </div>
        <div id="con-con" class ="real_content">
            <ul class="tab">
                <li id="one1" class="selected-li" onclick="setTab('one', 1, 3)">未消费订单</li>
                <li id="one2" onclick="setTab('one', 2, 3)" style="border-right:1px solid #aaa;">历史订单</li>

            </ul>
            <div id="main_content" class="clearfix">
                <div id="content1" class="clearfix">
                    <div style="margin: 5px;">
                        <table class="ml-table am-table am-table-bordered" >
                            <thead>
                                <tr style="background: #CCC9C0">
                                    <td>日期 </td>
                                    <td>节数</td>
                                    <td>培训点 </td>
                                    <td>教练</td>
                                    <td>项目 </td>
                                    <td>消费积分</td>
                                    <td>申请退订</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($unuse_list)) {
                                    foreach ($unuse_list as $row)
                                        echo $row;
                                } else {
                                    echo("<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>");
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="content2" class="clearfix"   style="display:none;">
                    <div style="margin: 5px;">
                        <table class="ml-table am-table am-table-bordered" >
                            <thead>
                                <tr style="background: #CCC9C0">
                                    <td>日期 </td>
                                    <td>节数</td>
                                    <td>培训点 </td>
                                    <td>教练</td>
                                    <td>项目 </td>
                                    <td>消费积分</td>
                                    <td>评价</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($list)) {
                                    foreach ($list as $row)
                                        echo $row;
                                } else {
                                    echo("<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>");
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.teach-comment').live("click", function () {
        window.location.href = "<?= base_url() . 'index.php/vipcenter/tocomment?id=' ?>" + $(this).attr('value');
    });
    $('.unbook').live("click", function () {

        var today = new Date();
        var nowHour = today.getHours();
        var date = $(this).closest('tr').find('.this-date').html();
        var mthis = $(this);
        var info = '';
        var gap = get_gap_of_date(date);
        if (gap >= 3) {
            info = '你确定要申请退订吗?';
        } else if (gap === 2) {
            info = '预定已不足3天，退订将仅退95%积分，你确定要申请退订吗?';
        } else if (gap === 1) {
            info = '预定已不足2天，退订将仅退90%积分，你确定要申请退订吗?';
        } else if (gap === 0 && nowHour < 19) {
            info = '预定已不足1天，退订将仅退80%积分，你确定要申请退订吗?';
        } else if (gap === 0 && nowHour >= 19) {
            info = '距离预定日期不足5小时，退订将必须由教练同意且仅退80%积分，你确定要申请退订吗?';
        } else {
            alert('你退你大爷！！');
            return false;
        }
        if (confirm(info))
        {
            confirms(mthis, gap, nowHour);
//            var book_id = $(this).attr('book_id');
//            var thisData = $(this);
//            $.ajax({
//                type: "POST",
//                dataType: "text",
//                url: "<?= base_url() ?>index.php/vipcenter/unbook",
//                async: true,
//                data: {book_id: book_id},
//                success: function (data) {
//                    if (data == 1) {
//                        thisData.addClass('unbook_end');
//                        thisData.html('已申请');
//                        thisData.removeClass('unbook');
//                    }
//                    else {
//                        alert("申请失败！");
//                    }
//                }
//            });
        }
    });
    function confirms(nthis, gap, nowHour) {
        var book_id = nthis.attr('book_id');
        var thisData = nthis;
        $.ajax({
            type: "POST",
            dataType: "text",
            url: "<?= base_url() ?>index.php/mobile/unbook",
            async: true,
            data: {book_id: book_id},
            success: function (data) {
                if (data == 1) {
                    if (gap > 0) {
                        thisData.html('已退订');
                    } else if (gap == 0 && nowHour < 19) {
                        thisData.html('已退订');
                    } else {
                        thisData.html('已申请');
                    }
                    thisData.addClass('unbook_end');

                    thisData.removeClass('unbook');
                }
                else {
                    alert("申请失败！info..." + data);
                }
            }
        });

    }
    function get_gap_of_date(date) {
        var mDate = new Date(date);
        var today = new Date();
        var days = mDate.getTime() - today.getTime();
        var gap = Math.floor(days / 86400000);
        return gap;
    }
</script>