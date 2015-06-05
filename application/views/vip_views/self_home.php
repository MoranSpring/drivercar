<style>
    .co-self{
        width:100%;
    }
    .co-self li{
        float: left;width:100%;
        list-style-type:none;
    }
    .co-self-info>li{
        clear:both;
    }
    .co-name{
        width:100%;
        background: #6B625D;
        padding: 0 0 0 20px;
    }
    .co-name p{
        color:#fff;
        font-size: 1.6em;
        line-height: 1.6em;
    }
    .co-name div{
        color:#DAD9D4;
        font-size: 1em;
        line-height:1.5em;
    }
    .co-self-third li{
        float: left;
        color:#444;
        width:150px;
        font-size: 1em;
        line-height: 1.4em;
    }
    
    .co-self-third{
        margin: 5px 0 0 0 ;
    }
    .co-coa-content{
        margin: 50px 0 0 0;
    }
    .co-self-edit-on{
        color:#fff;
        font-size: 0.8em;
        float: right;
        margin-right: 10px;
    }
    .co-self-edit-on:hover{
        color:#ddd;
    }
    .co-self-edit-off{
        display: none;
    }
    .self_info{
        width: 750px;
    }
    .li_vlaue{
        width: 300px !important;
    }
    
    
</style>
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
    <div id="con-right" class="self_info">
        <div id="con-nav">
            <p><a href="void">首页</a>  >个人信息</p>
        </div>
        <link type="text/css" href="<?= base_url() ?>application/css/ml.css" rel="stylesheet">
        <div>
            <ul class="co-self clearfix ">
                <li style="width:33%">
                   <img src="<?= $stu_face ?>" class="am-img-thumbnail" height="250" width="250"/>
                </li>
                <li style="width:67%">
                    <ul class="co-self-info clearfix">
                        <li class="co-name">
                            <p><?= $stu_name ?></p>
                            <div>个人介绍：<?= $stu_self_intro ?><a class="<?php if ($isVip == true)
    echo 'co-self-edit-on';
else
    echo 'co-self-edit-off';
