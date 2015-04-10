var curWwwPath = window.document.location.href;
var pathName = window.document.location.pathname;
var pos = curWwwPath.indexOf(pathName);
var localhostPath = curWwwPath.substring(0, pos);
$(document).ready(function () {
    var allInfo;
    var pwd_hasmd5;
    $.ajax({
        type: "POST",
        dataType: "text",
        url: localhostPath + "/index.php/info_change/getAllInfo",
        async: true,
        success: function (data) {
            allInfo = eval("(" + data + ")");//转换为json对象 
            initAllInfo($('#nick_name_span'), allInfo[0].stu_nick_name);
            initAllInfo($('#qq_span'), allInfo[0].stu_qq);
            initAllInfo($('#self_intro_span'), allInfo[0].stu_self_intro);
            initAllInfo($('#hometown_span'), allInfo[0].stu_home_town);
            initAllInfo($('#livingplace_span'), allInfo[0].stu_living_place);
            initAllInfo($('#real_name_span'), allInfo[0].stu_true_name);
            initAllInfo($('#card_id_span'), allInfo[0].stu_id_num);
            initAllInfo($('#phone_num_span'), allInfo[0].stu_tel);
            inputInfo($('#email_active'), allInfo[0].stu_email);
            pwd_hasmd5 = allInfo[0].stu_pwd;

            gender_change(allInfo[0].stu_id_num);
            age_change(allInfo[0].stu_id_num);

            //$('#email_active').val(allInfo[0].stu_email);

//                $('#nick_name_span').html(allInfo[0].stu_nick_name);
//                alert(allInfo.length);
//                  alert(allInfo[0].stu_self_intro);
//                $('#categid').empty();
//                $.each(categes, function(i, item) {
//                $('#categid').append($("<option value='"+ item.id +"'>"+ item.cname +"</option>")); 
//                });
//            }
        }});
    function initAllInfo(span_id, init_html) {
        if (init_html != "" && init_html != null) {
            span_id.html(init_html);
        } else {
            span_id.html();
        }
    }
    function inputInfo(span_id, init_html) {
        if (init_html != "" && init_html != null) {
            span_id.val(init_html);
        } else {
            span_id.val();
        }
    }

    /**
     * 根据id添加鼠标移入事件
     * @param {type} div_id
     * @param {type} a_id
     * @returns {undefined}
     * auther Moran
     * */
    function add_mouse_event(div_id, a_id) {
        div_id.mouseover(function () {
            a_id.show();
        });
        div_id.mouseout(function () {
            a_id.hide();
        });
    }
    //基本信息
    add_mouse_event($('#info_change_div'), $('#nick_change_a'));
    add_mouse_event($('#qq_div'), $('#qq_a'));
    add_mouse_event($('#self_intro_div'), $('#selfintro_change_a'));
    add_mouse_event($('#home_town_div'), $('#home_town_a'));
    add_mouse_event($('#living_place_div'), $('#living_place_a'));
    //真实信息
    add_mouse_event($('#real_name_div'), $('#real_name_a'));
    add_mouse_event($('#card_id_div'), $('#card_id_a'));
    add_mouse_event($('#phone_num_div'), $('#phone_num_a'));

    /**
     * 昵称限制特殊字符验证
     */
    function ValidateSpecialCharacter() {
        var evt = (evt) ? evt : window.event;
        var specialKey = "~\!@()&#$%\^*\'\"\+";//Specific Key list
        var realkey = String.fromCharCode(evt.keyCode);
        var flg = false;
        flg = (specialKey.indexOf(realkey) >= 0);
        if (flg) {
            alert('请勿输入特殊字符: ' + realkey);
            return false;
        }
        return true;
    }
    $('#input_nick_text').onkeypress = ValidateSpecialCharacter;
    /**
     * 点击事件执行函数
     * @param {type} span_id
     * @param {type} a_id
     * @param {type} span_init
     * @returns {undefined}
     * auther Moran
     */
    function nick_name_change(span_id, a_id, span_init) {
        if (a_id.html() == '修改') {
            span_id.empty().append('<input type="text" style="width:200px;height:25px;" onkeypress="ValidateSpecialCharacter()" maxlength=12 placeholder="' + span_init + '" class="inputtext" id="input_nick_text"/>');
            $('#input_nick_text').focus();
            a_id.html('确定');
            $('#input_nick_text').blur(function () {
                var inputtext = $('#input_nick_text').val();
                if (inputtext != "") {
                    //==============AJAX===================
                    $.ajax({
                        type: "POST",
                        dataType: "text",
                        url: localhostPath + "/index.php/info_change/nickName",
                        async: true,
                        data: {nickName: inputtext},
                        success: function (data) {
                            //alert(data);

                        }});
                    //==============AJAX===================
                    span_id.empty().append(inputtext);
                } else if (inputtext == "") {
                    span_id.empty().append(span_init);
                }
                a_id.html("修改");
            });
        }
    }
    /**
     * 根据id为每个标签添加单击事件
     */    //昵称
    $('#nick_change_a').click(function () {
        var span_id = $('#nick_name_span');
        var a_id = $('#nick_change_a');
//            span_id.html(allInfo[0].stu_nick_name);
        var span_init = span_id.html();
        nick_name_change(span_id, a_id, span_init);
    });

    //QQ
    function isQQ(qq) {
        if (qq.search(/^[1-9]\d{4,8}$/) != -1) {
            return true;
        } else {
            return false;
        }
    }
    function QQ_change(span_id, a_id, span_init) {
        if (a_id.html() == '修改') {
            span_id.empty().append('<input class="qq_txt" id="qq_txt" type="text" style="width:200px;height:25px;"  maxlength=11 />');
            $('.qq_txt').focus();
            a_id.html('确定');
            $('.qq_txt').blur(function () {
                var inputtext = $('.qq_txt').val();

                if (inputtext != "") {
                    if (isQQ(inputtext)) {
                        $.ajax({
                            type: "POST",
                            dataType: "text",
                            url: localhostPath + "/index.php/info_change/qqNum",
                            async: true,
                            data: {qq: inputtext},
                            success: function (data) {
                            }});
                        span_id.empty().append(inputtext);
                    } else {
                        return;
                    }
                } else if (inputtext == "") {
                    span_id.empty().append(span_init);
                }
                a_id.html("修改");
            });
        }
    }
    //手机号码
    $('#qq_a').click(function () {
        var span_id = $('#qq_span');
        var a_id = $('#qq_a');
        var span_init = span_id.html();
        QQ_change(span_id, a_id, span_init);
    });

    //*********************************自我介绍**********************************************
    /**
     * 修改自我介绍
     * @param {type} span_id
     * @param {type} a_id
     * @param {type} span_init
     * @returns {undefined}         */
    function self_info_change(span_id, a_id, span_init) {
        if (a_id.html() == '修改') {
            span_id.empty().append('<textarea id="self_info_txt" class="self_info_txt" placeholder="' + span_init + '" style="max-height: 150px;width:300px; overflow: scroll;" maxlength="200" />');
            // span_id.empty().append('<input type="text" style="width:200px;height:25px;" onkeypress="ValidateSpecialCharacter()" maxlength=12  class="inputtext" id="inputtext"/>');
            $('.self_info_txt').focus();
            a_id.html('确定');
            $('.self_info_txt').blur(function () {
                var inputtext = $('.self_info_txt').val();
                if (inputtext != "") {
                    $.ajax({
                        type: "POST",
                        dataType: "text",
                        url: localhostPath + "/index.php/info_change/selfIntro",
                        async: true,
                        data: {selfIntro: inputtext},
                        success: function (data) {
                        }});
                    span_id.empty().append(inputtext);
                } else if (inputtext == "") {
                    span_id.empty().append(span_init);
                }
                a_id.html("修改");
            });
        }
    }
    //自我介绍
    $('#selfintro_change_a').click(function () {
        var span_id = $('#self_intro_span');
        var a_id = $('#selfintro_change_a');
        var span_init = span_id.html();
        self_info_change(span_id, a_id, span_init);
    });
    //真实姓名
    //只能输入中文
    function isChn(str) {
        var reg = /^[\u4E00-\u9FA5]+$/;
        if (!reg.test(str)) {
            return false;
        }
        return true;
    }
    function real_name_change(span_id, a_id, span_init) {
        if (a_id.html() == '修改') {
            span_id.empty().append('<input type="text" style="width:200px;height:25px;"  maxlength=4 placeholder="' + span_init + '" class="real_name_txt" id="real_name_txt" />');
            $('.real_name_txt').focus();
            a_id.html('确定');
            $('.real_name_txt').blur(function () {
                var inputtext = $('.real_name_txt').val();
                if (inputtext != "") {
                    if (isChn(inputtext)) {
                        $.ajax({
                            type: "POST",
                            dataType: "text",
                            url: localhostPath + "/index.php/info_change/realName",
                            async: true,
                            data: {realName: inputtext},
                            success: function (data) {
                                //alert(data);
                            }});
                        //===========ajax==========
                        span_id.empty().append(inputtext);
                    } else {
                        alert("请输入中文");
                        return;
                    }
                } else if (inputtext == "") {
                    span_id.empty().append(span_init);
                }
                a_id.html("修改");
            });
        }
    }
    $('#real_name_a').click(function () {
        var span_id = $('#real_name_span');
        var a_id = $('#real_name_a');
        var span_init = span_id.html();
        real_name_change(span_id, a_id, span_init);
    });
    //*********************************身份证号**********************************************
    /*
     * 身份证15位编码规则：dddddd yymmdd xx p
     * dddddd：6位地区编码
     * yymmdd: 出生年(两位年)月日，如：910215
     * xx: 顺序编码，系统产生，无法确定
     * p: 性别，奇数为男，偶数为女
     * 
     * 身份证18位编码规则：dddddd yyyymmdd xxx y
     * dddddd：6位地区编码
     * yyyymmdd: 出生年(四位年)月日，如：19910215
     * xxx：顺序编码，系统产生，无法确定，奇数为男，偶数为女
     * y: 校验码，该位数值可通过前17位计算获得
     * 
     * 前17位号码加权因子为 Wi = [ 7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2 ]
     * 验证位 Y = [ 1, 0, 10, 9, 8, 7, 6, 5, 4, 3, 2 ]
     * 如果验证码恰好是10，为了保证身份证是十八位，那么第十八位将用X来代替
     * 校验位计算公式：Y_P = mod( ∑(Ai×Wi),11 )
     * i为身份证号码1...17 位; Y_P为校验码Y所在校验码数组位置
     */
    function validateIdCard(idCard) {
        //15位和18位身份证号码的正则表达式
        var regIdCard = /^(^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$)|(^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])((\d{4})|\d{3}[Xx])$)$/;

        //如果通过该验证，说明身份证格式正确，但准确性还需计算
        if (regIdCard.test(idCard)) {
            if (idCard.length == 18) {
                var idCardWi = new Array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2); //将前17位加权因子保存在数组里
                var idCardY = new Array(1, 0, 10, 9, 8, 7, 6, 5, 4, 3, 2); //这是除以11后，可能产生的11位余数、验证码，也保存成数组
                var idCardWiSum = 0; //用来保存前17位各自乖以加权因子后的总和
                for (var i = 0; i < 17; i++) {
                    idCardWiSum += idCard.substring(i, i + 1) * idCardWi[i];
                }
                var idCardMod = idCardWiSum % 11;//计算出校验码所在数组的位置
                var idCardLast = idCard.substring(17);//得到最后一位身份证号码

                //如果等于2，则说明校验码是10，身份证号码最后一位应该是X
                if (idCardMod == 2) {
                    if (idCardLast == "X" || idCardLast == "x") {
                        alert("恭喜通过验证啦！");
                        return true;
                    } else {
                        alert("身份证号码错误！");
                        return false;
                    }
                } else {
                    //用计算出的验证码与最后一位身份证号码匹配，如果一致，说明通过，否则是无效的身份证号码
                    if (idCardLast == idCardY[idCardMod]) {
                        alert("恭喜通过验证啦！");
                        return true;
                    } else {
                        alert("身份证号码错误！");
                        return false;
                    }
                }
            }
        } else {
            alert("身份证格式不正确!");
            return false;
        }
    }
    function age_change(cardId) {
        var age_span = document.getElementById("age_span");
        if (cardId == "" || cardId == null) {
            age_span.innerHTML = "默认";
            return;
        }
        var myDate = new Date();
        var month = myDate.getMonth() + 1;
        var day = myDate.getDate();
        var age = myDate.getFullYear() - cardId.substring(6, 10) - 1;
        if (cardId.substring(10, 12) < month || cardId.substring(10, 12) == month && cardId.substring(12, 14) <= day) {
            age++;
        }
        age_span.innerHTML = age;
        $.ajax({
            type: "POST",
            dataType: "text",
            url: localhostPath + "/index.php/info_change/ageChange",
            async: true,
            data: {age: age},
            success: function (data) {
            }});
    }
    function gender_change(cardId) {
        var gender_span = document.getElementById("sex_span");
        if (cardId == "" || cardId == null) {
            gender_span.innerHTML = "0";
            return;
        }
        var gender_value = 1;

        if (parseInt(cardId.substr(16, 1)) % 2 == 1) {
            gender_span.innerHTML = "男";
            gender_value = 1;

        } else {
            gender_span.innerHTML = "女";
            gender_value = 0;
        }
        $.ajax({
            type: "POST",
            dataType: "text",
            url: localhostPath + "/index.php/info_change/genderValue",
            async: true,
            data: {genderValue: gender_value},
            success: function (data) {
                //alert(data);
            }});
    }
    function card_id_change(span_id, a_id, span_init) {
        if (a_id.html() == '修改') {
            span_id.empty().append('<input class="card_id_txt" id="card_id_txt" type="text" style="width:200px;height:25px;"  maxlength=18 />');
            $('.card_id_txt').focus();
            a_id.html('确定');
            $('.card_id_txt').blur(function () {
                var inputtext = $('.card_id_txt').val();
                if (inputtext != "") {
                    if (validateIdCard(inputtext)) {
                        $.ajax({
                            type: "POST",
                            dataType: "text",
                            url: localhostPath + "/index.php/info_change/cardId",
                            async: true,
                            data: {cardId: inputtext},
                            success: function (data) {
                                //alert(data);
                            }});
                        age_change(inputtext);
                        gender_change(inputtext);
                        span_id.empty().append(inputtext);
                    } else {
                        return;
                    }
                } else if (inputtext == "") {
                    span_id.empty().append(span_init);
                }
                a_id.html("修改");
            });
        }
    }
    //身份证号
    $('#card_id_a').click(function () {
        var span_id = $('#card_id_span');
        var a_id = $('#card_id_a');
        var span_init = span_id.html();
        card_id_change(span_id, a_id, span_init);
    });

    //验证手机号
    function isphone(num) {
        var partten = /^1[3,5,7,8]\d{9}$/;
        if (partten.test(num)) {
            return true;
        } else {
            return false;
        }
    }
    //手机号修改
    function phone_num_change(span_id, a_id, span_init) {
        if (a_id.html() == '修改') {
            span_id.empty().append('<input class="phone_num_txt" id="phone_num_txt" type="text" style="width:200px;height:25px;"  maxlength=11 />');
            $('.phone_num_txt').focus();
            a_id.html('确定');
            $('.phone_num_txt').blur(function () {
                var inputtext = $('.phone_num_txt').val();

                if (inputtext != "") {
                    if (isphone(inputtext)) {
                        $.ajax({
                            type: "POST",
                            dataType: "text",
                            url: localhostPath + "/index.php/info_change/phoneNum",
                            async: true,
                            data: {phonenum: inputtext},
                            success: function (data) {
                            }});
                        span_id.empty().append(inputtext);
                    } else {
                        return;
                    }
                } else if (inputtext == "") {
                    span_id.empty().append(span_init);
                }
                a_id.html("修改");
            });
        }
    }
    //手机号码
    $('#phone_num_a').click(function () {
        var span_id = $('#phone_num_span');
        var a_id = $('#phone_num_a');
        var span_init = span_id.html();
        phone_num_change(span_id, a_id, span_init);
    });


    function home_town_change(province, city, area, city_sec, span_id, a_id, span_init) {
        var span_con;
        //var city_sec=document.getElementById("home_town_sec");
        if (a_id.html() == '修改') {
            span_id.html(span_init);
            span_id.hide();
            city_sec.style.display = "inline-block";
            a_id.html('确定');

        } else if (a_id.html() == '确定') {
            var pro = province.val();
            var cit = city.val();
            var are = area.val();
            if (pro == 0 || pro == "0" || pro == null) {
                pro = span_init;
            }
            if (cit == 0 || cit == "0" || cit == null) {
                cit = "";
            }
            if (are == 0 || are == "0" || are == null) {
                are = "";
            }
            span_con = pro + ' ' + cit + ' ' + are;
            span_id.html(span_con);
            span_id.show();
            city_sec.style.display = "none";

            $.ajax({
                type: "POST",
                dataType: "text",
                url: localhostPath + "/index.php/info_change/homeTown",
                async: true,
                data: {hometown: span_con},
                success: function (data) {
                    //alert(data);
                }});

            a_id.html("修改");
        } else {
        }
    }

    $('#home_town_a').click(function () {
        var provience = $('#home_province');
        var city = $('#home_city');
        var area = $('#home_area');
        var city_sec = document.getElementById("home_town_sec");
        var span_id = $('#hometown_span');
        var a_id = $('#home_town_a');
        var span_init = span_id.html();
        home_town_change(provience, city, area, city_sec, span_id, a_id, span_init);
    });
    function living_place_change(province, city, area, city_sec, span_id, a_id, span_init) {
        var span_con;
        //var city_sec=document.getElementById("home_town_sec");
        if (a_id.html() == '修改') {
            span_id.html(span_init);
            span_id.hide();
            city_sec.style.display = "inline-block";
            a_id.html('确定');

        } else if (a_id.html() == '确定') {
            var pro = province.val();
            var cit = city.val();
            var are = area.val();
            if (pro == 0 || pro == "0" || pro == null) {
                pro = span_init;
            }
            if (cit == 0 || cit == "0" || cit == null) {
                cit = "";
            }
            if (are == 0 || are == "0" || are == null) {
                are = "";
            }
            span_con = pro + ' ' + cit + ' ' + are;
            span_id.html(span_con);
            span_id.show();
            city_sec.style.display = "none";

            $.ajax({
                type: "POST",
                dataType: "text",
                url: localhostPath + "/index.php/info_change/livingPlace",
                async: true,
                data: {livingplace: span_con},
                success: function (data) {
                    //alert(data);
                }});

            a_id.html("修改");
        } else {
        }
    }
    $('#living_place_a').click(function () {
        var provience = $('#living_province');
        var city = $('#living_city');
        var area = $('#living_area');
        var city_sec = document.getElementById("living_city_sec");
        var span_id = $('#livingplace_span');
        var a_id = $('#living_place_a');
        var span_init = span_id.html();
        living_place_change(provience, city, area, city_sec, span_id, a_id, span_init);
    });

    //*******************************根据验证码修改邮箱***************************************
    function randomAlphanumeric(dstElem, charsLength, chars) {

        //var dstElem = document.getElementById(dstObj); 

        var length = charsLength;

        if (!chars)
            var chars = "abcdefghijkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ23456789";

        var randomChars = "";

        for (x = 0; x < length; x++) {
            var i = Math.floor(Math.random() * chars.length);
            randomChars += chars.charAt(i);
        }

        randomChars;
        return  randomChars;
    }
    //面是一个生成8位随机密码的调用示例：
    //<script src="function.js" type="text/javascript">
    //<!--<input id="password" type="text" name="username" value='' tabindex="100" /> 
    //<input type='button', value='Random' class='button' onclick="//javascript:randomAlphanumeric('password',8)"> 
    //生成6位随机数字：
    //onclick="javascript:randomAlphanumeric('password',6, '0123456789') -->
    $('#btn_send_mailkey').click(function () {
        var email_key_str = randomAlphanumeric('text', 8, '0123456789abcdefghijkmnpqrstuvwxyz');
        //$('#input_mail_num').val(email_num_str);
        var email_active = $('#email_active').val();
        //alert(email_key_str+":"+email_active);
        $.ajax({
            type: "POST",
            dataType: "text",
            url: localhostPath + "/index.php/info_change/mailKeyToSession",
            async: true,
            data: {email_key_str: email_key_str, email_active: email_active},
            success: function (data) {
                //alert(data);
            }});
    });
    //验证邮箱格式
    function isEmail(email) {
        var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\-|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
        if (!myreg.test(email))
            return false;
        return true;
    }
    $('#btn_save_newmail').click(function () {
        var input_mail_num = $('#input_mail_num').val();
        var new_email_address = $('#new_email_address').val();
        //alert(new_email_address+":"+isEmail(new_email_address));
        if (isEmail(new_email_address)) {
            $.ajax({
                type: "POST",
                dataType: "text",
                url: localhostPath + "/index.php/info_change/mailValidate",
                async: true,
                data: {input_mail_num: input_mail_num, new_email_address: new_email_address},
                success: function (data) {
                    //alert(data);
                    $('#email_active').val(new_email_address);
                    alert("邮箱修改成功");
                }});
        } else {
            alert("请输入正确的邮箱地址");
        }

    });

    //*******************************根据验证邮箱修改密码***************************************
