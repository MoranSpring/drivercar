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
</style>
<div id="content" class="clearfix">
    <div id="con-coach-right">
        <div id="con-nav">
            <p><a href="void">首页</a>  >个人信息</p>
        </div>
        <link type="text/css" href="<?= base_url() ?>application/css/ml.css" rel="stylesheet">
        <div>
            <ul class="co-self clearfix">
                <li style="width:25%">
                    <img src="<?= $coach_face ?>@!nail250" class="am-img-thumbnail" height="250" width="250"/>
                </li>
                <li style="width:75%">
                    <ul class="co-self-info clearfix">
                        <li class="co-name">
                            <p><?= $coach_name ?></p>
                            <div>个人介绍：<?= $coach_intro ?><a class="<?php if($isCoach==true) echo 'co-self-edit-on';else echo 'co-self-edit-off';?>"  href="<?= base_url() ?>index.php/coach/self_info_edit">资料编辑</a></div>
                        </li>
                        <li>
                            <ul class="co-self-third clearfix">
                                <li style="text-align: right;color:#969EC3">
                                    等级：
                                </li>
                                <li>
                                    专家级
                                </li>
                            </ul>
                            <ul class="co-self-third clearfix">
                                <li style="text-align: right;color:#969EC3">
                                    所属驾培点：
                                </li>
                                <li>
                                    <?= $coach_sch_name ?> <span class="am-icon-map-marker ml-red"></span>
                                </li>
                            </ul>
                            <ul class="co-self-third clearfix">
                                <li style="text-align: right;color:#969EC3">
                                    培训人数：
                                </li>
                                <li>
                                    200人
                                </li>
                            </ul>
                            <ul class="co-self-third clearfix">
                                <li style="text-align: right;color:#969EC3">
                                    手机号码：
                                </li>
                                <li>
                                    <?= $coach_telnum ?>
                                </li>
                            </ul>
                            <ul class="co-self-third clearfix">
                                <li style="text-align: right;color:#969EC3">
                                    历史评分：
                                </li>
                                <li>
                                    <span class="am-icon-star ml-red"></span>
                                    <span class="am-icon-star ml-red"></span>
                                    <span class="am-icon-star ml-red"></span>
                                    <span class="am-icon-star ml-red"></span>
                                    4分
                                </li>
                            </ul>
                            <ul class="co-self-third clearfix">
                                <li style="text-align: right;color:#969EC3">
                                    提供服务类型：
                                </li>
                                <li>
                                    科目二/科目三
                                </li>
                            </ul>
                            <ul class="co-self-third clearfix">
                                <li style="text-align: right;color:#969EC3">
                                    本月累计培训学员：
                                </li>
                                <li>
                                    29人
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
                        <ul class="am-comments-list am-comments-list-flip">
                            <li class="am-comment">
                                <a href="#link-to-user-home">
                                    <img src="" alt="" class="am-comment-avatar" width="48" height="48"/>
                                </a>

                                <div class="am-comment-main">
                                    <header class="am-comment-hd">
                                        <!--<h3 class="am-comment-title">评论标题</h3>-->
                                        <div class="am-comment-meta">
                                            <a href="#link-to-user" class="am-comment-author"><=$userName?></a>
                                            评论于 <time datetime="2013-07-27T04:54:29-07:00" title="2013年7月27日 下午7:54 格林尼治标准时间+0800">2013-07-27 07:00</time>
                                            <span style="float:right">评分：<span class="am-icon-star ml-red"></span>
                                                <span class="am-icon-star ml-red"></span>
                                                <span class="am-icon-star ml-red"></span>
                                                <span class="am-icon-star ml-red"></span> 4星</span>
                                        </div>
                                    </header>

                                    <div class="am-comment-bd">
                                        <=$content?>
                                    </div>
                                </div>
                            </li>
                            <li class="am-comment">
                                <a href="#link-to-user-home">
                                    <img src="http://image.52drivercar.com/coach_imges/1428902329.jpg@!nail" alt="" class="am-comment-avatar" width="48" height="48"/>
                                </a>

                                <div class="am-comment-main">
                                    <header class="am-comment-hd">
                                        <!--<h3 class="am-comment-title">评论标题</h3>-->
                                        <div class="am-comment-meta">
                                            <a href="#link-to-user" class="am-comment-author"><=$userName?></a>
                                            评论于 <time datetime="2013-07-27T04:54:29-07:00" title="2013年7月27日 下午7:54 格林尼治标准时间+0800"><=$time?></time>
                                        </div>
                                    </header>

                                    <div class="am-comment-bd">
                                        <=$content?>
                                    </div>
                                </div>
                            </li>
                            <li class="am-comment">
                                <a href="#link-to-user-home">
                                    <img src="http://image.52drivercar.com/coach_imges/1428902329.jpg@!nail" alt="" class="am-comment-avatar" width="48" height="48"/>
                                </a>

                                <div class="am-comment-main">
                                    <header class="am-comment-hd">
                                        <!--<h3 class="am-comment-title">评论标题</h3>-->
                                        <div class="am-comment-meta">
                                            <a href="#link-to-user" class="am-comment-author"><=$userName?></a>
                                            评论于 <time datetime="2013-07-27T04:54:29-07:00" title="2013年7月27日 下午7:54 格林尼治标准时间+0800"><=$time?></time>
                                        </div>
                                    </header>

                                    <div class="am-comment-bd">
                                        <=$content?>
                                    </div>
                                </div>
                            </li>
                            <li class="am-comment">
                                <a href="#link-to-user-home">
                                    <img src="http://image.52drivercar.com/coach_imges/1428902329.jpg@!nail" alt="" class="am-comment-avatar" width="48" height="48"/>
                                </a>

                                <div class="am-comment-main">
                                    <header class="am-comment-hd">
                                        <!--<h3 class="am-comment-title">评论标题</h3>-->
                                        <div class="am-comment-meta">
                                            <a href="#link-to-user" class="am-comment-author"><=$userName?></a>
                                            评论于 <time datetime="2013-07-27T04:54:29-07:00" title="2013年7月27日 下午7:54 格林尼治标准时间+0800"><=$time?></time>
                                        </div>
                                    </header>

                                    <div class="am-comment-bd">
                                        <=$content?>
                                    </div>
                                </div>
                            </li>
                            <li class="am-comment">
                                <a href="#link-to-user-home">
                                    <img src="http://image.52drivercar.com/coach_imges/1428902329.jpg@!nail" alt="" class="am-comment-avatar" width="48" height="48"/>
                                </a>

                                <div class="am-comment-main">
                                    <header class="am-comment-hd">
                                        <!--<h3 class="am-comment-title">评论标题</h3>-->
                                        <div class="am-comment-meta">
                                            <a href="#link-to-user" class="am-comment-author"><=$userName?></a>
                                            评论于 <time datetime="2013-07-27T04:54:29-07:00" title="2013年7月27日 下午7:54 格林尼治标准时间+0800"><=$time?></time>
                                        </div>
                                    </header>

                                    <div class="am-comment-bd">
                                        <=$content?>
                                    </div>
                                </div>
                            </li>
                            <li class="am-comment">
                                <a href="#link-to-user-home">
                                    <img src="http://image.52drivercar.com/coach_imges/1428902329.jpg@!nail" alt="" class="am-comment-avatar" width="48" height="48"/>
                                </a>

                                <div class="am-comment-main">
                                    <header class="am-comment-hd">
                                        <!--<h3 class="am-comment-title">评论标题</h3>-->
                                        <div class="am-comment-meta">
                                            <a href="#link-to-user" class="am-comment-author"><=$userName?></a>
                                            评论于 <time datetime="2013-07-27T04:54:29-07:00" title="2013年7月27日 下午7:54 格林尼治标准时间+0800"><=$time?></time>
                                        </div>
                                    </header>

                                    <div class="am-comment-bd">
                                        <=$content?>
                                    </div>
                                </div>
                            </li>
                            <li class="am-comment">
                                <a href="#link-to-user-home">
                                    <img src="http://image.52drivercar.com/coach_imges/1428902329.jpg@!nail" alt="" class="am-comment-avatar" width="48" height="48"/>
                                </a>

                                <div class="am-comment-main">
                                    <header class="am-comment-hd">
                                        <!--<h3 class="am-comment-title">评论标题</h3>-->
                                        <div class="am-comment-meta">
                                            <a href="#link-to-user" class="am-comment-author"><=$userName?></a>
                                            评论于 <time datetime="2013-07-27T04:54:29-07:00" title="2013年7月27日 下午7:54 格林尼治标准时间+0800"><=$time?></time>
                                        </div>
                                    </header>

                                    <div class="am-comment-bd">
                                        <=$content?>
                                    </div>
                                </div>
                            </li>
                            <li class="am-comment">
                                <a href="#link-to-user-home">
                                    <img src="http://image.52drivercar.com/coach_imges/1428902329.jpg@!nail" alt="" class="am-comment-avatar" width="48" height="48"/>
                                </a>

                                <div class="am-comment-main">
                                    <header class="am-comment-hd">
                                        <!--<h3 class="am-comment-title">评论标题</h3>-->
                                        <div class="am-comment-meta">
                                            <a href="#link-to-user" class="am-comment-author"><=$userName?></a>
                                            评论于 <time datetime="2013-07-27T04:54:29-07:00" title="2013年7月27日 下午7:54 格林尼治标准时间+0800"><=$time?></time>
                                        </div>
                                    </header>

                                    <div class="am-comment-bd">
                                        <=$content?>
                                    </div>
                                </div>
                            </li>
                            <li class="am-comment">
                                <a href="#link-to-user-home">
                                    <img src="http://image.52drivercar.com/coach_imges/1428902329.jpg@!nail" alt="" class="am-comment-avatar" width="48" height="48"/>
                                </a>

                                <div class="am-comment-main">
                                    <header class="am-comment-hd">
                                        <!--<h3 class="am-comment-title">评论标题</h3>-->
                                        <div class="am-comment-meta">
                                            <a href="#link-to-user" class="am-comment-author"><=$userName?></a>
                                            评论于 <time datetime="2013-07-27T04:54:29-07:00" title="2013年7月27日 下午7:54 格林尼治标准时间+0800"><=$time?></time>
                                        </div>
                                    </header>

                                    <div class="am-comment-bd">
                                        <=$content?>
                                    </div>
                                </div>
                            </li>
                            <li class="am-comment">
                                <a href="#link-to-user-home">
                                    <img src="http://image.52drivercar.com/coach_imges/1428902329.jpg@!nail" alt="" class="am-comment-avatar" width="48" height="48"/>
                                </a>

                                <div class="am-comment-main">
                                    <header class="am-comment-hd">
                                        <!--<h3 class="am-comment-title">评论标题</h3>-->
                                        <div class="am-comment-meta">
                                            <a href="#link-to-user" class="am-comment-author"><=$userName?></a>
                                            评论于 <time datetime="2013-07-27T04:54:29-07:00" title="2013年7月27日 下午7:54 格林尼治标准时间+0800"><=$time?></time>
                                        </div>
                                    </header>

                                    <div class="am-comment-bd">
                                        <=$content?>
                                    </div>
                                </div>
                            </li>
                            <li class="am-comment">
                                <a href="#link-to-user-home">
                                    <img src="http://image.52drivercar.com/coach_imges/1428902329.jpg@!nail" alt="" class="am-comment-avatar" width="48" height="48"/>
                                </a>

                                <div class="am-comment-main">
                                    <header class="am-comment-hd">
                                        <!--<h3 class="am-comment-title">评论标题</h3>-->
                                        <div class="am-comment-meta">
                                            <a href="#link-to-user" class="am-comment-author"><=$userName?></a>
                                            评论于 <time datetime="2013-07-27T04:54:29-07:00" title="2013年7月27日 下午7:54 格林尼治标准时间+0800"><=$time?></time>
                                        </div>
                                    </header>

                                    <div class="am-comment-bd">
                                        <=$content?>
                                    </div>
                                </div>
                            </li>
                            <li class="am-comment">
                                <a href="#link-to-user-home">
                                    <img src="http://image.52drivercar.com/coach_imges/1428902329.jpg@!nail" alt="" class="am-comment-avatar" width="48" height="48"/>
                                </a>

                                <div class="am-comment-main">
                                    <header class="am-comment-hd">
                                        <!--<h3 class="am-comment-title">评论标题</h3>-->
                                        <div class="am-comment-meta">
                                            <a href="#link-to-user" class="am-comment-author"><=$userName?></a>
                                            评论于 <time datetime="2013-07-27T04:54:29-07:00" title="2013年7月27日 下午7:54 格林尼治标准时间+0800"><=$time?></time>
                                        </div>
                                    </header>

                                    <div class="am-comment-bd">
                                        <=$content?>
                                    </div>
                                </div>
                            </li>
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


