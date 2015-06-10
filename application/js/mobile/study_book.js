var curWwwPath = window.document.location.href;
var pathName = window.document.location.pathname;
var pos = curWwwPath.indexOf(pathName);
var localhostPath = curWwwPath.substring(0, pos);
//初始化
$(function () {
    $('#bt1').click(function () {
        if (check() === 100 || check() === 200) {
            step2();
//            isStaticCoach();
            get_project_name();
            $('.step_1').css('display', 'none');
            $('.step_2').css('display', 'block');
            $('.step_3').css('display', 'none');
        } else {
            myAlert('请选择科目！');
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
            setInfo();    //清单里显示该用户的相关信息。
            $('.step_1').css('display', 'none');
            $('.step_2').css('display', 'none');
            $('.step_3').css('display', 'block');
        } else {
            myAlert('您还没有选课！');
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
    getCoachInfo();
    get3Date();
    $(".select_coach").attr("disabled", true);
});

function getCoachInfo() {
    $.ajax({
        type: "GET",
        url: localhostPath + "/index.php/mobile/get_coach_info?r=" + Math.random(),
        async: true,
        success: function (data) {
                var json = eval("(" + data + ")");
                if (json.exist == '1') {
                $('.coa_img').attr('src', json.coach_face);
                $('.select_sch').text(json.jp_name);
                $('.select-coa-cost').text(json.coach_cls_cost);
                $('.select_sch').attr('id', json.sc_sch);
                $('.select_coa').text(json.coach_name);
                $('.select_coa').attr('id', json.sc_coa);
            }else{
                $('.coa_exist').css('display','none');
                $('.coa_unexist').css('display','block');
            }
        }
    });
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
                $('.select_coach').append("<option value='" + json[i].coach_id + "'>" + json[i].coach_name + "</option>");
            }
            $('.select_coach').trigger('chosen:updated');
        }
    });
    $(".select_coach").removeAttr("disabled");
    return true;
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

//--------jquery1.7------UNUSED------------------
//$(".ml-cls-active").live('click', function () {
//    if ($(this).attr('value') !== '8') {
//        $(this).attr('value', '8');
//        $(this).removeClass("ml-cls-active-defult");
//        $(this).addClass("ml-cls-active-selected");
//    } else {
//        $(this).attr('value', '-1');
//        $(this).removeClass("ml-cls-active-selected");
//        $(this).addClass("ml-cls-active-defult");
//    }
//    refresh();
//});
//---------------------------------------
$(document).on('click', '.ml-cls-active', function () {
    if ($(this).attr('value') !== '8') {
        $(this).attr('value', '8');
        $(this).removeClass("ml-cls-active-defult");
        $(this).addClass("ml-cls-active-selected");
    } else {
        $(this).attr('value', '-1');
        $(this).removeClass("ml-cls-active-selected");
        $(this).addClass("ml-cls-active-defult");
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
//            alert($(this).attr('date'));
            $('#date1').html();
        }
    });
}

