<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Info_change extends MY_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    function __construct() {
        parent::__construct();
        $this->load->model('accesscontrol_model');
        $this->load->model('news_model');
        $this->load->helper('date');
        $this->load->library('oss/alioss');
        $this->load->model('coach_model');
    }

    public function index() {
//        $this->view();
//        $bucket = 'driver-un';
//	$object = 'logo.jpg';	
//	$file_path ="C:\\Users\\KYLE\\Desktop\\logo.png";
//	$response = $this->alioss->upload_file_by_file($bucket,$object,$file_path);
//	$this->_format($response);
//        $this->load->view('test2');
//        redirect('first/sch_info');
          redirect('vipcenter');
    }
    public function nickName(){
        $id =$this->session->userdata('UID');
        $nickName = $this->input->post('nickName');
        $data=array(
            'stu_nick_name'=>$nickName
        );
        $result = $this->accesscontrol_model->update_attr($id,$data);
        if ($result == 1) {
            echo 'success';
            $this->session->set_userdata('stu_nick_name',$nickName);
        } else {
            echo 'insert error!';
        }
        
    }
    public function selfIntro(){
        $id =$this->session->userdata('UID');
        $selfIntro = $this->input->post('selfIntro');
        $data=array(
            'stu_self_intro'=>$selfIntro
        );
        $result = $this->accesscontrol_model->update_attr($id,$data);
        if ($result == 1) {
            echo 'success!!';
        } else {
            echo 'insert error!';
        }
        
    }
    public function realName(){
        $id =$this->session->userdata('UID');
        $realName= $this->input->post('realName');
        $data=array(
            'stu_true_name'=>$realName
        );
        $result = $this->accesscontrol_model->update_attr($id,$data);
        if ($result == 1) {
            echo 'success!!';
            $this->session->set_userdata('stu_true_name',$realName);
        } else {
            echo 'insert error!';
        }
        
    }
    public function cardId(){
        $id =$this->session->userdata('UID');
        $cardId= $this->input->post('cardId');
        $data=array(
            'stu_id_num'=>$cardId
        );
        $result = $this->accesscontrol_model->update_attr($id,$data);
        if ($result == 1) {
            echo 'success!!';
        } else {
            echo 'insert error!';
        }
        
    }
    public function genderValue(){
        $id =$this->session->userdata('UID');
        $gendervalue= $this->input->post('genderValue');
        $data=array(
            'stu_sex'=>$gendervalue
        );
        $result = $this->accesscontrol_model->update_attr($id,$data);
        if ($result == 1) {
            echo 'success!!';
        } else {
            echo 'insert error!';
        }
        
    }
    public function ageChange(){
        $id =$this->session->userdata('UID');
        $age= $this->input->post('age');
        $data=array(
            'stu_age'=>$age
        );
        $result = $this->accesscontrol_model->update_attr($id,$data);
        if ($result == 1) {
            echo 'success!!';
        } else {
            echo 'insert error!';
        }
        
    }
    public function getAllInfo(){
//        $id ='1426568565';
//        $name="maliang";
        $UID = $this->session->userdata('UID');
        $result = $this->accesscontrol_model->selectById($UID);
        echo json_encode($result);

    }
    
    public function homeTown(){
        $id =$this->session->userdata('UID');
        $hometown= $this->input->post('hometown');
        $data=array(
            'stu_home_town'=>$hometown
        );
        $result = $this->accesscontrol_model->update_attr($id,$data);
        if ($result == 1) {
            echo 'success!!';
        } else {
            echo 'insert error!';
        }
        
    }
    public function qqNum(){
        $id =$this->session->userdata('UID');
        $qq= $this->input->post('qq');
        $data=array(
            'stu_qq'=>$qq
        );
        $result = $this->accesscontrol_model->update_attr($id,$data);
        if ($result == 1) {
            echo 'success!!';
        } else {
            echo 'insert error!';
        }
        
    }
    public function livingPlace(){
        $id =$this->session->userdata('UID');
        $livingplace= $this->input->post('livingplace');
        $data=array(
            'stu_living_place'=>$livingplace
        );
        $result = $this->accesscontrol_model->update_attr($id,$data);
        if ($result == 1) {
            echo 'success!!';
        } else {
            echo 'insert error!';
        }
        
    }
    public function phoneNum(){
        $id =$this->session->userdata('UID');
        $phonenum= $this->input->post('phonenum');
        $data=array(
            'stu_tel'=>$phonenum
        );
        $result = $this->accesscontrol_model->update_attr($id,$data);
        if ($result == 1) {
            echo 'success!!';
        } else {
            echo 'insert error!';
        }
        
    }
    public function mailKeyToSession(){
        echo '======mailKeyToSession========';
        $id =$this->session->userdata('UID');
        $email_key_str= $this->input->post('email_key_str');
        $email_active=$this->input->post('email_active');
        $get_key_time=now();
        $email_vali=array('mail_key'=>$email_key_str,'get_key_time'=>$get_key_time);
        $this->session->set_userdata($email_vali);
        
        $allsession=$this->session->all_userdata();
        
        echo 'All  Session  data  :'.$allsession;
        
        $this->sendEmail($email_active,$email_key_str,$get_key_time);
        echo $this->email->print_debugger();
        
        
    }
    public function mailValidate(){
        $id =$this->session->userdata('UID');
        //从页面获取到的验证码和新邮箱号码
        $input_mail_num= $this->input->post('input_mail_num');
        $new_email_address= $this->input->post('new_email_address');
        str_replace( ' ','',$input_mail_num);
        
        //读取当前Session中保存的验证码和发送验证码的时间
        $active_time=  now();
        $email_key_str=$this->session->userdata('mail_key');
        $get_key_time=$this->session->userdata('get_key_time');
        
        $period=($active_time-$get_key_time);
        //echo '$input_mail_num:'.$input_mail_num.'   $email_key_str'.$email_key_str;
        $flag=$this->isStrSame($input_mail_num,$email_key_str);
        
        //echo 'period : '.$period.'flag : '.$flag;
        
        if($period<600){
            if($flag){
                     $data=array(
                        'stu_email'=>$new_email_address
                    );
                    $result = $this->accesscontrol_model->update_attr($id,$data);
                    if ($result == 1) {
                        echo '这个地方已经执行success!!';
                    } else {
                        echo 'insert error!';
                    }
            }else{
                echo '验证码错误!';
            }
        }else{
            echo '验证码超时，已失效，请重新操作!';
        }

    }
    public function sendEmail($email_active,$mail_con,$mail_time) {
        $this->load->library('email');
        $this->load->helper('date');
        $this->email->from('kyleml@126.com', '我爱开车网');
        //echo 'email_active  :'.$email_active;
        $this->email->to($email_active);

        $this->email->subject('验证码邮件');
        
        $this->session->set_userdata('EMAILID', $mail_con);
        $gmt = date('r',$mail_time);
        $this->email->message("<html><div>这封邮件发送的是我爱开车网修改邮箱验证码："."<span style=".'"color:red;"'.">".$mail_con."</span>"."</div><div>邮件发送时间    ：".$gmt."  如果您没有进行此类操作，请忽略！</div></html>");
        $this->email->send();
        echo $this->email->print_debugger();
    }
    
    function isStrSame($str1,$str2){
        if($str1===$str2){
            return true;
        }else{
            return false;
        }
    } 

    public function pwdKeyToSession(){
        $id =$this->session->userdata('UID');
        $pwd_key_str= $this->input->post('pwd_key_str');
        
        echo 'pwd_key_str:'.$pwd_key_str;
        $email_active=$this->input->post('email_active');
        $get_key_time=now();
        $pwd_vali=array('pwd_key'=>$pwd_key_str,'get_key_time'=>$get_key_time);
        $this->session->set_userdata($pwd_vali);
        
        $this->sendEmail($email_active,$pwd_key_str,$get_key_time);
        echo $this->email->print_debugger();
    }
    
