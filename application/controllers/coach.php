<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Coach extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('accesscontrol_model');
        $this->load->model('news_model');
        $this->load->library('oss/alioss');
        $this->load->model('coach_model');
        $this->load->model('coachbook_model');
        $this->load->model('teachbook_model');
        $this->load->model('school_model');
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
//         $this->load->view('test3');
        $this->view();
    }

    public function view($page = '') {
        $name = $this->session->userdata('name');
        if ($name == null) {
            $body['header'] = $this->load->view('common_views/header', '', true);
        } else {
            $data = array('username' => $name);
            $body['header'] = $this->load->view('coach_views/header_logined', $data, true);
        }
        $body['navigation'] = $this->load->view('coach_views/navigation', '', true);
        if ($page == '') {
            $body['content'] = $this->load->view('coach_views/schedule', '', true);
        } else {
            $body['content'] = $page;
        }

        $body['footer'] = $this->load->view('common_views/footer', '', true);
        $this->load->view('coach_views/template', $body);
    }
    public function book(){
        $coachID="1427162541";
        $time = $this->getDate();
        $cls = $this->getCurrentCls();
        $result_fur = $this->teachbook_model->select_further_detail_coa($coachID, $time, $cls);
        $comment_list = array();
        $j = 0;
        foreach ($result_fur as $row) {
            $list['book_id'] = $row['book_id'];
            $list['book_date'] = $row['book_date'];
            $list['book_cls_num'] = $row['book_cls_num'];
            
            $coachName = $this->accesscontrol_model->selectUserName($row['book_stu_id']);
            $list['stu_name'] = $coachName[0]['stu_true_name'];
            
            $schName = $this->school_model->select_name($row['book_sch_id']);
            $list['sch_name'] = $schName[0]['jp_name'];
            $comment_list['book_list'][$j] = $this->load->view('coach_views/book_list', $list, true);
            $j++;
        }
        
        $result_un = $this->teachbook_model->select_further_unbook_coa($coachID, $time, $cls);
         $i = 0;
        foreach ($result_un as $row) {
            $list['book_id'] = $row['book_id'];
            $list['book_date'] = $row['book_date'];
            $list['book_cls_num'] = $row['book_cls_num'];
            
            $coachName = $this->accesscontrol_model->selectUserName($row['book_stu_id']);
            $list['stu_name'] = $coachName[0]['stu_true_name'];
            
            $schName = $this->school_model->select_name($row['book_sch_id']);
            $list['sch_name'] = $schName[0]['jp_name'];
            $comment_list['unbook_list'][$i] = $this->load->view('coach_views/unbook_list', $list, true);
            $i++;
        }
        
        $page = $this->load->view('coach_views/book_info', $comment_list, true);
        $this->view($page);
    }

    
    public function coach_book() {
        $coabk_id = time();
        ////        $book_stu_id =$this->session->userdata('UID');
//        $book_coa_id = $this->input->post('book_coa_id');
//        $book_sch_id = $this->input->post('book_sch_id');
        $coabk_coach_id = '1427162541';
        $coabk_sch_id = '1426955895';
        $json = $this->input->post('json');
        $bookArray = json_decode($json, true);

        $addArray = array();
        $result = 0;
        foreach ($bookArray['add'] as $row) {
            $coabk_id += rand(1, 100);
            $newDate = array(
                'coabk_id' => $coabk_id,
                'coabk_coach_id' => $coabk_coach_id,
                'coabk_sch_id' => $coabk_sch_id,
                'coabk_time' => $row['date'],
                'coabk_cls_num' => $row['cls'],
            );
            array_push($addArray, $newDate);
        }
        if (count($addArray) != 0) {
            $result+=$this->coachbook_model->insert($addArray);
        }
        $i = 0;
        foreach ($bookArray['remove'] as $row2) {
            $newDate = array(
                'coabk_coach_id' => $coabk_coach_id,
                'coabk_time' => $row2['date'],
                'coabk_cls_num' => $row2['cls']
            );
            $i++;
//            echo $row['date'];
            $result+=$this->coachbook_model->delete($newDate);
        }
        echo $result;
        if ($result == $i + 1) {
//            echo "Insert Seccuss!";
        } else {
//            echo "Insert Fail!";
        }
    }
    public function unbook(){
        $book_id=$this->input->post("book_id");
        $result=$this->teachbook_model->delete($book_id);
        echo $result;
    }

}
