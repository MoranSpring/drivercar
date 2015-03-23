$(function () {
    step1();
});
function step1() {
    $('#ml-step1').css('background', '#3B95D3');
    $('#ml-step2').css('background', '#B1B3B2');
    $('#ml-step3').css('background', '#B1B3B2');
    $('#ml-step_img1').removeClass();
    $('#ml-step_img2').removeClass();
    $('#ml-step_img1').addClass("step_img_onoff");
    $('#ml-step_img2').addClass('step_img_offoff');
}
function step2() {
    $('#ml-step1').css('background', '#B1B3B2');
    $('#ml-step2').css('background', '#3B95D3');
    $('#ml-step3').css('background', '#B1B3B2');
    $('#ml-step_img1').removeClass();
    $('#ml-step_img2').removeClass();
    $('#ml-step_img1').addClass("step_img_offon");
    $('#ml-step_img2').addClass('step_img_onoff');
}
function step3() {
    $('#ml-step1').css('background', '#B1B3B2');
    $('#ml-step2').css('background', '#B1B3B2');
    $('#ml-step3').css('background', '#3B95D3');
    $('#ml-step_img1').removeClass();
    $('#ml-step_img2').removeClass();
    $('#ml-step_img1').addClass("step_img_offoff");
    $('#ml-step_img2').addClass('step_img_offon');
}



