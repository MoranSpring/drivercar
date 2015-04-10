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
        line-height: 1.8em;
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
        line-height: 1.6em;
    }
        .co-self-third{
            margin: 5px 0 0 0 ;
    }
    .co-coa-content{
        margin: 10px 0 0 0;
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
                    <img src="http://images.huxiu.com/auth/data/avatar/000/04/92/12_avatar_middle.jpg" class="am-img-thumbnail" height="250" width="250"/>
                </li>
                <li style="width:75%">
                    <ul class="co-self-info clearfix">
                        <li class="co-name">
                            <p>刘德华</p>
                            <div>个人介绍：我是棒棒哒教练，教的好，学生学的块，成绩优异。</div>
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
                                    华科大驾校点 <span class="am-icon-map-marker ml-red"></span>
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
            <li id="one1" class="selected-li" onclick="setTab('one', 1, 3)">累计评论</li>
            <li id="one2" onclick="setTab('one', 2, 3)">学习记录</li>
            <li id="one3" onclick="setTab('one', 3, 3)">搜索</li>
        </ul>
            <div class="pos_content">
            <div id="content1" class="clearfix">
            </div>
                 <div id="content2" class="clearfix">
        </div>
                 <div id="content3" class="clearfix">
        </div>
            </div>


    </div>
</div>


