<li class="am-comment">
    <a href="#link-to-user-home">
        <img src="" alt="" class="am-comment-avatar" width="48" height="48"/>
    </a>
    <div class="am-comment-main">
        <header class="am-comment-hd">
            <!--<h3 class="am-comment-title">评论标题</h3>-->
            <div class="am-comment-meta">
                <a href="#link-to-user" class="am-comment-author"><=$userName?></a>
                评论于 <time><?=$com_time?></time>
                <span style="float:right">评分：<?php for ($i=0;$i<$com_level;$i++) {echo "<span class='am-icon-star ml-red'></span>";}?>
                    <?=$com_level?>星 </span>
            </div>
        </header>
        <div class="am-comment-bd">
            <?=$com_content?>
        </div>
    </div>
</li>
