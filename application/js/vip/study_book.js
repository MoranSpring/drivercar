var curWwwPath = window.document.location.href;
var pathName = window.document.location.pathname;
var pos = curWwwPath.indexOf(pathName);
var localhostPath = curWwwPath.substring(0, pos);
//初始化
$(function () {
    $('#bt1').click(function () {
        if (check() === 100 || check() === 200) {
            step2();
            $('.step_1').css('display', 'none');
            $('.step_2').css('display', 'block');
            $('.step_3').css('display', 'none');
        } else {
            myAlert('ni da ye de');
        }
    });
    $('#bt21').click(function () {
        step1();
        $('.step_1').css('display', 'block');
        $('.step_2').css('display', 'none');
        $('.step_3').css('display', 'none');
    });
    $('#bt22').click(function () {
        if (check() === 200) {
            step3();
            submit();
            $('.step_1').css('display', 'none');
            $('.step_2').css('display', 'none');
            $('.step_3').css('display', 'block');
        } else {
            myAlert('ni da ye de toooo');
        }
    });
    $('#bt31').click(function () {
        step2();
        $('.step_1').css('display', 'none');
        $('.step_2').css('display', 'block');
        $('.step_3').css('display', 'none');
    });
    $('#bt32').click(function () {
//                     sumit();
        toOnload();
    });
    getSchoolsInfo();
    get3Date();
    $(".select_coach").attr("disabled", "true");
});
function getSchoolsInfo() {
    $.ajax({
        type: "GET",
        url: localhostPath + "/index.php/admin/get_schools?r=" + Math.random(),
        async: true,
        success: function (data) {
            var json = eval("(" + data + ")");
            for (var i = 0; i < json.length; i++) {

                $('.select_sch').append("<option value='" + json[i].jp_id + "'>" + json[i].jp_name + "</option>");
            }
            $('.select_sch').trigger('chosen:updated');
        }
    });
}
function get3Date() {
    var today = new Date().getTime() - 86400000;
    var checkout = $('#select_date').datepicker({
        onRender: function (date) {
            return date.valueOf() <= today ? 'am-disabled' : '';
        }
    }).on('changeDate.datepicker.amui', function (event) {

//------------Init----------------
        init();
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
        select_date(day1, 1);
        select_date(day2, 2);
        select_date(day3, 3);
        //--------------afterInit--------------
        $('#cls_table').css('display', 'table');
        checkout.close();
    }).data('amui.datepicker');
}
function selectCoach(sch_id) {
    init();
    $('.select_coach').empty();
    $(".select_coach").attr("disabled", "true");
    $.ajax({
        type: "GET",
        url: localhostPath + "/index.php/admin/get_coach_via_sch/" + sch_id + "?r=" + Math.random(),
        async: true,
        success: function (data) {
            var json = eval("(" + data + ")");
            for (var i = 0; i < json.length; i++) {
                $(".select_coach").removeAttr("disabled");
                $('.select_coach').append("<option value='" + json[i].coach_id + "'>" + json[i].coach_name + "</option>");
            }
            $('.select_coach').trigger('chosen:updated');
        }
    });
}
//--------------选择类-----------------
function choice(date, cls)
{
    this.date = date;
    this.cls = cls;
}

//---------SelectMore---------------
//        $(".ml-cls-active").toggle(function () {
//            $(this).attr('value', '8');
//            $(this).css('background', '#aac');
//            refresh();
//        }, function () {
//            $(this).attr('value', '-1');
//            $(this).css('background', '');
//            refresh();
//        });
$(".ml-cls-active").live('click', function () {
    if ($(this).attr('value') !== '8') {
        $(this).attr('value', '8');
        $(this).css('background', '#aac');
    } else {
        $(this).attr('value', '-1');
        $(this).css('background', '');
    }
    refresh();
});
//---------SelectOne---------------
//        $(".item").click(function () {
//            $(".item").attr('value', '-1');
//            $(".item").css('background', '');
//            $(this).attr('value', '8');
//            $(this).css('background', '#aac');
//            
//        });
function refresh() {
    var n = 0;
    $('#cls_date_box').empty();
    var selArray = new Array();
    $('.item').each(function () {
        if ($(this).attr('value') === '8')
        {
            n++;
            var cls = $(this).attr('num');
            var dayNum = $(this).attr('date');
            var day = $('#' + dayNum).html();
            $('#cls_date_box').append("<p>时间为" + day + ",    第" + cls + "节课</p>");
            var selected = new choice(day, cls);
            selArray.push(selected);
        }
        $('#cls_num_box').html(n);
    });
    return selArray;
}
//        var select = new choice('afd', 'asfd');
//        var select2 = new choice('afd2', 'asfd2');
//
//        selArray.push(select);
//        selArray.push(select2);
//        for (var i = 0; i < selArray.length; i++) {
//            alert(selArray[i].date);
//        }
function hs() {
    $('.item').each(function () {
        if ($(this).attr('value') == '8')
        {
            var select = new choice('afd', 'asfd');
            alert($(this).attr('date'));
            $('#date1').html();
        }
    });
}
function get3Date() {
    var today = new Date().getTime() - 86400000;
    var checkout = $('#select_date').datepicker({
        onRender: function (date) {
            return date.valueOf() <= today ? 'am-disabled' : '';
        }
    }).on('changeDate.datepicker.amui', function (event) {

//------------Init----------------
        init();
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
        select_date(day1, 1);
        select_date(day2, 2);
        select_date(day3, 3);
        //--------------afterInit--------------
        $('#cls_table').css('display', 'table');
        checkout.close();
    }).data('amui.datepicker');
}
function init() {
    $('#cls_table').css('display', 'none');
    $('.item').removeClass('ml-cls-active');
    $('.item').removeClass('ml-has-selecked');
    $('.item').attr('value', '');
    $('.item').css('background', '');
    refresh();
}
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
function submit() {
    var kind = $('.cls_kind').val();
    var project = $('.cls_project').val();
    var school_id = $('.select_sch').val();
    var coach_id = $('.select_coach').val();
    var school_name = $('.select_sch option:selected').text();
    var coach_name = $('.select_coach  option:selected').text();
    alert(kind + '    ' + project + '    ' + school_name + '    ' + coach_name);
    var selArray = refresh();
    $('#book-table-info').empty();
    for (var i = 0; i < selArray.length; i++) {
        $('#book-table-info').append("<tr><td>" + selArray[i].date + ", 第" + selArray[i].cls + "节课" + "</td><td>" + school_name + "</td> <td>" + coach_name + "</td><td>" + project + "</td>< /tr>");
    }
    $('.user-name').html('Kyle');
    $('.user-tel').html('1509890399');
    $('.sum-cls-num').html(selArray.length);
}
function toOnload() {
    var school_id = $('.select_sch').val();
    var coach_id = $('.select_coach').val();
    var selArray = refresh();
    var json = JSON.stringify(selArray);
     $.ajax({
        type: "POST",
        dataType: "text",
        url: localhostPath + "/index.php/vipcenter/teach_book",
        async: true,
        data: {book_coa_id: coach_id, book_sch_id: school_id,json:json},
        success: function (data) {
            if(data==1)
            alert("插入成功！");
        else{
            alert("插入失败！");
        }
        }});

}
function check() {
    var project = $('.cls_project').val();
    var selArray = refresh();
    if (project == null || project == 0) {
        return false;
    } else if (selArray.length === 0) {

        return 100;
    } else {
        return 200;
    }
}
function myAlert(content) {
    $('#alert-content').html(content);
    var $modal = $('#your-modal');
    $modal.modal('open');
}

