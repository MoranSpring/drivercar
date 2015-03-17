<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class First extends MY_Controller {

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
    }

    public function index() {

//        $this->load->view('register_views/template');
//        $con =mysql_connect('120.24.159.96:3306','root','Ali2jiapei');
//if (!$con)
//  {
//  die('Could not connect: ' . mysql_error());
//  }
// mysql_select_db('driver_un', $con);

        $this->view();
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

    public function view($page = '') {
        $name = $this->session->userdata('name');
        if ($name == null) {
            $body['header'] = $this->load->view('common_views/header', '', true);
        } else {
            $data = array('username' => $name);
            $body['header'] = $this->load->view('common_views/header_logined', $data, true);
        }

        $body['navigation'] = $this->load->view('common_views/navigation', '', true);
        if ($page == '') {
            $body['content'] = $this->load->view('a_views/sch_info', '', true);
        } else {
            $body['content'] = $page;
        }

        $body['footer'] = $this->load->view('common_views/footer', '', true);
        $this->load->view('a_views/template', $body);
    }

    public function sch_info() {

        $page = $this->load->view('a_views/sch_info', '', true);
        $this->view($page);
    }

    public function pos_info() {
        $page = $this->load->view('a_views/pos_info', '', true);
        $this->view($page);
    }

    public function ser_info() {
        $page = $this->load->view('a_views/ser_info', '', true);
        $this->view($page);
    }

    public function coach_info() {
        $page = $this->load->view('a_views/coach_info', '', true);
        $this->view($page);
    }

    public function register() {
        $this->load->view('register_views/template');
    }

    public function register_insert() {
        $username = $this->input->post('username');
        $password = $this->input->post('userpass');
        $email = $this->input->post('useremail');
        $reg_time = $this->getTime();
        $stu_type = 3;
        $Uid = time();
        $datas = array(
            'stu_id' => $Uid,
            'stu_name' => $username,
            'stu_email' => $email,
            'stu_pwd' => md5($password),
            'stu_type' => $stu_type,
            'stu_reg_time' => $reg_time
        );
        $result = $this->accesscontrol_model->insert($datas);
        if ($result == 1) {
            $this->session->set_userdata('name', $username);
            redirect();
        } else {
            echo 'insert error!';
        }
    }

    public function login_check() {
        $name = $this->input->get('name');
        $Result = $this->accesscontrol_model->loginSelect($name);
        if ($Result == null) {
            echo "no exist";
//            echo 'This user is not exist.';
            return false;
        } else {
            echo TRUE;
        }
    }

    public function login() {
        $data = array('error' => '');
        $this->load->view('login_views/template', $data);
    }

    public function login_psw_check() {
        $name = $this->input->post('name');
        $psw = $this->input->post('password');
        $Result = $this->accesscontrol_model->loginSelect($name);
        foreach ($Result as $row) {
            if ($row['stu_pwd'] != md5($psw)) {
//                    echo $this->render('10004', '密码错误');
                $data = array(
                    'error' => '密码错误！'
                );
                $this->load->view('login_views/template', $data);
                return false;
            } else {
                $this->session->set_userdata('UID', $row['stu_id']);
                $this->session->set_userdata('name', $name);
                redirect();

                return true;
            }
            exit();
        }
        $data = array(
            'error' => '密码错误！'
        );
        $this->load->view('login_views/template', $data);
    }

    public function login_exit() {
        $this->session->sess_destroy();
        redirect();
    }

    public function verify_image() {

        $conf['name'] = 'verify_code'; //作为配置参数  

        $this->load->library('captcha', $conf);
        $this->captcha->show();
        $yzm_session = $this->session->userdata('verify_code');
        echo $yzm_session;
    }

    public function get_verify_code() {

        $yzm_session = $this->session->userdata('verify_code');
        echo $yzm_session;
    }

    public function vip_center() {
        $name = $this->session->userdata('name');
        if ($name == null) {
            $body['header'] = $this->load->view('vip_views/header', '', true);
        } else {
            $data = array('username' => $name);
            $body['header'] = $this->load->view('vip_views/header_logined', $data, true);
        }

        $body['navigation'] = $this->load->view('vip_views/navigation', '', true);
        $body['content'] = $this->load->view('vip_views/self_info', '', true);
        $body['footer'] = $this->load->view('vip_views/footer', '', true);
        $this->load->view('vip_views/template', $body);
    }

    public function study_progress() {
        $name = $this->session->userdata('name');
        if ($name == null) {
            $body['header'] = $this->load->view('vip_views/header', '', true);
        } else {
            $data = array('username' => $name);
            $body['header'] = $this->load->view('vip_views/header_logined', $data, true);
        }

        $body['navigation'] = $this->load->view('vip_views/navigation', '', true);
        $body['content'] = $this->load->view('vip_views/study_progress', '', true);
        $body['footer'] = $this->load->view('vip_views/footer', '', true);
        $this->load->view('vip_views/template', $body);
    }

}
