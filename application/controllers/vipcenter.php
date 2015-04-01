<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class VipCenter extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('accesscontrol_model');
        $this->load->model('coachbook_model');
        $this->load->model('teachbook_model');
        $this->load->model('coach_model');
        $this->load->model('school_model');
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
        $UID = $this->session->userdata('UID');
        $result = $this->teachbook_model->get_book_info($UID);
        $i = 0;
        foreach ($result as $row) {

            $data['date'] = $row['book_date'];
            $data['course'] = '科目二';
            $name = $this->coach_model->select_name($row['book_coa_id']);
            $data['Name'] = $name[0]['coach_name'];
            $data['course_num'] = $row['book_cls_num'];
            $data['imageURL'] = $name[0]['coach_face'];
            $sch_name = $this->school_model->select_name($row['book_sch_id']);
            $data['school'] = $sch_name[0]['jp_name'];
            $content['content'][$i] = $this->load->view('vip_views/content', $data, true);
            $i++;
        }
        $year['year'] = $this->load->view('vip_views/year_list', $content, true);
        $page = $this->load->view('vip_views/study_progress', $year, true);
        $this->view($page);
    }

    public function study_book() {
        $page = $this->load->view('vip_views/study_book', '', true);
        $this->view($page);
    }

    public function get_cls() {
        $coabk_time = $this->input->post('coabk_time');
        $coabk_coach_id = $this->input->post('coabk_coach_id');

        $data1 = array(
            'coabk_coach_id' => $coabk_coach_id,
            'coabk_time' => $coabk_time
        );
        $book_date = $coabk_time;
        $book_coa_id = $coabk_coach_id;

        $data2 = array(
            'book_coa_id' => $book_coa_id,
            'book_date' => $book_date
        );
        $result1 = $this->coachbook_model->select($data1);
        $result2 = $this->teachbook_model->select_info_coa($data2);
        $both = array(
            'coachbook' => $result1,
            'teachbook' => $result2,
        );
        echo json_encode($both);
    }

    public function teach_book() {
        $book_id = time();
        $book_stu_id = $this->session->userdata('UID');
        $book_coa_id = $this->input->post('book_coa_id');
        $book_sch_id = $this->input->post('book_sch_id');
        $json = $this->input->post('json');
        $bookArray = json_decode($json, true);
        $DateArray = array();
        foreach ($bookArray as $row) {
            $book_id = time() . rand(1, 100);
            $newDate = array(
                'book_id' => $book_id,
                'book_stu_id' => $book_stu_id,
                'book_coa_id' => $book_coa_id,
                'book_sch_id' => $book_sch_id,
                'book_date' => $row['date'],
                'book_cls_num' => $row['cls'],
            );
            array_push($DateArray, $newDate);
        }
        $result = $this->teachbook_model->insert($DateArray);
        echo $result;
    }

}
