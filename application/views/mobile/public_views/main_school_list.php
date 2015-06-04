<div class="am-page" id="mobile-index"> 
    <header data-am-widget="header" class="am-header am-header-default">
        <div class="am-header-left am-header-nav" >
            <a href="javascript:history.back();">
                <img class="am-header-icon-custom" src="data:image/svg+xml;charset=utf-8,&lt;svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 12 20&quot;&gt;&lt;path d=&quot;M10,0l2,2l-8,8l8,8l-2,2L0,10L10,0z&quot; fill=&quot;%23fff&quot;/&gt;&lt;/svg&gt;"
                     alt="" />&nbsp;
            </a>
        </div>
        <h1 class="am-header-title">
            <a href="#title-link" class="">驾培点查询</a>
        </h1>
    </header>
    <div class="am-text-lg am-padding-xs" style="background:#ccc;border-bottom: 1px solid #ccc;">
        武汉市<label class="am-btn-success am-btn am-btn-xs" style="float:right;">更换</label>
    </div>
    <div id="widget-list"> 
        <ul class="am-list">
        </ul>
    </div>
</div>
<script>
    var ip = '<?=$ip?>';
    alert(ip);
    var url = "http://ip.taobao.com/service/getIpInfo.php?ip=" + ip;
    $.getJSON(url, function (json) {
        var myprovince2 = json.data.area;
        var mycity2 = json.data.region;
        alert("您所在的城市是：" + myprovince2 + mycity2);
    });

</script>