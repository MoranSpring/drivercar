<script src="<?php echo base_url() . 'application/js/jquery.cxselect.min.js' ?>" type="text/javascript"></script>
<script src="<?php echo base_url() . 'application/js/vip/self_info.js' ?>" type="text/javascript"></script>
<script type="text/javascript" src="<?= base_url() ?>application/js/headpic/ajaxfileupload.js"></script>
<script type="text/javascript" src="<?= base_url() ?>application/js/headpic/artDialog4.1.6/jquery.artDialog.js?skin=default"></script>
<script type="text/javascript" src="<?= base_url() ?>application/js/headpic/artDialog4.1.6/plugins/iframeTools.js"></script>
<div id="content" class="clearfix">
    <div id="con-left">
        <ul>
            <li><a href="<?= base_url() . 'index.php/vipcenter/vip_center' ?>"><span>个人信息</span></a></li>
            <li><a href="<?= base_url() . 'index.php/vipcenter/study_progress' ?>"><span>学习进度</span></a></li>
            <li><a href="<?= base_url() . 'index.php/vipcenter/study_book' ?>"><span>预约培训</span></a></li>
            <li><a href="<?= base_url() . 'index.php/vipcenter/management' ?>"><span>学习管理</span></a></li>
            <li><a href="<?= base_url() . 'index.php/vipcenter/feedback' ?>"><span>学习反馈</span></a></li>
            <li><a href="<?= base_url() . 'index.php/vipcenter/point_manage' ?>"><span>我的积分</span></a></li>
            <li><a href="<?= base_url() . 'index.php/vipcenter/complain_manage' ?>"><span>申诉</span></a></li>
            <li><a href="<?= base_url() . 'index.php/vipcenter/my_partner' ?>"><span>我的学友</span></a></li>
        </ul>
    </div>
    <div id="con-right">
        <div id="con-nav">
            <p><a href="void">首页</a> > <a href="void">会员中心</a> >个人信息</p>
        </div>
        <div id="con-con" class ="real_content ">
            <div class="info_change">
                <div class=" base_info_change">
                    <!--<form id="base_info_change_form" method="post" action="base_info_change_submit.action" >-->
                        <div class="change_info_title">
                            <p >修改基本信息</p>
                        </div>
                        <ul>
                            <li class="testli">        
                                <div class="am-g">
                                    <div class="am-u-sm-3 am-u-md-3 am-text-right">
                                        昵称:  
                                    </div>
                                    <div id="info_change_div" class="am-u-sm-9 am-u-md-9 am-u-end col-end info_change_div" >
                                        <span id="nick_name_span" class="span_con">未填写</span>
                                        <a id="nick_change_a" class="a_change"  href="#" style="display:none;"  >修改</a>
                                    </div>
                                </div>
                            </li>
                            <li class="testli">        
                                <div class="am-g">
                                    <div class="am-u-sm-3 am-u-md-3 am-text-right">
                                        Q Q:  
                                    </div>
                                    <div id="qq_div" class="am-u-sm-9 am-u-md-9 am-u-end col-end info_change_div" >
                                        <span id="qq_span" class="span_con">未填写</span>
                                        <a id="qq_a" class="a_change"  href="#" style="display:none;"  >修改</a>
                                    </div>
                                </div>
                            </li>
                            <li class="testli">        
                                <div class="am-g">
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
                                <div class="am-g">
                                    <div class="am-u-sm-3 am-u-md-3 am-text-right city-txt">
                                        故乡:
                                    </div>
                                    <div id="home_town_div" class="am-u-sm-9 am-u-md-9 am-u-end col-end info_change_div" >
                                        <p id="city_china_val clearfix" >
                                            <span id="home_town_sec" class="city-sec"style="display:none;">
                                                <select id="home_province" class="province cxselect" data-value="湖北省" data-first-title="选择省" disabled="disabled" ></select>
                                                <select id="home_city" class="city cxselect" data-value="武汉市" data-first-title="选择市" disabled="disabled" onchange="saveCityList()"  ></select>
                                                <select id="home_area" class="area cxselect" data-value="洪山区" data-first-title="选择地区" disabled="disabled" ></select>
                                            </span>
                                            <span id="hometown_span" >请选择故乡</span>
                                            <a id="home_town_a" class="a_change"  href="#" style="display:none;" >修改</a>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="testli">        
                                <div class="am-g">
                                    <div class="am-u-sm-3 am-u-md-3 am-text-right city-txt">
                                        所在地:
                                    </div>
                                    <div id="living_place_div" class="am-u-sm-9 am-u-md-9 am-u-end col-end info_change_div" >
                                        <p id="living_city_val">
                                        <span id="living_city_sec"  class="city-sec" style="display:none;">
                                            <select id="living_province" class="province cxselect" data-value="湖北省" data-first-title="选择省" disabled="disabled"></select>
                                            <select id="living_city" class="city cxselect" data-value="武汉市" data-first-title="选择市" disabled="disabled" onchange="saveLivingList()"></select>
                                            <select id="living_area" class="area cxselect" data-value="洪山区" data-first-title="选择地区" disabled="disabled" ></select>
                                        </span>
                                            <span id="livingplace_span">请选择所在地</span>
                                            <a id="living_place_a" class="a_change"  href="#" style="display:none;"  >修改</a>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="testli">        
                                <div class="am-g">
                                    <div class="am-u-sm-3 am-u-md-3 am-text-right">
                                        用户头像:  
                                    </div>
                                    <div id="info_change_div" class="am-u-sm-9 am-u-md-9 am-u-end col-end info_change_div" >
                                        <input type="file" name="head_photo" id="head_photo" value="">
                                        <input type="hidden" name="photo_pic" id="photo_pic" value="">
                                    </div>
                                </div>
                            </li>
                        </ul>   
                       <div id="show_photo" class="show_photo" >
                             <img id="head_photo_src" style="width:150px;height:150px;" src="http://driver-un.oss-cn-shenzhen.aliyuncs.com/headpic/default.jpg" alt="">
                             
                     </div>
