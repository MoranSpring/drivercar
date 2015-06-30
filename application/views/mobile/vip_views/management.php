<header data-am-widget="header" class="am-header am-header-default ml-color-bg-main">
    <div class="am-header-left am-header-nav ">
        <a href="javascript:history.back();">
            <img class="am-header-icon-custom" src="data:image/svg+xml;charset=utf-8,&lt;svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 12 20&quot;&gt;&lt;path d=&quot;M10,0l2,2l-8,8l8,8l-2,2L0,10L10,0z&quot; fill=&quot;%23fff&quot;/&gt;&lt;/svg&gt;"
                 alt="" />&nbsp;
        </a>
    </div>
    <h1 class="am-header-title">
        学习管理
    </h1>
</header>
<div class="am-tabs am-margin-top" data-am-tabs>
    <ul class="am-tabs-nav am-nav am-nav-tabs">
        <li class="am-active"><a class='ml-color-a' href="#tab1">未消费订单</a></li>
        <li><a  class='ml-color-a' href="#tab2">历史订单</a></li>
    </ul>

    <div class="am-tabs-bd">
        <div class="am-tab-panel am-fade am-in am-active" id="tab1">
            <?php
            if (isset($unuse_list)) {
                foreach ($unuse_list as $row)
                    echo $row;
            } else {
                echo("<div>no data....</div>");
            }
            ?>
        </div>
        <div class="am-tab-panel am-fade" id="tab2">
            <?php
            if (isset($list)) {
                foreach ($list as $row)
                    echo $row;
            } else {
                echo("<div>no data....</div>");
            }
            ?>
        </div>

    </div>
</div>
<div class="am-modal am-modal-confirm" tabindex="-1" id="my-confirm">
    <div class="am-modal-dialog">
        <div class="am-modal-hd"><span  class="am-icon-exclamation-triangle" style="color: #b00;font-size: 1.3em;"></span>&nbsp;&nbsp;退订提示</div>
        <div class="am-modal-bd unbook_info"style="color:#888;">
        </div>
        <div class="am-modal-footer">
            <span class="am-modal-btn" data-am-modal-cancel style="color:#bbb">取消</span>
            <span class="am-modal-btn" data-am-modal-confirm style="color:#900">确定</span>
        </div>
    </div>
</div>
<script>
    $('.teach-comment').on("click", function () {
        window.location.href = "<?= base_url() . 'index.php/mobile/tocomment?id=' ?>" + $(this).attr('value');
    });

    $('.unbook').on("click", function () {
        var today = new Date();
        var nowHour = today.getHours();
        var date = $(this).closest('.fur-list').find('.this-date').html();
        var mthis = $(this);
        var gap = get_gap_of_date(date);
        if (gap >= 3) {
            var info = '你确定要申请退订吗?';
        } else if (gap === 2) {
            var info = '预定已不足3天，退订将仅退95%积分，你确定要申请退订吗?';
        } else if (gap === 1) {
            var info = '预定已不足2天，退订将仅退90%积分，你确定要申请退订吗?';
        } else if (gap === 0 && nowHour < 19) {
            var info = '预定已不足1天，退订将仅退80%积分，你确定要申请退订吗?';
        } else if (gap === 0 && nowHour >= 19) {
            var info = '距离预定日期不足5小时，退订将必须由教练同意且仅退80%积分，你确定要申请退订吗?';
        } else {
            alert('你退你大爷！！');
            return false;
        }
        $('.unbook_info').html(info);
        $('#my-confirm').modal({
            relatedTarget: this,
            onConfirm: function (options) {
             confirms($(this.relatedTarget),gap,nowHour);
            },
            onCancel: function () {
            }
        });

    });
    function confirms(mthis,gap,nowHour) {
        var book_id = mthis.attr('book_id');
        var thisData = mthis;
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
                    alert("申请失败！info..."+data);
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