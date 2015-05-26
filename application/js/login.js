var curWwwPath = window.document.location.href;
var pathName = window.document.location.pathname;
var pos = curWwwPath.indexOf(pathName);
var localhostPath = curWwwPath.substring(0, pos);
function check_onbulr(str) {
    data = 'name=' + str;
    $.ajax({
        dataType: "text",
        type: "GET",
        async: true,
//        url: base_url + "/first/login_check?r=" + Math.random(),
        url: localhostPath + "/index.php/first/login_check",
        data: data,
        success: function (data) {
            if (data != true) {
                $(".name_alert").text(data);
                if (typeof (toAlert) === 'function') {
                    toAlert();
                }
            }
        }
    });
}
function check_onfocus() {
    $(".name_alert").text('');
    $('.login-alert').css('display', 'none');
}

function checkForm(thisform) {
    var bol = false;
    with (thisform)
    {
        if (name.value === "")
        {
            name.focus();
            if (typeof (toAlert) === 'function') {
                toAlert();
                $(".name_alert").text("用户名不能为空");
            }else{
                alert("用户名不能为空");
            }
            return false;
        } else if (password.value === "") {
            password.focus();
            if (typeof (toAlert) === 'function') {
                toAlert();
                $(".name_alert").text("密码不能为空");
            }else{
                alert("密码不能为空");
            }
            return false;
        } else {
            $.ajax({
                type: "POST",
                async: false,
                cache: false,
                dataType: "text",
                url: localhostPath + "/index.php/first/psw_isRight",
                data: {name: name.value, password: password.value},
                success: function (data) {
                    if (data == 0) {
                        bol = true;
                    } else if (data == 1) {
                        bol = false;
                        $('.login_info').text("密码错误");
                        if (typeof (toAlert) === 'function') {
                            toAlert();
                            $(".name_alert").text("密码错误");
                        }

                    } else {
                        bol = false;
                        $('.login_info').text("用户压根儿不存在");
                        if (typeof (toAlert) === 'function') {
                            toAlert();
                            $(".name_alert").text("用户压根儿不存在");
                        }
                    }
                }});
            return bol;
        }
    }
}

