
<div id="content" class="clearfix">
    <div id="con-coach-right">
        <div id="con-nav">
            <p><a href="void">首页</a>  >预约管理</p>
        </div>
        <link type="text/css" href="<?= base_url() ?>application/css/ml.css" rel="stylesheet">
        <ul class="tab">
            <li id="one1" class="selected-li" onclick="setTab('one', 1, 3)">已预约课程</li>
            <li id="one2" onclick="setTab('one', 2, 3)"  style="border-right:1px solid #aaa;">申诉退订</li>
        </ul>
        <div class="pos_content">
            <div id="content1" class="clearfix">
                <div style="margin: 5px;">
                    <table class="ml-table am-table am-table-bordered" >
                        <thead>
                            <tr style="background: #CCC9C0">
                                <th>日期 </th>
                                <th>节数</th>
                                <th>培训点 </th>
                                <th>学员</th>
                                <th>项目 </th>
                                <th>积分</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($book_list)) {
                            foreach ($book_list as $row)
                            echo $row;}
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
            <div id="content2" style="display:none">
                <div style="margin: 5px;">
                    <table class="ml-table am-table am-table-bordered" >
                        <thead>
                            <tr style="background: #CCC9C0">
                                <th>日期 </th>
                                <th>节数</th>
                                <th>培训点 </th>
                                <th>学员</th>
                                <th>项目 </th>
                                <th>消费积分</th>
                                <th>同意退订</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($unbook_list)) {
                                foreach ($unbook_list as $row)
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
<script>
    $('.unbook_confirm').live("click",function () {
        if (confirm("你确信?"))
        {
            var book_id = $(this).attr('book_id');
            var thisData = $(this);
            $.ajax({
                type: "POST",
                dataType: "text",
                url: "<?= base_url() ?>index.php/coach/unbook",
                async: true,
                data: {book_id: book_id},
                success: function (data) {
                    if (data == 1) {
                        thisData.addClass('unbook_end');
                        thisData.html('已同意');
                        thisData.removeClass('unbook_confirm');
                    }
                    else {
                        alert("删除失败！");
                    }
                }
            });
        }
    });
</script>
<script>
    var isTab1 = isTab2 = isTab3 = false;
    function onDisplay(num) {
//        if (num === 1 && isTab1 === false) {
//        } else if (num === 2 && isTab2 === false) {
//            isTab2 = true;
//            $.ajax({
//                type: "POST",
//                dataType: "text",
//                url: "<?=  base_url()?>index.php/coach/get_coach_comment",
//                async: true,
//                data: {},
//                success: function (data) {
//                    $('.coach_comment').append(data);
//                    
//                    }
//                });
//        }
    }
</script>