<!--                    </form>-->
                </div>
                <div >
                    <hr>
                </div>
                <div class="real_change">
<!--                    <form id="real_info_change_form" method="post" action="real_info_change_submit.action" >-->
                        <div class="change_info_title">
                            <p >修改真实信息</p>
                        </div>
                        <ul>
                            <li class="testli">        
                                <div class="am-g">
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
                                <div class="am-g">
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
                                <div class="am-g">
                                    <div class="am-u-sm-3 am-u-md-3 am-text-right">
                                        性别:
                                    </div>
                                    <div id="sex_div" class="am-u-sm-9 am-u-md-9 am-u-end col-end" >
                                        <span id="sex_span">男</span>
                                    </div>
                                </div>
                            </li>
                            <li class="testli">        
                                <div class="am-g">
                                    <div class="am-u-sm-3 am-u-md-3 am-text-right">
                                        年龄:
                                    </div>
                                    <div id="age_div" class="am-u-sm-9 am-u-md-9 am-u-end col-end info_change_div" >
                                        <span id="age_span">0</span>                                  
                                    </div>
                                </div>
                            </li>
                            <li class="testli">        
                                <div class="am-g">
                                    <div class="am-u-sm-3 am-u-md-3 am-text-right">
                                        手机号码:
                                    </div>
                                    <div id="phone_num_div" class="am-u-sm-9 am-u-md-9 am-u-end col-end info_change_div" >
                                        <span id="phone_num_span" class="span_con">未填写</span>
                                        <a id="phone_num_a" class="a_change"  href="#" style="display:none;"  >修改</a>
                                    </div>
                                </div>
                            </li>
                        </ul>   
                        
                    <!--</form>-->
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
                                <input id="email_active" class="input_txt" type="text" name="real_age" style="border-style:none" placeholder="当前邮箱"  readOnly="true">
                                <input id="btn_send_mailkey" class="input_btn am-btn am-btn-xs am-btn-danger" type="button" value="修改邮箱">
                            </span>
                        </p>
                        <div class="am-alert" data-am-alert>点击修改邮箱，系统会向您邮箱验证码，请输入验证码。
