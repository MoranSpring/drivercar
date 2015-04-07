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
        $this->load->model('clscomment_model');
    }

    public function index() {
//        $this->view('management');
        $this->management();
//
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

    public function management() {
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
            $coachName = $this->coach_model->select_name($row['book_coa_id']);
            $list['coa_name'] = $coachName[0]['coach_name'];
            $schName = $this->school_model->select_name($row['book_sch_id']);
            $list['sch_name'] = $schName[0]['jp_name'];
            $comment_list['unuse_list'][$j] = $this->load->view('vip_views/management_fur_list', $list, true);
            $j++;
        }

        $result = $this->teachbook_model->select_history_detail($UID, $time, $cls);
        $i = 0;
        foreach ($result as $row) {
            $list['book_id'] = $row['book_id'];
            $list['book_date'] = $row['book_date'];
            $list['book_cls_num'] = $row['book_cls_num'];
            $coachName = $this->coach_model->select_name($row['book_coa_id']);
            $list['coa_name'] = $coachName[0]['coach_name'];
            $schName = $this->school_model->select_name($row['book_sch_id']);
            $list['sch_name'] = $schName[0]['jp_name'];
            $comment_list['list'][$i] = $this->load->view('vip_views/management_list', $list, true);
            $i++;
        }
        $page = $this->load->view('vip_views/management', $comment_list, true);
        $this->view($page);
    }
    public function tocomment(){
         $id = $this->input->get('id');
        $result = $this->teachbook_model->select_from_id($id);
        $comment_list = array();
        foreach ($result as $row) {
            $list['book_id'] = $row['book_id'];
            $list['book_date'] = $row['book_date'];
            $list['book_cls_num'] = $row['book_cls_num'];
            $coachName = $this->coach_model->select_name($row['book_coa_id']);
            $list['coa_name'] = $coachName[0]['coach_name'];
            $schName = $this->school_model->select_name($row['book_sch_id']);
            $list['sch_name'] = $schName[0]['jp_name'];
            $comment_list['feedback_content'][0] = $this->load->view('vip_views/feedback_content', $list, true);
        }
        $page = $this->load->view('vip_views/tocomment', $comment_list, true);
        $this->view($page);
    }

    public function feedback() {
        $comment_list = array();
        $UID = $this->session->userdata('UID');
        $time = $this->getDate();
        $cls = $this->getCurrentCls();

        $result1 = $this->teachbook_model->select_history_detail($UID, $time, $cls);
        $i = 0;
        foreach ($result1 as $row) {
            $list['book_id'] = $row['book_id'];
            $list['book_date'] = $row['book_date'];
            $list['book_cls_num'] = $row['book_cls_num'];
            $coachName = $this->coach_model->select_name($row['book_coa_id']);
            $list['coa_name'] = $coachName[0]['coach_name'];
            $schName = $this->school_model->select_name($row['book_sch_id']);
            $list['sch_name'] = $schName[0]['jp_name'];
            $comment_list['comment_history_list'][$i] = $this->load->view('vip_views/comment_history_list', $list, true);
            $i++;
        }
        $page = $this->load->view('vip_views/feedback', $comment_list, true);
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

    public function get_comment() {
        $id = $this->input->post("com_id");
        $name = $this->session->userdata('name');
        $result = $this->clscomment_model->select_detail($id);
        $page='';
        foreach ($result as $row) {
           $list['userName'] = $name;
           $list['content'] = $row['com_content'];
           $list['time'] = $row['com_time'];
          $page.= $this->load->view('vip_views/comment_list', $list, true);
            
        }
        echo $page;
    }

    public function to_comment() {
        $com_id = time();
        $com_time = $this->getTime();
        $com_from_id = $this->session->userdata('UID');
        $com_cls_id = $this->input->post("com_cls_id");
        $level = $this->input->post("level");
        $com_content = $this->input->post("com_content");
        $result = $this->teachbook_model->select_coa_id($com_cls_id);
        $com_to_id = $result[0]['book_coa_id'];
        $data = array(
            'com_id' => $com_id,
            'com_time' => $com_time,
            'com_from_id' => $com_from_id,
            'com_cls_id' => $com_cls_id,
            'com_content' => $com_content,
            'com_to_id' => $com_to_id,
            'com_level' => $level
        );
        $return = $this->clscomment_model->insert($data);
        if ($return == 1) {
            echo 'success!';
        } else {
            echo 'fail';
        }
    }

}
