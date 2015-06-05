<style>
    .co-self{
        width:100%;
    }
    .co-self li{
        float: left;width:100%;
        list-style-type:none;
    }
    .co-self-info>li{
        clear:both;
    }
    .co-name{
        width:100%;
        background: #6B625D;
        padding: 0 0 0 20px;
    }
    .co-name p{
        color:#fff;
        font-size: 1.6em;
        line-height: 1.8em;
    }
    .co-name div{
        color:#DAD9D4;
        font-size: 1em;
        line-height:1.5em;
    }
    .co-self-third li{
        float: left;
        color:#444;
        width:30%;
        font-size: 1em;
        line-height: 1.6em;
    }
    .co-self-third{
        margin: 5px 0 0 0 ;
    }
    .co-coa-content{
        margin: 50px 0 0 0;
    }
    .co-self-edit-on{
        color:#fff;
        font-size: 0.8em;
        float: right;
        margin-right: 10px;
    }
    .co-self-edit-on:hover{
        color:#ddd;
    }
    .co-self-edit-off{
        display: none;
    }
</style>
<script type="text/javascript" src="<?= base_url() ?>application/js/headpic/ajaxfileupload.js"></script>
<script type="text/javascript" src="<?= base_url() ?>application/js/headpic/artDialog4.1.6/jquery.artDialog.js?skin=default"></script>
<script type="text/javascript" src="<?= base_url() ?>application/js/headpic/artDialog4.1.6/plugins/iframeTools.js"></script>

<div id="content" class="clearfix">
    <div id="con-coach-right">
        <div id="con-nav">
            <p><a href="void">首页</a>  >信息编辑</p>
        </div>
        <link type="text/css" href="<?= base_url() ?>application/css/ml.css" rel="stylesheet">
        <div>
            <ul class="co-self clearfix">
                <li style="width:60%">
                    <ul class="co-self-info clearfix">
                        <li>
                            <ul class="co-self-third clearfix">
                                <li style="text-align: right;color:#969EC3">
                                    姓名：
                                </li>
                                <li>
                                    <input id="coa_name"name="coa_name" value="" placeholder="姓名"/>
                                </li>
                            </ul>
                            <ul class="co-self-third clearfix">
                                <li style="text-align: right;color:#969EC3">
                                    年龄：
                                </li>
                                <li>
                                    <input id="coa_age" name="coa_age" placeholder="年龄"/>
                                </li>
                            </ul>
                            <ul class="co-self-third clearfix">
                                <li style="text-align: right;color:#969EC3">
                                    个人简介：
                                </li>
                                <li>
                                     <textarea style="width:168px;max-height: 200px;max-width: 200px;" name="coa_self_intro" id="coa_self_intro" placeholder="个人简介"></textarea>
                                </li>
                            </ul>
                            <ul class="co-self-third clearfix">
                                <li style="text-align: right;color:#969EC3">
                                    驾龄：
                                </li>
                                <li>
                                    <input id="coa_car_old" name="coa_car_old" placeholder="驾龄"/>
                                </li>
                            </ul>
                            <ul class="co-self-third clearfix">
                                <li style="text-align: right;color:#969EC3">
                                    手机号码：
                                </li>
                                <li>
                                    <input id="coa_telnum" name="coa_telnum" placeholder="手机号码"/>
                                </li>
                            </ul>
                            <ul class="co-self-third clearfix">
                                <li style="text-align: right;color:#969EC3">
                                    提供服务类型：
                                </li>
                                <li>
                                    <input type="checkbox" id="coa_serv_type" name="coa_serv_type" value="2" />科目二<br/>
                                    <input type="checkbox" id="coa_serv_type" name="coa_serv_type" value="3" />科目三
                                </li>
                            </ul> 
                            <ul class="co-self-third clearfix">
                                <li style="text-align: right;color:#969EC3">
                                    Filename:
                                </li>
                                <li>
                                    <!--<input type="file" name="file"   id="file"onchange="setImagePreview(this)"/>--> 
                                    <input type="file" name="head_photo" id="head_photo" value="">  
                                    <input type="hidden" name="photo_pic" id="photo_pic" value="">
                                </li>
                            </ul> 
                            <ul class="co-self-third clearfix">
                                <li>
                                    <button style="float:right" id="coa_info_subedit">提交</button>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li style="width:40%;" id="localImag">
                    <div id="show_photo" class="show_photo" style="border:1px solid #f7f7f7;">
                        <img id="head_photo_src" style="width:250px;height:250px;" src="">
                    </div>

                </li>
            </ul>
        </div>
    </div>
