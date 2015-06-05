<li>
    <a href="#">
        <!--图片源为  教练的真实头像   -->
        <!--<img class="coachimg am-img-bdrs" src="http://cn.bing.com/az/hprichv/LondonTrainStation_GettyRR_139321755_ZH-CN742316019.jpg">-->
        <img class="coachimg am-img-bdrs" src="<?=$coa_face ?>">
        <div class="clearfix"><div class="coa_name"><?= $coa_name?></div><div class="coa_sch"><?= $coa_school ?></div></div>
        <div class="coa_price"><?= $coa_grade_price ?><span style="margin-left: 5px;font-weight: bold;color: #990000;"> ￥/h </span></div>
        <div class="">已有<?= $coa_comment_total ?>人评价</div>
        <div class="coa_comment">
            评分 
            <?php $num=  intval($coa_history_score);
               if($num>5){
                   $num=5;
               }else if($num<0){
                   $num=0;
               }
               for($i=0;$i<$num;$i++){
             ?>
                   <span class="am-icon-star ml-red"></span>
            <?php 
              }
            ?> 
                   <span style="margin-left: 5px;"><?= $coa_history_score ?> </span>
        </div>
    </a>
</li>



