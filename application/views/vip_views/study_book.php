<div id="content" class="clearfix">
    <script src="<?php echo base_url() . 'application/js/ml.js' ?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'application/js/admin/amazeui.chosen.min.js' ?>" type="text/javascript"></script>
    <link type="text/css" href="<?= base_url() ?>application/css/ml.css" rel="stylesheet">
    <link type="text/css" href="<?= base_url() ?>application/css/admin/amazeui.chosen.css" rel="stylesheet">
    <div id="con-left">
        <ul>
            <li><a href="<?= base_url() . 'index.php/vipcenter/vip_center' ?>"><span>个人信息</span></a></li>
            <li><a href="<?= base_url() . 'index.php/vipcenter/study_progress' ?>"><span>学习进度</span></a></li>
            <li><a href="<?= base_url() . 'index.php/vipcenter/study_book' ?>"><span>预约培训</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/ser_info' ?>"><span>预约管理</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/coach_info' ?>"><span>学习反馈</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/sch_info' ?>"><span>我的积分</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/sch_info' ?>"><span>申诉</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/sch_info' ?>"><span>我的学友</span></a></li>
        </ul>
    </div>
    <div id="con-right">
        <div id="con-nav">
            <p><a href="void">首页</a> > <a href="void">会员中心</a> > 预约培训</p>
        </div>
        <div id="con-con" class ="real_content "><form class="am-form">
                <div class="ml_step_ul">
                    <ul class="clear">
                        <li id="ml-step1"class=" ml_li ml_li_width">01、选择课程</li>
                        <li class=" ml_li"><img id="ml-step_img1"  src="<?= base_url() ?>application/images/cover.png" style="height: 40px; vertical-align:top"  height="40px" width="26" /></li>
                        <li id="ml-step2" class=" ml_li ml_li_width">02、选择课程信息</li>
                        <li class=" ml_li"><img id="ml-step_img2"  src="<?= base_url() ?>application/images/cover.png"  style="height: 40px; vertical-align:top" height="40px" width="26" /></li>
                        <li id="ml-step3" class=" ml_li ml_li_width">03、完成选课</li>
                    </ul>
                </div>
                <div class="step_1">
                    <div class="am-alert am-alert-danger am-margin-xl" data-am-alert>
                        <button type="button" class="am-close">&times;</button>
                        <p><strong>温馨提示</strong></p>
                        <p>预约之前必须通过科目一</p>
                    </div>

                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-4 am-u-md-3 am-text-right">请选择培训项目</div>
                        <div class="am-u-sm-8 am-u-md-9 " id="project_list">

                            <select  class="province" style="width:150px;text-align: center;display:inline;"  data-placeholder="请选择">
                            </select>
                            <select  class="city" first data-placeholder="请选择" style="width:250px;text-align: center;">
                            </select>


                        </div>
                    </div>
                    <div class="am-g am-margin-top-xl">
                        <button id="bt1" type="button" class="am-center am-btn am-btn-primary " style="width:200px">下一步</button>
                    </div>
                </div>
                <div class="step_2" style="display:none">
                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-4 am-u-md-2 am-text-right">所属驾校</div>
                        <div class="am-u-sm-8 am-u-md-10">
                            <select class="select_sch" onchange="selectCoach(this.value)" data-placeholder="请选择" style="width:250px;text-align: center;">
                            </select>
                        </div>
                    </div>
                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-4 am-u-md-2 am-text-right">选择教练</div>
                        <div class="am-u-sm-8 am-u-md-10">
                            <select class="select_coach" data-placeholder="请选择" style="width:250px;text-align: center;">
                            </select>
                        </div>
                    </div>
                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-4 am-u-md-2 am-text-right">选择日期</div>
                        <div class="am-u-sm-8 am-u-md-10 ">
                            <input type="text" class="am-form-field" id="select_date" name="news_date" style="width: 200px" placeholder="点击选择日期" data-am-datepicker="{format: 'yyyy-mm-dd'}" readonly/>
                        </div>
                    </div>
                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-6 am-u-md-6 am-text-center">
                            <div class="">选择时间</div>
                            <div onselectstart="return false">
                                <table id="cls_table"class="am-table am-table-bordered ml-table-hover"   style="display: none;font-size:12px;cursor:pointer;user-select:none;">
                                    <thead>
                                        <tr>          
                                            <th width="25%">时间 \ 日期</th>
                                            <th width="25%" id="date1"></th>
                                            <th width="25%" id="date2"></th>
                                            <th width="25%" id="date3"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td value="1" name="">08:00--09:00</td>
                                            <td class="item" value="" date="date1" num="1"></td>
                                            <td class="item" value="" date="date2" num="1"></td>
                                            <td class="item" value="" date="date3" num="1"></td>
                                        </tr>
                                        <tr>
                                            <td value="1" name="">09:00--2:00</td>
                                            <td class="item" value="" date="date1" num="2"></td>
                                            <td class="item" value="" date="date2" num="2"></td>
                                            <td class="item" value="" date="date3" num="2"></td>
                                        </tr>
                                        <tr>
                                            <td value="1" name="">10:00--11:00</td>
                                            <td class="item" value="" date="date1" num="3"></td>
                                            <td class="item" value="" date="date2" num="3"></td>
                                            <td class="item" value="" date="date3" num="3"></td>
                                        </tr>
                                        <tr>
                                            <td value="1" name="">11:00--12:00</td>
                                            <td class="item" value="" date="date1" num="4"></td>
                                            <td class="item" value="" date="date2" num="4"></td>
                                            <td class="item" value="" date="date3" num="4"></td>
                                        </tr>
                                        <tr style="background:#DDDDDD;">
                                            <td>休息</td><td></td><td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td value="1" name="">13:00--14:00</td>
                                            <td class="item" value="" date="date1" num="5"></td>
                                            <td class="item" value="" date="date2" num="5"></td>
                                            <td class="item" value="" date="date3" num="5"></td>
                                        </tr>
                                        <tr>
                                            <td value="1" name="">14:00--15:00</td>
                                            <td class="item" value="" date="date1" num="6"></td>
                                            <td class="item" value="" date="date2" num="6"></td>
                                            <td class="item" value="" date="date3" num="6"></td>
                                        </tr>
                                        <tr>
                                            <td value="1" name="">15:00--16:00</td>
                                            <td class="item" value="" date="date1" num="7"></td>
                                            <td class="item" value="" date="date2" num="7"></td>
                                            <td class="item" value="" date="date3" num="7"></td>
                                        </tr>
                                        <tr>
                                            <td value="1" name="">16:00--17:00</td>
                                            <td class="item" value="" date="date1" num="8"></td>
                                            <td class="item" value="" date="date2" num="8"></td>
                                            <td class="item" value="" date="date3" num="8"></td>
                                        </tr>
                                        <tr style="background:#DDDDDD;">
                                            <td>休息</td><td></td><td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td value="1" name="">17:00--18:00</td>
                                            <td class="item" value="" date="date1" num="9"></td>
                                            <td class="item" value="" date="date2" num="9"></td>
                                            <td class="item" value="" date="date3" num="9"></td>
                                        </tr>
                                        <tr>
                                            <td value="1" name="">18:00--19:00</td>
                                            <td class="item" value="" date="date1" num="10"></td>
                                            <td class="item" value="" date="date2" num="10"></td>
                                            <td class="item" value="" date="date3" num="10"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button  type="button" class=" am-btn am-btn-primary " onclick="hs()" style="width:150px">summit</button>
                            </div>
                        </div>
                        <div class="am-u-sm-6 am-u-md-6">
                            <div class="am-g am-margin-top">
                                <div>你选了<span id="cls_num_box"></span>节课</div>
                                <div>供需1000元钱</div>
                                <div id="cls_date_box"></div>

                            </div>
                            <div class="choose-info">
                                <p class="title">所选时段概况</p>
                                <table id='data-table' class="am-table am-table-bordered ml-table">
                                    <tr>
                                        <td></td>
                                        <td>此时刻最大承载量</td>
                                        <td>当前时段已被预约</td>
                                        <td>剩余可约</td>
                                    </tr>
                                    <tr>
                                        <td>倒库</td>
                                        <td>15</td>
                                        <td>8</td>
                                        <td>7</td>
                                    </tr>
                                    <tr>
                                        <td>上坡起步</td>
                                        <td>6</td>
                                        <td>3</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>直角转弯</td>
                                        <td>6</td>
                                        <td>3</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>S路</td>
                                        <td>12</td>
                                        <td>8</td>
                                        <td>4</td>
                                    </tr>
                                </table>
                                <div class="choose-info-tips">
                                    <p class="title">选择状态提示</p>
                                    <p ><label id="choose-info-tips" >状态极佳</label></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="am-center am-margin-top-xl" style="width:320px">
                        <button id="bt21" type="button" class=" am-btn am-btn-primary " style="width:150px" >上一步</button>
                        <button id="bt22" type="button" class=" am-btn am-btn-primary " style="width:150px">下一步</button>
                    </div>
                </div>
                <div class="step_3" style="display:none">

                    <div class="am-center am-margin-top-xl" style="width:320px">
                        <button id="bt31" type="button" class=" am-btn am-btn-primary " style="width:150px" >上一步</button>
                        <button id="bt32" type="button" class=" am-btn am-btn-primary am-btn-danger " style="width:150px">确   定</button>
                    </div>

                </div>
            </form>

            <script>
                $.cxSelect.defaults.url = "<?php echo base_url() . 'application/js/project.json' ?>";
                $('#project_list').cxSelect({
                    selects: ['province', 'city'],
                    nodata: 'none'
                });
                $('#bt1').click(function () {
                    step2();
                    $('.step_1').css('display', 'none');
                    $('.step_2').css('display', 'block');
                    $('.step_3').css('display', 'none');
                });
                $('#bt21').click(function () {
                    step1();
                    $('.step_1').css('display', 'block');
                    $('.step_2').css('display', 'none');
                    $('.step_3').css('display', 'none');
                });
                $('#bt22').click(function () {
                    step3();
                    $('.step_1').css('display', 'none');
                    $('.step_2').css('display', 'none');
                    $('.step_3').css('display', 'block');
                });
                $('#bt31').click(function () {
                    step2();
                    $('.step_1').css('display', 'none');
                    $('.step_2').css('display', 'block');
                    $('.step_3').css('display', 'none');
                });
                $('#bt32').click(function () {
//                     sumit();
                });
            </script>




        </div>

    </div>
    <script>
        $(function () {

            $.ajax({
                type: "GET",
                url: "<?= base_url() ?>index.php/admin/get_schools?r=" + Math.random(),
                async: true,
                success: function (data) {
                    var json = eval("(" + data + ")");
                    for (var i = 0; i < json.length; i++) {

                        $('.select_sch').append("<option value='" + json[i].jp_id + "'>" + json[i].jp_name + "</option>");

                    }
                    $('.select_sch').trigger('chosen:updated');


                }
            });

        });
        $(".select_coach").attr("disabled", "true");
        function selectCoach(sch_id) {
            $('.select_coach').empty();
            $(".select_coach").attr("disabled", "true");
            $.ajax({
                type: "GET",
                url: "<?= base_url() ?>index.php/admin/get_coach_via_sch/" + sch_id + "?r=" + Math.random(),
                async: true,
                success: function (data) {
                    var json = eval("(" + data + ")");
                    for (var i = 0; i < json.length; i++) {
                        $(".select_coach").removeAttr("disabled");


                        $('.select_coach').append("<option value='" + json[i].coach_id + "'>" + json[i].coach_name + "</option>");

                    }
                    $('.select_coach').trigger('chosen:updated');


                }
            });

        }
        //--------------选择类-----------------
        function choice(date, cls)
        {
            this.date = date;
            this.cls = cls;
        }

        //---------SelectMore---------------
        $(".ml-cls-active").toggle(function () {
            $(this).attr('value', '8');
            $(this).css('background', '#aac');
            refresh();
        }, function () {
            $(this).attr('value', '-1');
            $(this).css('background', '');
            refresh();
        });
