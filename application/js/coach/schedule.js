
$(function () {
    get3Date();
    
});



function select_date(day, n) {
    var thisDay = "coabk_time=" + day;
    var coach = $('.select_coach').val();
    var thisCoach = "coabk_coach_id=" + coach;
    $.ajax({
        type: "POST",
        dataType: "text",
        url: localhostPath + "/index.php/vipcenter/get_cls",
        async: true,
        data: {coabk_time: day, coabk_coach_id: coach},
        success: function (data) {
            var json = eval("(" + data + ")");
            for (var i = 0; i < json.coachbook.length; i++) {
                var cls = json.coachbook[i].coabk_cls_num;
                cls = cls > 4 ? cls - (-1) : cls;
                cls = cls > 9 ? cls - (-1) : cls;
                $('#cls_table tr:eq(' + cls + ') td:eq(' + n + ')').addClass('ml-cls-active');
            }
            for (var i = 0; i < json.teachbook.length; i++) {
                var cls = json.teachbook[i].book_cls_num;
                cls = cls > 4 ? cls - (-1) : cls;
                cls = cls > 9 ? cls - (-1) : cls;
                $('#cls_table tr:eq(' + cls + ') td:eq(' + n + ')').removeClass('ml-cls-active');
                $('#cls_table tr:eq(' + cls + ') td:eq(' + n + ')').addClass('ml-has-selecked');
            }
        }});
}
function get3Date() {
    var today = new Date().getTime() - 86400000;
    var checkout = $('#select_date').datepicker({
        onRender: function (date) {
            return date.valueOf() <= today ? 'am-disabled' : '';
        }
    }).on('changeDate.datepicker.amui', function (event) {

//------------Init----------------
        var date1 = event.date;
        var date2 = new Date();
        var date3 = new Date();
        var Month1 = date1.getMonth() + 1;
        var day1 = date1.getFullYear() + "-" + Month1 + "-" + date1.getDate();
        date2 = new Date(date1.setDate(date1.getDate() + 1));
        var Month2 = date2.getMonth() + 1;
        var day2 = date2.getFullYear() + "-" + Month2 + "-" + date2.getDate();
        date3 = new Date(date1.setDate(date1.getDate() + 1));
        var Month3 = date3.getMonth() + 1;
        var day3 = date3.getFullYear() + "-" + Month3 + "-" + date3.getDate();
        $('#date1').html(day1);
        $('#date2').html(day2);
        $('#date3').html(day3);
//        select_date(day1, 1);
//        select_date(day2, 2);
//        select_date(day3, 3);
//        //--------------afterInit--------------
//        $('#cls_table').css('display', 'table');
        checkout.close();
    }).data('amui.datepicker');
}