<style>
    .ck-slide { width:100%; height: 50%;}
    .ck-slide ul.ck-slide-wrapper { width:20%}
    .ck-slide-wrapper li { width:20%;height: 100%;}
</style>
<style>
    #index-left{
        background-color: #fff;
        float:left;
        width:170px;
        border:1px solid #ddd;
        border-bottom: 0;
        cursor: pointer;
    }
    #index-left ul li{
        list-style: none;
        text-align: center;
        /*border-bottom:1px solid #ddd;*/
    }
    #index-left ul li span{
        display: block;
        line-height: 41px;
        /*height: 40px;*/
    }
    #index-middle{
        float:left;
        margin-left: 10px;
        width:600px;
        min-height: 330px;
        display: block;

        /*margin-left: 14px;*/
        background: #fff;
    }
    #index-right{
        float:left;
        background-color: #fff;
        width:220px;
        border:1px solid #ddd;
        border-bottom: 0;
        cursor: pointer;
    }
    #index-right ul li{
        list-style: none;
        height: 110px;
        border-bottom:1px solid #ddd;
    }
    #ndex-right ul li:hover{

    }
    .index-coach{
        width:1000px;
        margin-top: 20px;
        margin-bottom: 20px;
        margin-left: auto;
        margin-right: auto;
    }
    .index-con-ul li{
        list-style: none;
        float:left;
        /*border-radius: 7px;*/
        width:209px;
        height:113px;
        margin-right: -1px;
        margin-bottom: 15px;
        overflow: hidden;
    }
    .alpha50 {  
        filter:alpha(opacity=50);  
        -moz-opacity:0.5;  
        -khtml-opacity: 0.5;  
        opacity: 0.5;  
    }   
    #index-left ul li:hover{
        background: #88B5C8;
    }
    #index-left ul li{
        background: #54728A;
    }
    #full-banner{
        width:100%;
    }
</style>
<link rel="stylesheet" href="<?= base_url() ?>application/css/slide.css">
<script src="<?= base_url() ?>application/js/slide.js"></script>

<div id="full-banner" class="clearfix">
<!--    <div id="index-left">
        <ul>
            <li><span style="background: #A2B5B9;color: #fff;">特色服务</span></li>
            <li><a href="<?= base_url() . 'index.php/first/pos_info' ?>"><span style="color: #fff;">培训点信息</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/ser_info' ?>"><span style="color: #fff;">服务指南</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/coach_info' ?>"><span style="color: #fff;">教练信息</span></a></li>
            <li><span style="background: #A2B5B9;color: #fff;">特色服务</span></li>
            <li><a href="<?= base_url() . 'index.php/first/sch_info' ?>"><span style="color: #fff;">教学大纲</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/sch_info' ?>"><span style="color: #fff;">教学大纲</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/sch_info' ?>"><span style="color: #fff;">教学大纲</span></a></li>

        </ul>
    </div>-->
        <div class="ck-slide">
            <ul class="ck-slide-wrapper">
                <li>
                    <a href=""><img src="<?= base_url() ?>application/images/full-banner.jpg" style="width:100%;height: 100%" alt=""></a>
                </li>
                <li style="display:none">
                    <a href=""><img src="http://image.52drivecar.com/news_imges/title2.jpg" style="width:100%;height: 100%"  alt=""></a>
                </li>
                <li style="display:none">
                    <a href="javascript:"><img src="http://image.52drivecar.com/news_imges/title3.jpg" style="width:100%;height: 100%" alt=""></a>
                </li>
                <li style="display:none">
                    <a href="javascript:"><img src="http://image.52drivecar.com/news_imges/title4.jpg" style="width:100%;height: 100%" alt=""></a>
                </li>
                <li style="display:none">
                    <a href="javascript:"><img src="http://image.52drivecar.com/news_imges/title5.jpg" style="width:100%;height: 100%" alt=""></a>
                </li>
            </ul>
            <a href="javascript:;" class="ctrl-slide ck-prev" style="display: none;">上一张</a>
            <a href="javascript:;" class="ctrl-slide ck-next" style="display: none;">下一张</a>
            <div class="ck-slidebox">
                <div class="slideWrap">
                    <ul class="dot-wrap">
                        <li class="current"><em>1</em></li>
                        <li><em>2</em></li>
                        <li><em>3</em></li>
                        <li><em>4</em></li>
                        <li><em>5</em></li>
                    </ul>
                </div>
            </div>
        </div>
