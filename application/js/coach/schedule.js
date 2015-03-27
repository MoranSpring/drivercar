var curWwwPath = window.document.location.href;
var pathName = window.document.location.pathname;
var pos = curWwwPath.indexOf(pathName);
var localhostPath = curWwwPath.substring(0, pos);

$(function () {
    get3Date();

});



function select_date(day, n) {
//    var coach = $('.select_coach').val();
    var coach = '1427162541';
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
                $('#cls_table tr:eq(' + cls + ') td:eq(' + n + ')').addClass('ml-choiced');
                $('#cls_table tr:eq(' + cls + ') td:eq(' + n + ')').attr('value', '13');
            }
            for (var i = 0; i < json.teachbook.length; i++) {
                var cls = json.teachbook[i].book_cls_num;
                cls = cls > 4 ? cls - (-1) : cls;
                cls = cls > 9 ? cls - (-1) : cls;
                $('#cls_table tr:eq(' + cls + ') td:eq(' + n + ')').removeClass('ml-choiced');
                $('#cls_table tr:eq(' + cls + ') td:eq(' + n + ')').removeClass('ml-coach-active');
                $('#cls_table tr:eq(' + cls + ') td:eq(' + n + ')').addClass('ml-has-selecked');
            }
            if(n===7){
                $('#cls_table').css('display', 'table');
                $('#my-modal-loading').modal('close');
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
        init();
//------------Init----------------
        var date1 = event.date;
        var date2 = new Date();
        var date3 = new Date();
        var date4 = new Date();
        var date5 = new Date();
        var date6 = new Date();
        var date7 = new Date();
        var Month1 = date1.getMonth() + 1;
        var day1 = date1.getFullYear() + "-" + Month1 + "-" + date1.getDate();
        date2 = new Date(date1.setDate(date1.getDate() + 1));
        var Month2 = date2.getMonth() + 1;
        var day2 = date2.getFullYear() + "-" + Month2 + "-" + date2.getDate();
        date3 = new Date(date1.setDate(date1.getDate() + 1));
        var Month3 = date3.getMonth() + 1;
        var day3 = date3.getFullYear() + "-" + Month3 + "-" + date3.getDate();

        date4 = new Date(date1.setDate(date1.getDate() + 1));
        var Month4 = date4.getMonth() + 1;
        var day4 = date4.getFullYear() + "-" + Month4 + "-" + date4.getDate();
        date5 = new Date(date1.setDate(date1.getDate() + 1));
        var Month5 = date5.getMonth() + 1;
        var day5 = date5.getFullYear() + "-" + Month5 + "-" + date5.getDate();
        date6 = new Date(date1.setDate(date1.getDate() + 1));
        var Month6 = date6.getMonth() + 1;
        var day6 = date6.getFullYear() + "-" + Month6 + "-" + date6.getDate();
        date7 = new Date(date1.setDate(date1.getDate() + 1));
        var Month7 = date7.getMonth() + 1;
        var day7 = date7.getFullYear() + "-" + Month7 + "-" + date7.getDate();

        $('#date1').html(day1);
        $('#date2').html(day2);
        $('#date3').html(day3);
        $('#date4').html(day4);
        $('#date5').html(day5);
        $('#date6').html(day6);
        $('#date7').html(day7);

        select_date(day1, 1);
        select_date(day2, 2);
        select_date(day3, 3);
        select_date(day4, 4);
        select_date(day5, 5);
        select_date(day6, 6);
        select_date(day7, 7);
//        //--------------afterInit--------------
//        $('#cls_table').css('display', 'table');
        checkout.close();
    }).data('amui.datepicker');
}
$(".ml-coach-active").live('click', function () {
    if ($(this).attr('value') === '13') {
        $(this).attr('value', '-3');
        $(this).removeClass('ml-choiced');
        $(this).addClass('ml-coa-cls-cancel');
    } else if ($(this).attr('value') === '8') {
        $(this).attr('value', '-1');
        $(this).removeClass('ml-coa-cls-choice');
    } else if ($(this).attr('value') === '-3') {
        $(this).attr('value', '13');
        $(this).addClass('ml-choiced ');
        $(this).removeClass('ml-coa-cls-cancel');
    } else {
        $(this).attr('value', '8');
        $(this).addClass('ml-coa-cls-choice');
    }
});

function init() {
    $('#cls_table').css('display', 'none');
    $('.ml-item').removeClass('ml-choiced');
    $('.ml-item').removeClass('ml-has-selecked');
    $('.ml-item').removeClass('ml-coa-cls-choice');
    $('.ml-item').removeClass('ml-coa-cls-cancel');
    $('.ml-item').addClass('ml-coach-active');
    $('.ml-item').attr('value', '');
    
    $('#my-modal-loading').modal('open');
//    refresh();
}
function summit() {

}
function toOnload(data) {
    var json = data;
    $.ajax({
        type: "POST",
        dataType: "text",
        url: localhostPath + "/index.php/coach/coach_book",
        async: true,
        data: {json: json},
        success: function (data) {
                alert(data);
            }
        });
}
function Statistics() {
    var n = 0;
    var addArray = new Array();
    var removeArray = new Array();
    $('.ml-item').each(function () {
        if ($(this).attr('value') === '8')
        {
            n++;
            var cls = $(this).attr('num');
            var dayNum = $(this).attr('date');
            var day = $('#' + dayNum).html();
            var selected = new choice(day, cls);
            addArray.push(selected);
        }
        if ($(this).attr('value') === '-3')
        {
            n++;
            var cls = $(this).attr('num');
            var dayNum = $(this).attr('date');
            var day = $('#' + dayNum).html();
            var selected = new choice(day, cls);
            removeArray.push(selected);
        }
       
        
    });
    
    var allData=new bothData(addArray,removeArray);
    var json = JSON.stringify(allData);
    if(addArray.length+removeArray.length===0){
        alert('您没有选择');
    }else{
        alert(json);
        toOnload(json);
    }
}
//--------------选择类-----------------
function choice(date, cls)
{
    this.date = date;
    this.cls = cls;
}
function bothData(add, remove)
{
    this.add = add;
    this.remove = remove;
}
