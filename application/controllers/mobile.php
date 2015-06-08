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
        $uid = $this->session->userdata('UID');
        $body['menu'] = $this->getMenu();
        $body['islogin'] = 0;
        if ($uid != FALSE) {
            $body['islogin'] = 1;
            $time = $this->getDate();
            $cls = $this->getCurrentCls();
            $body['un_study'] = $this->teachbook_model->un_study_cla_sum($uid, $time, $cls);
            $body['un_comment'] = $this->teachbook_model->un_comment_cla_sum($uid, $time);
        }
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
        $uid = $this->session->userdata('UID');
        if ($uid == FALSE) {
            redirect('mobile/login');
            exit();
        }
        $page = $this->load->view('mobile/vip_views/study_book_new', '', true);
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
        $result_fur = $this->teachbook_model->select_further_details($UID, $time, $cls);
        $comment_list = array();
        $j = 0;
        foreach ($result_fur as $row) {
            $row['course'] = $this->getClassType($row['book_cls_id']);
            $comment_list['unuse_list'][$j] = $this->load->view('mobile/vip_views/management_fur_list', $row, true);
            $j++;
        }
        $result = $this->teachbook_model->select_history_details($UID, $time, $cls);
        $i = 0;
        unset($row);
        foreach ($result as $row) {
            if ($i > 9) {
                break;
            }
            $row['course'] = $this->getClassType($row['book_cls_id']);
            $comment_list['list'][$i] = $this->load->view('mobile/vip_views/management_list', $row, true);
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
            $comment_list['feedback_content'] = $this->load->view('mobile/vip_views/feedback_content', $row, true);
        }
        $page = $this->load->view('mobile/vip_views/tocomment', $comment_list, true);
        $title = "学习评价 - 我爱开车网（手机版）";
        $this->view($title, $page);
    }

    public function unbook() {
        $id = $this->input->post("book_id");
        $date = '';
        $dateArray = $this->teachbook_model->get_book_date_by_id($id);
        foreach ($dateArray as $row) {
            $date = $row['book_date'];
        }
        $nowStamp = time();
        $thisStamp = strtotime($date);
        $nowHour = getdate()['hours'];
        $gap = floor(($thisStamp - $nowStamp ) / 86400);
        if ($gap >= 3) {
//               alert('直接退掉！');
            $data = array(
                'book_state' => '6'//直接退掉;
            );
        } else if ($gap == 2) {
//               alert('扣5%！');
           $data = array(
                'book_state' => '6'//直接退掉;
            );
        } else if ($gap == 1) {
//               alert('扣10%！');
           $data = array(
                'book_state' => '6'//直接退掉;
            );
        } else if ($gap == 0 && $nowHour < 19) {
           $data = array(
                'book_state' => '6'//直接退掉;
            );
//               alert('扣20%！');
        } else if ($gap == 0 && $nowHour >= 19) {
//               alert('扣20%！且必须教练同意！');
            $data = array(
                'book_state' => '7'//请求退课;
            );
        } else {
            echo '你退你大爷！！';
            return false;
        }
        $return = $this->teachbook_model->update_state($id, $data);
        echo $return;
    }

    public function book_detail() {
        if ($this->session->userdata('TYPE') == 2) {
            
        } else {
            $this->view("you aren't vip!");
            return false;
        }
        $id = $this->input->get('id');
        $isFinish = $this->input->get('isFinish');
        $result = $this->teachbook_model->select_from_id($id);
        $data = '';
        foreach ($result as $row) {
            $row['isFinish'] = $isFinish; //'0'表示'已经学习'，其他为'未学习'；
            $row['course'] = $this->getClassType($row['book_cls_id']);
        }
        $page = $this->load->view('mobile/vip_views/book_detail', $row, true);
        $title = "订单详情 - 我爱开车网（手机版）";
        $this->view($title, $page);
    }

    public function news() {
        $body['menu'] = $this->getMenu();
        $page = $this->load->view('mobile/public_views/news', $body, true);
        $title = "新闻 - 我爱开车网（手机版）";
        $this->view($title, $page);
    }

    public function coach_home($id) {
        $coach = $this->coach_model->select_detail($id);
        foreach ($coach as $row) {
            $body = $row;
        }
        $body['menu'] = $this->getMenu();
        $page = $this->load->view('mobile/public_views/coach_home', $body, true);
        $title = "教练详情 - 我爱开车网（手机版）";
        $this->view($title, $page);
    }

    public function school_home($id) {
        $school = $this->school_model->get_from_id($id);
        foreach ($school as $row) {
            $body = $row;
        }
        $body['menu'] = $this->getMenu();
        $page = $this->load->view('mobile/public_views/school_home', $body, true);
        $title = "培训点详情 - 我爱开车网（手机版）";
        $this->view($title, $page);
    }

    public function map_sch_pos() {
        $body['menu'] = $this->getMenu();
        $page = $this->load->view('mobile/public_views/map_sch_pos', $body, true);
        $title = "驾培点地址 - 我爱开车网（手机版）";
        $this->view($title, $page);
    }

    public function main_school_list() {
        $info = '113.57.191.74';
        $info = $this->getCityByIp();
        $body['info'] = $info;
        $page = $this->load->view('mobile/public_views/main_school_list', $body, true);
        $title = "培训点查询- 我爱开车网（手机版）";
        $this->view($title, $page);
    }

    public function main_coach_list() {
        $info = '113.57.191.74';
        $info = $this->getCityByIp();
        $body['info'] = $info;
        $page = $this->load->view('mobile/public_views/main_coach_list', $body, true);
        $title = "教练查询- 我爱开车网（手机版）";
        $this->view($title, $page);
    }

    public function two_screen() {
//          $body['menu']=$this->getMenu();
        $page = $this->load->view('mobile/public_views/two_screen', '', true);
        $title = "切换 - 我爱开车网（手机版）";
        $this->view($title, $page);
    }

    public function select_coach() {
        $city = $this->input->get('city');
        $school = $this->school_model->get_from_city(1027);
        $i = 0;
        $body = '';
        foreach ($school as $row) {
            $body['school'][$i] = $this->load->view('mobile/public_views/school_list', $row, true);
            $i++;
        }
        $page = $this->load->view('mobile/public_views/select_coach', $body, true);
        $title = "选择教练 - 我爱开车网（手机版）";
        $this->view($title, $page);
    }

    /**
     * ***************************************************************
     * AJAX请求方法！************START
     */
    public function get_course() {    //通过学校id 获得该校的教练详细信息。。。
        $id = $this->input->post('id');
        $coach = $this->coach_model->select_coach($id);
        $AllCoach = '';
        foreach ($coach as $row) {
            $AllCoach.=$this->load->view('mobile/public_views/coach_list', $row, true);
        }
        echo $AllCoach;
    }

    public function get_coach_info() {//获得该学员已选的教练信息
        $UID = $this->session->userdata('UID');
        $coach = $this->staticcoach_model->selectByStu($UID);
        $data = array();
        $data['exist'] = 0;
        foreach ($coach as $row) {
            $data = $row;
            $data['exist'] = 1; //1代表存在，0则表示不存在
        }
        echo json_encode($data);
    }

    public function to_change_coach() {
        $UID = $this->session->userdata('UID');
        $coach_id = $this->input->get('coach_id');
        $school_id = $this->input->get('school_id');
        $coach = $this->staticcoach_model->selectByStu($UID);
        foreach ($coach as $row) {
            $data = array(
                'sc_sch' => $school_id,
                'sc_coa' => $coach_id
            );
            $result = $this->staticcoach_model->update($UID, $data);
            echo $result;
            exit();
        }
        $dataAll = array(
            'sc_id' => time(),
            'sc_stu' => $UID,
            'sc_sch' => $school_id,
            'sc_coa' => $coach_id,
        );
        $result = $this->staticcoach_model->insert($dataAll);
        echo $result;
    }

    public function get_map_info() {
        $id = $this->input->post("school_id", TRUE);
        $result = $this->school_model->get_from_id($id);
        $list = '';
        $content = '';
        foreach ($result as $row) {
            $content = $this->load->view('mobile/public_views/map_content', $row, true);
            $list = $row;
        }
        $data = array(
            'content' => $content,
            'list' => $list
        );
        echo json_encode($data);
    }

    public function get_school_by_city() {
        $city = $this->input->post('city');
        $school = $this->school_model->get_from_city(1027);
        $body = '';
        foreach ($school as $row) {
            $body.= $this->load->view('mobile/public_views/school_list_content', $row, true);
        }
        echo $body;
    }

    public function get_coach_by_city() {
        $city = $this->input->post('city');
        $school = $this->school_model->get_from_city(1027);
        $body = '';
        foreach ($school as $row) {
            $coach = $this->coach_model->selectIdBySchool($row['jp_id']);
            foreach ($coach as $row2) {
                $body.= $this->load->view('mobile/public_views/coach_list_content', $row2, true);
            }
        }
        echo $body;
    }

    /**
     * AJAX请求方法！*********END
     * **********************************************************
     */
    public function getMenu() {    //----获得当前用户状态下的侧滑菜单
        $name = $this->session->userdata('name');
        $menu = '';
        if ($name == null) {
            $menu = $this->load->view('mobile/common_views/unlogin_menu', '', true);
        } else {
            $data = array('username' => $name);
            $menu = $this->load->view('mobile/common_views/vip_login_menu', $data, true);
        }
        return $menu;
    }

    public function testIp() {
        echo $this->getip();
    }

    function getCityByIp() {
        $unknown = 'unknown';
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] && strcasecmp($_SERVER['HTTP_X_FORWARDED_FOR'], $unknown)) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], $unknown)) {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        //处理多层代理的情况
        //或者使用正则方式：$ip = preg_match("/[\d\.]{7,15}/", $ip, $matches) ? $matches[0] : $unknown;
        // * --/
        if (false !== strpos($ip, ',')) {
            $ip = reset(explode(',', $ip));
        }
        $retval = $this->_request('http://ip.taobao.com/service/getIpInfo.php?ip=' . $ip);
        if ($retval !== false) {
            return $retval;
        }
        return '';
    }

    function testDB() {
//        echo strtotime("2015-03-31");
//        echo getdate()['hours'];
//        $date = "2015-03-31";
//        $nowStamp = time();
//        $thisStamp = strtotime($date);
//        $gap = ($nowStamp - $thisStamp) / 86400;
//        echo floor($gap);
//        $UID = '1426568565';
//        $time = $this->getDate();
//        $cls = $this->getCurrentCls();
//
//        $result_fur = $this->teachbook_model->un_comment_cla_sum($UID, $time);
//        echo json_encode($result_fur);
    }

}
