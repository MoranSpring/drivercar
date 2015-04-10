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
            echo 'success!!';
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
        $pwd_active= $this->input->post('pwd_active');
        $new_pwd_one= $this->input->post('new_pwd_one');
        $pwd_hasmd5= $this->input->post('pwd_hasmd5');
        trim($pwd_active);
        trim($new_pwd_one);
        trim($pwd_hasmd5);
        $pwd_active_md5=md5($pwd_active);
        $new_pwd_md5=md5($new_pwd_one);

        $flag=$this->isStrSame($pwd_hasmd5,$pwd_active_md5);

            if($flag){
                     $data=array(
                        'stu_pwd'=>$new_pwd_md5
                    );
                    $result = $this->accesscontrol_model->update_attr($id,$data);
                    if ($result == 1) {
                        echo '密码修改成功!!';
                    } else {
                        echo 'insert error!';
                    }
            }else{
                echo '密码错误!';
            }

    }
    
    

}

