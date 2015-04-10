<style>
    .info_footer_clear{
        clear: both;
    }
</style>
<div data-am-widget="footer" class="am-footer am-footer-default  info_footer_clear" data-am-footer="{  }">
    <div class="am-footer-switch">
        <span class="am-footer-ysp" data-rel="mobile" data-am-modal="{target: '#am-switch-mode'}">云适配版</span>
        <span class="am-footer-divider">|</span>
        <a id="godesktop" data-rel="desktop" class="am-footer-desktop"
           href="javascript:">电脑版</a>
    </div>
    <div class="am-footer-miscs ">
        <span>由
            <a href="http://www.baidu.com/" title="kyle" target="_blank" class="">Kyle</a>提供技术支持</span>
        <span>CopyRight©2015 52drivercar.com Inc.</span>
        <span>鄂ICP备15005490号</span>
    </div>
</div>
<div id="am-footer-modal" class="am-modal am-modal-no-btn am-switch-mode-m am-switch-mode-m-default">
    <div class="am-modal-dialog">
        <div class="am-modal-hd am-modal-footer-hd">
            <a href="javascript:void(0)" data-dismiss="modal" class="am-close am-close-spin "
               data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd">请登录
            <div class="am-tab-panel am-fade am-in am-active am-padding" >
                <form class="am-form" action="<?= base_url() . 'index.php/admin/news_upload' ?>" method="post" enctype="multipart/form-data">

                    <div class="am-input-group">
                        <span class="am-input-group-label am-icon-user"></span>
                        <input type="text" class="am-form-field" placeholder="Username">
                    </div>

                    <div class="am-input-group">
                        <span class="am-input-group-label am-icon-lock"></span>
                        <input type="text" class="am-form-field" placeholder="Password">
                    </div>
            </div>
            <div class="am-margin">
                <button type="submit" class="am-btn am-btn-primary am-btn-default">提交保存</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