<!--    <div id="index-right">
        <ul>
            <li>
                <p style="padding-left: 5px;font-weight: bold;color:#666;font-size: 18px;"> 教练预约</p>
                <p style="padding-left: 5px;color:#aaa;font-size: 12px;">提前预约 拒绝等待</p>
                <div class="" style="position: relative;bottom:15px;;right:0px;left:120px;;width:70px;">
                    <img src="<?= base_url() ?>application/images/calendar.jpg" height="70" width="71"/>
                </div>
            </li>
            <li>
                <p style="padding-left: 5px;font-weight: bold;color:#666;font-size: 18px;"> 学车报名</p>
                <p style="padding-left: 5px;color:#aaa;font-size: 12px;">提前预约 拒绝等待</p>
                <div class="" style="position: relative;bottom:15px;right:0px;left:120px;width:70px;">
                    <img src="<?= base_url() ?>application/images/sch.jpg" height="70" width="71"/>
                </div>
            </li>
            <li>
                <p style="padding-left: 5px;font-weight: bold;color:#666;font-size: 18px;"> 驾培考核</p>
                <p style="padding-left: 5px;color:#aaa;font-size: 12px;">提前预约 拒绝等待</p>
                <div class="" style="position: relative;bottom:15px;right:0px;left: 120px;width:70px;">
                    <img src="<?= base_url() ?>application/images/exam.jpg" height="70" width="71"/>

                </div>
            </li>
        </ul>
    </div>-->
