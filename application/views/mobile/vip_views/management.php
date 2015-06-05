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
<script>
    $('.teach-comment').on("click", function () {
        window.location.href = "<?= base_url() . 'index.php/mobile/tocomment?id=' ?>" + $(this).attr('value');
    });
    $('.unbook').on("click", function () {
        if (confirm("你确定要申请退订吗?"))
        {
            var book_id = $(this).attr('book_id');
            var thisData = $(this);
            $.ajax({
                type: "POST",
                dataType: "text",
                url: "<?= base_url() ?>index.php/vipcenter/unbook",
                async: true,
                data: {book_id: book_id},
                success: function (data) {
                    if (data == 1) {
                        thisData.addClass('unbook_end');
                        thisData.html('已申请');
                        thisData.removeClass('unbook');
                    }
                    else {
                        alert("申请失败！");
                    }
                }
            });
        }
    });
</script>