//        $('#btn_send_pwdkey').click(function(){
//        
//            var pwd_key_str=randomAlphanumeric('text',8, '0123456789abcdefghijkmnpqrstuvwxyz');
//            //$('#input_mail_num').val(email_num_str);
//            alert(pwd_key_str);
//            var email_active=$('#email_active').val();
//            $.ajax({
//                    type: "POST",
//                    dataType: "text",
//                    url: "<?= base_url() ?>index.php/info_change/pwdKeyToSession",
//                    async: true,
//                    data: {pwd_key_str: pwd_key_str,email_active:email_active},
//                    success: function (data) {
//                    alert(data);
//            }});
//        });
    function isStrSame(str1, str2) {
        if (str1 === str2) {
            return true;
        } else {
            return false;
        }
    }
    function IdCard(UUserCard, num) {
        if (num == 1) {
            //获取出生日期
            birth = UUserCard.substring(6, 10) + "-" + UUserCard.substring(10, 12) + "-" + UUserCard.substring(12, 14);
            return birth;
        }
        if (num == 2) {
            //获取性别
            if (parseInt(UUserCard.substr(16, 1)) % 2 == 1) {
                return "男";
            } else {
                return "女";
            }
        }
        if (num == 3) {
            //获取年龄
            var myDate = new Date();
            var month = myDate.getMonth() + 1;
            var day = myDate.getDate();
            var age = myDate.getFullYear() - UUserCard.substring(6, 10) - 1;
            if (UUserCard.substring(10, 12) < month || UUserCard.substring(10, 12) == month && UUserCard.substring(12, 14) <= day) {
                age++;
            }
            return age;
        }
    }
