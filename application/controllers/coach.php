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
        $this->load->model('clscomment_model');
        $this->load->model('course_model');
    }

    public function index() {
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
        public function getCoachGrade($coa_grade){
            if($coa_grade==5){
                $grade='E级';
            }else if($coa_grade==4){
                $grade='D级';
            }else if ($coa_grade==3) {
                $grade='C级';
            }else if ($coa_grade==2) {
                $grade='B级';
            }else if($coa_grade==1) {
                $grade='A级';
            }else{
                $grade='其他';
            }
        return $grade;
    }
    public function getCoachServType($serv_type){
        if($serv_type==3){
                $serv_con='科目二/科目三';
            }else if ($serv_type==2) {
                $serv_con='科目三';
            }else if($serv_type==1) {
                $serv_con='科目二';
            }else{
                $serv_con='其他';
            }
            return $serv_con;
    }
    public function self_info(){
        $UID = $this->session->userdata('UID');
       $default_head='http://driver-un.oss-cn-shenzhen.aliyuncs.com/headpic/default.jpg';
       $result=  $this->coach_model->selectAllinfoById($UID);
       
        foreach ($result as $row) {
            $row['coa_grade']=  $this->getCoachGrade($row['coach_grade']);
            $row['coach_serv_type']=$this->getCoachServType($row['coach_serv_type']);
        }
        if($row['coach_face']==null){
            $row['coach_face']=$default_head;
        }
       $row['isCoach']= $this->session->userdata('TYPE')==1?  true : false;
       
        $page = $this->load->view('coach_views/self_info',$row, true);
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
        $coa_id=$this->session->userdata('COACH_ID');
        $time = $this->getDate();
        $cls = $this->getCurrentCls();
        $result_fur = $this->teachbook_model->select_further_detail_coa($coa_id, $time, $cls);
        $comment_list = array();
        $j = 0;
        foreach ($result_fur as $row) {
            $comment_list['book_list'][$j] = $this->load->view('coach_views/book_list', $row, true);
            $j++;
        }
        
        $result_un = $this->teachbook_model->select_further_unbook_coa($coa_id, $time, $cls);
         $i = 0;
        foreach ($result_un as $row) {
  
            $comment_list['unbook_list'][$i] = $this->load->view('coach_views/unbook_list', $row, true);
            $i++;
        }
        
        $page = $this->load->view('coach_views/book_info', $comment_list, true);
        $this->view($page);
    }
    
    public function get_coach_comment(){
        $id = '1427162541';
        $page="";
        $result=$this->clscomment_model->select_coa_detail($id,0);
        foreach ($result as $row) {
            $page.= $this->load->view('coach_views/coach_comment_list',$row, true);
        }
        echo $page;
    }
    public function get_coach_study_record(){
        $id = '1427162541';
        $page="";
        $result=$this->clscomment_model->select_coa_detail($id,0);
        foreach ($result as $row) {
            $page.= $this->load->view('coach_views/coach_comment_list',$row, true);
        }
        echo $page;
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
            $comment_list.= $this->load->view('coach_views/teach_info_list', $row, true);
            $j++;
        }
        $data=array(
            'course_num'=>$j,
            'stu_num'=>$stu_count,
            'list'=>$comment_list
        );
         echo json_encode($data);
    }
     public function getCoaBaseInfo(){
        $coa_user_id=$this->session->userdata('UID');
        //$coa_id='1427162541';
        $result=$this->coach_model->selectAllinfoById($coa_user_id);
        foreach($result as $row){
            $name=$row['coach_name'];
            $age=$row['coach_old'];
            $self_intro = $row['coach_intro'];
            $driver_age = $row['coach_car_old'];
            $tel_num = $row['coach_telnum'];
            $serv_type = $row['coach_serv_type'];
            $headurl=$row['coach_face'];
        }
        $data=array('name'=>$name,'age'=>$age,'self_intro'=>$self_intro,
            'driver_age'=>$driver_age,'tel_num'=>$tel_num,'serv_type'=>$serv_type,'headurl'=>$headurl);
        
        echo json_encode($data);
    }
    
    
        /**
     * 根据城市代号获取驾校信息
     */
    function get_school_info() {
        $city = $this->input->post("city", TRUE);
        $result = $this->school_model->get_from_city($city);
        $list = '';
        foreach ($result as $row) {
            $list.=$this->load->view('a_views/school_list', $row, true);
        }
        $data = array(
            'info' => $result,
            'list' => $list
        );
        echo json_encode($data);
    }
    /**
     * 获取教练的信息显示在coach_info.php页面下方的列表中
     */
    public function get_coach_info(){
        $city=$this->input->post("city",TRUE);
        $result=$this->school_model->get_from_city($city);
        //var_dump($result);
        //数组长度
        $len=count($result);
        //驾校id，驾校名
        $school=array();
        
        for($i=0;$i<$len;$i++){
            //$school['id'.$i]=;
            //驾校id
            $id=$result[$i]['jp_id'];
            $school[$id]=$result[$i]['jp_name'];
        }
        //var_dump($school);
        
        //for($j=0;$j<$len;$j++){
         $coach_data=array();
        $temp=0;
        foreach ($school as $key => $value){    
            //根据驾校的id查询该驾校所有的教练
            $res=$this->coach_model->getCoachBySchoolId($key);
            $row='';
            if($res->result_array()>0){
                $row=$res->result_array();
            }
            for($p=0;$p<count($row);$p++){
                $coach_data[$temp]=$row[$p];
                $temp++;
            }
        }
        //所有教练数据保存在$coach_data数组中
        //var_dump($coach_data);
        $coa_list='';
        for($q=0;$q<count($coach_data);$q++){
            
            //头像
            $coach_info['coa_face']=$coach_data[$q]['coach_face'];
            //教练名
            $coach_info['coa_name']=$coach_data[$q]['coach_name'];
            //驾校名
            $coach_info['coa_school']=$school[$coach_data[$q]['coach_sch_id']];
            //收费标准,根据级别调用收费标准定义函数
            $coach_info['coa_grade_price']=  $this->getPriceByLevel($coach_data[$q]['coach_grade']);
            //历史评论人数
            if($coach_data[$q]['coach_stu_num']==null){
                $coach_info['coa_comment_total']=rand(1000,9999);
            }else{
                $coach_info['coa_comment_total']=$coach_data[$q]['coach_stu_num'];
            }
            //当前评分
            $coach_info['coa_history_score']=$coach_data[$q]['coach_history_score'];
            
            $coa_list.=$this->load->view('a_views/coach_list',$coach_info,true);
            
        }
        $data=array(
            'info'=>$result,
            'list'=>$coa_list
        );
        echo json_encode($data);
    }
    
    function getCoachByAnchor(){
        $school_id=$this->input->post('school_id');
        $school_name=$this->input->post('school_name');
        $coach_data=array();
       
        //根据驾校的id查询该驾校所有的教练
        $res=$this->coach_model->getCoachBySchoolId($school_id);
        //$row='';
        if($res->result_array()>0){
            $coach_data=$res->result_array();
        }
//        for($p=0;$p<count($row);$p++){
//            $coach_data[$p]=$row[$p];
//        }
        //所有教练数据保存在$coach_data数组中
        //var_dump($coach_data);
        $coa_list='';
        for($q=0;$q<count($coach_data);$q++){
            
            //头像
            $coach_info['coa_face']=$coach_data[$q]['coach_face'];
            //教练名
            $coach_info['coa_name']=$coach_data[$q]['coach_name'];
            //驾校名
            $coach_info['coa_school']=$school_name;
            //收费标准,根据级别调用收费标准定义函数
            $coach_info['coa_grade_price']=  $this->getPriceByLevel($coach_data[$q]['coach_grade']);
            //历史评论人数
            if($coach_data[$q]['coach_stu_num']==null){
                $coach_info['coa_comment_total']=rand(1000,9999);
            }else{
                $coach_info['coa_comment_total']=$coach_data[$q]['coach_stu_num'];
            }
            //当前评分
            $coach_info['coa_history_score']=$coach_data[$q]['coach_history_score'];
            
            $coa_list.=$this->load->view('a_views/coach_list',$coach_info,true);
            
        }
        $data=array(
            //'info'=>$result,
            'list'=>$coa_list
        );
        echo json_encode($data);
    }
    
    function getPriceByLevel($level) {
        $price='';
        if($level>0&&$level<6){
            $price=200-20*$level;
        }else{
            $price=100;
        }
        return $price;
    }

}
