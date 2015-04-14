<link type="text/css" href="<?= base_url() ?>application/css/ml.css" rel="stylesheet">
<div id="content" class="clearfix">
    <div id="con-coach-right">
        <div id="con-nav">
            <p><a href="void">首页</a>  >教学情况</p>
        </div>
        <div style="font-size: 1em;line-height: 2em;">
            请选择时间区间：从
            <input type="text"  id="select_date1" name="news_date" style="width: 200px;height: 2em;" placeholder="点击选择日期" readonly/>
            到
            <input type="text"  id="select_date2" name="news_date" style="width: 200px;height: 2em;" placeholder="点击选择日期" readonly/>
            <button class="am-btn  am-btn-sm am-btn-danger" onclick="submmit()">确定完成</button>
        </div>
        <div style="margin: 10px;background: #eee;padding: 10px; font-size: 1.2em;line-height: 1.6em;">
            <p class="timestyle">您选择的时段为从    <span class='time1'></span>  到  <span class='time2'></span></p>
            <style>
                .timestyle span{
                    font-size: 1.2em;
                    font-weight: bold;
                    color: #900;
                }
                .teach_ul{
                    width:100%;
                }
                .teach_ul li{
                    float: left;width:100%;
                    list-style-type:none;
                }
                .teach_ul_info>li{
                    clear:both;
                }
                .teach_ul_third li{
                    float: left;
                    color:#444;
                    width:150px;
                    padding: 0 5px 0 5px;
                    font-size: 1.2em;
                    line-height: 1.6em;
                }
            </style>
            <div>
                <ul class='teach_ul clearfix teach_ul_info'>
                    <li>
                        <ul class='teach_ul_third'>
                            <li style="text-align: right;color:#969EC3">总教授课程 : </li>
                            <li class="course_num"></li>
                        </ul>
                    </li>
                    <li>
                        <ul class='teach_ul_third'>
                            <li style="text-align: right;color:#969EC3">学员数 :</li>
                            <li class="stu_num"></li>
                        </ul>
                    </li>
                    <li>
                        <ul class='teach_ul_third'>
                            <li style="text-align: right;color:#969EC3">平均评分 :  </li>
                            <li>5星</li>
                        </ul>
                    </li>
                    <li>
                        <ul class='teach_ul_third'>
                            <li style="text-align: right;color:#969EC3">累计积分 :  </li>
                            <li>12345分</li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div style="margin: 10px;padding: 10px;">
            <table class="am-table">
                        <thead>
                            <tr>
                                <th>学员</th>
                                <th>培训点 </th>
                                <th>项目</th>
                                <th>时间</th>
                                <th>节数</th>
                                <th>积分</th>
                                <th>建议</th>
                            </tr>
                        </thead>
                        <tbody class="table-content">
                            
                        </tbody>
                    </table>
        </div>
        <div class="ml-loading">
            <center>
                <EMBED src="<?=  base_url()?>/application/images/loading.swf" width=80 height=80 type=application/x-shockwave-flash; quality="high"wmode="transparent">
            </center>
        </div>
    </div>
    
</div>
<script>
    $(function () {
        $("#select_date1").datepicker({
            onSelect: function (dateText) {
                second(dateText);
            }
        }
        );
        $("#datepicker1").datepicker("option", "dateFormat", "yy-mm-dd");
    });
    function second(date) {
        $("#select_date2").val("");
        $("#select_date2").datepicker("destroy");
        var firstDay = new Date(date);
        $("#select_date2").datepicker({
            onSelect: function (dateText) {
            },
            minDate: new Date(firstDay.getFullYear(), firstDay.getMonth(), firstDay.getDate())
        }
        );
        $("#datepicker2").datepicker("option", "dateFormat", "yy-mm-dd");
    }
    function submmit() {
        if ($("#select_date2").val() === "" || $("#select_date1").val() === "")
        {
            alert("select date!");
        }
        else
        {
            $('.ml-loading').show();
            toGetData();
            $('.time1').html($("#select_date1").val());
            $('.time2').html($("#select_date2").val());
        }
    }
    function toGetData(){
        time1=$("#select_date1").val();
        time2=$("#select_date2").val();
        $.ajax({
        type: "POST",
        dataType: "text",
        url: "<?=  base_url()?>index.php/coach/get_teach_info",
        async: true,
        data: {time1: time1, time2: time2},
        success: function (data) {
            $('.ml-loading').hide();
             var json = eval("(" + data + ")");
             $('.course_num').html(json.course_num);
             $('.stu_num').html(json.stu_num);
            $('.table-content').html(json.list);
            }
        });
    }
</script>



