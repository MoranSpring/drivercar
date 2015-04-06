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
        $id ='1426568565';
        $nickName = $this->input->post('nickName');
        $data=array(
            'stu_nick_name'=>$nickName
        );
        $result = $this->accesscontrol_model->update_nick_name($id,$data);
        if ($result == 1) {
            echo 'success!!';
        } else {
            echo 'insert error!';
        }
        
    }
    public function selfIntro(){
        $id ='1426568565';
        $selfIntro = $this->input->post('selfIntro');
        $data=array(
            'stu_self_intro'=>$selfIntro
        );
        $result = $this->accesscontrol_model->update_self_intro($id,$data);
        if ($result == 1) {
            echo 'success!!';
        } else {
            echo 'insert error!';
        }
        
    }
    public function realName(){
        $id ='1426568565';
        $realName= $this->input->post('realName');
        $data=array(
            'stu_true_name'=>$realName
        );
        $result = $this->accesscontrol_model->update_real_name($id,$data);
        if ($result == 1) {
            echo 'success!!';
        } else {
            echo 'insert error!';
        }
        
    }
    public function cardId(){
        $id ='1426568565';
        $cardId= $this->input->post('cardId');
        $data=array(
            'stu_id_num'=>$cardId
        );
        $result = $this->accesscontrol_model->update_card_id($id,$data);
        if ($result == 1) {
            echo 'success!!';
        } else {
            echo 'insert error!';
        }
        
    }
    public function genderValue(){
        $id ='1426568565';
        $gendervalue= $this->input->post('genderValue');
        $data=array(
            'stu_sex'=>$gendervalue
        );
        $result = $this->accesscontrol_model->update_gender_value($id,$data);
        if ($result == 1) {
            echo 'success!!';
        } else {
            echo 'insert error!';
        }
        
    }
    public function ageChange(){
        $id ='1426568565';
        $age= $this->input->post('age');
        $data=array(
            'stu_age'=>$age
        );
        $result = $this->accesscontrol_model->update_age_change($id,$data);
        if ($result == 1) {
            echo 'success!!';
        } else {
            echo 'insert error!';
        }
        
    }
    
}

