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
        border:1px solid #000;
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
    <div style="width:172px;height:260px;float:left;border:1px solid #000;margin: -1px;">
        aaa
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
<div class="index-coach" style="height: 260px;">
    <div style="width:172px;height:260px;float:left;border:1px solid #000;margin: -1px;">
        aaa
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
    $('.ck-slide').ckSlide({
        dir: 'x'
    });
</script>