</div>

                        <p><span>原密码</span><span class="yanzhengma"><input type="text" id="input_mail_num"  class="input_txt"  name="real_age" placeholder="验证码">*</span></p>
                        <p><span>输入新邮箱</span><span  class="yanzhengma"><input id="new_email_address" type="text" name="real_age"  class="input_txt"  placeholder="新邮箱地址">*</span></p>
                    </div>
                    <div class="change_save">
                        <div class="save_cancel">
                            <span>
                                <input id="btn_save_newmail" class="am-btn am-btn-xs am-btn-danger" type="button" name="save" value="保存">
                                <input type="button" name="cancel" class="am-btn am-btn-xs" value="取消">
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
                        <div class="am-alert" data-am-alert>请先输入当前密码，再输入新密码。</div>
                        <!--<p  class="changetips">点击修改密码，系统会向您的手机发送验证码，请输入验证码，然后输入新的密码。</p>-->
                        <p><span>原密码</span></span><span class="yanzhengma change_pwd"><input id="pwd_active" type="password"  class="input_txt"  name="real_age" placeholder="原密码">*</p>
                        <p><span>新密码</span><span class="yanzhengma"><input id="new_pwd_one" type="password" name="real_age"  class="input_txt"  placeholder="新密码">*</span></p>
                        <p><span>重复新密码</span><span class="new_pwd_two"><input id="new_pwd_two" type="password" name="real_age"  class="input_txt"  placeholder="再次输入新密码">*<label class="change_pwd_tips"id="change_pwd_tips"style="display:none;" >两次输入不一致</label></span></p>
                    </div>
                    <div class="change_save">
                        <div class="save_cancel">
                            <span>
                                <input id="btn_save_newpwd" type="button" class="am-btn am-btn-xs am-btn-danger" name="save" value="保存">
                                <input type="button" name="cancel" class="am-btn am-btn-xs" value="取消">
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
                                <input class="input_txt" type="text" name="real_age"  readOnly="true">
                                <input class="input_btn am-btn am-btn-xs am-btn-danger" type="button" value="修改手机">
                            </span>
                        </p>
                        <p class="changetips">点击修改手机号码，系统会向您的手机发送验证码，请输入验证码，然后输入新的手机号。</p>
                        <p><span>验证码</span><span class="yanzhengma"><input  class="input_txt"  type="text" name="real_age" placeholder="验证码">*</span></p>
                        <p><span>输入新手机号码</span><span class="yanzhengma "><input type="text"  class="input_txt"  name="real_age" placeholder="新手机号">*</span></p>
                    </div>
                    <div class="change_save">
                        <div class="save_cancel">
                            <span>
                                <input type="button" name="save" class="input_btn am-btn am-btn-xs am-btn-danger" value="保存">
                                <input type="button" name="cancel" class="input_btn am-btn am-btn-xs " value="取消">
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
    $('#home_town_sec').cxSelect({
        selects: ['province', 'city', 'area']
    });
    $('#living_city_sec').cxSelect({
        selects: ['province', 'city', 'area'],
        nodata: 'none'
    });
    function saveCityList() {
        var select = document.getElementById("home_city");
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
<!--此为头像修改部分的JS代码-->
<script>

    
    var headpicBaseUrl="<?= base_url() ?>application/views/headpic/";
    var allInfo=null;
$(document).ready(function(e){
        
	//var fileuploadpath="<?= base_url() ?>application/views/headpic/;
        var path="<?= base_url() ?>application/views/headpic/upload.php";
	$('#head_photo').live('change',function(){ 
		ajaxFileUploadview('head_photo','photo_pic',path);
	});
        $.ajax({
            type: "POST",
            dataType: "text",
            url: "<?= base_url() ?>index.php/info_change/getAllInfo",
            async: true,
            success: function (data) {
                allInfo = eval("(" + data + ")");
                //alert("allInfo.stu_face====>"+allInfo[0].stu_face);
                var vipHeadurl=allInfo[0].stu_face;
                $("#head_photo_src").attr('src',vipHeadurl);
        }});

});

    function show_head(head_file){
        if(head_file!=null){
            //设置头像URL
            $("#head_photo_src").attr('src',head_file);	
            $.ajax({
                    type: "POST",
                    dataType: "text",
                    url: "<?= base_url() ?>index.php/info_change/VipHeadpicChange",
                    async: true,
                    data: {head_file: head_file},
                    success: function (data) {
                        var result = eval("(" + data + ")");
                        if(result.status == 1){
                            alert("头像修改成功");
                        }else{
                            alert("头像修改失败！");
                        }
            }});
        }else{
            
        }
    }
//文件上传带预览
function ajaxFileUploadview(imgid,hiddenid,url){
	$.ajaxFileUpload({
			url:url,
			secureuri:false,
			fileElementId:imgid,
			dataType: 'json',
			data:{name:'login', id:'id'},
			success: function (data, status)
			{
				if(typeof(data.error) != 'undefined')
				{
					if(data.error != '')
					{
						var dialog = art.dialog({title:false,fixed: true,padding:0});
						dialog.time(2).content("<div class='tips'>"+data.error+"</div>");
					}else{

						var resp = data.msg;						
						if(resp != '0000'){
							var dialog = art.dialog({title:false,fixed: true,padding:0});
							dialog.time(2).content("<div class='tips'>"+data.error+"</div>");
							return false;
						}else{
							$('#'+hiddenid).val(data.imgurl);
                                                        
                                                        //art.dialog.data('img',data.imgurl);
                                                        
                                                        var crop_url="<?= base_url() ?>index.php/info_change/showHeadImg?imgurl="+data.imgurl;
                                                        
							art.dialog.open(crop_url,{
								title: '裁剪头像',
								width:'680px',
								height:'400px'
							});						
							
							//dialog.time(3).content("<div class='msg-all-succeed'>上传成功！</div>");
						}

					}
				}
			},
			error: function (data, status, e)
			{

				dialog.time(3).content("<div class='tips'>"+e+"</div>");
			}
		})

	    return false;
	}

</script>