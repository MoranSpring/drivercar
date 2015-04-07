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
            <p><a href="void">首页</a> > <a href="void">会员中心</a> >学习管理</p>
        </div>
        <div id="con-con" class ="real_content">
            <ul class="tab2">
                <li id="one1" class="selected-li" onclick="setTab('one', 1, 3)">未消费订单</li>
                <li id="one2" onclick="setTab('one', 2, 3)">历史订单</li>
                <li id="one3" onclick="setTab('one', 3, 3)">法律法规</li>

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
                                <?php foreach ($unuse_list as $row)
                                    echo $row;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="content2" class="clearfix">
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
                                <?php foreach ($list as $row)
                                    echo $row;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="content3" class="clearfix">

                </div>


            </div>
        </div>
        <script>
            function to_comment(title) {
                window.location.href="<?= base_url() . 'index.php/vipcenter/tocomment?id=' ?>"+title;
            }
        </script>