<style>
    .co-self{
        width:100%;
    }
    .co-self li{
        float: left;width:100%;
        list-style-type:none;
    }
    .co-self-info>li{
        clear:both;
    }
    .co-name{
        width:100%;
        background: #6B625D;
        padding: 0 0 0 20px;
    }
    .co-name p{
        color:#fff;
        font-size: 1.6em;
        line-height: 2em;
    }
    .co-name div{
        color:#DAD9D4;
        font-size: 1em;
        line-height:1.5em;
    }
    .co-self-third li{
        float: left;
        color:#444;
        width:170px;
        font-size: 1em;
        line-height: 1.6em;
    }
    .co-self-third{
        margin: 5px 0 0 0 ;
    }
    .co-coa-content{
        margin: 50px 0 0 0;
    }
    .co-self-edit-on{
        color:#fff;
        font-size: 0.8em;
        float: right;
        margin-right: 10px;
    }
    .co-self-edit-on:hover{
        color:#ddd;
    }
     .co-self-edit-off{
        display: none;
    }
</style>
<div id="content" class="clearfix">
    <div id="con-coach-right">
        <div id="con-nav">
            <p><a href="void">首页</a>  >驾校信息</p>
        </div>
        <link type="text/css" href="<?= base_url() ?>application/css/ml.css" rel="stylesheet">
        <div>
            <div class="co-name" style="position:relative;padding-left: 350px; line-height: 5em;">
                            <p>华科大驾校</p>
                          </div>
            <ul class="co-self clearfix">
                <li style="width:30%;position:relative;z-index: 1;margin-top: -20px;">
                    <img src="http://image.52drivecar.com/coach_imges/1428902329.jpg@!newsimg" class="am-img-thumbnail" height="220" width="300"/>
                </li>
                <li style="width:70%">
                    <ul class="co-self-info clearfix">
                        
                        <li>
                            <ul class="co-self-third clearfix">
                                <li style="text-align: right;color:#969EC3">
                                    学车价格：
                                </li>
                                <li  style="width:300px">
                                    <span style="font-size: 1.3em;color:red;font-weight: bold;">3800</span> 元
                                </li>
                            </ul>
                            <ul class="co-self-third clearfix">
                                <li style="text-align: right;color:#969EC3">
                                    招生范围：
                                </li>
                                <li   style="width:300px">
                                    江岸区 江汉区 乔口区
                                </li>
                            </ul>
                            <ul class="co-self-third clearfix">
                                <li style="text-align: right;color:#969EC3">
                                    驾校地址：
                                </li>
                                <li  style="width:300px">
                                    江岸区兴业路(解放大道佳园小区对面)
                                </li>
                            </ul>
                            <ul class="co-self-third clearfix">
                                <li style="text-align: right;color:#969EC3">
                                    咨询电话：
                                </li>
                                <li  style="width:300px">
                                    <span style="font-size: 1.3em;color:red;font-weight: bold;">13886090700</span>   
                                </li>
                            </ul>
                            <ul class="co-self-third clearfix">
                                <li style="text-align: right;color:#969EC3">
                                    提供服务类型：
                                </li>
                                <li>
                                    全科
                                </li>
                            </ul>
                            <ul class="co-self-third clearfix">
                                <li style="text-align: right;color:#969EC3">
                                    本月累计培训学员：
                                </li>
                                <li>
                                    29人
                                </li>
                            </ul>


                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="co-coa-content">
            <ul class="tab">
                <li id="one1" style="width:100px" class="selected-li" onclick="setTab('one', 1, 4)">详细信息</li>
                <li id="one2" style="width:100px" onclick="setTab('one', 2, 4)">地址/路线</li>
                <li id="one3" style="width:100px" onclick="setTab('one', 3, 4)">学员点评</li>
                <li id="one4" style="width:100px;border-right:1px solid #aaa;" onclick="setTab('one', 4, 4)">教练信息</li>
            </ul>
            <div class="pos_content" style="height: auto;max-height: 500px; min-height: 300px; overflow: auto">
                <div id="content1" class="clearfix">
                    <div style="margin: 10px">
                        <h3>教练信息</h3>
                        <div>人民网北京4月12日电 据中国驻印度尼西亚大使馆消息，4月10日，
                            谢锋大使应邀出席在雅加达举行的纪念亚非会议60周年主题研讨会并发表讲话。
                            印尼外交部亚太非总司长尤利、印度驻印尼大使辛格、南非驻印尼大使希福巴、
                            印尼前副总统顾问戴薇等印尼政府、商业、媒体、学术界代表及外国驻印尼使节等
                            400余人与会。</div>
                    </div>
                </div>
                <div id="content2" class="clearfix"  style="display:none;">
                    <div style="margin: 10px">
                        <h3>教练信息</h3>
                        <div>人民网北京4月12日电 据中国驻印度尼西亚大使馆消息，4月10日，
                            谢锋大使应邀出席在雅加达举行的纪念亚非会议60周年主题研讨会并发表讲话。
                            印尼外交部亚太非总司长尤利、印度驻印尼大使辛格、南非驻印尼大使希福巴、
                            印尼前副总统顾问戴薇等印尼政府、商业、媒体、学术界代表及外国驻印尼使节等
                            400余人与会。</div>
                    </div>
                    
                </div>
                <div id="content3" class="clearfix"  style="display:none;">
                    
                </div>
                <div id="content4" class="clearfix"  style="display:none;">
                    
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    var isTab1 = isTab2 = isTab3 = false;
    function onDisplay(num) {
//        if (num === 1 && isTab1 === false) {
//        } else if (num === 2 && isTab2 === false) {
//            isTab2 = true;
//            $.ajax({
//                type: "POST",
//                dataType: "text",
//                url: "<?=  base_url()?>index.php/coach/get_coach_comment",
//                async: true,
//                data: {},
//                success: function (data) {
//                    $('.coach_comment').append(data);
//                    
//                    }
//                });
//        }

    }
</script>



