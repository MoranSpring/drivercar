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
            <ul class="tab2">
                <li id="one1" class="selected-li" onclick="setTab('one', 1, 3)">教学评价</li>
                <li id="one2" onclick="setTab('one', 2, 3)">历史评价</li>
                <li id="one3" onclick="setTab('one', 3, 3)">法律法规</li>

            </ul>
            <div id="main_content" class="clearfix">
                <div id="content1" class="clearfix">


                    <div style="margin: 20px 100px 10px 100px;;">
                        <h2>请对本次教学情况打分：</h2>
                        <table class="am-table "  style="background: #c0c0c0; color: #FFF">
                            <tbody>
                                <tr>
                                    <td style="width: 20%">日期 </td>
                                    <td>2015-11-10</td>
                                </tr>
                                <tr>
                                    <td>节数</td>
                                    <td>第3节课</td>
                                </tr>
                                <tr>
                                    <td>项目</td>
                                    <td>倒库</td>
                                </tr>

                                <tr>
                                    <td>教练</td>
                                    <td>张教练</td>
                                </tr>
                                <tr>
                                    <td>培训点</td>
                                    <td>华科大驾校</td>
                                </tr>
                                <tr>
                                    <td>消费积分</td>
                                    <td>100RMB</td>
                                </tr>
                                <tr>
                                    <td>教学建议</td>
                                    <td>继续学习倒库</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="starbox clearfix">
                            <span class="s_name">总体评价：</span>
                            <ul class="star_ul fl">
                                <li><a class="one-star" title="很差" ></a></li>
                                <li><a class="two-star" title="差" ></a></li>
                                <li><a class="three-star" title="还行" ></a></li>
                                <li><a class="four-star" title="好"></a></li>
                                <li><a class="five-star" title="很好"></a></li>
                            </ul>
                            <span class="s_result fl">请打分</span>
                        </div>
                        <div style="width:100%;" class="clearfix">
                            <p style="float:left">教练教学 : <p>
                            <div style="float:left; width:100%;">
                                <textarea style=" width:100%; height: 100px"></textarea>
                                <div>
                                    <label class="am-btn am-btn-primary" style="float:right;">确定</label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div id="content2" class="clearfix">
                    <div style="margin: 5px;">

                        <div class="fb-list">
                            <ul>
                                <li style="background:#e0e0e0;" class="clearfix">
                                    <ul class="fb-list-chir">
                                        <li>
                                            2015-10-9
                                        </li>
                                        <li>
                                            第3节课
                                        </li>
                                        <li>
                                            训练项目：倒库
                                        </li>
                                    </ul>
                                </li>
                                <li  class="clearfix">
                                    <ul id="coach" class="clearfix" style="float: left; width:40%">
                                        <li style="float:left;">
                                            <img class="am-img-thumbnail am-circle" src="http://wwc.taobaocdn.com/avatar/getAvatar.do?userId=1639905989&width=160&height=160&type=sns" width="70" height="70"/>
                                        </li>
                                        <li style="float:left;">
                                            <ul>
                                                <li>
                                                    $Name 
                                                </li>
                                                <li>
                                                    教练等级：<span class="am-icon-star ml-red"></span><span class="am-icon-star ml-red"></span><span class="am-icon-star ml-red"></span><span class="am-icon-star-half-o ml-red"></span>
                                                </li>
                                            </ul>
                                        </li>

                                    </ul>
                                    <ul style="float: left; width:20%">
                                        <li style="line-height: 70px;">
                                            华科大驾校
                                        </li>
                                    </ul>
                                    <ul style="float: left; width:20%">
                                        <li style="line-height: 70px;">
                                            花费积分： 1000积分
                                        </li>
                                    </ul>
                                    <ul style="float: left; width:20%;">
                                        <li style="line-height: 30px;float:right;padding:7px 10px 0 0 ;">
                                            <label class="thisbtn am-btn am-btn-primary am-btn-xs">我的评价</label>
                                        </li>
                                        <li style="line-height: 30px;float:right;padding:0 10px 0 0 ;">
                                            <label class="am-btn am-btn-primary  am-btn-xs">继续评价</label>
                                        </li>
                                    </ul>

                                </li>


                            </ul>
                        </div>
                        <div class="comment" style="width:70%; display: none">
                            asf
                        </div>
                        <div class="fb-list">
                            <ul>
                                <li style="background:#e0e0e0;" class="clearfix">
                                    <ul class="fb-list-chir">
                                        <li>
                                            2015-10-9
                                        </li>
                                        <li>
                                            第3节课
                                        </li>
                                        <li>
                                            训练项目：倒库
                                        </li>
                                    </ul>
                                </li>
                                <li  class="clearfix">
                                    <ul id="coach" class="clearfix" style="float: left; width:40%">
                                        <li style="float:left;">
                                            <img class="am-img-thumbnail am-circle" src="http://wwc.taobaocdn.com/avatar/getAvatar.do?userId=1639905989&width=160&height=160&type=sns" width="70" height="70"/>
                                        </li>
                                        <li style="float:left;">
                                            <ul>
                                                <li>
                                                    $Name 
                                                </li>
                                                <li>
                                                    教练等级：<span class="am-icon-star ml-red"></span><span class="am-icon-star ml-red"></span><span class="am-icon-star ml-red"></span><span class="am-icon-star-half-o ml-red"></span>
                                                </li>
                                            </ul>
                                        </li>

                                    </ul>
                                    <ul style="float: left; width:20%">
                                        <li style="line-height: 70px;">
                                            华科大驾校
                                        </li>
                                    </ul>
                                    <ul style="float: left; width:20%">
                                        <li style="line-height: 70px;">
                                            花费积分： 1000积分
                                        </li>
                                    </ul>
                                    <ul style="float: left; width:20%;">
                                        <li style="line-height: 30px;float:right;padding:7px 10px 0 0 ;">
                                            <label class="thisbtn am-btn am-btn-primary am-btn-xs">我的评价</label>
                                        </li>
                                        <li style="line-height: 30px;float:right;padding:0 10px 0 0 ;">
                                            <label class="am-btn am-btn-primary  am-btn-xs">继续评价</label>
                                        </li>
                                    </ul>

                                </li>


                            </ul>
                        </div>
                        <div class="comment" style="width:70%; display: none">
                            dfghghdfghghdfghghdfghghdfghghdfghgh
                        </div>
                        <div class="fb-list">
                            <ul>
                                <li style="background:#e0e0e0;" class="clearfix">
                                    <ul class="fb-list-chir">
                                        <li>
                                            2015-10-9
                                        </li>
                                        <li>
                                            第3节课
                                        </li>
                                        <li>
                                            训练项目：倒库
                                        </li>
                                    </ul>
                                </li>
                                <li  class="clearfix">
                                    <ul id="coach" class="clearfix" style="float: left; width:40%">
                                        <li style="float:left;">
                                            <img class="am-img-thumbnail am-circle" src="http://wwc.taobaocdn.com/avatar/getAvatar.do?userId=1639905989&width=160&height=160&type=sns" width="70" height="70"/>
                                        </li>
                                        <li style="float:left;">
                                            <ul>
                                                <li>
                                                    $Name 
                                                </li>
                                                <li>
                                                    教练等级：<span class="am-icon-star ml-red"></span><span class="am-icon-star ml-red"></span><span class="am-icon-star ml-red"></span><span class="am-icon-star-half-o ml-red"></span>
                                                </li>
                                            </ul>
                                        </li>

                                    </ul>
                                    <ul style="float: left; width:20%">
                                        <li style="line-height: 70px;">
                                            华科大驾校
                                        </li>
                                    </ul>
                                    <ul style="float: left; width:20%">
                                        <li style="line-height: 70px;">
                                            花费积分： 1000积分
                                        </li>
                                    </ul>
                                    <ul style="float: left; width:20%;">
                                        <li style="line-height: 30px;float:right;padding:7px 10px 0 0 ;">
                                            <label class="thisbtn am-btn am-btn-primary am-btn-xs">我的评价</label>
                                        </li>
                                        <li style="line-height: 30px;float:right;padding:0 10px 0 0 ;">
                                            <label class="am-btn am-btn-primary  am-btn-xs">继续评价</label>
                                        </li>
                                    </ul>

                                </li>


                            </ul>
                        </div>
                    </div>
                </div>
                <div id="content3" class="clearfix">

                </div>


            </div>
        </div>
        <script type="text/javascript">
            var flag = 0;
            $(function () {

                $('.star_ul a').hover(function () {
                    flag = 0;
                    $('.star_ul li a').removeClass('active-star');
                    $(this).addClass('active-star');
                    $('.s_result').css('color', '#c00').html($(this).attr('title'));
                }, function () {
                    if (flag === 0) {
                        $(this).removeClass('active-star');
                        $('.s_result').css('color', '#333').html('请打分');
                    }
                });

                $('.star_ul a').click(function () {
                    //                alert($('.s_result').html());
                    flag = 1;
                    $(this).addClass('active-star');
                    $('.s_result').css('color', '#c00').html($(this).attr('title'));
                });

            });

            $(".thisbtn").toggle(function () {
                var content="";
                var thisTag=$(this).closest("div").next();
                $.ajax({
                    type: "POST",
                    dataType: "text",
                    url: "<?=  base_url()?>index.php/vipcenter/get_comment",
                    async: true,
//                    data: {coabk_time: day, coabk_coach_id: coach},
                    success: function (data) {
                        content=data;
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
