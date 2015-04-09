<div class="fb-list" book_id="<?=$book_id?>">
    <ul>
        <li style="background:#e0e0e0;" class="clearfix">
            <ul class="fb-list-chir">
                <li>
                    <?= $book_date ?>
                </li>
                <li>
                    第<?= $book_cls_num ?>节课
                </li>
                <li>
                    训练项目：倒库
                </li>
            </ul>
        </li>
        <li  class="clearfix">
            <ul id="coach" class="clearfix" style="float: left; width:40%">
                <li style="float:left;">
                    <img class="am-img-thumbnail am-circle" src="http://image.52drivercar.com/1426679132.jpg@!nail" width="70" height="70"/>
                </li>
                <li style="float:left;">
                    <ul>
                        <li>
                            <?= $coa_name ?> 
                        </li>
                        <li>
                            教练等级：<span class="am-icon-star ml-red"></span><span class="am-icon-star ml-red"></span><span class="am-icon-star ml-red"></span><span class="am-icon-star-half-o ml-red"></span>
                        </li>
                    </ul>
                </li>

            </ul>
            <ul style="float: left; width:20%">
                <li style="line-height: 70px;">
                    <?= $sch_name ?>
                </li>
            </ul>
            <ul style="float: left; width:20%">
                <li style="line-height: 70px;">
                    花费积分： 1000积分
                </li>
            </ul>
            <ul style="float: left; width:20%;">
                <li style="line-height: 30px;float:right;padding:7px 10px 0 0 ;">
                    <label class="thisbtn am-btn am-btn-primary am-btn-xs">我的评价</label>
                </li>
                <li style="line-height: 30px;float:right;padding:0 10px 0 0 ;">
                    <label class="am-btn am-btn-primary  am-btn-xs">继续评价</label>
                </li>
            </ul>

        </li>


    </ul>
</div>
<div class="comment" style="width:70%; display: none">
</div>