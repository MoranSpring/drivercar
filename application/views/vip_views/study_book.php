<div id="content" class="clearfix">
    <script src="<?php echo base_url() . 'application/js/ml.js' ?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'application/js/admin/amazeui.chosen.min.js' ?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'application/js/jquery.cxselect.js' ?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'application/js/vip/study_book.js' ?>" type="text/javascript"></script>
    <link type="text/css" href="<?= base_url() ?>application/css/ml.css" rel="stylesheet">
    <link type="text/css" href="<?= base_url() ?>application/css/admin/amazeui.chosen.css" rel="stylesheet">

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

                            <select  class="cls_kind" style="font-size: 1em;width:150px;text-align: center;display:inline;"  data-placeholder="请选择">
                            </select>
                            <select  class="cls_project" first data-placeholder="请选择" style="font-size: 1em;width:250px;text-align: center;">
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
                            <select class="select_sch" onchange="selectCoach(this.value)" data-placeholder="请选择" style="font-size: 1em;width:250px;text-align: center;">
                            </select>
                        </div>
                    </div>
                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-4 am-u-md-2 am-text-right">选择教练</div>
                        <div class="am-u-sm-8 am-u-md-10">
                            <select class="select_coach" data-placeholder="请选择" style="font-size: 1em;width:250px;text-align: center;">
                            </select>
                        </div>
                    </div>
                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-4 am-u-md-2 am-text-right">选择日期</div>
                        <div class="am-u-sm-8 am-u-md-10 ">
                            <!--<input type="text" class="am-form-field" id="select_date" name="news_date" style="width: 200px" placeholder="点击选择日期" data-am-datepicker="{format: 'yyyy-mm-dd'}" readonly/>-->
                        <input type="text" id="datepicker"style="width: 200px"/>
                        </div>
                    </div>
                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-6 am-u-md-6 am-text-center">
                            <div class="">选择时间</div>
                            <div onselectstart="return false">
                                <table id="cls_table"class="am-table am-table-bordered ml-table-hover"   style="font-size: 0.8em;display: none;cursor:pointer;user-select:none;">
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
                                    <thead>
                                        <td></td>
                                        <td>此时刻最大承载量</td>
                                        <td>当前时段已被预约</td>
                                        <td>剩余可约</td>
                                    </thead>
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
                    <div class="am-margin-xl">
                        <div  class="am-g am-padding" style="background: #EEE">
                            <h2>预约信息确认</h2>
                            <p class="am-icon-user"> 预约人名 ：<span class="user-name"></span></p><br/>
                            <p class="am-icon-phone"> 预留电话：<span class="user-tel"></span></p><br/>
                            <p class="am-icon-file-text"> 预选节数：<span class="sum-cls-num"></span>节课</p>
                        </div><br />
                        <table  class="am-table am-table-bordered" >
                            <thead>
                                <tr>          
                                    <th>日期+时间</th>
                                    <th>培训点</th>
                                    <th>教练</th>
                                    <th>项目</th>
                                </tr>
                            </thead>
                            <tbody id="book-table-info">
                                
                            </tbody>
                        </table>
                        <h3 class="am-text-right">您选了 <span class="sum-cls-num">8</span> 节课  共计：<span id="sum" class="am-icon-rmb" style="color:#990000;font-size: 18px;">3000</span>  积分</h3>


                    </div>

                    <div class="am-center am-margin-top-xl" style="width:320px">


                        <button id="bt31" type="button" class=" am-btn am-btn-primary " style="width:150px" >上一步</button>
                        <button id="bt32" type="button" class=" am-btn am-btn-primary am-btn-danger " style="width:150px">确   定</button>
                    </div>

                </div>
            </form>
            <button  class=" am-btn am-btn-primary " onclick="submit()" style="width:150px">summit</button>

        </div>

    </div>
    <script>
        $.cxSelect.defaults.url = "<?php echo base_url() . 'application/js/project.json' ?>";
                $('#project_list').cxSelect({
                    selects: ['cls_kind', 'cls_project'],
                    nodata: 'none'
                });
    </script>
   


    <div class="am-modal am-modal-alert" tabindex="-1" id="your-modal">
        <div class="am-modal-dialog">
            <div class="am-modal-hd am-icon-exclamation-triangle" style="color: #990000; font-size:32px">提示</div>
            <div class="am-modal-bd">
                <span id="alert-content"></span>
            </div>
            <div class="am-modal-footer">
                <span class="am-modal-btn">确定</span>
            </div>
        </div>
    </div>
</div>

