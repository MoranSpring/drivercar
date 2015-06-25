<style>
    .ck-slide { width: 600px; height: 330px;}
    .ck-slide ul.ck-slide-wrapper { height: 300px;}
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
    #index-left ul li a span:hover{
        background: #fff;
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
    #index-right ul li:hover{

    }
    .index-coach{
        width:1000px;
        margin-top: 20px;
        margin-left: auto;
        margin-right: auto;
    }
    .index-con-ul li{
        list-style: none;
        float:left;
        width:207px;
        height:130px;
        margin-right: -1px;
        margin-bottom: -1px;
        overflow: hidden;
        border:1px solid #ccc;
    }
</style>
<link rel="stylesheet" href="<?= base_url() ?>application/css/slide.css">
<script src="<?= base_url() ?>application/js/slide.js"></script>

<div id="content" class="clearfix">
    <div id="index-left">
        <ul>
            <li><a href="<?= base_url() . 'index.php/first/sch_info' ?>"><span style="background: #666;color: #fff;">特色服务</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/pos_info' ?>"><span style="background: #aaa;color: #fff;">培训点信息</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/ser_info' ?>"><span style="background: #aaa;color: #fff;">服务指南</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/coach_info' ?>"><span style="background: #aaa;color: #fff;">教练信息</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/sch_info' ?>"><span style="background: #666;color: #fff;">特色服务</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/sch_info' ?>"><span style="background: #aaa;color: #fff;">教学大纲</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/sch_info' ?>"><span style="background: #aaa;color: #fff;">教学大纲</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/sch_info' ?>"><span style="background: #aaa;color: #fff;">教学大纲</span></a></li>

        </ul>
    </div>
    <div id="index-middle" style="background: #f0f0f0;">
        <div class="ck-slide">
            <ul class="ck-slide-wrapper">
                <li>
                    <a href=""><img src="<?= base_url() ?>application/images/schimg.png"  alt=""></a>
                </li>
                <li style="display:none">
                    <a href=""><img src="<?= base_url() ?>application/images/schimg.png"   alt=""></a>
                </li>
                <li style="display:none">
                    <a href="javascript:"><img src="<?= base_url() ?>application/images/schimg.png" alt=""></a>
                </li>
                <li style="display:none">
                    <a href="javascript:"><img src="<?= base_url() ?>application/images/schimg.png" alt=""></a>
                </li>
                <li style="display:none">
                    <a href="javascript:"><img src="<?= base_url() ?>application/images/schimg.png" alt=""></a>
                </li>
            </ul>
            <a href="javascript:;" class="ctrl-slide ck-prev">上一张</a>
            <a href="javascript:;" class="ctrl-slide ck-next">下一张</a>
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

    </div>
    <div id="index-right">
        <ul>
            <li>
                <p style="padding-left: 5px;font-weight: bold;color:#666;font-size: 18px;"> 教练预约</p>
                <p style="padding-left: 5px;color:#aaa;font-size: 12px;">提前预约 拒绝等待</p>
                <div class="" style="position: relative;bottom:15px;;right:0px;left:120px;;width:70px;">
                    <img src="<?= base_url() ?>application/images/calendar.jpg" height="70" width="71"/>
                </div>
            </li>
            <li>
                <p style="padding-left: 5px;font-weight: bold;color:#666;font-size: 18px;"> 教练预约</p>
                <p style="padding-left: 5px;color:#aaa;font-size: 12px;">提前预约 拒绝等待</p>
                <div class="" style="position: relative;bottom:15px;right:0px;left:120px;width:70px;">
                    <img src="<?= base_url() ?>application/images/calendar.jpg" height="70" width="71"/>
                </div>
            </li>
            <li>
                <p style="padding-left: 5px;font-weight: bold;color:#666;font-size: 18px;"> 教练预约</p>
                <p style="padding-left: 5px;color:#aaa;font-size: 12px;">提前预约 拒绝等待</p>
                <div class="" style="position: relative;bottom:15px;right:0px;left: 120px;width:70px;">
                    <img src="<?= base_url() ?>application/images/calendar.jpg" height="70" width="71"/>

                </div>
            </li>
        </ul>
    </div>
