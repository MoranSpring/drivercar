<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mobile extends MY_Controller {

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
        $this->load->library('oss/alioss');
        $this->load->model('coach_model');
        $this->load->model('serialnumber_model');
        $this->load->model('school_model');
    }

    public function index() {
        $this->view();
        }

    public function view($title = '', $page = '') {
        if ($page == '') {
            $this->home_page();
            return false;
        } else {
            $body['content'] = $page;
        }
        if ($title == '') {
            $body['title'] = "我爱开车网（手机版）- 首页";
        } else {
            $body['title'] = $title;
        }

        $body['footer'] = $this->load->view('mobile/common_views/footer_views', '', true);
        $this->load->view('mobile/common_views/template', $body);
    }

    public function home_page() {
        $body['menu']=$this->getMenu();
        $page = $this->load->view('mobile/public_views/home', $body, true);
        $title = "我爱开车网（手机版）- 首页";
        $this->view($title, $page);
    }
    public function login() {
        $page = $this->load->view('mobile/login_views/login', '', true);
        $title = " 登录 - 我爱开车网（手机版）";
        $this->view($title, $page);
    }
    public function study_book() {
        $page = $this->load->view('mobile/vip_views/study_book', '', true);
        $title = " 教练预约 - 我爱开车网（手机版）";
        $this->view($title, $page);
    }
    
    
    
    
    //----获得当前用户状态下的侧滑菜单
    public function getMenu(){
        $name = $this->session->userdata('name');
        $menu='';
        if ($name == null) {
            $menu = $this->load->view('mobile/common_views/unlogin_menu', '', true);
        } else {
            $data = array('username' => $name);
            $menu = $this->load->view('mobile/common_views/vip_login_menu', $data, true);
        }
        return $menu;
    }

}
