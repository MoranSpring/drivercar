<div class="am-page" id="mobile-index"> 
    <header data-am-widget="header" class="am-header am-header-default ml-color-bg-main">
        <div class="am-header-left am-header-nav" >
            <a href="javascript:history.back();">
                <img class="am-header-icon-custom" src="data:image/svg+xml;charset=utf-8,&lt;svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 12 20&quot;&gt;&lt;path d=&quot;M10,0l2,2l-8,8l8,8l-2,2L0,10L10,0z&quot; fill=&quot;%23fff&quot;/&gt;&lt;/svg&gt;"
                     alt="" />&nbsp;
            </a>
        </div>
        <h1 class="am-header-title">
            <a href="#title-link" class="">教练查询</a>
        </h1>
    </header>
    <div class="am-text-lg am-padding-xs" style="color:#FFF;background:#999;border-bottom: 1px solid #ccc;">
        武汉市<label class="am-btn-default am-btn am-btn-xs am-radius" style="float:right;">更换</label>
    </div>
    <div id="widget-list"> 
        <ul class="am-list coach_list_box">
        </ul>
    </div>
    <!----------------------加载提示框。。。。。--------------------------------->
<div class="loading am-modal am-modal-loading am-modal-no-btn" tabindex="-1" id="my-modal-loading">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">正在加载...</div>
        <div class="am-modal-bd">
            <span class="am-icon-spinner am-icon-spin"></span>
        </div>
    </div>
</div>
    <script>
    $(function () {
//        var ip = "<?= $info ?>";
//        var json = eval("(" + + ")");
        openModel();
        loadCoach('1027');
    });
    function loadCoach(ip) {
        $.ajax({
            type: "POST",
            dataType: "text",
            url: "<?= base_url() ?>index.php/mobile/get_coach_by_city",
            async: true,
            data: {ip: ip},
            success: function (data) {
                $('.coach_list_box').html(data);
                closeModel();
                reBind();
            }});
    }
    function reBind() {
        $('.this_coach').on('click', function () {
            var id=$(this).attr('value');
           window.document.location.href='<?=  base_url()?>index.php/mobile/coach_home/'+id;
        });
    }
    function openModel() {
        $('.loading').modal();
    }
    function closeModel() {
        $('.loading').modal('close');
    }



</script>
</div>