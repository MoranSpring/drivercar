<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class VipCenter extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('accesscontrol_model');
        $this->load->model('coachbook_model');
    }

    public function index() {
        $this->view();
    }

    public function view($page = '') {
        $name = $this->session->userdata('name');
        if ($name == null) {
            $body['header'] = $this->load->view('common_views/header', '', true);
            $body['content'] = $this->load->view('common_views/unlogin', '', true);
        } else {
            $data = array('username' => $name);
            $body['header'] = $this->load->view('common_views/header_logined', $data, true);
        }
        $body['navigation'] = $this->load->view('common_views/navigation', '', true);
        if ($page == '' && $name != null) {
            $body['content'] = $this->load->view('vip_views/self_info', '', true);
        } else if ($page != '' && $name != null) {
            $body['content'] = $page;
        }

        $body['footer'] = $this->load->view('common_views/footer', '', true);
        $this->load->view('vip_views/template', $body);
    }

    //--------------会员中心------------------------
    public function vip_center() {
        $page = $this->load->view('vip_views/self_info', '', true);
        $this->view($page);
    }

    public function study_progress() {
        $page = $this->load->view('vip_views/study_progress', '', true);
        $this->view($page);
    }

    public function study_book() {
        $page = $this->load->view('vip_views/study_book', '', true);
        $this->view($page);
    }

    public function get_cls() {
        $coabk_time = $this->input->post('coabk_time');
        $coabk_coach_id = $this->input->post('coabk_coach_id');

        $data = array(
            'coabk_coach_id' => $coabk_coach_id,
            'coabk_time' => $coabk_time
        );
        $result = $this->coachbook_model->select($data);
        echo json_encode($result);
    }

}