</div>
<div class="index-coach" style="height: 260px;">
    <div style="width:172px;height:260px;float:left;">
        <img src="<?= base_url() ?>application/images/school.png" style="height:259px;"/>
        <div style="color:#fff;position: relative;top:-259px;background: url('<?= base_url() ?>application/images/alpha50.png');width:100px;line-height:40px;text-align: center;">
            官方推荐
        </div>
        <div style="color:#fff;position: relative;top:-80px;background: url('<?= base_url() ?>application/images/alpha50.png');width:169px;line-height:40px;text-align: center;">
            金牌驾培 全心为您
        </div>
    </div>
    <div style="width:828px;height:260px;float:left;margin-top: -1px;margin-bottom: -1px;">
        <ul class="index-con-ul">
            <li class='index-list'>
                <img src="<?= base_url() ?>application/images/test-list.png" style="height:128px;width:205px;"/>
                <div class="index-defult" style="color:#fff;position: relative;top:-30px;background: url('<?= base_url() ?>application/images/alpha50.png');width:130px;line-height:30px;text-align: center;">
                    南湖驾校
                </div>
                <div class="index-hover"  style="color:#fff;display:none;position: relative;top:0px;background: url('<?= base_url() ?>application/images/alpha50.png');line-height:29px;height:60px;">
                    <div>南湖驾校</div>
                    <div style='color:#F00;font-weight: bold;'>￥3500<span class='am-fr'><a style='color:#1fed62;'>详情查看>></a></span></div>
                </div>
            </li>
            <li class='index-list'>
                <img src="<?= base_url() ?>application/images/test-list.png" style="height:128px;width:205px;"/>
                <div class="index-defult" style="color:#fff;position: relative;top:-30px;background: url('<?= base_url() ?>application/images/alpha50.png');width:130px;line-height:30px;text-align: center;">
                    南湖驾校
                </div>
                <div class="index-hover"  style="color:#fff;display:none;position: relative;top:0px;background: url('<?= base_url() ?>application/images/alpha50.png');line-height:29px;height:60px;">
                    <div>南湖驾校</div>
                    <div style='color:#F00;font-weight: bold;'>￥3500<span class='am-fr'><a style='color:#1fed62;'>详情查看>></a></span></div>
                </div>
            </li>
            <li class='index-list'>
                <img src="<?= base_url() ?>application/images/test-list.png" style="height:128px;width:205px;"/>
                <div class="index-defult" style="color:#fff;position: relative;top:-30px;background: url('<?= base_url() ?>application/images/alpha50.png');width:130px;line-height:30px;text-align: center;">
                    南湖驾校
                </div>
                <div class="index-hover"  style="color:#fff;display:none;position: relative;top:0px;background: url('<?= base_url() ?>application/images/alpha50.png');line-height:29px;height:60px;">
                    <div>南湖驾校</div>
                    <div style='color:#F00;font-weight: bold;'>￥3500<span class='am-fr'><a style='color:#1fed62;'>详情查看>></a></span></div>
                </div>
            </li>
            <li class='index-list'>
                <img src="<?= base_url() ?>application/images/test-list.png" style="height:128px;width:205px;"/>
                <div class="index-defult" style="color:#fff;position: relative;top:-30px;background: url('<?= base_url() ?>application/images/alpha50.png');width:130px;line-height:30px;text-align: center;">
                    南湖驾校
                </div>
                <div class="index-hover"  style="color:#fff;display:none;position: relative;top:0px;background: url('<?= base_url() ?>application/images/alpha50.png');line-height:29px;height:60px;">
                    <div>南湖驾校</div>
                    <div style='color:#F00;font-weight: bold;'>￥3500<span class='am-fr'><a style='color:#1fed62;'>详情查看>></a></span></div>
                </div>
            </li>
            <li class='index-list'>
                <img src="<?= base_url() ?>application/images/test-list.png" style="height:128px;width:205px;"/>
                <div class="index-defult" style="color:#fff;position: relative;top:-30px;background: url('<?= base_url() ?>application/images/alpha50.png');width:130px;line-height:30px;text-align: center;">
                    南湖驾校
                </div>
                <div class="index-hover"  style="color:#fff;display:none;position: relative;top:0px;background: url('<?= base_url() ?>application/images/alpha50.png');line-height:29px;height:60px;">
                    <div>南湖驾校</div>
                    <div style='color:#F00;font-weight: bold;'>￥3500<span class='am-fr'><a style='color:#1fed62;'>详情查看>></a></span></div>
                </div>
            </li>
            <li class='index-list'>
                <img src="<?= base_url() ?>application/images/test-list.png" style="height:128px;width:205px;"/>
                <div class="index-defult" style="color:#fff;position: relative;top:-30px;background: url('<?= base_url() ?>application/images/alpha50.png');width:130px;line-height:30px;text-align: center;">
                    南湖驾校
                </div>
                <div class="index-hover"  style="color:#fff;display:none;position: relative;top:0px;background: url('<?= base_url() ?>application/images/alpha50.png');line-height:29px;height:60px;">
                    <div>南湖驾校</div>
                    <div style='color:#F00;font-weight: bold;'>￥3500<span class='am-fr'><a style='color:#1fed62;'>详情查看>></a></span></div>
                </div>
            </li>
            <li class='index-list'>
                <img src="<?= base_url() ?>application/images/test-list.png" style="height:128px;width:205px;"/>
                <div class="index-defult" style="color:#fff;position: relative;top:-30px;background: url('<?= base_url() ?>application/images/alpha50.png');width:130px;line-height:30px;text-align: center;">
                    南湖驾校
                </div>
                <div class="index-hover"  style="color:#fff;display:none;position: relative;top:0px;background: url('<?= base_url() ?>application/images/alpha50.png');line-height:29px;height:60px;">
                    <div>南湖驾校</div>
                    <div style='color:#F00;font-weight: bold;'>￥3500<span class='am-fr'><a style='color:#1fed62;'>详情查看>></a></span></div>
                </div>
            </li>
            <li class='index-list'>
                <img src="<?= base_url() ?>application/images/test-list.png" style="height:128px;width:205px;"/>
                <div class="index-defult" style="color:#fff;position: relative;top:-30px;background: url('<?= base_url() ?>application/images/alpha50.png');width:130px;line-height:30px;text-align: center;">
                    南湖驾校
                </div>
                <div class="index-hover"  style="color:#fff;display:none;position: relative;top:0px;background: url('<?= base_url() ?>application/images/alpha50.png');line-height:29px;height:60px;">
                    <div>南湖驾校</div>
                    <div style='color:#F00;font-weight: bold;'>￥3500<span class='am-fr'><a style='color:#1fed62;'>详情查看>></a></span></div>
                </div>
            </li>



        </ul>
    </div>
