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
        $this->load->model('course_model');
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
         if($this->session->userdata('TYPE')==1){
        }else{
            exit('No direct script access allowed');
        }
        if ($name == null) {
            $body['header'] = $this->load->view('common_views/header', '', true);
        } else {
            $data = array('username' => $name);
            $body['header'] = $this->load->view('coach_views/header_logined', $data, true);
        }
        $body['navigation'] = $this->load->view('coach_views/navigation', '', true);
        if ($page == '') {
           $this->self_info();
           return false;
        } else {
            $body['content'] = $page;
        }

        $body['footer'] = $this->load->view('common_views/footer', '', true);
        $this->load->view('coach_views/template', $body);
    }
    public function self_info(){
//        $UID = $this->session->userdata('UID');
        $UID='1427162541';
        $result = $this->coach_model->select_detail($UID);
        $body=array();
        foreach ($result as $row) {
            $body['coach_name']=$row['coach_name'];
            $body['coach_old']=$row['coach_old'];
            $schName = $this->school_model->select_name($row['coach_sch_id']);
            $body['coach_sch_name'] = $schName[0]['jp_name'];
            $body['coach_face']=$row['coach_face'];
            $body['coach_intro']=$row['coach_intro'];
            $body['coach_telnum']=$row['coach_telnum'];
        }
        $body['isCoach'] = true;
        $page = $this->load->view('coach_views/self_info',$body, true);
        $this->view($page);
    }
    public function teach_info(){
        $page = $this->load->view('coach_views/teach_info', "", true);
        $this->view($page);
    }
      public function schedule(){
        $page = $this->load->view('coach_views/schedule', "", true);
        $this->view($page);
    }
     public function self_info_edit(){
        $page = $this->load->view('coach_views/self_info_edit', "", true);
        $this->view($page);
    }
    public function suggest(){
        $id = $this->input->get('id');
        $result = $this->teachbook_model->select_from_id($id);
        $page="";
        foreach ($result as $row) {
            $list['book_id'] = $row['book_id'];
            $list['book_date'] = $row['book_date'];
            $list['book_cls_num'] = $row['book_cls_num'];
             $stuName = $this->accesscontrol_model->selectUserName($row['book_stu_id']);
            foreach ($stuName as $row3) {
                $list['stu_name'] = $row3['stu_true_name'];
            }
            $schName = $this->school_model->select_name($row['book_sch_id']);
            foreach ($schName as $row2) {
                $list['sch_name'] = $row2['jp_name'];
            }
            $list['book_cls_name'] ="";
            $courseName1 = $this->course_model->select($row['book_cls_id']);
                    foreach ($courseName1 as $row1) {
                $list['book_cls_name'] = $row1['cls_name'];
            }
            $page = $this->load->view('coach_views/suggest', $list, true);
        }
        
        $this->view($page);
    }
    public function to_suggest(){
        $book_id = $this->input->post("book_id");
        $book_suggest = $this->input->post("book_suggest");
        $data = array(
            'book_suggest'=>$book_suggest
        );
        $return = $this->teachbook_model->update_suggest($book_id,$data);
            echo $return;
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
            $list['book_cls_name'] ="";
            $courseName1 = $this->course_model->select($row['book_cls_id']);
            foreach ($courseName1 as $row1) {
                $list['book_cls_name'] = $row1['cls_name'];
            }
            
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
            $list['book_cls_name'] ="";
            $courseName1 = $this->course_model->select($row['book_cls_id']);
            foreach ($courseName1 as $row2) {
                $list['book_cls_name'] = $row2['cls_name'];
            }
            
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
        $result1= 0;$result2= 0;
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
            $result1+=$this->coachbook_model->insert($addArray);
        }else{
            $result1=1;
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
            $result2+=$this->coachbook_model->delete($newDate);
        }
        if ($result1 == 1&&$result2==$i) {
            echo 1;
        } else {
            echo 0;
        }
    }
    public function unbook(){
        $book_id=$this->input->post("book_id");
        $result=$this->teachbook_model->delete($book_id);
        echo $result;
    }
    public function get_teach_info(){
        $coachID="1427162541";
        $time1=$this->input->post("time1");
        $time2=$this->input->post("time2");
        $result=$this->teachbook_model->select_detail_from_time($coachID,$time1,$time2);
        $stu_count=$this->teachbook_model->select_stu_count($coachID,$time1,$time2);
         $comment_list = "";
        $j = 0;
        foreach ($result as $row) {
            $list['book_id'] = $row['book_id'];
            $list['book_date'] = $row['book_date'];
            $list['book_cls_num'] = $row['book_cls_num'];
            $list['book_suggest'] = $row['book_suggest'];
            
            $list['book_cls_name'] ="";
            $courseName1 = $this->course_model->select($row['book_cls_id']);
            foreach ($courseName1 as $row1) {
                $list['book_cls_name'] = $row1['cls_name'];
            }
            
            $coachName = $this->accesscontrol_model->selectUserName($row['book_stu_id']);
            foreach ($coachName as $row3) {
                $list['stu_name'] = $row3['stu_true_name'];
            }
            $schName = $this->school_model->select_name($row['book_sch_id']);
            foreach ($schName as $row2) {
                $list['sch_name'] = $row2['jp_name'];
            }
            $comment_list.= $this->load->view('coach_views/teach_info_list', $list, true);
            $j++;
           
        }
        $data=array(
            'course_num'=>$j,
            'stu_num'=>$stu_count,
            'list'=>$comment_list
        );
         echo json_encode($data);
    }

}
