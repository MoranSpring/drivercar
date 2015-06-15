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
        $this->load->model('course_model');
        $this->load->model('school_model');
        $this->load->model('clscomment_model');
        $this->load->model('staticcoach_model');
        $this->load->library('oss/alioss');
        $this->load->model('usercoin_model');
        $this->load->model('consumption_model');
        $this->load->model('cash_model');

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
        if ($page == ''&& $name != null) {
           $this->self_home();
           return false;
        } else if ($page != '' && $name != null) {
            $body['content'] = $page;
        }
        $body['footer'] = $this->load->view('common_views/footer', '', true);
        $this->load->view('vip_views/template', $body);
    }

    //--------------会员中心------------------------
    public function vip_center() {
        $page = $this->load->view('vip_views/self_home', '', true);
        $this->self_home();
        //$this->view($page);
    }

    public function study_progress() {
        if ($this->session->userdata('TYPE') == 2) {
            
        } else {
            $this->view("you aren't vip!");
            return false;
        }
        $UID = $this->session->userdata('UID');
        $result = $this->teachbook_model->get_book_infos($UID);
        $i = 0;
        $content='';
        foreach ($result as $row) {
            $content['content'][$i] = $this->load->view('vip_views/content', $row, true);
            $i++;
        }
        $year['year'] = $this->load->view('vip_views/year_list', $content, true);
        $page = $this->load->view('vip_views/study_progress', $year, true);
        $this->view($page);
    }

    public function study_book() {
        if ($this->session->userdata('TYPE') == 2) {
            
        } else {
            $this->view("you aren't vip!");
            return false;
        }
        $page = $this->load->view('vip_views/study_book', '', true);
        $this->view($page);
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
            $comment_list['unuse_list'][$j] = $this->load->view('vip_views/management_fur_list', $row, true);
            $j++;
        }unset($row);

        $result = $this->teachbook_model->select_history_details($UID, $time, $cls);
        $i = 0;
        foreach ($result as $row) {
            $row['course'] = $this->getClassType($row['book_cls_id']);
            $comment_list['list'][$i] = $this->load->view('vip_views/management_list', $row, true);
            $i++;
        }
        $page = $this->load->view('vip_views/management', $comment_list, true);
        $this->view($page);
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
            $comment_list['feedback_content'][0] = $this->load->view('vip_views/feedback_content', $list, true);
        }
        $page = $this->load->view('vip_views/tocomment', $comment_list, true);
        $this->view($page);
    }

    public function feedback() {
        if ($this->session->userdata('TYPE') == 2) {
            
        } else {
            $this->view("you aren't vip!");
            return false;
        }
        $comment_list = array();
        $UID = $this->session->userdata('UID');
        $time = $this->getDate();
        $cls = $this->getCurrentCls();

        $result1 = $this->teachbook_model->select_history_detail($UID, $time, $cls);
        $i = 0;
        foreach ($result1 as $row) {
            $list['book_id'] = $row['book_id'];
            $iscomment = $this->clscomment_model->select_detail($list['book_id']);
            if ($iscomment == null) {
                continue;
            }
            $list['book_date'] = $row['book_date'];
            $list['book_cls_num'] = $row['book_cls_num'];
            $coachName = $this->coach_model->select_name($row['book_coa_id']);
            $list['coa_name'] = $coachName[0]['coach_name'];
            $list['coa_face'] = $coachName[0]['coach_face'] . "@!nail";
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
        $time = $this->getDate();
        $cls = $this->getCurrentCls();

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
        $result1 = $this->coachbook_model->select($data1, $time, $cls);
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
        $book_coa_id = $this->input->post('book_coa_id', TRUE);
        $book_sch_id = $this->input->post('book_sch_id', TRUE);
        $book_cls_id = $this->input->post('book_cls_id', TRUE);
        $json = $this->input->post('json', TRUE);
        $bookArray = json_decode($json, true);
        $clsnum = count($bookArray); //看客户总共选了多少节课
        //判断传过来的json是否用重复时间
        for ($i = 0; $i < $clsnum; $i++) {
            $temp_day = $bookArray[$i]['date'];
            $temp_cls = $bookArray[$i]['cls'];
            for ($j = $i + 1; $j < $clsnum; $j++) {
                if ($temp_day == $bookArray[$j]['date'] && $temp_cls == $bookArray[$j]['cls']) {
                    array_splice($bookArray, $j, 1);
                    $clsnum--;
                    $j--;
                }
            }
        }
        //判断传来的课程时间跟数据库中的时间是否冲突，防止选课前刚刚被被人选走课程
        $is_exist_array = $this->teachbook_model->check_is_exist($bookArray, $book_coa_id); //读出该教练的单节课的积分
        foreach ($is_exist_array as $row) {
            //有节课被别人已经选走
            echo 7;
            return false;
        }
        //判断用户余额是否充足！
        $SUM = 0; //最终的费用
        $USERCOIN = 0; //用户剩余的积分数
        $COAHCOIN = 0; //教练单节课积分
        $coach_coin_array = $this->coach_model->selectCostById($book_coa_id); //读出该教练的单节课的积分
        foreach ($coach_coin_array as $row) {
            $COAHCOIN = $row['coach_cls_cost'];
            $SUM = $row['coach_cls_cost'] * $clsnum; //计算出总价格
        }
        unset($row);
        $user_coin_result = $this->usercoin_model->selectById($book_stu_id);
        foreach ($user_coin_result as $row) {
            $USERCOIN = $row['uc_num'];
        }
        unset($row);
        if ($SUM > 0 && $USERCOIN > 0) {
            $spare_money = $USERCOIN - $SUM;
            if ($spare_money >= 0) {
                //去扣除积分
                $data = array('uc_num' => $spare_money); //消费后用户余额
            } else {
                //余额不足
                echo 3;
                return false;
            }
        } else {
            //返回异常
            echo 9;
            return false;
        }

        $DateArray = array();
        $RecordArray = array();
        $count = rand(0, 1000);
        foreach ($bookArray as $row) {
            $book_id = time() . $count;
            $newDate = array(
                'book_id' => $book_id,
                'book_stu_id' => $book_stu_id,
                'book_coa_id' => $book_coa_id,
                'book_sch_id' => $book_sch_id,
                'book_cls_id' => $book_cls_id,
                'book_state' => 1,
                'book_date' => $row['date'],
                'book_cls_num' => $row['cls'],
                'book_time' => $this->getTime()
            );
            array_push($DateArray, $newDate);

            $csm_record = array(
                'csm_id' => 'csm' . $book_id,
                'csm_rec_id' => $book_id,
                'csm_stu_id' => $book_stu_id,
                'csm_in_out' => '1',
                'csm_type' => '学车费用',
                'csm_coin' => $COAHCOIN,
                'csm_date' => $this->getTime()
            );
            array_push($RecordArray, $csm_record);
            $count++;
        }
        $result = $this->cash_model->teach_book_waste_money($DateArray, $RecordArray, $book_stu_id, $data);
        if ($result == true) {
            echo 1;
        } else {
            echo 11; //数据插入冲突
        }
    }

    public function get_comment() {
        $id = $this->input->post("com_id");
        $name = $this->session->userdata('name');
        $result = $this->clscomment_model->select_detail($id);
        $page = '';
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
        echo $return;
    }

    public function unbook() {
        $id = $this->input->post("book_id");
        $data = array(
            'book_state' => '7'
        );
        $return = $this->teachbook_model->update_state($id, $data);
        echo $return;
    }

    public function get_course_name() {
        $id = $this->input->post("id");
        $return = $this->course_model->select($id);
        echo $return[0]["cls_name"];
    }
    public function get_static_coach(){
        $UID = $this->session->userdata('UID');
        $return = $this->staticcoach_model->select($UID);
        $result='';
        foreach($return as $row){
            $result=$row;
        }
        echo $result=='' ? '0' : json_encode($result);
    }
    public function self_home(){
        $UID = $this->session->userdata('UID');
        //用户头像
        //$stu_face
        $body['stu_face']='';                        
        //$UID='1427162541';
        //用户名
        $body['stu_name']='';
        //个人介绍
        $body['stu_self_intro']='';
        //用户类型
        $body['stu_type']='';
        //性别
        $body['stu_sex']='';
        //年龄
        $body['stu_age']='';
        //所在地：
        $body['stu_living_place']='';     
        //邮箱：
        $body['stu_email']='';     
        //注册时间
        $body['stu_reg_time']='';
        //最近登录时间
        $body['stu_last_logtime']='';
        $body['isVip']=$this->session->userdata('TYPE')==2 ? true :false;
         
        
       $default_head='http://driver-un.oss-cn-shenzhen.aliyuncs.com/headpic/default.jpg';
       $result=  $this->accesscontrol_model->selectById($UID);
       
        foreach ($result as $row) {
            if($row['stu_nick_name']!=null){
                $body['stu_name']=$row['stu_nick_name'];
            }else{
                $body['stu_name']=$row['stu_name'];
            }
           
            if($body['stu_face']==null){
                $body['stu_face']=$row['stu_face'];
            }else{
                $body['stu_face']=$default_head;
            }
            $body['stu_type']= $this->getUserType($row['stu_type']) ;
            
            $body['stu_sex']=  $this->getUserGender($row['stu_sex']);
            
            $body['stu_age']=  $row['stu_age'];
            $body['stu_living_place']=  $row['stu_living_place'];
            $body['stu_email']=  $row['stu_email'];
            $body['stu_reg_time']=  $row['stu_reg_time'];
            $body['stu_last_logtime']=  $row['stu_last_logtime'];
            $body['stu_self_intro']=$row['stu_self_intro'];
        }
        
        $page = $this->load->view('vip_views/self_home',$body, true);
        $this->view($page);
    }
    
    function getUserType($num){
        $type=null;
        if($num==3){
            $type='免费会员';
        }else if($num==2){
            $type='学员';
        }else if($num==1){
            $type='教练';
        }else{
            $type='游客';
        }
        return $type;
    }
    function getUserGender($num) {
         $type=null;
        if($num==0){
            $type='女';
        }else if($num==1){
            $type='男';
        }else{
            $type='外星人';
        }
        return $type;
    }
    public function self_info(){
        $page = $this->load->view('vip_views/self_info', "", true);
        $this->view($page);
    }
    public function test_join(){
        $UID='1426568565';
        $result=$this->teachbook_model->get_book_infos($UID);
        echo json_encode($result);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    

}
