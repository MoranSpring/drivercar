<link type="text/css" href="<?= base_url() ?>application/css/jqueryui/jquery-ui.min.css" rel="stylesheet">
<script src="<?= base_url() ?>application/js/jqueryui/jquery-ui.min.js"></script>
<script src="<?php echo base_url() . 'application/js/ml.js' ?>" type="text/javascript"></script>
<script src="<?php echo base_url() . 'application/js/mobile/study_book.js' ?>" type="text/javascript"></script>
<script src="<?= base_url() ?>application/js/jqueryui/datepicker-zh-cn.js"></script>
<link type="text/css" href="<?= base_url() ?>application/css/mobile/study_book.css" rel="stylesheet">
<header data-am-widget="header" class="am-header am-header-default ml-color-bg-main">
    <div class="am-header-left am-header-nav">
        <a href="javascript:SBBack();">
            <img class="am-header-icon-custom" src="data:image/svg+xml;charset=utf-8,&lt;svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 12 20&quot;&gt;&lt;path d=&quot;M10,0l2,2l-8,8l8,8l-2,2L0,10L10,0z&quot; fill=&quot;%23fff&quot;/&gt;&lt;/svg&gt;"
                 alt="" />&nbsp;
        </a>
    </div>
    <h1 class="am-header-title">
        教练预约
    </h1>
</header>

<div class="ml_step_ul am-margin-top-sm">
    <ul class="clear" style="padding-left:0;">
        <li id="ml-step1"class=" ml_li">1.选择课程</li>
        <li class=" ml_li"><img id="ml-step_img1"  src="<?= base_url() ?>application/images/cover.png" style="height: 40px; vertical-align:top"  height="40px" width="26" /></li>
        <li id="ml-step2" class=" ml_li">2.选择课程</li>
        <li class=" ml_li"><img id="ml-step_img2"  src="<?= base_url() ?>application/images/cover.png"  style="height: 40px; vertical-align:top" height="40px" width="26" /></li>
        <li id="ml-step3" class=" ml_li">3.完成选课</li>
        <li class=" ml_li"><img id="ml-step_img3"  src="<?= base_url() ?>application/images/cover.png"  style="height: 40px; vertical-align:top" height="40px" width="20" /></li>
    </ul>
</div>

<div class="step_1">
    <div class="am-alert am-alert-danger" data-am-alert>
        <button type="button" class="am-close">&times;</button>
        <p><strong>温馨提示</strong></p>
        <p>预约之前必须通过科目一</p>
    </div>

    <div class="am-margin-sm" id="project_list">
        <p>请选择培训项目:</p>
        <select class="cls_kind" id="doc-select-1" data-placeholder="请选择" style="width:30%;">
        </select>
        <select  class="cls_project" id="doc-select-1" first projectName="" data-placeholder="请选择"style="width:68%;" >
        </select>
    </div>
    <div class="am-center am-margin-top-xl" style="width:100px">
        <button id="bt1" type="button" class=" am-btn am-radius ml-btn-normal" style="width:100px" >下一步</button>
    </div>
</div>