</div>
<div class="index-coach" style="height: 260px;">
    <div style="width:172px;height:243px;float:left;">
        <img src="http://driver-un.oss-cn-shenzhen.aliyuncs.com/sch_root.jpg" style="height:242px;width:169px;"/>
        <!--        <div class="" style="color:#fff;position: relative;top:-259px;background: #F7AF02;width:100px;line-height:40px;text-align: center;">
                    驾培推荐
                </div>-->
        <div style="color:#fff;position: relative;top:-40px;background: #7DB351;width:169px;line-height:40px;text-align: center;">
            金牌驾培 全心为您
        </div>
    </div>
    <div style="width:828px;height:260px;float:left;margin-top: -1px;margin-bottom: -1px;padding-left: 15px;">
        <ul class="index-con-ul">
            <li class='index-list' style="padding-right: 15px;">
                <img src="<?=  base_url()?>application/images/testx.png" style="height:113px;width:190px;border: 1px solid #ddd;"/>
                <div class="index-defult" style="color:#fff;position: relative;top:-30px;background: url('<?= base_url() ?>application/images/alpha50.png');width:130px;line-height:30px;text-align: center;">
                    华科大东区
                </div>
                <div class="index-hover"  style="padding:5px;color:#fff;position: relative;top:-30px;background: url('<?= base_url() ?>application/images/alpha50.png');line-height:27px;height:60px;width:190px;">
                    <div>南湖驾校</div>
                    <div style='color:#FEF62F;font-weight: bold;'>￥3500<span class='am-fr'><a style='color:#D7E7F7;font-size: 15px;font-weight: 400;'>详情查看>></a></span></div>
                </div>
            </li>
            <li class='index-list'  style="padding-right: 15px;">
                <img src="<?=  base_url()?>application/images/testx.png" style="height:113px;width:190px;border: 1px solid #ddd;"/>
                <div class="index-defult" style="color:#fff;position: relative;top:-30px;background: url('<?= base_url() ?>application/images/alpha50.png');width:130px;line-height:30px;text-align: center;">
                    南湖驾校
                </div>
                <div class="index-hover"  style="padding:5px;color:#fff;display:none;position: relative;top:0px;background: url('<?= base_url() ?>application/images/alpha50.png');line-height:27px;height:60px;width:190px;">
                    <div>南湖驾校</div>
                    <div style='color:#FEF62F;font-weight: bold;'>￥3500<span class='am-fr'><a style='color:#D7E7F7;font-size: 15px;font-weight: 400;'>详情查看>></a></span></div>
                </div>
            </li>
            <li class='index-list'  style="padding-right: 15px;">
                <img src="<?=  base_url()?>application/images/testx.png" style="height:113px;width:190px;border: 1px solid #ddd;"/>
                <div class="index-defult" style="color:#fff;position: relative;top:-30px;background: url('<?= base_url() ?>application/images/alpha50.png');width:130px;line-height:30px;text-align: center;">
                    平安驾校
                </div>
                <div class="index-hover"  style="padding:5px;color:#fff;display:none;position: relative;top:0px;background: url('<?= base_url() ?>application/images/alpha50.png');line-height:27px;height:60px;width:190px;">
                    <div>南湖驾校</div>
                    <div style='color:#FEF62F;font-weight: bold;'>￥3500<span class='am-fr'><a style='color:#D7E7F7;font-size: 15px;font-weight: 400;'>详情查看>></a></span></div>
                </div>
            </li>
            <li class='index-list'  style="width: 190px;">
                <img src="<?=  base_url()?>application/images/testx.png" style="height:113px;width:190px;border: 1px solid #ddd;"/>
                <div class="index-defult" style="color:#fff;position: relative;top:-30px;background: url('<?= base_url() ?>application/images/alpha50.png');width:130px;line-height:30px;text-align: center;">
                    东方时尚
                </div>
                <div class="index-hover"  style="padding:5px;color:#fff;display:none;position: relative;top:0px;background: url('<?= base_url() ?>application/images/alpha50.png');line-height:27px;height:60px;width:190px;">
                    <div>南湖驾校</div>
                    <div style='color:#FEF62F;font-weight: bold;'>￥3500<span class='am-fr'><a style='color:#D7E7F7;font-size: 15px;font-weight: 400;'>详情查看>></a></span></div>
                </div>
            </li>
            <li class='index-list'   style="padding-bottom:15px;padding-right: 15px;">
                <img src="<?=  base_url()?>application/images/testx.png" style="height:113px;width:190px;border: 1px solid #ddd;"/>
                <div class="index-defult" style="color:#fff;position: relative;top:-30px;background: url('<?= base_url() ?>application/images/alpha50.png');width:130px;line-height:30px;text-align: center;">
                    绅宝驾校
                </div>
                <div class="index-hover"  style="padding:5px;color:#fff;display:none;position: relative;top:0px;background: url('<?= base_url() ?>application/images/alpha50.png');line-height:27px;height:60px;width:190px;">
                    <div>南湖驾校</div>
                    <div style='color:#FEF62F;font-weight: bold;'>￥3500<span class='am-fr'><a style='color:#D7E7F7;font-size: 15px;font-weight: 400;'>详情查看>></a></span></div>
                </div>
            </li>
            <li class='index-list'   style="padding-bottom:15px;padding-right: 15px;">
                <img src="<?=  base_url()?>application/images/testx.png" style="height:113px;width:190px;border: 1px solid #ddd;"/>
                <div class="index-defult" style="color:#fff;position: relative;top:-30px;background: url('<?= base_url() ?>application/images/alpha50.png');width:130px;line-height:30px;text-align: center;">
                    天马驾校
                </div>
                <div class="index-hover"  style="padding:5px;color:#fff;display:none;position: relative;top:0px;background: url('<?= base_url() ?>application/images/alpha50.png');line-height:27px;height:60px;width:190px;">
                    <div>南湖驾校</div>
                    <div style='color:#FEF62F;font-weight: bold;'>￥3500<span class='am-fr'><a style='color:#D7E7F7;font-size: 15px;font-weight: 400;'>详情查看>></a></span></div>
                </div>
            </li>
            <li class='index-list'   style="padding-bottom:15px;padding-right: 15px;">
                <img src="http://image.52drivecar.com/jp_imges/sch5.jpg" style="height:113px;width:190px;border: 1px solid #ddd;"/>
                <div class="index-defult" style="color:#fff;position: relative;top:-30px;background: url('<?= base_url() ?>application/images/alpha50.png');width:130px;line-height:30px;text-align: center;">
                    南湖驾校
                </div>
                <div class="index-hover"  style="padding:5px;color:#fff;display:none;position: relative;top:0px;background: url('<?= base_url() ?>application/images/alpha50.png');line-height:27px;height:60px;width:190px;">
                    <div>南湖驾校</div>
                    <div style='color:#FEF62F;font-weight: bold;'>￥3500<span class='am-fr'><a style='color:#D7E7F7;font-size: 15px;font-weight: 400;'>详情查看>></a></span></div>
                </div>
            </li>
            <li class='index-list'   style="padding-bottom:15px;width: 190px;">
                <img src="http://image.52drivecar.com/jp_imges/sch1.jpg" style="height:113px;width:190px;border: 1px solid #ddd;"/>
                <div class="index-defult" style="color:#fff;position: relative;top:-30px;background: url('<?= base_url() ?>application/images/alpha50.png');width:130px;line-height:30px;text-align: center;">
                    大学生驾培
                </div>
                <div class="index-hover"  style="padding:5px;color:#fff;display:none;position: relative;top:0px;background: url('<?= base_url() ?>application/images/alpha50.png');line-height:27px;height:60px;width:190px;">
                    <div>南湖驾校</div>
                    <div style='color:#FEF62F;font-weight: bold;'>￥3500<span class='am-fr'><a style='color:#D7E7F7;font-size: 15px;font-weight: 400;'>详情查看>></a></span></div>
                </div>
            </li>

        </ul>
    </div>
