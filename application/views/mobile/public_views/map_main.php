<style type="text/css">
    body{
        margin:0;
        height:100%;
        width:100%;
        position:absolute;
    }
    #mapContainer{
        height: 100%;
        width:100%;

    }
    #tip{
        height:90px;
        background-color:#fff;
        padding-left:10px;
        padding-right:10px;
        position:absolute;
        font-size:12px;
        right:10px;
        bottom:20px;
        border-radius:3px;
        border:1px solid #ccc;
        line-height: 20px;
    }

    #tip>div:first-child{
        height:40px;
    }

    #tip input[type='button']{
        margin:10px;
        background-color: #0D9BF2;
        height:30px;
        text-align:center;
        line-height:30px;
        color:#fff;
        font-size:12px;
        border-radius:3px;
        outline: none;
        border:0;
    }
    #info{margin-top:5px;}
</style>
<script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=52916e73f2ec7e23db1640660042a912"></script>
<header data-am-widget="header" class="am-header am-header-default ml-color-bg-main">
    <div class="am-header-left am-header-nav ml-ontouch">
        <a href="javascript:history.back()">
            <img class="am-header-icon-custom" src="data:image/svg+xml;charset=utf-8,&lt;svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 12 20&quot;&gt;&lt;path d=&quot;M10,0l2,2l-8,8l8,8l-2,2L0,10L10,0z&quot; fill=&quot;%23fff&quot;/&gt;&lt;/svg&gt;"
                 alt="" />&nbsp;
        </a>
    </div>
    <h1 class="am-header-title">
        <a href="#title-link" class="">当前2位置</a>
    </h1>
</header>
<div id="mapContainer"></div>

<!----------------------加载提示框。。。。。--------------------------------->
<div class="loading am-modal am-modal-loading am-modal-no-btn" tabindex="-1" id="my-modal-loading">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">正在加载地图...</div>
        <div class="am-modal-bd">
            <span class="am-icon-spinner am-icon-spin"></span>
        </div>
    </div>
</div>



<script type="text/javascript">
    var toolBar, locationInfo;
    //初始化地图对象，加载地图
    map = new AMap.Map("mapContainer", {
        resizeEnable: true,
        zoom:14//设置地图缩放级别
    });
    map.plugin(["AMap.ToolBar"], function () {
        toolBar = new AMap.ToolBar(); //设置地位标记为自定义标记
        map.addControl(toolBar);
    });
    toolBar.doLocation();
</script>



