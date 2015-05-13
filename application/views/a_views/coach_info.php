<div id="content" class="clearfix">
    <div id="con-left">
        <ul>
            <li><a href="<?= base_url() . 'index.php/first/sch_info' ?>"><span>驾培资讯</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/pos_info' ?>"><span>培训点信息</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/ser_info' ?>"><span>服务指南</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/coach_info' ?>"><span>教练信息</span></a></li>
            <li><a href="<?= base_url() ?>index.php/first/sch_info"><span>教学大纲</span></a></li>
        </ul>
    </div>
    <div id="con-right">
        <div id="con-nav">
            <p><a href="void">首页</a> > <a href="void"> 驾培首页</a> > 教练信息</p>
        </div>
        <div id="con-con" class ="real_content">

            <div class="pos_content">
                <div id="content1" class="clearfix">
                    <div>
                        <span style="line-height: 2em;">
                            目前选择地区：
                        </span><span class="selected-city">武汉市</span>
                        <span id="city_china_val" class="select-city" style="display: none;">
                            <select id="province" class="province cxselect" data-first-title="选择省"></select>
                            <select id="citys" class="city cxselect" data-first-title="选择市"></select>
                            <select id="area" class="area cxselect" data-first-title="选择地区" ></select>
                        </span><input class="btn-city" type="submit" value="更换"/></div>
                    <div class="map_father">
                        <div id="allmap"></div></div>
                </div>
            </div>

            <div class ="real_content">
                <ul class="tab">
                    <li id="one1" class="selected-li"  style="border-right:1px solid #aaa;">教练信息</li>
                </ul>
                <div class="sch_content clearfix">
                    <ul class="coach_list">
                        <li>
                            <a href="#">
                                <img class="coachimg am-img-bdrs" src="http://cn.bing.com/az/hprichv/LondonTrainStation_GettyRR_139321755_ZH-CN742316019.jpg">
                                <div class="clearfix"><div class="coa_name">李建国</div><div class="coa_sch">南湖驾校</div></div>
                                <div class="coa_price">100￥/h</div>
                                <div class="">已有3218人评价</div>
                                <div class="coa_comment">当前评分 <img class="comm_" src="<?= base_url() . 'application/images/star5.png' ?>" ><span>4.7</span>分</div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img class="coachimg am-img-bdrs" src="http://cn.bing.com/az/hprichv/LondonTrainStation_GettyRR_139321755_ZH-CN742316019.jpg">
                                <div class="clearfix"><div class="coa_name">李建国</div><div class="coa_sch">南湖驾校</div></div>
                                <div class="coa_price">100￥/h</div>
                                <div class="">已有3218人评价</div>
                                <div class="coa_comment">当前评分 <img class="comm_" src="<?= base_url() . 'application/images/star5.png' ?>" ><span>4.7</span>分</div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img class="coachimg am-img-bdrs" src="http://cn.bing.com/az/hprichv/LondonTrainStation_GettyRR_139321755_ZH-CN742316019.jpg">
                                <div class="clearfix"><div class="coa_name">李建国</div><div class="coa_sch">南湖驾校</div></div>
                                <div class="coa_price">100￥/h</div>
                                <div class="">已有3218人评价</div>
                                <div class="coa_comment">当前评分 <img class="comm_" src="<?= base_url() . 'application/images/star5.png' ?>" ><span>4.7</span>分</div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img class="coachimg am-img-bdrs" src="http://cn.bing.com/az/hprichv/LondonTrainStation_GettyRR_139321755_ZH-CN742316019.jpg">
                                <div class="clearfix"><div class="coa_name">李建国</div><div class="coa_sch">南湖驾校</div></div>
                                <div class="coa_price">100￥/h</div>
                                <div class="">已有3218人评价</div>
                                <div class="coa_comment">当前评分 <img class="comm_" src="<?= base_url() . 'application/images/star5.png' ?>" ><span>4.7</span>分</div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img class="coachimg am-img-bdrs" src="http://cn.bing.com/az/hprichv/LondonTrainStation_GettyRR_139321755_ZH-CN742316019.jpg">
                                <div class="clearfix"><div class="coa_name">李建国</div><div class="coa_sch">南湖驾校</div></div>
                                <div class="coa_price">100￥/h</div>
                                <div class="">已有3218人评价</div>
                                <div class="coa_comment">当前评分 <img class="comm_" src="<?= base_url() . 'application/images/star5.png' ?>" ><span>4.7</span>分</div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img class="coachimg am-img-bdrs" src="http://cn.bing.com/az/hprichv/LondonTrainStation_GettyRR_139321755_ZH-CN742316019.jpg">
                                <div class="clearfix"><div class="coa_name">李建国</div><div class="coa_sch">南湖驾校</div></div>
                                <div class="coa_price">100￥/h</div>
                                <div class="">已有3218人评价</div>
                                <div class="coa_comment">当前评分 <img class="comm_" src="<?= base_url() . 'application/images/star5.png' ?>" ><span>4.7</span>分</div>
                            </a>
                        </li>



                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        $.ajax({
            type: "POST",
            dataType: "text",
            url: "<?= base_url() ?>index.php/first/get_school_info",
            async: true,
            data: {city: 1027},
            success: function (data) {
                var json = eval("(" + data + ")");
                refrashMap(json);
            }});
    });
    $('.btn-city').toggle(function () {
        $('.select-city').css('display', 'inline');
        $('.selected-city').css('display', 'none');
        $(this).val("确定");
    }, function () {
        $('.selected-city').css('display', 'inline');
        $('.select-city').css('display', 'none');
        $(this).val("更换");
        if (saveLast()) {
            var pro = $('.province option:selected').text();
            var cit = $('.city option:selected').text();
            var are = $('.area option:selected').text();
            if (pro == 0 || pro == "0" || pro == null) {
                pro = "";
            }
            if (cit == 0 || cit == "0" || cit == null) {
                cit = "";
            }
            if (are == 0 || are == "0" || are == null) {
                are = "";
            }
            var span_con = pro + ' ' + cit + ' ' + are;
            $('.selected-city').html(span_con);
        } else {
            alert("该地区未上线");
        }
    });
     function AsyncChange(data) {
        var json = eval("(" + data + ")");
        refrashMap(json.info);
        $('.con2-ul').html(json.list);
    }
</script>


