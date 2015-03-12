<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class First extends CI_Controller {

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
        $this->load->helper('url');
        $this->load->model('accesscontrol_model');
    }

    public function index() {
        
//        $this->load->view('register_views/template');
//        $con =mysql_connect('120.24.159.96:3306','root','Ali2jiapei');
//if (!$con)
//  {
//  die('Could not connect: ' . mysql_error());
//  }
// mysql_select_db('driver_un', $con);
        $body['header']=$this->load->view('a_views/header','',true);
        $body['navigation']=$this->load->view('a_views/navigation','',true);
        $body['content']=$this->load->view('a_views/coach_info','',true);
        $body['footer']=$this->load->view('a_views/footer','',true);
        $this->load->view('a_views/template',$body);
//            $this->ci_smarty->assign('test', 'smarty');
//               $this->template->load('template', 'about');
//		$this->load->view('a_views/head');
//                $this->load->view('a_views/nav');
//                $this->load->view('a_views/content_1');
//                $this->load->view('a_views/content_2');
//                $this->load->view('a_views/foot');
//              $data['title'] = '标题';   
//              $data['num'] = '123456789';   
    }
    public function sch_info() {
        $body['header']=$this->load->view('a_views/header','',true);
        $body['navigation']=$this->load->view('a_views/navigation','',true);
        $body['content']=$this->load->view('a_views/sch_info','',true);
        $body['footer']=$this->load->view('a_views/footer','',true);
        $this->load->view('a_views/template',$body);
    }
    public function pos_info() {
        $body['header']=$this->load->view('a_views/header','',true);
        $body['navigation']=$this->load->view('a_views/navigation','',true);
        $body['content']=$this->load->view('a_views/pos_info','',true);
        $body['footer']=$this->load->view('a_views/footer','',true);
        $this->load->view('a_views/template',$body);
    }
    public function ser_info() {
        $body['header']=$this->load->view('a_views/header','',true);
        $body['navigation']=$this->load->view('a_views/navigation','',true);
        $body['content']=$this->load->view('a_views/ser_info','',true);
        $body['footer']=$this->load->view('a_views/footer','',true);
        $this->load->view('a_views/template',$body);
    }
    public function coach_info() {
        $body['header']=$this->load->view('a_views/header','',true);
        $body['navigation']=$this->load->view('a_views/navigation','',true);
        $body['content']=$this->load->view('a_views/coach_info','',true);
        $body['footer']=$this->load->view('a_views/footer','',true);
        $this->load->view('a_views/template',$body);
    }
     public function login() {
         $this->load->view('login_views/template');
         
     }
     public function login_test() {
         echo 'hello';
     }
    public function login_check() {
        $UserName = $this->input->post('name');
        $Password = $this->input->post('password');

        $this->load->library('form_validation');
        $this->form_validation->set_rules('Name', 'name', 'trim|required|min_length[6]|max_length[20]|xss_clean');
        $this->form_validation->set_rules('Password', 'password', 'trim|required|md5');
        $datas = array(
            'name' => $UserName,
            'psw' => $Password,
        );

        if ($this->form_validation->run() == FALSE) {
//            echo form_error('Name');
//            echo form_error('Password');
            echo '输入有误';
        } else {
            $Result = $this->accesscontrol_model->loginSelect($datas['Name']);
            if ($this->CheckUserPassword($Result, $Password)) {
                foreach ($Result as $row) {
                    
                    $this->session->set_userdata('uid', $row['UID']);
//                    $_SESSION['UID'] = $row['UID'];
                }
                $AllInfo = $this->accesscontrol_model->select($UserName);
                foreach ($AllInfo as $row) {
                    foreach ($row as $key => $value) {
                        $temparray[$key] = $value;
                    }
                }
//                $sessionid['PHPSESSION'] = session_id();
//                $alldata = array_merge($sessionid, $temparray);
                $this->render('10000', '登录成功', $temparray);
            }
        }
        
    }

}
