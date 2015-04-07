
<div id="content" class="clearfix">
    <div id="con-coach-right">
        <div id="con-nav">
            <p><a href="void">首页</a>  >预约管理</p>
        </div>
        <link type="text/css" href="<?= base_url() ?>application/css/ml.css" rel="stylesheet">
        <ul class="tab">
            <li id="one1" class="selected-li" onclick="setTab('one', 1, 3)">已预约课程</li>
            <li id="one2" onclick="setTab('one', 2, 3)">申诉退订</li>
            <li id="one3" onclick="setTab('one', 3, 3)">搜索</li>
        </ul>
        <div class="pos_content">
            <div id="content1" class="clearfix">
                <div style="margin: 5px;">
                    <table class="ml-table am-table am-table-bordered" >
                        <thead>
                            <tr style="background: #CCC9C0">
                                <td>日期 </td>
                                <td>节数</td>
                                <td>培训点 </td>
                                <td>学员</td>
                                <td>项目 </td>
                                <td>积分</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>?=$book_date?</td>
                                <td>第?=$book_cls_num?>节</td>
                                <td>?=$sch_name?> </td>
                                <td>?=$coa_name?></td>
                                <td>倒库</td>
                                <td>100积分</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <div id="content2" style="display:none">
                <div style="margin: 5px;">
                    <table class="ml-table am-table am-table-bordered" >
                        <thead>
                            <tr style="background: #CCC9C0">
                                <td>日期 </td>
                                <td>节数</td>
                                <td>培训点 </td>
                                <td>学员</td>
                                <td>项目 </td>
                                <td>消费积分</td>
                                <td>同意退订</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>?=$book_date?</td>
                                <td>第?=$book_cls_num?>节</td>
                                <td>?=$sch_name?> </td>
                                <td>?=$coa_name?></td>
                                <td>倒库</td>
                                <td>100积分</td>
                                <td class="unbook_confirm" book_id="?=$book_id?">同意</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="content3" style="display:none">
            </div>
        </div>


    </div>
</div>