//---------SelectOne---------------
//        $(".item").click(function () {
//            $(".item").attr('value', '-1');
//            $(".item").css('background', '');
//            $(this).attr('value', '8');
//            $(this).css('background', '#aac');
//            
//        });
        function refresh() {
            var n = 0;
            $('#cls_date_box').empty();

            $('.item').each(function () {
                if ($(this).attr('value') === '8')
                {
                    n++;
                    var cls = $(this).attr('num');
                    var dayNum = $(this).attr('date');
                    var day = $('#' + dayNum).html();
                    $('#cls_date_box').append("<p>时间为" + day + ",    第" + cls + "节课</p>");

                    var selArray = new Array();
                    var select = new choice('afd', 'asfd');
                }
                $('#cls_num_box').html(n);
            });

        }
//        var select = new choice('afd', 'asfd');
//        var select2 = new choice('afd2', 'asfd2');
//
//        selArray.push(select);
//        selArray.push(select2);
//        for (var i = 0; i < selArray.length; i++) {
//            alert(selArray[i].date);
//        }
        function hs() {
            $('.item').each(function () {
                if ($(this).attr('value') == '8')
                {
                    var select = new choice('afd', 'asfd');
                    alert($(this).attr('date'));
                    $('#date1').html()
                }
            });

        }
        $(function () {
            var today = new Date().getTime() - 86400000;
            var checkout = $('#select_date').datepicker({
                onRender: function (date) {
                    return date.valueOf() <= today ? 'am-disabled' : '';
                }
            }).on('changeDate.datepicker.amui', function (event) {
                //----------------------------
                $('#cls_table').css('display', 'table');

                var date1 = event.date;
                var date2 = new Date();
                var date3 = new Date();
                var Month1 = date1.getMonth() + 1;
                var day1 = date1.getFullYear() + "-" + Month1 + "-" + date1.getDate();

                date2 = new Date(date1.setDate(date1.getDate() + 1));
                var Month2 = date2.getMonth() + 1;
                var day2 = date2.getFullYear() + "-" + Month2 + "-" + date2.getDate();
                date3 = new Date(date1.setDate(date1.getDate() + 1));
                var Month3 = date3.getMonth() + 1;
                var day3 = date3.getFullYear() + "-" + Month3 + "-" + date3.getDate();
                $('#date1').html(day1);
                $('#date2').html(day2);
                $('#date3').html(day3);
                select_date(day1, 1);
                select_date(day2, 2);
                select_date(day3, 3);

                checkout.close();
            }).data('amui.datepicker');

        });
        function select_date(day, n) {
            var thisDay = "coabk_time=" + day;
            var coach = $('.select_coach').val();
            var thisCoach = "coabk_coach_id=" + coach;
            $.ajax({
                type: "POST",
                dataType: "text",
                url: "<?= base_url() ?>index.php/vipcenter/get_cls",
                async: true,
                data: {coabk_time:day,coabk_coach_id:coach},
                success: function (data) {
                    var json = eval("(" + data + ")");
                    for (var i = 0; i < json.length; i++) {
                        var cls = json[i].coabk_cls_num;
                        cls = cls > 4 ? cls - (-1) : cls;
                        cls = cls > 8 ? cls - (-1) : cls;
                        $('#cls_table tr:eq(' + cls + ') td:eq(' + n + ')').css('background', '#44f');



                    }
                }});

            $('.item').addClass('ml-cls-active');

        }
    </script>

</div>