</div>
<script>
    var curWwwPath = window.document.location.href;
    var pathName = window.document.location.pathname;
    var pos = curWwwPath.indexOf(pathName);
    var localhostPath = curWwwPath.substring(0, pos);
    
    var headurl=null;
    $(document).ready(function(){
        var Allinfo='';
        var name=$('#coa_name');
        var age=$('#coa_age');
        var self_intro=$('#coa_self_intro');
        var driver_age=$('#coa_car_old');
        var telnum=$('#coa_telnum');
      

       
        function isName(name){
            var pattern=/[\u4e00-\u9fa5]{2,4}/;
            if (!pattern.exec(name)){
                return false;
            }else{
                return true;
            }  
        }
        function isAge(age){
            if (age<18||age>70){
                return false;
            }else{
                return true;
            }  
        }
        function isDriveAge(drive_age,age){
            if(isAge(drive_age)&&(age-drive_age>18)){
                return false;
            }else{
                return true;
            }  
        }
        function isTel(tel){
            var pattern=/((\d{11})|^((\d{7,8})|(\d{4}|\d{3})-(\d{7,8})|(\d{4}|\d{3})-(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1})|(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1}))$)/;
            if (!pattern.exec(tel)){    
                return false;
            }else{
                return true;
            } 
        }
        
        $.ajax({
            type:"POST",
            dataType:"text",
            url:localhostPath+"/index.php/coach/getCoaBaseInfo",
            async:true,
            data:{},
            success:function(data){
                //alert(data);
                Allinfo=eval("("+data+")");//转换为json对象
                name.val(Allinfo.name);
                age.val(Allinfo.age);
                self_intro.val(Allinfo.self_intro);
                driver_age.val(Allinfo.driver_age);
                telnum.val(Allinfo.tel_num);
                var servType=Allinfo.serv_type;
                setServType(servType);
                headurl=Allinfo.headurl;
                if(headurl==null){
                    headurl='http://driver-un.oss-cn-shenzhen.aliyuncs.com/headpic/default.jpg';
                }
                $("#head_photo_src").attr('src',headurl);	
            }
        });
        
        function setServType(servType){
            var obj=document.getElementsByName("coa_serv_type");
            var flag0=false;
            var flag1=false;
            if(servType==3){
                flag0=true;
                flag1=true;
            }else if(servType==2){
                 flag0=false;
                flag1=true;
            }else if(servType==1){
                flag0=true;
                flag1=false;
            }else{
                 flag0=false;
                flag1=false;
            }
            obj[0].checked=flag0;
            obj[1].checked=flag1;
        }    
        function getServType(){
            var obj=document.getElementsByName("coa_serv_type");
            var flag0=obj[0].checked;
            var flag1=obj[1].checked;
            var servType;
            if((flag0==true)&&(flag1==true)){
                servType=3;
            }else if((flag0==false)&&(flag1==true)){
                servType=2;
            }else if((flag0==true)&&(flag1==false)){
                servType=1;
            }else{
                servType=0;
            }
            return servType;
        }
        
        
        $('#coa_info_subedit').click(function(){
            var servType=getServType();
            var nameval=$('#coa_name').val();
            var ageval=$('#coa_age').val();
            var self_introval=$('#coa_self_intro').val();
            var car_oldval=$('#coa_car_old').val();
            var telnumval=$('#coa_telnum').val();
            var headurl=$('#head_photo_src')[0].src;
            
            if(!isName(nameval)){
                alert("姓名格式错误");
                return;
            }else if(!isAge(ageval)){
                alert("年龄范围不符合");
                return;
            }else if(!isDriveAge(car_oldval)){
                 alert("范围不符合");
                 return;
            }else if(!isTel(telnumval)){
                alert("电话号码不正确");
                return;
            }else{
                
            }
            if(servType!=0){
                $.ajax({
                type:"POST",
                dataType:"text",
                url:localhostPath+"/index.php/info_change/baseInfoEdit",
                async:true,
                data:{coa_name:nameval,coa_age:ageval,
                    coa_self_intro:self_introval,
                    coa_car_old:car_oldval,
                    coa_telnum:telnumval,servType:servType,headurl:headurl},
                success:function(data){
                    if(data==1||data==true){
                        history.go(-1);
                     }
                }
                
            });
            }else{
                alert("请选择培训内容");
                return;
            }
            
        });
        
    });
    
    
    function setImagePreview(docObj) {

//    var imgObjPreview=document.getElementById(preview);  
////     docObj.setAttribute("class","tempPreview");
        var imgObjPreview = $('#news_preview')[0];

        if (docObj.files && docObj.files[0]) {
            //火狐下，直接设img属性  
            imgObjPreview.style.display = 'block';
            imgObjPreview.style.width = '350px';
            //imgObjPreview.src = docObj.files[0].getAsDataURL();  

            //火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式    
            imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);
        } else {
            //IE下，使用滤镜  
            docObj.select();
            var imgSrc = document.selection.createRange().text;
            var localImagId = document.getElementById("localImag");
            //必须设置初始大小  
            localImagId.style.display = 'block';
            localImagId.style.width = "350px";
            localImagId.style.height = "350px";
            //图片异常的捕捉，防止用户修改后缀来伪造图片  
            try {
                localImagId.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
                localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;
            } catch (e) {
                alert("您上传的图片格式不正确，请重新选择!");
                return false;
            }
            imgObjPreview.style.display = 'none';
            document.selection.empty();


        }
        return true;
    }
    function show_head(head_file){
    if(head_file!=null){
        //设置头像URL
        $("#head_photo_src").attr('src',head_file);	
    }else{
        $("#head_photo_src").attr('src',headurl);
    }
    }
    
</script> 
<!--此为头像修改部分的JS代码-->
<script>
var headpicBaseUrl="<?= base_url() ?>application/views/headpic/";
$(document).ready(function(e){
        
	//var fileuploadpath="<?= base_url() ?>application/views/headpic/;
        var path="<?= base_url() ?>application/views/headpic/upload.php";
        
	$('#head_photo').live('change',function(){  
		ajaxFileUploadview('head_photo','photo_pic',path); 
	});	

});

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