function init() {
    $('#cls_table').css('display', 'none');
    $('.item').removeClass('ml-cls-active-defult');
    $('.item').removeClass('ml-cls-active-selected');
    $('.item').removeClass('ml-has-selecked');
    $('.item').attr('value', '');
    $('.item').css('background', '');
    refresh();
}
function get3Date() {
    $("#datepicker").datepicker({
        minDate: 0, maxDate: "+1M",
        onSelect: function (dateText) {
            init();
            var date1 = parseISO8601(dateText);
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
//            alert(day1);
            //--------------afterInit--------------
            $('#cls_table').css('display', 'table');
        }
    }
    );
    $("#datepicker").datepicker("option", "dateFormat", "yy-mm-dd");
    $("#datepicker").datepicker("option", $.datepicker.regional[ "zh-TW" ]);
}
function select_date(day, n) {
    var coach = $('.select_coa').attr('id');
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
                $('#cls_table tr:eq(' + cls + ') td:eq(' + n + ')').addClass('ml-cls-active-defult');
            }
            for (var i = 0; i < json.teachbook.length; i++) {
                var cls = json.teachbook[i].book_cls_num;
                cls = cls > 4 ? cls - (-1) : cls;
                cls = cls > 9 ? cls - (-1) : cls;
                $('#cls_table tr:eq(' + cls + ') td:eq(' + n + ')').removeClass('ml-cls-active');
                $('#cls_table tr:eq(' + cls + ') td:eq(' + n + ')').removeClass('ml-cls-active-selected');
                $('#cls_table tr:eq(' + cls + ') td:eq(' + n + ')').removeClass('ml-cls-active-defult');
                $('#cls_table tr:eq(' + cls + ') td:eq(' + n + ')').addClass('ml-has-selecked');
            }
        }});
}
function submit() {
    var kind = $('.cls_kind').val();
    var project = $('.cls_project').val();
    var projectName = $('.cls_project').attr("projectName");
    var school_id = $('.select_sch').attr('id');
    var coach_id = $('.select_coa').attr('id');
    //-----------jquery1.7 UNUSED------------
    var school_name = $('.select_sch').text();
    var coach_name = $('.select_coa').text();


//    alert(kind + '    ' + projectName + '    ' + school_name + '    ' + coach_name);
    var selArray = refresh();
    $('#book-table-info').empty();
    for (var i = 0; i < selArray.length; i++) {
        $('#book-table-info').append("<tr><td>" + selArray[i].date + ", 第" + selArray[i].cls + "节课" + "</td><td><a  target='_blank' href='" + localhostPath + "/index.php/mobile/school_home/" + school_id + "'>" + school_name + "</a></td> <td><a  target='_blank' href='" + localhostPath + "/index.php/mobile/coach_home/" + coach_id + "'>" + coach_name + "</a></td><td>" + projectName + "</td></tr>");
    }
    $('.sum-cls-num').html(selArray.length);
    var cost=$('.select-coa-cost').text();
    var sum=selArray.length*cost;
    $('#sum').html(sum);
}
function toOnload() {
    var school_id = $('.select_sch').attr('id');
    var coach_id = $('.select_coa').attr('id');
    var project = $('.cls_project').val();
    if(school_id==''||coach_id==''||project==''){
        alert('信息有误！');
        return false;
    }
    var selArray = refresh();
    var json = JSON.stringify(selArray);
    $.ajax({
        type: "POST",
        dataType: "text",
        url: localhostPath + "/index.php/mobile/teach_book",
        async: true,
        data: {book_coa_id: coach_id, book_sch_id: school_id, book_cls_id: project, json: json},
        success: function (data) {
            if (data == 1) {
                alert("预约成功！");
                step1();
                $('.step_1').css('display', 'block');
                $('.step_2').css('display', 'none');
                $('.step_3').css('display', 'none');
                if (typeof (iAmMobile) === 'function') {
                    window.location.href = localhostPath + "/index.php/mobile";
                } else {
                    window.location.href = localhostPath + "/index.php/vipcenter/vip_center";
                }

            }else if(data == 3){
               alert('余额不足'); 
            }
            else if(data == 11){
               alert('插入时出现异常'); 
            }
            else if(data == 9){
               alert('返回异常'); 
            }
            else if(data == 7){
               alert('该课程已被别人选走了'); 
            }
            else {
                alert("预约失败！");
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
//    var $modal = $('#your-modal');
    alert(content);
//    $modal.modal('open');
}
function parseISO8601(dateStringInRange) {
    var isoExp = /^\s*(\d{4})-(\d\d)-(\d\d)\s*$/,
            date = new Date(NaN), month,
            parts = isoExp.exec(dateStringInRange);

    if (parts) {
        month = +parts[2];
        date.setFullYear(parts[1], month - 1, parts[3]);
        if (month != date.getMonth() + 1) {
            date.setTime(NaN);
        }
    }
    return date;
}
function get_project_name() {
    var project = $('.cls_project').val();
    $.ajax({
        type: "POST",
        dataType: "text",
        url: localhostPath + "/index.php/vipcenter/get_course_name",
        async: true,
        data: {id: project},
        success: function (data) {
            var projectName = data;
            $('.cls_project').attr("projectName", projectName);
        }});
}
function isStaticCoach() {
    $.ajax({
        type: "POST",
        dataType: "text",
        url: localhostPath + "/index.php/vipcenter/get_static_coach",
        async: true,
        data: {},
        success: function (data) {
            if (data != 0) {
                $(".select_sch").attr("disabled", "true");
                var json = eval("(" + data + ")");
                $(".select_sch option[value=" + json.sc_sch + "]").attr("selected", true);
                if (selectCoach(json.sc_sch)) {
                    $(".select_coach option[value=" + json.sc_coa + "]").attr("selected", true);
                    $(".select_coach").attr("disabled", true);
                }
                ;

            }
        }});
}

