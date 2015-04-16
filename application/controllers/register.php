<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Register extends MY_Controller {

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
        $this->load->model('serialnumber_model');
        $this->load->helper('date');
    }

    public function index() {
        $this->view();
//        $bucket = 'driver-un';
//	$object = 'logo.jpg';	
//	$file_path ="C:\\Users\\KYLE\\Desktop\\logo.png";
//	$response = $this->alioss->upload_file_by_file($bucket,$object,$file_path);
//	$this->_format($response);
//        $this->load->view('test2');
//        redirect('first/sch_info');
//         redirect('vipcenter');
    }
 
    //学员序列号验证
    public function ValiVipSerNum() {
       
        $vip_page_num= $this->input->post('vip_page_num');
//        $data=array(
//            'serial_num'=>$vip_page_num
//        );
        $result = $this->serialnumber_model->selectBySerNum($vip_page_num);
        foreach($result as $row){
            $serial_num=$row['serial_num'];
            $serial_valid=$row['serial_valid'];
        }
        if ($result !=null) {
            if(($serial_num==$vip_page_num)&&$serial_valid==1){
               echo "1";
               return true;
            }else{
                echo "0";
               return false;
            }
        } else {
            echo "no exist";
//            echo 'This user is not exist.';
            return false;
        }
        
    }
    //学员序列号验证
    public function ValiTrainSerNum() {
       
        $train_page_num= $this->input->post('train_page_num');
//        $data=array(
//            'serial_num'=>$train_page_num
//        );
        $result = $this->serialnumber_model->selectBySerNum($train_page_num);
        foreach($result as $row){
            $serial_num=$row['serial_num'];
            $serial_valid=$row['serial_valid'];
        }
        if ($result !=null) {
            if(($serial_num==$train_page_num)&&$serial_valid==1){
               echo "1";
               return true;
            }else{
                echo "0";
               return false;
            }
        } else {
            echo "no exist";
            return false;
        }
        
    }
}

