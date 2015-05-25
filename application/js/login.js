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
            if (data != true)
                $(".name_alert").text(data);
        }
    });
}
function check_onfocus() {

    $(".name_alert").text('');
}

function checkForm(thisform) {
    var bol=false;
    with (thisform)
    {
        if (name.value === "")
        {
            name.focus();
            alert("用户名不能为空");
            return false;
        } else if (password.value === "") {
            password.focus();
            alert("密码不能为空");
            return false;
        } else {
            $.ajax({
                type: "POST",
                async: false,
                cache : false,
                dataType: "text",
                url: localhostPath + "/index.php/first/psw_isRight",
                data: {name: name.value, password: password.value},
                success: function (data) {
                    if(data==0){
                        bol=true;
                    }else if(data==1){
                        bol=false;
                        $('.login_info').text("密码错误");
                    }else{
                        bol=false;
                        $('.login_info').text("用户压根儿不存在");
                    }
                }});
            return bol;
        }
    }
}

