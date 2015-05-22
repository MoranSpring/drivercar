$(function () {
    step1();
});
function step1() {
    $('#ml-step1').css('background', 'url(/application/images/on_pixel.png)');
    $('#ml-step2').css('background', 'url(/application/images/off_pixel.png)');
    $('#ml-step3').css('background', 'url(/application/images/off_pixel.png)');
    $('#ml-step_img1').removeClass();
    $('#ml-step_img2').removeClass();
    $('#ml-step_img1').addClass("step_img_onoff");
    $('#ml-step_img2').addClass('step_img_offoff');
    $('#ml-step_img3').addClass('step_end_img_off');
}
function step2() {
    $('#ml-step1').css('background', 'url(/application/images/off_pixel.png)');
    $('#ml-step2').css('background', 'url(/application/images/on_pixel.png)');
    $('#ml-step3').css('background', 'url(/application/images/off_pixel.png)');
    $('#ml-step_img1').removeClass();
    $('#ml-step_img2').removeClass();
    $('#ml-step_img1').addClass("step_img_offon");
    $('#ml-step_img2').addClass('step_img_onoff');
    $('#ml-step_img3').addClass('step_end_img_off');
}
function step3() {
    $('#ml-step1').css('background', 'url(/application/images/off_pixel.png)');
    $('#ml-step2').css('background', 'url(/application/images/off_pixel.png)');
    $('#ml-step3').css('background', 'url(/application/images/on_pixel.png)');
    $('#ml-step_img1').removeClass();
    $('#ml-step_img2').removeClass();
    $('#ml-step_img1').addClass("step_img_offoff");
    $('#ml-step_img2').addClass('step_img_offon');
    $('#ml-step_img3').addClass('step_end_img_on');
}



