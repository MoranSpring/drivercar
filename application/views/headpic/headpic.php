<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<script type="text/javascript" src="<?= base_url() ?>application/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>application/js/headpic/ajaxfileupload.js"></script>
<script type="text/javascript" src="<?= base_url() ?>application/js/headpic/artDialog4.1.6/jquery.artDialog.js?skin=default"></script>
<script type="text/javascript" src="<?= base_url() ?>application/js/headpic/artDialog4.1.6/plugins/iframeTools.js"></script>
<style type="text/css">
body{
	padding:0; margin-left:50px;margin-top:50px; font-size:12px;  color:#333333; font-family:'宋体',Verdana, Geneva, sans-serif;
}
.tips{padding:10px;color:red;margin-top:20px;}
.show_photo{width: 102px;}
</style>
<script>
    var headpicBaseUrl="<?= base_url() ?>application/views/headpic/";
$(document).ready(function(e){
        
	//var fileuploadpath="<?= base_url() ?>application/views/headpic/;
        var path="<?= base_url() ?>application/views/headpic/upload.php";
	$('#head_photo').live('change',function(){ 
		ajaxFileUploadview('head_photo','photo_pic',path);
	});	

});


function show_head(head_file){
	
	//插入数据库
	//$.post("{:U('Home/Index/update_head')}",{head_file:head_file},function(result){		
		$("#head_photo_src").attr('src',head_file);			
	//});	

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
</head>
<body>
<input type="file" name="head_photo" id="head_photo" value="">  
<input type="hidden" name="photo_pic" id="photo_pic" value="">
<!--头像显示-->
<div id="show_photo" class="show_photo" style="border:1px solid #f7f7f7;"><img id="head_photo_src" style="width:100px;height:100px;" src="<?=  base_url()?>application/images/default_head.gif"></div>
</body>
</html>