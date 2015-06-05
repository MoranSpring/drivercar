<header data-am-widget="header" class="am-header am-header-default ml-color-bg-main">
    <div class="am-header-left am-header-nav" >
        <a href="javascript:history.back()">
            <img class="am-header-icon-custom" src="data:image/svg+xml;charset=utf-8,&lt;svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 12 20&quot;&gt;&lt;path d=&quot;M10,0l2,2l-8,8l8,8l-2,2L0,10L10,0z&quot; fill=&quot;%23fff&quot;/&gt;&lt;/svg&gt;"
                 alt="" />&nbsp;
        </a>
    </div>
    <h1 class="am-header-title">
        <a href="#title-link" class="">培训点详情</a>
    </h1>
</header>
<?= $menu ?>
<div  style='max-height: 150px;overflow: hidden'>
    <div style="top:0;height:150px;width:100%;position: relative;z-index: -10;overflow: hidden;" >
        <img src="http://img.juimg.com/tuku/yulantu/140107/328161-14010G9202266.jpg" width="100%" style="">
    </div>
    <div style="position:relative;top:-150px; width:100%;height:150px;overflow:hidden;">
        <div class="am-padding-top-sm">
            <div class="" style="padding:0;">
                <div  style="margin-top:12px;margin-bottom: 12px;min-heght:76px;position:relative;line-height:76px;z-index: -1;background: #000;filter:alpha(opacity=50);-moz-opacity:0.5;-khtml-opacity: 0.5;opacity: 0.5; ">
                    &nbsp;
                </div>
                <div  style="color:#fff;top:-85px;heght:75px;position:relative;" class='am-text-center'>
                    <div class="clearfix">
                        <span class="ml-color-title"  style="font-size: 1.5em;"><?=$jp_name?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class='am-margin-top-sm'>
    <section class="am-panel am-panel-default" style='border-color:#ddd;'>
        <header class="am-panel-hd" style='background: #fff'>
            <div class="clearfix">
                <span style='float:left'>培训点简介</span>
                <a class="ml-level-star-5">&nbsp;&nbsp;&nbsp;<span  class="am-icon-star">&nbsp;</span><span class="am-icon-star">&nbsp;</span><span class="am-icon-star">&nbsp;</span><span class="am-icon-star">&nbsp;</span></a><br/>
            </div>
        </header>
        <div class="am-panel-bd" style='padding:0; color:#888;'>

            <div class='am-g'>
                <div class='am-u-sm-4 am-u-md-3 am-text-right' style='padding:0;'>
                    <span style='display: block;line-height:30px; '>学车价格：</span>
                    <span style='display: block;line-height:30px; '>驾校地址：</span>
                    <span style='display: block;line-height:30px; '>联系电话：</span>
                    <span style='display: block;line-height:30px; '>培训人数：</span>
                    <span style='display: block;line-height:30px; '>本月培训：</span>

                </div>
                <div class='am-u-sm-5 am-u-md-6 am-text-left'  style='padding:0;'>
                    <span class="ml-color-currency" style='display: block;line-height:30px;font-weight: bold;font-size: 1.4em;'>3400</span>
                    <a class="ml-color-a" href="<?= base_url() ?>index.php/mobile/map_sch_pos#<?=$jp_id?>"><span class='am-icon-map-marker' style='line-height:30px;text-decoration: underline;text-overflow:ellipsis;width:100%;overflow:hidden;display:block;white-space:nowrap; '><?=$jp_detail_addr?></span></a>
                    <span style='display: block;line-height:30px; '><?=$jp_tel?></span>
                    <span style='display: block;line-height:30px; '>1234</span>
                    <span style='display: block;line-height:30px; '>45</span>
                </div>
                <div class='am-u-sm-3 am-u-md-3 am-text-center' style='padding: 0;border-left: 1px dashed #ddd;'>
                    <div class='clearfix'  style='border-bottom: 1px dashed #ddd;'>
                        <a href='tel:<?=$jp_tel?>'>
                            <span  class='am-icon-phone am-text-center' style='height:75px;line-height: 75px;font-size: 35px;color:#009cda;'>&nbsp;</span>
                        </a></div>
                    <div  class='clearfix'  style='font-size: 35px;'>
                        <a href='tel:15071078963'>
                            <span class='am-icon-users  am-text-center' title="教练团队" style='height:75px;line-height: 75px;font-size: 35px;color:#aab;'>&nbsp;</span></a>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <section class="am-panel am-panel-default"  style='border-color:#ddd;'>
        <header class="am-panel-hd" style='background: #fff'>
            <div class="clearfix">
                <span>详细信息</span>
            </div>
        </header>
        <div class="am-panel-bd" style='padding:0; color:#888;'>
            <div class="am-margin">
                <div data-am-widget="slider" class="am-slider am-margin-sm am-slider-a1" data-am-slider='{&quot;directionNav&quot;:false}'>
                    <ul class="am-slides">
                        <li>
                            <img src="http://7jpqbr.com1.z0.glb.clouddn.com/bing-1.jpg">
                        </li>
                        <li>
                            <img src="http://7jpqbr.com1.z0.glb.clouddn.com/bing-2.jpg">
                        </li>
                        <li>
                            <img src="http://7jpqbr.com1.z0.glb.clouddn.com/bing-3.jpg">
                        </li>
                        <li>
                            <img src="http://7jpqbr.com1.z0.glb.clouddn.com/bing-4.jpg">
                        </li>
                    </ul>
                </div>
                <?=$jp_intro?>
           </div>

        </div>
    </section>
    <section class="am-panel am-panel-default"  style='border-color:#ddd;'>
        <header class="am-panel-hd" style='background: #fff'>
            <div class="clearfix">
                <span>地址/路线</span>
            </div>
        </header>
        <div class="am-panel-bd clearfix" style='color:#888;'>
            乘坐122，123路公交车，在茶山路下车步行三十米<br/>
            乘坐地铁在光谷c出口出门走100米即到<br/>
            <a class="ml-color-a" href="<?= base_url() ?>index.php/mobile/map_sch_pos#<?=$jp_id?>" style="float:right;">地图详情>></a> 
        </div>
    </section>
    <section class="am-panel am-panel-default"  style='border-color:#ddd;'>
        <header class="am-panel-hd" style='background: #fff'>
            <div class="clearfix">
                <span>特色服务</span>
            </div>
        </header>
        <div class="am-panel-bd" style='padding:0; color:#888;'>
            乘坐122，123路公交车，在茶山路下车步行三十米<br/>
            乘坐地铁在光谷c出口出门走100米即到<br/>
        </div>
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
                            <span class='am-text-center' style='color:#e00;'>4.9分</span>
                        </a></div>
                    <div>有8000人点评&nbsp;&nbsp;&nbsp;<a href="" style='color:#999;float:right;'>详情>></a></div>

                </div>

            </div>
        </div>
    </div>

</div>

