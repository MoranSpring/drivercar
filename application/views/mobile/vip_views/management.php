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
            var today = new Date();
            var nowHour = today.getHours();
            var date=$(this).closest('.fur-list').find('.this-date').html()
            var gap = get_gap_of_date(date);
            if(gap>=3){
               alert('直接退掉！');
            }else if(gap===2){
               alert('扣5%！');
            }else if(gap===1){
               alert('扣10%！');
            }else if(gap===0&&nowHour<19){
               alert(nowHour);
               alert('扣20%！');
            }else if(gap===0&&nowHour>=19){
               alert('扣20%！且必须教练同意！');
            }else{
                alert('你退你大爷！！');
            }
            var book_id = $(this).attr('book_id');
            var thisData = $(this);
            $.ajax({
                type: "POST",
                dataType: "text",
                url: "<?= base_url() ?>index.php/mobile/unbook",
                async: true,
                data: {book_id: book_id},
                success: function (data) {
                    if (data == 1) {
                        if(gap>0){
                            thisData.html('已退订');
                        }else if(gap==1&&nowHour<19){
                            thisData.html('已退订');
                        }else{
                            thisData.html('已申请');
                        }
                        thisData.addClass('unbook_end');
                        
                        thisData.removeClass('unbook');
                    }
                    else {
                        alert("申请失败！");
                    }
                }
            });
        }
    });
    function get_gap_of_date(date){
    var mDate= new Date(date);
    var today = new Date();
    var days = mDate.getTime() - today.getTime();
    var gap=parseInt(days/86400000);
    return gap;
    }
</script>