<div id="content" class="clearfix">
    <div id="con-left">
        <ul>
                    <li><a href="<?=base_url() . 'index.php/first/sch_info'?>"><span>驾培资讯</span></a></li>
                    <li><a href="<?=base_url() . 'index.php/first/pos_info'?>"><span>培训点信息</span></a></li>
                    <li><a href="<?=base_url() . 'index.php/first/ser_info'?>"><span>服务指南</span></a></li>
                    <li><a href="<?=base_url() . 'index.php/first/coach_info'?>"><span>教练信息</span></a></li>
                    <li><a href="<?=base_url()?>index.php/first/sch_info"><span>教学大纲</span></a></li>
                </ul>
    </div>
    <div id="con-right">
        <div id="con-nav">
            <p><a href="void">首页</a> > <a href="void"> 驾培首页</a> > 教练信息</p>
        </div>
        <div id="con-con" class ="real_content">
            <ul class="tab">
                <li id="one1" class="selected-li" onclick="setTab('one', 1, 3)">自动定位</li>
                <li id="one2" onclick="setTab('one', 2, 3)">地址选择</li>
                <li id="one3" onclick="setTab('one', 3, 3)"  style="border-right:1px solid #aaa;">搜索</li>
            </ul>
            <div class="pos_content">
                <div id="content1" class="clearfix">
                    <p id="city_china_val">所在地区：
                        <select class="province cxselect" data-value="浙江省" data-first-title="选择省" disabled="disabled"></select>
                        <select id="citys" class="city cxselect" data-value="杭州市" data-first-title="选择市" disabled="disabled" onchange="saveLast()"></select>
                        <select class="area cxselect" data-value="西湖区" data-first-title="选择地区" disabled="disabled"></select>
                    </p><div class="map_father">
                        <div id="allmap"></div></div>
                    
                </div>
                <div id="content2" style="display:none">
                </div>
                <div id="content3" style="display:none">
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



