var base_url ='http://'+window.document.location.hostname+':'+ window.document.location.port+'/index.php';
     
function check_onbulr(str){
  data= 'name='+str;
    $.ajax({
                type: "GET",
                url: base_url+"/first/login_check",
                async:true,
                data:data,
                success: function(data) {
                    if(data!=true)
                     $(".name_alert").text(data);
                }
            });
}
function check_onfocus(){
   
                     $(".name_alert").text('');
                }

