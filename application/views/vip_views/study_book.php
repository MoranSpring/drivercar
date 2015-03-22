<div id="content" class="clearfix">
    <script src="<?php echo base_url() . 'application/js/ml.js' ?>" type="text/javascript"></script>
    <link type="text/css" href="<?= base_url() ?>application/css/ml.css" rel="stylesheet">
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
        <div id="con-con" class ="real_content ">
            <div class="ml_step_ul">
                <ul class="clear">
                    <li id="ml-step1"class=" ml_li ml_li_width">01、填写资料</li>
                    <li class=" ml_li"><img id="ml-step_img1"  src="http://localhost:8888/application/images/cover.png" style="height: 40px; vertical-align:top"  height="40px" width="26" /></li>
                    <li id="ml-step2" class=" ml_li ml_li_width">02、完成注册</li>
                    <li class=" ml_li"><img id="ml-step_img2"  src="http://localhost:8888/application/images/cover.png"  style="height: 40px; vertical-align:top" height="40px" width="26" /></li>
                    <li id="ml-step3" class=" ml_li ml_li_width">03、完成注册</li>
                </ul>
            </div>
            <div class="step_1">
                <h1>温馨提示</h1>
                <span>预约之前必须通过科目一</span>
                <div class="am-g am-margin-top">
                    <div class="am-u-sm-4 am-u-md-3 am-text-right">请选择培训项目</div>
                    <div class="am-u-sm-8 am-u-md-9 " id="project_list">
                        <select id="select_sch" class="province" style="height:40px;line-he0ight: 40px; width:150px;text-align: center;"  data-placeholder="请选择" name="coach_sch_id">
                        </select>
                        <select id="select_sch" class="city"  data-placeholder="请选择" style="height:40px;line-he0ight: 40px; width:250px;text-align: center;" name="coach_sch_id">
                        </select>

                    </div>
                </div>
                <div class="am-g am-margin-top-xl">
                    <button id="bt1" type="button" class="am-center am-btn am-btn-primary " style="width:200px">下一步</button>
                </div>
            </div>
            <div class="step_2" style="display:none">
                
                
                
                
                
                
                
                
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
</div>

