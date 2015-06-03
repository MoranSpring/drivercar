<script type="text/javascript" src="http://api.map.baidu.com/api?type=quick&ak=RbYDrD0LPcQqzZTo21PFZ6kR&v=1.0"></script>
<header data-am-widget="header" class="am-header am-header-default">
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
<div style='padding: 0;margin: 0;'>
    <div id="allmap"style='width:100%;height:100%'></div>
</div>
<script>
//    var map = new BMap.Map("allmap");
//    map.centerAndZoom(new BMap.Point(116.384, 39.925), 14);
//
//    map.addControl(new BMap.ZoomControl());  //添加地图缩放控件
//    map.addControl(new BMap.ScaleControl()); // 添加比例尺控件
//    var marker1 = new BMap.Marker(new BMap.Point(116.384, 39.925));  //创建标注
//    map.addOverlay(marker1);                 // 将标注添加到地图中
//    //创建信息窗口
//    var infoWindow1 = new BMap.InfoWindow("普通标注");
//    marker1.addEventListener("click", function () {
//        this.openInfoWindow(infoWindow1);
//    });
        $(function () {
        $.ajax({
            type: "POST",
            dataType: "text",
            url: "<?= base_url() ?>index.php/first/get_school_info",
            async: true,
            data: {city: 1027},
            success: function (data) {
                var json = eval("(" + data + ")");
                refrashMap(json.info);
                $('.con2-ul').html(json.list);

            }});
    });
    function refrashMap(json) {

        var map = new BMap.Map("allmap");
        map.centerAndZoom();
//        map.enableScrollWheelZoom();
        var pointArray = new Array();
        var markerArray = new Array();
        for (var i = 0; i < json.length; i++) {
            pointArray[i] = new BMap.Point(json[i].jp_gps_latitude, json[i].jp_gps_longitude);
            markerArray[i] = new BMap.Marker(pointArray[i]);
            markerArray[i].index = i;
            map.addOverlay(markerArray[i]);
            markerArray[i].addEventListener("click", function () {
                this.openInfoWindow(new BMap.InfoWindow(
                        "<div style='width:200px;'>\n\
                <ul class='clearfix' style='margin:0;padding:0;line-height:1.5em;font-size:1em;'> <li style='line-height:1.5em;font-size:0.8em;float:left;width:100%;'>\n\
            <b>地址:</b>" + json[this.index].jp_detail_addr + "<br/>\n\
            <b>电话:</b>" + json[this.index].jp_tel + "<br/>\n\
            <b>评价:</b><img src='http://cdn2.iconfinder.com/data/icons/diagona/icon/16/031.png' /><br/>\n\
            </li></ul></div>"
                        , {title: "<span style='color:#FFF'>" + json[this.index].jp_name + "</span><a href='http://www.baidu.com/' style='text-decoration:none;color:#2679BA;float:right;text-align:right;'>详情&gt;&gt;</a>"}));
            });
            markerArray[i].addEventListener("click", function () {
//                alert(this.index);
            });
        }
        map.setViewport(pointArray);

    }
</script>

