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
    ul>li{
        border: 1px dashed #dedede !important;
    }
</style>
<div class="am-page" id="mobile-index"> 
    <header data-am-widget="header" class="am-header am-header-default">
        <div class="am-header-left am-header-nav" >
            <a href="#left-link" class="" >
                <i class="am-header-icon am-icon-home am-icon">&nbsp</i>
            </a>
        </div>
        <h1 class="am-header-title">
            <a href="#title-link" class="">选择驾培点</a>
        </h1>

    </header>
    <div class="am-text-lg am-padding-xs" style="background:#ccc;border-bottom: 1px solid #ccc;">
        武汉市<label class="am-btn-success am-btn am-btn-xs" style="float:right;">更换</label>
    </div>
    <div id="widget-list"> 
        <ul class="am-list">
            <?php
            foreach ($school as $row) {
                echo $row;
            }
            ?>
        </ul>
    </div>
</div>


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
        <div class="am-header-right am-header-nav" >
            <span href="#left-link" class="" >
                <label class="am-btn am-btn-danger">确定</label>
            </span>
        </div>
    </header>
    <div id="demo-list">
        <div id="demo-scroller" style="transition: 0ms cubic-bezier(0.1, 0.57, 0.1, 1); -webkit-transition: 0ms cubic-bezier(0.1, 0.57, 0.1, 1); transform: translate(0px, 0px) translateZ(0px);">
            <ul class="coach_list am-list widget-list">
                no data.....
            </ul>
        </div>
    </div>
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
    var curWwwPath = window.document.location.href;
    var pathName = window.document.location.pathname;
    var pos = curWwwPath.indexOf(pathName);
    var localhostPath = curWwwPath.substring(0, pos);
    function test(id) {
        $('#demo-list-page').css('display', 'block');
        setTimeout(function () {
            $('body').addClass('demo-list-active');
        }, 1);
        setTimeout(openModel, 300);
        getCoach(id.getAttribute('value'));
    }

    function back() {
        $('body').removeClass('demo-list-active');
        setTimeout(function () {
            $('#demo-list-page').css('display', 'none');
        }, 300);
    }
    function getCoach(id) {
        $('.coach_list').html('');
        $.ajax({
            type: "POST",
            dataType: "text",
            url: localhostPath + "/index.php/mobile/get_course",
            async: true,
            data: {id: id},
            success: function (data) {
                $('.coach_list').html(data);
                closeModel();
                reBind();
            }});
    }
    function reBind() {
        $('.coa_selected').on('click', function () {
            $(this).attr('value') === 'true' ? $(this).children('.coa_check').css('color', '#aaa') : $(this).children('.coa_check').css('color', '#f00');
            $(this).attr('value') === 'true' ? $(this).attr('value', 'false') : $(this).attr('value', 'true');
        });
    }

    function openModel() {
        $('.loading').modal();
    }
    function closeModel() {
        $('.loading').modal('close');
    }

</script>