//     public function pwdValidate(){
//        $id =$this->session->userdata('UID');
//        //从页面获取到的密码验证码和新密码
//        $pwd_vali_key= $this->input->post('pwd_vali_key');
//        $new_pwd_one= $this->input->post('new_pwd_one');
//        trim($pwd_vali_key);
//        trim($new_pwd_one);
//        $new_pwd_md5=md5($new_pwd_one);
//        
//        //读取当前Session中保存的验证码和发送验证码的时间
//        $active_time=  now();
//        $pwd_key_str=$this->session->userdata('pwd_key');
//        $get_key_time=$this->session->userdata('get_key_time');
//        
//        $period=($active_time-$get_key_time);
//      
//        $flag=$this->isStrSame($pwd_vali_key,$pwd_key_str);
//        
//        //echo 'period : '.$period.'flag : '.$flag;
//        
//        if($period<600){
//            if($flag){
//                     $data=array(
//                        'stu_pwd'=>$new_pwd_md5
//                    );
//                    $result = $this->accesscontrol_model->update_attr($id,$data);
//                    if ($result == 1) {
//                        echo 'success!!';
//                    } else {
//                        echo 'insert error!';
//                    }
//            }else{
//                echo '验证码错误!';
//            }
//        }else{
//            echo '验证码超时，已失效，请重新操作!';
//        }
//
//    }
     public function pwdChange(){
        $id =$this->session->userdata('UID');
        //从页面获取到的密码验证码和新密码
        $pwd_active= $this->input->post('pwd_active',TRUE);
        $new_pwd= $this->input->post('new_pwd_one',TRUE);
//        $pwd_hasmd5= $this->input->post('pwd_hasmd5');
        trim($pwd_active);
        trim($new_pwd);
        $data=array(
                        'stu_pwd'=>md5($new_pwd)
                    );
        $result=$this->accesscontrol_model->selectById($id);
        foreach ($result as $row) {
            if($row['stu_pwd']!=  md5($pwd_active)){
               echo 3;//旧密码错误
               return false;
            }else{
                $result = $this->accesscontrol_model->update_attr($id,$data);
                    if ($result == 1) {
                        echo 1; //修改成功；
                    } else {
                        echo 9;//修改出错；
                    }
            }
            return false;
        }
        echo 7;//修改异常
    }
        //学员序列号验证
    public function ValiVipSerNum() {
       
        $vip_page_num= $this->input->post('vip_page_num');
        echo  $vip_page_num;
//        $data=array(
//            'serial_num'=>$vip_page_num
//        );
        $result = $this->serialnumber_model->selectBySerNum($vip_page_num);
        if ($result == 1) {
            echo 'success!!';
        } else {
            echo 'insert error!';
        }
        
    }

    //加载修改密码页面
    public function forgetPwd() {
       $this->load->view('login_views/forget_pwd.php');
       //$this->load->view('login_views/email_vali.php');
//       $this->load->view('login_views/index.html');

    }
    //************forget_pwd**************
    //验证邮箱是否已经被注册
    public function emialChange() {
        $email = $this->input->post('bind_email');
        $Result = $this->accesscontrol_model->emailUnique($email);
        if ($Result ==1) {
            echo true;
//            echo 'This user is not exist.';
            return true;
        } else {
            echo false;
        }
    }
    //
    function ForgetPwdVali() {
        $this->load->helper('date');
        $email = $this->input->post('bind_email');
        $con_str = $this->input->post('chage_pwd_str');
        $send_time=  time();
        $email_text="<html><div>这封邮件发送的是我爱开车网根据绑定邮箱修改密码的验证码：";
        $result=  $this->sendEmail($email_text,$email,$con_str,$send_time);
        $data=array('chage_pwd_str'=>$con_str,'send_time'=>$send_time,'result'=>$result);
        echo json_encode($data);
    }
    
    //{"chage_pwd_str":"s4ngz3vj","send_time":1429259814,"result":true}
    function pdwChangeByEmail() {
        $bindemail= $this->input->post('bindemail');
        $newpwd= $this->input->post('newpwd');
        trim($bindemail);
        trim($newpwd);
        $newpwd_md5=md5($newpwd);
        $result = $this->accesscontrol_model->ChangePwdByEmail($bindemail,$newpwd_md5);
        if($result){
            echo 'true'.true;
        }else{
            echo 'false'.false;
        }
    }
    public function ChangeHeadPic() {
       $this->load->view('headpic/headpic.php');
    }
    public function showHeadImg() {

       $this->load->view('headpic/crop_image.php');

    }
    
        public function submitHeadImg() {
       //$body = $this->load->view('headpic/jcrop_image.class.php', '', true);
       //$this->load->view('headpic/crop_submit.php');
        $pic_name=$this->input->post('pic_name');
        $x=$this->input->post('x');
        $y=$this->input->post('y');
        $w=$this->input->post('w');
        $h=$this->input->post('h');
        $targ_w = $targ_h = 250;
        $picname=  basename($pic_name);
        //$picname此处仅为文件名
        //echo  'crop_submit  page ======>'.$picname;
        
        //上传文件的路径
        $filep=$_SERVER['DOCUMENT_ROOT'].'/application/views/headpic'.'/upload/';


        $data=array('filep'=>$filep,
                    'picname'=>$picname,
                    'x'=>$x,
                    'y'=>$y,
                    'w'=>$w,
                    'h'=>$h,
                    'targ_w'=>$targ_w,
                    'targ_h'=>$targ_h);
        $this->load->library('jcrop_image',$data);
        
        $file=$this->jcrop_image->crop();

//        var_dump($file);
        $img=$file['file'];
        $img_name=$file['filename'];
        $img_info=$this->getImgInfo($img);
        $img_flag=$this->checkImg($img_info);
        
        //$image_name="coach_imges/headpic/".$img_name;
        $image_name="headpic/".$img_name;
        $head_cdnurl= 'http://image.52drivecar.com/'.$image_name .'.jpg';
        //$default_url='http://driver-un.oss-cn-shenzhen.aliyuncs.com/coach_imges/headpic/default.jpg';
        if($img_flag==true){
              $status = $this->_upload_by_content($image_name,$img);
              if ($status == 200) {
                    $returndata=array('status'=>1,
                        'cdnurl'=>$head_cdnurl,
                        'error'=>'no error');
              }else{
                  $returndata=array('status'=>0,
                        'cdnurl'=>null,
                        'error'=>'something  is error');
                 
              }
        }
       
        echo json_encode($returndata);
        $this->load->helper('file');
        delete_files($filep);
        return ;
    }

    
    public function getImgInfo($img) {
        $img_info = getimagesize($img); 
//        var_dump($img_info);     
        switch ($img_info[2]) { 
            case 1: 
            $imgtype = "gif"; 
            break; 
            case 2: 
            $imgtype = "jpg"; 
            break; 
            case 3: 
            $imgtype = "png"; 
            break; 
        }
        $img_type = $imgtype; 
        $img_size = ceil(filesize($img)); //获取文件大小 
        $new_img_info = array ( 
        "type"=>$img_type,
        "size"=>$img_size ,
        );
        return $new_img_info;
    }
    public function checkImg($img) {
        if ((($img["type"] == "gif")  || ($img["type"] == "jpg") || ($img["type"] == "png")) && ($img["size"] < 2000000)) {  
            return true;
        } else {
        return false;
        }
        return false;
    }

    function _upload_by_content($name,$path) {
        $bucket = 'driver-un';
        $object = $name . '.jpg';
        $filepath = $path;  //英文
  
        $options = array(
            ALIOSS::OSS_FILE_UPLOAD => $filepath,
            'partSize' => 5242880,
        );
        $response = $this->alioss->create_mpu_object($bucket, $object, $options);
        
        return $response->status;
    }
    
    public function baseInfoEdit(){
        
//        $coa_id='1427162541';
        $coa_id=$this->session->userdata('UID');
        $coa_name=  $this->input->post('coa_name');
        $coa_age=  $this->input->post('coa_age');
        $coa_self_intro=  $this->input->post('coa_self_intro');
        $coa_car_old=  $this->input->post('coa_car_old');
        $coa_telnum=  $this->input->post('coa_telnum');
        $servType=  $this->input->post('servType');
        $coach_face=  $this->input->post('headurl');
        $data=array(
                'coach_name' => $coa_name,
                'coach_old' => $coa_age,
                'coach_intro' => $coa_self_intro,
                'coach_car_old' => $coa_car_old,
                'coach_telnum' => $coa_telnum,
                'coach_serv_type' => $servType,
                'coach_face'=>$coach_face
        );
        $result = $this->coach_model->updateInfo($coa_id,$data);

        if($result){
            echo $result;
        }  else {
            echo $result;
        }
       
    }
    /**
     * 修改注册会员的头像
     */
    public function VipHeadpicChange(){
        $id =$this->session->userdata('UID');
        $stu_face= $this->input->post('head_file');
        $data=array(
            'stu_face'=>$stu_face
        );
        $result = $this->accesscontrol_model->update_attr($id,$data);

        if ($result == 1) {
            $returndata=array('status'=>1,
                'error'=>'success !');
       }else{
          $returndata=array('status'=>0,
                'error'=>'something  is error !');
       }
        echo json_encode($returndata);
        return ;
    }
    
   
}