</div>
<div class="index-coach" style="height: 260px;">
    <div style="width:172px;height:243px;float:left;margin: -1px;">
        <div style="width:172px;height:243px;float:left;margin: -1px;">
            <img src="http://image.52drivecar.com/coa_root.jpg" style="height:242px;width:169px;"/>
            <!--            <div style="color:#fff;position: relative;top:-258px;background:#F7AF02;width:100px;line-height:40px;text-align: center;">
                            官方推荐
                        </div>-->
            <div style="color:#fff;position: relative;top:-40px;background:#7DB351;width:169px;line-height:40px;text-align: center;">
                金牌驾培 全心为您
            </div>
        </div>
    </div>
    <div style="width:828px;height:260px;float:left;margin-top: -1px;margin-bottom: -1px;padding-left: 15px;">
        <ul class="index-con-ul">
            <li class='index-list' style="padding-bottom:15px;padding-right: 15px;">
                <img src="http://ww4.sinaimg.cn/bmiddle/6252dd6dgw1eth8x9of6uj20dw0af74y.jpg" style="height:113px;width:190px;border: 1px solid #ddd;"/>
                <div class="index-defult" style="color:#fff;position: relative;top:-30px;right:-90px;background: url('<?= base_url() ?>application/images/alpha50.png');width:100px;line-height:30px;text-align: center;">
                    张晓雪
                </div>
                <div class="index-hover"  style="padding:5px;color:#fff;display:none;position: relative;top:0px;background: url('<?= base_url() ?>application/images/alpha50.png');line-height:27px;height:60px;width:190px;">
                    <div>张晓雪</div>
                    <div style='font-weight: bold;color: #FEF1BD;'>南湖驾校<span class='am-fr'><a style='color:#D7E7F7;font-size: 15px;font-weight: 400;'>详情查看>></a></span></div>
                </div>
            </li>
            <li class='index-list' style="padding-bottom:15px;padding-right: 15px;">
                <img src="http://ww4.sinaimg.cn/bmiddle/6252dd6dgw1eth8x9of6uj20dw0af74y.jpg" style="height:113px;width:190px;border: 1px solid #ddd;"/>
                <div class="index-defult" style="color:#fff;position: relative;top:-30px;right:-90px;background: url('<?= base_url() ?>application/images/alpha50.png');width:100px;line-height:30px;text-align: center;">
                    张晓雪
                </div>
                <div class="index-hover"  style="padding:5px;color:#fff;display:none;position: relative;top:0px;background: url('<?= base_url() ?>application/images/alpha50.png');line-height:27px;height:60px;width:190px;">
                    <div>张晓雪</div>
                    <div style='font-weight: bold;color: #FEF1BD;'>南湖驾校<span class='am-fr'><a style='color:#D7E7F7;font-size: 15px;font-weight: 400;'>详情查看>></a></span></div>
                </div>
            </li>
            <li class='index-list' style="padding-bottom:15px;padding-right: 15px;">
                <img src="http://ww4.sinaimg.cn/bmiddle/6252dd6dgw1eth8x9of6uj20dw0af74y.jpg" style="height:113px;width:190px;border: 1px solid #ddd;"/>
                <div class="index-defult" style="color:#fff;position: relative;top:-30px;right:-90px;background: url('<?= base_url() ?>application/images/alpha50.png');width:100px;line-height:30px;text-align: center;">
                    张晓雪
                </div>
                <div class="index-hover"  style="padding:5px;color:#fff;display:none;position: relative;top:0px;background: url('<?= base_url() ?>application/images/alpha50.png');line-height:27px;height:60px;width:190px;">
                    <div>张晓雪</div>
                    <div style='font-weight: bold;color: #FEF1BD;'>南湖驾校<span class='am-fr'><a style='color:#D7E7F7;font-size: 15px;font-weight: 400;'>详情查看>></a></span></div>
                </div>
            </li>
            <li class='index-list' style="padding-bottom:15px;width:190px;">
                <img src="http://ww4.sinaimg.cn/bmiddle/6252dd6dgw1eth8x9of6uj20dw0af74y.jpg" style="height:113px;width:190px;border: 1px solid #ddd;"/>
                <div class="index-defult" style="color:#fff;position: relative;top:-30px;right:-90px;background: url('<?= base_url() ?>application/images/alpha50.png');width:100px;line-height:30px;text-align: center;">
                    张晓雪
                </div>
                <div class="index-hover"  style="padding:5px;color:#fff;display:none;position: relative;top:0px;background: url('<?= base_url() ?>application/images/alpha50.png');line-height:27px;height:60px;width:190px;">
                    <div>张晓雪</div>
                    <div style='font-weight: bold;color: #FEF1BD;'>南湖驾校<span class='am-fr'><a style='color:#D7E7F7;font-size: 15px;font-weight: 400;'>详情查看>></a></span></div>
                </div>
            </li>
            <li class='index-list' style="padding-bottom:15px;padding-right: 15px;">
                <img src="http://ww4.sinaimg.cn/bmiddle/6252dd6dgw1eth8x9of6uj20dw0af74y.jpg" style="height:113px;width:190px;border: 1px solid #ddd;"/>
                <div class="index-defult" style="color:#fff;position: relative;top:-30px;right:-90px;background: url('<?= base_url() ?>application/images/alpha50.png');width:100px;line-height:30px;text-align: center;">
                    张晓雪
                </div>
                <div class="index-hover"  style="padding:5px;color:#fff;display:none;position: relative;top:0px;background: url('<?= base_url() ?>application/images/alpha50.png');line-height:27px;height:60px;width:190px;">
                    <div>张晓雪</div>
                    <div style='font-weight: bold;color: #FEF1BD;'>南湖驾校<span class='am-fr'><a style='color:#D7E7F7;font-size: 15px;font-weight: 400;'>详情查看>></a></span></div>
                </div>
            </li>
            <li class='index-list' style="padding-bottom:15px;padding-right: 15px;">
                <img src="http://ww4.sinaimg.cn/bmiddle/6252dd6dgw1eth8x9of6uj20dw0af74y.jpg" style="height:113px;width:190px;border: 1px solid #ddd;"/>
                <div class="index-defult" style="color:#fff;position: relative;top:-30px;right:-90px;background: url('<?= base_url() ?>application/images/alpha50.png');width:100px;line-height:30px;text-align: center;">
                    张晓雪
                </div>
                <div class="index-hover"  style="padding:5px;color:#fff;display:none;position: relative;top:0px;background: url('<?= base_url() ?>application/images/alpha50.png');line-height:27px;height:60px;width:190px;">
                    <div>张晓雪</div>
                    <div style='font-weight: bold;color: #FEF1BD;'>南湖驾校<span class='am-fr'><a style='color:#D7E7F7;font-size: 15px;font-weight: 400;'>详情查看>></a></span></div>
                </div>
            </li>
            <li class='index-list' style="padding-bottom:15px;padding-right: 15px;">
                <img src="http://ww4.sinaimg.cn/bmiddle/6252dd6dgw1eth8x9of6uj20dw0af74y.jpg" style="height:113px;width:190px;border: 1px solid #ddd;"/>
                <div class="index-defult" style="color:#fff;position: relative;top:-30px;right:-90px;background: url('<?= base_url() ?>application/images/alpha50.png');width:100px;line-height:30px;text-align: center;">
                    张晓雪
                </div>
                <div class="index-hover"  style="padding:5px;color:#fff;display:none;position: relative;top:0px;background: url('<?= base_url() ?>application/images/alpha50.png');line-height:27px;height:60px;width:190px;">
                    <div>张晓雪</div>
                    <div style='font-weight: bold;color: #FEF1BD;'>南湖驾校<span class='am-fr'><a style='color:#D7E7F7;font-size: 15px;font-weight: 400;'>详情查看>></a></span></div>
                </div>
            </li>
             <li class='index-list' style="padding-bottom:15px;width:190px;">
                <img src="http://ww4.sinaimg.cn/bmiddle/6252dd6dgw1eth8x9of6uj20dw0af74y.jpg" style="height:113px;width:190px;border: 1px solid #ddd;"/>
                <div class="index-defult" style="color:#fff;position: relative;top:-30px;right:-90px;background: url('<?= base_url() ?>application/images/alpha50.png');width:100px;line-height:30px;text-align: center;">
                    张晓雪
                </div>
                <div class="index-hover"  style="padding:5px;color:#fff;display:none;position: relative;top:0px;background: url('<?= base_url() ?>application/images/alpha50.png');line-height:27px;height:60px;width:190px;">
                    <div>张晓雪</div>
                    <div style='font-weight: bold;color: #FEF1BD;'>南湖驾校<span class='am-fr'><a style='color:#D7E7F7;font-size: 15px;font-weight: 400;'>详情查看>></a></span></div>
                </div>
            </li>
            


        </ul>
    </div>
</div>

<script>
    var i = 0;
    $('.ck-slide').ckSlide({
        dir: 'x'
    });
    window.setInterval(function () {
        $('.ck-next').click();
    }, 5000);

    $('.index-list').live('mouseover', function () {

        $(this).children('.index-defult').css('display', 'none');
        $(this).children('.index-hover').css('display', 'block');
        $(this).children('.index-hover').animate({top: '-60px'}, 200);

    });
    $('.index-list').live('mouseleave', function () {
        var this_list = $(this);
        this_list.children('.index-hover').animate({top: '-15px'}, 1, function () {
            this_list.children('.index-hover').css('display', 'none');
            this_list.children('.index-defult').css('display', 'block');
        });



//        $(this).children('.index-hover').css('display', 'none');

    });
    $('#index-right ul li').live('mouseover', function () {
        $(this).children('div').animate({left: '125px'}, 100);
    });
    $('#index-right ul li').live('mouseleave', function () {
        $(this).children('div').animate({left: '120px'}, 100);
    });
</script>