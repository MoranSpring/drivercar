<div id="content" class="clearfix">
    <div id="con-left">
        <ul>
            <li><a href="<?= base_url() . 'index.php/vipcenter/vip_center' ?>"><span>个人信息</span></a></li>
            <li><a href="<?= base_url() . 'index.php/vipcenter/study_progress' ?>"><span>学习进度</span></a></li>
            <li><a href="<?= base_url() . 'index.php/vipcenter/study_book' ?>"><span>预约培训</span></a></li>
            <li><a href="<?= base_url() . 'index.php/vipcenter/management' ?>"><span>学习管理</span></a></li>
            <li><a href="<?= base_url() . 'index.php/vipcenter/feedback' ?>"><span>学习反馈</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/sch_info' ?>"><span>我的积分</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/sch_info' ?>"><span>申诉</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/sch_info' ?>"><span>我的学友</span></a></li>
        </ul>
    </div>
    <div id="con-right">
        <div id="con-nav">
            <p><a href="void">首页</a> > <a href="void">会员中心</a> >学习反馈</p>
        </div>
        <div id="con-con" class ="real_content">
         
            <div id="main_content" class="clearfix">
 
                <div id="content2" class="clearfix">
                    <div style="margin: 5px;">
                        <?php foreach($comment_history_list as $row) echo $row; ?>
                    </div>


            </div>
        </div>
        <script type="text/javascript">

            $(".thisbtn").toggle(function () {
                var content = "";
                var com_id=$(this).closest("div").attr("book_id");
                var thisTag = $(this).closest("div").next();
                $.ajax({
                    type: "POST",
                    dataType: "text",
                    url: "<?= base_url() ?>index.php/vipcenter/get_comment",
                    async: true,
                    data: {com_id: com_id},
                    success: function (data) {
                        content = data;
                        thisTag.empty();
                        thisTag.html(content);
                        thisTag.animate({height: "show"}, 500, 'easeOutQuart');


                    }
                });

            }
            , function () {
                $(this).closest("div").next().animate({height: "hide"}, 500, 'easeOutQuart');
            });
        </script>
