<div id="content" class="clearfix">
    <div id="con-left">
        <ul>
            <li><a href="<?= base_url() . 'index.php/first/sch_info' ?>"><span>驾培资讯</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/pos_info' ?>"><span>培训点信息</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/ser_info' ?>"><span>服务指南</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/coach_info' ?>"><span>教练信息</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/sch_info' ?>"><span>教学大纲</span></a></li>
        </ul>
    </div>
    <div id="con-right">
        <div id="con-nav">
            <p><a href="void">首页</a> > <a href="void"> 驾培首页</a> > 培训点信息</p>
        </div>
        <div id="con-con" class ="real_content">
            <div class="pos_content clearfix">
                <div>
                    <span style="line-height: 2em;">
                        目前选择地区：
                    </span><span class="selected-city">武汉市</span>
                    <span id="city_china_val" class="select-city" style="display: none;">
                        <select id="province" class="province cxselect" data-first-title="选择省"></select>
                        <select id="citys" class="city cxselect" data-first-title="选择市"></select>
                        <select id="area" class="area cxselect" data-first-title="选择地区" ></select>
                    </span><input class="am-btn-primary am-btn-ls btn-city" type="submit" value="更换"/></div>
                <div class="map_father">
                    <div id="allmap"></div></div>
            </div>

            <div class ="real_content">
                <ul class="tab">
                    <li id="one1" class="selected-li"  style="border-right:1px solid #aaa;">驾培机构</li>
                </ul>
                <div class="sch_content">
                    <ul class="con2-ul">
                        <li class="clearfix school-list">
                            <div class="con-div clearfix am-img-thumbnail"> <img src="<?= 'http://image.52drivecar.com/news_imges/1429461553.jpg@!subtopnews' ?>"/></div>
                            <div class="con-div con-div2"><div  class="con2-div"><a style="line-height: 1.5em;font-weight: bold;font-size: 1.2em">南湖驾校   </a><span class="am-icon-star" style="font-size:1em;color:red;"></span><span class="am-icon-star" style="font-size:1em;color:red;"></span><span class="am-icon-star" style="font-size:1em;color:red;"></span><span class="am-icon-star" style="font-size:1em;color:red;"></span><span class="am-icon-star" style="font-size:1em;color:red;"></span></div>
                                <ul class="con2-con">
                                    <li><span>总评论数：999</span></li>
                                    <li><span>报考价格：<span style="font-size:1.1em;color:green;font-weight: bold">7800</span>元</span></li>
                                    <li><span>已报考学员：400人</span></li>
                                </ul>
                                <div><span><a>武汉市</a>>>华科东校区校内</span></div>
                            </div>
                        </li>
                        <li class="clearfix school-list">
                            <div class="con-div clearfix am-img-thumbnail"> <img src="<?= 'http://image.52drivecar.com/news_imges/1429461553.jpg@!subtopnews' ?>"/></div>
                            <div class="con-div con-div2"><div  class="con2-div"><a style="line-height: 1.5em;font-weight: bold;font-size: 1.2em">南湖驾校   </a><span class="am-icon-star" style="font-size:1em;color:red;"></span><span class="am-icon-star" style="font-size:1em;color:red;"></span><span class="am-icon-star" style="font-size:1em;color:red;"></span><span class="am-icon-star" style="font-size:1em;color:red;"></span><span class="am-icon-star" style="font-size:1em;color:red;"></span></div>
                                <ul class="con2-con">
                                    <li><span>总评论数：999</span></li>
                                    <li><span>报考价格：<span style="font-size:1.1em;color:green;font-weight: bold">7800</span>元</span></li>
                                    <li><span>已报考学员：400人</span></li>
                                </ul>
                                <div><span><a>武汉市</a>>>华科东校区校内</span></div>
                            </div>
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
                refrashMap(json.info);
                $('.con2-ul').html(json.list);
                
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
</script>

