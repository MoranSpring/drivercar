<style>
    .info_change ul{
        width: 100%;
        overflow: hidden;
        margin: 20px 0px;
    }
    .am-margin-top {
        margin-top: 0px;
    }
    .testli{
        width: 100%;
        float: left;
        overflow: hidden;
    }
    .info_change_div{
        float: left;
        overflow: hidden;
        display: inline-block;
    }
    .info_change_div span{
        float: left;
        overflow: hidden;
    }
    .info_change_div a{
        margin: 0px 20px;
    }
    .testli select {
        width: 100px;
    }
</style>
<script src="<?php echo base_url() . 'application/js/jquery.cxselect.min.js' ?>" type="text/javascript"></script>
<script>
    $(document).ready(function () {
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
        add_mouse_event($('#self_intro_div'), $('#selfintro_change_a'));
        //真实信息
        add_mouse_event($('#real_name_div'), $('#real_name_a'));
        add_mouse_event($('#card_id_div'), $('#card_id_a'));
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
        document.onkeypress = ValidateSpecialCharacter;
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
                span_id.empty().append('<input type="text" style="width:200px;height:25px;" onkeypress="ValidateSpecialCharacter()" maxlength=12 placeholder="' + span_init + '" class="inputtext" id="inputtext"/>');
                $('.inputtext').focus();
                a_id.html('确定');
                $('.inputtext').blur(function () {
                    var inputtext = $('.inputtext').val();
                    if (inputtext != "") {
                        //==============AJAX===================
                        $.ajax({
                            type: "POST",
                            dataType: "text",
                            url: "<?= base_url() ?>index.php/info_change/nickName",
                            async: true,
                            data: {nickName: inputtext},
                            success: function (data) {
                                alert(data);

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
            var span_init = span_id.html();
            nick_name_change(span_id, a_id, span_init);
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
                            url: "<?= base_url() ?>index.php/info_change/selfIntro",
                            async: true,
                            data: {selfIntro: inputtext},
                            success: function (data) {
                                alert(data);
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
                                url: "<?= base_url() ?>index.php/info_change/realName",
                                async: true,
                                data: {realName: inputtext},
                                success: function (data) {
                                    alert(data);
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
            var myDate = new Date();
            var month = myDate.getMonth() + 1;
            var day = myDate.getDate();
            var age = myDate.getFullYear() - cardId.substring(6, 10) - 1;
            if (cardId.substring(10, 12) < month || cardId.substring(10, 12) == month && cardId.substring(12, 14) <= day) {
                age++;
            }
            var age_span=document.getElementById("age_span");
            age_span.innerHTML=age;
            $.ajax({
                type: "POST",
                dataType: "text",
                url: "<?= base_url() ?>index.php/info_change/ageChange",
                async: true,
                data: {age: age},
                success: function (data) {
                    alert(data);
                }});
        }
        function gender_change(cardId) {

            var gender_value=1;
            var gender_span = document.getElementById("sex_span");
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
                url: "<?= base_url() ?>index.php/info_change/genderValue",
                async: true,
                data: {genderValue: gender_value},
                success: function (data) {
                    alert(data);
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
                                url: "<?= base_url() ?>index.php/info_change/cardId",
                                async: true,
                                data: {cardId: inputtext},
                                success: function (data) {
                                    alert(data);
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
        
        //获取故乡select中的值并显示在span中
        $('#btnSave').click(function(){
            var hometown_span = document.getElementById("hometown_span");
            var proviences = document.getElementById("proviences");
            var citys = document.getElementById("citys");
            var areas = document.getElementById("areas");
            if(proviences.value==0){
                proviences.value="";
            }
            if(citys.value==0){
                citys.value="";
            }
            if(areas.value==0){
                areas.value="";
            }
            hometown_span.innerHTML=proviences.value+"  "+citys.value+"  "+areas.value;
            if(hometown_span.innerHTML!=""){
                proviences.style.display="none";
                citys.style.display="none";
                areas.style.display="none";
                hometown_span.style.display="block";
            }else{
                proviences.style.display="";
                citys.style.display="";
                areas.style.display="";
                hometown_span.style.display="none";
            }
            
        });
        //获取故乡select中的值并显示在span中
        $('#btnCancel').click(function(){
            var hometown_span = document.getElementById("hometown_span");
            var proviences = document.getElementById("proviences");
            var citys = document.getElementById("citys");
            var areas = document.getElementById("areas");
            if(proviences.value==""){
                proviences.value=0;
            }
            if(citys.value==""){
                citys.value=0;
            }
            if(areas.value==""){
                areas.value=0;
            }
            proviences.style.display="";
            citys.style.display="";
            areas.style.display="";
            hometown_span.style.display="none";
            
        });
    });

</script>
<div id="content" class="clearfix">
    <div id="con-left">
        <ul>
            <li><a href="<?= base_url() . 'index.php/vipcenter/vip_center' ?>"><span>个人信息</span></a></li>
            <li><a href="<?= base_url() . 'index.php/vipcenter/study_progress' ?>"><span>学习进度</span></a></li>
            <li><a href="<?= base_url() . 'index.php/vipcenter/study_book' ?>"><span>预约培训</span></a></li>
            <li><a href="<?= base_url() . 'index.php/vipcenter/management' ?>"><span>学习管理</span></a></li>
            <li><a href="<?= base_url() . 'index.php/vipcenter/feedback' ?>"><span>学习反馈</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/sch_info' ?>"><span>我的积分</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/sch_info' ?>"><span>申诉</span></a></li>
            <li><a href="<?= base_url() . 'index.php/first/sch_info' ?>"><span>我的学友</span></a></li>
        </ul>
    </div>
    <div id="con-right">
        <div id="con-nav">
            <p><a href="void">首页</a> > <a href="void">会员中心</a> >个人信息</p>
        </div>
        <div id="con-con" class ="real_content ">
            <div class="info_change">
                <div class=" base_info_change">
                    <form id="base_info_change_form" method="post" action="base_info_change_submit.action" >
                        <div class="change_info_title">
                            <p >修改基本信息</p>
                        </div>
                        <ul>
                            <li class="testli">        
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-3 am-u-md-3 am-text-right">
                                        昵称:  
                                    </div>
                                    <div id="info_change_div" class="am-u-sm-9 am-u-md-9 am-u-end col-end info_change_div" >
                                        <span id="nick_name_span" class="span_con">Kyle</span>
                                        <a id="nick_change_a" class="a_change"  href="#" style="display:none;"  >修改</a>
                                    </div>
                                </div>
                            </li>
                            <li class="testli">        
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-3 am-u-md-3 am-text-right">
                                        自我介绍:
                                    </div>
                                    <div id="self_intro_div" class="am-u-sm-9 am-u-md-9 am-u-end col-end info_change_div" >
                                        <span id="self_intro_span" class="span_con">这个人很懒,什么也没留下。</span>
                                        <a id="selfintro_change_a" class="a_change"  href="#" style="display:none;"  >修改</a>
                                    </div>
                                </div>
                            </li>
                            <li class="testli">        
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-3 am-u-md-3 am-text-right">
                                        故乡:
                                    </div>
                                    <div id="hometown_div" class="am-u-sm-9 am-u-md-9 am-u-end col-end info_change_div" >
                                        <p id="city_china_val" >
                                            <select id="proviences" class="province cxselect" data-value="湖北省" data-first-title="选择省" disabled="disabled"></select>
                                            <select id="citys" class="city cxselect" data-value="武汉市" data-first-title="选择市" disabled="disabled" onchange="saveCityList()"></select>
                                            <select id="areas" class="area cxselect" data-value="洪山区" data-first-title="选择地区" disabled="disabled"></select>
                                            <span id="hometown_span"></span>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="testli">        
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-3 am-u-md-3 am-text-right">
                                        所在地:
                                    </div>
                                    <div id="living_place_div" class="am-u-sm-9 am-u-md-9 am-u-end col-end info_change_div" >
                                        <p id="living_city_val">
                                            <select class="province cxselect" data-value="湖北省" data-first-title="选择省" disabled="disabled"></select>
                                            <select id="living_city" class="city cxselect" data-value="武汉市" data-first-title="选择市" disabled="disabled" onchange="saveLivingList()"></select>
                                            <select class="area cxselect" data-value="洪山区" data-first-title="选择地区" disabled="disabled"></select>
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>   
                        <div class="change_save">
                            <div class="save_cancel">
                                <span>
<!--                                    <input id="btnSave" type="submit" name="save" value="保存">
                                    <input id="btnCancel" type="button" name="cancel" value="取消">-->
                                    <input id="btnSave" type="button" name="save" value="保存">
                                    <input id="btnCancel" type="button" name="cancel" value="取消">
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
                <div >
                    <hr>
                </div>
                <div class="real_change">
                    <form id="real_info_change_form" method="post" action="real_info_change_submit.action" >
                        <div class="change_info_title">
                            <p >修改真实信息</p>
                        </div>
                        <ul>
                            <li class="testli">        
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-3 am-u-md-3 am-text-right">
                                        姓名:
                                    </div>
                                    <div id="real_name_div" class="am-u-sm-9 am-u-md-9 am-u-end col-end info_change_div" >
                                        <span id="real_name_span" class="span_con">张三</span>
                                        <a id="real_name_a" class="a_change"  href="#" style="display:none;"  >修改</a>
                                    </div>
                                </div>
                            </li>
                            <li class="testli">        
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-3 am-u-md-3 am-text-right">
                                        身份证号:
                                    </div>
                                    <div id="card_id_div" class="am-u-sm-9 am-u-md-9 am-u-end col-end info_change_div" >
                                        <span id="card_id_span" class="span_con">未填写</span>
                                        <a id="card_id_a" class="a_change"  href="#" style="display:none;"  >修改</a>
                                    </div>
                                </div>
                            </li>
                            <li class="testli">        
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-3 am-u-md-3 am-text-right">
                                        性别:
                                    </div>
                                    <div id="sex_div" class="am-u-sm-9 am-u-md-9 am-u-end col-end" >
                                        <span id="sex_span">男</span>
                                    </div>
                                </div>
                            </li>
                            <li class="testli">        
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-3 am-u-md-3 am-text-right">
                                        年龄:
                                    </div>
                                    <div id="age_div" class="am-u-sm-9 am-u-md-9 am-u-end col-end info_change_div" >
                                        <span id="age_span">0</span>                                  
                                    </div>
                                </div>
                            </li>
                        </ul>   
                        <div class="change_save">
                            <div class="save_cancel">
                                <span>
                                    <input type="submit" name="save" value="保存">
                                    <input type="button" name="cancel" value="取消">
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
                <div >
                    <hr>
                </div>
                <div class="mail_change">
                    <div class="change_info_title">
                        <p >修改邮箱</p>
                    </div>
                    <div class="important-info">
                        <p>
                            <span>邮箱</span>
                            <span class="click-change">
                                <input class="input_txt" type="text" name="real_age" placeholder="当前邮箱">
                                <input class="input_btn" type="button" value="修改邮箱">
                            </span>
                        </p>
                        <p class="changetips">点击修改邮箱，系统会向您的手机发送验证码，请输入验证码，然后输入新的邮箱。</p>

                        <p><span>验证码</span><span class="yanzhengma"><input type="text"  class="input_txt"  name="real_age" placeholder="验证码">*</span></p>
                        <p><span>输入新邮箱</span><span class="yanzhengma"><input type="text" name="real_age"  class="input_txt"  placeholder="新邮箱地址">*</span></p>
                    </div>
                    <div class="change_save">
                        <div class="save_cancel">
                            <span>
                                <input type="button" name="save" value="保存">
                                <input type="button" name="cancel" value="取消">
                            </span>
                        </div>
                    </div>
                </div>
                <div >
                    <hr>
                </div>
                <div class="pwd_change">
                    <div class="change_info_title">
                        <p >修改密码</p>
                    </div>
                    <div class="important-info">
                        <p>
                            <span>密码</span>
                            <span class="click-change">
                                <input class="input_txt" type="password" name="real_age" >
                                <input class="input_btn" type="button" value="修改密码">
                            </span>
                        </p>
                        <p  class="changetips">点击修改密码，系统会向您的手机发送验证码，请输入验证码，然后输入新的密码。</p>
                        <p><span>验证码</span><span class="yanzhengma"><input type="text"  class="input_txt"  name="real_age" placeholder="验证码">*</span></p>
                        <p><span>输入新密码</span><span class="yanzhengma"><input type="text" name="real_age"  class="input_txt"  placeholder="新密码">*</span></p>
                        <p><span>再次输入新密码</span><span class="yanzhengma"><input type="text" name="real_age"  class="input_txt"  placeholder="再次输入新密码">*</span></p>
                    </div>
                    <div class="change_save">
                        <div class="save_cancel">
                            <span>
                                <input type="button" name="save" value="保存">
                                <input type="button" name="cancel" value="取消">
                            </span>
                        </div>
                    </div>
                </div>
                <div >
                    <hr>
                </div>
                <div class="telnum_change">
                    <div class="change_info_title">
                        <p >修改手机号码</p>
                    </div>
                    <div class="important-info">
                        <p>
                            <span>手机号</span>
                            <span class="click-change">
                                <input class="input_txt" type="text" name="real_age" >
                                <input class="input_btn" type="button" value="修改手机">
                            </span>
                        </p>
                        <p class="changetips">点击修改手机号码，系统会向您的手机发送验证码，请输入验证码，然后输入新的手机号。</p>
                        <p><span>验证码</span><span class="yanzhengma"><input  class="input_txt"  type="text" name="real_age" placeholder="验证码">*</span></p>
                        <p><span>输入新手机号码</span><span class="yanzhengma"><input type="text"  class="input_txt"  name="real_age" placeholder="新手机号">*</span></p>
                    </div>
                    <div class="change_save">
                        <div class="save_cancel">
                            <span>
                                <input type="button" name="save" value="保存">
                                <input type="button" name="cancel" value="取消">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $.cxSelect.defaults.url = "<?php echo base_url() . 'application/js/cityData.min.json' ?>";
    $('#city_china_val').cxSelect({
        selects: ['province', 'city', 'area']
    });
    $('#living_city_val').cxSelect({
        selects: ['province', 'city', 'area'],
        nodata: 'none'
    });
    function saveCityList() {
        var select = document.getElementById("citys");
        var lastIndex = select.selectedIndex;
        var midValue = select.options[lastIndex].value;
        if (midValue != "0") {
            lastIndex = select.selectedIndex;
            lastValue = select.options[lastIndex].value;
        }
    }

    function saveLivingList() {
        var select = document.getElementById("living_city");
        var lastIndex = select.selectedIndex;
        var midValue = select.options[lastIndex].value;
        if (midValue != "0") {
            lastIndex = select.selectedIndex;
            lastValue = select.options[lastIndex].value;
        }
    }
</script>

<script>

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
//alert (IdCard('622901149005251010',3));

</script>