</div>
<div class="index-coach" style="height: 260px;">
    <div style="width:172px;height:260px;float:left;margin: -1px;">
        <div style="width:172px;height:260px;float:left;margin: -1px;">
            <img src="<?= base_url() ?>application/images/coach.png" style="height:258px;"/>
            <div style="color:#fff;position: relative;top:-258px;background: url('<?= base_url() ?>application/images/alpha50.png');width:100px;line-height:40px;text-align: center;">
                官方推荐
            </div>
            <div style="color:#fff;position: relative;top:-80px;background: url('<?= base_url() ?>application/images/alpha50.png');width:260px;line-height:40px;text-align: center;">
                金牌驾培 全心为您
            </div>
        </div>
    </div>
    <div style="width:828px;height:260px;float:left;margin-top: -1px;margin-bottom: -1px;">
        <ul class="index-con-ul">
            <li>aa</li>
            <li>aa</li>
            <li>aa</li>
            <li>aa</li>
            <li>aa</li>
            <li>aa</li>
            <li>aa</li>
            <li>aa</li>


        </ul>
    </div>
</div>

<script>
    var i = 0;
    $('.ck-slide').ckSlide({
        dir: 'x'
    });
    $('.index-list').live('mouseover', function () {

        $(this).children('.index-defult').css('display', 'none');
        $(this).children('.index-hover').css('display', 'block');
        $(this).children('.index-hover').animate({top: '-60px'},200);

    });
    $('.index-list').live('mouseleave', function () {
        var this_list=$(this);
        this_list.children('.index-hover').animate({top: '0px'},1,function(){
            this_list.children('.index-hover').css('display', 'none');
             this_list.children('.index-defult').css('display', 'block');
        });
        
        
//        $(this).children('.index-hover').css('display', 'none');

    });
</script>