<div class="step_2" style="display:none">
    <!--    <div class="am-margin-sm">
            <label>所属驾校:</label>
            <select class="select_sch" onchange="selectCoach(this.value)" style="width:70%;">
            </select>
        </div>
        <div class="am-margin-sm">
            <label>选择教练:</label>
            <select  class="select_coach" data-placeholder="请选择" style="width:70%;">
            </select>
        </div>-->

    <div class="am-margin-sm am-panel am-panel-default">
        <header class="am-panel-hd" style='background: #fff'>
            <div class="clearfix">
                <span>教练信息</span>
            </div>
        </header>
        <div class="am-panel-bd" style='margin:0px;padding:3px 3px 3px 10px;'>
            <div class='am-g' style='margin:0px;'>
                <div class='am-u-sm-9 am-u-md-9' style='margin:0px;padding:0px;border-right: 1px dotted #ddd;'>
                    <div class='am-g coa_exist'>
                        <div class='am-u-sm-3'>
                            <img class="coa_img am-radius" src="" style="height: 50px;width:50px;"/>
                        </div>
                        <div class='am-u-sm-9'>
                            <span  class='select_coa am-text-center' id="" style='font-size: 1em;line-height: 25px;color:#888;'></span><br/>
                            <span  class='select_sch am-text-center' id="" style='line-height: 25px;font-size: 0.8em;color:#aaa;'></span>
                        </div>
                    </div>
                    <div class="coa_unexist" style="display: none;">
                        <span class="am-text-sm" style="color:#888">您还没有选择教练，请点击右侧选择教练</span>
                    </div>
                </div>
                <div class='am-u-sm-3 am-u-md-3 am-text-center' style='margin:0px;padding:0px;'>
                    <a  href='<?= base_url() ?>index.php/mobile/select_coach' style="line-height: 50px;font-size: 20px;color:#bbb;">
                        <span class="am-icon-exchange">&nbsp;</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="am-margin-sm">
        <input  type="text" id="datepicker" placeholder="选择日期" style="width:70%;border:1px solid #aaa;border-radius: 3px;"/>
    </div>
    <div class="am-g  am-margin-top">
        <div class="am-text-center">
            <div class="">选择时间</div>
            <div onselectstart="return false">
                <table id="cls_table"class="am-table am-table-bordered ml-table-hover"   style="font-size: 0.8em;cursor:pointer;user-select:none;background: #f5f5f5">
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
                            <td value="1" name="">08:00-09:00</td>
                            <td class="item" value="" date="date1" num="1"></td>
                            <td class="item" value="" date="date2" num="1"></td>
                            <td class="item" value="" date="date3" num="1"></td>
                        </tr>
                        <tr>
                            <td value="1" name="">09:00-10:00</td>
                            <td class="item" value="" date="date1" num="2"></td>
                            <td class="item" value="" date="date2" num="2"></td>
                            <td class="item" value="" date="date3" num="2"></td>
                        </tr>
                        <tr>
                            <td value="1" name="">10:00-11:00</td>
                            <td class="item" value="" date="date1" num="3"></td>
                            <td class="item" value="" date="date2" num="3"></td>
                            <td class="item" value="" date="date3" num="3"></td>
                        </tr>
                        <tr>
                            <td value="1" name="">11:00-12:00</td>
                            <td class="item" value="" date="date1" num="4"></td>
                            <td class="item" value="" date="date2" num="4"></td>
                            <td class="item" value="" date="date3" num="4"></td>
                        </tr>
                        <tr style="background:#DDDDDD;">
                            <td>休息</td><td></td><td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td value="1" name="">13:00-14:00</td>
                            <td class="item" value="" date="date1" num="5"></td>
                            <td class="item" value="" date="date2" num="5"></td>
                            <td class="item" value="" date="date3" num="5"></td>
                        </tr>
                        <tr>
                            <td value="1" name="">14:00-15:00</td>
                            <td class="item" value="" date="date1" num="6"></td>
                            <td class="item" value="" date="date2" num="6"></td>
                            <td class="item" value="" date="date3" num="6"></td>
                        </tr>
                        <tr>
                            <td value="1" name="">15:00-16:00</td>
                            <td class="item" value="" date="date1" num="7"></td>
                            <td class="item" value="" date="date2" num="7"></td>
                            <td class="item" value="" date="date3" num="7"></td>
                        </tr>
                        <tr>
                            <td value="1" name="">16:00-17:00</td>
                            <td class="item" value="" date="date1" num="8"></td>
                            <td class="item" value="" date="date2" num="8"></td>
                            <td class="item" value="" date="date3" num="8"></td>
                        </tr>
                        <tr style="background:#DDDDDD;">
                            <td>休息</td><td></td><td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td value="1" name="">17:00-18:00</td>
                            <td class="item" value="" date="date1" num="9"></td>
                            <td class="item" value="" date="date2" num="9"></td>
                            <td class="item" value="" date="date3" num="9"></td>
                        </tr>
                        <tr>
                            <td value="1" name="">18:00-19:00</td>
                            <td class="item" value="" date="date1" num="10"></td>
                            <td class="item" value="" date="date2" num="10"></td>
                            <td class="item" value="" date="date3" num="10"></td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div class="am-center am-margin-top-sm am-g" style="width:210px">
        <button id="bt21" type="button" class=" am-btn  am-radius ml-btn-normal am-fl" style="width:100px" >上一步</button>
        <button id="bt22" type="button" class=" am-btn  am-radius ml-btn-normal am-fr" style="width:100px">下一步</button>
    </div>
</div>
<div class="step_3" style="display:none">
    <div class="am-margin-top-sm">
        <div  class="am-padding-sm" style="background: #FFF">
            <h2>预约信息确认</h2>
            <ul class="sb-ul">
                <li><span  class="am-icon-user"> 预约人名：</span><span class="user-name"></span></li>
                <li><span  class="am-icon-phone"> 预留电话：</span><span class="user-tel"></span></li>
                <li><span class="am-icon-file-text"> 预选节数：</span><span class="sum-cls-num"></span>节课</li>

            </ul>
        </div>
        <table  class="am-margin-top-sm am-table  " style="background:#FFF;font-size: 0.8em;" >
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
        <h3 class="am-text-right">您选了 <span class="sum-cls-num">8</span> 节课  共计：<span id="sum" style="color:#990000;font-size: 18px;">3000</span>  积分</h3>
    </div>
    <div class="am-center am-margin-top-sm am-g" style="width:210px">
        <button id="bt31" type="button" class=" am-btn  am-radius ml-btn-normal am-fl" style="width:100px" >上一步</button>
        <button id="bt32" type="button" class=" am-btn  am-radius ml-btn-danger am-fr" style="width:100px">确   定</button>
    </div>
</div>
<script>
    var curWwwPath = window.document.location.href;
    var pathName = window.document.location.pathname;
    var pos = curWwwPath.indexOf(pathName);
    var localhostPath = curWwwPath.substring(0, pos);
    function iAmMobile() {
        return null;
    }
    function SBBack() {
        window.location.href = localhostPath+"/index.php/mobile";
    }
    $.cxSelect.defaults.url = "<?php echo base_url() . 'application/js/project.json' ?>";
    $('#project_list').cxSelect({
        selects: ['cls_kind', 'cls_project'],
        nodata: 'none'
    });
    function setInfo() {
        $('.user-name').html('<?= $this->session->userdata('name'); ?>');
        $('.user-tel').html('<?= $this->session->userdata('TEL'); ?>');

    }
</script>