?>"  href="<?= base_url() ?>index.php/vipcenter/self_info" >个人信息编辑</a></div>
                        </li>
                        <li>
                            <ul class="co-self-third clearfix">
                                <li style="text-align: right;color:#969EC3">
                                    用户类型：
                                </li>
                                <li class="li_vlaue">
                                    <?= $stu_type ?>
                                </li>
                            </ul>
                            <ul class="co-self-third clearfix">
                                <li style="text-align: right;color:#969EC3">
                                    性别：
                                </li>
                                <li class="li_vlaue">                              
                                    <?= $stu_sex ?>
                                </li>
                            </ul>
                            <ul class="co-self-third clearfix">
                                <li style="text-align: right;color:#969EC3">
                                    年龄：
                                </li>
                                <li class="li_vlaue">                              
                                    <?= $stu_age ?>
                                </li>
                            </ul>
                            <ul class="co-self-third clearfix">
                                <li style="text-align: right;color:#969EC3">
                                    所在地：
                                </li>
                                <li class="li_vlaue">
                                   <?= $stu_living_place ?> <span class="am-icon-map-marker ml-red"></span>
                                </li>
                            </ul>
                            <ul class="co-self-third clearfix">
                                <li style="text-align: right;color:#969EC3">
                                    邮箱：
                                </li>
                                <li class="li_vlaue">
                                    <?= $stu_email ?>
                                </li>
                            </ul>

                            <ul class="co-self-third clearfix">
                                <li style="text-align: right;color:#969EC3">
                                    注册时间：
                                </li>
                                <li class="li_vlaue">
                                    <?= $stu_reg_time ?>
                                </li>
                            </ul>
                            <ul class="co-self-third clearfix">
                                <li style="text-align: right;color:#969EC3">
                                    最近登录时间：
                                </li>
                                <li class="li_vlaue">
                                    <?= $stu_last_logtime ?>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="co-coa-content">
            <ul class="tab">
                <li id="one1" style="width:150px" class="selected-li" onclick="setTab('one', 1, 3)">详细信息</li>
                <li id="one2" style="width:150px" onclick="setTab('one', 2, 3)">累计评论  <span style="font-size: 1em;color:#900;font-weight: bold">12300</span></li>
                <li id="one3" style="width:150px;border-right:1px solid #aaa;" onclick="setTab('one', 3, 3)">学习记录  <span style="font-size: 1em;color:#900;font-weight: bold">12300</span></li>
            </ul>
            <div class="pos_content" style="height: auto;max-height: 500px; min-height: 300px; overflow: auto">
                <div id="content1" class="clearfix">
                    <div style="margin: 10px">
                        <h3>教练信息</h3>
                        <div>人民网北京4月12日电 据中国驻印度尼西亚大使馆消息，4月10日，
                            谢锋大使应邀出席在雅加达举行的纪念亚非会议60周年主题研讨会并发表讲话。
                            印尼外交部亚太非总司长尤利、印度驻印尼大使辛格、南非驻印尼大使希福巴、
                            印尼前副总统顾问戴薇等印尼政府、商业、媒体、学术界代表及外国驻印尼使节等
                            400余人与会。</div>
                    </div>
                </div>
                <div id="content2" class="clearfix"  style="display:none;">
                    <div style="margin: 10px">
                        <div style="padding-left: 10px;line-height: 5em;background: #DAD9D4">
                            教练综合评价 <span class="am-icon-star ml-red"></span>
                            <span class="am-icon-star ml-red"></span>
                            <span class="am-icon-star ml-red"></span>
                            <span class="am-icon-star ml-red"></span> 4.5 分
                        </div>
                        <ul class="coach_comment am-comments-list am-comments-list-flip">
                        </ul>

                    </div>
                </div>
                <div id="content3" class="clearfix"  style="display:none;">
                    <table class="am-table">
                        <thead>
                            <tr>
                                <th>学员</th>
                                <th>节数</th>
                                <th>培训点 </th>
                                <th>项目</th>
                                <th>时间</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>刘德华</td>
                                <td>第5节</td>
                                <td>绅宝驾校 </td>
                                <td>直角转弯</td>
                                <td>2015-04-13</td>
                            </tr>
                            <tr>
                                <td>刘德华</td>
                                <td>第5节</td>
                                <td>绅宝驾校 </td>
                                <td>直角转弯</td>
                                <td>2015-04-13</td>
                            </tr>
                            <tr>
                                <td>刘德华</td>
                                <td>第5节</td>
                                <td>绅宝驾校 </td>
                                <td>直角转弯</td>
                                <td>2015-04-13</td>
                            </tr>
                            <tr>
                                <td>刘德华</td>
                                <td>第5节</td>
                                <td>绅宝驾校 </td>
                                <td>直角转弯</td>
                                <td>2015-04-13</td>
                            </tr>
                            <tr>
                                <td>刘德华</td>
                                <td>第5节</td>
                                <td>绅宝驾校 </td>
                                <td>直角转弯</td>
                                <td>2015-04-13</td>
                            </tr>
                            <tr>
                                <td>刘德华</td>
                                <td>第5节</td>
                                <td>绅宝驾校 </td>
                                <td>直角转弯</td>
                                <td>2015-04-13</td>
                            </tr>
                            <tr>
                                <td>刘德华</td>
                                <td>第5节</td>
                                <td>绅宝驾校 </td>
                                <td>直角转弯</td>
                                <td>2015-04-13</td>
                            </tr>
                            <tr>
                                <td>刘德华</td>
                                <td>第5节</td>
                                <td>绅宝驾校 </td>
                                <td>直角转弯</td>
                                <td>2015-04-13</td>
                            </tr>
                            <tr>
                                <td>刘德华</td>
                                <td>第5节</td>
                                <td>绅宝驾校 </td>
                                <td>直角转弯</td>
                                <td>2015-04-13</td>
                            </tr>
                            <tr>
                                <td>刘德华</td>
                                <td>第5节</td>
                                <td>绅宝驾校 </td>
                                <td>直角转弯</td>
                                <td>2015-04-13</td>
                            </tr>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    var isTab1 = isTab2 = isTab3 = false;
    function onDisplay(num) {
        if (num === 1 && isTab1 === false) {
        } else if (num === 2 && isTab2 === false) {
            isTab2 = true;
            $.ajax({
                type: "POST",
                dataType: "text",
                url: "<?=  base_url()?>index.php/coach/get_coach_comment",
                async: true,
                data: {},
                success: function (data) {
                    $('.coach_comment').append(data);
                    }
                });
        }
    }
</script>


