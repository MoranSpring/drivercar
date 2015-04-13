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
            <button onclick="" class="am-btn  am-btn-sm am-btn-danger">确定完成</button>
             
        </div>
        
    </div>
</div>
<script>
    $(function(){

$("#select_date1").datepicker({
        onSelect: function (dateText) {
            second();
        },
         minDate: "-10m"
    }
    );
        $("#datepicker1").datepicker("option", "dateFormat", "yy-mm-dd");
    });
    function second(){
        $( "#select_date2" ).datepicker( "setDate", $( "#select_date1" ).val() );
        
        $("#select_date2").datepicker({
        onSelect: function (dateText) {
            
        },
        minDate: '2015-04-01'
    }
    );
        $("#datepicker2").datepicker("option", "dateFormat", "yy-mm-dd");
    }
   
</script>



