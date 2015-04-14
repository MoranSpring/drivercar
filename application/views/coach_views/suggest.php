<div id="com_inventory" style="margin: 30px auto;width:800px;" book_id="<=$book_id?>">
    <h2>请对本次教学后给学员一些建议：</h2>
    <table class="am-table "  style="background: #c0c0c0; color: #FFF">
        <tbody>
            <tr>
                <td style="width: 20%">日期 </td>
                <td><= $book_date ?></td>
            </tr>
            <tr>
                <td>节数</td>
                <td>第<= $book_cls_num ?>节课</td>
            </tr>
            <tr>
                <td>项目</td>
                <td><= $book_cls_name ?></td>
            </tr>

            <tr>
                <td>学员</td>
                <td><= $coa_name ?></td>
            </tr>
            <tr>
                <td>培训点</td>
                <td><= $sch_name ?></td>
            </tr>
            <tr>
                <td>支付积分</td>
                <td>100RMB</td>
            </tr>
        </tbody>
    </table>
    <div class="starbox clearfix">

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
        url:"<=  base_url()?>index.php/vipcenter/to_comment",
        async: true,
        data: {com_cls_id: com_cls_id, com_content: com_content,level: level},
        success: function (data) {
            if(data==1)
            location.replace(document.referrer);
        }});
       }
   }
</script>