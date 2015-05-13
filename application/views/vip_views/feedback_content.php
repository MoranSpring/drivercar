<div id="com_inventory" style="margin: 20px 100px 10px 100px;;" book_id="<?=$book_id?>">
    <h2>请对本次教学情况打分：</h2>
    <table class="am-table "  style="background: #c0c0c0; color: #FFF">
        <tbody>
            <tr>
                <td style="width: 20%">日期 </td>
                <td><?= $book_date ?></td>
            </tr>
            <tr>
                <td>节数</td>
                <td>第<?= $book_cls_num ?>节课</td>
            </tr>
            <tr>
                <td>项目</td>
                <td><?= $book_cls_name ?></td>
            </tr>

            <tr>
                <td>教练</td>
                <td><a style="color:#FFF;text-decoration:underline;"  target='_blank' href="<?=  base_url()?>index.php/first/coach_self_info/<?=$book_coa_id?>"><?=$coa_name?></a></td>
            </tr>
            <tr>
                <td>培训点</td>
                <td><a style="color:#FFF;text-decoration:underline;"   target='_blank' href="<?=  base_url()?>index.php/first/school_info/<?=$book_sch_id?>"><?=$sch_name?></a></td>
            </tr>
            <tr>
                <td>消费积分</td>
                <td>100RMB</td>
            </tr>
            <tr>
                <td>教学建议</td>
                <td><?= $book_suggest ?></td>
            </tr>
        </tbody>
    </table>
    <div class="starbox clearfix">
        <span class="s_name">总体评价：</span>
        <ul class="star_ul fl">
            <li><a class="one-star" title="很差" level="1" ></a></li>
            <li><a class="two-star" title="差" level="2"></a></li>
            <li><a class="three-star" title="还行" level="3"></a></li>
            <li><a class="four-star" title="好" level="4"></a></li>
            <li><a class="five-star" title="很好" level="5"></a></li>
        </ul>
        <span class="s_result fl">请打分</span>
    </div>
    <div style="width:100%;" class="clearfix">
        <p style="float:left">教练教学 : <p>
        <div style="float:left; width:100%;">
            <textarea id="comment_content" style=" width:100%; height: 100px"></textarea>
            <div>
                <label class="am-btn am-btn-primary" style="float:right;" onclick="comment()">确定</label>
            </div>
        </div>
    </div>

</div>
<script>
    var level=-1;
    var flag = 0;
    $(function () {
        $('.star_ul a').hover(function () {
            flag = 0;
            level=-1;
            $('.star_ul li a').removeClass('active-star');
            $(this).addClass('active-star');
            $('.s_result').css('color', '#c00').html($(this).attr('title'));
        }, function () {
            if (flag === 0) {
                $(this).removeClass('active-star');
                $('.s_result').css('color', '#333').html('请打分');
            }
        });

        $('.star_ul a').click(function () {
            //                alert($('.s_result').html());
            flag = 1;
            $(this).addClass('active-star');
            $('.s_result').css('color', '#c00').html($(this).attr('title'));
            level=$(this).attr('level');
        });
    });
   function comment(){
       var com_cls_id=$("#com_inventory").attr('book_id');
       var com_content=$("#comment_content").val();
       if(level==-1){
           alert('To Comment!!');
           return false;
       }else if(com_content==""){
           alert('To say something!!');
       }
       else{
           $.ajax({
        type: "POST",
        dataType: "text",
        url:"<?=  base_url()?>index.php/vipcenter/to_comment",
        async: true,
        data: {com_cls_id: com_cls_id, com_content: com_content,level: level},
        success: function (data) {
            if(data==1)
            location.replace(document.referrer);
        }});
       }
   }
</script>