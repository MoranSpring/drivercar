<div style="width:100%;height:100%">

    <div style="position: relative;top:20%;left:20px;color:green;font-size: 4em;">
        <div class="am-g">
            <div class="am-u-sm-3">
                <span class="am-icon-check-circle-o" style="line-height: 1em;height: 1em;">&nbsp;
        </span>
            </div>
            <div class="am-u-sm-9">
                <span style="color:#0085d9;;font-size: 0.5em;line-height: 64px;height:64px;">充值成功！</span>
            </div>
            
        </div>
    </div>
     <div class="am-center" style="position: relative;top:20%;width:150px;">
        等待1秒自动跳转
    </div>
</div>
<script>
    $(function () {
        setTimeout(toredirect, 1000);
    });

    function  toredirect() {
        window.location.href = "<?= base_url() ?>index.php/mobile/vip_home";
    }
</script>