//        $('#btn_save_newpwd').click(function(){
//            var pwd_vali_key=$('#pwd_vali_key').val();
//            var new_pwd_one=$('#new_pwd_one').val();
//            var new_pwd_two=$('#new_pwd_two').val();
//            if(isStrSame(new_pwd_one,new_pwd_two)){
//                $.ajax({
//                    type: "POST",
//                    dataType: "text",
//                    url: "<?= base_url() ?>index.php/info_change/pwdValidate",
//                    async: true,
//                    data: {pwd_vali_key: pwd_vali_key,new_pwd_one:new_pwd_one},
//                    success: function (data) {
//                    //alert(data);
//                    alert("密码修改成功！");
//            }});
//            }else{
//                var change_pwd_tips=document.getElementById("change_pwd_tips");
//                change_pwd_tips.style.display="inline";
//                alert("两次密码输入不一致，请检查");
//            }
//        });

    //*******************************修改密码***************************************
    $('#btn_save_newpwd').click(function () {
        var pwd_active = $('#pwd_active').val();
        var new_pwd_one = $('#new_pwd_one').val();
        var new_pwd_two = $('#new_pwd_two').val();
        //var temp=pwd_hasmd5;
        if (isStrSame(new_pwd_one, new_pwd_two)) {
            $.ajax({
                type: "POST",
                dataType: "text",
                url: localhostPath + "/index.php/info_change/pwdChange",
                async: true,
                data: {pwd_active: pwd_active, new_pwd_one: new_pwd_one, pwd_hasmd5: pwd_hasmd5},
                success: function (data) {
                    alert("密码修改成功！");
                }});
        } else {
            var change_pwd_tips = document.getElementById("change_pwd_tips");
            change_pwd_tips.style.display = "inline";
            alert("两次密码输入不一致，请检查");
        }
    });

});

