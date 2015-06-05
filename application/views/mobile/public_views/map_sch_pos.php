<script type="text/javascript" src="http://api.map.baidu.com/api?type=quick&ak=RbYDrD0LPcQqzZTo21PFZ6kR&v=1.0"></script>
<header data-am-widget="header" class="am-header am-header-default ml-color-bg-main">
    <div class="am-header-left am-header-nav ml-ontouch">
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
<div style='padding: 0;margin: 0;'>
    <div id="allmap"style='width:100%;height:100%'></div>
</div>
<!----------------------加载提示框。。。。。--------------------------------->
<div class="loading am-modal am-modal-loading am-modal-no-btn" tabindex="-1" id="my-modal-loading">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">正在加载地图...</div>
        <div class="am-modal-bd">
            <span class="am-icon-spinner am-icon-spin"></span>
        </div>
    </div>
</div>
<script>
    $(function () {
        openModel();
        var histroy = window.document.location.href.split('#')[1];
        if (typeof (histroy) === 'string') {
            loadMap(histroy);
        } else {
            history.back();
        }

    });
    function loadMap(id) {
        $.ajax({
            type: "POST",
            dataType: "text",
            url: "<?= base_url() ?>index.php/mobile/get_map_info",
            async: true,
            data: {school_id: id},
            success: function (data) {
                var json = eval("(" + data + ")");
                refrashMap(json);
            }});
    }
    function refrashMap(json) {
        var map = new BMap.Map("allmap");
        var point = new BMap.Point(json.list.jp_gps_latitude, json.list.jp_gps_longitude);
        map.centerAndZoom(point, 15);
        map.addControl(new BMap.ZoomControl());
        var marker = new BMap.Marker(point);
        map.addOverlay(marker);
        var infoWindow = new BMap.InfoWindow(json.content, {title: "<span style='color:#FFF'>" + json.list.jp_name + "</span>"});
        marker.openInfoWindow(infoWindow);
        closeModel();
    }
    function openModel() {
        $('.loading').modal();
    }
    function closeModel() {
        $('.loading').modal('close');
    }
</script>

