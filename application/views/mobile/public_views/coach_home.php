<header data-am-widget="header" class="am-header am-header-default">
    <div class="am-header-left am-header-nav" >
        <a href="javascript:history.back()">
            <img class="am-header-icon-custom" src="data:image/svg+xml;charset=utf-8,&lt;svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 12 20&quot;&gt;&lt;path d=&quot;M10,0l2,2l-8,8l8,8l-2,2L0,10L10,0z&quot; fill=&quot;%23fff&quot;/&gt;&lt;/svg&gt;"
                 alt="" />&nbsp;
        </a>
    </div>
    <h1 class="am-header-title">
        <a href="#title-link" class="">教练详情</a>
    </h1>
</header>
<?= $menu ?>
<div  style='max-height: 150px;overflow: hidden'>
    <div style="top:0;height:150px;width:100%;position: relative;z-index: -10;overflow: hidden;" >
        <img src="http://img.juimg.com/tuku/yulantu/140107/328161-14010G9202266.jpg" width="100%" style="">
    </div>
    <div style="position:relative;top:-150px; width:100%;height:150px;overflow:hidden;">
        <div class="am-padding-top-sm">
            <div class="am-margin-left-sm" style="position:relative;">
                <img class="am-img am-circle" src="<?=$coach_face?>@!nail250" style="height:100px;width:100px;" />
            </div>
            <div class="am-margin-left-sm" style="padding:0;position:relative;top:-100px;">
                <div  style="margin-top:12px;margin-bottom: 12px;left:50px;min-heght:76px;position:relative;line-height:76px;z-index: -1;background: #000;filter:alpha(opacity=50);-moz-opacity:0.5;-khtml-opacity: 0.5;opacity: 0.5; ">
                    &nbsp;
                </div>
                <div style="color:#fff;top:-88px;;heght:75px;position:relative;padding-left: 100px;">
                    <div class="clearfix">
                        <span style="float:left;font-size: 1.5em;color:#d2ffca;"><?=$coach_name?></span>
                        <a  href="<?=base_url()?>index.php/mobile/school_home/<?=$coach_sch_id?>"><span class="am-icon-map-marker" style="text-decoration: underline;padding-right: 10px;float:right;height: 38px;;line-height: 38px;font-size: 1.1em;color:#fff">南湖驾校</span></a><br/>
                    </div>

                    <span style="font-size: 0.8em;color:#ccc;">个人签名：<?=$coach_intro?></span>
                </div>

            </div>

        </div>
    </div>
</div>
<div class='am-margin-top-sm'>
    <section class="am-panel am-panel-default" style='border-color:#ddd;'>
        <header class="am-panel-hd" style='background: #fff'>
            <div class="clearfix">
                <span style='float:left'><?=$coach_name?>教练</span>
                <a style="color:#f00;float:right;">累计评价：<span  class="am-icon-star">&nbsp;</span><span class="am-icon-star">&nbsp;</span><span class="am-icon-star">&nbsp;</span><span class="am-icon-star">&nbsp;</span></a><br/>
            </div>
        </header>
        <div class="am-panel-bd" style='padding:0; color:#888;'>

            <div class='am-g'>
                <div class='am-u-sm-4 am-u-md-4 am-text-right' style='padding:0;'>
                    <span>等级：</span><br/>
                    <span>所属驾培点：</span><br/>
                    <span>手机号码：</span><br/>
                    <span>培训类型：</span><br/>
                    <span>培训人数：</span><br/>
                    <span>本月培训：</span><br/>

                </div>
                <div class='am-u-sm-5 am-u-md-5 am-text-left' style="border-right: 1px dashed #ddd;">
                    <span> <?=$coach_grade?>级</span><br/>
                    <span><?=$sch_name?></span><br/>
                    <span><?=$coach_telnum?></span><br/>
                    <span>科目二/科目三</span><br/>
                    <span>45</span><br/>
                    <span>29人</span><br/>

                </div>
                <div class='am-u-sm-3 am-u-md-3 am-text-center' style='padding: 0;'>
                    <div class='clearfix'  style='border-bottom: 1px dashed #ddd;'>
                        <a href='tel:<?=$coach_telnum?>'>
                            <span  class='am-icon-phone am-text-center' style='height:75px;line-height: 75px;font-size: 35px;color:#009cda;'>&nbsp;</span>
                        </a></div>
                    <div  class='clearfix'  style='font-size: 35px;'>
                        <a href='tel:15071078963'>
                            <span class='am-icon-calendar  am-text-center'  style='height:75px;line-height: 75px;font-size: 35px;color:#aab;'>&nbsp;</span></a>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <section class="am-panel am-panel-default"  style='border-color:#ddd;'>
        <header class="am-panel-hd" style='background: #fff'>
            <div class="clearfix">
                <span>教练简介</span>
            </div>
        </header>
        <div class="am-panel-bd" style='padding:0; color:#888;'>
           <?=$coach_intro?>
    </section>
    <div class="am-panel am-panel-default">
        <div class="am-panel-bd" style='margin:0px;'>
            <div class='am-g' style='margin:0px;'>
                <div class='am-u-sm-4 am-u-md-4 am-text-center' style='margin:0px;padding:0px;''>
                    <div class='clearfix'  style='border-right: 1px dashed #00f0f0;'>
                        <a href='tel:15071078963' >
                            <span  class='am-icon-smile-o am-text-center' style='font-size: 50px;color:#009cda;'></span><br/>
                            <span class='am-text-center'>学员评价</span>
                        </a></div>
                </div>
                <div class='am-u-sm-8 am-u-md-8'>
                    <div class='clearfix'>
                        <a  href='tel:15071078963'>
                            <span  class='am-icon-trophy' style='font-size: 50px;color:#fbcb09;'></span>&nbsp;综合评分:
                            <span class='am-text-center' style='color:#e00;'> <?=$coach_history_score?></span>
                        </a></div>
                    <div>有8000人点评&nbsp;&nbsp;&nbsp;<a href="" style='color:#999;float:right;'>详情>></a></div>

                </div>

            </div>
        </div>
    </div>

</div>

