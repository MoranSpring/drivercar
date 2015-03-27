<div id="content" class="clearfix">
    <div id="con-coach-right">
        <div id="con-nav">
            <p><a href="void">首页</a>  >个人信息</p>
        </div>
        <script src="<?php echo base_url() . 'application/js/coach/schedule.js' ?>" type="text/javascript"></script>
        <link type="text/css" href="<?= base_url() ?>application/css/ml.css" rel="stylesheet">

        <div id="con-con" class ="real_content ">
            <div class="am-margin">

                <h2>我的教学计划</h2>
                <div class="am-g">
                    <form>
                        <div  class="am-u-sm-4 am-u-md-4">
                            <div class="am-g am-margin-top">
                                <label class="am-u-sm-5 am-u-md-5 am-text-right am-form-label">上课日期</label>
                                <div class="am-u-sm-7 am-u-md-7  ">
                                    <input type="text" class="am-form-field" id="select_date" name="news_date" style="width: 200px" placeholder="点击选择日期" data-am-datepicker="{format: 'yyyy-mm-dd'}" readonly/>
                                </div>
                            </div>

                            <div class="am-g am-margin-top">
                                <label class="am-u-sm-5 am-u-md-5 am-text-right am-form-label">教授科目类型</label>

                                <div class="am-btn-group am-u-sm-7 am-u-md-7  " data-am-button>
                                    <label class="am-btn am-btn-primary am-btn-xs">
                                        <input type="radio" name="options" id="option1"> 科目三
                                    </label>
                                    <label class="am-btn am-btn-primary am-btn-xs">
                                        <input type="radio" name="options" id="option2"> 科目二
                                    </label>
                                </div>
                            </div>
                        </div>  
                        <div  class="am-u-sm-4 am-u-md-4 am-text-right">
                            <div class="am-vertical-align" style="height: 100px;">
                                <div class="am-vertical-align-bottom">
                                    <label onclick="Statistics()" class="am-btn  am-btn-danger ">确定完成</label>
                                </div>
                            </div>
                            
                        </div>
                  </form>

                </div>
                <div class="am-g am-margin-top am-padding">
                    <div class="">选择时间</div>
                    <div onselectstart="return false">
                        <table id="cls_table"class="am-table am-table-bordered ml-table-hover"   style="display:none; font-size:16px;cursor:pointer;user-select:none;">
                            <thead>
                                <tr>          
                                    <th width="16%">时间 \ 日期</th>
                                    <th width="12%" id="date1"></th>
                                    <th width="12%" id="date2"></th>
                                    <th width="12%" id="date3"></th>
                                    <th width="12%" id="date4"></th>
                                    <th width="12%" id="date5"></th>
                                    <th width="12%" id="date6"></th>
                                    <th width="12%" id="date7"></th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td value="1" name="">08:00--09:00</td>
                                    <td class="ml-item ml-coach-active" value="" date="date1" num="1"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date2" num="1"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date3" num="1"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date4" num="1"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date5" num="1"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date6" num="1"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date7" num="1"></td>
                                </tr>
                                <tr>
                                    <td value="1" name="">09:00--2:00</td>
                                    <td class="ml-item ml-coach-active" value="" date="date1" num="2"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date2" num="2"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date3" num="2"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date4" num="2"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date5" num="2"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date6" num="2"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date7" num="2"></td>
                                </tr>
                                <tr>
                                    <td value="1" name="">10:00--11:00</td>
                                    <td class="ml-item ml-coach-active" value="" date="date1" num="3"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date2" num="3"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date3" num="3"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date4" num="3"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date5" num="3"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date6" num="3"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date7" num="3"></td>
                                </tr>
                                <tr>
                                    <td value="1" name="">11:00--12:00</td>
                                    <td class="ml-item ml-coach-active" value="" date="date1" num="4"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date2" num="4"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date3" num="4"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date4" num="4"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date5" num="4"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date6" num="4"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date7" num="4"></td>
                                </tr>
                                <tr style="background:#DDDDDD;">
                                    <td>休息</td><td></td><td></td><td></td><td></td><td></td><td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td value="1" name="">13:00--14:00</td>
                                    <td class="ml-item ml-coach-active" value="" date="date1" num="5"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date2" num="5"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date3" num="5"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date4" num="5"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date5" num="5"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date6" num="5"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date7" num="5"></td>
                                </tr>
                                <tr>
                                    <td value="1" name="">14:00--15:00</td>
                                    <td class="ml-item ml-coach-active" value="" date="date1" num="6"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date2" num="6"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date3" num="6"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date4" num="6"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date5" num="6"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date6" num="6"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date7" num="6"></td>
                                </tr>
                                <tr>
                                    <td value="1" name="">15:00--16:00</td>
                                    <td class="ml-item ml-coach-active" value="" date="date1" num="7"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date2" num="7"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date3" num="7"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date4" num="7"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date5" num="7"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date6" num="7"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date7" num="7"></td>
                                </tr>
                                <tr>
                                    <td value="1" name="">16:00--17:00</td>
                                    <td class="ml-item ml-coach-active" value="" date="date1" num="8"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date2" num="8"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date3" num="8"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date4" num="8"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date5" num="8"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date6" num="8"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date7" num="8"></td>
                                </tr>
                                <tr style="background:#DDDDDD;">
                                    <td>休息</td><td></td><td></td><td></td><td></td><td></td><td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td value="1" name="">17:00--18:00</td>
                                    <td class="ml-item ml-coach-active" value="" date="date1" num="9"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date2" num="9"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date3" num="9"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date4" num="9"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date5" num="9"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date6" num="9"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date7" num="9"></td>
                                </tr>
                                <tr>
                                    <td value="1" name="">18:00--19:00</td>
                                    <td class="ml-item ml-coach-active" value="" date="date1" num="10"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date2" num="10"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date3" num="10"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date4" num="10"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date5" num="10"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date6" num="10"></td>
                                    <td class="ml-item ml-coach-active" value="" date="date7" num="10"></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="am-modal am-modal-loading am-modal-no-btn" tabindex="-1" id="my-modal-loading">
  <div class="am-modal-dialog">
    <div class="am-modal-hd">正在载入...</div>
    <div class="am-modal-bd">
      <span class="am-icon-spinner am-icon-spin"></span>
    </div>
  </div>
</div>
