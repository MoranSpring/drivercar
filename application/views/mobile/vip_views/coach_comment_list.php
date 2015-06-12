<li class="am-comment"> <!-- 评论容器 -->
    <a href=''>
        <img class="ml-comment-avatar" alt="" src="<?=$coach_face?>@!nail"/> 
    </a>

    <div class="am-comment-main"> <!-- 评论内容容器 -->
        <header class="am-comment-hd">
            <!--<h3 class="am-comment-title">评论标题</h3>-->
            <div class="am-comment-meta"> <!-- 评论元数据 -->
                <a href="#link-to-user" class="am-comment-author"><?=$coach_name?>&nbsp;教练</a> 
            </div>
        </header>
        <div class='am-padding-left-sm' style='height:50px;background: #A3D0D6;color:#fff;font-size: 0.9em;border-left: 5px solid #888;'>
            <span style='line-height: 25px;'><?=$book_date?>&nbsp;&nbsp;&nbsp;第<?=$book_cls_num?>节</span><br/><span><?=$cls_name?></span>
        </div>

        <div class="am-comment-bd">
            <?=$book_suggest?>

        </div> <!-- 评论内容 -->
    </div>
</li>