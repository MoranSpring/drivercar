<style>
        .am-page {
            position: relative;
            height: 100%;
            width: 100%;
            overflow: hidden;
        }
        #mobile-index {
            -webkit-transform: translate(0%,0);
            -ms-transform: translate(0%,0);
            transform: translate(0%,0);
            -webkit-transition: all .3s ease-in-out;
            transition: all .3s ease-in-out;
        }
        #demo-list-page {
            position: absolute;
            top: 0;
            left: 0;
            background-color: #FFF;
            -webkit-transition: all .3s ease-in-out;
            transition: all .3s ease-in-out;
            -webkit-transform: translate(100%,0);
            -ms-transform: translate(100%,0);
            transform: translate(100%,0);
        }
        .demo-list-active #mobile-index {
            -webkit-transform: translate(-100%,0);
            -ms-transform: translate(-100%,0);
            transform: translate(-100%,0);
        }
        .demo-list-active #demo-list-page {
            display: block;
            -webkit-transform: translate(0%,0);
            -ms-transform: translate(0%,0);
            transform: translate(0%,0);
        }
    </style>
<body>
    <div class="am-page" id="mobile-index"> 
        <header data-am-widget="header" class="am-header am-header-default">
        <div class="am-header-left am-header-nav" >
            <a href="#left-link" class="" >
                <i class="am-header-icon am-icon-home am-icon">&nbsp</i>
            </a>
        </div>
        <h1 class="am-header-title">
            <a href="#title-link" class="">驾培点</a>
        </h1>
    </header>
        <div class="am-text-lg am-padding-xs" style="background:#ccc;border-bottom: 1px solid #ccc;">
            武汉市<label class="am-btn-success am-btn am-btn-xs" style="float:right;">更换</label>
        </div>
        <div id="widget-list"> 
            <ul class="am-list">
                <li class="am-padding-top-xs am-padding-bottom-xs">
                    <div  onclick="test();" class="am-g">
                        <div class="am-u-sm-3  am-u-md-3" style="padding:3px;">
                            <img class="am-img am-img-thumbnail" src="http://android-wallpapers.25pp.com/20140404/1630/533e6da6023b320_900x675.jpg" height="100%"/>
                        </div>
                        <div class="am-u-sm-8 am-u-md-8" style="font-size: 0.8em">
                            <div class="am-text-lg">
                                华科大驾校
                            </div>
                            <div>
                                口碑：好，有111人点评
                            </div>
                            <div>
                              武汉市>洪山区>华中科技大学内
                            </div>
                        </div>
                        <div class="am-u-sm-1 am-u-md-1" style="padding: 0;">
                            <span class="am-icon-angle-right am-text-center" style="height:67px;line-height:67px;font-size:67px;color:#ccc;">&nbsp;</span>
                        </div>
                    </div>
                </li>
            </ul></div></div>
               
    
    <!-------------------------------------------第二个页面分分割线-------------------------------------------->
    
    
    <div class="am-page" id="demo-list-page" style="display: none;">
        <header data-am-widget="header" class="am-header am-header-default">
        <div class="am-header-left am-header-nav">
            <a onclick="back();">
                <img class="am-header-icon-custom" src="data:image/svg+xml;charset=utf-8,&lt;svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 12 20&quot;&gt;&lt;path d=&quot;M10,0l2,2l-8,8l8,8l-2,2L0,10L10,0z&quot; fill=&quot;%23fff&quot;/&gt;&lt;/svg&gt;"
                     alt="" />&nbsp;
            </a>
        </div>
        <h1 class="am-header-title">
            订单详情
        </h1>
    </header>
        <div id="demo-list">
            <div id="demo-scroller" style="transition: 0ms cubic-bezier(0.1, 0.57, 0.1, 1); -webkit-transition: 0ms cubic-bezier(0.1, 0.57, 0.1, 1); transform: translate(0px, 0px) translateZ(0px);">
                <ul class="am-list widget-list">
                    <li><a href="/widgets/accordion/default/0">default (圆角灰边)</a></li>
                    <li><a href="/widgets/accordion/basic/0">basic (极简无边框)</a></li>  
                    <li><a href="/widgets/accordion/gapped/0">gapped (扁平分离边框)</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <script>
        function test() {
            $('#demo-list-page').css('display', 'block');
            setTimeout(function(){$('body').addClass('demo-list-active');},1);
     
        }
        function back() {
            $('body').removeClass('demo-list-active');
            setTimeout(function(){$('#demo-list-page').css('display', 'none');},300);

        }
    </script>
</body>

