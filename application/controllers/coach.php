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
        $page = $this->load->view('coach_views/book_info', '', true);
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

}
