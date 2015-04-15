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
                                    <input/>
                                </li>
                            </ul>
                            <ul class="co-self-third clearfix">
                                <li style="text-align: right;color:#969EC3">
                                    年龄：
                                </li>
                                <li>
                                    <input/>
                                </li>
                            </ul>
                            <ul class="co-self-third clearfix">
                                <li style="text-align: right;color:#969EC3">
                                    个人简介：
                                </li>
                                <li>
                                    <textarea></textarea>
                                </li>
                            </ul>
                            <ul class="co-self-third clearfix">
                                <li style="text-align: right;color:#969EC3">
                                    驾龄：
                                </li>
                                <li>
                                    <input/>
                                </li>
                            </ul>
                            <ul class="co-self-third clearfix">
                                <li style="text-align: right;color:#969EC3">
                                    手机号码：
                                </li>
                                <li>
                                    <input/>
                                </li>
                            </ul>
                            <ul class="co-self-third clearfix">
                                <li style="text-align: right;color:#969EC3">
                                    提供服务类型：
                                </li>
                                <li>
                                    <input type="checkbox" name="bike" />科目二<br/>
                                    <input type="checkbox" name="car" />科目三
                                </li>
                            </ul> 
                            <ul class="co-self-third clearfix">
                                <li style="text-align: right;color:#969EC3">
                                    Filename:
                                </li>
                                <li>
                                    <input type="file" name="file"   id="file"onchange="setImagePreview(this)"/> 
                                </li>
                            </ul> 
                            <ul class="co-self-third clearfix">
                                <li>
                                    <button style="float:right">summit</button>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li style="width:40%;" id="localImag">
                    <img src="http://image.52drivecar.com/coach_imges/1428902329.jpg@!nail250" id="news_preview" class="am-img-thumbnail" height="250" width="250"/>

                </li>
            </ul>
        </div>
    </div>
</div>
<script>
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
</script> 


