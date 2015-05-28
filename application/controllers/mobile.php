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
        $this->load->model('teachbook_model');
        $this->load->model('course_model');
        $this->load->model('clscomment_model');
        $this->load->model('staticcoach_model');
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
        public function management() {
            if ($this->session->userdata('TYPE') == 2) {
        } else {
            $this->view("you aren't vip!");
            return false;
        }
         $UID = $this->session->userdata('UID');
        $time = $this->getDate();
        $cls = $this->getCurrentCls();
        $result_fur = $this->teachbook_model->select_further_detail($UID, $time, $cls);
        $comment_list = array();
        $j = 0;
        foreach ($result_fur as $row) {
            $list['book_id'] = $row['book_id'];
            $list['book_date'] = $row['book_date'];
            $list['book_cls_num'] = $row['book_cls_num'];
            $list['book_state'] = $row['book_state'];
            $list['book_coa_id'] = $row['book_coa_id'];
            $list['book_sch_id'] = $row['book_sch_id'];
            $coachName = $this->coach_model->select_name($row['book_coa_id']);
            $list['coa_name'] = $coachName[0]['coach_name'];
            $schName = $this->school_model->select_name($row['book_sch_id']);
            $list['sch_name'] = $schName[0]['jp_name'];
            $list['book_cls_name'] = "";
            $courseName = $this->course_model->select($row['book_cls_id']);
            foreach ($courseName as $row) {
                $list['book_cls_name'] = $row['cls_name'];
            }

            $comment_list['unuse_list'][$j] = $this->load->view('mobile/vip_views/management_fur_list', $list, true);
            $j++;
        }
        $result = $this->teachbook_model->select_history_detail($UID, $time, $cls);
        $i = 0;
        foreach ($result as $row) {
            if($i>9){break;}
            $list['book_id'] = $row['book_id'];
            $list['book_date'] = $row['book_date'];
            $list['book_cls_num'] = $row['book_cls_num'];
            $list['book_coa_id'] = $row['book_coa_id'];
            $list['book_sch_id'] = $row['book_sch_id'];
            $coachName = $this->coach_model->select_name($row['book_coa_id']);
            $list['coa_name'] = $coachName[0]['coach_name'];
            $list['coa_face'] = $coachName[0]['coach_face'];
            $schName = $this->school_model->select_name($row['book_sch_id']);
            $list['sch_name'] = $schName[0]['jp_name'];
            $list['exist'] = 0;
            $is_com_exist = $this->clscomment_model->select_exist($row['book_id']);
            foreach ($is_com_exist as $result) {
                $list['exist'] = 1;
            }
            $list['book_cls_name'] = "";
            $courseName1 = $this->course_model->select($row['book_cls_id']);
            foreach ($courseName1 as $row) {
                $list['book_cls_name'] = $row['cls_name'];
            }
            $comment_list['list'][$i] = $this->load->view('mobile/vip_views/management_list', $list, true);
            $i++;
        }
        $page = $this->load->view('mobile/vip_views/management', $comment_list, true);
        $title = "学习管理 - 我爱开车网（手机版）";
        $this->view($title, $page);
    }
    public function tocomment() {
        $id = $this->input->get('id');
        $result = $this->teachbook_model->select_from_id($id);
        $comment_list = array();
        foreach ($result as $row) {
            $list['book_id'] = $row['book_id'];
            $list['book_date'] = $row['book_date'];
            $list['book_cls_num'] = $row['book_cls_num'];
            $list['book_suggest'] = $row['book_suggest'];
            $list['book_coa_id'] = $row['book_coa_id'];
            $list['book_sch_id'] = $row['book_sch_id'];
            $coachName = $this->coach_model->select_name($row['book_coa_id']);
            $list['coa_name'] = $coachName[0]['coach_name'];
            $schName = $this->school_model->select_name($row['book_sch_id']);
            $list['sch_name'] = $schName[0]['jp_name'];
            $list['book_cls_name'] = "";
            $courseName1 = $this->course_model->select($row['book_cls_id']);
            foreach ($courseName1 as $row2) {
                $list['book_cls_name'] = $row2['cls_name'];
            }
            $comment_list['feedback_content'] = $this->load->view('mobile/vip_views/feedback_content', $list, true);
        }
        $page = $this->load->view('mobile/vip_views/tocomment',$comment_list, true);
        $title = "学习评价 - 我爱开车网（手机版）";
        $this->view($title, $page);
    }
     public function book_detail() {
        $page = $this->load->view('mobile/vip_views/book_detail', '', true);
        $title = "订单详情 - 我爱开车网（手机版）";
        $this->view($title, $page);
    }
     public function news() {
          $body['menu']=$this->getMenu();
        $page = $this->load->view('mobile/public_views/news', $body, true);
        $title = "新闻 - 我爱开车网（手机版）";
        $this->view($title, $page);
    }
    public function coach_home() {
          $body['menu']=$this->getMenu();
        $page = $this->load->view('mobile/public_views/coach_home', $body, true);
        $title = "教练详情 - 我爱开车网（手机版）";
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
